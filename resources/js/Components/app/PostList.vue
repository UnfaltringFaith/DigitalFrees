<script setup>
import TextInput from '@/Components/TextInput.vue';
import { ref } from 'vue';
import FriendItem from './FollowingItem.vue';
import PostItem from './PostItem.vue';

const post = {
    user: {
        id: 1,
        name: 'John Doe',
        avatar: 'https://picsum.photos/200'
    },
    group: null,
    attachments: [
        {
            id: 1,
            name: 'test.png',
            mime: 'image/png',
            url: 'https://picsum.photos/200'
        },
        {
            id: 2,
            name: 'test2.png',
            mime: 'image/png',
            url: 'https://picsum.photos/203'
        },
        {
            id: 3,
            name: 'text.png',
            mime: 'text/plain',
            url: '#'
        }
    ],
    body: `
    <p>This is the body content for Post 1 asda sdasd as d a sd as d asd a sd a sd asd a sd asd a d a sd as da sd as da sd as da sd  as da s d sd f sd fs dfsdfsd f sdfsdfsdf sdfsdf sdfsdfs fsdfsd fsdf sdfsdfs df s dfs fsfsdfsdfsdf.</p>

    <p>This is the body content for Post 1 asda sdasd as d a sd as d asd a sd a sd asd a sd asd a d a sd as da sd as da sd as da sd  as da s d sd f sd fs dfsdfsd f sdfsdfsdf sdfsdf sdfsdfs fsdfsd fsdf sdfsdfs df s dfs fsfsdfsdfsdf.</p>
    `,
    created_at: '2024-10-01 12:00:00',
}

const post1 = {
    user: {
        id: 1,
        name: 'John Doe',
        avatar: 'https://picsum.photos/201'
    },
    group: {
        id: 1,
        name: 'Group 1',
        avatar: 'https://picsum.photos/200'
    },
    body: `
    <p>This is the body content for Post 1 asda sdasd as d a sd as d asd a sd a sd asd a sd asd a d a sd as da sd as da sd as da sd  as da s d sd f sd fs dfsdfsd f sdfsdfsdf sdfsdf sdfsdfs fsdfsd fsdf sdfsdfs df s dfs fsfsdfsdfsdf.</p>

    <p>This is the body content for Post 1 asda sdasd as d a sd as d asd a sd a sd asd a sd asd a d a sd as da sd as da sd as da sd  as da s d sd f sd fs dfsdfsd f sdfsdfsdf sdfsdf sdfsdfs fsdfsd fsdf sdfsdfs df s dfs fsfsdfsdfsdf.</p>
    `,
    created_at: '2024-10-01 12:00:00',
}

defineProps({
});
</script>

<template>
    <div class="col-span-3 py-6 px-3 bg-white border rounded-lg max-h-[80vh] overflow-auto w-full">
        <div>
            <div v-if="false" class="text-gray-500 flex text-center justify-center">
                Your posts list is empty.
            </div>
            <div v-else>
                <PostItem :post="post" />
                <PostItem :post="post1" />
            </div>
        </div>
    </div>
</template>
