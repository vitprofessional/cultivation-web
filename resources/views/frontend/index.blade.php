@extends($frontendLayout ?? config('frontend.layout'))
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
.home-section-title{font-weight:800; letter-spacing:.2px; margin-bottom:1rem; color:#112958}
.metric-icon{transform:scale(.9);opacity:.6;transition:transform .6s ease, opacity .6s ease}
.metric-icon.in{transform:scale(1);opacity:1}

/* At-a-Glance statistics */
.at-glance{margin:1.5rem 0 2rem}
.at-glance-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1rem}
.at-glance-item{background:linear-gradient(135deg,#1686aa 0%,#0f5a7b 100%);color:#fff;padding:1.2rem;border-radius:.8rem;text-align:center;box-shadow:0 6px 18px rgba(22,134,170,.15);transition:transform .3s ease,box-shadow .3s ease}
.at-glance-item:hover{transform:translateY(-3px);box-shadow:0 10px 28px rgba(22,134,170,.25)}
.at-glance-value{font-size:1.85rem;font-weight:900;line-height:1;margin-bottom:.5rem}
.at-glance-label{font-size:.85rem;font-weight:700;opacity:.95}

/* Latest notice spacing and readability */
.latest-notice{padding:.85rem 1rem;border:1px solid #dceef4;border-radius:.6rem;background:#fff;box-shadow:0 6px 16px rgba(39,60,102,.06)}
.latest-notice-header{display:flex;align-items:center;justify-content:space-between;gap:.75rem;margin-bottom:.7rem}
.notice-list{display:flex;flex-direction:column;gap:.55rem}
.notice-item{display:grid;grid-template-columns:56px 1fr auto;align-items:center;gap:.75rem;padding:.62rem .7rem;border:1px solid #e6eef1;border-radius:.6rem;background:#fdfefe}
.notice-date{display:flex;flex-direction:column;align-items:center;justify-content:center;background:#e7f9fb;border:1px solid #cfeef7;border-radius:.5rem;padding:.2rem .25rem;min-height:52px}
.nd-day{font-size:.9rem;font-weight:800;color:#112958;line-height:1}
.nd-month{font-size:.7rem;font-weight:700;color:#21a7d0;text-transform:uppercase;line-height:1.1}
.notice-title{font-weight:600;color:#273c66;line-height:1.3}
.notice-actions{display:flex;gap:.4rem;align-items:center}
.notice-actions .btn{border-radius:.45rem}
.notice-actions .btn{white-space:nowrap}
.notice-actions .btn-light{background:#fff;border-color:#cfe3ec;color:#273c66}
.notice-actions .btn-light:hover{background:#e7f9fb;border-color:#b9d7e5;color:#112958}
.notice-actions .btn-outline-light{background:#fff;border-color:#9bb6c7;color:#273c66}
.notice-actions .btn-outline-light:hover{background:#273c66;border-color:#273c66;color:#fff}
.notice-empty{padding:.15rem 0;color:#6d7d8b;font-size:.9rem}

/* Leadership section */
.leadership-spotlight{background:#fff;border-radius:.9rem;border:1px solid #d9e8ed;padding:1.8rem;box-shadow:0 8px 24px rgba(39,60,102,.08);margin:1.5rem 0 2rem}
.leadership-grid{display:grid;grid-template-columns:1fr 1fr;gap:2rem;align-items:center}
.leadership-avatar{width:180px;height:180px;border-radius:50%;object-fit:cover;border:4px solid #e7f9fb;box-shadow:0 8px 20px rgba(22,134,170,.15)}
.leadership-content h2{font-size:1.5rem;margin-bottom:.75rem}
.leadership-title{font-size:.95rem;color:#6d7d8b;margin-bottom:1.25rem;font-weight:600}
.leadership-quote{font-size:1.15rem;line-height:1.8;color:#112958;font-weight:700;margin:1.25rem 0;padding-left:1rem;border-left:3px solid #21a7d0}
.leadership-text{font-size:.95rem;line-height:1.8;color:#505050;margin-bottom:1.5rem}
.leadership-link{font-weight:700;color:#1686aa;text-decoration:none}
.leadership-link:hover{text-decoration:underline}

/* Academic and Student Services */
.services-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:1.2rem;margin:1.5rem 0 2rem}
.service-card{background:#fff;border:1px solid #d9e8ed;border-radius:.8rem;padding:1.5rem;transition:all .3s ease;cursor:pointer}
.service-card:hover{border-color:#21a7d0;box-shadow:0 8px 24px rgba(33,167,208,.12);transform:translateY(-2px)}
.service-icon{display:inline-flex;align-items:center;justify-content:center;width:44px;height:44px;background:#e7f9fb;color:#1686aa;border-radius:.6rem;font-size:1.3rem;margin-bottom:.8rem}
.service-card h3{font-size:1rem;font-weight:800;color:#112958;margin-bottom:.6rem}
.service-card p{font-size:.9rem;color:#505050;line-height:1.6;margin:0}
.service-links{display:flex;flex-direction:column;gap:.4rem;margin-top:.8rem}
.service-links a{font-size:.85rem;color:#1686aa;text-decoration:none;font-weight:600;display:flex;align-items:center;gap:.4rem}
.service-links a:hover{color:#0f5a7b;text-decoration:underline}

/* Verified public-service shortcuts immediately following the hero and notices. */
.quick-access{margin-bottom:1.5rem}
.quick-access-heading{display:flex;align-items:center;justify-content:space-between;gap:1rem;margin-bottom:.8rem}
.quick-access-heading h2{margin:0}
.quick-access-grid{display:grid;grid-template-columns:repeat(5,minmax(0,1fr));gap:.7rem}
.quick-access-item{display:flex;align-items:center;gap:.7rem;min-height:70px;padding:.8rem;border:1px solid #dce8ed;border-radius:.6rem;background:#fff;color:#112958;text-decoration:none;box-shadow:0 4px 12px rgba(39,60,102,.05);transition:transform .2s ease,border-color .2s ease,box-shadow .2s ease}
.quick-access-item:hover,.quick-access-item:focus{color:#112958;border-color:#21a7d0;box-shadow:0 8px 20px rgba(33,167,208,.12);transform:translateY(-2px)}
.quick-access-icon{display:grid;place-items:center;width:34px;height:34px;flex:0 0 34px;border-radius:50%;background:#e7f9fb;color:#1686aa;font-size:.95rem}
.quick-access-label{font-family:var(--edu-heading-font);font-size:.86rem;font-weight:800;line-height:1.25}
.quick-access-item:focus-visible{outline:2px solid var(--edu-primary);outline-offset:2px}
.home-page .edu-main-inner > .row > .row{display:contents}
.home-page .edu-main-inner > .row > .row > .latest-notice{order:-2}
.home-page .edu-main-inner > .row > .row > .quick-access{order:-1}

/* Gallery visual balance */
.home-gallery .card{border:1px solid #e3edf1;border-radius:.8rem;box-shadow:0 8px 20px rgba(39,60,102,.06)}
.home-gallery .card-header{padding:1rem 1.15rem;background:#fff;border-bottom:1px solid #ecf2f5!important}
.home-gallery .card-body{padding:1rem 1.1rem 1.15rem}
.home-gallery .card-header .btn-outline-success{font-weight:700}
.gallery-card{position:relative;overflow:hidden;border-radius:.65rem;cursor:pointer;background:#f3f8f9}
.gallery-card .g-img{width:100%;height:210px;object-fit:cover;display:block;transition:transform .35s ease}
.gallery-card .g-overlay{position:absolute;inset:0;background:linear-gradient(to top,rgba(39,60,102,.45),rgba(33,167,208,.12));display:flex;align-items:flex-end;justify-content:flex-end;padding:.65rem;opacity:0;transition:opacity .3s ease}
.gallery-card .g-overlay i{color:#fff;font-size:1.1rem;background:rgba(17,41,88,.55);width:32px;height:32px;border-radius:50%;display:flex;align-items:center;justify-content:center}
.gallery-card:hover .g-img{transform:scale(1.05)}
.gallery-card:hover .g-overlay{opacity:1}

/* Owl nav placement refinement */
#owl-demo .owl-controls{margin-top:12px}
#owl-demo .owl-buttons div{background:#273c66!important;opacity:.9!important}
#owl-demo .owl-buttons div:hover{background:#21a7d0!important}

/* Mobile balancing */
@media (max-width: 991px){
    .latest-notice{padding:1rem .85rem .85rem}
    .quick-access-grid{grid-template-columns:repeat(3,minmax(0,1fr))}
    .notice-item{grid-template-columns:52px 1fr;grid-template-areas:"date title" "date actions";row-gap:.45rem}
    .notice-date{grid-area:date}
    .notice-title{grid-area:title;font-size:.95rem}
    .notice-actions{grid-area:actions;justify-content:flex-start}
    .at-glance-grid{grid-template-columns:repeat(2,1fr);gap:.8rem}
    .leadership-grid{grid-template-columns:1fr;gap:1.5rem}
    .leadership-avatar{width:140px;height:140px}
    .services-grid{grid-template-columns:1fr}
    .home-gallery .card-header{padding:.85rem .9rem}
    .gallery-card .g-img{height:180px}
}

@media (max-width: 575px){
    .home-section-title{font-size:1.35rem}
    .latest-notice{padding:.8rem .7rem}
    .latest-notice-header{align-items:flex-start;flex-direction:column;gap:.5rem}
    .latest-notice-header .btn{width:100%;font-size:.8rem}
    .notice-item{padding:.5rem;gap:.55rem}
    .notice-date{min-height:48px}
    .nd-day{font-size:.85rem}
    .nd-month{font-size:.65rem}
    .notice-actions{flex-wrap:wrap;gap:.25rem}
    .notice-actions .btn{min-height:32px;padding:.28rem .5rem;font-size:.75rem}
    .quick-access{margin-bottom:1rem}
    .quick-access-grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:.55rem}
    .quick-access-item{gap:.55rem;min-height:64px;padding:.65rem}
    .quick-access-label{font-size:.78rem}
    .at-glance-grid{grid-template-columns:repeat(2,1fr);gap:.6rem}
    .at-glance-item{padding:1rem}
    .at-glance-value{font-size:1.5rem}
    .at-glance-label{font-size:.8rem}
    .leadership-grid{grid-template-columns:1fr}
    .leadership-avatar{width:100px;height:100px}
    .leadership-content h2{font-size:1.2rem}
    .leadership-quote{font-size:1rem;margin:.8rem 0;padding-left:.8rem}
    .home-gallery .card-header{padding:.75rem .75rem}
    .home-gallery .card-body{padding:.8rem .75rem .95rem}
    .gallery-card .g-img{height:160px}
    .speech-feature .feature-header{padding:.8rem .85rem}
    .speech-feature .feature-header h2{font-size:1.05rem}
    .speech-feature .feature-body{padding:.95rem}
    .speech-feature .speech-meta{align-items:flex-start}
    .speech-feature .btn{width:100%}
}

@media (min-width: 1200px){
    .section-band{padding:1.65rem 1.8rem}
    .home-gallery .card-body{padding:1.15rem 1.25rem 1.25rem}
    .gallery-card .g-img{height:225px}
}
</style>
<div class="row">
        <!-- Institute metrics block below slider using partial -->
    <div class="col-12 mx-auto section-band">
            @if($insData)
            <div class="col-12 mx-auto section-band section-tight my-4">
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
                <h2 class="home-section-title mb-2">Institute Information</h2>
                <p class="mb-0 text-muted">The institute profile will be published here when it is available.</p>
            </div>
            @endif
        @include('frontend.partials.instituteStats')
    </div>

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
                    // Build absolute attachment URL as APP_URL/public/upload/notice/{filename}
                    $__baseUrl = rtrim(config('app.url') ?: url('/'), '/');
                    if (preg_match('#/public$#i', $__baseUrl)) { $__baseUrl = preg_replace('#/public$#i', '', $__baseUrl); }
                    if (request()->isSecure() && preg_match('#^http:#i', $__baseUrl)) { $__baseUrl = preg_replace('#^http:#i', 'https:', $__baseUrl); }
                    $__file = !empty($ntc->attachment) ? basename((string)$ntc->attachment) : '';
                    $__attachUrl = $__file ? ($__baseUrl . '/public/upload/notice/' . rawurlencode($__file)) : '';
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
                            data-attachment="{{ !empty($ntc->attachment) ? url('/').'/public/'.$ntc->attachment : '' }}"
                            @if($__attachUrl) data-attachment-url="{{ $__attachUrl }}" @endif
                            data-attachtype="{{ !empty($ntc->attachment) ? strtolower(pathinfo($ntc->attachment, PATHINFO_EXTENSION)) : '' }}">
                            <i class="fa-regular fa-eye"></i> View
                        </button>
                        @php
                            $fileHref = $__attachUrl ?: (!empty($ntc->attachment) ? url('/').'/public/'.$ntc->attachment : '');
                            $fileName = $__file;
                        @endphp
                        @if(!empty($fileHref))
                            <a class="btn btn-outline-light btn-sm notice-file-download"
                                href="{{ $fileHref }}"
                                @if(!empty($fileName)) download="{{ $fileName }}" @endif
                                data-url="{{ $fileHref }}"
                                @if(!empty($fileName)) data-filename="{{ $fileName }}" @endif>
                                <i class="fa-solid fa-download"></i> File
                            </a>
                        @endif
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
            <div class="notice-empty">No notices are currently published.</div>
        @endif
    </div>
    <section class="col-12 mx-auto quick-access" aria-labelledby="quickAccessTitle">
        <div class="quick-access-heading">
            <h2 id="quickAccessTitle" class="home-section-title">Quick Access</h2>
        </div>
        <div class="quick-access-grid">
            <a class="quick-access-item" href="{{ route('internalResult') }}">
                <span class="quick-access-icon"><i class="fa-solid fa-square-poll-vertical"></i></span>
                <span class="quick-access-label">Online Result</span>
            </a>
            <a class="quick-access-item" href="{{ route('allNotices') }}">
                <span class="quick-access-icon"><i class="fa-solid fa-bullhorn"></i></span>
                <span class="quick-access-label">Notice Board</span>
            </a>
            <a class="quick-access-item" href="{{ route('newClassSchedule') }}">
                <span class="quick-access-icon"><i class="fa-solid fa-calendar-days"></i></span>
                <span class="quick-access-label">Class Routine</span>
            </a>
            <a class="quick-access-item" href="{{ route('newExamSchedule') }}">
                <span class="quick-access-icon"><i class="fa-solid fa-clipboard-list"></i></span>
                <span class="quick-access-label">Exam Routine</span>
            </a>
            <a class="quick-access-item" href="{{ route('newSyllabus') }}">
                <span class="quick-access-icon"><i class="fa-solid fa-book-open"></i></span>
                <span class="quick-access-label">Syllabus</span>
            </a>
        </div>
    </section>

    @php
        // Prepare principal speech data
        $principalSpeech = \App\Models\PrincipalSpeech::first();
        $speechTitle = $frontendSpeechTitle ?? "Principal's Message";
        $principalSpeechLead = !empty($config->principalImportantSpeech)
            ? $config->principalImportantSpeech
            : (!empty($principalSpeech?->importantSpeech) ? $principalSpeech->importantSpeech : 'We want to make good students as well as good people.');
        $principalSpeechBody = !empty($config->principalGeneralSpeech)
            ? $config->principalGeneralSpeech
            : (!empty($principalSpeech?->generalSpeech) ? $principalSpeech->generalSpeech : '');
        $principalSpeechExcerpt = \Illuminate\Support\Str::limit(trim(preg_replace('/\s+/', ' ', strip_tags($principalSpeechBody))), 300, '...');
        $principalSpeechAvatar = !empty($config->avatar)
            ? asset('public/upload/image/cultivation/' . rawurlencode(basename($config->avatar)))
            : asset('public/avatar.png');
    @endphp

    <!-- Leadership Spotlight -->
    <div class="col-12 mx-auto scale-on-scroll leadership-spotlight">
        <div class="leadership-grid">
            <div class="leadership-content">
                <h2>{{ $speechTitle }}</h2>
                <p class="leadership-title">{{ $config->principalDesignation ?? 'Principal' }}</p>
                <div class="leadership-quote">"{{ $principalSpeechLead }}"</div>
                <p class="leadership-text">{{ $principalSpeechExcerpt ?: 'Building excellence in education and nurturing future leaders.' }}</p>
                <a href="{{ route('principalSpeechPage') }}" class="leadership-link">Read Full Message →</a>
            </div>
            <div class="text-center">
                <img class="leadership-avatar" src="{{ $principalSpeechAvatar }}" alt="{{ $config->principalName ?? 'Principal' }}">
                <p class="mt-3 mb-0 fw-bold" style="color:#112958">{{ $config->principalName ?? 'Engr. Abu Yousuf' }}</p>
            </div>
        </div>
    </div>

    <div class="col-12 mx-auto at-glance">
        <div class="at-glance-grid">
            <div class="at-glance-item">
                <div class="at-glance-value">{{ $insData?->establishDate ?? '2015' }}</div>
                <div class="at-glance-label">ESTABLISHED</div>
            </div>
            <div class="at-glance-item">
                <div class="at-glance-value">{{ $insData?->totalTeacher ?? '25+' }}</div>
                <div class="at-glance-label">FACULTY MEMBERS</div>
            </div>
            <div class="at-glance-item">
                <div class="at-glance-value">{{ $insData?->totalStudent ?? '1500+' }}</div>
                <div class="at-glance-label">STUDENTS</div>
            </div>
        </div>
    </div>

    <!-- Modern Academic & Student Services -->
    <div class="col-12 mx-auto">
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon"><i class="fa-solid fa-book"></i></div>
                <h3>Admission & Programs</h3>
                <p>Explore our comprehensive academic programs designed to nurture excellence and innovation.</p>
                <div class="service-links">
                    <a href="#">Honors Admission</a>
                    <a href="#">XI Class Admission</a>
                </div>
            </div>

            <div class="service-card">
                <div class="service-icon"><i class="fa-solid fa-building"></i></div>
                <h3>About Institute</h3>
                <p>Discover our institution's mission, vision, and the leadership guiding our community.</p>
                <div class="service-links">
                    <a href="{{route('institutePage')}}">About Us</a>
                    <a href="{{route('comitteePage')}}">Managing Committee</a>
                </div>
            </div>

            <div class="service-card">
                <div class="service-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                <h3>Academic Resources</h3>
                <p>Access curriculum, routines, syllabi, and all resources to support your academic journey.</p>
                <div class="service-links">
                    <a href="{{route('newSyllabus')}}">Syllabus</a>
                    <a href="{{route('newClassSchedule')}}">Class Routine</a>
                    <a href="{{route('newExamSchedule')}}">Exam Routine</a>
                </div>
            </div>

            <div class="service-card">
                <div class="service-icon"><i class="fa-solid fa-people-group"></i></div>
                <h3>Student Opportunities</h3>
                <p>Engage with student databases, placement support, and career development programs.</p>
                <div class="service-links">
                    <a href="{{route('student')}}">Student Database</a>
                    <a href="{{route('placementCellView')}}">Placement Cell</a>
                    <a href="{{route('jobNeedyStudentView')}}">Job Seekers</a>
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
                                     onclick="showImageModal('{{ config('app.url') }}/public/upload/image/PhotoGallery/{{ $data->avatar }}', '{{ $data->title ?? 'Gallery Image' }}', '{{ $data->description ?? 'Beautiful moment captured' }}')"
                                 onkeypress="if(event.key==='Enter'){showImageModal('{{ config('app.url') }}/public/upload/image/PhotoGallery/{{ $data->avatar }}', '{{ $data->title ?? 'Gallery Image' }}', '{{ $data->description ?? 'Beautiful moment captured' }}')}">
                                <img loading="lazy" decoding="async" src="{{ config('app.url') }}/public/upload/image/PhotoGallery/{{$data->avatar}}" alt="{{ $data->title ?? 'Gallery image' }}" class="g-img">
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
                    <div class="modal-header" style="background: linear-gradient(135deg, #273c66, #21a7d0); color: #fff; border-bottom: none;">
                        <h5 class="modal-title" id="imageModalLabel">Gallery Image</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <img id="modalImage" src="" alt="Gallery Image" class="modal-image" style="width:100%;height:auto;border-radius:.375rem;">
                        <div class="image-info" style="padding:15px;background:#fff;border-radius:0 0 .375rem .375rem;">
                            <div id="imageTitle" class="image-title" style="font-size:1.1rem;font-weight:700;color:#112958;margin-bottom:4px;">Image Title</div>
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