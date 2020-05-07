<template>
    <bar :chart-data="datacollection" :options="options" :height="150"></bar>
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
                category_data:[],
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
                fetch('/api/v1/ITAsset/summary/category').then(response => response.json())
                    .then(response => {
                        vm.category_data = response;
                        this.category_data = vm.category_data;
                        this.fillData();
                    });
            },
            fillData()
            {
                this.datacollection = {
                    labels: ['Laptop','Desktop','Server','Switch','NAS','Firewall','Printer'],
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
                            data: this.category_data
                        },
                    ]
                }
            }
        }
    }
</script>