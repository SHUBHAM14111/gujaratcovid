<template>
    <div>
        <div v-if="loading">

        <v-progress-linear
        indeterminate
        color="cyan"
      ></v-progress-linear>
        </div>
        <GmapMap

            :center="coordinates"
            :zoom="val"
            style="width: auto; height: 101vh"
        >
        
        <gmap-custom-marker :marker="uc">
                <img
                    src="https://cdn4.iconfinder.com/data/icons/user-icons-5/100/user-17-512.png"
                    alt=""
                    height="40px"
                    class="animated infinite flash"
                />
            </gmap-custom-marker>
            <cluster>
                <GmapMarker
                    :key="index"
                    v-for="(m, index) in markers"
                    :position="m"
                    :clickable="true"
                    :draggable="false"
                    @click="center = m.position"
                />
            </cluster>
            
        </GmapMap>
        <v-col cols="12" sm="6" md="3">
            <v-text-field
              label="Search for district & zooom"
              outlined
              v-model="search"
            >
            </v-text-field>
            <v-btn small color="primary" v-on:click="selectsearch(22.2587,71.1924,7)">Click to see Gujarat</v-btn>

          </v-col>
          <div v-if="loading2">
            <v-progress-linear
              indeterminate
        color="yellow"
            ></v-progress-linear>
        </div>
    <v-app id="inspire">
        
    <v-simple-table>
      <template v-slot:default>
        <thead>
          <tr>
            <th class="text-left">District</th>
            <th class="text-left">Infected</th>
            <th class="text-left">Cured</th>
            <th class="text-left">Died</th>
            <th class="text-left">Click to zoom</th>
          </tr>
        </thead>
        
        <tbody>
            
                
          <tr v-for="district in filteredList" :key="district.id" >
            <td>{{ district.name }}</td>
            <td>{{ district.infected }}</td>
            <td>{{ district.cured }}</td>
            <td>{{ district.died }}</td>

            <td>
            <v-btn small color="primary" v-on:click="selectsearch(district.lat,district.lng,10)">Location</v-btn>

              </td>
          </tr>
        </tbody>
        
      </template>
    </v-simple-table>
  </v-app>
    </div>
    
</template>

<script>
export default {
    data() {
        
        return {
            coordinates: {
                lat: 22.2587, //default coordinates of Gujarat
                lng: 71.1924
            },
            val: 7,
            uc: {
                lat: 22.2587, //default coordinates of Gujarat
                lng: 71.1924
            },
            markers: [],
            districts: [],
            search: null,
            selectedcoords: {
                lat:22.2587,
                lng:71.1924
            },
            loading: false,
            loading2: false
        };
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
            
    methods: {
            getlocation(){
                this.loading = true
                this.loading2=  true
                fetch('api/patients')
                     .then(res =>res.json())
                     .then(res=>{
                        //console.log(res.data);
                        this.markers = res.data;
                     }).finally(()=>(this.loading = false));
                fetch('api/districts')
                     .then(res =>res.json())
                     .then(res=>{
                        //console.log(res.data);
                        this.districts = res.data;
                     }).finally(()=>(this.loading2 = false));

            },
            
           selectsearch(lat,lng,val){
               
               this.selectedcoords.lat = lat;
               this.selectedcoords.lng = lng;

               this.coordinates = this.selectedcoords;
               this.val = val;
           }
        },
       
    created() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                position => {
                    
                    this.uc.lat = position.coords.latitude;
                    this.uc.lng = position.coords.longitude;
                },
                () => {
                    alert("it fails");
                }
            );
        } else {
            alert("Browser not supported");
        }
        this.getlocation();
        this.selectsearch();
    }
};
</script>

<style lang="scss" scoped></style>
