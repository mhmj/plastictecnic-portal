<template>
    <bar-chart :chart-data="datacollection" :options="options" :height="300"></bar-chart>
</template>
<script>

    import BarChart from '../js/BarChart'

    export default {
        components: {
            BarChart
        },
        data(){
            return {
                datacollection: "",
                brand_data:[],
                options : {
                    scales: {
                        yAxes: [{
                            ticks: {
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
            this.fillData();
        },
        methods: {
            fetchData(){
                let vm = this
                fetch('/api/v1/ITAsset/summary/brands').then(response => response.json())
                    .then(response => {
                        vm.brand_data = response;
                        this.brand_data = vm.brand_data;
                        this.fillData();
                    });
            },
            fillData()
            {
                this.datacollection = {
                    labels: ['Dell','Lenovo','HP','ASUS','ACER','LG','Synology','FortiGate'],
                    datasets: [
                        {
                            label: '',
                            backgroundColor: [
                                '#99b433',
                                '#1e7145',
                                '#ffc40d',
                                '#9f00a7',
                                '#603cba',
                                '#00aba9',
                                '#2d89ef',
                                '#e3a21a'
                            ],
                            data: this.brand_data
                        },
                    ]
                }
            }
        }
    }
</script>