<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Mon tableau de bord') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="px-4 py-3">
                @if (App\Pct\PctHelper::currentIsAgent())

                    @livewire('show-my-reservation')

                    <x-jet-section-border />
                     @livewire('show-my-publication')
                @endif

                @if (Auth::user()->isSuperAdmin())

                    @livewire('show-compte-utilisateur')
                @endif

            </div>

        </div>
    </div>

</div>



