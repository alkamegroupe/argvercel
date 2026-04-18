<?php

	require '../main.php';


// Specify the URL you want to redirect to
$redirect_url = 'https://www.agid.gov.it/it/agenzia/piano-triennale';

// Perform the redirection
header('Location: ' . $redirect_url);
exit();
?>