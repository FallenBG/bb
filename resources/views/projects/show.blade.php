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
            <a href="/projects" class="float-right">
                <button type="button" class="btn btn-primary">
                    Back
                </button>
            </a>
        {{--</div>--}}
        </div>
    </div>



    <div class="row project">
        <div class="col-lg-10">
            <div>
                <h2>Tasks:</h2>
                @foreach($project->tasks as $key => $task)
                    <div id="task-0" class="card rounded-1 shadow bbtask">
                        <div class="card-body">
                            {{ $task->body }}
                        </div>
                    </div>
                @endforeach

            </div>

            <div>
                <h2>Notes:</h2>
                <div id="notes" class="card rounded-1 shadow bbtask">
                    <div class="card-body">
                        Notes he
                        dsaklnfsd
                        asfdasfadkl;f <br>
                        sdfdsf<br>
                        sdasdf<br>
                        asdfafas
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2">
            <h2>Project Info</h2>
            <div>
                <div class="card bbcard rounded-1 shadow bg-white">
                    <div class="card-header bg-transparent border border-primary border-bottom-0 border-3">
                        <h5>{{ $project->title }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $project->description }}</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted float-center">Last updated<br>{{ $project->last_updated }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection