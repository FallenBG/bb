@extends('layouts.app')

@section('content')



    <form action="/projects" method="post">
        @csrf
        <div class="form-row align-items-center">
            <div class="col-sm-3 my-1">
                <label class="sr-only" for="inlineFormInput">title</label>
                <input type="text" class="form-control mb-2" id="title" name="title" placeholder="Title">
            </div>
            <div class="col-sm-3 my-1o">
                <label class="sr-only" for="inlineFormInputGroup">description</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                </div>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                <a href="/projects">Cancel</a>
            </div>
        </div>
    </form>
@endsection