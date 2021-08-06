<x-jet-modal wire:model='isModalOpen'>


    <div class="md:col-span-1 flex justify-center text-center">
        <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium text-gray-900">{{ $title ?? ' '}}</h3>
            <p class="mt-1 text-sm text-gray-600">
                {{ $description ?? ' ' }}
            </p>

        </div>

        <div class="px-4 sm:px-0">
            {{ $aside ?? ' ' }}
        </div>
    </div>





    <div class="px-4 py-3">
        <!--<x-jet-validation-errors class="mb-4" />-->
        <form wire:submit.prevent="store">
            {{$slot}}

            <div
                class="flex items-center justify-end mt-4 px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                <x-jet-action-message class="mr-3" on="saved">
                    {{ __('Saved.') }}
                </x-jet-action-message>
                <x-jet-secondary-button class="mr-3" wire:click="closeModal">
                    {{ __('Fermer') }}
                </x-jet-secondary-button>
                <x-jet-button wire:click="store" class="mr-3">
                    {{ __('Enregistrer') }}
                </x-jet-button>
                <x-apply-button wire:click="apply"
                                wire:keydown.plus="apply" class="mr-3"
                                >{{__('Appliquer')}}</x-apply-button>
            </div>

        </form>

    </div>


</x-jet-modal>
