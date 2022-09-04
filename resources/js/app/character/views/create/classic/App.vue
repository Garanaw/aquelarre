<template>
    <div class="flex items-center justify-center">
        <Basic
            class="w-4/6"
            :character="character"
        />
        <div class="text-white">
            {{ character.value }}
        </div>
        <button
            @click="test"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
        >
            Test
        </button>
    </div>
</template>

<script setup lang="ts">
import { reactive } from 'vue';
import Basic from './basic/Basic.vue';
import Character from '../../../infrastructure/models/Character';
import CharacterFactory from '../../../infrastructure/factories/CharacterFactory';

//@ts-ignore
let character = reactive<Character>(CharacterFactory.forCreation());
console.log('created', character);

function getCharacter() {
    return character as Character;
}

function test() {
    console.log('character', character);
}
</script>
