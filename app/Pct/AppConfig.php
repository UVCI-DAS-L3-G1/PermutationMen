<?php

namespace App\Pct;

use App\Models\Parametre;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AppConfig
{
    const ANNEE_SCOLAIRE = 'Année scolaire';
    const NOM_MINISTERE = 'Nom du ministère';
    const NOM_DRH = 'Nom et prénoms du DRH';
    const ADRESSE = 'Adresse postale';
    const TELEPHONE = 'Numéro de téléphone';
    const PAGINATION = 'Pagination';
    const AUTO_RESERVATION = 'Auto-réservation';
    const VALEUR_ANNEE_SCOLAIRE = '2021-2022';
    const VALEUR_NOM_MINISTERE = 'Ministère de l\'éducation nationale et de l\'alphabétisation';
    const VALEUR_NOM_DRH = 'Le Directeur';
    const VALEUR_ADRESSE = 'BP 807 Abidjan 04';
    const VALEUR_TELEPHONE = '20 21 90 47 87';
    const VALEUR_PAGINATION = '10';
    const VALEUR_AUTO_RESERVATION = '0';
    const CLOTURE='Demande de permutation ouverte';
    const VALEUR_CLOTURE ='0';

    public static function getParameter($attribut,$valeur)
    {


        Parametre::firstOrCreate(['attribut' => $attribut],
         ['valeur' => $valeur]);
         $q=Parametre::where('attribut','=',$attribut)->get();
         return $q->first()->valeur;
    }
    public static function auto_reservation()
    {
       $r =self::getParameter(self::AUTO_RESERVATION,self::VALEUR_AUTO_RESERVATION);
        return $r;
    }
    public static function pagination()
    {
       return self::getParameter(self::PAGINATION,self::VALEUR_PAGINATION);
    }
    public static function telephone()
    {
       return self::getParameter(self::TELEPHONE,self::VALEUR_TELEPHONE);
    }
    public static function adresse()
    {
       return self::getParameter(self::ADRESSE,self::VALEUR_ADRESSE);
    }
    public static function drh()
    {
       return self::getParameter(self::NOM_DRH,self::VALEUR_NOM_DRH);
    }
    public static function ministere()
    {
       return self::getParameter(self::NOM_MINISTERE,self::VALEUR_NOM_MINISTERE);
    }
    public static function annee()
    {
       return self::getParameter(self::ANNEE_SCOLAIRE,self::VALEUR_ANNEE_SCOLAIRE);
    }
    public static function isOpened()
    {
       return self::getParameter(self::CLOTURE,self::VALEUR_CLOTURE);
    }

    public static function isFirstUser()
    {
        $nbre = User::count();
        return $nbre>0;
    }
}
