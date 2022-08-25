<template>
    <span class="text-white">This is the basic</span>
</template>

<script setup lang="ts">
import Character from '../../../../infrastructure/models/Character';

const props = defineProps<{ character: Character }>();
const { character } = props;
</script>
