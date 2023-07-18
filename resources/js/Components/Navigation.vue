<script>
export default {
    props: {
        links: Array,
    },
};
</script>

<template>
    <div>
        <template v-for="link in links"
            ><Link
                v-if="link.url"
                :href="link.url"
                v-html="link.label"
                class="font-bold"
            />
            <span v-else v-html="link.label" class="text-gray-400"></span>
        </template>
    </div>
</template>
