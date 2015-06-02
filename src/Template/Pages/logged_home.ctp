Das ist die eingeloggte Seite!

<?php
$user = $this->session->request()->read('user');
echo $user;
?>