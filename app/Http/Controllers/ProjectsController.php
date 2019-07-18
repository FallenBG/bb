<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProjectRequest;
use App\Project;
use Carbon\Carbon;
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
        $projects = auth()->user()->projects;

//        $projects = auth()->user()->projects()->orderBy('updated_at', 'desc')->get();

//        foreach ($projects as $project) {
//            $project->last_updated = Carbon::parse($project->updated_at);
//        }
        $projects->each(function ($item) {
            $item['last_updated'] = Carbon::parse($item->updated_at);
        });

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
//dd('waaaaaaa');
//        dd(\request());
        $project = Project::create($this->validateProject());
        $project->note()->create(['body' => 'new note']);

        // 3. Almost the same but have the data to check
//        Project::create($validatedData);



//        dd('asd');
        // 4. The longest but most readable and maintnainable code.
        // 4. Bad can be when adding new DB fields - must add here also.
//        $project = new Project();
//        $project->title         = $validatedData['title'];
//        $project->description   = $validatedData['description'];
//        $project->save();


        return redirect($project->path());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project $project
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Project $project)
    {
//        dd($project);
//        $project = Project::whereId($project->id);
//        dd(request('project'));
//        $project = Project::all()->first();


//        abort_if($project->owner_id != auth()->id(), 403);

//        if (auth()->user()->isNot($project->owner)) abort(403);
        $this->authorize('update', $project);

//        dd($project);
        $project->last_updated = Carbon::parse($project->updated_at);
//        dd('wwaa2312312');
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
        return view('projects.update', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Project $project
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

//        Use Request
//        $this->authorize('update', $project);
//        $project->update($this->validateProject());

        // Use custom form validator for authorization and validation UpdateProjectRequest
        $project->update($request->validated());

        return redirect($project->path());
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


    protected function validateProject()
    {
        $attributes = \Request::validate([
            // TODO: Read more about sometimes validation
//            'title'         => ['sometimes|required', 'min:3'],
            'title'         => ['required', 'min:3'],
            'description'   => ['max:2500', 'min:3']
        ]);

        $attributes['owner_id'] = auth()->id();

        return $attributes;
    }
}
