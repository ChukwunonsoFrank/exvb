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
        href="https://fonts.googleapis.com/css2?family=Geist+Mono:wght@100..900&family=Geist:wght@100..900&display=swap"
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
        <header class="flex-none lg:mb-0 md:border-b md:border-[#26252a]">
            <div class="md:flex md:items-center md:justify-between md:gap-x-36 lg:gap-x-[48rem]">
                <div
                    class="flex items-center px-4 border-b border-[#26252a] justify-between space-x-8 md:space-x-16 md:border-none md:mb-0 md:order-2 md:flex-1">
                    <div class="flex-1 md:flex-none py-3">
                        <p class="text-zinc-300 text-[10px] mb-1 font-medium">Demo account</p>
                        <p class="text-white font-bold text-xs md:text-sm">@money(auth()->user()->demo_balance / 100)</p>
                    </div>
                    <div class="flex-1 md:flex-none py-3">
                        <p class="text-zinc-300 text-[10px] mb-1 font-medium">Live account</p>
                        <p class="text-white font-bold text-xs md:text-sm">@money(auth()->user()->live_balance / 100)</p>
                    </div>
                    <div class="flex-1 text-end py-3">
                        <a href="{{ route('dashboard.deposit') }}">
                            <button type="button"
                                class="py-1.5 px-6 lg:px-10 inline-flex items-center gap-x-2 text-sm font-semibold tracking-[0.15px] rounded-md bg-accent text-white focus:outline-hidden">
                                Deposit
                            </button>
                        </a>
                    </div>
                </div>
                <livewire:dashboard.partials.asset-indicator />
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
