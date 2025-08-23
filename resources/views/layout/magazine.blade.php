<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    {{-- load meta tags  --}}
    @yield('meta')

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- custom style  --}}
        <style>
        :root {
            --bg: #0b0c10;
            --page-bg: #111218;
            --ui: #eaeaea;
            --ui-dim: #9aa0a6;
            --accent: #62dfff
        }

        html,
        body {
            height: 100%
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--ui);
            font-family: system-ui, -apple-system, Segoe UI, Roboto, Inter, Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center
        }

        .app {
            width: 100%;
            height: min(100vh, 720px);
            position: relative;
            overflow: hidden;
            border-radius: 14px;
            box-shadow: 0 10px 40px rgb(0 0 0 / .45);
            background: linear-gradient(180deg, #0e1016, #0a0b10)
        }

        .gate {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            gap: 18px;
            align-items: center;
            justify-content: center;
            background: radial-gradient(70%80%at 50%30%, #121522, #0b0c10 60%);
            padding: 24px;
            text-align: center
        }

        .gate h1 {
            margin: 0;
            font-weight: 700;
            letter-spacing: .5px
        }

        .gate p {
            margin: .25rem 0 0;
            color: var(--ui-dim)
        }

        .btn {
            border: 0;
            border-radius: 10px;
            padding: 14px 18px;
            background: var(--accent);
            color: #071318;
            font-weight: 700;
            cursor: pointer;
            transition: transform.06s ease, box-shadow.2s ease;
            box-shadow: 0 6px 20px rgb(98 223 255 / .25)
        }

        .closeBtn{
            padding: 5px 10px !important;
            width: 180px !important;
            border-radius: 15px !important;
            font-size: 16px !important;
            height: 40px !important;
            font-weight: normal !important;
        }

        .btn:active {
            transform: translateY(1px)
        }

        .book {
            position: absolute;
            inset: 0;
            display: grid;
            grid-template-rows: auto 1fr auto;
            opacity: 0;
            pointer-events: none;
            transition: opacity.3s ease
        }

        .book.ready {
            opacity: 1;
            pointer-events: auto
        }

        .topbar,
        .bottombar {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            position: relative
        }

        .topbar,
        .bottombar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: .5rem;
            padding: 10px 14px;
            color: var(--ui-dim);
            background: linear-gradient(180deg, rgb(255 255 255 / .04), transparent)
        }

        .bottombar .hint {
            flex: 1;
            max-width: 250px;
            z-index: 0;
        }

        .bottombar .nav {
            display: flex;
            gap: 3.5rem;
            justify-content: center;
            flex: 1;
        }

        .bottombar .nav button {
            padding: .4rem .8rem;
            font-size: 1.2rem;
            cursor: pointer
        }

        .bottombar .pill {
            background: #eee;
            padding: .4rem .8rem;
            border-radius: 9999px;
            font-size: .9rem;
            white-space: nowrap;
            flex: 1;
            text-align: center;
            max-width: 100px;
            text-align: right;
            color: #000
        }

        #bookContainer{
            width: 100%;
            height: 100%;
        }

        #magazine{
            width: 100% !important;
            height: 100% !important;
            position: absolute;
        }

        #magazine .turn-page {
            background-color: #ccc;
            background-size: 100% 100%;
        }

        .turn-page-wrapper{
            width: 100% !important;
            height: 100% !important;
        }

        #magazine .cover{
            width: 100%;
            height:100%;
            position:relative;
        }

        .cover img{
            width: 100%;
            height: 100%;
            position: absolute;
        }

        @media (max-width:600px) {
            .bottombar {
                flex-direction: column;
                align-items: center;
                text-align: center
            }

            .bottombar .hint,
            .bottombar .pill {
                flex: unset;
                text-align: center
            }

            .bottombar .nav {
                width: 100%;
                order: 2;
                justify-content: space-between
            }

            .bottombar .hint {
                order: 1
            }

            .bottombar .pill {
                background: none;
                order: 3
            }

            .leftFlex {
                width: 100%;
                justify-content: space-between
            }

            .closeBtn {
                display: none
            }

            #sceneLabel {
                display: none
            }
        }

        @media (min-width:600px) {
            .topClose {
                display: none
            }
        }

        .page-wrap {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: var(--page-bg)
        }

        .nav {
            position: absolute;
            inset: 0;
            z-index: 99;
            display: flex;
            justify-content: space-between;
            align-items: center;
            pointer-events: none
        }

        .nav button {
            pointer-events: auto;
            border: 0;
            background: rgb(255 255 255 / .07);
            color: var(--ui);
            width: 52px;
            height: 52px;
            border-radius: 50%;
            margin: 0 10px;
            font-size: 20px;
            cursor: pointer;
            backdrop-filter: blur(6px);
            transition: background.2s ease, transform.06s ease
        }

        .nav button:active {
            transform: scale(.98)
        }

        .nav button[disabled] {
            opacity: .35;
            cursor: not-allowed
        }

        .ctrls {
            display: flex;
            gap: 12px;
            align-items: center;
            flex-wrap: wrap
        }

        .ctrls label {
            display: flex;
            gap: 8px;
            align-items: center
        }

        .range {
            accent-color: var(--accent)
        }

        .pill {
            padding: 6px 5px;
            border-radius: 999px;
            background: rgb(255 255 255 / .06);
            color: var(--ui);
            font-size: 12px !important;
        }

        .index {
            position: absolute;
            bottom: 12px;
            left: 50%;
            z-index: 999;
            transform: translateX(-50%);
            font-size: 12px;
            color: #121522;
            background: rgb(255 255 255 / .76);
            padding: 6px 10px;
            border-radius: 999px
        }

        .hint {
            font-size: 12px;
            color: var(--ui-dim)
        }

    </style>

    {{-- add page flip js  --}}
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="{{asset('js/turn.min.js')}}"></script>

    {{-- add howler js  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.4/howler.min.js"></script>


</head>

<body class="bg-[#ddd]">

    {{-- load body components --}}
    <div class="flex justify-center w-full min-h-[84vh]">
        <div class="w-full flex flex-col p-3 max-w-[1550px] items-center justify-center">
            {{-- load body content  --}}
            <div class="w-full flex flex-col items-center justify-center">

                {{-- load dynamic contents  --}}
                <div class="w-full p-3">
                    @yield('content')
                </div>

            </div>
        </div>
    </div>

    {{-- custom scripts --}}
    @yield('scripts')
</body>

</html>
