<section class="w-full text-white py-20 px-4 md:px-15 lg:px-45">
    <div class="w-full flex flex-col md:flex-row md:justify-between" data-aos="fade-up">
        <div class="w-full md:w-1/2 flex flex-col items-center justify-center">
            <div class="w-full">
                <div class="text-center md:text-left">
                    <h2 class="text-xl md:text-4xl">Contact the Guild</h2>
                    <p class="text-lg mt-2">Contact The Guided Vice</p>
                </div>
                <div class="w-full mt-5 flex items-start gap-4 flex-wrap justify-center md:justify-start">
                    <a target="_blank" href="{{ site()->facebook ?? '' }}"
                        class="@if (empty(site()->facebook)) hidden @endif">Facebook</a>
                    <a target="_blank" href="{{ site()->instagram ?? '' }}"
                        class="@if (empty(site()->instagram)) hidden @endif">Instagram</a>
                    <a target="_blank" href="{{ site()->twitterX ?? '' }}"
                        class="@if (empty(site()->twitterX)) hidden @endif">TwitterX</a>
                    <a target="_blank" href="{{ site()->youtube ?? '' }}"
                        class="@if (empty(site()->youtube)) hidden @endif">Youtube</a>
                    <a target="_blank" href="{{ site()->reddit ?? '' }}"
                        class="@if (empty(site()->reddit)) hidden @endif">Reddit</a>
                    <a target="_blank" href="{{ site()->tiktok ?? '' }}"
                        class="@if (empty(site()->tiktok)) hidden @endif">Tiktok</a>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/2">
            @include('components.form.contact')
        </div>
    </div>
</section>
