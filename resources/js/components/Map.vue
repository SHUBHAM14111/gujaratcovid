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
            markers: [
                {
                    lat: 21.1702,
                    lng: 72.8311
                },
                {
                    lat: 22.3072,
                    lng: 73.1812
                },
                {
                    lat: 23.0225,
                    lng: 72.5714
                }
            ]
        };
    },
    created() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                position => {
                    console.log(position);
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
    }
};
</script>

<style lang="scss" scoped></style>
