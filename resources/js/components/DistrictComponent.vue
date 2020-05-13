
<template>
    <v-app id="inspire">
        <v-alert prominent type="info" dismissible>
                <v-col class="grow" draggable
                    >You can click on the table header for sorting information</v-col
                >
                <v-col class="shrink">
                 </v-col>
            </v-alert>
    <v-data-table
    :headers="headers"
    :items="destricts"
    class="elevation-1 mytable"
  >
    <template v-slot:items="props">
      <tr class="danger"><td>{{ props.item.name }}</td></tr>
      <td class="text-xs-right">{{ props.item.infected }}</td>
      <td class="text-xs-right">{{ props.item.cured }}</td>
      <td class="text-xs-right">{{ props.item.died }}</td>
    </template>
        </v-data-table>
        <!-- <chartjs-doughnut :datasets="datasets" :option="option"></chartjs-doughnut> -->
    </v-app>
</template>

<script>
export default {
    data() {
        return {
            headers: [
          {
            text: 'District',
            align: 'left',
            sortable: false,
            value: 'name'
          },
          { text: 'Infected', value: 'infected' },
          { text: 'Cured', value: 'cured' },
          { text: 'Died', value: 'died' },
        ],
        
            destricts: [],
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
                   // console.log(res.data);
                    this.destricts = res.data;
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
.mytable table tr {
    background-color: lightgoldenrodyellow;
    border-bottom: none !important;
 }
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