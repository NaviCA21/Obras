<script setup>
import { ref } from "vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
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
import TableSearch from "@/Components/TableSearch.vue";

defineProps(["oficinas"]);
const form = useForm({});

const showConfirmDeleteOficinaModal = ref(false);
let selectedOficinaId = null;

const confirmDeleteOficina = (idOficina) => {
    selectedOficinaId = idOficina;
    showConfirmDeleteOficinaModal.value = true;
};

const closeModal = () => {
    showConfirmDeleteOficinaModal.value = false;
};

const deleteOficina = () => {
    if (selectedOficinaId) {
        form.delete(route("oficinas.destroy", selectedOficinaId), {
            onSuccess: () => closeModal(),
        });
    }
};
</script>

<template>
    <Head title="Oficinas" />

    <AdminLayout>
        <div class="max-w-7xl mx-auto py-4">
            <div class="flex justify-between">
                <h1>Oficinas</h1>
            </div>
            <div class="mt-6">
                <UpOnTable #posicion>
                    <TableSearch></TableSearch>

                    <Link
                        :href="route('oficinas.create')"
                        :active="route().current('oficinas.index')"
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
                        Agregar Oficina
                    </Link>
                </UpOnTable>
                <Table>
                    <template #header>
                        <TableRow>
                            <TableHeaderCell>ID</TableHeaderCell>
                            <TableHeaderCell>NOMBRE</TableHeaderCell>
                            <TableHeaderCell>CREACIÓN</TableHeaderCell>
                            <TableHeaderCell>OPCIONES</TableHeaderCell>
                        </TableRow>
                    </template>
                    <template #default>
                        <TableRow
                            v-for="oficina in oficinas"
                            :key="oficina.idOficina"
                            class="border-b"
                        >
                            <TableDataCell>{{
                                oficina.idOficina
                            }}</TableDataCell>
                            <TableDataCell>{{
                                oficina.nombreOficina
                            }}</TableDataCell>
                            <TableDataCell>{{
                                oficina.created_at
                            }}</TableDataCell>
                            <TableDataCell class="space-x-4">
                                <Link
                                    :href="
                                        route(
                                            'oficinas.edit',
                                            oficina.idOficina
                                        )
                                    "
                                    class="text-green-400 hover:text-green-600"
                                    ><EditButton>Editar</EditButton></Link
                                >
                                <button
                                    @click="
                                        confirmDeleteOficina(oficina.idOficina)
                                    "
                                    class="text-red-400 hover:text-red-600"
                                >
                                    <DeleteButton>Eliminar</DeleteButton>
                                </button>
                                <Modal
                                    :show="showConfirmDeleteOficinaModal"
                                    @close="closeModal"
                                >
                                    <div class="p-6">
                                        <h2
                                            class="text-lg font-semibold text-slate-800"
                                        >
                                            ¿Estás seguro de eliminar esta
                                            Oficina?
                                        </h2>
                                        <div class="mt-6 flex space-x-4">
                                            <DangerButton
                                                @click="
                                                    deleteOficina(
                                                        oficina.idOficina
                                                    )
                                                "
                                                >Eliminar</DangerButton
                                            >
                                            <SecondaryButton @click="closeModal"
                                                >Cancelar</SecondaryButton
                                            >
                                        </div>
                                    </div>
                                </Modal></TableDataCell
                            >
                        </TableRow>
                    </template>
                </Table>
            </div>
        </div>
    </AdminLayout>
</template>
