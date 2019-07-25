<div>
    <div class="card bbcard rounded-1 shadow bg-white">
        <div class="card-header bg-transparent border border-primary border-bottom-0 border-3">
            <h5>Invite User <t></t>o the project</h5>
        </div>
        <form action="{{ $project->path() }}/invitations" method="post" >
            @csrf
            <div class="card-body ">
                <p class="card-text">
                    <input id="email" name="email" placeholder="User E-mail" class="w-100" required>
                </p>

                <button type="submit" class="btn btn-primary mb-2">Invite</button>

                @include('projects.partials.errors', [
                    'class' => 'w-100',
                    'bag'   => 'invitations'
                ])
            </div>

        </form>
    </div>
</div>

