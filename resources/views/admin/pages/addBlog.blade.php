@extends('admin.common.layout')
@section('title', 'Chair-CRM : Add Blog')
@section('main')
    <div class="col-span-12">
        <div class="overflow-y-auto">
            {{-- form here --}}
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="px-5 py-4 sm:px-6 sm:py-5">
                    <h3 class="text-center font-medium text-gray-800 dark:text-white/90">
                        Add Blog
                    </h3>
                </div>
                <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                    <form action="{{ route('add_vlog') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="-mx-2.5 flex flex-wrap gap-y-5">
                            <div class="w-full px-2.5 my-5">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Blog Image
                                </label>
                                <input type="file" name="productimg" id="blogimg"
                                    class="focus:border-ring-brand-300 shadow-theme-xs focus:file:ring-brand-300 h-11 w-full overflow-hidden rounded-lg border border-gray-300 bg-transparent text-sm text-gray-500 transition-colors file:mr-5 file:border-collapse file:cursor-pointer file:rounded-l-lg file:border-0 file:border-r file:border-solid file:border-gray-200 file:bg-gray-50 file:py-3 file:pr-3 file:pl-3.5 file:text-sm file:text-gray-700 placeholder:text-gray-400 hover:file:bg-gray-100 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-gray-400 dark:text-white/90 dark:file:border-gray-800 dark:file:bg-white/[0.03] dark:file:text-gray-400 dark:placeholder:text-gray-400">
                                <span class="productimgerr text-error-500">
                                    @error('productimg')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="w-full px-2.5 xl:w-1/2">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Title
                                </label>
                                <input type="text" placeholder="Enter title" name="title" id="titleInput" value="{{old('title')}}"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                                <span style="font-size: 1rem" class="text-theme-xs text-xl text-error-500 mt-1.5">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="w-full px-2.5 xl:w-1/2">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Meta Title
                                </label>
                                <input type="text" placeholder="Enter meta title"name="metatitle" value="{{old('metatitle')}}"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                                <span style="font-size: 1rem" class="text-theme-xs text-xl text-error-500 mt-1.5">
                                    @error('metatitle')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="w-full px-2.5 xl:w-1/2">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Meta Keywords
                                </label>
                                <input type="text" placeholder="Enter keywords" name="metakeyword" value="{{old('metakeyword')}}"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                                <span style="font-size: 1rem" class="text-theme-xs text-xl text-error-500 mt-1.5">
                                    @error('metakeyword')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="w-full px-2.5 xl:w-1/2">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Canonical URL
                                </label>
                                <div
                                    class="flex h-11 w-full rounded-lg border border-gray-300 dark:border-gray-700 overflow-hidden shadow-theme-xs focus-within:ring-3 focus-within:ring-brand-500/10">
                                    <span
                                        class="flex items-center px-4 text-sm text-gray-500 dark:text-white/50 bg-gray-100 dark:bg-gray-800 border-r border-gray-300 dark:border-gray-700 select-none">{{ url('/blog/') }}</span>
                                    <input type="text" name="canonicalurl" id="canonicalInput" value="{{old('canonicalurl')}}"
                                        class="flex-1 dark:bg-dark-900 bg-transparent px-4 py-2.5 text-sm text-gray-800  placeholder:text-gray-400 focus:outline-none dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                        placeholder="your-page">
                                </div>
                                <span style="font-size: 1rem" class="text-theme-xs text-xl text-error-500 mt-1.5">
                                    @error('canonicalurl')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>


                            <div class="w-full px-2.5">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Meta Description
                                </label>
                                <input type="text" name="metadesc" placeholder="Enter meta description" value="{{old('metadesc')}}"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                                <span style="font-size: 1rem" class="text-theme-xs text-xl text-error-500 mt-1.5">
                                    @error('metadesc')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="w-full px-2.5">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Select Subject
                                </label>
                                <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
                                    <select
                                        name="subject"class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 z-20 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                                        :class="isOptionSelected & amp; & amp;
                                        'text-gray-500 dark:text-gray-400'"
                                        @change="isOptionSelected = true">
                                        <option value="" class="text-gray-500 dark:bg-gray-900 dark:text-gray-400">
                                            Select subject
                                        </option>
                                        @foreach ($catgdata as $data)
                                            <option value="{{ $data->category_name }}" {{$data->category_name === old('subject') ? 'selected' : ''}}
                                                class="text-gray-500 dark:bg-gray-900 dark:text-gray-400">
                                                {{ $data->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                                        <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke=""
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                        </svg>
                                    </span>
                                </div>
                                <span style="font-size: 1rem" class="text-theme-xs text-xl text-error-500 mt-1.5">
                                    @error('subject')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="w-full px-2.5">
                                <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                    Description
                                </label>
                                <textarea rows="6" name="description"
                                    class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"
                                    id="summernote"> {{old('description')}}</textarea>
                                <span style="font-size: 1rem" class="text-theme-xs text-xl text-error-500 mt-1.5">
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="w-full px-2.5">
                                <button type="submit"
                                    class="bg-brand-500 hover:bg-brand-600 flex w-full items-center justify-center gap-2 rounded-lg p-3 text-sm font-medium text-white transition-colors">
                                    Add Blog

                                    <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4.98481 2.44399C3.11333 1.57147 1.15325 3.46979 1.96543 5.36824L3.82086 9.70527C3.90146 9.89367 3.90146 10.1069 3.82086 10.2953L1.96543 14.6323C1.15326 16.5307 3.11332 18.4291 4.98481 17.5565L16.8184 12.0395C18.5508 11.2319 18.5508 8.76865 16.8184 7.961L4.98481 2.44399ZM3.34453 4.77824C3.0738 4.14543 3.72716 3.51266 4.35099 3.80349L16.1846 9.32051C16.762 9.58973 16.762 10.4108 16.1846 10.68L4.35098 16.197C3.72716 16.4879 3.0738 15.8551 3.34453 15.2223L5.19996 10.8853C5.21944 10.8397 5.23735 10.7937 5.2537 10.7473L9.11784 10.7473C9.53206 10.7473 9.86784 10.4115 9.86784 9.99726C9.86784 9.58304 9.53206 9.24726 9.11784 9.24726L5.25157 9.24726C5.2358 9.20287 5.2186 9.15885 5.19996 9.11528L3.34453 4.77824Z"
                                            fill=""></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        $('#summernote').summernote({
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style', 'bold', 'italic', 'underline', 'strikethrough', 'clear']],
                ['font', ['fontname', 'fontsize', 'color', 'forecolor', 'backcolor', 'superscript',
                    'subscript'
                ]],
                ['para', ['ul', 'ol', 'paragraph', 'height', 'lineheight']],
                ['insert', ['link', 'picture', 'video', 'table', 'hr', 'codeview']],
                ['view', ['fullscreen', 'codeview', 'help']],
                ['misc', ['undo', 'redo']]
            ],
            fontNames: [
                'Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Merriweather',
                'Roboto', 'Open Sans', 'Lato', 'Montserrat', 'Oswald', 'Raleway', 'Ubuntu',
                'Georgia', 'Times New Roman', 'Verdana', 'Tahoma', 'Trebuchet MS'
            ],
            fontNamesIgnoreCheck: ['Merriweather', 'Roboto', 'Open Sans', 'Lato', 'Montserrat', 'Oswald', 'Raleway',
                'Ubuntu'
            ],
            fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36'],
            lineHeights: ['1.0', '1.2', '1.4', '1.5', '2.0', '3.0'],
            callbacks: {
                onImageUpload: function(files) {
                    // handle image upload here (can be AJAX upload)
                    uploadImage(files[0], this);
                }
            }
        });
    </script> --}}
<!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/2zo19kfcjwbktqla81x3l9yio4qa8j7oktcimlz3b5ckw9sc/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    selector: 'textarea#summernote',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
  });
</script>




    <script>
        function slugify(text) {
            return text.toString().toLowerCase().trim().replace(/[\s\W-]+/g, '-').replace(/^-+|-+$/g, '');
        }

        const titleInput = document.getElementById('titleInput');
        const canonicalInput = document.getElementById('canonicalInput');

        titleInput.addEventListener('input', function() {
            const slug = slugify(titleInput.value);
            canonicalInput.value = slug;
        });
    </script>
@endsection
