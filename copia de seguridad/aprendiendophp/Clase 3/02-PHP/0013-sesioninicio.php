<?php
    session_start();
    
    $_SESSION['miedad'] = 44;
    echo "Que sepas que tu edad es de ".$_SESSION['miedad'];

?>
<a href="0014-sesiondestino.php">Vamos a otra página</a>