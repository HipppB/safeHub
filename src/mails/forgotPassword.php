<?php
/**
 * @var $token string
 */
?>

<h1>Vous avez demandé à réinitialiser votre mot de passe</h1>

<p>
    Pour réinitialiser votre mot de passe, veuillez cliquer sur le lien ci-dessous:
</p>
<a href="<?php echo $_ENV['DOMAIN_NAME'] . '/resetPassword?token=' .$token ?>">Réinitialiser mon mot de passe</a>
