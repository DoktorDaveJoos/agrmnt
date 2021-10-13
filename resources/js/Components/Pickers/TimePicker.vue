<template>

    <div class="flex flex-row justify-between">
        <div class="flex flex-row items-center">

            <button v-for="(n, i) in preDefinedHours"
                    @click="setHour(n)"
                    class="bg-gray-200 px-4 py-2 text-sm focus:outline-none transition-colors duration-100 ease-in-out"
                    :class="getClassForHour(n, i)">
                {{ n }}
            </button>

            <span class="mx-2">:</span>

            <button v-for="(n, i) in preDefinedMinutes"
                    @click="setMinute(n)"
                    class="bg-gray-200 px-4 py-2 text-sm focus:outline-none transition-colors duration-100 ease-in-out"
                    :class="getClassForMinute(n, i)">
                {{ n }}
            </button>

        </div>

        <div class="flex items-center">

            <Listbox as="div" :modelValue="hour" @update:modelValue="setHour($event)">
                <div class="relative">
                    <ListboxButton
                        class="relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="block truncate">{{ hour }}</span>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                          <SelectorIcon class="h-5 w-5 text-gray-400" aria-hidden="true"/>
                        </span>
                    </ListboxButton>

                    <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
                        <ListboxOptions
                            class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
                            <ListboxOption as="template" v-for="h in 24" :key="h" :value="h.toString()" v-slot="{ active, selected }">
                                <li :class="[active ? 'text-white bg-indigo-600' : 'text-gray-900', 'cursor-default select-none relative py-2 pl-8 pr-4']">
                                <span :class="[selected ? 'font-semibold' : 'font-normal']">
                                {{ h }}
                                </span>
                                    <span v-if="selected"
                                          :class="[active ? 'text-white' : 'text-indigo-600', 'absolute inset-y-0 left-0 flex items-center pl-1.5']">
                                        <CheckIcon class="h-5 w-5" aria-hidden="true"/>
                                </span>
                                </li>
                            </ListboxOption>
                        </ListboxOptions>
                    </transition>
                </div>
            </Listbox>

            <span class="mx-2">:</span>

            <Listbox as="div" :modelValue="minute" @update:modelValue="setMinute($event)">
                <div class="relative">
                    <ListboxButton
                        class="relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <span class="block truncate">{{ minute.length === 1 ? '0' + minute : minute }}</span>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                          <SelectorIcon class="h-5 w-5 text-gray-400" aria-hidden="true"/>
                        </span>
                    </ListboxButton>

                    <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100" leave-to-class="opacity-0">
                        <ListboxOptions
                            class="absolute z-10 mt-1 w-full bg-white shadow-lg max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
                            <ListboxOption as="template" v-for="(m, i) in 60" :key="i" :value="i.toString().length === 1 ? '0' + i : i" v-slot="{ active, selected }">
                                <li :class="[active ? 'text-white bg-indigo-600' : 'text-gray-900', 'cursor-default select-none relative py-2 pl-8 pr-4']">
                                <span :class="[selected ? 'font-semibold' : 'font-normal']">
                                {{ i.toString().length === 1 ? '0' + i : i }}
                                </span>
                                    <span v-if="selected"
                                          :class="[active ? 'text-white' : 'text-indigo-600', 'absolute inset-y-0 left-0 flex items-center pl-1.5']">
                                        <CheckIcon class="h-5 w-5" aria-hidden="true"/>
                                </span>
                                </li>
                            </ListboxOption>
                        </ListboxOptions>
                    </transition>
                </div>
            </Listbox>
        </div>


    </div>
</template>

<script>
import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue';
import { CheckIcon, SelectorIcon } from '@heroicons/vue/solid';
import { setHours, setMinutes } from 'date-fns';

const preDefinedHours = [16, 17, 18, 19];
const preDefinedMinutes = [0, 15, 30, 45];

export default {
    name: 'TimePicker',
    components: {
        Listbox,
        ListboxButton,
        ListboxLabel,
        ListboxOption,
        ListboxOptions,
        CheckIcon,
        SelectorIcon,
    },
    props: {
        hour: Number,
        minute: Number
    },
    setup() {
        return {
            preDefinedHours,
            preDefinedMinutes
        };
    },
    methods: {
        withHours(date) {
            return setHours(date, this.hour);
        },
        withMinutes(date) {
            return setMinutes(date, this.minute);
        },
        setHour(hour) {
            const time = setHours(this.withMinutes(new Date()), parseInt(hour));
            this.$emit('setTime', time);
        },
        setMinute(minute) {
            const time = setMinutes(this.withHours(new Date()), parseInt(minute));
            this.$emit('setTime', time);
        },
        getRounded(index) {
            const rounded_left = index === 0 ? ' rounded-l-md' : '';
            const rounded_right = index === 3 ? ' rounded-r-md' : '';
            return rounded_left + rounded_right;
        },
        getClassForHour(hour, index) {
            const active = hour === this.hour ? 'bg-gray-500 text-gray-100 font-bold' : 'text-gray-500 hover:bg-gray-300';
            return active + this.getRounded(index);
        },
        getClassForMinute(minute, index) {
            const active = minute === this.minute ? 'bg-gray-500 text-gray-100 font-bold' : 'text-gray-500 hover:bg-gray-300';
            return active + this.getRounded(index);
        }
    }
};
</script>

<style scoped>

</style>
