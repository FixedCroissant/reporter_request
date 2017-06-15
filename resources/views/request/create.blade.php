@extends('layout.master')
@section('content')

<div class="adjust-middle">
    {!! Form::open(array('route'=>'store'),array('class'=>'form-horizontal')) !!}

    <div class="form-group">
        {!! Form::label('college_division','College/Division Prefix',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::text('college_division',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('department_unit','Department/Unit or Course Number',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::text('course_number',null,array('class'=>'form-control')) !!}

        </div>
    </div>
    <div class="form-group">
        {!! Form::label('ext_course_num','Extended Course Number (Optional)',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::text('ext_course_num',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('status','Status',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::select('status',$status,'',array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('visibility','Visibility',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::select('visibility',$visibility,'',array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('official_title','Official Title',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::text('official_title',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('working_title','Working Title',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::text('working_title',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('course_description','Course Description',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::textarea('course_description',null,array('class'=>'form-control','rows'=>'5')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('course_catalog_excerpt','Course Catalog Excerpt',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::textarea('course_catalog_excerpt',null,array('class'=>'form-control','rows'=>'5')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('department','Department',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::select('department',$universityDepartments,'',array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('unit_ouc','Unit OUC',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::select('unit_ouc',$ouc_standard_list,'',array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('instructional_hours','Instructional Hours',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::text('instructional_hours',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('certificate_program_name','Certificate Program Name',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::text('certificate_program_name',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('course_keywords','Keywords for Course Catalog Search',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::text('course_keywords',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('subject_area_course_catalog','Subject Area for Course Catalog',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::select('subject_area_course_catalog',$subject_areas,'',array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('course_administrators','List Course Administrators',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::select('course_administrators',$visibility,'',array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="row">
        &nbsp;
    </div>
    <div class="row">
        &nbsp;
    </div>
    <div class="row">
        &nbsp;
    </div>
    <div class="row">
        &nbsp;
    </div>
    <div class="form-group">

        <div class="col-sm-9">
            {!! Form::submit('Submit Request',array('class'=>'btn')) !!}
            {!!   Form::reset('Clear form',array('class'=>'btn')) !!}

        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
