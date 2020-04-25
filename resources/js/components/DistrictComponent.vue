<template>
 <v-app id="inspire">
    <v-simple-table>
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-left">District</th>
            <th class="text-left">Infected</th>
            <th class="text-left">Cured</th>
            <th class="text-left">Died</th>

          </tr>
        </thead>
        <tbody>
          <tr v-for="district in districts" :key="district.id">
            <td>{{ district.name }}</td>
            <td>{{ district.infected }}</td>
            <td>{{ district.cured }}</td>
            <td>{{ district.died }}</td>

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