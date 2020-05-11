
<template>
 <v-app id="inspire">
   <v-form
      ref="form"
      @submit.prevent="adddistrict"
    >
      <v-text-field
        v-model="district.name"
        :counter="10"
        label="name"
        required
      ></v-text-field>
  
      <v-text-field
        v-model="district.lat"
        label="lat"
        required
      ></v-text-field>
      <v-text-field
        v-model="district.lng"
        label="lng"
        required
      ></v-text-field>
      <v-text-field
        v-model="district.infected"
        label="infected"
        required
      ></v-text-field>
        <v-text-field
        v-model="district.died"
        label="died"
        required
      ></v-text-field>
        <v-text-field
        v-model="district.cured"
        label="cured"
        required
      ></v-text-field>
  
      <v-btn
        color="success"
        class="mr-4"
        type="submit"
      >
        Save
      </v-btn>
  
      <v-btn
        color="error"
        class="mr-4"
        @click="clearForm()"
      >
        Reset Form
      </v-btn>
  
      
    </v-form>
    <br>
    <v-text-field
              label="Search for district"
              outlined
              v-model="search"
            >
    </v-text-field>
    <v-simple-table height="400">
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-left">Name</th>
            <th class="text-left">infected</th>
            <th class="text-left">cured</th>
            <th class="text-left">died</th>

            <th class="text-left">lat</th>
            <th class="text-left">lng</th>
            <th class="text-left">Edit</th>
            <th class="text-left">Delete</th>

          </tr>
        </thead>
        <tbody>
          <tr  v-for="district in filteredList" :key="district.id">
            <td>{{ district.name }}</td>
            <td>{{ district.infected }}</td>
            <td>{{ district.cured }}</td>
            <td>{{ district.died }}</td>
            <td>{{ district.lat }}</td>
            <td>{{ district.lng }}</td>

            <td><v-btn @click="editdistrict(district)">Edit</v-btn></td>
            <td><v-btn @click="deletedistrict(district.id)">Delete</v-btn></td>
          </tr>
        </tbody>
      </template>
    </v-simple-table>
  </v-app>
</template>

<script>
    export default {
        
        data() {
            return {
              districts: [],
              district: {
                  id: '',
                  name:'',
                  lat:'',
                  lng:'',
                  cured:'',
                  died:'',
                  infected:''

                  
              },
             district_id: '',
             edit: false,
              search: null,

            }
        },
        created() {
            this.getdistrict()
        },
        methods: {
            getdistrict(page_url){
                page_url = page_url || '/api/districts';

                fetch(page_url)
                     .then(res =>res.json())
                     .then(res=>{
                        //console.log(res.data);
                        this.districts = res.data;
                     })
            },
            deletedistrict(id) {
                if (confirm('Are You Sure?')) {
                fetch(`/api/district/${id}`, {
                method: 'delete'
                })
                .then(res => res.json())
                .then(data => {
                  alert('District Removed');
                  this.getdistrict();
              })
              .catch(err => console.log(err));
            }
            },

          adddistrict() {
              if (this.edit === false) {
              // Add
              fetch('/api/district', {
              method: 'post',
              body: JSON.stringify(this.district),
              headers: {
              'content-type': 'application/json'
              }
              })
              .then(res => res.json())
              .then(data => {
                  this.clearForm();
                  alert('District Added');
                  this.getdistrict();
              })
              .catch(err => console.log(err));
              } else {
        // Update
              fetch('/api/district', {
              method: 'put',
              body: JSON.stringify(this.district),
              headers: {
              'content-type': 'application/json'
              }
              })
              .then(res => res.json())
              .then(data => {
              this.clearForm();
              alert('District Updated');
              this.getdistrict();
            })
            .catch(err => console.log(err));
          }
          },
          editdistrict(district) {
              this.edit = true;
              this.district.id = district.id;
              this.district.district_id = district.id;
              this.district.name = district.name;
              this.district.infected = district.infected;
              this.district.cured = district.cured;
              this.district.died = district.died;

              this.district.lat = district.lat;
              this.district.lng = district.lng;
              
          },
         

            validate () {
                this.$refs.form.validate()
            },
           clearForm() {
            this.edit = false;
            this.district.id = null;
            this.district.district_id = null;
            this.district.name = '';
            this.district.infected = '';
            this.district.cured = '';
            this.district.died = '';

            this.district.lat = '';
            this.district.lng = '';

            }
            
        },
computed: {
            filteredList() {
            if(this.search){
                return this.districts.filter(district => {
                return district.name.toLowerCase().includes(this.search.toLowerCase())
                
            })
            }
            else{
                return this.districts
            }
            }
            },
    }
</script> 