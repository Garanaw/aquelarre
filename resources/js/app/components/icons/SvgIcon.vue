<template>
    <svg
        :width="sizeValue"
        :height="sizeValue"
        :viewBox="viewboxValue"
        style="transform: rotate(var(--r, 0deg)) scale(var(--sx, 1), var(--sy, 1));"
        :style="styles"
    >
        <path fill="currentColor" :d="path" />
    </svg>
</template>

<script setup lang="ts">
import { computed } from 'vue';

const props = defineProps({
    type: String,
    path: { type: String, required: true },
    size: { type: [String, Number], default: 24 },
    viewbox: String,
    flip: {
        type: String,
        validator: (value: string) => ["horizontal", "vertical", "both", "none"].includes(value),
    },
    rotate: { type: Number, default: 0 },
});

const types = {
    mdi: {
        size: 24,
        viewbox: "0 0 24 24",
    },
    "simple-icons": {
        size: 24,
        viewbox: "0 0 24 24",
    },
    default: {
        size: 0,
        viewbox: "0 0 0 0",
    },
}

const styles = computed(() => {
    return {
        // @ts-ignore
        "--sx": ["both", "horizontal"].includes(props.flip) ? "-1" : "1",
        // @ts-ignore
        "--sy": ["both", "vertical"].includes(props.flip) ? "-1" : "1",
        "--r": isNaN(props.rotate) ? props.rotate : props.rotate + "deg",
    }
});

const defaults = computed(() => {
    // @ts-ignore
    return types[props.type] || types.default
});

const sizeValue = computed(() => {
    return props.size || defaults.value.size
});

const viewboxValue = computed(() => {
    return props.viewbox || defaults.value.viewbox
});
</script>

<style scoped>

</style>
