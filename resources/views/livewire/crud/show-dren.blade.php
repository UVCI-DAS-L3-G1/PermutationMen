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
                        Ajouter une DREN
                    </x-jet-button>
                </div>



                @if ($drens->count())
                <div class="mt-4">
                    <table class="table table-fixed w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-20">No.</th>
                                <th class="px-4 py-2 ">Nom</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($drens as $i=>$dren)

                            <tr>
                                <td class="border px-4 py-2">{{ $i+1 }}</td>
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
                <div class="mt-4">
                    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                        <p class="content-center">Veuillez ajouter des éléments</p>
                    </h2>
                </div>
                @endif
            </div>


        </div>



            <x-dialog-form>

                <x-slot name='title'>DREN</x-slot>
                <x-slot name='description'>Saisir le informations de la DREN</x-slot>

                <x-jet-label for="nom" value="Nom"></x-jet-label>
                <x-jet-input wire:model.defer='dren.nom' type="text" name="nom" required
                    class="mt-1 w-full">
                </x-jet-input>
                <x-jet-input-error for="nom" class="mt-2" />

            </x-dialog-form>




    </div>
