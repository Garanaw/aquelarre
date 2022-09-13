<template>
    <div class="flex justify-evenly items-center">
        <label for="name" class="block font-medium text-gray-700 w-1/6">
            Nombre
        </label>
        <input
            type="text"
            id="name"
            :value="modelValue"
            class="w-5/6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            @input="$emit('update:modelValue', $event.target.value)"
        />
    </div>
</template>

<script setup>
defineProps(['modelValue']);
defineEmits(['update:modelValue']);
</script>
