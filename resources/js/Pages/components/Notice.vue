<template>
    <div class="bg-gray-200 w-full h-full rounded-xl p-10">

        <div class="flex flex-col">
            <div class="items-start justify-start">
                <SearchField />
            </div>
            <div class="justify-center items-center mt-3">
                <p class="text-center text-4xl">
                    <i class="ri-close-circle-line text-red-700 text-4xl"></i> Poxa parece que não há entregas listadas,
                    procure digitando o CPF.
                </p>
            </div>
        </div>

    </div>
</template>
<script setup>
import SearchField from './SearchField.vue';
</script>
