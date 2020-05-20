<template>
    <div class="content">
        <div class="row" style="margin-top: -40px">
            <div class="col-lg-12">
                <div class="card card-chart">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <ul class="nav" data-tabs="tabs">
                                    <li class="nav-item col-auto" style="padding-left: 10px; padding-right: 0px">
                                        <button type="button" class="btn btn-sm" style="background-color: #2b5797;" href="#form" data-toggle="tab">
                                            Form
                                        </button>
                                    </li>
                                    <li class="nav-item col-auto" style="padding-left: 10px; padding-right: 0px">
                                        <button type="button" class="btn btn-sm" style="background-color: #1e7145;" href="#list" data-toggle="tab">
                                            List
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class=" card-tasks">
                    <div class="">
                        <div class="tab-content text-center">
                            <div class="tab-pane active" id="form">
                                <staff-create-daily-health-form-component :id1="this.id1" :id2="this.id2"></staff-create-daily-health-form-component>
                            </div>
                            <div class="tab-pane " id="list">
                                <list-personal-daily-health-component :id1="this.id1" :id2="this.id2"></list-personal-daily-health-component>
                            </div>
                        </div>
                    </div>
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

            }
        },
        mounted() {

        },
        created() {

        },

        methods: {

        }



    }
</script>