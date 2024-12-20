<script setup>
import {ref} from "vue"
const emit = defineEmits(['closeEvent']);
const handleevent = () => {
    emit('closeEvent');
}

const profile = ref('ProfileImage/logo.png');
const props = defineProps({
    user: '',
});
</script>

<template>
    <div class=" fixed md:relative bg-darkblue block min-h-screen  w-fit  ">



        <div>
            <i @click.prevent="handleevent"
                class="material-icons text-white block md:hidden  text-white-500 m-2 w-20 align-middle">menu</i>
        </div>
        <div
            class=" bg-purple-950 text-cyan-100 w-72 space-y-6 px-4 py-4 relative inset-y-0 left-0 md:relative md:-translate-x-0 transform-translate-x-fulltransition text-center duration-200 ease-out">


            <div class="flex flex-col items-center gap-4">
        <!-- User profile and name -->
        <img :src="profile" alt="/public/ProfileImage/logo.png" class="w-15 h-15 rounded-full flex-shrink-0 "> <!-- Added animate-bounce for up and down movement -->
        <h1 class="font-bold text-lg uppercase tracking-wider text-yellow-400">WOLLO UNIVERSITY</h1>
    </div>






           <hr><br>



            <div class="flex flex-row justify-between">
                <div class="flex flex-row gap-4 align-middle">
                    <img v-if="props.user.profile" class="w-10 h-10 rounded-full" :src="props.user.profile" alt="" />
                    <h1 class="font-bold my-auto text-lg align-middle uppercase tracking-wider">{{ props.user.name }}
                    </h1>
                </div>
                <button ><i
                        class="material-icons text-2xl my-auto text-white">settings</i></button>
            </div>
            <hr />
            <nav>
                <router-link to="/"
                    class="  flex items-center  space-x-2 py-3 px-4 group transition duration-200 hover:bg-cyan-700 rounded hover:text-cyan-300">
                    <i class="material-icons text-white">home</i>
                    <span class="text-xl font-semibold text-white px-2">Dashboard</span>
                </router-link>
                <router-link to="/cityscale"
                    class="  flex items-center  space-x-2 py-3 px-4 group transition duration-200 hover:bg-cyan-700 rounded hover:text-cyan-300">
                    <i class="material-icons text-white">home</i>
                    <span class="text-xl font-semibold text-white px-2">City Scale</span>
                </router-link>
                <!-- somson commit -->
                <router-link to="/capitalcity"
                    class=" flex items-center  space-x-2 py-3 px-4 group transition duration-200 hover:bg-cyan-700 rounded hover:text-cyan-300">
                    <i class="material-icons text-white">newspaper</i>
                    <span class="text-xl font-semibold text-white px-2">City</span>
                </router-link>
                <router-link to="/usermanagement"
                    class=" flex items-center  space-x-2 py-3 px-4 group transition duration-200 hover:bg-cyan-700 rounded hover:text-cyan-300">
                    <i class="material-icons text-white">newspaper</i>
                    <span class="text-xl font-semibold text-white px-2">Account</span>
                </router-link>
                <!-- somson commit -->
            </nav>
        </div>
    </div>
</template>
