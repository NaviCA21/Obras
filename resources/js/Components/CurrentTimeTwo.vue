<template>
    <span class="text-gray-700 body-font">
        {{ currentTime }}
    </span>
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
