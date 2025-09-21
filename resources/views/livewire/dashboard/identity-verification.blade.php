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
                                <div class="flex items-center gap-x-0.5">
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
                                    <p class="text-sm text-green-500 font-bold">Verified</p>
                                </div>
                            @endif
                        </div>
                        <div class="flex-none">
                            @if ($this->kycStatus === 'Unverified')
                                <a href="{{ route('dashboard.kyc') }}">
                                    <button type="button"
                                        class="w-full px-6 py-2 cursor-pointer inline-flex items-center justify-center gap-x-1 text-sm font-semibold rounded-lg bg-orange-500 text-white focus:outline-hidden">
                                        Verify Now
                                    </button>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                @if ($this->kycStatus === 'Unverified')
                <div class="p-3 mt-3 bg-dim rounded-lg border border-[#323335]">
                    <h2 class="text-white text-sm font-bold mb-2">Withdrawal Limits</h2>
                    <div class="flex items-center gap-x-2">
                        <div class="flex-1">
                            <div class="w-full py-2 px-4 lg:px-10 bg-dim rounded-lg border border-[#323335]">
                                <p class="text-[10px] text-yellow-500">Unverified</p>
                                <p class="text-xs text-white">$1,000,000 in 24 hours</p>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="w-full py-2 px-4 lg:px-10 bg-dim rounded-lg border border-[#323335]">
                                <p class="text-[10px] text-green-500">Verified</p>
                                <p class="text-xs text-white">Unlimited</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="p-3 mt-3 bg-dim rounded-lg border border-[#323335]">
                    <h2 class="text-white text-sm font-bold mb-3">Benefits of Verification</h2>
                    <ul class="space-y-3 text-xs">
                        <li class="flex items-center gap-x-3">
                            <svg class="shrink-0 size-4 mt-0.5 text-accent" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-white">
                                Unlimited withdrawal & trading limits
                            </span>
                        </li>

                        <li class="flex items-center gap-x-3">
                            <svg class="shrink-0 size-4 mt-0.5 text-accent" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-white">
                                Access to all features
                            </span>
                        </li>

                        <li class="flex items-center gap-x-3">
                            <svg class="shrink-0 size-4 mt-0.5 text-accent" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-white">
                                Exclusive early access to new features
                            </span>
                        </li>

                        <li class="flex items-center gap-x-3">
                            <svg class="shrink-0 size-4 mt-0.5 text-accent" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-white">
                                Enhanced account security
                            </span>
                        </li>

                        <li class="flex items-center gap-x-3">
                            <svg class="shrink-0 size-4 mt-0.5 text-accent" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-white">
                                Higher daily profit potential
                            </span>
                        </li>

                        <li class="flex items-center gap-x-3">
                            <svg class="shrink-0 size-4 mt-0.5 text-accent" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-white">
                                Verified badge on your account
                            </span>
                        </li>

                        <li class="flex items-center gap-x-3">
                            <svg class="shrink-0 size-4 mt-0.5 text-accent" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-white">
                                Exclusive deposit promotions & loyalty perks
                            </span>
                        </li>

                        <li class="flex items-center gap-x-3">
                            <svg class="shrink-0 size-4 mt-0.5 text-accent" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-white">
                                24/7 priority support
                            </span>
                        </li>

                        <li class="flex items-center gap-x-3">
                            <svg class="shrink-0 size-4 mt-0.5 text-accent" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-white">
                                Regulatory protection
                            </span>
                        </li>

                        <li class="flex items-center gap-x-3">
                            <svg class="shrink-0 size-4 mt-0.5 text-accent" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                            <span class="text-white">
                                Extra referral rewards and bonuses
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
