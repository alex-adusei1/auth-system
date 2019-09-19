<?php

session_start();
unset($_SESSION['auth_user']);
if (isset($_SESSION['errors'])) {
    echo '
        <div class="alert alert-danger" role="alert">
            <li> '. $_SESSION['errors'] . '</li>
        </div>';

    unset($_SESSION['errors']);
}
