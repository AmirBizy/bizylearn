<?php 

namespace Aqayepardakht\PhpSdk\Services\Transaction;

use Aqayepardakht\Http\Response;
use Aqayepardakht\Http\Client;
use Aqayepardakht\PhpSdk\Helper;
use Aqayepardakht\PhpSdk\Invoice;
use Aqayepardakht\PhpSdk\Services\Pay\PaymentService;

class TransactionService {
    /**
     * gateway pin
     *
     * @var string
    */
    protected $pin;

    protected $account;
    protected $code;
    protected $page;
    protected $start;
    protected $end;

    public function __construct($account, $code, $pin = null) {
        $this->pin     = $pin;
        $this->account = $account;
        $this->code    = $code;
    }

    public function get() {
        $url = 'https://panel.aqayepardakht.ir/api/v2/transactions/';
        
        if ($this->pin) $url .='gate';
        else            $url .='account';

        $response = (new Client())->post($url, [
            'accout'    => $this->account,
            'code'       => $this->code,
            'page'       => $this->page,
            'start_date' => $this->start,
            'end_date'   => $this->end, 
            'pin'        => $this->pin ? $this->pin : null 
        ]);

        $response = $response->json();

        if ($response->status == 'error') throw new \Exception($response->status, $response->code);
     
        return $response;
    }

    public function startDate($date) {
        $this->start = $date;
    }

    public function endDate($date) {
        $this->end = $date;
    }

    public function page($page) {
        $this->page = $page;
    }
}