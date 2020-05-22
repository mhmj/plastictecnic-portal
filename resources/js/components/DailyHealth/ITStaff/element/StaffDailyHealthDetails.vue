<template>
    <tr style="border-bottom: 1px solid lightgray">
        <td class="fs-20" style="" :style="[this.dailyhealth.temperature <= '37.5' ? {'color': 'green'} :{'color': 'red'}]">
            <span>{{this.dailyhealth.temperature}}</span><br>
        </td>
        <td class="fs-20" :style="[this.dailyhealth.daily_starter_pack ==='Yes' ? {'color': 'green'} :{'color': 'red'}]">
            <span>{{this.dailyhealth.daily_starter_pack}}</span><br>
        </td>
        <td class="fs-20" :style="[this.dailyhealth.hand_sanitizing ==='Yes' ? {'color': 'green'} :{'color': 'red'}]">
            <span>{{this.dailyhealth.hand_sanitizing}}</span><br>
        </td>
        <td class="fs-20" :style="[this.dailyhealth.overall_health ==='Yes' ? {'color': 'green'} :{'color': 'red'}]">
            <span>{{this.dailyhealth.overall_health}}</span><br>
        </td>
        <td class="fs-20" :style="[this.dailyhealth.flu ==='Yes' ? {'color': 'red'} :{'color': 'green'}]">
            <span>{{this.dailyhealth.flu}}</span><br>
        </td>
        <td class="fs-20" :style="[this.dailyhealth.cough ==='Yes' ? {'color': 'red'} :{'color': 'green'}]">
            <span>{{this.dailyhealth.cough}}</span><br>
        </td>
        <td class="fs-20" :style="[this.dailyhealth.breathing_difficulty ==='Yes' ? {'color': 'red'} :{'color': 'green'} ]">
            <span>{{this.dailyhealth.breathing_difficulty}}</span><br>
        </td>
        <td class="fs-20" :style="[this.dailyhealth.sore_throat ==='Yes' ? {'color': 'red'} :{'color': 'green'}]">
            <span>{{this.dailyhealth.sore_throat}}</span><br>
        </td>
        <td class="fs-20" :style="[this.dailyhealth.weak_in_limbs ==='Yes' ? {'color': 'red'} :{'color': 'green'}]">
            <span>{{this.dailyhealth.weak_in_limbs}}</span><br>
        </td>
        <td class="fs-20" style="font-size: 14px; padding: 0px; padding-top: 15px">
            <span>{{this.dailyhealth.created_at}}</span><br>
        </td>
        <td class="fs-20" style="color: #007bff; padding: 0px;padding-left: 15px; padding-top: 15px">
            <el-popover
                    placement="left"
                    width="auto"
                    v-model="visible">
                <p class="text-danger">Are you sure to <br> delete this?</p>
                <div style="text-align: right; margin: 0">
                    <el-button type="danger" size="mini" @click="DeleteDailyHealths()">Confirm</el-button>
                    <el-button style="margin-top: 5px" size="mini" type="default" @click="visible = false">Cancel</el-button>
                </div>
                <el-button style="border: none; padding: 0px " slot="reference"> <i  class="fa fa-trash text-danger"></i></el-button>
            </el-popover>
        </td>
    </tr>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                dailyhealth: this.data,
                visible: false,
            }
        },
        methods : {
            DeleteDailyHealths(){
                this.visible = false;
                var url = '/api/v1/dailyhealth/'+ this.dailyhealth.id +'/delete-staff-personal-daily-health', method = 'delete';
                fetch(url, {
                    method: method,
                    body: JSON.stringify(),
                    headers: {
                        'content-type': 'application/json'
                    }
                }).then((response) => {

                    if(this.$parent.isSearching === false)
                    {
                        Event.$emit('updateStaffList');
                    }
                    if(this.$parent.isSearching === true)
                    {
                        Event.$emit('updateStaffSearchList');
                    }

                })
            },
        }
    }
</script>
