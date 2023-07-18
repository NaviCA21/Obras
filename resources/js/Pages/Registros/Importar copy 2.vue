<script setup>
import TableHeaderCell from "@/Components/TableHeaderCell.vue";
import TableRow from "@/Components/TableRow.vue";
let props = defineProps({ registros: Object });
</script>
<template>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="table-responsive">
                <DataTable
                    id="reporte"
                    :data="registros"
                    :columns="columns"
                    class="text-sm font-normal text-gray-700 whitespace-nowrap row-border dt[-head|-body]-justify stripe hover"
                    :options="{
                        responsive: true,
                        autoWidth: true,
                        select: true,
                        dom: 'Bfrtip',
                        language: {
                            search: 'Buscar',
                            zeroRecords: 'No hay registros para mostrar',
                            info: 'Mostrando del _START_ a _END_ de _TOTAL_ registros',
                            infoFiltered: '(Filtrados de _MAX_ registros.)',
                            paginate: {
                                first: 'Primero',
                                previus: 'Anterior',
                                next: 'Siguiente',
                                last: 'Último',
                            },
                        },
                    }"
                >
                    <thead>
                        <TableRow>
                            <TableHeaderCell>ID</TableHeaderCell>
                            <TableHeaderCell>DNI</TableHeaderCell>
                            <TableHeaderCell>VISITANTE</TableHeaderCell>
                            <TableHeaderCell>ENTIDAD</TableHeaderCell>
                            <TableHeaderCell>MOTIVO</TableHeaderCell>
                            <TableHeaderCell>INGRESO</TableHeaderCell>
                            <TableHeaderCell>SALIDA</TableHeaderCell>
                        </TableRow>
                    </thead>
                </DataTable>
            </div>
        </div>
    </div>
</template>
<script>
import DataTable from "datatables.net-vue3";
import DataTableLib from "datatables.net-bs5";
import Buttons from "datatables.net-buttons-bs5";
import ButtonsHtml5 from "datatables.net-buttons/js/buttons.html5";
import print from "datatables.net-buttons/js/buttons.print";
import pdfmake from "pdfmake";
import pdfFonts from "pdfmake/build/vfs_fonts";
import "datatables.net-bs5";
import JsZip from "jszip";
pdfmake.vfs = pdfFonts.pdfMake.vfs;

window.JSZip = JsZip;
DataTable.use(DataTableLib);
DataTable.use(pdfmake);
DataTable.use(ButtonsHtml5);
export default {
    components: { DataTable, TableHeaderCell, TableRow },
    data() {
        return {
            columns: [
                { data: "idControl", title: "ID" },
                { data: "dni", title: "DNI" },
                { data: "visitante", title: "VISITANTE" },
                { data: "entidad", title: "ENTIDAD" },
                { data: "motivo", title: "MOTIVO" },
                { data: "created_at", title: "INGRESO" },
                { data: "updated_at", title: "SALIDA" },
            ],
            buttons: [
                {
                    title: "Reporte de productos",
                    extend: "excelHtml5",
                    text: '<i class="fa-solid fa-file-excel"></i> Excel',
                    className: "btn btn-success my-custom-class",
                },
                {
                    title: "Reporte de productos",
                    extend: "excelHtml5",
                    text: '<i class="fa-solid fa-file-pdf"></i> PDF',
                    className: "btn btn-danger",
                },
                {
                    title: "Reporte de productos",
                    extend: "print",
                    text: '<i class="fa-solid fa-file-print"></i> Imprimir',
                    className: "btn btn-warning",
                },
            ],
        };
    },
};
</script>
<style>
@import "datatables.net-dt";

.dataTables_wrapper {
    background-color: #f5f5f5;
}

/* Personalizar estilos de las celdas de encabezado */
.dataTables_wrapper th {
    background-color: #ddd;
    font-weight: bold;
}

/* Personalizar estilos de paginación */
.dataTables_paginate .paginate_button {
    background-color: #e9e9e9;
    border: 1px solid #ccc;
}

/* Personalizar estilos de búsqueda */
.dataTables_filter input {
    border: 1px solid #ccc;
    border-radius: 3px;
    padding: 5px;
}
</style>
