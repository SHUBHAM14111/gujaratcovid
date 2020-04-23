<template>
    <div>
        <GmapMap
            :center="coordinates"
            :zoom="7"
            style="width: 1200px; height: 101vh"
        >
            <GmapMarker :position="uc">You are here</GmapMarker>
            <GmapMarker
                :key="index"
                v-for="(m, index) in markers"
                :position="m"
                :clickable="true"
                :draggable="true"
                @click="center = m.position"
            />
        </GmapMap>
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
            uc: {
                lat: 22.2587, //default coordinates of Gujarat
                lng: 71.1924
            },
            markers: [],
            
        };
    },
    methods: {
            getlocation(){
                fetch('api/patients')
                     .then(res =>res.json())
                     .then(res=>{
                        //console.log(res.data);
                        this.markers = res.data;
                     })
            }
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
