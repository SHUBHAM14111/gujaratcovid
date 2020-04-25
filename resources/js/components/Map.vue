<template>
    <div>
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

          </v-col>
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
          <tr v-for="district in filteredList" :key="district.id">
            <td>{{ district.name }}</td>
            <td>{{ district.infected }}</td>
            <td>{{ district.cured }}</td>
            <td>{{ district.died }}</td>

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
                fetch('api/patients')
                     .then(res =>res.json())
                     .then(res=>{
                        //console.log(res.data);
                        this.markers = res.data;
                     });
                fetch('api/districts')
                     .then(res =>res.json())
                     .then(res=>{
                        //console.log(res.data);
                        this.districts = res.data;
                     });
            },
           
        },
       
    created() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                position => {
                    
                    this.uc.lat = position.coords.latitude;
                    this.uc.lng = position.coords.longitude;
                    console.log(uc);
                },
                () => {
                    alert("it fails");
                }
            );
        } else {
            alert("Browser not supported");
        }
        this.getlocation();
    }
};
</script>

<style lang="scss" scoped></style>
