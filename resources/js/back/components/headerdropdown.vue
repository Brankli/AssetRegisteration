<script setup>
import Auth from "../../login/auth"
import { useRouter } from 'vue-router';

const router = useRouter();
const emit = defineEmits(['closeEvent','closeProfile']);
const handleevent = () => {
  emit('closeEvent');
}


const toggleProfile = () => {
  emit('closeProfile');
}

function logout() {
  Auth.logout();
  router.push({name:'login'});
}
</script>
<template>
  <div @click.prevent="handleevent"
    class="absolute  right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
    role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
    <div class="py-1" role="none">
      <router-link to="/adminpaswordreset"
        class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 w-full text-left" role="menuitem" tabindex="-1"
        id="menu-item-2" >change password</router-link>
      <button @click.prevent=" toggleProfile"
        class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 w-full text-left" role="menuitem" tabindex="-1"
        id="menu-item-3">profile</button>
        <button @click.prevent="logout()"
          class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 w-full text-left" role="menuitem" tabindex="-1"
          id="menu-item-4">Logout</button>

    </div>
  </div>
</template>