<template>
    <div>
        <GmapMap
            :center="coordinates"
            :zoom="7.4"
            style="width: 1200px; height: 101vh"
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
    </div>
</template>

<script>
export default {
    data() {
        return {
            coordinates: {
                lat: 22, //default coordinates of Gujarat
                lng: 72
            },
            uc: {
                lat: 22.2587, //default coordinates of Gujarat
                lng: 71.1924
            },
            markers: []
        };
    },
    methods: {
        getlocation() {
            fetch("api/patients")
                .then(res => res.json())
                .then(res => {
                    //console.log(res.data);
                    this.markers = res.data;
                });
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
    }
};
</script>

<style lang="scss" scoped></style>
