<?php if(isset($_SESSION['prof'])) {
    header('Location: index.php?page=1');
} if(!isset($_SESSION['eleve'])){
    header('Location: index.php?page=0');
}?>