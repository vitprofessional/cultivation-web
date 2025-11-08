@extends('frontend.include')
@section('fronttitle')
Enter to learn & Leave to serve
@endsection

@section('sliderninfo')
    @include('frontend.sliderinfo')
@endsection

@section('sideinfo')
    @include('frontend.sideInfo')
@endsection

@section('frontcontent')
<div class="col-3 mx-auto d-none d-md-block">
    @yield('sideinfo')
</div>

<div class="col-11 d-block d-md-none mx-auto">
    @include('frontend.mobileSidebox')   
</div>

<div class="col-11 col-md-9 mx-auto">
    <div class="rowalign-items-center">
        <div class="col-12 mx-auto row">
            <div class="col-3 col-md-1 bg-success np-1 ml-2">Notice</div>
            <div class="col-9 col-md-11 latest-news np-1">
                <marquee>
                    <ul>
                        @if($noticeBoard->count()>0)
                        @foreach($noticeBoard as $notice)
                        <li>
                            @php($__nb = ($notice->body ?? $notice->details ?? $notice->description ?? ''))
                            <a href="#"
                               class="notice-view"
                               data-title="{{ $notice->headline }}"
                               data-body64="{{ base64_encode($__nb) }}"
                               data-date="{{ optional($notice->created_at)->format('d M Y') }}"
                               data-attachment="{{ !empty($notice->attachment) ? env('APP_URL').'/public/'.$notice->attachment : '' }}"
                               data-attachtype="{{ !empty($notice->attachment) ? strtolower(pathinfo($notice->attachment, PATHINFO_EXTENSION)) : '' }}">
                                <i class="fa-thin fa-hand-point-right"></i>{{ $notice->headline }}
                            </a>
                        </li>
                        @endforeach
                        @else
                        <li>
                            <a href="#"><i class="fa-thin fa-hand-point-right"></i> Lorem ipsom text notice here. </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-thin fa-hand-point-right"></i> Another lorem ipsom text notice here. </a>
                        </li>
                        @endif
                    </ul>
                </marquee>
            </div>
        </div>
        @if($insData)
        <div class="col-12 mx-auto my-2">
            <h2>{{$insData->insHeadline}}</h2>
            <p class="text-justify">{{ \Illuminate\Support\Str::limit($insData->insDetails, 750, '...') }} <a href="#">Readmore</a></p>
        </div>
        <!-- mission & vission -->
        <div class="col-12 mx-auto my-4">
            <div class="card rounded-0">
                <div class="card-header rounded-0 bg-success text-white h5">
                    Mission & Vission
                </div>
                <div class="card-body">
                    <figure class="text-center">
                        <blockquote class="blockquote">
                            <p class="h4">{{$insData->mission}}</p>
                        </blockquote>
                    </figure>
                    <div class="p-2 text-success">{{$insData->vision}}</div>
                </div>
            </div>
        </div>
        @else
        <div class="col-12 mx-auto my-2">
            <h2>Welcome to Jahanara-Ayub Academy</h2>
            <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing..... <a href="#">Readmore</a></p>
        </div>
        <!-- mission & vission -->
        <div class="col-12 mx-auto my-4">
            <div class="card rounded-0">
                <div class="card-header rounded-0 bg-success text-white h5">
                    Mission & Vission
                </div>
                <div class="card-body">
                    <figure class="text-center">
                        <blockquote class="blockquote">
                            <p class="h4">when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                        </blockquote>
                    </figure>
                    <div class="p-2 text-success">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
                </div>
            </div>
        </div>
        @endif

        <!-- Notice board start here -->
        <div class="col-12 mx-auto mb-4">
            <h2>Leatest Notice</h2>
            @if($noticeBoard->count()>0)
            @foreach($noticeBoard as $ntc)
            <div class="bg-success p-2 notice-box my-2">
                <div class="row align-items-center">
                    <div class="col-2 mx-auto date-box"><span><i class="fa-thin fa-calendar"></i></span> {{ $ntc->created_at->format('d M Y') }}</div>
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
        <div class="row g-0 d-none d-md-block">
            <div class="col-12 mx-auto my-4 row">
                <!-- info box start here -->
                <div class="col-6 mx-auto my-4 infobox">
                    <div class="card rounded-0">
                        <div class="card-header rounded-0 bg-success text-white h5">
                            Admission Info
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-3">
                                    <img src="{{ asset('/public/') }}/img/forms.jpg" class="w-100" alt="Institute">
                                </div>
                                <div class="col-12 col-md-9">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i> Honors Admission</li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i> XI Class Admission</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mx-auto my-4 infobox">
                    <div class="card rounded-0">
                        <div class="card-header rounded-0 bg-success text-white h5">
                            Institute Info
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-3">
                                    <img src="{{ asset('/public/') }}/img/institute.jpg" class="w-100" alt="Institute">
                                </div>
                                <div class="col-12 col-md-9">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i><a href="{{route('institutePage')}}"> About Us</a></li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i><a href="{{route('teacherPage')}}"> Teacher Database</a></li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i><a href="{{route('staffPage')}}"> Staff Database</a> </li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i><a href="{{route('principalSpeechPage')}}"> Principal Speech</a></li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i><a href="{{route('comitteePage')}}"> Managing Comittee</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mx-auto my-4 infobox">
                    <div class="card rounded-0">
                        <div class="card-header rounded-0 bg-success text-white h5">
                            Academic
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-3">
                                    <img src="{{ asset('/public/') }}/img/academic.png" class="w-100" alt="Institute">
                                </div>
                                <div class="col-12 col-md-9">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i> <a href=""> Semister Plan</a></li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i><a  href="{{route('newSyllabus')}}"> Syllabus</a>
                                        </li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i><a href="{{route('newClassSchedule')}}"> Class Routine</a> </li>
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i> <a href="{{route('newExamSchedule')}}"> Exam Routine</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mx-auto my-4 infobox">
                    <div class="card rounded-0">
                        <div class="card-header rounded-0 bg-success text-white h5">
                            Student Corner
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-3">
                                    <img src="{{ asset('/public/') }}/img/studentCorner.png" class="w-100" alt="Institute">
                                </div>
                                <div class="col-12 col-md-9">
                                    <ul class="list-group list-group-flush">
                                        
                                            <li class="list-group-item">
                                                <i class="fa-regular fa-arrow-turn-down-right"></i> 
                                                <a href="{{route('student')}}">
                                                    Student Database
                                                </a>
                                            </li>
                                                <li class="list-group-item">
                                                    <i class="fa-regular fa-arrow-turn-down-right"></i> 
                                                <a href="">
                                                    X-Student Archive
                                                </a>
                                                </li>
                                        
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i><a href="{{route('placementCellView')}}"> Placement Cell</a></li>
                                        
                                        <li class="list-group-item"><i class="fa-regular fa-arrow-turn-down-right"></i> <a href="{{route('jobNeedyStudentView')}}">Job Seekers</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- carusel slider start -->
        <div id="demo" class="col-12 mx-auto mt-4">
            <h2>Photo Gallery</h2>
            <div id="owl-demo" class="owl-carousel">
            @if($gallery->count()>0) 
                @foreach($gallery as $data)
                        <div class="item">
                            <img src="{{ env('APP_URL') }}/public/upload/image/PhotoGallery/{{$data->avatar}}" alt="campus">
                        </div>
                @endforeach
            @else
                <div class="item"><img src="{{ asset('/public/') }}/img/campus.jpeg" alt="campus"></div>
                <div class="item"><img src="{{ asset('/public/') }}/img/mainbuilding.jpg" alt="main building"></div>
                <div class="item"><img src="{{ asset('/public/') }}/img/office.jpg" alt="office room"></div>
                <div class="item"><img src="{{ asset('/public/') }}/img/principalroom.jpg" alt="principal room"></div>
                <div class="item"><img src="{{ asset('/public/') }}/img/hostel.jpg" alt="hostel"></div>
                <div class="item"><img src="{{ asset('/public/') }}/img/auditoriam.jpg" alt="auditoriam"></div>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection