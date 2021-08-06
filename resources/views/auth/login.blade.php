<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <div class="flex items-center flex-col">
           <x-jet-authentication-card-logo/></p>
            <p class="text-bold text-lg text-center">Ministère de l'éducation nationale et de l'alphabétisation</p>
            <p class="text-black text-lg text-center">GESTION DES DEMANDES DE PERMUTATION</p>

           </div>
        </x-slot>


       <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Mot de passe') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Maintenir la session') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié') }}
                    </a>
                @endif




                <x-jet-button class="ml-4">
                    {{ __('Se connecter') }}
                </x-jet-button>
            </div>
            <h1>
            <div class="mt-10 text-center">

                    <p >Vous n'avez pas encore de compte ?</p>
                    <p><a href="{{ route('register') }}">

                     <span class="underline text-2xl font-bold hover:text-gray-900">{{ __('Inscrivez-vous gratuitement') }}</span>

                    </a></p>

            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
