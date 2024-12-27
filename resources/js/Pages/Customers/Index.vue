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
import { Head, Link, useForm } from '@inertiajs/vue3';


const toast = useToast();
const filters = ref();
const selectedProduct = ref();


const show = (event) => {
    console.log(event);
    toast.add({ severity: 'info', summary: 'Info', detail: 'Message Content', group: 'br', life: 3000 });
};

const products = ref([
    {
        "id": 1,
        "name": "Sam Davis",
        "email": "s@davis.com",
        "phone_number": "952-228-4624",
        "company_name": "Lower Software Tech",
        "ticket_count": 38,
        "balance": 65
    },
    {
        "id": 2,
        "name": "Morgan Davis",
        "email": "m@davis.com",
        "phone_number": "797-224-5153",
        "company_name": "Elite Design Solutions",
        "ticket_count": 40,
        "balance": 97
    },
    {
        "id": 3,
        "name": "Jordan Smith",
        "email": "j@smith.com",
        "phone_number": "245-346-9269",
        "company_name": "Upper Software Solutions",
        "ticket_count": 29,
        "balance": 196
    },
    {
        "id": 4,
        "name": "Taylor Johnson",
        "email": "t@johnson.com",
        "phone_number": "318-579-5234",
        "company_name": "Prime Logistics Corp",
        "ticket_count": 36,
        "balance": 166
    },
    {
        "id": 5,
        "name": "Alex Davis",
        "email": "a@davis.com",
        "phone_number": "373-213-9980",
        "company_name": "Lower Truck LLC",
        "ticket_count": 33,
        "balance": 285
    },
    {
        "id": 6,
        "name": "Morgan Pedraza",
        "email": "m@pedraza.com",
        "phone_number": "789-127-4762",
        "company_name": "Elite Design Tech",
        "ticket_count": 9,
        "balance": 255
    },
    {
        "id": 7,
        "name": "Jordan Brown",
        "email": "j@brown.com",
        "phone_number": "904-425-6446",
        "company_name": "Prime Media Corp",
        "ticket_count": 34,
        "balance": 236
    },
    {
        "id": 8,
        "name": "Alex Johnson",
        "email": "a@johnson.com",
        "phone_number": "417-449-7923",
        "company_name": "Next Software LLC",
        "ticket_count": 41,
        "balance": 186
    },
    {
        "id": 9,
        "name": "Morgan Brown",
        "email": "m@brown.com",
        "phone_number": "983-406-2335",
        "company_name": "Prime Media LLC",
        "ticket_count": 45,
        "balance": 154
    },
    {
        "id": 10,
        "name": "Jordan Smith",
        "email": "j@smith.com",
        "phone_number": "898-494-8210",
        "company_name": "Upper Software Inc",
        "ticket_count": 30,
        "balance": 146
    },
    {
        "id": 11,
        "name": "Morgan Davis",
        "email": "m@davis.com",
        "phone_number": "484-859-1075",
        "company_name": "Lower Software Inc",
        "ticket_count": 41,
        "balance": 222
    },
    {
        "id": 12,
        "name": "Alex Pedraza",
        "email": "a@pedraza.com",
        "phone_number": "584-987-2896",
        "company_name": "Lower Software Inc",
        "ticket_count": 26,
        "balance": 126
    },
    {
        "id": 13,
        "name": "Jordan Davis",
        "email": "j@davis.com",
        "phone_number": "957-913-9312",
        "company_name": "Prime Logistics Corp",
        "ticket_count": 5,
        "balance": 196
    },
    {
        "id": 14,
        "name": "Jordan Davis",
        "email": "j@davis.com",
        "phone_number": "760-264-3154",
        "company_name": "Upper Software Corp",
        "ticket_count": 12,
        "balance": 287
    },
    {
        "id": 15,
        "name": "Jordan Johnson",
        "email": "j@johnson.com",
        "phone_number": "758-874-2140",
        "company_name": "Next Truck Corp",
        "ticket_count": 38,
        "balance": 72
    },
    {
        "id": 16,
        "name": "Alex Pedraza",
        "email": "a@pedraza.com",
        "phone_number": "872-160-4868",
        "company_name": "Prime Logistics Inc",
        "ticket_count": 8,
        "balance": 200
    },
    {
        "id": 17,
        "name": "Taylor Brown",
        "email": "t@brown.com",
        "phone_number": "401-758-5474",
        "company_name": "Elite Logistics Tech",
        "ticket_count": 12,
        "balance": 206
    },
    {
        "id": 18,
        "name": "Jordan Brown",
        "email": "j@brown.com",
        "phone_number": "137-702-4281",
        "company_name": "Elite Logistics Corp",
        "ticket_count": 36,
        "balance": 155
    },
    {
        "id": 19,
        "name": "Sam Pedraza",
        "email": "s@pedraza.com",
        "phone_number": "349-728-9457",
        "company_name": "Lower Design Inc",
        "ticket_count": 50,
        "balance": 153
    },
    {
        "id": 20,
        "name": "Alex Davis",
        "email": "a@davis.com",
        "phone_number": "613-357-3919",
        "company_name": "Elite Media Inc",
        "ticket_count": 12,
        "balance": 93
    },
    {
        "id": 21,
        "name": "Morgan Brown",
        "email": "m@brown.com",
        "phone_number": "727-920-4991",
        "company_name": "Prime Media Tech",
        "ticket_count": 15,
        "balance": 107
    },
    {
        "id": 22,
        "name": "Morgan Brown",
        "email": "m@brown.com",
        "phone_number": "312-244-5154",
        "company_name": "Elite Truck Tech",
        "ticket_count": 34,
        "balance": 231
    },
    {
        "id": 23,
        "name": "Alex Smith",
        "email": "a@smith.com",
        "phone_number": "478-535-5617",
        "company_name": "Next Design Corp",
        "ticket_count": 29,
        "balance": 203
    },
    {
        "id": 24,
        "name": "Alex Johnson",
        "email": "a@johnson.com",
        "phone_number": "102-260-6627",
        "company_name": "Lower Truck Inc",
        "ticket_count": 11,
        "balance": 220
    },
    {
        "id": 25,
        "name": "Alex Smith",
        "email": "a@smith.com",
        "phone_number": "871-524-9864",
        "company_name": "Lower Logistics Corp",
        "ticket_count": 21,
        "balance": 107
    },
    {
        "id": 26,
        "name": "Sam Johnson",
        "email": "s@johnson.com",
        "phone_number": "391-548-6946",
        "company_name": "Lower Design Solutions",
        "ticket_count": 45,
        "balance": 165
    },
    {
        "id": 27,
        "name": "Jordan Smith",
        "email": "j@smith.com",
        "phone_number": "804-469-6774",
        "company_name": "Lower Truck Solutions",
        "ticket_count": 3,
        "balance": 231
    },
    {
        "id": 28,
        "name": "Alex Johnson",
        "email": "a@johnson.com",
        "phone_number": "258-456-5504",
        "company_name": "Prime Software Inc",
        "ticket_count": 27,
        "balance": 233
    },
    {
        "id": 29,
        "name": "Alex Smith",
        "email": "a@smith.com",
        "phone_number": "441-965-4900",
        "company_name": "Elite Logistics LLC",
        "ticket_count": 37,
        "balance": 284
    },
    {
        "id": 30,
        "name": "Taylor Brown",
        "email": "t@brown.com",
        "phone_number": "680-849-1744",
        "company_name": "Upper Software Inc",
        "ticket_count": 49,
        "balance": 152
    },
    {
        "id": 31,
        "name": "Alex Smith",
        "email": "a@smith.com",
        "phone_number": "693-301-5544",
        "company_name": "Upper Logistics Tech",
        "ticket_count": 9,
        "balance": 150
    },
    {
        "id": 32,
        "name": "Taylor Smith",
        "email": "t@smith.com",
        "phone_number": "385-511-6297",
        "company_name": "Next Design LLC",
        "ticket_count": 26,
        "balance": 65
    },
    {
        "id": 33,
        "name": "Jordan Davis",
        "email": "j@davis.com",
        "phone_number": "952-141-3387",
        "company_name": "Elite Software Inc",
        "ticket_count": 37,
        "balance": 222
    },
    {
        "id": 34,
        "name": "Jordan Brown",
        "email": "j@brown.com",
        "phone_number": "688-880-2527",
        "company_name": "Lower Logistics Tech",
        "ticket_count": 11,
        "balance": 150
    },
    {
        "id": 35,
        "name": "Sam Johnson",
        "email": "s@johnson.com",
        "phone_number": "562-773-4943",
        "company_name": "Next Design Solutions",
        "ticket_count": 3,
        "balance": 97
    }
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


const onRowSelect = (event) => {
    console.log('row select');
    toast.add({ severity: 'info', summary: 'Product Selected', detail: 'Name: Hello World', life: 3000 });
};
const onRowUnselect = (event) => {
    toast.add({ severity: 'warn', summary: 'Product Unselected', detail: 'Name: Hello World', life: 3000 });
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

            <Link :href="route('customers.create')" class="btn btn-primary btn-sm" @click="show()">Add New Customer</Link>
        </template>
        <div class="bg-gray-50">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
                <div class="overflow-hidden shadow-lg sm:rounded-lg bg-white">
                    <DataTable
                        v-model:selection="selectedProduct"
                        :filters="filters"
                        :value="products"
                        selectionMode="single"
                        dataKey="id"
                        :metaKeySelection="false"
                        paginator
                        filterDisplay="menu"
                        :rows="10"
                        size="large"
                        ref="dt"
                        removableSort
                        :rowsPerPageOptions="[5, 10, 15, 20, 50]"
                        paginatorTemplate="RowsPerPageDropdown FirstPageLink PrevPageLink CurrentPageReport NextPageLink LastPageLink"
                        currentPageReportTemplate="{first} to {last} of {totalRecords}"
                        :globalFilterFields="['name', 'email', 'phone_number', 'company_name', 'ticket_count', 'balance']"
                        class="table rounded-lg">
                        <template #header>
                            <div class="flex justify-between pl-0 pr-0">
                            <div class="px-0">
                                <button class="btn btn-primary btn-sm" @click="exportCSV($event)">Export CSV</button>
                                <button class="btn btn-secondary btn-sm ml-2" @click="clearFilter($event)">Clear Filter</button>
                            </div>
                            <div class="flex justify-between">
                                <input type="text" v-model="filters['global'].value" @input="dt.filter($event.target.value)" placeholder="Search" class="input input-bordered w-full max-w-xs input-sm" />
                            </div>
                            </div>
                        </template>


                        <template #empty> No customers found. </template>
                        <template #loading> Loading customers data. Please wait. </template>

                        <Column
                            field="name"
                            header="Name"
                            sortable
                            headerClass="text-gray-700 font-bold py-3 px-4"
                            class=" py-2 px-4 text-gray-700"
                        >
                        </Column>

                        <Column
                            field="email"
                            header="Email"
                            sortable
                            headerClass="text-gray-700 font-bold py-3 px-4"
                            class="py-2 px-4 text-gray-700"
                        />

                        <Column
                            field="phone_number"
                            header="Phone Number"
                            sortable
                            headerClass="text-gray-700 font-bold py-3 px-4"
                            class="py-2 px-4 text-gray-700"
                        />

                        <Column
                            field="company_name"
                            header="Company Name"
                            sortable
                            headerClass="text-gray-700 font-bold py-3 px-4"
                            class="py-2 px-4 text-gray-700"
                        />

                        <Column
                            field="ticket_count"
                            header="Outstanding Ticket Count"
                            sortable
                            headerClass="text-gray-700 font-bold text-center py-3 px-4"
                            class="text-center py-2 px-4 text-gray-700"
                        />

                        <Column
                            field="balance"
                            header="Balance"
                            sortable
                            headerClass="text-gray-700 font-bold py-3 px-4"
                            class="py-2 px-4 text-gray-700"
                        >
                            <template #body="{ data }">
                                ${{ data.balance}}.00
                            </template>
                        </Column>

                        <Column class="">
                            <template #body="{ data }">
                                 <Link class="btn btn-sm" :href="route('customers.show', data.id)">
                                    {{ $t('View Customer') }}
                                </Link>

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
