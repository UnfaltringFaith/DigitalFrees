<script setup>
defineProps({
    image: {
        type: String,
        required: false,
        default: 'https://picsum.photos/200'
    },
    title: {
        type: String,
        required: true
    },
    description: {
        type: String,
        required: true
    }
});
</script>

<template>
    <div class="mt-3 p-3 rounded-lg space-y-3 cursor-pointer hover:shadow-lg hover:bg-gray-50">
        <div class="flex gap-2">
            <img :src="image" alt="Z" class="w-[69px] h-[69px] rounded-full" />
            <div>
                <h3 class="font-bold text-2xl">{{ title }}</h3>
                <div class="text-xs text-gray-500">
                    {{ description }}
                </div>
            </div>
        </div>
    </div>
</template>
