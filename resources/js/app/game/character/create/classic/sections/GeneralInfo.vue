<template>
    <section>
        <div class="flex mb-5 text-2xl font-bold text-black">
            <div class="w-1/3">
                <IftaLabel>
                    <label for="name" class="font-semibold text-black">Nombre</label>
                    <InputText id="name" name="name" v-model="name" />
                </IftaLabel>
            </div>
            <div class="w-1/3">
                <IftaLabel>
                    <label for="gender" class="font-semibold text-black">Sexo</label>
                    <SelectButton v-model="gender" :options="['hombre', 'mujer']"></SelectButton>
                </IftaLabel>
            </div>
            <div class="w-1/3">
                <IftaLabel>
                    <InputNumber id="age" name="age" v-model="age" variant="filled" />
                    <label for="age" class="font-semibold text-black">Edad</label>
                </IftaLabel>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import ComponentConfig from "../services/ComponentConfig";
import IftaLabel from "primevue/iftalabel";
import InputText from 'primevue/inputtext';
import InputNumber from 'primevue/inputnumber';
import SelectButton from 'primevue/selectbutton';

const config = ComponentConfig.instance();
const name = ref('');
const gender = ref<string | null>(null);
const age = ref<number | null>(null);
</script>
