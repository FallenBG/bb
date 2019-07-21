<div>
    <div class="card bbcard rounded-1 shadow bg-white">
        <div class="card-header bg-transparent border border-primary border-bottom-0 border-3">
            <h5>Latest Activities</h5>
        </div>
        <div class="card-body">
            @foreach($project->activity->sortByDesc('updated_at') as $activity)
                <p class="card-text {{ $loop->last ? 'mb-0' : 'mb-1' }}">
                    @include("projects.activity.{$activity->description}")
                    <span class="text-secondary">{{ $activity->created_at->diffForHumans() }}</span>
{{--                    @include("projects.activity." . $activity->description)--}}
                </p>
            @endforeach
        </div>
    </div>
</div>