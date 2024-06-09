<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1 bg-orange-600">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('myprofile')" :active="request()->routeIs('myprofile')">
                {{ __('My Profile') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('myrecipes.index')" :active="request()->routeIs('myrecipes.index')">
                {{ __('My Recipes') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link >
                {{ __('Saved Recipes') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link >
                {{ __('Explore Recipes') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link>
                {{ __('My Meal Calendar') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('friendrequest.index')" :active="request()->routeIs('friendrequest.index')">
                {{ __('Friends') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link >
                {{ __('Groups') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('messages.index')" :active="request()->routeIs('messages.index')">
                {{ __('Messages') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link >
                {{ __('Notifications') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 bg-orange-600 text-white">
            <div class="px-4">
                <div class="font-medium text-base ">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm ">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>