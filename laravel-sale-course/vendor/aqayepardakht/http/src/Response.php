<?php

namespace Aqayepardakht\Http;

class Response {
    
    private $result     = null;
    private $statusCode = null;
    private $message    = '';

    public function __construct($ch) {
        $this->result     = curl_exec($ch);
        $this->statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) $this->message = curl_error($ch);

        curl_close($ch);
    }

    public function body() {
        return $this->result;
    }

    public function json() {
        return json_decode($this->result);
    }

    public function status() {
        return $this->statusCode;
    }

    public function isSuccess() {
        return ($this->status() >= 200 && $this->status() < 300);
    }

    public function isFailed() {
        return ($this->status() >= 400);
    }

    public function getError() {
        return $this->message;
    }

    public function setResult($result) {
        $this->result = $result;
    }
}
