<?php 

namespace App\Utils;

use App\AppUser;

//cette classe gère tout ce qui a trait aux sessions du user ! 

abstract class UserSession 
{
    const SESSION_INDEX_NAME = 'connectedUser';

    /**
     * Connecte notre utilisateur !
     */
    public static function connect($user)
    {
        //connecte le user
        $_SESSION[self::SESSION_INDEX_NAME] = $user->id;
    }

    /**
     * Déconnecte notre user
     */
    public static function disconnect()
    {
        //en supprimant les données contenues sous cette clef,
        //on supprime de fait les données de session du user
        unset($_SESSION[self::SESSION_INDEX_NAME]);
    }

    /**
     * Retourne true ou false en fonction de si le user est connecté
     */
    public static function isConnected()
    {
        //si la session est vide, alors on retourne false
        //sinon, on retourne true
        return !empty($_SESSION[self::SESSION_INDEX_NAME]);
    }

    /**
     * Retourne les infos du user connecté
     */
    public static function getUser():? \App\AppUser
    {
        //si l'utilisateur n'est pas connecté... 
        if (!self::isConnected()){
            //on retourne null
            return null;
        }

        //on a besoin de l'id du user pour faire la requête à la bdd
        $connectedUserId = $_SESSION[self::SESSION_INDEX_NAME];

        //retourne toute la ligne de cet user 
        return AppUser::find($connectedUserId);
    }

    /**
     * Verrouille une page pour qu'elle ne soit accessible que par les admins
     */
    public static function vipOnly()
    {
        //si le user n'est pas connecté... 
        if (!self::isConnected()){
            //redirige vers le login 
            header("Location: " . route("signin"));
            die();
        }
        //si le user est connecté mais qu'il n'est pas un admin 
        else {
            if (self::getUser()->role !== "admin"){
                header('HTTP/1.0 403 Forbidden');
                die("fucker, dégage");
            }
        }
    }
}