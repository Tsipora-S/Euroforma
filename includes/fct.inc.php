<?php
/**
* Fonctons pour l'application Euroforma
*
* PHP Version 7
*
* @category  stages 2eme année
* @package   euroForma
* @author    Tsipora Schvarcz
 */

/**
 * Teste si un quelconque utilisateur est connecté
 *
 * @return vrai ou faux
 */
function estConnecte()
{
   return isset($_SESSION['idUtilisateur']);// est ce qu'il ya un id dans la super global session
}

/**
 * Ajoute le libellé d'une erreur au tableau des erreurs
 *
 * @param String $msg Libellé de l'erreur
 *
 * @return null
 */
function ajouterErreur($msg)
{
    if (!isset($_REQUEST['erreurs'])) {
        $_REQUEST['erreurs'] = array();
    }
    $_REQUEST['erreurs'][] = $msg;
}

/**
 * Enregistre dans une variable session les infos d'un utilisateur
 *
 * @param String $nom        Nom de l'utilisateur
 *
 * @return null
 */
function connecter($nom)
{
   $_SESSION['nom'] = $nom;
}