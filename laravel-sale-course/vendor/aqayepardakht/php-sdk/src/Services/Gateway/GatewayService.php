<?php 

namespace Aqayepardakht\PhpSdk\Services\Gateway;

use Aqayepardakht\PhpSdk\Services\Pay\PaymentService;
use Aqayepardakht\PhpSdk\Services\Transaction\TransactionService;
use Aqayepardakht\PhpSdk\Invoice;

class GatewayService {

    /**
     * gateway pin
     *
     * @var string
    */
    protected $pin;

    public function __construct($pin) {
        $this->pin = $pin;
    }

    public function invoice($invoice = null) {
        if (!($invoice instanceof Invoice)) {
            $_invoice =  new Invoice();
            $keys     = array_keys($invoice);
            
            foreach($keys as $key) 
                if(!empty($invoice[$key]) && method_exists($_invoice, $key)) 
                    $_invoice->$key($invoice[$key]);

            $invoice = $_invoice;
        }

        return (new PaymentService($this->pin, $invoice));
    }

    public function transactions() {
        return (new TransactionService());
    }

    public function setPin($pin) {
        $this->pin = $pin;
    }

    public function getPin() {
        $this->pin = $pin;
    }
}