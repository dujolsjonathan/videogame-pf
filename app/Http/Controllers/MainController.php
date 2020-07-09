<?php 

namespace App\Http\Controllers;


use App\Platform;
use App\Utils\UserSession;
use App\Videogame;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class MainController extends Controller 
{
    function home(Request $request) {

        // dump($_SESSION);

        $order = $request->input('order', 'id');
        $videogames = Videogame::orderBy($order, 'DESC')->get();

        // je passe les données provenant de la bdd à la vue
        return view('home', [
            'videogames' => $videogames,
        ]);
    }

    //cette méthode ne sert qu'à AFFICHER le formulaire d'ajout
    function admin(){

        //verrouille pour les admins only
        UserSession::vipOnly();

        return view('admin', [
            //va chercher les plateformes dans la bdd et les passe à la vue !
            'platforms' => Platform::all()
        ]);

    }

    //cette méthode sert à TRAITER le formulaire lorsqu'il est soumis (en POST)
    function handleAddVideogame(Request $request){

        //verrouille pour les admins only
        UserSession::vipOnly();

        //crée une instance de notre class videogame
        $videogame = new Videogame();

        //récupère les données du form à la sauce Lumen
        $name = $request->input('name', '');
        $editor = $request->input('editor', '');
        $release_date = $request->input('release_date', '');
        $platform_id = $request->input('platform', '');

        $errorsList = [];
        if (empty($name)){
            $errorsList['name'] = 'Veuillez renseigner le nom du jeu !'; 
        }
        
        if (empty($editor)){
            $errorsList['editor'] = 'Veuillez renseigner l\'éditeur du jeu !'; 
        }

        $dateRegex = "/^[0-9]{4}\/[0-9]{2}\/[0-9]{2}$/";
        if (!preg_match($dateRegex, $release_date)){
            $errorsList['release_date'] = "Votre date doit être au format yyyy/mm/dd";
        }

        //si on n'a pas d'erreur... on sauvegarde
        if(empty($errorsList)){
            //hydrate l'instance avec les données du form
            $videogame->name = $name;
            $videogame->editor = $editor;
            $videogame->release_date = $release_date;
            $videogame->platform_id = $platform_id;

            //insère dans la bdd
            $videogame->save();


            //rediriger vers la page d'accueil
            return redirect()->route('home');
        }
        //sinon, on a des erreurs
        else {
            return view('admin', [
                //va chercher les plateformes dans la bdd et les passe à la vue !
                'platforms' => Platform::all(),
                'errorsList' => $errorsList
            ]);
        }
    }



    public function toto(int $id)
    {
         //affiche le fichiers resources/views/toto.php 
        return view('toto', ["id" => $id, "name" => "toto"]);
    }

    public function contact(Request $request)
    {
        //traitement du formulaire ici ! 
        $page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
        $page = $request->input('page', 1);

        if ($page == 12){
            return redirect()->route('toto-page', ['id' => 666]);
        }

        return view('contact');
    }
}