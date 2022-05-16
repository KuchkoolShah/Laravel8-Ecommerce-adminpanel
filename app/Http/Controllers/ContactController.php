<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $contact = contact::all();
        return view('admin.contact_us.index',compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.contact_us.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                    $contact = new contact;
           
            $contact->name = $request->name;
             $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->description= $request->description;
            
            $saved = $contact->save();
          //  dd($saved);
            if($saved)
            return redirect()->route('admin.contact.index')->with('message','Contact add Successfully!');
        else
            return back()->with('message', 'Error Updating contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $contact = contact::find($id);
        return view('admin.contact_us.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contact $contact)
    {
        
           $contact->name = $request->name;
             $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->description= $request->description;
            
            $saved = $contact->save();
            if($saved)
             return redirect()->route('admin.contact.index')->with('message','Contact add Successfully!');
        else
            return back()->with('message', 'Error Updating contact');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        contact::where('id',$id)->delete();
         return redirect()->route('admin.contact.index')->with('message','Contact add Successfully!'); //
    }
}
