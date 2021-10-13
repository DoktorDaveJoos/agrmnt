<template>

    <div class="flex flex-row justify-between">
        <div class="flex flex-row gap-4">

            <button class="bg-gray-200 px-4 py-2 text-sm text-gray-500 rounded-md focus:outline-none">
                Heute
            </button>
            <button class="bg-gray-200 px-4 py-2 text-sm text-gray-500 rounded-md focus:outline-none">
                Morgen
            </button>
            <button class="bg-gray-200 px-4 py-2 text-sm text-gray-500 rounded-md focus:outline-none">
                Übermorgen
            </button>
        </div>

        <v-date-picker show-iso-weeknumbers color="indigo" v-model="date">
            <template v-slot="{ inputValue, inputEvents }">
                <button
                    v-on="inputEvents"
                    class="relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <span class="block truncate">{{ inputValue }}</span>
                    <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                        <SelectorIcon class="h-5 w-5 text-gray-400" aria-hidden="true"/>
                    </span>
                </button>
            </template>
        </v-date-picker>

    </div>
</template>

<script>
import { ref } from 'vue';
import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue';
import { CheckIcon, SelectorIcon } from '@heroicons/vue/solid';

const people = [
    {id: 1, name: 'Wade Cooper'},
    {id: 2, name: 'Arlene Mccoy'},
    {id: 3, name: 'Devon Webb'},
    {id: 4, name: 'Tom Cook'},
    {id: 5, name: 'Tanya Fox'},
    {id: 6, name: 'Hellen Schmidt'},
    {id: 7, name: 'Caroline Schultz'},
    {id: 8, name: 'Mason Heaney'},
    {id: 9, name: 'Claudie Smitham'},
    {id: 10, name: 'Emil Schaefer'},
];

export default {
    name: 'DatePicker',
    components: {
        Listbox,
        ListboxButton,
        ListboxLabel,
        ListboxOption,
        ListboxOptions,
        CheckIcon,
        SelectorIcon,
    },
    data() {
        return {
            date: new Date()
        }
    },
    setup() {
        const selected = ref(people[3]);

        return {
            people,
            selected,
        };
    },
};
</script>

<style scoped>

</style>
