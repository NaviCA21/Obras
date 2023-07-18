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
import axios from "axios";
import Navigation from "@/Components/Navigation.vue";
import { toast } from "vue3-toastify";
import "vue3-toastify/dist/index.css";
import { onMounted } from "vue";

const props = defineProps({
    users: Object,
    error: String,
    success: String,
    infoUsuario: String,
});
const form = useForm({});

const showConfirmDeleteUserModal = ref(false);
let selectedUserId = null;

const confirmDeleteUser = (id) => {
    selectedUserId = id;
    showConfirmDeleteUserModal.value = true;
};

const closeModal = () => {
    showConfirmDeleteUserModal.value = false;
};

const deleteUser = () => {
    if (selectedUserId) {
        form.delete(route("users.destroy", selectedUserId), {
            onSuccess: () => closeModal(),
        });
    }
};
const showNotifications = () => {
    if (props.error) {
        toast.error(props.error, {
            autoClose: 2000,
            style: {
                marginTop: "75px",
            },
        });
    } else if (props.success) {
        toast.success(props.success, {
            autoClose: 2000,
            style: {
                marginTop: "75px",
            },
        });
    }
    if (props.infoUsuario == "1") {
        toast.success("Se ha registrado correctamente el Usuario", {
            autoClose: 2000,
            style: {
                marginTop: "75px",
            },
        });
    } else if (props.infoUsuario == "0") {
        toast.error(
            "No se ha podido registrar al Usuario (No se puede usar un correo ya existente en el sistema)",
            {
                autoClose: 2000,
                style: {
                    marginTop: "75px",
                },
            }
        );
    }
};

onMounted(() => {
    showNotifications();
});
</script>

<template>
    <Head title="Usuarios" />

    <AdminLayout>
        <div class="max-w-full mx-auto py-4">
            <div class="flex justify-between">
                <h1>Usuarios</h1>
            </div>
            <div class="mt-6">
                <UpOnTable #posicion>
                    <TableSearch></TableSearch>

                    <Link
                        :href="route('users.create')"
                        :active="route().current('users.index')"
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
                        Agregar Usuario
                    </Link>
                </UpOnTable>
                <Table>
                    <template #header>
                        <TableRow>
                            <TableHeaderCell>ID</TableHeaderCell>
                            <TableHeaderCell>NOMBRE</TableHeaderCell>
                            <TableHeaderCell>CORREO</TableHeaderCell>
                            <TableHeaderCell>OFICINA</TableHeaderCell>
                            <TableHeaderCell>CREACIÓN</TableHeaderCell>
                            <TableHeaderCell>OPCIONES</TableHeaderCell>
                        </TableRow>
                    </template>
                    <template #default>
                        <TableRow
                            v-for="user in users.data"
                            :key="user.id"
                            class="border-b"
                        >
                            <TableDataCell>{{ user.id }}</TableDataCell>
                            <TableDataCell>{{ user.name }}</TableDataCell>
                            <TableDataCell>{{ user.email }}</TableDataCell>
                            <TableDataCell>{{ user.oficina_id }}</TableDataCell>
                            <TableDataCell>{{ user.created_at }}</TableDataCell>
                            <TableDataCell class="space-x-4">
                                <Link
                                    :href="route('users.edit', user.id)"
                                    class="text-green-400 hover:text-green-600"
                                    ><EditButton>Editar</EditButton></Link
                                >
                                <button
                                    @click="confirmDeleteUser(user.id)"
                                    class="text-red-400 hover:text-red-600"
                                >
                                    <DeleteButton>Eliminar</DeleteButton>
                                </button>
                                <Modal
                                    :show="showConfirmDeleteUserModal"
                                    @close="closeModal"
                                >
                                    <div class="p-6">
                                        <h2
                                            class="text-lg font-semibold text-slate-800"
                                        >
                                            ¿Estás seguro de eliminar este
                                            usuario?
                                        </h2>
                                        <div class="mt-6 flex space-x-4">
                                            <DangerButton
                                                @click="deleteUser(user.id)"
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
            <div class="mt-6 space-x-4 flex justify-center">
                <template v-for="link in users.links">
                    <nav aria-label="Page navigation example">
                        <ul class="inline-flex -space-x-px text-sm">
                            <li>
                                <Link
                                    v-if="link.url"
                                    :href="link.url"
                                    v-html="link.label"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                />
                                <span
                                    v-else
                                    v-html="link.label"
                                    class="text-gray-400"
                                ></span>
                            </li>
                        </ul>
                    </nav>
                </template>
            </div>
        </div>
    </AdminLayout>
</template>
