<!-- site information form  -->

<div class="flex items-center justify-center min-h-[82vh] w-full">
    <div class="w-full max-w-2xl p-8 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6 text-slate-800">Configure site settings</h2>
        <form method="POST" action="{{ route('admin.site-setting.submit') }}" enctype="multipart/form-data">
            @csrf
            <div class="flex justify-between my-1 gap-3">
                <div class="w-full md:w-1/2">
                    <label for="name" class="block text-sm font-medium text-gray-700"> Site Name</label>
                    <input type="name" id="name" placeholder="Site Name" name="name" required autofocus
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('name') border-red-500 @enderror text-slate-800"
                        value="{{ old('name') ?? (site()->name ?? '') }}">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class=" w-full md:w-1/2">
                    <label for="logo" class="block text-sm font-medium text-gray-700"> Logo</label>
                    <input type="file" id="logo" name="logo"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('logo') border-red-500 @enderror text-slate-800">
                    @error('logo')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex justify-between my-1 gap-3">
                <div class="w-full md:w-1/2">
                    <label for="favicon" class="block text-sm font-medium text-gray-700"> Favicon</label>
                    <input type="file" id="favicon" name="favicon" autofocus
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('favicon') border-red-500 @enderror text-slate-800"
                        value="{{ old('favicon') }}">
                    @error('favicon')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class=" w-full md:w-1/2">
                    <label for="keywords" class="block text-sm font-medium text-gray-700"> keywords</label>
                    <input type="keywords" id="keywords" placeholder="e.g adult contents, gif image etc" value=" {{ old('keywords') ?? (site()->keywords ?? '') }}"
                        name="keywords" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('keywords') border-red-500 @enderror text-slate-800">
                    @error('keywords')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex justify-between my-1 gap-3">
                <div class="w-full md:w-1/2">
                    <label for="email" class="block text-sm font-medium text-gray-700"> Email</label>
                    <input type="email" id="email" placeholder="jhon_doe@gmail.com" name="email" required autofocus
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') border-red-500 @enderror text-slate-800"
                        value="{{ old('email') ?? (site()->email ?? '') }}">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class=" w-full md:w-1/2">
                    <label for="phone" class="block text-sm font-medium text-gray-700"> Phone</label>
                    <input type="text" id="phone" placeholder="+1 323 4944034" name="phone" required
                        value="{{ old('phone') ?? (site()->phone ?? '') }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('phone') border-red-500 @enderror text-slate-800">
                    @error('phone')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex justify-between my-1 gap-3">
                <div class="w-full md:w-1/2">
                    <label for="address" class="block text-sm font-medium text-gray-700"> Address</label>
                    <input type="address" id="address" placeholder="Official address" name="address" required autofocus
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('address') border-red-500 @enderror text-slate-800"
                        value="{{ old('address') ?? (site()->address ?? '') }}">
                    @error('address')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class=" w-full md:w-1/2">
                    <label for="description" class="block text-sm font-medium text-gray-700"> Description</label>
                    <input type="description" placeholder="Website description..." id="description" name="description"
                        value="{{ old('description') ?? (site()->description ?? '') }}" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('description') border-red-500 @enderror text-slate-800">
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <h2 class="text-slate-400 mt-5 mb-2">Social connections</h2>
            <div class="flex justify-between my-1 gap-3">
                <div class="w-full md:w-1/2">
                    <label for="facebook" class="block text-sm font-medium text-gray-700"> Facebook</label>
                    <input type="url" id="facebook" placeholder="facebook profile/page url.." name="facebook" autofocus
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('facebook') border-red-500 @enderror text-slate-800"
                        value="{{ old('facebook') ?? (site()->facebook ?? '') }}">
                    @error('facebook')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class=" w-full md:w-1/2">
                    <label for="instagram" class="block text-sm font-medium text-gray-700"> Instagram</label>
                    <input type="url" id="instagram" placeholder="Instagram profile/page url.." name="instagram"
                        value="{{ old('instagram') ?? (site()->instagram ?? '') }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('instagram') border-red-500 @enderror text-slate-800">
                    @error('instagram')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex justify-between my-1 gap-3">
                <div class="w-full md:w-1/2">
                    <label for="twitterX" class="block text-sm font-medium text-gray-700"> Twitter</label>
                    <input type="url" id="twitterX" placeholder="Twitter profile/page url.." name="twitterX" autofocus
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('twitterX') border-red-500 @enderror text-slate-800"
                        value="{{ old('twitterX') ?? (site()->twitterX ?? '') }}">
                    @error('twitterX')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class=" w-full md:w-1/2">
                    <label for="youtube" class="block text-sm font-medium text-gray-700"> Youtube</label>
                    <input type="url" id="youtube" placeholder="Youtube profile/page url.." name="youtube"
                        value="{{ old('youtube') ?? (site()->youtube ?? '') }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('youtube') border-red-500 @enderror text-slate-800">
                    @error('youtube')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex justify-between my-1 gap-3">
                <div class="w-full md:w-1/2">
                    <label for="reddit" class="block text-sm font-medium text-gray-700"> Reddit</label>
                    <input type="url" id="reddit" placeholder="Reddit profile/page url.." name="reddit" autofocus
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('reddit') border-red-500 @enderror text-slate-800"
                        value="{{ old('reddit') ?? (site()->reddit ?? '') }}">
                    @error('reddit')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class=" w-full md:w-1/2">
                    <label for="tiktok" class="block text-sm font-medium text-gray-700"> Tiktok</label>
                    <input type="url" id="tiktok" placeholder="Tiktok profile/page url.." name="tiktok"
                        value="{{ old('tiktok') ?? (site()->tiktok ?? '') }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('tiktok') border-red-500 @enderror text-slate-800">
                    @error('tiktok')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mt-20 md:mt-0">
                <button type="submit"
                    class="w-full px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 mt-15 md:mt-5">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
