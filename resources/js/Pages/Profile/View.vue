<script setup>
import { computed, ref, watch, onMounted } from 'vue'
import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue'
import { Link, useForm, usePage, Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import TabItem from '@/Pages/Profile/Partials/TabItem.vue';
import Edit from './Edit.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { XMarkIcon } from '@heroicons/vue/24/solid';
import { CheckBadgeIcon } from '@heroicons/vue/20/solid';

const authUser = usePage().props.auth.user;
const showNotification = ref(true);

const layoutForm = useForm({
    cover_image: null,
    avatar_image: null,
});

const coverImageUrl = ref('');

const isOwnUser = computed(() => {
    return authUser && authUser.id == props.user.id;
});

const props = defineProps({
    errors: {
        type: Object,
    },
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


function onLayoutChange(event) {
    console.log('event -', event.target.files[0]);
    layoutForm.cover_image = event.target.files[0];
    if (layoutForm.cover_image) {
        const reader = new FileReader();
        reader.onload = () => {
            coverImageUrl.value = reader.result;
        }
        reader.readAsDataURL(layoutForm.cover_image);
    }

    console.log(layoutForm.cover_image);
}

function cancelCoverImage() {
    console.log('asdasdda');

    layoutForm.cover_image = null;
    coverImageUrl.value = '';
}

function saveCoverImage() {

    if (!layoutForm.cover_image) {
        return;
    }

    layoutForm.post(route('profile.updateLayout'), {
        preserveScroll: true,
        onSuccess: (user) => {
            console.log('stataus - ', props.status);
            cancelCoverImage();
            setTimeout(() => {
                showNotification.value = false;
            }, 3000);
        },
    });
}

watch(props.status, (newStatus, oldStatus) => {
    console.log('newStatus - ', newStatus);
    console.log('oldStatus - ', oldStatus);

    if (newStatus === 'layout-updated-successfully') {
        showNotification.value = true;
        setTimeout(() => {
            showNotification.value = false;
        }, 4000);
    }
});

</script>

<template>
    <AuthenticatedLayout>
        <div class="max-w-5xl mx-auto px-4 border h-screen overflow-auto bg-slate-100 rounded-lg">
            <div v-show="showNotification && status === 'layout-updated-successfully'"
                class="mt-2 px-3 text-xl font-medium bg-emerald-500 text-white p-2 rounded-md">
                Layout updated successfully!</div>

            <div v-show="errors.cover_image" class="mt-2 px-3 text-xl font-medium bg-red-500 text-white p-2 rounded-md">
                {{ errors.cover_image }}</div>
            <div class="relative">
                <div class="group">

                    <img :src="coverImageUrl || user.cover_url || '/image/cover/placeholder.jpg'" alt=""
                        class=" w-full h-[200px] object-cover rounded-lg mt-4" />

                    <div class="absolute top-1 right-1">
                        <button
                            class=" bg-gray-100 border px-3 py-1 rounded-md text-sm hover:bg-gray-200 flex gap-1 items-center opacity-0 group-hover:opacity-100 transition"
                            v-if="!layoutForm.cover_image">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>

                            Change Layout

                            <input type="file" class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer"
                                @change="onLayoutChange" />
                        </button>

                        <div v-else class="flex gap-2">
                            <button
                                class=" bg-gray-100 border px-3 py-1 rounded-md text-sm hover:bg-gray-200 flex gap-1 items-center opacity-0 group-hover:opacity-100 transition"
                                @click="saveCoverImage">
                                <CheckBadgeIcon class="size-6" />

                                Save
                            </button>

                            <button
                                class=" bg-zinc-800 px-3 py-1 rounded-md text-sm hover:bg-zinc-950 text-white flex gap-1 items-center opacity-0 group-hover:opacity-100 transition"
                                @click="cancelCoverImage">
                                <XMarkIcon class="size-6" />
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="flex">
                        <img src="/image/avatar/placeholder.png" alt=""
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
                    </div>

                    <TabPanels class="mt-2">
                        <TabPanel :key="posts" class="">
                            <Edit v-if="isOwnUser" :must-verify-email="true" :status="status" />
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
