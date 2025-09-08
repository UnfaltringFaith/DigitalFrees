<script setup>
import TextInput from '@/Components/TextInput.vue';
import { ref } from 'vue';
import FriendItem from './FollowingItem.vue';

const groupSearch = ref('');

defineProps({
});
</script>

<template>
    <div class="col-span-3 py-6 px-3">
        <h2 class="text-2xl font-bold mb-4 text-center">My Following</h2>
        <TextInput v-model="groupSearch" placeholder="Search groups..." class="w-full mb-4" />
        <div class="max-h-[70vh] overflow-auto">
            <div v-if="false" class="text-gray-500 flex text-center justify-center">
                Your group list is empty.
            </div>
            <div v-else>
                <FriendItem title="Denis Penisov" description="This is the description for Denis Penisov." />
                <FriendItem title="Patriot Zetovich" description="This is the description for Patriot Zetovich." />
            </div>
        </div>
    </div>
</template>
