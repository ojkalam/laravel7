<template>
    <div class="col-lg-12 control-section">
        <div>
            <ejs-grid :dataSource="data" :allowPaging='true' :pageSettings='pageSettings'>
                <e-columns>
                    <e-column field='OrderID' headerText='Order ID' width='120' textAlign='Right'></e-column>
                    <e-column field='CustomerID' headerText='Customer ID' width='160'></e-column>
                    <e-column field='EmployeeID' headerText='Employee ID' width='120' textAlign='Right'></e-column>
                    <e-column field='Freight' headerText='Freight' width='150' format='C2' textAlign='Right'></e-column>
                    <e-column field='ShipCountry' headerText='ShipCountry' width='150' ></e-column>
                </e-columns>
            </ejs-grid>
        </div>


    </div>
</template>
<script >
// import Vue from "vue";
import { GridPlugin, Page } from "@syncfusion/ej2-vue-grids";
import { DataManager, WebApiAdaptor } from "@syncfusion/ej2-data";

Vue.use(GridPlugin);

export default Vue.extend({
    data: () => {
        return {
            data: new DataManager({
                url: 'https://ej2services.syncfusion.com/production/web-services/api/Orders',
                adaptor: new WebApiAdaptor()
            }),
            pageSettings: { pageCount: 3 }
        };
    },
    provide: {
        grid: [Page]
    }
});
</script>
