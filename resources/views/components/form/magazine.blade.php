<!-- magazine package upload form  -->

<!-- Include stylesheet -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

<div class="flex items-center justify-center min-h-[600px] mb-8 w-full p-3">
    <div class="w-full max-w-2xl p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6 text-slate-800">Create a magazine</h2>
            <form id="magazineForm" method="POST"
                action="@php echo !empty($magazine) ? route('admin.magazine.update',$magazine->id) : route('admin.magazine.submit') @endphp"
                enctype="multipart/form-data">
            @csrf
            <div class="flex justify-between my-1 gap-3">
                <div class="w-full md:w-1/2">
                    <label for="title" class="block text-sm font-medium text-gray-700"> Magazine title</label>
                    <input type="title" id="title" placeholder="Magazine name" name="title" required autofocus
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('title') border-red-500 @enderror text-slate-800"
                        value="{{ old('title') ?? ($magazine->title ?? '') }}">
                    @error('title')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class=" w-full md:w-1/2">
                    <label for="sub_title" class="block text-sm font-medium text-gray-700"> Sub title</label>
                    <input type="text" id="sub_title" placeholder="Magazine short description" name="sub_title"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('sub_title') border-red-500 @enderror text-slate-800"
                        value="{{ old('sub_title') ?? ($magazine->title ?? '') }}">
                    @error('sub_title')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex justify-between my-1 gap-3">
                <div class="w-full md:w-1/2">
                    <label for="thumbnail" class="block text-sm font-medium text-gray-700"> Thumbnail</label>
                    <input type="file" id="thumbnail" name="thumbnail"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('thumbnail') border-red-500 @enderror text-slate-800"
                        value="{{ old('thumbnail') }}">
                    @error('thumbnail')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class=" w-full md:w-1/2">
                    <label for="archive_access" class="block text-sm font-medium text-gray-700">Archive access</label>
                    <select id="archive_access" value=" {{ old('archive_access') ?? ($magazine->archive_access ?? '') }}"
                        name="archive_access" required
                        class="mt-1 block w-full px-3 py-[10px] border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('archive_access') border-red-500 @enderror text-slate-800">
                        <option value="0">Select an access</option>
                        <option value="1" @isset($magazine)@if($magazine->archive_access == '1') ? 'selected' : '' @endif @endisset>Yes</option>
                        <option value="0" @isset($magazine) @if($magazine->archive_access == '0') ? 'selected' : '' @endif @endisset>No</option>

                    </select>
                    @error('archive_access')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex justify-between my-1 gap-3">
                <div class=" w-full md:w-1/2">
                    <label for="archive_days" class="block text-sm font-medium text-gray-700"> Archive in (Days)</label>
                    <input type="number" min="1" max="90" id="archive_days" placeholder="Magazine short description" name="archive_days"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('sub_title') border-red-500 @enderror text-slate-800"
                        value="{{ old('archive_days') ?? ($magazine->archive_days ?? '90') }}">
                    @error('archive_days')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full md:w-1/2">
                    <label for="publish_date" class="block text-sm font-medium text-gray-700"> Publishable Date</label>
                    <input type="date" id="publish_date" name="publish_date" required autofocus
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('title') border-red-500 @enderror text-slate-800"
                        value="{{ old('publish_date') ?? (date('Y-m-d',strtotime(isset($magazine) ? $magazine->publish_date : '+7 days')) ?? '+7 days') }}">
                    @error('title')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex justify-between my-1 gap-3 mb-20">
                <div class=" w-full">
                    <label for="description" class="block text-sm font-medium text-gray-700"> Description</label>
                    <div id="description" class="text-slate-800"></div>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="description" id="hiddenContent">
            </div>
            <div>
                <button type="submit"
                    class="w-full px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 mt-5">
                    {{ !empty($magazine) ? 'Save' : 'Create' }}
                </button>
            </div>

            <div id="progressWrapper" class="hidden w-full mt-4">
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div id="progressBar" class="bg-indigo-600 h-3 rounded-full" style="width: 0%"></div>
                </div>
                <p id="progressText" class="text-sm text-gray-600 mt-1">0%</p>
            </div>
        </form>
    </div>
</div>

<!-- Include the Quill library -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<!-- Initialize Quill editor -->
<script>
    const quill = new Quill('#description', {
        placeholder: 'Magazine description',
        theme: 'snow',
    });

    quill.clipboard.dangerouslyPasteHTML(`{!! $magazine->description ?? '' !!}`);

    const hiddenInput = document.getElementById('hiddenContent');

    // Update hidden input whenever content changes
    quill.on('text-change', function() {
        hiddenInput.value = quill.root.innerHTML;
    });

</script>
