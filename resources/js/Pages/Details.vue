<template>
    <LayoutBase>
        <div class="bg-gray-200 w-full h-full rounded-xl p-10">
            <AboutRecipient :data_deliveries="deliveries" />
        </div>
    </LayoutBase>
</template>
<script setup>
import { defineProps } from 'vue';
import LayoutBase from './components/LayoutBase.vue';
import AboutRecipient from './AboutRecipient.vue';

defineProps({
    deliveries: Object,
});

</script>
