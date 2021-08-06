<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvisPermutation extends Model
{

    public const INACTIF = 'Inactif';
    public const LIBRE = 'Libre';
    public const RESERVE = 'Réservé';
    public const CONFIRME = 'Confirmé';
    public const VALIDE = 'Validé';

    public const ETAT_AVIS = [self::INACTIF => 0, self::LIBRE => 1, self::RESERVE => 2, self::CONFIRME => 3, self::VALIDE => 4];

    public static function inactif(): int
    {
        return self::ETAT_AVIS[self::INACTIF];
    }
    public static function libre(): int
    {
        return self::ETAT_AVIS[self::LIBRE];
    }
    public static function reserve(): int
    {
        return self::ETAT_AVIS[self::RESERVE];
    }
    public static function confirme(): int
    {
        return self::ETAT_AVIS[self::CONFIRME];
    }
    public static function valide(): int
    {
        return self::ETAT_AVIS[self::VALIDE];
    }
    public static function getEtat($etat): int
    {
        return self::ETAT_AVIS[$etat];
    }
    protected $table = 'avis_permutations';
    public $timestamps = false;
    protected $fillable = array(
        'agent_demandeur_id', 'ecole_destination_id', 'date_publication',
        'agent_interesse_id', 'date_reservation', 'date_validation',
        'date_confirmation', 'etat'
    );

    protected $casts = [
        'date_publication' => 'datetime',
        'date_reservation' => 'datetime',
        'date_validation' => 'datetime',
    ];

    public function ecole()
    {
        return $this->belongsTo(Ecole::class,'ecole_destination_id');
    }
    public function agentDemandeur()
    {
        return $this->belongsTo(Agent::class, 'agent_demandeur_id','id');
    }
    public function agentFavorable()
    {
        return $this->belongsTo(Agent::class,'agent_interesse_id','id');
    }

    public  function isInactif()
    {
        return $this->etat == self::ETAT_AVIS[self::INACTIF];
    }
    public  function isLibre()
    {
        return $this->etat == self::ETAT_AVIS[self::LIBRE];
    }
    public  function isReserve()
    {
        return $this->etat == self::ETAT_AVIS[self::RESERVE];
    }
    public  function isConfirme()
    {
        return $this->etat ==  self::ETAT_AVIS[self::CONFIRME];
    }
    public  function isValide()
    {
        return $this->etat ==  self::ETAT_AVIS[self::VALIDE];
    }
    public  function getEtatString()
    {
        return array_search($this->attributes['etat'],self::ETAT_AVIS);
    }



}
