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
                handle_by:[],
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
                fetch('/api/v1/IncidentReport/summary/handle-by').then(response => response.json())
                    .then(response => {
                        vm.handle_by = response;
                        this.handle_by = vm.handle_by;
                        this.fillData();
                    });
            },
            fillData ()
            {
                this.datacollection = {
                    labels: ['Amar','Kelvin','Hazim','Hilmi'],
                    datasets: [
                        {
                            label: '',
                            backgroundColor: [
                                '#00aba9',
                                '#ffc40d',
                                '#da532c',
                                '#b91d47',
                            ],
                            data: this.handle_by
                        },
                    ]
                }
            }
        }
    }
</script>