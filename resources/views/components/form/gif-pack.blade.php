<!-- gif package upload form  -->

<!-- Include stylesheet -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

<div class="flex items-center justify-center min-h-[600px] mb-8 w-full p-3">
    <div class="w-full max-w-2xl p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6 text-slate-800">Create a gif package</h2>
        <form method="POST"
            action="@php echo !empty($gif_pack) ? route('admin.gif-packs.update',$gif_pack->id) : route('admin.gif-packs.submit') @endphp"
            enctype="multipart/form-data">
            @csrf
            <div class="flex justify-between my-1 gap-3">
                <div class="w-full md:w-1/2">
                    <label for="title" class="block text-sm font-medium text-gray-700"> Package title</label>
                    <input type="title" id="title" placeholder="Gif package title" name="title" required autofocus
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('title') border-red-500 @enderror text-slate-800"
                        value="{{ old('title') ?? ($gif_pack->title ?? '') }}">
                    @error('title')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class=" w-full md:w-1/2">
                    <label for="price" class="block text-sm font-medium text-gray-700"> Price</label>
                    <input type="number" min="1" step="0.01" placeholder="14.99" id="price" name="price"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('price') border-red-500 @enderror text-slate-800"
                        value="{{ old('price') ?? ($gif_pack->price ?? '') }}">
                    @error('price')
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
                <div class="w-full md:w-1/2">
                    <label for="gif_archive" class="block text-sm font-medium text-gray-700"> Files from (public/storage/gif_packs/archive)</label>
                    <input type="text" placeholder="gif.zip" id="gif_archive" name="gif_archive"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('gif_archive') border-red-500 @enderror text-slate-800"
                        value="{{ old('gif_archive') ?? ((explode('/',$gif_pack->gif_archive ?? '')[2]) ?? '') }}">
                    @error('gif_archive')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex justify-between my-1 gap-3">
                <div class=" w-full">
                    <label for="status" class="block text-sm font-medium text-gray-700">Public status</label>
                    <select id="status" value=" {{ old('status') ?? ($gif_pack->status ?? '') }}"
                        name="status" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('status') border-red-500 @enderror text-slate-800">
                        <option value="" selected>Select a status</option>
                        <option value="active"
                            @php echo !empty($gif_pack) && $gif_pack->status == 'active' ? 'selected' : '' @endphp>Active
                        </option>
                        <option value="inactive"
                            @php echo !empty($gif_pack) && $gif_pack->status == 'inactive' ? 'selected' : '' @endphp>
                            Inactive</option>
                    </select>
                    @error('status')
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
                    {{ !empty($gif_pack) ? 'Save' : 'Create' }}
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Include the Quill library -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<!-- Initialize Quill editor -->
<script>
    const quill = new Quill('#description', {
        placeholder: 'Gif package description',
        theme: 'snow',
    });

    quill.clipboard.dangerouslyPasteHTML(`{!! $gif_pack->description ?? '' !!}`);

    const hiddenInput = document.getElementById('hiddenContent');

    // Update hidden input whenever content changes
    quill.on('text-change', function() {
        hiddenInput.value = quill.root.innerHTML;
    });

    window.onload = () => {
        const value = $('#status').val();
        premiumChange(value);
    }

</script>
