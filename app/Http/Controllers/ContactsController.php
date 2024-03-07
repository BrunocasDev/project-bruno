<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        return view('pages.list-contacts', compact('contacts'));
    }

    public function createView()
    {
        return view('pages-form.form-contact');
    }

    public function create(ContactRequest $request)
    {
        Contact::create($request->all());

        Session::flash('success', 'Contact created successfully!');
        return redirect()->route('contacts');
    }

    public function view(int $idContact)
    {
        $contactInfo = Contact::find($idContact);

        return view('pages.info-contact', compact('contactInfo'));
    }

    public function edit(int $idContact)
    {
        $contact = Contact::find($idContact);

        return view('pages-form.form-contact', compact('contact'));
    }

    public function update(int $idContact, ContactRequest $request)
    {
        Contact::find($idContact)->update($request->all());

        Session::flash('success', 'Contact updated successfully!');
        return redirect()->route('contacts');
    }

    public function delete(int $idContact)
    {
        Contact::find($idContact)->delete();

        Session::flash('success', 'Contact deleted successfully!');
        return redirect()->route('contacts');
    }
}
