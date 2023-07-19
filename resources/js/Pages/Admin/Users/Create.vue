<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import VueMultiselect from "vue-multiselect";
import { onMounted } from "vue";
import { toast } from "vue3-toastify";
import "vue3-toastify/dist/index.css";

defineProps({
    roles: Array,
    permissions: Array,
    oficinas: Array,
});

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    oficina_id: "",
    roles: [],
    permissions: [],
});

const submit = () => {
    const missingFields = [];
    if (!form.name) missingFields.push("Nombre");
    if (!form.email) missingFields.push("Correo");
    if (!form.password) missingFields.push("Contraseña");
    if (!form.password_confirmation)
        missingFields.push("Validación de contraseña");
    if (!form.oficina_id) missingFields.push("Oficina");

    if (missingFields.length > 0) {
        const missingFieldsString = missingFields.join(", ");
        toast.error(
            `Por favor complete los siguientes campos: ${missingFieldsString}`,
            {
                autoClose: 3000,
                style: {
                    marginTop: "75px",
                },
            }
        );
        return;
    }
    form.post(route("users.store"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>
<template>
    <AdminLayout>
        <Head title="Create user" />
        <div class="max-w-7xl mx-auto mt-4">
            <div class="flex justify-between">
                <Link
                    :href="route('users.index')"
                    class="px-3 py-2 text-white font-semibold bg-indigo-500 hover:bg-indigo-700 rounded"
                    >Back</Link
                >
            </div>
        </div>
        <div class="max-w-md mx-auto mt-6 p-6 bg-slate-100">
            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="name" value="Name" />

                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        autofocus
                        autocomplete="name"
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="mt-4">
                    <InputLabel for="email" value="Email" />

                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        autocomplete="username"
                    />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Password" />

                    <TextInput
                        id="password"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password"
                        autocomplete="new-password"
                    />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4">
                    <InputLabel
                        for="password_confirmation"
                        value="Confirm Password"
                    />

                    <TextInput
                        id="password_confirmation"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password_confirmation"
                        autocomplete="new-password"
                    />

                    <InputError
                        class="mt-2"
                        :message="form.errors.password_confirmation"
                    />
                </div>
                <div class="mt-4">
                    <label
                        for="countries"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Oficina</label
                    >
                    <select
                        id="countries"
                        class="bg-gray-50 border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        v-model="form.oficina_id"
                    >
                        <option disabled selected value="">
                            Seleccione una oficina
                        </option>
                        <option
                            :value="oficina.idOficina"
                            v-for="oficina in oficinas"
                        >
                            {{ oficina.nombreOficina }}
                        </option>
                    </select>
                    <InputError
                        class="mt-2"
                        :message="form.errors.oficina_id"
                    />
                </div>
                <div class="mt-4">
                    <InputLabel for="roles" value="Roles" />
                    <VueMultiselect
                        v-model="form.roles"
                        :options="roles"
                        :multiple="true"
                        :close-on-select="true"
                        placeholder="Seleccione los roles"
                        label="name"
                        track-by="id"
                    />
                </div>
                <!-- <div class="mt-4">
                    <InputLabel for="permissions" value="Permissions" />
                    <VueMultiselect
                        v-model="form.permissions"
                        :options="permissions"
                        :multiple="true"
                        :close-on-select="true"
                        placeholder="Seleccione los permisos"
                        label="name"
                        track-by="id"
                    />
                </div> -->

                <div class="flex items-center justify-end mt-4">
                    <PrimaryButton
                        class="ml-4"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Crear Uusuario
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>
