<template>
    <div style="margin-top: 0px">
        <div class="row border-bottom" style=" padding: 0px;" >
            <div class="col-lg-12 text-left">
                <div class="row">
                    <div class="col-lg-1">
                        <span style="font-size: 15px; font-weight: bold" :style="[this.dailyhealth.temperature <= '37.5' ? {'color': 'green'} :{'color': 'red'}]">{{this.dailyhealth.temperature}} &#8451;</span>
                    </div>
                    <div class="col-lg-3 text-info">
                        <span style="font-size: 15px;">{{this.dailyhealth.staff_name}}</span>
                    </div>
                    <div class="col-lg-2 text-info">
                        <span style="font-size: 15px;">{{this.dailyhealth.staff_no}}</span>
                    </div>
                    <div class="col-lg-3 text-info">
                        <span style="font-size: 15px;">{{this.dailyhealth.company_name}}</span>
                    </div>
                    <div class="col-lg-2">
                        <span style="font-size: 15px;">{{this.dailyhealth.created_at}}</span>
                    </div>
                    <div class="col-lg-1  text-right" style="margin-top:-15px; margin-bottom: 15px">
                        <a @click="toggleView()" rel="tooltip" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" title="" class="btn  btn-icon btn-icon-mini btn-neutral">
                            <i class="fa fa-search-plus text-dark"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-bottom" style="margin-bottom: 10px" v-show-slide="isViewing" >
            <div class="col-lg-12 text-left">
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
                                            {{dailyhealth.staff_name}}
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
                                            {{dailyhealth.staff_no}}
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-4">
                                            <label style="font-size: 15px" class="text-muted text-dark">Company</label>
                                        </div>
                                        <div class="col-1">
                                            <label style="font-size: 15px">:</label>
                                        </div>
                                        <div class="col-6 text-info">
                                            {{dailyhealth.company_name}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-body ">
                                    <div class="row" style="display: flex; justify-content: center; margin-bottom: 15px">
                                        <div class="col-12">
                                            <h1 :style="[this.dailyhealth.temperature <= '37.5' ? {'color': 'green'} :{'color': 'red'}]" style=" display: flex; justify-content: center"> {{dailyhealth.temperature}} &#8451;</h1>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-7">
                                            <label style="font-size: 15px" class="text-muted text-dark">Daily Starter Pack</label>
                                        </div>
                                        <div class="col-1">
                                            <label style="font-size: 15px">:</label>
                                        </div>
                                        <div class="col-3" :style="[this.dailyhealth.daily_starter_pack ==='Yes' ? {'color': 'green'} :{'color': 'red'}]">
                                            {{dailyhealth.daily_starter_pack}}
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 10px;">
                                        <div class="col-7">
                                            <label style="font-size: 15px" class="text-muted text-dark">Hand Sanitizing</label>
                                        </div>
                                        <div class="col-1">
                                            <label style="font-size: 15px">:</label>
                                        </div>
                                        <div class="col-3" :style="[this.dailyhealth.hand_sanitizing ==='Yes' ? {'color': 'green'} :{'color': 'red'}]">
                                            {{dailyhealth.hand_sanitizing}}
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col-7">
                                            <label style="font-size: 15px" class="text-muted text-dark">Overall Health</label>
                                        </div>
                                        <div class="col-1">
                                            <label style="font-size: 15px">:</label>
                                        </div>
                                        <div class="col-3" :style="[this.dailyhealth.overall_health ==='Yes' ? {'color': 'green'} :{'color': 'red'}]">
                                            {{dailyhealth.overall_health}}
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-7">
                                            <label style="font-size: 15px" class="text-muted text-dark">Flu</label>
                                        </div>
                                        <div class="col-1">
                                            <label style="font-size: 15px">:</label>
                                        </div>
                                        <div class="col-3" :style="[this.dailyhealth.flu ==='Yes' ? {'color': 'red'} :{'color': 'green'}]">
                                            {{dailyhealth.flu}}
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-7">
                                            <label style="font-size: 15px" class="text-muted text-dark">Cough</label>
                                        </div>
                                        <div class="col-1">
                                            <label style="font-size: 15px">:</label>
                                        </div>
                                        <div class="col-3" :style="[this.dailyhealth.cough ==='Yes' ? {'color': 'red'} :{'color': 'green'}]">
                                            {{dailyhealth.cough}}
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-7">
                                            <label style="font-size: 15px" class="text-muted text-dark">Breathing Difficulties</label>
                                        </div>
                                        <div class="col-1">
                                            <label style="font-size: 15px">:</label>
                                        </div>
                                        <div class="col-3" :style="[this.dailyhealth.breathing_difficulty ==='Yes' ? {'color': 'red'} :{'color': 'green'}]">
                                            {{dailyhealth.breathing_difficulty}}
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-7">
                                            <label style="font-size: 15px" class="text-muted text-dark">Sore Throat</label>
                                        </div>
                                        <div class="col-1">
                                            <label style="font-size: 15px">:</label>
                                        </div>
                                        <div class="col-3" :style="[this.dailyhealth.sore_throat ==='Yes' ? {'color': 'red'} :{'color': 'green'}]">
                                            {{dailyhealth.sore_throat}}
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 10px">
                                        <div class="col-7">
                                            <label style="font-size: 15px" class="text-muted text-dark">Weak in Limbs</label>
                                        </div>
                                        <div class="col-1">
                                            <label style="font-size: 15px">:</label>
                                        </div>
                                        <div class="col-3" :style="[this.dailyhealth.weak_in_limbs ==='Yes' ? {'color': 'red'} :{'color': 'green'}]">
                                            {{dailyhealth.weak_in_limbs}}
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
    export default {
        props: ['data'],
        data() {
            return {
                dailyhealth: this.data,
                isViewing: false,
            }
        },
        mounted(){
            Event.$on('toggleView', () => {
                this.toggleView();
            });
        },
        created(){

        },
        methods:{
            toggleView(){
                this.isViewing = !this.isViewing;
            },
        }
    }
</script>