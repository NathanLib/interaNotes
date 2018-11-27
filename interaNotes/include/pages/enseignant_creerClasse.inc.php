<div class="row createClass">
    <div class="col-12 col-md-6">
        <div class="row">
            <div class="col-12">
                <label>Nom de la promotion :</label>
            </div>
            <div class="col-8 inputNameClass">
                <input type="text" name="" value="" placeholder="Promo 1A">
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <label>Année de la promotion :</label>
            </div>
            <div class="col-8 inputYearClass">
                <input type="text" name="" value="" placeholder="20../20..">
            </div>
        </div>

        <div class="row">
            <div class="col-12 importStudent">
                <img class="" src="image/plus.png" alt="plus" title="plus">
                <p>Importer un fichier d'élèves</p>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6 listImportStudent">
        <table class="table table-hover">
            <caption>Liste des élèves importés</caption>
            <thead class="thead-dark">
                <tr>
                    <th scope="col" style="border-radius: 20px 0 0 0;">#</th>
                    <th scope="col">Prénom</th>
                    <th scope="col" style="border-radius: 0 20px 0 0;">Nom</th>
                </tr>
            </thead>
            <tbody>
                <?php // WARNING: 1 seule bloc tr à garder pour la génération en php ?>
                <tr>
                    <th scope="row">1</th>
                    <td>Harry</td>
                    <td>Potter</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Hermione</td>
                    <td>Granger</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Dobby</td>
                    <td>LeShlag</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
