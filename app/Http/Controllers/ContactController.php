<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function submit(ContactRequest $req)
    {
        //dd($req->input('subject'));

        // $validated = $req->validate([
        //     'subject' => 'required|min:5|max:50',
        //     'message' => 'required|min:5|max:500'
        // ]);

        $contact = new Contact();
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('home')->with('success', 'Message had been sent');
    }

    public function allData()
    {
        //dd(Contact::all());
        $contact = new Contact;
        return view('messages', ['data' => $contact->all()]);
        // return view('messages', ['data' => $contact->where('subject', '=', 'Hello')->get()]);
        // return view('messages', ['data' => $contact->where('subject', '<>', 'Hello')->get()]);        
        // return view('messages', ['data' => [$contact->find(2)]]);
        // return view('messages', ['data' => [$contact->inRandomOrder()->first()]]);
        // return view('messages', ['data' => $contact->inRandomOrder()->get()]);
        // return view('messages', ['data' => $contact->orderBy('id', 'desc')->get()]);
        // return view('messages', ['data' => $contact->orderBy('id', 'asc')->get()]);
        // return view('messages', ['data' => $contact->orderBy('id', 'asc')->take(2)->get()]);
        // return view('messages', ['data' => $contact->orderBy('id', 'asc')->skip(1)->take(2)->get()]);
    }

    public function showOneMessage($id)
    {
        $contact = new Contact;
        return view('one-message', ['data' => $contact->find($id)]);
    }

    public function updateMessage($id) 
    {
        $contact = new Contact;
        return view('update-message', ['data' => $contact->find($id)]);
    }

    public function updateMessageSubmit($id, ContactRequest $req)
    {        
        $contact = Contact::find($id);
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('contact-data-one', $id)->with('success', 'Message had been edited');
    }

    public function deleteMessage($id)
    {        
        Contact::find($id)->delete();        
        return redirect()->route('contact-data')->with('success', 'Message had been deleted');
    }

}
