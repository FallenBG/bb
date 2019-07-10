@extends('layout')

@section('body')
    {{--{{$projects}}--}}

    @foreach($projects as $project)
        {{$project->title}} <br>
        {{$project->description}} <br>
    @endforeach
@endsection