<template>
    <tr>
        <td class="fs-20" :style="[this.dailyhealth.temperature <= '37.5' ? {'color': 'green'} :{'color': 'red'}]">
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
        <td class="fs-20" :style="[this.dailyhealth.breathing_difficulty ==='Yes' ? {'color': 'red'} :{'color': 'green'}]">
            <span>{{this.dailyhealth.breathing_difficulty}}</span><br>
        </td>
        <td class="fs-20" :style="[this.dailyhealth.sore_throat ==='Yes' ? {'color': 'red'} :{'color': 'green'}]">
            <span>{{this.dailyhealth.sore_throat}}</span><br>
        </td>
        <td class="fs-20" :style="[this.dailyhealth.weak_in_limbs ==='Yes' ? {'color': 'red'} :{'color': 'green'}]">
            <span>{{this.dailyhealth.weak_in_limbs}}</span><br>
        </td>
        <td class="fs-20" style="color: #007bff;">
            <span>{{this.dailyhealth.created_at}}</span><br>
        </td>
    </tr>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                dailyhealth: this.data,
            }
        },
    }
</script>
