@if (isset($errors) && count($errors) > 0)
    <div class="alert-warning">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="error-text">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::get('success', false))
    <?php $data = Session::get('success'); ?>
    @if (is_array($data))
        @foreach ($data as $message)
            <div class="alert-warning">
                <li class="error-text">>{{ $message }}</li>
            </div>
        @endforeach
    @else
        <div class="alert-success">
            {{ $message }}
        </div>
    @endif
@endif
