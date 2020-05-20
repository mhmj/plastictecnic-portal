<template>
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-body">
                    <staff-daily-health-element-component v-for="dailyhealth in DailyHealths " v-bind:key="dailyhealth.id" :data="dailyhealth"></staff-daily-health-element-component>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        props: {
            'id1': {
                type: String,
                required: true
            },
            'id2': {
                type: String,
                required: true
            },
        },
        data(){
            return {
                DailyHealths: [],
                searchQuery: '',
                isLoading: false,
                isCreating: false,
            }
        },
        mounted() {
            Event.$on('updateVisitorList', () => {
                this.fetchDailyHealths();
            });
            Event.$on('updateVisitorSearchList', () => {
                this.searchDailyHealths();
            });
        },
        created() {
            this.fetchDailyHealths();
        },

        methods: {
            fetchDailyHealths(page = 1){
                this.isLoading = true;
                this.isSearching = false;
                fetch('/api/v1/dailyhealth/'+ this.id1 + '/'+ this.id2 +'/staff-personal-daily-health' + '?page='+ page).then(response => response.json())
                    .then(response => {

                        this.DailyHealths = response.data;
                        this.$refs.pagination.makePagination(response.meta, response.links);
                        this.isLoading = false;
                    })
                    .catch(error => console.log(error))
            },
        }



    }
</script>