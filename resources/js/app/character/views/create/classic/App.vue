<template>
    <div class="flex items-center justify-center">
        <Basic
            class="w-4/6"
            :character="character"
        />
    </div>
</template>

<script setup lang="ts">
import { reactive } from 'vue';
import Basic from './basic/Basic.vue';
import Character from '../../../infrastructure/models/Character';
import { Character as CharacterType } from '../../../domain/types/Character';
import CharacterFactory from '../../../infrastructure/factories/CharacterFactory';

//@ts-ignore
let character = reactive<Character & CharacterType>(CharacterFactory.forCreation());
</script>
