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
     */
    public function store(Project $project)
    {
        //
        // dd('anaaa');
        if (auth()->user()->isNot($project->owner)) {
            abort(403);
        }

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
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project, Task $task)
    {
        // dd(\request('body'));
        // if (auth()->user()->isNot($project->owner)) abort(403);
        $this->authorize('update', $project);
        $validated = \request()->validate(
            [
                'body'      => 'required|min:3',
            // 'completed' => 'boolean'
            ]
        );
        // if (\request('completed')) {
        // $completed = \request('completed');
        // }
        // dd($completed)  ;
        $task->update(
            [
                'body' => $validated['body'],
            ]
        );

        if (\request()->has('completed')) {
            $task->complete();
        }

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
