<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class ContactController extends Controller
{
    public function AdminContact()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }
    public function AdminAddContact()
    {
        return view('admin.contact.create');
    }
    public function AdminStoreContact(Request $request)
    {
        Contact::insert([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('admin.contact')->with('success', 'Contact Address Inserted Successfully');
    }
    public function EditContact($id)
    {
        $contacts = Contact::find($id);
        return view('admin.contact.edit', compact('contacts'));
    }
    public function UpdateContact(Request $request, $id)
    {
        $data =  Contact::find($id)->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'updated_at' => Carbon::now()
        ]);
        return Redirect()->route('admin.contact')->with('success', 'Contact Address Updated Successfully');
    }
    public function DeleteContact($id)
    {
        $delete = Contact::find($id)->Delete();
        return Redirect()->back()->with('success', 'Contact Address Deleted Successfully');
    }
    public function Contact()
    {
        $contacts = DB::table('contacts')->first();
        return view('pages.contact', compact('contacts'));
    }
    public function ContactForm(Request $request)
    {
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);
        return Redirect()->route('contact')->with('success', 'Your message has been send Successfully');
    }
    public function AdminMessage()
    {
        $messages = ContactForm::all();
        return view('admin.contact.message', compact('messages'));
    }
}
