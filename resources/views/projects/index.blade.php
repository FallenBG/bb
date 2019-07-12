@extends('layouts.app')

@section('content')
    {{--{{$projects}}--}}
    <div class="flex items-center mb-1">
        <h1 class="mr-auto">{{ config('app.name', 'BirdBoard') }}</h1>
        <a href="/projects/create">
            <button type="submit">Create new Project</button>
        </a>
    </div>
    <br>
    <br>
    @forelse($projects as $project)
        <a href="{{ $project->path() }}">{{$project->title}} - {{$project->description}}</a><br>
    @empty
        No projects available.
    @endforelse
@endsection