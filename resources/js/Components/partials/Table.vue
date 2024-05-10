<template>
    <div class="border border-black/80 rounded-lg bg-white">
        <table class="w-full" v-bind="$attrs">
            <slot></slot>
        </table>
    </div>
</template>
