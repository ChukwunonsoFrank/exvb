<div class="px-4">
    <section
        class="elementor-section elementor-top-section elementor-element elementor-element-a126101 tl-section-padding  elementor-section-boxed elementor-section-height-default elementor-section-height-default"
        data-id="a126101" data-element_type="section" id="contact"
        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
        <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-4a7e867"
                data-id="4a7e867" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-f3b0803 elementor-widget elementor-widget-heading"
                        data-id="f3b0803" data-element_type="widget" data-widget_type="heading.default">
                        <div class="elementor-widget-container">
                            <h2 class="elementor-heading-title elementor-size-default">Forgot Password</h2>
                        </div>
                    </div>
                    <div class="elementor-element elementor-element-23adb73 elementor-widget__width-initial elementor-widget elementor-widget-text-editor"
                        data-id="23adb73" data-element_type="widget" data-widget_type="text-editor.default">
                        <div class="elementor-widget-container">
                            <p>Enter your email to receive a password reset link.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-6bff677"
                data-id="6bff677" data-element_type="column">
                <div class="elementor-widget-wrap elementor-element-populated">
                    <div class="elementor-element elementor-element-fb8ad16 elementor-widget elementor-widget-html">
                        <div class="elementor-widget-container">
                            <!-- Session status -->
                            <x-auth-session-status class="text-center" :status="session('status')" />

                            <form wire:submit="sendPasswordResetLink" class="flex flex-col mt-2">
                                <!-- Email Address -->
                                <input wire:model="email" type="email"
                                    class="py-3 px-4 block w-full border font-medium text-gray-600 border-gray-200 rounded-sm text-sm disabled:opacity-50 disabled:pointer-events-none"
                                    required placeholder="Email">

                                <div class="w-full">
                                    <flux:button variant="primary" type="submit"
                                        class="w-full! rounded-md! bg-accent!">
                                        {{ __('Email Password Reset Link') }}</flux:button>
                                </div>
                            </form>

                            <div class="space-x-1 rtl:space-x-reverse mt-8 text-center text-sm text-zinc-500 font-medium">
                                {{ __('Or, return to') }}
                                <flux:link class="text-accent" :href="route('login')">{{ __('log in') }}</flux:link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@script
    <script>
        $wire.on('login-error', (event) => {
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
                className: "hs-toastify-on:opacity-100 opacity-0 z-100 absolute top-0 start-1/2 -translate-x-1/2 z-50 w-4/5 md:w-1/2 lg:w-1/4 transition-all duration-300 bg-[#26252a] text-sm text-white rounded-xl shadow-lg [&>.toast-close]:hidden",
                duration: 5000,
                close: false,
                escapeMarkup: false
            }).showToast();
        });
    </script>
@endscript
