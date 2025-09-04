<!-- dynamic page creation form  -->

<!-- Include stylesheet -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

<div class="flex items-center justify-center min-h-[600px] mb-8 w-full p-3">
    <div class="w-full max-w-2xl p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6 text-slate-800">Create a page</h2>
        <form method="POST"
            action="@php echo !empty($page) ? route('admin.pages.update',$page->id) : route('admin.pages.store') @endphp"
            enctype="multipart/form-data">
            @csrf
            <div class="flex justify-between my-1 gap-3">
                <div class="w-full md:w-1/2">
                    <label for="title" class="block text-sm font-medium text-gray-700"> Page title</label>
                    <input type="title" id="title" placeholder="Page Title" name="title" required autofocus
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('title') border-red-500 @enderror text-slate-800"
                        value="{{ old('title') ?? ($page->title ?? '') }}">
                    @error('title')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class=" w-full md:w-1/2">
                    <label for="slug" class="block text-sm font-medium text-gray-700"> Page slug</label>
                    <input type="text" id="slug" placeholder="Page slug home-page" name="slug"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('slug') border-red-500 @enderror text-slate-800"
                        value="{{ old('slug') ?? ($page->slug ?? '') }}">
                    @error('slug')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex justify-between my-1 gap-3">
                <div class=" w-full">
                    <label for="status" class="block text-sm font-medium text-gray-700">Public status</label>
                    <select id="status" value=" {{ old('status') ?? ($page->status ?? '') }}"
                        name="status" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('status') border-red-500 @enderror text-slate-800">
                        <option value="" selected>Select a status</option>
                        <option value="active"
                            @php echo !empty($page) && $page->status == 'active' ? 'selected' : '' @endphp>Active
                        </option>
                        <option value="inactive"
                            @php echo !empty($page) && $page->status == 'inactive' ? 'selected' : '' @endphp>
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
                    {{ !empty($page) ? 'Save' : 'Create' }}
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
        placeholder: 'Pages description...',
        theme: 'snow',
    });

    quill.clipboard.dangerouslyPasteHTML(`{!! $page->description ?? '' !!}`);

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
