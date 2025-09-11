<script setup>
import { ref } from 'vue'
import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue'
import { Link, useForm, usePage, Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TabItem from '@/Pages/Profile/Partials/TabItem.vue';
import Edit from './Edit.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const authUser = usePage().props.auth.user;

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
    user: {
        type: Object,
    }
});

</script>

<template>
    <AuthenticatedLayout>
        <div class="max-w-5xl mx-auto px-4 border h-screen overflow-auto bg-slate-100 rounded-lg">
            <div class="relative">
                <img src="https://timelinecovers.pro/facebook-cover/download/ultra-hd-space-facebook-cover.jpg" alt=""
                    class="w-full h-[200px] object-cover rounded-lg mt-4" />
                <div>
                    <div class="flex">
                        <img src="https://avatar.iran.liara.run/public/21" alt=""
                            class="w-[128px] h-[128px] rounded-full border-4 border-white ml-[30px] -mt-[65px]" />
                        <div class="flex items-center justify-between w-full">
                            <div class="text-2xl font-semibold">
                                {{ user.name }}
                            </div>

                            <PrimaryButton>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                                </svg>
                                Edit Profile
                            </PrimaryButton>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-2 sm:px-0">
                <TabGroup>
                    <div class="flex items-center justify-between border-b">
                        <div>
                            <TabList class="font-semibold flex">
                                <Tab as="template" :key="posts" v-slot="{ selected }">
                                    <TabItem :selected="selected" text="About" />
                                </Tab>
                                <Tab as="template" :key="posts" v-slot="{ selected }">
                                    <TabItem :selected="selected" text="Posts" />
                                </Tab>
                                <Tab as="template" :key="posts" v-slot="{ selected }">
                                    <TabItem :selected="selected" text="Followers" />
                                </Tab>
                                <Tab as="template" :key="posts" v-slot="{ selected }">
                                    <TabItem :selected="selected" text="Followinf" />
                                </Tab>
                                <Tab as="template" :key="posts" v-slot="{ selected }">
                                    <TabItem :selected="selected" text="Media" />
                                </Tab>
                            </TabList>
                        </div>
                        <div class="">
                        </div>
                    </div>

                    <TabPanels class="mt-2">
                        <TabPanel :key="posts" class="">
                            <Edit v-if="authUser && authUser.id == user.id" :must-verify-email="true"
                                :status="status" />
                        </TabPanel>
                    </TabPanels>
                    <TabPanels class="mt-2 ">
                        <TabPanel :key="posts" class="bg-slate-200 p-3">
                            Z
                        </TabPanel>
                    </TabPanels>
                    <TabPanels class="mt-2 ">
                        <TabPanel :key="posts" class="bg-slate-200 p-3">
                            Z
                        </TabPanel>
                    </TabPanels>
                    <TabPanels class="mt-2 ">
                        <TabPanel :key="posts" class="bg-slate-200 p-3">
                            Z
                        </TabPanel>
                    </TabPanels>
                </TabGroup>
            </div>
        </div>
    </AuthenticatedLayout>

</template>
