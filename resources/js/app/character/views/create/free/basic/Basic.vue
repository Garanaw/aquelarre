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
import { computed } from 'vue';
import { strictInject } from '../../../../../../framework/support/helpers';
import { SET_ELEMENTS } from '../../../../domain/providers/injections';
import Character from '../../../../infrastructure/models/Character';
import Name from '../../../../../shared/components/form/Name.vue';
import Sex from '../../../../../shared/components/form/Sex.vue';
import Title from '../../../../../shared/components/typography/Title.vue';
import { Character as CharacterType } from '../../../../domain/types/Character';

const props = defineProps<{ character: Character & CharacterType }>();

const SetElementsService = strictInject(SET_ELEMENTS);

const { character } = props;

const isSexSet = computed<boolean>(() => SetElementsService.isComplete('sex'));

function updateName(name) {
    character.name = name;
}

function setSex(sex) {
    character.sex = sex;
    SetElementsService.complete('sex');
}
</script>
