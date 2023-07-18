<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps(["href", "active"]);

const classes = computed(() =>
    props.active ? "flex justify-left bg-red-500 text-red-500" : "bg-white"
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
