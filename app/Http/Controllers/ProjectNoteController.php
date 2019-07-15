<?php

namespace App\Http\Controllers;

use App\Note;
use App\Project;
use Illuminate\Http\Request;

class ProjectNoteController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Project $project)
    {
        //
//        if (auth()->user()->isNot($project->owner)) abort(403);
        $this->authorize('update', $project);

        $project->addNote([
            'body' => 'Note'
        ]);

        return redirect($project->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project, Note $note)
    {

//        if (auth()->user()->isNot($project->owner)) abort(403);
        $this->authorize('update', $project);
        $validated = \request()->validate([
            'body'      => 'required'
        ]);

        $note->update([
            'body' => $validated['body']
        ]);

        return redirect($project->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
    }
}
