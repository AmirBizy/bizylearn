<?php 

namespace Aqayepardakht\PhpSdk\Services\Account;

use Aqayepardakht\Http\Response;
use Aqayepardakht\Http\Client;
use Aqayepardakht\PhpSdk\Helper;
use Aqayepardakht\PhpSdk\Invoice;
use Aqayepardakht\PhpSdk\Services\Pay\PaymentService;
use Aqayepardakht\PhpSdk\Services\Transaction\TransactionService;
use Aqayepardakht\PhpSdk\Services\Gateway\GatewayService;

class AccountService {
    protected $account; 
    protected $code;

    public function __construct($account, $code) {
        $this->account = $account;
        $this->code    = $code;
    }

    public function transactions($pin = null) {
        return (new TransactionService($this->account, $this->code, $pin));
    }
}