<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentUploadRequest;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function upload(DocumentUploadRequest $request, $permit_id)
    {

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
