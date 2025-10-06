{{-- auth modal  --}}
<div class="fixed auth-modal w-full h-screen top-0 left-0 bg-[rgba(0,0,0,0.5)] items-center justify-center p-3"
    style="display: none;">
    <div class="w-full md:max-w-[45vw] bg-white rounded-md min-h-[40vh] p-3">
        <div class="flex items-center justify-between mb-5">
            <h1 class="text-base md:text-xl">To complete your indulgence, please create your Guilded Vice account.</h1>
            <svg onclick="closeAuthModal()" class="cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12.012 2.004C6.492 2 2.013 6.474 2.01 11.994S6.48 21.993 12 21.996a9.996 9.996 0 0 0 10.002-9.99c.003-5.52-4.47-9.999-9.99-10.002m0 18.992A8.996 8.996 0 1 1 12 3.004a8.996 8.996 0 0 1 .012 17.992M12.707 12l3.182-3.182a.5.5 0 0 0-.707-.707L12 11.293L8.818 8.111a.5.5 0 0 0-.707.707L11.293 12l-3.182 3.182a.5.5 0 0 0 .707.707L12 12.707l3.182 3.182a.5.5 0 0 0 .707-.707z"/></svg>
        </div>
        <div class="w-full email">
            <label for="email" class="block text-sm font-medium "> Email</label>
            <input type="email" id="email" placeholder="jhon_doe@example.com" name="email" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                />
        </div>
        <div class="w-full name hidden">
            <label for="name" class="block text-sm font-medium ">Name</label>
            <input type="text" id="name" placeholder="Jhon Doe" name="name" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                />
        </div>
        <div class="w-full password hidden">
            <label for="password" class="block text-sm font-medium "> Password</label>
            <input type="password" id="password" placeholder="*******" name="password" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                />
        </div>
        <p class="text-blue-600 mt-2 cursor-pointer" onclick="formReset()">Change email</p>
        <div class="w-full mt-2">
            <button onclick="authCheck()" class="bg-blue-800 text-white w-full text-center rounded-md cursor-pointer py-2">Continue</button>
            <p class="text-base md:text-normal w-full">By clicking <strong>"Continue"</strong>, I agree to the Terms of Pleasure and Conditions</p>
        </div>
    </div>
</div>


<script>
    let authEmail='check';
    function closeAuthModal(){
        $('.auth-modal').css({display:'none'});
    }

    function formReset(){
        authEmail = 'check';
        $('.email').removeClass('hidden')
        $('.password').addClass('hidden');
        $('.name').addClass('hidden');
    }

    async function authCheck(){
        const data = {
            name: $("input[name='name']").val(),
            email: $("input[name='email']").val(),
            password: $("input[name='password']").val(),
            axios:true,
        }

        const header = {
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    }

        const url = authEmail == 'check' ? '{{route('auth.check')}}' : (authEmail == 'login' ? '{{route('auth.login')}}' : '{{route('auth.register')}}')

        try {
            const res = await axios.post(url,data,header);
            if(res.data?.code == 'EMAIL_EXISTS'){
                authEmail = 'login';
                $('.email').addClass('hidden')
                $('.password').removeClass('hidden')
            }else if(res.data?.code == 'EMAIL_NOT_EXISTS'){
                authEmail = 'register';
                $('.email').addClass('hidden')
                $('.password').removeClass('hidden');
                $('.name').removeClass('hidden');
            }else{
                if(res.data?.code == 'LOGIN_SUCCESS' || res.data?.code == 'REGISTRATION_SUCCESS'){
                    window.location.href= '{{route('user.purchase')}}'
                }
            }
        } catch (error) {
            Swal.fire({
                icon:'error',
                title:'Authentication ERROR!',
                text: error.response?.data.message
            });
        }



    }
</script>
