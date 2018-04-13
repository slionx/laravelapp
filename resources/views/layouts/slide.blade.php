111111
@if(Cache::get('welcomeType') == 'slide')
    @if(isset($home_bg_images) && $home_bg_images)
        <div id="home-cover-slideshow">
            @foreach ($home_bg_images as $image)
                <div class="home-cover-img" data-src="{{ asset('storage') }}/{{ $image }}"></div>
            @endforeach
        </div>
    @endif
@endif