<?php

namespace App\Http\Controllers\Home;

use Carbon\Carbon;
use App\Models\Ticket;
use App\Models\Category;
use App\Models\WebSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class UserTicketController extends Controller
{
    public function index()
    {
        $categories = Category::with('parent')->whereNull('parent')->where('status' , '1')->get();
        $subcategories = Category::with('parent')->whereNotNull('parent')->get();
        $valed_categories = Category::with('parent')->whereNull('parent')->where('status' , '0')->get();
        $tickets = Ticket::latest()->where('user_id' , auth()->user()->id)->where('title' , '!=' , null)->paginate(10);
        $web_setting = WebSetting::first();
        return view('profile.ticket.tickets' , compact('valed_categories' , 'subcategories' , 'web_setting' , 'categories' , 'tickets'));
    }


    public function create()
    {
        $categories = Category::with('parent')->whereNull('parent')->where('status' , '1')->get();
        $subcategories = Category::with('parent')->whereNotNull('parent')->get();
        $valed_categories = Category::with('parent')->whereNull('parent')->where('status' , '0')->get();
        $web_setting = WebSetting::first();
        return view('profile.ticket.create' , compact('valed_categories' , 'subcategories' , 'web_setting' , 'categories'));
    }


    public function store(Request $request)
    {
        $user = auth()->user();

        $request->validate([
           'title' => 'required|max:255',
           'priority' => 'required',
           'description' => 'required|min:3',
        ]);

        $slug = now()->getTimestampMs().rand(1000000000000000,9999999999999999);

        Ticket::create([
           'user_id' => auth()->user()->id,
           'title' => $request->title,
           'slug' => $slug,
           'for_ticket' => $slug,
           'priority' => $request->priority,
           'description' => $request->description,
           'status' => '0',
        ]);

        Alert::success('تیکت شما ثبت شد و پس از بررسی پاسخ داده خواهد شد');
        return redirect()->route('home.ticket.index');
    }


    public function show(Ticket $ticket)
    {
        if($ticket->user_id != auth()->user()->id) {
            Alert::error('این تیکت برای شما نمیباشد');
            return redirect()->route('home.ticket.index');
        }
        $categories = Category::with('parent')->whereNull('parent')->where('status' , '1')->get();
        $subcategories = Category::with('parent')->whereNotNull('parent')->get();
        $valed_categories = Category::with('parent')->whereNull('parent')->where('status' , '0')->get();
        $user_ticket = Ticket::where('user_id' , auth()->user()->id)->where('slug' , $ticket->slug)->get();
        $user_ticket_2 = Ticket::where('user_id' , auth()->user()->id)->where('for_ticket' , $ticket->slug)->get();
        $admin_reply = Ticket::where('for_ticket' , $ticket->slug)->get();
        $web_setting = WebSetting::first();
        return view('profile.ticket.show' , compact('valed_categories' , 'subcategories' , 'web_setting' , 'ticket' , 'categories' , 'user_ticket' , 'user_ticket_2', 'admin_reply'));
    }


    public function reply(Request $request , Ticket $ticket)
    {
        if ($ticket->ticket_status == 0) {
            Alert::error('پاسخ ناموفق. تیکت بسته شده است');
            return redirect()->route('home.ticket.index');
        }

        $request->validate([
            'description' => 'required|min:3',
        ]);

        Ticket::create([
            'user_id' => auth()->user()->id,
            'for_ticket' => $ticket->slug,
            'slug' => $ticket->slug,
            'slug' => $ticket->slug,
            'description' => $request->description,
        ]);

        $ticket->update([
            'status' => '0'
        ]);

        Alert::success('پیام شما با موفقیت ارسال شد');
        return redirect()->back();
    }
}
