<template>
    <div
        class="flex box-border mt-2 mb-2 relative z-10 text-center items-center justify-center w-auto px-8 py-2 overflow-hidden font-bold text-white transition-all duration-300 bg-blue-600 rounded-md cursor-pointer group ring-offset-2 ring-1 ring-indigo-300 ring-offset-indigo-200 hover:ring-offset-indigo-500 ease focus:outline-none"
    >
        <span
            class="flex bottom-0 right-0 w-8 h-8 mt-3 -mb-8 -mr-5 transition-all duration-300 ease-out transform rotate-45 translate-x-1 bg-white opacity-10 group-hover:translate-x-0 text-center justify-center items-center"
        ></span>
        <span
            class="flex top-0 left-0 w-20 h-8 -mt-1 -ml-12 transition-all duration-300 ease-out transform -rotate-45 -translate-x-1 bg-white opacity-10 group-hover:translate-x-0 text-center justify-center items-center"
        ></span>
        <span class="relative z-20 flex text-sm">
            <svg
                class="relative w-5 h-5 mr-2 text-white"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M13 10V3L4 14h7v7l9-11h-7z"
                ></path>
            </svg>
            <slot />
        </span>
    </div>
</template>
