<?php

namespace Aqayepardakht\PhpSdk;

use Aqayepardakht\Http\Response;
use Aqayepardakht\Http\Client;
use Aqayepardakht\PhpSdk\Helper;
use Aqayepardakht\PhpSdk\Traits\HasConfig;
use Aqayepardakht\PhpSdk\Services\Gateway\Gateway;
use Aqayepardakht\PhpSdk\Services\Gateway\GatewayService;
use Aqayepardakht\PhpSdk\Services\Account\AccountService;

class Api {
    use HasConfig;

    public function __construct($_config = []) {
        $config = [];

        if (!empty($_config) && is_array($_config)) {
            foreach($_config as $key => $value) {
                if (in_array($key, ['pin', 'account', 'code']))
                    $config[$key] = $value;   
            }
        } 
        
        $this->config = $this->getConfigs($config); 
    }

    public function gateway($pin = null) {
        if (!$pin) $pin = $this->config['pin'];

        throw new \Exception("Please Set A pin", 1);
        
        return new GatewayService($pin);
    }

    public function account($accountNumber = null, $code = null) {
        if (!$accountNumber) $accountNumber = $this->config['account'];
        if (!$code)          $code          = $this->config['code'];

        return new AccountService($accountNumber, $code);
    }
}