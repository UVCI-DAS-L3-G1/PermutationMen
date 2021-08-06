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
                <div>
                    @if ($this->dren_id==0)
                    <x-jet-button disabled class="opacity-50 cursor-not-allowed" wire:click='openModal'>
                        Ajouter une IEP
                    </x-jet-button>
                    @else
                    <x-jet-button wire:click='openModal'>
                        Ajouter une IEP
                    </x-jet-button>
                    @endif


                </div>
                <div class="mt-4">
                    <x-jet-label>{{__('Drens:')}}</x-jet-label>
                    <select name='dren_id' wire:model='iep.dren_id' class="p-2 px-4 py-2 pr-8 bg-white border border-gray-500 rounded
                             shadow appearence-none hover:border-gray-500
                             focus:outline-none focus:shadow-outline">
                        <option value='0'> ---------------Choisir une DREN---------------- </option>
                        @foreach ($drens as $dren )
                        <option value={{ $dren->id }}>{{ $dren->nom }}</option>
                        @endforeach
                    </select>
                </div>



                @if ($this->any())
                <div class="mt-4">
                    <table class="table table-fixed w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-20">No.</th>
                                <th class="px-4 py-2 ">Nom</th>
                                <th class="px-4 py-2 ">DREN</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ieps as $i=>$iep)

                            <tr>
                                <td class="border px-4 py-2">{{ $i+1 }}</td>
                                <td class="border px-4 py-2">{{ $iep->nom }}</td>
                                <td class="border px-4 py-2">{{ $iep->dren?->nom }}</td>
                                <td class="border px-4 py-2 text-right">
                                    <x-jet-button wire:click="edit({{ $iep->id }})">
                                        {{ __('Editer') }}
                                    </x-jet-button>
                                    <x-jet-danger-button wire:click="delete({{ $iep->id }})">
                                        {{ __('Supprimer') }}
                                    </x-jet-danger-button>


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                <div class="mt-4">
                    {{$ieps->links()}}
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

            <x-slot name='title'>IEP</x-slot>
            <x-slot name='description'>Saisir les informations de l'IEP</x-slot>

            <div>
                <p class="text-center font-bold">[DREN {{$iep->dren->nom}}]</p>
            </div>
            <div>
                <x-jet-label for="nom" value="Nom"></x-jet-label>
                <x-jet-input wire:model.defer='iep.nom' type="text" name="nom" required class="mt-1 w-full">
                </x-jet-input>
                <x-jet-input-error for="nom" class="mt-2" />
            </div>


        </x-dialog-form>




    </div>
