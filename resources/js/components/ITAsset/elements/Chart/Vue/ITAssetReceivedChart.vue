<template>
    <doughnut :chart-data="datacollection" :options="options" :height="200"></doughnut>
</template>
<script>

    import Doughnut from '../js/DoughnutChart'

    export default {
        components: {
            Doughnut
        },
        data(){
            return {
                datacollection: "",
                received_data:[],
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
                fetch('/api/v1/ITAsset/summary/received').then(response => response.json())
                    .then(response => {
                        vm.received_data = response;
                        this.received_data = vm.received_data;
                        this.fillData();
                    });
            },
            fillData ()
            {
                this.datacollection = {
                    labels: ['Received', 'No'],
                    datasets: [
                        {
                            label: '',
                            backgroundColor: [
                                '#1e7145',
                                '#eff4ff',
                            ],
                            data: this.received_data
                        },
                    ]
                }
            }
        }
    }
</script>