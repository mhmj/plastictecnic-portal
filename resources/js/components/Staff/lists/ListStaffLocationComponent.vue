<template>
    <div>
        <div class="row">
            <div class="col-12" style="margin-bottom: 15px; display: flex; justify-content: flex-end">
                <form @submit.prevent="searchStaff">
                    <div class="input-group no-border">
                        <input type="text" v-on:change="searchStaff" v-model="searchQuery" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <a @submit.prevent="searchStaff">
                                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <loading-component v-show="isLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>
        <div>
            <div class="table" v-if="this.isSearching">
                <staff-element-component  v-for="staff in staffs" v-bind:key="staff.id" :data="staff"></staff-element-component>
                <pagination-component ref="pagination" v-on:changePage="searchStaff($event)"></pagination-component>
            </div>
            <div class="table" v-if="!this.isSearching">
                <staff-element-component  v-for="staff in staffs" v-bind:key="staff.id" :data="staff"></staff-element-component>
                <pagination-component ref="pagination" v-on:changePage="fetchStaff($event)"></pagination-component>
            </div>
            <div style="margin-top: 30px; justify-content: flex-end">

            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            'category': {
                type: String,
                required: true
            },
            'id1': {
                type: String,
                required: true
            }
        },
        data() {
            return {
                staffs: [],
                searchQuery:'',
                items:[],
                isLoading: false,
                isSearching: false,

            }
        },
        mounted() {
            Event.$on('updateStaffList', () => {
                this.fetchStaff();
            });
            Event.$on('updateSearchStaff', () => {
                this.searchStaff();
            });
        },
        created() {
            this.fetchStaff();
        },
        methods: {
            searchStaff(page = 1){
                this.isLoading = true;
                this.isSearching = true;
                if(this.searchQuery){
                    fetch('/api/v1/staff/'+ this.id1 +'/'+ this.searchQuery +'/search-staff' + '?page='+ page).then(response => response.json())
                        .then(response => {

                            this.staffs = response.data;
                            this.$refs.pagination.makePagination(response.meta, response.links);

                            //turn off loading animation
                            this.isLoading = false;
                        })
                        .catch(error => console.log(error))
                }
                if(!this.searchQuery){
                    this.fetchStaff();
                }

            },
            fetchStaff(page = 1){
                this.isLoading = true;
                this.isSearching = false;
                fetch('/api/v1/staff/'+ this.id1 +'/'+ this.category +'/list-staff' + '?page='+ page).then(response => response.json())
                    .then(response => {

                        this.staffs = response.data;
                        this.$refs.pagination.makePagination(response.meta, response.links);
                        this.isLoading = false;
                    })
                    .catch(error => console.log(error))
            },
        }
    }
</script>