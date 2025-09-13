<template>
    <Button v-slot="slotProps" severity="info" :disabled="disabled" raised>
        <D10 @roll:d10="rollD10" />
    </Button>
</template>

<script setup lang="ts">
import Button from 'primevue/button';
import D10 from "../dice/D10.vue";
import {computed} from "vue";

const props = defineProps<{
    disabled?: boolean
}>();

const disabled = computed(() => props.disabled ?? false);
const emit = defineEmits(['roll:d10']);

function rollD10() {
    if (props.disabled) {
        return;
    }

    emit('roll:d10');
}
</script>
