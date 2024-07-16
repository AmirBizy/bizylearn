<?php

namespace Aqayepardakht\PhpSdk;

use Aqayepardakht\Http\Response;
use Aqayepardakht\Http\Client;
use Aqayepardakht\PhpSdk\Helper;

class Invoice {
    
    protected $amount;

    protected $card;

    protected $invoiceId;

    protected $phone;

    protected $email;

    protected $description;

    public function getItems() {
        return [
            "amount"      => $this->getAmount(),
            "card_number" => $this->getCard(),
            "invoice_id"  => $this->getInvoiceId(),
            "mobile"      => $this->getPhone(),
            "email"       => $this->getEmail(),
            'description' => $this->getDescription()
        ];
    }

    public function amount($amount) {
        $amount = floatval(Helper::faToEnNumbers($amount));

        if ($amount == 0 || $amount < 500 || $amount >= 100000000) {
            throw new \Exception('مبلغ باید به صورت عددی و بیشتر از 500 تومان و کمتر از  1000,000,000 باشد');
        }

        $this->amount = $amount;

        return $this;
    }

    public function card(string $cards) {
        Helper::validateCardsNumber($cards);

        $this->card = $cards;

        return $this;
    }

    public function invoiceId($invoiceId) {
        $this->invoiceId = $invoiceId;

        return $this;
    }

    public function phone($phone) {
        Helper::validateMobileNumber($this->getPhone());

        $this->phone = $phone;

        return $this;
    }

    public function email($email) {
        Helper::validateEmail($this->getEmail());

        $this->email = $email;

        return $this;
    }

    public function description($description) {
        $this->description = $description;

        return $this;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getCard() {
        return $this->card;
    }

    public function getInvoiceId() {
        return $this->invoiceId;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDescription() {
        return $this->description;
    }
}