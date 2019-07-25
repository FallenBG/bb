@extends('layouts.app')

@section('content')
    {{--{{$projects}}--}}
    <div class="row">
        <div class="col-lg-10">
            <a href="/projects">
                Home
            </a>
            / {{$project->title}}
        </div>
        <div class="col-lg-2">
            @foreach($project->members as $member)
                <img src="{{ gravatar_url($member->email) }}" alt="{{ $member->name }}'s avatar" class="rounded-circle mr-2 mb-2">
            @endforeach
            <img src="{{ gravatar_url($project->owner->email) }}" alt="{{ $project->owner->name }}'s avatar" class="rounded-circle mr-2 mb-2">
            <a href="/projects" class="float-right mt-1">
                <button type="button" class="btn btn-primary">
                    Back
                </button>
            </a>
        {{--</div>--}}
        </div>
    </div>


    <div class="row project">
        <div class="col-lg-9">
            <div>
                <h2>Tasks:</h2>
                @foreach($project->tasks as $key => $task)
                    <div id="task-0" class="card rounded-1 shadow bbtask border border-bottom-0 border-top-0 border-3 {{ $task->completed ? "border-success" : 'border-primary' }}">
                        <div class="card-body">
                            <form method="POST" action="{{ $task->path() }}">
                                @method('PATCH')
                                @csrf
                                <div class="d-flex">

                                    @if($task->completed)
                                        <div class="text-black-50 flex-fill w-100 ml-2 align-self-center">
                                            {{ $task->body }}
                                        </div>
                                        <input name="body" class="flex-fill w-100 form-control border-0" style="display: none" value="{{ $task->body }}" required>
                                        {{--<input name="body" disabled class="flex-fill w-100 form-control border-0 text-black-50" value="{{ $task->body }}">--}}
                                    @else
                                        <input name="body" class="flex-fill w-100 form-control border-0" value="{{ $task->body }}" required>
                                    @endif

                                    <div class="custom-control custom-checkbox mr-sm-2 mb-sm-2 flex-fill">
                                        <input name="completed" id="completed-{{ $task->id }}" type="checkbox" {{ $task->completed ? "checked" : '' }} class=" custom-control-input" onchange="this.form.submit()">
                                        <label class="custom-control-label" for="completed-{{ $task->id }}"></label>
                                    </div>
                                </div>
                            </form>
                            {{--<div class="btn-group float-right" role="group">--}}
                                {{--<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                    {{--Actions--}}
                                {{--</button>--}}
                                {{--<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">--}}
                                    {{--<a class="dropdown-item" href="#">Edit</a>--}}
                                    {{--<a class="dropdown-item" href="#">Close</a>--}}
                                    {{--<a class="dropdown-item" href="#">Assign</a>--}}
                                    {{--<a class="dropdown-item" href="#">Priority</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                @endforeach

                <div id="task-0" class="card rounded-1 shadow bbtask">
                    <div class="card-body">
                        <form action="{{ $project->path() }}/tasks" method="post">
                            @csrf
                            <input placeholder="Add Task:" class="wflex-fill w-100 form-control border-0" name="body" required>
                        </form>

                    </div>
                </div>

            </div>

            <div>
                <h2>Notes:</h2>
                <div id="notes" class="card rounded-1 shadow bbtask">
                    <div class="card-body">
                        @if (isset($project->note->body))
                            <form action="{{ $project->path() }}/note/{{ $project->note->id ?? ''}}" method="post">
                                @method('PATCH')
                                @csrf
                                <textarea class="wflex-fill w-100 form-control border-0" id="body" name="body" rows="10">{{ $project->note->body }}</textarea>
                                <button type="submit" class="btn btn-primary mt-2 float-right">Submit</button>

                            </form>
                        @else
                            <a href='{{ $project->path() }}/note'><button type='button' class='btn btn-primary'>Create</button></a>
                        @endif
                    </div>
                </div>
            </div>

            @include('projects.partials.errors', [
                'class' => ''
            ])
        </div>

        <div class="col-lg-3">
            @include('projects.partials.projectInfo')

            @include('projects.partials.activity')

            {{--@if( $project->owner == auth()->user())--}}
                {{--@include('projects.partials.invite')--}}
            {{--@endif--}}
            @can('manage', $project)
                @include('projects.partials.invite')
            @endcan
        </div>

    </div>

@endsection