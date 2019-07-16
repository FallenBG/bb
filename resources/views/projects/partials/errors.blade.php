@if( $errors->any())
    <div>
        @foreach($errors->all() as $error)
            <div class="alert alert-danger {{ $class }}" role="alert">
                <strong>Oh snap!</strong> {{ $error }}
            </div>
        @endforeach
    </div>
@endif