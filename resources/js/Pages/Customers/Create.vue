<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import CreateTeamForm from "@/Pages/Teams/Partials/CreateTeamForm.vue";

import { useForm } from "@inertiajs/vue3";
import FormSection from "@/Components/Profile/FormSection.vue";
import InputError from "@/Components/Profile/InputError.vue";
import InputLabel from "@/Components/Profile/InputLabel.vue";
import PrimaryButton from "@/Components/Profile/PrimaryButton.vue";
import TextInput from "@/Components/Profile/TextInput.vue";
import Select from "primevue/select";

const form = useForm({
    name: "",
    customer_type: "",
    email_address: "",
    phone_number: "",
    fax_number: "",
    mobile_number: "",
    website: "",
    street_address: "",
    unit: "",
    city: "",
    state: "",
    zip_code: "",
});

const createCustomer = () => {
    form.post(route("customers.store"), {
        errorBag: "createCustomer",
        preserveScroll: true,
    });
};
</script>

<template>
    <AppLayout title="Create Customer">
        <template #header>
            <h2 class="font-semibold text-xl leading-tight">
                {{ $t("Create Customer") }}
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <FormSection @submitted="createCustomer">
                    <template #title>
                        {{ $t("Customer Details") }}
                    </template>

                    <template #description>
                        {{ $t("Add a new customer to your list.") }}
                    </template>
                    <template #form>
                        <div class="col-span-6">
                            <h3 class="font-semibold text-l leading-tight">Basic Info</h3>
                        </div>

                        <div class="col-span-3">
                            <InputLabel
                                for="name"
                                :value="$t('Customer Name*')"
                            />
                            <input
                                id="name"
                                v-model="form.name"
                                type="text"
                                class="input input-bordered w-full"
                                autofocus
                                required
                            />
                            <InputError
                                :message="form.errors.name"
                                class="mt-2"
                            />
                        </div>
                        <div class="col-span-3">
                            <InputLabel
                                for="customer_type"
                                :value="$t('Customer Type*')"
                            />
                            <select
                                class="select select-bordered w-full max-w-xs"
                                v-model="form.customer_type"
                                required
                            >
                                <option value="individual">Individual</option>
                                <option value="company">Company</option>
                            </select>

                            <InputError
                                :message="form.errors.customer_type"
                                class="mt-2"
                            />
                        </div>
                        <div class="divider w-full col-span-6"></div>
                        <div class="col-span-6">
                            <h3 class="font-semibold text-l leading-tight">Contact Info</h3>
                        </div>

                        <div class="col-span-3">
                            <InputLabel
                                for="customer_email"
                                :value="$t('Customer Email')"
                            />
                            <input
                                id="customer_email"
                                v-model="form.email_address"
                                type="email"
                                class="input input-bordered w-full"
                                autofocus
                            />

                            <InputError
                                :message="form.errors.email_address"
                                class="mt-2"
                            />
                        </div>
                        <div class="col-span-3">
                            <InputLabel
                                for="phone_number"
                                :value="$t('Customer Phone Number')"
                            />
                            <input
                                id="phone_number"
                                v-model="form.phone_number"
                                type="text"
                                class="input input-bordered w-full"
                                autofocus
                            />

                            <InputError
                                :message="form.errors.phone_number"
                                class="mt-2"
                            />
                        </div>
                        <div class="col-span-3">
                            <InputLabel
                                for="fax_number"
                                :value="$t('Customer Fax Number')"
                            />
                            <input
                                id="fax_number"
                                v-model="form.fax_number"
                                type="text"
                                class="input input-bordered w-full"
                                autofocus
                            />

                            <InputError
                                :message="form.errors.fax_number"
                                class="mt-2"
                            />
                        </div>
                        <div class="col-span-3">
                            <InputLabel
                                for="mobile_number"
                                :value="$t('Customer Mobile Number')"
                            />
                            <input
                                id="mobile_number"
                                v-model="form.mobile_number"
                                type="text"
                                class="input input-bordered w-full"
                                autofocus
                            />

                            <InputError
                                :message="form.errors.mobile_number"
                                class="mt-2"
                            />
                        </div>
                        <div class="col-span-3">
                            <InputLabel
                                for="website"
                                :value="$t('Customer Website')"
                            />
                            <input
                                id="website"
                                v-model="form.website"
                                type="url"
                                class="input input-bordered w-full"
                                autofocus
                            />

                            <InputError
                                :message="form.errors.website"
                                class="mt-2"
                            />
                        </div>
                        <div class="divider w-full col-span-6"></div>
                        <div class="col-span-6">
                            <h3 class="font-semibold text-l leading-tight">Address</h3>
                        </div>
                        <div class="col-span-4">
                            <InputLabel
                                for="Street Address"
                                :value="$t('Street Address')"
                            />
                            <input
                                id="name"
                                v-model="form.street_address"
                                type="text"
                                class="input input-bordered w-full"
                                autofocus
                            />
                            <InputError
                                :message="form.errors.street_address"
                                class="mt-2"
                            />
                        </div>
                        <div class="col-span-2">
                            <InputLabel
                                for="unit"
                                :value="$t('Unit')"
                            />
                            <input
                                id="unit"
                                v-model="form.unit"
                                type="text"
                                class="input input-bordered w-full"
                                autofocus
                            />
                            <InputError
                                :message="form.errors.unit"
                                class="mt-2"
                            />
                        </div>
                        <div class="col-span-2">
                            <InputLabel
                                for="city"
                                :value="$t('City')"
                            />
                            <input
                                id="city"
                                v-model="form.city"
                                type="text"
                                class="input input-bordered w-full"
                                autofocus
                            />
                            <InputError
                                :message="form.errors.city"
                                class="mt-2"
                            />
                        </div>
                        <div class="col-span-2">
                            <InputLabel
                                for="state"
                                :value="$t('State')"
                            />
                            <input
                                id="state"
                                v-model="form.state"
                                type="text"
                                class="input input-bordered w-full"
                                autofocus
                            />
                            <InputError
                                :message="form.errors.state"
                                class="mt-2"
                            />
                        </div>
                        <div class="col-span-2">
                            <InputLabel
                                for="zip_code"
                                :value="$t('Zip Code')"
                            />
                            <input
                                id="zip_code"
                                v-model="form.zip_code"
                                type="text"
                                class="input input-bordered w-full"
                                autofocus
                            />
                            <InputError
                                :message="form.errors.zip_code"
                                class="mt-2"
                            />
                        </div>
                    </template>

                    <template #actions>
                        <PrimaryButton
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            {{ $t("Create") }}
                        </PrimaryButton>
                    </template>
                </FormSection>
            </div>
        </div>
    </AppLayout>
</template>
