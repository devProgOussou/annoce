<template>
<app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Administration
        </h2>
    </template>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div v-for="(user, index) in users" v-bind:key="index">
                    <p>{{ user.name }}</p>
                    <p>{{ user.advertisements.description }}</p>
                </div>
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
    props: ["users"]
}
</script>
