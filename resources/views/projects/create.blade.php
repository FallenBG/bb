@extends('layouts.app')

@section('content')
    <div class="row align-items-center justify-content-center">
        <h1>Create project</h1>
    </div>
    <div class="row align-items-center justify-content-center">
        <form action="/projects{{ isset($project->id) ? '/' . $project->id . '/update' : '' }}" method="post" class="w-50">
            @csrf
            @include('projects.partials.form', [
                'project' => new App\Project,
                'buttonText' => 'Create'
            ])
        </form>
    </div>
@endsection