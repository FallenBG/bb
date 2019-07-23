<div class="card bbcard rounded-1 shadow bg-white">
    <div class="card-header bg-transparent border border-primary border-bottom-0 border-3">
        <h5>
            <a href="{{ $project->path() }}">{{$project->title}}</a>
            <form method="POST" action="{{ $project->path() }}" class="float-right">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-primary float-right">Delete</button>
            </form>
        </h5>

    </div>
    <div class="card-body">
        <p class="card-text">{{ Str::limit($project->description, 100)}}</p>
    </div>
    <div class="card-footer">

        <small class="text-muted float-left">Last updated {{ $project->last_updated->diffForHumans() }}</small>
        <a href="{{ $project->path() }}" class="btn btn-primary float-right">Go</a>
    </div>
</div>