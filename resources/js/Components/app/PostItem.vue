<script setup>

import { Disclosure, DisclosureButton, DisclosurePanel } from '@headlessui/vue'
import { ChevronUpIcon } from '@heroicons/vue/20/solid'

defineProps({
    post: Object
});

function is_image(attachment) {
    const imageTypes = attachment.mime.split('/');
    return imageTypes[0].toLowerCase() === 'image';
}

</script>

<template>
    <div class="mb-4 bg-white p-4 rounded-lg shadow">
        <div class="flex items-center gap-3">
            <a href="">
                <img class="h-[40px] w-[40px] rounded-full hover:ring-2 transition-all" :src="post.user.avatar"
                    alt="Post Image" />
            </a>
            <div class="flex justify-between w-full">
                <a href="">
                    <h2 class="text-lg font-semibold text-gray-800 flex flex-col">
                        {{ post.user.name }}
                        <template v-if="post.group">
                            <div class="text-sm text-gray-500">
                                {{ post.group.name }}
                            </div>
                        </template>
                    </h2>
                </a>
                <small class="text-gray-500 text-sm ">
                    {{ post.created_at }}
                </small>
            </div>
        </div>
        <Disclosure v-slot="{ open }">
            <div v-if="!open" v-html="post.body.substring(0, 200)" class="mt-2 text-gray-700" />
            <DisclosurePanel v-else class="text-m text-gray-500">
                <div v-html="post.body" class="mt-2 text-gray-700" />
            </DisclosurePanel>
            <div class="flex">
                <DisclosureButton class="text-blue-500 flex items-center gap-1">
                    {{ open ? 'Show less' : 'Show more' }}
                </DisclosureButton>
            </div>
        </Disclosure>

        <div class="grid grid-cols-2 gap-1 mt-4 mb-3">
            <div v-for="attachment in post.attachments" :key="attachment.id" class="mt-2 w-[300px] h-[300px]">
                <img v-if="is_image(attachment)" :src="attachment.url" alt="Attachment Image"
                    class="w-full h-full object-cover rounded-lg" />
                <div v-else
                    class="items-center justify-center border-2 border-dashed border-gray-300 rounded-lg p-4 text-gray-600 flex flex-col gap-2 h-full relative">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="size-6 absolute right-1 top-1 m-2 w-6 h-6 text-gray-400 cursor-pointer hover:text-gray-600 transition-all">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-[120px]">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>


                    {{ attachment.name }}
                </div>
            </div>
        </div>

        <div class="flex justify-between gap-6 border-t border-b border-gray-200 py-2 mt-2">
            <div class="flex items-center gap-4">
                <button class="flex items-center gap-1 hover:text-blue-500 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.633 10.25c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75a.75.75 0 0 1 .75-.75 2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282m0 0h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23H5.904m10.598-9.75H14.25M5.904 18.5c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 0 1-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 9.953 4.167 9.5 5 9.5h1.053c.472 0 .745.556.5.96a8.958 8.958 0 0 0-1.302 4.665c0 1.194.232 2.333.654 3.375Z" />
                    </svg>
                    Like
                </button>
            </div>
            <div class="flex items-center gap-4">
                <button class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.068.157 2.148.279 3.238.364.466.037.893.281 1.153.671L12 21l2.652-3.978c.26-.39.687-.634 1.153-.67 1.09-.086 2.17-.208 3.238-.365 1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                    </svg>


                    Comment
                </button>
            </div>
        </div>
    </div>
</template>
