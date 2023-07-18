<script setup>
import { Link } from "@inertiajs/vue3";
</script>
<template>
    <div class="antialiased bg-slate-300 w-full text-slate-700 relative py-1">
        <div
            class="grid grid-cols-12 mx-auto gap-2 sm:gap-4 md:gap-6 lg:gap-10 xl:gap-14 max-w-[90%] my-10 px-2"
        >
            <div
                id="content"
                class="bg-white col-span-12 md:col-span-12 rounded-lg p-6"
            >
                <slot name="contenido"></slot>
            </div>
        </div>
    </div>
</template>
