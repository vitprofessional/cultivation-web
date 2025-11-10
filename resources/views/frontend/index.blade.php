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

/* Professional homepage polish */
.home-section-title{font-weight:700; letter-spacing:.2px; margin-bottom: .75rem}
.notice-box{border-radius: .25rem; background: #198754; color:#fff}
.notice-box .date-box{font-weight:600}
.notice-box a{color:#fff; text-decoration:none}
.notice-box a:hover{text-decoration:underline}
.infobox .card{border:0; box-shadow: 0 6px 16px rgba(0,0,0,.06)}
.infobox .card-header{border:0}
.list-group-item{border:0; padding-left: 0}
.list-group-item i{color:#198754}
.section-band{background:#f8f9fa;border-radius:.6rem;padding:1.25rem 1.5rem;margin-bottom:2rem;box-shadow:0 2px 4px rgba(0,0,0,.04)}
.section-band:last-of-type{margin-bottom:0}
.section-band h2.home-section-title{margin-bottom:1rem}
.home-section-title + .text-muted-intro{margin-top:-.5rem;margin-bottom:1rem;font-size:.9rem;color:#6c757d}
.section-tight > *:last-child{margin-bottom:0!important}
.info-cluster.section-band{padding-top:1rem}
.metric-icon{transform:scale(.9);opacity:.6;transition:transform .6s ease, opacity .6s ease}
.metric-icon.in{transform:scale(1);opacity:1}
</style>
<div class="col-3 mx-auto d-none d-md-block sidebar-column">
    @yield('sideinfo')
</div>

<div class="col-11 d-block d-md-none mx-auto">
    @include('frontend.mobileSidebox')   
</div>

<div class="col-11 col-md-9 mx-auto">
    <div class="row align-items-start">
        <!-- Leatest Notice block placed at top of main content (beside sidebar, under slider) -->
        <div class="col-12 mx-auto mb-4 scale-on-scroll section-band">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h2 class="home-section-title mb-0">Latest Notice</h2>
                <a href="{{ route('allNotices') }}" class="btn btn-outline-success btn-sm">All Notice</a>
            </div>
            @if($noticeBoard->count()>0)
                <div id="noticeList">
                @foreach($noticeBoard as $ntc)
                    <div class="bg-success p-2 notice-box my-2 {{ $loop->iteration > 5 ? 'extra-notice d-none' : '' }}">
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
                </div>
                @if($noticeBoard->count() > 5)
                <div class="text-center mt-2">
                    <button id="loadMoreNotices" class="btn btn-sm btn-outline-secondary">Load more</button>
                </div>
                @endif
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
        </div>
        
        @if($insData)
        <div class="col-12 mx-auto section-band section-tight">
            <h2 class="home-section-title mb-2">{{ $insData->insHeadline }}</h2>
            <p class="text-justify mb-3">{{ \Illuminate\Support\Str::limit($insData->insDetails, 750, '...') }} <a href="#">Read more</a></p>
            <div class="card border-0 shadow-sm mb-0">
                <div class="card-header bg-success text-white py-2 h5 mb-0">Mission & Vision</div>
                <div class="card-body pb-3 pt-3">
                    <figure class="text-center mb-3">
                        <blockquote class="blockquote mb-0">
                            <p class="h5 fw-semibold mb-0">{{ $insData->mission }}</p>
                        </blockquote>
                    </figure>
                    <div class="text-success small">{{ $insData->vision }}</div>
                </div>
            </div>
        </div>
        @else
        <div class="col-12 mx-auto section-band section-tight">
            <h2 class="home-section-title mb-2">Welcome to Jahanara-Ayub Academy</h2>
            <p class="text-justify mb-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s... <a href="#">Read more</a></p>
            <div class="card border-0 shadow-sm mb-0">
                <div class="card-header bg-success text-white py-2 h5 mb-0">Mission & Vision</div>
                <div class="card-body pb-3 pt-3">
                    <figure class="text-center mb-3">
                        <blockquote class="blockquote mb-0">
                            <p class="h5 fw-semibold mb-0">When an unknown printer took a galley of type and scrambled it to make a type specimen book...</p>
                        </blockquote>
                    </figure>
                    <div class="text-success small">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
                </div>
            </div>
        </div>
        @endif

        <!-- Institute metrics block below slider using partial -->
        <div class="col-12 mx-auto section-band">
            @include('frontend.partials.instituteStats')
        </div>
        <div class="row g-0 d-none d-md-block section-band info-cluster py-3">
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

        <hr class="my-4">
        <!-- Photo Gallery -->
        <div id="demo" class="col-12 mx-auto mt-2">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 d-flex align-items-center">
                    <h2 class="home-section-title mb-0">Photo Gallery</h2>
                </div>
                <div class="card-body pt-3">
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

    // Count-up for metrics
    const metricEls = document.querySelectorAll('.metric[data-target]');
    const metricIcons = document.querySelectorAll('.metric-icon');
    if(metricEls.length){
        const animateCount = (el)=>{
            const target = parseInt(el.getAttribute('data-target'),10); if(!target || isNaN(target)) return;
            const duration = 1200; const start = performance.now();
            const step = (ts)=>{
                const progress = Math.min((ts - start)/duration,1);
                const value = Math.floor(progress * target);
                el.textContent = value.toLocaleString();
                if(progress < 1) requestAnimationFrame(step); else el.textContent = target.toLocaleString();
            };
            requestAnimationFrame(step);
        };
        if('IntersectionObserver' in window){
            const mIO = new IntersectionObserver((ents)=>{
                ents.forEach(en=>{ if(en.isIntersecting){ animateCount(en.target); mIO.unobserve(en.target);} });
            },{threshold:.4});
            metricEls.forEach(m=> mIO.observe(m));
            const iconIO = new IntersectionObserver((ents)=>{
                ents.forEach(en=>{ if(en.isIntersecting){ en.target.classList.add('in'); iconIO.unobserve(en.target);} });
            },{threshold:.2});
            metricIcons.forEach(ic=> iconIO.observe(ic));
        } else {
            metricEls.forEach(animateCount);
            metricIcons.forEach(ic=> ic.classList.add('in'));
        }
    }

    // Load more notices
    const loadBtn = document.getElementById('loadMoreNotices');
    if(loadBtn){
        loadBtn.addEventListener('click',()=>{
            document.querySelectorAll('.extra-notice.d-none').forEach(el=> el.classList.remove('d-none'));
            loadBtn.remove();
        });
    }
});
</script>
@endsection