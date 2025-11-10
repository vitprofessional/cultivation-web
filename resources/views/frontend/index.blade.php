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
<style>
/* Scale-in animation for sections */
.scale-on-scroll{transform: scale(.98); opacity: 0; transition: transform .6s ease, opacity .6s ease}
.scale-on-scroll.scale-in{transform: scale(1); opacity: 1}
.notice-feature:hover{transform: translateY(-2px); transition: transform .2s ease}
</style>
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

        <!-- Latest Notice relocated after slider with scaling effect -->
        <div class="col-12 mx-auto mb-5 scale-on-scroll" id="latestNoticeSection">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="mb-0">Latest Notice</h2>
                <a href="{{ route('allNotices') }}" class="btn btn-outline-primary btn-sm">All Notices</a>
            </div>
            @php($latest = $noticeBoard->first())
            @if($latest)
                @php($__nbLatest = ($latest->body ?? $latest->details ?? $latest->description ?? ''))
                <div class="card shadow-sm border-0 overflow-hidden notice-feature">
                    <div class="card-body p-4 position-relative">
                        <div class="small text-muted mb-2"><i class="fa-thin fa-calendar"></i> {{ optional($latest->created_at)->format('d M Y') }}</div>
                        <h5 class="fw-bold mb-3">{{ $latest->headline }}</h5>
                        <p class="text-truncate" style="max-height:3.2em">{{ \Illuminate\Support\Str::limit(strip_tags($__nbLatest), 220,'...') }}</p>
                        <div class="mt-3 d-flex gap-2">
                            <button class="btn btn-success btn-sm notice-view"
                                data-title="{{ $latest->headline }}"
                                data-body64="{{ base64_encode($__nbLatest) }}"
                                data-date="{{ optional($latest->created_at)->format('d M Y') }}"
                                data-attachment="{{ !empty($latest->attachment) ? env('APP_URL').'/public/'.$latest->attachment : '' }}"
                                data-attachtype="{{ !empty($latest->attachment) ? strtolower(pathinfo($latest->attachment, PATHINFO_EXTENSION)) : '' }}">
                                <i class="fa-regular fa-eye"></i> View Notice
                            </button>
                            <a class="btn btn-outline-success btn-sm {{ empty($latest->attachment) ? 'disabled' : '' }}" target="_blank"
                               href="{{ !empty($latest->attachment) ? env('APP_URL').'/public/'.$latest->attachment : '#' }}"
                               aria-disabled="{{ empty($latest->attachment) ? 'true' : 'false' }}">
                                <i class="fa-regular fa-file-arrow-down"></i>
                            </a>
                        </div>
                        <div class="notice-bg-badge position-absolute top-0 end-0 opacity-25 p-3" style="font-size:4rem;line-height:1;">
                            <i class="fa-duotone fa-bullhorn"></i>
                        </div>
                    </div>
                </div>
                @if($noticeBoard->count() > 1)
                <div class="row mt-4 g-3">
                    @foreach($noticeBoard->skip(1)->take(6) as $ntc)
                        @php($__nb2 = ($ntc->body ?? $ntc->details ?? $ntc->description ?? ''))
                        <div class="col-md-6">
                            <div class="border rounded p-3 h-100 small notice-item position-relative">
                                <div class="text-muted mb-1"><i class="fa-thin fa-calendar"></i> {{ optional($ntc->created_at)->format('d M Y') }}</div>
                                <div class="fw-semibold mb-2">{{ \Illuminate\Support\Str::limit($ntc->headline, 80) }}</div>
                                <button class="btn btn-outline-success btn-sm notice-view"
                                    data-title="{{ $ntc->headline }}"
                                    data-body64="{{ base64_encode($__nb2) }}"
                                    data-date="{{ optional($ntc->created_at)->format('d M Y') }}"
                                    data-attachment="{{ !empty($ntc->attachment) ? env('APP_URL').'/public/'.$ntc->attachment : '' }}"
                                    data-attachtype="{{ !empty($ntc->attachment) ? strtolower(pathinfo($ntc->attachment, PATHINFO_EXTENSION)) : '' }}">
                                    <i class="fa-regular fa-eye"></i> Open
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif
            @else
                <div class="alert alert-info">No notices available right now.</div>
            @endif
        </div>
        <!-- Institute metrics relocated below latest notice -->
        <div class="col-12 mx-auto mb-5">
            @include('frontend.partials.instituteStats')
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
<script>
// Animate sections when they come into view
document.addEventListener('DOMContentLoaded', function(){
    const els = document.querySelectorAll('.scale-on-scroll');
    if('IntersectionObserver' in window){
        const io = new IntersectionObserver((entries)=>{
            entries.forEach(e=>{ if(e.isIntersecting){ e.target.classList.add('scale-in'); io.unobserve(e.target);} });
        },{threshold: .15});
        els.forEach(el=> io.observe(el));
    } else {
        els.forEach(el=> el.classList.add('scale-in'));
    }
});
</script>
@endsection