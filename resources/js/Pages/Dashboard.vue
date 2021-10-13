<template>
    <Head title="Dashboard"/>

    <BreezeAuthenticatedLayout>

        <!-- Content Container -->
        <div class="max-w-7xl mx-auto sm:p-6 lg:p-8">


            <!-- Search Bar -->
            <div class="flex justify-between bg-gray-100 rounded-md p-8">

                <div class="flex-grow">
                    <div class="flex flex-row gap-4">
                        <div class="max-w-md flex-grow">
                            <label for="search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <!-- Heroicon name: solid/search -->
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                         aria-hidden="true">
                                        <path fill-rule="evenodd"
                                              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <input id="search" name="search"
                                       class="block w-full pl-10 pr-3 py-2 border-none rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 sm:text-sm"
                                       placeholder="Suche" type="search">
                            </div>
                        </div>
                        <button class="bg-gray-300 text-gray-700 text-sm py-2 px-6 rounded-md">
                            Suchen
                        </button>
                    </div>
                </div>

                <div>
                    <button class="bg-indigo-500 text-white text-sm py-2 px-4 rounded-md flex flex-row items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Reservierung
                    </button>
                </div>
            </div>

            <!-- Reservation List -->
            <div class="py-16">

                <table class="min-w-full table-auto divide-y divide-gray-200">
                    <thead>
                    <tr>
                        <th scope="col" class="px-6 py-1.5 text-left text-sm font-bold text-gray-500 tracking-wider">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-1.5 text-left text-sm font-bold text-gray-500 tracking-wider">
                            <span class="sr-only">Notizen</span>
                        </th>
                        <th scope="col" class="px-6 py-1.5 text-left text-sm font-bold text-gray-500 tracking-wider">
                            Uhrzeit
                        </th>
                        <th scope="col" class="px-6 py-1.5 text-left text-sm font-bold text-gray-500 tracking-wider">
                            Personen
                        </th>
                        <th scope="col" class="px-6 py-1.5 text-left text-sm font-bold text-gray-500 tracking-wider">
                            Tische
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Details</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <TableRow @edit-reservation="handleEdit"></TableRow>
                    </tbody>
                </table>
                <Pagination></Pagination>
            </div>

        </div>

        <!-- Modal -->
        <Modal :open="edit" @edit-reservation="handleEdit"></Modal>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import Button from '@/Components/Button';
import TableRow from '@/Components/TableRow';
import Pagination from '@/Components/Pagination';
import Modal from '@/Components/Modal';

export default {
    components: {
        Pagination,
        Button,
        TableRow,
        BreezeAuthenticatedLayout,
        Modal,
        Head,
    },
    props: {
        reservations: Object
    },
    data() {
        return {
            edit: true
        };
    },
    methods: {
        handleEdit() {
            this.edit = !this.edit;
        }
    }
};
</script>
