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

<div class="col-11 col-md-9 mx-auto main-content-column">
    <div class="row align-items-start">
        <!-- Leatest Notice block placed at top of main content (beside sidebar, under slider) -->
        <div class="col-12 mx-auto mb-4 scale-on-scroll latest-notice">
            <div class="latest-notice-header">
                <h2 class="home-section-title">Latest Notice</h2>
                <a href="{{ route('allNotices') }}" class="btn btn-outline-success btn-sm">All Notice</a>
            </div>
            @if($noticeBoard->count()>0)
                <div id="noticeList" class="notice-list">
                @foreach($noticeBoard as $ntc)
                    @php
                        $rawDate = optional($ntc->created_at);
                        $nday = $rawDate ? $rawDate->format('d') : '';
                        $nmon = $rawDate ? $rawDate->format('M') : '';
                        $__nb2 = ($ntc->body ?? $ntc->details ?? $ntc->description ?? '');
                    @endphp
                    <div class="notice-item {{ $loop->iteration > 5 ? 'extra-notice' : '' }}">
                        <div class="notice-date" aria-label="Notice date {{ $rawDate ? $rawDate->format('d M Y') : '' }}">
                            <div class="nd-day">{{ $nday }}</div>
                            <div class="nd-month">{{ $nmon }}</div>
                        </div>
                        <div class="notice-title">{{ $ntc->headline }}</div>
                        <div class="notice-actions">
                            <button class="btn btn-light btn-sm notice-view"
                                data-title="{{ $ntc->headline }}"
                                data-body64="{{ base64_encode($__nb2) }}"
                                data-date="{{ $rawDate ? $rawDate->format('d M Y') : '' }}"
                                data-attachment="{{ !empty($ntc->attachment) ? env('APP_URL').'/public/'.$ntc->attachment : '' }}"
                                data-attachtype="{{ !empty($ntc->attachment) ? strtolower(pathinfo($ntc->attachment, PATHINFO_EXTENSION)) : '' }}">
                                <i class="fa-regular fa-eye"></i> View
                            </button>
                            @php
                                $fileHref = !empty($ntc->attachment) ? env('APP_URL').'/public/'.$ntc->attachment : '#';
                                $fileName = !empty($ntc->attachment) ? basename($ntc->attachment) : '';
                            @endphp
                            <a class="btn btn-outline-light btn-sm {{ empty($ntc->attachment) ? 'disabled' : '' }}"
                               href="{{ $fileHref }}"
                               @if(!empty($fileName)) download="{{ $fileName }}" @endif
                               aria-disabled="{{ empty($ntc->attachment) ? 'true' : 'false' }}">
                                <i class="fa-solid fa-download"></i> File
                            </a>
                        </div>
                    </div>
                @endforeach
                </div>
                @if($noticeBoard->count() > 5)
                <div class="load-more-wrap">
                    <button id="loadMoreNotices" class="btn btn-sm btn-outline-secondary">Load more</button>
                </div>
                @endif
            @else
                <div class="notice-empty">No notices available right now. Please check back later.</div>
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
        <div id="demo" class="col-12 mx-auto mt-2 home-gallery">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between">
                    <h2 class="home-section-title mb-0">Photo Gallery</h2>
                    <a href="{{ route('imagePage') }}" class="btn btn-outline-success btn-sm">View All</a>
                </div>
                <div class="card-body pt-3">
                    <div id="owl-demo" class="owl-carousel owl-theme" aria-label="Campus photo highlights" data-owl-customized="1">
            @if($gallery->count()>0) 
                @foreach($gallery as $data)
                        <div class="item">
                            <div class="gallery-card" role="button" tabindex="0"
                                 onclick="showImageModal('{{ env('APP_URL') }}/public/upload/image/PhotoGallery/{{ $data->avatar }}', '{{ $data->title ?? 'Gallery Image' }}', '{{ $data->description ?? 'Beautiful moment captured' }}')"
                                 onkeypress="if(event.key==='Enter'){showImageModal('{{ env('APP_URL') }}/public/upload/image/PhotoGallery/{{ $data->avatar }}', '{{ $data->title ?? 'Gallery Image' }}', '{{ $data->description ?? 'Beautiful moment captured' }}')}">
                                <img loading="lazy" decoding="async" src="{{ env('APP_URL') }}/public/upload/image/PhotoGallery/{{$data->avatar}}" alt="{{ $data->title ?? 'Gallery image' }}" class="g-img">
                                <div class="g-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
                            </div>
                        </div>
                @endforeach
            @else
                <div class="item">
                    <div class="gallery-card" role="button" tabindex="0" onclick="showImageModal('{{ asset('/public/') }}/img/campus.jpeg','Campus ground','Default gallery image')" onkeypress="if(event.key==='Enter'){showImageModal('{{ asset('/public/') }}/img/campus.jpeg','Campus ground','Default gallery image')}">
                        <img loading="lazy" src="{{ asset('/public/') }}/img/campus.jpeg" alt="Campus ground" class="g-img">
                        <div class="g-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
                    </div>
                </div>
                <div class="item">
                    <div class="gallery-card" role="button" tabindex="0" onclick="showImageModal('{{ asset('/public/') }}/img/mainbuilding.jpg','Main building','Default gallery image')" onkeypress="if(event.key==='Enter'){showImageModal('{{ asset('/public/') }}/img/mainbuilding.jpg','Main building','Default gallery image')}">
                        <img loading="lazy" src="{{ asset('/public/') }}/img/mainbuilding.jpg" alt="Main building" class="g-img">
                        <div class="g-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
                    </div>
                </div>
                <div class="item">
                    <div class="gallery-card" role="button" tabindex="0" onclick="showImageModal('{{ asset('/public/') }}/img/office.jpg','Office room','Default gallery image')" onkeypress="if(event.key==='Enter'){showImageModal('{{ asset('/public/') }}/img/office.jpg','Office room','Default gallery image')}">
                        <img loading="lazy" src="{{ asset('/public/') }}/img/office.jpg" alt="Office room" class="g-img">
                        <div class="g-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
                    </div>
                </div>
                <div class="item">
                    <div class="gallery-card" role="button" tabindex="0" onclick="showImageModal('{{ asset('/public/') }}/img/principalroom.jpg','Principal room','Default gallery image')" onkeypress="if(event.key==='Enter'){showImageModal('{{ asset('/public/') }}/img/principalroom.jpg','Principal room','Default gallery image')}">
                        <img loading="lazy" src="{{ asset('/public/') }}/img/principalroom.jpg" alt="Principal room" class="g-img">
                        <div class="g-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
                    </div>
                </div>
                <div class="item">
                    <div class="gallery-card" role="button" tabindex="0" onclick="showImageModal('{{ asset('/public/') }}/img/hostel.jpg','Student hostel','Default gallery image')" onkeypress="if(event.key==='Enter'){showImageModal('{{ asset('/public/') }}/img/hostel.jpg','Student hostel','Default gallery image')}">
                        <img loading="lazy" src="{{ asset('/public/') }}/img/hostel.jpg" alt="Student hostel" class="g-img">
                        <div class="g-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
                    </div>
                </div>
                <div class="item">
                    <div class="gallery-card" role="button" tabindex="0" onclick="showImageModal('{{ asset('/public/') }}/img/auditoriam.jpg','Auditorium','Default gallery image')" onkeypress="if(event.key==='Enter'){showImageModal('{{ asset('/public/') }}/img/auditoriam.jpg','Auditorium','Default gallery image')}">
                        <img loading="lazy" src="{{ asset('/public/') }}/img/auditoriam.jpg" alt="Auditorium" class="g-img">
                        <div class="g-overlay"><i class="fa-solid fa-magnifying-glass-plus"></i></div>
                    </div>
                </div>
            @endif
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bootstrap Modal for Image Viewer (mirrors gallery page) -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="background: linear-gradient(135deg, #198754, #20c997); color: #fff; border-bottom: none;">
                        <h5 class="modal-title" id="imageModalLabel">Gallery Image</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <img id="modalImage" src="" alt="Gallery Image" class="modal-image" style="width:100%;height:auto;border-radius:.375rem;">
                        <div class="image-info" style="padding:15px;background:#fff;border-radius:0 0 .375rem .375rem;">
                            <div id="imageTitle" class="image-title" style="font-size:1.1rem;font-weight:600;color:#198754;margin-bottom:4px;">Image Title</div>
                            <div id="imageSubtitle" class="image-subtitle" style="font-size:.95rem;color:#6c757d;">Image subtitle or description</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" onclick="downloadImage()">Download</button>
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
    // Enhance Owl Carousel options for homepage gallery (Owl v1)
    if(window.jQuery && $('#owl-demo').length){
        $('#owl-demo').owlCarousel({
            items: 4,
            autoPlay: 3500,
            stopOnHover: true,
            slideSpeed: 650,
            paginationSpeed: 450,
            navigation: true,
            pagination: true,
            navigationText: [
                '<span class="fa fa-chevron-left"></span>',
                '<span class="fa fa-chevron-right"></span>'
            ],
            itemsDesktop: [1199, 4],
            itemsDesktopSmall: [979, 3],
            itemsTablet: [768, 3],
            itemsTabletSmall: [600, 2],
            itemsMobile: [479, 1]
        });
    }
});

// Gallery modal behaviors (align homepage with gallery page)
function showImageModal(imageSrc, title, subtitle) {
    document.getElementById('modalImage').src = imageSrc;
    document.getElementById('imageModalLabel').textContent = title;
    document.getElementById('imageTitle').textContent = title;
    document.getElementById('imageSubtitle').textContent = subtitle;
    document.getElementById('imageModal').setAttribute('data-image-src', imageSrc);
    var modal = new bootstrap.Modal(document.getElementById('imageModal'));
    modal.show();
}

function downloadImage() {
    const modalEl = document.getElementById('imageModal');
    const imageSrc = modalEl.getAttribute('data-image-src');
    if(!imageSrc) return;
    // Try to preserve original filename
    let filename = 'gallery-image.jpg';
    try {
        const u = new URL(imageSrc, window.location.href);
        const pathname = decodeURI(u.pathname || '');
        const base = pathname.substring(pathname.lastIndexOf('/') + 1) || filename;
        filename = base;
    } catch(e) { /* fallback keeps default filename */ }
    const link = document.createElement('a');
    link.href = imageSrc;
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

// Optional: close modal via Escape key
document.addEventListener('keydown', function(e) {
    const m = document.getElementById('imageModal');
    if (m && m.classList.contains('show') && e.key === 'Escape') {
        bootstrap.Modal.getInstance(m)?.hide();
    }
});
</script>
@endsection