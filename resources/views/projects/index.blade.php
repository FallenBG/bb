@extends('layouts.app')

@section('content')
    {{--{{$projects}}--}}
    {{--<div class="container">--}}
        <div class="row">
            <div class="container-fluid">
                {{--<h1 class="float-left">{{ config('app.name', 'BirdBoard') }}</h1>--}}
                <h1 class="float-left">My Projects</h1>
                {{--<a href="/projects/create" class="float-right">--}}
                    {{--<button type="button" class="btn btn-primary">Create new Project</button>--}}
                {{--</a>--}}
                <a href="#" class="float-right">
                    {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>--}}
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createProject" data-whatever="@mdo">Create new Project</button>
                </a>
            </div>
        </div>


        <div class="row">

            <div class="col-lg-10 card-deck bbcard-deck flex-container">
                {{--<div class="container-fluid">--}}
                    @forelse($projects as $key => $project)
                        @if ($key == 0) @php $key + 1; @endphp @endif
                        @if($key % 5 == 0)
                            {{--</div>--}}
                            {{--<div class="col-lg-10 card-deck bbcard-deck">--}}
                        @endif
                        @include('projects.partials.projectDiv')
                    @empty
                        No projects available.
                    @endforelse
                {{--</div>--}}
            </div>

            <div class="col-lg-2">
                Some side info here
            </div>
        </div>
    {{--</div>--}}

    @include('projects.modals.project', [
        'action' => 'Create',
    ])

@endsection