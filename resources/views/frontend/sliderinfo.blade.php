@php
    $insInfo = \App\Models\InstituteDetails::first();
@endphp
<div class="row">
    <div class="col-12">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                @if($sliderData->count()>0)
                @php
                    $sl = 1;
                @endphp
                @foreach($sliderData as $slider)
                <div class="carousel-item @if($sl == 1) active @endif">
                    <img src="{{ env('APP_URL') }}/public/upload/image/webHomepage/{{$slider->avatar}}" class="d-block w-100" style="height:450px" alt="..." />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $slider->headLine }}</h5>
                        <p>{{ $slider->detail }}</p>
                    </div>
                </div>
                @php
                    $sl++;
                @endphp
                @endforeach
                @else
                <div class="carousel-item active">
                    <img src="{{ env('APP_URL') }}/public/img/slider/slider1.jpg" class="d-block w-100" style="height:450px" alt="..." />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ env('APP_URL') }}/public/img/slider/slider2.jpg" class="d-block w-100" alt="..." />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ env('APP_URL') }}/public/img/slider/slider3.jpg" class="d-block w-100" alt="..." />
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
                @endif
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
        <!-- Original Leatest Notice block moved under slider -->
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-12 mx-auto mb-4">
                    <h2>Leatest Notice</h2>
                    @if(isset($noticeBoard) && $noticeBoard->count()>0)
                        @foreach($noticeBoard as $ntc)
                            <div class="bg-success p-2 notice-box my-2">
                                <div class="row align-items-center">
                                    <div class="col-2 mx-auto date-box"><span><i class="fa-thin fa-calendar"></i></span> {{ optional($ntc->created_at)->format('d M Y') }}</div>
                                    <div class="col-7 mx-auto">{{ $ntc->headline }}</div>
                                    <div class="col-3 mx-auto text-end">
                                        @php($__nb2 = ($ntc->body ?? $ntc->details ?? $ntc->description ?? ''))
                                        <button class="btn btn-light btn-sm notice-view"
                                            data-title="{{ $ntc->headline }}"
                                            data-body64="{{ base64_encode($__nb2) }}"
                                            data-date="{{ optional($ntc->created_at)->format('d M Y') }}"
                                            data-attachment="{{ !empty($ntc->attachment) ? env('APP_URL').'/public/'.$ntc->attachment : '' }}"
                                            data-attachtype="{{ !empty($ntc->attachment) ? strtolower(pathinfo($ntc->attachment, PATHINFO_EXTENSION)) : '' }}">
                                            <i class="fa-regular fa-eye"></i> View
                                        </button>
                                        <a class="btn btn-outline-light btn-sm {{ empty($ntc->attachment) ? 'disabled' : '' }}" target="_blank"
                                           href="{{ !empty($ntc->attachment) ? env('APP_URL').'/public/'.$ntc->attachment : '#' }}"
                                           aria-disabled="{{ empty($ntc->attachment) ? 'true' : 'false' }}">
                                            <i class="fa-light fa-down-to-bracket"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="bg-success p-2 notice-box my-2">
                            <div class="row align-items-center">
                                <div class="col-2 mx-auto date-box"><span><i class="fa-thin fa-calendar"></i></span> 20th Aug</div>
                                <div class="col-8 mx-auto">Loremp ipsom doller site is a common text for web development industry. Use it free for demo content</div>
                                <div class="col-1 mx-auto download"><i class="fa-light fa-down-to-bracket"></i></div>
                            </div>
                        </div>
                        <div class="bg-success p-2 notice-box my-2">
                            <div class="row align-items-center">
                                <div class="col-2 mx-auto date-box"><span><i class="fa-thin fa-calendar"></i></span> 20th Aug</div>
                                <div class="col-8 mx-auto">Loremp ipsom doller site is a common text for web development industry. Use it free for demo content</div>
                                <div class="col-1 mx-auto download"><i class="fa-light fa-down-to-bracket"></i></div>
                            </div>
                        </div>
                        <div class="bg-success p-2 notice-box my-2">
                            <div class="row align-items-center">
                                <div class="col-2 mx-auto date-box"><span><i class="fa-thin fa-calendar"></i></span> 20th Aug</div>
                                <div class="col-8 mx-auto">Loremp ipsom doller site is a common text for web development industry. Use it free for demo content</div>
                                <div class="col-1 mx-auto download"><i class="fa-light fa-down-to-bracket"></i></div>
                            </div>
                        </div>
                    @endif
                    <a href="{{ route('allNotices') }}" class="btn btn-primary rounded-0">All Notice</a>
                </div>
            </div>
        </div>
