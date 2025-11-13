@extends('admin.common.layout')
@section('title', 'Chair-CRM : Service')
@section('main')
    <div class="col-span-12" x-data="{ isModalOpen: false, }">
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] sm:col-span-1">
            <div class="px-6 py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90 text-center">
                    All About Services
                </h3>
            </div>
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
            {{-- MODIFIED SECTION START --}}
            <div class="border-t border-gray-100 p-6 dark:border-gray-800 ">
                {{-- Added flex container for alignment --}}
                <div class="flex items-center justify-between">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        Services List
                    </h3>

                    <div>
                        <a href="{{ route('addservice') }}">
                            <button
                                class="px-4 py-3 text-sm font-medium text-white inline-flex rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600">
                                Add Services
                                <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.2502 4.99951C9.2502 4.5853 9.58599 4.24951 10.0002 4.24951C10.4144 4.24951 10.7502 4.5853 10.7502 4.99951V9.24971H15.0006C15.4148 9.24971 15.7506 9.5855 15.7506 9.99971C15.7506 10.4139 15.4148 10.7497 15.0006 10.7497H10.7502V15.0001C10.7502 15.4143 10.4144 15.7501 10.0002 15.7501C9.58599 15.7501 9.2502 15.4143 9.2502 15.0001V10.7497H5C4.58579 10.7497 4.25 10.4139 4.25 9.99971C4.25 9.5855 4.58579 9.24971 5 9.24971H9.2502V4.99951Z"
                                        fill=""></path>
                                </svg>
                            </button>
                        </a>
                    </div>
                </div>
            </div>

            {{-- TABLE START FROM HERE --}}
            <div class="max-w-full overflow-x-auto custom-scrollbar">
                <table class="min-w-full">
                    <!-- table header start -->
                    <thead class="border-y border-gray-100 bg-gray-50 dark:border-gray-800 dark:bg-gray-900">
                        <tr>
                            <!-- Sr. No. -->
                            <th class="px-6 py-3 text-left whitespace-nowrap">
                                <div x-data="{ checked: false }" class="flex items-center gap-3">
                                    <input type="checkbox" x-model="checked"
                                        class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" />
                                    <span class="block font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                        Sr. no.
                                    </span>
                                </div>
                            </th>

                            <!-- Image -->
                            <th class="px-6 py-3 text-left whitespace-nowrap">
                                <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                    Image
                                </p>
                            </th>

                            <!-- Date -->
                            <th class="px-6 py-3 text-left whitespace-nowrap">
                                <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                    Date
                                </p>
                            </th>

                            <!-- Status -->
                            <th class="px-6 py-3 text-left whitespace-nowrap">
                                <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                    Status
                                </p>
                            </th>

                            <!-- Action -->
                            <th class="px-6 py-3 text-left whitespace-nowrap">
                                <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                    Action
                                </p>
                            </th>
                        </tr>
                    </thead>

                    <!-- table header end -->

                    <!-- table body start -->
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                        @php
                            use Illuminate\Support\Facades\Crypt;
                            $sno = 1;
                        @endphp
                        @foreach ($data as $services)
                        <tr>
                            <td class="px-6 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div x-data="{ checked: false }" class="flex items-center gap-3">

                                        <div>
                                            <span class="block font-medium text-gray-700 text-theme-sm dark:text-gray-400">
                                                {{$sno}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <p class="text-gray-700 text-theme-sm dark:text-gray-400">

                                        <a href="{{ asset('storage/'.$services->service_img) }}" target="_blank">View Image</a>
                                    </p>
                                </div>
                            </td>
                            <td class="px-6 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <p class="text-gray-700 text-theme-sm dark:text-gray-400">
                                        {{$services->title}}
                                    </p>
                                </div>
                            </td>

                            <td class="px-5 py-3 whitespace-nowrap">
                                <div x-data="{ switcherToggle: 'false' }">
                                    <label for="{{ $services->id }}" class="cursor-pointer">
                                        <div class="relative"><input type="checkbox" class="sr-only changeStatus"
                                                @change="switcherToggle = !switcherToggle" id="{{ $services->id }}">
                                            <div class="block h-6 w-11 rounded-full transition-colors duration-200"
                                                :class="switcherToggle ? 'bg-success-500' : 'bg-red-500'"></div>
                                            <div :class="switcherToggle ? 'translate-x-full' : 'translate-x-0'"
                                                class="absolute top-0.5 left-0.5 h-5 w-5 rounded-full bg-white shadow-theme-sm transition-transform duration-200 ease-linear">
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </td>
                            <td class="px-6 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <svg class="dltbtn cursor-pointer hover:fill-error-500 dark:hover:fill-error-500 fill-gray-700 dark:fill-gray-400"
                                        @click="isModalOpen = !isModalOpen" id="abcd" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M6.54142 3.7915C6.54142 2.54886 7.54878 1.5415 8.79142 1.5415H11.2081C12.4507 1.5415 13.4581 2.54886 13.4581 3.7915V4.0415H15.6252H16.666C17.0802 4.0415 17.416 4.37729 17.416 4.7915C17.416 5.20572 17.0802 5.5415 16.666 5.5415H16.3752V8.24638V13.2464V16.2082C16.3752 17.4508 15.3678 18.4582 14.1252 18.4582H5.87516C4.63252 18.4582 3.62516 17.4508 3.62516 16.2082V13.2464V8.24638V5.5415H3.3335C2.91928 5.5415 2.5835 5.20572 2.5835 4.7915C2.5835 4.37729 2.91928 4.0415 3.3335 4.0415H4.37516H6.54142V3.7915ZM14.8752 13.2464V8.24638V5.5415H13.4581H12.7081H7.29142H6.54142H5.12516V8.24638V13.2464V16.2082C5.12516 16.6224 5.46095 16.9582 5.87516 16.9582H14.1252C14.5394 16.9582 14.8752 16.6224 14.8752 16.2082V13.2464ZM8.04142 4.0415H11.9581V3.7915C11.9581 3.37729 11.6223 3.0415 11.2081 3.0415H8.79142C8.37721 3.0415 8.04142 3.37729 8.04142 3.7915V4.0415ZM8.3335 7.99984C8.74771 7.99984 9.0835 8.33562 9.0835 8.74984V13.7498C9.0835 14.1641 8.74771 14.4998 8.3335 14.4998C7.91928 14.4998 7.5835 14.1641 7.5835 13.7498V8.74984C7.5835 8.33562 7.91928 7.99984 8.3335 7.99984ZM12.4168 8.74984C12.4168 8.33562 12.081 7.99984 11.6668 7.99984C11.2526 7.99984 10.9168 8.33562 10.9168 8.74984V13.7498C10.9168 14.1641 11.2526 14.4998 11.6668 14.4998C12.081 14.4998 12.4168 14.1641 12.4168 13.7498V8.74984Z"
                                            fill="" />
                                    </svg>
                                    <a href="{{route('edit-service',Crypt::encrypt($services->id))}}">
                                        <svg class="cursor-pointer fill-current text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-white/90"width="21"
                                            height="21" viewBox="0 0 21 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M17.0911 3.53206C16.2124 2.65338 14.7878 2.65338 13.9091 3.53206L5.6074 11.8337C5.29899 12.1421 5.08687 12.5335 4.99684 12.9603L4.26177 16.445C4.20943 16.6931 4.286 16.9508 4.46529 17.1301C4.64458 17.3094 4.90232 17.3859 5.15042 17.3336L8.63507 16.5985C9.06184 16.5085 9.45324 16.2964 9.76165 15.988L18.0633 7.68631C18.942 6.80763 18.942 5.38301 18.0633 4.50433L17.0911 3.53206ZM14.9697 4.59272C15.2626 4.29982 15.7375 4.29982 16.0304 4.59272L17.0027 5.56499C17.2956 5.85788 17.2956 6.33276 17.0027 6.62565L16.1043 7.52402L14.0714 5.49109L14.9697 4.59272ZM13.0107 6.55175L6.66806 12.8944C6.56526 12.9972 6.49455 13.1277 6.46454 13.2699L5.96704 15.6283L8.32547 15.1308C8.46772 15.1008 8.59819 15.0301 8.70099 14.9273L15.0436 8.58468L13.0107 6.55175Z"
                                                fill="" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @php
                            $sno++
                        @endphp
                        @endforeach
                    </tbody>
                    <!-- table body end -->
                </table>
            </div>

        </div>

        {{-- DELETE MODAL CODE --}}
        <div x-show="isModalOpen" class="fixed inset-0 flex items-center justify-center p-5 overflow-y-auto modal z-99999"
            style="display: none;">
            <div class="modal-close-btn fixed inset-0 h-full w-full bg-gray-400/50 backdrop-blur-[32px]"></div>
            <div @click.outside="isModalOpen = false"
                class="relative w-full max-w-[600px] rounded-3xl bg-white p-6 dark:bg-gray-900 lg:p-10">
                <!-- close btn -->
                <button @click="isModalOpen = false"
                    class="absolute right-3 top-3 z-999 flex h-9.5 w-9.5 items-center justify-center rounded-full bg-gray-100 text-gray-400 transition-colors hover:bg-gray-200 hover:text-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white sm:right-6 sm:top-6 sm:h-11 sm:w-11">
                    X
                </button>

                <div class="text-center">
                    <div class="relative flex items-center justify-center z-1 mb-7">
                        <svg class="fill-error-50 dark:fill-error-500/15" width="90" height="90"
                            viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M34.364 6.85053C38.6205 -2.28351 51.3795 -2.28351 55.636 6.85053C58.0129 11.951 63.5594 14.6722 68.9556 13.3853C78.6192 11.0807 86.5743 21.2433 82.2185 30.3287C79.7862 35.402 81.1561 41.5165 85.5082 45.0122C93.3019 51.2725 90.4628 63.9451 80.7747 66.1403C75.3648 67.3661 71.5265 72.2695 71.5572 77.9156C71.6123 88.0265 60.1169 93.6664 52.3918 87.3184C48.0781 83.7737 41.9219 83.7737 37.6082 87.3184C29.8831 93.6664 18.3877 88.0266 18.4428 77.9156C18.4735 72.2695 14.6352 67.3661 9.22531 66.1403C-0.462787 63.9451 -3.30193 51.2725 4.49185 45.0122C8.84391 41.5165 10.2138 35.402 7.78151 30.3287C3.42572 21.2433 11.3808 11.0807 21.0444 13.3853C26.4406 14.6722 31.9871 11.951 34.364 6.85053Z"
                                fill="" fill-opacity=""></path>
                        </svg>

                        <span class="absolute -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2">
                            <svg class="fill-error-600 dark:fill-error-500" width="38" height="38"
                                viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.62684 11.7496C9.04105 11.1638 9.04105 10.2141 9.62684 9.6283C10.2126 9.04252 11.1624 9.04252 11.7482 9.6283L18.9985 16.8786L26.2485 9.62851C26.8343 9.04273 27.7841 9.04273 28.3699 9.62851C28.9556 10.2143 28.9556 11.164 28.3699 11.7498L21.1198 18.9999L28.3699 26.25C28.9556 26.8358 28.9556 27.7855 28.3699 28.3713C27.7841 28.9571 26.8343 28.9571 26.2485 28.3713L18.9985 21.1212L11.7482 28.3715C11.1624 28.9573 10.2126 28.9573 9.62684 28.3715C9.04105 27.7857 9.04105 26.836 9.62684 26.2502L16.8771 18.9999L9.62684 11.7496Z"
                                    fill=""></path>
                            </svg>
                        </span>
                    </div>

                    <h4 class="mb-2 text-2xl font-semibold text-gray-800 dark:text-white/90 sm:text-title-sm">
                        Are you sure ?
                    </h4>
                    <h5 class="text-xl leading-6 text-gray-500 dark:text-gray-400">Your this action can't be rollback.
                        Please think before you do this</h5>

                    <div class="flex items-center justify-center w-full gap-3 mt-7">
                        <button type="button" id=""
                            class="dlt-confirm-btn flex justify-center w-full px-4 py-3 text-sm font-medium text-white rounded-lg bg-error-500 shadow-theme-xs hover:bg-error-600 sm:w-auto">
                            Yes, Delete it
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{-- END MODAL CODE --}}
    </div>
@endsection
@section('script')
    {{-- <script>
        $(document).ready(function() {
            $('.dltbtn').on('click', function() {
                let id = $(this).attr('id');
                $('.dlt-confirm-btn').attr('id', id);
            });
            $('.dlt-confirm-btn').on('click', function() {
                let id = $(this).attr('id');
                $.ajax({
                    url: "{{ route('delete_blog') }}",
                    type: "post",
                    data: {
                        "_token": '{{ csrf_token() }}',
                        "id": id
                    },
                    datatype: "json",
                    success: function(data) {
                        if (data.success === true) {
                            alert(data.message);
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    }
                });
            });
            $('.changeStatus').on('change', function() {
                let id = $(this).attr('id');
                $.ajax({
                    url: "{{ route('statuschange') }}",
                    type: "post",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    datatype: 'json',
                    success: function(data) {
                        if (data.success === true) {
                            alert(data.message);
                            setTimeout(() => {
                                location.reload();
                            }, 1000);
                        }
                    }
                })
            });

        });
    </script> --}}
@endsection
