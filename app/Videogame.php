<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Cette classe représente nos données de la table videogame de la bdd
 */
class Videogame extends Model
{

    //notre table est au singulier, donc on spécifie le nom ici ! 
    protected $table = "videogame";

    //on n'a pas de colonnes de date !!!
    public $timestamps = false;

    //totalement optionnel
    //mais ce $with permet de demander à Eloquent de systématiquemnt charger les platforms en même temps que les jeux vidéos
    //ça évite de faire 10000 requêtes dans certains cas. 
    public $with = ['platform'];

    //cette méthode crée la RELATION eloquent entre Videogame et Platform
    //voir la doc ici : https://laravel.com/docs/6.x/eloquent-relationships#defining-relationships
    //ici, relation One2One
    public function platform()
    {
        //le 1er argument est le FQCN de la classe associée (le nom de la classe précédée de son namespace)
        //le 2e argument permet de spécifier le nom de la colonne contenant la clef étrangère
        //le 3e argument permet de spécifier la colonne de clé primaire dans la table (id par défaut, on peut toujours laisser vide le 3e argument nous)
        return $this->belongsTo('App\Platform', 'platform_id', 'id');
    }
}
