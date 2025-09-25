<div x-data="traderoom" class="px-4 lg:px-0 h-full">
    <div class="lg:flex lg:h-full">
        <livewire:dashboard.partials.desktop-navbar />
        <div class="lg:h-full lg:flex-1 lg:px-96 lg:pt-6">
            <div class="my-3 sticky top-0 bg-dashboard z-10 lg:pt-4">
                <h1 class="text-white text-lg md:text-xl lg:text-2xl font-semibold">Active Robot</h1>
            </div>
            <div class="lg:h-full lg:pb-24 lg:overflow-scroll scrollbar-hide">
                <div class="w-full bg-dashboard border border-[#26252a] rounded-lg p-4 mb-4">
                    <div class="mb-4 flex items-center justify-between">
                        <div class="flex-none text-center">
                            <p class="text-white font-bold text-xs mt-1">Commission: 10%</p>
                            <p class="text-zinc-300 text-[10px]">(from profits only)</p>
                            <div class="-mt-0.5">
                                <p x-text="fee" class="text-[#fb2c36] text-xs inline font-bold"></p>
                            </div>
                        </div>
                        <div class="flex-none text-center">
                            <h2 class="text-white font-bold text-xl -ml-6">@money($this->profit)</h2>
                            <div class="flex items-center gap-x-0.5 -ml-1">
                                <div>
                                    <p class="text-zinc-300 text-xs">Total Profit</p>
                                </div>
                                <div class="-mt-0.5">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.91669 6.99996L7.00002 2.91663L11.0834 6.99996" stroke="#00C951"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7 11.0833V2.91663" stroke="#00C951" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex-none flex flex-col gap-y-2 items-center">
                            <div>
                                <svg width="73" height="23" viewBox="0 0 73 23" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M72.2429 21.8037V1.09814L67.1401 3.94394L62.1355 2.47197L55.6588 7.6729L49.6729 3.25702L41.6261 8.26169L34.4626 5.31777H29.9486L27.0047 4.63085L20.4299 8.26169H17.2897L12.5794 11.7944L5.02337 15.0327L1.09814 22L72.2429 21.8037Z"
                                        fill="url(#paint0_linear_513_324)" />
                                    <path
                                        d="M1 21.2149L4.57936 15.0153C4.75631 14.7088 5.03161 14.4711 5.3606 14.3407L12.557 11.4885C12.702 11.4311 12.8376 11.3523 12.9594 11.2549L17.063 7.97199C17.4524 7.66049 17.9666 7.55246 18.4484 7.68095L19.9838 8.09039C20.3944 8.19988 20.8318 8.13827 21.1962 7.91965L26.7883 4.56436C27.231 4.29877 27.7759 4.26773 28.2459 4.48134L29.3446 4.98076C29.5486 5.07351 29.7701 5.12149 29.9943 5.12149H33.7568C33.9636 5.12149 34.1684 5.16235 34.3593 5.24171L40.8484 7.93847C41.3342 8.14034 41.8887 8.08555 42.3256 7.79254L48.6561 3.54644C49.2538 3.14554 50.0476 3.20235 50.5821 3.6843L54.5684 7.27853C55.1821 7.83185 56.1196 7.81483 56.7128 7.23961L61.3887 2.70545C61.8414 2.26649 62.5127 2.14093 63.0935 2.38662L66.4103 3.7899C66.9232 4.0069 67.5127 3.93596 67.9595 3.60348L71.4579 1"
                                        stroke="#00732F" stroke-width="1.76635" stroke-linecap="round" />
                                    <defs>
                                        <linearGradient id="paint0_linear_513_324" x1="40.743" y1="8.16356"
                                            x2="40.743" y2="30.0467" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#0C2819" />
                                            <stop offset="1" stop-color="#161616" stop-opacity="0" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <div>
                                <a href="{{ route('dashboard') }}">
                                    <button type="button"
                                        class="animate-pulse relative px-2 py-1 inline-flex items-center gap-x-[1px] text-[11px] font-bold tracking-[0.15px] rounded-md bg-dim border border-[#26252a] text-white focus:outline-hidden">
                                        <div>
                                            <p class="text-orange-500">Live Chart</p>
                                        </div>
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="#ff6900" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-trending-up-icon lucide-trending-up">
                                                <path d="M16 7h6v6" />
                                                <path d="m22 7-8.5 8.5-5-5L2 17" />
                                            </svg>
                                        </div>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3 border border-[#26252a] rounded-lg px-4 py-2 mb-4">
                        <div class="flex-1">
                            <template x-if="isBotSearchingForSignal === false">
                                <div class="flex flex-col items-center justify-center w-fit">
                                    <div class="mb-1.5">
                                        <p class="text-zinc-300 text-[11px] text-center">Closing trade in</p>
                                    </div>
                                    <p x-text='timer' class="mb-1.5 text-white font-bold text-2xl"></p>
                                    <div>
                                        <p class="text-zinc-300 text-[11px] text-center">Last trade: <span
                                                x-text="previousBotProfit" class="text-green-500 font-bold"></span></p>
                                    </div>
                                </div>
                            </template>
                            <template x-if="isBotSearchingForSignal === true">
                                <div wire:ignore class="flex items-center justify-center w-fit">
                                    <i class="fas fa-circle-notch fa-spin fa-2x text-accent"></i>
                                </div>
                            </template>
                        </div>
                        <div class="flex-none w-fit">
                            <template x-if="isBotSearchingForSignal === false">
                                <div class="flex flex-col items-center">
                                    <div class="mb-2">
                                        <p class="text-zinc-300 text-[11px] text-center">Robot is trading</p>
                                    </div>
                                    <div class="flex items-center space-x-1 rounded-lg mb-1.5">
                                        <div>
                                            <img x-bind:src="assetIcon" alt="">
                                        </div>
                                        <div>
                                            <p class="font-semibold text-white text-[15px]">{{ $this->asset }}</p>
                                        </div>
                                        <div class="pb-1">
                                            <span x-text="sentiment"
                                                class="inline-flex items-center gap-x-1.5 py-0.5 px-1.5 rounded-md text-[9px] font-normal text-white"
                                                x-bind:class="sentiment === 'BUY' ? 'bg-green-600' : 'bg-red-600'"></span>
                                        </div>
                                    </div>
                                    <div>
                                        <template x-if="assetClass === 'crypto'">
                                            <div class="flex items-center gap-x-1 -mt-0.5">
                                                <div>
                                                    <p class="text-zinc-300 text-[11px] text-center">on </p>
                                                </div>
                                                <div class="-mt-1">
                                                    <img class="inline w-8" src="{{ asset('assets/icons/bybit.svg') }}"
                                                        alt="bybit-logo">
                                                </div>
                                                <div class="-mt-0.5">
                                                    <svg width="12" height="12" viewBox="0 0 12 12"
                                                        class="inline" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_1031_740)">
                                                            <path
                                                                d="M5 6.49998C5.21473 6.78705 5.48868 7.02457 5.80328 7.19645C6.11787 7.36833 6.46575 7.47054 6.82333 7.49615C7.1809 7.52176 7.53979 7.47017 7.87567 7.34487C8.21155 7.21958 8.51656 7.02352 8.77 6.76998L10.27 5.26998C10.7254 4.79848 10.9774 4.16697 10.9717 3.51148C10.966 2.85599 10.7031 2.22896 10.2395 1.76544C9.77603 1.30192 9.14899 1.03899 8.4935 1.0333C7.83801 1.0276 7.20651 1.27959 6.735 1.73498L5.875 2.58998"
                                                                stroke="white" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M7.0001 5.49999C6.78537 5.21293 6.51142 4.9754 6.19683 4.80352C5.88223 4.63164 5.53435 4.52943 5.17677 4.50382C4.8192 4.47822 4.46031 4.52981 4.12443 4.6551C3.78855 4.78039 3.48354 4.97646 3.2301 5.22999L1.7301 6.72999C1.2747 7.2015 1.02272 7.833 1.02841 8.48849C1.03411 9.14399 1.29703 9.77102 1.76055 10.2345C2.22407 10.6981 2.85111 10.961 3.5066 10.9667C4.16209 10.9724 4.79359 10.7204 5.2651 10.265L6.1201 9.40999"
                                                                stroke="white" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_1031_740">
                                                                <rect width="12" height="12" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="text-white text-[11px] font-semibold">
                                                    API
                                                </div>
                                            </div>
                                        </template>
                                        <template x-if="assetClass === 'forex'">
                                            <div class="flex items-center gap-x-1 -mt-0.5">
                                                <div>
                                                    <p class="text-zinc-300 text-[11px] text-center">on </p>
                                                </div>
                                                <div class="-mt-0.5 text-white">
                                                    <img class="inline w-8" src="{{ asset('assets/icons/xtb.svg') }}"
                                                        alt="xtb-logo">
                                                </div>
                                                <div class="-mt-0.5">
                                                    <svg width="12" height="12" viewBox="0 0 12 12"
                                                        class="inline" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_1031_740)">
                                                            <path
                                                                d="M5 6.49998C5.21473 6.78705 5.48868 7.02457 5.80328 7.19645C6.11787 7.36833 6.46575 7.47054 6.82333 7.49615C7.1809 7.52176 7.53979 7.47017 7.87567 7.34487C8.21155 7.21958 8.51656 7.02352 8.77 6.76998L10.27 5.26998C10.7254 4.79848 10.9774 4.16697 10.9717 3.51148C10.966 2.85599 10.7031 2.22896 10.2395 1.76544C9.77603 1.30192 9.14899 1.03899 8.4935 1.0333C7.83801 1.0276 7.20651 1.27959 6.735 1.73498L5.875 2.58998"
                                                                stroke="white" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M7.0001 5.49999C6.78537 5.21293 6.51142 4.9754 6.19683 4.80352C5.88223 4.63164 5.53435 4.52943 5.17677 4.50382C4.8192 4.47822 4.46031 4.52981 4.12443 4.6551C3.78855 4.78039 3.48354 4.97646 3.2301 5.22999L1.7301 6.72999C1.2747 7.2015 1.02272 7.833 1.02841 8.48849C1.03411 9.14399 1.29703 9.77102 1.76055 10.2345C2.22407 10.6981 2.85111 10.961 3.5066 10.9667C4.16209 10.9724 4.79359 10.7204 5.2651 10.265L6.1201 9.40999"
                                                                stroke="white" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_1031_740">
                                                                <rect width="12" height="12" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <div class="-mt-0.5 text-white">
                                                    <img class="inline-block -mt-0.5 w-4"
                                                        src="{{ asset('assets/images/mt5.png') }}" alt="mt5-logo">
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </template>
                            <template x-if="isBotSearchingForSignal === true">
                                <div class="flex flex-col space-y-1">
                                    <div>
                                        <p class="text-zinc-300 text-[11px] text-center">Searching for trade...</p>
                                    </div>
                                    <div class="flex items-center space-x-1 rounded-lg">
                                        <div class="flex-none animate-pulse-bg size-4 rounded-sm"></div>
                                        <div class="flex-1 animate-pulse-bg size-4 rounded-sm"></div>
                                        <div class="flex-none pb-1 animate-pulse-bg size-4 rounded-sm"></div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <div class="border border-[#26252a] rounded-lg p-4">
                        <div class="flex items-center justify-center space-x-2 pb-2 border-b border-[#26252a]">
                            <div class="flex-none">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_519_351)">
                                        <mask id="mask0_519_351" style="mask-type:luminance"
                                            maskUnits="userSpaceOnUse" x="0" y="0" width="22" height="22">
                                            <path d="M22 0H0V22H22V0Z" fill="white" />
                                        </mask>
                                        <g mask="url(#mask0_519_351)">
                                            <path
                                                d="M15.3086 7.33333C15.1262 6.81563 14.7929 6.36438 14.3519 6.03766C13.9108 5.71093 13.382 5.52368 12.8336 5.5H9.16699C8.43764 5.5 7.73817 5.78973 7.22244 6.30546C6.70672 6.82118 6.41699 7.52065 6.41699 8.25C6.41699 8.97935 6.70672 9.67882 7.22244 10.1945C7.73817 10.7103 8.43764 11 9.16699 11H12.8336C13.563 11 14.2624 11.2897 14.7782 11.8055C15.2939 12.3212 15.5836 13.0207 15.5836 13.75C15.5836 14.4793 15.2939 15.1788 14.7782 15.6945C14.2624 16.2103 13.563 16.5 12.8336 16.5H9.16699C8.61859 16.4763 8.08982 16.2891 7.64874 15.9623C7.20766 15.6356 6.87445 15.1844 6.69199 14.6667"
                                                stroke="#05DF72" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M11 2.75V5.5M11 16.5V19.25" stroke="#05DF72" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_519_351">
                                            <rect width="22" height="22" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>

                            </div>
                            <div class="flex-1 grow">
                                <p class="text-zinc-300 text-xs">Trade Amount</p>
                            </div>
                            <div class="flex-none text-end text-white font-medium text-sm">@money($this->amount)</div>
                        </div>

                        <div class="flex items-center justify-center space-x-2 py-2 border-b border-[#26252a]">
                            <div class="flex-none">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_519_298)">
                                        <path
                                            d="M7.3335 6.41667C7.3335 7.38913 7.7198 8.32176 8.40744 9.00939C9.09507 9.69703 10.0277 10.0833 11.0002 10.0833C11.9726 10.0833 12.9053 9.69703 13.5929 9.00939C14.2805 8.32176 14.6668 7.38913 14.6668 6.41667C14.6668 5.44421 14.2805 4.51158 13.5929 3.82394C12.9053 3.13631 11.9726 2.75 11.0002 2.75C10.0277 2.75 9.09507 3.13631 8.40744 3.82394C7.7198 4.51158 7.3335 5.44421 7.3335 6.41667Z"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M5.5 19.25V17.4167C5.5 16.4442 5.88631 15.5116 6.57394 14.8239C7.26158 14.1363 8.19421 13.75 9.16667 13.75H12.8333C13.8058 13.75 14.7384 14.1363 15.4261 14.8239C16.1137 15.5116 16.5 16.4442 16.5 17.4167V19.25"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_519_298">
                                            <rect width="22" height="22" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="flex-1 grow">
                                <p class="text-zinc-300 text-xs">Account</p>
                            </div>
                            <div class="flex-none text-end text-white font-medium text-sm">{{ $this->accountType }}
                            </div>
                        </div>

                        <div class="flex items-center justify-center space-x-2 py-2 border-b border-[#26252a]">
                            <div class="flex-none">
                                <img class="w-4.5" src="{{ asset('assets/images/robot-illustration.png') }}"
                                    alt="">
                            </div>
                            <div class="flex-1 grow">
                                <p class="text-zinc-300 text-xs">Trading Strategy</p>
                            </div>
                            <div class="flex-none text-end text-white font-medium text-sm">{{ $this->strategy }}</div>
                        </div>

                        <div class="flex items-center justify-center space-x-2 py-2 border-b border-[#26252a]">
                            <div class="flex-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                    viewBox="0 0 22 22" fill="none">
                                    <g clip-path="url(#clip0_52_59)">
                                        <path
                                            d="M13.75 17.4166C13.75 17.9028 13.9432 18.3691 14.287 18.7129C14.6308 19.0568 15.0971 19.2499 15.5833 19.2499C16.0696 19.2499 16.5359 19.0568 16.8797 18.7129C17.2235 18.3691 17.4167 17.9028 17.4167 17.4166C17.4167 16.9304 17.2235 16.464 16.8797 16.1202C16.5359 15.7764 16.0696 15.5833 15.5833 15.5833C15.0971 15.5833 14.6308 15.7764 14.287 16.1202C13.9432 16.464 13.75 16.9304 13.75 17.4166Z"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M4.58325 4.58333C4.58325 5.06956 4.77641 5.53588 5.12022 5.8797C5.46404 6.22351 5.93036 6.41667 6.41659 6.41667C6.90282 6.41667 7.36913 6.22351 7.71295 5.8797C8.05676 5.53588 8.24992 5.06956 8.24992 4.58333C8.24992 4.0971 8.05676 3.63079 7.71295 3.28697C7.36913 2.94315 6.90282 2.75 6.41659 2.75C5.93036 2.75 5.46404 2.94315 5.12022 3.28697C4.77641 3.63079 4.58325 4.0971 4.58325 4.58333Z"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M2.75 12.8333C2.75 12.8333 3.30458 7.84663 4.84367 5.62646M7.95575 5.6503C9.91467 8.0813 12.1238 14.0039 14.0791 16.3927"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M17.1855 16.5349C17.829 15.7282 18.5165 13.2716 19.2499 9.16675"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_52_59">
                                            <rect width="22" height="22" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="flex-1 grow">
                                <p class="text-zinc-300 text-xs">Target Profit</p>
                            </div>
                            <div class="flex-none text-end text-white font-medium text-sm">{{ $this->minProfitLimit }}%
                                - {{ $this->maxProfitLimit }}%
                            </div>
                        </div>

                        <div class="flex items-center justify-center space-x-2 pt-2">
                            <div class="flex-none">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_520_359)">
                                        <mask id="mask0_520_359" style="mask-type:luminance"
                                            maskUnits="userSpaceOnUse" x="0" y="0" width="22" height="22">
                                            <path d="M22 0H0V22H22V0Z" fill="white" />
                                        </mask>
                                        <g mask="url(#mask0_520_359)">
                                            <path
                                                d="M18.2188 5.74753C18.8604 6.11236 19.2546 6.79528 19.25 7.5332V14.2102C19.25 14.9517 18.8439 15.6356 18.1885 15.9958L12.001 19.91C11.6942 20.0784 11.35 20.1667 11 20.1667C10.6501 20.1667 10.3058 20.0784 9.999 19.91L3.8115 15.9958C3.49082 15.8206 3.22311 15.5624 3.03638 15.2483C2.84964 14.9341 2.75073 14.5756 2.75 14.2102V7.53228C2.75 6.7907 3.15608 6.10778 3.8115 5.74753L9.999 2.0992C10.3148 1.92506 10.6696 1.83374 11.0303 1.83374C11.3909 1.83374 11.7457 1.92506 12.0615 2.0992L18.249 5.74753H18.2188Z"
                                                stroke="#FB2C36" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M11 7.33337V11" stroke="#FB2C36" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M11 14.6667H11.01" stroke="#FB2C36" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_520_359">
                                            <rect width="22" height="22" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="flex-1 grow">
                                <p class="text-zinc-300 text-xs">Risk Level</p>
                            </div>
                            <div class="flex-none text-end text-white font-medium text-sm">Low Risk
                            </div>
                        </div>
                    </div>

                    <div class="text-right w-full flex items-center justify-end gap-x-0.5 mb-1.5 pr-1.5">
                        <div class="flex-none text-[10px]">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1307_434)">
                                    <path d="M5 2.5V5L6.66667 5.83333" stroke="#A3A3A3" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M4.99992 9.16671C7.30111 9.16671 9.16658 7.30123 9.16658 5.00004C9.16658 2.69885 7.30111 0.833374 4.99992 0.833374C2.69873 0.833374 0.833252 2.69885 0.833252 5.00004C0.833252 7.30123 2.69873 9.16671 4.99992 9.16671Z"
                                        stroke="#A3A3A3" stroke-linecap="round" stroke-linejoin="round" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_1307_434">
                                        <rect width="10" height="10" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <div class="flex-none mt-[1px]">
                            <p class="text-zinc-400 text-[10px]"><span class="italic"> Bot
                                    runtime: {{ $this->botExpirationInHrs }}h left</span></p>
                        </div>
                    </div>

                    <div class="mb-2">
                        <button x-on:click="toggleStopRobotConfirmationModal()" type="button"
                            class="py-2.5 cursor-pointer px-4 w-full md:px-6 text-center gap-x-2 text-sm font-semibold rounded-lg bg-[#fb2c36] text-white focus:outline-hidden disabled:opacity-50 disabled:pointer-events-none">
                            Stop Robot
                        </button>
                    </div>

                    <div class="text-sm text-white rounded-lg bg-dim py-3 pb-4 px-2.5" role="alert" tabindex="-1"
                        aria-labelledby="hs-with-description-label">
                        <div class="flex items-center gap-x-1">
                            <div class="flex-none shrink-0 text-green-400">
                                <div class="flex items-center justify-center size-8 rounded-full">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_518_288)">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 3.42845C10.1065 3.42845 8.57145 4.96347 8.57145 6.85702V8.57131H15.4286V6.85702C15.4286 4.96347 13.8936 3.42845 12 3.42845ZM5.14288 6.85702V8.57131H4.28578C2.86562 8.57131 1.71436 9.72257 1.71436 11.1427V21.4284C1.71436 22.8487 2.86562 23.9998 4.28578 23.9998H19.7144C21.1345 23.9998 22.2858 22.8487 22.2858 21.4284V11.1427C22.2858 9.72257 21.1345 8.57131 19.7144 8.57131H18.8572V6.85702C18.8572 3.06993 15.7871 -0.00012207 12 -0.00012207C8.21292 -0.00012207 5.14288 3.06993 5.14288 6.85702ZM12.0001 18.4284C13.1835 18.4284 14.1429 17.4691 14.1429 16.2856C14.1429 15.1021 13.1835 14.1427 12.0001 14.1427C10.8166 14.1427 9.85721 15.1021 9.85721 16.2856C9.85721 17.4691 10.8166 18.4284 12.0001 18.4284Z"
                                                fill="#00C951" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_518_288">
                                                <rect width="24" height="24" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <p class="text-zinc-300 text-xs font-bold">
                                    Secure Trading → Capital Protection & Risk Management With AI Driven Strategies.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div x-cloak x-show="isStopRobotConfirmationModalOpen"
                class="fixed top-0 left-0 h-svh w-full px-4 lg:px-96 pt-6 z-20">
                <div class="absolute inset-0 h-svh w-full px-4 lg:px-96 pt-6 z-20 bg-dashboard opacity-85"></div>
                <div class="relative w-full h-full flex items-center justify-center z-30">
                    <div
                        class="max-w-sm mx-auto flex flex-col bg-dashboard border border-[#26252a] rounded-2xl pointer-events-auto">
                        <div class="p-6 overflow-y-auto text-center">
                            <div class="flex justify-center mb-8">
                                <div
                                    class="size-18 flex items-center justify-center rounded-full border-3 border-[#fb2c36]">
                                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_773_46)">
                                            <path
                                                d="M6 24C6 26.3638 6.46558 28.7044 7.37017 30.8883C8.27475 33.0722 9.60062 35.0565 11.2721 36.7279C12.9435 38.3994 14.9278 39.7252 17.1117 40.6298C19.2956 41.5344 21.6362 42 24 42C26.3638 42 28.7044 41.5344 30.8883 40.6298C33.0722 39.7252 35.0565 38.3994 36.7279 36.7279C38.3994 35.0565 39.7252 33.0722 40.6298 30.8883C41.5344 28.7044 42 26.3638 42 24C42 21.6362 41.5344 19.2956 40.6298 17.1117C39.7252 14.9278 38.3994 12.9435 36.7279 11.2721C35.0565 9.60062 33.0722 8.27475 30.8883 7.37017C28.7044 6.46558 26.3638 6 24 6C21.6362 6 19.2956 6.46558 17.1117 7.37017C14.9278 8.27475 12.9435 9.60062 11.2721 11.2721C9.60062 12.9435 8.27475 14.9278 7.37017 17.1117C6.46558 19.2956 6 21.6362 6 24Z"
                                                stroke="white" stroke-width="4" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M36.7275 11.272L11.2715 36.728" stroke="white" stroke-width="4"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_773_46">
                                                <rect width="48" height="48" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>

                                </div>
                            </div>
                            <p class="text-white font-medium text-base">
                                Are you sure you want to stop the robot at <span x-text="netProfit"></span> profit?
                            </p>
                            <div class="mt-6 grid grid-cols-2 gap-x-2">
                                <div>
                                    <button type="button"
                                        x-on:click="toggleStopRobotConfirmationModal(); toggleRobotDisconnectingModal();"
                                        type="button"
                                        class="p-3 w-full text-center text-sm font-semibold rounded-lg border border-transparent bg-[#fb2c36] text-white cursor-pointer hover:bg-[#fb2c36] focus:outline-hidden focus:bg-[#fb2c36] disabled:opacity-50 disabled:pointer-events-none">
                                        Stop robot
                                    </button>
                                </div>
                                <div>
                                    <button x-on:click="toggleStopRobotConfirmationModal()" type="button"
                                        class="p-3 w-full text-center text-sm font-semibold rounded-lg border border-white text-white shadow-2xs cursor-pointer focus:outline-hidden disabled:opacity-50 disabled:pointer-events-none"
                                        data-hs-overlay="#hs-vertically-centered-modal">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div x-cloak x-show="isRobotDisconnectingModalOpen"
                class="fixed top-0 left-0 h-svh w-full px-4 lg:px-96 pt-6 z-20">
                <div class="absolute inset-0 h-svh w-full px-4 lg:px-96 pt-6 z-20 bg-dashboard opacity-85"></div>
                <div class="relative w-full h-full flex items-center justify-center z-30">
                    <div class="max-w-sm mx-auto bg-dashboard border border-[#26252a] rounded-2xl pointer-events-auto">
                        <div class="p-6 overflow-y-auto text-center">
                            <div class="flex justify-center mb-8">
                                <div
                                    class="size-18 flex items-center justify-center rounded-full border-3 border-[#05df72]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                        viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="animate-spin lucide lucide-radio-icon lucide-radio">
                                        <path d="M16.247 7.761a6 6 0 0 1 0 8.478" />
                                        <path d="M19.075 4.933a10 10 0 0 1 0 14.134" />
                                        <path d="M4.925 19.067a10 10 0 0 1 0-14.134" />
                                        <path d="M7.753 16.239a6 6 0 0 1 0-8.478" />
                                        <circle cx="12" cy="12" r="2" />
                                    </svg>
                                </div>
                            </div>
                            <p class="text-white font-semibold text-xl mb-4">
                                Robot is disconnecting from the markets...
                            </p>
                            <div class="w-full flex flex-col gap-y-2 justify-center items-center">
                                <template x-if="isOpenPositionsClosing === true">
                                    <div
                                        class="bg-dashboard border border-[#26252a] py-2 px-2 flex items-center gap-x-1 rounded-full">
                                        <div class="flex-none">
                                            <i class="fa-solid fa-circle-notch fa-spin text-[#05df72]"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="font-light text-xs text-white">Closing all opened positions on
                                            </p>
                                        </div>
                                        <div class="flex-none -mt-0.5">
                                            <img class="inline w-7" src="{{ asset('assets/icons/xtb.svg') }}"
                                                alt="xtb-logo">
                                        </div>
                                        <div class="flex-none">
                                            <p class="font-light text-xs text-white"> and </p>
                                        </div>
                                        <div class="flex-none -mt-1">
                                            <img class="inline w-7" src="{{ asset('assets/icons/bybit.svg') }}"
                                                alt="bybit-logo">
                                        </div>
                                    </div>
                                </template>

                                <template x-if="isOpenPositionsClosing === false">
                                    <div
                                        class="bg-dashboard border border-[#26252a] py-2 px-2 flex items-center gap-x-1 rounded-full">
                                        <div class="flex-none">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_850_2)">
                                                    <path
                                                        d="M11.3335 2.22667C12.339 2.80724 13.1755 3.64035 13.76 4.64353C14.3446 5.64672 14.6571 6.78518 14.6664 7.94623C14.6758 9.10727 14.3818 10.2506 13.8135 11.2631C13.2452 12.2756 12.4223 13.1221 11.4263 13.7189C10.4303 14.3156 9.29574 14.6419 8.13489 14.6654C6.97405 14.6889 5.8272 14.4088 4.80787 13.8528C3.78854 13.2969 2.93208 12.4844 2.32327 11.4957C1.71447 10.507 1.37444 9.37647 1.33683 8.216L1.3335 8L1.33683 7.784C1.37416 6.63266 1.70919 5.51064 2.30926 4.52733C2.90932 3.54402 3.75393 2.73297 4.76076 2.17325C5.76758 1.61354 6.90226 1.32426 8.05417 1.33362C9.20607 1.34299 10.3359 1.65066 11.3335 2.22667ZM10.4715 6.19533C10.3567 6.08055 10.204 6.01159 10.0419 6.00141C9.87993 5.99122 9.71976 6.0405 9.5915 6.14L9.52883 6.19533L7.3335 8.39L6.4715 7.52867L6.40883 7.47333C6.28055 7.3739 6.12041 7.32468 5.95843 7.3349C5.79645 7.34512 5.64377 7.41408 5.529 7.52884C5.41424 7.6436 5.34528 7.79629 5.33506 7.95827C5.32485 8.12025 5.37407 8.28039 5.4735 8.40867L5.52883 8.47133L6.86216 9.80467L6.92483 9.86C7.04174 9.95071 7.18552 9.99994 7.3335 9.99994C7.48147 9.99994 7.62525 9.95071 7.74216 9.86L7.80483 9.80467L10.4715 7.138L10.5268 7.07533C10.6263 6.94706 10.6756 6.7869 10.6654 6.62488C10.6552 6.46286 10.5863 6.31013 10.4715 6.19533Z"
                                                        fill="#05DF72" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_850_2">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="font-light text-xs text-white">Closing all opened positions on
                                            </p>
                                        </div>
                                        <div class="flex-none -mt-0.5">
                                            <img class="inline w-7" src="{{ asset('assets/icons/xtb.svg') }}"
                                                alt="xtb-logo">
                                        </div>
                                        <div class="flex-none">
                                            <p class="font-light text-xs text-white"> and </p>
                                        </div>
                                        <div class="flex-none -mt-1">
                                            <img class="inline w-7" src="{{ asset('assets/icons/bybit.svg') }}"
                                                alt="bybit-logo">
                                        </div>
                                    </div>
                                </template>

                                <template x-if="isCapitalAndProfitReturning === true">
                                    <div
                                        class="bg-dashboard border border-[#26252a] py-2 px-2 flex items-center gap-x-1 rounded-full">
                                        <div class="flex-none">
                                            <i class="fa-solid fa-circle-notch fa-spin text-[#05df72]"></i>
                                        </div>
                                        <div class="flex-1 text-left">
                                            <p class="font-light text-xs text-white">Returning capital +
                                                <span x-text="netProfit"></span> profit to your
                                                {{ $this->accountType }}
                                            </p>
                                        </div>
                                    </div>
                                </template>

                                <template x-if="isCapitalAndProfitReturning === false">
                                    <div
                                        class="bg-dashboard border border-[#26252a] py-2 px-2 flex items-center gap-x-1.5 rounded-full">
                                        <div class="flex-none">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_850_2)">
                                                    <path
                                                        d="M11.3335 2.22667C12.339 2.80724 13.1755 3.64035 13.76 4.64353C14.3446 5.64672 14.6571 6.78518 14.6664 7.94623C14.6758 9.10727 14.3818 10.2506 13.8135 11.2631C13.2452 12.2756 12.4223 13.1221 11.4263 13.7189C10.4303 14.3156 9.29574 14.6419 8.13489 14.6654C6.97405 14.6889 5.8272 14.4088 4.80787 13.8528C3.78854 13.2969 2.93208 12.4844 2.32327 11.4957C1.71447 10.507 1.37444 9.37647 1.33683 8.216L1.3335 8L1.33683 7.784C1.37416 6.63266 1.70919 5.51064 2.30926 4.52733C2.90932 3.54402 3.75393 2.73297 4.76076 2.17325C5.76758 1.61354 6.90226 1.32426 8.05417 1.33362C9.20607 1.34299 10.3359 1.65066 11.3335 2.22667ZM10.4715 6.19533C10.3567 6.08055 10.204 6.01159 10.0419 6.00141C9.87993 5.99122 9.71976 6.0405 9.5915 6.14L9.52883 6.19533L7.3335 8.39L6.4715 7.52867L6.40883 7.47333C6.28055 7.3739 6.12041 7.32468 5.95843 7.3349C5.79645 7.34512 5.64377 7.41408 5.529 7.52884C5.41424 7.6436 5.34528 7.79629 5.33506 7.95827C5.32485 8.12025 5.37407 8.28039 5.4735 8.40867L5.52883 8.47133L6.86216 9.80467L6.92483 9.86C7.04174 9.95071 7.18552 9.99994 7.3335 9.99994C7.48147 9.99994 7.62525 9.95071 7.74216 9.86L7.80483 9.80467L10.4715 7.138L10.5268 7.07533C10.6263 6.94706 10.6756 6.7869 10.6654 6.62488C10.6552 6.46286 10.5863 6.31013 10.4715 6.19533Z"
                                                        fill="#05DF72" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_850_2">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                        <div class="flex-1 text-left">
                                            <p class="font-light text-xs text-white">Returning capital +
                                                <span x-text="netProfit"></span> profit to your
                                                {{ $this->accountType }}
                                            </p>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        $wire.on('robot-created', (event) => {
            const toastMarkup = `
                <div class="flex items-center p-4">
                    <div class="shrink-0">
                        <svg class="shrink-0 size-4 text-teal-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                        </svg>
                    </div>
                    <div class="ms-3 flex-1">
                        <p class="text-xs font-semibold text-white">${event.message}</p>
                    </div>
                </div>
            `;

            Toastify({
                text: toastMarkup,
                className: "hs-toastify-on:opacity-100 opacity-0 absolute top-0 start-1/2 -translate-x-1/2 z-90 w-4/5 md:w-1/2 lg:w-1/4 transition-all duration-300 bg-dim border border-[#26252a] text-sm text-white rounded-xl shadow-lg [&>.toast-close]:hidden",
                duration: 4000,
                close: true,
                escapeMarkup: false
            }).showToast();
        });

        $wire.on('stop-robot-error', (event) => {
            const toastMarkup = `
                <div class="flex items-center p-4">
                    <div class="shrink-0">
                        <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-alert-icon lucide-shield-alert"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="M12 8v4"/><path d="M12 16h.01"/></svg>
                    </div>
                    <div class="ms-3 flex-1">
                        <p class="text-xs font-semibold text-white">${event.message}</p>
                    </div>
                </div>
            `;

            Toastify({
                text: toastMarkup,
                className: "hs-toastify-on:opacity-100 opacity-0 absolute top-0 start-1/2 -translate-x-1/2 z-90 w-4/5 md:w-1/2 lg:w-1/4 transition-all duration-300 bg-dim border border-[#26252a] text-sm text-white rounded-xl shadow-lg [&>.toast-close]:hidden",
                duration: 4000,
                close: true,
                escapeMarkup: false
            }).showToast();
        });

        $wire.on('profit-incremented', (event) => {
            const toastMarkup = `
                <div class="flex items-center p-4">
                    <div class="shrink-0">
                        <svg class="shrink-0 size-4 text-teal-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                        </svg>
                    </div>
                    <div class="ms-3 flex-1">
                        <p class="text-xs font-semibold text-white">${event.message}</p>
                    </div>
                </div>
            `;

            Toastify({
                text: toastMarkup,
                className: "hs-toastify-on:opacity-100 opacity-0 absolute top-0 start-1/2 -translate-x-1/2 z-90 w-4/5 md:w-1/2 lg:w-1/4 transition-all duration-300 bg-dim border border-[#26252a] text-sm text-white rounded-xl shadow-lg [&>.toast-close]:hidden",
                duration: 4000,
                close: true,
                escapeMarkup: false
            }).showToast();
        });
    </script>
@endscript

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('traderoom', () => ({
            timer: '',
            timeLeft: {},
            timerInterval: null,
            isBotSearchingForSignal: '',
            isStopRobotConfirmationModalOpen: false,
            asset: '',
            assetIcon: '',
            assetClass: '',
            sentiment: '',
            fee: '',
            previousBotProfit: '',
            netProfit: '',
            isRobotDisconnectingModalOpen: false,
            isCapitalAndProfitReturning: true,
            isOpenPositionsClosing: true,

            init() {
                // Start the timer when the component initializes
                this.startTimer();
            },

            startTimer() {
                this.timerInterval = setInterval(() => {
                    this.refreshTimer();
                }, 1000);
            },

            stopTimer() {
                if (this.timerInterval) {
                    clearInterval(this.timerInterval);
                    this.timerInterval = null;
                }
            },

            toggleStopRobotConfirmationModal() {
                this.isStopRobotConfirmationModalOpen = !this.isStopRobotConfirmationModalOpen;
            },

            toggleRobotDisconnectingModal() {
                this.destroy();
                this.isRobotDisconnectingModalOpen = !this.isRobotDisconnectingModalOpen;

                setTimeout(() => {
                    this.isOpenPositionsClosing = false;
                }, 8000);

                setTimeout(() => {
                    this.isCapitalAndProfitReturning = false;
                }, 14000);

                setTimeout(() => {
                    this.$wire.stopRobot();
                }, 16000);
            },

            calculateTimeLeftTillNextCheckpoint(checkpoint) {
                let difference = checkpoint - Date.now();

                if (0 > difference) {
                    return {
                        minutes: 0,
                        seconds: 0
                    }
                }

                let minutes = Math.floor((difference / (1000 * 60)) % 60);
                let seconds = Math.floor((difference / 1000) % 60);

                return {
                    minutes: minutes,
                    seconds: seconds
                }
            },

            formatTimeLeft(minutes, seconds) {
                let minuteString = 0;
                let secondString = 0;

                if (minutes < 10) {
                    minuteString = `0${String(minutes)}`;
                } else {
                    minuteString = String(minutes);
                }

                if (seconds < 10) {
                    secondString = `0${String(seconds)}`;
                } else {
                    secondString = String(seconds);
                }

                return `${minuteString}:${secondString}`;
            },

            toggleSearchingForSignals(minutes, seconds) {
                if (minutes === 5 && seconds > 0) {
                    this.isBotSearchingForSignal = true;
                }

                if (minutes === 5 && seconds === 0) {
                    this.isBotSearchingForSignal = false;
                }

                if (minutes <= 4) {
                    this.isBotSearchingForSignal = false;
                }

                if (minutes === 0 && seconds === 0) {
                    this.isBotSearchingForSignal = true;
                }
            },

            refreshTimer() {
                this.timeLeft = this.calculateTimeLeftTillNextCheckpoint(this.$wire
                    .timerCheckpoint);
                this.asset = this.$wire.asset;
                this.assetClass = this.$wire.assetClass;
                this.assetIcon = `/${this.$wire.assetIcon}`
                this.sentiment = this.$wire.sentiment;
                this.fee = `-$${Number(this.$wire.fee).toFixed(2)}`;
                this.netProfit =
                    `$${(Number(this.$wire.profit) - Number(this.$wire.fee)).toFixed(2)}`;
                this.previousBotProfit = `+$${Number(this.$wire.previousBotProfit).toFixed(2)}`;

                if (Date.now() > this.$wire.timerCheckpoint) {
                    this.$wire.refreshAssetData();
                    this.asset = this.$wire.asset;
                    this.assetIcon = `/${this.$wire.assetIcon}`;
                    this.sentiment = this.$wire.sentiment;
                    this.fee = `-$${Number(this.$wire.fee).toFixed(2)}`;
                    this.netProfit =
                        `$${(Number(this.$wire.profit) - Number(this.$wire.fee)).toFixed(2)}`;
                    let nextCheckpoint = new Date(Number(this.$wire.timerCheckpoint)).getTime() + (
                        5 * 60 + 8) * 1000;
                    this.timeLeft = this.calculateTimeLeftTillNextCheckpoint(nextCheckpoint);
                }

                let formatted = this.formatTimeLeft(this.timeLeft.minutes, this.timeLeft.seconds);
                this.timer = formatted;

                this.toggleSearchingForSignals(this.timeLeft.minutes, this.timeLeft.seconds);
            },

            // Clean up when component is destroyed
            destroy() {
                this.stopTimer();
            }
        }))
    })
</script>
