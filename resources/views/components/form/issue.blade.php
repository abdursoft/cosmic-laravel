<!-- Include stylesheet -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

<div class="flex items-center justify-center min-h-[600px] mb-8 w-full p-3">
    <div class="w-full max-w-2xl p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6 text-slate-800">Create a magazine</h2>
            <form id="issueForm" method="POST"
                action="@php echo !empty($issue) ? route('admin.issues.update',$issue->id) : route('admin.issues.submit') @endphp"
                enctype="multipart/form-data">
            @csrf
            <div class="flex justify-between my-1 gap-3">
                <div class="w-full md:w-1/2">
                    <label for="title" class="block text-sm font-medium text-gray-700"> Magazine title</label>
                    <input type="title" id="title" placeholder="Magazine name" name="title" required autofocus
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('title') border-red-500 @enderror text-slate-800"
                        value="{{ old('title') ?? ($issue->title ?? '') }}">
                    @error('title')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class=" w-full md:w-1/2">
                    <label for="sub_title" class="block text-sm font-medium text-gray-700"> Sub title</label>
                    <input type="text" id="sub_title" placeholder="Magazine short description" name="sub_title"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('sub_title') border-red-500 @enderror text-slate-800"
                        value="{{ old('sub_title') ?? ($issue->sub_title ?? '') }}">
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
                <div class="w-full md:w-1/2">
                    <label for="issue" class="block text-sm font-medium text-gray-700"> Magazine file (zip)</label>
                    <input type="file" accept=".zip" id="issue" name="issue"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('thumbnail') border-red-500 @enderror text-slate-800"
                        value="{{ old('issue') }}">
                    @error('issue')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex justify-between my-1 gap-3">
                <div class=" w-full">
                    <label for="issue_type" class="block text-sm font-medium text-gray-700">Public status</label>
                    <select id="issue_type" onchange="premiumChange(this.value)" value=" {{ old('issue_type') ?? ($issue->issue_type ?? '') }}"
                        name="issue_type" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('issue_type') border-red-500 @enderror text-slate-800">
                        <option value="" selected>Select a status</option>
                        <option value="premium"
                            @php echo !empty($issue) && $issue->issue_type == 'premium' ? 'selected' : '' @endphp>Premium
                        </option>
                        <option value="free"
                            @php echo !empty($issue) && $issue->issue_type == 'free' ? 'selected' : '' @endphp>
                            Free</option>
                    </select>
                    @error('issue_type')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="w-full my-3 hidden premiumBox">
                <p class="text-base mb-2 text-gray-700">Include packages</p>
                <div class="flex items-center gap-4">
                    @if(!empty(packages()))
                        @foreach(packages() as $package)
                            <div class="w-full flex items-center gap-2 md:w-1/4">
                                <input type="checkbox" name="packages[]" value="{{$package->id}}" @php if(!empty($issue) && check_package($issue->id, $package->id)){ echo 'checked';} @endphp id="pack_{{$package->id}}"> <label for="pack_{{$package->id}}" class="line-clamp-1 overflow-hidden text-gray-700">{{$package->name}}</label>
                            </div>
                        @endforeach
                    @endif
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
                    {{ !empty($issue) ? 'Save' : 'Create' }}
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

    quill.clipboard.dangerouslyPasteHTML(`{!! $issue->description ?? '' !!}`);

    const hiddenInput = document.getElementById('hiddenContent');

    // Update hidden input whenever content changes
    quill.on('text-change', function() {
        hiddenInput.value = quill.root.innerHTML;
    });

    function premiumChange(e) {
        const box = $(".premiumBox");
        if (e === 'premium') {
            box.removeClass('hidden');
        } else {
            $('input[type="checkbox"]').prop('checked', false);
            box.addClass('hidden');
        }
    }

    window.onload = () => {
        const value = $('#issue_type').val();
        premiumChange(value);
    }


    const form = document.getElementById('issueForm');
    const progressWrapper = document.getElementById('progressWrapper');
    const progressBar = document.getElementById('progressBar');
    const progressText = document.getElementById('progressText');

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const url = form.getAttribute('action');
        console.log(url);
        const formData = new FormData(form);

        // Show progress bar
        progressWrapper.classList.remove('hidden');
        progressBar.style.width = '0%';
        progressText.innerText = '0%';

        const xhr = new XMLHttpRequest();
        xhr.open("POST", url, true);
        xhr.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");

        // Track upload progress
        xhr.upload.addEventListener("progress", function (e) {
            if (e.lengthComputable) {
                const percent = Math.round((e.loaded / e.total) * 100);
                progressBar.style.width = percent + "%";
                progressText.innerText = percent + "%";
            }
        });

        // On success
        xhr.onload = function () {
            if (xhr.status === 200) {
                alert("Upload successful!");
                // window.location.reload(); // or redirect if needed
            } else {
                alert("Upload failed: " + xhr.statusText);
            }
        };

        // On error
        xhr.onerror = function () {
            alert("Something went wrong!");
        };

        xhr.send(formData);
    });


</script>
