<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contacts() {
        $contacts = Contact::all();

        return response()->json(
            [
                'contacts' => $contacts,
                'message' => 'Contact',
                'code' => 200
            ]
        );
    }

    public function saveContact(Request $request) {
        $contacts = new Contact();

        $contacts->name = $request->name;
        $contacts->email = $request->email;
        $contacts->designation = $request->designation;
        $contacts->contact_no = $request->contact_no;
        $contacts->save();

        return response()->json(
            [
                'contacts' => $contacts,
                'message' => 'Contact Created Successfully',
                'code' => 200
            ]
        );
    }

    public function getContactByID($id) {
        $contact = Contact::find($id);

        return response()->json($contact);
    }

    public function updateContact($id, Request $request) {
        $contact = Contact::where('id', $id)->first();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->designation = $request->designation;
        $contact->contact_no = $request->contact_no;
        $contact->update();

        return response()->json(
            [
                'message' => 'Contact Updated Successfully',
                'code' => 200
            ]
        );
    }

    public function deleteContact($id) {
        $contacts = Contact::find($id);

        if($contacts) {
            $contacts->delete();
        
            return response()->json(
                [
                    'message' => 'Contact Delete Successfully',
                    'code' => 200
                ]
            );
        } else {
            return response()->json(
                [
                    'message' => 'Contact with id '.$id.' dose not exist',
                ]
            );
        }
    }
}
