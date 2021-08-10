@extends('beautymail::templates.sunny')

@section('content')

    @include ('beautymail::templates.sunny.heading' , [
        'heading' => 'Salutations',
        'level' => 'h1',
    ])

    @include('beautymail::templates.sunny.contentStart')

        <p>Vous avez un interressé quant à votre avis de permutation, veuillez le contacter via les coordonnées suivantes : example@gmail.com</p>

    @include('beautymail::templates.sunny.contentEnd')

@stop
