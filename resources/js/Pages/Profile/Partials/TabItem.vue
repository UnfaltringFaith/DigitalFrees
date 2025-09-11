<script setup>
defineProps({
    selected: Boolean,
    text: String,
});
</script>

<template>
    <button :class="[
        'py-2.5 px-4 outline-none font-medium text-sm hover:border-blue-300 hover:border-b-2 hover:text-blue-400',
        selected
            ? 'bg-white text-blue-600 border-b-2 border-blue-600'
            : 'text-black',
    ]">
        {{ text }}
    </button>
</template>
