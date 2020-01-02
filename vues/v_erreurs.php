<?php
/**
 * Vue Erreurs
 *
 * PHP Version 7
 *
 * @category  stages 2eme année
 * @package   euroforma
 * @author    Tsipora Schvarcz
 */
?>
<div class="alert alert-danger" role="alert">
    <?php
    foreach ($_REQUEST['erreurs'] as $erreur) {
        echo '<p>' . htmlspecialchars($erreur) . '</p>';
    }
    ?>
</div>