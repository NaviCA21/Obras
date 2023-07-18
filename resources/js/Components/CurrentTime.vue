<template>
    <section class="text-gray-600 body-font">
        <div class="container px-2 py-2 mx-auto">
            <div class="flex flex-wrap -m-4 text-center justify-center">
                <div class="p-2 md:w-1/4 sm:w-1/2 w-full">
                    <slot name="izquierda"></slot>
                </div>
                <div class="p-2 md:w-2/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-400 px-4 py-6 rounded-lg">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="text-indigo-500 w-12 h-12 mb-3 inline-block"
                        >
                            <circle cx="12" cy="12" r="10" />
                            <path d="M12 6v6l4 2" />
                        </svg>
                        <h2
                            class="title-font font-medium text-3xl text-gray-900"
                        >
                            {{ currentTime }}
                        </h2>
                        <p class="leading-relaxed">{{ currentDate }}</p>
                    </div>
                </div>
                <div class="p-2 md:w-1/4 sm:w-1/2 w-full">
                    <slot name="derecha"></slot>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { ref, onMounted, onUnmounted } from "vue";

export default {
    setup() {
        const currentDate = ref("");
        const currentTime = ref("");

        let intervalId = null;

        onMounted(() => {
            updateDateTime(); // Llamar a la función al montar el componente

            intervalId = setInterval(() => {
                updateDateTime(); // Actualizar fecha y hora cada segundo
            }, 1000);
        });

        onUnmounted(() => {
            clearInterval(intervalId); // Limpiar el intervalo al desmontar el componente
        });

        function updateDateTime() {
            const now = new Date();
            const optionsDate = {
                weekday: "long",
                month: "long",
                day: "numeric",
            };
            const optionsTime = {
                hour: "numeric",
                minute: "numeric",
                second: "numeric",
            };
            currentDate.value = now.toLocaleDateString("es-ES", optionsDate);
            currentTime.value = now.toLocaleTimeString("es-ES", optionsTime);
        }

        return { currentDate, currentTime };
    },
};
</script>
