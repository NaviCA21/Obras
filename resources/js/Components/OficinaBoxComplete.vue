<template>
    <img
        class="w-32 mx-auto rounded-full -mt-20 border-8 border-white"
        src="https://thumbs.dreamstime.com/z/icono-del-usuario-avatar-masculino-en-dise%C3%B1o-plano-traje-vector-negocio-99280834.jpg"
        alt=""
    />
    <div class="text-center mt-2 text-3xl font-medium">
        <slot name="nombre"></slot>
    </div>
    <div class="text-center mt-2 font-light text-sm">
        <slot name="correo"></slot>
    </div>
    <div class="text-center font-normal text-lg">
        <slot name="oficina"></slot>
    </div>
    <div class="px-6 text-center mt-2 text-md">
        <p><strong>Roles:</strong><slot name="roles"></slot></p>
        <p><strong>Permisos:</strong><slot name="permisos"></slot></p>
    </div>
    <hr class="mt-2" />
    <div class="flex p-4">
        <div class="w-1/2 text-center">
            <p class="font-bold">1.8 k</p>
            <p class="text-sm">Registros Totales</p>
        </div>
        <div class="w-0 border border-gray-300"></div>
        <div class="w-1/2 text-center">
            <p class="font-bold">1.8 k</p>
            <p class="text-sm">Registros Hoy</p>
        </div>
    </div>
</template>
