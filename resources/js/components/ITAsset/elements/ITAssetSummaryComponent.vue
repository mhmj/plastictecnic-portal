<template>
    <div>
        <div class="row">
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <label class="muted" style="color: #2b5797;"><h5>Asset Category</h5></label>
                                <img
                                        style="width: 900px; height: 250px"
                                        src="/images/graph/graph-2.jpg"
                                />
                            </div>
                            <div class="card-body">
                                <!--<it-asset-category-chart-element-component></it-asset-category-chart-element-component>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <label class="muted" style="color: #2b5797;"><h5>Brands</h5></label>
                            </div>
                            <div class="card-body">
                                <it-asset-brand-chart-element-component></it-asset-brand-chart-element-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
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
