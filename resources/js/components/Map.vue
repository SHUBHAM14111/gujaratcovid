<template>
    <div>
        <div v-if="loading">
            <v-progress-linear indeterminate color="cyan"> </v-progress-linear>
        </div>

        <div v-else>
            <v-alert prominent type="info" dismissible>
                <v-col class="grow" draggable
                    >Maps has been loaded and your current location is trace
                    press</v-col
                >
                <v-col class="shrink"> </v-col>
            </v-alert>
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
        </div>
        <v-col cols="12" sm="6" md="3">
            <v-text-field
                label="Search for district & zooom"
                outlined
                v-model="search"
            >
            </v-text-field>
            <v-btn
                small
                color="primary"
                @click="
                    coordinates.lat = 22.2587;
                    coordinates.lng = 71.1924;
                    val = 7;
                "
                >Click to see Gujarat</v-btn
            >
        </v-col>
        <div v-if="loading2">
            <v-progress-linear indeterminate color="yellow"></v-progress-linear>
        </div>
        <v-app id="inspire" ref="statistics">
            <v-alert type="info" dismissible>
                You are now on district statistics and locate button will zoom
                district on maps for clear view
            </v-alert>
            <v-simple-table :height="700">
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
                        <tr v-for="district in filteredList" :key="district.id">
                            <td :class="getColor(district.infected)">{{ district.name }}</td>
                            <td>{{ district.infected }}</td>
                            <td>{{ district.cured }}</td>
                            <td>{{ district.died }}</td>

                            <td>
                                <v-btn
                                    small
                                    color="primary"
                                    @click="
                                        coordinates.lat = district.lat;
                                        coordinates.lng = district.lng;
                                        val = 10;
                                    "
                                    >Location</v-btn
                                >
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
                lat: 22.2587,
                lng: 71.1924
            },
            loading: false,
            loading2: false
        };
    },
    computed: {
        filteredList() {
            if (this.search) {
                return this.districts.filter(district => {
                    return district.name
                        .toLowerCase()
                        .includes(this.search.toLowerCase());
                });
            } else {
                return this.districts;
            }
        }
    },
    methods: {
        getColor: function(cases) {
            if (cases > 100) return "danger";
            else if (cases > 50) return "war";
            else return "safe";
        },
        getlocation() {
            this.loading = true;
            this.loading2 = true;
            fetch("api/patients")
                .then(res => res.json())
                .then(res => {
                    //console.log(res.data);
                    this.markers = res.data;
                })
                .finally(() => (this.loading = false));
            fetch("api/districts")
                .then(res => res.json())
                .then(res => {
                    //console.log(res.data);
                    this.districts = res.data;
                })
                .finally(() => (this.loading2 = false));
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

<style lang="css" scoped>
.danger {
    background-color: rgba(255, 0, 0, 0.4) !important;
    
}
.war {
    background-color:rgba(220, 220, 0, 0.4) !important;
    
}
.safe {
    background-color: rgba(0, 255, 0, 0.4) !important;
    
}
</style>