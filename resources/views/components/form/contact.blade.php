<div class="flex items-center justify-center">
    <div class="w-full max-w-3xl p-8 bg-transparent">
        <h2 class="text-2xl font-bold text-center mb-6 text-white">Get in touch today</h2>
        <form method="POST" class="text-white" action="{{ route('contact.submit') }}">
            @csrf
            <div class="flex flex-col md:justify-between md:flex-row w-full mb-4 gap-3">
                <div class="w-full md:w-1/2">
                    <label for="name" class="block text-sm font-medium text-white"> Name</label>
                    <input type="text" id="name" placeholder="Contact person" name="name" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-full md:w-1/2">
                    <label for="email" class="block text-sm font-medium text-white"> Email</label>
                    <input type="email" id="email" placeholder="jhon_doe@gmail.com" name="email" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mb-4">
                <label for="subject" class="block text-sm font-medium text-white"> Subject</label>
                <input type="text" id="subject" placeholder="Email subject" name="subject" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('subject') border-red-500 @enderror"
                    value="{{ old('subject') }}">
                @error('subject')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-white"> Message</label>
                <textarea id="message" name="message" placeholder="Message description" required
                    rows="4"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                @error('message')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <button type="submit"
                    class="w-full px-4 py-2 bg-gray-600 text-white font-semibold cursor-pointer rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Send Message
                </button>
            </div>
        </form>
    </div>
</div>
