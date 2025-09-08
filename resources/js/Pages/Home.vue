<script setup>
import CreatePost from '@/Components/app/CreatePost.vue';
import FollowingList from '@/Components/app/FollowingList.vue';
import GroupList from '@/Components/app/GroupList.vue';
import PostList from '@/Components/app/PostList.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({

});
</script>

<template>

    <Head title="Welcome" />
    <div class="grid lg:grid-cols-12 bg-slate-100 gap-3 items-start h-screen">
        <div class="lg:col-span-3 m-2 py-6 px-3 bg-white border rounded-lg lg:order-1 h-[90vh] overflow-auto">
            <GroupList />
        </div>
        <div class="lg:col-span-3 m-2 bg-white border rounded-lg py-6 px-3 lg:order-3 h-full overflow-auto">
            <FollowingList />
        </div>
        <div class="lg:col-span-6 lg:order-2 h-full overflow-auto">
            <h2 class="text-2xl font-bold text-center">Posts</h2>
            <CreatePost />
            <PostList />
        </div>
    </div>
</template>
