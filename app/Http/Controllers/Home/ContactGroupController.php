<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactGroup;

class ContactGroupController extends Controller
{
    public function AllContactGroup(){
        $contactgroup = ContactGroup::latest()->get();
        return view('admin.contact_group.all_contact_group', compact('contactgroup'));
    }//End Method

    public function AddContactGroup(){
        return view('admin.contact_group.add_contact_group');
    }//End Method

    public function StoreContactGroup(Request $request){
        $request->validate([
            'contact_group' => 'required',
        ],[
            'contact_group.required' =>'Contact Group is Required',
        ]);

        ContactGroup::insert([
            'contact_group' => $request->contact_group,
        ]);

        $notification = array(
            'message' =>'Contact Group Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.contact.group')->with($notification);
    }//End Method

    public function EditContactGroup($id){
        $contactgroup = ContactGroup::findOrFail($id);
        return view('admin.contact_group.contact_group_edit', compact('contactgroup'));
    }//End Method

    public function UpdateContactGroup(Request $request){
        $contactgroup_id = $request->id;
        ContactGroup::findOrFail($contactgroup_id)->update([
            'contact_group' => $request->contact_group,
        ]);

        $notification = array(
            'message' =>'Contact Group Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.contact.group')->with($notification);
    }//End Method


    public function DeleteContactGroup($id){
        ContactGroup::findOrFail($id)->delete();
        $notification = array(
            'message' =>'Contact Group Deleted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.contact.group')->with($notification);
    }//End Method
}
