<template>
  <div class="">
      <button 
        @click="index"
        type="button"
        class="text-white end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 hover:scale-110 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
      >
        Ver Entregas <i class="ri-arrow-right-double-fill"></i>
      </button>
  </div>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3";

defineProps({
  errors: Object,
});

const form = useForm({
  cpf: null,
});

function index() {
  router.get("/delivery/");
}
</script>
