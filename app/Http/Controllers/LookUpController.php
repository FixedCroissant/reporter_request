<?php namespace App\Http\Controllers;

use App\Classes\LDAPLookUpClass;

/**
 * Class LDAPMentorController
 * @package App\Http\Controllers\Frontend
 */
class LookUpController extends Controller {

    /*
     * Function that pulls information in from LDAP
     */
    public function index($unityIDRequested){

        //If an empty input is provided, let the user know based on the results.
        if(empty($unityIDRequested)){
            //Return this value
            echo json_encode(
                array(
                    'departmentnumber'=> 'NO UNITY ID PROVIDED',
                    'collegeName'=>'NO UNITY ID PROVIDED',
                    'givenname'=> 'NO UNITY ID PROVIDED',
                    'sn'=>'NO UNITY ID PROVIDED'
                ));
        }
        else{
                            //Development
                            //$LDAP = new LDAPLookUpClass("192.168.33.10",'389');
                            //Production
                            $LDAP = new LDAPLookUpClass(env('LDAP_HOST', '192.168.33.10'),'389');

            $results =  $LDAP->connectToLDAP($unityIDRequested);

            //This is pulling information from my development LDAP instance.
            for($i=0;$i<$results['count'];$i++)
            {
                //Look for department number an associate it with the college it represents.
                if(!is_null($results[0]["departmentnumber"][0]))
                {
                    //Return this value
                    echo json_encode(
                        array(
                            'departmentnumber'=> $results[0]["departmentnumber"][0],
                            'departmentName'=>$results[0]['ncsuaffiliation'][0],
                            'givenname'=> $results[0]["givenname"][0],
                            'sn'=> $results[0]["sn"][0]
                        ));
                }/*End is not null*/
            }/*close for loop*/

            //If no results are found given the Unity ID provided list it in the message.
            if($results==0){
                //Return this value
                echo json_encode(
                    array(
                        'departmentnumber'=> 'No Results Found given UnityID',
                        'collegeName'=>'No Results Found given UnityID',
                        'givenname'=> 'No Results Found given UnityID',
                        'sn'=>'No Results Found given UnityID'
                    ));
            }
        }
    }
}
