<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exvb - AI Trading Robot</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Geist+Mono:wght@100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <script src="https://kit.fontawesome.com/7016607b5a.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/qrcode.min.js') }}"></script>

    @livewireStyles
    @vite('resources/css/app.css')

    <style>
        [x-cloak] {
            display: none !important;
        }

        #qrcode canvas {
            width: 100% !important;
        }

        #qrcode img {
            width: 100% !important;
        }
    </style>
</head>

<body class="bg-dashboard font-dashboard">
    <main class="flex flex-col h-svh">
        <header class="bg-dim flex-none lg:mb-0 md:border-b md:border-[#26252a]">
            <div
                class="flex items-center px-2 border-b border-[#26252a] justify-between gap-x-1 md:gap-x-16 md:border-none md:mb-0 md:order-2 md:flex-1">
                <div class="flex-1 md:flex-none border py-2 border-[#26252a] rounded-lg text-center">
                    <p class="text-zinc-300 text-xs font-bold">Demo Account</p>
                    <p class="text-white font-bold text-xs md:text-sm">@money(auth()->user()->demo_balance / 100)</p>
                </div>
                <div class="flex-1 md:flex-none border py-2 border-[#26252a] rounded-lg text-center">
                    <p class="text-zinc-300 text-xs font-bold">Live Account</p>
                    <p class="text-white font-bold text-xs md:text-sm">@money(auth()->user()->live_balance / 100)</p>
                </div>
                <div class="flex-none text-end py-3">
                    <a href="{{ route('dashboard.deposit') }}">
                        <button type="button"
                            class="px-6 py-3.5 lg:px-10 inline-flex items-center gap-x-0.5 text-[13px] font-bold tracking-[0.15px] rounded-md bg-accent text-white focus:outline-hidden">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.75 9H14.25M9 3.75V14.25" stroke="white" stroke-width="4"
                                    stroke-linecap="square" stroke-linejoin="round" />
                            </svg>
                            Deposit
                        </button>
                    </a>
                </div>
            </div>
        </header>

        <div class="grow lg:mb-0 overflow-scroll lg:overflow-hidden">
            {{ $slot }}
        </div>

        <livewire:dashboard.partials.mobile-navbar />
    </main>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="{{ asset('assets/js/clipboard.min.js') }}"></script>
    @vite('resources/js/app.js')
    @livewireScripts
</body>

</html>
