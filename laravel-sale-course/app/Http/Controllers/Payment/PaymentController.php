<?php

namespace App\Http\Controllers\Payment;

use Aqayepardakht;
use App\Models\Course;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    public function paymentGateway(Request $request)
    {

        if(\Cart::getTotal() <= 0) {
            Alert::error('شما دوره ای در سبد خود برای خرید ندارید!');
            return redirect()->back();
        }

        $data = array(
            'MerchantID' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
            'Amount' => \Cart::getTotal(),
            'CallbackURL' => route('payment.callback'),
            'Description' => 'بیزی لرن'
        );


        $jsonData = json_encode($data);
        $ch = curl_init('https://sandbox.zarinpal.com/pg/rest/WebGate/PaymentRequest.json');
        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));


        $result = curl_exec($ch);
        $err = curl_error($ch);
        $result = json_decode($result, true);
        curl_close($ch);


        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            if ($result["Status"] == 100) {
                return redirect()->to('https://sandbox.zarinpal.com/pg/StartPay/' . $result["Authority"]);
            } else {
                echo 'ERR: ' . $result["Status"];
            }
        }
    }


    public function callback(Request $request)
    {

        $MerchantID = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
        $Authority = $request->Authority;

        $data = array('MerchantID' => $MerchantID, 'Authority' => $Authority, 'Amount' => \Cart::getTotal());
        $jsonData = json_encode($data);
        $ch = curl_init('https://sandbox.zarinpal.com/pg/rest/WebGate/PaymentVerification.json');
        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));
        $result = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        $result = json_decode($result, true);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {

            if (substr($_SERVER['REQUEST_URI'] , 80 , ) == 'OK') {

                foreach(\Cart::getContent() as $rowId => $item) {

                    \Cart::update($rowId, array(
                        'status' => '1'
                    ));

                    Transaction::create([
                        'user_id' => auth()->user()->id,
                        'course_id' => $item->id,
                        'status' => '1',
                    ]);

                }

                \Cart::clear();
                Alert::success('دوره با موفقیت خریداری شد');
                return redirect()->route('mycourses');
            } else {
                Alert::error('خرید دوره با خطا مواجه شد');
                return redirect()->route('carts.index');
            }
        }


    }


    public function freeCourse (Course $course , Request $request) {

        if($_SERVER["REQUEST_METHOD"] == "POST") {

        if($course->type == "رایگان") {

            Transaction::create([
                'user_id' => auth()->user()->id,
                'course_id' => $course->id,
                'status' => '1',
            ]);

            Alert::success('ثبت نام در دوره با موفقیت انجام شد');
            return redirect()->route('mycourses');

            } else {
                Alert::error('ثبت نام در دوره با خطا مواجه شد');
                return redirect()->back();
            }
        } else {
            Alert::error('ثبت نام در دوره با خطا مواجه شد');
            return redirect()->back();
        }

    }

}
