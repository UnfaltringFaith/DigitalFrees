<script setup>
import GroupItem from '@/Components/app/GroupItem.vue';
import TextInput from '@/Components/TextInput.vue';
import { ref } from 'vue';

const groupSearch = ref('');

defineProps({
});
</script>

<template>
    <h2 class="text-2xl font-bold mb-4 text-center">Groups</h2>
    <TextInput v-model="groupSearch" placeholder="Search groups..." class="w-full mb-4" />
    <div class="max-h-[70vh] overflow-auto">
        <div v-if="false" class="text-gray-500 flex text-center justify-center">
            Your group list is empty.
        </div>
        <div v-else>
            <GroupItem title="Group 1" description="This is the description for Group 1." />
            <GroupItem title="Group 1" description="This is the description for Group 1." />
            <GroupItem title="Group 1" description="This is the description for Group 1." />
            <GroupItem title="Group 1" description="This is the description for Group 1." />
            <GroupItem title="Group 1" description="This is the description for Group 1." />
            <GroupItem title="Group 1" description="This is the description for Group 1." />
            <GroupItem title="Group 1" description="This is the description for Group 1." />
            <GroupItem title="Group 1" description="This is the description for Group 1." />
            <GroupItem title="Group 1" description="This is the description for Group 1." />
            <GroupItem title="Group 1" description="This is the description for Group 1." />
            <GroupItem title="Group 1" description="This is the description for Group 1." />
            <GroupItem title="Group 1" description="This is the description for Group 1." />
            <GroupItem title="Group 1" description="This is the description for Group 1." />
            <GroupItem title="Group 1" description="This is the description for Group 1." />
            <GroupItem title="Group 1" description="This is the description for Group 1." />
            <GroupItem title="Group 1" description="This is the description for Group 1." />
            <GroupItem title="Group 1" description="This is the description for Group 1." />
            <GroupItem title="Group 1" description="This is the description for Group 1." />
            <GroupItem title="Group 2" description="This is the description for Group 2." />
        </div>
    </div>
</template>
