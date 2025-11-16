@extends('admin.common.layout')
@section('title', 'Chair-CRM : Dashboard')
@section('main')
<div class="col-span-12">
    <div class=" rounded-2xl border border-gray-200 bg-white px-5 py-4 dark:border-gray-800 dark:bg-white/[0.03] xl:px-10 xl:py-12">

        <div class="mb-6 rounded-2xl border border-gray-200 p-5 lg:p-6 dark:border-gray-800">
            <div class="flex flex-col gap-5 xl:flex-row xl:items-center xl:justify-between mb-4">
                <div class="flex w-full flex-col items-center gap-6 xl:flex-row">
                    <div class="h-20 w-20 overflow-hidden rounded-full border border-gray-200 dark:border-gray-800">
                        <img src="{{ asset($data->profile_image ? 'storage/'.$data->profile_image : 'assets/admin/image/profile.png') }}" alt="user" class="object-cover object-center w-full h-full">
                    </div>
                    <div class="order-3 xl:order-2">
                        <h4 class="mb-2 text-center text-lg font-semibold text-gray-800 xl:text-left dark:text-white/90">
                            {{ $data->username }}
                        </h4>
                        <div class="flex flex-col items-center gap-1 text-center xl:flex-row xl:gap-3 xl:text-left">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                {{ $data->role_id == 1 ? 'Super Admin' : ($data->role_id == 2 ? 'Admin' : 'User') }}
                            </p>
                            <div class="hidden h-3.5 w-px bg-gray-300 xl:block dark:bg-gray-700"></div>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Arizona, United States.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex gap-10">
                <div class="">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Phone
                    </p>
                    <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                          {{$data->mobile_number}}
                    </p>
                </div>
                <div class="">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Email
                    </p>
                    <p class="text-sm font-medium text-gray-800 dark:text-white/90">
                          {{$data->email}}
                    </p>
                </div>
                
            
            </div>
        </div>

        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3">
            <article class="flex gap-5 rounded-xl border border-gray-200 bg-white p-4 shadow-xs dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="bg-brand-500/10 text-brand-500 inline-flex h-14 w-14 items-center justify-center rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                        <path d="M4.95833 6.125C3.99183 6.125 3.20833 6.9085 3.20833 7.875V11.2998C4.69996 11.2998 5.9098 12.509 5.9098 14.0006C5.9098 15.4923 4.7006 16.7015 3.20897 16.7015L3.20833 20.125C3.20833 21.0915 3.99183 21.875 4.95833 21.875H23.0417C24.0082 21.875 24.7917 21.0915 24.7917 20.125V16.7015C23.3003 16.7011 22.0915 15.4921 22.0915 14.0006C22.0915 12.5092 23.3003 11.3001 24.7917 11.2998V7.875C24.7917 6.9085 24.0082 6.125 23.0417 6.125H4.95833Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-title-xs mb-1 font-semibold text-gray-800 dark:text-white/90">
                        5,347
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Total tickets
                    </p>
                </div>
            </article>
            <article class="flex gap-5 rounded-xl border border-gray-200 bg-white p-4 shadow-xs dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="bg-warning-500/10 text-warning-500 inline-flex h-14 w-14 items-center justify-center rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="28" viewBox="0 0 29 28" fill="none">
                        <path d="M5.33333 4.66675H24M5.33333 23.3334L24 23.3334M21.6667 4.66675V7.0001C21.6667 10.8661 18.5327 14.0001 14.6667 14.0001M7.66666 4.66675V7.0001C7.66666 10.8661 10.8007 14.0001 14.6667 14.0001M14.6667 14.0001C18.5327 14.0001 21.6667 17.1341 21.6667 21.0001V23.3334M14.6667 14.0001C10.8007 14.0001 7.66666 17.1341 7.66666 21.0001L7.66666 23.3334" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-title-xs mb-1 font-semibold text-gray-800 dark:text-white/90">
                        1,230
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Pending tickets
                    </p>
                </div>
            </article>
            <article class="flex gap-5 rounded-xl border border-gray-200 bg-white p-4 shadow-xs dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="bg-success-500/10 text-success-500 inline-flex h-14 w-14 items-center justify-center rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="28" viewBox="0 0 29 28" fill="none">
                        <path d="M17.8062 11.6598L13.1257 16.3403L10.8605 14.0751M25.125 13.9999C25.125 19.96 20.2934 24.7916 14.3334 24.7916C8.37328 24.7916 3.54169 19.96 3.54169 13.9999C3.54169 8.03985 8.37328 3.20825 14.3334 3.20825C20.2934 3.20825 25.125 8.03985 25.125 13.9999Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-title-xs mb-1 font-semibold text-gray-800 dark:text-white/90">
                        4,117
                    </h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Solved tickets
                    </p>
                </div>
            </article>
        </div>

    </div>

    <div class="mt-5 rounded-2xl border border-gray-200 bg-white px-5 py-7 dark:border-gray-800 dark:bg-white/[0.03] xl:px-10 xl:py-12">
        <div class="w-full max-w-2xl">

            <ul id="tabs" class="flex gap-2 p-2 rounded-xl">
                <li>
                    <button
                        data-tab-target="overview"
                        class="tab-link px-4 py-2 text-sm font-medium rounded-lg menu-dropdown-item-active">
                        Overview
                    </button>
                </li>
                <li>
                    <button
                        data-tab-target="details"
                        class="tab-link px-4 py-2 text-sm font-medium rounded-lg menu-dropdown-item-inactive">
                        Details
                    </button>
                </li>
                <li>
                    <button
                        data-tab-target="comments"
                        class="tab-link px-4 py-2 text-sm font-medium rounded-lg menu-dropdown-item-inactive">
                        Comments
                    </button>
                </li>
            </ul>

            <div id="tab-contents" class="mt-4">
                <div id="overview" class="tab-content text-gray-700">This is the Overview panel. Add summary content here.</div>
                <div id="details" class="tab-content hidden text-gray-700">This is the Details panel. Add more detailed content here.</div>
                <div id="comments" class="tab-content hidden text-gray-700">This is the Comments panel. Add comments or a form here.</div>
            </div>

        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.tab-link');
        const contents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.classList.add('menu-dropdown-item', 'group');

            tab.addEventListener('click', () => {
                const target = tab.getAttribute('data-tab-target');

                // Reset all buttons
                tabs.forEach(t => {
                    t.classList.remove('menu-dropdown-item-active');
                    t.classList.add('menu-dropdown-item-inactive');
                });

                // Hide all contents
                contents.forEach(c => c.classList.add('hidden'));

                // Activate clicked button
                tab.classList.remove('menu-dropdown-item-inactive');
                tab.classList.add('menu-dropdown-item-active');

                // Show corresponding content
                document.getElementById(target).classList.remove('hidden');
            });
        });
    });
</script>
@endsection
@section('script')
@endsection