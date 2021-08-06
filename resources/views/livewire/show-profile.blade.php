<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Informations') }}
    </h2>
</x-slot>




<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="px-4 py-3">
                <!-- Profile Photo -->
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change="
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
                        <img src="{{ $this->agent->user->profile_photo_url }}" alt="{{ $this->agent->user->name }}"
                            class="rounded-full h-20 w-20 object-cover">
                    </div>
                </div>
                @endif
                <div class="flex">
                <div>
                    <p class="text-2xl font-medium">{{ __('Information personnelles') }}</p>
                    <x-jet-section-border/>

                    <div class="flex">
                        <div>
                        <!-- Matricule -->
                        <div class="mt-4">
                            <x-jet-label for="Matricule" disabled value="{{ __('Matricule') }}" />
                            <x-jet-input id="Matricule" type="text" class="mt-1  w-full"
                                value="{{$this->agent->matricule}}" />

                        </div>
                        <div class="mt-4">
                            <x-jet-label for="name" value="{{ __('Nom et prénoms') }}" />
                            <x-jet-input id="name" type="text" disabled class="mt-1  w-full"
                                value="{{$this->agent->user->name}}" />

                        </div>
                        <!-- Nom de jeune fille -->
                        <div class="mt-4">
                            <x-jet-label for="maiden_name" value="{{ __('Nom de jeune fille') }}" />
                            <x-jet-input id="maiden_name" type="text" disabled class="mt-1  w-full"
                                value="{{$this->agent->user->maiden_name}}" />

                        </div>
                        <!-- Date de naissance -->
                        <div class="mt-4">
                            <x-jet-label for="birthdate" value="{{ __('Date de naissance') }}" />
                            <x-jet-input id="birthdate" type="date" disabled class="mt-1  w-full"
                                value="{{$this->agent->user->birthdate}}" />


                        </div>
                        </div>
                        <div class="w-10"></div>
                        <div >
                        <!-- Téléphone 1 -->
                        <div class="mt-4">
                            <x-jet-label for="mobile_phone" value="{{ __('Téléphone mobile') }}" />
                            <x-jet-input id="mobile_phone" type="text" disabled class="mt-1  w-full"
                                value="{{$this->agent->user->mobile_phone}}" />

                        </div>
                        <!-- Téléphone 1 -->
                        <div class="mt-4">
                            <x-jet-label for="office_phone" value="{{ __('Téléphone de bureau') }}" />
                            <x-jet-input id="office_phone" type="text" disabled class="mt-1  w-full"
                                value="{{$this->agent->user->office_phone}}" />

                        </div> <!-- Email -->
                        <div class="mt-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" type="email" disabled class="mt-1  w-full"
                                value="{{$this->agent->user->email}}" />

                        </div>
                        </div>

                    </div>
                </div>


                <div class="w-16"></div>




                <div>
                    <p class="text-2xl font-medium">{{ __('Etablissement d\'origine') }}</p>
                    <x-jet-section-border/>
                    <div>
                        <div class="mt-4">
                            <x-jet-label for="ecole" value="{{ __('DREN') }}" />
                            <x-jet-input id="ecole" type="text" disabled class="mt-1  w-full"
                                value="{{$this->agent->ecole->iep->dren->nom}}" />
                        </div>
                            <div class="mt-4">
                                <x-jet-label for="ecole" value="{{ __('IEP') }}" />
                                <x-jet-input id="ecole" type="text" disabled class="mt-1  w-full"
                                    value="{{$this->agent->ecole->iep->nom}}" />



                            </div>
                            <div class="mt-4">
                                <x-jet-label for="ecole" value="{{ __('Ecole') }}" />
                                <x-jet-input id="ecole" type="text" disabled class="mt-1 w-full"
                                    value="{{$this->agent->ecole->nom}}" />

                            </div>

                    </div>

                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>



