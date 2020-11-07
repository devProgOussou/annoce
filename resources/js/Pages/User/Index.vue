<template>
<app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </template>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1 class="text-center text-lg m-5">Completez votre inscription</h1>
                <form @submit.prevent="submit">
                    <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
                        <select-input v-model="form.type" class="pr-6 pb-8 w-full lg:w-1/2" label="Type de compte">
                            <option value="P">Personnel</option>
                            <option value="C">Entreprise</option>
                        </select-input>
                        <select-input v-model="form.civility" class="pr-6 pb-8 w-full lg:w-1/2" label="Civilité">
                            <option value="M">Homme</option>
                            <option value="F">Femme</option>
                        </select-input>
                        <text-input v-model="form.address" class="pr-6 pb-8 w-full lg:w-1/2" label="Adresse" required />
                        <text-input v-model="form.company" class="pr-6 pb-8 w-full lg:w-1/2" label="Nom de l'entreprise(facultatif)" />
                        <text-input v-model="form.phone" class="pr-6 pb-8 w-full lg:w-1/2" label="Telephone" required />
                    </div>
                    <div class="px-8 py-4 bg-gray-100 border-t border-gray-200 flex justify-end items-center">
                        <loading-button :loading="sending" class="btn-indigo-500" type="submit">Create Organization</loading-button>
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
                type: null,
                civility: null,
                address: null,
                company: null,
                phone: null
            },
        }
    },
    methods: {
        submit() {
            this.sending = true
            var data = new FormData()
            data.append('type', this.form.type || '')
            data.append('civility', this.form.civility || '')
            data.append('address', this.form.address || '')
            data.append('company', this.form.company || '')
            data.append('phone', this.form.phone || '')

            this.$inertia.post(this.route('user.store'), data)
                .then(() => this.sending = false)
        },
    },
}
</script>
