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
                        <!-- <td><v-chip :color="getColor(district.infected)" dark>{{ district.name }}</v-chip></td> -->
                        <td :class="getColor(district.infected)">
                            {{ district.name }}
                        </td>
                        <td>{{ district.infected }}</td>
                        <td>{{ district.cured }}</td>
                        <td>{{ district.died }}</td>
                    </tr>
                </tbody>
            </template>
        </v-simple-table>
        <!-- <chartjs-doughnut :datasets="datasets" :option="option"></chartjs-doughnut> -->
    </v-app>
</template>

<script>
export default {
    data() {
        return {
            datasets: [
                {
                    data: [200, 300, 500],
                    backgroundColor: ["Red", "Yellow", "Purple"]
                }
            ],
            option: {
                title: {
                    display: true,
                    position: "bottom",
                    text: "District counts"
                }
            },
            districts: [],
            districts: {
                id: "",
                name: "",
                lat: "",
                lng: "",
                cured: "",
                died: "",
                infected: ""
            }
        };
    },
    methods: {
        getColor: function(cases) {
            if (cases > 100) return "danger";
            else if (cases > 50) return "war";
            else return "safe";
        },
        getdistrict() {
            fetch("api/districts")
                .then(res => res.json())
                .then(res => {
                    console.log(res.data);
                    this.districts = res.data;
                });
        }
    },
    computed: {},
    created() {
        this.getdistrict();
    }
};
</script>

<style lang="css" scoped>
.danger {
    background-color: rgba(255, 0, 0, 0.4);
    color: white;
}
.war {
    background-color:rgba(220, 220, 0, 0.4);
    color: white;
}
.safe {
    background-color: rgba(0, 255, 0, 0.4);
    color: white;
}
</style>
