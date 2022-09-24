<template>
    <RadioGroup class="flex justify-evenly items-center" v-model="sex">
        <RadioGroupLabel>Sexo</RadioGroupLabel>
        <RadioGroupOption
            v-slot="{ checked }"
            :value="Sex.MAN"
            class="border-2 border-gray-500 rounded-lg cursor-pointer p-4 ui-checked:bg-white/75 ui-checked:border-black"
        >
            <FontAwesomeIcon :icon="['fas', 'mars']" />Hombre
        </RadioGroupOption>
        <RadioGroupOption
            v-slot="{ checked }"
            :value="Sex.WOMAN"
            class="border-2 border-gray-500 rounded-lg cursor-pointer p-4 ui-checked:bg-white/75 ui-checked:border-black"
        >
            <FontAwesomeIcon :icon="['fas', 'venus']" />Mujer
        </RadioGroupOption>

        <Check @checked="setSex" />
    </RadioGroup>
</template>

<script setup lang="ts">
import { ref, watch } from 'vue';
import Sex from '../../enum/alive/Sex';
import Check from '../button/Check.vue';
import {
    RadioGroup,
    RadioGroupLabel,
    RadioGroupOption,
} from '@headlessui/vue';

const emit = defineEmits({
    'update:sex': value => [Sex.MAN, Sex.WOMAN].includes(value),
    'set:sex': value => [Sex.MAN, Sex.WOMAN].includes(value),
});
let sex = ref<string | null>(null);

watch(sex, (newSex) => emit('update:sex', newSex));

function setSex() {
    emit('set:sex', sex);
}
</script>
