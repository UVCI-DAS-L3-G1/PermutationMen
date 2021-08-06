<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/print.css') }}">
  <title>Fiche de demande de permutation</title>
</head>
<body>
  <page size="A4">

  <div class="Conteneur">

    <table class="headerfooter">

      <tr>
        <td>
          <p class="center">MINISTERE DE L'EDUCATION NATIONALE</p><p class="center">ET DE L'ENSEIGNEMENT TECHNIQUE</p>
          <p class="center">------------------------------</p>
          <p class="center">{{App\Pct\AppConfig::adresse()}} - Tél : {{App\Pct\AppConfig::telephone()}}</p>
        </td>
        <td>
          <p class="center">REPUBLIQUE DE COTE D'IVOIRE</p>
          <p class="center">------------------</p>
          <p class="center">Union- Discipline- Travail</p>
        </td>
      </tr>

    </table>

    <table class="headerfooter2">

      <tr>
        <td>
          <p class="center">DEMANDE DE PERMUTATION</p>
          <p class="center">ANNEE SCOLAIRE {{App\Pct\AppConfig::annee()}}</p>
        </td>
      </tr>
    </table>

    <table class="headerfooter">

      <tr>
        <td>
          <p>NB :</p>
        </td>
        <td>
          <ul>
            <li>Nul ne peut postuler en même temps pour les INEAT, les EXEAT et les Permutations.</li>
            <li>Toute demande d'EXEAT validée ne peut être annulée.</li>
          </ul>
        </td>
      </tr>

    </table>

    <table class="random1">

      <tr>
        <td class="ratiox">
          <p>Ecrivez en lettres majuscules</p>
        </td>
        <td class="ratio2">
          <p class="center"><b>ENTRE</b></p>
        </td>
      </tr>

    </table>

    <table class="random1">
        <tbody>
          <tr>
            <td class="ratio1">
              <p style="text-align: left;"><b>Nom et Prénoms</b></p>
            </td>
            <td class="form">
              <p class="center" style="text-align: left; margin-left: 15px;">
                {{$avis->agentDemandeur->user->name}}</p>
            </td>
          </tr>
        </tbody>
      </table>
      <table class="random2">
        <tbody>
          <tr>
            <td class="ratio1">
              <p style="text-align: left;"><b>Nom de jeune fille</b></p>
            </td>
            <td class="form2" style="margin-left: 20px;">
              <p class="center" style="text-align: left; margin-left: 17px;">
                {{$avis->agentDemandeur->user->maiden_name}}
            </p>
            </td>
            <td class="ratio3">
              <p style="text-align: left; margin-left: 16px;"><b>Date de
                  Naissance</b></p>
            </td>
            <td class="form3">
              <p class="center">{{$avis->agentDemandeur->user->birthdate->format('d/m/Y')}}</p>
            </td>
          </tr>
        </tbody>
      </table>
      <table class="random2">
        <tbody>
          <tr>
            <td class="ratio1">
              <p style="text-align: left;"><b>Emploi</b></p>
            </td>
            <td class="form2">
              <p class="center" style="text-align: left; margin-left: 16px;">
                {{$avis->agentDemandeur->emploi->nom}}
            </p>
            </td>
            <td class="ratio3">
              <p style="text-align: left; margin-left: 14px;"><b>Matricule</b></p>
            </td>
            <td class="form3">
              <p class="center">{{$avis->agentDemandeur->matricule}}</p>
            </td>
          </tr>
        </tbody>
      </table>
      <table class="random2">
        <tbody>
          <tr>
            <td class="ratio1">
              <p style="text-align: left;"><b>Direction Régionale</b></p>
            </td>
            <td class="form4">
              <p class="center" style="margin-left: 18px; text-align: left;">
                {{$avis->agentDemandeur->ecole->iep->dren->nom}}
            </p>
            </td>
            <td id="Sign" rowspan="4">
              <p>Signature de</p>
              <p>l'interressé</p>
            </td>
          </tr>
          <tr>
            <td class="ratio1">
              <p style="text-align: left;"><b>Etablissement ou Service</b></p>
            </td>
            <td class="form4">
              <p class="center" style="text-align: left; margin-left: 15px;">
                {{$avis->agentDemandeur->ecole->nom}}</p>
            </td>
            <td><br>
            </td>
          </tr>
          <tr>
            <td class="ratio1">
              <p style="text-align: left;"><b>Discipline enseignée</b></p>
            </td>
            <td class="form4" style="text-align: left;">
              <p class="center" style="text-align: left; margin-left: 13px;">
                {{$avis->agentDemandeur->discipline->nom}}</p>
            </td>
            <td><br>
            </td>
          </tr>
          <tr>
            <td class="ratio1">
              <p style="text-align: left;"><b>Fonction exercée</b></p>
            </td>
            <td class="form4" style="text-align: left;">
              <p class="center" style="text-align: left; margin-left: 11px;">
                {{$avis->agentDemandeur->fonction->nom}}</p>
            </td>
            <td><br>
            </td>
          </tr>
        </tbody>
      </table>
      <table class="randomx">
        <tbody>
          <tr>
            <td class="ratio4">
              <p><b>AVIS DE MOTIVE DU CHEF D'ETABLISSEMENT</b></p>
            </td>
            <td class="ratio5">
              <p class="center"><b>AVIS DU DIRECTEUR REGIONALE</b></p>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="Conteneur2">
      <div class="Conteneur3">
        <table class="random1">
          <tbody>
            <tr>
              <td class="ratiox"> <br>
              </td>
              <td class="ratio2">
                <p class="center"><b>ET</b></p>
              </td>
            </tr>
          </tbody>
        </table>
        <table class="random1">
          <tbody>
            <tr>
              <td class="ratio1">
                <p style="text-align: left;"><b>Nom et Prénoms</b></p>
              </td>
              <td class="form">
                <p class="center" style="text-align: left; margin-left: 11px;">
                  {{$avis->agentFavorable->user->name}}</p>
              </td>
            </tr>
          </tbody>
        </table>
        <table class="random2">
          <tbody>
            <tr>
              <td class="ratio1">
                <p style="text-align: left;"><b>Nom de jeune fille</b></p>
              </td>
              <td class="form2">
                <p class="center" style="text-align: left; margin-left: 13px;">
                  {{$avis->agentFavorable->user->maiden_name}}</p>

                </p>
              </td>
              <td class="ratio3">
                <p style="text-align: left; margin-left: 13px;"><b>Date de
                    Naissance</b></p>
              </td>
              <td class="form3">
                <p class="center">{{$avis->agentFavorable->user->birthdate->format('d/m/Y')}}</p>
              </td>
            </tr>
          </tbody>
        </table>
        <table class="random2">
          <tbody>
            <tr>
              <td class="ratio1">
                <p style="text-align: left;"><b>Emploi</b></p>
              </td>
              <td class="form2">
                <p class="center" style="text-align: left; margin-left: 13px;">
                  {{$avis->agentFavorable->emploi->nom}}
                </p>
              </td>
              <td class="ratio3">
                <p style="text-align: left; margin-left: 17px;"><b>Matricule</b></p>
              </td>
              <td class="form3">
                <p class="center">{{$avis->agentFavorable->matricule}}</p>
              </td>
            </tr>
          </tbody>
        </table>
        <table class="random2">
          <tbody>
            <tr>
              <td class="ratio1">
                <p style="text-align: left;"><b>Direction Régionale</b></p>
              </td>
              <td class="form4">
                <p class="center" style="text-align: left; margin-left: 11px;">
                  {{$avis->agentFavorable->ecole->iep->dren->nom}}</p>
              </td>
              <td id="Sign" rowspan="4">
                <p>Signature de</p>
                <p>l'interressé</p>
              </td>
            </tr>
            <tr>
              <td class="ratio1">
                <p style="text-align: left;"><b>Etablissement ou Service</b></p>
              </td>
              <td class="form4">
                <p class="center" style="text-align: left; margin-left: 10px;">
                  {{$avis->agentFavorable->ecole->nom}}</p>
              </td>
              <td><br>
              </td>
            </tr>
            <tr>
              <td class="ratio1">
                <p style="text-align: left;"><b>Discipline enseignée</b></p>
              </td>
              <td class="form4">
                <p class="center" style="text-align: left; margin-left: 9px;">
                  {{$avis->agentFavorable->discipline->nom}}</p>
              </td>
              <td><br>
              </td>
            </tr>
            <tr>
              <td class="ratio1">
                <p style="text-align: left;"><b>Fonction exercée</b></p>
              </td>
              <td class="form4">
                <p class="center" style="text-align: left; margin-left: 6px;">
                  {{$avis->agentFavorable->fonction->nom}}</p>
              </td>
              <td><br>
              </td>
            </tr>
          </tbody>
        </table>
        <table class="randomx">
            <tbody>
              <tr>
                <td class="ratio4">
                  <p><b>AVIS DE MOTIVE DU CHEF D'ETABLISSEMENT</b></p>
                </td>
                <td class="ratio5">
                  <p class="center"><b>AVIS DU DIRECTEUR REGIONALE</b></p>
                </td>
              </tr>
            </tbody>
          </table>


  <p class="title"><b>DECISION DU DIRECTEUR DES RESSOURCES HUMAINES</b></p>

  <table class="randomz">

      <tr>
        <td class="ratio4">
          <p><b>Cachet et signature</b></p>
        </td>
        <td class="ratio5">
          <p class="center"><b>A Abidjan Le {{now()->format('d/m/Y')}}</b></p>
        </td>
      </tr>

  </table>

  <p><b>NB :</b> La permutation se fait entre deux agents de la même qualification.</p>

  </div>

</div>

  </page>
</body>
</html>
