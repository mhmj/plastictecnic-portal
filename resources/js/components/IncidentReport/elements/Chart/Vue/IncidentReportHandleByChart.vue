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
                handle_by:[],
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