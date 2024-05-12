<template>
    <LayoutBase>
        <Index :data_deliveries="deliveries" :error="error" />
    </LayoutBase>
</template>
<script setup>
import { defineProps } from 'vue';
import LayoutBase from './components/LayoutBase.vue';
import Index from './Index.vue';

defineProps({
    deliveries: Object,
    error: String,
});
</script>
