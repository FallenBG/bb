@extends('layouts.app')

@section('content')
    {{--{{$projects}}--}}

    {{--@foreach($projects as $project)--}}
        {{$project->title}} <br>
        {{$project->description}} <br>
    {{--@endforeach--}}

    <br><br>
    <a href="/projects">
        <button type="submit">
            Back
        </button>
    </a>
@endsection