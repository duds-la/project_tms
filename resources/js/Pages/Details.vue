<template>
    <LayoutBase>
        <div class="bg-gray-200 w-full  rounded-xl p-10">
            <div class="flex md:flex-row  flex-col items-center justify-between gap-3 mb-10">
                <ButtonAllDeliveries />
                <SearchField class="flex-1" />
                <SearchFieldCarrier class="flex-1" />
            </div>
            <AboutRecipient :data_details="details" />
        </div>
    </LayoutBase>
</template>
<script setup>
import { defineProps } from 'vue';
import LayoutBase from './components/LayoutBase.vue';
import AboutRecipient from './AboutRecipient.vue';
import ButtonAllDeliveries from './components/ButtonAllDeliveries.vue';
import SearchField from './components/SearchField.vue';
import SearchFieldCarrier from './components/SearchFieldCarrier.vue';


defineProps({
    details: Object
});


</script>
