<script setup>
const props = defineProps({
    title:'',
    withdrawal:'',
    currency :''
})


</script>

<template>
    <div
        class=" shadow bg-white flex flex-row justify-between font-roboto shadow-blue-200 font-bold border-gray-200 m-4 text-left align-middle border-2 rounded-md">
        <div>
            <h1 class=" text-xl text-sky-800  font-bold p-4 pb-2">{{ props.title }}</h1>
            <h1 class="text-sm text-blue-800 pl-4 pb-4">{{ props.withdrawal }}<span class="text-green-400 pl-2">{{ props.currency }}</span> </h1>
        </div>
        <i class="material-icons text-sky-700 text-2xl bg-sky-200 p-2 w-fit h-fit my-auto mx-auto rounded-md">group</i>
    </div>
</template>