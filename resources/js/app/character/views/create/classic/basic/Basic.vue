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

const props = defineProps<{ character: Character }>();
const { character } = props;

function updateName(name) {
    //@ts-ignore
    character.name = name;
}
</script>
