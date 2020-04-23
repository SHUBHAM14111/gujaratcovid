<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">District List</div>

                    <v-list dense>
                        
                     <div class="card-body" v-for="district in districts" v-bind:key="district.id">

                <v-list-item link>
                    <v-list-item-action>
                        <v-icon>mdi-view-dashboard</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>{{district.name}}  {{district.infected}} {{district.cured}} {{district.died}}</v-list-item-title>

                    </v-list-item-content>
                </v-list-item>
                     </div>
                </v-list>
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
                  lat:'',
                  lng:'',
                  cured:'',
                  died:'',
                  infected:''

                  
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
</script> 