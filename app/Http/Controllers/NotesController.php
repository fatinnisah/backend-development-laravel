<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;


class NotesController extends Controller
{
   // get all, store, update, destroy
    public function index()
    {
    //tarik data daripada 'notes' table
    //guna Note model
    //guna method all ()
    //wakilkan guna variable $notes
    //return as json response
        $notes = Note::all();
        return response()->json($notes);
    }

    //how does this 'store' method work?
    public function store(Request $request)
    {
    //get the request via Request class
    //get the input: title, content
    //validate the data, datatype is correct
    //make the Note model saves the title and contect in the 'notes' table
    //return json response saying that the store operation is successsful
    $validated = $request->validate([
            'title' => 'string',
            'content' => 'string',
        ]);
    //saving/storing the title and content into the database
        
        $note = Note::create($validated);
        return response()->json([
        'success'=>true,
        'data'=>$note
        ], 201);
    

    //json response that we will get
    // {
    // "success": true,
    // "data": { ... }}
    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'string',
            'content' => 'string',
        ]);

        $note -> update($validated);

        return response()->json([
        'success'=>true,
        'data'=>$note
        ], 200);

    }

    public function destroy($id)
    {
        $note = Note::find($id);

        if (!$note) {
            return response()->json(['message' => 'Note not found'], 404);
        }

        $note->delete();

        return response()->json(['message' => 'Note deleted']);
    }
}
