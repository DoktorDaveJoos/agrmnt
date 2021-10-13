<template>
    <tr class="bg-white"
        :class="details ? '' : 'border-b border-gray-200'">
        <td class="px-6 py-3 flex flex-row items-center gap-4 whitespace-nowrap text-sm font-medium text-gray-900">
            <div class="h-12 w-12 rounded-full bg-gray-100 flex justify-center items-center">
                <span class="text-gray-700 font-bold">JC</span>
            </div>
            Jane Cooper
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm italic text-gray-500">
            Hund braucht Napf
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            18:45
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            4
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            15
        </td>
        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium text-gray-500">
            <div class="flex flex-row justify-end items-center">
                <button @click="toggleDetails"
                        :class="details ? 'transform rotate-180 transition duration-150' : 'transform rotate-0 transition duration-150'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
            </div>
        </td>
    </tr>
    <tr v-if="details" class="border-b border-gray-200">
        <!-- TODO: adjust colspan dynamically -->
        <td colspan="6" class="px-6 pb-4">
            <div class="flex flex-row gap-4">
                <div class="w-12"><!-- spacer --></div>
                <div class="flex flex-col flex-grow">
                    <span class="text-gray-700 text-sm font-bold">Kontakt</span>
                    <span class="text-gray-500 text-sm">+49 123 456789</span>
                    <span class="text-gray-500 text-sm">jane.cooper@gmail.com</span>
                </div>
                <div class="flex gap-4 self-end">
                    <button @click="edit" class="text-gray-400 hover:text-gray-500 transition duration-100 ease-in-out text-sm">Bearbeiten</button>
                    <button class="text-red-400 hover:text-red-500 transition duration-100 ease-in-out text-sm">Löschen</button>
                </div>
            </div>
        </td>
    </tr>
</template>

<script>
export default {
    name: 'TableRow',
    data() {
        return {
            details: false,
        };
    },
    methods: {
        toggleDetails() {
            this.details = !this.details;
        },
        edit() {
            this.$emit('editReservation');
        }
    }

};
</script>

<style scoped>

</style>
