<div x-data="traderoom" class="px-4 lg:px-0 h-full">
    <div class="lg:flex lg:h-full">
        <livewire:dashboard.partials.desktop-navbar />
        <div class="lg:h-full lg:flex-1 lg:px-96 lg:pt-6">
            <div class="my-3 sticky top-0 bg-dashboard z-10 pb-2 lg:pt-4">
                <h1 class="text-white text-lg md:text-xl lg:text-2xl font-semibold">Active Robot</h1>
            </div>
            <div class="lg:h-full lg:pb-24 lg:overflow-scroll scrollbar-hide">
                <div class="w-full bg-dashboard border border-[#26252a] rounded-lg p-4 mb-4">
                    <div class="mb-4">
                        <h2 class="text-white font-bold text-xl">@money($this->amount)</h2>
                        <p class="text-zinc-300 text-[13px]">Profit <span
                                class="text-green-500">+@money($this->profit)</span></p>
                    </div>

                    <div class="flex items-center space-x-3 border border-[#26252a] rounded-lg p-4 mb-4">
                        <div class="flex-1">
                            <template x-if="isBotSearchingForSignal === false">
                                <div class="flex items-center justify-center w-fit">
                                    <p x-text='timer' class="text-white font-medium font-mono text-2xl"></p>
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
                                <div class="flex flex-col">
                                    <div>
                                        <p class="text-zinc-300 text-[11px] text-center">Robot is trading</p>
                                    </div>
                                    <div class="flex items-center space-x-1 rounded-lg">
                                        <div>
                                            <img x-bind:src="assetIcon" alt="">
                                        </div>
                                        <div>
                                            <p class="font-semibold text-white text-[15px]">{{ $this->asset }}</p>
                                        </div>
                                        <div class="pb-1">
                                            <span x-text="sentiment"
                                                class="inline-flex items-center gap-x-1.5 py-0.5 px-1.5 rounded-md text-[9px] font-normal text-white" x-bind:class="sentiment === 'BUY' ? 'bg-green-600' : 'bg-red-600'"></span>
                                        </div>
                                    </div>
                                </div>
                            </template>
                            <template x-if="isBotSearchingForSignal === true">
                                <div class="flex flex-col space-y-1">
                                    <div>
                                        <p class="text-zinc-300 text-[11px] text-center">Fetching signals...</p>
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

                    <div class="border border-[#26252a] rounded-lg p-4 mb-4">
                        <div class="flex items-center justify-center space-x-2 pb-2 border-b border-[#26252a]">
                            <div class="flex-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                    viewBox="0 0 22 22" fill="none">
                                    <g clip-path="url(#clip0_51_44)">
                                        <path
                                            d="M15.3084 7.33333C15.126 6.81563 14.7927 6.36438 14.3517 6.03766C13.9106 5.71093 13.3818 5.52368 12.8334 5.5H9.16675C8.4374 5.5 7.73793 5.78973 7.2222 6.30546C6.70648 6.82118 6.41675 7.52065 6.41675 8.25C6.41675 8.97935 6.70648 9.67882 7.2222 10.1945C7.73793 10.7103 8.4374 11 9.16675 11H12.8334C13.5628 11 14.2622 11.2897 14.778 11.8055C15.2937 12.3212 15.5834 13.0207 15.5834 13.75C15.5834 14.4793 15.2937 15.1788 14.778 15.6945C14.2622 16.2103 13.5628 16.5 12.8334 16.5H9.16675C8.61835 16.4763 8.08958 16.2891 7.6485 15.9623C7.20742 15.6356 6.87421 15.1844 6.69175 14.6667"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M11 2.75V5.5M11 16.5V19.25" stroke="white" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_51_44">
                                            <rect width="22" height="22" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="flex-1 grow">
                                <p class="text-zinc-300 text-xs">Amount</p>
                            </div>
                            <div class="flex-none text-end text-white font-medium text-sm">@money($this->amount)</div>
                        </div>

                        <div class="flex items-center justify-center space-x-2 py-2 border-b border-[#26252a]">
                            <div class="flex-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                    viewBox="0 0 22 22" fill="none">
                                    <g clip-path="url(#clip0_52_49)">
                                        <path
                                            d="M3.66675 5.50008C3.66675 5.01385 3.8599 4.54754 4.20372 4.20372C4.54754 3.8599 5.01385 3.66675 5.50008 3.66675H16.5001C16.9863 3.66675 17.4526 3.8599 17.7964 4.20372C18.1403 4.54754 18.3334 5.01385 18.3334 5.50008V7.33341C18.3334 7.81965 18.1403 8.28596 17.7964 8.62978C17.4526 8.97359 16.9863 9.16675 16.5001 9.16675H5.50008C5.01385 9.16675 4.54754 8.97359 4.20372 8.62978C3.8599 8.28596 3.66675 7.81965 3.66675 7.33341V5.50008Z"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M3.66675 14.6666C3.66675 14.1804 3.8599 13.714 4.20372 13.3702C4.54754 13.0264 5.01385 12.8333 5.50008 12.8333H16.5001C16.9863 12.8333 17.4526 13.0264 17.7964 13.3702C18.1403 13.714 18.3334 14.1804 18.3334 14.6666V16.4999C18.3334 16.9861 18.1403 17.4525 17.7964 17.7963C17.4526 18.1401 16.9863 18.3333 16.5001 18.3333H5.50008C5.01385 18.3333 4.54754 18.1401 4.20372 17.7963C3.8599 17.4525 3.66675 16.9861 3.66675 16.4999V14.6666Z"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_52_49">
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                    viewBox="0 0 22 22" fill="none">
                                    <g clip-path="url(#clip0_52_54)">
                                        <path
                                            d="M14.6667 14.6667L15.9931 15.3304C16.1453 15.4065 16.2734 15.5234 16.3629 15.6682C16.4524 15.8129 16.4999 15.9797 16.5 16.1499V18.3334H5.5V16.1499C5.50009 15.9797 5.54756 15.8129 5.63709 15.6682C5.72662 15.5234 5.85468 15.4065 6.00692 15.3304L7.33333 14.6667H14.6667Z"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M13.75 2.75L12.8334 5.5L16.0335 7.469C16.2036 7.57354 16.3349 7.73076 16.4075 7.91678C16.4801 8.1028 16.49 8.30743 16.4356 8.49956C16.3812 8.69169 16.2656 8.86082 16.1063 8.98123C15.947 9.10165 15.7528 9.16676 15.5531 9.16666H12.8334L14.7336 14.6667H7.43605L7.33338 10.0833C7.33338 7.33333 8.33254 4.59891 11 3.66666C12.7784 3.04516 13.695 2.73991 13.75 2.75Z"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_52_54">
                                            <rect width="22" height="22" fill="white"
                                                transform="matrix(-1 0 0 1 22 0)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="flex-1 grow">
                                <p class="text-zinc-300 text-xs">Strategy</p>
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
                                <p class="text-zinc-300 text-xs">Profit limit</p>
                            </div>
                            <div class="flex-none text-end text-white font-medium text-sm">{{ $this->profitLimit }}%
                            </div>
                        </div>

                        <div class="flex items-center justify-center space-x-2 pt-2">
                            <div class="flex-none">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_408_227)">
                                        <path
                                            d="M10.0833 13.75H11.9167C12.4029 13.75 12.8692 13.5569 13.213 13.2131C13.5568 12.8693 13.75 12.4029 13.75 11.9167C13.75 11.4305 13.5568 10.9642 13.213 10.6203C12.8692 10.2765 12.4029 10.0834 11.9167 10.0834H9.16667C8.61667 10.0834 8.15833 10.2667 7.88333 10.6334L2.75 15.5834"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M6.4165 19.25L7.88317 17.9667C8.15817 17.6 8.6165 17.4167 9.1665 17.4167H12.8332C13.8415 17.4167 14.7582 17.05 15.3998 16.3167L19.6165 12.2833C19.9702 11.9491 20.1767 11.4879 20.1904 11.0014C20.2042 10.5149 20.0241 10.0429 19.6898 9.68917C19.3556 9.33544 18.8944 9.12899 18.4079 9.11524C17.9214 9.10148 17.4494 9.28156 17.0957 9.61584L13.2457 13.1908"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M1.8335 14.6666L7.3335 20.1666" stroke="white" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M14.6666 10.9083C16.1348 10.9083 17.325 9.71817 17.325 8.25001C17.325 6.78185 16.1348 5.59167 14.6666 5.59167C13.1985 5.59167 12.0083 6.78185 12.0083 8.25001C12.0083 9.71817 13.1985 10.9083 14.6666 10.9083Z"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M5.5 7.33337C7.01878 7.33337 8.25 6.10216 8.25 4.58337C8.25 3.06459 7.01878 1.83337 5.5 1.83337C3.98122 1.83337 2.75 3.06459 2.75 4.58337C2.75 6.10216 3.98122 7.33337 5.5 7.33337Z"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_408_227">
                                            <rect width="22" height="22" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>

                            </div>
                            <div class="flex-1 grow">
                                <p class="text-zinc-300 text-xs">Fees - 1% (charged from profits)</p>
                            </div>
                            <div x-text="fee" class="flex-none text-end text-white font-medium text-sm">
                            </div>
                        </div>
                    </div>

                    <div>
                        <button wire:click="toggleStopRobotConfirmationModal()" type="button"
                            class="py-2.5 cursor-pointer px-4 w-full md:px-6 text-center gap-x-2 text-sm font-semibold rounded-lg bg-accent text-white focus:outline-hidden disabled:opacity-50 disabled:pointer-events-none">
                            Stop the robot
                        </button>
                    </div>
                </div>
            </div>

            <div wire:cloak wire:show="isStopRobotConfirmationModalOpen"
                class="fixed top-0 left-0 h-svh w-full px-4 lg:px-96 pt-6 z-20 bg-dashboard">
                <div class="w-full h-full flex items-center justify-center">
                    <div class="max-w-sm mx-auto flex flex-col bg-[#26252a] rounded-lg pointer-events-auto">
                        <div class="flex justify-between items-center py-3 px-4 dark:border-neutral-700">
                            <h3 class="font-bold text-gray-800 dark:text-white">
                            </h3>
                            <button wire:click="toggleStopRobotConfirmationModal()" type="button"
                                class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                                aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="p-4 overflow-y-auto text-center">
                            <p class="text-white font-semibold text-xl">
                                Are you sure you want to stop the robot at @money($this->profit) profit?
                            </p>
                        </div>
                        <div class="py-3 px-4">
                            <div>
                                <button type="button" wire:click="stopRobot()" type="button"
                                    wire:loading.attr="disabled"
                                    class="p-3 w-full text-center text-sm font-semibold rounded-lg border border-transparent bg-accent text-white cursor-pointer hover:bg-accent-hover focus:outline-hidden focus:bg-accent disabled:opacity-50 disabled:pointer-events-none">
                                    Stop robot
                                </button>
                            </div>
                            <div class="mt-3">
                                <button wire:click="toggleStopRobotConfirmationModal()" type="button"
                                    class="p-3 w-full text-center text-sm font-semibold rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs cursor-pointer hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                    data-hs-overlay="#hs-vertically-centered-modal">
                                    Cancel
                                </button>
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
                className: "hs-toastify-on:opacity-100 opacity-0 border border-gray-700 absolute top-0 start-1/2 -translate-x-1/2 z-90 w-4/5 md:w-1/2 lg:w-1/4 transition-all duration-300 bg-navbar text-sm text-white rounded-xl shadow-lg [&>.toast-close]:hidden",
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
                className: "hs-toastify-on:opacity-100 opacity-0 border border-gray-700 absolute top-0 start-1/2 -translate-x-1/2 z-90 w-4/5 md:w-1/2 lg:w-1/4 transition-all duration-300 bg-navbar text-sm text-white rounded-xl shadow-lg [&>.toast-close]:hidden",
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
                className: "hs-toastify-on:opacity-100 opacity-0 border border-gray-700 absolute top-0 start-1/2 -translate-x-1/2 z-90 w-4/5 md:w-1/2 lg:w-1/4 transition-all duration-300 bg-navbar text-sm text-white rounded-xl shadow-lg [&>.toast-close]:hidden",
                duration: 4000,
                close: true,
                escapeMarkup: false
            }).showToast();
        });
    </script>

    <script></script>
@endscript

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('traderoom', () => ({
            timer: '',
            timeLeft: {},
            timerInterval: null,
            isBotSearchingForSignal: '',
            asset: '',
            assetIcon: '',
            sentiment: '',
            fee: '',

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
                console.log(minutes)
                console.log(seconds)

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
                this.timeLeft = this.calculateTimeLeftTillNextCheckpoint(this.$wire.timerCheckpoint);
                this.asset = this.$wire.asset;
                this.assetIcon = `/${this.$wire.assetIcon}`
                this.sentiment = this.$wire.sentiment;
                this.fee = `$${Number(this.$wire.fee).toFixed(2)}`;

                if (Date.now() > this.$wire.timerCheckpoint) {
                    this.$wire.refreshAssetData();
                    this.asset = this.$wire.asset;
                    this.assetIcon = this.$wire.assetIcon;
                    this.sentiment = this.$wire.sentiment;
                    this.fee = `$${Number(this.$wire.fee).toFixed(2)}`;
                    const offset = (5 * 60 * 1000) + (8 * 1000);
                    let nextCheckpoint = this.$wire.timerCheckpoint + offset;
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
