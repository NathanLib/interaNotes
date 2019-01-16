<button class="btn btn-primary popUp" type="button" name="button">Pute</button>
<div class="box">

    <div class="form-wrapper">
        <form method="post" action="#">

            <div>
                <input id="<?php echo 'saisieParametre1' ?>" type="text" placeholder="Nouvelle valeur" onkeypress="return ajouterValeurDeParametre(event)">

                <select id="<?php echo 'parametre1' ?>"></select>

                <div class="form-group divMdpButton">
                    <input class="detailMdpButton" type="button" value="Valider" class="btn"/>
                </div>

            </form>
        </div>
    </div>
