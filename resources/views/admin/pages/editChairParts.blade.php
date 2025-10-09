@extends('admin.common.layout')
@section('title', 'Chair-CRM : Edit chair parts')
@section('main')
    <div class="col-span-12">
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-5 py-4 sm:px-6 sm:py-5" id="formstatus">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Add Chair Parts
                </h3>
            </div>
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                <form method="post" action="{{route('update-parts')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" placeholder="Product title" name="partsid" value="{{ $data->id }}" class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                    <div class="-mx-2.5 flex flex-wrap gap-y-5">
                        <div class="w-full px-2.5 xl:w-1/2">
                            <input type="text" placeholder="Product title" name="title" value="{{ $data->title }}"
                                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                            <span class="titleerr text-error-500">@error('title') {{$message}} @enderror</span>
                        </div>
                        <div class="w-full px-2.5 xl:w-1/2">
                            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                <select name="catg"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-3 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                    :class="isOptionSelected & amp; & amp;
                                    'text-gray-500 dark:text-gray-400'"
                                    @change="isOptionSelected = true">
                                    <option value="" class="text-gray-500 dark:bg-gray-900 dark:text-gray-400">
                                        --Select Country--
                                    </option>
                                    @foreach ($catgdata as $item)
                                        <option value="{{ $item->category_name }}"
                                            class="text-gray-500 dark:bg-gray-900 dark:text-gray-400"
                                            {{ $item->category_name === $data->catg ? 'selected' : '' }}>
                                            {{ $item->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span
                                    class="absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                                    <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke=""
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </svg>
                                </span>
                            </div>
                            <span class="catg text-error-500">@error('catg') {{$message}} @enderror</span>
                        </div>

                        <div class="w-full px-2.5 xl:w-1/2">
                            <input type="text" placeholder="Product Brand" name="brand" value="{{ $data->brand }}"
                                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                            <span class="brand text-error-500">@error('brand') {{$message}} @enderror</span>
                        </div>
                        <div class="w-full px-2.5 xl:w-1/2">
                            <input type="number" placeholder="Product Price" name="price" value="{{ $data->price }}"
                                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                            <span class="price text-error-500">@error('price') {{$message}} @enderror</span>
                        </div>
                        <div class="w-full px-2.5">
                            <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Message
                            </label>
                            <textarea name="descrition" placeholder="Enter product description" rows="3"
                                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">{{ $data->descrition }}</textarea>
                            <span class="descritionerr text-error-500">@error('descrition') {{$message}} @enderror</span>
                        </div>

                        <div class="w-full px-2.5">
                            <input type="file" name="productimg"
                                class="focus:border-ring-brand-300 shadow-theme-xs focus:file:ring-brand-300 h-11 w-full overflow-hidden rounded-lg border border-gray-300 bg-transparent text-sm text-gray-500 transition-colors file:mr-5 file:border-collapse file:cursor-pointer file:rounded-l-lg file:border-0 file:border-r file:border-solid file:border-gray-200 file:bg-gray-50 file:py-3 file:pr-3 file:pl-3.5 file:text-sm file:text-gray-700 placeholder:text-gray-400 hover:file:bg-gray-100 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400 dark:text-white/90 dark:file:border-gray-800 dark:file:bg-white/[0.03] dark:file:text-gray-400 dark:placeholder:text-gray-400">
                            <span class="descritionerr text-error-500">@error('productimg') {{$message}} @enderror</span>

                        </div>

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
        <div class=" my-4 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="px-6 py-5">
                <h3 class="text-center font-medium text-gray-800 dark:text-white/90">
                    Your Current Image
                </h3>
            </div>
            <div class="border-t border-gray-100 p-4 sm:p-6 dark:border-gray-800">
                <div class="relative">
                    <div id="pane" class="overflow-hidden" style="cursor: default;">
                        <img src="{{ asset('storage/' . $data->product_image) }}" alt="Cover"
                            class="w-full border border-gray-200 rounded-xl dark:border-gray-800">
                    </div>
                    <div id="ghostpane" class="absolute top-0 left-0 duration-300 ease-in-out"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
