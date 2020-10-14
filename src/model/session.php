<?php


class session
{
    protected $id;
    protected $login;
    protected $table = "admin";

    public static function checkLogin() {
        global $bdd;

        // Rôle : Vérifier si le login existe dans la table utilisateurs ou admin
        // Retour : $_SESSION["login"] = admin si dans admin, = user si utilisateur, false sinon
        if (isset($_POST["login"]) && isset($_POST["password"])) {

            $sql = "SELECT * FROM `admin` WHERE `login` = :login";
            $req = $bdd->prepare($sql);


            if (!$req->execute([":login" => $_POST["login"]])) {
                echo "La requête $sql ne s'est pas éxécuté correctement";
                return false;
            }


            $admin = false;

            if ($req->rowCount() === 1) {
                $admin = self::checkPassword($_POST["password"], $req);
            }

            if ($admin){
                $_SESSION["login"] = "admin";
                return true;
            }

            return false;
        }
    }

    private static function checkPassword($password, $req) {
        // Vérifier la correspondance des hash entre le password saisi et celui stocké
        // Paramètres : POST_PASSWORD et la requête pour tester l'existence du login
        // Retourne true or false;

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            if (password_verify($password, $ligne["password"])) {
                return true;
            }
            return false;
        }
    }

    public static function deconnection() {
        // Rôle : Se déconnecter
        $_SESSION["login"] = "";
    }
}