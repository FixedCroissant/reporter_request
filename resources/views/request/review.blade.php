@extends('layout.master')
@section('content')
{!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js') !!}
<div class="adjust-middle">
    <h3 class="reviewHeader">
        <span class = "reviewHeaderChild">REVIEW INFORMATION:</span>
    </h3>
    <p>
        Below is the information you have provided, please double-check it for accuracy.
        <br/>
        Please scroll down to submit your request to DASA Technology.
    </p>
    <div class="row">
       &nbsp;&nbsp;
    </div>
    <div class="row">
        &nbsp;&nbsp;
    </div>
    {!!  Form::open(array('route' => 'front.help.store', 'class'=>'form-horizontal', 'id'=>'submissionForm', 'style'=>'','method'=>'POST')) !!}
    <div class="form-group">
        {!! Form::label('user_unity_id','User UnityID:',array('class'=>'control-label col-sm-3 ')) !!}
        <div class="col-sm-9">
            {!! Form::text('user_unity_id',$reviewInformation->user_unity_id,array('class'=>'form-control just-text','readonly'=>TRUE)) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('user_first_name','First Name:',array('class'=>'control-label col-sm-3 required-after')) !!}
        <div class="col-sm-3">
            {!! Form::text('user_first_name',$reviewInformation->user_first_name,array('class'=>'form-control','readonly'=>TRUE)) !!}
        </div>

        {!! Form::label('user_last_name','Last Name:',array('class'=>'control-label col-sm-3 required-after')) !!}
        <div class="col-sm-3">
            {!! Form::text('user_last_name',$reviewInformation->user_last_name,array('class'=>'form-control','readonly'=>TRUE)) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('user_email_address','E-Mail Address:',array('class'=>'control-label col-sm-3 required-after')) !!}
        <div class="col-sm-9">
            {!! Form::text('user_email_address',$reviewInformation->user_email_address,array('class'=>'form-control','readonly'=>TRUE)) !!}
        </div>

    </div>
    <div class="form-group">
        {!! Form::label('college_division','College/Division Prefix:',array('class'=>'control-label col-sm-3  ')) !!}
        <div class="col-sm-9">
        {!! Form::text('college_division','DASA',array('class'=>'form-control just-text','readonly'=>TRUE)) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('department_unit','Department/Unit or Course Number:',array('class'=>'control-label col-sm-3  ')) !!}
        <div class="col-sm-9">
        {!! Form::text('department_unit',$reviewInformation->department_unit,array('class'=>'form-control','readonly'=>TRUE)) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('ext_course_num','Extended Course Number (Optional):',array('class'=>'control-label col-sm-3  ')) !!}
        <div class="col-sm-9">
        {!! Form::text('ext_course_num',$reviewInformation->ext_course_num,array('class'=>'form-control','readonly'=>TRUE)) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('status','Status:',array('class'=>'control-label col-sm-3  ')) !!}
        <div class="col-sm-9">
        {!! Form::text('status',$reviewInformation->status,array('class'=>'form-control','readonly'=>TRUE)) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('visibility','Visibility:',array('class'=>'control-label col-md-3  ','readonly'=>TRUE)) !!}
        <div class="col-md-9">
        {!! Form::text('visibility',$reviewInformation->visibility,array('class'=>'form-control','readonly'=>TRUE)) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('official_title','Official Title:',array('class'=>'control-label col-sm-3  ')) !!}
        <div class="col-sm-9">
        {!! Form::text('official_title',$reviewInformation->official_title,array('class'=>'form-control','readonly'=>TRUE)) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('working_title','Working Title:',array('class'=>'control-label col-sm-3  ')) !!}
        <div class="col-sm-9">
        {!! Form::text('working_title',$reviewInformation->working_title,array('class'=>'form-control','readonly'=>TRUE)) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('course_description','Course Description:',array('class'=>'control-label col-sm-3  ')) !!}
        <div class="col-sm-9">
        {!! Form::textarea('course_description',$reviewInformation->course_description,array('class'=>'form-control','rows'=>'5','readonly'=>TRUE)) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('course_catalog_excerpt','Course Catalog Excerpt:',array('class'=>'control-label col-sm-3  ')) !!}
        <div class="col-sm-9">
        {!! Form::textarea('course_catalog_excerpt',$reviewInformation->course_catalog_excerpt,array('class'=>'form-control','rows'=>'5','readonly'=>TRUE)) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('department','Department:',array('class'=>'control-label col-sm-3  ')) !!}
        <div class="col-sm-9">
        {!! Form::text('department',$reviewInformation->department,array('class'=>'form-control','readonly'=>TRUE)) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('unit_ouc','Unit OUC:',array('class'=>'control-label col-sm-3 ','readonly'=>TRUE)) !!}
        <div class="col-sm-9">
        {!! Form::text('unit_ouc',$reviewInformation->unit_ouc,array('class'=>'form-control','readonly'=>TRUE)) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('instructional_hours','Instructional Hours:',array('class'=>'control-label col-sm-3  ')) !!}
        <div class="col-sm-9">
        {!! Form::text('instructional_hours',$reviewInformation->instructional_hours,array('class'=>'form-control','readonly'=>TRUE)) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('certificate_program_name','Certificate Program Name:',array('class'=>'control-label col-sm-3  ')) !!}
        <div class="col-sm-9">
        {!! Form::text('certificate_program_name',$reviewInformation->certification_program_name,array('class'=>'form-control','readonly'=>TRUE)) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('course_keywords','Keywords for Course Catalog Search:',array('class'=>'control-label col-sm-3  ')) !!}
        <div class="col-sm-9">
        {!! Form::text('course_keywords',$reviewInformation->course_keywords,array('class'=>'form-control','readonly'=>TRUE)) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('subject_area_course_catalog','Subject Area for Course Catalog:',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::text('subject_area_course_catalog',$reviewInformation->subject_area_course_catalog,array('class'=>'form-control','readonly'=>TRUE)) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('course_instructors','List Course Instructors:',array('class'=>'control-label col-sm-3 ')) !!}
        <div class="col-sm-9">
        <br/>
         <!--Search for or Add new Instructor-->
          <!--Load App-->
            <div id="lookUpArea">
                @foreach($reviewInformation->instructor as $myInstructor)
                    <input type="text" class="form-control" readonly="true" name="instructor[]" value="{!!  $myInstructor !!}" />
                    <br/>
                @endforeach

            </div>
            <!--End Load-->
            <!--Load Script-->

        </div>
    </div>
    <div class="row">
        &nbsp;
    </div>
    <div class="row">
        &nbsp;&nbsp; {!! Form::label('additional_information','Any additional Information you would to provide:',array('class'=>'control-label col-sm-3 ')) !!}
        <div class="col-sm-9">
            {!!  Form::textarea('additional_information', $reviewInformation->additional_information,array('class'=>'form-control','readonly'=>TRUE)) !!}
    </div>
    <div class="row push-down">
        &nbsp;&nbsp;&nbsp;
    </div>

    <div class="form-group">

        <div class="col-sm-9 push-down">
            {!! Form::submit('Submit Request',array('class'=>'btn btn-primary')) !!}
        </div>
    </div>
    {!! Form::close() !!}

</div>

</div>
<!--Get Merged JS-->

{!! HTML::script('js/all.js') !!}
@endsection
