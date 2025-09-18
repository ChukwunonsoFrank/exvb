<div x-data class="px-4 lg:px-0 h-full">
    <div class="lg:flex lg:h-full">
        <livewire:dashboard.partials.desktop-navbar />
        <div class="lg:h-full lg:flex-1 lg:px-96 lg:pt-6">
            <div class="my-3 sticky top-0 bg-dashboard pb-2 lg:pt-4">
                <h1 class="text-white text-lg md:text-xl lg:text-2xl font-semibold">Account</h1>
            </div>
            <div class="lg:h-full lg:pb-24 lg:overflow-scroll scrollbar-hide">

                <div class="flex flex-col gap-y-2 px-2 py-3 bg-dim rounded-lg border border-[#323335]">
                    <div class="flex items-start space-x-4">
                        <div class="flex-none flex justify-center mb-3 lg:justify-start">
                            <div class="bg-[#282828] size-16 rounded-full flex items-center justify-center lg:size-20">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                    viewBox="0 0 48 48" fill="none">
                                    <g clip-path="url(#clip0_49_26)">
                                        <path
                                            d="M6 24C6 26.3638 6.46558 28.7044 7.37017 30.8883C8.27475 33.0722 9.60062 35.0565 11.2721 36.7279C12.9435 38.3994 14.9278 39.7252 17.1117 40.6298C19.2956 41.5344 21.6362 42 24 42C26.3638 42 28.7044 41.5344 30.8883 40.6298C33.0722 39.7252 35.0565 38.3994 36.7279 36.7279C38.3994 35.0565 39.7252 33.0722 40.6298 30.8883C41.5344 28.7044 42 26.3638 42 24C42 21.6362 41.5344 19.2956 40.6298 17.1117C39.7252 14.9278 38.3994 12.9435 36.7279 11.2721C35.0565 9.60062 33.0722 8.27475 30.8883 7.37017C28.7044 6.46558 26.3638 6 24 6C21.6362 6 19.2956 6.46558 17.1117 7.37017C14.9278 8.27475 12.9435 9.60062 11.2721 11.2721C9.60062 12.9435 8.27475 14.9278 7.37017 17.1117C6.46558 19.2956 6 21.6362 6 24Z"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M18 20C18 21.5913 18.6321 23.1174 19.7574 24.2426C20.8826 25.3679 22.4087 26 24 26C25.5913 26 27.1174 25.3679 28.2426 24.2426C29.3679 23.1174 30 21.5913 30 20C30 18.4087 29.3679 16.8826 28.2426 15.7574C27.1174 14.6321 25.5913 14 24 14C22.4087 14 20.8826 14.6321 19.7574 15.7574C18.6321 16.8826 18 18.4087 18 20Z"
                                            fill="white" stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M12.3359 37.698C12.831 36.0505 13.8439 34.6064 15.2244 33.58C16.605 32.5535 18.2796 31.9995 19.9999 32H27.9999C29.7225 31.9994 31.3992 32.5548 32.7807 33.5836C34.1623 34.6123 35.1749 36.0596 35.6679 37.71"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_49_26">
                                            <rect width="48" height="48" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                        <div class="text-start grow">
                            <h1 class="text-white text-base font-bold">{{ auth()->user()->name }}</h1>
                            <div class="flex items-center space-x-2 -mt-1">
                                <div>
                                    <input id="uid" type="text" class="hidden"
                                        value="{{ auth()->user()->uid }}">
                                    <span class="text-xs text-[#a4a4a4]">UID: {{ auth()->user()->uid }}</span>
                                </div>
                                <div>
                                    <button type="button" x-on:click="$store.accountPage.copyUID()"
                                        class="w-full py-0.5 px-2 cursor-pointer inline-flex items-center justify-center text-[10px] font-semibold rounded-full bg-[#282828] border border-[#323335] text-white focus:outline-hidden">
                                        Copy
                                    </button>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2 -mt-0.5">
                                <div class="grow">
                                    <p class="text-[10px] text-yellow-500">KYC: {{ $this->kycStatus }}</p>
                                </div>
                                <div class="flex-none">
                                    @if ($this->kycStatus === 'Unverified')
                                        <a href="{{ route('dashboard.identityverification') }}">
                                            <button type="button"
                                                class="w-full px-3 py-1 cursor-pointer inline-flex items-center justify-center gap-x-1 text-xs font-semibold rounded-lg bg-accent text-white focus:outline-hidden">
                                                Get verified
                                            </button>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="flex-1">
                            <a href="{{ route('dashboard.withdraw') }}">
                                <button type="button"
                                    class="w-full py-2 px-4 lg:px-10 cursor-pointer inline-flex items-center justify-center gap-x-1 text-sm font-semibold rounded-lg bg-accent text-white focus:outline-hidden">
                                    Withdraw
                                </button>
                            </a>
                        </div>
                        <div class="flex-1">
                            <a href="{{ route('dashboard.deposit') }}">
                                <button type="button"
                                    class="w-full py-2 px-4 lg:px-10 cursor-pointer inline-flex items-center justify-center gap-x-1 text-sm font-semibold rounded-lg bg-accent text-white focus:outline-hidden">
                                    Deposit
                                </button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-x-2 p-2 my-3 bg-dim rounded-lg border border-[#323335]">
                    <div class="grow">
                        <h2 class="text-white text-sm font-bold mb-1">Withdrawal Limits</h2>
                        <p class="text-xs text-[#a4a4a4]">Current: Up to $1,000,000 in 24hrs</p>
                    </div>
                    <div class="flex-none">
                        <a href="{{ route('dashboard.identityverification') }}">
                            <button type="button"
                                class="w-full px-3 py-1 cursor-pointer inline-flex items-center justify-center gap-x-1 text-xs font-semibold rounded-lg bg-accent text-white focus:outline-hidden">
                                Upgrade
                            </button>
                        </a>
                    </div>
                </div>


                <div class="mb-3 lg:grid lg:grid-cols-2 lg:gap-4">
                    <a href="{{ route('dashboard.transactions') }}">
                        <div
                            class="bg-dim w-full rounded-lg flex items-center space-x-2 p-3 mb-1 border border-[#323335] lg:mb-0">
                            <div class="flex-1">
                                <p class="font-medium text-sm text-white">Transactions</p>
                            </div>
                            <div class="flex-none text-end">
                                <p class="font-medium text-xs text-[#a4a4a4]">Deposits & Withdrawals</p>
                            </div>
                            <div class="flex-none text-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-chevron-right-icon lucide-chevron-right">
                                    <path d="m9 18 6-6-6-6" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div
                            class="bg-dim w-full rounded-lg flex items-center space-x-2 p-3 mb-1 border border-[#323335] lg:mb-0">
                            <div class="flex-1">
                                <p class="font-medium text-sm text-white">Security</p>
                            </div>
                            <div class="flex-none text-end">
                                <p class="font-medium text-xs text-[#a4a4a4]">Passwords, 2FA, Devices</p>
                            </div>
                            <div class="flex-none text-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-chevron-right-icon lucide-chevron-right">
                                    <path d="m9 18 6-6-6-6" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('dashboard.identityverification') }}">
                        <div
                            class="bg-dim w-full rounded-lg flex items-center space-x-2 p-3 mb-1 border border-[#323335] lg:mb-0">
                            <div class="flex-1">
                                <p class="font-medium text-sm text-white">Identity Verification</p>
                            </div>
                            <div class="flex-none text-end">
                                <p class="font-medium text-xs text-[#a4a4a4]">KYC</p>
                            </div>
                            <div class="flex-none text-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-chevron-right-icon lucide-chevron-right">
                                    <path d="m9 18 6-6-6-6" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('dashboard.referrals') }}">
                        <div
                            class="bg-dim w-full rounded-lg flex items-center space-x-2 p-3 mb-1 border border-[#323335] lg:mb-0">
                            <div class="flex-1">
                                <p class="font-medium text-sm text-white">Referrals</p>
                            </div>
                            <div class="flex-none text-end">
                                <p class="font-medium text-xs text-[#a4a4a4]">Your link & earnings</p>
                            </div>
                            <div class="flex-none text-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-chevron-right-icon lucide-chevron-right">
                                    <path d="m9 18 6-6-6-6" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('dashboard.connectedexchanges') }}">
                        <div
                            class="bg-dim w-full rounded-lg flex items-center space-x-2 p-3 mb-1 border border-[#323335] lg:mb-0">
                            <div class="flex-1">
                                <p class="font-medium text-sm text-white">Connected Exchanges</p>
                            </div>
                            <div class="flex-none text-end">
                                <p class="font-medium text-xs text-[#a4a4a4]">Bybit, XTB</p>
                            </div>
                            <div class="flex-none text-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-chevron-right-icon lucide-chevron-right">
                                    <path d="m9 18 6-6-6-6" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('dashboard.support') }}">
                        <div
                            class="bg-dim w-full rounded-lg flex items-center space-x-2 p-3 mb-1 border border-[#323335] lg:mb-0">
                            <div class="flex-1">
                                <p class="font-medium text-sm text-white">Support</p>
                            </div>
                            <div class="flex-none text-end">
                                <p class="font-medium text-xs text-[#a4a4a4]">Help Center & Chat</p>
                            </div>
                            <div class="flex-none text-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-chevron-right-icon lucide-chevron-right">
                                    <path d="m9 18 6-6-6-6" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    {{-- <a href="{{ route('dashboard.withdrawhistory') }}">
                        <div class="bg-dim w-full rounded-lg flex flex-col space-y-2 p-3 mb-3 lg:mb-0">
                            <div class="flex items-center space-x-2">
                                <div class="flex-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-device-ipad-up">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M9 18h3" />
                                        <path d="M19 22v-6" />
                                        <path d="M22 19l-3 -3l-3 3" />
                                        <path d="M13.5 21h-6.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v7" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-sm text-white">Withdraw history</p>
                                </div>
                                <div class="flex-none text-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-chevron-right-icon lucide-chevron-right">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('settings.profile') }}">
                        <div class="bg-dim w-full rounded-lg flex flex-col space-y-2 p-3 mb-3 lg:mb-0">
                            <div class="flex items-center space-x-2">
                                <div class="flex-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-sm text-white">Settings</p>
                                </div>
                                <div class="flex-none text-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-chevron-right-icon lucide-chevron-right">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('dashboard.referrals') }}">
                        <div class="bg-dim w-full rounded-lg flex flex-col space-y-2 p-3 mb-3 lg:mb-0">
                            <div class="flex items-center space-x-2">
                                <div class="flex-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M12 3C11.2044 3 10.4413 3.31607 9.87868 3.87868C9.31607 4.44129 9 5.20435 9 6C9 6.79565 9.31607 7.55871 9.87868 8.12132C10.4413 8.68393 11.2044 9 12 9C12.7956 9 13.5587 8.68393 14.1213 8.12132C14.6839 7.55871 15 6.79565 15 6C15 5.20435 14.6839 4.44129 14.1213 3.87868C13.5587 3.31607 12.7956 3 12 3Z"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M18 15C17.2044 15 16.4413 15.3161 15.8787 15.8787C15.3161 16.4413 15 17.2044 15 18C15 18.7956 15.3161 19.5587 15.8787 20.1213C16.4413 20.6839 17.2044 21 18 21C18.7956 21 19.5587 20.6839 20.1213 20.1213C20.6839 19.5587 21 18.7956 21 18C21 17.2044 20.6839 16.4413 20.1213 15.8787C19.5587 15.3161 18.7956 15 18 15Z"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M6 15C5.20435 15 4.44129 15.3161 3.87868 15.8787C3.31607 16.4413 3 17.2044 3 18C3 18.7956 3.31607 19.5587 3.87868 20.1213C4.44129 20.6839 5.20435 21 6 21C6.79565 21 7.55871 20.6839 8.12132 20.1213C8.68393 19.5587 9 18.7956 9 18C9 17.2044 8.68393 16.4413 8.12132 15.8787C7.55871 15.3161 6.79565 15 6 15Z"
                                            stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M13.3 8.69995L16.7 15.3" stroke="white" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M10.7 8.69995L7.29995 15.3" stroke="white" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-sm text-white">Referrals</p>
                                </div>
                                <div class="flex-none text-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-chevron-right-icon lucide-chevron-right">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('dashboard.kyc') }}">
                        <div class="bg-dim w-full rounded-lg flex flex-col space-y-2 p-3 mb-3 lg:mb-0">
                            <div class="flex items-center space-x-2">
                                <div class="flex-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-id-card-icon lucide-id-card">
                                        <path d="M16 10h2" />
                                        <path d="M16 14h2" />
                                        <path d="M6.17 15a3 3 0 0 1 5.66 0" />
                                        <circle cx="9" cy="11" r="2" />
                                        <rect x="2" y="5" width="20" height="14" rx="2" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <p class="font-semibold text-sm text-white">KYC Verification</p>
                                </div>
                                @if ($this->kycStatus !== '')
                                    <div class="flex-none text-end -mt-1">
                                        <span
                                            class="inline-flex items-center gap-x-1.5 py-0.5 px-1.5 rounded-md text-[9px] font-medium {{ $this->getStatusIndicatorColor($this->kycStatus) }} text-white">{{ ucfirst($this->kycStatus) }}</span>
                                    </div>
                                @endif
                                <div class="flex-none text-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-chevron-right-icon lucide-chevron-right">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a> --}}
                    {{-- <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <a class="cursor-pointer" onclick="this.closest('form').submit()">
                            <div class="bg-dim w-full rounded-lg flex flex-col space-y-2 p-3 mb-3 lg:mb-0">
                                <div class="flex items-center space-x-2">
                                    <div class="flex-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="#FB2C36" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-logout">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                            <path d="M9 12h12l-3 -3" />
                                            <path d="M18 15l3 -3" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <p class="font-semibold text-sm text-red-500">Sign Out</p>
                                    </div>
                                    <div class="flex-none text-end">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-chevron-right-icon lucide-chevron-right">
                                            <path d="m9 18 6-6-6-6" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </form> --}}
                </div>

                <div class="lg:grid lg:grid-cols-2 lg:gap-4">
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <a class="cursor-pointer" onclick="this.closest('form').submit()">
                            <div
                                class="bg-dim w-full rounded-lg flex items-center space-x-2 p-3 mb-1 border border-[#323335] lg:mb-0">
                                <div class="flex-1">
                                    <p class="font-medium text-sm text-red-500">Sign Out</p>
                                </div>
                                <div class="flex-none text-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-chevron-right-icon lucide-chevron-right">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('accountPage', {
            toast() {
                const toastMarkup = `
                <div class="flex items-start p-4">
                    <div class="shrink-0">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info-icon lucide-info"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                        </svg>
                    </div>
                    <div class="ms-3 flex-1">
                        <p class="text-xs font-semibold text-white">Copied UID!</p>
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
            },

            copyUID() {
                var copyText = document.getElementById("uid");
                copyText.select();
                copyText.setSelectionRange(0, 99999); // For mobile devices
                navigator.clipboard.writeText(copyText.value);
                this.toast();
            }
        })
    })
</script>
