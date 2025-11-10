@extends('frontend.include')
@section('fronttitle')
Lecturer
@endsection
@php
$config =App\Models\ServerConfig::first()
@endphp
@section('frontcontent')
<style>
    /* Scoped styles for the lecturer cards */
    .lecturer-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:1.15rem;margin-top:1.25rem}
    .lect-card{position:relative;background:#ffffff;border:1px solid #e8eef5;border-radius:16px;padding:1rem;display:flex;flex-direction:column;box-shadow:0 6px 18px rgba(0,0,0,.06);transition:.28s ease;overflow:hidden}
    .lect-card::before{content:'';position:absolute;inset:0;background:linear-gradient(135deg,#198754 0%,#106842 100%);opacity:0;transition:.35s}
    .lect-card:hover::before{opacity:.07}
    .lect-card:hover{transform:translateY(-4px);box-shadow:0 14px 30px -6px rgba(0,0,0,.18)}
    .lect-photo-wrap{width:100%;display:flex;justify-content:center;margin-bottom:.6rem}
    .lect-photo{width:108px;height:108px;border-radius:50%;object-fit:cover;border:4px solid #f3f6f9;box-shadow:0 0 0 2px #198754;transition:.35s}
    .lect-card:hover .lect-photo{box-shadow:0 0 0 4px #0d5e39}
    .lect-name{font-size:1.03rem;font-weight:800;margin:0;display:flex;align-items:center;gap:.4rem;color:#15392a}
    .lect-id{font-size:.64rem;font-weight:700;letter-spacing:.07em;text-transform:uppercase;color:#198754;background:#e8f7f1;padding:3px 7px;border-radius:6px}
    .lect-designation{font-size:.82rem;font-weight:600;color:#4b5563;margin-top:.35rem}
    .lect-contact{margin-top:.55rem;display:grid;grid-template-columns:1fr;row-gap:4px;font-size:.72rem}
    .lect-contact span{display:flex;align-items:center;gap:6px;color:#38424d}
    .lect-contact i{color:#198754;font-size:.85rem}
    .lect-address{margin-top:.5rem;font-size:.68rem;line-height:1.25;color:#5b646d;display:flex;align-items:flex-start;gap:6px}
    .lect-actions{margin-top:.8rem;display:flex;gap:.5rem;flex-wrap:wrap}
    .lect-actions a{flex:1;text-align:center;font-size:.64rem;font-weight:700;text-decoration:none;padding:.52rem .6rem;border-radius:8px;border:1px solid #198754;color:#198754;background:#fff;transition:.23s}
    .lect-actions a:hover{background:#198754;color:#fff}
    @media(max-width:575.98px){
        .lecturer-grid{grid-template-columns:repeat(auto-fill,minmax(180px,1fr));gap:.85rem}
        .lect-card{padding:.85rem;border-radius:14px}
        .lect-photo{width:88px;height:88px}
        .lect-name{font-size:.96rem}
        .lect-designation{font-size:.72rem}
        .lect-contact{font-size:.66rem}
        .lect-address{font-size:.6rem}
        .lect-actions a{font-size:.58rem}
    }
</style>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12 text-center con-title mt-4">
            <h2 class="wow fadeInLeft animated my-4" data-wow-delay=".60s"> Let's have a look of <span>@if(!empty($config->instituteName)){{ $config->instituteName }}@else Jahanara Ayub Academy @endif</span> Teachers</h2>
       </div>
    </div>
    @if($Datakey->count()>0)
        <div class="lecturer-grid">
            @foreach($Datakey as $data)
                @php
                    $name = trim(($data->firstName ?? '').' '.($data->lastName ?? ''));
                    $name = $name !== '' ? $name : 'Unknown';
                    $designation = \App\Models\TeacherManagement::getDesignationName($data->designation ?? null);
                    $photo = !empty($data->avatar)
                        ? env('APP_URL').'/public/upload/image/teacher/'.rawurlencode(basename($data->avatar))
                        : env('APP_URL').'/public/avatar.png';
                @endphp
                <div class="lect-card">
                    <div class="lect-photo-wrap">
                        <img class="lect-photo" src="{{ $photo }}" alt="{{ e($name) }}" loading="lazy">
                    </div>
                    <h3 class="lect-name">{{ e($name) }}</h3>
                    @if(!empty($designation))
                        <div class="lect-designation">{{ e($designation) }}</div>
                    @endif
                    <div class="lect-contact">
                        @if(!empty($data->email))<span><i class="fa-solid fa-envelope"></i> {{ e($data->email) }}</span>@endif
                        @if(!empty($data->mobile))<span><i class="fa-solid fa-phone"></i> {{ e($data->mobile) }}</span>@endif
                    </div>
                    @if(!empty($data->address))
                        <div class="lect-address"><i class="fa-solid fa-location-dot"></i>{{ e($data->address) }}</div>
                    @endif
                    <div class="lect-actions">
                        <a href="#" aria-label="View profile"><i class="fa-regular fa-eye"></i> Profile</a>
                        @if(!empty($data->email))<a href="mailto:{{ e($data->email) }}" aria-label="Send email"><i class="fa-solid fa-paper-plane"></i> Email</a>@endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info my-4">Sorry! No data found</div>
    @endif
</div>





























@endsection