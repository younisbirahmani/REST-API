<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ContactController extends Controller
{
   public function index()
   {
    $contact = Contact::select('name','address','mobile')->get();
    return response()->json([
        'status' =>200,
        'contact' =>$contact,
    ]);    
}

    public function store(Request $request)
    {
        $validator = Validator::make( $request->all(),[
            'name' => 'required|min:3|max:191',
            'address' => 'required|max:191',
            'mobile' => 'required|min:10|max:191',
        ]);
    
    if($validator->fails())
    {
        return response()->json([
            'status' =>422,
            'message' =>$validator->messages()
        ], 422);
    }
     else
     {
     $contact = new Contact;
     $contact ->name = $request->name;
     $contact ->address = $request->address;
     $contact ->mobile = $request->mobile;
     $contact ->save();
     
     return response()->json([
        'status' =>200,
        'message' => 'contact created successfully'
    ], 200);
     }
    
     
}

public function show($id)
{
    $contact = Contact::find($id);
    return response()->json([
        'status'=>200,
        'contact'=>$contact
    ]);

}

}



