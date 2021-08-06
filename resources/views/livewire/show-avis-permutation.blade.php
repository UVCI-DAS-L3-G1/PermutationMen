<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Avis de permutation') }}
    </h2>
</x-slot>

<div class="mx-auto py-10 sm:px-6 lg:px-8">
    <div class="flex justify-center bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="flex flex-row px-4 py-2">
            <div>
                {{-- Recherche --}}
                <div>
                    {{-- Recherche par Dren --}}
                    <form wire:submit.prevent="setModeSearch(1)">
                        <div>
                            <x-jet-label>{{__('DRENs:')}}</x-jet-label>
                            <select name='dren_id' wire:model='dren_id' class="p-2 px-4 py-2 pr-8 bg-white border border-gray-500 rounded
                             shadow appearence-none hover:border-gray-500
                             focus:outline-none focus:shadow-outline w-full">
                                <option value='0'> Choisir une DREN</option>
                                @foreach ($drens as $dren )
                                <option value={{ $dren->id }}>{{ $dren->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            @if (!$this->canGetByDren())
                            <x-jet-button disabled class="opacity-50 cursor-not-allowed">
                                {{__('Afficher')}}
                            </x-jet-button>
                            @else
                            <x-jet-button>
                                {{__('Afficher')}}
                            </x-jet-button>
                            @endif
                        </div>
                    </form>

                </div>
                {{-- Recherche par IEP --}}
                <div class="mt-4">
                    {{-- Recherche par IEP --}}
                    <form wire:submit.prevent="setModeSearch(2)">
                        <div>
                            <x-jet-label>{{__('IEPs:')}}</x-jet-label>
                            <select name='iep_id' wire:model='iep_id' class="p-2 px-4 py-2 pr-8 bg-white border border-gray-500 rounded
                             shadow appearence-none hover:border-gray-500
                             focus:outline-none focus:shadow-outline w-full">
                                <option value='0'> Choisir une IEP</option>
                                @foreach ($ieps as $iep )
                                <option value={{ $iep->id }}>{{ $iep->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            @if (!$this->canGetByIep())
                            <x-jet-button disabled class="opacity-50 cursor-not-allowed">
                                {{__('Afficher')}}
                            </x-jet-button>
                            @else
                            <x-jet-button>
                                {{__('Afficher')}}
                            </x-jet-button>
                            @endif
                        </div>
                    </form>

                </div>

                {{-- Recherche par Ecole --}}
                <div class="mt-4">
                    {{-- Recherche par Ecole --}}
                    <form wire:submit.prevent="setModeSearch(3)">
                        <div>
                            <x-jet-label>{{__('Ecoles:')}}</x-jet-label>
                            <select name='ecole_id' wire:model='ecole_id' class="p-2 px-4 py-2 pr-8 bg-white border border-gray-500 rounded
                             shadow appearence-none hover:border-gray-500
                             focus:outline-none focus:shadow-outline w-full">
                                <option value='0'> Choisir une école</option>
                                @foreach ($ecoles as $ecole )
                                <option value={{ $ecole->id }}>{{ $ecole->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            @if (!$this->canGetByEcole())
                            <x-jet-button disabled class="opacity-50 cursor-not-allowed">
                                {{__('Afficher')}}
                            </x-jet-button>
                            @else
                            <x-jet-button>
                                {{__('Afficher')}}
                            </x-jet-button>
                            @endif
                        </div>
                    </form>

                </div>
                @if (!Auth::user()->isUser())
                {{-- Recherche par numéro --}}
                <div class="mt-4">
                    <form wire:submit.prevent="setModeSearch(4)">
                        <div>
                            <x-jet-label for="numero_avis_recherche_id">{{__('Numéro de l\'avis:')}}</x-jet-label>
                            <x-jet-input wire:model='numero_avis_recherche_id' type="text"
                                name="numero_avis_recherche_id" required class="w-full">
                            </x-jet-input>
                            <x-jet-input-error for="numero_avis_recherche_id" class="mt-2" />

                        </div>
                        <div>
                            @if (!$this->canGetByNumeroAvis())
                            <x-jet-button disabled class="opacity-50 cursor-not-allowed">
                                {{__('Afficher')}}
                            </x-jet-button>
                            @else
                            <x-jet-button>
                                {{__('Afficher')}}
                            </x-jet-button>
                            @endif
                        </div>
                    </form>

                </div>
                @endif


                {{-- Recherche par agent --}}
                <div class="mt-4">
                    <form wire:submit.prevent="setModeSearch(5)">
                        <div>
                            <x-jet-label for="mots_cles_agent">{{__('Info agent:')}}</x-jet-label>
                            <x-jet-input wire:model='mots_cles_agent' type="text" name="mots_cles_agent" required
                                class="w-full">
                            </x-jet-input>
                            <x-jet-input-error for="mots_cles_agent" class="mt-2" />

                        </div>
                        <div>
                            @if (!$this->canGetByAgent())
                            <x-jet-button disabled class="opacity-50 cursor-not-allowed">
                                {{__('Afficher')}}
                            </x-jet-button>
                            @else
                            <x-jet-button>
                                {{__('Afficher')}}
                            </x-jet-button>
                            @endif
                        </div>
                    </form>

                </div>

                {{-- Recherche par date --}}
                <div class="mt-4">
                    <form wire:submit.prevent="setModeSearch(6)">
                        <div>
                            <x-jet-label for="date_debut">{{__('Date début:')}}</x-jet-label>
                            <x-jet-input wire:model='date_debut' type="date" name="date_debut" required class="w-full">
                            </x-jet-input>
                            <x-jet-input-error for="date_debut" class="mt-2" />

                        </div>
                        <div>
                            <x-jet-label for="date_fin">{{__('Date fin:')}}</x-jet-label>
                            <x-jet-input wire:model='date_fin' type="date" name="date_fin" required class="w-full">
                            </x-jet-input>
                            <x-jet-input-error for="date_fin" class="mt-2" />

                        </div>
                        <div>
                            @if (!$this->canGetByDate())
                            <x-jet-button disabled class="opacity-50 cursor-not-allowed">
                                {{__('Afficher')}}
                            </x-jet-button>
                            @else
                            <x-jet-button>
                                {{__('Afficher')}}
                            </x-jet-button>
                            @endif
                        </div>
                    </form>

                </div>

                {{-- Recherche par texte libre --}}
                <!--<div class="mt-4">
                <form wire:submit.prevent="show_avis_by_libre">

                    <div>
                        <x-jet-label for="mots_cles_libre">{{--__('Recherche libre:')--}}</x-jet-label>
                        <x-jet-input wire:model='mots_cles_libre' type="text" name="mots_cles_libre" required
                            class="w-full">
                        </x-jet-input>
                        <x-jet-input-error for="mots_cles_libre" class="mt-2" />

                    </div>
                    <div>
                        @@if (!$this->canGetByLibre())
                        <x-jet-button disabled class="opacity-50 cursor-not-allowed">
                            {{--__('Afficher')--}}
                        </x-jet-button>
                        @@else
                        <x-jet-button>
                            {{--__('Afficher')--}}
                        </x-jet-button>
                        @@endif
                    </div>
                </form>

            </div>-->


            </div>

            <div class="ml-3">


                <div class="flex flex-inline text-right">
                        @if ($this->isRegistered())
                        <div >

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

                @if (!App\Pct\AppConfig::isOpened())
                <div class="ml-4">
                    @if ($this->canPrintListeAdmis())
                    <x-jet-button wire:click='afficher_liste_admis'>
                    Demandes validées
                    </x-jet-button>

                    @else
                    <x-jet-button disabled class="opacity-50 cursor-not-allowed"
                    wire:click='afficher_liste_admis'>
                    Demandes validées
                    </x-jet-button>
                    @endif
                </div>
                @endif
                </div>


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
                                <th class="px-4 py-2 w-20">Réf.</th>
                                <th class="px-4 py-2 ">Ecole d'origine</th>
                                <th class="px-4 py-2 ">Auteur</th>
                                @if (!Auth::user()->isUser())
                                <th class="px-4 py-2 ">Ecole de destination</th>
                                @endif

                                <th class="px-4 py-2 ">Publié le</th>
                                <!--<th class="px-4 py-2 ">Intéressé</th>-->
                                <!--<th class="px-4 py-2 ">Réservé le</th>-->
                                <th class="px-4 py-2 ">Etat</th>
                                <!--<th class="px-4 py-2 ">Validé le</th>-->
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($avis_permutations as $num=>$avis_permutation)

                            <tr>
                                <td class="border px-4 py-2">{{$num+1}}</td>
                                <td class="border px-4 py-2">{{$avis_permutation->id}}</td>
                                <td class="border px-4 py-2">{{$avis_permutation->agentDemandeur->ecole->nom}}</td>
                                <td class="border px-4 py-2">{{$avis_permutation->agentDemandeur->user->name}}</td>
                                @if (!Auth::user()->isUser())
                                <td class="border px-4 py-2">{{$avis_permutation->ecole->nom}}</td>
                                @endif

                                <td class="border px-4 py-2">{{ $avis_permutation->date_publication->format('d/m/Y H:m:s') }}</td>
                                <!--<td class="border px-4 py-2">{{--$avis_permutation->agentFavorable?->user->name--}}</td>-->
                                <!--<td class="border px-4 py-2">{{-- $avis_permutation->date_reservation --}}</td>-->
                                <td class="border px-4 py-2">{{ $avis_permutation->getEtatString() }}</td>
                                <!--<td class="border px-4 py-2">{{-- $avis_permutation->date_validation --}}</td>-->
                                <td class="border px-4 py-2 text-right">
                                    @if ( $avis_permutation->isLibre()&&$this->canReserve())
                                    <x-jet-button wire:click="reserver_avis({{ $avis_permutation->id }})">
                                        {{ __('Réserver') }}
                                    </x-jet-button>
                                    @endif
                                    @if (Auth::user()->isAdmin() && $avis_permutation->isConfirme())
                                    <x-jet-button wire:click="valider_avis({{ $avis_permutation->id }})">
                                        {{ __('Valider') }}
                                    </x-jet-button>
                                    @endif
                                    @if (Auth::user()->isAdmin() && $avis_permutation->isValide())
                                    <x-jet-button wire:click="annuler_validation({{ $avis_permutation->id }})">
                                        {{ __('Anuler la validation') }}
                                    </x-jet-button>
                                    @endif
                                    @if (Auth::user()->isAdmin() && $avis_permutation->isValide())
                                    <x-jet-button wire:click="imprimer_acte_permutation({{ $avis_permutation->id }})">
                                        {{ __('Acte de permutation') }}
                                    </x-jet-button>
                                    @endif


                                    @if (Auth::user()->isAdmin() &&
                                    ($avis_permutation->isLibre()||$avis_permutation->isInactif()))
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
            </div>
        </div>
    </div>
</div>
