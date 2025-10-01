@extends('admin.common.layout')
@section('title', 'Chair-CRM : Dashboard')
@section('main')
    <div class="flex justify-center w-full col-span-12">
        <div class="w-full max-w-2xl"> <!-- Limit max width -->
            <div class="space-y-6">
                <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">

                    <!-- Header -->
                    <div class="px-5 py-4 sm:px-6 sm:py-5">
                        <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                            Edit Category
                        </h3>
                    </div>

                    <!-- Form Body -->
                    <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                        <form action="{{route('update-catg')}}" method="POST">
                            @csrf
                            
                            <div class="-mx-2.5 flex flex-wrap gap-y-5">

                                <div class="w-full px-2.5">
                                <input type="hidden" name="catgid" value="{{$editdata->id}}"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-none dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />

                            </div>
                                
                                <!-- Password Field -->
                                <div class="w-full px-2.5">
                                    <input type="text" name="editcatg" value="{{$editdata->category_name ,old('editcatg')}}"
                                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-none dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                                        <span style="font-size: 1rem" class="text-theme-xs text-xl text-error-500 mt-1.5">
                                            @error('editcatg') {{$message}} @enderror
                                        </span>
                                </div>

                                <!-- Submit Button -->
                                <div class="w-full px-2.5">
                                    <button type="submit"
                                        class="bg-brand-500 hover:bg-brand-600 w-full rounded-lg p-3 text-sm font-medium text-white transition-colors">
                                        Submit
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
