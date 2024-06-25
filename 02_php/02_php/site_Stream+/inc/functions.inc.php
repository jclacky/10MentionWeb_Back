<!-- Fichier qui contient les fonctions php à utiliser dans notre site -->
<?php
############################    Fonction Pour la connexion à la BDD ##################################"

// On vas utiliser l'extension PHP Data Objects (PDO), elle définit une excellente interface pour accéder à une base de données depuis PHP et d'exécuter des requêtes SQL .
               // Pour se connecter à la BDD avec PDO il faut créer une instance de cet Objet (PDO) qui représente une connexion à la base,  pour cela il faut se servir du constructeur de la classe
               // Ce constructeur demande certains paramètres:
// On déclare des constantes d'environnement qui vont contenir les information à la connexion à la BDD

        // Constante du serveur ==> "localhost"
        define("DBHOST", "localhost");

        // constante de l'utilisateur de la BDD du serveur en local => root
        define("DBUSER", "root");

        // constante pour le mot de passe  du serveur en local => pas de mot de passe
        define("DBPASS", "");

        // constante pour le nom de la BDD  
        define("DBNAME", "stream+");



        function connexionBdd(){

            // $dns= "mysql:host.";dbname=".DBNAME.";charset=utf8;";
            $dsn= "mysql:host=".DBHOST.";dbname=".DBNAME.";charset=utf8;";

            //Grâce à PDO on peut lever une exception (une erreur) si la connexion à la BDD ne se réalise pas(exp: suite à une faute au niveau du nom de la BDD) et par la suite si elle cette erreur est capté on lui demande d'afficher une erreur


            try{ // dans le try on vas instancier PDO, c'est créer un objet de la classe PDO (un élment de PDO)
                // avec la variable dsn et les constantes d'environnement
                
                $pdo = new PDO($dsn, DBUSER, DBPASS);
                // echo"Je suis connectée";


            } catch (PDOException $e){
                // PDOException est une classe qui représente une erreur émise par PDO et $e c'est l'objet de la clase en question qui vas stocker cette erreur
               
                die("Erreur:" .$e->getMessage()); // die d'arrêter le PHP et d'afficher une erreur en utilisant la méthode getmessage de l'objet $e
            }
  
            //le catch sera exécuter dès lors on aura un problème da le tr
            return $pdo;
            //ici on utilise un retern car on récupère l'objet de la fonction que l'on vas appelé  dans plusieurs autre fonctions
        }
        
        connexionBdd();


                                    ############### Création des tables ###############


                #########  Table Categories #######
        function createTableCategories(){
            $cnx = connexionBdd();

            $sql = "CREATE TABLE IF NOT EXISTS categories (id_category INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, name VARCHAR(50) NOT NULL, description TEXT NULL)";
            
            $request = $cnx->exec($sql);
        }
        createTableCategories();

        ####################  Tables films ########################

    //     function createTableFilms(){

    //         $cnx = connexionBdd();
  
    //         $sql = " CREATE TABLE IF NOT EXISTS films (
    //              id_film INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    //              category_id INT(11) NOT NULL,
    //              title VARCHAR(100) NOT NULL,
    //              director VARCHAR(100) NOT NULL,
    //              actors VARCHAR(100) NOT NULL,
    //              ageLimit VARCHAR(5) NULL,
    //              duration TIME NOT NULL,
    //              synopsis TEXT NOT NULL,
    //              date DATE NOT NULL,
    //              image VARCHAR(250) NOT NULL,
    //              price Float NOT NULL,
    //              stock BIGINT NOT NULL
    //              )";
    //         $request = $cnx ->exec($sql);
  
    //    }
    //    createTableFilms();

####################  Tables Utilisateurs ########################
// function createTableUsers(){

// //     $cnx = connexionBdd();

// //     $sql = " CREATE TABLE IF NOT EXISTS  users (
// //          id_user INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
// //          firstName VARCHAR(50),
// //          lastName VARCHAR(50) NOT NULL,
// //          pseudo VARCHAR(50) NOT NULL,
// //          mdp VARCHAR(255) NOT NULL,
// //          email VARCHAR(100) NOT NULL,
// //          phone VARCHAR(30) NOT NULL,
// //          civility ENUM('f', 'h') NOT NULL,
// //          birthday date NOT NULL,
// //          address VARCHAR(50) NOT NULL,
// //          zip VARCHAR(50) NOT NULL,
// //          city VARCHAR(50) NOT NULL,
// //          country VARCHAR(50),
// //          role ENUM('ROLE_USER','ROLE_ADMIN') DEFAULT 'ROLE_USER' 
// //          )";
// //     $request = $cnx ->exec($sql);

// // }

// createTableUsers();



 ###########################################"#### Création des clés étrangères ###############################"

 ################### clés étrangères  ########################
//  ALTER TABLE ORDERS ADD FOREIGN KEY (Customer_SID) REFERENCES CUSTOMER (SID);

    // tableF : table où on  va créer la clé étrangère
    // tableP : table à partir de laquelle on récupère la clé primaire
    // $keyF : la clé étrangère
    // $keyP : la clé primaire
// function foreignKey(string $tableF, string $keyF, string $tableP, string $keyP){

//     $cnx= connexionBdd();
//     $sql="ALTER TABLE $tableF ADD FOREIGN KEY ($keyF) REFERENCES $tableP ($keyP)";
//     $request =$cnx ->exec($sql);
// }

// // création de la clé étrangère dans la table films
// foreignKey('films', 'category_id', 'categories', 'id_category');



 ?>