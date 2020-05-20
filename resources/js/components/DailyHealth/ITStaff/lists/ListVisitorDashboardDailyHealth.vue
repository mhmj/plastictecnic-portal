<template>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <el-tabs v-model="activeName">
                        <el-tab-pane label="Bangi" name="Bangi">
                            <list-visitor-daily-health-component id1="1" category="bangi"></list-visitor-daily-health-component>
                        </el-tab-pane>
                        <el-tab-pane label="Nilai Plant(Block A)" name="NilaiA">
                            <list-visitor-daily-health-component id1="2" category="nilaiA"></list-visitor-daily-health-component>
                        </el-tab-pane>
                        <el-tab-pane label="Nilai Plant(Block B)" name="NilaiB">
                            <list-visitor-daily-health-component id1="3" category="nilaiB"></list-visitor-daily-health-component>
                        </el-tab-pane>
                    </el-tabs>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                activeName: 'Bangi',
            }
        },
    }
</script>