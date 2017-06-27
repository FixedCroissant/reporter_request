<html>
<head>
    {!! HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') !!}
</head>
Dear DASA Tech Services,
<br/>
<br/>
<p>
    A new request to create a separate <strong>REPORTER</strong> class has been submitted.
</p>
<br/>
The details of this request is as follows:
<body>
<table class="table table-striped">
    <tr>
        <td>
            User UnityID
        </td>
        <td>
            {{$user_unity_id}}
        </td>
    </tr>
    <tr>
        <td>
            User First & Last name:
        </td>
        <td>
            {{$user_first_name}} {{$user_last_name}}
        </td>
    </tr>
    <tr>
        <td>
            User E-Mail:
        </td>
        <td>
            {{$user_email_address}}
        </td>
    </tr>
    <tr>
        <td>
            College/Division Prefix:
        </td>
        <td>
            {{$college_division}}
        </td>
    </tr>
    <tr>
        <td>
            College/Division Prefix:
        </td>
        <td>
            {{$college_division}}
        </td>
    </tr>
    <tr>
        <td>
           Department/Unit or Course Number:
        </td>
        <td>
        {{$department_unit}}
        </td>
    </tr>
    <tr>
        <td>
           Extended Course Number:
        </td>
        <td>
            {{$ext_course_num}}
        </td>
    </tr>
    <tr>
        <td>
            Status:
        </td>
        <td>
            {{$status}}
        </td>
    </tr>
    <tr>
        <td>
            Visibility:
        </td>
        <td>
            {{$visibility}}
        </td>
    </tr>
    <tr>
        <td>
            Official Title:
        </td>
        <td>
            {{$official_title}}
        </td>
    </tr>
    <tr>
        <td>
           Working Title:
        </td>
        <td>
            {{$working_title}}
        </td>
    </tr>
    <tr>
        <td>
            Course Description:
        </td>
        <td>
            {{$course_description}}
        </td>
    </tr>
    <tr>
        <td>
            Course Catalog Excerpt:
        </td>
        <td>
            {{$course_catalog_excerpt}}
        </td>
    </tr>
    <tr>
        <td>
           Department:
        </td>
        <td>
            {{$department}}
        </td>
    </tr>
    <tr>
        <td>
            Unit OUC:
        </td>
        <td>
            {{$unit_ouc}}
        </td>
    </tr>
    <tr>
        <td>
            Instructional Hours:
        </td>
        <td>
            {{$instructional_hours}}
        </td>
    </tr>
    <tr>
        <td>
            Certificate Program Name:
        </td>
        <td>
            {{$certification_program_name}}
        </td>
    </tr>
    <tr>
        <td>
            Keywords for Catalog Search:
        </td>
        <td>
            {{$course_keywords}}
        </td>
    </tr>
    <tr>
        <td>
            Subject Area for Catalog Search:
        </td>
        <td>
            {{$subject_area_course_catalog}}
        </td>
    </tr>
    <tr>
        <td>
            List of Course Instructors:
        </td>
        <td>
            @foreach($instructor as $myInstructors)
                {{$myInstructors}}
                <br/>
            @endforeach
        </td>
    </tr>
    <tr>
        <td>
            Additional Information Provided by this Request:
        </td>
        <td>
            {{$additional_information}}
        </td>
    </tr>
</table>
<br/>

</body>
</html>