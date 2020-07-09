<?php 

namespace App\Http\Controllers;

use App\AppUser;
use App\Utils\UserSession;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function signup()
    {
        return view('user/signup', [

        ]);
    }

    public function signupPost(Request $request)
    {
        //je récupère chacune des données du formulaire
        $email = $request->input('email');
        $password = $request->input('password');
        $password_confirm = $request->input('password_confirm');

        //stocke les messages d'erreur
        $errorsList = [];

        //validation de l'email
        if (empty($email)){
            $errorsList[] = "Veuillez renseigner votre email dude !";
        }
        //email valide ? 
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errorsList[] = "Email invalide !";
        }

        //validation du password 
        if (empty($password)){
            $errorsList[] = "Veuillez choisir un mdp tabarnak !";
        }
        //longueur minimale 
        elseif(strlen($password) < 8){
            $errorsList[] = "8 caractères minimum svp !";
        }

        //les mdps sont-ils pareils ?
        if ($password !== $password_confirm){
            $errorsList[] = "Vos mdps ne correspondent pas ! Faiiiil.";
        }
        
        //requête pour aller voir si l'email existe déjà en bdd
        $foundEmail = AppUser::where('email', $email)->first();

        //si on a trouvé l'email dans la bdd...
        if ($foundEmail){
            $errorsList[] = "Cet email est déjà inscrit ici !";
        }

        //si je n'ai pas d'erreurs
        if (empty($errorsList)){
            
            //crée une instance de mon modèle
            $user = new AppUser();

            //hydrate des propriétés
            $user->email = $email;

            //hashage du mdp ! 
            $hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 13]);

            //et c'est le hash qu'on sauvegarde
            $user->password = $hash;
            $user->role = 'user';

            //exécuter l'insert 
            $user->save();

            //connecte le user 
            UserSession::connect($user);

            return redirect()->route('home');
        }

        return view('user/signup', [
            'errors' => $errorsList
        ]);
    }

    //affiche le form
    public function signin()
    {
        return view('user/signin');
    }

    //traite le form
    public function signinPost(Request $request)
    {
        //je récupère chacune des données du formulaire
        $email = $request->input('email');
        $password = $request->input('password');

        //je récupère le user dans la bdd (s'il existe bien)
        $foundUser = AppUser::where('email', $email)->first();

        //si on a trouvé le user dans la bdd...
        if ($foundUser){

            //vérification du mot de passe
            $isPasswordOK = password_verify($password, $foundUser->password);

            //si c'est bon...
            if ($isPasswordOK){
                //connecte le user
                
                UserSession::connect($foundUser);

                //redirige le user vers l'accueil
                return redirect()->route('home');
            }

        }

        return view('user/signin', [
            'isValid' => false
        ]);
    }

    public function signout()
    {
        //on appelle notre méthode qui déconnecte le user
        UserSession::disconnect();

        //à tout coup, on redirige vers la home
        //pas besoin de template ici ! 
        return redirect()->route('home');
    }
}