<template>
    <div class="bg-gray-600 w-full rounded-xl p-10">
        <form class="w-full">
            <div>
                <div class="flex flex-wrap -mx-3 mb-6">

                    <div class="w-full px-3 mb-10">
                        <h2 class="text-white text-lg  mb-1">Destinatário <i class="ri-shield-user-line"></i></h2>
                        <hr class="border-b-2 border-white" />
                    </div>

                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                            for="grid-first-name">
                            Nome
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none"
                            id="grid-first-name" type="text" :value="data_details[0].name" />
                    </div>

                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                            for="grid-last-name">
                            CPF
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-last-name" type="text" :value="data_details[0].cpf" />
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                            for="grid-password">
                            Endereço
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-password" type="text" :value="data_details[0].address" />
                        <p class="text-gray-600 text-xs italic">
                            Make it as long and as crazy as you'd like
                        </p>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-city">
                            Estado
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-city" type="text" :value="data_details[0].state" />
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-state">
                            País
                        </label>
                        <div class="relative">
                            <input
                                class="appearance-none block w-full bg-gray-200  border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-city" type="text" :value="data_details[0].country" />

                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-zip">
                            CEP
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-zip" type="text" :value="data_details[0].cep" />
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-2">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-city">
                            LAT:{{ data_details[0].geo_lat }} / LNG: {{ data_details[0].geo_lng }}
                        </label>

                        <iframe class="pb-10" :src="mapUrl" width="100%" height="100%" style="border:0;"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">oii</iframe>
                    </div>

                </div>
            </div>

            <div>
                <div class="flex flex-wrap -mx-3 mb-6">

                    <div class="w-full mt-10 px-3 mb-10">
                        <h2 class="text-white text-lg  mb-1">Remetente <i class="ri-id-card-line"></i></h2>
                        <hr class="border-b-2 border-white" />
                    </div>

                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                            for="grid-first-name">
                            Nome
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none"
                            id="grid-first-name" type="text" :value="data_details[0].senders_name" />
                    </div>
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                            for="grid-first-name">
                            Volumes
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none"
                            id="grid-first-name" type="text" :value="data_details[0].volumes" />
                    </div>
                </div>
            </div>

            <div>
                <div class="flex flex-wrap -mx-3 mb-6">

                    <div class="w-full mt-10 px-3 mb-10">
                        <h2 class="text-white text-lg  mb-1">Rastreamento <i class="ri-eye-line"></i></h2>
                        <hr class="border-b-2 border-white" />
                    </div>

                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                            for="grid-first-name">
                            Mensagem
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none"
                            id="grid-first-name" type="text" :value="data_details[0].message" />
                    </div>
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2"
                            for="grid-first-name">
                            Data
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none"
                            id="grid-first-name" type="text" :value="data_details[0].date" />
                    </div>
                </div>
            </div>
        </form>
    </div>

</template>
<script setup>
import { router } from "@inertiajs/vue3";
import { ref, onMounted } from 'vue';

const { data_details } = defineProps(["data_details"]);

console.log(data_details)

const cep = ref('');
const mapUrl = ref('');




var geo_lat = data_details[0].geo_lat;
var geo_lng = data_details[0].geo_lng;


var url = `https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3675.1782577420013!2d${geo_lng}!3d${geo_lat}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjLCsDU0JzI0LjUiUyA0M8KwMTAnMjIuNCJX!5e0!3m2!1spt-BR!2sbr!4v1715308563730!5m2!1spt-BR!2sbr`;

mapUrl.value = url;


</script>
