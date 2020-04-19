<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Address List</div>
                
                <div class="card-body" v-for="patient in patients" v-bind:key="patient.id">

                

                        <h2>{{ patient.address }}</h2>
                        <h2>{{ patient.name }}</h2>
              
           

                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {

        data() {
            return {
              patients: [],
              patients: {
                  id: '',
                  name:'',
                  address:''
              },
            }
        },
        methods: {
            getpatient(){
                fetch('/api')
                     .then(res =>res.json())
                     .then(res=>{
                        //console.log(res.data);
                        this.patients = res.data;
                     })
            }
        },
        created() {
            this.getpatient()
        }
    }
</script> 