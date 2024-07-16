<?php

namespace Aqayepardakht\Http;

use Aqayepardakht\Http\Request;

class Client extends Request {

    public function get($url, $params = []) {
        return $this->setParams($params)->send($url, 'GET');
    }

    public function post($url, $params = []) {
        return $this->setParams($params)->send($url, 'POST');
    }

    public function put($url, $params = []) {}
    public function patch($url, $params = []) {}
    public function delete($url, $params = []) {}
}
