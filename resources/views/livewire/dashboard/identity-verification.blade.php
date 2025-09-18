<div class="px-4 lg:px-0 h-full">
    <div class="lg:flex lg:h-full">
        <livewire:dashboard.partials.desktop-navbar />
        <div class="lg:h-full lg:flex-1 lg:px-96 lg:pt-6">
            <div class="my-3 sticky top-0 bg-dashboard pb-2 lg:pt-4">
                <h1 class="text-white text-lg md:text-xl lg:text-2xl font-semibold">Identity Verification</h1>
            </div>
            <div class="lg:h-full lg:pb-24 lg:overflow-scroll scrollbar-hide">
                <div class="px-4 py-5 bg-dim rounded-lg border border-[#323335]">
                    <div class="flex items-center space-x-2 -mt-0.5">
                        <div class="grow">
                            <p class="text-[10px] text-[#a4a4a4]">Current Status </p>
                            @if ($this->kycStatus === 'Unverified')
                                <p class="text-sm text-yellow-500 font-bold">Unverified</p>
                            @endif
                            @if ($this->kycStatus === 'Verified')
                                <p class="text-sm text-green-500 font-bold">Verified</p>
                            @endif
                        </div>
                        <div class="flex-none">
                            <a href="{{ route('dashboard.kyc') }}">
                                <button type="button"
                                    class="w-full px-6 py-2 cursor-pointer inline-flex items-center justify-center gap-x-1 text-sm font-semibold rounded-lg bg-accent text-white focus:outline-hidden">
                                    Verify Now
                                </button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="p-2 mt-3 mb-4 bg-dim rounded-lg border border-[#323335]">
                    <h2 class="text-white text-sm font-bold mb-2">Trading Limits</h2>
                    <div class="flex items-center gap-x-2">
                        <div class="flex-1">
                            <div class="w-full py-2 px-4 lg:px-10 bg-dim rounded-lg border border-[#323335]">
                                <p class="text-[10px] text-yellow-500">Unverified</p>
                                <p class="text-xs text-white">Up to $1,000,000</p>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="w-full py-2 px-4 lg:px-10 bg-dim rounded-lg border border-[#323335]">
                                <p class="text-[10px] text-green-500">Verified</p>
                                <p class="text-xs text-white">Up to $2,000,000+</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-white text-sm font-bold mb-3">Benefits of Verification</h2>
                    <ul class="space-y-3 text-xs">
                        <li class="flex items-center gap-x-3">
                            <svg class="shrink-0 size-4 mt-0.5 text-accent"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-white">
                                Higher trading limits
                            </span>
                        </li>

                        <li class="flex items-center gap-x-3">
                            <svg class="shrink-0 size-4 mt-0.5 text-accent"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-white">
                                Faster withdrawals
                            </span>
                        </li>

                        <li class="flex items-center gap-x-3">
                            <svg class="shrink-0 size-4 mt-0.5 text-accent"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-white">
                                Enhanced account security
                            </span>
                        </li>

                        <li class="flex items-center gap-x-3">
                            <svg class="shrink-0 size-4 mt-0.5 text-accent"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-white">
                                Access to all features
                            </span>
                        </li>

                        <li class="flex items-center gap-x-3">
                            <svg class="shrink-0 size-4 mt-0.5 text-accent"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-white">
                                Compliance with global standards
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
