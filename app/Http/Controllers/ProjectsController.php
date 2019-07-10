<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = Project::all();
//        dd($projects);
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
//        $validatedData = $this->validateProject();
//dd($validatedData);
        // 1: validate data and pass with instance of the object
//        $project = new Project();
//        $project->create($validatedData);

        // 2. Directly call the Project with create function ans pass the function return
        // 2. Very black box approach - to debug must deconstruct the code.
        Project::create($this->validateProject());

        // 3. Almost the same but have the data to check
//        Project::create($validatedData);



//        dd('asd');
        // 4. The longest but most readable and maintnainable code.
        // 4. Bad can be when adding new DB fields - must add here also.
//        $project = new Project();
//        $project->title         = $validatedData['title'];
//        $project->description   = $validatedData['description'];
//        $project->save();


        return redirect('/projects');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
//        dd($project);
//        $project = Project::whereId($project->id);
//        dd(request('project'));
//        $project = Project::all()->first();
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }


    public function validateProject()
    {
        return \Request::validate([
            'title'         => ['required', 'min:3'],
            'description'   => 'required'
        ]);
    }
//    public function validateProject()
//    {
//        return \Request::validate([
//            'title' => ['required', 'min:3', 'max:255'],
//            'description' => 'required'
//        ]);
//    }
}