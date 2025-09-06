<template>
    <SvgIcon type="mdi" :path="props.path" size="48px" />
</template>

<script setup lang="ts">
import SvgIcon from '../icons/SvgIcon.vue';

const props = defineProps(['path']);
</script>
