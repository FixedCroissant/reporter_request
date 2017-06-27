@extends('layout.master')
@section('content')
<!--Keyboard icon provided by http://xahlee.info/kbd/keyboard_enter_key_symbol.html-->
{!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js') !!}

<div class="adjust-middle">
    <p>
        Please provide the below information so that we may create a Reporter Instance for you. The fields marked with a <span class="red">*</span> mark are required elements that are necessary
        for properly submitting this form to DASA Technology.
        <br/>
        <br/>
        <div class="roundedBorder">
                Required fields are indicated by <span style="color:red;">*</span>
        </div>
    </p>
    <!--Errors-->
    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                @foreach ($errors->all() as $error)
                    {!! $error !!}
                    <br/>
                @endforeach
            </div>
        @endif
    </div>
    <div class="row">
       &nbsp;@if (Session::get('message'))
            <div class="alert alert-info">
                @if(is_array(json_decode(Session::get('message'),true)))
                    {!! implode('', Session::get('message')->all(':message<br/>')) !!}
                @else
                    {!! Session::get('message') !!}
                @endif
            </div>
        @endif
    </div>
    <div class="row">
        &nbsp;&nbsp;
    </div>
    <!--End Errors-->
    {!!  Form::open(array('route' => 'front.help.review', 'class'=>'form-horizontal', 'id'=>'submissionForm', 'style'=>'')) !!}
    <div class="form-group">
        {!! Form::label('user_unity_id','Your UnityID:',array('class'=>'control-label col-sm-3 required-after ')) !!}
        <div class="col-sm-9">
            {!! Form::text('user_unity_id','',array('class'=>'form-control','maxlength'=>'8')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('user_first_name','Your First Name:',array('class'=>'control-label col-sm-3 required-after ')) !!}
        <div class="col-sm-3">
            {!! Form::text('user_first_name','',array('class'=>'form-control')) !!}
        </div>

        {!! Form::label('user_last_name','Your Last Name:',array('class'=>'control-label col-sm-3 required-after ')) !!}
        <div class="col-sm-3">
            {!! Form::text('user_last_name','',array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('user_email_address','Your E-Mail Address:',array('class'=>'control-label col-sm-3 required-after ')) !!}
        <div class="col-sm-9">
            {!! Form::text('user_email_address','',array('class'=>'form-control','placeholder'=>'wolf@ncsu.edu')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('college_division','College/Division Prefix:',array('class'=>'control-label col-sm-3 required-after ')) !!}
        <div class="col-sm-9">
        {!! Form::text('college_division','DASA',array('class'=>'form-control','readonly'=>TRUE)) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('department_unit','Department/Unit or Course Number:',array('class'=>'control-label col-sm-3 required-after ')) !!}
        <div class="col-sm-9">
        {!! Form::text('department_unit',null,array('class'=>'form-control')) !!}

        </div>
    </div>
    <div class="form-group">
        {!! Form::label('ext_course_num','Extended Course Number (Optional):',array('class'=>'control-label col-sm-3 ')) !!}
        <div class="col-sm-9">
        {!! Form::text('ext_course_num',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('status','Status:',array('class'=>'control-label col-sm-3 required-after ')) !!}
        <div class="col-sm-9">
        {!! Form::select('status',$status,'',array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('visibility','Visibility:',array('class'=>'control-label col-md-3 required-after ')) !!}
        <div class="col-md-9">
        {!! Form::select('visibility',$visibility,'',array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('official_title','Official Title:',array('class'=>'control-label col-sm-3 required-after ')) !!}
        <div class="col-sm-9">
        {!! Form::text('official_title',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('working_title','Working Title:',array('class'=>'control-label col-sm-3 required-after ')) !!}
        <div class="col-sm-9">
        {!! Form::text('working_title',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('course_description','Course Description:',array('class'=>'control-label col-sm-3 required-after ')) !!}
        <div class="col-sm-9">
        {!! Form::textarea('course_description',null,array('class'=>'form-control','rows'=>'5')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('course_catalog_excerpt','Course Catalog Excerpt:',array('class'=>'control-label col-sm-3 required-after ')) !!}
        <div class="col-sm-9">
        {!! Form::textarea('course_catalog_excerpt',null,array('class'=>'form-control','rows'=>'5')) !!}
        </div>
    </div>
    <div id="ouc">
        <div class="form-group">
            {!! Form::label('department','Department:',array('class'=>'control-label col-sm-3 required-after ')) !!}
            <div class="col-sm-9">
            {!! Form::select('department',$universityDepartments,'',array('class'=>'form-control')) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('unit_ouc','Unit OUC:',array('class'=>'control-label col-sm-3 required-after ')) !!}
            <div class="col-sm-9">
            {!! Form::select('unit_ouc',$ouc_standard_list,'',array('class'=>'form-control')) !!}
            </div>
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('instructional_hours','Instructional Hours:',array('class'=>'control-label col-sm-3 required-after ')) !!}
        <div class="col-sm-9">
        {!! Form::selectRange('instructional_hours',0,15,array('class'=>'control-form')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('certificate_program_name','Certificate Program Name:',array('class'=>'control-label col-sm-3 ')) !!}
        <div class="col-sm-9">
        {!! Form::text('certificate_program_name',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('course_keywords','Keywords for Course Catalog Search:',array('class'=>'control-label col-sm-3 required-after ')) !!}
        <div class="col-sm-9">
        {!! Form::text('course_keywords',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('subject_area_course_catalog','Subject Area for Course Catalog:',array('class'=>'control-label col-sm-3 required-after ')) !!}
        <div class="col-sm-9">
        {!! Form::select('subject_area_course_catalog',$subject_areas,'',array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('course_instructors','List Course Instructors:',array('class'=>'control-label col-sm-3 required-after ')) !!}
        <div class="col-sm-9">
        <br/>
        <br/>
         UnityID of the Instructors of the Class:
        <br/>
            Please enter UnityID of your instructor and press <kbd>Enter ↵</kbd> to look for that individual.
        <br/>
        <br/>
         <!--Search for or Add new Instructor-->
          <!--Load App-->
            <div id="lookUpArea">
                <!-- Create a binding between the searchString model and the text field -->
                <input class="form-control col-md-6" v-model="searchString" v-on:keyup.enter="fetchData" placeholder="UnityID Please..." maxlength="8"/>
                <div class="over-flow-list">
                    <br/>
                    <div style="display:block;">
                                <br/>
                                Current list of instructors to be submitted in this request:
                                <br/>
                                <span>
                                    <li  is="user-item"  v-for="(key,index)user in checkedNames" v-bind:name="user" v-on:remove="checkedNames.splice(index, 1)">
                                        <span style="font-weight:bold;">@{{ index.dept }}</span>&nbsp;  @{{ index.firstname }} &nbsp; @{{ index.lastname }}  (@{{ index.unityid }})
                                        <input type="hidden" name="instructor[]" value="@{{ index.dept }} @{{ index.firstname }} @{{ index.lastname }} (@{{ index.unityid }})"/>
                                        <span v-on:click="checkedNames.splice(index, 1)"class="btn btn-sm btn-danger"> REMOVE</span>
                                    </li>
                                    <p v-for="messages in message" style="font-weight:bold;">
                                        @{{ messages.messageItem }}
                                    </p>
                                </span>
                                <br/>
                    </div>
                </div>
            </div>
            <!--End Load-->
            <!--Load Script-->
            {!!  HTML::script('/js/app.js') !!}
        </div>
    </div>
    <div class="row">
        &nbsp;
    </div>
    <div class="row">
        &nbsp;&nbsp; {!! Form::label('additional_information','Any additional Information you would to provide:',array('class'=>'control-label col-sm-3 ')) !!}
        <div class="col-sm-9">
            {!!  Form::textarea('additional_information', ' ',array('class'=>'form-control')) !!}
    </div>
    <div class="row push-down">
        &nbsp;&nbsp;&nbsp;
    </div>

    <div class="form-group">

        <div class="col-sm-9 push-down">
            {!! Form::submit('Review Request',array('class'=>'btn btn-primary')) !!}
            {!! Form::reset('Clear form',array('class'=>'btn')) !!}
        </div>
    </div>
    {!! Form::close() !!}

</div>

</div>
<!--Get Merged JS-->

{!! HTML::script('js/all.js') !!}
@endsection
