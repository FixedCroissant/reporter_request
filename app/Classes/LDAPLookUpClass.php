<?php

namespace App\Classes;


class LDAPLookUpClass
{
    //Variables
    private $connHost;
    private $connPort;

    function __construct($host,$port){
        $this->connHost = $host;
        $this->connPort = $port;
    }

    //Set the Connection address for the connection to the LDAP server.
    public function setConnection ($host,$port){
        $this->connHost = $host;
        $this->connPort = $port;
    }


    public function getHost()
    {
        return $this->connHost;
    }


    /*
     * Connect to LDAP Server and specifically find all the information
     * provided by the person's provided UnityID.
     * @param String $unityID
     */
    public function connectToLDAP($UnityID)
    {
        //Filter to Search
        //In production this will be unityID
        //dev
        //$filter = "employeeNumber=".$UnityID;
        //prod -- hard coded to my UnityID.
        //$filter= "uid=jjwill10";
        //production
        $filter= "uid=".$UnityID;

        //Connect to LDAP
        $ldapconn = ldap_connect($this->connHost,$this->connPort);

        //Check the connection.
        if(!$ldapconn)
        {
            die('Unable to connect to LDAP');
        }

        ldap_set_option($ldapconn,LDAP_OPT_PROTOCOL_VERSION,3);

        //Bind user name, pass
        //Anonymous Bind
        $dn  = ldap_bind($ldapconn);

        //dev
        //$justthese=array('cn');


        $valuesNeeded = array(

        );

        //Search
        //Second Parameter for NCSU is  ou=employees,ou=people,dc=ncsu,dc=edu.
        //$search = ldap_search($ldapconn,"dc=test,dc=com",$filter,$justthese,0,10);
        //Production
        $search = ldap_search($ldapconn,"ou=employees,ou=people,dc=,dc=edu",$filter,$valuesNeeded,0,10);

        //Get Results
        $results = ldap_get_entries($ldapconn,$search);

        //return dd($results);

        //Development Instance of LDAP
        for($i=0;$i<$results['count'];$i++)
        {
            //print $results[$i]['departmentNumber'][0];

            //print $results[0]["departmentnumber"][0]."<b>".$results[$i]["givenname"][0].$results[$i]["sn"][0]."</b>".$results[$i]["telephonenumber"][0].$results[$i]["mail"][0];
        }


        //Iterate over all the results
        /*for ($i=0;$i < $results['count'];$i++)
        {
            //Total Entries
            echo $results['count'].'entries total';
        }*/

        //Production get results.
        /*for($i=0;$i<$results['count'];$i++)
        {
            print $results[$i]["departmentnumber"][0]."<b>".$results[$i]["givenname"][0].$results[$i]["sn"][0]."</b>".$results[$i]["telephonenumber"][0].$results[$i]["ncsuaffiliation"][0].$results[$i]["ncsuprimaryemail"][0];
        }*/

        //return dd('look above');
        //Check for no results given the unityID
        if($results['count']==0)
        {
            return $results=0;
        }
        //End check for no results per UnityID



        return $results;
    }
}