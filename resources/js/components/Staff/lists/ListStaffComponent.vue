<template>
    <div>
        <loading-component v-show="isLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>
        <div>
            <div class="table">
                <staff-element-component  v-for="staff in staffs" v-bind:key="staff.id" :data="staff"></staff-element-component>
            </div>
            <div style="margin-top: 30px; justify-content: flex-end">
                <pagination-component ref="pagination" v-on:changePage="fetchStaff($event)"></pagination-component>
            </div>
            <!--<div>-->
                <!--<delete-staff-modal-component :data="items"></delete-staff-modal-component>-->
            <!--</div>-->
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                staffs: [],
                ListCompany:[],
                ListDepartment:[],
                ListDesignation:[],
                items:[],
                serverurl: '3.0.245.237',
                isLoading: false,

            }
        },
        mounted() {
            Event.$on('updateStaffList', () => {
                this.fetchStaff();
            });

            Event.$on('getCompanies', () => {
                this.getCompanies();
            });

            Event.$on('getDepartments', () => {
                this.getDepartments();
            });

            Event.$on('getDesignations', () => {
                this.getDesignations();
            });
        },
        created() {
            this.fetchStaff();
            this.getCompanies();
            this.getDepartments();
            this.getDesignations();
        },
        methods: {
            fetchStaff(page = 1){
                this.isLoading = true;

                fetch('/api/v1/staff/list-staff' + '?page='+ page).then(response => response.json())
                    .then(response => {

                        this.staffs = response.data;
                        this.$refs.pagination.makePagination(response.meta, response.links);

                        //turn off loading animation
                        this.isLoading = false;
                    })
                    .catch(error => console.log(error))
            },
            itemClicked(item) {
                this.items = item;
                console.log(' Item click on X : ' + this.items.id);
                $("#deleteStaffModal").modal('show');
            },
            getCompanies(){
                axios.get('/api/v1/getCompany')
                    .then(function (response) {
                        this.ListCompany = response.data;
                    }.bind(this));
            },
            getDepartments(){
                axios.get('/api/v1/getDepartment')
                    .then(function (response) {
                        this.ListDepartment = response.data;
                    }.bind(this));
            },
            getDesignations(){
                axios.get('/api/v1/getDesignation')
                    .then(function (response) {
                        this.ListDesignation = response.data;
                    }.bind(this));
            },
        }
    }
</script>