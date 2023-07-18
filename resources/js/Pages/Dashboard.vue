<script setup>
import Estadistica from "@/Components/Estadistica.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import ChartJs from "@/Components/ChartJs.vue";
import { computed } from "vue";

// const chartData = computed(() =>
//     props.registros.map((registro) => registro.idControl)
// );
// const chartLabels = computed(() =>
//     props.registros.map((registro) => registro.nombre_usuario)
// );

const Labels = ["Admin", "Puerta", "Secretaria", "Tesoreria"];
const Colors = ["skyblue", "purple", "orange", "brown"];
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="uppercase p-3 bg-black rounded-full text-white w-full font-semibold text-center"
            >
                PANEL DE ADMINISTRACIÓN
            </h2>
        </template>
        <Estadistica>
            <template #oficina>{{ $page.props.auth.user.oficina_id }}</template>
            <template #usuario>{{ $page.props.auth.user.name }}</template>
            <template #correo>{{ $page.props.auth.user.email }}</template>
            <template #visitasTotales>{{
                $page.props.registros_data.registrosTotales
            }}</template>
            <template #visitasHoy>{{
                $page.props.registros_data.registrosHoy
            }}</template>
            <template #visitasActuales>{{
                $page.props.registros_data.registrosActuales
            }}</template>
            <template #adminHoy>{{
                $page.props.registros_data.adminHoy
            }}</template>
            <template #adminTotal>{{
                $page.props.registros_data.adminTotal
            }}</template>
            <template #puertaHoy>{{
                $page.props.registros_data.puertaHoy
            }}</template>
            <template #puertaTotal>{{
                $page.props.registros_data.puertaTotal
            }}</template>
            <template #secretariaHoy>{{
                $page.props.registros_data.secretariaHoy
            }}</template>
            <template #secretariaTotal>{{
                $page.props.registros_data.secretariaTotal
            }}</template>
            <template #tesoreriaHoy>{{
                $page.props.registros_data.tesoreriaHoy
            }}</template>
            <template #tesoreriaTotal>{{
                $page.props.registros_data.tesoreriaTotal
            }}</template>
            <template #graficos
                ><ChartJs
                    :chart-data="[
                        $page.props.registros_data.adminHoy,
                        $page.props.registros_data.puertaHoy,
                        $page.props.registros_data.secretariaHoy,
                        $page.props.registros_data.tesoreriaHoy,
                    ]"
                    :chart-labels="Labels"
                    chart-label="Visitas de Oficinas Hoy"
                    :chart-colors="Colors"
                ></ChartJs>
                <ChartJs
                    :chart-data="[
                        $page.props.registros_data.adminTotal,
                        $page.props.registros_data.puertaTotal,
                        $page.props.registros_data.secretariaTotal,
                        $page.props.registros_data.tesoreriaTotal,
                    ]"
                    :chart-labels="Labels"
                    chart-label="Visitas de Oficinas Totales"
                    :chart-colors="Colors"
                ></ChartJs
            ></template>
        </Estadistica>
    </AuthenticatedLayout>
</template>
<script>
export default {
    components: {
        ChartJs,
    },
};
</script>
