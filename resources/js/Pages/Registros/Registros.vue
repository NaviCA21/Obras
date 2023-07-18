<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import Table from "@/Components/Table.vue";
import TableRow from "@/Components/TableRow.vue";
import TableHeaderCell from "@/Components/TableHeaderCell.vue";
import TableDataCell from "@/Components/TableDataCell.vue";
import Modal from "@/Components/Modal.vue";
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DeleteButton from "@/Components/DeleteButton.vue";
import CreateButton from "@/Components/CreateButton.vue";
import EditButton from "@/Components/EditButton.vue";
import UpOnTable from "@/Components/UpOnTable.vue";
import CurrentTimeTwo from "@/Components/CurrentTimeTwo.vue";
import DetallesCard from "@/Components/DetallesCard.vue";
import { Link } from "@inertiajs/vue3";
import CurrentTime from "@/Components/CurrentTime.vue";
import { Inertia } from "@inertiajs/inertia";
import { watch } from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import NoAdminLayout from "@/Layouts/NoAdminLayout.vue";
import DetallesHerramientas from "@/Components/DetallesHerramientas.vue";
import CardDetallesHerramientas from "@/Components/CardDetallesHerramientas.vue";
import { saveAs } from "file-saver";

let props = defineProps({ registros: Object, filters: Object });
const form = useForm({});

const showConfirmMarcarSalidaModal = ref(false);
const showDetallesModal = ref(false);

let SalidaId = null;
let ModalDni = null;
let ModalNombre = null;
let ModalObservacion = null;
let ModalCreacion = null;

const showConfirmMarcarSalida = (id, dni, nombre, obs, cre) => {
    SalidaId = id;
    ModalDni = dni;
    ModalNombre = nombre;
    ModalObservacion = obs;
    ModalCreacion = cre;
    showConfirmMarcarSalidaModal.value = true;
};

const selectedRegistro = ref(null);

const showDatosDetalles = (registro) => {
    selectedRegistro.value = registro;
    showDetallesModal.value = true;
};

const closeModal = () => {
    showConfirmMarcarSalidaModal.value = false;
    showDetallesModal.value = false;
};

const MarcarSalida = () => {
    if (SalidaId) {
        console.log("MarcarSalida called with SalidaId:", SalidaId);
        form.put(route("registrar.update", SalidaId), {
            onSuccess: () => closeModal(),
        });
    }
};

let buscar = ref(props.filters.buscar);

watch(buscar, (value) => {
    Inertia.get(
        "/registros",
        { buscar: value },
        {
            preserveState: true,
            replace: true,
        }
    );
});

const generatePdf = (idControl) => {
    axios
        .get(route("generate-pdf", idControl), { responseType: "blob" })
        .then((response) => {
            // Use the FileSaver.js library to trigger a file download
            saveAs(response.data, "laraveltuts.pdf");
        });
};
</script>

<template>
    <Head title="Registros" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="uppercase p-3 bg-black rounded-full text-white w-full font-semibold text-center"
            >
                Registros REALIZADOS
            </h2>
        </template>
        <NoAdminLayout>
            <template #contenido
                ><div class="max-w-[100%] mx-auto py-4">
                    <div class="mt-6">
                        <UpOnTable #posicion>
                            <div
                                class="items-center mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0"
                            >
                                <form class="lg:pr-3" method="GET">
                                    <label for="users-search" class="sr-only"
                                        >Buscar</label
                                    >
                                    <div class="flex mt-1 lg:w-64 xl:w-96">
                                        <input
                                            v-model="buscar"
                                            type="text"
                                            name="buscar"
                                            id="users-search"
                                            class="border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                            placeholder="Buscar"
                                        />
                                    </div>
                                </form>
                                <div
                                    class="flex pl-0 mt-3 space-x-1 sm:pl-2 sm:mt-0"
                                >
                                    <Link
                                        :href="route('registros.create')"
                                        :active="
                                            route().current('registros.index')
                                        "
                                        class="hidden inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white rounded-lg bg-gradient-to-br from-green-400 to-green-800 sm:inline-flex sm:ml-auto shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform"
                                    >
                                        Realizar reportes
                                    </Link>
                                </div>
                            </div>

                            <Link
                                :href="route('registrar.index')"
                                :active="route().current('registrar.index')"
                                class="hidden inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white rounded-lg bg-gradient-to-br from-blue-400 to-blue-800 sm:inline-flex sm:ml-auto shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform"
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
                                Agregar Registro
                            </Link>
                        </UpOnTable>

                        <Table>
                            <template #header>
                                <TableRow>
                                    <TableHeaderCell>ID</TableHeaderCell>
                                    <TableHeaderCell>DNI</TableHeaderCell>
                                    <TableHeaderCell>IMAGEN</TableHeaderCell>
                                    <TableHeaderCell>VISITANTE</TableHeaderCell>
                                    <TableHeaderCell>ENTIDAD</TableHeaderCell>
                                    <!-- <TableHeaderCell>MOTIVO</TableHeaderCell>
                                <TableHeaderCell>OBSERVACION</TableHeaderCell> -->
                                    <TableHeaderCell>USUARIO</TableHeaderCell>
                                    <TableHeaderCell>INGRESO</TableHeaderCell>
                                    <TableHeaderCell>SALIDA</TableHeaderCell>
                                    <TableHeaderCell>OPCIONES</TableHeaderCell>
                                </TableRow>
                            </template>
                            <template #default>
                                <TableRow
                                    v-for="registro in registros.data"
                                    :key="registro.idControl"
                                    class="border-b"
                                    :class="{
                                        'bg-indigo-100':
                                            registro.nombre_usuario ===
                                            $page.props.auth.user.name,
                                    }"
                                >
                                    <TableDataCell>{{
                                        registro.idControl
                                    }}</TableDataCell>
                                    <TableDataCell>{{
                                        registro.dni
                                    }}</TableDataCell>
                                    <TableDataCell class="flex justify-center">
                                        <img
                                            :src="registro.img_path"
                                            alt="Imagen"
                                            class="w-12 rounded-full shadow"
                                        />
                                    </TableDataCell>

                                    <TableDataCell>{{
                                        registro.visitante
                                    }}</TableDataCell>
                                    <TableDataCell>{{
                                        registro.entidad
                                    }}</TableDataCell>
                                    <!-- <TableDataCell>{{ registro.motivo }}</TableDataCell>
                                <TableDataCell multiline>{{
                                    registro.observacion
                                }}</TableDataCell> -->
                                    <TableDataCell>{{
                                        registro.nombre_usuario
                                    }}</TableDataCell>
                                    <TableDataCell class="space-x-4">{{
                                        registro.created_at
                                    }}</TableDataCell>
                                    <TableDataCell
                                        class="space-x-4"
                                        :class="{
                                            ' bg-white':
                                                registro.updated_at === null,
                                        }"
                                        >{{
                                            registro.updated_at
                                        }}</TableDataCell
                                    >
                                    <TableDataCell class="space-x-4"
                                        ><button
                                            v-if="registro.updated_at !== null"
                                            @click="
                                                generatePdf(registro.idControl)
                                            "
                                            class="text-red-400 hover:text-red-600"
                                        >
                                            <DangerButton>
                                                REPORTE</DangerButton
                                            ></button
                                        ><button
                                            v-if="registro.updated_at == null"
                                            @click="
                                                showConfirmMarcarSalida(
                                                    registro.idControl,
                                                    registro.dni,
                                                    registro.visitante,
                                                    registro.observacion,
                                                    registro.created_at
                                                )
                                            "
                                            class="text-red-400 hover:text-red-600"
                                        >
                                            <PrimaryButton
                                                >Salida</PrimaryButton
                                            >
                                        </button>
                                        <Modal
                                            :show="showConfirmMarcarSalidaModal"
                                            @close="closeModal"
                                        >
                                            <div class="p-6">
                                                <h2
                                                    class="text-lg font-semibold text-slate-800"
                                                >
                                                    ¿Estás seguro de marcar
                                                    salida para este usuario?
                                                </h2>
                                                <Table>
                                                    <template #header>
                                                        <TableRow>
                                                            <TableHeaderCell
                                                                >DNI</TableHeaderCell
                                                            >
                                                            <TableHeaderCell
                                                                >VISITANTE</TableHeaderCell
                                                            >
                                                            <TableHeaderCell
                                                                >OBSERVACION</TableHeaderCell
                                                            >
                                                            <TableHeaderCell
                                                                >INGRESO</TableHeaderCell
                                                            >
                                                        </TableRow>
                                                    </template>
                                                    <template #default
                                                        ><TableRow>
                                                            <TableDataCell>{{
                                                                ModalDni ?? null
                                                            }}</TableDataCell>
                                                            <TableDataCell>{{
                                                                ModalNombre ??
                                                                null
                                                            }}</TableDataCell>
                                                            <TableDataCell>{{
                                                                ModalObservacion ??
                                                                null
                                                            }}</TableDataCell>
                                                            <TableDataCell>{{
                                                                ModalCreacion ??
                                                                null
                                                            }}</TableDataCell>
                                                        </TableRow></template
                                                    >
                                                </Table>
                                                <div
                                                    class="mt-6 flex space-x-4"
                                                >
                                                    <CreateButton
                                                        @click="
                                                            MarcarSalida(
                                                                registro.idControl
                                                            )
                                                        "
                                                        >MARCAR
                                                        SALIDA</CreateButton
                                                    >
                                                    <SecondaryButton
                                                        @click="closeModal"
                                                        >Cancelar</SecondaryButton
                                                    >
                                                </div>
                                            </div>
                                            <div class="p-4">
                                                <CurrentTime></CurrentTime>
                                            </div>
                                        </Modal>
                                        <button
                                            @click="showDatosDetalles(registro)"
                                            class="text-red-400 hover:text-red-600"
                                        >
                                            <EditButton>Detalles</EditButton>
                                        </button>
                                        <Modal
                                            :show="showDetallesModal"
                                            @close="closeModal"
                                        >
                                            <div class="p-6">
                                                <DetallesCard>
                                                    <template #numeroRegistro>{{
                                                        selectedRegistro.idControl
                                                    }}</template>
                                                    <template #haceCuanto>
                                                        <div
                                                            :class="{
                                                                'bg-green-600':
                                                                    selectedRegistro.updated_at ==
                                                                    null,
                                                                'bg-orange-600':
                                                                    selectedRegistro.updated_at !=
                                                                    null,
                                                                'text-xs uppercase px-2 py-1 rounded-full border border-gray-200 text-gray-200 font-bold': true,
                                                            }"
                                                        >
                                                            <span
                                                                v-if="
                                                                    selectedRegistro.updated_at ==
                                                                    null
                                                                "
                                                                class="font-semibold"
                                                            >
                                                                Actualmente en
                                                                oficina
                                                            </span>
                                                            <span
                                                                v-else
                                                                class="font-semibold"
                                                                >Nos visitó
                                                                hace</span
                                                            >
                                                        </div>
                                                    </template>

                                                    <template #horaActual
                                                        ><CurrentTimeTwo></CurrentTimeTwo
                                                    ></template>
                                                    <template #imagenUsuario>
                                                        <img
                                                            :src="
                                                                selectedRegistro.img_path
                                                            "
                                                            alt="aji"
                                                            class="w-32 h-32 object-cover rounded-2xl"
                                                        />
                                                    </template>
                                                    <template
                                                        #nombreVisitante
                                                        >{{
                                                            selectedRegistro.visitante
                                                        }}</template
                                                    >
                                                    <template #horaEntrada>{{
                                                        formatTime(
                                                            selectedRegistro.created_at
                                                        )
                                                    }}</template>
                                                    <template #horaSalida>{{
                                                        formatTime(
                                                            selectedRegistro.updated_at
                                                        )
                                                    }}</template>
                                                    <template #fechaVisita>{{
                                                        formatDate(
                                                            selectedRegistro.created_at
                                                        )
                                                    }}</template>
                                                    <template #numeroDni>{{
                                                        selectedRegistro.dni
                                                    }}</template>
                                                    <template #herramientas
                                                        ><DetallesHerramientas
                                                            ><CardDetallesHerramientas
                                                                v-for="herramienta in selectedRegistro.herramientas"
                                                                :key="
                                                                    herramienta.idHerramienta
                                                                "
                                                            >
                                                                <template
                                                                    #serieHerramienta
                                                                    >{{
                                                                        herramienta.serie
                                                                    }}</template
                                                                >
                                                                <template
                                                                    #nombreHerramienta
                                                                    >{{
                                                                        herramienta.nombreHerramienta
                                                                    }}</template
                                                                >
                                                                <template
                                                                    #marcaHerramienta
                                                                    >{{
                                                                        herramienta.marca
                                                                    }}</template
                                                                >
                                                            </CardDetallesHerramientas>
                                                        </DetallesHerramientas></template
                                                    >
                                                    <template #inicialCuenta>{{
                                                        selectedRegistro
                                                            .nombre_usuario[0]
                                                    }}</template>
                                                    <template #usuarioCuenta>{{
                                                        selectedRegistro.nombre_usuario
                                                    }}</template>
                                                    <template #correoCuenta>{{
                                                        $page.props.auth.user
                                                            .oficina_id
                                                    }}</template>
                                                </DetallesCard>
                                                <div
                                                    class="mt-6 flex space-x-4 text-center justify-center"
                                                >
                                                    <SecondaryButton
                                                        @click="closeModal"
                                                        >Cerrar</SecondaryButton
                                                    >
                                                </div>
                                            </div>
                                        </Modal>
                                    </TableDataCell>
                                </TableRow>
                            </template>
                        </Table>
                        <div class="mt-6 space-x-4 flex justify-center">
                            <template v-for="link in registros.meta.links">
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
                    </div></div
            ></template>
        </NoAdminLayout>
    </AuthenticatedLayout>
</template>
<script>
import moment from "moment";
import "moment/locale/es";

moment.locale("es");
export default {
    methods: {
        formatTime(datetime) {
            if (!datetime) return "";
            return moment(datetime, "DD/MM/YYYY HH:mm:ss").format("HH:mm:ss");
        },
        formatDate(datetime) {
            console.log(moment().format("LLLL"));
            if (!datetime) return "";
            return moment(datetime, "DD/MM/YYYY HH:mm:ss").format(
                "dddd, D [de] MMMM [del] YYYY"
            );
        },
    },
    components: { DangerButton },
};
</script>
