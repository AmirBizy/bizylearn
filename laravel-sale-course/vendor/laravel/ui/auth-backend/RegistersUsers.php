<?php

namespace Illuminate\Foundation\Auth;

use App\Models\Cart;
use App\Models\Category;
use App\Models\WebSetting;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use TimeHunter\LaravelGoogleReCaptchaV2\Validations\GoogleReCaptchaV2ValidationRule;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $course_cart = Cart::where('user_id' , auth()->check() ? auth()->user()->id : '')->get();
        $course_detail = DB::table('carts')->join('courses' , 'carts.course_id' , '=' , 'courses.id')
            ->where('user_id' , auth()->check() ? auth()->user()->id : '')->get();
        $course_detail_total = DB::table('carts')->where('user_id' , auth()->check() ? auth()->user()->id : '')
            ->sum('price');
        $course_sale_price = DB::table('carts')->where('user_id' , auth()->check() ? auth()->user()->id : '')
            ->sum('sale_price' , '+' , 'price');
        $total_amount = $course_detail_total + $course_sale_price;
        $web_setting = WebSetting::first();
        $categories = Category::with('parent')->whereNull('parent')->where('status' , '1')->get();
        $subcategories = Category::with('parent')->whereNotNull('parent')->get();
        $valed_categories = Category::with('parent')->whereNull('parent')->where('status' , '0')->get();
        return view('auth.register' , compact('valed_categories' , 'subcategories' , 'web_setting' , 'course_detail' , 'course_sale_price' , 'total_amount' , 'course_detail_total' , 'categories' , 'course_cart'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all() ,
            ['g-recaptcha-response' => ['required' , new GoogleReCaptchaV2ValidationRule()]]
        )->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
