
<div class="row createClass">
    <?php if (empty($_POST['annee'])) { ?>
        <form action="index.php?page=9" method="post" enctype="multipart/form-data" name="form1"> 
            <div class="col-12 col-md-6">
                <div class="row">
                    <div class="col-12">
                        <label>Nom de la promotion :</label> 
                    </div>
                    <div class="col-8 inputNameClass">
                        <input type="text" name="nom" value="" placeholder="Promo 1A" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <label>Année de la promotion :</label>
                    </div>
                    <div class="col-8 inputYearClass">
                        <input type="text" name="annee" value="" placeholder="20../20.." required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 importStudent">
                        <div class="box">
                            <input type="file" name="file-3[]" id="file-3" class="inputfile inputfile-3" />
                            <label for="file-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                    <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                                </svg>
                                <span>Choisissez un fichier&hellip;</span>
                            </label>
                        </div>
                    </div>
                </div>
                <input type="submit" name="Submit" value="Importer"> 
            </div>

        </div>
    </form>

<?php } else { 
    if (isset($_FILES['file'])) { 

        $file = $_FILES['file']['tmp_name']; 
        $handle = fopen($file,'r'); 
        $row = 1; 
        $handle = fopen("$file", "r");

        while (($data = fgetcsv($handle, 4096, ",")) !== FALSE) { 
            $num = count($data); 
            echo "<br/>";
            $row++; 
            for ($c=0; $c < $num; $c++) {
                $eleves[] = $data[0];
            }
        }
        
        $db = new Mypdo();
        $personneManager = new personneManager($db);

        $personneManager->importEleves($eleves,$_POST['annee']);
    }?>
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
                <?php $listeEleves = $personneManager->getAllEleveAnnee($_POST['annee']);
                foreach ($listeEleves as $attribut => $value) {
                 ?>
                 <tr>
                    <th scope="row"><?php echo $value->getIdPersonne() ?></th>
                    <td><?php echo $value->getPrenomPersonne()?></td>
                    <td><?php echo $value->getNomPersonne()?></td>
                </tr>

            <?php } ?>

        </tbody>
    </table>
</div>
<?php } ?>
</div>
