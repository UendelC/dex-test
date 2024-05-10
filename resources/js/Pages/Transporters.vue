<script setup>
import { defineProps } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import TransportersTable from '@/Components/TransportersTable.vue';
import { Link } from '@inertiajs/vue3';

defineProps(['transporters']);


</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Transportadores</h2>
        </template>

        <div class="mt-12 flex flex-col items-center justify-center">
            <Link
                class="bg-blue-600 rounded px-3 py-2 text-white self-end cursor-pointer hover:bg-blue-800"
                href="/transporters/create"
                as="button"
                type="button"
            >
                Criar
            </Link>
            <div class="my-3">
                <TransportersTable :transporters="transporters" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
