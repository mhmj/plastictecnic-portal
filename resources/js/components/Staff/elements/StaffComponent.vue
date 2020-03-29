<template>
    <tr>
        <td class="text-left">
            {{this.staff.company_id.location}}
        </td>
        <td class="text-left">
            {{this.staff.first_name}} {{this.staff.last_name}}
        </td>
        <td class="text-left">
            {{this.staff.designation_id.name}}
        </td>
        <td class="td-actions text-right">
            <button type="button" rel="tooltip" title="" class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Edit Task">
                <i class="now-ui-icons ui-2_settings-90"></i>
            </button>
            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral" data-original-title="Remove">
                <i class="now-ui-icons ui-1_simple-remove"></i>
            </button>
        </td>
    </tr>
</template>
<script>
    export default {
        props: ['data'],
        data() {
            return {
                staff: this.data
            }
        },
        mounted() {
            console.log('Component Staff mounted.')
        },
    }
</script>