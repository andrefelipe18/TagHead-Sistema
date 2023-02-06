<template>
      <div class="container px-6 py-10 mx-auto">
        <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-12 xl:gap-12 md:grid-cols-2 xl:grid-cols-3">
            <div class="p-8 space-y-3 border-2 border-th-red-400 rounded-xl">
                <h1 class="text-xl font-semibold text-gray-700 capitalize">Titulo post</h1>

                <p class="text-th-black-800">
                    LEGENDA POST -Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident ab nulla quod dignissimos vel non corrupti doloribus voluptatum eveniet
                </p>

                <a href="#" class="inline-flex p-2 capitalize transition-colors duration-300 transform bg-th-red-100 rounded-full rtl:-scale-x-100 text-th-red-900 hover:underline hover:text-th-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Post",
}
</script>

<style>

</style>
