<div x-data class="px-4 lg:px-0 h-full">
    <div class="lg:flex lg:h-full">
        <livewire:dashboard.partials.desktop-navbar />
        <div class="lg:h-full lg:flex-1 lg:px-96 lg:pt-6">
            <div class="my-3 sticky top-0 bg-dashboard z-10 pb-2 lg:pt-4">
                <h1 class="text-white mb-2 text-lg md:text-xl lg:text-2xl font-semibold">Verify Your Identity</h1>
                <p class="text-zinc-300 text-xs">For your security and to uniock full access, please complete your
                    verification.</p>
            </div>
            <div class="lg:h-full lg:pb-24 lg:overflow-scroll scrollbar-hide">
                <div class="mb-5 flex gap-x-3 items-center">
                    <div class="flex-none">
                        @if ($this->kycStatus === 'Unverified')
                            <span
                                class="inline-flex items-center gap-x-1.5 py-1 px-2 rounded-lg text-xs font-semibold bg-red-100 text-red-800">
                                <div class="size-3 rounded-full bg-red-500"></div>Unverified
                            </span>
                        @endif
                        @if ($this->kycStatus === 'Verified')
                            <span
                                class="inline-flex items-center gap-x-1.5 py-1 px-2 rounded-lg text-xs font-semibold bg-green-100 text-green-800">
                                <div class="size-3 rounded-full bg-green-500"></div>Verified
                            </span>
                        @endif
                    </div>
                    <div class="flex-1">
                        <p class="text-xs text-white">Your current verification level: ({{ $this->kycStatus }})</p>
                    </div>
                </div>

                <div class="mb-5">
                    <label for="input-label" class="block text-sm font-medium mb-2 text-zinc-300">Full name (as it
                        appears
                        on your ID)</label>
                    <div class="relative">
                        <input wire:model="fullname" type="text"
                            class="text-white border border-[#26252a] bg-transparent text-sm peer py-2.5 sm:py-3 px-4 ps-4 block w-full rounded-lg sm:text-sm focus:outline-0"
                            placeholder="">
                    </div>
                </div>

                <div class="mb-5">
                    <label for="input-label" class="block text-sm font-medium mb-2 text-zinc-300">Date of Birth</label>
                    <div class="relative">
                        <input wire:model="dob" type="date"
                            class="text-white border border-[#26252a] bg-transparent text-sm peer py-2.5 sm:py-3 px-4 ps-4 block w-full rounded-lg sm:text-sm focus:outline-0"
                            placeholder="">
                    </div>
                </div>

                <div class="mb-5">
                    <label for="input-label" class="block text-sm font-medium mb-2 text-zinc-300">Nationality</label>
                    <div class="flex-1 md:flex-none relative">
                        <div x-on:click="$store.kycPage.toggleCountrySelect()"
                            class="flex items-center space-x-3 py-3 px-4 border border-[#26252a] bg-transparent rounded-lg text-[#FFFFFF]">
                            <div class="flex-1">
                                <p class="text-sm">{{ $this->selectedCountry }}</p>
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

                    <div class="relative">
                        <div x-cloak x-show="$store.kycPage.isCountrySelectOpen"
                            @click.outside="$store.kycPage.isCountrySelectOpen = false"
                            class="border border-[#26252a] bg-dim absolute rounded-lg w-full h-72 overflow-scroll scrollbar-hide z-10 p-2 mt-1">
                            @foreach ($this->countriesList as $isoCode => $countryName)
                                <div wire:key="country-{{ $isoCode }}"
                                    wire:click="selectCountry('{{ $countryName }}')"
                                    x-on:click="$store.kycPage.isCountrySelectOpen = false"
                                    class="hover:bg-[#3b3a41] cursor-pointer flex items-center space-x-3 px-4 py-2 rounded-md text-[#FFFFFF]">
                                    <div class="flex-1">
                                        <p class="text-sm">{{ $countryName }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="mb-5">
                    <label for="input-label" class="block text-sm font-medium mb-2 text-zinc-300">Upload
                        Government-Issued
                        ID</label>
                    <div class="relative">
                        <div class="flex items-center gap-x-1">
                            <div>
                                <label for="file-upload"
                                    class="inline-flex items-center gap-x-1 bg-[#3b71ff] text-white text-xs p-2 rounded-lg cursor-pointer">
                                    <div class="-mt-0.5">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.16494 2.33337C8.3754 2.33337 8.58194 2.3903 8.76269 2.49813C8.94343 2.60596 9.09163 2.76067 9.1916 2.94587L9.4751 3.47087C9.57507 3.65608 9.72328 3.81079 9.90402 3.91862C10.0848 4.02645 10.2913 4.08338 10.5018 4.08337H11.6667C11.9761 4.08337 12.2729 4.20629 12.4916 4.42508C12.7104 4.64388 12.8334 4.94062 12.8334 5.25004V10.5C12.8334 10.8095 12.7104 11.1062 12.4916 11.325C12.2729 11.5438 11.9761 11.6667 11.6667 11.6667H2.33335C2.02393 11.6667 1.72719 11.5438 1.5084 11.325C1.2896 11.1062 1.16669 10.8095 1.16669 10.5V5.25004C1.16669 4.94062 1.2896 4.64388 1.5084 4.42508C1.72719 4.20629 2.02393 4.08337 2.33335 4.08337H3.49827C3.70852 4.08339 3.91486 4.02658 4.09548 3.91897C4.27609 3.81136 4.42428 3.65694 4.52435 3.47204L4.8096 2.94471C4.90968 2.75981 5.05786 2.60539 5.23848 2.49778C5.4191 2.39017 5.62544 2.33336 5.83569 2.33337H8.16494Z"
                                            stroke="white" stroke-width="1.33333" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M7 9.33337C7.9665 9.33337 8.75 8.54987 8.75 7.58337C8.75 6.61688 7.9665 5.83337 7 5.83337C6.0335 5.83337 5.25 6.61688 5.25 7.58337C5.25 8.54987 6.0335 9.33337 7 9.33337Z"
                                            stroke="white" stroke-width="1.33333" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    </div>
                                    <span>Upload ID</span>
                                </label>
                            </div>
                            <div wire:loading wire:target="id">
                                <i class="fa-solid fa-circle-notch fa-spin text-gray-400"></i>
                                <span class="text-xs text-gray-400" wire:loading.remove>Uploading...</span>
                            </div>
                        </div>

                        <input id="file-upload" type="file" wire:model="id" class="hidden" placeholder="" />

                        <div class="mt-2 text-xs text-gray-400">
                            <span x-text="document.getElementById('file-upload').files[0]?.name || ''"></span>
                        </div>
                    </div>
                </div>

                <div>
                    <a wire:click="submitKYCApplication()">
                        <button type="button" wire:loading.attr="disabled"
                            class="py-2.5 cursor-pointer px-4 w-full md:px-6 text-center gap-x-2 text-sm font-semibold rounded-lg bg-accent text-white focus:outline-hidden disabled:opacity-50 disabled:pointer-events-none">
                            <i wire:loading class="fa-solid fa-circle-notch fa-spin"></i>
                            <span wire:loading.remove>Get Verified</span>
                        </button>
                    </a>
                </div>

                <div class="flex items-center gap-x-2 p-3 my-3 bg-dim rounded-lg border border-[#323335]">
                    <div class="flex-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-lock-keyhole-icon lucide-lock-keyhole">
                            <circle cx="12" cy="16" r="1" />
                            <rect x="3" y="10" width="18" height="12" rx="2" />
                            <path d="M7 10V7a5 5 0 0 1 10 0v3" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-xs text-[#a4a4a4]">
                            Your data is encrypted and stored securely; Verification may take 24 hours.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('kycPage', {
            isCountrySelectOpen: false,

            toggleCountrySelect() {
                this.isCountrySelectOpen = !this.isCountrySelectOpen
            }
        })
    })
</script>

@script
    <script>
        $wire.on('error-message', (event) => {
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
                className: "hs-toastify-on:opacity-100 opacity-0 absolute top-0 start-1/2 -translate-x-1/2 z-90 w-4/5 md:w-1/2 lg:w-1/4 transition-all duration-300 bg-dim border border-[#26252a] text-sm text-white rounded-xl shadow-lg [&>.toast-close]:hidden",
                duration: 4000,
                close: true,
                escapeMarkup: false
            }).showToast();
        });

        $wire.on('success-message', (event) => {
            const toastMarkup = `
                <div class="flex items-center p-4">
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
                className: "hs-toastify-on:opacity-100 opacity-0 absolute top-0 start-1/2 -translate-x-1/2 z-90 w-4/5 md:w-1/2 lg:w-1/4 transition-all duration-300 bg-dim border border-[#26252a] text-sm text-white rounded-xl shadow-lg [&>.toast-close]:hidden",
                duration: 8000,
                close: true,
                escapeMarkup: false
            }).showToast();
        });
    </script>
@endscript
