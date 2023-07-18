<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import Table from "@/Components/Table.vue";
import TableRow from "@/Components/TableRow.vue";
import TableHeaderCell from "@/Components/TableHeaderCell.vue";
import TableDataCell from "@/Components/TableDataCell.vue";
import Modal from "@/Components/Modal.vue";
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DeleteButton from "@/Components/DeleteButton.vue";
import EditButton from "@/Components/EditButton.vue";
import UpOnTable from "@/Components/UpOnTable.vue";
import CreateButton from "@/Components/CreateButton.vue";
import TableSearch from "@/Components/TableSearch.vue";

defineProps(["permissions"]);

const form = useForm({});

const showConfirmDeletePermissionModal = ref(false);
let selectedPermissionId = null;

const confirmDeletePermission = (id) => {
    selectedPermissionId = id;
    showConfirmDeletePermissionModal.value = true;
};

const closeModal = () => {
    showConfirmDeletePermissionModal.value = false;
};

const deletePermission = () => {
    if (selectedPermissionId) {
        form.delete(route("permissions.destroy", selectedPermissionId), {
            onSuccess: () => closeModal(),
        });
    }
};
</script>

<template>
    <Head title="Permisos" />

    <AdminLayout>
        <div class="max-w-7xl mx-auto py-4">
            <div class="flex justify-between">
                <h1>Permisos</h1>
            </div>
            <div class="mt-6">
                <UpOnTable #posicion>
                    <TableSearch></TableSearch>

                    <Link
                        :href="route('permissions.create')"
                        :active="route().current('permissions.index')"
                        class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white rounded-lg bg-gradient-to-br from-blue-400 to-blue-800 sm:ml-auto shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform"
                    >
                        <svg
                            class="mr-2 -ml-1 w-6 h-6"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                        Agregar Permiso
                    </Link>
                </UpOnTable>
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
                            v-for="permission in permissions"
                            :key="permission.id"
                            class="border-b"
                        >
                            <TableDataCell>{{ permission.id }}</TableDataCell>
                            <TableDataCell>{{ permission.name }}</TableDataCell>
                            <TableDataCell class="space-x-4">
                                <Link
                                    :href="
                                        route('permissions.edit', permission.id)
                                    "
                                    class="text-green-400 hover:text-green-600"
                                    ><EditButton>Editar</EditButton></Link
                                >
                                <button
                                    @click="
                                        confirmDeletePermission(permission.id)
                                    "
                                    class="text-red-400 hover:text-red-600"
                                >
                                    <DeleteButton>Eliminar</DeleteButton>
                                </button>
                                <Modal
                                    :show="showConfirmDeletePermissionModal"
                                    @close="closeModal"
                                >
                                    <div class="p-6">
                                        <h2
                                            class="text-lg font-semibold text-slate-800"
                                        >
                                            ¿Estás seguro de eliminar este
                                            permiso?
                                        </h2>
                                        <div class="mt-6 flex space-x-4">
                                            <DangerButton
                                                @click="
                                                    deletePermission(
                                                        permission.id
                                                    )
                                                "
                                                >Eliminar</DangerButton
                                            >
                                            <SecondaryButton @click="closeModal"
                                                >Cancelar</SecondaryButton
                                            >
                                        </div>
                                    </div>
                                </Modal>
                            </TableDataCell>
                        </TableRow>
                    </template>
                </Table>
            </div>
        </div>
    </AdminLayout>
</template>
