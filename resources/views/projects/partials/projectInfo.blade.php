<h2>Project Info</h2>
<div>
    <div class="card bbcard rounded-1 shadow bg-white">
        <div class="card-header bg-transparent border border-primary border-bottom-0 border-3">
            <h5>{{ $project->title }}</h5>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $project->description }}</p>
        </div>
        <div class="card-footer">
            <small class="text-muted float-left mt-auto">Last updated<br>{{ $project->last_updated }}</small>
            <a href="{{ $project->path() }}/update" class="btn btn-primary float-right">Update</a>
        </div>
    </div>
</div>