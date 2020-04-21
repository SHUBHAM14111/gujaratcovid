<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">District List</div>
                
                <div class="card-body" v-for="district in districts" v-bind:key="district.id">

                
                        <h2>{{ district.name }}:-{{ district.counts }}</h2>
                        
                        
           

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
              districts: [],
              districts: {
                  id: '',
                  name:'',
                  counts:''
                  
              },
            }
        },
        methods: {
            getdistrict(){
                fetch('api/districts')
                     .then(res =>res.json())
                     .then(res=>{
                        //console.log(res.data);
                        this.districts = res.data;
                     })
            }
        },
        created() {
            this.getdistrict()
        }
    }
</script> 