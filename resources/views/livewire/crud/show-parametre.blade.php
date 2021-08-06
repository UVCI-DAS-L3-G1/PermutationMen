<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $this->mainTitle }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="px-4 py-3">


                @if ($parametres->count())
                <div class="mt-4">
                    <table>
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2">Attribut</th>
                                <th class="px-4 py-2">Valeur</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($parametres as $parametre)
                            <tr>
                                <td class="border px-4 py-2">{{ $parametre->attribut }}</td>
                                <td class="border px-4 py-2">{{ $parametre->valeur }}</td>
                                <td class="border px-4 py-2 text-right">
                                    <x-jet-button wire:click="edit({{ $parametre->id }})">
                                        {{ __('Editer') }}
                                    </x-jet-button>



                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                <div class="mt-4">
                    {{$parametres->links()}}
                </div>
                @else
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <p class="content-center">Veuillez ajouter des éléments</p>
                    </h2>
                </div>
            </div>
            @endif
            {{--Dialog Modal --}}
            <x-dialog-form>

                <x-slot name='title'>Editer</x-slot>
                <x-slot name='description'>Description</x-slot>

                <div class="mt-4">

                    <p><h3>{{$this->parametre->attribut}}</h3></p>
                    <x-jet-input wire:model.defer='parametre.valeur' type="text" name="valeur" required class="mt-1 w-full">
                    </x-jet-input>
                    <x-jet-input-error for="valeur" class="mt-2" />

                </div>


            </x-dialog-form>

        </div>
    </div>
