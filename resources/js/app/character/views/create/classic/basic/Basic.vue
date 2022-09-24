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
                <Sex v-model="character.sex" @update:sex="updateSex" @set:sex="setSex" />
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import Character from '../../../../infrastructure/models/Character';
import Name from '../../../../../shared/components/form/Name.vue';
import Sex from '../../../../../shared/components/form/Sex.vue';
import Title from '../../../../../shared/components/typography/Title.vue';
import { Character as CharacterType } from '../../../../domain/types/Character';

const props = defineProps<{ character: Character & CharacterType }>();
const { character } = props;

function updateName(name) {
    character.name = name;
}

function updateSex(sex) {
    character.sex = sex;
}

function setSex(sex) {
    updateSex(sex);
}
</script>
