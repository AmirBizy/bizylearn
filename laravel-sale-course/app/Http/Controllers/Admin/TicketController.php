<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::latest()->where('title' , '!=' , null)->paginate(100);
        $new_tickets = Ticket::where('status' , '0')->get();
        return view('admin.tickets.tickets' , compact('tickets' , 'new_tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function get_tickets(Ticket $ticket)
    {
        $user_ticket = Ticket::where('id' , $ticket->id)->get();
        $admin_reply = Ticket::where('for_ticket' , $ticket->slug)->get();
        return view('admin.tickets.show' , compact('ticket' , 'user_ticket' , 'admin_reply'));
    }


    public function reply(Request $request , Ticket $ticket)
    {
        if ($ticket->ticket_status == 0) {
            Alert::error('پاسخ ناموفق. تیکت بسته شده است');
            return redirect()->route('admin.tickets.index');
        }

        $request->validate([
            'description' => 'required',
        ]);

        Ticket::create([
            'user_id' => auth()->user()->id,
            'for_ticket' => $ticket->slug,
            'reply' => 1,
            'description' => $request->description,
            'admin_name' => auth()->user()->name . ' - ' . '( ' . auth()->user()->roles[0]->display_name . ' )',
        ]);

        $ticket->update([
           'status' => 1
        ]);

        Alert::success('پیام شما به کاربر با موفقیت ارسال شد');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        return view('admin.tickets.edit' , compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , Ticket $ticket)
    {
        $ticket->update([
           'title'  => $request->title,
           'description'  => $request->description,
        ]);

        Alert::success('تیکت کاربر ویرایش شد');
        return redirect()->route('admin.tickets.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $delete_ticket = Ticket::findOrFail($ticket->id);
        $delete_ticket->delete();

        $message_ticket = Ticket::where('for_ticket' , $ticket->slug);
        $message_ticket->delete();

        Alert::success('تیکت مورد نظر با موفقیت حذف شد');
        return redirect()->route('admin.tickets.index');
    }


    public function change_status(Ticket $ticket)
    {
        $ticket->update([
            'ticket_status' => '0'
        ]);

        Alert::success('تیکت مورد نظر با موفقیت بسته شد');
        return redirect()->route('admin.tickets.index');
    }
}
