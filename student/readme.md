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
 
 Exercice
 
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
 