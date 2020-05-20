<template>
    <div class="content">
        <div class="row" style="margin-top: -40px">
            <div class="col-lg-12">
                <div class="card card-chart">
                    <div class="card-header">
                        <h4 class="card-title">Daily Health</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <ul class="nav" data-tabs="tabs">
                                    <li class="nav-item col-lg-auto" style="padding-left: 10px; padding-right: 0px">
                                        <button type="button" class="btn btn-sm" style="background-color: #2b5797;" href="#visitor" data-toggle="tab">
                                            Visitor
                                        </button>
                                    </li>
                                    <li class="nav-item col-lg-auto" style="padding-left: 10px; padding-right: 0px">
                                        <button type="button" class="btn btn-sm" style="background-color: #1e7145;" href="#staff" data-toggle="tab">
                                            Staff
                                        </button>
                                    </li>
                                    <!--<li class="nav-item col-lg-auto" style="padding-left: 10px; padding-right: 0px">-->
                                        <!--<button type="button" class="btn btn-sm btn-info" href="#bangi" data-toggle="tab">-->
                                            <!--Bangi Plant-->
                                        <!--</button>-->
                                    <!--</li>-->
                                    <!--<li class="nav-item col-lg-auto" style="padding-left: 10px; padding-right: 0px">-->
                                        <!--<button type="button" class="btn btn-sm btn-success"  href="#nilai-a" data-toggle="tab">-->
                                            <!--Nilai Plant(Block A)-->
                                        <!--</button>-->
                                    <!--</li>-->
                                    <!--<li class="nav-item col-lg-auto" style="padding-left: 10px; padding-right: 0px">-->
                                        <!--<button type="button" class="btn btn-sm btn-warning" href="#nilai-b" data-toggle="tab">-->
                                            <!--Nilai Plant(Block B)-->
                                        <!--</button>-->
                                    <!--</li>-->
                                    <!--<li class="nav-item col-lg-auto" style=" padding-left: 10px; padding-right: 0px">-->
                                        <!--<button type="button" class="btn btn-sm btn-info" href="#goodhart" data-toggle="tab">-->
                                            <!--GOODHART MILLIONS S/B (Bangi Plant)-->
                                        <!--</button>-->
                                    <!--</li>-->
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
                            <div class="tab-pane active" id="visitor">
                                <list-dashboard-daily-health-component :id1="this.id1" category="visitor"></list-dashboard-daily-health-component>
                            </div>
                            <div class="tab-pane " id="staff">
                                <list-staff-dashboard-daily-health-component :id1="this.id1"></list-staff-dashboard-daily-health-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import { QrcodeStream, QrcodeDropZone, QrcodeCapture } from 'vue-qrcode-reader'
    export default{
        props: {
            'id1': {
                type: String,
                required: true
            },
        },
        components: {
            QrcodeStream,
            QrcodeDropZone,
            QrcodeCapture
        },
        data(){
            return {
                result: '',
                error: ''
            }
        },
        mounted() {

        },
        created() {

        },

        methods: {
            onDecode (result) {
                this.result = result
            },
            async onInit (promise) {
                try {
                    await promise
                } catch (error) {
                    if (error.name === 'NotAllowedError') {
                        this.error = "ERROR: you need to grant camera access permisson"
                    } else if (error.name === 'NotFoundError') {
                        this.error = "ERROR: no camera on this device"
                    } else if (error.name === 'NotSupportedError') {
                        this.error = "ERROR: secure context required (HTTPS, localhost)"
                    } else if (error.name === 'NotReadableError') {
                        this.error = "ERROR: is the camera already in use?"
                    } else if (error.name === 'OverconstrainedError') {
                        this.error = "ERROR: installed cameras are not suitable"
                    } else if (error.name === 'StreamApiNotSupportedError') {
                        this.error = "ERROR: Stream API is not supported in this browser"
                    }
                }
            }

        }



    }
</script>