<?php

namespace App\Http\Controllers;
use App\Models\contact;
use Illuminate\Http\Request;

class UseContactController extends Controller
{
     public function store(Request $request)
    {
       
            $contact = new contact;
           
            $contact->name = $request->name;
             $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->description= $request->description;
            
            $saved = $contact->save();
            if($saved)
            return back()->with('message','contact add Successfully!');
        else
            return back()->with('message', 'Error Updating contact');
    }


}
