<template>
    <div v-if="data_deliveries && data_deliveries.length > 0">
        <Table :data_deliveries="data_deliveries" />
    </div>
    <div v-else>
        <Notice :error="error" />
    </div>
</template>
<script setup>
import { defineProps } from 'vue';
import Notice from './components/Notice.vue';
import Table from './components/Table.vue';

const { data_deliveries, error } = defineProps(['data_deliveries', 'error']);


</script>