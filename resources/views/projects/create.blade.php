@extends('layouts.app')

@section('content')
    <form action="/projects" method="post">
        @csrf
        <input type="text" name="title" id="title">
        <input type="text" name="description" id="description">
        <button type="submit">Submit</button>
        <a href="/projects">Cancel</a>
    </form>
@endsection