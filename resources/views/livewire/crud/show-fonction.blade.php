<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Fonctions') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="px-4 py-3">
                <div class="flex flex-row">
                    {{--Bouton de creation--}}
                <div >
                    <x-jet-button wire:click='openModal'>
                        Ajouter
                    </x-jet-button>
                </div>
                <!--<div class="ml-4">
                    <x-jet-button wire:click='openManyItemModal'>
                        Ajouter plusieurs DREN
                    </x-jet-button>
                </div>-->
                </div>

                @if ($fonctions->count())
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
                            @foreach($fonctions as $fonction)
                            <tr>
                                <!--<td class="border px-4 py-2">{{ $fonction->id }}</td>-->
                                <td class="border px-4 py-2">{{ $fonction->nom }}</td>
                                <td class="border px-4 py-2 text-right">
                                    <x-jet-button wire:click="edit({{ $fonction->id }})">
                                        {{ __('Editer') }}
                                    </x-jet-button>
                                    <x-jet-danger-button wire:click="delete({{ $fonction->id }})">
                                        {{ __('Supprimer') }}
                                    </x-jet-danger-button>


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                <div class="mt-4">
                {{$fonctions->links()}}
                </div>
                @else
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <p class="content-center">Veuillez ajouter des ??l??ments</p>
                    </h2>
                </div>
            </div>
            @endif
            {{--Dialog Modal --}}
            <x-dialog-form>

                <x-slot name='title'>Fonction</x-slot>
                <x-slot name='description'>D??finir une fonction</x-slot>

                <x-jet-label for="nom" value="Nom"></x-jet-label>
                <x-jet-input wire:model.defer='fonction.nom' type="text" name="nom" required
                    class="mt-1 w-full">
                </x-jet-input>
                <x-jet-input-error for="nom" class="mt-2" />

            </x-dialog-form>

        </div>
    </div>


