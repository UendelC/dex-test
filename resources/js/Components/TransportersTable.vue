<script setup>
import TableHeader from './partials/TableHeader.vue';
import TableRow from './partials/TableRow.vue';
import TableCell from './partials/TableCell.vue';
import Table from './partials/Table.vue';
import { router } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

defineProps(['transporters']);

</script>

<template>
    <Table>
        <thead>
            <TableRow>
                <TableHeader>Nome</TableHeader>
                <TableHeader>Endereço</TableHeader>
                <TableHeader>Bairro</TableHeader>
                <TableHeader>Cidade</TableHeader>
                <TableHeader>UF</TableHeader>
                <TableHeader>Limite de Crédito</TableHeader>
                <TableHeader>Data da análise do Crédito</TableHeader>
                <TableHeader>Ações</TableHeader>
            </TableRow>
        </thead>
        <tbody>
            <TableRow v-for="transporter in transporters" :key="transporter.id">
                <TableCell>{{ transporter.name }}</TableCell>
                <TableCell>{{ transporter.address }}</TableCell>
                <TableCell>{{ transporter.neighborhood }}</TableCell>
                <TableCell>{{ transporter.city }}</TableCell>
                <TableCell>{{ transporter.state_code }}</TableCell>
                <TableCell>{{ transporter.credit_limit }}</TableCell>
                <TableCell>{{ transporter.credit_analysis_date }}</TableCell>
                <TableCell>
                    <div class="flex gap-2">
                        <Link :href="`/transporters/${transporter.id}/edit`" class="text-blue-500 hover:text-blue-700">Editar</Link>
                        <a @click="router.delete(`/transporters/${transporter.id}`)" class="text-red-500 hover:text-red-700 cursor-pointer">Excluir</a>
                    </div>
                </TableCell>
            </TableRow>
        </tbody>
    </Table>
</template>
