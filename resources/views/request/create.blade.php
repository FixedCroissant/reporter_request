@extends('layout.master')
@section('content')
{!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js') !!}
<div class="adjust-middle">
    <p>
        Please provide the below information so that we may create a Reporter Instance for you. The fields marked with a <span class="red">*</span> mark are required elements that are necessary
        for properly submitting this form to DASA Technology.
    </p>
    <div class="form-group">
        {!! Form::label('college_division','College/Division Prefix:',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::text('college_division',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('department_unit','Department/Unit or Course Number:',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::text('course_number',null,array('class'=>'form-control')) !!}

        </div>
    </div>
    <div class="form-group">
        {!! Form::label('ext_course_num','Extended Course Number (Optional):',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::text('ext_course_num',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('status','Status:',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::select('status',$status,'',array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('visibility','Visibility:',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::select('visibility',$visibility,'',array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('official_title','Official Title:',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::text('official_title',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('working_title','Working Title:',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::text('working_title',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('course_description','Course Description:',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::textarea('course_description',null,array('class'=>'form-control','rows'=>'5')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('course_catalog_excerpt','Course Catalog Excerpt:',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::textarea('course_catalog_excerpt',null,array('class'=>'form-control','rows'=>'5')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('department','Department:',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::select('department',$universityDepartments,'',array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('unit_ouc','Unit OUC:',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::select('unit_ouc',$ouc_standard_list,'',array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('instructional_hours','Instructional Hours:',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::text('instructional_hours',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('certificate_program_name','Certificate Program Name:',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::text('certificate_program_name',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('course_keywords','Keywords for Course Catalog Search:',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::text('course_keywords',null,array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('subject_area_course_catalog','Subject Area for Course Catalog:',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        {!! Form::select('subject_area_course_catalog',$subject_areas,'',array('class'=>'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('course_administrators','List Course Administrators:',array('class'=>'control-label col-sm-3')) !!}
        <div class="col-sm-9">
        <br/>
        <br/>
         Search to locate a or Enter a New Course Administrator:
        <br/>
         <!--Search for or Add new Administrator-->
          <!--Load App-->
            <div id="lookUpArea">
                <p>Please check current NC State member:</p>
                <!-- Create a binding between the searchString model and the text field -->
                <input type="text" v-model="searchString" v-on:keyup.enter="fetchData" placeholder="unityID Please..." />
                <div class="over-flow-list">
                    <ul>
                        <li v-for="users in filteredUsers">
                            <p>@{{users.title}}</p>
                            <input type="checkbox" id="checkbox" v-bind:value="users.firstname" v-model="checkedNames">&nbsp; &nbsp; @{{users.firstname}}
                        </li>
                    </ul>
                    <!--Create new user that may not be found in the lookup-->
                    User not found? <br/>
                    Please add individual here:
                    <br/>
                    (Last Name, First Name)
                    <br/>
                    <input v-model="manualStudent" v-on:keyup.enter="adminUserNotFound" placeholder="Add a New User"/>
                    <br/>
                    <br/>
                    Your list of administrators to be submitted in this request:
                    <br/>
                    <span>Checked names: @{{ checkedNames }}</span>
                    <br/>
                    <li  is="user-item"  v-for="(key, index) in checkedNames" v-bind:key="manualStudent" v-bind:name="key" v-on:remove="checkedNames.splice(index, 1)"></li>

                   <user-list></user-list>
                </div>
            </div>
            <!--End Load-->
            <!--Load Script-->
            {!!  HTML::script('/js/app.js') !!}
        </div>
    </div>
    <div class="row">
        &nbsp;&nbsp;
    </div>
    <div class="row">
        &nbsp;&nbsp;
    </div>
    <div class="row">
        &nbsp;&nbsp;
    </div>
    <div class="row">
        &nbsp;&nbsp;
    </div>
    <div class="form-group">

        <div class="col-sm-9">
            {!! Form::submit('Submit Request',array('class'=>'btn')) !!}
            {!! Form::reset('Clear form',array('class'=>'btn')) !!}

        </div>
    </div>

</div>
@endsection
