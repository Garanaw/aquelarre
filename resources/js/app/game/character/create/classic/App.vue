<template>
    <Accordion :value="['0']" multiple>
        <AccordionPanel value="0">
            <AccordionHeader class="bg-gray-200">
                <span class="text-lg font-bold text-black">Información General</span>
            </AccordionHeader>
            <AccordionContent>
                <GeneralInfo class="m-0" />
            </AccordionContent>
        </AccordionPanel>
        <AccordionPanel value="1">
            <AccordionHeader class="bg-gray-200">
                <span class="text-lg font-bold text-black">Información Básica</span>
            </AccordionHeader>
            <AccordionContent>
                <Basic />
            </AccordionContent>
        </AccordionPanel>
    </Accordion>
</template>

<script setup lang="ts">
import { Accordion, AccordionContent, AccordionHeader, AccordionPanel } from 'primevue';
import GeneralInfo from "./sections/GeneralInfo.vue";
import ComponentConfig from "./services/ComponentConfig";
import Basic from "@/app/game/character/create/classic/sections/Basic/Basic.vue";

const config = ComponentConfig.instance();
</script>
