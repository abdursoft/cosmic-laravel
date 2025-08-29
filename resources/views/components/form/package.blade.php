<!-- Include stylesheet -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

<div class="flex items-center justify-center min-h-[600px] mb-8 p-3 w-full">
    <div class="w-full max-w-2xl p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6 text-slate-800">Subscription package</h2>
        <form method="POST" action="@php echo !empty($package) ? route('admin.package.update',$package->id) : route('admin.package.submit') @endphp" enctype="multipart/form-data">
            @csrf
            <div class="flex justify-between my-1 gap-3">
                <div class="w-full md:w-1/2">
                    <label for="name" class="block text-sm font-medium text-gray-700"> Package Name</label>
                    <input type="name" id="name" placeholder="Subscription package name" name="name" required autofocus
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('name') border-red-500 @enderror text-slate-800"
                        value="{{ old('name') ?? ($package->name ?? '') }}">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class=" w-full md:w-1/2">
                    <label for="price" class="block text-sm font-medium text-gray-700"> Price amount</label>
                    <input type="number" step="0.01" placeholder="20.99" min="1" id="price" name="price"
                        value="{{ old('price') ?? ($package->price ?? '') }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('price') border-red-500 @enderror text-slate-800">
                    @error('price')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex justify-between my-1 gap-3">
                <div class="w-full md:w-1/2">
                    <label for="thumbnail" class="block text-sm font-medium text-gray-700"> Package Thumbnail</label>
                    <input type="file" id="thumbnail" name="thumbnail" autofocus
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('thumbnail') border-red-500 @enderror text-slate-800"
                        value="{{ old('thumbnail') }}">
                    @error('thumbnail')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class=" w-full md:w-1/2">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select type="status" id="status" value=" {{ old('status') ?? (site()->status ?? '') }}"
                        name="status" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('status') border-red-500 @enderror text-slate-800">
                        <option value="" selected>Select a status</option>
                        <option value="active"
                            @php echo !empty($package) && $package->status == 'active' ? 'selected' : '' @endphp>Active
                        </option>
                        <option value="inactive"
                            @php echo !empty($package) && $package->status == 'inactive' ? 'selected' : '' @endphp>
                            Inactive</option>
                    </select>
                    @error('status')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex justify-between my-1 gap-3">
                <div class="w-full">
                    <label for="type" class="block text-sm font-medium text-gray-700">Subscription Type</label>
                    <select type="type" id="type" value=" {{ old('type') ?? (site()->type ?? '') }}"
                        name="type" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('type') border-red-500 @enderror text-slate-800">
                        <option value="" selected>Select a type</option>
                        <option value="monthly"
                            @php echo !empty($package) && $package->type == 'monthly' ? 'selected' : '' @endphp>Monthly
                        </option>
                        <option value="yearly"
                            @php echo !empty($package) && $package->type == 'yearly' ? 'selected' : '' @endphp>Yearly
                        </option>
                        {{-- <option value="lifetime">Lifetime</option> --}}
                    </select>
                    @error('type')
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
                    class="w-full px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    {{ !empty($package) ? 'Save' : 'Create' }}
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
        placeholder: 'Subscription package description',
        theme: 'snow'
    });

    quill.clipboard.dangerouslyPasteHTML(`{!! $package->description ?? '' !!}`);

    const hiddenInput = document.getElementById('hiddenContent');
    hiddenInput.value = quill.root.innerHTML;

    // Update hidden input whenever content changes
    quill.on('text-change', function() {
        hiddenInput.value = quill.root.innerHTML;
    });
</script>
