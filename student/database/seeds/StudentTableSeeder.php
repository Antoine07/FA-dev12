<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Supprimer les images avant si le dossier images est non vide
        $upload = public_path('avatars'); // path dossier images dans le dossier public

        $files = File::allFiles($upload);

        foreach ($files as $file) {
            File::delete($file);
        }

        factory(App\Student::class, 10)->create()->each(function ($student) use ($upload) {

            $fileName = file_get_contents('http://lorempicsum.com/simpsons/255/200/' . rand(1, 9));
            $uri = str_random(30) . '.jpg'; // nom aleatoire pour l'image

            File::put(
                $upload .'/'. $uri, $fileName
            );

            // créé une ligne dans la table avatars en récupérant student_id
            $student->avatar()->create(['uri' => $uri, 'name' => $student->name]);


        });
    }
}
