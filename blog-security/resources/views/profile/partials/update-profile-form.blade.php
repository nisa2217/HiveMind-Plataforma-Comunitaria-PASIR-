<form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
    @csrf
    @method('PUT')

    <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __('Profile Information') }}</h3>
                <p class="mt-1 text-sm text-gray-500">
                    {{ __("Update your account's profile information and email address.") }}
                </p>
            </div>
            <div class="mt-5 md:col-span-2 md:mt-0">
                <!-- Name -->
                <div class="col-span-6 sm:col-span-3">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input
                        id="name"
                        name="name"
                        type="text"
                        class="mt-1 block w-full"
                        :value="old('name', $user->name)"
                        required
                        autofocus
                        autocomplete="name"
                    />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <!-- Email -->
                <div class="col-span-6 sm:col-span-3 mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input
                        id="email"
                        name="email"
                        type="email"
                        class="mt-1 block w-full"
                        :value="old('email', $user->email)"
                        required
                        autocomplete="email"
                    />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>

                <!-- Profile Photo -->
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="col-span-6 sm:col-span-4 mt-4">
                        <x-input-label for="photo" value="{{ __('Profile Photo') }}" />
                        <div class="mt-2 flex items-center">
                            <img class="h-12 w-12 rounded-full object-cover" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" />
                            <x-secondary-button class="ml-4" type="button" x-data="" x-on:click.prevent="$refs.photo.click()">
                                {{ __('Select A New Photo') }}
                            </x-secondary-button>
                            <input
                                id="photo"
                                name="photo"
                                type="file"
                                class="hidden"
                                x-ref="photo"
                            />
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('photo')" />
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="flex justify-end">
        <x-primary-button>
            {{ __('Save') }}
        </x-primary-button>
    </div>

    @if (session('status') === 'profile-updated')
        <div
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-green-600"
        >
            {{ __('Profile updated successfully.') }}
        </div>
    @endif
</form>