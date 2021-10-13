<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <TransitionRoot as="template" :show="open">
        <Dialog as="div" class="fixed z-10 inset-0 overflow-y-auto" @close="open = false">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200"
                                 leave-from="opacity-100" leave-to="opacity-0">
                    <DialogOverlay class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"/>
                </TransitionChild>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                 enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200"
                                 leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="flex flex-col gap-4">
                                <div class="pb-4 border-b border-gray-300 text-center sm:mt-0 sm:text-left">
                                    <DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900">
                                        Reservierung
                                    </DialogTitle>
                                </div>
                                <!-- Form -->

                                <!-- Pickers -->
                                <DatePicker></DatePicker>
                                <TimePicker :hour="hours" :minute="minutes" @set-time="handleTime"></TimePicker>
                                <PersonPicker></PersonPicker>

                                <!-- Inputs -->
                                <div>
                                    <label for="name" class="block text-sm text-gray-700">Name des Gastes / Gruppe</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input type="text" name="name" id="name"
                                               class="block w-full pr-10 border-gray-300 text-gray-700 placeholder-gray-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                               placeholder="Frau Mustermann ..." value="" aria-invalid="true" aria-describedby="email-error"/>
                                        <div v-if="false" class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
<!--                                            <ExclamationCircleIcon class="h-5 w-5 text-red-500" aria-hidden="true"/>-->
                                        </div>
                                    </div>
                                    <p v-if="false" class="mt-2 text-sm text-red-600" id="email-error">Your password must be less than 4 characters.</p>
                                </div>

                                <div>
                                    <label for="about" class="block text-sm text-gray-700">
                                        Kontaktdaten / Weiteres
                                    </label>
                                    <div class="mt-1">
                                        <textarea id="about"
                                                  name="about"
                                                  placeholder="muster@email.de
+49 123 456789"
                                                  class="block w-full focus:ring-indigo-500 text-sm text-gray-700 focus:border-indigo-500 border border-gray-300 placeholder-gray-300 rounded-md"/>
                                    </div>
                                </div>

                                <div>
                                    <label for="tables" class="block text-sm text-gray-700">Tischnummer(n)</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input type="text" name="tables" id="tables"
                                               class="block w-full pr-10 border-gray-300 text-gray-700 placeholder-gray-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                               placeholder="1, 2 ..." value="" aria-invalid="true" aria-describedby="email-error"/>
                                        <div v-if="false" class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
<!--                                            <ExclamationCircleIcon class="h-5 w-5 text-red-500" aria-hidden="true"/>-->
                                        </div>
                                    </div>
                                    <p v-if="false" class="mt-2 text-sm text-red-600" id="email-error">Your password must be less than 4 characters.</p>
                                </div>


                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-500 text-base font-medium text-white sm:ml-3 sm:w-auto sm:text-sm"
                                    @click="cancel">
                                Speichern
                            </button>
                            <button type="button"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                    @click="cancel" ref="cancelButtonRef">
                                Abbrechen
                            </button>
                        </div>
                    </div>
                </TransitionChild>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script>
import { Dialog, DialogOverlay, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue';
import { ExclamationIcon } from '@heroicons/vue/outline';
import DatePicker from '@/Components/Pickers/DatePicker';
import TimePicker from '@/Components/Pickers/TimePicker';
import PersonPicker from '@/Components/Pickers/PersonPicker';
import DurationPicker from '@/Components/Pickers/DurationPicker';
import { getHours, getMinutes, set } from 'date-fns';

const reservation = {
    name: 'Jane Cooper',
    date: new Date(),
    duration: 120,
    persons: 4,
    short_notice: 'Bringt Hund, Napf herrichten',
    long_notice: 'test@test.de\nkeine telefonnummer',
    tables: '12, 13'
}

export default {
    name: 'Modal',
    components: {
        PersonPicker,
        Dialog,
        DialogOverlay,
        DialogTitle,
        TransitionChild,
        TransitionRoot,
        ExclamationIcon,
        DatePicker,
        TimePicker,
        DurationPicker
    },
    props: {
        open: Boolean
    },
    data() {
        return {
            reservation
        }
    },
    methods: {
        cancel() {
            this.$emit('editReservation');
        },
        handleTime($event) {
            this.reservation.date = set(this.reservation.date, {
                minutes: getMinutes($event),
                hours: getHours($event)
            })
        }
    },
    computed: {
        hours() {
            return getHours(this.reservation.date);
        },
        minutes() {
            return getMinutes(this.reservation.date);
        }
    }
};
</script>
