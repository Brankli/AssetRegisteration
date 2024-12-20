<script setup>
import { ref } from 'vue';
import headerdropdown from './headerdropdown.vue';
import adminprofile from '../pages/profiles/profiles.vue';

const profileClass = ref('hidden');
const dropdownClass = ref('hidden');
const emit = defineEmits(['closeEvent']);
const handleevent = () => {
  emit('closeEvent');
}

const props = defineProps({
  user: '',
});
const toggledropdown = () => {
  dropdownClass.value = dropdownClass.value === 'hidden' ? 'unhidden' : 'hidden';
}

const toggleProfile = () => {
  profileClass.value = profileClass.value == 'hidden' ? '' : 'hidden';

}
</script>

<template>
  <div class="w-full border-gray-200 border-2 shadow-lg shadow-gray-200">
    <div class="cursor-pointer flex flex-row sm:justify-between">
      <div class="w-full  sm:justify-end h-fit">
        <i @click.prevent="handleevent" class="material-icons xl:hidden  text-white-500 m-2 w-20 align-middle">menu</i>
      </div>
      <div class="flex min-w-fit flex-row align-bottom gap-4 p-2">
        <img v-if="props.user.profile" :src="props.user.profile"
          class="h-10 w-10  object-cover borde-2 border-sky-800 rounded-full " alt="admin profile">
        <div class="border-l-2 border-r-2 pl-1 pr-1 text-center border-gray-200 ">
          <h1 class="text-left text-darkblue font-bold text-md tracking-wider capitalize ">{{ props.user.name }}</h1>
          <p>{{ props.user.phone }}</p>
        </div>
        <div class="mr-4">
          <button @click.prevent="toggledropdown" type="button"
            class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
            id="menu-button" aria-expanded="true" aria-haspopup="true">
            Options
            <i class="material-icons   text-white-500 ">expand_more</i>
          </button>
        </div>
      </div>
    </div>
  </div>
  <headerdropdown @close-event="toggledropdown" :class="dropdownClass" @close-profile="toggleProfile" />
  <adminprofile @close-profile="toggleProfile" :class="profileClass" class="z-10" />
</template>
