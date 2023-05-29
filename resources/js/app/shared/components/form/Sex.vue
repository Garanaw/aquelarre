<template>
    <RadioGroup class="flex justify-evenly items-center" v-model="sex">
        <RadioGroupLabel>Sexo</RadioGroupLabel>
        <RadioGroupOption
            v-slot="{ checked }"
            :value="Sex.MAN"
            class="border-2 border-gray-500 rounded-lg cursor-pointer p-4 ui-checked:bg-white/75 ui-checked:border-black"
            :disabled="props.disabled"
        >
            <FontAwesomeIcon :icon="['fas', 'mars']" />Hombre
        </RadioGroupOption>
        <RadioGroupOption
            v-slot="{ checked }"
            :value="Sex.WOMAN"
            class="border-2 border-gray-500 rounded-lg cursor-pointer p-4 ui-checked:bg-white/75 ui-checked:border-black"
            :disabled="props.disabled"
        >
            <FontAwesomeIcon :icon="['fas', 'venus']" />Mujer
        </RadioGroupOption>

        <Check @checked="setSex" :disabled="props.disabled" />
    </RadioGroup>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import Sex from '../../enum/alive/Sex';
import Check from '../button/Check.vue';
import {
    RadioGroup,
    RadioGroupLabel,
    RadioGroupOption,
} from '@headlessui/vue';

const emit = defineEmits({
    'set:sex': value => [Sex.MAN, Sex.WOMAN].includes(value.value),
});
const props = defineProps<{ disabled: boolean }>();

let sex = ref<Sex | null>(null);

function setSex() {
    emit('set:sex', sex);
}
</script>
