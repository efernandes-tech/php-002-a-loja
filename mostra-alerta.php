<?php

session_start();

function mostraAlerta($tipo) {
    if (isset($_SESSION[$tipo])) {
?>
        <p class="alert-<?php echo $tipo; ?>"><?php echo $_SESSION[$tipo]; ?></p>
<?php
        unset($_SESSION[$tipo]);
    }
}