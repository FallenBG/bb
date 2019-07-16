@extends('layouts.app')

@section('content')
    <div class="row align-items-center justify-content-center">
        <h1>Update project</h1>
    </div>
    <div class="row align-items-center justify-content-center">

        <form action="/projects/{{ $project->id }}/update" method="post" class="w-50">
            @method('PATCH')
            @csrf
            @include('projects.partials.form', [
                'buttonText' => 'Update'
            ])
        </form>
    </div>
@endsection