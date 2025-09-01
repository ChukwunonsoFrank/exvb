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
        <header class="bg-[#1a1a1a] flex-none lg:mb-0 md:border-b md:border-[#26252a]">
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
                            class="p-2 py-3.5 lg:px-10 inline-flex items-center gap-x-0.5 text-[13px] font-semibold tracking-[0.15px] rounded-md bg-accent text-white focus:outline-hidden">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_808_2)">
                                    <path
                                        d="M16.5 7.5V12C16.5 12.7956 16.1839 13.5587 15.6213 14.1213C15.0587 14.6839 14.2956 15 13.5 15H4.5C3.70435 15 2.94129 14.6839 2.37868 14.1213C1.81607 13.5587 1.5 12.7956 1.5 12V7.5H16.5ZM5.2575 10.5H5.25C5.15151 10.5005 5.05408 10.5204 4.96327 10.5585C4.87247 10.5967 4.79006 10.6523 4.72077 10.7223C4.58082 10.8637 4.50276 11.0548 4.50375 11.2538C4.50424 11.3522 4.52413 11.4497 4.56228 11.5405C4.60042 11.6313 4.65608 11.7137 4.72607 11.783C4.79606 11.8523 4.87902 11.9071 4.9702 11.9443C5.06138 11.9816 5.15901 12.0005 5.2575 12C5.45641 12 5.64718 11.921 5.78783 11.7803C5.92848 11.6397 6.0075 11.4489 6.0075 11.25C6.0075 11.0511 5.92848 10.8603 5.78783 10.7197C5.64718 10.579 5.45641 10.5 5.2575 10.5ZM9.75 10.5H8.25C8.05109 10.5 7.86032 10.579 7.71967 10.7197C7.57902 10.8603 7.5 11.0511 7.5 11.25C7.5 11.4489 7.57902 11.6397 7.71967 11.7803C7.86032 11.921 8.05109 12 8.25 12H9.75C9.94891 12 10.1397 11.921 10.2803 11.7803C10.421 11.6397 10.5 11.4489 10.5 11.25C10.5 11.0511 10.421 10.8603 10.2803 10.7197C10.1397 10.579 9.94891 10.5 9.75 10.5ZM13.5 3C14.2956 3 15.0587 3.31607 15.6213 3.87868C16.1839 4.44129 16.5 5.20435 16.5 6H1.5C1.5 5.20435 1.81607 4.44129 2.37868 3.87868C2.94129 3.31607 3.70435 3 4.5 3H13.5Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_808_2">
                                        <rect width="18" height="18" fill="white" />
                                    </clipPath>
                                </defs>
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
