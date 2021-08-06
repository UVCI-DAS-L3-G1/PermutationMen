<div class="md:grid md:grid-cols-3 md:gap-6">
    <div>
        <x-jet-section-title>
            <x-slot name="title">{{ __('Comptes d\'utilisateurs') }}</x-slot>

            <x-slot name="description">{{ __('Ajouter des aministrateurs') }}</x-slot>


        </x-jet-section-title>
    </div>


    <div class="col-span-8 sm:col-span-4">
        <div class="ml-3">


            @if ($this->anyItems())
                {{-- Tableau  --}}

            {{--@if ($this->any()) --}}
            <div class="mt-4">
                {{$comptes->links()}}
            </div>
            <div class="mt-4">
                <table class="table table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-10">No.</th>
                            <th class="px-4 py-2 ">Nom</th>
                            <th class="px-4 py-2 ">Email</th>
                             <th class="px-4 py-2 ">Téléphone mobile</th>
                            <th class="px-4 py-2 ">Téléphone bureau</th>
                            <th class="px-4 py-2 ">Type de compte</th>
                            <th class="px-4 py-2 ">Créé le</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comptes as $num=>$compte)

                        <tr>
                            <td class="border px-4 py-2">{{$num+1}}</td>
                            <td class="border px-4 py-2">{{$compte->name }}</td>
                            <td class="border px-4 py-2">{{$compte->email}}</td>
                            <td class="border px-4 py-2">{{$compte->mobile_phone}}</td>
                            <td class="border px-4 py-2">{{$compte->office_phone }}</td>
                            <td class="border px-4 py-2">{{$compte->role()}}</td>
                            <td class="border px-4 py-2">{{$compte->created_at }}</td>
                            <td class="border px-4 py-2 text-right">


                                <div> <x-jet-button wire:click="edit({{ $compte->id}},{{ 1}})">
                                    {{ __('U') }}
                                </x-jet-button>
                                <x-jet-button wire:click="edit({{ $compte->id}},{{2}})">
                                    {{ __('A') }}
                                </x-jet-button>
                                <x-jet-button wire:click="edit({{ $compte->id}},{{ 3}})">
                                    {{ __('S') }}
                                </x-jet-button></div>
                                <div><x-jet-danger-button wire:click="delete({{ $compte->id }})">
                                    {{ __('D') }}
                                </x-jet-danger-button></div>








                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
            <div class="mt-4">
                {{$comptes->links()}}
            </div>
            {{--@endif--}}
            @else
                <p class="text-center">{{__('Aucun compte utilisateur à éditer')}}</p>
            @endif


        </div>
    </div>
</div>



