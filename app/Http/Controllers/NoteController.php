<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notes;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Notes::all();
        return response()->json($notes);
    }

    public function store(Request $request)
    {
        $note = new Notes;
        $note->title = $request->title;
        $note->content = $request->content;
        $note->save();
        return response()->json([
            "message" => "Note Added."
        ], 201);
    }

    public function show($id)
    {
        $note = Notes::find($id);
        if(!empty($note))
        {
            return response()->json($note);
        }
        else
        {
            return response()->json([
                "message" => "Note not found"
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        if (Notes::where('id', $id)->exists()) {
            $note = Notes::find($id);
            $note->title = is_null($request->title) ? $note->title : $request->title;
            $note->content = is_null($request->content) ? $note->content : $request->content;
            $note->save();
            return response()->json([
                "message" => "Note Updated."
            ], 204);
        } else {
            return response()->json([
                "message" => "Note Not Found."
            ], 404);
        }
    }

    public function destroy($id)
    {
        if(Notes::where('id', $id)->exists()) {
            $note = Notes::find($id);
            $note->delete();

            return response()->json([
                "message" => "records deleted."
            ], 202);
        } else {
            return response()->json([
                "message" => "book not found."
            ], 404);
        }
    }
}
