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
        <header class="bg-dashboard flex-none lg:mb-0 md:border-b md:border-[#26252a]">
            <div
                class="flex items-center px-2 border-b border-[#26252a] justify-between gap-x-1 md:gap-x-16 md:border-none md:mb-0 md:order-2 md:flex-1">
                <div class="flex-1 md:flex-none border py-2 border-[#323335] bg-[#1a1b20] rounded-lg text-center">
                    <p class="text-[#aaaaaa] text-xs font-medium uppercase tracking-normal">Demo</p>
                    <p class="text-white font-bold text-xs md:text-sm">@money(auth()->user()->demo_balance / 100)</p>
                </div>
                <div class="flex-1 md:flex-none border py-2 border-[#323335] bg-[#1a1b20] rounded-lg text-center">
                    <p class="text-[#aaaaaa] text-xs font-medium uppercase tracking-normal">Live</p>
                    <p class="text-white font-bold text-xs md:text-sm">@money(auth()->user()->live_balance / 100)</p>
                </div>
                {{-- <div class="flex-1 md:flex-none border py-2 border-[#26252a] rounded-lg text-center">
                    <p class="text-zinc-300 text-xs font-bold">Demo Account</p>
                    <p class="text-white font-bold text-xs md:text-sm">@money(auth()->user()->demo_balance / 100)</p>
                </div>
                <div class="flex-1 md:flex-none border py-2 border-[#26252a] rounded-lg text-center">
                    <p class="text-zinc-300 text-xs font-bold">Live Account</p>
                    <p class="text-white font-bold text-xs md:text-sm">@money(auth()->user()->live_balance / 100)</p>
                </div> --}}
                <div class="flex-none text-end py-3">
                    <a href="{{ route('dashboard.deposit') }}">
                        <button type="button"
                            class="px-6 py-3.5 lg:px-10 inline-flex items-center gap-x-1 text-[13px] font-bold tracking-[0.15px] rounded-md bg-accent text-white focus:outline-hidden">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M14.25 5.25V3C14.25 2.80109 14.171 2.61032 14.0303 2.46967C13.8897 2.32902 13.6989 2.25 13.5 2.25H3.75C3.35218 2.25 2.97064 2.40804 2.68934 2.68934C2.40804 2.97064 2.25 3.35218 2.25 3.75C2.25 4.14782 2.40804 4.52936 2.68934 4.81066C2.97064 5.09196 3.35218 5.25 3.75 5.25H15C15.1989 5.25 15.3897 5.32902 15.5303 5.46967C15.671 5.61032 15.75 5.80109 15.75 6V9M15.75 9H13.5C13.1022 9 12.7206 9.15804 12.4393 9.43934C12.158 9.72064 12 10.1022 12 10.5C12 10.8978 12.158 11.2794 12.4393 11.5607C12.7206 11.842 13.1022 12 13.5 12H15.75C15.9489 12 16.1397 11.921 16.2803 11.7803C16.421 11.6397 16.5 11.4489 16.5 11.25V9.75C16.5 9.55109 16.421 9.36032 16.2803 9.21967C16.1397 9.07902 15.9489 9 15.75 9Z"
                                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M2.25 3.75V14.25C2.25 14.6478 2.40804 15.0294 2.68934 15.3107C2.97064 15.592 3.35218 15.75 3.75 15.75H15C15.1989 15.75 15.3897 15.671 15.5303 15.5303C15.671 15.3897 15.75 15.1989 15.75 15V12"
                                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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
