<?php

namespace App\Http\Controllers;

use App\Models\Contact;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id ,$type)
    {
        // var_dump($id);
        // var_dump($type);
        return view("contacts.create" ,["id"=>$id ,"type"=>$type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,$id ,$type)
    {
        $request->validate([
            "contact" =>"required",
            "contact_type_id"=>"required|exists:contact_types,id"
        ]);

        $ct = new Contact();
        $ct->contact =$request->contact;
        $ct->contact_type_id =$request->contact_type_id;
   
        $ct->account_id =$id;
        
        if($type=="user")
            $ct->account_type  ="App\Models\User";
        else if($type=="supplier")
            $ct->account_type  ="App\Models\Supplier";

        $ct->save();
        // return redirect()->back();

        if($type=="user") return redirect()->route("user.index");
        if($type=="supplier") return redirect()->route("supplier.index");


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
