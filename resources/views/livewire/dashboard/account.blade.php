<div x-data class="px-4 lg:px-0 h-full">
    <div class="lg:flex lg:h-full">
        <livewire:dashboard.partials.desktop-navbar />
        <div class="lg:h-full lg:flex-1 lg:px-96 lg:pt-6">
            {{-- <div class="my-3 sticky top-0 bg-dashboard pb-2 lg:pt-4">
                <h1 class="text-white text-lg md:text-xl lg:text-2xl font-semibold">Account</h1>
            </div> --}}
            <div class="py-2 lg:h-full lg:pb-24 lg:overflow-scroll scrollbar-hide">
                <div class="flex flex-col gap-y-2 px-2 py-3 bg-dim rounded-lg border border-[#323335]">
                    <div class="flex items-start space-x-4">
                        <div class="flex-none flex justify-center mb-3 lg:justify-start">
                            <div class="bg-[#282828] size-16 rounded-full flex items-center justify-center lg:size-20">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"
                                    fill="none">
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
                            <p class="text-white text-base font-bold">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-[#a4a4a4]">{{ auth()->user()->email }}</p>
                            <div class="flex items-center space-x-2">
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
                            <div class="flex items-center space-x-2 mb-1">
                                <div class="grow">
                                    @if ($this->kycStatus === 'Unverified')
                                        <p class="text-[10px] text-white">KYC: <span
                                                class="text-yellow-500 font-bold">{{ $this->kycStatus }}</span></p>
                                    @endif
                                    @if ($this->kycStatus === 'Verified')
                                        <p class="text-[10px] text-white">KYC: <span
                                                class="text-green-500 font-bold">{{ $this->kycStatus }}</span></p>
                                    @endif
                                </div>
                                <div class="flex-none">
                                    @if ($this->kycStatus === 'Unverified')
                                        <a href="{{ route('dashboard.identityverification') }}">
                                            <button type="button"
                                                class="w-full px-3 py-2 cursor-pointer inline-flex items-center justify-center gap-x-1 text-xs font-semibold rounded-lg bg-orange-500 text-white focus:outline-hidden">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M13.3333 8.66664C13.3333 12 11 13.6666 8.22663 14.6333C8.0814 14.6825 7.92365 14.6802 7.77996 14.6266C4.99996 13.6666 2.66663 12 2.66663 8.66664V3.99997C2.66663 3.82316 2.73686 3.65359 2.86189 3.52857C2.98691 3.40355 3.15648 3.33331 3.33329 3.33331C4.66663 3.33331 6.33329 2.53331 7.49329 1.51997C7.63453 1.39931 7.8142 1.33301 7.99996 1.33301C8.18572 1.33301 8.36539 1.39931 8.50663 1.51997C9.67329 2.53997 11.3333 3.33331 12.6666 3.33331C12.8434 3.33331 13.013 3.40355 13.138 3.52857C13.2631 3.65359 13.3333 3.82316 13.3333 3.99997V8.66664Z"
                                                        fill="white" stroke="white" stroke-width="1.33333"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M6 8.00008L7.33333 9.33341L10 6.66675" stroke="#FF6900"
                                                        stroke-width="1.33333" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
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
                        <p class="text-xs text-[#a4a4a4]">Current: $1,000,000 in 24hrs</p>
                    </div>
                    <div class="flex-none">
                        <a href="{{ route('dashboard.identityverification') }}">
                            @if ($this->kycStatus === 'Unverified')
                                <button type="button"
                                    class="w-full px-3 py-2 cursor-pointer inline-flex items-center justify-center gap-x-1 text-xs font-semibold rounded-lg bg-orange-500 text-white focus:outline-hidden">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.3333 8.66664C13.3333 12 11 13.6666 8.22663 14.6333C8.0814 14.6825 7.92365 14.6802 7.77996 14.6266C4.99996 13.6666 2.66663 12 2.66663 8.66664V3.99997C2.66663 3.82316 2.73686 3.65359 2.86189 3.52857C2.98691 3.40355 3.15648 3.33331 3.33329 3.33331C4.66663 3.33331 6.33329 2.53331 7.49329 1.51997C7.63453 1.39931 7.8142 1.33301 7.99996 1.33301C8.18572 1.33301 8.36539 1.39931 8.50663 1.51997C9.67329 2.53997 11.3333 3.33331 12.6666 3.33331C12.8434 3.33331 13.013 3.40355 13.138 3.52857C13.2631 3.65359 13.3333 3.82316 13.3333 3.99997V8.66664Z"
                                            fill="white" stroke="white" stroke-width="1.33333" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M6 8.00008L7.33333 9.33341L10 6.66675" stroke="#FF6900"
                                            stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    Get verified
                                </button>
                            @endif
                        </a>
                    </div>
                </div>


                <div class="mb-3 lg:grid lg:grid-cols-2 lg:gap-4">
                    <a href="{{ route('dashboard.transactions') }}">
                        <div
                            class="bg-dim w-full rounded-lg flex items-center space-x-2 p-3 mb-1 border border-[#323335] lg:mb-0">
                            <div class="flex-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-arrow-right-left-icon lucide-arrow-right-left">
                                    <path d="m16 3 4 4-4 4" />
                                    <path d="M20 7H4" />
                                    <path d="m8 21-4-4 4-4" />
                                    <path d="M4 17h16" />
                                </svg>
                            </div>
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
                            <div class="flex-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-lock-icon lucide-lock">
                                    <rect width="18" height="11" x="3" y="11" rx="2"
                                        ry="2" />
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                </svg>
                            </div>
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
                            <div class="flex-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
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
                                <p class="font-medium text-sm text-white">Identity Verification</p>
                            </div>
                            <div class="flex-none text-end">
                                @if ($this->kycStatus === 'Unverified')
                                    <p class="text-xs font-bold text-yellow-500">{{ $this->kycStatus }}</p>
                                @endif
                                @if ($this->kycStatus === 'Verified')
                                    <p class="text-xs font-bold text-green-500">{{ $this->kycStatus }}</p>
                                @endif
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
                            <div class="flex-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-users-icon lucide-users">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                    <path d="M16 3.128a4 4 0 0 1 0 7.744" />
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                    <circle cx="9" cy="7" r="4" />
                                </svg>
                            </div>
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
                            <div class="flex-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-unplug-icon lucide-unplug">
                                    <path d="m19 5 3-3" />
                                    <path d="m2 22 3-3" />
                                    <path d="M6.3 20.3a2.4 2.4 0 0 0 3.4 0L12 18l-6-6-2.3 2.3a2.4 2.4 0 0 0 0 3.4Z" />
                                    <path d="M7.5 13.5 10 11" />
                                    <path d="M10.5 16.5 13 14" />
                                    <path d="m12 6 6 6 2.3-2.3a2.4 2.4 0 0 0 0-3.4l-2.6-2.6a2.4 2.4 0 0 0-3.4 0Z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="font-medium text-sm text-white">Connected Broker & Exchanges</p>
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
                            <div class="flex-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-message-square-icon lucide-message-square">
                                    <path
                                        d="M22 17a2 2 0 0 1-2 2H6.828a2 2 0 0 0-1.414.586l-2.202 2.202A.71.71 0 0 1 2 21.286V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2z" />
                                </svg>
                            </div>
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
                </div>

                <div class="lg:grid lg:grid-cols-2 lg:gap-4">
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <a class="cursor-pointer" onclick="this.closest('form').submit()">
                            <div
                                class="bg-dim w-full rounded-lg flex items-center space-x-2 p-3 mb-1 border border-[#323335] lg:mb-0">
                                <div class="flex-none text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-log-out-icon lucide-log-out">
                                        <path d="m16 17 5-5-5-5" />
                                        <path d="M21 12H9" />
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                    </svg>
                                </div>
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
