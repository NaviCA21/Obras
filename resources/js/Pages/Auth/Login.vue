<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { toast } from "vue3-toastify";
import "vue3-toastify/dist/index.css";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => {
            form.reset("password");
        },
        onSuccess: () => {
            toast.success(
                "Inicio de Sesión Correcto, ¡Bienvenido al Sistema de Visitas!",
                {
                    autoClose: 2000,
                    style: {
                        marginTop: "75px",
                    },
                }
            );
        },
        onError: () => {
            toast.error("Las credenciales introducidas son incorrectas", {
                autoClose: 2000,
                style: {
                    marginTop: "75px",
                },
            });
        },
    });
};
</script>

<template>
    <Head title="Log in" />

    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
    </div>

    <section class="bg-gray-50 dark:bg-gray-900 -mt-10">
        <div
            class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0"
        >
            <a
                class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white -ml-10"
            >
                <img
                    class="w-36 h-36 mr-2"
                    src="http://munipuno.gob.pe/r/asistencia-gp/img/logo_mpp.svg"
                    alt="logo"
                />
                <span class="font-bold -ml-10">VISITAS MPP</span>
            </a>
            <div
                class="w-full bg-slate-100 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 border-2 border-indigo-600"
            >
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1
                        class="text-2xl font-semibold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center"
                    >
                        Iniciar Sesión
                    </h1>
                    <p class="text-center text-gray-600">
                        Ingresa tus credenciales para ingresar al sistema
                    </p>
                    <form
                        @submit.prevent="submit"
                        class="space-y-4 md:space-y-4"
                    >
                        <div>
                            <label
                                class="relative w-full flex flex-col shadow-lg mb-4"
                            >
                                <TextInput
                                    id="email"
                                    type="email"
                                    class="rounded-md peer pl-12 pr-2 py-2 border-2 border-gray-200 placeholder-gray-300"
                                    v-model="form.email"
                                    required
                                    autofocus
                                    autocomplete="username"
                                    placeholder="usuario@usuario.com"
                                />
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="absolute bottom-0 left-0 -mb-0.5 transform translate-x-1/2 -translate-y-1/2 text-black peer-placeholder-shown:text-gray-300 h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
                                    />
                                </svg>
                            </label>
                        </div>
                        <div>
                            <label
                                class="relative w-full flex flex-col mb-6 shadow-lg"
                            >
                                <TextInput
                                    id="password"
                                    type="password"
                                    class="rounded-md peer pl-12 pr-2 py-2 border-2 border-gray-200 placeholder-gray-300"
                                    v-model="form.password"
                                    required
                                    autocomplete="current-password"
                                    placeholder="Contraseña"
                                />
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="absolute bottom-0 left-0 -mb-0.5 transform translate-x-1/2 -translate-y-1/2 text-black peer-placeholder-shown:text-gray-300 h-6 w-6"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </label>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div
                                    class="mt-1 mb-1 flex items-center justify-between"
                                >
                                    <div
                                        class="flex items-center justify-between"
                                    >
                                        <label class="flex items-center">
                                            <Checkbox
                                                name="remember"
                                                v-model:checked="form.remember"
                                            />
                                            <span
                                                class="ml-2 text-sm text-gray-600 dark:text-gray-400"
                                                >Recordar Sesión</span
                                            >
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-center mt-4">
                            <PrimaryButton
                                class="text-white bg-indigo-600 hover:bg-indigo-400 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Empezar
                            </PrimaryButton>
                        </div>
                        <div class="flex items-center justify-center mt-4">
                            <Link
                                v-if="canResetPassword"
                                :href="route('password.request')"
                                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            >
                                ¿Olvidaste tu contraseña?
                            </Link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>
