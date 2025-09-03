<div class="hidden lg:flex flex-none flex-col items-center space-y-3 w-16 lg:border-r lg:border-[#26252a]">
    <div @class([
        'w-full' => true,
        'py-3' => true,
        'cursor-pointer' => true,
        'hover:bg-[#26252a]' => true,
    ])>
        <a class="block" href="{{ route('dashboard') }}">
            <div class="mb-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="#D4D4D4" stroke-width="{{ request()->is('dashboard') ? 2 : 1 }}" stroke-linecap="round"
                    stroke-linejoin="round"
                    class="block mx-auto icon icon-tabler icons-tabler-outline icon-tabler-chart-candle">
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
            </div>
            <div class="text-center">
                <p
                    class="text-[9px] font-semibold tracking-wide {{ request()->is('dashboard') ? 'text-white' : 'text-[#a4a4a4]' }}">
                    Chart</p>
            </div>
        </a>
    </div>

    <div @class([
        'w-full' => true,
        'py-3' => true,
        'cursor-pointer' => true,
        'hover:bg-[#26252a]' => true,
    ])>
        <a class="block" href="{{ route('dashboard.history') }}">
            <div class="mb-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="#D4D4D4" stroke-width="{{ request()->is('dashboard/history') ? 2 : 1 }}"
                    stroke-linecap="round" stroke-linejoin="round" class="block mx-auto lucide lucide-logs-icon lucide-logs">
                    <path d="M3 5h1" />
                    <path d="M3 12h1" />
                    <path d="M3 19h1" />
                    <path d="M8 5h1" />
                    <path d="M8 12h1" />
                    <path d="M8 19h1" />
                    <path d="M13 5h8" />
                    <path d="M13 12h8" />
                    <path d="M13 19h8" />
                </svg>
            </div>
            <div class="text-center">
                <p
                    class="text-[9px] font-semibold tracking-wide {{ request()->is('dashboard/history') ? 'text-white' : 'text-[#a4a4a4]' }}">
                    Deals</p>
            </div>
        </a>
    </div>

    <div @class([
        'w-full' => true,
        'py-3' => true,
        'cursor-pointer' => true,
        'hover:bg-[#26252a]' => true,
    ])>
        <a class="block" wire:click="robot()">
            <div class="mb-1">
                <svg class="block mx-auto" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M22 5H16V8H17V16H16V19H22V16H21V8H22V5Z"
                        fill="{{ request()->is('dashboard/robot') || request()->is('dashboard/robot/traderoom') ? 'white' : '#A4A4A4' }}" />
                    <path d="M13 5V19H9.5V15H6.5V19H3V5H13ZM6.5 8.5V11.5H9.5V8.5H6.5Z"
                        fill="{{ request()->is('dashboard/robot') ? 'white' : '#A4A4A4' }}" />
                </svg>
            </div>
            <div class="text-center">
                <p
                    class="text-[9px] font-semibold tracking-wide {{ request()->is('dashboard/robot') || request()->is('dashboard/robot/traderoom') ? 'text-white' : 'text-[#a4a4a4]' }}">
                    Robot</p>
            </div>
        </a>
    </div>

    <div @class([
        'w-full' => true,
        'py-3' => true,
        'cursor-pointer' => true,
        'hover:bg-[#26252a]' => true,
    ])>
        <a class="block" href="{{ route('dashboard.support') }}">
            <div class="mb-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="#D4D4D4" stroke-width="{{ request()->is('dashboard/support') ? 2 : 1 }}"
                    stroke-linecap="round" stroke-linejoin="round"
                    class="block mx-auto icon icon-tabler icons-tabler-outline icon-tabler-message-2">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 9h8" />
                    <path d="M8 13h6" />
                    <path
                        d="M9 18h-3a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-3l-3 3l-3 -3z" />
                </svg>
            </div>
            <div class="text-center">
                <p
                    class="text-[9px] font-semibold tracking-wide {{ request()->is('dashboard/support') ? 'text-white' : 'text-[#a4a4a4]' }}">
                    Support</p>
            </div>
        </a>
    </div>

    <div @class([
        'w-full' => true,
        'py-3' => true,
        'cursor-pointer' => true,
        'hover:bg-[#26252a]' => true,
    ])>
        <a class="block" href="{{ route('dashboard.account') }}">
            <div class="mb-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="#D4D4D4" stroke-width="{{ request()->is('dashboard/account') ? 2 : 1 }}"
                    stroke-linecap="round" stroke-linejoin="round"
                    class="block mx-auto icon icon-tabler icons-tabler-outline icon-tabler-user">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg>
            </div>
            <div class="text-center">
                <p
                    class="text-[9px] font-semibold tracking-wide {{ request()->is('dashboard/account') ? 'text-white' : 'text-[#a4a4a4]' }}">
                    Account</p>
            </div>
        </a>
    </div>
</div>
