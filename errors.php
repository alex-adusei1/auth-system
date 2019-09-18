<?php

session_start();
if (isset($_SESSION['errors'])) {
    echo '
        <div class="alert alert-danger" role="alert">
            <li> '. $_SESSION['errors'] . '</li>
        </div>';

    unset($_SESSION['errors']);
}
