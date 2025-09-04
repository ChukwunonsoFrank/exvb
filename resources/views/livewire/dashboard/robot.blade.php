<div x-data class="px-4 lg:px-0 h-full">
    <div class="lg:flex lg:h-full">
        <livewire:dashboard.partials.desktop-navbar />
        <div class="lg:h-full lg:flex-1 lg:px-96 lg:pt-6">
            <div id="hs-vertically-centered-modal"
                class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none"
                role="dialog" tabindex="-1" aria-labelledby="hs-vertically-centered-modal-label">
                <div
                    class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
                    <div class="w-full flex flex-col bg-dashboard rounded-xl pointer-events-auto">
                        <div class="flex justify-between items-center py-3 px-4 border-b border-[#26252a]">
                            <h3 id="hs-vertically-centered-modal-label" class="font-bold text-white">
                                How to use the Exvb Robot
                            </h3>
                            <button type="button"
                                class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-[#26252a] text-white  focus:outline-hidden disabled:opacity-50 disabled:pointer-events-none"
                                aria-label="Close" data-hs-overlay="#hs-vertically-centered-modal">
                                <span class="sr-only">Close</span>
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="p-4 overflow-y-auto">
                            <div>
                                <span class="font-medium text-semibold text-white mb-6">How to start the robot:</span>
                                <ul class="list-disc list-inside text-white text-sm">
                                    <li>Step 1: Enter your trade amount.</li>
                                    <li>Step 2: Select a strategy. Strategy depends on your trade amount. Choose one
                                        that matches your trade amount.</li>
                                    <li>Step 3: Activate the robot. Click "Start Robot" and it will begin trading on
                                        your behalf, generating profits every 5 minutes.</li>
                                </ul>
                            </div>
                            <div class="mt-6">
                                <span class="font-medium text-semibold text-white mb-6">Important Notes:</span>
                                <ul class="list-decimal list-inside text-white text-sm">
                                    <li>Your capital is always returned after each trade.</li>
                                    <li>You can stop the robot at any time.</li>
                                    <li>The robot generates profits every 5 minutes.</li>
                                    <li>After starting the robot, you don’t need to do anything else. It will
                                        automatically trade and accumulate profits for you until it reaches the profit
                                        limit.</li>
                                    <li>There are both Live and Demo accounts available. To make real profits, deposit
                                        funds into your Live account and start using the robot.</li>
                                </ul>
                            </div>
                            <div class="mt-4 text-white text-sm">
                                Feel free to contact us if you need any help with using the Exvb Robot.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center mb-3 mt-2 sticky top-0 bg-dashboard z-10 py-2 lg:pt-4">
                <div class="flex-1">
                    <h1 class="text-white text-lg md:text-xl lg:text-2xl font-bold tracking-[0.15px]">Setup Robot
                    </h1>
                </div>
                <div class="flex-none">
                    <button type="button" class="flex items-center gap-x-1" aria-haspopup="dialog"
                        aria-expanded="false" aria-controls="hs-vertically-centered-modal"
                        data-hs-overlay="#hs-vertically-centered-modal">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="#a4a4a4" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-info-icon lucide-info">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 16v-4" />
                                <path d="M12 8h.01" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs text-[#a4a4a4]">How it works</p>
                        </div>
                    </button>
                </div>
            </div>

            <div class="lg:h-full lg:pb-24 lg:overflow-scroll scrollbar-hide">
                <div class="flex items-start gap-x-2 mb-6">
                    <div class="flex-1">
                        <div class="text-start">
                            <label for="input-label" class="block text-sm font-medium mb-2 text-zinc-300">Trade
                                Amount</label>
                            <div class="relative">
                                <input wire:model="amount" wire:keyup.debounce.300ms="calculateProfitExpected"
                                    type="text"
                                    class="bg-transparent text-white border border-[#26252a] text-sm peer py-2.5 sm:py-3 px-4 ps-11 block w-full rounded-lg sm:text-sm focus:outline-0"
                                    placeholder="">
                                <div
                                    class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4 peer-disabled:opacity-50 peer-disabled:pointer-events-none">
                                    <p class="text-white text-sm font-semibold">$</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex-1">
                        <label for="input-label" class="block text-sm font-medium mb-2 text-zinc-300">Choose
                            Account</label>
                        <div class="grid grid-cols-2 gap-x-2">
                            <label for="hs-vertical-radio-in-form-demo"
                                wire:click="selectAccountType('Demo account', 'demo')"
                                class="px-4 py-2 w-full {{ $this->accountTypeSlug === 'demo' ? 'border-3 border-accent' : 'border border-[#26252a]' }} bg-transparent rounded-lg text-base focus:border-blue-500 focus:ring-blue-500">
                                <div class="flex-1 text-center text-white">
                                    <h2>Demo</h2>
                                </div>
                            </label>
                            <label for="hs-vertical-radio-in-form-live"
                                wire:click="selectAccountType('Live account', 'live')"
                                class="px-4 py-2 w-full {{ $this->accountTypeSlug === 'live' ? 'border-3 border-accent' : 'border border-[#26252a]' }} bg-transparent rounded-lg text-base focus:border-blue-500 focus:ring-blue-500">
                                <div class="flex-1 text-center text-white">
                                    <h2>Live</h2>
                                </div>
                            </label>
                        </div>
                        {{-- <label for="input-label" class="block text-sm font-medium mb-2 text-zinc-300">Markets</label>
                        <input type="text" value="Forex & Crypto"
                            class="border border-[#26252a] bg-transparent text-white text-start text-sm py-2.5 sm:py-3 px-4 block w-full rounded-lg sm:text-sm focus:outline-0"
                            placeholder="" readonly> --}}
                    </div>
                </div>

                <div class="mb-4">
                    <label for="input-label" class="block text-sm text-center font-medium mb-2 text-zinc-300">
                        Estimated Profits in 24hrs
                    </label>
                    <div class="flex justify-center w-full">
                        <div
                            class="flex items-center justify-center w-full border border-[#26252a] rounded-lg py-1.5 px-4">
                            <div class="flex-none text-sm text-white p-2 pl-0 py-1" role="alert" tabindex="-1"
                                aria-labelledby="hs-with-description-label">
                                <div class="flex items-center">
                                    <div class="shrink-0 text-green-400">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_776_2)">
                                                <path
                                                    d="M12.525 6C12.3757 5.57643 12.1031 5.20722 11.7422 4.9399C11.3813 4.67258 10.9487 4.51937 10.5 4.5H7.5C6.90326 4.5 6.33097 4.73705 5.90901 5.15901C5.48705 5.58097 5.25 6.15326 5.25 6.75C5.25 7.34674 5.48705 7.91903 5.90901 8.34099C6.33097 8.76295 6.90326 9 7.5 9H10.5C11.0967 9 11.669 9.23705 12.091 9.65901C12.5129 10.081 12.75 10.6533 12.75 11.25C12.75 11.8467 12.5129 12.419 12.091 12.841C11.669 13.2629 11.0967 13.5 10.5 13.5H7.5C7.05131 13.4806 6.61868 13.3274 6.2578 13.0601C5.89691 12.7928 5.62429 12.4236 5.475 12"
                                                    stroke="#05DF72" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M9 2.25V4.5M9 13.5V15.75" stroke="#05DF72" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_776_2">
                                                    <rect width="18" height="18" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="flex-none">
                                        <p wire:text="expectedProfitMin" class="text-white text-base font-bold"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-none text-sm text-white pr-1">
                                <p class=""> - </p>
                            </div>

                            <div class="flex-none text-sm text-white p-2 pl-0 py-1" role="alert" tabindex="-1"
                                aria-labelledby="hs-with-description-label">
                                <div class="flex items-center">
                                    <div class="shrink-0 text-green-400">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_776_2)">
                                                <path
                                                    d="M12.525 6C12.3757 5.57643 12.1031 5.20722 11.7422 4.9399C11.3813 4.67258 10.9487 4.51937 10.5 4.5H7.5C6.90326 4.5 6.33097 4.73705 5.90901 5.15901C5.48705 5.58097 5.25 6.15326 5.25 6.75C5.25 7.34674 5.48705 7.91903 5.90901 8.34099C6.33097 8.76295 6.90326 9 7.5 9H10.5C11.0967 9 11.669 9.23705 12.091 9.65901C12.5129 10.081 12.75 10.6533 12.75 11.25C12.75 11.8467 12.5129 12.419 12.091 12.841C11.669 13.2629 11.0967 13.5 10.5 13.5H7.5C7.05131 13.4806 6.61868 13.3274 6.2578 13.0601C5.89691 12.7928 5.62429 12.4236 5.475 12"
                                                    stroke="#05DF72" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M9 2.25V4.5M9 13.5V15.75" stroke="#05DF72" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_776_2">
                                                    <rect width="18" height="18" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="flex-none">
                                        <p wire:text="expectedProfitMax" class="text-white text-base font-bold"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4 flex items-center space-x-2">
                    <div class="flex-1">
                        <label for="input-label" class="block text-sm font-medium mb-2 text-zinc-300">Crypto
                            Exchange</label>
                        <div
                            class="flex items-center justify-center gap-x-1 w-full text-sm self-center text-center border border-[#26252a] bg-transparent py-2.5 sm:py-3 px-4 rounded-lg text-[#FFFFFF] focus:outline-0">
                            <div class="flex-none">
                                <img class="inline" src="{{ asset('assets/icons/bybit.svg') }}" alt="bybit-logo">
                            </div>
                            <div class="flex-none w-4 mt-1">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_793_3)">
                                        <path
                                            d="M8.00662 1.34067C8.52514 1.3407 9.0259 1.52958 9.41528 1.872L9.51795 1.96867L9.98328 2.434C10.111 2.56088 10.2778 2.64097 10.4566 2.66133L10.5466 2.66667H11.2133C11.7581 2.66664 12.2823 2.87505 12.6783 3.24916C13.0744 3.62327 13.3123 4.13474 13.3433 4.67867L13.3466 4.8V5.46667C13.3466 5.64667 13.4079 5.822 13.5186 5.962L13.5786 6.02867L14.0433 6.494C14.4284 6.87697 14.653 7.39241 14.6712 7.93525C14.6894 8.47808 14.4999 9.00742 14.1413 9.41533L14.0446 9.518L13.5793 9.98333C13.4524 10.111 13.3723 10.2778 13.3519 10.4567L13.3466 10.5467V11.2133C13.3466 11.7581 13.1382 12.2823 12.7641 12.6784C12.39 13.0744 11.8785 13.3123 11.3346 13.3433L11.2133 13.3467H10.5466C10.3669 13.3467 10.1924 13.4073 10.0513 13.5187L9.98462 13.5787L9.51928 14.0433C9.13632 14.4285 8.62087 14.6531 8.07804 14.6713C7.5352 14.6895 7.00586 14.4999 6.59795 14.1413L6.49528 14.0447L6.02995 13.5793C5.90224 13.4525 5.73548 13.3724 5.55662 13.352L5.46662 13.3467H4.79995C4.25514 13.3467 3.73096 13.1383 3.3349 12.7642C2.93885 12.3901 2.70094 11.8786 2.66995 11.3347L2.66662 11.2133V10.5467C2.66656 10.3669 2.60597 10.1924 2.49462 10.0513L2.43462 9.98467L1.96995 9.51933C1.5848 9.13637 1.36023 8.62092 1.34202 8.07809C1.32381 7.53526 1.51333 7.00592 1.87195 6.598L1.96862 6.49533L2.43395 6.03C2.56082 5.90229 2.64092 5.73553 2.66128 5.55667L2.66662 5.46667V4.8L2.66995 4.67867C2.69972 4.15563 2.9209 3.66183 3.29134 3.29139C3.66178 2.92095 4.15558 2.69977 4.67862 2.67L4.79995 2.66667H5.46662C5.64636 2.66661 5.82085 2.60602 5.96195 2.49467L6.02862 2.43467L6.49395 1.97C6.69217 1.77059 6.92786 1.61234 7.18746 1.50433C7.44706 1.39633 7.72545 1.34071 8.00662 1.34067ZM10.4713 6.19533C10.3463 6.07035 10.1767 6.00014 9.99995 6.00014C9.82317 6.00014 9.65363 6.07035 9.52862 6.19533L7.33328 8.39L6.47128 7.52867L6.40862 7.47333C6.27462 7.36973 6.10621 7.32101 5.9376 7.33707C5.76898 7.35313 5.6128 7.43277 5.50078 7.55982C5.38876 7.68686 5.32929 7.85178 5.33446 8.02108C5.33963 8.19038 5.40905 8.35136 5.52862 8.47133L6.86195 9.80467L6.92462 9.86C7.05289 9.9595 7.21305 10.0088 7.37507 9.99859C7.53709 9.98841 7.68982 9.91945 7.80462 9.80467L10.4713 7.138L10.5266 7.07533C10.6261 6.94706 10.6754 6.7869 10.6652 6.62488C10.655 6.46286 10.5861 6.31013 10.4713 6.19533Z"
                                            fill="#05DF72" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_793_3">
                                            <rect width="16" height="16" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1">
                        <label for="input-label" class="block text-sm font-medium mb-2 text-zinc-300">Forex
                            Broker</label>
                        <div
                            class="flex items-center justify-center gap-x-1 border border-[#26252a] bg-transparent w-full text-sm self-center text-center py-2.5 sm:py-3 px-4 rounded-lg text-[#FFFFFF] focus:outline-0">
                            <div class="flex-none">
                                <img class="inline" src="{{ asset('assets/icons/xtb.svg') }}" alt="xtb-logo">
                            </div>
                            <div class="flex-none w-4">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_793_3)">
                                        <path
                                            d="M8.00662 1.34067C8.52514 1.3407 9.0259 1.52958 9.41528 1.872L9.51795 1.96867L9.98328 2.434C10.111 2.56088 10.2778 2.64097 10.4566 2.66133L10.5466 2.66667H11.2133C11.7581 2.66664 12.2823 2.87505 12.6783 3.24916C13.0744 3.62327 13.3123 4.13474 13.3433 4.67867L13.3466 4.8V5.46667C13.3466 5.64667 13.4079 5.822 13.5186 5.962L13.5786 6.02867L14.0433 6.494C14.4284 6.87697 14.653 7.39241 14.6712 7.93525C14.6894 8.47808 14.4999 9.00742 14.1413 9.41533L14.0446 9.518L13.5793 9.98333C13.4524 10.111 13.3723 10.2778 13.3519 10.4567L13.3466 10.5467V11.2133C13.3466 11.7581 13.1382 12.2823 12.7641 12.6784C12.39 13.0744 11.8785 13.3123 11.3346 13.3433L11.2133 13.3467H10.5466C10.3669 13.3467 10.1924 13.4073 10.0513 13.5187L9.98462 13.5787L9.51928 14.0433C9.13632 14.4285 8.62087 14.6531 8.07804 14.6713C7.5352 14.6895 7.00586 14.4999 6.59795 14.1413L6.49528 14.0447L6.02995 13.5793C5.90224 13.4525 5.73548 13.3724 5.55662 13.352L5.46662 13.3467H4.79995C4.25514 13.3467 3.73096 13.1383 3.3349 12.7642C2.93885 12.3901 2.70094 11.8786 2.66995 11.3347L2.66662 11.2133V10.5467C2.66656 10.3669 2.60597 10.1924 2.49462 10.0513L2.43462 9.98467L1.96995 9.51933C1.5848 9.13637 1.36023 8.62092 1.34202 8.07809C1.32381 7.53526 1.51333 7.00592 1.87195 6.598L1.96862 6.49533L2.43395 6.03C2.56082 5.90229 2.64092 5.73553 2.66128 5.55667L2.66662 5.46667V4.8L2.66995 4.67867C2.69972 4.15563 2.9209 3.66183 3.29134 3.29139C3.66178 2.92095 4.15558 2.69977 4.67862 2.67L4.79995 2.66667H5.46662C5.64636 2.66661 5.82085 2.60602 5.96195 2.49467L6.02862 2.43467L6.49395 1.97C6.69217 1.77059 6.92786 1.61234 7.18746 1.50433C7.44706 1.39633 7.72545 1.34071 8.00662 1.34067ZM10.4713 6.19533C10.3463 6.07035 10.1767 6.00014 9.99995 6.00014C9.82317 6.00014 9.65363 6.07035 9.52862 6.19533L7.33328 8.39L6.47128 7.52867L6.40862 7.47333C6.27462 7.36973 6.10621 7.32101 5.9376 7.33707C5.76898 7.35313 5.6128 7.43277 5.50078 7.55982C5.38876 7.68686 5.32929 7.85178 5.33446 8.02108C5.33963 8.19038 5.40905 8.35136 5.52862 8.47133L6.86195 9.80467L6.92462 9.86C7.05289 9.9595 7.21305 10.0088 7.37507 9.99859C7.53709 9.98841 7.68982 9.91945 7.80462 9.80467L10.4713 7.138L10.5266 7.07533C10.6261 6.94706 10.6754 6.7869 10.6652 6.62488C10.655 6.46286 10.5861 6.31013 10.4713 6.19533Z"
                                            fill="#05DF72" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_793_3">
                                            <rect width="16" height="16" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="input-label" class="block text-sm font-medium mb-2 text-zinc-300">Strategy</label>
                    <div class="grid space-y-2">
                        @foreach ($this->strategies as $strategy)
                            <div class="relative">
                                <div
                                    class="absolute -inset-0 bg-linear-to-r from-accent to-[#F76CC6] rounded-lg blur opacity-50">
                                </div>
                                <label for="hs-vertical-radio-in-form-{{ $strategy['id'] }}"
                                    wire:key="strategy-{{ $strategy['id'] }}"
                                    class="flex relative px-3 py-3 pb-4 gap-x-4 items-center w-full bg-dashboard rounded-lg border-3 border-[#26252a] text-sm focus:border-blue-500 focus:ring-blue-500">
                                    <div class="flex-none w-12">
                                        <img class="w-24" src="{{ asset('assets/images/robot-illustration.png') }}"
                                            alt="">
                                    </div>
                                    <div class="flex-1">
                                        {{-- <h2 class="font-bold mb-1 text-base text-white">
                                            {{ $strategy['name'] }}
                                        </h2> --}}

                                        <div class="mb-1.5">
                                            <div class="flex items-start gap-x-2">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 18 18" id="Time-Lapse--Streamline-Sharp"
                                                        height="18" width="18">
                                                        <g
                                                            id="time-lapse--time-lapse-mode-photo-picture-image-setting">
                                                            <path id="Union" fill="#8fbffa" fill-rule="evenodd"
                                                                d="M2.4375 9a6.5625 6.5625 0 1 0 13.125 0h1.875c0 4.65975 -3.77775 8.4375 -8.4375 8.4375S0.5625 13.65975 0.5625 9 4.34025 0.5625 9 0.5625v1.875A6.5625 6.5625 0 0 0 2.4375 9Zm12.993749999999999 -1.314a6.5062500000000005 6.5062500000000005 0 0 0 -0.5249999999999999 -1.5494999999999999l1.6875 -0.81975c0.30375 0.62625 0.5325 1.29525 0.675 1.9965l-1.8375000000000001 0.37275Zm-2.4945 -3.9375a6.60675 6.60675 0 0 1 1.314 1.31325l1.4985 -1.12575a8.48175 8.48175 0 0 0 -1.6860000000000002 -1.68675l-1.1265 1.5Zm-1.0725 -0.6547499999999999a6.508500000000001 6.508500000000001 0 0 0 -1.5510000000000002 -0.5249999999999999l0.3735 -1.8375000000000001c0.7005 0.14250000000000002 1.37025 0.372 1.9957500000000001 0.6757500000000001l-0.8190000000000001 1.68675Z"
                                                                clip-rule="evenodd" stroke-width="0.75"></path>
                                                            <path id="Vector 3844 (Stroke)" fill="#2859c5"
                                                                fill-rule="evenodd"
                                                                d="M8.25 5.25h1.5v3.4395000000000002l2.7802499999999997 2.7802499999999997 -1.0605 1.0605L8.25 9.3105V5.25Z"
                                                                clip-rule="evenodd" stroke-width="0.75"></path>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <p class="text-xs text-zinc-300">
                                                    Estimated 24 hours returns range from
                                                    {{ $this->strategy['min_roi'] }}% to
                                                    {{ $this->strategy['max_roi'] }}%, depending on market
                                                    conditions.
                                                </p>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="flex items-center gap-x-2">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 18 18" id="Chess-Knight--Streamline-Sharp"
                                                        height="18" width="18">
                                                        <desc>
                                                            Chess Knight Streamline Icon: https://streamlinehq.com
                                                        </desc>
                                                        <g id="chess-knight">
                                                            <path id="Union" fill="#8fbffa" fill-rule="evenodd"
                                                                d="m7.038 1.3215 -0.663 -0.12V3.1049999999999995L2.445 6.2490000000000006l1.41675 2.2657499999999997 2.694 -0.63375 -1.6425 6.931500000000001H13.02L11.8065 5.916l-0.0015 -0.00825c-0.20475000000000002 -1.23 -0.7215 -2.265 -1.545 -3.05325 -0.8205 -0.786 -1.9132500000000001 -1.2945 -3.2220000000000004 -1.533Z"
                                                                clip-rule="evenodd" stroke-width="0.75"></path>
                                                            <path id="Union_2" fill="#2859c5"
                                                                d="M13.53 14.25H4.5l-1.155 2.8125h11.31L13.53 14.25Z"
                                                                stroke-width="0.75"></path>
                                                            <path id="Intersect" fill="#2859c5" fill-rule="evenodd"
                                                                d="m6.257999999999999 9.1365 2.5215 -0.72 -0.309 -1.0822500000000002 -1.91475 0.5475 -0.29775 1.25475Z"
                                                                clip-rule="evenodd" stroke-width="0.75"></path>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <p class="text-xs text-zinc-300">
                                                    Trading Strategy: <span class="font-bold">Scalping</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mb-6 flex items-center space-x-2">
                    <div class="flex-1">
                        <label for="input-label" class="block text-sm font-medium mb-2 text-zinc-300">
                            Robot Takes Profits
                        </label>
                        <input type="text" value="Every 5 mins"
                            class="border border-[#26252a] bg-transparent text-white text-start text-sm py-2.5 sm:py-3 px-4 block w-full rounded-lg sm:text-sm focus:outline-0"
                            placeholder="" readonly>
                    </div>
                    <div class="flex-1">
                        <label for="input-label" class="block text-sm font-medium mb-2 text-zinc-300">Capital</label>
                        <input type="text" value="Returned after trade"
                            class="border border-[#26252a] bg-transparent text-white text-start text-sm py-2.5 sm:py-3 px-4 block w-full rounded-lg sm:text-sm focus:outline-0"
                            placeholder="" readonly>
                    </div>
                </div>

                <div class="sticky bottom-2">
                    <a x-on:click="$store.robotPage.toggleStartRobotConfirmationModal($wire);">
                        <button type="button" wire:loading.attr="disabled"
                            class="py-2.5 cursor-pointer px-4 w-full md:px-6 text-center gap-x-2 text-sm font-semibold rounded-lg bg-accent text-white focus:outline-hidden disabled:pointer-events-none">
                            <i wire:loading class="fa-solid fa-circle-notch fa-spin"></i>
                            <span wire:loading.remove>Start robot</span>
                        </button>
                    </a>
                </div>

                <div x-cloak x-show="$store.robotPage.isStartRobotConfirmationModalOpen"
                    class="fixed top-0 left-0 h-svh w-full px-4 lg:px-96 pt-6 z-20 bg-dashboard">
                    <div class="w-full h-full flex items-center justify-center">
                        <div class="max-w-sm mx-auto bg-[#26252a] rounded-2xl pointer-events-auto">
                            <div class="p-6 overflow-y-auto text-center">
                                <div class="flex justify-center mb-8">
                                    <div
                                        class="size-18 flex items-center justify-center rounded-full border-3 border-[#05df72]">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                            viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-radio-icon lucide-radio">
                                            <path d="M16.247 7.761a6 6 0 0 1 0 8.478" />
                                            <path d="M19.075 4.933a10 10 0 0 1 0 14.134" />
                                            <path d="M4.925 19.067a10 10 0 0 1 0-14.134" />
                                            <path d="M7.753 16.239a6 6 0 0 1 0-8.478" />
                                            <circle cx="12" cy="12" r="2" />
                                        </svg>
                                    </div>
                                </div>
                                <p class="text-white font-semibold text-xl mb-4">
                                    Robot is connecting to the markets...
                                </p>
                                <div class="w-full flex flex-col gap-y-2 justify-center items-center mb-4">
                                    <template x-if="$store.robotPage.isBrokerConnecting === true">
                                        <div class="bg-[#1a1a1a] p-2 flex items-center gap-x-1 rounded-full">
                                            <i class="fa-solid fa-circle-notch fa-spin text-[#05df72]"></i>
                                            <p class="font-light text-xs text-white">Connecting to broker</p>
                                        </div>
                                    </template>

                                    <template x-if="$store.robotPage.isBrokerConnecting === false">
                                        <div class="bg-[#1a1a1a] p-2 flex items-center gap-x-1 rounded-full">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_793_3)">
                                                    <path
                                                        d="M8.00662 1.34067C8.52514 1.3407 9.0259 1.52958 9.41528 1.872L9.51795 1.96867L9.98328 2.434C10.111 2.56088 10.2778 2.64097 10.4566 2.66133L10.5466 2.66667H11.2133C11.7581 2.66664 12.2823 2.87505 12.6783 3.24916C13.0744 3.62327 13.3123 4.13474 13.3433 4.67867L13.3466 4.8V5.46667C13.3466 5.64667 13.4079 5.822 13.5186 5.962L13.5786 6.02867L14.0433 6.494C14.4284 6.87697 14.653 7.39241 14.6712 7.93525C14.6894 8.47808 14.4999 9.00742 14.1413 9.41533L14.0446 9.518L13.5793 9.98333C13.4524 10.111 13.3723 10.2778 13.3519 10.4567L13.3466 10.5467V11.2133C13.3466 11.7581 13.1382 12.2823 12.7641 12.6784C12.39 13.0744 11.8785 13.3123 11.3346 13.3433L11.2133 13.3467H10.5466C10.3669 13.3467 10.1924 13.4073 10.0513 13.5187L9.98462 13.5787L9.51928 14.0433C9.13632 14.4285 8.62087 14.6531 8.07804 14.6713C7.5352 14.6895 7.00586 14.4999 6.59795 14.1413L6.49528 14.0447L6.02995 13.5793C5.90224 13.4525 5.73548 13.3724 5.55662 13.352L5.46662 13.3467H4.79995C4.25514 13.3467 3.73096 13.1383 3.3349 12.7642C2.93885 12.3901 2.70094 11.8786 2.66995 11.3347L2.66662 11.2133V10.5467C2.66656 10.3669 2.60597 10.1924 2.49462 10.0513L2.43462 9.98467L1.96995 9.51933C1.5848 9.13637 1.36023 8.62092 1.34202 8.07809C1.32381 7.53526 1.51333 7.00592 1.87195 6.598L1.96862 6.49533L2.43395 6.03C2.56082 5.90229 2.64092 5.73553 2.66128 5.55667L2.66662 5.46667V4.8L2.66995 4.67867C2.69972 4.15563 2.9209 3.66183 3.29134 3.29139C3.66178 2.92095 4.15558 2.69977 4.67862 2.67L4.79995 2.66667H5.46662C5.64636 2.66661 5.82085 2.60602 5.96195 2.49467L6.02862 2.43467L6.49395 1.97C6.69217 1.77059 6.92786 1.61234 7.18746 1.50433C7.44706 1.39633 7.72545 1.34071 8.00662 1.34067ZM10.4713 6.19533C10.3463 6.07035 10.1767 6.00014 9.99995 6.00014C9.82317 6.00014 9.65363 6.07035 9.52862 6.19533L7.33328 8.39L6.47128 7.52867L6.40862 7.47333C6.27462 7.36973 6.10621 7.32101 5.9376 7.33707C5.76898 7.35313 5.6128 7.43277 5.50078 7.55982C5.38876 7.68686 5.32929 7.85178 5.33446 8.02108C5.33963 8.19038 5.40905 8.35136 5.52862 8.47133L6.86195 9.80467L6.92462 9.86C7.05289 9.9595 7.21305 10.0088 7.37507 9.99859C7.53709 9.98841 7.68982 9.91945 7.80462 9.80467L10.4713 7.138L10.5266 7.07533C10.6261 6.94706 10.6754 6.7869 10.6652 6.62488C10.655 6.46286 10.5861 6.31013 10.4713 6.19533Z"
                                                        fill="#05DF72" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_793_3">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <p class="font-light text-xs text-white">Connected to </p>
                                            <div>
                                                <img class="inline" src="{{ asset('assets/icons/xtb.svg') }}"
                                                    alt="xtb-logo">
                                            </div>
                                        </div>
                                    </template>

                                    <template x-if="$store.robotPage.isExchangeConnecting === true">
                                        <div class="bg-[#1a1a1a] p-2 flex items-center gap-x-1 rounded-full">
                                            <i class="fa-solid fa-circle-notch fa-spin text-[#05df72]"></i>
                                            <p class="font-light text-xs text-white">Connecting to crypto exchange</p>
                                        </div>
                                    </template>

                                    <template x-if="$store.robotPage.isExchangeConnecting === false">
                                        <div class="bg-[#1a1a1a] p-2 flex items-center gap-x-1 rounded-full">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_793_3)">
                                                    <path
                                                        d="M8.00662 1.34067C8.52514 1.3407 9.0259 1.52958 9.41528 1.872L9.51795 1.96867L9.98328 2.434C10.111 2.56088 10.2778 2.64097 10.4566 2.66133L10.5466 2.66667H11.2133C11.7581 2.66664 12.2823 2.87505 12.6783 3.24916C13.0744 3.62327 13.3123 4.13474 13.3433 4.67867L13.3466 4.8V5.46667C13.3466 5.64667 13.4079 5.822 13.5186 5.962L13.5786 6.02867L14.0433 6.494C14.4284 6.87697 14.653 7.39241 14.6712 7.93525C14.6894 8.47808 14.4999 9.00742 14.1413 9.41533L14.0446 9.518L13.5793 9.98333C13.4524 10.111 13.3723 10.2778 13.3519 10.4567L13.3466 10.5467V11.2133C13.3466 11.7581 13.1382 12.2823 12.7641 12.6784C12.39 13.0744 11.8785 13.3123 11.3346 13.3433L11.2133 13.3467H10.5466C10.3669 13.3467 10.1924 13.4073 10.0513 13.5187L9.98462 13.5787L9.51928 14.0433C9.13632 14.4285 8.62087 14.6531 8.07804 14.6713C7.5352 14.6895 7.00586 14.4999 6.59795 14.1413L6.49528 14.0447L6.02995 13.5793C5.90224 13.4525 5.73548 13.3724 5.55662 13.352L5.46662 13.3467H4.79995C4.25514 13.3467 3.73096 13.1383 3.3349 12.7642C2.93885 12.3901 2.70094 11.8786 2.66995 11.3347L2.66662 11.2133V10.5467C2.66656 10.3669 2.60597 10.1924 2.49462 10.0513L2.43462 9.98467L1.96995 9.51933C1.5848 9.13637 1.36023 8.62092 1.34202 8.07809C1.32381 7.53526 1.51333 7.00592 1.87195 6.598L1.96862 6.49533L2.43395 6.03C2.56082 5.90229 2.64092 5.73553 2.66128 5.55667L2.66662 5.46667V4.8L2.66995 4.67867C2.69972 4.15563 2.9209 3.66183 3.29134 3.29139C3.66178 2.92095 4.15558 2.69977 4.67862 2.67L4.79995 2.66667H5.46662C5.64636 2.66661 5.82085 2.60602 5.96195 2.49467L6.02862 2.43467L6.49395 1.97C6.69217 1.77059 6.92786 1.61234 7.18746 1.50433C7.44706 1.39633 7.72545 1.34071 8.00662 1.34067ZM10.4713 6.19533C10.3463 6.07035 10.1767 6.00014 9.99995 6.00014C9.82317 6.00014 9.65363 6.07035 9.52862 6.19533L7.33328 8.39L6.47128 7.52867L6.40862 7.47333C6.27462 7.36973 6.10621 7.32101 5.9376 7.33707C5.76898 7.35313 5.6128 7.43277 5.50078 7.55982C5.38876 7.68686 5.32929 7.85178 5.33446 8.02108C5.33963 8.19038 5.40905 8.35136 5.52862 8.47133L6.86195 9.80467L6.92462 9.86C7.05289 9.9595 7.21305 10.0088 7.37507 9.99859C7.53709 9.98841 7.68982 9.91945 7.80462 9.80467L10.4713 7.138L10.5266 7.07533C10.6261 6.94706 10.6754 6.7869 10.6652 6.62488C10.655 6.46286 10.5861 6.31013 10.4713 6.19533Z"
                                                        fill="#05DF72" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_793_3">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <p class="font-light text-xs text-white">Connected to </p>
                                            <div>
                                                <img class="inline" src="{{ asset('assets/icons/bybit.svg') }}"
                                                    alt="bybit-logo">
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div class="mb-0">
                                    <p class="text-white font-semibold text-xl mb-4">Opening with:</p>
                                </div>
                                <div>
                                    <p class="text-white text-sm"><b>Amount</b>: @money(floatval($this->amount))</p>
                                    <p class="text-white text-sm"><b>Account</b>: {{ $this->accountType }}</p>
                                    <p class="text-white text-sm"><b>Trading Strategy</b>:
                                        {{ $this->strategy['name'] }}</p>
                                </div>
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
        $wire.on('robot-stopped', (event) => {
            const robotStoppedToastMarkup = `
                <div class="flex items-start p-4">
                    <div class="shrink-0">
                        <svg class="shrink-0 size-4 text-teal-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big-icon lucide-circle-check-big"><path d="M21.801 10A10 10 0 1 1 17 3.335"/><path d="m9 11 3 3L22 4"/></svg>
                    </div>
                    <div class="ms-3 flex-1">
                        <p class="text-xs font-semibold text-white">${event.message}</p>
                    </div>
                </div>
            `;

            Toastify({
                text: robotStoppedToastMarkup,
                className: "hs-toastify-on:opacity-100 opacity-0 absolute top-0 start-1/2 -translate-x-1/2 z-90 w-4/5 md:w-1/2 lg:w-1/4 transition-all duration-300 bg-[#26252a] text-sm text-white rounded-xl shadow-lg [&>.toast-close]:hidden",
                duration: 4000,
                close: true,
                escapeMarkup: false
            }).showToast();
        });
    </script>
@endscript


<script>
    function toastRobotError(message) {
        const robotErrorToastMarkup = `
            <div class="flex items-center p-4">
                <div class="shrink-0">
                    <svg class="shrink-0 size-4 text-red-500" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-alert-icon lucide-shield-alert"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="M12 8v4"/><path d="M12 16h.01"/></svg>
                </div>
                <div class="ms-3 flex-1">
                    <p class="text-xs font-semibold text-white">${message}</p>
                </div>
            </div>
        `;

        Toastify({
            text: robotErrorToastMarkup,
            className: "hs-toastify-on:opacity-100 opacity-0 absolute top-0 start-1/2 -translate-x-1/2 z-90 w-4/5 md:w-1/2 lg:w-1/4 transition-all duration-300 bg-[#26252a] text-sm text-white rounded-xl shadow-lg [&>.toast-close]:hidden",
            duration: 4000,
            close: true,
            escapeMarkup: false
        }).showToast();
    }

    document.addEventListener('alpine:init', () => {
        Alpine.store('robotPage', {
            isStartRobotConfirmationModalOpen: false,

            isBrokerConnecting: true,

            isExchangeConnecting: true,

            toggleStartRobotConfirmationModal(wire) {
                if (wire.accountStatus === 'inactive') {
                    toastRobotError(
                        'This account has been disabled and unable to perform any transactions. Kindly contact support for more details.'
                    );
                }

                if (wire.amount === '') {
                    toastRobotError('Amount field is empty');
                }

                if (parseInt(wire.amount) === 0) {
                    toastRobotError('Amount must be greater than 0');
                }

                if (parseFloat(wire.amount) < parseInt(wire.minimumAmount) && parseFloat(wire
                        .amount) !== 0) {
                    let message = `Minimum amount is $${wire.minimumAmount}`;
                    toastRobotError(message);
                }

                if (parseFloat(wire.amount) > parseFloat(wire.accountBalance / 100)) {
                    toastRobotError('Insufficient balance');
                }

                if (wire.activeBotCount > 0) {
                    toastRobotError('Bot is still trading');
                }

                this.isStartRobotConfirmationModalOpen = !this.isStartRobotConfirmationModalOpen;

                setTimeout(() => {
                    this.isBrokerConnecting = false;
                }, 1500);

                setTimeout(() => {
                    this.isExchangeConnecting = false;
                }, 3000);

                setTimeout(() => {
                    wire.startRobot();
                }, 5000);
            }
        })
    })
</script>
