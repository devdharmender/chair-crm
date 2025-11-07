@extends('admin.common.layout')
@section('title', 'Dharmender-CRM : Dashboard')
@section('main')
    <style>
        /* Make all Highcharts text inherit Tailwind color + size */
        .highcharts-title,
        .highcharts-axis-title,
        .highcharts-axis-labels text,
        .highcharts-legend-item text,
        .highcharts-tooltip text {
            fill: currentColor !important;
            /* Inherit color from Tailwind class */
            font-size: inherit !important;
            /* Inherit Tailwind text size */
        }
    </style>
    <div class="col-span-12">
        <!-- Metric Group Two -->
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 xl:grid-cols-4">
            <!-- Metric Item Start -->
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">
                <p class="text-theme-sm text-gray-500 dark:text-gray-400">
                    Unique Visitors
                </p>

                <div class="mt-3 flex items-end justify-between">
                    <div>
                        <h4 class="text-2xl font-bold text-gray-800 dark:text-white/90">
                            24.7K
                        </h4>
                    </div>

                    <div class="flex items-center gap-1">
                        <span
                            class="flex items-center gap-1 rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">
                            +20%
                        </span>

                        <span class="text-theme-xs text-gray-500 dark:text-gray-400">
                            Vs last month
                        </span>
                    </div>
                </div>
            </div>
            <!-- Metric Item End -->

            <!-- Metric Item Start -->
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">
                <p class="text-theme-sm text-gray-500 dark:text-gray-400">
                    Total Pageviews
                </p>

                <div class="mt-3 flex items-end justify-between">
                    <div>
                        <h4 class="text-2xl font-bold text-gray-800 dark:text-white/90">
                            55.9K
                        </h4>
                    </div>

                    <div class="flex items-center gap-1">
                        <span
                            class="flex items-center gap-1 rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">
                            +4%
                        </span>

                        <span class="text-theme-xs text-gray-500 dark:text-gray-400">
                            Vs last month
                        </span>
                    </div>
                </div>
            </div>
            <!-- Metric Item End -->

            <!-- Metric Item Start -->
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">
                <p class="text-theme-sm text-gray-500 dark:text-gray-400">Bounce Rate</p>

                <div class="mt-3 flex items-end justify-between">
                    <div>
                        <h4 class="text-2xl font-bold text-gray-800 dark:text-white/90">54%</h4>
                    </div>

                    <div class="flex items-center gap-1">
                        <span
                            class="flex items-center gap-1 rounded-full bg-error-50 px-2 py-0.5 text-theme-xs font-medium text-error-600 dark:bg-error-500/15 dark:text-error-500">
                            -1.59%
                        </span>

                        <span class="text-theme-xs text-gray-500 dark:text-gray-400">
                            Vs last month
                        </span>
                    </div>
                </div>
            </div>
            <!-- Metric Item End -->

            <!-- Metric Item Start -->
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">
                <p class="text-theme-sm text-gray-500 dark:text-gray-400">Visit Duration</p>

                <div class="mt-3 flex items-end justify-between">
                    <div>
                        <h4 class="text-2xl font-bold text-gray-800 dark:text-white/90">
                            2m 56s
                        </h4>
                    </div>

                    <div class="flex items-center gap-1">
                        <span
                            class="flex items-center gap-1 rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">
                            +7%
                        </span>

                        <span class="text-theme-xs text-gray-500 dark:text-gray-400">
                            Vs last month
                        </span>
                    </div>
                </div>
            </div>
            <!-- Metric Item End -->
        </div>
        <!-- Metric Group Two -->
    </div>
    {{-- datatable --}}
    <div class="col-span-12">
        <div class="mx-auto max-w-(--breakpoint-2xl) p-4 pb-20 md:p-6 md:pb-6 grid grid-cols-12 gap-4 md:gap-6">
            <div class="col-span-12 xl:col-span-12">
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] sm:p-3">
                    <div id="firstchart" class="text-theme-sm text-gray-500 dark:text-gray-400"></div>
                </div>
            </div>

            <div class="col-span-12 xl:col-span-7">
                <div
                    class="overflow-hidden rounded-2xl border border-gray-200 p-1 bg-white dark:border-gray-800 dark:bg-white/[0.03] sm:p-3">
                    <div id="secoundchart" class="text-theme-sm text-gray-500 dark:text-gray-400"></div>
                </div>
            </div>

            <div class="col-span-12 xl:col-span-5">
                <div
                    class="overflow-hidden rounded-2xl border border-gray-200 p-1 bg-white dark:border-gray-800 dark:bg-white/[0.03] sm:p-3">
                    <div id="thirdchart" class="text-theme-sm text-gray-500 dark:text-gray-400"></div>
                </div>
            </div>

            <div class="col-span-12 xl:col-span-5">
                <div
                    class="overflow-hidden rounded-2xl border border-gray-200 p-1 bg-white dark:border-gray-800 dark:bg-white/[0.03] sm:p-3">
                    <div id="forthchart" class="text-theme-sm text-gray-500 dark:text-gray-400"></div>
                </div>
            </div>

            <div class="col-span-12 xl:col-span-7">
                <div
                    class="overflow-hidden rounded-2xl border border-gray-200 p-1 bg-white dark:border-gray-800 dark:bg-white/[0.03] sm:p-3">
                    <div id="fifthchart" class="text-theme-sm text-gray-500 dark:text-gray-400"></div>
                </div>
            </div>

            <div class="col-span-12 xl:col-span-6">
                <!-- ====== Upcoming Schedule Start -->
                <div
                    class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] sm:p-6">
                    <div class="mb-6 flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                            Upcoming Schedule
                        </h3>

                        <div x-data="{ openDropDown: false }" class="relative">
                            <button @click="openDropDown = !openDropDown"
                                :class="openDropDown ? 'text-gray-700 dark:text-white' :
                                    'text-gray-400 hover:text-gray-700 dark:hover:text-white'"
                                class="text-gray-400 hover:text-gray-700 dark:hover:text-white">
                                <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10.2441 6C10.2441 5.0335 11.0276 4.25 11.9941 4.25H12.0041C12.9706 4.25 13.7541 5.0335 13.7541 6C13.7541 6.9665 12.9706 7.75 12.0041 7.75H11.9941C11.0276 7.75 10.2441 6.9665 10.2441 6ZM10.2441 18C10.2441 17.0335 11.0276 16.25 11.9941 16.25H12.0041C12.9706 16.25 13.7541 17.0335 13.7541 18C13.7541 18.9665 12.9706 19.75 12.0041 19.75H11.9941C11.0276 19.75 10.2441 18.9665 10.2441 18ZM11.9941 10.25C11.0276 10.25 10.2441 11.0335 10.2441 12C10.2441 12.9665 11.0276 13.75 11.9941 13.75H12.0041C12.9706 13.75 13.7541 12.9665 13.7541 12C13.7541 11.0335 12.9706 10.25 12.0041 10.25H11.9941Z"
                                        fill=""></path>
                                </svg>
                            </button>
                            <div x-show="openDropDown" @click.outside="openDropDown = false"
                                class="absolute right-0 top-full z-40 w-40 space-y-1 rounded-2xl border border-gray-200 bg-white p-2 shadow-theme-lg dark:border-gray-800 dark:bg-gray-dark"
                                style="display: none;">
                                <button
                                    class="flex w-full rounded-lg px-3 py-2 text-left text-theme-xs font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                    View More
                                </button>
                                <button
                                    class="flex w-full rounded-lg px-3 py-2 text-left text-theme-xs font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="custom-scrollbar max-w-full overflow-x-auto">
                        <div class="min-w-[500px]">
                            <div class="flex flex-col gap-2">
                                <div x-data="{ checked: false }" @click="checked = !checked"
                                    class="flex cursor-pointer items-center gap-9 rounded-lg p-3 hover:bg-gray-50 dark:hover:bg-white/[0.03]">
                                    <div class="flex items-start gap-3">
                                        <div class="flex h-5 w-5 items-center justify-center rounded-md border-[1.25px] bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700"
                                            :class="checked ? 'border-brand-500 dark:border-brand-500 bg-brand-500' :
                                                'bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700'">
                                            <svg :class="checked ? 'block' : 'hidden'" width="14" height="14"
                                                viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                class="hidden">
                                                <path d="M11.6668 3.5L5.25016 9.91667L2.3335 7" stroke="white"
                                                    stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                            </svg>
                                        </div>
                                        <div>
                                            <span class="mb-0.5 block text-theme-xs text-gray-500 dark:text-gray-400">
                                                Wed, 11 jan
                                            </span>
                                            <span class="text-theme-sm font-medium text-gray-700 dark:text-gray-400">
                                                09:20 AM
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="mb-1 block text-theme-sm font-medium text-gray-700 dark:text-gray-400">
                                            Business Analytics Press
                                        </span>
                                        <span class="text-theme-xs text-gray-500 dark:text-gray-400">
                                            Exploring the Future of Data-Driven +6 more
                                        </span>
                                    </div>
                                </div>

                                <div x-data="{ checked: false }" @click="checked = !checked"
                                    class="flex cursor-pointer items-center gap-9 rounded-lg p-3 hover:bg-gray-50 dark:hover:bg-white/[0.03]">
                                    <div class="flex items-start gap-3">
                                        <div class="flex h-5 w-5 items-center justify-center rounded-md border-[1.25px] bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700"
                                            :class="checked ? 'border-brand-500 dark:border-brand-500 bg-brand-500' :
                                                'bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700'">
                                            <svg :class="checked ? 'block' : 'hidden'" width="14" height="14"
                                                viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                class="hidden">
                                                <path d="M11.6668 3.5L5.25016 9.91667L2.3335 7" stroke="white"
                                                    stroke-width="1.94437" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <span class="mb-0.5 block text-theme-xs text-gray-500 dark:text-gray-400">
                                                Fri, 15 feb
                                            </span>
                                            <span class="text-theme-sm font-medium text-gray-700 dark:text-gray-400">
                                                10:35 AM
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <span
                                            class="mb-1 block text-theme-sm font-medium text-gray-700 dark:text-gray-400">
                                            Business Sprint
                                        </span>
                                        <span class="text-theme-xs text-gray-500 dark:text-gray-400">
                                            Techniques from Business Sprint +2 more
                                        </span>
                                    </div>
                                </div>

                                <div x-data="{ checked: false }" @click="checked = !checked"
                                    class="flex cursor-pointer items-center gap-9 rounded-lg p-3 hover:bg-gray-50 dark:hover:bg-white/[0.03]">
                                    <div class="flex items-start gap-3">
                                        <div class="flex h-5 w-5 items-center justify-center rounded-md border-[1.25px] bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700"
                                            :class="checked ? 'border-brand-500 dark:border-brand-500 bg-brand-500' :
                                                'bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700'">
                                            <svg :class="checked ? 'block' : 'hidden'" width="14" height="14"
                                                viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                class="hidden">
                                                <path d="M11.6668 3.5L5.25016 9.91667L2.3335 7" stroke="white"
                                                    stroke-width="1.94437" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <span class="mb-0.5 block text-theme-xs text-gray-500 dark:text-gray-400">
                                                Thu, 18 mar
                                            </span>
                                            <span class="text-theme-sm font-medium text-gray-700 dark:text-gray-400">
                                                1:15 AM
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <span
                                            class="mb-1 block text-theme-sm font-medium text-gray-700 dark:text-gray-400">
                                            Customer Review Meeting
                                        </span>
                                        <span class="text-theme-xs text-gray-500 dark:text-gray-400">
                                            Insights from the Customer Review Meeting +8 more
                                        </span>
                                    </div>
                                </div>
                                <div x-data="{ checked: false }" @click="checked = !checked"
                                    class="flex cursor-pointer items-center gap-9 rounded-lg p-3 hover:bg-gray-50 dark:hover:bg-white/[0.03]">
                                    <div class="flex items-start gap-3">
                                        <div class="flex h-5 w-5 items-center justify-center rounded-md border-[1.25px] bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700"
                                            :class="checked ? 'border-brand-500 dark:border-brand-500 bg-brand-500' :
                                                'bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700'">
                                            <svg :class="checked ? 'block' : 'hidden'" width="14" height="14"
                                                viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                class="hidden">
                                                <path d="M11.6668 3.5L5.25016 9.91667L2.3335 7" stroke="white"
                                                    stroke-width="1.94437" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <span class="mb-0.5 block text-theme-xs text-gray-500 dark:text-gray-400">
                                                Thu, 18 mar
                                            </span>
                                            <span class="text-theme-sm font-medium text-gray-700 dark:text-gray-400">
                                                1:15 AM
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <span
                                            class="mb-1 block text-theme-sm font-medium text-gray-700 dark:text-gray-400">
                                            Customer Review Meeting
                                        </span>
                                        <span class="text-theme-xs text-gray-500 dark:text-gray-400">
                                            Insights from the Customer Review Meeting +8 more
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ====== Upcoming Schedule End -->
            </div>
            <div class="col-span-12 xl:col-span-6 rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="mb-6 flex justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                            Activities
                        </h3>
                    </div>
                    <div x-data="{ openDropDown: false }" class="relative h-fit">
                        <button @click="openDropDown = !openDropDown"
                            :class="openDropDown ? 'text-gray-700 dark:text-white' :
                                'text-gray-400 hover:text-gray-700 dark:hover:text-white'"
                            class="text-gray-400 hover:text-gray-700 dark:hover:text-white">
                            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10.2441 6C10.2441 5.0335 11.0276 4.25 11.9941 4.25H12.0041C12.9706 4.25 13.7541 5.0335 13.7541 6C13.7541 6.9665 12.9706 7.75 12.0041 7.75H11.9941C11.0276 7.75 10.2441 6.9665 10.2441 6ZM10.2441 18C10.2441 17.0335 11.0276 16.25 11.9941 16.25H12.0041C12.9706 16.25 13.7541 17.0335 13.7541 18C13.7541 18.9665 12.9706 19.75 12.0041 19.75H11.9941C11.0276 19.75 10.2441 18.9665 10.2441 18ZM11.9941 10.25C11.0276 10.25 10.2441 11.0335 10.2441 12C10.2441 12.9665 11.0276 13.75 11.9941 13.75H12.0041C12.9706 13.75 13.7541 12.9665 13.7541 12C13.7541 11.0335 12.9706 10.25 12.0041 10.25H11.9941Z"
                                    fill=""></path>
                            </svg>
                        </button>
                        <div x-show="openDropDown" @click.outside="openDropDown = false"
                            class="shadow-theme-lg dark:bg-gray-dark absolute top-full right-0 z-40 w-40 space-y-1 rounded-2xl border border-gray-200 bg-white p-2 dark:border-gray-800"
                            style="display: none;">
                            <button
                                class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                View More
                            </button>
                            <button
                                class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <!-- Timeline line -->
                    <div class="absolute top-6 bottom-10 left-5 w-px bg-gray-200 dark:bg-gray-800"></div>

                    <!-- Francisco Grbbs -->
                    <div class="relative mb-6 flex">
                        <div class="z-10 flex-shrink-0">
                            <img src="src/images/user/user-01.jpg" alt="Francisco Grbbs"
                                class="size-10 rounded-full object-cover ring-4 ring-white dark:ring-gray-800">
                        </div>
                        <div class="ml-4">
                            <div class="mb-1 flex items-center gap-1">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9 5.0625H14.0625L12.5827 8.35084C12.4506 8.64443 12.4506 8.98057 12.5827 9.27416L14.0625 12.5625H10.125C9.50368 12.5625 9 12.0588 9 11.4375V10.875M3.9375 10.875H9M3.9375 3.375H7.875C8.49632 3.375 9 3.87868 9 4.5V10.875M3.9375 15.9375V2.0625"
                                        stroke="#12B76A" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                                <p class="text-theme-xs text-success-500 font-medium">New invoice</p>
                            </div>
                            <div class="flex items-baseline">
                                <h3 class="text-theme-sm font-medium text-gray-800 dark:text-white/90">
                                    Francisco Grbbs
                                </h3>
                                <span class="text-theme-sm ml-2 font-normal text-gray-500 dark:text-gray-400">created
                                    invoice</span>
                            </div>
                            <p class="text-theme-sm font-normal text-gray-500 dark:text-gray-400">
                                PQ-4491C
                            </p>
                            <p class="text-theme-xs mt-1 text-gray-400">Just Now</p>
                        </div>
                    </div>

                    <!-- Courtney Henry -->
                    <div class="relative mb-6 flex">
                        <div class="z-10 flex-shrink-0">
                            <img src="src/images/user/user-03.jpg" alt="Courtney Henry"
                                class="size-10 rounded-full object-cover ring-4 ring-white dark:ring-gray-800">
                        </div>
                        <div class="ml-4">
                            <div class="flex items-baseline">
                                <h3 class="text-theme-sm font-semibold text-gray-800 dark:text-white/90">
                                    Courtney Henry
                                </h3>
                                <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">created invoice</span>
                            </div>
                            <p class="text-theme-sm font-normal text-gray-500 dark:text-gray-400">
                                HK-234G
                            </p>
                            <p class="text-theme-xs mt-1 text-gray-400">15 minutes ago</p>
                        </div>
                    </div>

                    <!-- Bessie Cooper -->
                    <div class="relative mb-6 flex">
                        <div class="z-10 flex-shrink-0">
                            <img src="src/images/user/user-04.jpg" alt="Bessie Cooper"
                                class="size-10 rounded-full object-cover ring-4 ring-white dark:ring-gray-800">
                        </div>
                        <div class="ml-4">
                            <div class="flex items-baseline">
                                <h3 class="text-theme-sm font-semibold text-gray-800 dark:text-white/90">
                                    Bessie Cooper
                                </h3>
                                <span class="text-theme-sm ml-2 text-gray-500 dark:text-gray-400">created invoice</span>
                            </div>
                            <p class="text-theme-sm font-normal text-gray-500 dark:text-gray-400">
                                LH-2891C
                            </p>
                            <p class="text-theme-xs mt-1 text-gray-400">5 months ago</p>
                        </div>
                    </div>

                    <!-- Theresa Web -->
                    <div class="relative flex">
                        <div class="z-10 flex-shrink-0">
                            <img src="src/images/user/user-05.jpg" alt="Theresa Web"
                                class="size-10 rounded-full object-cover ring-4 ring-white dark:ring-gray-800">
                        </div>
                        <div class="ml-4">
                            <div class="flex items-baseline">
                                <h3 class="text-theme-sm font-semibold text-gray-800 dark:text-white/90">
                                    Theresa Web
                                </h3>
                                <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">created invoice</span>
                            </div>
                            <p class="text-theme-sm font-normal text-gray-500 dark:text-gray-400">
                                CK-125NH
                            </p>
                            <p class="text-theme-xs mt-1 text-gray-400">2 weeks ago</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-12">
                <!-- Table Four -->
                <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white pt-4 dark:border-gray-800 dark:bg-white/[0.03]">
  <div class="flex flex-col gap-5 px-6 mb-4 sm:flex-row sm:items-center sm:justify-between">
    <div>
      <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
        Recent Orders
      </h3>
    </div>

    <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
      <form>
        <div class="relative">
          <span class="absolute -translate-y-1/2 pointer-events-none top-1/2 left-4">
            <svg class="fill-gray-500 dark:fill-gray-400" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M3.04199 9.37381C3.04199 5.87712 5.87735 3.04218 9.37533 3.04218C12.8733 3.04218 15.7087 5.87712 15.7087 9.37381C15.7087 12.8705 12.8733 15.7055 9.37533 15.7055C5.87735 15.7055 3.04199 12.8705 3.04199 9.37381ZM9.37533 1.54218C5.04926 1.54218 1.54199 5.04835 1.54199 9.37381C1.54199 13.6993 5.04926 17.2055 9.37533 17.2055C11.2676 17.2055 13.0032 16.5346 14.3572 15.4178L17.1773 18.2381C17.4702 18.531 17.945 18.5311 18.2379 18.2382C18.5308 17.9453 18.5309 17.4704 18.238 17.1775L15.4182 14.3575C16.5367 13.0035 17.2087 11.2671 17.2087 9.37381C17.2087 5.04835 13.7014 1.54218 9.37533 1.54218Z" fill=""></path>
            </svg>
          </span>
          <input type="text" placeholder="Search..." class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-10 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pr-4 pl-[42px] text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden xl:w-[300px] dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
        </div>
      </form>
      <div>
        <button class="text-theme-sm shadow-theme-xs inline-flex h-10 items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
          <svg class="stroke-current fill-white dark:fill-gray-800" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2.29004 5.90393H17.7067" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M17.7075 14.0961H2.29085" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M12.0826 3.33331C13.5024 3.33331 14.6534 4.48431 14.6534 5.90414C14.6534 7.32398 13.5024 8.47498 12.0826 8.47498C10.6627 8.47498 9.51172 7.32398 9.51172 5.90415C9.51172 4.48432 10.6627 3.33331 12.0826 3.33331Z" fill="" stroke="" stroke-width="1.5"></path>
            <path d="M7.91745 11.525C6.49762 11.525 5.34662 12.676 5.34662 14.0959C5.34661 15.5157 6.49762 16.6667 7.91745 16.6667C9.33728 16.6667 10.4883 15.5157 10.4883 14.0959C10.4883 12.676 9.33728 11.525 7.91745 11.525Z" fill="" stroke="" stroke-width="1.5"></path>
          </svg>

          Filter
        </button>
      </div>
    </div>
  </div>

  <div class="max-w-full overflow-x-auto custom-scrollbar">
    <table class="min-w-full">
      <!-- table header start -->
      <thead class="border-gray-100 border-y bg-gray-50 dark:border-gray-800 dark:bg-gray-900">
        <tr>
          <th class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <div x-data="{checked: false}" class="flex items-center gap-3">
                <div @click="checked = !checked" class="flex h-5 w-5 cursor-pointer items-center justify-center rounded-md border-[1.25px] bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700" :class="checked ? 'border-brand-500 dark:border-brand-500 bg-brand-500' : 'bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700' ">
                  <svg :class="checked ? 'block' : 'hidden'" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="hidden">
                    <path d="M11.6668 3.5L5.25016 9.91667L2.3335 7" stroke="white" stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </div>
                <div>
                  <span class="block font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                    Deal ID
                  </span>
                </div>
              </div>
            </div>
          </th>
          <th class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                Customer
              </p>
            </div>
          </th>
          <th class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                Product/Service
              </p>
            </div>
          </th>
          <th class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                Deal Value
              </p>
            </div>
          </th>
          <th class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                Close Date
              </p>
            </div>
          </th>
          <th class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                Status
              </p>
            </div>
          </th>
          <th class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center justify-center">
              <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                Action
              </p>
            </div>
          </th>
        </tr>
      </thead>
      <!-- table header end -->

      <!-- table body start -->
      <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
        <tr>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <div x-data="{checked: false}" class="flex items-center gap-3">
                <div @click="checked = !checked" class="flex h-5 w-5 cursor-pointer items-center justify-center rounded-md border-[1.25px] bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700" :class="checked ? 'border-brand-500 dark:border-brand-500 bg-brand-500' : 'bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700' ">
                  <svg :class="checked ? 'block' : 'hidden'" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="hidden">
                    <path d="M11.6668 3.5L5.25016 9.91667L2.3335 7" stroke="white" stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </div>
                <div>
                  <span class="block font-medium text-gray-700 text-theme-sm dark:text-gray-400">
                    DE124321
                  </span>
                </div>
              </div>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <div class="flex items-center gap-3">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-brand-100">
                  <span class="text-xs font-semibold text-brand-500"> JD </span>
                </div>
                <div>
                  <span class="text-theme-sm mb-0.5 block font-medium text-gray-700 dark:text-gray-400">
                    John Doe
                  </span>
                  <span class="text-gray-500 text-theme-sm dark:text-gray-400">
                    johndeo@gmail.com
                  </span>
                </div>
              </div>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                Software License
              </p>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                $18,50.34
              </p>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                2024-06-15
              </p>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="bg-success-50 text-theme-xs text-success-600 dark:bg-success-500/15 dark:text-success-500 rounded-full px-2 py-0.5 font-medium">
                Complete
              </p>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center justify-center">
              <svg class="cursor-pointer hover:fill-error-500 dark:hover:fill-error-500 fill-gray-700 dark:fill-gray-400" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.54142 3.7915C6.54142 2.54886 7.54878 1.5415 8.79142 1.5415H11.2081C12.4507 1.5415 13.4581 2.54886 13.4581 3.7915V4.0415H15.6252H16.666C17.0802 4.0415 17.416 4.37729 17.416 4.7915C17.416 5.20572 17.0802 5.5415 16.666 5.5415H16.3752V8.24638V13.2464V16.2082C16.3752 17.4508 15.3678 18.4582 14.1252 18.4582H5.87516C4.63252 18.4582 3.62516 17.4508 3.62516 16.2082V13.2464V8.24638V5.5415H3.3335C2.91928 5.5415 2.5835 5.20572 2.5835 4.7915C2.5835 4.37729 2.91928 4.0415 3.3335 4.0415H4.37516H6.54142V3.7915ZM14.8752 13.2464V8.24638V5.5415H13.4581H12.7081H7.29142H6.54142H5.12516V8.24638V13.2464V16.2082C5.12516 16.6224 5.46095 16.9582 5.87516 16.9582H14.1252C14.5394 16.9582 14.8752 16.6224 14.8752 16.2082V13.2464ZM8.04142 4.0415H11.9581V3.7915C11.9581 3.37729 11.6223 3.0415 11.2081 3.0415H8.79142C8.37721 3.0415 8.04142 3.37729 8.04142 3.7915V4.0415ZM8.3335 7.99984C8.74771 7.99984 9.0835 8.33562 9.0835 8.74984V13.7498C9.0835 14.1641 8.74771 14.4998 8.3335 14.4998C7.91928 14.4998 7.5835 14.1641 7.5835 13.7498V8.74984C7.5835 8.33562 7.91928 7.99984 8.3335 7.99984ZM12.4168 8.74984C12.4168 8.33562 12.081 7.99984 11.6668 7.99984C11.2526 7.99984 10.9168 8.33562 10.9168 8.74984V13.7498C10.9168 14.1641 11.2526 14.4998 11.6668 14.4998C12.081 14.4998 12.4168 14.1641 12.4168 13.7498V8.74984Z" fill=""></path>
              </svg>
            </div>
          </td>
        </tr>
        <tr>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <div x-data="{checked: false}" class="flex items-center gap-3">
                <div @click="checked = !checked" class="flex h-5 w-5 cursor-pointer items-center justify-center rounded-md border-[1.25px] bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700" :class="checked ? 'border-brand-500 dark:border-brand-500 bg-brand-500' : 'bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700' ">
                  <svg :class="checked ? 'block' : 'hidden'" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="hidden">
                    <path d="M11.6668 3.5L5.25016 9.91667L2.3335 7" stroke="white" stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </div>
                <div>
                  <span class="block font-medium text-gray-700 text-theme-sm dark:text-gray-400">
                    DE124321
                  </span>
                </div>
              </div>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#fdf2fa]">
                  <span class="text-xs font-semibold text-[#dd2590]"> KF </span>
                </div>

                <div>
                  <span class="text-theme-sm mb-0.5 block font-medium text-gray-700 dark:text-gray-400">
                    Kierra Franci
                  </span>
                  <span class="text-gray-500 text-theme-sm dark:text-gray-400">
                    kierra@gmail.com
                  </span>
                </div>
              </div>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                Software License
              </p>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                $18,50.34
              </p>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                2024-06-15
              </p>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="bg-success-50 text-theme-xs text-success-600 dark:bg-success-500/15 dark:text-success-500 rounded-full px-2 py-0.5 font-medium">
                Complete
              </p>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center justify-center">
              <svg class="cursor-pointer hover:fill-error-500 dark:hover:fill-error-500 fill-gray-700 dark:fill-gray-400" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.54142 3.7915C6.54142 2.54886 7.54878 1.5415 8.79142 1.5415H11.2081C12.4507 1.5415 13.4581 2.54886 13.4581 3.7915V4.0415H15.6252H16.666C17.0802 4.0415 17.416 4.37729 17.416 4.7915C17.416 5.20572 17.0802 5.5415 16.666 5.5415H16.3752V8.24638V13.2464V16.2082C16.3752 17.4508 15.3678 18.4582 14.1252 18.4582H5.87516C4.63252 18.4582 3.62516 17.4508 3.62516 16.2082V13.2464V8.24638V5.5415H3.3335C2.91928 5.5415 2.5835 5.20572 2.5835 4.7915C2.5835 4.37729 2.91928 4.0415 3.3335 4.0415H4.37516H6.54142V3.7915ZM14.8752 13.2464V8.24638V5.5415H13.4581H12.7081H7.29142H6.54142H5.12516V8.24638V13.2464V16.2082C5.12516 16.6224 5.46095 16.9582 5.87516 16.9582H14.1252C14.5394 16.9582 14.8752 16.6224 14.8752 16.2082V13.2464ZM8.04142 4.0415H11.9581V3.7915C11.9581 3.37729 11.6223 3.0415 11.2081 3.0415H8.79142C8.37721 3.0415 8.04142 3.37729 8.04142 3.7915V4.0415ZM8.3335 7.99984C8.74771 7.99984 9.0835 8.33562 9.0835 8.74984V13.7498C9.0835 14.1641 8.74771 14.4998 8.3335 14.4998C7.91928 14.4998 7.5835 14.1641 7.5835 13.7498V8.74984C7.5835 8.33562 7.91928 7.99984 8.3335 7.99984ZM12.4168 8.74984C12.4168 8.33562 12.081 7.99984 11.6668 7.99984C11.2526 7.99984 10.9168 8.33562 10.9168 8.74984V13.7498C10.9168 14.1641 11.2526 14.4998 11.6668 14.4998C12.081 14.4998 12.4168 14.1641 12.4168 13.7498V8.74984Z" fill=""></path>
              </svg>
            </div>
          </td>
        </tr>
        <tr>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <div x-data="{checked: false}" class="flex items-center gap-3">
                <div @click="checked = !checked" class="flex h-5 w-5 cursor-pointer items-center justify-center rounded-md border-[1.25px] bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700" :class="checked ? 'border-brand-500 dark:border-brand-500 bg-brand-500' : 'bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700' ">
                  <svg :class="checked ? 'block' : 'hidden'" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="hidden">
                    <path d="M11.6668 3.5L5.25016 9.91667L2.3335 7" stroke="white" stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </div>
                <div>
                  <span class="block font-medium text-gray-700 text-theme-sm dark:text-gray-400">
                    DE124321
                  </span>
                </div>
              </div>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#f0f9ff]">
                  <span class="text-xs font-semibold text-[#0086c9]"> EW </span>
                </div>

                <div>
                  <span class="text-theme-sm mb-0.5 block font-medium text-gray-700 dark:text-gray-400">
                    Emerson Workman
                  </span>
                  <span class="text-gray-500 text-theme-sm dark:text-gray-400">
                    emerson@gmail.com
                  </span>
                </div>
              </div>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                Software License
              </p>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                $18,50.34
              </p>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                2024-06-15
              </p>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="bg-warning-50 text-theme-xs text-warning-600 dark:bg-warning-500/15 dark:text-warning-400 rounded-full px-2 py-0.5 font-medium">
                Pending
              </p>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center justify-center">
              <svg class="cursor-pointer hover:fill-error-500 dark:hover:fill-error-500 fill-gray-700 dark:fill-gray-400" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.54142 3.7915C6.54142 2.54886 7.54878 1.5415 8.79142 1.5415H11.2081C12.4507 1.5415 13.4581 2.54886 13.4581 3.7915V4.0415H15.6252H16.666C17.0802 4.0415 17.416 4.37729 17.416 4.7915C17.416 5.20572 17.0802 5.5415 16.666 5.5415H16.3752V8.24638V13.2464V16.2082C16.3752 17.4508 15.3678 18.4582 14.1252 18.4582H5.87516C4.63252 18.4582 3.62516 17.4508 3.62516 16.2082V13.2464V8.24638V5.5415H3.3335C2.91928 5.5415 2.5835 5.20572 2.5835 4.7915C2.5835 4.37729 2.91928 4.0415 3.3335 4.0415H4.37516H6.54142V3.7915ZM14.8752 13.2464V8.24638V5.5415H13.4581H12.7081H7.29142H6.54142H5.12516V8.24638V13.2464V16.2082C5.12516 16.6224 5.46095 16.9582 5.87516 16.9582H14.1252C14.5394 16.9582 14.8752 16.6224 14.8752 16.2082V13.2464ZM8.04142 4.0415H11.9581V3.7915C11.9581 3.37729 11.6223 3.0415 11.2081 3.0415H8.79142C8.37721 3.0415 8.04142 3.37729 8.04142 3.7915V4.0415ZM8.3335 7.99984C8.74771 7.99984 9.0835 8.33562 9.0835 8.74984V13.7498C9.0835 14.1641 8.74771 14.4998 8.3335 14.4998C7.91928 14.4998 7.5835 14.1641 7.5835 13.7498V8.74984C7.5835 8.33562 7.91928 7.99984 8.3335 7.99984ZM12.4168 8.74984C12.4168 8.33562 12.081 7.99984 11.6668 7.99984C11.2526 7.99984 10.9168 8.33562 10.9168 8.74984V13.7498C10.9168 14.1641 11.2526 14.4998 11.6668 14.4998C12.081 14.4998 12.4168 14.1641 12.4168 13.7498V8.74984Z" fill=""></path>
              </svg>
            </div>
          </td>
        </tr>
        <tr>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <div x-data="{checked: false}" class="flex items-center gap-3">
                <div @click="checked = !checked" class="flex h-5 w-5 cursor-pointer items-center justify-center rounded-md border-[1.25px] bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700" :class="checked ? 'border-brand-500 dark:border-brand-500 bg-brand-500' : 'bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700' ">
                  <svg :class="checked ? 'block' : 'hidden'" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="hidden">
                    <path d="M11.6668 3.5L5.25016 9.91667L2.3335 7" stroke="white" stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </div>
                <div>
                  <span class="block font-medium text-gray-700 text-theme-sm dark:text-gray-400">
                    DE124321
                  </span>
                </div>
              </div>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#fff6ed]">
                  <span class="text-xs font-semibold text-[#ec4a0a]"> CP </span>
                </div>

                <div>
                  <span class="text-theme-sm mb-0.5 block font-medium text-gray-700 dark:text-gray-400">
                    Chance Philips
                  </span>
                  <span class="text-gray-500 text-theme-sm dark:text-gray-400">
                    chance@gmail.com
                  </span>
                </div>
              </div>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                Software License
              </p>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                $18,50.34
              </p>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                2024-06-15
              </p>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="bg-success-50 text-theme-xs text-success-600 dark:bg-success-500/15 dark:text-success-500 rounded-full px-2 py-0.5 font-medium">
                Complete
              </p>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center justify-center">
              <svg class="cursor-pointer hover:fill-error-500 dark:hover:fill-error-500 fill-gray-700 dark:fill-gray-400" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.54142 3.7915C6.54142 2.54886 7.54878 1.5415 8.79142 1.5415H11.2081C12.4507 1.5415 13.4581 2.54886 13.4581 3.7915V4.0415H15.6252H16.666C17.0802 4.0415 17.416 4.37729 17.416 4.7915C17.416 5.20572 17.0802 5.5415 16.666 5.5415H16.3752V8.24638V13.2464V16.2082C16.3752 17.4508 15.3678 18.4582 14.1252 18.4582H5.87516C4.63252 18.4582 3.62516 17.4508 3.62516 16.2082V13.2464V8.24638V5.5415H3.3335C2.91928 5.5415 2.5835 5.20572 2.5835 4.7915C2.5835 4.37729 2.91928 4.0415 3.3335 4.0415H4.37516H6.54142V3.7915ZM14.8752 13.2464V8.24638V5.5415H13.4581H12.7081H7.29142H6.54142H5.12516V8.24638V13.2464V16.2082C5.12516 16.6224 5.46095 16.9582 5.87516 16.9582H14.1252C14.5394 16.9582 14.8752 16.6224 14.8752 16.2082V13.2464ZM8.04142 4.0415H11.9581V3.7915C11.9581 3.37729 11.6223 3.0415 11.2081 3.0415H8.79142C8.37721 3.0415 8.04142 3.37729 8.04142 3.7915V4.0415ZM8.3335 7.99984C8.74771 7.99984 9.0835 8.33562 9.0835 8.74984V13.7498C9.0835 14.1641 8.74771 14.4998 8.3335 14.4998C7.91928 14.4998 7.5835 14.1641 7.5835 13.7498V8.74984C7.5835 8.33562 7.91928 7.99984 8.3335 7.99984ZM12.4168 8.74984C12.4168 8.33562 12.081 7.99984 11.6668 7.99984C11.2526 7.99984 10.9168 8.33562 10.9168 8.74984V13.7498C10.9168 14.1641 11.2526 14.4998 11.6668 14.4998C12.081 14.4998 12.4168 14.1641 12.4168 13.7498V8.74984Z" fill=""></path>
              </svg>
            </div>
          </td>
        </tr>
        <tr>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <div x-data="{checked: false}" class="flex items-center gap-3">
                <div @click="checked = !checked" class="flex h-5 w-5 cursor-pointer items-center justify-center rounded-md border-[1.25px] bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700" :class="checked ? 'border-brand-500 dark:border-brand-500 bg-brand-500' : 'bg-white dark:bg-white/0 border-gray-300 dark:border-gray-700' ">
                  <svg :class="checked ? 'block' : 'hidden'" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="hidden">
                    <path d="M11.6668 3.5L5.25016 9.91667L2.3335 7" stroke="white" stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </div>
                <div>
                  <span class="block font-medium text-gray-700 text-theme-sm dark:text-gray-400">
                    DE124321
                  </span>
                </div>
              </div>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <div class="flex items-center gap-3">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-success-50">
                  <span class="text-xs font-semibold text-success-600">
                    TG
                  </span>
                </div>

                <div>
                  <span class="text-theme-sm mb-0.5 block font-medium text-gray-700 dark:text-gray-400">
                    Terry Geidt
                  </span>
                  <span class="text-gray-500 text-theme-sm dark:text-gray-400">
                    terry@gmail.com
                  </span>
                </div>
              </div>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                Software License
              </p>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                $18,50.34
              </p>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                2024-06-15
              </p>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center">
              <p class="bg-success-50 text-theme-xs text-success-600 dark:bg-success-500/15 dark:text-success-500 rounded-full px-2 py-0.5 font-medium">
                Complete
              </p>
            </div>
          </td>
          <td class="px-6 py-3 whitespace-nowrap">
            <div class="flex items-center justify-center">
              <svg class="cursor-pointer hover:fill-error-500 dark:hover:fill-error-500 fill-gray-700 dark:fill-gray-400" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.54142 3.7915C6.54142 2.54886 7.54878 1.5415 8.79142 1.5415H11.2081C12.4507 1.5415 13.4581 2.54886 13.4581 3.7915V4.0415H15.6252H16.666C17.0802 4.0415 17.416 4.37729 17.416 4.7915C17.416 5.20572 17.0802 5.5415 16.666 5.5415H16.3752V8.24638V13.2464V16.2082C16.3752 17.4508 15.3678 18.4582 14.1252 18.4582H5.87516C4.63252 18.4582 3.62516 17.4508 3.62516 16.2082V13.2464V8.24638V5.5415H3.3335C2.91928 5.5415 2.5835 5.20572 2.5835 4.7915C2.5835 4.37729 2.91928 4.0415 3.3335 4.0415H4.37516H6.54142V3.7915ZM14.8752 13.2464V8.24638V5.5415H13.4581H12.7081H7.29142H6.54142H5.12516V8.24638V13.2464V16.2082C5.12516 16.6224 5.46095 16.9582 5.87516 16.9582H14.1252C14.5394 16.9582 14.8752 16.6224 14.8752 16.2082V13.2464ZM8.04142 4.0415H11.9581V3.7915C11.9581 3.37729 11.6223 3.0415 11.2081 3.0415H8.79142C8.37721 3.0415 8.04142 3.37729 8.04142 3.7915V4.0415ZM8.3335 7.99984C8.74771 7.99984 9.0835 8.33562 9.0835 8.74984V13.7498C9.0835 14.1641 8.74771 14.4998 8.3335 14.4998C7.91928 14.4998 7.5835 14.1641 7.5835 13.7498V8.74984C7.5835 8.33562 7.91928 7.99984 8.3335 7.99984ZM12.4168 8.74984C12.4168 8.33562 12.081 7.99984 11.6668 7.99984C11.2526 7.99984 10.9168 8.33562 10.9168 8.74984V13.7498C10.9168 14.1641 11.2526 14.4998 11.6668 14.4998C12.081 14.4998 12.4168 14.1641 12.4168 13.7498V8.74984Z" fill=""></path>
              </svg>
            </div>
          </td>
        </tr>
      </tbody>
      <!-- table body end -->
    </table>
  </div>
</div>
<!-- Table Four -->
              </div>
        </div>
    </div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script>
        Highcharts.chart('firstchart', {
            chart: {
                type: 'column',
                backgroundColor: 'transparent'
            },
            title: {
                text: 'Total visiter'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Arp', 'May', 'Jun'],
                crosshair: true,
                accessibility: {
                    description: 'Countries'
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'this is yaxis title'
                }
            },
            tooltip: {
                valueSuffix: ' (1000 MT)'
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                    name: 'Corn',
                    data: [387749, 280000, 129000, 64300, 54000, 34300]
                },
                {
                    name: 'Wheat',
                    data: [45321, 140000, 10000, 140500, 19500, 113500]
                }
            ],
            credits: {
                enabled: false
            }
        });
        // secound chart
        Highcharts.chart('secoundchart', {
            chart: {
                type: 'pie',
                backgroundColor: 'transparent',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: 'Secound Chart'
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45
                }
            },
            series: [{
                name: 'Medals',
                data: [
                    ['Norway', 16],
                    ['Germany', 12],
                    ['USA', 8],
                    ['Sweden', 8],
                    ['Netherlands', 8],
                    ['ROC', 6],
                    ['Austria', 7],
                    ['Canada', 4],
                    ['Japan', 3]

                ]
            }],
            credits: {
                enabled: false
            }
        });
        // third chart
        Highcharts.chart('thirdchart', {
            chart: {
                type: 'spline',
                backgroundColor: 'transparent',

                inverted: true
            },
            title: {
                text: 'Atmosphere Temperature by Altitude'
            },
            xAxis: {
                reversed: false,

                labels: {
                    format: '{value} km'
                },
                accessibility: {
                    rangeDescription: 'Range: 0 to 80 km.'
                },
                maxPadding: 0.05,
                showLastLabel: true
            },
            yAxis: {
                title: {
                    text: 'Temperature'
                },
                labels: {
                    format: '{value}°'
                },
                accessibility: {
                    rangeDescription: 'Range: -90°C to 20°C.'
                },
                lineWidth: 2
            },
            legend: {
                enabled: false
            },
            tooltip: {
                headerFormat: '<b>{series.name}</b><br/>',
                pointFormat: '{point.x} km: {point.y}°C'
            },
            plotOptions: {
                spline: {
                    marker: {
                        enable: false
                    }
                }
            },
            series: [{
                name: 'Temperature',
                data: [
                    [0, 15],
                    [10, -50],
                    [20, -56.5],
                    [30, -46.5],
                    [40, -22.1],
                    [50, -2.5],
                    [60, -27.7],
                    [70, -55.7],
                    [80, -76.5]
                ]

            }],
            credits: {
                enabled: false
            }
        });
        // forth chart
        Highcharts.chart('forthchart', {
            chart: {
                type: 'pie',
                backgroundColor: 'transparent'
            },
            title: {
                text: 'Departmental Strength of a Company'

            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    borderWidth: 2,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b><br>{point.percentage}%',
                        distance: 20
                    }
                }
            },
            series: [{
                enableMouseTracking: false,
                animation: {
                    duration: 2000
                },
                colorByPoint: true,
                data: [{
                    name: 'Customer Support',
                    y: 21.3
                }, {
                    name: 'Development',
                    y: 18.7
                }, {
                    name: 'Sales',
                    y: 20.2
                }, {
                    name: 'Marketing',
                    y: 14.2
                }, {
                    name: 'Other',
                    y: 25.6
                }]
            }],
            credits: {
                enabled: false
            }
        });
        // fifth chart
        const chart = Highcharts.chart('fifthchart', {
            chart: {
                backgroundColor: 'transparent'
            },
            title: {
                text: 'Unemployment',
            },
            colors: [
                '#4caefe',
                '#3fbdf3',
                '#35c3e8',
                '#2bc9dc',
                '#20cfe1',
                '#16d4e6',
                '#0dd9db',
                '#03dfd0',
                '#00e4c5',
                '#00e9ba',
                '#00eeaf',
                '#23e274'
            ],
            xAxis: {
                categories: [
                    'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep',
                    'Oct', 'Nov', 'Dec'
                ]
            },
            series: [{
                type: 'column',
                name: 'Unemployed',
                borderRadius: 5,
                colorByPoint: true,
                data: [
                    2396, 2434, 2491, 2602, 2536, 2618, 2928, 2899,
                    2780, 2853, 2923, 2999
                ],
                showInLegend: false
            }],
            credits: {
                enabled: false
            }
        });
    </script>
@endsection
