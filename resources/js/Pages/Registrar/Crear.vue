<script setup>
import { reactive } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import { onMounted } from "vue";
import AddButton from "@/Components/AddButton.vue";
import CurrentTimeTwo from "@/Components/CurrentTimeTwo.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { toast } from "vue3-toastify";
import "vue3-toastify/dist/index.css";
import HerramientaModel from "@/Components/HerramientaModel.vue";
import { ref } from "vue";
import CreateButton from "@/Components/CreateButton.vue";

const state = reactive({
    previewSrc: "",
    stream: null, // Agregar nueva propiedad
});

const showModal = ref(false);

const herramientas = ref([]);
const herramientaAEditar = ref(null);

const guardarHerramienta = (herramienta) => {
    if (herramientaAEditar.value !== null) {
        herramientas.value[herramientaAEditar.value] = herramienta;
        herramientaAEditar.value = null;
    } else {
        herramientas.value.push(herramienta);
    }
    showModal.value = false;
};

const cancelarHerramienta = () => {
    showModal.value = false;
};

const editarHerramienta = (index) => {
    herramientaAEditar.value = index;
    showModal.value = true;
};

const eliminarHerramienta = (index) => {
    herramientas.value.splice(index, 1);
};

const props = defineProps({
    visitanteArray: {
        type: Object,
        required: true,
    },
    auth: {
        type: Object,
        required: true,
    },
    dni: {
        type: String,
        required: true,
    },
    error: String,
    success: String,
});

const form = useForm({
    dni: props.visitanteArray?.numeroDocumento ?? props.dni,
    visitante: props.visitanteArray?.nombre ?? "No se encontraron datos",
    entidad: "",
    motivo: "",
    observacion: "",
    nombre_usuario: "",
    img_path: "",
    usuario_id: props.auth.user.id,
    herramientas: herramientas.value, // Agregar la propiedad herramientas al objeto form
});

onMounted(() => {
    const video = document.querySelector("#camera");
    if (navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices
            .getUserMedia({ video: true })
            .then(function (stream) {
                video.srcObject = stream;
                state.stream = stream; // Actualizar la propiedad stream
            })
            .catch(function (error) {
                console.log("Algo salió mal!", error);
            });
    }
});

function takePhoto() {
    const canvas = document.createElement("canvas");
    const video = document.querySelector("#camera");

    canvas.width = 480;
    canvas.height = 480;

    //canvas.getContext("2d").drawImage(video, 0, 0);

    const context = canvas.getContext("2d");
    const imageAspectRatio = video.videoWidth / video.videoHeight;
    const canvasAspectRatio = canvas.width / canvas.height;
    let renderableHeight, renderableWidth, xStart, yStart;

    // Si la relación de aspecto de la imagen es menor que la relación de aspecto del canvas
    if (imageAspectRatio > canvasAspectRatio) {
        renderableHeight = canvas.height;
        renderableWidth =
            video.videoWidth * (renderableHeight / video.videoHeight);
        xStart = (canvas.width - renderableWidth) / 2;
        yStart = 0;
    } else if (imageAspectRatio < canvasAspectRatio) {
        renderableWidth = canvas.width;
        renderableHeight =
            video.videoHeight * (renderableWidth / video.videoWidth);
        xStart = 0;
        yStart = (canvas.height - renderableHeight) / 2;
    } else {
        renderableHeight = canvas.height;
        renderableWidth = canvas.width;
        xStart = 0;
        yStart = 0;
    }
    context.drawImage(video, xStart, yStart, renderableWidth, renderableHeight);
    const imageData = canvas.toDataURL("image/png");

    // Actualiza el valor de la propiedad previewSrc
    form.img_path = imageData;
    state.previewSrc = imageData;

    // // Envía los datos de la imagen a tu controlador de Laravel
    // form.post(route("registrar.imagen"));
}
function submitForm() {
    const missingFields = [];
    if (!form.dni) missingFields.push("DNI");
    if (!form.visitante) missingFields.push("Visitante");
    if (!form.entidad) missingFields.push("Entidad");
    if (!form.motivo) missingFields.push("Motivo");
    if (!form.usuario_id) missingFields.push("Usuario ID");
    if (!form.img_path) missingFields.push("Imagen");

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

    // Detener la transmisión de la cámara
    const stream = state.stream;
    if (stream) {
        const tracks = stream.getTracks();
        tracks.forEach(function (track) {
            track.stop();
        });
        state.srcObject = null;
    } else {
        console.log("No stream found"); // Agregar registro
    }

    // Enviar el formulario
    form.post(route("registrar.store"));
}

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
</script>

<template>
    <Head title="Registrar" />
    <!-- <div>
        <div>{{ visitanteArray }}</div>
    </div> -->
    <AuthenticatedLayout>
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Registrar
            </h2>
        </template>
        <div class="max-w-4xl mx-auto p-5 rounded-xl mt-4 bg-white">
            <div class="mt-6">
                <form
                    class="grid grid-cols-3 gap-6"
                    @submit.prevent="submitForm"
                >
                    <div class="col-span-2">
                        <InputLabel
                            for="dni"
                            value="Documento Nacional de Identidad"
                            class="font-semibold text-gray-600 py-2 uppercase"
                        />

                        <TextInput
                            id="dni"
                            type="text"
                            class="bg-gray-100 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                            v-model="form.dni"
                            :readonly="visitanteArray"
                        ></TextInput>
                    </div>
                    <div class="row-span-6 flex justify-center text-center">
                        <div class="modal">
                            <button type="button" @click="takePhoto">
                                <CreateButton> Tomar foto </CreateButton>
                            </button>
                            <div class="border-black border-t-2 mt-1 shadow-sm">
                                <span class="font-bold">Vista en Vivo</span>
                                <video
                                    id="camera"
                                    class="camera-video"
                                    autoplay
                                ></video>
                            </div>
                            <div
                                class="border-black border-t-2 mt-5 shadow-2xl"
                            >
                                <span class="font-bold">Vista previa</span>
                                <img
                                    :src="state.previewSrc"
                                    class="camera-video"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2 -mt-4">
                        <InputLabel
                            for="nombre"
                            value="Nombre completo del visitante"
                            class="font-semibold text-gray-600 py-2 uppercase"
                        />
                        <TextInput
                            id="nombre"
                            type="text"
                            class="bg-gray-100 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                            v-model="form.visitante"
                            autocomplete="nombre"
                            :readonly="visitanteArray"
                        />
                    </div>
                    <div class="-mt-4">
                        <InputLabel
                            for="usuario"
                            value="Usuario"
                            class="font-semibold text-gray-600 py-2 uppercase"
                        />

                        <TextInput
                            id="usuario"
                            type="text"
                            v-model="props.auth.user.name"
                            class="bg-gray-100 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                            placeholder="Entidad proveniente"
                            autocomplete="entidad"
                            readonly
                        />
                    </div>
                    <div class="-mt-4">
                        <InputLabel
                            for="oficina"
                            value="Oficina de ingreso"
                            class="font-semibold text-gray-600 py-2 uppercase"
                        />

                        <TextInput
                            id="oficina"
                            type="text"
                            v-model="props.auth.user.oficina_id"
                            class="bg-gray-100 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                            placeholder="Motivo de visita"
                            autocomplete="motivo"
                            readonly
                        />
                    </div>
                    <div class="-mt-4">
                        <InputLabel
                            for="hora"
                            value="hora"
                            class="font-semibold text-gray-600 py-2 uppercase"
                        ></InputLabel>

                        <div
                            id="hora"
                            type="text"
                            class="bg-gray-100 appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-300 rounded-lg h-10 px-4 font-medium"
                            autocomplete="hora"
                        >
                            <CurrentTimeTwo></CurrentTimeTwo>
                        </div>
                    </div>
                    <div class="-mt-4">
                        <InputLabel
                            for="herramientas"
                            value="Herramientas"
                            class="font-semibold text-gray-600 py-2 uppercase"
                        />
                        <PrimaryButton
                            id="herramientas"
                            type="button"
                            @click="showModal = true"
                            class="flex bg-gray-300 appearance-none w-full bg-grey-lighter border border-grey-lighter rounded-lg h-10 px-4 text-white justify-center"
                            >Agregar Herramienta</PrimaryButton
                        >
                        <HerramientaModel
                            v-if="showModal"
                            :herramienta="herramientas[herramientaAEditar]"
                            @guardar="guardarHerramienta"
                            @cancelar="cancelarHerramienta"
                        />
                        <input
                            type="hidden"
                            name="herramientas"
                            :value="JSON.stringify(herramientas)"
                        />
                    </div>
                    <div class="-mt-4">
                        <InputLabel
                            for="entidad"
                            value="Entidad de origen"
                            class="font-semibold text-gray-600 py-2 uppercase"
                        />

                        <TextInput
                            id="entidad"
                            type="text"
                            v-model="form.entidad"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                            placeholder="Entidad proveniente"
                            autocomplete="entidad"
                            autofocus
                        />
                    </div>
                    <div class="-mt-4">
                        <InputLabel
                            for="motivo"
                            value="Motivo de visita"
                            class="font-semibold text-gray-600 py-2 uppercase"
                        />

                        <TextInput
                            id="motivo"
                            type="text"
                            v-model="form.motivo"
                            class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                            placeholder="Motivo de visita"
                            autocomplete="motivo"
                        />
                    </div>
                    <div class="col-span-2 -mt-4">
                        <InputLabel
                            for="observacion"
                            value="Observación"
                            class="font-semibold text-gray-600 py-2 uppercase"
                        />

                        <TextInput
                            id="observacion"
                            type="text"
                            v-model="form.observacion"
                            class="min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg py-4 px-4"
                            placeholder="Agregrue cualquier observación..."
                            autocomplete="observacion"
                        />
                    </div>
                    <div class="flex justify-between col-span-3">
                        <button
                            class="hover:-translate-y-1 hover:scale-110 transition ease-in-out delay-50 bg-red-500 shadow-lg shadow-red-500/50 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mr-2"
                        >
                            Cancelar
                        </button>
                        <button
                            type="submit"
                            class="hover:-translate-y-1 hover:scale-110 transition ease-in-out delay-50 bg-green-500 shadow-lg shadow-green-500/50 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                        >
                            Guardar
                        </button>
                    </div>
                </form>
                <table v-if="herramientas.length > 0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Serie</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(herramienta, index) in herramientas"
                            :key="herramienta.serie"
                        >
                            <td>{{ herramienta.nombreHerramienta }}</td>
                            <td>{{ herramienta.marca }}</td>
                            <td>{{ herramienta.serie }}</td>
                            <td>
                                <button @click="editarHerramienta(index)">
                                    Editar
                                </button>
                                <button @click="eliminarHerramienta(index)">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<style>
.camera-video {
    object-fit: cover;
    width: 100%;
}
.transition-opacity {
    transition: opacity 10s ease-in-out;
}
</style>
