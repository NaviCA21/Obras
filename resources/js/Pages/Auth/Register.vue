<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    terms: false,
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <div
        class="flex items-center justify-center min-h-screen from-gray-800 via-greeen-300 to-blue-500 bg-gradient-to-br p-2"
    >
        <div
            class="w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl"
        >
            <div class="max-w-md mx-auto space-y-6">
                <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                    <div class="mx-auto max-w-screen-sm text-center">
                        <h1
                            class="mb-4 text-5xl tracking-tight font-extrabold lg:text-7xl text-primary-600 dark:text-primary-500"
                        >
                            403 Prohibido
                        </h1>
                        <p
                            class="mb-4 text-2xl tracking-tight font-normal text-black md:text-3xl"
                        >
                            El cliente no tiene permiso para acceder al recurso
                            solicitado
                        </p>
                        <p
                            class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400"
                        >
                            Aun no está disponible esta funcionalidad.
                        </p>
                    </div>
                    <Link
                        :href="route('login')"
                        class="flex justify-center text-center text-xl font-bold text-white dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-gray-800 bg-blue-500 p-4 mt-10"
                    >
                        Volver a Inicio
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>
