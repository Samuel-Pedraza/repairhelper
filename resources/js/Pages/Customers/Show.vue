<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import DeleteTeamForm from "@/Pages/Teams/Partials/DeleteTeamForm.vue";
import SectionBorder from "@/Components/Profile/SectionBorder.vue";
import TeamMemberManager from "@/Pages/Teams/Partials/TeamMemberManager.vue";
import UpdateTeamNameForm from "@/Pages/Teams/Partials/UpdateTeamNameForm.vue";
import Menu from "primevue/menu";
import Fieldset from "primevue/fieldset";

defineProps({
    customer: Object,
});
</script>

<template>
    <AppLayout title="Customer">
        <template #header>
            <h2 class="font-semibold text-xl leading-tight">
                Customer Details
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="pb-5">
                    <div class="flex justify-between">
                        <div>
                            <h2 class="font-semibold text-xl leading-tight">
                                {{ customer.name }}
                            </h2>
                            <p>
                                {{ customer.email_address }}
                            </p>
                            <p v-if="customer.unit === null">
                                {{
                                    customer.street_address +
                                    ", " +
                                    customer.city +
                                    ", " +
                                    customer.state +
                                    " " +
                                    customer.zip_code
                                }}
                            </p>
                            <p v-else>
                                {{
                                    customer.street_address +
                                    " " +
                                    customer.unit +
                                    ", " +
                                    customer.city +
                                    ", " +
                                    customer.state +
                                    " " +
                                    customer.zip_code
                                }}
                            </p>
                            <a
                                class="link text-blue-500"
                                :href="customer.website"
                                target="_blank"
                            >
                                {{ customer.website }}
                                <i class="text-xs pi pi-external-link pl-1"></i>
                            </a>
                        </div>
                        <div>
                            <div class="text-right">
                                <button class="btn btn-primary btn-ghost">
                                    <i class="text-md pi pi-user-edit"></i>
                                </button>
                                <button class="btn btn-primary btn-ghost">
                                    <i class="text-md pi pi-phone"></i>
                                </button>
                                <button class="btn btn-primary btn-ghost">
                                    <i class="text-md pi pi-envelope"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="stats shadow flex">
                        <div class="stat text-center">
                            <div class="stat-figure text-primary"></div>
                            <div class="stat-title">Open Tickets</div>
                            <div class="stat-value text-primary">2</div>
                        </div>
                        <div class="stat text-center">
                            <div class="stat-figure text-secondary"></div>
                            <div class="stat-title">Open Invoices</div>
                            <div class="stat-value text-secondary">5</div>
                        </div>
                        <div class="stat text-center">
                            <div class="stat-figure text-secondary"></div>
                            <div class="stat-title">Current Balance</div>
                            <div class="stat-value text-secondary">$25000</div>
                        </div>
                        <div class="stat text-center">
                            <div class="stat-figure text-secondary"></div>
                            <div class="stat-title">Assets</div>
                            <div class="stat-value text-secondary">32</div>
                        </div>
                    </div>
                    <Fieldset legend="Customer Overview">
                        <p class="m-0">
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit in voluptate velit esse cillum dolore
                            eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat non proident, sunt in culpa qui officia
                            deserunt mollit anim id est laborum.
                        </p>
                    </Fieldset>
                </div>
                <div role="tablist" class="tabs tabs-bordered mt-10">
                    <a role="tab" class="tab tab-active">Activity</a>
                    <a role="tab" class="tab">Tickets</a>
                    <a role="tab" class="tab">Notes</a>
                    <a role="tab" class="tab">Passwords</a>
                    <a role="tab" class="tab">Invoices</a>
                    <a role="tab" class="tab">Estimates</a>
                    <a role="tab" class="tab">Assets</a>
                    <a role="tab" class="tab">Contacts</a>
                    <a role="tab" class="tab">Payments</a>
                    <a role="tab" class="tab">Email</a>
                    <a role="tab" class="tab">Documents</a>
                </div>
                <div>
                    <ul class="steps steps-vertical mt-5">
                        <li class="step" data-content="">
                            <div class="card bg-base-100 w-100 shadow-xl mt-3 border gap-0">
                                <div class="card-body">
                                    <h2 class="card-title">
                                        <i class="text-2xl text-surface-500 dark:text-surface-400 pi pi-receipt"></i>
                                        Invoice Paid
                                    </h2>
                                    <div class="stat-desc text-left">10:30 AM December 26th, 2024</div>
                                    <div class="stat-desc text-left">Invoice #42134</div>
                                    <p>
                                        Need help with compuer virus
                                    </p>
                                    <div class="card-actions justify-end">
                                        <button class="btn btn-sm btn-primary">
                                            View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="step" data-content="">
                            <div class="card bg-base-100 w-100 shadow-xl mt-3">
                                <div class="card-body">
                                    <h2 class="card-title"><i class="text-2xl text-surface-500 dark:text-surface-400 pi pi-receipt"></i>Invoice Viewed</h2>
                                    <div class="stat-desc text-left">10:30 AM December 26th, 2024</div>
                                    <div class="stat-desc text-left">Invoice #42134</div>
                                    <p>
                                        Need help with compuer virus
                                    </p>
                                    <div class="card-actions justify-end">
                                        <button class="btn btn-sm btn-primary">
                                            View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="step" data-content="">
                            <div class="card bg-base-100 w-100 shadow-xl mt-3">
                                <div class="card-body">
                                    <h2 class="card-title"><i class="text-2xl text-surface-500 dark:text-surface-400 pi pi-receipt"></i>Invoice Sent</h2>
                                    <div class="stat-desc text-left">10:30 AM December 26th, 2024</div>
                                    <div class="stat-desc text-left">Invoice #42134</div>
                                    <p>
                                        Need help with compuer virus
                                    </p>
                                    <div class="card-actions justify-end">
                                        <button class="btn btn-sm btn-primary">
                                            View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="step" data-content="">
                            <div class="card bg-base-100 w-96 shadow-xl">
                                <div class="card-body">
                                    <h2 class="card-title"><i class="text-2xl text-surface-500 dark:text-surface-400 pi pi-receipt"></i>Invoice Created</h2>
                                    <div class="stat-desc text-left">10:30 AM December 26th, 2024</div>
                                    <div class="stat-desc text-left">Invoice #42134</div>
                                    <p>
                                        Need help with compuer virus
                                    </p>
                                    <div class="card-actions justify-end">
                                        <button class="btn btn-sm btn-primary">
                                            View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="step" data-content="">
                            <div class="card bg-base-100 w-96 shadow-xl">
                                <div class="card-body">
                                    <h2 class="card-title"><i class="text-2xl text-surface-500 dark:text-surface-400 pi pi-ticket"></i>Ticket Complete</h2>
                                    <p>
                                        Need help with compuer virus
                                    </p>
                                    <div class="card-actions justify-end">
                                        <button class="btn btn-primary">
                                            View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="step" data-content="">
                            <div class="card bg-base-100 w-96 shadow-xl">
                                <div class="card-body">
                                    <h2 class="card-title">Ticket Created</h2>
                                    <p>
                                        Need help with compuer virus
                                    </p>
                                    <div class="card-actions justify-end">
                                        <button class="btn btn-primary">
                                            View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="step" data-content="">
                            <div class="card bg-base-100 w-96 shadow-xl">
                                <div class="card-body">
                                    <h2 class="card-title">New Customer</h2>
                                    <p>
                                        Added New Customer
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
