<?php

namespace Aqayepardakht\PhpSdk\Services\Pay;

use Aqayepardakht\Http\Client;
use Aqayepardakht\PhpSdk\Helper;
use Aqayepardakht\PhpSdk\Invoice;
use Aqayepardakht\PhpSdk\Traits\HasConfig;

class PaymentService {
    use HasConfig;

    /**
     * Payment Trace Code
     *
     * @var String
    */
    private $traceCode;

    /**
     * gateway pin
     *
     * @var string
    */
    protected $pin;

    public function __construct($pin, Invoice $invoice) {
        $this->pin     = $pin;
        $this->invoice = $invoice;
        $this->config = $this->getConfigs(); 
    }

    public function create() {
        Helper::validateUrl($this->getCallback());

        $params             = $this->invoice->getItems();
        $params["pin"]      = $this->pin;
        $params["callback"] = $this->getCallback();

        $response = (new Client())->post(Helper::url('create'), $params);
        $response = $response->json();

        if ($response->status == 'error')  
            throw new \Exception($this->config['errors'][$response->code], $response->code);
        
        $this->setTraceCode($response->transid);

        return $this;        
    }

    public function verify($traceCode) {
        $this->setTraceCode($traceCode);

        $params            = $this->invoice->getItems();
        $params["pin"]     = $this->pin;
        $params['transid'] = $this->getTraceCode();
        
        $response = (new Client())->post(Helper::url('verify'), $params);
        $response = $response->json();

        if ($response->status == 'error') 
            throw new \Exception($this->config['errors'][$response->code], $response->code);
        
        
        return $response;
    }

    public function start() {
        $url =  (strpos($this->pin, 'AQ') === 0) ? $this->config['baseUrl'] : 'https://panel.aqayepardakht.ir/startpay/';

        if ($this->pin == 'sandbox') $url .='sandbox/';

        $url .= $this->getTraceCode();

        header("Location: ".$url);
        exit;
    }

    public function getCallback() {
        return !empty($this->callbackUrl) ? $this->callbackUrl : null; 
    }

    public function callback($callbackUrl) {
        $this->callbackUrl = $callbackUrl;

        return $this;
    }

    public function getTraceCode() {
        return $this->traceCode;
    }

    public function setTraceCode($code) {
        $this->traceCode = $code;

        return $this;
    }
}