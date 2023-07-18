<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import VueMultiselect from "vue-multiselect";
import Table from "@/Components/Table.vue";
import TableRow from "@/Components/TableRow.vue";
import TableDataCell from "@/Components/TableDataCell.vue";
import TableHeaderCell from "@/Components/TableHeaderCell.vue";
import { onMounted, watch } from "vue";

const props = defineProps({
    user: {
        type: Object,
        required: true,
    },
    oficinas: {
        type: Array,
        required: true,
    },
    roles: Array,
    permissions: Array,
});

const form = useForm({
    name: props.user?.name,
    email: props.user?.email,
    oficina_id: "",
    roles: [],
    permissions: [],
});

const submit = () => {
    form.put(route("users.update", props.user?.id));
};

onMounted(() => {
    form.permissions = props.user?.permissions;
    form.roles = props.user?.roles;
});

watch(
    () => props.user,
    () => {
        (form.permissions = props.user?.permissions),
            (form.roles = props.user?.roles);
    }
);
</script>

<template>
    <AdminLayout>
        <Head title="Crear Nuevo Usuario" />
        <div class="max-w-7xl mx-auto mt-4">
            <div class="flex justify-between">
                <Link
                    :href="route('users.index')"
                    class="px-3 py-2 text-white font-semibold bg-indigo-500 hover:bg-indigo-700 rounded"
                    >Atrás</Link
                >
            </div>
        </div>
        <div class="max-w-6xl mx-auto mt-6 p-6 bg-slate-100">
            <form @submit.prevent="submit">
                <div class="mt-4">
                    <InputLabel for="name" value="Nombre" />

                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="mt-4">
                    <InputLabel for="email" value="Correo" />

                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autocomplete="username"
                    />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
                <div class="mt-4">
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
                </div>
                <div class="mt-4">
                    <InputLabel for="roles" value="Roles" />
                    <VueMultiselect
                        v-model="form.roles"
                        :options="roles"
                        :multiple="true"
                        :close-on-select="true"
                        placeholder="Elejir Roles"
                        label="name"
                        track-by="id"
                    />
                </div>
                <div class="mt-4">
                    <InputLabel for="permissions" value="Permissions" />
                    <VueMultiselect
                        v-model="form.permissions"
                        :options="permissions"
                        :multiple="true"
                        :close-on-select="true"
                        placeholder="Elejir Permisos"
                        label="name"
                        track-by="id"
                    />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <PrimaryButton
                        class="ml-4"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Actualizar Usuario
                    </PrimaryButton>
                </div>
            </form>
        </div>
        <div
            class="mt-6 max-w-6xl mx-auto bg-slate-100 shadow-lg rounded-lg p-6"
        >
            <h1 class="text-2xl font-semibold text-indigo-700">Roles</h1>
            <div class="bg-white">
                <Table>
                    <template #header>
                        <TableRow>
                            <TableHeaderCell>ID</TableHeaderCell>
                            <TableHeaderCell>NOMBRE</TableHeaderCell>
                            <TableHeaderCell>OPCIONES</TableHeaderCell>
                        </TableRow>
                    </template>
                    <template #default>
                        <TableRow
                            v-for="userRole in user.roles"
                            :key="userRole.id"
                            class="border-b"
                        >
                            <TableDataCell>{{ userRole.id }}</TableDataCell>
                            <TableDataCell>{{ userRole.name }}</TableDataCell>
                            <TableDataCell class="space-x-4">
                                <Link
                                    :href="
                                        route('users.roles.destroy', [
                                            user.id,
                                            userRole.id,
                                        ])
                                    "
                                    method="DELETE"
                                    as="button"
                                    class="text-red-400 hover:text-red-600"
                                    preserve-scroll
                                    >Quitar Rol</Link
                                >
                            </TableDataCell>
                        </TableRow>
                    </template>
                </Table>
            </div>
        </div>
        <div
            class="mt-6 max-w-6xl mx-auto bg-slate-100 shadow-lg rounded-lg p-6"
        >
            <h1 class="text-2xl font-semibold text-indigo-700">PERMISOS</h1>
            <div class="bg-white">
                <Table>
                    <template #header>
                        <TableRow>
                            <TableHeaderCell>ID</TableHeaderCell>
                            <TableHeaderCell>NOMBRE</TableHeaderCell>
                            <TableHeaderCell>OPCIONES</TableHeaderCell>
                        </TableRow>
                    </template>
                    <template #default>
                        <TableRow
                            v-for="userPermission in user.permissions"
                            :key="userPermission.id"
                            class="border-b"
                        >
                            <TableDataCell>{{
                                userPermission.id
                            }}</TableDataCell>
                            <TableDataCell>{{
                                userPermission.name
                            }}</TableDataCell>
                            <TableDataCell class="space-x-4">
                                <Link
                                    :href="
                                        route('users.permissions.destroy', [
                                            user.id,
                                            userPermission.id,
                                        ])
                                    "
                                    method="DELETE"
                                    as="button"
                                    class="text-red-400 hover:text-red-600"
                                    preserve-scroll
                                    >Quitar Permiso</Link
                                >
                            </TableDataCell>
                        </TableRow>
                    </template>
                </Table>
            </div>
        </div>
    </AdminLayout>
</template>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>
