<?php

namespace App\Http\Controllers;

use App\Post;
use App\Document;


class DocumentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post)
    {
        $this->validate(request(),[
            'document' => 'required|mimes:pdf'
        ]);

        $post->documents()->create([
            'title' => request()->file('document')->getClientOriginalName(),
            'url'=> request()->file('document')->store('posts','public'),
        ]);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();
        return back()->with('info','Documento eliminado');
    }
}
