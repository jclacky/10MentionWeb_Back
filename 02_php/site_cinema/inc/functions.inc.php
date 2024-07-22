<!-- fichier qui contient les fonctions php à utiliser dans notre site -->
<?php

// Déclaration du lancement de la session
session_start();

/////////////////////////////////////////////////////////////////////// constante pour définir le chemin du site /////////////////////////////////////////////////////////

 // constante qui définit les dossiers dans lesquels se situe le site pour pouvoir déterminer des chemins absolus à partir de localhost (on ne prends localhost). Ainsi nous écrivons tous les chemins (exp : src, href ) en absolu avec cette constante

 define("RACINE_SITE", "http://10mentionweb_back.local/02_php/site_cinema/");



########################################### fonction pour débuger ###########################################


function debug($var){
    echo '<pre class="border border-dark bg-light text-primary w-50 p-3>';
        var_dump($var);
    echo '</pre>';
}



########################################### fonction d'alert ###########################################

function alert(string $contenu, string $class){

    return "<div class=\"alert alert-$class alert-dismissible fade show text-center w-50 m-auto mb-5\" role=\"alert\">
               $contenu
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
            </div>";

}

function stringToArray(string $string ) :array{
    
    $array = explode('/', trim($string, '/')); // Je transforme ma châine de caractére en tableau et je supprime les / autour de la chaîne de caractére 
    return $array; // ma fonction retourne un tableau

}

########################################### fonction pour la deconnexion ###########################################

function logOut(){

    if (isset($_GET['action']) && $_GET['action'] == 'deconnexion') {
        
        unset($_SESSION['user']);
        header('location:'.RACINE_SITE.'index.php');
    }

}
logOut();


########################################### fonction pour la connexion à la BDD ###########################################

// On vas utiliser l'extension PHP Data Objects (PDO), elle définit une excellente interface pour accéder à une base de données depuis PHP et d'exécuter des requêtes SQL .
// Pour se connecter à la BDD avec PDO il faut créer une instance de cet Objet (PDO) qui représente une connexion à la base,  pour cela il faut se servir du constructeur de la classe
// Ce constructeur demande certains paramètres:
// On déclare des constantes d'environnement qui vont contenir les information à la connexion à la BDD

    // constante du seveur localhost
    define("DBHOST", "localhost");

    // constante de l'utilisateur de la BDD du serveur en local => root

    define("DBUSER", "root");

    // constante pour le mot de passe de serveur local => pas de mot de passe
    define("DBPASS", "");

    // constante pour le nom de la BDD
    define("DBNAME", "cinema");


    function connexionBDD() {
        $dsn = "mysql:host=".DBHOST.";dbname=".DBNAME.";charset=utf8;";

        //Grâce à PDO on peut lever une exception (une erreur) si la connexion à la BDD ne se réalise pas(exp: suite à une faute au niveau du nom de la BDD) et par la suite si cette erreur est capté on lui demande d'afficher une erreur

        try { // dans le try on vas instancier PDO, c'est créer un objet de la classe PDO (un élment de PDO)
            // Avec la variable dsn et les constatntes d'environnement
            
            $pdo = new PDO($dsn, DBUSER, DBPASS);
            // echo "Je suis connecté";
            
            //On définit le mode d'erreur de PDO sur Exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            
        } catch (PDOException $e) {

            // PDOException est une classe qui représente une erreur émise par PDO et $e c'est l'objetde la clase en question qui vas stocker cette erreur
            die("Erreur :" . $e->getMessage());
            // die d'arrêter le PHP et d'afficher une erreur en utilisant la méthode getmessage de l'objet $e
        }
               
        //le catch sera exécuter dès lors on aura un problème da le try

        return $pdo;
        //ici on utilise un return car on récupère l'objet de la fonction que l'on vas appelé  dans plusieurs autre fonctions

    }

    // connexionBDD();


########################################### Création des tables ###########################################

function CreateTableCategories(){

    $cnx = connexionBDD();
    $sql = "CREATE TABLE IF NOT EXISTS categories (
        id_category INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(50) NOT NULL,
        description TEXT NULL
    )";

    $request = $cnx->exec($sql);
}
// CreateTableCategories();

function createTableFilms(){

    $pdo = connexionBdd();

    $sql = " CREATE TABLE IF NOT EXISTS films (
         id_film INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
         category_id INT NOT NULL,
         title VARCHAR(100) NOT NULL,
         director VARCHAR(100) NOT NULL,
         actors VARCHAR(100) NOT NULL,
         ageLimit VARCHAR(5) NULL,
         duration TIME NOT NULL,
         synopsis text NOT NULL,
         date DATE NOT NULL,
         image VARCHAR(250) NOT NULL,
         price Float NOT NULL,
         stock BIGINT NOT NULL
         )";
    $request = $pdo->exec($sql);

}
// createTableFilms();


function createTableUsers(){

    $pdo = connexionBdd();

    $sql = " CREATE TABLE  users (
         id_user INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
         firstName VARCHAR(50),
         lastName VARCHAR(50) NOT NULL,
         pseudo VARCHAR(50) NOT NULL,
         mdp VARCHAR(255) NOT NULL,
         email VARCHAR(100) NOT NULL,
         phone VARCHAR(30) NOT NULL,
         civility ENUM('f', 'h') NOT NULL,
         birthday date NOT NULL,
         address VARCHAR(50) NOT NULL,
         zip VARCHAR(50) NOT NULL,
         city VARCHAR(50) NOT NULL,
         country VARCHAR(50),
         role ENUM('ROLE_USER','ROLE_ADMIN') DEFAULT 'ROLE_USER' 
         )";
    $request = $pdo ->exec($sql);

}

// createTableUsers();


########################################### Création des tables étrangères ###########################################
// ALTER TABLE ORDERS ADD FOREIGN KEY (Customer_SID) REFERENCES CUSTOMER (SID);

// tableF = table où on va créer la clé étrangère
// tableP = la table a partir de laquelle on récupère la clé primaire
// keyF = la clé étrangère
// keyP = la clé primaire

function foreignkey(string $tableF, string $keyF, string $tableP, string $keyP){

    $cnx = connexionBDD();
    $sql="ALTER TABLE $tableF ADD FOREIGN KEY ($keyF) REFERENCES $tableP ($keyP)";
    $request = $cnx ->exec($sql);

}
// Création de la clé étrangère dans la table films
// foreignkey('films', 'category_id', 'categories', 'id_category');




########################################### fonction du CRUD pour les utilisateurs ###########################################
// Inscription
function inscriptionUsers(string $lastName, string $firstName, string $pseudo, string $email, string $phone, string $mdp, string $civility, string $birthday, string $address, string $zip, string $city, string $country) :void{
    
    /* Les requêtes préparer sont préconisées si vous exécutez plusieurs fois la même requête. Ainsi vous évitez au SGBD de répéter toutes les phases analyse/ interpretation / exécution de la requête (gain de performance). Les requêtes préparées sont aussi utilisées pour nettoyer les données et se prémunir des injections de type SQL (ce que nous verrons dans un chapitre ultérieur).

            1- On prépare la requête
            2- On lie le marqueur à la requête
            3- On exécute la requête

    */

    // Créer un tableau associatif avec les noms des colonnes comme clés
    // Les noms des clés du tableau $data correspondent aux noms des colonnes dans la base de données.
    
    $data = [
        'firstName' => $firstName,
        'lastName' => $lastName,
        'pseudo' => $pseudo,
        'mdp' => $mdp,
        'email' => $email,
        'phone' => $phone,
        'civility' => $civility,
        'birthday' => $birthday,
        'address' => $address,
        'zip' => $zip,
        'city' => $city,
        'country' => $country
    ];

    // échapper les données et les traiter comme des failles JS (XSS)
    foreach ($data as $key => $value) {
        $data[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        // 1 -> $data['firstName'] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        /* 
            htmlspecialchars est une fonction qui convertit les caractères spéciaux en entités HTML, cela est utilisé afin d'empêcher l'exécution de code HTML ou JavaScript : les attaques XSS (Cross-Site Scripting) injecté par un utilisateur malveillant en échappant les caractères HTML potentiellement dangereux . Par défaut, htmlspecialchars échappe les caractères suivants :

            & (ampersand) devient &amp;
            < (inférieur) devient &lt;
            > (supérieur) devient &gt;
            " (guillemet double) devient &quot;*/

        /*
            ENT_QUOTES : est une constante en PHP  qui convertit les guillemets simples et doubles. => ' (guillemet simple) devient &#039; 
            'UTF-8' : Spécifie que l'encodage utilisé est UTF-8.
        */


    }

    $cnx = connexionBDD();
    $sql = "INSERT INTO users 
    (lastName, firstName, pseudo, email, phone, mdp, civility, birthday, address, zip, city, country) VALUES (:lastName, :firstName, :pseudo, :email, :phone, :mdp, :civility, :birthday, :address, :zip, :city, :country)";

    $request = $cnx->prepare($sql); //prepare() est une méthode qui permet de préparer la requête sans l'exécuter. Elle contient un marqueur :nom qui est vide et attend une valeur.
    //$requet est à cette ligne  encore un objet PDOstatement .
    $request->execute(array(
        ":lastName" => $data['lastName'], 
        ":firstName" => $data['$firstName'], 
        ":pseudo" => $data['$pseudo'], 
        ":email" => $data['$email'], 
        ":phone" => $data['$phone'], 
        ":mdp" => $data['$mdp'], 
        ":civility" => $data['$civility'], 
        ":birthday" => $data['$birthday'], 
        ":address" => $data['$address'], 
        ":zip" => $data['$zip'], 
        ":city" => $data['$city'], 
        ":country" => $data['$country']

    )); // execute() permet d'exécuter toute la requête préparée avec prepare().

}




/////////////////////////////////////////// Une fonction pour vérifier si l'email existe déjà dans la BDD /////////////////////////////////////////////////////

function checkEmailUser(string $email) :mixed{

    $cnx = connexionBDD();
    $sql = "SELECT * FROM users WHERE email = :email";
    $request = $cnx->prepare($sql);
    $request->execute(array(
        ':email' => $email
    ));

    $result = $request->fetch(PDO::FETCH_ASSOC); //Le paramètre  PDO::FETCH_ASSOC permet de transformer l'objet en un array ASSOCIATIF.On y trouve en indices le nom des champs de la requête SQL.
    /**
     * Pour information, on peut mettre dans les parenthéses de fecth()
        * PDO::FETCH_NUM pour obtenir un tableau aux indices numèrique
        * PDO::FETCH_OBJ pour obtenir un dernier objet
        * ou encore des () vides pour obtenir un mélange de tableau associatif et indéxé
     */

    return $result;
}

/////////////////////////////////////////// Une fonction pour vérifier si le pseudo existe déjà dans la BDD /////////////////////////////////////////////////////

function checkPseudoUser(string $pseudo) :mixed{

    $cnx = connexionBDD();
    $sql = "SELECT * FROM users WHERE pseudo = :pseudo";
    $request = $cnx->prepare($sql);
    $request->execute(array(
        ':pseudo' => $pseudo
    ));

    $result = $request->fetch(PDO::FETCH_ASSOC); //Le paramètre  PDO::FETCH_ASSOC permet de transformer l'objet en un array ASSOCIATIF.On y trouve en indices le nom des champs de la requête SQL.
    /**
     * Pour information, on peut mettre dans les parenthéses de fecth()
        * PDO::FETCH_NUM pour obtenir un tableau aux indices numèrique
        * PDO::FETCH_OBJ pour obtenir un dernier objet
        * ou encore des () vides pour obtenir un mélange de tableau associatif et indéxé
     */

    return $result;
}

/////////////////////////////////////////// Une fonction pour vérifier si un utilisateur est la BDD /////////////////////////////////////////////////////

function checkUser(string $pseudo, string $email) :mixed{
    $cnx = connexionBDD();
    $sql = "SELECT * FROM users WHERE pseudo = :pseudo AND email = :email";
    $request = $cnx->prepare($sql);
    $request->execute(array(
        ":pseudo" => $pseudo, 
        ":email" => $email
    ));
    $result = $request->fetch();

    return $result;
};



////////////////////////////////////////////////////////// fonctions pour récupérer tout les utilisateurs //////////////////////////////////////////////////////////

function allUsers() :mixed{

    $cnx = connexionBDD();
    $sql = "SELECT * FROM users";
    $request = $cnx->query($sql);
    $result = $request->fetchAll(); // fetchAll() récupère tout les résultats dans la reqûête et les sort sous forme d'un tableau à 2 dismensions
    

    return $result;

}


/////////////////////////////////////////// fonction pour supprimer un utilisateur /////////////////////////////////////////////////////

function deleteUser(int $id_user) :void{

    $cnx = connexionBDD();
    $sql = "DELETE FROM users WHERE id_user = :id_user";
    $request = $cnx->prepare($sql);
    $request->execute(array(


        ":id_user"=>$id_user
    ));
    


}






########################################### fonction du CRUD pour les utilisateurs ###########################################
// Inscription
function insertCategory(string $nameCategory, string $descriptionCategory) :void{

    $cnx = connexionBDD();
    $sql = "INSERT INTO categories 
    (nameCategory, descriptionCategory) VALUES (:nameCategory, :descriptionCategory)";

    $request = $cnx->prepare($sql); //prepare() est une méthode qui permet de préparer la requête sans l'exécuter. Elle contient un marqueur :nom qui est vide et attend une valeur.
    //$requet est à cette ligne  encore un objet PDOstatement .
    $request->execute(array(
        ":nameCategory" => $nameCategory, 
        ":descriptionCategory" => $descriptionCategory

    )); // execute() permet d'exécuter toute la requête préparée avec prepare().

}





/////////////////////////////////////////// Une fonction pour vérifier si la catégorie existe déjà dans la BDD /////////////////////////////////////////////////////

function checkCategoryId(string $nameCategory) :mixed{

    $cnx = connexionBDD();
    $sql = "SELECT * FROM categories WHERE name = :name";
    $request = $cnx->prepare($sql);
    $request->execute(array(
        ':nameCategory' => $nameCategory
    ));

    $result = $request->fetch(PDO::FETCH_ASSOC); //Le paramètre  PDO::FETCH_ASSOC permet de transformer l'objet en un array ASSOCIATIF.On y trouve en indices le nom des champs de la requête SQL.

    return $result;
}


/////////////////////////////////////////// fonction pour supprimer une catégorie /////////////////////////////////////////////////////

// function deleteCategory(string $nameCategory) :void{

//     $cnx = connexionBDD();
//     $sql = "DELETE FROM categories WHERE name = :name";
//     $request = $cnx->prepare($sql);
//     $request->execute(array(


//         ":nameCategory"=>$nameCategory
//     ));
    


// }



/////////////////////////////////////////// fonction pour modifier le rôle /////////////////////////////////////////////////////

function updateRole(string $role, int $id_user): void {

    $cnx = connexionBDD();
    $sql = "UPDATE users SET role = :role WHERE id_user = :id_user";
    $request = $cnx->prepare($sql);
    $request->execute(array(

        ":role"=>$role,
        ":id_user"=>$id_user

    ));
}


/////////////////////////////////////////// fonction pour récupérer un seul utilisateur /////////////////////////////////////////////////////

function showUser(int $id_user): mixed {

    $cnx = connexionBDD();
    $sql = "SELECT * FROM users  WHERE id_user = :id_user";
    $request = $cnx->prepare($sql);
    $request->execute(array(

        ":id_user"=>$id_user

    ));
    $result = $request->fetch();
    return $result;
}



########################################### fonction du CRUD pour les catégorie ###########################################

/////////////////////////////////////////// fonction pour récuperer une seul catégorie /////////////////////////////////////////////////////


function showCategory(string $name){

    $cnx = connexionBdd();
    $sql = "SELECT * FROM categories WHERE name = :name";
    $request = $cnx->prepare($sql);
    $request->execute(array(
        ":name" => $name
    ));
    $result = $request->fetch();
    return $result;

}

function showCategoryViaId(int $id){

    $cnx = connexionBdd();
    $sql = "SELECT * FROM categories WHERE id_category = :id";
    $request = $cnx->prepare($sql);
    $request->execute(array(
        ":id" => $id
    ));


    $result = $request->fetch();
    return $result;

}

///////////////////////////////////////////  fonction pour insérer une catégorie //////////////////////////////////////////

function addCategory(string $nameCategory, string $description) : void {

    $pdo = connexionBdd();
    $sql= "INSERT INTO categories (name, description) VALUES (:name, :description)"; // requête d'insertion que je stock dans une variable
    $request = $pdo->prepare($sql); // je prépare ma fonction et je l'exécute
    $request->execute(array(

            ':name' => $nameCategory,
            ':description' => $description
    ));

}

//////////////////////////////////////// Une fonction pour récupérer toutes les catégories //////////////////////////////////////////////

function allCategories() : mixed{
        
    $pdo = connexionBdd();
    $sql= "SELECT * FROM categories"; // requête d'insertion que je stock dans une variable
    $request = $pdo->query($sql); 
    $result = $request->fetchAll();// j'utilise fetchAll() pour récupérer toute les ligne à la fois 
    return $result; // ma fonction retourne un tableau ave les données récupérer de la BDD
}

//////////////////////////////////////// Une fonction pour supprimer une catégorie//////////////////////////////////////////////

function deleteCategory(int $id) :void {

    $pdo = connexionBdd();
    $sql = "DELETE FROM categories WHERE id_category = :id";
    $request = $pdo->prepare($sql);
    $request->execute(array(
        ':id' => $id
    ));


}

//////////////////////////////////////// Une fonction pour modifier une catégorie //////////////////////////////////////////////


function updateCategory(int $id, string $name, string $description) :void {

    $pdo = connexionBdd();
    $sql = "UPDATE categories SET name = :name, description = :description WHERE id_category = :id";
    $request = $pdo->prepare($sql);
    $request->execute(array(
        ':id' => $id,
        ':name' => $name,
        ':description' => $description
    ));


}


########################################### fonction du CRUD pour les films ###########################################


///////////////////////////////////////////  fonction pour insérer un film //////////////////////////////////////////


function addFilm( int $category_id, string $title, string $director, string $actors,string $ageLimit,string $duration, string $date, float $price, int $stock, string $image, string $synopsis) : void {
    
    $cnx= connexionBdd();
    $sql= "INSERT INTO films (category_id,title,director,actors,ageLimit,duration,date, price, stock,image,synopsis) VALUES (:category_id,:title, :director, :actors,:ageLimit,  :duration, :date, :price, :stock, :image, :synopsis)"; // requête d'insertion que je stock dans une variable
    $request = $cnx->prepare($sql); // je prépare ma fonction et je l'exécute
    $request->execute(array(
        
        ':category_id' => $category_id,
        ':title' => $title,
        ':director' => $director,
        ':actors' => $actors,
        ':ageLimit'=> $ageLimit,
        ':duration' => $duration,
        ':date' => $date,
        ':price' => $price,
        ':stock' => $stock,
        ':image' => $image,
        ':synopsis' => $synopsis
        
    ));
    
}


//////////////////////////////////////// Une fonction pour récupérer toutes les catégories //////////////////////////////////////////////

function allFilm() : mixed{
        
    $cnx = connexionBdd();
    $sql= "SELECT * FROM films"; // requête d'insertion que je stock dans une variable
    $request = $cnx->query($sql); 
    $result = $request->fetchAll();// j'utilise fetchAll() pour récupérer toute les ligne à la fois 
    return $result; // ma fonction retourne un tableau ave les données récupérer de la BDD
}




/////////////////////////////////////////// Une fonction pour vérifier si le film existe déjà dans la BDD /////////////////////////////////////////////////////

function verifFilm(string $title, string $date) :mixed{

    $cnx = connexionBDD();
    $sql = "SELECT * FROM films WHERE title = :title AND date =:date" ;
    $request = $cnx->prepare($sql);
    $request->execute(array(
        ':title' => $title,
        ':date' => $date

    ));

    $result = $request->fetch(PDO::FETCH_ASSOC); //Le paramètre  PDO::FETCH_ASSOC permet de transformer l'objet en un array ASSOCIATIF.On y trouve en indices le nom des champs de la requête SQL.

    return $result;
}

///////////////////////////////////////// fonction pour récuperer un seul film /////////////////////////////////////////////////////


function showFilm(string $title){
    
    $cnx = connexionBdd();
    $sql = "SELECT * FROM films WHERE title = :title";
    $request = $cnx->prepare($sql);
    $request->execute(array(
            ":title" => $title
        ));
        $result = $request->fetch();
        return $result;
    }
    
    //////////////////////////////////////// Une fonction pour supprimer une catégorie//////////////////////////////////////////////

function deleteFilm(int $id) :void {

    $cnx = connexionBdd();
    $sql = "DELETE FROM films WHERE id_category = :id";
    $request = $cnx->prepare($sql);
    $request->execute(array(
        ':id' => $id
    ));


}

//////////////////////////////////////// Une fonction pour modifier une catégorie //////////////////////////////////////////////
function showFilmViaId(int $id){
    
    $cnx = connexionBdd();
    $sql = "SELECT * FROM films WHERE id_film = :id";
    $request = $cnx->prepare($sql);
    $request->execute(array(
            ":id" => $id
        ));
    
        $result = $request->fetch();
        return $result;
    
    }


function updateFilm(int $category_id,string $title, string $director, string $actors,string $ageLimit,string $duration, string $date, float $price, int $stock, string $image, string $synopsis) :void {

    $cnx = connexionBdd();
    $sql = "UPDATE categories SET category_id=:category_id title = :title, director = :director, actors=:actors, ageLimit=:ageLimit, duration=:duration, date=:date, price=:price, stock=:stock, image=:image, synopsis=:synopsis  WHERE id_film = :id";
    $request = $cnx->prepare($sql);
    $request->execute(array(

        ':category_id' => $category_id,
        ':title' => $title,
        ':director' => $director,
        ':actors' => $actors,
        ':ageLimit'=> $ageLimit,
        ':duration' => $duration,
        ':date' => $date,
        ':price' => $price,
        ':stock' => $stock,
        ':image' => $image,
        ':synopsis' => $synopsis
    ));


}

// function () :void {

//     $cnx = connexionBdd();
//     $sql = "UPDATE categories SET category_id=:category_id title = :title, director = :director, actors=:actors, ageLimit=:ageLimit, duration=:duration, date=:date, price=:price, stock=:stock, image=:image, synopsis=:synopsis  WHERE id_film = :id";
//     $request = $cnx->prepare($sql);
//     $request->execute(array(

//         ':category_id' => $category_id,
//         ':title' => $title,
//         ':director' => $director,
//         ':actors' => $actors,
//         ':ageLimit'=> $ageLimit,
//         ':duration' => $duration,
//         ':date' => $date,
//         ':price' => $price,
//         ':stock' => $stock,
//         ':image' => $image,
//         ':synopsis' => $synopsis
//     ));


// }


//////////////////////// Une fonction pour afficher les 6 derniers films //////////////////////

function filmByDate (): mixed{
    
    $cnx = connexionBdd();
    $sql = "SELECT *  FROM films ORDER BY date DESC LIMIT 6";
    $request = $cnx->query($sql);
    $result = $request->fetchAll();
        return $result;
    }

    function filmByCategory ($id){
    
        $cnx = connexionBdd();
        $sql = "SELECT *  FROM films WHERE category_id=:id";
        $request = $cnx->prepare($sql);
        $request->execute(array(
            ":id" => $id
        ));
        $result = $request->fetchAll();
            return $result;
        }

        
        
    


?>