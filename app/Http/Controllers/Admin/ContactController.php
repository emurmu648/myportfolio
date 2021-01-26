<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\contact;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    public function sendContact(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3|max:30',
            'email'=>'required|unique:contacts',
            'phone'=>'required|min:11|max:14|regex:/[0-9]/|unique:contacts',
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        Toastr::success('Your info sent successfully', 'success', ['closeButton'=>true, 'progressBar'=>true]);
        return redirect()->back();

    }

    public function viewContact(){
        $contacts =Contact::latest()->paginate(5);
        return view('admin.contact.view-contact',[
            'contacts'=>$contacts
        ]);
    }

    public function viewContactDetails($id){
        $contact = Contact::find($id);
        return view('admin.contact.view-contact-details',[
            'contact'=>$contact
        ]);
    }

    public function deleteContact($id){
        $contact = Contact::find($id);
        $contact->delete();

        Toastr::success('Client info deleted successfully', 'success', ['closeButton'=>true, 'progressBar'=>true]);
        return redirect()->back();
    }
}
