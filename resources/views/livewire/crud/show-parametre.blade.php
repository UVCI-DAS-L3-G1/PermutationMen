<div>
    <x-jet-dialog-modal wire:model='isModalOpen'>
        <x-slot name='title'>
           Editer un paramètre
        </x-slot>
        <x-slot name='content'>
            <div>
                <x-jet-label for="valeur">

                </x-jet-label>

            </div>
            <div>
                <x-jet-label for="valeur" value="Valeur"></x-jet-label>
                <x-jet-input wire:model.defer="valeur"
                type="text" name="valeur" required
                class="mt-1 w-full"></x-jet-input>
                <x-jet-input-error for="valeur" class="mt-2" />
            </div>
        </x-slot>
        <x-slot name='footer'>

            <x-jet-secondary-button wire:click.prevent="closeModal">
                {{ __('Fermer') }}
            </x-jet-secondary-button>
            <x-jet-button wire:click.prevent="store">
                {{ __('Enregistrer') }}
            </x-jet-button>

        </x-slot>
    </x-jet-dialog-modal>
</div>
