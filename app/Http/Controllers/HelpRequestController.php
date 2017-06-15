<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

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
        $standardOUCS = array(''=>'Please select OUC ....');

        //Go to view
        Return view('request.create')->with(array('ouc_standard_list'=>$standardOUCS,'universityDepartments'=>$departments,'status'=>$myStatuses,'visibility'=>$visibility,'subject_areas'=>$subjectAreas));
	}

	/**
     * Store information into the database
     */
	public function store(){


    }
}
