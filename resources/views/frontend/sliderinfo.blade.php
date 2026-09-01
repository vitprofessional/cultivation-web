@php
    $insInfo = \App\Models\InstituteDetails::first();
    $config = \App\Models\ServerConfig::first();
    $instituteName = !empty($config?->instituteName) ? $config->instituteName : 'Jahanara Ayub Academy';
@endphp
<div class="row hero-section">
    <div class="col-12">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-touch="true">
            @if($sliderData->count() > 1)
            <div class="carousel-indicators">
                @foreach($sliderData as $slider)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}" @if($loop->first) aria-current="true" @endif aria-label="Slide {{ $loop->iteration }}"></button>
                @endforeach
            </div>
            @endif
            <div class="carousel-inner">
                @if($sliderData->count()>0)
                @php
                    $sl = 1;
                @endphp
                @foreach($sliderData as $slider)
                <div class="carousel-item @if($sl == 1) active @endif">
                    <img src="{{ asset('public/upload/image/webHomepage/' . rawurlencode(basename($slider->avatar))) }}" class="d-block w-100" alt="{{ $slider->headLine ?: $instituteName }}" />
                    <div class="carousel-caption">
                        <h1 class="hero-title">{{ $instituteName }}</h1>
                        @if(!empty($slider->detail))
                            <p class="hero-copy">{{ $slider->detail }}</p>
                        @endif
                        <div class="hero-actions">
                            <a href="{{ route('institutePage') }}" class="btn btn-primary">Explore Institute</a>
                            <a href="{{ route('internalResult') }}" class="btn btn-outline-light">View Result</a>
                        </div>
                    </div>
                </div>
                @php
                    $sl++;
                @endphp
                @endforeach
                @else
                <div class="carousel-item active">
                    <img src="{{ asset('public/img/slider/slider1.jpg') }}" class="d-block w-100" alt="Institute campus" />
                    <div class="carousel-caption">
                        <h1 class="hero-title">{{ $instituteName }}</h1>
                        <p class="hero-copy">Institute information, notices, academic services, and results in one place.</p>
                        <div class="hero-actions">
                            <a href="{{ route('institutePage') }}" class="btn btn-primary">Explore Institute</a>
                            <a href="{{ route('internalResult') }}" class="btn btn-outline-light">View Result</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            @if($sliderData->count() > 1)
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            @endif
        </div>
    </div>
</div>
