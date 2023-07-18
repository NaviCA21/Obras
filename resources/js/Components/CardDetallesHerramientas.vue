<template>
    <div class="detalle-herramienta select-none my-2 mx-1">
        <div class="relative pb-64">
            <a class="cursor-pointer">
                <img
                    class="absolute w-full h-full rounded-lg object-cover border-b shadow-md cursor-pointer"
                    src="https://images.unsplash.com/photo-1574920162043-b872873f19c8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=600&q=80"
                    alt="product name"
                />
            </a>
        </div>
        <div class="px-4 -mt-16 relative">
            <div class="bg-white rounded-lg shadow-lg border">
                <div class="p-5">
                    <div class="flex justify-between items-center">
                        <div class="opacity-75 text-sm">
                            <a class="hover:underline">
                                Serie: <slot name="serieHerramienta"></slot>
                            </a>
                        </div>

                        <span
                            class="text-green-600 rounded-full bg-green-200 px-3 py-1 text-xs select-none"
                        >
                            Bueno
                        </span>
                    </div>

                    <a
                        class="text-gray-800 block truncate hover:underline font-medium text-lg"
                    >
                        <slot name="nombreHerramienta"></slot>
                    </a>
                </div>

                <div class="flex justify-between items-center pb-3 px-5 -mt-5">
                    <div>
                        <div class="text-gray-800 text-lg">
                            <span class="font-sm">
                                Marca: <slot name="marcaHerramienta"></slot
                            ></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
/* Establecer un ancho mínimo para cada elemento */
.detalle-herramienta {
    min-width: calc(33.3333% - 1rem);
}
</style>
