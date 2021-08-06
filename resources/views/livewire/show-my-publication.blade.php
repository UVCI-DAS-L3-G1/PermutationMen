<div class="md:grid md:grid-cols-3 md:gap-6">
    <div>
        <x-jet-section-title>
            <x-slot name="title">{{ __('Mes demandes de permutations') }}</x-slot>

            <x-slot name="description">{{ __('Gestion des publications') }}</x-slot>


        </x-jet-section-title>
    </div>


    <div class="col-span-8 sm:col-span-4">
        <div class="ml-3">
            {{--Bouton de creation--}}
            @if ($this->isRegistered())


            <div class="text-right">
                @if ($this->canPublish())
                <x-jet-button wire:click='publier'>
                    Publier
                </x-jet-button>

                @else
                <x-jet-button disabled class="opacity-50 cursor-not-allowed" wire:click='publier'>
                    Publier
                </x-jet-button>
                @endif

            </div>
            @endif

            @if ($this->anyItems())
            {{-- Tableau  --}}

            {{--@if ($this->any()) --}}
            <div class="mt-4">
                {{$avis_permutations->links()}}
            </div>
            <div class="mt-4">
                <table class="table table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20">No.</th>
                            <th class="px-4 py-2 ">Publié le</th>
                            <th class="px-4 py-2 ">Ecole de destination</th>
                            <th class="px-4 py-2 ">Intéressé</th>
                            <th class="px-4 py-2 ">Réservé le</th>
                            <th class="px-4 py-2 ">Etat</th>
                            <th class="px-4 py-2 ">Validé le</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($avis_permutations as $num=>$avis_permutation)

                        <tr>
                            <td class="border px-4 py-2">{{$num+1}}</td>
                            <td class="border px-4 py-2">{{ $avis_permutation->date_publication }}</td>
                            <td class="border px-4 py-2">{{$avis_permutation->ecole->nom}}</td>
                            <td class="border px-4 py-2">
                                @if (!is_null($avis_permutation->agentFavorable))
                                <x-jet-responsive-nav-link href="{{ route('show-profile',['id'=>$avis_permutation->agentFavorable->id]) }}">
                                {{$avis_permutation->agentFavorable?->user->name}}
                            </x-jet-responsive-nav-link>
                                @endif

                            </td>
                            <td class="border px-4 py-2">{{ $avis_permutation->date_reservation }}</td>
                            <td class="border px-4 py-2">{{ $avis_permutation->getEtatString() }}</td>
                            <td class="border px-4 py-2">{{ $avis_permutation->date_validation }}</td>
                            <td class="border px-4 py-2 text-right">
                                @if ($avis_permutation->isReserve())
                                <x-jet-button wire:click="confirmer_avis({{ $avis_permutation->id }})">
                                    {{ __('Confirmer') }}
                                </x-jet-button>
                                @endif
                                @if ($avis_permutation->isConfirme())
                                <x-jet-button wire:click="imprimer_fiche_permutation({{ $avis_permutation->id }})">
                                    {{ __('Imprimer') }}
                                </x-jet-button>
                                @endif
                                @if ($avis_permutation->isConfirme())
                                <x-jet-button wire:click="annuler_confirmation({{ $avis_permutation->id }})">
                                    {{ __('Anuler la confirmation') }}
                                </x-jet-button>
                                @endif


                                @if (($avis_permutation->isLibre()||$avis_permutation->isInactif()))
                                <x-jet-danger-button wire:click="supprimer_avis({{ $avis_permutation->id }})">
                                    {{ __('Supprimer') }}
                                </x-jet-danger-button>
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
            {{--@endif--}}
            @else
            <p class="text-center">{{__('Vous n\'avez fait aucune publication')}}</p>
            @endif


        </div>
    </div>
</div>
