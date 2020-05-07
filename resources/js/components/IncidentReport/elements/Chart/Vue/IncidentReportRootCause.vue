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
                root_cause_data:[],
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
                fetch('/api/v1/IncidentReport/summary/root-cause').then(response => response.json())
                    .then(response => {
                        vm.root_cause_data = response;
                        this.root_cause_data = vm.root_cause_data;
                        this.fillData();
                    });
            },
            fillData ()
            {
                this.datacollection = {
                    labels: ['SW/HW/DB Configuration','SW/HW/DB Bug','User Negligence'],
                    datasets: [
                        {
                            label: '',
                            backgroundColor: [
                                '#2b5797',
                                '#ffc40d',
                                '#ee1111',
                            ],
                            data: this.root_cause_data
                        },
                    ]
                }
            }
        }
    }
</script>