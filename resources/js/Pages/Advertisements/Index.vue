<template>
<app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            advertisements
        </h2>
    </template>

    <div class="py-12">
        <div class="mx-8">
            <table class="table-auto">
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Nom produit</th>
                    <th class="px-4 py-2">Image</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Créer le : </th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
                <tr v-for="(advertisement, index) in advertisements" v-bind:key="index">
                    <td class="border px-4 py-2">{{ advertisement.id }}</td>
                    <td class="border px-4 py-2">{{ advertisement.name }}</td>
                    <td class="border px-4 py-2"><img style="heigth:200px; width:200px" v-bind:src="'uploads/'+advertisement.image" alt="image"></td>
                    <td class="border px-4 py-2">{{ advertisement.description }}</td>
                    <td class="border px-4 py-2">{{ advertisement.created_at }}</td>
                    <td class="border px-4 py-2">
                        <inertia-link v-bind:href="route('advertisements.show', advertisement)" class="text-lg bg-green-500 text-white px-2 py-1 mt-3 inline-block rounded hover:bg-green-700">Afficher</inertia-link>

                        <inertia-link v-if="advertisement.is_available == 1" v-bind:href="route('advertisements.deactivate', advertisement.id)" class="text-lg bg-yellow-500 text-white px-2 py-1 mt-3 inline-block rounded hover:bg-yellow-700">Archiver</inertia-link>
                        <inertia-link v-if="advertisement.is_available == 0" v-bind:href="route('advertisements.activate', advertisement.id)" class="text-lg bg-blue-500 text-white px-2 py-1 mt-3 inline-block rounded hover:bg-blue-700">Desarchiver</inertia-link>

                        <inertia-link v-bind:href="route('advertisements.destroy', advertisement)" class="text-lg bg-red-500 text-white px-2 py-1 mt-3 inline-block rounded hover:bg-red-700">Supprimer</inertia-link>
                    </td>
                </tr>
            </table>
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
