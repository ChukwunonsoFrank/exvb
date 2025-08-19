<nav id="mobile__navbar" class="flex-none lg:hidden px-4 w-full py-4 border-t border-[#26252a]">
    <div class="flex justify-between items-center md:justify-around">
        <a class="block" href="{{ route('dashboard') }}">
            <div>
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="#D4D4D4" stroke-width="{{ request()->is('dashboard') ? 2 : 1 }}" stroke-linecap="round"
                        stroke-linejoin="round" class="inline icon icon-tabler icons-tabler-outline icon-tabler-chart-candle">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 6m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v3a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                        <path d="M6 4l0 2" />
                        <path d="M6 11l0 9" />
                        <path d="M10 14m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v3a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                        <path d="M12 4l0 10" />
                        <path d="M12 19l0 1" />
                        <path d="M16 5m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                        <path d="M18 4l0 1" />
                        <path d="M18 11l0 9" />
                    </svg>
                    <p class="text-[10px] mt-0.5 tracking-wide {{ request()->is('dashboard') ? 'text-white' : 'text-[#a4a4a4]' }}">Chart</p>
                </div>
            </div>
        </a>

        <a class="block" href="{{ route('dashboard.history') }}">
            <div>
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="#D4D4D4" stroke-width="{{ request()->is('dashboard/history') ? 2 : 1 }}"
                        stroke-linecap="round" stroke-linejoin="round"
                        class="inline icon icon-tabler icons-tabler-outline icon-tabler-history-toggle">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 20.777a8.942 8.942 0 0 1 -2.48 -.969" />
                        <path d="M14 3.223a9.003 9.003 0 0 1 0 17.554" />
                        <path d="M4.579 17.093a8.961 8.961 0 0 1 -1.227 -2.592" />
                        <path d="M3.124 10.5c.16 -.95 .468 -1.85 .9 -2.675l.169 -.305" />
                        <path d="M6.907 4.579a8.954 8.954 0 0 1 3.093 -1.356" />
                        <path d="M12 8v4l3 3" />
                    </svg>
                    <p class="text-[10px] mt-0.5 tracking-wide {{ request()->is('dashboard/history') ? 'text-white' : 'text-[#a4a4a4]' }}">History</p>
                </div>
            </div>
        </a>

        <a class="block" wire:click="robot()">
            <div>
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-center" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path
                            d="M8.7692 9.02622H15.2307C15.627 9.02622 15.9483 8.70398 15.9483 8.30856V6.51399C15.9483 5.61123 15.3796 4.7985 14.5332 4.48973C14.264 4.39213 13.9401 4.44682 13.6683 4.63612C13.3798 4.83804 12.8556 5.07783 11.9999 5.07783C11.1451 5.07783 10.6201 4.8372 10.3316 4.63612C10.1482 4.50908 9.94204 4.44177 9.74432 4.44177C9.64841 4.44177 9.55416 4.45776 9.46582 4.48973C8.61942 4.7985 8.05151 5.61207 8.05151 6.51399V8.30856C8.05151 8.70482 8.37378 9.02622 8.7692 9.02622ZM14.1538 5.4362C14.7478 5.4362 15.2307 5.99991 15.2307 6.69233C15.2307 7.38474 14.7478 7.94844 14.1538 7.94844C13.5598 7.94844 13.0769 7.38474 13.0769 6.69233C13.0769 5.99991 13.5598 5.4362 14.1538 5.4362ZM11.6407 7.59004H12.3584C12.5569 7.59004 12.7176 7.75074 12.7176 7.9493C12.7176 8.14786 12.5569 8.30856 12.3584 8.30856H11.6407C11.4421 8.30856 11.2814 8.14786 11.2814 7.9493C11.2814 7.75074 11.4421 7.59004 11.6407 7.59004ZM9.84613 5.4362C10.4401 5.4362 10.923 5.99991 10.923 6.69233C10.923 7.38474 10.4401 7.94844 9.84613 7.94844C9.25213 7.94844 8.7692 7.38474 8.7692 6.69233C8.7692 5.99991 9.25213 5.4362 9.84613 5.4362Z"
                            fill="white" />
                        <path
                            d="M7.33398 17.2824C7.33398 19.8551 9.42727 21.9492 12.0009 21.9492C14.5736 21.9492 16.6678 19.856 16.6678 17.2824V16.2054H15.2098C15.0356 17.8384 13.655 19.0769 12.001 19.0769C10.3469 19.0769 8.96626 17.8384 8.78965 16.1962L7.33497 16.2037V17.2824H7.33398Z"
                            fill="white" />
                        <path
                            d="M7.33398 13.6923V15.4869H8.79202C9.15884 15.4869 9.46429 15.7586 9.50297 16.1187C9.64014 17.3959 10.7145 18.3583 12.001 18.3583C13.2874 18.3583 14.3618 17.395 14.499 16.1187C14.5377 15.7586 14.844 15.4869 15.2099 15.4869H16.668V13.6923C16.668 13.0983 16.185 12.6154 15.591 12.6154H8.41103C7.81704 12.6154 7.33398 13.0983 7.33398 13.6923ZM12.0009 14.0516C12.9904 14.0516 13.7955 14.8567 13.7955 15.8461C13.7955 16.8356 12.9904 17.6407 12.0009 17.6407C11.0115 17.6407 10.2064 16.8356 10.2064 15.8461C10.2064 14.8567 11.0115 14.0516 12.0009 14.0516Z"
                            fill="white" />
                        <path
                            d="M13.0769 15.8462C13.0769 17.2825 10.9231 17.2825 10.9231 15.8462C10.9231 14.411 13.0769 14.411 13.0769 15.8462Z"
                            fill="white" />
                        <path d="M9.48755 11.1799H14.5129V11.8975H9.48755V11.1799Z" fill="white" />
                        <path
                            d="M17.3526 13.3741C17.3711 13.4777 17.3846 13.5837 17.3846 13.6922V17.2823C17.3846 17.5759 17.3551 17.861 17.3088 18.1421C18.0231 17.6087 18.4615 16.7707 18.4615 15.8461V14.7692C18.4615 14.0903 17.9869 13.5231 17.3526 13.3741Z"
                            fill="white" />
                        <path
                            d="M16.4178 1.94969C16.3446 2.0212 16.3076 2.10954 16.3076 2.20545V3.02155C16.571 3.2117 16.8116 3.43044 17.0253 3.67359L17.0261 2.20545C17.0261 2.00689 16.8654 1.84619 16.6669 1.84619C16.571 1.84619 16.4826 1.88407 16.4178 1.94969Z"
                            fill="white" />
                        <path
                            d="M6.6912 18.1421C6.64577 17.8612 6.61548 17.5759 6.61548 17.2823V13.6923C6.61548 13.5837 6.62894 13.4777 6.64746 13.3743C6.01308 13.5232 5.53857 14.0902 5.53857 14.7692V15.8461C5.53857 16.7707 5.97604 17.608 6.6912 18.1421Z"
                            fill="white" />
                        <path
                            d="M7.69227 3.02167V2.20556C7.69227 2.10965 7.65526 2.0213 7.58964 1.95653C7.51812 1.88334 7.42978 1.84631 7.33386 1.84631C7.13531 1.84631 6.97461 2.00701 6.97461 2.20558V3.67371C7.18831 3.43056 7.42895 3.2118 7.69227 3.02167Z"
                            fill="white" />
                        <path
                            d="M8.76919 10.4615H15.2307C16.4186 10.4615 17.3845 9.49563 17.3845 8.30767V6.5131C17.3845 4.53343 15.7742 2.9231 13.7945 2.9231H10.2045C8.22484 2.9231 6.6145 4.53343 6.6145 6.5131V8.30767C6.6145 9.49563 7.58122 10.4615 8.76919 10.4615ZM7.33302 6.5131C7.33302 5.30999 8.09107 4.22552 9.22015 3.81413C9.70979 3.63577 10.2778 3.72243 10.7422 4.04634C10.9465 4.18936 11.3311 4.35931 11.9999 4.35931C12.668 4.35931 13.0524 4.18936 13.2577 4.04634C13.7213 3.72327 14.2909 3.63578 14.7797 3.81413C15.9088 4.22556 16.6668 5.31003 16.6668 6.5131V8.30767C16.6668 9.09938 16.0232 9.74385 15.2306 9.74385H8.76916C7.97744 9.74385 7.33298 9.10022 7.33298 8.30767L7.33302 6.5131Z"
                            fill="white" />
                        <path
                            d="M14.513 6.6923C14.513 7.4108 13.7954 7.4108 13.7954 6.6923C13.7954 5.97464 14.513 5.97464 14.513 6.6923Z"
                            fill="white" />
                        <path
                            d="M10.2052 6.6923C10.2052 7.4108 9.48755 7.4108 9.48755 6.6923C9.48755 5.97464 10.2052 5.97464 10.2052 6.6923Z"
                            fill="white" />
                    </svg>
                    <p class="text-[10px] mt-0.5 tracking-wide {{ request()->is('dashboard/robot') ? 'text-white' : 'text-[#a4a4a4]' }}">Robot</p>
                </div>
            </div>
        </a>

        <a class="block" href="{{ route('dashboard.support') }}">
            <div>
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="#D4D4D4" stroke-width="{{ request()->is('dashboard/support') ? 2 : 1 }}"
                        stroke-linecap="round" stroke-linejoin="round"
                        class="inline icon icon-tabler icons-tabler-outline icon-tabler-message-2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 9h8" />
                        <path d="M8 13h6" />
                        <path
                            d="M9 18h-3a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-3l-3 3l-3 -3z" />
                    </svg>
                    <p class="text-[10px] mt-0.5 tracking-wide {{ request()->is('dashboard/support') ? 'text-white' : 'text-[#a4a4a4]' }}">Support</p>
                </div>
            </div>
        </a>

        <a class="block" href="{{ route('dashboard.account') }}">
            <div>
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="#D4D4D4" stroke-width="{{ request()->is('dashboard/account') ? 2 : 1 }}"
                        stroke-linecap="round" stroke-linejoin="round"
                        class="inline icon icon-tabler icons-tabler-outline icon-tabler-user">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    </svg>
                    <p class="text-[10px] mt-0.5 tracking-wide {{ request()->is('dashboard/account') ? 'text-white' : 'text-[#a4a4a4]' }}">Account</p>
                </div>
            </div>
        </a>
    </div>
</nav>
