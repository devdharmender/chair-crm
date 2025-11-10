@extends('admin.common.layout')
@section('title', 'Chair-CRM : Active users')
@section('main')
    <div class="col-span-12">
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] sm:col-span-1">
            <div class="border-t border-gray-100 p-6 dark:border-gray-800 ">
                {{-- Added flex container for alignment --}}
                <div class="flex items-center justify-between">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        Users List
                    </h3>

                    <div>
                        <a href="{{ route('addusers') }}">
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

            {{-- TABLE START FROM HERE --}}
            <div class="max-w-full overflow-x-auto custom-scrollbar">
                <table class="min-w-full">
                    <!-- table header start -->
                    <thead class="border-gray-100 border-y bg-gray-50 dark:border-gray-800 dark:bg-gray-900">
                        <tr>
                            <th class="px-6 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div x-data="{ checked: false }" class="flex items-center gap-3">

                                        <div>
                                            <span class="block font-medium text-gray-500 text-theme-xs dark:text-gray-400">
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
                                            <span class="block font-medium text-gray-500 text-theme-xs dark:text-gray-400">
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
                        @foreach ($user as $user)
                        
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
                                                    {{ $toggleId = 'U-' . $user->id; }}
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
                  
                                <td class="px-5 py-3 whitespace-nowrap">
                                    <div x-data="{ switcherToggle: {{ $user->status === 'active' ? 'true' : 'false' }} }">
                                        <label for="{{ $user->id }}-status" class="cursor-pointer">
                                            <div class="relative"><input type="checkbox" id="{{ $user->id }}-status" 
                                                class="sr-only changeStatus" @change="switcherToggle = !switcherToggle">
                                                <div class="block h-6 w-11 rounded-full transition-colors duration-200"
                                                    :class="switcherToggle ? 'bg-success-500' : 'bg-red-500'"></div>
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
                                            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.99902 10.245C6.96552 10.245 7.74902 11.0285 7.74902 11.995V12.005C7.74902 12.9715 6.96552 13.755 5.99902 13.755C5.03253 13.755 4.24902 12.9715 4.24902 12.005V11.995C4.24902 11.0285 5.03253 10.245 5.99902 10.245ZM17.999 10.245C18.9655 10.245 19.749 11.0285 19.749 11.995V12.005C19.749 12.9715 18.9655 13.755 17.999 13.755C17.0325 13.755 16.249 12.9715 16.249 12.005V11.995C16.249 11.0285 17.0325 10.245 17.999 10.245ZM13.749 11.995C13.749 11.0285 12.9655 10.245 11.999 10.245C11.0325 10.245 10.249 11.0285 10.249 11.995V12.005C10.249 12.9715 11.0325 13.755 11.999 13.755C12.9655 13.755 13.749 12.9715 13.749 12.005V11.995Z"
                                                    fill=""></path>
                                            </svg>
                                        </button>
                                        <div x-show="open" @click.outside="open = false"
                                            class="shadow-theme-lg dark:bg-gray-dark fixed w-40 space-y-1 rounded-2xl border border-gray-200 bg-white p-2 dark:border-gray-800"
                                            x-ref="dropdown" style="display: none;">
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
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $(".changeusertype").on('change',function(){
            var userId = $(this).attr('id');
            var roleId = $(this).val();
            $.ajax({
                url : "{{ route('changeuser') }}",
                type : "POST",
                data : {"_token" : " {{ csrf_token() }}", userid : userId, roleid : roleId},
                success : function(data){
                    if(data.success === true){
                        Swal.fire({
                            title: "Updated!",
                            text: data.message,
                            icon: "success"
                        });
                    }else{
                        Swal.fire({
                            title: "Error!",
                            text: data.message,
                            icon: "error"
                        });
                    }
                },
                error: function(xhr) {
                let message = "Something went wrong.";
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                } else if (xhr.responseText) {
                    try {
                        const json = JSON.parse(xhr.responseText);
                        message = json.message || message;
                    } catch {
                        message = xhr.responseText;
                    }
                }
                Swal.fire({
                    title: "Error!",
                    text: message,
                    icon: "error",
                    confirmButtonColor: "#d33"
                });
            }
            });
        });

        $('.changeStatus').on('change',function(){
            var userId = $(this).attr('id');
            $.ajax({
                url : "{{route('update-status')}}",
                type: "post",
                data : {"_token" : " {{ csrf_token() }}", userid : userId},
                success : function(data){
                    if(data.success === true){
                        Swal.fire({
                            title: "Updated!",
                            text: data.message,
                            icon: "success"
                        });
                    }else{
                        Swal.fire({
                            title: "Error!",
                            text: data.message,
                            icon: "error"
                        });
                    }
                },
                error: function(xhr) {
                    let message = "Something went wrong.";
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        message = xhr.responseJSON.message;
                    } else if (xhr.responseText) {
                        try {
                            const json = JSON.parse(xhr.responseText);
                            message = json.message || message;
                        } catch {
                            message = xhr.responseText;
                        }
                    }
                    Swal.fire({
                        title: "Error!",
                        text: message,
                        icon: "error",
                        confirmButtonColor: "#d33"
                    });
                }
                
            });
        });


    });
</script>
@endsection
