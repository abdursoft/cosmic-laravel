<main id="main-preview"
    class="flex flex-col h-screen overflow-y-auto overflow-x-hidden scroll-smooth group transition-all"
    style="">
    <div id="header" class="!sticky top-0 z-60" style="z-index: 60;">
        <div class="transition-all left-full h-0 flex sticky z-70 justify-end  opacity-0 duration-250 pointer-events-none"
            style="top: 0px;">
            <div data-tour=""
                class="rounded-2xl bg-white p-2 shadow-md md:h-11 m-6 flex flex-col md:flex-row items-center gap-1 border border-gray-200 h-21">
                <button class="button ghost sm"><span class="font-sans">Restyle</span></button>
                <div class="flex-shrink-0 w-full md:w-px h-px md:h-4 bg-gray-200"></div><button
                    class="md:!hidden button ghost sm"><span class="font-sans">Edit website header</span></button>
                <div class="flex justify-between md:items-center gap-1 w-full">
                    <div class="relative hidden md:block h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon w-5 h-5 p-px" aria-hidden="true">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M4.75 3C3.7835 3 3 3.7835 3 4.75v10.5c0 .9665.7835 1.75 1.75 1.75h1.5C7.2165 17 8 16.2165 8 15.25V4.75C8 3.7835 7.2165 3 6.25 3h-1.5ZM4.5 4.75c0-.13807.11193-.25.25-.25h1.5c.13807 0 .25.11193.25.25v10.5c0 .1381-.11193.25-.25.25h-1.5c-.13807 0-.25-.1119-.25-.25V4.75Z"
                                    clip-rule="evenodd"></path>
                                <path fill="currentColor"
                                    d="M10.75 3.75c0 .41421-.3358.75-.75.75-.41421 0-.75-.33579-.75-.75S9.58579 3 10 3c.4142 0 .75.33579.75.75ZM10 17c.4142 0 .75-.3358.75-.75s-.3358-.75-.75-.75c-.41421 0-.75.3358-.75.75s.33579.75.75.75Zm7-7c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75c0-.41421.3358-.75.75-.75s.75.33579.75.75Zm-3.875 7c.4142 0 .75-.3358.75-.75s-.3358-.75-.75-.75-.75.3358-.75.75.3358.75.75.75ZM17 16.25c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75.3358-.75.75-.75.75.3358.75.75ZM13.125 4.5c.4142 0 .75-.33579.75-.75s-.3358-.75-.75-.75-.75.33579-.75.75.3358.75.75.75ZM17 3.75c0 .41421-.3358.75-.75.75s-.75-.33579-.75-.75.3358-.75.75-.75.75.33579.75.75Zm-.75 3.875c.4142 0 .75-.33579.75-.75s-.3358-.75-.75-.75-.75.33579-.75.75.3358.75.75.75Zm.75 5.5c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75.3358-.75.75-.75.75.3358.75.75Z">
                                </path>
                            </svg></button></div>
                    <div class="relative inline-flex text-left hidden md:block h-7" data-headlessui-state=""><button
                            class="button ghost sm icon z-5" id="headlessui-menu-button-1" type="button"
                            aria-haspopup="menu" aria-expanded="false" data-headlessui-state=""><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon h-5 w-5" aria-hidden="true">
                                <path fill="currentColor"
                                    d="M11.25 5c0 .69036-.5596 1.25-1.25 1.25-.69036 0-1.25-.55964-1.25-1.25S9.30964 3.75 10 3.75c.6904 0 1.25.55964 1.25 1.25Zm0 5c0 .6904-.5596 1.25-1.25 1.25-.69036 0-1.25-.5596-1.25-1.25 0-.69036.55964-1.25 1.25-1.25.6904 0 1.25.55964 1.25 1.25Zm0 5c0 .6904-.5596 1.25-1.25 1.25-.69036 0-1.25-.5596-1.25-1.25s.55964-1.25 1.25-1.25c.6904 0 1.25.5596 1.25 1.25Z">
                                </path>
                            </svg></button>
                        <div class="z-100 transition-opacity opacity-0"
                            style="position: absolute; left: 0px; top: 0px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <header id="website-header" style="background-color: rgb(25, 21, 21); color: rgb(255, 255, 255);"
            class="relative z-50 transition-colors shadow">
            <div class="grid items-center lg:gap-6 xl:gap-10 mx-auto px-5 md:px-6 pt-4 pb-4 container"
                style="grid-template-columns: auto auto auto;">
                <div class="flex items-center gap-10 col-span-2 lg:col-span-1">
                    <div data-tour="logo" location="header"
                        class="grid max-w-full inline-edit-inset cursor-pointer  inline-edit-light"
                        logo="[object Object]" text="The Guilded Vice" color="#FFFFFF">
                        <h2 class="heading-small lg:heading-medium max-w-full whitespace-nowrap overflow-hidden overflow-ellipsis"
                            style="color: rgb(255, 255, 255); font-family: var(--header-logo-fontFamily); font-weight: var(--header-logo-fontWeight); width: 180.25px;">
                            The Guilded Vice</h2>
                    </div>
                    <ul class="hidden items-center flex-wrap transition-all inline-edit-inset lg:flex gap-x-6 cursor-pointer  inline-edit-light"
                        style="color: rgb(255, 255, 255);">
                        <li class="inline-flex items-center gap-2 transition-all border-b-2 py-1.5"
                            style="border-color: transparent; background-color: transparent; color: currentcolor;"><span
                                class="block body-normal whitespace-nowrap">Services</span></li>
                    </ul>
                </div>
                <div class="hidden lg:flex item-center justify-end gap-10 lg:col-span-2">
                    <ul
                        class="lg:flex items-center gap-x-4 gap-y-2 flex-wrap justify-end hidden cursor-pointer  inline-edit-light">
                    </ul>
                    <div class="hidden lg:flex items-center flex-shrink-0 gap-4"><button
                            class="website-button cursor-pointer  inline-edit-light md"
                            style="border-width: 2px; border-style: solid; box-shadow: none; font-family: var(--body-fontFamily); font-weight: var(--body-fontWeight, 500); font-style: var(--body-fontStyle); background-color: rgb(156, 156, 156); color: rgb(17, 24, 39); border-radius: 8px; border-color: rgb(156, 156, 156);">Contact
                            the Guild</button></div>
                </div>
                <div class="ml-auto lg:hidden"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true" data-slot="icon" class="icon w-5 h-5 ml-auto mr-0">
                        <path fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 0 1 2.75 4h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 4.75ZM2 10a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 10Zm0 5.25a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z"
                            clip-rule="evenodd"></path>
                    </svg></div>
            </div>
        </header>
        <div
            class="absolute transition-all -bottom-0.5 right-1/2 translate-x-1/2 w-full pointer-events-none group-hover:pointer-events-auto z-50 border-2 border-blue-figma group-hover:opacity-100 !opacity-0">
            <button data-tour="section"
                class="button ghost sm icon-right absolute -bottom-1/2 right-1/2 translate-x-1/2 translate-y-1/2 !ring-0 !ring-offset-0 font-sans !text-white bg-blue-figma"><span>Add
                    section</span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"
                    width="24" height="24" class="icon h-5 w-5" aria-hidden="true">
                    <path fill="currentColor"
                        d="M10.25 5.25c0-.41421-.33579-.75-.75-.75s-.75.33579-.75.75v4h-4c-.41421 0-.75.33579-.75.75 0 .4142.33579.75.75.75h4v4c0 .4142.33579.75.75.75s.75-.3358.75-.75v-4h4c.4142 0 .75-.3358.75-.75 0-.41421-.3358-.75-.75-.75h-4v-4Z">
                    </path>
                </svg></button>
        </div>
    </div>
    <div id="page-block-0" class="relative" style="z-index: 59;">
        <div class="transition-all left-full h-0 flex sticky z-70 justify-end  opacity-0 duration-250 pointer-events-none"
            style="top: 74px;">
            <div data-tour="edit-sections"
                class="rounded-2xl bg-white p-2 shadow-md md:h-11 m-6 flex flex-col md:flex-row items-center gap-1 border border-gray-200 h-40">
                <button class="button ghost sm"><span class="font-sans">Restyle</span></button>
                <div class="flex-shrink-0 w-full md:w-px h-px md:h-4 bg-gray-200"></div><button
                    class="button ghost sm"><span class="font-sans">Regenerate images</span></button>
                <div class="flex-shrink-0 w-full md:w-px h-px md:h-4 bg-gray-200"></div><button
                    class="md:!hidden button ghost sm"><span class="font-sans">Edit section</span></button>
                <div class="flex-shrink-0 md:hidden w-full h-px bg-gray-200"></div>
                <div class="flex justify-between md:items-center gap-1 w-full">
                    <div class="relative h-7 pointer-events-none"><button class="button ghost sm icon"
                            disabled=""><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20" width="24" height="24" class="icon w-5 h-5 p-px"
                                aria-hidden="true">
                                <path fill="currentColor"
                                    d="M9.71291 3.05691c-.08846.0366-.17133.09085-.24324.16276l-4.25 4.25c-.29289.29289-.29289.76777 0 1.06066s.76777.29289 1.06066 0L9.25 5.56066V16.25c0 .4142.33579.75.75.75.4142 0 .75-.3358.75-.75V5.56066l2.9697 2.96967c.2929.29289.7677.29289 1.0606 0 .2929-.29289.2929-.76777 0-1.06066l-4.25-4.25C10.3839 3.07322 10.1919 3 10 3c-.10169 0-.19866.02024-.28709.05691Z">
                                </path>
                            </svg></button></div>
                    <div class="relative h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon w-5 h-5 p-px" aria-hidden="true">
                                <path fill="currentColor"
                                    d="M9.71291 16.9431c-.08846-.0366-.17133-.0909-.24324-.1628l-4.25-4.25c-.29289-.2929-.29289-.7677 0-1.0606.29289-.2929.76777-.2929 1.06066 0L9.25 14.4393V3.75c0-.41421.33579-.75.75-.75.4142 0 .75.33579.75.75v10.6893l2.9697-2.9696c.2929-.2929.7677-.2929 1.0606 0 .2929.2929.2929.7677 0 1.0606l-4.25 4.25C10.3839 16.9268 10.1919 17 10 17c-.10169 0-.19866-.0202-.28709-.0569Z">
                                </path>
                            </svg></button></div>
                    <div class="relative block md:hidden h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" width="24" height="24" class="icon w-5 h-5 p-px"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M8 7v8c0 1.1046.89543 2 2 2h6M8 7V5c0-1.10457.89543-2 2-2h4.5858c.2652 0 .5196.10536.7071.29289l4.4142 4.41422c.1875.18753.2929.44189.2929.7071V15c0 1.1046-.8954 2-2 2h-2M8 7H6c-1.10457 0-2 .89543-2 2v10c0 1.1046.89543 2 2 2h8c1.1046 0 2-.8954 2-2v-2">
                                </path>
                            </svg></button></div>
                    <div class="relative block md:hidden h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon w-5 h-5" aria-hidden="true">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M7 5H3.75c-.41421 0-.75.33579-.75.75s.33579.75.75.75h12.5c.4142 0 .75-.33579.75-.75S16.6642 5 16.25 5H13V3.75C13 2.78379 12.2162 2 11.25 2h-2.5C7.78379 2 7 2.78379 7 3.75V5Zm1.5-1.25c0-.13779.11221-.25.25-.25h2.5c.1378 0 .25.11221.25.25V5h-3V3.75Z"
                                    clip-rule="evenodd"></path>
                                <path fill="currentColor"
                                    d="M5.48757 7.50106c.41364-.02178.76662.29589.78839.70953l.374 7.10491c.03505.6641.58332 1.1845 1.24804 1.1845h4.205c.664 0 1.213-.5206 1.248-1.1845l.374-7.10491c.0218-.41364.3748-.73131.7884-.70953.4137.02177.7313.37474.7096.78838l-.374 7.10496C14.772 16.8546 13.565 18 12.103 18H7.898c-1.46326 0-2.66898-1.1456-2.74596-2.6055l-.37401-7.10506c-.02177-.41364.2959-.76661.70954-.78838Z">
                                </path>
                            </svg></button></div>
                    <div class="relative hidden md:block h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon w-5 h-5 p-px" aria-hidden="true">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M4.75 3C3.7835 3 3 3.7835 3 4.75v10.5c0 .9665.7835 1.75 1.75 1.75h1.5C7.2165 17 8 16.2165 8 15.25V4.75C8 3.7835 7.2165 3 6.25 3h-1.5ZM4.5 4.75c0-.13807.11193-.25.25-.25h1.5c.13807 0 .25.11193.25.25v10.5c0 .1381-.11193.25-.25.25h-1.5c-.13807 0-.25-.1119-.25-.25V4.75Z"
                                    clip-rule="evenodd"></path>
                                <path fill="currentColor"
                                    d="M10.75 3.75c0 .41421-.3358.75-.75.75-.41421 0-.75-.33579-.75-.75S9.58579 3 10 3c.4142 0 .75.33579.75.75ZM10 17c.4142 0 .75-.3358.75-.75s-.3358-.75-.75-.75c-.41421 0-.75.3358-.75.75s.33579.75.75.75Zm7-7c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75c0-.41421.3358-.75.75-.75s.75.33579.75.75Zm-3.875 7c.4142 0 .75-.3358.75-.75s-.3358-.75-.75-.75-.75.3358-.75.75.3358.75.75.75ZM17 16.25c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75.3358-.75.75-.75.75.3358.75.75ZM13.125 4.5c.4142 0 .75-.33579.75-.75s-.3358-.75-.75-.75-.75.33579-.75.75.3358.75.75.75ZM17 3.75c0 .41421-.3358.75-.75.75s-.75-.33579-.75-.75.3358-.75.75-.75.75.33579.75.75Zm-.75 3.875c.4142 0 .75-.33579.75-.75s-.3358-.75-.75-.75-.75.33579-.75.75.3358.75.75.75Zm.75 5.5c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75.3358-.75.75-.75.75.3358.75.75Z">
                                </path>
                            </svg></button></div>
                    <div class="relative inline-flex text-left hidden md:block h-7" data-headlessui-state=""><button
                            class="button ghost sm icon z-5" id="headlessui-menu-button-2" type="button"
                            aria-haspopup="menu" aria-expanded="false" data-headlessui-state=""><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon h-5 w-5" aria-hidden="true">
                                <path fill="currentColor"
                                    d="M11.25 5c0 .69036-.5596 1.25-1.25 1.25-.69036 0-1.25-.55964-1.25-1.25S9.30964 3.75 10 3.75c.6904 0 1.25.55964 1.25 1.25Zm0 5c0 .6904-.5596 1.25-1.25 1.25-.69036 0-1.25-.5596-1.25-1.25 0-.69036.55964-1.25 1.25-1.25.6904 0 1.25.55964 1.25 1.25Zm0 5c0 .6904-.5596 1.25-1.25 1.25-.69036 0-1.25-.5596-1.25-1.25s.55964-1.25 1.25-1.25c.6904 0 1.25.5596 1.25 1.25Z">
                                </path>
                            </svg></button>
                        <div class="z-100 transition-opacity opacity-0"
                            style="position: absolute; left: 0px; top: 0px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <section class="relative" style="z-index: 39;">
            <div class="flex relative fix-safari-flickering" data-text-color="#FFFFFF"
                style="min-height: calc(60px); padding-top: 0px; padding-bottom: 0px;">
                <div class="flex break-word transition-all duration-300 w-full">
                    <div class="absolute inset-0 z-10 pointer-events-none">
                        <div class="absolute inset-0 z-10 transition-all duration-300"
                            style="background-color: rgb(27, 0, 0);"></div>
                    </div>
                    <div class="relative z-10 w-full transition-all duration-300">
                        <div class="relative z-10 w-full h-full" style="">
                            <div
                                class="grid grid-flow-row lg:grid-cols-2 lg:grid-rows-1 gap-10 lg:gap-20 lg:container lg:mx-auto h-full">
                                <div class="flex flex-col pt-12 lg:pt-40 pb-12 lg:pb-40 justify-center">
                                    <div class="flex flex-col gap-4 max-w-2xl cursor-pointer  inline-edit-light"
                                        style="padding-top: 0px; padding-bottom: 0px;">
                                        <p class="w-max max-w-full body-small !font-semibold break-word transition-all cursor-pointer  inline-edit-light"
                                            style="color: rgb(255, 255, 255);">Where Seduction Meets Intensity</p>
                                        <h2 class="break-word transition-all heading-large cursor-pointer  inline-edit-light"
                                            style="color: rgb(255, 255, 255);">Untamed Obsession </h2>
                                        <pre class="transition-all body-large cursor-pointer  inline-edit-light" style="color: rgb(255, 255, 255);">Gilded Vice is more than an experience—it’s your awakening.

From the whisper of silk against your skin to the intoxicating pull of restraint, every detail draws you into a realm where control and surrender entwine.

Here, your deepest cravings aren’t just imagined—they’re ignited, indulged, and brought vividly to life.</pre>
                                        <div
                                            class="flex md:inline-flex flex-col md:flex-row gap-4 w-full md:w-max mt-4">
                                            <button
                                                class="website-button w-full md:w-max transition-all cursor-pointer  inline-edit-light lg"
                                                style="border-width: 2px; border-style: solid; box-shadow: none; font-family: var(--body-fontFamily); font-weight: var(--body-fontWeight, 500); font-style: var(--body-fontStyle); background-color: rgb(255, 255, 255); color: rgb(17, 24, 39); border-radius: 8px; border-color: rgb(255, 255, 255);">Claim
                                                Your Indulgence</button>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="relative aspect-w-4 aspect-h-5 sm:aspect-w-5 sm:aspect-h-4 lg:aspect-w-4 lg:aspect-h-5 w-screen lg:w-half-screen">
                                    <div
                                        class="absolute inset-0 transition-all duration-700 z-5 opacity-100 cursor-pointer  inline-edit-light">
                                        <span
                                            style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: absolute; inset: 0px;"><img
                                                alt=""
                                                src="https://cdn.durable.co/blocks/2by7r5ZqE3VM3BJEcyhvU1LYhQvdpYH19t0uEBUd84nSoHXROg4JjP72rb4KM9gl.png"
                                                decoding="async" data-nimg="fill"
                                                class="w-full h-full object-center object-cover"
                                                style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: medium; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover; object-position: center center;"></span>
                                        <div
                                            class="absolute left-8 right-8 md:left-16 md:right-30 bottom-8 md:bottom-16 2xl:max-w-170 z-20">
                                            <div
                                                class="flex gap-5 items-center bg-black bg-opacity-40 rounded-5xl overflow-hidden py-3 px-6 text-white">
                                                <div
                                                    class="!h-0.5 !bg-white !bg-opacity-20 !rounded-none relative rounded-2xl w-full h-2 bg-gray-100">
                                                    <div class="!rounded-none !bg-white !bg-opacity-70 inset-0 h-full rounded-2xl"
                                                        style="width: 76%;"></div>
                                                </div>
                                                <p class="text-sm whitespace-nowrap">1/1</p><button><svg
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24" width="24"
                                                        height="24" class="icon w-5 h-5" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5" d="m10 19-7-7m0 0 7-7m-7 7h18"></path>
                                                    </svg></button><button><svg xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                        width="24" height="24" class="icon w-5 h-5"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.5" d="m14 5 7 7m0 0-7 7m7-7H3"></path>
                                                    </svg></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div
            class="absolute transition-all -bottom-0.5 right-1/2 translate-x-1/2 w-full pointer-events-none group-hover:pointer-events-auto z-50 border-2 border-blue-figma group-hover:opacity-100 !opacity-0">
            <button data-tour="section"
                class="button ghost sm icon-right absolute -bottom-1/2 right-1/2 translate-x-1/2 translate-y-1/2 !ring-0 !ring-offset-0 font-sans !text-white bg-blue-figma"><span>Add
                    section</span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"
                    width="24" height="24" class="icon h-5 w-5" aria-hidden="true">
                    <path fill="currentColor"
                        d="M10.25 5.25c0-.41421-.33579-.75-.75-.75s-.75.33579-.75.75v4h-4c-.41421 0-.75.33579-.75.75 0 .4142.33579.75.75.75h4v4c0 .4142.33579.75.75.75s.75-.3358.75-.75v-4h4c.4142 0 .75-.3358.75-.75 0-.41421-.3358-.75-.75-.75h-4v-4Z">
                    </path>
                </svg></button>
        </div>
    </div>
    <div id="page-block-1" class="relative" style="z-index: 58;">
        <div class="transition-all left-full h-0 flex sticky z-70 justify-end  opacity-0 duration-250 pointer-events-none"
            style="top: 74px;">
            <div data-tour=""
                class="rounded-2xl bg-white p-2 shadow-md md:h-11 m-6 flex flex-col md:flex-row items-center gap-1 border border-gray-200 h-40">
                <button class="button ghost sm"><span class="font-sans">Restyle</span></button>
                <div class="flex-shrink-0 w-full md:w-px h-px md:h-4 bg-gray-200"></div><button
                    class="button ghost sm"><span class="font-sans">Regenerate images</span></button>
                <div class="flex-shrink-0 w-full md:w-px h-px md:h-4 bg-gray-200"></div><button
                    class="md:!hidden button ghost sm"><span class="font-sans">Edit section</span></button>
                <div class="flex-shrink-0 md:hidden w-full h-px bg-gray-200"></div>
                <div class="flex justify-between md:items-center gap-1 w-full">
                    <div class="relative h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon w-5 h-5 p-px" aria-hidden="true">
                                <path fill="currentColor"
                                    d="M9.71291 3.05691c-.08846.0366-.17133.09085-.24324.16276l-4.25 4.25c-.29289.29289-.29289.76777 0 1.06066s.76777.29289 1.06066 0L9.25 5.56066V16.25c0 .4142.33579.75.75.75.4142 0 .75-.3358.75-.75V5.56066l2.9697 2.96967c.2929.29289.7677.29289 1.0606 0 .2929-.29289.2929-.76777 0-1.06066l-4.25-4.25C10.3839 3.07322 10.1919 3 10 3c-.10169 0-.19866.02024-.28709.05691Z">
                                </path>
                            </svg></button></div>
                    <div class="relative h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon w-5 h-5 p-px" aria-hidden="true">
                                <path fill="currentColor"
                                    d="M9.71291 16.9431c-.08846-.0366-.17133-.0909-.24324-.1628l-4.25-4.25c-.29289-.2929-.29289-.7677 0-1.0606.29289-.2929.76777-.2929 1.06066 0L9.25 14.4393V3.75c0-.41421.33579-.75.75-.75.4142 0 .75.33579.75.75v10.6893l2.9697-2.9696c.2929-.2929.7677-.2929 1.0606 0 .2929.2929.2929.7677 0 1.0606l-4.25 4.25C10.3839 16.9268 10.1919 17 10 17c-.10169 0-.19866-.0202-.28709-.0569Z">
                                </path>
                            </svg></button></div>
                    <div class="relative block md:hidden h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" width="24" height="24" class="icon w-5 h-5 p-px"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M8 7v8c0 1.1046.89543 2 2 2h6M8 7V5c0-1.10457.89543-2 2-2h4.5858c.2652 0 .5196.10536.7071.29289l4.4142 4.41422c.1875.18753.2929.44189.2929.7071V15c0 1.1046-.8954 2-2 2h-2M8 7H6c-1.10457 0-2 .89543-2 2v10c0 1.1046.89543 2 2 2h8c1.1046 0 2-.8954 2-2v-2">
                                </path>
                            </svg></button></div>
                    <div class="relative block md:hidden h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon w-5 h-5" aria-hidden="true">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M7 5H3.75c-.41421 0-.75.33579-.75.75s.33579.75.75.75h12.5c.4142 0 .75-.33579.75-.75S16.6642 5 16.25 5H13V3.75C13 2.78379 12.2162 2 11.25 2h-2.5C7.78379 2 7 2.78379 7 3.75V5Zm1.5-1.25c0-.13779.11221-.25.25-.25h2.5c.1378 0 .25.11221.25.25V5h-3V3.75Z"
                                    clip-rule="evenodd"></path>
                                <path fill="currentColor"
                                    d="M5.48757 7.50106c.41364-.02178.76662.29589.78839.70953l.374 7.10491c.03505.6641.58332 1.1845 1.24804 1.1845h4.205c.664 0 1.213-.5206 1.248-1.1845l.374-7.10491c.0218-.41364.3748-.73131.7884-.70953.4137.02177.7313.37474.7096.78838l-.374 7.10496C14.772 16.8546 13.565 18 12.103 18H7.898c-1.46326 0-2.66898-1.1456-2.74596-2.6055l-.37401-7.10506c-.02177-.41364.2959-.76661.70954-.78838Z">
                                </path>
                            </svg></button></div>
                    <div class="relative hidden md:block h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon w-5 h-5 p-px" aria-hidden="true">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M4.75 3C3.7835 3 3 3.7835 3 4.75v10.5c0 .9665.7835 1.75 1.75 1.75h1.5C7.2165 17 8 16.2165 8 15.25V4.75C8 3.7835 7.2165 3 6.25 3h-1.5ZM4.5 4.75c0-.13807.11193-.25.25-.25h1.5c.13807 0 .25.11193.25.25v10.5c0 .1381-.11193.25-.25.25h-1.5c-.13807 0-.25-.1119-.25-.25V4.75Z"
                                    clip-rule="evenodd"></path>
                                <path fill="currentColor"
                                    d="M10.75 3.75c0 .41421-.3358.75-.75.75-.41421 0-.75-.33579-.75-.75S9.58579 3 10 3c.4142 0 .75.33579.75.75ZM10 17c.4142 0 .75-.3358.75-.75s-.3358-.75-.75-.75c-.41421 0-.75.3358-.75.75s.33579.75.75.75Zm7-7c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75c0-.41421.3358-.75.75-.75s.75.33579.75.75Zm-3.875 7c.4142 0 .75-.3358.75-.75s-.3358-.75-.75-.75-.75.3358-.75.75.3358.75.75.75ZM17 16.25c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75.3358-.75.75-.75.75.3358.75.75ZM13.125 4.5c.4142 0 .75-.33579.75-.75s-.3358-.75-.75-.75-.75.33579-.75.75.3358.75.75.75ZM17 3.75c0 .41421-.3358.75-.75.75s-.75-.33579-.75-.75.3358-.75.75-.75.75.33579.75.75Zm-.75 3.875c.4142 0 .75-.33579.75-.75s-.3358-.75-.75-.75-.75.33579-.75.75.3358.75.75.75Zm.75 5.5c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75.3358-.75.75-.75.75.3358.75.75Z">
                                </path>
                            </svg></button></div>
                    <div class="relative inline-flex text-left hidden md:block h-7" data-headlessui-state=""><button
                            class="button ghost sm icon z-5" id="headlessui-menu-button-3" type="button"
                            aria-haspopup="menu" aria-expanded="false" data-headlessui-state=""><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon h-5 w-5" aria-hidden="true">
                                <path fill="currentColor"
                                    d="M11.25 5c0 .69036-.5596 1.25-1.25 1.25-.69036 0-1.25-.55964-1.25-1.25S9.30964 3.75 10 3.75c.6904 0 1.25.55964 1.25 1.25Zm0 5c0 .6904-.5596 1.25-1.25 1.25-.69036 0-1.25-.5596-1.25-1.25 0-.69036.55964-1.25 1.25-1.25.6904 0 1.25.55964 1.25 1.25Zm0 5c0 .6904-.5596 1.25-1.25 1.25-.69036 0-1.25-.5596-1.25-1.25s.55964-1.25 1.25-1.25c.6904 0 1.25.5596 1.25 1.25Z">
                                </path>
                            </svg></button>
                        <div class="z-100 transition-opacity opacity-0"
                            style="position: absolute; left: 0px; top: 0px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <section class="relative">
            <div class="relative flex break-word transition-all duration-300 items-center fix-safari-flickering"
                style="min-height: calc(134px); padding-top: 0px; padding-bottom: 0px;">
                <div class="absolute inset-0 z-10 pointer-events-none">
                    <div class="absolute inset-0 z-10 transition-all duration-300"
                        style="background-color: rgb(27, 0, 0);"></div>
                </div>
                <div
                    class="relative z-10 container mx-auto px-5 md:px-6 transition-all duration-300 pt-12 lg:pt-20 pb-12 lg:pb-20">
                    <div class="relative z-10 w-full h-full" style="">
                        <div
                            class="flex w-full gap-10 lg:gap-20 transition-all duration-300 flex-col-reverse lg:flex-row-reverse items-center cursor-pointer  inline-edit-light">
                            <div class="flex-1 flex flex-col w-full max-w-240 items-start">
                                <div class="rich-text-block website-wysiwyg cursor-pointer  inline-edit-light"
                                    style="color: rgb(255, 255, 255);">
                                    <h1><em><strong>Step Closer… Until You Can Feel It</strong></em></h1>
                                    <p>&nbsp;</p>
                                    <p>The Guided Vice isn’t just something you read… it’s something you
                                        inhale.<br>Every page pulls you closer to the intoxicating pulse of control, the
                                        exquisite beauty of surrender, and the thrill of watching both collide.</p>
                                    <p>Here, fantasies aren’t whispered in the dark—they’re displayed in vivid motion,
                                        wrapped in sound, and crafted to make you feel every shiver.</p>
                                    <p>This is your front-row seat to desire—unfiltered, undeniable, unforgettable.</p>
                                </div>
                            </div>
                            <div
                                class="flex-1 flex w-full lg:max-w-1/2 h-full transition-all duration-300 justify-center lg:justify-start">
                                <div
                                    class="flex-shrink-0 relative mx-auto w-full h-full transition-all duration-300 inline-edit-inset aspect-w-2 aspect-h-3 cursor-pointer  inline-edit-light">
                                    <span
                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: absolute; inset: 0px;"><img
                                            alt=""
                                            src="https://cdn.durable.co/blocks/37rfZYcGYVNoleNWXCkNP3oQO901e0p0qIF0Q7xH9mR7qw3wwJ2O9k24Kz1VzwuZ.png"
                                            decoding="async" data-nimg="fill"
                                            class="transition-all duration-300 rounded-2xl md:rounded-3xl lg:rounded-4xl"
                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: medium; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover; object-position: center center;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div
            class="absolute transition-all -bottom-0.5 right-1/2 translate-x-1/2 w-full pointer-events-none group-hover:pointer-events-auto z-50 border-2 border-blue-figma group-hover:opacity-100 !opacity-0">
            <button data-tour="section"
                class="button ghost sm icon-right absolute -bottom-1/2 right-1/2 translate-x-1/2 translate-y-1/2 !ring-0 !ring-offset-0 font-sans !text-white bg-blue-figma"><span>Add
                    section</span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"
                    width="24" height="24" class="icon h-5 w-5" aria-hidden="true">
                    <path fill="currentColor"
                        d="M10.25 5.25c0-.41421-.33579-.75-.75-.75s-.75.33579-.75.75v4h-4c-.41421 0-.75.33579-.75.75 0 .4142.33579.75.75.75h4v4c0 .4142.33579.75.75.75s.75-.3358.75-.75v-4h4c.4142 0 .75-.3358.75-.75 0-.41421-.3358-.75-.75-.75h-4v-4Z">
                    </path>
                </svg></button>
        </div>
    </div>
    <div id="page-block-2" class="relative" style="z-index: 57;">
        <div class="transition-all left-full h-0 flex sticky z-70 justify-end  opacity-0 duration-250 pointer-events-none"
            style="top: 74px;">
            <div data-tour=""
                class="rounded-2xl bg-white p-2 shadow-md md:h-11 m-6 flex flex-col md:flex-row items-center gap-1 border border-gray-200 h-40">
                <button class="button ghost sm"><span class="font-sans">Restyle</span></button>
                <div class="flex-shrink-0 w-full md:w-px h-px md:h-4 bg-gray-200"></div><button
                    class="button ghost sm"><span class="font-sans">Regenerate images</span></button>
                <div class="flex-shrink-0 w-full md:w-px h-px md:h-4 bg-gray-200"></div><button
                    class="md:!hidden button ghost sm"><span class="font-sans">Edit section</span></button>
                <div class="flex-shrink-0 md:hidden w-full h-px bg-gray-200"></div>
                <div class="flex justify-between md:items-center gap-1 w-full">
                    <div class="relative h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon w-5 h-5 p-px" aria-hidden="true">
                                <path fill="currentColor"
                                    d="M9.71291 3.05691c-.08846.0366-.17133.09085-.24324.16276l-4.25 4.25c-.29289.29289-.29289.76777 0 1.06066s.76777.29289 1.06066 0L9.25 5.56066V16.25c0 .4142.33579.75.75.75.4142 0 .75-.3358.75-.75V5.56066l2.9697 2.96967c.2929.29289.7677.29289 1.0606 0 .2929-.29289.2929-.76777 0-1.06066l-4.25-4.25C10.3839 3.07322 10.1919 3 10 3c-.10169 0-.19866.02024-.28709.05691Z">
                                </path>
                            </svg></button></div>
                    <div class="relative h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon w-5 h-5 p-px" aria-hidden="true">
                                <path fill="currentColor"
                                    d="M9.71291 16.9431c-.08846-.0366-.17133-.0909-.24324-.1628l-4.25-4.25c-.29289-.2929-.29289-.7677 0-1.0606.29289-.2929.76777-.2929 1.06066 0L9.25 14.4393V3.75c0-.41421.33579-.75.75-.75.4142 0 .75.33579.75.75v10.6893l2.9697-2.9696c.2929-.2929.7677-.2929 1.0606 0 .2929.2929.2929.7677 0 1.0606l-4.25 4.25C10.3839 16.9268 10.1919 17 10 17c-.10169 0-.19866-.0202-.28709-.0569Z">
                                </path>
                            </svg></button></div>
                    <div class="relative block md:hidden h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" width="24" height="24" class="icon w-5 h-5 p-px"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M8 7v8c0 1.1046.89543 2 2 2h6M8 7V5c0-1.10457.89543-2 2-2h4.5858c.2652 0 .5196.10536.7071.29289l4.4142 4.41422c.1875.18753.2929.44189.2929.7071V15c0 1.1046-.8954 2-2 2h-2M8 7H6c-1.10457 0-2 .89543-2 2v10c0 1.1046.89543 2 2 2h8c1.1046 0 2-.8954 2-2v-2">
                                </path>
                            </svg></button></div>
                    <div class="relative block md:hidden h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon w-5 h-5" aria-hidden="true">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M7 5H3.75c-.41421 0-.75.33579-.75.75s.33579.75.75.75h12.5c.4142 0 .75-.33579.75-.75S16.6642 5 16.25 5H13V3.75C13 2.78379 12.2162 2 11.25 2h-2.5C7.78379 2 7 2.78379 7 3.75V5Zm1.5-1.25c0-.13779.11221-.25.25-.25h2.5c.1378 0 .25.11221.25.25V5h-3V3.75Z"
                                    clip-rule="evenodd"></path>
                                <path fill="currentColor"
                                    d="M5.48757 7.50106c.41364-.02178.76662.29589.78839.70953l.374 7.10491c.03505.6641.58332 1.1845 1.24804 1.1845h4.205c.664 0 1.213-.5206 1.248-1.1845l.374-7.10491c.0218-.41364.3748-.73131.7884-.70953.4137.02177.7313.37474.7096.78838l-.374 7.10496C14.772 16.8546 13.565 18 12.103 18H7.898c-1.46326 0-2.66898-1.1456-2.74596-2.6055l-.37401-7.10506c-.02177-.41364.2959-.76661.70954-.78838Z">
                                </path>
                            </svg></button></div>
                    <div class="relative hidden md:block h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon w-5 h-5 p-px" aria-hidden="true">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M4.75 3C3.7835 3 3 3.7835 3 4.75v10.5c0 .9665.7835 1.75 1.75 1.75h1.5C7.2165 17 8 16.2165 8 15.25V4.75C8 3.7835 7.2165 3 6.25 3h-1.5ZM4.5 4.75c0-.13807.11193-.25.25-.25h1.5c.13807 0 .25.11193.25.25v10.5c0 .1381-.11193.25-.25.25h-1.5c-.13807 0-.25-.1119-.25-.25V4.75Z"
                                    clip-rule="evenodd"></path>
                                <path fill="currentColor"
                                    d="M10.75 3.75c0 .41421-.3358.75-.75.75-.41421 0-.75-.33579-.75-.75S9.58579 3 10 3c.4142 0 .75.33579.75.75ZM10 17c.4142 0 .75-.3358.75-.75s-.3358-.75-.75-.75c-.41421 0-.75.3358-.75.75s.33579.75.75.75Zm7-7c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75c0-.41421.3358-.75.75-.75s.75.33579.75.75Zm-3.875 7c.4142 0 .75-.3358.75-.75s-.3358-.75-.75-.75-.75.3358-.75.75.3358.75.75.75ZM17 16.25c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75.3358-.75.75-.75.75.3358.75.75ZM13.125 4.5c.4142 0 .75-.33579.75-.75s-.3358-.75-.75-.75-.75.33579-.75.75.3358.75.75.75ZM17 3.75c0 .41421-.3358.75-.75.75s-.75-.33579-.75-.75.3358-.75.75-.75.75.33579.75.75Zm-.75 3.875c.4142 0 .75-.33579.75-.75s-.3358-.75-.75-.75-.75.33579-.75.75.3358.75.75.75Zm.75 5.5c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75.3358-.75.75-.75.75.3358.75.75Z">
                                </path>
                            </svg></button></div>
                    <div class="relative inline-flex text-left hidden md:block h-7" data-headlessui-state=""><button
                            class="button ghost sm icon z-5" id="headlessui-menu-button-4" type="button"
                            aria-haspopup="menu" aria-expanded="false" data-headlessui-state=""><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon h-5 w-5" aria-hidden="true">
                                <path fill="currentColor"
                                    d="M11.25 5c0 .69036-.5596 1.25-1.25 1.25-.69036 0-1.25-.55964-1.25-1.25S9.30964 3.75 10 3.75c.6904 0 1.25.55964 1.25 1.25Zm0 5c0 .6904-.5596 1.25-1.25 1.25-.69036 0-1.25-.5596-1.25-1.25 0-.69036.55964-1.25 1.25-1.25.6904 0 1.25.55964 1.25 1.25Zm0 5c0 .6904-.5596 1.25-1.25 1.25-.69036 0-1.25-.5596-1.25-1.25s.55964-1.25 1.25-1.25c.6904 0 1.25.5596 1.25 1.25Z">
                                </path>
                            </svg></button>
                        <div class="z-100 transition-opacity opacity-0"
                            style="position: absolute; left: 0px; top: 0px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <section class="relative">
            <div class="relative flex flex-none transition-all duration-300 items-center fix-safari-flickering"
                style="min-height: calc(134px); padding-top: 0px; padding-bottom: 0px;">
                <div class="absolute inset-0 z-10 pointer-events-none">
                    <div class="absolute inset-0 z-10 transition-all duration-300"
                        style="background-color: rgb(29, 5, 1);"></div>
                </div>
                <div
                    class="relative z-10 transition-all duration-300 container mx-auto px-5 md:px-6 pt-16 lg:pt-32 pb-16 lg:pb-32">
                    <div class="absolute left-0 top-8 min-h-full min-w-full"></div>
                    <div class="relative z-10 w-full h-full" style="display: none;" hidden="">
                        <div class="transition-all duration-300">
                            <div class="flex flex-col gap-4 mb-6 items-start">
                                <h2 class="break-word transition-all heading-large cursor-pointer  inline-edit-light"
                                    style="color: rgb(255, 255, 255);">The First Taste Is Always the Most Dangerous
                                </h2>
                                <pre class="transition-all body-normal cursor-pointer  inline-edit-light" style="color: rgb(255, 255, 255);">This is the threshold. One look, one sound, and the door to your most intoxicating desires swings open. Beyond this point, there’s no turning back.</pre>
                            </div>
                        </div>
                        <div class="transition-all duration-300">
                            <div
                                class="grid grid-cols-1 lg:grid-cols-3 transition-all duration-300 gap-6 md:gap-10 mb-6 md:mb-10">
                                <div
                                    class="relative overflow-hidden transition-all duration-300 inline-edit-inset aspect-w-1 aspect-h-1 cursor-pointer  inline-edit-light">
                                    <span
                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: absolute; inset: 0px;"><img
                                            alt=""
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            decoding="async" data-nimg="fill"
                                            class="w-full h-full object-center object-cover  rounded-2xl md:rounded-3xl lg:rounded-4xl"
                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: medium; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover; object-position: center center;"><noscript></noscript></span>
                                </div>
                                <div
                                    class="relative overflow-hidden transition-all duration-300 inline-edit-inset aspect-w-1 aspect-h-1 cursor-pointer  inline-edit-light">
                                    <span
                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: absolute; inset: 0px;"><img
                                            alt=""
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            decoding="async" data-nimg="fill"
                                            class="w-full h-full object-center object-cover  rounded-2xl md:rounded-3xl lg:rounded-4xl"
                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: medium; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover; object-position: center center;"><noscript></noscript></span>
                                </div>
                                <div
                                    class="relative overflow-hidden transition-all duration-300 inline-edit-inset aspect-w-1 aspect-h-1 cursor-pointer  inline-edit-light">
                                    <span
                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: absolute; inset: 0px;"><img
                                            alt=""
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            decoding="async" data-nimg="fill"
                                            class="w-full h-full object-center object-cover  rounded-2xl md:rounded-3xl lg:rounded-4xl"
                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: medium; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover; object-position: center center;"><noscript></noscript></span>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 lg:grid-cols-2 transition-all duration-300 gap-6 md:gap-10">
                                <div
                                    class="relative overflow-hidden transition-all duration-300 inline-edit-inset aspect-w-1 aspect-h-1 cursor-pointer  inline-edit-light">
                                    <span
                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: absolute; inset: 0px;"><img
                                            alt=""
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            decoding="async" data-nimg="fill"
                                            class="w-full h-full object-center object-cover  rounded-2xl md:rounded-3xl lg:rounded-4xl"
                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: medium; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover; object-position: center center;"><noscript></noscript></span>
                                </div>
                                <div
                                    class="relative overflow-hidden transition-all duration-300 inline-edit-inset aspect-w-1 aspect-h-1 cursor-pointer  inline-edit-light">
                                    <span
                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: absolute; inset: 0px;"><img
                                            alt=""
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            decoding="async" data-nimg="fill"
                                            class="w-full h-full object-center object-cover  rounded-2xl md:rounded-3xl lg:rounded-4xl"
                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: medium; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover; object-position: center center;"><noscript></noscript></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="invisible">
                        <div class="transition-all duration-300">
                            <div class="flex flex-col gap-4 mb-6 items-start">
                                <h2 class="break-word transition-all heading-large cursor-pointer  inline-edit-light"
                                    style="color: rgb(255, 255, 255);">The First Taste Is Always the Most Dangerous
                                </h2>
                                <pre class="transition-all body-normal cursor-pointer  inline-edit-light" style="color: rgb(255, 255, 255);">This is the threshold. One look, one sound, and the door to your most intoxicating desires swings open. Beyond this point, there’s no turning back.</pre>
                            </div>
                        </div>
                        <div class="transition-all duration-300">
                            <div
                                class="grid grid-cols-1 lg:grid-cols-3 transition-all duration-300 gap-6 md:gap-10 mb-6 md:mb-10">
                                <div
                                    class="relative overflow-hidden transition-all duration-300 inline-edit-inset aspect-w-1 aspect-h-1 cursor-pointer  inline-edit-light">
                                    <span
                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: absolute; inset: 0px;"><img
                                            alt=""
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            decoding="async" data-nimg="fill"
                                            class="w-full h-full object-center object-cover  rounded-2xl md:rounded-3xl lg:rounded-4xl"
                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: medium; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover; object-position: center center;"><noscript></noscript></span>
                                </div>
                                <div
                                    class="relative overflow-hidden transition-all duration-300 inline-edit-inset aspect-w-1 aspect-h-1 cursor-pointer  inline-edit-light">
                                    <span
                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: absolute; inset: 0px;"><img
                                            alt=""
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            decoding="async" data-nimg="fill"
                                            class="w-full h-full object-center object-cover  rounded-2xl md:rounded-3xl lg:rounded-4xl"
                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: medium; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover; object-position: center center;"><noscript></noscript></span>
                                </div>
                                <div
                                    class="relative overflow-hidden transition-all duration-300 inline-edit-inset aspect-w-1 aspect-h-1 cursor-pointer  inline-edit-light">
                                    <span
                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: absolute; inset: 0px;"><img
                                            alt=""
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            decoding="async" data-nimg="fill"
                                            class="w-full h-full object-center object-cover  rounded-2xl md:rounded-3xl lg:rounded-4xl"
                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: medium; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover; object-position: center center;"><noscript></noscript></span>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 lg:grid-cols-2 transition-all duration-300 gap-6 md:gap-10">
                                <div
                                    class="relative overflow-hidden transition-all duration-300 inline-edit-inset aspect-w-1 aspect-h-1 cursor-pointer  inline-edit-light">
                                    <span
                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: absolute; inset: 0px;"><img
                                            alt=""
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            decoding="async" data-nimg="fill"
                                            class="w-full h-full object-center object-cover  rounded-2xl md:rounded-3xl lg:rounded-4xl"
                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: medium; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover; object-position: center center;"><noscript></noscript></span>
                                </div>
                                <div
                                    class="relative overflow-hidden transition-all duration-300 inline-edit-inset aspect-w-1 aspect-h-1 cursor-pointer  inline-edit-light">
                                    <span
                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: absolute; inset: 0px;"><img
                                            alt=""
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            decoding="async" data-nimg="fill"
                                            class="w-full h-full object-center object-cover  rounded-2xl md:rounded-3xl lg:rounded-4xl"
                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: medium; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover; object-position: center center;"><noscript></noscript></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div
            class="absolute transition-all -bottom-0.5 right-1/2 translate-x-1/2 w-full pointer-events-none group-hover:pointer-events-auto z-50 border-2 border-blue-figma group-hover:opacity-100 !opacity-0">
            <button data-tour="section"
                class="button ghost sm icon-right absolute -bottom-1/2 right-1/2 translate-x-1/2 translate-y-1/2 !ring-0 !ring-offset-0 font-sans !text-white bg-blue-figma"><span>Add
                    section</span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"
                    width="24" height="24" class="icon h-5 w-5" aria-hidden="true">
                    <path fill="currentColor"
                        d="M10.25 5.25c0-.41421-.33579-.75-.75-.75s-.75.33579-.75.75v4h-4c-.41421 0-.75.33579-.75.75 0 .4142.33579.75.75.75h4v4c0 .4142.33579.75.75.75s.75-.3358.75-.75v-4h4c.4142 0 .75-.3358.75-.75 0-.41421-.3358-.75-.75-.75h-4v-4Z">
                    </path>
                </svg></button>
        </div>
    </div>
    <div id="page-block-3" class="relative" style="z-index: 56;">
        <div class="transition-all left-full h-0 flex sticky z-70 justify-end  opacity-0 duration-250 pointer-events-none"
            style="top: 74px;">
            <div data-tour=""
                class="rounded-2xl bg-white p-2 shadow-md md:h-11 m-6 flex flex-col md:flex-row items-center gap-1 border border-gray-200 h-40">
                <button class="button ghost sm"><span class="font-sans">Restyle</span></button>
                <div class="flex-shrink-0 w-full md:w-px h-px md:h-4 bg-gray-200"></div><button
                    class="button ghost sm"><span class="font-sans">Regenerate images</span></button>
                <div class="flex-shrink-0 w-full md:w-px h-px md:h-4 bg-gray-200"></div><button
                    class="md:!hidden button ghost sm"><span class="font-sans">Edit section</span></button>
                <div class="flex-shrink-0 md:hidden w-full h-px bg-gray-200"></div>
                <div class="flex justify-between md:items-center gap-1 w-full">
                    <div class="relative h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon w-5 h-5 p-px" aria-hidden="true">
                                <path fill="currentColor"
                                    d="M9.71291 3.05691c-.08846.0366-.17133.09085-.24324.16276l-4.25 4.25c-.29289.29289-.29289.76777 0 1.06066s.76777.29289 1.06066 0L9.25 5.56066V16.25c0 .4142.33579.75.75.75.4142 0 .75-.3358.75-.75V5.56066l2.9697 2.96967c.2929.29289.7677.29289 1.0606 0 .2929-.29289.2929-.76777 0-1.06066l-4.25-4.25C10.3839 3.07322 10.1919 3 10 3c-.10169 0-.19866.02024-.28709.05691Z">
                                </path>
                            </svg></button></div>
                    <div class="relative h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon w-5 h-5 p-px" aria-hidden="true">
                                <path fill="currentColor"
                                    d="M9.71291 16.9431c-.08846-.0366-.17133-.0909-.24324-.1628l-4.25-4.25c-.29289-.2929-.29289-.7677 0-1.0606.29289-.2929.76777-.2929 1.06066 0L9.25 14.4393V3.75c0-.41421.33579-.75.75-.75.4142 0 .75.33579.75.75v10.6893l2.9697-2.9696c.2929-.2929.7677-.2929 1.0606 0 .2929.2929.2929.7677 0 1.0606l-4.25 4.25C10.3839 16.9268 10.1919 17 10 17c-.10169 0-.19866-.0202-.28709-.0569Z">
                                </path>
                            </svg></button></div>
                    <div class="relative block md:hidden h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" width="24" height="24" class="icon w-5 h-5 p-px"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M8 7v8c0 1.1046.89543 2 2 2h6M8 7V5c0-1.10457.89543-2 2-2h4.5858c.2652 0 .5196.10536.7071.29289l4.4142 4.41422c.1875.18753.2929.44189.2929.7071V15c0 1.1046-.8954 2-2 2h-2M8 7H6c-1.10457 0-2 .89543-2 2v10c0 1.1046.89543 2 2 2h8c1.1046 0 2-.8954 2-2v-2">
                                </path>
                            </svg></button></div>
                    <div class="relative block md:hidden h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon w-5 h-5" aria-hidden="true">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M7 5H3.75c-.41421 0-.75.33579-.75.75s.33579.75.75.75h12.5c.4142 0 .75-.33579.75-.75S16.6642 5 16.25 5H13V3.75C13 2.78379 12.2162 2 11.25 2h-2.5C7.78379 2 7 2.78379 7 3.75V5Zm1.5-1.25c0-.13779.11221-.25.25-.25h2.5c.1378 0 .25.11221.25.25V5h-3V3.75Z"
                                    clip-rule="evenodd"></path>
                                <path fill="currentColor"
                                    d="M5.48757 7.50106c.41364-.02178.76662.29589.78839.70953l.374 7.10491c.03505.6641.58332 1.1845 1.24804 1.1845h4.205c.664 0 1.213-.5206 1.248-1.1845l.374-7.10491c.0218-.41364.3748-.73131.7884-.70953.4137.02177.7313.37474.7096.78838l-.374 7.10496C14.772 16.8546 13.565 18 12.103 18H7.898c-1.46326 0-2.66898-1.1456-2.74596-2.6055l-.37401-7.10506c-.02177-.41364.2959-.76661.70954-.78838Z">
                                </path>
                            </svg></button></div>
                    <div class="relative hidden md:block h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon w-5 h-5 p-px" aria-hidden="true">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M4.75 3C3.7835 3 3 3.7835 3 4.75v10.5c0 .9665.7835 1.75 1.75 1.75h1.5C7.2165 17 8 16.2165 8 15.25V4.75C8 3.7835 7.2165 3 6.25 3h-1.5ZM4.5 4.75c0-.13807.11193-.25.25-.25h1.5c.13807 0 .25.11193.25.25v10.5c0 .1381-.11193.25-.25.25h-1.5c-.13807 0-.25-.1119-.25-.25V4.75Z"
                                    clip-rule="evenodd"></path>
                                <path fill="currentColor"
                                    d="M10.75 3.75c0 .41421-.3358.75-.75.75-.41421 0-.75-.33579-.75-.75S9.58579 3 10 3c.4142 0 .75.33579.75.75ZM10 17c.4142 0 .75-.3358.75-.75s-.3358-.75-.75-.75c-.41421 0-.75.3358-.75.75s.33579.75.75.75Zm7-7c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75c0-.41421.3358-.75.75-.75s.75.33579.75.75Zm-3.875 7c.4142 0 .75-.3358.75-.75s-.3358-.75-.75-.75-.75.3358-.75.75.3358.75.75.75ZM17 16.25c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75.3358-.75.75-.75.75.3358.75.75ZM13.125 4.5c.4142 0 .75-.33579.75-.75s-.3358-.75-.75-.75-.75.33579-.75.75.3358.75.75.75ZM17 3.75c0 .41421-.3358.75-.75.75s-.75-.33579-.75-.75.3358-.75.75-.75.75.33579.75.75Zm-.75 3.875c.4142 0 .75-.33579.75-.75s-.3358-.75-.75-.75-.75.33579-.75.75.3358.75.75.75Zm.75 5.5c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75.3358-.75.75-.75.75.3358.75.75Z">
                                </path>
                            </svg></button></div>
                    <div class="relative inline-flex text-left hidden md:block h-7" data-headlessui-state=""><button
                            class="button ghost sm icon z-5" id="headlessui-menu-button-5" type="button"
                            aria-haspopup="menu" aria-expanded="false" data-headlessui-state=""><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon h-5 w-5" aria-hidden="true">
                                <path fill="currentColor"
                                    d="M11.25 5c0 .69036-.5596 1.25-1.25 1.25-.69036 0-1.25-.55964-1.25-1.25S9.30964 3.75 10 3.75c.6904 0 1.25.55964 1.25 1.25Zm0 5c0 .6904-.5596 1.25-1.25 1.25-.69036 0-1.25-.5596-1.25-1.25 0-.69036.55964-1.25 1.25-1.25.6904 0 1.25.55964 1.25 1.25Zm0 5c0 .6904-.5596 1.25-1.25 1.25-.69036 0-1.25-.5596-1.25-1.25s.55964-1.25 1.25-1.25c.6904 0 1.25.5596 1.25 1.25Z">
                                </path>
                            </svg></button>
                        <div class="z-100 transition-opacity opacity-0"
                            style="position: absolute; left: 0px; top: 0px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <section class="relative">
            <div class="relative flex break-word transition-all duration-300 items-center fix-safari-flickering"
                style="min-height: calc(134px); padding-top: 0px; padding-bottom: 0px;">
                <div class="absolute inset-0 z-10 pointer-events-none">
                    <div class="absolute inset-0 z-10 transition-all duration-300"
                        style="background-color: rgb(38, 35, 35);"></div>
                </div>
                <div
                    class="relative z-10 container mx-auto px-5 md:px-6 transition-all duration-300 pt-12 lg:pt-20 pb-12 lg:pb-20">
                    <div class="absolute left-0 top-8 min-h-full min-w-full"></div>
                    <div class="relative z-10 w-full h-full" style="display: none;" hidden="">
                        <div
                            class="flex w-full gap-10 lg:gap-20 transition-all duration-300 flex-col-reverse lg:flex-row-reverse items-center cursor-pointer  inline-edit-light">
                            <div class="flex-1 flex flex-col w-full max-w-240 items-start">
                                <div class="rich-text-block website-wysiwyg cursor-pointer  inline-edit-light"
                                    style="color: rgb(255, 255, 255);">
                                    <h2 style="white-space:pre-line">Three worlds. Three obsessions. Which will you
                                        surrender to first?</h2>
                                    <p><span style="color:#ba372a"><em><strong>OBEY</strong></em></span><br>The art of
                                        control is never loud — it’s in the breath you hold, the glance that lingers,
                                        the moment you realize you’ve already given in. In Obey, each page is a slow
                                        surrender, every panel an unspoken command. You’ll find yourself leaning closer…
                                        just to feel the next touch.</p>
                                    <p><span style="color:#ba372a"><em><strong>ARCANE'S
                                                    OBESSION&nbsp;&nbsp;</strong></em></span><br>Magic is powerful — but
                                        obsession is far more primal. In Arcane’s Obsession, lust is laced with power,
                                        and every ritual binds more than the body. Here, pleasure isn’t offered. It’s
                                        taken. And once the spell is cast, you’ll beg for the darkness to claim you.</p>
                                    <p><span style="color:#ba372a"><em><strong>BOUND</strong></em></span><br>Rope
                                        doesn’t just hold — it speaks. In Bound, every knot is a sentence, every tug a
                                        declaration, every release a promise. This is where restraint becomes an art
                                        form, and your body becomes the canvas. Step inside… and let the lines tell your
                                        story.</p>
                                </div><button
                                    class="website-button mt-6 lg:mt-8 w-full md:w-max cursor-pointer  inline-edit-light md"
                                    style="border-width: 2px; border-style: solid; box-shadow: none; font-family: var(--body-fontFamily); font-weight: var(--body-fontWeight, 500); font-style: var(--body-fontStyle); background-color: rgb(109, 95, 95); color: rgb(255, 255, 255); border-radius: 8px; border-color: rgb(109, 95, 95);">Contact</button>
                            </div>
                            <div
                                class="flex-1 flex w-full lg:max-w-1/2 h-full transition-all duration-300 justify-center lg:justify-start">
                                <div
                                    class="flex-shrink-0 relative mx-auto w-full h-full transition-all duration-300 inline-edit-inset aspect-w-2 aspect-h-3 cursor-pointer  inline-edit-light">
                                    <span
                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: absolute; inset: 0px;"><img
                                            alt=""
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            decoding="async" data-nimg="fill"
                                            class="transition-all duration-300 rounded-2xl md:rounded-3xl lg:rounded-4xl"
                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: medium; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover; object-position: center center;"><noscript></noscript></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="invisible">
                        <div
                            class="flex w-full gap-10 lg:gap-20 transition-all duration-300 flex-col-reverse lg:flex-row-reverse items-center cursor-pointer  inline-edit-light">
                            <div class="flex-1 flex flex-col w-full max-w-240 items-start">
                                <div class="rich-text-block website-wysiwyg cursor-pointer  inline-edit-light"
                                    style="color: rgb(255, 255, 255);">
                                    <h2 style="white-space:pre-line">Three worlds. Three obsessions. Which will you
                                        surrender to first?</h2>
                                    <p><span style="color:#ba372a"><em><strong>OBEY</strong></em></span><br>The art of
                                        control is never loud — it’s in the breath you hold, the glance that lingers,
                                        the moment you realize you’ve already given in. In Obey, each page is a slow
                                        surrender, every panel an unspoken command. You’ll find yourself leaning closer…
                                        just to feel the next touch.</p>
                                    <p><span style="color:#ba372a"><em><strong>ARCANE'S
                                                    OBESSION&nbsp;&nbsp;</strong></em></span><br>Magic is powerful — but
                                        obsession is far more primal. In Arcane’s Obsession, lust is laced with power,
                                        and every ritual binds more than the body. Here, pleasure isn’t offered. It’s
                                        taken. And once the spell is cast, you’ll beg for the darkness to claim you.</p>
                                    <p><span style="color:#ba372a"><em><strong>BOUND</strong></em></span><br>Rope
                                        doesn’t just hold — it speaks. In Bound, every knot is a sentence, every tug a
                                        declaration, every release a promise. This is where restraint becomes an art
                                        form, and your body becomes the canvas. Step inside… and let the lines tell your
                                        story.</p>
                                </div><button
                                    class="website-button mt-6 lg:mt-8 w-full md:w-max cursor-pointer  inline-edit-light md"
                                    style="border-width: 2px; border-style: solid; box-shadow: none; font-family: var(--body-fontFamily); font-weight: var(--body-fontWeight, 500); font-style: var(--body-fontStyle); background-color: rgb(109, 95, 95); color: rgb(255, 255, 255); border-radius: 8px; border-color: rgb(109, 95, 95);">Contact</button>
                            </div>
                            <div
                                class="flex-1 flex w-full lg:max-w-1/2 h-full transition-all duration-300 justify-center lg:justify-start">
                                <div
                                    class="flex-shrink-0 relative mx-auto w-full h-full transition-all duration-300 inline-edit-inset aspect-w-2 aspect-h-3 cursor-pointer  inline-edit-light">
                                    <span
                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: absolute; inset: 0px;"><img
                                            alt=""
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            decoding="async" data-nimg="fill"
                                            class="transition-all duration-300 rounded-2xl md:rounded-3xl lg:rounded-4xl"
                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: medium; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover; object-position: center center;"><noscript></noscript></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div
            class="absolute transition-all -bottom-0.5 right-1/2 translate-x-1/2 w-full pointer-events-none group-hover:pointer-events-auto z-50 border-2 border-blue-figma group-hover:opacity-100 !opacity-0">
            <button data-tour="section"
                class="button ghost sm icon-right absolute -bottom-1/2 right-1/2 translate-x-1/2 translate-y-1/2 !ring-0 !ring-offset-0 font-sans !text-white bg-blue-figma"><span>Add
                    section</span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"
                    width="24" height="24" class="icon h-5 w-5" aria-hidden="true">
                    <path fill="currentColor"
                        d="M10.25 5.25c0-.41421-.33579-.75-.75-.75s-.75.33579-.75.75v4h-4c-.41421 0-.75.33579-.75.75 0 .4142.33579.75.75.75h4v4c0 .4142.33579.75.75.75s.75-.3358.75-.75v-4h4c.4142 0 .75-.3358.75-.75 0-.41421-.3358-.75-.75-.75h-4v-4Z">
                    </path>
                </svg></button>
        </div>
    </div>
    <div id="page-block-4" class="relative" style="z-index: 55;">
        <div class="transition-all left-full h-0 flex sticky z-70 justify-end  opacity-0 duration-250 pointer-events-none"
            style="top: 74px;">
            <div data-tour=""
                class="rounded-2xl bg-white p-2 shadow-md md:h-11 m-6 flex flex-col md:flex-row items-center gap-1 border border-gray-200 h-32">
                <button class="button ghost sm"><span class="font-sans">Restyle</span></button>
                <div class="flex-shrink-0 w-full md:w-px h-px md:h-4 bg-gray-200"></div><button
                    class="md:!hidden button ghost sm"><span class="font-sans">Edit section</span></button>
                <div class="flex-shrink-0 md:hidden w-full h-px bg-gray-200"></div>
                <div class="flex justify-between md:items-center gap-1 w-full">
                    <div class="relative h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon w-5 h-5 p-px" aria-hidden="true">
                                <path fill="currentColor"
                                    d="M9.71291 3.05691c-.08846.0366-.17133.09085-.24324.16276l-4.25 4.25c-.29289.29289-.29289.76777 0 1.06066s.76777.29289 1.06066 0L9.25 5.56066V16.25c0 .4142.33579.75.75.75.4142 0 .75-.3358.75-.75V5.56066l2.9697 2.96967c.2929.29289.7677.29289 1.0606 0 .2929-.29289.2929-.76777 0-1.06066l-4.25-4.25C10.3839 3.07322 10.1919 3 10 3c-.10169 0-.19866.02024-.28709.05691Z">
                                </path>
                            </svg></button></div>
                    <div class="relative h-7 pointer-events-none"><button class="button ghost sm icon"
                            disabled=""><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20" width="24" height="24" class="icon w-5 h-5 p-px"
                                aria-hidden="true">
                                <path fill="currentColor"
                                    d="M9.71291 16.9431c-.08846-.0366-.17133-.0909-.24324-.1628l-4.25-4.25c-.29289-.2929-.29289-.7677 0-1.0606.29289-.2929.76777-.2929 1.06066 0L9.25 14.4393V3.75c0-.41421.33579-.75.75-.75.4142 0 .75.33579.75.75v10.6893l2.9697-2.9696c.2929-.2929.7677-.2929 1.0606 0 .2929.2929.2929.7677 0 1.0606l-4.25 4.25C10.3839 16.9268 10.1919 17 10 17c-.10169 0-.19866-.0202-.28709-.0569Z">
                                </path>
                            </svg></button></div>
                    <div class="relative block md:hidden h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" width="24" height="24" class="icon w-5 h-5 p-px"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M8 7v8c0 1.1046.89543 2 2 2h6M8 7V5c0-1.10457.89543-2 2-2h4.5858c.2652 0 .5196.10536.7071.29289l4.4142 4.41422c.1875.18753.2929.44189.2929.7071V15c0 1.1046-.8954 2-2 2h-2M8 7H6c-1.10457 0-2 .89543-2 2v10c0 1.1046.89543 2 2 2h8c1.1046 0 2-.8954 2-2v-2">
                                </path>
                            </svg></button></div>
                    <div class="relative block md:hidden h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon w-5 h-5" aria-hidden="true">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M7 5H3.75c-.41421 0-.75.33579-.75.75s.33579.75.75.75h12.5c.4142 0 .75-.33579.75-.75S16.6642 5 16.25 5H13V3.75C13 2.78379 12.2162 2 11.25 2h-2.5C7.78379 2 7 2.78379 7 3.75V5Zm1.5-1.25c0-.13779.11221-.25.25-.25h2.5c.1378 0 .25.11221.25.25V5h-3V3.75Z"
                                    clip-rule="evenodd"></path>
                                <path fill="currentColor"
                                    d="M5.48757 7.50106c.41364-.02178.76662.29589.78839.70953l.374 7.10491c.03505.6641.58332 1.1845 1.24804 1.1845h4.205c.664 0 1.213-.5206 1.248-1.1845l.374-7.10491c.0218-.41364.3748-.73131.7884-.70953.4137.02177.7313.37474.7096.78838l-.374 7.10496C14.772 16.8546 13.565 18 12.103 18H7.898c-1.46326 0-2.66898-1.1456-2.74596-2.6055l-.37401-7.10506c-.02177-.41364.2959-.76661.70954-.78838Z">
                                </path>
                            </svg></button></div>
                    <div class="relative hidden md:block h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon w-5 h-5 p-px" aria-hidden="true">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M4.75 3C3.7835 3 3 3.7835 3 4.75v10.5c0 .9665.7835 1.75 1.75 1.75h1.5C7.2165 17 8 16.2165 8 15.25V4.75C8 3.7835 7.2165 3 6.25 3h-1.5ZM4.5 4.75c0-.13807.11193-.25.25-.25h1.5c.13807 0 .25.11193.25.25v10.5c0 .1381-.11193.25-.25.25h-1.5c-.13807 0-.25-.1119-.25-.25V4.75Z"
                                    clip-rule="evenodd"></path>
                                <path fill="currentColor"
                                    d="M10.75 3.75c0 .41421-.3358.75-.75.75-.41421 0-.75-.33579-.75-.75S9.58579 3 10 3c.4142 0 .75.33579.75.75ZM10 17c.4142 0 .75-.3358.75-.75s-.3358-.75-.75-.75c-.41421 0-.75.3358-.75.75s.33579.75.75.75Zm7-7c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75c0-.41421.3358-.75.75-.75s.75.33579.75.75Zm-3.875 7c.4142 0 .75-.3358.75-.75s-.3358-.75-.75-.75-.75.3358-.75.75.3358.75.75.75ZM17 16.25c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75.3358-.75.75-.75.75.3358.75.75ZM13.125 4.5c.4142 0 .75-.33579.75-.75s-.3358-.75-.75-.75-.75.33579-.75.75.3358.75.75.75ZM17 3.75c0 .41421-.3358.75-.75.75s-.75-.33579-.75-.75.3358-.75.75-.75.75.33579.75.75Zm-.75 3.875c.4142 0 .75-.33579.75-.75s-.3358-.75-.75-.75-.75.33579-.75.75.3358.75.75.75Zm.75 5.5c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75.3358-.75.75-.75.75.3358.75.75Z">
                                </path>
                            </svg></button></div>
                    <div class="relative inline-flex text-left hidden md:block h-7" data-headlessui-state=""><button
                            class="button ghost sm icon z-5" id="headlessui-menu-button-6" type="button"
                            aria-haspopup="menu" aria-expanded="false" data-headlessui-state=""><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon h-5 w-5" aria-hidden="true">
                                <path fill="currentColor"
                                    d="M11.25 5c0 .69036-.5596 1.25-1.25 1.25-.69036 0-1.25-.55964-1.25-1.25S9.30964 3.75 10 3.75c.6904 0 1.25.55964 1.25 1.25Zm0 5c0 .6904-.5596 1.25-1.25 1.25-.69036 0-1.25-.5596-1.25-1.25 0-.69036.55964-1.25 1.25-1.25.6904 0 1.25.55964 1.25 1.25Zm0 5c0 .6904-.5596 1.25-1.25 1.25-.69036 0-1.25-.5596-1.25-1.25s.55964-1.25 1.25-1.25c.6904 0 1.25.5596 1.25 1.25Z">
                                </path>
                            </svg></button>
                        <div class="z-100 transition-opacity opacity-0"
                            style="position: absolute; left: 0px; top: 0px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <section class="relative">
            <div class="relative flex flex-none break-word transition-all duration-300 items-center fix-safari-flickering"
                style="min-height: calc(134px); padding-top: 0px; padding-bottom: 0px;">
                <div class="absolute inset-0 z-10 pointer-events-none">
                    <div class="absolute inset-0 z-10 transition-all duration-300"
                        style="background-color: rgb(38, 35, 35);"></div>
                </div>
                <div
                    class="container mx-auto px-5 md:px-6 relative z-10 transition-all duration-300 pt-16 lg:pt-32 pb-16 lg:pb-32">
                    <div class="absolute left-0 top-8 min-h-full min-w-full"></div>
                    <div class="relative z-10 w-full h-full" style="display: none;" hidden="">
                        <div
                            class="flex flex-col w-full gap-10 transition-all duration-300 lg:flex-row lg:gap-20 cursor-pointer  inline-edit-light">
                            <div class="w-full lg:w-1/2">
                                <div class="contact-form rich-text-block website-wysiwyg"
                                    style="color: rgb(255, 255, 255);">
                                    <h3>Contact the Guild</h3>
                                    <p>Contact The Guided Vice&nbsp;</p>
                                </div>
                            </div>
                            <div class="flex flex-col gap-10 w-full lg:w-1/2">
                                <div class="flex flex-col lg:grid lg:grid-cols-2 gap-4 w-full pointer-events-none">
                                    <div class=""><label class="mb-1 body-small"
                                            style="color: rgb(255, 255, 255);">Name</label><input
                                            class="input border-none !shadow-none !placeholder-current"
                                            style="border-radius: 8px; background-color: rgba(255, 255, 255, 0.08); color: rgb(255, 255, 255);"
                                            type="text"></div>
                                    <div class=""><label class="mb-1 body-small"
                                            style="color: rgb(255, 255, 255);">Email</label><input
                                            class="input border-none !shadow-none !placeholder-current"
                                            style="border-radius: 8px; background-color: rgba(255, 255, 255, 0.08); color: rgb(255, 255, 255);"
                                            type="text"></div>
                                    <div class="col-span-2"><label class="mb-1 body-small"
                                            style="color: rgb(255, 255, 255);">Message</label>
                                        <textarea class="input border-none !shadow-none !placeholder-current" rows="5"
                                            style="border-radius: 8px; background-color: rgba(255, 255, 255, 0.08); color: rgb(255, 255, 255);"></textarea>
                                    </div>
                                    <div class="col-span-2 md:pt-4 text-left"><button
                                            class="website-button min-w-36 md"
                                            style="border-width: 2px; border-style: solid; box-shadow: none; font-family: var(--body-fontFamily); font-weight: var(--body-fontWeight, 500); font-style: var(--body-fontStyle); background-color: rgb(51, 51, 51); color: rgb(255, 255, 255); border-radius: 8px; border-color: rgb(51, 51, 51);">Send
                                            Message</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="invisible">
                        <div
                            class="flex flex-col w-full gap-10 transition-all duration-300 lg:flex-row lg:gap-20 cursor-pointer  inline-edit-light">
                            <div class="w-full lg:w-1/2">
                                <div class="contact-form rich-text-block website-wysiwyg"
                                    style="color: rgb(255, 255, 255);">
                                    <h3>Contact the Guild</h3>
                                    <p>Contact The Guided Vice&nbsp;</p>
                                </div>
                            </div>
                            <div class="flex flex-col gap-10 w-full lg:w-1/2">
                                <div class="flex flex-col lg:grid lg:grid-cols-2 gap-4 w-full pointer-events-none">
                                    <div class=""><label class="mb-1 body-small"
                                            style="color: rgb(255, 255, 255);">Name</label><input
                                            class="input border-none !shadow-none !placeholder-current"
                                            style="border-radius: 8px; background-color: rgba(255, 255, 255, 0.08); color: rgb(255, 255, 255);"
                                            type="text"></div>
                                    <div class=""><label class="mb-1 body-small"
                                            style="color: rgb(255, 255, 255);">Email</label><input
                                            class="input border-none !shadow-none !placeholder-current"
                                            style="border-radius: 8px; background-color: rgba(255, 255, 255, 0.08); color: rgb(255, 255, 255);"
                                            type="text"></div>
                                    <div class="col-span-2"><label class="mb-1 body-small"
                                            style="color: rgb(255, 255, 255);">Message</label>
                                        <textarea class="input border-none !shadow-none !placeholder-current" rows="5"
                                            style="border-radius: 8px; background-color: rgba(255, 255, 255, 0.08); color: rgb(255, 255, 255);"></textarea>
                                    </div>
                                    <div class="col-span-2 md:pt-4 text-left"><button
                                            class="website-button min-w-36 md"
                                            style="border-width: 2px; border-style: solid; box-shadow: none; font-family: var(--body-fontFamily); font-weight: var(--body-fontWeight, 500); font-style: var(--body-fontStyle); background-color: rgb(51, 51, 51); color: rgb(255, 255, 255); border-radius: 8px; border-color: rgb(51, 51, 51);">Send
                                            Message</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div
            class="absolute transition-all -bottom-0.5 right-1/2 translate-x-1/2 w-full pointer-events-none group-hover:pointer-events-auto z-50 border-2 border-blue-figma group-hover:opacity-100 !opacity-0">
            <button data-tour="section"
                class="button ghost sm icon-right absolute -bottom-1/2 right-1/2 translate-x-1/2 translate-y-1/2 !ring-0 !ring-offset-0 font-sans !text-white bg-blue-figma"><span>Add
                    section</span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"
                    width="24" height="24" class="icon h-5 w-5" aria-hidden="true">
                    <path fill="currentColor"
                        d="M10.25 5.25c0-.41421-.33579-.75-.75-.75s-.75.33579-.75.75v4h-4c-.41421 0-.75.33579-.75.75 0 .4142.33579.75.75.75h4v4c0 .4142.33579.75.75.75s.75-.3358.75-.75v-4h4c.4142 0 .75-.3358.75-.75 0-.41421-.3358-.75-.75-.75h-4v-4Z">
                    </path>
                </svg></button>
        </div>
    </div>
    <div id="page-block-5" class="relative flex-1" style="z-index: 54;">
        <div class="transition-all left-full h-0 flex sticky z-70 justify-end  opacity-0 duration-250 pointer-events-none"
            style="top: 0px;">
            <div data-tour=""
                class="rounded-2xl bg-white p-2 shadow-md md:h-11 m-6 flex flex-col md:flex-row items-center gap-1 border border-gray-200 h-21">
                <button class="button ghost sm"><span class="font-sans">Restyle</span></button>
                <div class="flex-shrink-0 w-full md:w-px h-px md:h-4 bg-gray-200"></div><button
                    class="md:!hidden button ghost sm"><span class="font-sans">Edit website footer</span></button>
                <div class="flex justify-between md:items-center gap-1 w-full">
                    <div class="relative hidden md:block h-7"><button class="button ghost sm icon"><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon w-5 h-5 p-px" aria-hidden="true">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M4.75 3C3.7835 3 3 3.7835 3 4.75v10.5c0 .9665.7835 1.75 1.75 1.75h1.5C7.2165 17 8 16.2165 8 15.25V4.75C8 3.7835 7.2165 3 6.25 3h-1.5ZM4.5 4.75c0-.13807.11193-.25.25-.25h1.5c.13807 0 .25.11193.25.25v10.5c0 .1381-.11193.25-.25.25h-1.5c-.13807 0-.25-.1119-.25-.25V4.75Z"
                                    clip-rule="evenodd"></path>
                                <path fill="currentColor"
                                    d="M10.75 3.75c0 .41421-.3358.75-.75.75-.41421 0-.75-.33579-.75-.75S9.58579 3 10 3c.4142 0 .75.33579.75.75ZM10 17c.4142 0 .75-.3358.75-.75s-.3358-.75-.75-.75c-.41421 0-.75.3358-.75.75s.33579.75.75.75Zm7-7c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75c0-.41421.3358-.75.75-.75s.75.33579.75.75Zm-3.875 7c.4142 0 .75-.3358.75-.75s-.3358-.75-.75-.75-.75.3358-.75.75.3358.75.75.75ZM17 16.25c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75.3358-.75.75-.75.75.3358.75.75ZM13.125 4.5c.4142 0 .75-.33579.75-.75s-.3358-.75-.75-.75-.75.33579-.75.75.3358.75.75.75ZM17 3.75c0 .41421-.3358.75-.75.75s-.75-.33579-.75-.75.3358-.75.75-.75.75.33579.75.75Zm-.75 3.875c.4142 0 .75-.33579.75-.75s-.3358-.75-.75-.75-.75.33579-.75.75.3358.75.75.75Zm.75 5.5c0 .4142-.3358.75-.75.75s-.75-.3358-.75-.75.3358-.75.75-.75.75.3358.75.75Z">
                                </path>
                            </svg></button></div>
                    <div class="relative inline-flex text-left hidden md:block h-7" data-headlessui-state=""><button
                            class="button ghost sm icon z-5" id="headlessui-menu-button-7" type="button"
                            aria-haspopup="menu" aria-expanded="false" data-headlessui-state=""><svg
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" width="24"
                                height="24" class="icon h-5 w-5" aria-hidden="true">
                                <path fill="currentColor"
                                    d="M11.25 5c0 .69036-.5596 1.25-1.25 1.25-.69036 0-1.25-.55964-1.25-1.25S9.30964 3.75 10 3.75c.6904 0 1.25.55964 1.25 1.25Zm0 5c0 .6904-.5596 1.25-1.25 1.25-.69036 0-1.25-.5596-1.25-1.25 0-.69036.55964-1.25 1.25-1.25.6904 0 1.25.55964 1.25 1.25Zm0 5c0 .6904-.5596 1.25-1.25 1.25-.69036 0-1.25-.5596-1.25-1.25s.55964-1.25 1.25-1.25c.6904 0 1.25.5596 1.25 1.25Z">
                                </path>
                            </svg></button>
                        <div class="z-100 transition-opacity opacity-0"
                            style="position: absolute; left: 0px; top: 0px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="flex flex-col relative h-full">
            <div class="relative flex-1 fix-safari-flickering"
                style="color: rgb(255, 255, 255); padding-top: 0px; padding-bottom: 0px;">
                <div class="absolute inset-0 z-10 pointer-events-none">
                    <div class="absolute inset-0 z-10 transition-all duration-300"
                        style="background-color: rgb(25, 21, 21);"></div>
                </div>
                <div
                    class="inline-edit-inset container mx-auto px-5 md:px-6 relative z-10 pt-12 lg:pt-14 xl:pt-20 pb-12 lg:pb-14 xl:pb-20 cursor-pointer  inline-edit-light">
                    <div class="flex flex-col lg:flex-row items-start lg:justify-between gap-12">
                        <div class="flex flex-col gap-6 items-start lg:max-w-[30vw]">
                            <div data-tour="logo" class="grid max-w-full cursor-pointer  inline-edit-light"
                                logo="[object Object]" text="The Guided Vice" location="footer" color="#FFFFFF">
                                <h2 class="heading-small lg:heading-medium max-w-full whitespace-nowrap overflow-hidden overflow-ellipsis"
                                    style="color: rgb(255, 255, 255); font-family: var(--footer-logo-fontFamily); font-weight: var(--footer-logo-fontWeight); width: 173.8px;">
                                    The Guided Vice</h2>
                            </div>
                        </div>
                        <div class="flex flex-col gap-12 lg:gap-6">
                            <div class="flex flex-col lg:flex-row gap-12 lg:items-center lg:justify-end"></div>
                            <p class="body-normal lg:text-right whitespace-nowrap"><span>Made with&nbsp;</span><a
                                    target="_blank" class="underline text-current"
                                    href="https://durable.co">Durable</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</main>
