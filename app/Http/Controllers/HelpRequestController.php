<?php namespace App\Http\Controllers;

use App\Classes\LDAPLookUpClass;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
//Use mailer
use App\Mailers\AppMailer;
use Input;

class HelpRequestController extends Controller {


    /**
     * Show the listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //Go to the create route.
        return redirect()->route('create');
    }


    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Available statuses
	    $myStatuses = array(''=>'Please select your status...','Active'=>'Active','Inactive'=>'Inactive');
	    //Visibility
        $visibility = array(''=>'Please select your visibility...','Unpublished'=>'Unpublished','Published'=>'Published');
        //Subject Areas
        $subjectAreas = array(''=>'Please select your subject area...','Business and Economic Development'=>'Business and Economic Development','Environment, Energy and Natural Resources'=>'Environment, Energy and Natural Resources','Financial and Purchasing Management'=>'Financial and Purchasing Management','Human Resource and Leadership Development'=>'Human Resource and Leadership Development','Industry and Technology Solutions'=>'Industry and Technology Solutions','Information Technology'=>'Information Technology','Leadership and Professional Development'=>'Leadership and Professional Development','Research, Compliance, and Ethics'=>'Research, Compliance, and Ethics','Risk Management'=>'Risk Management','Safety and Security'=>'Safety and Security');
	    //University Departments
        $departments = array(''=>'Please select your department ...','Academic and Student Affairs-Reserve'=>'Academic and Student Affairs-Reserve','Academic and Student Affairs-Vice Chancellor and Dean'=>'Academic and Student Affairs-Vice Chancellor and Dean','Academic Programs and Services'=>'Academic Programs and Services',
            'Academic Support Program for Student Athletes'=>'Academic Support Program for Student Athletes',
            'Air Force ROTC'=>'Air Force ROTC',
            'Army ROTC'=>'Army ROTC',
            'Arts NC State'=>'Arts NC State',
            'Campus Life'=>'Campus Life',
            'Campus Life - University Housing'=>'Campus Life - University Housing',
            'Dance'=>'Dance',
            'Environmental Sciences'=>'Environmental Sciences',
            'First Year College'=>'First Year College',
            'Flexibility Carryover - Academic and Student Affairs'=>'Flexibility Carryover - Academic and Student Affairs',
            'Greek Life'=>'Greek Life',
            'Health and Exercise Studies'=>'Health and Exercise Studies',
            'Music'=>'Music',
            'Naval ROTC'=>'Naval ROTC',
            'Office of Assessment'=>'Office of Assessment',
            'Quality Enhancement Plan'=>'Quality Enhancement Plan',
            'Student Development, Health and Wellness'=>'Student Development, Health and Wellness',
            'University Honors Program'=>'University Honors Program',
            'University Scholars Program'=>'University Scholars Program',
            'University Theatre'=>'University Theatre',
            'University Transition Program'=>'University Transition Program');
        //Standard OUCS
        $standardOUCS = include('ouc_list.php');

        //Go to view
        Return view('request.create')->with(array('ouc_standard_list'=>$standardOUCS,'universityDepartments'=>$departments,'status'=>$myStatuses,'visibility'=>$visibility,'subject_areas'=>$subjectAreas));
	}

    /**
     * Review details prior to submitting information via e-mail.
     * @param Request $request
     */
	public function review(Request $request){
        //Need to verify all information is turned in.
        //validate
        //read more on validation at https://laravel.com/docs/5.0/validation
        $rules = array(
            'user_unity_id'=>'required',
            'user_first_name'=>'required',
            'user_last_name'=>'required',
            'user_email_address'=>'required|email',
            'college_division'=>'required',
            'department_unit'=>'required',
            'status'=>'required|max:100',
            'visibility'=>'required',
            'official_title'=>'required',
            'working_title'=>'required',
            'course_description'=>'required',
            'course_catalog_excerpt'=>'required',
            'department'=>'required',
            'unit_ouc'=>'required',
            'instructional_hours'=>'required',
            'course_keywords'=>'required',
            'subject_area_course_catalog'=>'required',


        );
        //Validator ...
        $validator = Validator::make(Input::all(),$rules);
        //process the creation of a symposium registration presenter
        if($validator->fails())
        {
            //If any valdiation errors, go back to the student registration page.
            return Redirect::back()->withErrors($validator)->withInput();

        }
        else{
            //Get Request Information
            return View('request.review')->with(array('reviewInformation'=>$request));
        }

    }

	/**
     * Store information into the database
     * In this case, instead of storing into the database, this method is altered to
     * send information out via a Mailer Class.
     */
	public function store(Request $request){
	    //Send Information Via E-mail.
        //Create new mailer.
        $mailer = app(AppMailer::class);

        //HANDLE E-MAIL NOTIFICATION
        //Information to Pass to my E-Mail Message as a Confirmation
        $data = array(
            'user_unity_id'=>$request['user_unity_id'],
            'user_first_name'=>$request['user_first_name'],
            'user_last_name'=>$request['user_last_name'],
            'user_email_address'=>$request['user_email_address'],
            'college_division'=>$request['college_division'],
            'department_unit'=>$request['department_unit'],
            'ext_course_num'=>$request['ext_course_num'],
            'status'=>$request['status'],
            'visibility'=>$request['visibility'],
            'official_title'=>$request['official_title'],
            'working_title'=>$request['working_title'],
            'course_description'=>$request['course_description'],
            'course_catalog_excerpt'=>$request['course_catalog_excerpt'],
            'department'=>$request['department'],
            'unit_ouc'=>$request['unit_ouc'],
            'instructional_hours'=>$request['instructional_hours'],
            'certification_program_name'=>$request['certification_program_name'],
            'course_keywords'=>$request['course_keywords'],
            'subject_area_course_catalog'=>$request['subject_area_course_catalog'],
            'additional_information'=>$request['additional_information'],
            'instructor'=>$request['instructor']

        );

        //Get Information on where to send the e-mail message.
        //TO TECH SERVICES.
        $EMAIL_TO_INFORMATION = array(
            'lastName'=>'Tech Services',
            'firstName'=>'DASA'
        );
        //View to use.
        $view='emails.notificationMessage';
        //Set view
        $mailer->setView($view);
        //Set subject
        $mailer->setMailSubject('DASA Reporter Request');
        //Set to address
        //This will notify DASA Tech
        $mailer->setTo('dasa-tech-help@ncsu.edu');
        //Set to Name
        $mailer->setToName($EMAIL_TO_INFORMATION['firstName'].' '.$EMAIL_TO_INFORMATION['lastName']);

        //Set the data that needs to be sent with the view.
        $mailer->setData($data);

        //Send mail via App\Mailer\AppMailer.
        //This will deliver the e-mail based on the criteria above.
        $mailer->sendMessage();
        //END E-MAIL NOTIFICATION

        //Email the individual who submitted the information a little thank you.
        //FOR THANK YOU MESSAGE
        $EMAIL_TO_INFORMATION_THANK_YOU = array(
            'to'=>$request['user_email_address'],
            'lastName'=>$request['user_last_name'],
            'firstName'=>$request['user_first_name']
        );

        //View to use.
        $view='emails.thankYouMessage';
        //Set view
        $mailer->setView($view);
        //Set subject
        $mailer->setMailSubject('DASA Reporter Request -- Submitted');
        //Set to address
        $mailer->setTo($EMAIL_TO_INFORMATION_THANK_YOU['to']);
        //Set to Name
        $mailer->setToName($EMAIL_TO_INFORMATION_THANK_YOU['firstName'].' '.$EMAIL_TO_INFORMATION_THANK_YOU['lastName']);

        //Set the data that needs to be sent with the view.
        $mailer->setData($data);


        //Send mail via App\Mailer\AppMailer.
        //This will deliver the e-mail based on the criteria above.
        $mailer->sendMessage();
        //END E-MAIL NOTIFICATION


        //Redirect back to the index with a notification message.
        return redirect()->route('create')->with('message','Your Request Has Been Sent! ');

    }
}
