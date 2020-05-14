
<template>
 <v-app id="inspire">
   <v-form
      ref="form"
      @submit.prevent="addpatient"
    >
      <v-text-field
        v-model="patient.name"
        :counter="10"
        label="name"
        required
      ></v-text-field>
  
      <v-text-field
        v-model="patient.address"
        label="address"
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
              label="Search for patient"
              outlined
              v-model="search"
            >
    </v-text-field>
    <v-simple-table height="400">
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-left">Address</th>
            <th class="text-left">Name</th>
            <th class="text-left">lat</th>
            <th class="text-left">lng</th>
            <th class="text-left">Edit</th>
            <th class="text-left">Delete</th>

          </tr>
        </thead>
        <tbody>
          <tr  v-for="patient in filteredList" :key="patient.id">
            <td>{{ patient.address }}</td>
            <td>{{ patient.name }}</td>
            <td>{{ patient.longitude }}</td>
            <td>{{ patient.latitude }}</td>
            <td><v-btn @click="editpatient(patient)">Edit</v-btn></td>
            <td><v-btn @click="deletepatient(patient.id)">Delete</v-btn></td>
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
              patients: [],
              geocode:[],
              patient: {
                id: '',
                name: '',
                address: '',
                lat:'',
                lng:''
              },
              
             patient_id: '',
             edit: false,
              search: null,

            }
        },
        created() {
            this.getpatient()
        },
        
        methods: {
          getpatient() {
              this.$http({
                url: `adminpatients`,
                  method: 'GET'
            })
            .then((res) => {
             // console.log(res)
              this.patients = res.data.patients
            }, () => {
              this.has_error = true
            })
          },
            deletepatient(id) {
                if (confirm('Are You Sure?')) {
                this.$http({
                  url:`/patient/${id}`, 
                method: 'delete'
                })
                .then((res) => {
                  alert('Patient Removed');
                  this.getpatient();
              },() => {
              this.has_error = true
            })
            }
            },
          
          addpatient() {
              if (this.edit === false) {
              // Add
             // console.log(this.patient.address)
             var latitude,longitude
              var addressObj={
                address_line_1: this.patient.address,
              }
              Vue.$geocoder.send(addressObj, res => {latitude = res.results[0].geometry.location.lat.toString(), 
                                                    longitude = res.results[0].geometry.location.lng.toString(),
                                                                  //console.log(latitude,longitude),
                                                      this.patient.lat = latitude.toString(),
                                                      this.patient.lng = longitude.toString() 
              
              const postData = { name: this.patient.name, address: this.patient.address,lat:this.patient.lat,lng: this.patient.lng };

              this.$http
                .post('/patient', postData)
              .then(res => {
              console.log(res.body);
              this.clearForm();
              alert('Patient Added');
              this.getpatient();
              });})
              }
               else {
        // Update
        var latitude,longitude
              var addressObj={
                address_line_1: this.patient.address,
              }
              Vue.$geocoder.send(addressObj, res => {latitude = res.results[0].geometry.location.lat.toString(), 
                                                    longitude = res.results[0].geometry.location.lng.toString(),
                                                                  //console.log(latitude,longitude),
                                                      this.patient.lat = latitude.toString(),
                                                      this.patient.lng = longitude.toString() 
              
              this.$http
                .put('/patient', this.patient)
              .then(res => {
              //console.log(res.body);
              this.clearForm();
              alert('Patient Updated');
              this.getpatient();
              })});
          }
          },
          editpatient(patient) {
              this.edit = true;
              this.patient.id = patient.id;
              this.patient.patient_id = patient.id;
              this.patient.name = patient.name;
              this.patient.address = patient.address;
              
              
          },
         

            validate () {
                this.$refs.form.validate()
            },
           clearForm() {
            this.edit = false;
            this.patient.id = null;
            this.patient.patient_id = null;
            this.patient.name = '';
            this.patient.address = '';
            this.patient.lat = '';
            this.patient.lng = '';

            },
            
        },
computed: {
            filteredList() {
            if(this.search){
                return this.patients.filter(patient => {
                return patient.name.toLowerCase().includes(this.search.toLowerCase())
                
            })
            }
            else{
                return this.patients
            }
            }
            },
    }
</script> 