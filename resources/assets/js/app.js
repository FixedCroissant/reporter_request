import Vue from 'vue';
//import Project from './Project.vue';
import lookup from './LookUp.vue';
//Allow to get information through AJAX lookup.
var request = require('request');

//Register Component
//User list.
var vue = new Vue({
    el: '#lookUpArea',
    components: { lookup },
    data:     {
          searchString: "",
          checkedNames: [],
          manualStudent:[],
          message:[]
},
    computed: {

    },
    methods:{

    //FETCH INFORMATION
    fetchData: function(){
        //Request the Data as needed.
        requestData(this.checkedNames,this.searchString,this.message);

        //Clear the searchbox.
        this.searchString='';

    }
}



});

/***
 *
 * @param person
 * @param searchPerson
 * @param message
 */
function requestData(person,searchPerson,message) {
    request('http://192.168.33.10/public/reporter_request/public/index.php/findUser/' + searchPerson, function (error, response, body) {
        //console.log('error:', error); // Print the error if one occurred
        //console.log('statusCode:', response && response.statusCode); // Print the response status code if a response was received
        //console.log('body:',body);

        //Check for any errors on look up.
        if (response.statusCode == 200) {

            //getData
            var dataParsed = $.parseJSON(body);
            if(dataParsed['givenname']=="No Results Found given UnityID")
            {
                //message = {message:'No person found based on this ID, if you want to add, please let us know in the text box below.'};
                message.push({messageItem:'No person found based on this ID, if you want to add, please let us know in the text box below.'});
                //Clear the message array.
                return this.message=[];
            }
            else{
                //this.checkedNames.push({firstname:dataParsed['givenname'],lastname:dataParsed['sn'],dept:dataParsed['departmentName']})
                person.push({firstname:dataParsed['givenname'],lastname:dataParsed['sn'],dept:dataParsed['departmentName'],unityid:dataParsed['unityid']});
            }
        }/*Response ok when searching via the user search*/
    })
}
