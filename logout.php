<?php

include("logica-usuario.php");

logout();

header("Location: index.php?logout=true");

die();