<div x-data class="px-4 lg:px-0 h-full">
    <div class="lg:flex lg:h-full">
        <livewire:dashboard.partials.desktop-navbar />
        <div class="lg:h-full lg:flex-1 lg:px-96 lg:pt-6">
            <div class="my-3 sticky top-0 bg-dashboard pb-2 lg:pt-4">
                <h1 class="text-white text-lg md:text-xl lg:text-2xl font-semibold">Account Information</h1>
            </div>
            <div class="lg:h-full lg:pb-24 lg:overflow-scroll scrollbar-hide">
                <div class="p-3 bg-dim rounded-lg border border-[#323335]">
                    <h2 class="text-white text-sm font-bold mb-3">Identity</h2>
                    <ul class="space-y-3 list-disc list-inside text-xs">
                        <li class="text-white flex items-center gap-x-1 pl-0">
                            <span class="list-disc list-inside mr-1"
                                style="display:inline-block;width:0.8em;">&#8226;</span>
                            <span class="flex-1">Full name: {{ auth()->user()->name }}</span>
                        </li>
                        <li class="text-white flex items-center gap-x-1 pl-0">
                            <span class="list-disc list-inside mr-1"
                                style="display:inline-block;width:0.8em;">&#8226;</span>
                            <span class="flex-1">Email: {{ auth()->user()->email }}</span>
                            <a href="{{ route('dashboard.security.changeemail') }}">
                                <button type="button"
                                    class="px-2 py-1 cursor-pointer inline-flex items-center justify-center gap-x-1 text-xs font-semibold rounded-lg bg-accent text-white focus:outline-hidden">
                                    Change Email
                                </button>
                            </a>
                        </li>
                        <li class="text-white flex items-center gap-x-1 pl-0">
                            <span class="list-disc list-inside mr-1"
                                style="display:inline-block;width:0.8em;">&#8226;</span>
                            <span class="flex-1">Country: {{ auth()->user()->country }}</span>
                        </li>
                    </ul>
                </div>
                <div class="p-3 mt-3 bg-dim rounded-lg border border-[#323335]">
                    <h2 class="text-white text-sm font-bold mb-2">Account Details</h2>
                    <ul class="space-y-3 list-disc list-inside text-xs">
                        <li class="text-white flex items-center gap-x-1 pl-0">
                            <span class="list-disc list-inside mr-1"
                                style="display:inline-block;width:0.8em;">&#8226;</span>
                            <input id="uid" type="text" class="hidden" value="{{ auth()->user()->uid }}">
                            <span class="flex-1">Moxyai UID: {{ auth()->user()->uid }}</span>
                            <button type="button" x-on:click="$store.accountInformationPage.copyUID()"
                                class="py-1 px-2 cursor-pointer inline-flex items-center justify-center text-xs font-semibold rounded-lg bg-[#282828] border border-[#323335] text-white focus:outline-hidden">
                                Copy
                            </button>
                        </li>
                        <li class="text-white flex items-center gap-x-1 pl-0">
                            <span class="list-disc list-inside mr-1"
                                style="display:inline-block;width:0.8em;">&#8226;</span>
                            <span class="flex-1">Registration Date: {{ auth()->user()->created_at }}</span>
                        </li>
                        <li class="text-white flex items-center gap-x-1 pl-0">
                            <span class="list-disc list-inside mr-1"
                                style="display:inline-block;width:0.8em;">&#8226;</span>
                            <span class="flex-1">Last Login:
                                {{ auth()->user()->last_login_at }}({{ auth()->user()->country }})</span>
                        </li>
                        <li class="text-white flex items-center gap-x-1 pl-0">
                            <span class="list-disc list-inside mr-1"
                                style="display:inline-block;width:0.8em;">&#8226;</span>
                            <span class="flex-1">IP: {{ auth()->user()->ip_address }}</span>
                        </li>
                    </ul>
                </div>
                <div class="p-3 mt-3 bg-dim rounded-lg border border-[#323335]">
                    <h2 class="text-white text-sm font-bold mb-3">Verification</h2>
                    <div class="flex items-center space-x-2 -mt-0.5">
                        <div class="grow">
                            @if (!$this->isKycPending && $this->kycStatus === 'Not verified')
                                <span
                                    class="inline-flex items-center gap-x-1.5 py-1 px-2 rounded-lg text-xs font-semibold bg-[#282828] text-white">Not
                                    Verified
                                </span>
                            @endif
                            @if ($this->isKycPending && $this->kycStatus === 'Not verified')
                                <span
                                    class="inline-flex items-center gap-x-1.5 py-1 px-2 rounded-lg text-xs font-semibold bg-[#F59E0B] text-white">Pending
                                    Review
                                </span>
                            @endif
                            @if ($this->kycStatus === 'Verified')
                                <span
                                    class="inline-flex items-center gap-x-1.5 py-1 px-2 rounded-lg text-xs font-semibold border border-red-500 text-red-500">Verified<svg
                                        width="10" height="10" viewBox="0 0 10 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.33366 2.5L3.75033 7.08333L1.66699 5" stroke="#85FDF8"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            @endif
                        </div>
                        <div class="flex-none">
                            @if ($this->isKycPending && $this->kycStatus === 'Not verified')
                                <a href="{{ route('dashboard.identityverification') }}">
                                    <button type="button"
                                        class="w-full py-2 px-3 cursor-pointer inline-flex items-center justify-center gap-x-1 text-xs font-semibold rounded-lg bg-accent text-white focus:outline-hidden">
                                        Increase Limits
                                    </button>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        $wire.on('message', (event) => {
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
                className: "hs-toastify-on:opacity-100 opacity-0 absolute top-0 start-1/2 -translate-x-1/2 z-90 w-4/5 md:w-1/2 lg:w-1/4 transition-all duration-300 bg-dim border border-[#26252a] text-sm text-white rounded-xl shadow-lg [&>.toast-close]:hidden",
                duration: 4000,
                close: true,
                escapeMarkup: false
            }).showToast();
        });
    </script>
@endscript

<script>
    let lastToast = null;

    function toastCopied() {
        if (lastToast) {
            lastToast.hideToast();
        }

        const copiedToastMarkup = `
            <div class="flex items-center p-4">
                <div class="shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info-icon lucide-info"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                </div>
                <div class="ms-3 flex-1">
                    <p class="text-xs font-semibold text-white">Copied</p>
                </div>
            </div>
        `;

        lastToast = Toastify({
            text: copiedToastMarkup,
            className: "hs-toastify-on:opacity-100 opacity-0 absolute top-0 start-1/2 -translate-x-1/2 z-90 w-4/5 md:w-1/2 lg:w-1/4 transition-all duration-300 bg-dim border border-[#26252a] text-sm text-white rounded-xl shadow-lg [&>.toast-close]:hidden",
            duration: 4000,
            close: true,
            escapeMarkup: false
        });

        lastToast.showToast();
    }

    document.addEventListener('alpine:init', () => {
        Alpine.store('accountInformationPage', {
            copyUID() {
                var copyText = document.getElementById("uid");
                copyText.select();
                copyText.setSelectionRange(0, 99999); // For mobile devices
                navigator.clipboard.writeText(copyText.value);
                toastCopied();
            }
        })
    })
</script>
