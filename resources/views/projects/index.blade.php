@extends('layout')

@section('body')
    {{--{{$projects}}--}}

    @forelse($projects as $project)
        <a href="{{ $project->path() }}">{{$project->title}} - {{$project->description}}</a><br>
    @empty
        No projects available.
    @endforelse
@endsection