<template>
    <div>
        <div class="row">
            <div class="col-lg-7" style="margin-bottom: 15px; display: flex; justify-content: flex-end">
                <div class="card">
                    <div class="card-header">
                        <label class="muted" style="color: #2b5797;"><h5>Brands</h5></label>
                    </div>
                    <div class="card-body">
                        <it-asset-brand-chart-element-component></it-asset-brand-chart-element-component>
                    </div>
                </div>
            </div>
            <div class="col-lg-5" style="">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <label class="muted" style="color: #2b5797;"><h5>Location</h5></label>
                            </div>
                            <div class="card-body">
                                <it-asset-location-chart-element-component></it-asset-location-chart-element-component>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <label class="muted" style="color: #2b5797;"><h5>Total Received</h5></label>
                            </div>
                            <div class="card-body">
                                <it-asset-received-chart-element-component></it-asset-received-chart-element-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
