<?php

namespace Aqayepardakht\Http;

class Request {
    private $headers    = [];
    private $params     = [];
    private $url        = '';

    public function send($url, $method = 'GET', $params = []) {
        $this->setUrl($url);

        if (!empty($params)) $this->setParams($params);

        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL            => rtrim($this->getUrl(), '/'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS     => http_build_query($this->params),
            CURLOPT_HTTPHEADER     => $this->buildHeaders($this->headers),
            CURLOPT_CUSTOMREQUEST  => $method,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 0,
            CURLOPT_FOLLOWLOCATION => true,
        ]);

       return new Response($ch);
    }

    protected function buildHeaders($header) {
        if (is_array($header)) {
            $i_header = $header;
            $header = [];
            foreach ($i_header as $param => $value) {
                $header[] = "$param: $value";
            }
        }

        return $header;
    }

    public function delParam($key, $value) {
        $this->params[$key] = $value;
    }

    public function appendParams($params) {
        $this->params = array_merge($params, $this->params);
        return $this;
    }

    public function appendParam($key, $value) {
        $this->params[$key] = $value;
    }

    public function setParams($params) {
        $this->params = $params;
        return $this;
    }

    public function setHeaders($headers) {
        $this->headers = $headers;
        return $this;
    }

    public function appendHeaders($header, $value) {
        $this->headers[$header] = $value;
        return $this;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function withToken($token) {
        $this->appendHeaders('Authorization', 'Bearer '.$token);
        return $this;
    }
}
