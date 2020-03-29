<template>
    <div>
        <loading-component v-show="isLoading" style=" display: flex; align-items: center; justify-content: center"></loading-component>
        <div>
            <div>
                <table class="table">
                    <tbody>
                        <staff-element-component  v-for="staff in staffs" v-bind:key="staff.id" :data="staff"></staff-element-component>
                    </tbody>
                </table>
            </div>
            <div style="margin-top: 30px; justify-content: flex-end">
                <pagination-component ref="pagination" v-on:changePage="fetchStaff($event)"></pagination-component>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                staffs: [],
                serverurl: '3.0.245.237',
                isLoading: false,

            }
        },
        mounted() {
            Event.$on('updateStaffList', () => {
                this.fetchStaff();
            });
            console.log('Component List Staff mounted.')
        },
        created() {
            this.fetchStaff();
        },
        methods: {
            fetchStaff(page = 1){
                //turn on loading animation
                this.isLoading = true;

                fetch('http://'+ this.serverurl +'/api/v1/staff/list-staff' + '?page='+ page).then(response => response.json())
                    .then(response => {

                        this.staffs = response.data;
                        this.$refs.pagination.makePagination(response.meta, response.links);

                        //turn off loading animation
                        this.isLoading = false;
                    })
                    .catch(error => console.log(error))
            }
        }
    }
</script>