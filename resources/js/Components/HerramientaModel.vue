<template>
    <div
        class="fixed inset-0 bg-gray-500 bg-opacity-50 flex items-center justify-center"
        @click.self="$emit('cancelar')"
    >
        <div
            class="bg-white rounded shadow w-full max-w-md px-4 py-2 sm:px-8 sm:py-4 mx-2"
        >
            <h2 class="text-lg font-semibold mb-4">Agregar herramienta</h2>
            <label class="block font-medium mb-2">Nombre:</label>
            <input
                type="text"
                v-model="nombreHerramienta"
                class="border border-gray-300 rounded w-full px-3 py-2 mb-4"
            />
            <label class="block font-medium mb-2">Marca:</label>
            <input
                type="text"
                v-model="marca"
                class="border border-gray-300 rounded w-full px-3 py-2 mb-4"
            />
            <label class="block font-medium mb-2">Serie:</label>
            <input
                type="text"
                v-model="serie"
                class="border border-gray-300 rounded w-full px-3 py-2 mb-4"
            />
            <div class="flex justify-between">
                <button
                    type="button"
                    @click="guardarHerramienta"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                >
                    Guardar
                </button>
                <button
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                    type="button"
                    @click="$emit('cancelar')"
                >
                    Cancelar
                </button>
                <button type="button" @click="takePhoto">Tomar foto</button>
            </div>
        </div>
    </div>
</template>

<script>
import { toast } from "vue3-toastify";

export default {
    props: {
        herramienta: Object,
    },
    data() {
        return {
            nombreHerramienta: "",
            marca: "",
            serie: "",
        };
    },
    methods: {
        guardarHerramienta() {
            if (!this.nombreHerramienta) {
                toast.error("Campo requerido: Nombre de Herramienta", {
                    autoClose: 2000,
                    style: {
                        marginTop: "75px",
                    },
                });
                return;
            }
            this.$emit("guardar", {
                nombreHerramienta: this.nombreHerramienta,
                marca: this.marca,
                serie: this.serie,
            });
        },
    },
    watch: {
        herramienta: {
            immediate: true,
            handler(herramienta) {
                if (herramienta) {
                    this.nombreHerramienta = herramienta.nombreHerramienta;
                    this.marca = herramienta.marca;
                    this.serie = herramienta.serie;
                } else {
                    this.nombreHerramienta = "";
                    this.marca = "";
                    this.serie = "";
                }
            },
        },
    },
};
</script>
