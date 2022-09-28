<template>
    <button
        type="button"
        :disabled="disabled"
        @click="$emit('checked')"
        class="btn btn-dark font-medium text-xs shadow-md hover:shadow-lg focus:bg-gray-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-900 active:shadow-lg transition duration-150 ease-in-out"
        v-bind="$attrs"
    >
        <FontAwesomeIcon :icon="['fas', 'check']" />
    </button>
</template>

<script setup lang="ts">
import { defineProps, defineEmits } from 'vue';

defineProps({
    disabled: {
        type: Boolean,
        default: false
    }
});

defineEmits(['checked']);
</script>
