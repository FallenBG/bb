<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }//end index()


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }//end create()


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Project $project)
    {
        $this->authorize('update', $project);

        // dd('asd');
        $validated = \request()->validate(
            ['body' => 'required|min:3']
        );
        // dd($validated)  ;
        $project->addTask(
            [
                'body'    => $validated['body'],
                'user_id' => auth()->id(),
            ]
        );
        return redirect($project->path());

    }//end store()


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }//end show()


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }//end edit()


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Project $project, Task $task)
    {

        // dd(\request('body'));
        // if (auth()->user()->isNot($project->owner)) abort(403);
//        $this->authorize('update', $project);
        $this->authorize( $project); // can be used withouth the "update" if the action and the policy have the same name

        $validated = \request()->validate(
            [
                'body'      => 'required|min:3'
            ]
        );

        $task->update($validated);

        \request('completed') ? $task->complete() : $task->incomplete();

        return redirect($project->path());

    }//end update()


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }//end destroy()


}//end class
