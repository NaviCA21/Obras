<script setup>
const props = defineProps({
    multiline: { type: Boolean, default: false },
});
</script>

<template>
    <td
        :class="{
            'px-3 py-3 text-sm font-normal text-gray-700 whitespace-nowrap text-center': true,
            multiline: multiline,
        }"
    >
        <slot />
    </td>
</template>
<style>
table td.multiline {
    max-width: 250px;
    word-wrap: break-word;
    white-space: normal;
}
</style>
