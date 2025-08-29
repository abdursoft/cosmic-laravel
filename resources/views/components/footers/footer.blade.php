<footer class="bg-white dark:bg-gray-800 shadow-lg">
    <button onclick="scrollToTop()" class="text-center bg-red-400 text-white rounded-[8px] shadow-md w-[40px] h-[40px] flex items-center justify-center fixed bottom-[80px] right-[20px] topUpButton cursor-pointer" data-aos='fade-up'>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512">
            <path fill="#fbfbfb" d="M256 16C123.452 16 16 123.452 16 256s107.452 240 240 240s240-107.452 240-240S388.548 16 256 16m147.078 387.078a207.253 207.253 0 1 1 44.589-66.125a207.3 207.3 0 0 1-44.589 66.125" />
            <path fill="#fbfbfb" d="m142.319 241.027l22.628 22.627L240 188.602V376h32V188.602l75.053 75.052l22.628-22.627L256 127.347z" />
        </svg>
    </button>
    <div class="container mx-auto px-4 py-6">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="text-center md:text-left mb-4 md:mb-0 order-2 md:order-1">
                <p class="text-sm text-gray-600 dark:text-gray-400">&copy; {{ date('Y') }} Cosmic Laravel. All rights reserved.</p>
            </div>
            <div class="flex space-x-4 flex-wrap items-center justify-center gap-2 order-1 md:order-2 mb-10 md:mb-0">
                @foreach(pages() as $page)
                    <a href="{{route('public.page',[$page->id,$page->slug])}}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">{{$page->title}}</a>
                @endforeach
            </div>
        </div>
    </div>
</footer>

<script>
  const scrollBtn = document.querySelector(".topUpButton");

  // Show/hide button on scroll
  window.addEventListener("scroll", () => {
    if (window.scrollY > 200) {
      scrollBtn.classList.remove("hidden");
    } else {
      scrollBtn.classList.add("hidden");
    }
  });

  // Scroll to top smoothly
  function scrollToTop() {
    window.scrollTo({
      top: 0,
      behavior: "smooth"
    });
  }
</script>
