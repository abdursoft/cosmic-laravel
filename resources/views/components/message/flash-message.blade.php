@if (session('success') || session('error') || session('info') || session('otp'))
    <div id="flash-message"
         class="fixed top-4 right-4 z-50
                {{ session('success') ? 'bg-green-500' : (session('error') ? 'bg-red-500' : (session('info') ? 'bg-blue-500' : 'bg-red-500')) }}
                text-white px-4 py-2 rounded shadow-lg"
         role="alert">
        {{ session('success') ?? session('error') ?? session('info') ?? session('otp') }}
    </div>

    <script>
        setTimeout(() => {
            const flash = document.getElementById('flash-message');
            if (flash) {
                flash.style.transition = "opacity 0.5s ease";
                flash.style.opacity = "0";
                setTimeout(() => flash.remove(), 500);
            }
        }, 3000); // 3s
    </script>
@endif
