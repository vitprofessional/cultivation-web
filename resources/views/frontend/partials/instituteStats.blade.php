@php
    $insInfo = \App\Models\InstituteDetails::first();
@endphp
<div class="container-fluid">
    <div id="instituteStats" class="row scale-on-scroll">
        <div class="col-12 mx-auto my-4">
            @if($insInfo)
            <div class="row align-items-center">
                <div class="col-md-3 col-12 mb-3 mb-md-0">
                    <div class="bg-success text-white details-box p-3 h-100">
                        <div class="details-box-icon">
                            <i class="fa-duotone fa-school-flag"></i>
                        </div>
                        <div class="details-box-content">
                            <h3>Founded</h3>
                            @php
                                $foundedYear = '';
                                if(!empty($insInfo->establishDate)){
                                    try { $foundedYear = \Carbon\Carbon::parse($insInfo->establishDate)->format('Y'); }
                                    catch(Exception $e){ if(preg_match('/(19|20)\d{2}/',$insInfo->establishDate,$m)){ $foundedYear = $m[0]; } }
                                }
                            @endphp
                            <p>{{ $foundedYear }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12 mb-3 mb-md-0">
                    <div class="bg-success text-white details-box p-3 h-100">
                        <div class="details-box-icon">
                            <i class="fa-duotone fa-book-open-reader"></i>
                        </div>
                        <div class="details-box-content">
                            <h3>Green Campus</h3>
                            <p>{{ $insInfo->landSize }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12 mb-3 mb-md-0">
                    <div class="bg-success text-white details-box p-3 h-100">
                        <div class="details-box-icon">
                            <i class="fa-duotone fa-screen-users"></i>
                        </div>
                        <div class="details-box-content">
                            <h3>Teacher & Staff</h3>
                            <p>{{ $insInfo->totalTeacher }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="bg-success text-white details-box p-3 h-100">
                        <div class="details-box-icon">
                            <i class="fa-light fa-users-viewfinder"></i>
                        </div>
                        <div class="details-box-content">
                            <h3>Students</h3>
                            <p>{{ $insInfo->totalStudent }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="row align-items-center">
                <div class="col-md-3 col-12 mb-3 mb-md-0">
                    <div class="bg-success text-white details-box p-3 h-100">
                        <div class="details-box-icon">
                            <i class="fa-duotone fa-school-flag"></i>
                        </div>
                        <div class="details-box-content">
                            <h3>Founded</h3>
                            <p>2015</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12 mb-3 mb-md-0">
                    <div class="bg-success text-white details-box p-3 h-100">
                        <div class="details-box-icon">
                            <i class="fa-duotone fa-book-open-reader"></i>
                        </div>
                        <div class="details-box-content">
                            <h3>Green Campus</h3>
                            <p>26 Acres</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12 mb-3 mb-md-0">
                    <div class="bg-success text-white details-box p-3 h-100">
                        <div class="details-box-icon">
                            <i class="fa-duotone fa-screen-users"></i>
                        </div>
                        <div class="details-box-content">
                            <h3>Teacher & Staff</h3>
                            <p>25+</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="bg-success text-white details-box p-3 h-100">
                        <div class="details-box-icon">
                            <i class="fa-light fa-users-viewfinder"></i>
                        </div>
                        <div class="details-box-content">
                            <h3>Students</h3>
                            <p>1500+</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
