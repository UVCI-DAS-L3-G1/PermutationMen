<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $mainTitle }}
    </h2>
</x-slot>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="px-4 py-3">

                    {{--Bouton de creation--}}
                <div >
                    <x-jet-button wire:click='openModal'>
                        Ajouter
                    </x-jet-button>
                </div>



                @if ($drens->count())
                <div class="mt-4">
                    <table >
                        <thead>
                            <tr class="bg-gray-100">
                                <!--<th class="px-4 py-2 w-20">No.</th>-->
                                <th class="px-4 py-2">Nom</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($drens as $dren)
                            <tr>
                                <!--<td class="border px-4 py-2">{{ $dren->id }}</td>-->
                                <td class="border px-4 py-2">{{ $dren->nom }}</td>
                                <td class="border px-4 py-2 text-right">
                                    <x-jet-button wire:click="edit({{ $dren->id }})">
                                        {{ __('Editer') }}
                                    </x-jet-button>
                                    <x-jet-danger-button wire:click="delete({{ $dren->id }})">
                                        {{ __('Supprimer') }}
                                    </x-jet-danger-button>


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                <div class="mt-4">
                {{$drens->links()}}
                </div>
                @else
                <div>
                    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                        <p class="content-center">Veuillez ajouter des éléments</p>
                    </h2>
                </div>
            </div>
            @endif
            {{--Dialog Modal --}}
            <div>
                <x-jet-dialog-modal wire:model='isModalOpen'>
                    <x-slot name='title'>
                        {{ $dialogTitle }}
                    </x-slot>
                    <x-slot name='content'>

                        <div>
                            <x-jet-label for="nom" value="">Valeur</x-jet-label>
                            <x-jet-input wire:model.defer='dren.nom' type="text" name="nom" required
                                class="mt-1 w-full"></x-jet-input>
                            <x-jet-input-error for="nom" class="mt-2" />
                        </div>
                        
                    </x-slot>

                    <x-slot name='footer'>

                        <x-jet-secondary-button wire:click="closeModal">
                            {{ __('Fermer') }}
                        </x-jet-secondary-button>
                        <x-jet-action-message class="mr-3" on="saved">
                            {{ __('Enregistré.') }}
                        </x-jet-action-message>
                        <x-jet-button wire:click="store">
                            {{ __('Enregistrer') }}
                        </x-jet-button>
                    </x-slot>
                </x-jet-dialog-modal>
            </div>

        </div>
    </div>
