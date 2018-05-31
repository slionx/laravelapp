@if (session('success'))
    <div class="m-alert m-alert--icon alert alert-success" role="alert">
        <div class="m-alert__icon">
            <i class="la la-check"></i>
        </div>
        <div class="m-alert__text">
            {{ session('success') }}
        </div>
        <div class="m-alert__close">
            <button type="button" class="close" data-close="alert" aria-label="Close">
            </button>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="m-alert m-alert--icon alert alert-danger" role="alert">
        <div class="m-alert__icon">
            <i class="la la-warning"></i>
        </div>
        <div class="m-alert__text">
            {{ session('error') }}
        </div>
        <div class="m-alert__close">
            <button type="button" class="close" data-close="alert" aria-label="Close">
            </button>
        </div>
    </div>
@endif

@if (count($errors) > 0)
    <div class="m-alert m-alert--icon alert alert-danger" role="alert">
        <div class="m-alert__icon">
            <i class="la la-warning"></i>
        </div>
        <div class="m-alert__text">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <div class="m-alert__close">
            <button type="button" class="close" data-close="alert" aria-label="Close">
            </button>
        </div>
    </div>
@endif