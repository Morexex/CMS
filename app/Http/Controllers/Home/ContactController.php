<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactGroup;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    public function AllContact(){
        $contacts = Contact::latest()->get();
        return view('admin.contacts.contacts_all', compact('contacts'));
    }//End Method

    public function AddContact(){
        $groups = ContactGroup::orderBy('contact_group','ASC')->get();
        return view('admin.contacts.contacts_add', compact('groups'));
    }//End Method

    public function StoreContact(Request $request){

        Contact::insert([
            'contact_group_id' => $request->contact_group_id,
            'contact' => $request->contact,
            'contact_description' => $request->contact_description,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' =>'Contact Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.contact')->with($notification);
    }//End Method

    public function EditContact($id){
        $contacts = Contact::findOrFail($id);
        $groups = ContactGroup::orderBy('contact_group','ASC')->get();
        return view('admin.contacts.edit_contacts', compact('contacts','groups'));
    }//End Method

    public function DeleteContact($id){
        $contact = Contact::findOrFail($id);

        Contact::findOrFail($id)->delete();
        $notification = array(
            'message' =>'Contact Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.contact')->with($notification);
    }//End Method

    public function UpdateContact(Request $request){
        $contact_id = $request->id;

            Contact::findOrFail($contact_id)->update([
                'contact_group_id' => $request->contact_group_id,
                'contact' => $request->contact,
                'contact_description' => $request->contact_description,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' =>'Contact Updated Successfully',
                'alert-type' => 'success',
            );

            return redirect()->route('all.contact')->with($notification);


    }//End Method
}
