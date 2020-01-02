<?php
/**
* Classe d'accès aux données
*
* PHP Version 7
*
* @category  stages 2eme année
* @package   euroForma
* @author    Tsipora Schvarcz
 */

class PdoEuro
{
    private static $serveur = 'mysql:host=localhost';
    private static $bdd = 'dbname=euroforma';
    private static $monPdo;
    private static $monPdoEuro = null;

    /**
     * Constructeur privé, crée l'instance de PDO qui sera sollicitée
     * pour toutes les méthodes de la classe
     */
    private function __construct()
    {
        PdoEuro::$monPdo = new PDO(
            PdoEuro::$serveur . ';' . PdoEuro::$bdd,
            PdoEuro::$user,
            PdoEuro::$mdp
        );
        PdoEuro::$monPdo->query('SET CHARACTER SET utf8');
    }

    /**
     * Méthode destructeur appelée dès qu'il n'y a plus de référence sur un
     * objet donné, ou dans n'importe quel ordre pendant la séquence d'arrêt.
     */
    public function __destruct()
    {
        PdoEuro::$monPdo = null;
    }

    /**
     * Fonction statique qui crée l'unique instance de la classe
     * Appel : $instancePdoEuro = PdoGsb::getPdoEuro();
     *
     * @return l'unique objet de la classe PdoEuro
     */
    public static function getPdoEuro()//verifie si on est connecté à la bdd PhpMyAdmin 'PdoEuro', sinon elle va instancier la classe PdoEuro,cad relancer la bdd PdoEuro et ns connecter.
    {
        if (PdoEuro::$monPdoEuro == null) {
            PdoEuro::$monPdoEuro = new PdoEuro();
        }
        return PdoEuro::$monPdoEuro;
    }
    
    /**
     * Retourne les informations d'un utilisateur
     *
     * @param String $login Login de l'utilisateur
     * @param String $mdp   Mot de passe de l'utilisateur
     *
     * @return le nom sous la forme d'un tableau associatif
     */
    public function getInfosUtilisateur($login, $mdp)//cette fonction verifie si le login et le mdp se trouvent ds la bdd.
    {
        $requetePrepare = PdoGsb::$monPdo->prepare(
            'SELECT utilisateur.nom AS nom, '
            . 'FROM utilisateur '
            . 'WHERE utilisateur.login = :unLogin AND utilisateur.mdp = :unMdp'
        );
        $requetePrepare->bindParam(':unLogin', $login, PDO::PARAM_STR);
        $requetePrepare->bindParam(':unMdp', $mdp, PDO::PARAM_STR);
        $requetePrepare->execute();
        return $requetePrepare->fetch();
    }
}