<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import ColumnGroup from "primevue/columngroup";
import Row from "primevue/row";
import { ref, onMounted } from "vue";
import { useToast } from "primevue/usetoast";
import { FilterMatchMode, FilterOperator } from '@primevue/core/api';
import InputIcon from 'primevue/inputicon';
import IconField from 'primevue/iconfield';
import InputText from 'primevue/inputtext';
import Button from 'primevue/button';

const toast = useToast();
const filters = ref();
const selectedProduct = ref();


const show = () => {
    toast.add({ severity: 'info', summary: 'Info', detail: 'Message Content', group: 'br', life: 3000 });
};

const products = ref([
    { id: 1, code: "S1", name: "Spinach", category: "Vegetable", quantity: 19 },
    { id: 2, code: "Z2", name: "Zucchini", category: "Vegetable", quantity: 50 },
    { id: 3, code: "C3", name: "Carrot", category: "Vegetable", quantity: 36 },
    { id: 4, code: "P4", name: "Peach", category: "Fruit", quantity: 21 },
    { id: 5, code: "P5", name: "Potato", category: "Vegetable", quantity: 12 },
    { id: 6, code: "B6", name: "Broccoli", category: "Vegetable", quantity: 15 },
    { id: 7, code: "C7", name: "Cherry", category: "Fruit", quantity: 33 },
    { id: 8, code: "A8", name: "Apple", category: "Fruit", quantity: 29 },
    { id: 9, code: "C9", name: "Carrot", category: "Vegetable", quantity: 42 },
    { id: 10, code: "C10", name: "Cherry", category: "Fruit", quantity: 45 },
    { id: 11, code: "P11", name: "Pepper", category: "Vegetable", quantity: 11 },
    { id: 12, code: "P12", name: "Pepper", category: "Vegetable", quantity: 6 },
    { id: 13, code: "G13", name: "Grape", category: "Fruit", quantity: 46 },
    { id: 14, code: "L14", name: "Lettuce", category: "Vegetable", quantity: 26 },
    { id: 15, code: "O15", name: "Orange", category: "Fruit", quantity: 37 },
    { id: 16, code: "B16", name: "Broccoli", category: "Vegetable", quantity: 26 },
    { id: 17, code: "Z17", name: "Zucchini", category: "Vegetable", quantity: 9 },
    { id: 18, code: "P18", name: "Pineapple", category: "Fruit", quantity: 11 },
    { id: 19, code: "B19", name: "Banana", category: "Fruit", quantity: 50 },
    { id: 20, code: "A20", name: "Apple", category: "Fruit", quantity: 46 },
    { id: 21, code: "L21", name: "Lemon", category: "Fruit", quantity: 8 },
    { id: 22, code: "C22", name: "Cherry", category: "Fruit", quantity: 43 },
    { id: 23, code: "S23", name: "Strawberry", category: "Fruit", quantity: 41 },
    { id: 24, code: "O24", name: "Orange", category: "Fruit", quantity: 38 },
    { id: 25, code: "O25", name: "Onion", category: "Vegetable", quantity: 12 },
    { id: 26, code: "G26", name: "Grape", category: "Fruit", quantity: 39 },
    { id: 27, code: "P27", name: "Potato", category: "Vegetable", quantity: 21 },
    { id: 28, code: "G28", name: "Grape", category: "Fruit", quantity: 31 },
    { id: 29, code: "C29", name: "Cucumber", category: "Vegetable", quantity: 5 },
    { id: 30, code: "T30", name: "Tomato", category: "Vegetable", quantity: 42 }
]);

const initFilters = () => {
    filters.value = {
        global: { value: null, matchMode: FilterMatchMode.CONTAINS },
        name: { value: null, matchMode: FilterMatchMode.STARTS_WITH },
        code: { value: null, matchMode: FilterMatchMode.STARTS_WITH },
        category: { value: null, matchMode: FilterMatchMode.IN },
        quantity: { value: null, matchMode: FilterMatchMode.EQUALS },
    }
}

initFilters();

const clearFilter = () => {
    initFilters();
};


const statuses = ref(['unqualified', 'qualified', 'new', 'negotiation', 'renewal', 'proposal']);


const getSeverity = (status) => {
    switch (status) {
        case 'unqualified':
            return 'danger';

        case 'qualified':
            return 'success';

        case 'new':
            return 'info';

        case 'negotiation':
            return 'warn';

        case 'renewal':
            return null;
    }
}

const dt = ref();


const exportCSV = () => {
    dt.value.exportCSV();
};

const selectRow = (data) => {
    toast.add({ severity: 'info', summary: data.name, detail: data.code + ' | $' + data.quantity, life: 3000 });
};



</script>

<template>
    <AppLayout title="Customers">
        <template #header>
            <h2 class="font-semibold text-xl leading-tight">
                {{ $t("Customer Overview") }}
            </h2>

            <button class="btn btn-primary btn-sm" @click="show()">Add New Customer</button>
        </template>
        <div class="bg-gray-50">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
                <div class="overflow-hidden shadow-lg sm:rounded-lg p-6 bg-white">
                    <DataTable
                        v-model:selection="selectedProduct"
                        :filters="filters"
                        :value="products"
                        selectionMode="single"
                        dataKey="id"
                        :metaKeySelection="metaKey"
                        paginator
                        filterDisplay="menu"
                        :rows="10"
                        size="large"
                        ref="dt"
                        :rowsPerPageOptions="[5, 10, 20, 50]"
                        paginatorTemplate="RowsPerPageDropdown FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink"
                        currentPageReportTemplate="{first} to {last} of {totalRecords}"
                        :globalFilterFields="['code', 'name', 'category', 'quantity']"
                        class="table rounded-lg">
                        <template #header>
                            <div class="flex justify-between">
                            <div>
                                <Button icon="pi pi-external-link"  class="btn-sm mr-2" label="Export" outlined @click="exportCSV($event)" />
                                <Button type="button" class="btn-sm" icon="pi pi-filter-slash" label="Clear" outlined @click="clearFilter()" />
                            </div>
                            <div class="flex justify-between">
                                <IconField>
                                    <InputIcon>
                                        <i class="pi pi-search" />
                                    </InputIcon>
                                    <InputText v-model="filters['global'].value" placeholder="Search"/>
                                </IconField>
                            </div>
                            </div>
                        </template>


                        <template #empty> No customers found. </template>
                        <template #loading> Loading customers data. Please wait. </template>

                        <!-- <template #paginatorstart>
                            <Button type="button" icon="pi pi-refresh" text style="font-size: 1rem" />
                        </template>
                        <template #paginatorend>
                            <Button type="button" icon="pi pi-download" text />
                        </template> -->

                        <Column
                            field="code"
                            header="Name"
                            sortable
                            headerClass="text-gray-700 font-bold text-left py-3 px-4"
                            class="text-left py-2 px-4 text-gray-700"
                        >
                            <!-- <template #body="{ data }">
                                {{ data.name }}
                            </template>
                            <template #filter="{ filterModel, filterCallback }">
                                <input v-model="filterModel.value" type="text" @input="filterCallback()" placeholder="Search by name" />
                            </template> -->
                        </Column>

                        <Column
                            field="name"
                            header="Email"
                            sortable
                            headerClass="text-gray-700 font-bold text-left py-3 px-4"
                            class="text-left py-2 px-4 text-gray-700"
                        />

                        <Column
                            field="category"
                            header="Phone Number"
                            sortable
                            headerClass="text-gray-700 font-bold text-left py-3 px-4"
                            class="text-left py-2 px-4 text-gray-700"
                        />

                        <Column
                            field="category"
                            header="Company Name"
                            sortable
                            headerClass="text-gray-700 font-bold text-left py-3 px-4"
                            class="text-left py-2 px-4 text-gray-700"
                        />

                        <Column
                            field="category"
                            header="Outstanding Ticket Count"
                            sortable
                            headerClass="text-gray-700 font-bold text-left py-3 px-4"
                            class="text-left py-2 px-4 text-gray-700"
                        />

                        <Column
                            field="category"
                            header="Balance"
                            sortable
                            headerClass="text-gray-700 font-bold text-left py-3 px-4"
                            class="text-left py-2 px-4 text-gray-700"
                        />
                        <Column class="w-24 !text-end">
                            <template #body="{ data }">
                                <Button icon="pi pi-search" @click="selectRow(data)" severity="secondary" rounded></Button>
                            </template>
                        </Column>

                    </DataTable>
                    <Toast position="bottom-right" group="br" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<style>
table {
    width: 100%;
}
.p-datatable-filter-overlay-popover {
    background-color: #f9fafb;
}
.p-select-list {
    background-color: #f9fafb;
}
</style>
