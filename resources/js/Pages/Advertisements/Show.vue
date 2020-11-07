<template>
<app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </template>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" v-for="(advertisement, index) in advertisements" :key="index">
                <h1 class="text-center text-lg m-5">Annonce n {{ advertisement.id }}</h1>
                <h1 class="m-5">{{ advertisement.name }}</h1>
                <img class="m-5" style="heigth:200px; width:200px" v-bind:src="'uploads/'+advertisement.image" alt="image">
            </div>
        </div>
    </div>

</app-layout>
</template>

<script>
import AppLayout from '../../Layouts/AppLayout'

export default {
    components: {
        AppLayout,
    },
    props: ["advertisements"]
}
</script>
