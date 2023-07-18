<template></template>
<script>
import { toast } from "vue3-toastify";
import "vue3-toastify/dist/index.css";

export default {
    methods: {
        showToast() {
            toast.success("Wow success", {
                autoClose: 3000,
            });
        },
    },
};
</script>
