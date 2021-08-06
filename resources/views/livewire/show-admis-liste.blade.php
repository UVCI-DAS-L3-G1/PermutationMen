<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Demandes permutations validées') }} {{--$titre--}}
    </h2>
</x-slot>

<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="flex justify-center bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="flex flex-row px-4 py-2">
            <div class="ml-3">


                    @if (Auth::user()->isAdmin())
                    <div class="text-right">
                        @if ($this->canPrintListeAdmis())
                        <x-jet-button wire:click='imprimer_liste_admis'>
                            Imprimer la listes des demandes validées
                        </x-jet-button>
                        <x-jet-button wire:click='imprimer_acte_permutation(0)'>
                            Imprimer les actes de permutation
                        </x-jet-button>

                        @else
                        <x-jet-button disabled class="opacity-50 cursor-not-allowed" wire:click='imprimer_liste_admis'>
                            Imprimer la listes des demandes validées
                        </x-jet-button>
                        <x-jet-button disabled class="opacity-50 cursor-not-allowed" wire:click='imprimer_acte_permutation(0)'>
                            Imprimer les actes de permutation
                        </x-jet-button>
                        @endif
                    </div>
                    @endif





                @if ($this->anyItems())
                <div class="mt-4">
                    {{$avis_permutations->links()}}
                </div>
                <div class="mt-4">
                    <table class="table table-fixed w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-20">No.</th>
                                <th class="px-4 py-2 w-20">Réf.</th>
                                <th class="px-4 py-2 ">Matricule</th>
                                <th class="px-4 py-2 ">Nom et prénoms</th>
                                <th class="px-4 py-2 ">Ecole d'origine</th>
                                <th class="px-4 py-2 ">Ecole de destination</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($avis_admis as $num=>$admis)

                            <tr>
                                <td class="border px-4 py-2">{{$num+1}}</td>
                                <td class="border px-4 py-2">{{$admis->id}}</td>
                                <td class="border px-4 py-2">{{$admis->matricule}}</td>
                                <td class="border px-4 py-2">{{$admis->nom}}</td>
                                <td class="border px-4 py-2">{{$admis->ecoleOrigine}}</td>
                                <td class="border px-4 py-2">{{$admis->ecoleDestination}}</td>
                                <td class="border px-4 py-2 text-right">

                                    @if (Auth::user()->isAdmin())
                                    <x-jet-button wire:click="imprimer_acte_permutation({{ $admis->id }})">
                                        {{ __('Acte de permutation') }}
                                    </x-jet-button>
                                    @endif
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>


                </div>
                <div class="mt-4">
                    {{$avis_permutations->links()}}
                </div>
                @endif


            </div>
        </div>
    </div>
</div>
