@extends('admin.common.layout')
@section('title', 'Chair-CRM : Engneer Task assign')
@section('main')
    <div class="col-span-12">
        <div x-data="{ selectedTaskGroup: 'All' }"
            class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <!-- Task header Start -->
            <div class="flex flex-col items-center px-4 py-5 xl:px-6 xl:py-6">
                <div class="flex flex-col w-full gap-5 sm:justify-between xl:flex-row xl:items-center">
                    <div class="flex flex-wrap items-center gap-x-1 gap-y-2 rounded-lg p-0.5 ">
                        <div class="fc-toolbar-chunk"><h2 class="fc-toolbar-title" id="fc-dom-1">Engneer Task Status last 7-days</h2></div>
                    </div>

                    <div class="flex flex-wrap items-center gap-3 xl:justify-end">
                        <button
                            class="inline-flex items-center gap-2 rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white shadow-theme-xs hover:bg-brand-600">
                            Add New Task

                            <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.2502 4.99951C9.2502 4.5853 9.58599 4.24951 10.0002 4.24951C10.4144 4.24951 10.7502 4.5853 10.7502 4.99951V9.24971H15.0006C15.4148 9.24971 15.7506 9.5855 15.7506 9.99971C15.7506 10.4139 15.4148 10.7497 15.0006 10.7497H10.7502V15.0001C10.7502 15.4143 10.4144 15.7501 10.0002 15.7501C9.58599 15.7501 9.2502 15.4143 9.2502 15.0001V10.7497H5C4.58579 10.7497 4.25 10.4139 4.25 9.99971C4.25 9.5855 4.58579 9.24971 5 9.24971H9.2502V4.99951Z"
                                    fill=""></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Task header End -->

            <!-- Task wrapper Start -->
            <div
                class="mt-7 grid grid-cols-1 border-t border-gray-200 sm:mt-0 sm:grid-cols-2 xl:grid-cols-3 dark:border-gray-800">
                <!-- To do list -->
                <div class="swim-lane flex flex-col gap-5 p-4 xl:p-6">
                    <div class="mb-1 flex items-center justify-between">
                        <h3 class="flex items-center gap-3 text-base font-medium text-gray-800 dark:text-white/90">
                            To Do
                            <span
                                class="text-theme-xs inline-flex rounded-full bg-gray-100 px-2 py-0.5 font-medium text-gray-700 dark:bg-white/[0.03] dark:text-white/80">
                                3
                            </span>
                        </h3>

                        <div x-data="{ openDropDown: false }" class="relative">
                            <button @click="openDropDown = !openDropDown" class="text-gray-700 dark:text-gray-400">
                                <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.99902 10.2451C6.96552 10.2451 7.74902 11.0286 7.74902 11.9951V12.0051C7.74902 12.9716 6.96552 13.7551 5.99902 13.7551C5.03253 13.7551 4.24902 12.9716 4.24902 12.0051V11.9951C4.24902 11.0286 5.03253 10.2451 5.99902 10.2451ZM17.999 10.2451C18.9655 10.2451 19.749 11.0286 19.749 11.9951V12.0051C19.749 12.9716 18.9655 13.7551 17.999 13.7551C17.0325 13.7551 16.249 12.9716 16.249 12.0051V11.9951C16.249 11.0286 17.0325 10.2451 17.999 10.2451ZM13.749 11.9951C13.749 11.0286 12.9655 10.2451 11.999 10.2451C11.0325 10.2451 10.249 11.0286 10.249 11.9951V12.0051C10.249 12.9716 11.0325 13.7551 11.999 13.7551C12.9655 13.7551 13.749 12.9716 13.749 12.0051V11.9951Z"
                                        fill=""></path>
                                </svg>
                            </button>
                            <div x-show="openDropDown" @click.outside="openDropDown = false"
                                class="shadow-theme-md dark:bg-gray-dark absolute top-full right-0 z-40 w-[140px] space-y-1 rounded-2xl border border-gray-200 bg-white p-2 dark:border-gray-800"
                                style="display: none;">
                                <button
                                    class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                    Edit
                                </button>
                                <button
                                    class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                    Delete
                                </button>
                                <button
                                    class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                    Clear All
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- task item -->
                    <div draggable="true"
                        class="task shadow-theme-sm rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/5">
                        <div class="flex items-start justify-between gap-6">
                            <div>
                                <h4 class="mb-2 text-base text-gray-800 dark:text-white/90">
                                    Work for {{session()->get('username')}}
                                </h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">
                                    Dharmender Kumar, <a href="tel:9878654567">8750267877</a>
                                </p>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-5" id="speakassigntask">
                                    WZ-53, pitampura, near to metro station, delhi - 110034
                                </p>

                                <div class="flex items-center gap-3">
                                    <span
                                        class="flex cursor-pointer items-center gap-1 text-sm text-gray-500 dark:text-gray-400">
                                        <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.33329 1.0835C5.74751 1.0835 6.08329 1.41928 6.08329 1.8335V2.25016L9.91663 2.25016V1.8335C9.91663 1.41928 10.2524 1.0835 10.6666 1.0835C11.0808 1.0835 11.4166 1.41928 11.4166 1.8335V2.25016L12.3333 2.25016C13.2998 2.25016 14.0833 3.03366 14.0833 4.00016V6.00016L14.0833 12.6668C14.0833 13.6333 13.2998 14.4168 12.3333 14.4168L3.66663 14.4168C2.70013 14.4168 1.91663 13.6333 1.91663 12.6668L1.91663 6.00016L1.91663 4.00016C1.91663 3.03366 2.70013 2.25016 3.66663 2.25016L4.58329 2.25016V1.8335C4.58329 1.41928 4.91908 1.0835 5.33329 1.0835ZM5.33329 3.75016L3.66663 3.75016C3.52855 3.75016 3.41663 3.86209 3.41663 4.00016V5.25016L12.5833 5.25016V4.00016C12.5833 3.86209 12.4714 3.75016 12.3333 3.75016L10.6666 3.75016L5.33329 3.75016ZM12.5833 6.75016L3.41663 6.75016L3.41663 12.6668C3.41663 12.8049 3.52855 12.9168 3.66663 12.9168L12.3333 12.9168C12.4714 12.9168 12.5833 12.8049 12.5833 12.6668L12.5833 6.75016Z"
                                                fill=""></path>
                                        </svg>
                                        Tomorrow
                                    </span>
                                    <span class="flex cursor-pointer items-center gap-1 text-sm text-gray-500 dark:text-gray-400" id="assigntask">
                                        <svg class="fill-current" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21.4166 4.00001C21.4166 3.77689 21.3173 3.56536 21.1456 3.42287C20.9739 3.28039 20.7477 3.22173 20.5284 3.26285L8.52841 5.51285C8.17368 5.57936 7.91663 5.88909 7.91663 6.25001V9.98484C7.91644 9.99437 7.91644 10.0039 7.91663 10.0135V14.4585C7.3716 14.1636 6.72327 14 6.04163 14C5.16738 14 4.34794 14.2691 3.73094 14.7392C3.11333 15.2098 2.66663 15.9138 2.66663 16.75C2.66663 17.5862 3.11333 18.2902 3.73094 18.7608C4.34794 19.2309 5.16738 19.5 6.04163 19.5C6.91587 19.5 7.73532 19.2309 8.35231 18.7608C8.95774 18.2995 9.39893 17.6139 9.41611 16.7993C9.41645 16.79 9.41663 16.7806 9.41663 16.7712V16.75V10.62L19.9166 8.60938V12.2085C19.3716 11.9136 18.7233 11.75 18.0416 11.75C17.1674 11.75 16.3479 12.0191 15.7309 12.4892C15.1133 12.9598 14.6666 13.6638 14.6666 14.5C14.6666 15.3362 15.1133 16.0402 15.7309 16.5108C16.3479 16.9809 17.1674 17.25 18.0416 17.25C18.9159 17.25 19.7353 16.9809 20.3523 16.5108C20.9577 16.0495 21.3989 15.3639 21.4161 14.5493C21.4165 14.54 21.4166 14.5306 21.4166 14.5212V14.5V4.00001ZM19.9166 14.5C19.9166 14.2316 19.7757 13.9357 19.4432 13.6824C19.1102 13.4286 18.6171 13.25 18.0416 13.25C17.4661 13.25 16.9731 13.4286 16.64 13.6824C16.3076 13.9357 16.1666 14.2316 16.1666 14.5C16.1666 14.7684 16.3076 15.0643 16.64 15.3176C16.9731 15.5714 17.4661 15.75 18.0416 15.75C18.6171 15.75 19.1102 15.5714 19.4432 15.3176C19.7757 15.0643 19.9166 14.7684 19.9166 14.5ZM7.44325 15.9324C7.7757 16.1857 7.91663 16.4816 7.91663 16.75C7.91663 17.0184 7.7757 17.3143 7.44325 17.5676C7.11018 17.8214 6.61713 18 6.04163 18C5.46613 18 4.97307 17.8214 4.64 17.5676C4.30755 17.3143 4.16663 17.0184 4.16663 16.75C4.16663 16.4816 4.30755 16.1857 4.64 15.9324C4.97307 15.6786 5.46613 15.5 6.04163 15.5C6.61713 15.5 7.11018 15.6786 7.44325 15.9324ZM19.9166 7.08212V4.9037L9.41663 6.87245V9.09276L19.9166 7.08212Z" fill=""></path>
                                        </svg>
                                        Listen
                                    </span>
                                </div>
                            </div>

                            <div
                                class="h-6 w-full max-w-6 overflow-hidden rounded-full border-[0.5px] border-gray-200 dark:border-gray-800">
                                <img src="{{asset('assets/admin/image/profile.png')}}" alt="user">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Progress list -->
                <div class="swim-lane flex flex-col gap-5 border-x border-gray-200 p-4 xl:p-6 dark:border-gray-800">
                    <div class="mb-1 flex items-center justify-between">
                        <h3 class="flex items-center gap-3 text-base font-medium text-gray-800 dark:text-white/90">
                            In Progress
                            <span
                                class="bg-warning-50 text-theme-xs text-warning-700 dark:bg-warning-500/15 inline-flex rounded-full px-2 py-0.5 font-medium dark:text-orange-400">
                                5
                            </span>
                        </h3>

                        <div x-data="{ openDropDown: false }" class="relative">
                            <button @click="openDropDown = !openDropDown" class="text-gray-700 dark:text-gray-400">
                                <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.99902 10.2451C6.96552 10.2451 7.74902 11.0286 7.74902 11.9951V12.0051C7.74902 12.9716 6.96552 13.7551 5.99902 13.7551C5.03253 13.7551 4.24902 12.9716 4.24902 12.0051V11.9951C4.24902 11.0286 5.03253 10.2451 5.99902 10.2451ZM17.999 10.2451C18.9655 10.2451 19.749 11.0286 19.749 11.9951V12.0051C19.749 12.9716 18.9655 13.7551 17.999 13.7551C17.0325 13.7551 16.249 12.9716 16.249 12.0051V11.9951C16.249 11.0286 17.0325 10.2451 17.999 10.2451ZM13.749 11.9951C13.749 11.0286 12.9655 10.2451 11.999 10.2451C11.0325 10.2451 10.249 11.0286 10.249 11.9951V12.0051C10.249 12.9716 11.0325 13.7551 11.999 13.7551C12.9655 13.7551 13.749 12.9716 13.749 12.0051V11.9951Z"
                                        fill=""></path>
                                </svg>
                            </button>
                            <div x-show="openDropDown" @click.outside="openDropDown = false"
                                class="shadow-theme-md dark:bg-gray-dark absolute top-full right-0 z-40 w-[140px] space-y-1 rounded-2xl border border-gray-200 bg-white p-2 dark:border-gray-800"
                                style="display: none;">
                                <button
                                    class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                    Edit
                                </button>
                                <button
                                    class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                    Delete
                                </button>
                                <button
                                    class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                    Clear All
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- task item -->
                    <div draggable="true"
                        class="task shadow-theme-sm rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/5">
                        <div class="flex items-start justify-between gap-6">
                            <div>
                                <h4 class="mb-5 text-base text-gray-800 dark:text-white/90">
                                    Work In Progress (WIP) Dashboard
                                </h4>

                                <div class="flex items-center gap-3">
                                    <span
                                        class="flex cursor-pointer items-center gap-1 text-sm text-gray-500 dark:text-gray-400">
                                        <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.33329 1.0835C5.74751 1.0835 6.08329 1.41928 6.08329 1.8335V2.25016L9.91663 2.25016V1.8335C9.91663 1.41928 10.2524 1.0835 10.6666 1.0835C11.0808 1.0835 11.4166 1.41928 11.4166 1.8335V2.25016L12.3333 2.25016C13.2998 2.25016 14.0833 3.03366 14.0833 4.00016V6.00016L14.0833 12.6668C14.0833 13.6333 13.2998 14.4168 12.3333 14.4168L3.66663 14.4168C2.70013 14.4168 1.91663 13.6333 1.91663 12.6668L1.91663 6.00016L1.91663 4.00016C1.91663 3.03366 2.70013 2.25016 3.66663 2.25016L4.58329 2.25016V1.8335C4.58329 1.41928 4.91908 1.0835 5.33329 1.0835ZM5.33329 3.75016L3.66663 3.75016C3.52855 3.75016 3.41663 3.86209 3.41663 4.00016V5.25016L12.5833 5.25016V4.00016C12.5833 3.86209 12.4714 3.75016 12.3333 3.75016L10.6666 3.75016L5.33329 3.75016ZM12.5833 6.75016L3.41663 6.75016L3.41663 12.6668C3.41663 12.8049 3.52855 12.9168 3.66663 12.9168L12.3333 12.9168C12.4714 12.9168 12.5833 12.8049 12.5833 12.6668L12.5833 6.75016Z"
                                                fill=""></path>
                                        </svg>
                                        Today
                                    </span>

                                    <span
                                        class="flex cursor-pointer items-center gap-1 text-sm text-gray-500 dark:text-gray-400">
                                        <svg class="stroke-current" width="18" height="18" viewBox="0 0 18 18"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9 15.6343C12.6244 15.6343 15.5625 12.6961 15.5625 9.07178C15.5625 5.44741 12.6244 2.50928 9 2.50928C5.37563 2.50928 2.4375 5.44741 2.4375 9.07178C2.4375 10.884 3.17203 12.5246 4.35961 13.7122L2.4375 15.6343H9Z"
                                                stroke="" stroke-width="1.5" stroke-linejoin="round"></path>
                                        </svg>

                                        1
                                    </span>
                                </div>
                            </div>

                            <div
                                class="h-6 w-full max-w-6 overflow-hidden rounded-full border-[0.5px] border-gray-200 dark:border-gray-800">
                                <img src="src/images/user/user-09.jpg" alt="user">
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Completed list -->
                <div class="swim-lane flex flex-col gap-5 p-4 xl:p-6">
                    <div class="mb-1 flex items-center justify-between">
                        <h3 class="flex items-center gap-3 text-base font-medium text-gray-800 dark:text-white/90">
                            Completed
                            <span
                                class="bg-success-50 text-theme-xs text-success-700 dark:bg-success-500/15 dark:text-success-500 inline-flex rounded-full px-2 py-0.5 font-medium">
                                4
                            </span>
                        </h3>

                        <div x-data="{ openDropDown: false }" class="relative">
                            <button @click="openDropDown = !openDropDown" class="text-gray-700 dark:text-gray-400">
                                <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.99902 10.2451C6.96552 10.2451 7.74902 11.0286 7.74902 11.9951V12.0051C7.74902 12.9716 6.96552 13.7551 5.99902 13.7551C5.03253 13.7551 4.24902 12.9716 4.24902 12.0051V11.9951C4.24902 11.0286 5.03253 10.2451 5.99902 10.2451ZM17.999 10.2451C18.9655 10.2451 19.749 11.0286 19.749 11.9951V12.0051C19.749 12.9716 18.9655 13.7551 17.999 13.7551C17.0325 13.7551 16.249 12.9716 16.249 12.0051V11.9951C16.249 11.0286 17.0325 10.2451 17.999 10.2451ZM13.749 11.9951C13.749 11.0286 12.9655 10.2451 11.999 10.2451C11.0325 10.2451 10.249 11.0286 10.249 11.9951V12.0051C10.249 12.9716 11.0325 13.7551 11.999 13.7551C12.9655 13.7551 13.749 12.9716 13.749 12.0051V11.9951Z"
                                        fill=""></path>
                                </svg>
                            </button>
                            <div x-show="openDropDown" @click.outside="openDropDown = false"
                                class="shadow-theme-md dark:bg-gray-dark absolute top-full right-0 z-40 w-[140px] space-y-1 rounded-2xl border border-gray-200 bg-white p-2 dark:border-gray-800"
                                style="display: none;">
                                <button
                                    class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                    Edit
                                </button>
                                <button
                                    class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                    Delete
                                </button>
                                <button
                                    class="text-theme-xs flex w-full rounded-lg px-3 py-2 text-left font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                    Clear All
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- task item -->
                    <div draggable="true"
                        class="task shadow-theme-sm rounded-xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/5">
                        <div class="flex items-start justify-between gap-6">
                            <div>
                                <h4 class="mb-5 text-base text-gray-800 dark:text-white/90">
                                    Manage internal feedback
                                </h4>

                                <div class="flex items-center gap-3">
                                    <span
                                        class="flex cursor-pointer items-center gap-1 text-sm text-gray-500 dark:text-gray-400">
                                        <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.33329 1.0835C5.74751 1.0835 6.08329 1.41928 6.08329 1.8335V2.25016L9.91663 2.25016V1.8335C9.91663 1.41928 10.2524 1.0835 10.6666 1.0835C11.0808 1.0835 11.4166 1.41928 11.4166 1.8335V2.25016L12.3333 2.25016C13.2998 2.25016 14.0833 3.03366 14.0833 4.00016V6.00016L14.0833 12.6668C14.0833 13.6333 13.2998 14.4168 12.3333 14.4168L3.66663 14.4168C2.70013 14.4168 1.91663 13.6333 1.91663 12.6668L1.91663 6.00016L1.91663 4.00016C1.91663 3.03366 2.70013 2.25016 3.66663 2.25016L4.58329 2.25016V1.8335C4.58329 1.41928 4.91908 1.0835 5.33329 1.0835ZM5.33329 3.75016L3.66663 3.75016C3.52855 3.75016 3.41663 3.86209 3.41663 4.00016V5.25016L12.5833 5.25016V4.00016C12.5833 3.86209 12.4714 3.75016 12.3333 3.75016L10.6666 3.75016L5.33329 3.75016ZM12.5833 6.75016L3.41663 6.75016L3.41663 12.6668C3.41663 12.8049 3.52855 12.9168 3.66663 12.9168L12.3333 12.9168C12.4714 12.9168 12.5833 12.8049 12.5833 12.6668L12.5833 6.75016Z"
                                                fill=""></path>
                                        </svg>
                                        Tomorrow
                                    </span>

                                    <span
                                        class="flex cursor-pointer items-center gap-1 text-sm text-gray-500 dark:text-gray-400">
                                        <svg class="stroke-current" width="18" height="18" viewBox="0 0 18 18"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9 15.6343C12.6244 15.6343 15.5625 12.6961 15.5625 9.07178C15.5625 5.44741 12.6244 2.50928 9 2.50928C5.37563 2.50928 2.4375 5.44741 2.4375 9.07178C2.4375 10.884 3.17203 12.5246 4.35961 13.7122L2.4375 15.6343H9Z"
                                                stroke="" stroke-width="1.5" stroke-linejoin="round"></path>
                                        </svg>

                                        1
                                    </span>
                                </div>
                            </div>

                            <div
                                class="h-6 w-full max-w-6 overflow-hidden rounded-full border-[0.5px] border-gray-200 dark:border-gray-800">
                                <img src="src/images/user/user-13.jpg" alt="user">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Task wrapper End -->
        </div>
    </div>
@endsection
@section('script')
    <script>
        speechSynthesis.onvoiceschanged = () => {
            speechSynthesis.getVoices();
        };
        document.getElementById('assigntask').onclick = ()=>{
            let speaktext = document.getElementById('speakassigntask').innerText;
            const speak = new SpeechSynthesisUtterance();
            speak.text = speaktext;
            speak.lang = "hi-IN"; // Hindi voice
            // speak.rate = 1; 
            // speak.pitch = 1;
            const voices = speechSynthesis.getVoices();
            const hindiVoice = voices.find(v => v.lang === "hi-IN");
            if (hindiVoice) speak.voice = hindiVoice;

            speechSynthesis.speak(speak);
        }

    </script>
@endsection
