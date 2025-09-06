<template>
    <Dice @click="$emit('roll:d10')" :path="mdiDiceD10" />
</template>

<script setup lang="ts">
import { mdiDiceD10 } from '@mdi/js'
import Dice from "./Dice.vue";

defineEmits(['roll:d10']);
</script>
