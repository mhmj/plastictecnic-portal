<template>
        <tr>
            <td class="fs-20" style="color: #007bff;">
                <span>{{this.license.license_no}}</span><br>
            </td>
            <td class="fs-20" style="color: #007bff;">
                <span>{{this.license.license_name}}</span><br>
            </td>
            <td class="fs-20" style="color: #007bff;">
                <span>{{this.license.serial_key}}</span><br>
            </td>
            <td class="fs-20" style="color: #007bff;">
                <span>{{this.license.version}}</span><br>
            </td>
        </tr>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                license: this.data,
                isEditing: false,
                isDeleting: false,
            }
        },
        mounted(){
            Event.$on('toggleEdit', () => {
                this.toggleEdit();
            });
            Event.$on('toggleDelete', () => {
                this.toggleDelete();
            });
        },
        methods:{
            toggleEdit(){
                this.isEditing = !this.isEditing;
            },
            toggleDelete(){
                this.isDeleting = !this.isDeleting;
            },
        }
    }
</script>
