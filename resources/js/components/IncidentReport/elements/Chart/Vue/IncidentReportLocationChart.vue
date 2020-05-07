<template>
    <bar :chart-data="datacollection" :options="options" :height="200"></bar>
</template>
<script>

    import Bar from '../js/BarChart'

    export default {
        components: {
            Bar
        },
        data(){
            return {
                datacollection: "",
                location_data:[],
                options : {
                    scales: {
                        yAxes: [{
                            ticks: {
                                precision:0,
                                beginAtZero: true,
                                min: 0
                            }
                        }]
                    },
                    legend: {
                        display: false
                    },
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
                fetch('/api/v1/IncidentReport/summary/location').then(response => response.json())
                    .then(response => {
                        vm.location_data = response;
                        this.location_data = vm.location_data;
                        this.fillData();
                    });
            },
            fillData ()
            {
                this.datacollection = {
                    labels: ['Bangi','Nilai A','Nilai B'],
                    datasets: [
                        {
                            label: '',
                            backgroundColor: [
                                '#2CA8FF',
                                '#18ce0f',
                                '#FFB236',
                            ],
                            data: this.location_data
                        },
                    ]
                }
            }
        }
    }
</script>