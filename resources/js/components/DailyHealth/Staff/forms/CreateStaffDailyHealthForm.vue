<template>
    <div>
        <div class="row text-left">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-body " >
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-4">
                                    <label style="font-size: 15px" class="text-muted text-dark">Name</label>
                                </div>
                                <div class="col-1">
                                    <label style="font-size: 15px">:</label>
                                </div>
                                <div class="col-6 text-info">
                                    {{Staff.full_name}}
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-4">
                                    <label style="font-size: 15px" class="text-muted text-dark">Hp Num</label>
                                </div>
                                <div class="col-1">
                                    <label style="font-size: 15px">:</label>
                                </div>
                                <div class="col-6 text-info">
                                    {{Staff.phone_no}}
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-4">
                                    <label style="font-size: 15px" class="text-muted text-dark">Staff ID</label>
                                </div>
                                <div class="col-1">
                                    <label style="font-size: 15px">:</label>
                                </div>
                                <div class="col-6 text-info">
                                    {{Staff.staff_no}}
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-4">
                                    <label style="font-size: 15px" class="text-muted text-dark">Plant</label>
                                </div>
                                <div class="col-1">
                                    <label style="font-size: 15px">:</label>
                                </div>
                                <div class="col-6 text-info">
                                    {{Staff.company_id.location}} ({{Staff.company_id.base}})
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-4">
                                    <label style="font-size: 15px" class="text-muted text-dark">Designation</label>
                                </div>
                                <div class="col-1">
                                    <label style="font-size: 15px">:</label>
                                </div>
                                <div class="col-6 text-info">
                                    {{Staff.designation_id.name}}
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-4">
                                    <label style="font-size: 15px" class="text-muted text-dark">Department</label>
                                </div>
                                <div class="col-1">
                                    <label style="font-size: 15px">:</label>
                                </div>
                                <div class="col-6 text-info">
                                    {{Staff.department_id.name}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" v-if="isPage1 === true">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-body " >
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <strong>
                                                <label style="font-size: 15px" class="text-muted text-dark">1.  Daily Starter Pack</label>
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label style="font-size: 13px" class="text-muted text-dark"> &nbsp;&nbsp; &nbsp; Starter Pack Harian</label>
                                        </div>
                                    </div>
                                    <div class="row" v-if="('daily_starter_pack' in errors)">
                                        <div class="col">
                                            <label style="font-size: 15px; margin-left: 15px" class="text-danger">{{errors['daily_starter_pack']}}</label>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-left: 5px">
                                        <div class="col">
                                            <el-radio v-model="StaffDailyHealth.daily_starter_pack" value="Yes" label="Yes">Yes</el-radio>
                                            <el-radio v-model="StaffDailyHealth.daily_starter_pack" value="No" label="No">No</el-radio>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col">
                                            <strong>
                                                <label style="font-size: 15px" class="text-muted text-dark">2.  Hand Sanitizing Before Entering</label>
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label style="font-size: 13px" class="text-muted text-dark"> &nbsp;&nbsp; &nbsp; Sanitize Tangan Sebelum Masuk</label>
                                        </div>
                                    </div>
                                    <div class="row" v-if="('hand_sanitizing' in errors)">
                                        <div class="col">
                                            <label style="font-size: 15px; margin-left: 15px" class="text-danger">{{errors['hand_sanitizing']}}</label>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-left: 5px">
                                        <div class="col">
                                            <el-radio v-model="StaffDailyHealth.hand_sanitizing" value="Yes" label="Yes">Yes</el-radio>
                                            <el-radio v-model="StaffDailyHealth.hand_sanitizing" value="No" label="No">No</el-radio>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col">
                                            <strong>
                                                <label style="font-size: 15px" class="text-muted text-dark">3.  Overall Health</label>
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label style="font-size: 13px" class="text-muted text-dark"> &nbsp;&nbsp; &nbsp; Kesihatan Keseluruhan</label>
                                        </div>
                                    </div>
                                    <div class="row" v-if="('overall_health' in errors)">
                                        <div class="col">
                                            <label style="font-size: 15px; margin-left: 15px" class="text-danger">{{errors['overall_health']}}</label>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-left: 5px">
                                        <div class="col">
                                            <el-radio v-model="StaffDailyHealth.overall_health" value="Yes" label="Yes">Yes</el-radio>
                                            <el-radio v-model="StaffDailyHealth.overall_health" value="No" label="No">No</el-radio>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col">
                                            <strong>
                                                <label style="font-size: 15px" class="text-muted text-dark">4.  Flu</label>
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label style="font-size: 13px" class="text-muted text-dark"> &nbsp;&nbsp; &nbsp; Selesema</label>
                                        </div>
                                    </div>
                                    <div class="row" v-if="('flu' in errors)">
                                        <div class="col">
                                            <label style="font-size: 15px; margin-left: 15px" class="text-danger">{{errors['flu']}}</label>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-left: 5px">
                                        <div class="col">
                                            <el-radio v-model="StaffDailyHealth.flu" value="Yes" label="Yes">Yes</el-radio>
                                            <el-radio v-model="StaffDailyHealth.flu" value="No" label="No">No</el-radio>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col">
                                            <strong>
                                                <label style="font-size: 15px" class="text-muted text-dark">5.  Cough</label>
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label style="font-size: 13px" class="text-muted text-dark"> &nbsp;&nbsp; &nbsp; Batuk</label>
                                        </div>
                                    </div>
                                    <div class="row" v-if="('cough' in errors)">
                                        <div class="col">
                                            <label style="font-size: 15px; margin-left: 15px" class="text-danger">{{errors['cough']}}</label>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-left: 5px">
                                        <div class="col">
                                            <el-radio v-model="StaffDailyHealth.cough" value="Yes" label="Yes">Yes</el-radio>
                                            <el-radio v-model="StaffDailyHealth.cough" value="No" label="No">No</el-radio>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col">
                                            <strong>
                                                <label style="font-size: 15px" class="text-muted text-dark">6.  Breathing Difficulties</label>
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="row" v-if="('breathing_difficulty' in errors)">
                                        <div class="col">
                                            <label style="font-size: 15px; margin-left: 15px" class="text-danger">{{errors['breathing_difficulty']}}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label style="font-size: 13px" class="text-muted text-dark"> &nbsp;&nbsp; &nbsp; Kesukaran Penafasan</label>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-left: 5px">
                                        <div class="col">
                                            <el-radio v-model="StaffDailyHealth.breathing_difficulty" value="Yes" label="Yes">Yes</el-radio>
                                            <el-radio v-model="StaffDailyHealth.breathing_difficulty" value="No" label="No">No</el-radio>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col">
                                            <strong>
                                                <label style="font-size: 15px" class="text-muted text-dark">7.  Sore Throat</label>
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="row" v-if="('sore_throat' in errors)">
                                        <div class="col">
                                            <label style="font-size: 15px; margin-left: 15px" class="text-danger">{{errors['sore_throat']}}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label style="font-size: 13px" class="text-muted text-dark"> &nbsp;&nbsp; &nbsp; Sakit Tekak</label>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-left: 5px">
                                        <div class="col">
                                            <el-radio v-model="StaffDailyHealth.sore_throat" value="Yes" label="Yes">Yes</el-radio>
                                            <el-radio v-model="StaffDailyHealth.sore_throat" value="No" label="No">No</el-radio>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 20px">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col">
                                            <strong>
                                                <label style="font-size: 15px" class="text-muted text-dark">8.  Weak In Limbs</label>
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label style="font-size: 13px" class="text-muted text-dark"> &nbsp;&nbsp; &nbsp; Lemah Kaki/Tangan</label>
                                        </div>
                                    </div>
                                    <div class="row" v-if="('weak_in_limbs' in errors)">
                                        <div class="col">
                                            <label style="font-size: 15px; margin-left: 15px" class="text-danger">{{errors['weak_in_limbs']}}</label>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-left: 5px">
                                        <div class="col">
                                            <el-radio v-model="StaffDailyHealth.weak_in_limbs" value="Yes" label="Yes">Yes</el-radio>
                                            <el-radio v-model="StaffDailyHealth.weak_in_limbs" value="No" label="No">No</el-radio>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" style="">
                                    <div class="row">
                                        <div class="col-6"></div>
                                        <div class="col-6">
                                            <div class="form-group form-group-default" style="display:flex; justify-content: flex-end">
                                                <a class="btn btn-primary text-white" @click="onChangePage()">Next</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" v-if="isPage2 === true">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-body " >
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-12">
                                    <div class="row" v-if="isScanner === true">
                                        <div class="col-lg-l2">
                                            <div class="row text-center">
                                                <div class="col-lg-12">
                                                    <strong>
                                                        <label style="font-size: 15px;" class="text-muted text-dark">Please scan the QR code for entering the temperature</label>
                                                    </strong>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-2"></div>
                                                <div class="col-8">
                                                    <qrcode-stream @decode="onDecode"></qrcode-stream>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 15px">
                                                <div class="col-6" style="margin-left: 10px">
                                                    <div class="form-group form-group-default" style="display:flex; justify-content: flex-start">
                                                        <a class="btn btn-primary text-white" @click="onChangePage()">Back</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" v-if="isScanner === false">
                                        <div class="col-12">
                                            <div class="row" style="margin-bottom: 10px" v-if="isTemperature === true">
                                                <div class="col-4">
                                                    <label style="font-size: 15px" class="text-muted text-dark">Temperature</label>
                                                    <label style="font-size: 13px" class="text-muted text-dark">Suhu</label>
                                                </div>
                                                <div class="col-1">
                                                    <label style="font-size: 15px">:</label>
                                                </div>
                                                <div class="col-6" style="margin-left: -20px">
                                                    <el-input-number v-model="StaffDailyHealth.temperature" :precision="2" :step="0.01" :min="34" :max="42"></el-input-number>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 15px">
                                                <div class="col-6">
                                                    <div class="form-group form-group-default" style="display:flex; justify-content: flex-start">
                                                        <a class="btn btn-primary text-white" @click="onChangePage()">Back</a>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group form-group-default" style="display:flex; justify-content: flex-end">
                                                        <a class="btn btn-success text-white" @click="createStaffDailyHealth()">Submit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" v-if="isPage3 === true">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-body ">
                            <div class="row" style="display: flex; justify-content: center; margin-bottom: 15px">
                                <div class="col-12">
                                    <h1 :style="[this.StaffDailyHealth.temperature <= '37.5' ? {'color': 'green'} :{'color': 'red'}]" style=" display: flex; justify-content: center"> {{StaffDailyHealth.temperature}} &#8451;</h1>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-7">
                                    <label style="font-size: 15px" class="text-muted text-dark">Daily Starter Pack</label>
                                </div>
                                <div class="col-1">
                                    <label style="font-size: 15px">:</label>
                                </div>
                                <div class="col-3" :style="[this.StaffDailyHealth.daily_starter_pack ==='Yes' ? {'color': 'green'} :{'color': 'red'}]">
                                    {{StaffDailyHealth.daily_starter_pack}}
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px;">
                                <div class="col-7">
                                    <label style="font-size: 15px" class="text-muted text-dark">Hand Sanitizing</label>
                                </div>
                                <div class="col-1">
                                    <label style="font-size: 15px">:</label>
                                </div>
                                <div class="col-3" :style="[this.StaffDailyHealth.hand_sanitizing ==='Yes' ? {'color': 'green'} :{'color': 'red'}]">
                                    {{StaffDailyHealth.hand_sanitizing}}
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 20px;">
                                <div class="col-7">
                                    <label style="font-size: 15px" class="text-muted text-dark">Overall Health</label>
                                </div>
                                <div class="col-1">
                                    <label style="font-size: 15px">:</label>
                                </div>
                                <div class="col-3" :style="[this.StaffDailyHealth.overall_health ==='Yes' ? {'color': 'green'} :{'color': 'red'}]">
                                    {{StaffDailyHealth.overall_health}}
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-7">
                                    <label style="font-size: 15px" class="text-muted text-dark">Flu</label>
                                </div>
                                <div class="col-1">
                                    <label style="font-size: 15px">:</label>
                                </div>
                                <div class="col-3" :style="[this.StaffDailyHealth.flu ==='Yes' ? {'color': 'red'} :{'color': 'green'}]">
                                    {{StaffDailyHealth.flu}}
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-7">
                                    <label style="font-size: 15px" class="text-muted text-dark">Cough</label>
                                </div>
                                <div class="col-1">
                                    <label style="font-size: 15px">:</label>
                                </div>
                                <div class="col-3" :style="[this.StaffDailyHealth.cough ==='Yes' ? {'color': 'red'} :{'color': 'green'}]">
                                    {{StaffDailyHealth.cough}}
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-7">
                                    <label style="font-size: 15px" class="text-muted text-dark">Breathing Difficulties</label>
                                </div>
                                <div class="col-1">
                                    <label style="font-size: 15px">:</label>
                                </div>
                                <div class="col-3" :style="[this.StaffDailyHealth.breathing_difficulty ==='Yes' ? {'color': 'red'} :{'color': 'green'}]">
                                    {{StaffDailyHealth.breathing_difficulty}}
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-7">
                                    <label style="font-size: 15px" class="text-muted text-dark">Sore Throat</label>
                                </div>
                                <div class="col-1">
                                    <label style="font-size: 15px">:</label>
                                </div>
                                <div class="col-3" :style="[this.StaffDailyHealth.sore_throat ==='Yes' ? {'color': 'red'} :{'color': 'green'}]">
                                    {{StaffDailyHealth.sore_throat}}
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-7">
                                    <label style="font-size: 15px" class="text-muted text-dark">Weak in Limbs</label>
                                </div>
                                <div class="col-1">
                                    <label style="font-size: 15px">:</label>
                                </div>
                                <div class="col-3" :style="[this.StaffDailyHealth.weak_in_limbs ==='Yes' ? {'color': 'red'} :{'color': 'green'}]">
                                    {{StaffDailyHealth.weak_in_limbs}}
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-12">
                                    <div class="row" style="margin-top: 15px">
                                        <div class="col-6"></div>
                                        <div class="col-6">
                                            <div class="form-group form-group-default" style="display:flex; justify-content: flex-end">
                                                <a class="btn btn-success text-white" @click="donePage()">Done</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    export default {
        props: {
            'id1': {
                type: String,
                required: true
            },
            'id2': {
                type: String,
                required: true
            }
        },
        data() {
            return {
                result: '',
                error: '',
                errors: [],
                isPage1: true,
                isPage2:false,
                isPage3:false,
                isScanner: true,
                isTemperature: false,
                Staff: {
                    id:'',
                    full_name: '',
                    username: '',
                    email: '',
                    staff_no:'',
                    telephone_no:'',
                    phone_no:'',
                    company_id:{
                        id:'',
                        name:'',
                        location: '',
                        base: '',
                    },
                    designation_id:{
                        id:'',
                        name:'',
                    },
                    department_id:{
                        id:'',
                        name:'',
                    },
                },
                StaffDailyHealth: {
                    staff_id: '',
                    staff_no: '',
                    staff_name: '',
                    company_id: '',
                    company_name: '',
                    daily_starter_pack:'',
                    hand_sanitizing: '',
                    flu: '',
                    cough:'',
                    breathing_difficulty:'',
                    sore_throat: '',
                    weak_in_limbs: '',
                    overall_health: '',
                    temperature: '',
                    remark: '',
                },
            }
        },
        created() {
            this.StaffInformation();
        },
        methods:{
            StaffInformation(){
                fetch('/api/v1/getStaffDetails/'+ this.id2).then(response => response.json())
                    .then(response => {
                        this.Staff = response.data;
                    })
                    .catch(error => console.log(error))
            },

            onChangePage()
            {
                this.errors = [];

                if(this.StaffDailyHealth.daily_starter_pack && this.StaffDailyHealth.hand_sanitizing && this.StaffDailyHealth.flu && this.StaffDailyHealth.cough
                    && this.StaffDailyHealth.breathing_difficulty && this.StaffDailyHealth.sore_throat && this.StaffDailyHealth.weak_in_limbs
                    && this.StaffDailyHealth.overall_health )
                {
                    this.isPage1 = !this.isPage1;
                    this.isPage2 = !this.isPage2;
                }

                if(!this.StaffDailyHealth.daily_starter_pack)
                {
                    this.errors['daily_starter_pack'] = "Please choose"
                }
                if(!this.StaffDailyHealth.hand_sanitizing)
                {
                    this.errors['hand_sanitizing'] = "Please choose"
                }
                if(!this.StaffDailyHealth.flu)
                {
                    this.errors['flu'] = "Please choose"
                }
                if(!this.StaffDailyHealth.cough)
                {
                    this.errors['cough'] = "Please choose"
                }
                if(!this.StaffDailyHealth.breathing_difficulty)
                {
                    this.errors['breathing_difficulty'] = "Please choose"
                }
                if(!this.StaffDailyHealth.sore_throat)
                {
                    this.errors['sore_throat'] = "Please choose"
                }
                if(!this.StaffDailyHealth.weak_in_limbs)
                {
                    this.errors['weak_in_limbs'] = "Please choose"
                }
                if(!this.StaffDailyHealth.overall_health)
                {
                    this.errors['overall_health'] = "Please choose"
                }
            },
            onDecode (result) {
                if(result === 'Tecnic@2020')
                {
                    this.isScanner = false;
                    this.isTemperature = true;
                }
                if(result !== 'Tecnic@2020')
                {
                    alert('Please Scan Again');
                }
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
                alert(this.error);
            },
            createStaffDailyHealth()
            {

                if(this.id1 ==='1')
                {
                    this.StaffDailyHealth.company_name = 'Plastictecnic Sdn Bhd - Bangi'
                }
                if(this.id1 ==='2')
                {
                    this.StaffDailyHealth.company_name = 'Plastictecnic Sdn Bhd - Nilai(A)'
                }
                if(this.id1 ==='3')
                {
                    this.StaffDailyHealth.company_name = 'Bangi Plastics Sdn Bhd - Nilai(B)'
                }

                axios.post('/api/v1/dailyhealth/staff-create-daily-health',
                    {
                        staff_id: this.Staff.id,
                        staff_no: this.Staff.staff_no,
                        staff_name: this.Staff.full_name,
                        company_id: this.Staff.company_id.id,
                        company_name: this.StaffDailyHealth.company_name,
                        daily_starter_pack: this.StaffDailyHealth.daily_starter_pack,
                        hand_sanitizing: this.StaffDailyHealth.hand_sanitizing,
                        flu: this.StaffDailyHealth.flu,
                        cough: this.StaffDailyHealth.cough,
                        breathing_difficulty: this.StaffDailyHealth.breathing_difficulty,
                        sore_throat: this.StaffDailyHealth.sore_throat,
                        weak_in_limbs: this.StaffDailyHealth.weak_in_limbs,
                        overall_health: this.StaffDailyHealth.overall_health,
                        temperature: this.StaffDailyHealth.temperature,
                        remark: this.StaffDailyHealth.remark,
                    }
                )
                    .then(res =>
                        this.isPage2 = !this.isPage2,
                        this.isPage3 = !this.isPage3,
                        //this.clearForm(),
                    );
            },
            clearForm(){
                this.StaffDailyHealth = {
                    staff_id: '',
                    staff_no: '',
                    staff_name: '',
                    company_id: '',
                    company_name: '',
                    daily_starter_pack:'',
                    hand_sanitizing: '',
                    flu: '',
                    cough:'',
                    breathing_difficulty:'',
                    sore_throat: '',
                    weak_in_limbs: '',
                    overall_health: '',
                    temperature: '',
                    remark: '',
                }
            },
            donePage(){
                this.clearForm();
                this.isPage1 = !this.isPage1;
                this.isPage3 = !this.isPage3;
            }
        }
    }
</script>