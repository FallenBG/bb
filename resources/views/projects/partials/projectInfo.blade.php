<h2>Project Info</h2>
<div>
    <div class="card bbcard rounded-1 shadow bg-white">
        <div class="card-header bg-transparent border border-primary border-bottom-0 border-3">
            <h5>{{ $project->title }}</h5>
        </div>
        <div class="card-body">
            <p class="card-text">{{ $project->description }}</p>

        </div>
        {{--<a href="{{ $project->path() }}/invitations" class="btn btn-primary float-right float-right">Invite</a>--}}
        <div class="card-footer">
            <form method="POST" action="{{ $project->path() }}" >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-primary float-right">Delete</button>
            </form>
            <small class="text-muted float-left mt-auto">Last updated<br>{{ $project->last_updated }}</small>
            <a href="{{ $project->path() }}/update" class="btn btn-primary float-right mr-2">Update</a>
        </div>
    </div>
</div>