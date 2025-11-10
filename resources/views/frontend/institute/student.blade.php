@extends('frontend.include')
@section('fronttitle')
Student List
@endsection
@php
$config =App\Models\ServerConfig::first()
@endphp
@section('frontcontent')
<style>
/* Professional student card layout */
.stu-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:1.1rem;margin-top:1.25rem}
.stu-card{position:relative;background:#fff;border:1px solid #e8eef5;border-radius:16px;padding:1rem;display:flex;flex-direction:column;box-shadow:0 6px 18px rgba(0,0,0,.06);transition:.26s ease;overflow:hidden}
.stu-card::before{content:"";position:absolute;inset:0;background:linear-gradient(135deg,#0ea5e9 0%,#2563eb 100%);opacity:0;transition:.35s;pointer-events:none;z-index:0}
.stu-card>*{position:relative;z-index:1}
.stu-card:hover{transform:translateY(-3px);box-shadow:0 14px 30px -6px rgba(0,0,0,.16)}
.stu-card:hover::before{opacity:.06}
.stu-photo-wrap{width:100%;display:flex;justify-content:center;margin-bottom:.6rem}
.stu-photo{width:clamp(72px,9vw,104px);height:clamp(72px,9vw,104px);aspect-ratio:1/1;border-radius:50%;object-fit:cover;border:4px solid #f3f6f9;box-shadow:0 0 0 2px #0ea5e9;transition:.35s}
.stu-card:hover .stu-photo{box-shadow:0 0 0 4px #1d4ed8}
.stu-name{font-size:clamp(.98rem,1.6vw,1.12rem);font-weight:800;margin:0;color:#0f172a}
.stu-meta{margin-top:.5rem;display:grid;grid-template-columns:1fr;row-gap:6px}
.stu-meta .row{display:flex;align-items:center;gap:8px;font-size:clamp(.68rem,1vw,.82rem);color:#334155}
.stu-meta i{color:#0ea5e9;font-size:.9em}
@media(max-width:575.98px){
    .stu-grid{grid-template-columns:repeat(auto-fit,minmax(170px,1fr));gap:.85rem}
    .stu-card{padding:.85rem;border-radius:14px}
}
</style>

<section class="mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center con-title mt-4">
                <h2 class="wow fadeInLeft animated my-4" data-wow-delay=".60s"> Student Details of <span>@if(!empty($config->instituteName)){{ $config->instituteName }}@else Jahanara Ayub Academy @endif</span></h2>
            </div>
        </div>

        @php
            // Preload lookup maps to avoid repeated queries in loop
            $sessions = \App\Models\sessionManage::all()->keyBy('id');
            $classes = \App\Models\classManage::all()->keyBy('id');
            $sections = \App\Models\sectionManage::all()->keyBy('id');
            $departments = \App\Models\Department::all()->keyBy('id');
        @endphp

        @if(!empty($Datakey) && count($Datakey))
            <div class="stu-grid">
                @foreach($Datakey as $std)
                    @php
                        $fullName = trim(($std->fullName ?? '').' '.($std->sureName ?? ''));
                        $fullName = $fullName !== '' ? $fullName : 'Unknown';
                        $sessionName = optional($sessions[$std->sessName] ?? null)->session ?? '-';
                        $className = optional($classes[$std->className] ?? null)->className ?? '-';
                        $sectionName = optional($sections[$std->sectionName] ?? null)->section ?? '-';
                        $deptName = optional($departments[$std->departmentName] ?? null)->departmentName ?? '-';
                        $photo = !empty($std->avatar)
                                ? env('APP_URL').'/public/upload/image/student/'.rawurlencode(basename($std->avatar))
                                : env('APP_URL').'/public/avatar.png';
                    @endphp
                    <div class="stu-card">
                        <div class="stu-photo-wrap">
                            <img class="stu-photo" src="{{ $photo }}" alt="{{ e($fullName) }}" loading="lazy">
                        </div>
                        <h3 class="stu-name">{{ e($fullName) }}</h3>
                        <div class="stu-meta">
                            <div class="row"><i class="fa-solid fa-id-badge"></i><span>{{ e($std->stdId ?? '-') }}</span></div>
                            <div class="row"><i class="fa-solid fa-calendar"></i><span>{{ e($sessionName) }}</span></div>
                            <div class="row"><i class="fa-solid fa-graduation-cap"></i><span>{{ e($className) }}</span></div>
                            <div class="row"><i class="fa-solid fa-diagram-project"></i><span>{{ e($deptName) }}</span></div>
                            <div class="row"><i class="fa-solid fa-people-group"></i><span>{{ e($sectionName) }}</span></div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info my-4">Sorry! No student data found</div>
        @endif
    </div>
</section>

@endsection