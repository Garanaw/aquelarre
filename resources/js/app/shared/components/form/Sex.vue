<template>
    <fieldset class="flex justify-evenly items-center">
        <label>Sexo</label>
        <span>
            <input id="man" type="radio" name="sex" v-model="sex" :value="Sex.MAN">
            <label for="man">Hombre</label>
        </span>
        <span>
            <input id="woman" type="radio" name="sex" v-model="sex" :value="Sex.WOMAN">
            <label for="woman">Mujer</label>
        </span>
    </fieldset>
</template>

<script setup lang="ts">
import { ref, watch } from 'vue';
import Sex from '../../enum/alive/Sex';

const emit = defineEmits({
    'update:sex': value => [Sex.MAN, Sex.WOMAN].includes(value),
});
let sex = ref<string | null>(null);

watch(sex, (newSex) => emit('update:sex', newSex));
</script>
