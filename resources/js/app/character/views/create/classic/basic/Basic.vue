<template>
    <div>
        <Name
            v-model="character.name"
            @update:name="updateName"
        />
    </div>
</template>

<script setup lang="ts">
import Character from '../../../../infrastructure/models/Character';
import Name from '../../../../../shared/components/form/Name.vue';
import { Character as CharacterType } from '../../../../domain/types/Character';

const props = defineProps<{ character: Character & CharacterType }>();
const { character } = props;

function updateName(name) {
    character.name = name;
}
</script>
