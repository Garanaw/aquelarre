<template>
    <div class="flex w-4/6 items-center bg-primary-scroll p-5">
        <Basic
            :character="character"
        />
    </div>
</template>

<script setup lang="ts">
import { provide, reactive } from 'vue';
import Basic from './basic/Basic.vue';
import Character from '../../../infrastructure/models/Character';
import { Character as CharacterType } from '../../../domain/types/Character';
import CharacterFactory from '../../../infrastructure/factories/CharacterFactory';
import SetElements from '../shared/domain/services/SetElements';
import { injectContainer } from '../../../../../framework/support/helpers';
import { SET_ELEMENTS } from '../../../domain/providers/injections';

const app = injectContainer();

provide<SetElements>(SET_ELEMENTS, app.make('SetElements'));

//@ts-ignore
let character = reactive<Character>(CharacterFactory.forCreation()) as Character & CharacterType;
</script>
