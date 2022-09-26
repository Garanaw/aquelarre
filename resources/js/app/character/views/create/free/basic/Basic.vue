<template>
    <div class="w-full">
        <div class="w-full flex justify-center py-5">
            <Title>Básico</Title>
        </div>
        <div class="grid grid-cols-4">
            <div>
                <Name v-model="character.name" @update:name="updateName" />
            </div>
            <div>
                <Sex
                    v-model="character.sex"
                    @set:sex="setSex"
                    :disabled="isSexSet"
                />
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { computed, inject } from 'vue';
import Character from '../../../../infrastructure/models/Character';
import Name from '../../../../../shared/components/form/Name.vue';
import Sex from '../../../../../shared/components/form/Sex.vue';
import Title from '../../../../../shared/components/typography/Title.vue';
import { Character as CharacterType } from '../../../../domain/types/Character';
import SetElements from '../../shared/domain/services/SetElements';
import Application from '../../../../../../framework/Application';

const props = defineProps<{ character: Character & CharacterType }>();
const { character } = props;
const app = inject<Application>('$container');

// @ts-ignore
const SetElementsService = app.make('SetElements');

const isSexSet = computed<boolean>(() => SetElementsService.isComplete('sex'));

function updateName(name) {
    character.name = name;
}

function setSex(sex) {
    character.sex = sex;
    SetElementsService.complete('sex');
}
</script>
