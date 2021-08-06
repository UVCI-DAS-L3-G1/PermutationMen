<div class="md:grid md:grid-cols-3 md:gap-6">
    <div>
        <x-jet-section-title>
            <x-slot name="title">{{ __('Ma réservation') }}</x-slot>

            <x-slot name="description">{{ __('L\'avis qui m\'intéresse') }}</x-slot>


        </x-jet-section-title>
    </div>

    @if ($this->anyItems())


    <div class="col-span-8 sm:col-span-4">
        <div class="ml-3">

            <table class="table table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2 ">Publié le</th>
                        <th class="px-4 py-2 ">Ecole d'origine</th>
                        <th class="px-4 py-2 ">Démandeur</th>
                        <th class="px-4 py-2 ">Réservé le</th>
                        <th class="px-4 py-2 ">Etat</th>
                        <th class="px-4 py-2 ">Validé le</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($avis_permutations as  $num=>$avis_permutation)


                    <tr>
                        <td class="border px-4 py-2">{{1}}</td>
                        <td class="border px-4 py-2">{{ $avis_permutation->date_publication }}</td>
                        <td class="border px-4 py-2">{{$avis_permutation->ecole->nom}}</td>
                        <td class="border px-4 py-2">
                            <x-jet-responsive-nav-link href="{{ route('show-profile',['id'=>$avis_permutation->agentDemandeur->id]) }}">
                                {{$avis_permutation->agentDemandeur->user->name}}
                            </x-jet-responsive-nav-link></td>
                        <td class="border px-4 py-2">{{ $avis_permutation->date_reservation }}</td>
                        <td class="border px-4 py-2">{{ $avis_permutation->getEtatString() }}</td>
                        <td class="border px-4 py-2">{{ $avis_permutation->date_validation }}</td>
                        <td class="border px-4 py-2 text-right">
                            @if ($avis_permutation->isReserve())
                            <x-jet-button wire:click="annuler_reservation({{ $avis_permutation->id }})">
                                {{ __('Annuler la réservation') }}
                            </x-jet-button>
                            @endif
                            @if ($avis_permutation->isConfirme())
                            <x-jet-button wire:click="imprimer_fiche_permutation({{ $avis_permutation->id }})">
                                {{ __('Imprimer') }}
                            </x-jet-button>
                            @endif



                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>




        </div>
    </div>
    @else
    <p>{{__('Vous n\'avez fait aucune réservation')}}</p>
    @endif
</div>
