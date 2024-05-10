<template>
    <div class="bg-gray-200 w-full h-full rounded-xl p-10">
        <div class="flex flex-row items-center justify-between gap-3">
            <ButtonAllDeliveries />
            <SearchField class="flex-1" />
            <SearchFieldCarrier class="flex-1" />
        </div>
        <div class="flex flex-col">
            <div class="justify-center items-center mt-3">

                <div class="relative overflow-x-auto rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    CPF
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    NOME
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    REMETENTE
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    TRANSPORTADORA
                                </th>
                                <th scope="col" class="px-3 py-3">
                                    DETALHES
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(data_deliverie, index) in data_deliveries" :key="index" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{data_deliverie._destinatario._cpf}}
                                </th>
                                <td class="px-6 py-4">
                                    {{data_deliverie._destinatario._nome}}
                                </td>
                                <td class="px-6 py-4">
                                    {{data_deliverie._remetente._nome}}
                                </td>
                                <td class="px-6 py-4">
                                    {{data_deliverie._id_transportadora}}
                                </td>
                                <td class="px-6 py-4 ">
                                    <i class="ri-expand-diagonal-line hover:text-xl hover:text-slate-50 duration-150 ease-in cursor-pointer"></i>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</template>
<script setup>
import SearchField from './SearchField.vue';
import SearchFieldCarrier from './SearchFieldCarrier.vue';
import ButtonAllDeliveries from './ButtonAllDeliveries.vue';

const { data_deliveries } = defineProps(['data_deliveries']);

</script>
