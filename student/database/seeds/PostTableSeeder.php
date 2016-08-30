<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Supprimer les images avant si le dossier images est non vide
        $upload = public_path('images'); // path dossier images dans le dossier public

        $files = File::allFiles($upload);

        foreach ($files as $file) {
            File::delete($file);
        }

        // pour chaque post créé on va associé une image
        // use pour les fonctions anonymes récupère la variable dans le contexte du script englobant
        factory(App\Post::class, 15)->create()->each(function ($post) use ($upload) {

            // récupérer le fichier source sur le web à l'aide de la fonction PHP
            $fileName = file_get_contents('http://lorempicsum.com/futurama/400/200/' . rand(1, 9));

            // enregistrer l'image dans le dossier images du dossier public

            $uri = str_random(30) . '.jpg'; // nom aleatoire pour l'image

            File::put(
                $upload . '/' . $uri, $fileName
            );

            // Eloquent modifier la valeur thumbnail pour ce post
            $post->thumbnail = $uri;

            //$tags =  App\Tag::lists('id');

            //$max = rand(1, count($tags));

            //$post->tags()->attach(array_slice($tags->all(), $max));

            $tmp = [1,2,3,4,5,6];

            shuffle($tmp);

            $tags = array_slice($tmp, rand(1,6));

            $post->tags()->attach($tags);

            $post->save(); // update
        });
    }
}
