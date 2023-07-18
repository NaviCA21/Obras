<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import VueMultiselect from "vue-multiselect";

defineProps({
    oficinas: Array,
});

const form = useForm({
    nombreOficina: "",
});
</script>

<template>
    <Head title="Crear Nueva Oficina" />

    <AdminLayout>
        <div class="max-w-7xl mx-auto py-4">
            <div class="flex justify-between">
                <Link
                    :href="route('oficinas.index')"
                    class="px-3 py-2 text-white font-semibold bg-indigo-500 hover:bg-indigo-700 rounded"
                    >Atrás</Link
                >
            </div>
            <div
                class="mt-6 max-w-6xl mx-auto bg-slate-100 shadow-lg rounded-lg p-6"
            >
                <h1 class="text-2xl font-semibold text-indigo-700">
                    Crear Nueva Oficina
                </h1>
                <form @submit.prevent="form.post(route('oficinas.store'))">
                    <div class="mt-4">
                        <InputLabel for="nombreOficina" value="Nombre" />
                        <TextInput
                            id="nombreOficina"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.nombreOficina"
                            autofocus
                            autocomplete="username"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.nombreOficina"
                        />
                    </div>
                    <div class="flex items-center mt-4">
                        <PrimaryButton
                            class="ml-4"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Crear
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>
