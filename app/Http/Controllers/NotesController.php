<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    // get all, store, update, destroy
    public function index()
    {
        // tarik data dari 'notes' table
        // guna Note model
        // guna method all()
        // wakilkan guna variable notes

        $notes = Note::all();
        return $notes;

    }
    //how does this 'store method get the Request
    public function store (Request $request){
        // get the request via Request class
        // get the input: title, content
        // validate the data, datatype is correct
        // make the Note model saves the title and content in the 'notes' table
        // return json response saying that the store operation is successful
        $validated = $request->validate([
            'title' => 'string',
            'content' => 'string',
        ]);
        // saving/storing the title and content into the database
        Note::create(validated);
        
        return response()->json([
            'success' => true,
            'data' => $note
     ]);
     
     // json response that we will get
     // {
     //   success:true,
     //   data: {
     //        title: "Buku Laravel",
     //        content: "Nanti beli buku Laravel di kedai buku"
     //    }
     // }
    }
    
}
