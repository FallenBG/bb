@extends('layout')

@section('body')
    <form action="/projects" method="post">
        @csrf
        <input type="text" name="title" id="title">
        <input type="text" name="description" id="description">
        <button type="submit">Submit</button>
    </form>
@endsection