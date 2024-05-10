<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { reactive } from 'vue';
import { router } from '@inertiajs/vue3';
import { watch } from 'vue';

const form = reactive({
    name: '',
    address: '',
    neighborhood: '',
    city: '',
    state_code: '',
    credit_limit: '',
    credit_analysis_date: '',
    cep: '',
});

watch(() => form.cep, (value) => {
    if (value.toString().length === 8) {
        fetch(`https://viacep.com.br/ws/${value}/json/`)
            .then((response) => response.json())
            .then((data) => {
                form.address = data.logradouro;
                form.neighborhood = data.bairro;
                form.city = data.localidade;
                form.state_code = data.uf;
            });
    }
});

function submit() {
    router.post('/transporters', form);
}

</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Criar novo transportador</h2>
        </template>

        <div class="mt-12 flex flex-col items-center justify-center mx-48">
            <form @submit.prevent="submit">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            v-model="form.name"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        />
                    </div>
                    <div>
                        <label for="cep" class="block text-sm font-medium text-gray-700">CEP</label>
                        <input
                            type="number"
                            max="99999999"
                            name="cep"
                            id="cep"
                            v-model="form.cep"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        />
                    </div>
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Endereço</label>
                        <input
                            type="text"
                            name="address"
                            id="address"
                            v-model="form.address"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        />
                    </div>
                    <div>
                        <label for="neighborhood" class="block text">Bairro</label>
                        <input
                            type="text"
                            name="neighborhood"
                            id="neighborhood"
                            v-model="form.neighborhood"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    </div>
                    <div>
                        <label for="city" class="block text">Cidade</label>
                        <input
                            type="text"
                            name="city"
                            id="city"
                            v-model="form.city"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    </div>
                    <div>
                        <label for="state_code" class="block text">UF</label>
                        <input
                            type="text"
                            maxlength="2"
                            name="state_code"
                            id="state_code"
                            v-model="form.state_code"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    </div>
                    <div>
                        <label for="credit_limit" class="block text">Limite de Crédito</label>
                        <input
                            type="number"
                            name="credit_limit"
                            id="credit_limit"
                            v-model="form.credit_limit"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    </div>
                    <div>
                        <label for="credit_analysis_date" class="block text">Data da análise do Crédito</label>
                        <input
                            type="text"
                            name="credit_analysis_date"
                            id="credit_analysis_date"
                            v-model="form.credit_analysis_date"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    </div>
                </div>
                <div class="mt-4">
                    <button
                        type="submit"
                        class="bg-blue-600 rounded px-3 py-2 text-white self-end cursor-pointer hover:bg-blue-800"
                    >
                        Criar
                    </button>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
