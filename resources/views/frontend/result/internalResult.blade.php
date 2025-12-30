@extends('frontend.include')
@section('fronttitle')
Internal Result
@endsection
@section('frontcontent')
 <section class="container mt-4">
    <div class="row">
        <div class="col-10 mx-auto text-center con-title mt-4">
            <h2 class="hedingAbout wow fadeInLeft animated my-4" data-wow-delay=".60s">Internal <span> Result</span> </h2>
        </div>
    </div>
    <div calss="row">
        <div class="col-10 mx-auto my-4">
            <div class="card">
                <div class="card-header">
                    Internal Result List 
                </div>
                <div class="card-body">
                    <!-- On tables -->
                        <form method="GET" action="{{ route('internalResult') }}" class="row g-3 mb-3">
                            <div class="col-12 col-md-3">
                                <label class="form-label">Class</label>
                                <select name="class" class="form-select">
                                    <option value="">All</option>
                                    @isset($classes)
                                        @foreach($classes as $c)
                                            <option value="{{ $c->id }}" @if(!empty($filters['class']) && (int)$filters['class']===(int)$c->id) selected @endif>
                                                {{ $c->className }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div class="col-12 col-md-3">
                                <label class="form-label">Section</label>
                                <select name="section" class="form-select">
                                    <option value="">All</option>
                                    @isset($sections)
                                        @foreach($sections as $s)
                                            <option value="{{ $s->id }}" @if(!empty($filters['section']) && (int)$filters['section']===(int)$s->id) selected @endif>
                                                {{ $s->section }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div class="col-12 col-md-3">
                                <label class="form-label">Department</label>
                                <select name="department" class="form-select">
                                    <option value="">All</option>
                                    @isset($depts)
                                        @foreach($depts as $d)
                                            <option value="{{ $d->id }}" @if(!empty($filters['department']) && (int)$filters['department']===(int)$d->id) selected @endif>
                                                {{ $d->departmentName }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div class="col-12 col-md-3">
                                <label class="form-label">Session</label>
                                <select name="session" class="form-select">
                                    <option value="">All</option>
                                    @isset($sessions)
                                        @foreach($sessions as $ss)
                                            <option value="{{ $ss->id }}" @if(!empty($filters['session']) && (int)$filters['session']===(int)$ss->id) selected @endif>
                                                {{ $ss->session }}
                                            </option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div class="col-12 d-flex gap-2">
                                <button type="submit" class="btn btn-success">Filter</button>
                                <a href="{{ route('internalResult') }}" class="btn btn-outline-secondary">Reset</a>
                            </div>
                        </form>
                    <table id="myTable" class="display border" >
                        <thead>
                            <tr>
                                <th>Semister</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Department</th>
                                <th>Session</th>
                                <th>Publish Date</th>
                                <th>View</th>
                            </tr> 
                        </thead>
                        <tbody>
                        @if(isset($Datakey) && $Datakey->count() > 0)
                            @foreach($Datakey as $data)
                                <tr>
                                    <td>{{ $data->title ?? 'N/A' }}</td>
                                    @php 
                                        $itemClass      = !empty($data->assignClass) ? \App\Models\classManage::find($data->assignClass) : null;
                                        $itemSection    = !empty($data->assignSection) ? \App\Models\sectionManage::find($data->assignSection) : null;
                                        $itemDepartment = !empty($data->assignDepartment) ? \App\Models\Department::find($data->assignDepartment) : null;
                                        $itemSession    = !empty($data->assignSession) ? \App\Models\sessionManage::find($data->assignSession) : null;
                                    @endphp
                                    <td>{{ $itemClass->className ?? '—' }}</td>
                                    <td>{{ $itemSection->section ?? '—' }}</td>
                                    <td>{{ $itemDepartment->departmentName ?? '—' }}</td>
                                    <td>{{ $itemSession->session ?? '—' }}</td>
                                    <td>{{ $data->created_at ?? '' }}</td>
                                    <td>
                                        @if(!empty($data->attachment))
                                            <a data-fancybox data-type="iframe" href="{{ config('app.url') }}/public/upload/image/cultivation/internalResult/{{ $data->attachment }}" target="_blank">
                                                <i class="fa fa-eye" style="color: green;"></i>
                                            </a>
                                        @else
                                            <span class="text-muted">No file</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif        
                        </tbody>
                    </table>                         
                </div>
            </div>
        </div>
    </div>
</section>
@endsection