<template>
    <Button asChild v-slot="slotProps" severity="info">
        <D10 @roll:d10="$emit('roll:d10')" />
    </Button>
</template>

<script setup lang="ts">
import Button from 'primevue/button';
import D10 from "../dice/D10.vue";

defineEmits(['roll:d10']);
</script>
