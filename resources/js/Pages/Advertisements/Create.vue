<template>
<app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1 class="text-center text-lg m-5">Créer une annonce</h1>
                <form @submit.prevent="submit">
                    <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
                        <text-input v-model="form.name" class="pr-6 pb-8 w-full lg:w-1/2" label="Nom produit" />
                        <file-input v-model="form.image" class="pr-6 pb-8 w-full lg:w-1/2" label="image" />
                        <text-input v-model="form.description" class="pr-6 pb-8 w-full lg:w-1/2" label="Description" />
                        <select-input v-model="form.category" class="pr-6 pb-8 w-full lg:w-1/2" label="Categorie">
                            <option :value="null" />
                            <option value="pantalon">patalon</option>
                            <option value="chemise">chemise</option>
                            <option value="telephone">telephone</option>
                            <option value="ordinateur">ordinateur</option>
                        </select-input>
                    </div>
                    <div class="px-8 py-4 bg-gray-100 border-t border-gray-200 flex justify-end items-center">
                        <loading-button :loading="sending" class="btn-indigo-500" type="submit">Créer</loading-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</app-layout>
</template>

<script>
import AppLayout from '../../Layouts/AppLayout'
import LoadingButton from '../../Shared/LoadingButton'
import SelectInput from '../../Shared/SelectInput'
import TextInput from '../../Shared/TextInput'
import FileInput from '../../Shared/FileInput'
import FileInputVue from '../../Shared/FileInput.vue'

export default {
    metaInfo: {
        title: 'Create advertisement'
    },
    components: {
        AppLayout,
        LoadingButton,
        SelectInput,
        TextInput,
        FileInput
    },
    remember: 'form',
    data() {
        return {
            sending: false,
            form: {
                name: null,
                image: null,
                description: null
            },
        }
    },
    methods: {
        submit() {
            this.sending = true
            var data = new FormData()
            data.append('name', this.form.name || '')
            data.append('description', this.form.description || '')
            data.append('image', this.form.image || '')

            this.$inertia.post(this.route('advertisements.store'), data)
                .then(() => this.sending = false)
        },
    },
}
</script>
