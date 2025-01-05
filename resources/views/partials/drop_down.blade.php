<!--------Filter  bar START--------->
<form id="filterForm" method="POST" action="{{ Request::path() }}">
    @csrf
    <input type="hidden" id="customType" name="type">
<div class="row filter-label-row">
    <div class="col-sm-12 col-md-2 p-2">
        <div class="mb-3">
            <label>Report Type</label>
            <select class="form-select" id="report-type-select" disabled>
                <option>Live</option>
                <option>Census</option>
            </select>
        </div>
    </div>
    <div class="col-sm-12 col-md-2 p-2">
        <div class="mb-3">
            <label>School Type</label>
            <select class="form-select" id="School-type-select" name="school_type">
{{--                <option>School Type</option>--}}
                @foreach($dropdownData['school_types'] as $type)
                    <option {{ $type->imis_st_id == $dropdownData['request']['school_type'] ? 'selected' : '' }} value="{{$type->imis_st_id}}">{{$type->imis_st_short_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-12 col-md-2 p-2">
        <div class="mb-3">
            <label>All District</label>
            <select class="form-select" id="district-select" name="district" {{ auth()->user()->hasRole('District') && auth()->user()->district ? 'disabled' : '' }}>
                <option value="">All District</option>
                @foreach($dropdownData['districts'] as $district)
                    <option {{ $district->d_id == $dropdownData['request']['district'] ? 'selected' : '' }} value="{{$district->d_id}}">{{$district->d_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-12 col-md-2 p-2">
        <div class="mb-3">
            <label>All Tehsils</label>
            <select class="form-select" id="tehsils-select" name="tehsil">
                <option value="">All Tehsils</option>
                @foreach($dropdownData['tehsils'] as $tehsil)
                    <option {{ $tehsil->t_id == $dropdownData['request']['tehsil'] ? 'selected' : '' }} value="{{$tehsil->t_id}}">{{$tehsil->t_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    @if($dropdownData['request']['school_type'] == 1)
    <div class="col-sm-12 col-md-2 p-2">
        <div class="mb-3">
            <label>All Marakez</label>
            <select class="form-select" id="marakez-select" name="markaz">
                <option value="">All Marakez</option>
                @foreach($dropdownData['markaz'] as $markaz)
                    <option {{ $markaz->m_id == $dropdownData['request']['markaz'] ? 'selected' : '' }} value="{{$markaz->m_id}}">{{$markaz->m_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-12 col-md-2 p-2">
        <div class="mb-3">
            <label>EMIS CODE</label>
            <select class="form-select" id="emis-code-select" name="emis_code">
                <option value="">EMIS CODE</option>
                @foreach($dropdownData['emis_code'] as $emis_code)
                    <option {{ $emis_code->emis_code == $dropdownData['request']['emis_code'] ? 'selected' : '' }} value="{{$emis_code->emis_code}}">{{$emis_code->emis_code}}</option>
                @endforeach
            </select>
        </div>
    </div>
    @endif
</div>
</form>
