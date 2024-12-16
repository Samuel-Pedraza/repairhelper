<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'text-white rounded-md no-underline bg-gray-900 link inline-flex items-center px-2 py-2 border-b-2 border-transparent text-sm leading-5 transition duration-150 ease-in-out text-base font-medium'
        : 'text-gray-300 link no-underline rounded-md hover:bg-gray-700 inline-flex items-center px-2 py-2 border-b-2 border-transparent text-sm font-medium leading-5 transition duration-150 ease-in-out';
});
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
