<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Publier un avis de permutation

    </h2>
</x-slot>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session()->has('message'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
            role="alert">
            <div class="flex">
                <div>
                    <p class="text-sm">{{ session('message') }}</p>
                </div>
            </div>
        </div>
        @endif
        <div class="flex justify-center bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <div class="px-4 py-3">


                <div class="inline-flex mt-4">

                    <div>
                        <x-jet-label>{{__('DRENs:')}}</x-jet-label>
                        <select name='dren_id' wire:model='dren_id' class="p-2 px-4 py-2 pr-8 bg-white border border-gray-500 rounded
                                 shadow appearence-none hover:border-gray-500
                                 focus:outline-none focus:shadow-outline w-full">
                            <option value='0'>Choisir une DREN</option>
                            @foreach ($drens as $dren )
                            <option value={{ $dren->id }}>{{ $dren->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="ml-4">
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
                </div>




                @if ($this->any())
                <div class="mt-4">
                    <table class="table table-fixed w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-20">No.</th>
                                <th class="px-4 py-2 ">Nom</th>
                                <th class="px-4 py-2 ">IEP</th>
                                <th class="px-4 py-2 ">DREN</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ecoles as $i=>$ecole)

                            <tr>
                                <td class="border px-4 py-2">{{ $i+1 }}</td>
                                <td class="border px-4 py-2">{{ $ecole->nom }}</td>
                                <td class="border px-4 py-2">{{ $ecole->iep?->nom }}</td>
                                <td class="border px-4 py-2">{{ $ecole->iep?->dren?->nom }}</td>
                                <td class="border px-4 py-2 text-right">

                                    <x-jet-button wire:click="save({{ $ecole->id }})">
                                        {{ __('Publier') }}
                                    </x-jet-button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                <div class="mt-4">
                    {{--$ecoles->links()--}}
                </div>
                @else
                <div class="mt-4">
                    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                        <p class="content-center">Veuillez sélectionner une IEP pour afficher les écoles</p>
                    </h2>
                </div>
                @endif
            </div>


        </div>


    </div>

