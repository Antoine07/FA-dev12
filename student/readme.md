# Exercice;

Mettre en place un menu principal dans la page home.php et dans la page affichant tous les posts d'une catégorie (ajouter la vue correspondante).

Le menu doit être fonctionnel, si on clique sur la catégorie PHP ou MySQL vous afficherez les articles s'y trouvant.

# Exercice

Exercice

- Réfléchir à la relation entre les posts et les users, sachant que l'on a déjà un champ author dans la table posts.
Un post a un auteur ou acun, et un auteur est associé à 0 à N post(s)

- Trouvez et modifiez la/les table(s) de la base de données pour rendre effectif cette relation.

- Ajoutez des données d'exemple: 
des posts ayant des auteurs (posts et users)

- Affichez dans les vues les noms des auteurs des posts

#Exercice 
 
 Affichez les mots clés sous chaque article, rendre cliquable ces mots clés; chaque lien, une fois cliqué, affichera les articles ayant rapport à ce mot clé.
 
 tag.blade.php
 
 #vhost
 ```bash
<VirtualHost *:80>
    ServerAdmin webmaster@dummy-host2.example.com
    DocumentRoot "C:/xampp/htdocs"
    ServerName localhost
    ErrorLog "logs/localhost.com-error.log"
    CustomLog "logs/localhost.com-access.log" common
</VirtualHost>
<VirtualHost *:80>
 ServerAdmin tony@tony.fr
 DocumentRoot "C:/xampp/htdocs/student/public"
 ServerName student.local
 
 <Directory "C:/xampp/htdocs/student/public">
     Options Includes FollowSymLinks MultiViews
     AllowOverride All
     Require all granted
 </Directory>

</VirtualHost>
 ```
 
 # Exercice
 
 pour les resources (vues) faites un dossier admin et un sous dossier post
 
 La vue create.blade.php dans laquelle vous créez un formulaire (un champ title) qui se connectera avec le verb POST à l'URI admin/post. Rappelons que cette action vous permettra de récupérer les données POST pour créer une nouvelle ligne dans la table posts (plus tard)
 
 Pour afficher votre formulaire utiliser l'URI admin/post/create, c'est lorsque vous allez appuyez sur le submit de ce formulaire, que vous enverrez les données POST à l'URI admin/post (méthode store)
 
 Dans votre formulaire, il vous faudra ajouter un token de sécurité, l'application doit être sûr que c'est bien elle qui vous a envoyé le formulaire
 
 <form>
 {{crsf_field()}}
 </form>
 
 admin/post
 
     index.blade.php
     create.blade.php
 
 # Exercice  Correction

 function check_radio($name, $value, $default=null)
 {
     $old = old($name); // récupère la valeur du champ si déjà envoyé elle est != de empty
 
     if (!is_null($default) && empty($old)) return 'checked';
 
     if (old($name) == $value) return 'checked';
 }
 
 
 Utilisations
 check_radio('status', 'unpublished', 'checked');  // préselectionne
 check_radio('status', 'unpublished');
 
 
 Ajoutez maintenant, la possibilité dans la création d'une ressource post, d'associer des tags. 
 Clairement, ici vous devez mettre en place un choix multiples de tags.
 
 
 $post->attach($request->tags);  // $request->tags récupère dans votre formulaire les données input type tags
 
 $request->input('tags') équivalent à $request->tags 
 
 select multiple name="tags[]"  dans votre controleur vous récupèrez un tableau $request->tags
 
 # Exercice mise à jour d'un post
 
 Implémentez le code de l'action update du controller PostController. Mettre en place la mise jour d'un post dans le CRUD.
 1/ admin/post/{1}/edit  connecter à PostController@edit method GET
 2/ admin/post/{1}  connecter à PostController@update method PUT
 
 Exercice
 Affichez l'ensemble des posts dans le backoffice pour l'action index.
 
 admin/post connecté à l'action index => affichez l'ensemble des posts.
 
 Présentez ces posts dans un tableau, avec respectivement les champs suivants:
 
 statut | title | date de plublication | nom de la catégorie |  delete 
 
 Exercice
 Rendre cliquable les titres de vos articles, ces liens conduisent vers la page de l'édition de l'article (@edit)
 
 - Ajoutez un bouton permettant la création d'un nouvel article (post) @create
 
 Exercice
 Ajoutez la gestion des tags dans le CRUD. Pour la création d'un post (checkbox multiple) et 
 pour la mise à jour.
 
 Exercice
 Créez une vue login.blade.php avec les champs email et password. Vous devez égaletment
 gérer les routes suivantes:
 login et logout (pour se déloguer). Ces routes seront connectées aux actions du
 Controller LoginController suivantes: login qui affichera et traitera les don.
 l'action du formulaire de login aura pour URI: login
 
 Indications:
 Route::any('login', 'LoginController@login'); 
 
 Exercice
 create.blade.php 
 
 ajouter un champ file et soyez attentif, vérifiez que votre formulaire est bien capable d'envoyer des fichiers ...
 Je vous rappelle le code 
 form enctype="multipart/form-data" method="post"
 
 Exercice
 
 Côté 
 méthode store, premièrement vérifiez que l'on a bien un fichier qui est une image dans les validates 
 
 	$this->validate($request, [
 		// ...
 		'thumbnail' => 'image|max:2000'
 	]);
 
 Exercice
 Faire l'upload d'image pour la partie update, avec les contraintes suivantes:
 1/ Si aucune image présente pour un post => affiche le champ file
 2/ Si il y a une image, ajouter un champ supprimer l'image et le champ file pour le remplacement de l'image
 
 
 
 
 
 
 
 
 
 
 
 
 