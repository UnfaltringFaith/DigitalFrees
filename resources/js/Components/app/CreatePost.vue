<script setup>
import TextInput from '@/Components/TextInput.vue';
import { ref } from 'vue';
import FriendItem from './FollowingItem.vue';

const postCreating = ref(false);

defineProps({
});
</script>

<template>
    <div class="py-6 px-3 bg-white border rounded-lg mb-4">
        <div @click="postCreating = true" class="border border-gray-300 rounded-lg p-4 text-left py-4 ">
            Click here to create post.
        </div>
        <div v-if="postCreating" class="relative mt-4 space-x-2 justify-end flex">
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:bg-indigo-500 dark:shadow-none dark:focus-visible:outline-indigo-500 relative">Attach
                files
                <input type="file" class="absolute left-0 right-0 top-0 bottom-0 opacity-0 cursor-pointer bg-white" />
            </button>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 dark:bg-indigo-500 dark:shadow-none dark:focus-visible:outline-indigo-500">Subasdasdmit</button>
        </div>
    </div>
</template>
