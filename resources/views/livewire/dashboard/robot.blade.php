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

            <div class="flex items-center mb-3 mt-4 sticky top-0 bg-dashboard z-10 py-2 lg:pt-4">
                <div class="flex-1">
                    <h1 class="text-white text-lg md:text-xl lg:text-2xl font-bold tracking-[0.15px]">Robot Settings
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
                <div class="grid grid-cols-2 gap-x-2 mb-6">
                    <div>
                        <label for="input-label" class="block text-xs font-medium mb-2 text-zinc-300">Amount</label>
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

                    <div>
                        <label for="input-label" class="block text-xs font-medium mb-2 text-zinc-300">Account</label>
                        <div class="flex-1 md:flex-none relative">
                            <div x-on:click="$store.robotPage.toggleTradingAccountSelect()"
                                class="flex items-center space-x-3 py-2.5 sm:py-3 px-4 border border-[#26252a] bg-transparent rounded-lg text-[#FFFFFF]">
                                <div class="flex-1">
                                    <p x-text="$wire.accountType" class="text-sm"></p>
                                </div>
                                <div class="flex-none justify-self-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-chevron-down-icon lucide-chevron-down">
                                        <path d="m6 9 6 6 6-6" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="relative z-20">
                            <div x-cloak x-show="$store.robotPage.isTradingAccountSelectOpen"
                                @click.outside="$store.robotPage.isTradingAccountSelectOpen = false"
                                class="border border-[#26252a] bg-[#26252a] absolute rounded-lg w-full overflow-scroll scrollbar-hide p-2 mt-1">
                                <div wire:click="selectAccountType('Demo account', 'demo')"
                                    x-on:click="$store.robotPage.isTradingAccountSelectOpen = false"
                                    class="hover:bg-gray-600 cursor-pointer flex items-center space-x-3 px-4 py-2 rounded-lg text-[#FFFFFF]">
                                    <div class="flex-1">
                                        <p class="text-sm">Demo Account</p>
                                    </div>
                                    <div class="flex-none">
                                        <div x-show="$wire.accountTypeSlug === 'demo'"
                                            class="size-2 bg-green-600 rounded-full"></div>
                                    </div>
                                </div>
                                <div wire:click="selectAccountType('Live account', 'live')"
                                    x-on:click="$store.robotPage.isTradingAccountSelectOpen = false"
                                    class="hover:bg-gray-600 cursor-pointer flex items-center space-x-3 px-4 py-2 rounded-lg text-[#FFFFFF]">
                                    <div class="flex-1">
                                        <p class="text-sm">Live Account</p>
                                    </div>
                                    <div class="flex-none">
                                        <div x-show="$wire.accountTypeSlug === 'live'"
                                            class="size-2 bg-green-600 rounded-full"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <label for="steps-range-slider-usage" class="sr-only">Example range</label>
                    <input type="range" wire:model="amount" wire:change.debounce.300ms="calculateProfitExpected"
                        class="w-full bg-transparent cursor-pointer appearance-none disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden
                        [&::-webkit-slider-thumb]:w-4
                        [&::-webkit-slider-thumb]:h-4
                        [&::-webkit-slider-thumb]:-mt-1.5
                        [&::-webkit-slider-thumb]:appearance-none
                        [&::-webkit-slider-thumb]:bg-accent
                        [&::-webkit-slider-thumb]:rounded-full
                        [&::-webkit-slider-thumb]:transition-all
                        [&::-webkit-slider-thumb]:duration-150
                        [&::-webkit-slider-thumb]:ease-in-out
                        

                        [&::-moz-range-thumb]:w-4
                        [&::-moz-range-thumb]:h-4
                        [&::-moz-range-thumb]:appearance-none
                        [&::-moz-range-thumb]:bg-accent
                        [&::-moz-range-thumb]:rounded-full
                        [&::-moz-range-thumb]:transition-all
                        [&::-moz-range-thumb]:duration-150
                        [&::-moz-range-thumb]:ease-in-out

                        [&::-webkit-slider-runnable-track]:w-full
                        [&::-webkit-slider-runnable-track]:h-0.5
                        [&::-webkit-slider-runnable-track]:bg-accent
                        [&::-webkit-slider-runnable-track]:rounded-full
                        

                        [&::-moz-range-track]:w-full
                        [&::-moz-range-track]:h-0.5
                        [&::-moz-range-track]:bg-accent
                        [&::-moz-range-track]:rounded-full"
                        id="steps-range-slider-usage" aria-orientation="horizontal" min="0" max="10000000"
                        step="500">
                </div>

                <div class="mb-6">
                    <label for="input-label" class="block text-xs font-medium mb-2 text-zinc-300">Expected
                        Profit</label>
                    <div class="flex items-center gap-x-2 mb-6">
                        <div class="flex-1 text-sm text-white rounded-lg bg-[#26252a] border border-[#393841] p-2"
                            role="alert" tabindex="-1" aria-labelledby="hs-with-description-label">
                            <div class="flex items-center">
                                <div class="shrink-0 text-green-400">
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-currency-dollar">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                        <path d="M12 3v3m0 12v3" />
                                    </svg> --}}
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
                                <div>
                                    <input type="text" wire:model="expectedProfitMin"
                                        class="bg-transparent text-white text-sm font-bold block w-full rounded-lg sm:text-sm focus:outline-0"
                                        placeholder="" readonly>
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex-none text-sm text-white rounded-md bg-[#26252a] border border-[#393841] py-0.5 px-2">
                            <p> - </p>
                        </div>
                        <div class="flex-1 text-sm text-white rounded-lg bg-[#26252a] border border-[#393841] p-2"
                            role="alert" tabindex="-1" aria-labelledby="hs-with-description-label">
                            <div class="flex items-center">
                                <div class="shrink-0 text-green-400">
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-currency-dollar">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                        <path d="M12 3v3m0 12v3" />
                                    </svg> --}}
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
                                <div>
                                    <input type="text" wire:model="expectedProfitMax"
                                        class="bg-transparent text-white text-sm font-bold block w-full rounded-lg sm:text-sm focus:outline-0"
                                        placeholder="" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-6 flex items-center space-x-2">
                    <div class="flex-1">
                        <label for="input-label" class="block text-xs font-medium mb-2 text-zinc-300">Duration</label>
                        <input type="text" value="{{ $this->strategy['duration'] }} hrs"
                            class="border border-[#26252a] bg-transparent text-white text-start text-sm py-2.5 sm:py-3 px-4 block w-full rounded-lg sm:text-sm focus:outline-0"
                            placeholder="" readonly>
                    </div>
                    <div class="flex-1">
                        <label for="input-label" class="block text-xs font-medium mb-2 text-zinc-300">Exchange</label>
                        <div
                            class="w-full text-sm self-center text-center border border-[#26252a] bg-transparent py-2.5 sm:py-3 px-4 rounded-lg text-[#FFFFFF] focus:outline-0">
                            <img class="inline" src="{{ asset('assets/icons/binance.svg') }}" alt="binance-logo">
                        </div>
                    </div>
                    <div class="flex-1">
                        <label for="input-label" class="block text-xs font-medium mb-2 text-zinc-300">Broker</label>
                        <div
                            class="border border-[#26252a] bg-transparent w-full text-sm self-center text-center py-2.5 sm:py-3 px-4 rounded-lg text-[#FFFFFF] focus:outline-0">
                            <img class="inline" src="{{ asset('assets/icons/xtb.svg') }}" alt="xtb-logo">
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <label for="input-label" class="block text-xs font-medium mb-2 text-zinc-300">Strategy</label>
                    {{-- <div class="flex-1 md:flex-none relative">
                        <div x-on:click="$store.robotPage.toggleStrategyListOverlay()"
                            class="flex items-start space-x-2 border border-[#26252a] bg-transparent px-4 py-4 rounded-lg text-[#FFFFFF] cursor-pointer">
                            <div class="flex-none w-12">
                                <img class="w-24" src="{{ asset('storage/' . $this->strategy['image_url']) }}"
                                    alt="">
                            </div>
                            <div class="flex-1">
                                <h2 class="font-bold mb-1">
                                    {{ $this->strategy['name'] }}
                                </h2>

                                <div>
                                    <div class="flex items-center gap-x-1">
                                        <svg class="inline" xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" viewBox="0 0 16 16" fill="none">
                                            <g clip-path="url(#clip0_47_16)">
                                                <path d="M4.66675 6.66667H14.0001L11.3334 4" stroke="white"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M11.3333 9.33325H2L4.66667 11.9999" stroke="white"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_47_16">
                                                    <rect width="16" height="16" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <p class="text-[10px] text-zinc-300">
                                            Profit Range: <span>{{ $this->strategy['min_roi'] }}</span>%
                                            to <span>{{ $this->strategy['max_roi'] }}</span>%
                                            in <span>{{ $this->strategy['duration'] }}</span>hrs
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-1">
                                    <div class="flex items-center gap-x-1">
                                        <svg class="inline" xmlns="http://www.w3.org/2000/svg" width="16"
                                            height="16" viewBox="0 0 16 16" fill="none">
                                            <g clip-path="url(#clip0_48_21)">
                                                <path
                                                    d="M11.1334 5.33333C11.0007 4.95683 10.7584 4.62864 10.4376 4.39102C10.1168 4.1534 9.73225 4.01722 9.33341 4H6.66675C6.13631 4 5.62761 4.21071 5.25253 4.58579C4.87746 4.96086 4.66675 5.46957 4.66675 6C4.66675 6.53043 4.87746 7.03914 5.25253 7.41421C5.62761 7.78929 6.13631 8 6.66675 8H9.33341C9.86385 8 10.3726 8.21071 10.7476 8.58579C11.1227 8.96086 11.3334 9.46957 11.3334 10C11.3334 10.5304 11.1227 11.0391 10.7476 11.4142C10.3726 11.7893 9.86385 12 9.33341 12H6.66675C6.26791 11.9828 5.88335 11.8466 5.56257 11.609C5.24178 11.3714 4.99945 11.0432 4.86675 10.6667"
                                                    stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M8 2V4M8 12V14" stroke="white" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_48_21">
                                                    <rect width="16" height="16" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <p class="text-[10px] text-zinc-300">
                                            Minimum Amount: At
                                            least $<span>{{ $this->strategy['min_amount'] }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-none w-4 justify-self-end">
                                <svg class="inline" xmlns="http://www.w3.org/2000/svg" width="14" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-chevron-down-icon lucide-chevron-down">
                                    <path d="m6 9 6 6 6-6" />
                                </svg>
                            </div>
                        </div>
                    </div> --}}
                    <div class="grid space-y-2">
                        @foreach ($this->strategies as $strategy)
                            <label for="hs-vertical-radio-in-form-{{ $strategy['id'] }}"
                                wire:key="strategy-{{ $strategy['id'] }}"
                                wire:click="selectStrategy({{ $strategy['id'] }})"
                                class="flex p-3 gap-x-2 items-center w-full {{ $this->strategy['id'] === $strategy['id'] ? 'border-2 border-blue-500' : 'border border-[#26252a]' }} bg-transparent rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                                <div class="flex-none w-12">
                                    <img class="w-24" src="{{ asset('storage/' . $strategy['image_url']) }}"
                                        alt="">
                                </div>
                                <div class="flex-1">
                                    <h2 class="font-bold mb-1 text-white">
                                        {{ $strategy['name'] }}
                                    </h2>

                                    <div>
                                        <div class="flex items-center gap-x-1">
                                            <svg class="inline" xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" viewBox="0 0 16 16" fill="none">
                                                <g clip-path="url(#clip0_47_16)">
                                                    <path d="M4.66675 6.66667H14.0001L11.3334 4" stroke="white"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M11.3333 9.33325H2L4.66667 11.9999" stroke="white"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_47_16">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <p class="text-[10px] text-zinc-300">
                                                Profit Range: <span>{{ $strategy['min_roi'] }}</span>%
                                                to <span>{{ $strategy['max_roi'] }}</span>%
                                                in <span>{{ $strategy['duration'] }}</span>hrs
                                            </p>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="flex items-center gap-x-1">
                                            <svg class="inline" xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" viewBox="0 0 16 16" fill="none">
                                                <g clip-path="url(#clip0_48_21)">
                                                    <path
                                                        d="M11.1334 5.33333C11.0007 4.95683 10.7584 4.62864 10.4376 4.39102C10.1168 4.1534 9.73225 4.01722 9.33341 4H6.66675C6.13631 4 5.62761 4.21071 5.25253 4.58579C4.87746 4.96086 4.66675 5.46957 4.66675 6C4.66675 6.53043 4.87746 7.03914 5.25253 7.41421C5.62761 7.78929 6.13631 8 6.66675 8H9.33341C9.86385 8 10.3726 8.21071 10.7476 8.58579C11.1227 8.96086 11.3334 9.46957 11.3334 10C11.3334 10.5304 11.1227 11.0391 10.7476 11.4142C10.3726 11.7893 9.86385 12 9.33341 12H6.66675C6.26791 11.9828 5.88335 11.8466 5.56257 11.609C5.24178 11.3714 4.99945 11.0432 4.86675 10.6667"
                                                        stroke="white" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M8 2V4M8 12V14" stroke="white" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_48_21">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <p class="text-[10px] text-zinc-300">
                                                Minimum Amount: At
                                                least $<span>{{ $strategy['min_amount'] }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>


                {{-- <div x-cloak x-show="$store.robotPage.isStrategyListOverlayOpen"
                    class="fixed top-0 left-0 h-svh w-full px-4 lg:px-96 pt-6 z-20 bg-dashboard">
                    <div class="flex items-center mb-6">
                        <div class="flex-1">
                            <h2 class="text-white font-semibold md:text-xl lg:text-2xl">Strategy</h2>
                        </div>
                        <div class="flex-1 text-end">
                            <svg x-on:click="$store.robotPage.toggleStrategyListOverlay()"
                                class="inline cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x-icon lucide-x">
                                <path d="M18 6 6 18" />
                                <path d="m6 6 12 12" />
                            </svg>
                        </div>
                    </div>

                    <div>
                        @foreach ($this->strategies as $strategy)
                            <div wire:key="strategy-{{ $strategy['id'] }}"
                                wire:click="selectStrategy({{ $strategy['id'] }})"
                                x-on:click="$store.robotPage.isStrategyListOverlayOpen = false"
                                class="flex items-start space-x-2 border border-[#26252a] bg-transparent mb-3 px-4 py-4 rounded-lg text-[#FFFFFF] cursor-pointer">
                                <div class="flex-none w-12">
                                    <img class="w-24" src="{{ asset('storage/' . $strategy['image_url']) }}"
                                        alt="">
                                </div>
                                <div class="flex-1">
                                    <h2 class="font-bold mb-1">
                                        {{ $strategy['name'] }}
                                    </h2>

                                    <div>
                                        <div class="flex items-center gap-x-1">
                                            <svg class="inline" xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" viewBox="0 0 16 16" fill="none">
                                                <g clip-path="url(#clip0_47_16)">
                                                    <path d="M4.66675 6.66667H14.0001L11.3334 4" stroke="white"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M11.3333 9.33325H2L4.66667 11.9999" stroke="white"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_47_16">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <p class="text-[10px] text-zinc-300">
                                                Profit Range: <span>{{ $strategy['min_roi'] }}</span>%
                                                to <span>{{ $strategy['max_roi'] }}</span>%
                                                in <span>{{ $strategy['duration'] }}</span>hrs
                                            </p>
                                        </div>
                                    </div>

                                    <div class="mt-1">
                                        <div class="flex items-center gap-x-1">
                                            <svg class="inline" xmlns="http://www.w3.org/2000/svg" width="16"
                                                height="16" viewBox="0 0 16 16" fill="none">
                                                <g clip-path="url(#clip0_48_21)">
                                                    <path
                                                        d="M11.1334 5.33333C11.0007 4.95683 10.7584 4.62864 10.4376 4.39102C10.1168 4.1534 9.73225 4.01722 9.33341 4H6.66675C6.13631 4 5.62761 4.21071 5.25253 4.58579C4.87746 4.96086 4.66675 5.46957 4.66675 6C4.66675 6.53043 4.87746 7.03914 5.25253 7.41421C5.62761 7.78929 6.13631 8 6.66675 8H9.33341C9.86385 8 10.3726 8.21071 10.7476 8.58579C11.1227 8.96086 11.3334 9.46957 11.3334 10C11.3334 10.5304 11.1227 11.0391 10.7476 11.4142C10.3726 11.7893 9.86385 12 9.33341 12H6.66675C6.26791 11.9828 5.88335 11.8466 5.56257 11.609C5.24178 11.3714 4.99945 11.0432 4.86675 10.6667"
                                                        stroke="white" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M8 2V4M8 12V14" stroke="white" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_48_21">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <p class="text-[10px] text-zinc-300">
                                                Minimum Amount: At
                                                least $<span>{{ $strategy['min_amount'] }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div> --}}

                <div class="text-sm text-white rounded-lg bg-[#26252a] p-4 mb-6 mt-3" role="alert" tabindex="-1"
                    aria-labelledby="hs-with-description-label">
                    <div class="flex items-center">
                        <div class="shrink-0 text-green-400">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="currentColor"
                                class="icon icon-tabler icons-tabler-filled icon-tabler-info-square-rounded">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 2l.642 .005l.616 .017l.299 .013l.579 .034l.553 .046c4.687 .455 6.65 2.333 7.166 6.906l.03 .29l.046 .553l.041 .727l.006 .15l.017 .617l.005 .642l-.005 .642l-.017 .616l-.013 .299l-.034 .579l-.046 .553c-.455 4.687 -2.333 6.65 -6.906 7.166l-.29 .03l-.553 .046l-.727 .041l-.15 .006l-.617 .017l-.642 .005l-.642 -.005l-.616 -.017l-.299 -.013l-.579 -.034l-.553 -.046c-4.687 -.455 -6.65 -2.333 -7.166 -6.906l-.03 -.29l-.046 -.553l-.041 -.727l-.006 -.15l-.017 -.617l-.004 -.318v-.648l.004 -.318l.017 -.616l.013 -.299l.034 -.579l.046 -.553c.455 -4.687 2.333 -6.65 6.906 -7.166l.29 -.03l.553 -.046l.727 -.041l.15 -.006l.617 -.017c.21 -.003 .424 -.005 .642 -.005zm0 9h-1l-.117 .007a1 1 0 0 0 0 1.986l.117 .007v3l.007 .117a1 1 0 0 0 .876 .876l.117 .007h1l.117 -.007a1 1 0 0 0 .876 -.876l.007 -.117l-.007 -.117a1 1 0 0 0 -.764 -.857l-.112 -.02l-.117 -.006v-3l-.007 -.117a1 1 0 0 0 -.876 -.876l-.117 -.007zm.01 -3l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007z" />
                            </svg>
                            </svg>
                        </div>
                        <div class="ms-2">
                            <h3 id="hs-with-description-label" class="text-xs font-semibold">
                                Profit & Capital
                            </h3>
                            <div class="mt-1 text-[11px] text-zinc-300">
                                Profit is generated every 5 mins and capital is returned after every trading session.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sticky bottom-2">
                    <a x-on:click="$store.robotPage.toggleStartRobotConfirmationModal()">
                        <button type="button" wire:loading.attr="disabled"
                            class="py-2.5 cursor-pointer px-4 w-full md:px-6 text-center gap-x-2 text-sm font-semibold rounded-lg bg-accent text-white focus:outline-hidden disabled:opacity-50 disabled:pointer-events-none">
                            <i wire:loading class="fa-solid fa-circle-notch fa-spin"></i>
                            <span wire:loading.remove>Start robot</span>
                        </button>
                    </a>
                </div>

                <div x-cloak x-show="$store.robotPage.isStartRobotConfirmationModalOpen"
                    class="fixed top-0 left-0 h-svh w-full px-4 lg:px-96 pt-6 z-20 bg-dashboard">
                    <div class="w-full h-full flex items-center justify-center">
                        <div class="max-w-sm mx-auto bg-[#26252a] rounded-2xl pointer-events-auto">
                            <div class="p-6 overflow-y-auto text-start">
                                <div class="flex justify-center mb-8">
                                    <div
                                        class="size-18 flex items-center justify-center rounded-full border-3 border-[#05df72]">
                                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_771_34)">
                                                <path
                                                    d="M8 14C8 13.4696 8.21071 12.9609 8.58579 12.5858C8.96086 12.2107 9.46957 12 10 12H14C14.5304 12 15.0391 12.2107 15.4142 12.5858C15.7893 12.9609 16 13.4696 16 14V20C16 20.5304 15.7893 21.0391 15.4142 21.4142C15.0391 21.7893 14.5304 22 14 22H10C9.46957 22 8.96086 21.7893 8.58579 21.4142C8.21071 21.0391 8 20.5304 8 20V14Z"
                                                    stroke="white" stroke-width="4" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M12 8V12" stroke="white" stroke-width="4"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M12 22V40" stroke="white" stroke-width="4"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M20 30C20 29.4696 20.2107 28.9609 20.5858 28.5858C20.9609 28.2107 21.4696 28 22 28H26C26.5304 28 27.0391 28.2107 27.4142 28.5858C27.7893 28.9609 28 29.4696 28 30V36C28 36.5304 27.7893 37.0391 27.4142 37.4142C27.0391 37.7893 26.5304 38 26 38H22C21.4696 38 20.9609 37.7893 20.5858 37.4142C20.2107 37.0391 20 36.5304 20 36V30Z"
                                                    stroke="white" stroke-width="4" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M24 8V28" stroke="white" stroke-width="4"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M24 38V40" stroke="white" stroke-width="4"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path
                                                    d="M32 12C32 11.4696 32.2107 10.9609 32.5858 10.5858C32.9609 10.2107 33.4696 10 34 10H38C38.5304 10 39.0391 10.2107 39.4142 10.5858C39.7893 10.9609 40 11.4696 40 12V20C40 20.5304 39.7893 21.0391 39.4142 21.4142C39.0391 21.7893 38.5304 22 38 22H34C33.4696 22 32.9609 21.7893 32.5858 21.4142C32.2107 21.0391 32 20.5304 32 20V12Z"
                                                    stroke="white" stroke-width="4" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M36 8V10" stroke="white" stroke-width="4"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M36 22V40" stroke="white" stroke-width="4"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_771_34">
                                                    <rect width="48" height="48" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                </div>
                                <p class="text-white font-semibold text-xl mb-4">
                                    You are about to start trading with:
                                </p>
                                <div>
                                    <ul class="list-disc list-inside text-white text-sm">
                                        <li>Strategy: {{ $this->strategy['name'] }}</li>
                                        <li>Trading Duration: 24 hours</li>
                                        <li>Amount: @money(floatval($this->amount))</li>
                                        <li>Expected Profit: {{ '$' . $this->expectedProfitMin }} -
                                            {{ '$' . $this->expectedProfitMax }}</li>
                                    </ul>
                                </div>
                                <div class="mt-6 grid grid-cols-2 gap-x-2">
                                    <div>
                                        <button type="button" wire:click="startRobot()" type="button"
                                            wire:loading.attr="disabled"
                                            class="p-3 w-full text-center text-sm font-semibold rounded-lg border border-transparent bg-accent text-white cursor-pointer hover:bg-accent-hover focus:outline-hidden focus:bg-accent disabled:opacity-50 disabled:pointer-events-none">
                                            Please confirm
                                        </button>
                                    </div>
                                    <div>
                                        <button x-on:click="$store.robotPage.toggleStartRobotConfirmationModal()"
                                            type="button"
                                            class="p-3 w-full text-center text-sm font-semibold rounded-lg border border-white text-white shadow-2xs cursor-pointer focus:outline-hidden disabled:opacity-50 disabled:pointer-events-none">
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
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('robotPage', {
            isStrategyListOverlayOpen: false,

            isTradingAccountSelectOpen: false,

            isStartRobotConfirmationModalOpen: false,

            toggleStartRobotConfirmationModal() {
                this.isStartRobotConfirmationModalOpen = !this.isStartRobotConfirmationModalOpen;
            },

            toggleStrategyListOverlay() {
                this.isStrategyListOverlayOpen = !this.isStrategyListOverlayOpen
            },

            toggleTradingAccountSelect() {
                this.isTradingAccountSelectOpen = !this.isTradingAccountSelectOpen
            }
        })
    })
</script>

@script
    <script>
        $wire.on('robot-error', (event) => {
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
                className: "hs-toastify-on:opacity-100 opacity-0 absolute top-0 start-1/2 -translate-x-1/2 z-90 w-4/5 md:w-1/2 lg:w-1/4 transition-all duration-300 bg-[#26252a] text-sm text-white rounded-xl shadow-lg [&>.toast-close]:hidden",
                duration: 4000,
                close: true,
                escapeMarkup: false
            }).showToast();
        });

        $wire.on('zero-amount-robot-error', (event) => {
            const toastMarkup = `
                <div class="flex items-start p-4">
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
                className: "hs-toastify-on:opacity-100 opacity-0 absolute top-0 start-1/2 -translate-x-1/2 z-90 w-4/5 md:w-1/2 lg:w-1/4 transition-all duration-300 bg-[#26252a] text-sm text-white rounded-xl shadow-lg [&>.toast-close]:hidden",
                duration: 4000,
                close: true,
                escapeMarkup: false
            }).showToast();
        });

        $wire.on('robot-stopped', (event) => {
            const toastMarkup = `
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
                text: toastMarkup,
                className: "hs-toastify-on:opacity-100 opacity-0 absolute top-0 start-1/2 -translate-x-1/2 z-90 w-4/5 md:w-1/2 lg:w-1/4 transition-all duration-300 bg-[#26252a] text-sm text-white rounded-xl shadow-lg [&>.toast-close]:hidden",
                duration: 4000,
                close: true,
                escapeMarkup: false
            }).showToast();
        });
    </script>
@endscript
