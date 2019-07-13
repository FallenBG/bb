@extends('layouts.app')

@section('content')
    {{--{{$projects}}--}}

    {{--<div class="container-fluid">--}}
    {{--@foreach($projects as $project)--}}
        {{$project->title}} <br>
        {{$project->description}}
    {{--@endforeach--}}

        <a href="/projects" class="float-right">
            <button type="button" class="btn btn-primary">
                Back
            </button>
        </a>
    {{--</div>--}}
@endsection