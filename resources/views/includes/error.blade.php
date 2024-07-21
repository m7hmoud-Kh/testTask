@if ($errors->any())
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
                <li>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $error }}
                    </div>
                </li>
            @endforeach
        </ul>
@endif
