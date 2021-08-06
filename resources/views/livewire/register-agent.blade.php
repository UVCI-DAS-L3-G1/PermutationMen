 <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Completer vos informations') }}
        </h2>
    </x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="px-4 py-3">
                <div class="px-4 py-3">
                    <div class="mt-4 text-center text-lg font-bold">
                        {{Auth::user()->name}}
                    </div>

                    <x-jet-validation-errors class="mb-4" />
                    <form wire:submit.prevent="store">

                        <div class="mt-4">
                            <x-jet-label for="matricule">{{ $agent->id }}</x-jet-label>
                            <div class="mt-1">
                                <x-jet-label for="matricule">{{__('Matricule:')}}</x-jet-label>
                                <x-jet-input wire:model='agent.matricule' type="text" name="matricule" required
                                    class="w-full">
                                </x-jet-input>
                                <x-jet-input-error for="matricule" class="mt-2" />
                            </div>
                            <div class="flex justify-content mt-4">
                                <div>
                                    <x-jet-label>{{__('Emplois:')}}</x-jet-label>
                                    <select name='emploi_id' wire:model='agent.emploi_id' class="p-2 px-4 py-2 pr-8 bg-white border border-gray-500 rounded
                                                 shadow appearence-none hover:border-gray-500
                                                 focus:outline-none focus:shadow-outline w-full">
                                        <option value='0'>[Choisir un emploi]</option>
                                        @foreach ($emplois as $emploi )
                                        <option value={{ $emploi->id }}>{{ $emploi->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="ml-4">
                                    <x-jet-label>{{__('Fonctions:')}}</x-jet-label>
                                    <select name='fonction_id' wire:model='agent.fonction_id' class="p-2 px-4 py-2 pr-8 bg-white border border-gray-500 rounded
                                                 shadow appearence-none hover:border-gray-500
                                                 focus:outline-none focus:shadow-outline w-full">
                                        <option value='0'>[Choisir une fonction]</option>
                                        @foreach ($fonctions as $fonction )
                                        <option value={{ $fonction->id }}>{{ $fonction->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="ml-4">
                                    <x-jet-label>{{__('Disciplines:')}}</x-jet-label>
                                    <select name='discipline_id' wire:model='agent.discipline_id' class="p-2 px-4 py-2 pr-8 bg-white border border-gray-500 rounded
                                                 shadow appearence-none hover:border-gray-500
                                                 focus:outline-none focus:shadow-outline w-full">
                                        <option value='0'>[Choisir une discipline]</option>
                                        @foreach ($disciplines as $discipline )
                                        <option value={{ $discipline->id }}>{{ $discipline->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="mt-4">
                                <div>
                                    <x-jet-label>{{__('DRENs:')}}</x-jet-label>
                                    <select name='dren_id' wire:model='dren_id' class="p-2 px-4 py-2 pr-8 bg-white border border-gray-500 rounded
                                                 shadow appearence-none hover:border-gray-500
                                                 focus:outline-none focus:shadow-outline w-full">
                                        <option value='0'>[Choisir une DREN]</option>
                                        @foreach ($drens as $dren )
                                        <option value={{ $dren->id }}>{{ $dren->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <x-jet-label>{{__('IEPs:')}}</x-jet-label>
                                    <select name='iep_id' wire:model='iep_id' class="p-2 px-4 py-2 pr-8 bg-white border border-gray-500 rounded
                                                 shadow appearence-none hover:border-gray-500
                                                 focus:outline-none focus:shadow-outline w-full">
                                        <option value='0'>[Choisir une IEP]</option>
                                        @foreach ($ieps as $iep )
                                        <option value={{ $iep->id }}>{{ $iep->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <x-jet-label>{{__('Ecoles:')}}</x-jet-label>
                                    <select name='ecole_id' wire:model='agent.ecole_id' class="p-2 px-4 py-2 pr-8 bg-white border border-gray-500 rounded
                                                 shadow appearence-none hover:border-gray-500
                                                 focus:outline-none focus:shadow-outline w-full">
                                        <option value='0'>[Choisir une école]</option>
                                        @foreach ($ecoles as $ecole )
                                        <option value={{ $ecole->id }}>{{ $ecole->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                        </div>

                        <div
                            class="flex items-center justify-end mt-4 px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                            @if (!$this->canSave())
                            <x-jet-button disabled class="opacity-50 cursor-not-allowed" wire:click='openModal'>
                                {{__('Enregistrer')}}
                            </x-jet-button>
                            @else
                            <x-jet-button >
                                {{__('Enregistrer')}}
                            </x-jet-button>
                            @endif


                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>






