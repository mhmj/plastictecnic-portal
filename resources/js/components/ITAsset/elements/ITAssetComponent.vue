<template>
    <tr>
        <td class="text-left">
            {{this.asset.model}}
        </td>
        <td class="text-left">
            {{this.asset.it_asset_brand_id.name}}
        </td>
        <td class="text-left">
            {{this.asset.asset_category_id.name}}
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
                asset: this.data
            }
        },
    }
</script>