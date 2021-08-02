<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Mettre à jour son profile') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Choisir une photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Supprimer la photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif


        <!-- Nom et prénoms -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nom et prénoms') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>
        <!-- Nom de jeune fille -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="maiden_name" value="{{ __('Nom de jeune fille') }}" />
            <x-jet-input id="maiden_name" type="text" class="mt-1 block w-full" wire:model.defer="state.maiden_name" autocomplete="maiden_name" />
            <x-jet-input-error for="maiden_name" class="mt-2" />
        </div>
        <!-- Date de naissance -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="birthdate" value="{{ __('Date de naissance') }}" />
            <x-jet-input id="birthdate" type="date" class="mt-1 block w-full" wire:model.defer="state.birthdate" autocomplete="birthdate" />
            <x-jet-input-error for="birthdate" class="mt-2" />
        </div>
         <!-- Téléphone 1 -->
         <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="mobile_phone" value="{{ __('Téléphone mobile') }}" />
            <x-jet-input id="mobile_phone" type="text" class="mt-1 block w-full" wire:model.defer="state.mobile_phone" autocomplete="mobile_phone" />
            <x-jet-input-error for="mobile_phone" class="mt-2" />
        </div>
        <!-- Téléphone 1 -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="office_phone" value="{{ __('Téléphone de bureau') }}" />
            <x-jet-input id="office_phone" type="text" class="mt-1 block w-full" wire:model.defer="state.office_phone" autocomplete="office_phone" />
            <x-jet-input-error for="office_phone" class="mt-2" />
        </div>


        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Enregistré.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Enregistrer') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
