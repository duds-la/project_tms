<template>
    <div class="bg-gray-200 w-full h-full rounded-xl p-10">

        <div class="flex flex-col">
            <div class="flex md:flex-row  flex-col items-center justify-between gap-3 mb-10">
            <ButtonAllDeliveries />
            <SearchField class="flex-1" />
        </div>
            <div class="justify-center items-center mt-3">
                <p class="text-center text-4xl">
                    <i class="ri-close-circle-line text-red-700 text-4xl"></i> {{ error }}
                </p>
            </div>
        </div>

    </div>
</template>
<script setup>
import SearchField from './SearchField.vue';
import ButtonAllDeliveries from './ButtonAllDeliveries.vue';

const { error } = defineProps(['error']);

</script>
