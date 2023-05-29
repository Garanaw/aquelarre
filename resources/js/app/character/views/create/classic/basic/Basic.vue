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
import { computed, PropType } from 'vue';
import { is, strictInject } from '../../../../../../framework/support/helpers';
import { SET_ELEMENTS } from '../../../../domain/providers/injections';
import Character from '../../../../infrastructure/models/Character';
import Name from '../../../../../shared/components/form/Name.vue';
import Sex from '../../../../../shared/components/form/Sex.vue';
import Title from '../../../../../shared/components/typography/Title.vue';
import SetElements from '../../shared/domain/services/SetElements';
import useName from '../../../../../shared/functions/HasName';

const props = defineProps({
    character: {
        type: Object as PropType<Character>,
        required: true,
        validator(value: unknown): boolean {
            return is<Character>(value, Character);
        }
    },
});

const SetElementsService = strictInject(SET_ELEMENTS, new SetElements()) as SetElements;

const { character } = props;

const isSexSet = computed<boolean>(() => SetElementsService.isComplete('sex'));

function updateName(name) {
    useName(name, character);
}

function setSex(sex) {
    if (is<Character>(character, Character)) {
        return;
    }
    character.sex = sex;
    SetElementsService.complete('sex');
}
</script>
