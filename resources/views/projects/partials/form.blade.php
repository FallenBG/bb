<div class="form-group">
    <label for="title">Project Title</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Project Title" value="{{ $project->title }}" required>
</div>
<div class="form-group">
    <label for="description">Project Description</label>
    <textarea id="description" name="description" placeholder="Project Description" class="w-100" rows="10" required>{{ $project->description }}</textarea>
</div>
<div class="float-right mt-1">
    <button type="submit" class="btn btn-primary mb-2">{{ $buttonText }}</button>
    <a href="/projects">Cancel</a>
</div>

@include('projects.partials.errors', [
    'class' => 'w-75'
])