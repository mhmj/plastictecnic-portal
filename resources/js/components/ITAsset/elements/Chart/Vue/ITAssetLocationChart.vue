<template>
    <pie-chart :chart-data="datacollection" :options="options" :height="200"></pie-chart>
</template>
<script>

    import PieChart from '../js/PieChart'

    export default {
        components: {
            PieChart
        },
        data(){
            return {
                datacollection: "",
                location_data:[],
                options : {
                },
            }
        },
        mounted () {
            this.fetchData();
            this.fillData()
        },
        methods: {
            fetchData(){
                let vm = this
                fetch('/api/v1/ITAsset/summary/locations').then(response => response.json())
                    .then(response => {
                        vm.location_data = response;
                        this.location_data = vm.location_data;
                        this.fillData();
                    });
            },
            fillData ()
            {
                this.datacollection = {
                    labels: ['Bangi Plant','Nilai (A)','Nilai (B)'],
                    datasets: [
                        {
                            label: '',
                            backgroundColor: [
                                '#ee1111',
                                '#2b5797',
                                '#ffc40d',
                            ],
                            data: this.location_data
                        },
                    ]
                }
            }
        }
    }
</script>