#  [PROJET] Récupération d'e-mails à partir d'une URL

Le projet a été entièrement réalisé de zéro en PHP, HTML, CSS et jQuery, combiné au framework [Medoo](https://medoo.in/).

## Bases du projet

Le projet étant un exercice proposé dans le cadre d'une formation développeur web / web mobile, il n'a aucune vocation à être utilisé d'autre manière qu'à des fins purement éducatives.

**Il s'agit donc d'un projet assez léger, combinant :**
- L'utilisation d'un framework PHP ([Medoo](https://medoo.in/)), sa mise en place et sa configuration.
- L'écriture d'un système de récupération puis traitement de données en PHP à partir d'une source externe.
- La mise en place d'un système de traitement des données  en arrière-plan, qui soit interactif pour l'utilisateur en utilisant de l'AJAX.
- Le design d'une page en HTML / CSS, afin d'afficher les données récupérées de façon claire et compréhensible.

## Utilisation

L'utilisation du scrapper reste assez simple, il suffit de vous placer dans le dossier de votre choix et de cloner le projet depuis GitHub :

    git clone https://github.com/Thomaslrt/projet-scrapper
    
Une fois cloné, ouvrez le fichier ```includes/db.php``` et modifier la ligne avec les identifiants de votre base de données :

```
$database = new Medoo([
    'type' => 'mysql',
    'host' => 'localhost',
    'database' => 'emails',
    'username' => '******',
    'password' => '************'
]);
```
Il vous faut aussi importer le fichier ```database.sql``` présent à la racine, afin d'avoir les bonnes tables de disponible, et faire la liaison avec le projet.


## À propos de moi
- [Mes projets sur GitHub](https://github.com/Thomaslrt) 
- [Mon site](https://thomaslrt.fr/) 
- [Mon LinkedIn](https://www.linkedin.com/in/thomas-laurent-432271173/)
