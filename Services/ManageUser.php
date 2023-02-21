<?php
class ManageUser{
    private $id;
    public $login, $password;

    function __construct($login, $password) {
        $this->login = $login;
        $this->password = $password;
    }


    public function register(){
        global $bdd;
        $check_login = $bdd ->prepare("SELECT count(*) as count FROM utilisateurs where login = '$this->login'");
        $check_login->execute();
        $res = $check_login->fetch(PDO::FETCH_ASSOC);        
        $count = intval($res['count']);
        if ($count>0){
            $error_login="<div id='error-message'>Un utilisateurs avec ce login existe déjà !!! </div>";          
            return $error_login;
        }else{
                $newPeople = $bdd->prepare("INSERT INTO utilisateurs ( login, password)
                 VALUES(?,? )");
               $newPeople->execute(array($this->login,$this->password));
               return "Vous avez ajouté un nouvel utilisateur avec succès";
        }
    }




    public function connect($login, $password){
        global $bdd;
        $this->password=$password;
        $this->login = $login;
        $check_login = $bdd ->prepare("SELECT count(*) as count FROM utilisateurs where login = '$this->login'");
        $check_login->execute();
        $res = $check_login->fetch(PDO::FETCH_ASSOC);
        //echo var_dump($res);
        $count = intval($res['count']);
        if($count!=0){

           $allInfo = $bdd -> prepare("SELECT * FROM utilisateurs WHERE login = '$this->login'");
            $allInfo -> execute();
            $result = $allInfo->fetch(PDO::FETCH_ASSOC);
            $resultId = $result ['id'];
            $resultPassword = $result ['password'];
            $resultLogin = $result ['login'];
            if(($password===$resultPassword)&&($login===$resultLogin)){
                $_SESSION['id'] = $resultId;
                $_SESSION['login'] = $login;
                $_SESSION['password'] = $password;
                $message = "Vous êtes connecté ".$login;
                return $message;
            }else{
                $error_login= "<div id='error-message'>Problème d'identifiant, veuillez vérifier votre login et votre mot de passe </div>";
                return $error_login;
            }
        }else{
            return "Ce login n'existe pas !";
        }
    }
}

?>