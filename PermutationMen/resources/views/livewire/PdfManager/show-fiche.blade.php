
@section('contenu')

<div class="container">

  <form method="GET" action="pdf">

    @csrf

    <section class="container">

      <strong>

        <div class="d-flex">

            <div class="p-2">

              <div class="d-flex flex-column">

                <p>MINISTERE DE L'EDUCATION NATIONALE</p><p>ET DE L'ENSEIGNEMENT TECHNIQUE</p>
                <p class="align-self-center">----------------</p>
                <input class="form-control-plaintext" type="text" placeholder="DIRECTION DES RESSOURCES HUMAINES" readonly>

                <input class="form-control-plaintext" type="text" placeholder="BP 807 Abidjan 04 - Tél : 20-21-90-47" readonly>

              </div>

            </div>

            <div class="ml-auto p-2">

              <div class="d-flex flex-column">

                <p>REPUBLIQUE DE COTE D'IVOIRE</p>
                <p class="align-self-center">----------------</p>
                <p class="align-self-center">Union- Discipline- Travail</p>

              </div>

            </div>

        </div>

      </strong>

    </section>

    <strong>

    <div class="d-flex flex-column">

        <p class="align-self-center">DEMANDE DE PERMUTATION</p>

        <div class="align-self-center">

            <div class="input-group mb-3">

              <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon3">ANNEE SCOLAIRE</span>

              </div>

              <input type="text" class="form-control bg-light" id="basic-url" aria-describedby="basic-addon3" placeholder="20........../20.........." readonly>

            </div>

        </div>

        <div class="container">

          <div class="row">

            <div class="col-md-auto">

              <b>NB :</b>

            </div>

            <div class="col-md-auto">

              <ul>

                <li>Nul ne peut postuler en même temps pour les INEAT, les EXEAT et les Permutations.</li>
                <li>Toute demande d'EXEAT validée ne peut être annulée.</li>

              </ul>

            </div>

          </div>

        </div>

      </div>

    </strong>

    <div class="container">

        <div class="row">

          <div class="col">Ecrivez en lettres majuscules</div>

          <div class="col">

            <div class="align-self-center"><b>ENTRE</b></div>

          </div>

        </div>

      <div class="input-group mb-3">

              <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon3">Nom et prénoms</span>

              </div>

              <input type="text" class="form-control bg-light" id="basic-url" aria-describedby="basic-addon3" placeholder="Gloudoueu Michel Wilfried" readonly>

      </div>

     <div class="input-group mb-3">

              <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon3">Nom de jeune fille</span>

              </div>

              <input type="text" class="form-control bg-light" id="basic-url" aria-describedby="basic-addon3" readonly>

              <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon3">Date de Naissance</span>

              </div>

              <input type="date" class="form-control bg-light" id="basic-url" aria-describedby="basic-addon3" readonly>

      </div>

      <div class="input-group mb-3">

              <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon3">Matricule</span>

              </div>

              <input type="text" class="form-control bg-light" id="basic-url" aria-describedby="basic-addon3" readonly>

              <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon3">Emploi</span>

              </div>

              <input type="text" class="form-control bg-light" id="basic-url" aria-describedby="basic-addon3" readonly>

      </div>

     <div class="input-group mb-3">

              <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon3">Direction Régionale</span>

              </div>

              <input type="text" class="form-control bg-light" id="basic-url" aria-describedby="basic-addon3" readonly>

      </div>

      <div class="input-group mb-3">

              <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon3">Etablissement ou Service</span>

              </div>

              <input type="text" class="form-control bg-light" id="basic-url" aria-describedby="basic-addon3" readonly>

      </div>

      <div class="input-group mb-3">

              <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon3">Discipline enseignée</span>

              </div>

              <input type="text" class="form-control bg-light" id="basic-url" aria-describedby="basic-addon3" readonly>

      </div>

      <div class="input-group mb-3">

              <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon3">Fonction exercée</span>

              </div>

              <input type="text" class="form-control bg-light" id="basic-url" aria-describedby="basic-addon3" readonly>

      </div>

      <strong>

      <div class="row">

        <div class="col">AVIS DE MOTIVE DU CHEF D'ETABLISSEMENT</div>
        <div class="col">AVIS DU DIRECTEUR REGIONALE</div>

      </div>

      </strong>

    <div class="mt-5">

      <button class="btn btn-primary" href="/pdf">

          Télécharger

      </button>

    </div>



  </form>



  <form class="mt-5" method="POST" action="pdf">

    @csrf

  <div class="container">

      <div class="row justify-content-md-center">

        <div class="col-md-auto">

          <b>ET</b>

        </div>

      </div>

      <div class="input-group mb-3">

              <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon3">Nom et prénoms</span>

              </div>

              <input type="text" class="form-control bg-light" id="basic-url" aria-describedby="basic-addon3" readonly>

      </div>

     <div class="input-group mb-3">

              <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon3">Nom de jeune fille</span>

              </div>

              <input type="text" class="form-control bg-light" id="basic-url" aria-describedby="basic-addon3" readonly>

              <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon3">Date de Naissance</span>

              </div>

              <input type="date" class="form-control bg-light" id="basic-url" aria-describedby="basic-addon3" readonly>

      </div>

      <div class="input-group mb-3">

              <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon3">Matricule</span>

              </div>

              <input type="text" class="form-control bg-light" id="basic-url" aria-describedby="basic-addon3" readonly>

              <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon3">Emploi</span>

              </div>

              <input type="text" class="form-control bg-light" id="basic-url" aria-describedby="basic-addon3" readonly>

      </div>

     <div class="input-group mb-3">

              <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon3">Direction Régionale</span>

              </div>

              <input type="text" class="form-control bg-light" id="basic-url" aria-describedby="basic-addon3" readonly>

      </div>

      <div class="input-group mb-3">

              <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon3">Etablissement ou Service</span>

              </div>

              <input type="text" class="form-control bg-light" id="basic-url" aria-describedby="basic-addon3" readonly>

      </div>

      <div class="input-group mb-3">

              <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon3">Discipline enseignée</span>

              </div>

              <input type="text" class="form-control bg-light" id="basic-url" aria-describedby="basic-addon3" readonly>

      </div>

      <div class="input-group mb-3">

              <div class="input-group-prepend">

                <span class="input-group-text" id="basic-addon3">Fonction exercée</span>

              </div>

              <input type="text" class="form-control bg-light" id="basic-url" aria-describedby="basic-addon3" readonly>

      </div>

  <strong>

    <div class="row">

      <div class="col">AVIS DE MOTIVE DU CHEF D'ETABLISSEMENT</div>
      <div class="col">AVIS DU DIRECTEUR REGIONALE</div>

    </div>

  </strong>

  </div>

  </form>

  <form class="mt-5" method="POST" action="">

    <div class="container">

      <div class="row justify-content-md-center">

          <div class="col-md-auto">

            <div class="d-grid gap-3">

              <span class="p-2 bg-light border"><b>DECISION DU DIRECTEUR DES RESSOURCES HUMAINES</b></span>

            </div>

          </div>

      </div>

          <div class="row mt-5">

            <div class="col">

              <b>Cachet et signature</b>

            </div>

            <div class="col">

              <div class="input-group mb-3">

                  <div class="input-group-prepend">

                    <span class="input-group-text" id="basic-addon3">A</span>

                  </div>

                  <input type="text" class="form-control bg-light" id="basic-url" aria-describedby="basic-addon3" readonly>

                  <div class="input-group-prepend">

                    <span class="input-group-text" id="basic-addon3">Le</span>

                  </div>

                  <input type="text" class="form-control bg-light" id="basic-url" aria-describedby="basic-addon3" readonly>

                  <div class="input-group-prepend">

                    <span class="input-group-text" id="basic-addon3">20</span>

                  </div>

                  <input type="number" class="form-control bg-light" id="basic-url" aria-describedby="basic-addon3" readonly>

              </div>

            </div>

        </div>

        <div class="mt-5">

          <p><b>NB :</b> La permutation se fait entre deux agents de la même qualification.</p>

        </div>

    </div>

  </form>

</div>



@endsection
