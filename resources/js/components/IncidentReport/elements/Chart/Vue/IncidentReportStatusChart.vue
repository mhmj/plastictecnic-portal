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
                status_data:[],
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
                fetch('/api/v1/IncidentReport/summary/status').then(response => response.json())
                    .then(response => {
                        vm.status_data = response;
                        this.status_data = vm.status_data;
                        this.fillData();
                    });
            },
            fillData ()
            {
                this.datacollection = {
                    labels: ['Received','Pending 1','Pending 2','KIV','Closed'],
                    datasets: [
                        {
                            label: '',
                            backgroundColor: [
                                '#2b5797',
                                '#ffc40d',
                                '#e3a21a',
                                '#eff4ff',
                                '#1e7145',
                            ],
                            data: this.status_data
                        },
                    ]
                }
            }
        }
    }
</script>