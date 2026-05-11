<?php

namespace App\Http\Controllers;

use App\Models\Archive;
<<<<<<< HEAD

class ArchiveController extends Controller
{
    public function index()
    {
        $archives = Archive::with('permit.citizen', 'permit.permitType', 'archivedBy')
                          ->latest()
                          ->paginate(15);

        return view('archives.index', compact('archives'));
    }
}
=======
use Illuminate\Http\Request;

class ArchiveController extends Controller
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
    public function show(Archive $archive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Archive $archive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Archive $archive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Archive $archive)
    {
        //
    }
}
>>>>>>> d704913ffe19b0dc7ca77cbdca09657be3a8f3a0
