@extends('admin.common.layout')
@section('title', 'Chair-CRM : Active users')
@section('main')
    <div class="col-span-12">
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] sm:col-span-1">
            <div class="border-t border-gray-100 p-6 dark:border-gray-800 ">
                {{-- Added flex container for alignment --}}
                <div class="flex items-center justify-between">
                    <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                        Rejected Users List
                    </h3>

                    <div>
                        
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
                                <div class="flex items-center">
                                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                        Email
                                    </p>
                                </div>
                            </th>
                            <th class="px-6 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                        Phone
                                    </p>
                                </div>
                            </th>
                            <th class="px-6 py-3 whitespace-nowrap">
                                <div class="flex items-center">
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
                                <td class="p-4 whitespace-nowrap">
                                    <a href="{{ route('account-activate',$user->id) }}"><button class="flex h-10 w-full max-w-10 items-center justify-center rounded-lg border border-gray-200 text-gray-500 transition-colors hover:bg-gray-100 hover:text-gray-700 dark:border-gray-800 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.72763 4.33443C7.92401 3.6437 9.30836 3.34945 10.6823 3.49385C12.0562 3.63826 13.3491 4.2139 14.3757 5.13828C15.0468 5.74252 15.5815 6.4755 15.9517 7.28815L13.6069 6.49282C13.2147 6.35977 12.7888 6.5699 12.6557 6.96216C12.5227 7.35443 12.7328 7.78028 13.1251 7.91333L16.8227 9.16752C16.8668 9.18743 16.9129 9.20314 16.9605 9.21426L17.0868 9.25712C17.2752 9.32101 17.4813 9.30746 17.6597 9.21943C17.838 9.1314 17.9741 8.97611 18.038 8.78772L19.3816 4.82561C19.5147 4.43334 19.3045 4.0075 18.9122 3.87447C18.52 3.74145 18.0941 3.95161 17.9611 4.34388L17.2335 6.48938C16.783 5.5609 16.1553 4.72223 15.3794 4.02356C14.1174 2.88722 12.528 2.17958 10.839 2.00207C9.15012 1.82455 7.44834 2.18628 5.97763 3.03539C4.50692 3.88451 3.34277 5.17743 2.65203 6.72884C1.9613 8.28025 1.77944 10.0105 2.13252 11.6716C2.4856 13.3328 3.3555 14.8395 4.61753 15.9758C5.87957 17.1121 7.46894 17.8198 9.15788 17.9973C10.8468 18.1748 12.5486 17.8131 14.0193 16.964C14.378 16.7569 14.5009 16.2982 14.2938 15.9395C14.0867 15.5807 13.628 15.4578 13.2693 15.6649C12.0729 16.3557 10.6886 16.6499 9.31467 16.5055C7.94077 16.3611 6.64786 15.7855 5.62123 14.8611C4.5946 13.9367 3.88697 12.711 3.59974 11.3598C3.31252 10.0085 3.46046 8.60098 4.02235 7.33894C4.58424 6.07691 5.53125 5.02516 6.72763 4.33443Z" fill="currentColor"></path>
                                        </svg>
                                    </button></a>
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
{{-- <script>
    $(document).ready(function(){
        // $(".changeusertype").on('change',function(){
        //     var userId = $(this).attr('id');
        //     var roleId = $(this).val();
        //     $.ajax({
        //         url : "{{ route('changeuser') }}",
        //         type : "POST",
        //         data : {"_token" : " {{ csrf_token() }}", userid : userId, roleid : roleId},
        //         success : function(data){
        //             if(data.success === true){
        //                 Swal.fire({
        //                     title: "Updated!",
        //                     text: data.message,
        //                     icon: "success"
        //                 });
        //             }else{
        //                 Swal.fire({
        //                     title: "Error!",
        //                     text: data.message,
        //                     icon: "error"
        //                 });
        //             }
        //         },
        //         error: function(xhr) {
        //         let message = "Something went wrong.";
        //         if (xhr.responseJSON && xhr.responseJSON.message) {
        //             message = xhr.responseJSON.message;
        //         } else if (xhr.responseText) {
        //             try {
        //                 const json = JSON.parse(xhr.responseText);
        //                 message = json.message || message;
        //             } catch {
        //                 message = xhr.responseText;
        //             }
        //         }
        //         Swal.fire({
        //             title: "Error!",
        //             text: message,
        //             icon: "error",
        //             confirmButtonColor: "#d33"
        //         });
        //     }
        //     });
        // });

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
</script> --}}
@endsection
