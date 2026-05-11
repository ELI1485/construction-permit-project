<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function upload(Request $request, $permit_id)
    {
        $request->validate([
            'document' => 'required|file|max:10240|mimes:pdf,jpg,jpeg,png',
        ]);

        $file = $request->file('document');
        $path = $file->store("documents/{$permit_id}", 'public');

        Document::create([
            'permit_id' => $permit_id,
            'document_type_id' => $request->document_type_id ?? null,
            'uploaded_by' => Auth::id(),
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $path,
            'uploaded_at' => now(),
        ]);

        return back()->with('success', 'Document ajouté avec succès.');
    }
}
=======

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        //
    }
}
>>>>>>> d704913ffe19b0dc7ca77cbdca09657be3a8f3a0
