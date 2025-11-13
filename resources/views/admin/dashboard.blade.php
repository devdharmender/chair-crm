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
        {{-- FORM SUBMIT STATUS START --}}
            @if (session('message'))
                <div
                    class="rounded-xl border border-success-500 bg-success-50 p-4 dark:border-success-500/30 dark:bg-success-500/15">
                    <div class="flex items-start gap-3">
                        <div class="-mt-0.5 text-success-500">
                            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.70186 12.0001C3.70186 7.41711 7.41711 3.70186 12.0001 3.70186C16.5831 3.70186 20.2984 7.41711 20.2984 12.0001C20.2984 16.5831 16.5831 20.2984 12.0001 20.2984C7.41711 20.2984 3.70186 16.5831 3.70186 12.0001ZM12.0001 1.90186C6.423 1.90186 1.90186 6.423 1.90186 12.0001C1.90186 17.5772 6.423 22.0984 12.0001 22.0984C17.5772 22.0984 22.0984 17.5772 22.0984 12.0001C22.0984 6.423 17.5772 1.90186 12.0001 1.90186ZM15.6197 10.7395C15.9712 10.388 15.9712 9.81819 15.6197 9.46672C15.2683 9.11525 14.6984 9.11525 14.347 9.46672L11.1894 12.6243L9.6533 11.0883C9.30183 10.7368 8.73198 10.7368 8.38051 11.0883C8.02904 11.4397 8.02904 12.0096 8.38051 12.3611L10.553 14.5335C10.7217 14.7023 10.9507 14.7971 11.1894 14.7971C11.428 14.7971 11.657 14.7023 11.8257 14.5335L15.6197 10.7395Z"
                                    fill="" />
                            </svg>
                        </div>

                        <div>
                            <h4 class="mb-1 text-sm font-semibold text-gray-800 dark:text-white/90">
                                Success Message
                            </h4>

                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                {{ session('message') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif
            @if (session('error'))
                <div
                    class="rounded-xl border border-error-500 bg-error-50 p-4 dark:border-error-500/30 dark:bg-error-500/15">
                    <div class="flex items-start gap-3">
                        <div class="-mt-0.5 text-error-500">
                            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.3499 12.0004C20.3499 16.612 16.6115 20.3504 11.9999 20.3504C7.38832 20.3504 3.6499 16.612 3.6499 12.0004C3.6499 7.38881 7.38833 3.65039 11.9999 3.65039C16.6115 3.65039 20.3499 7.38881 20.3499 12.0004ZM11.9999 22.1504C17.6056 22.1504 22.1499 17.6061 22.1499 12.0004C22.1499 6.3947 17.6056 1.85039 11.9999 1.85039C6.39421 1.85039 1.8499 6.3947 1.8499 12.0004C1.8499 17.6061 6.39421 22.1504 11.9999 22.1504ZM13.0008 16.4753C13.0008 15.923 12.5531 15.4753 12.0008 15.4753L11.9998 15.4753C11.4475 15.4753 10.9998 15.923 10.9998 16.4753C10.9998 17.0276 11.4475 17.4753 11.9998 17.4753L12.0008 17.4753C12.5531 17.4753 13.0008 17.0276 13.0008 16.4753ZM11.9998 6.62898C12.414 6.62898 12.7498 6.96476 12.7498 7.37898L12.7498 13.0555C12.7498 13.4697 12.414 13.8055 11.9998 13.8055C11.5856 13.8055 11.2498 13.4697 11.2498 13.0555L11.2498 7.37898C11.2498 6.96476 11.5856 6.62898 11.9998 6.62898Z"
                                    fill="#F04438"></path>
                            </svg>
                        </div>

                        <div>
                            <h4 class="mb-1 text-sm font-semibold text-gray-800 dark:text-white/90">
                                Error Message
                            </h4>

                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                {{ session('error') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif
            {{-- FORM SUBMIT STATUS END --}}
        <!-- Metric Group Two -->
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 xl:grid-cols-4">
            <!-- Metric Item Start -->
            <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">
                <p class="text-theme-sm text-gray-500 dark:text-gray-400">
                    Total Users
                </p>

                <div class="mt-3 flex items-end justify-between">
                    <div>
                        <h4 class="text-2xl font-bold text-gray-800 dark:text-white/90">
                            {{ $totalusers }}
                        </h4>
                    </div>

                    <div class="flex items-center gap-1">
                        <span class="text-theme-xs text-gray-500 dark:text-gray-400">
                            Till:
                        </span>
                        <span
                            class="flex items-center gap-1 rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">
                            {{date('d-M-Y')}}
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
            <div
                class="col-span-12 xl:col-span-6 rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]">
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
                <div
                    class="overflow-hidden rounded-2xl border border-gray-200 bg-white pt-4 dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="flex flex-col gap-5 px-6 mb-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                                New Users
                            </h3>
                        </div>

                        <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                            <div>
                                <button
                                    class="text-theme-sm shadow-theme-xs inline-flex h-10 items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                                    <svg class="stroke-current fill-white dark:fill-gray-800" width="20"
                                        height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.29004 5.90393H17.7067" stroke="" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M17.7075 14.0961H2.29085" stroke="" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path
                                            d="M12.0826 3.33331C13.5024 3.33331 14.6534 4.48431 14.6534 5.90414C14.6534 7.32398 13.5024 8.47498 12.0826 8.47498C10.6627 8.47498 9.51172 7.32398 9.51172 5.90415C9.51172 4.48432 10.6627 3.33331 12.0826 3.33331Z"
                                            fill="" stroke="" stroke-width="1.5"></path>
                                        <path
                                            d="M7.91745 11.525C6.49762 11.525 5.34662 12.676 5.34662 14.0959C5.34661 15.5157 6.49762 16.6667 7.91745 16.6667C9.33728 16.6667 10.4883 15.5157 10.4883 14.0959C10.4883 12.676 9.33728 11.525 7.91745 11.525Z"
                                            fill="" stroke="" stroke-width="1.5"></path>
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
                                            <div x-data="{ checked: false }" class="flex items-center gap-3">

                                                <div>
                                                    <span
                                                        class="block font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                        Sr. no.
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                    <th class="px-6 py-3 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div x-data="{ checked: false }" class="flex items-center gap-3">

                                                <div>
                                                    <span
                                                        class="block font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                        user Id
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </th>
                                    <th class="px-6 py-3 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                Image
                                            </p>
                                        </div>
                                    </th>

                                    <th class="px-6 py-3 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                Name
                                            </p>
                                        </div>
                                    </th>
                                    <th class="px-6 py-3 whitespace-nowrap">
                                        <div class="flex items-center justify-center">
                                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                Email
                                            </p>
                                        </div>
                                    </th>
                                    <th class="px-6 py-3 whitespace-nowrap">
                                        <div class="flex items-center justify-center">
                                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                Phone
                                            </p>
                                        </div>
                                    </th>
                                    <th class="px-6 py-3 whitespace-nowrap">
                                        <div class="flex items-center justify-center">
                                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                User Type
                                            </p>
                                        </div>
                                    </th>
                                    <th class="px-6 py-3 whitespace-nowrap">
                                        <div class="flex items-center justify-center">
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
                                @php
                                    $sn = 1;
                                @endphp
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-6 py-3 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div x-data="{ checked: false }" class="flex items-center gap-3">

                                                    <div>
                                                        <span
                                                            class="block font-medium text-gray-700 text-theme-sm dark:text-gray-400">
                                                            {{ $sn }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-3 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div x-data="{ checked: false }" class="flex items-center gap-3">

                                                    <div>
                                                        <span
                                                            class="block font-medium text-gray-700 text-theme-sm dark:text-gray-400">
                                                            {{ $toggleId = 'U-' . $user->id }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-3 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                                                    {!! $user->profile_image
                                                        ? '<a href="' . asset('storage/' . $user->profile_image) . '" target="_blank">View Image</a>'
                                                        : '<span class="text-error-500"> No Image </span>' !!}
                                                    {{-- <a href="{{ asset('storage/' . $user->profile_image) }}" target="_blank">View Image</a> --}}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="px-6 py-3 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                                                    {{ $user->username }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="px-6 py-3 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                                                    {{ $user->email }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="px-6 py-3 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                                                    {{ $user->mobile_number }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="px-6 py-3 whitespace-nowrap">
                                            <div>
                                                <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                                    <select
                                                        class="changeusertype dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                                        :class="isOptionSelected & amp; & amp;
                                                        'text-gray-800 dark:text-white/90'"
                                                        @change="isOptionSelected = true" id="{{ $user->id }}">
                                                        @foreach ($role as $data)
                                                            <option value="{{ $data->id }}"
                                                                class="text-gray-700 dark:bg-gray-900 dark:text-gray-400"
                                                                {!! $user->role_id === $data->id ? 'selected' : '' !!}>
                                                                {{ $data->role_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span
                                                        class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-700 dark:text-gray-400">
                                                        <svg class="stroke-current" width="20" height="20"
                                                            viewBox="0 0 20 20" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396"
                                                                stroke="" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-3 whitespace-nowrap">
                                            <div x-data="{ switcherToggle: {{ $user->status === 'active' ? 'true' : 'false' }} }">
                                                <label for="{{ $user->id }}-status" class="cursor-pointer">
                                                    <div class="relative"><input type="checkbox"
                                                            id="{{ $user->id }}-status" class="sr-only changeStatus"
                                                            @change="switcherToggle = !switcherToggle">
                                                        <div class="block h-6 w-11 rounded-full transition-colors duration-200"
                                                            :class="switcherToggle ? 'bg-success-500' : 'bg-red-500'">
                                                        </div>
                                                        <div :class="switcherToggle ? 'translate-x-full' : 'translate-x-0'"
                                                            class="absolute top-0.5 left-0.5 h-5 w-5 rounded-full bg-white shadow-theme-sm transition-transform duration-200 ease-linear">
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </td>

                                        <td class="p-4 whitespace-nowrap">
                                            <div x-data="dropdown()" class="relative flex justify-center">
                                                <button @click="toggle" class="text-gray-500 dark:text-gray-400">
                                                    <svg class="fill-current" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M5.99902 10.245C6.96552 10.245 7.74902 11.0285 7.74902 11.995V12.005C7.74902 12.9715 6.96552 13.755 5.99902 13.755C5.03253 13.755 4.24902 12.9715 4.24902 12.005V11.995C4.24902 11.0285 5.03253 10.245 5.99902 10.245ZM17.999 10.245C18.9655 10.245 19.749 11.0285 19.749 11.995V12.005C19.749 12.9715 18.9655 13.755 17.999 13.755C17.0325 13.755 16.249 12.9715 16.249 12.005V11.995C16.249 11.0285 17.0325 10.245 17.999 10.245ZM13.749 11.995C13.749 11.0285 12.9655 10.245 11.999 10.245C11.0325 10.245 10.249 11.0285 10.249 11.995V12.005C10.249 12.9715 11.0325 13.755 11.999 13.755C12.9655 13.755 13.749 12.9715 13.749 12.005V11.995Z"
                                                            fill=""></path>
                                                    </svg>
                                                </button>
                                                <div x-show="open" @click.outside="open = false"
                                                    class="shadow-theme-lg dark:bg-gray-dark fixed w-40 space-y-1 rounded-2xl border border-gray-200 bg-white p-2 dark:border-gray-800"
                                                    x-ref="dropdown" style="display: none;">
                                                    <a href="{{ route('accept-user',$user->id) }}"><button
                                                        class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                        Accept
                                                    </button></a>
                                                    <a href="{{ route('reject-user',$user->id)}}"><button
                                                        class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                        Reject
                                                    </button></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                        $sn++;
                                    @endphp
                                @endforeach
                            </tbody>
                            <!-- table body end -->
                        </table>
                    </div>
                </div>
                <!-- Table Four -->
            </div>
        </div>
    </div>
@endsection
@section('script')
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
        const stats = @json($stats);
        const totalusers = @json($totalusers);

        // Prepare data for Highcharts
           const chartData = [
        { name: 'Email Pending', y: stats.email_pending, color: getComputedStyle(document.documentElement).getPropertyValue('--color-orange-400') },
        { name: 'Active', y: stats.active, color: getComputedStyle(document.documentElement).getPropertyValue('--color-green-500') },
        { name: 'Inactive', y: stats.inactive, color: getComputedStyle(document.documentElement).getPropertyValue('--color-gray-500') },
        { name: 'Rejected', y: stats.rejected, color: getComputedStyle(document.documentElement).getPropertyValue('--color-red-500') },
    ];
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
                text: 'Users Status - Total: '+totalusers,
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45
                }
            },
            series: [{
                name: 'User',
                data: chartData
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
