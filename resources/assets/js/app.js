import Vue from 'vue';
//import Project from './Project.vue';
import lookup from './LookUp.vue';

var request = require('request');




//Register Component
//User list.
Vue.component('user-list', {
    template: `
    <li>
      {{ name }}
      <button v-on:click="$emit('remove')">X</button>
    </li>
  `,
    props: ['name']
})

new Vue({
    el: '#lookUpArea',
    data: {
          searchString: "",
                // The data model. These items would normally be requested via AJAX,
                // but are hardcoded here for simplicity.
                users: [],
                checkedNames: [],
                manualStudent:[]
},
computed: {
    // A computed property that holds only those articles that match the searchString.
    filteredUsers: function () {
        var users_array = this.users,
            searchString = this.searchString;

        //if nothing in the search box, list all options.
        if(!searchString){
            //Instead of returning ALL options, limit to first 3.
            return users_array.slice(1,4)

            //return users_array;
        }

        searchString = searchString.trim().toLowerCase();

        users_array = users_array.filter(function(item){
            if(item.title.toLowerCase().indexOf(searchString) !== -1){
                return item;
            }
        })

        // Return an array with the filtered data.
        return users_array;;
    }
},
    methods:{
        adminUserNotFound: function(){
            //Check for empty string
            if(this.manualStudent==""){
                //Do not add
            }
            else{
                this.checkedNames.push(this.manualStudent)
                //this.manualStudent = ''
            }

        }
        ,
        fetchData: function(searchString){
            alert(searchString);

            request('findUser/'+searchString, function (error, response) {
                console.log('error:', error); // Print the error if one occurred
                console.log('statusCode:', response && response.statusCode); // Print the response status code if a response was received
            });

        }
    }
});

