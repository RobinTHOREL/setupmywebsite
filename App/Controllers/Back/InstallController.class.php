<?php
class InstallController{
    public function indexAction($params){
        if(file_exists(CONFIG_PERSO_FILE)) {
            header('Location: '.ABSOLUTE_PATH_FRONT);
        } else {
            $view = new View("install/index", "install");
            $view->assign("page_title", "Installation de Setup My Website");
            $view->assign("page_description", "Page d'installation de Setup My Website");
        }
    }

    public function databaseConfigurationAction($params){
        if(file_exists(CONFIG_PERSO_FILE)) {
            header('Location: '.ABSOLUTE_PATH_FRONT);
        } else {
            if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['host']) && !empty($_POST['port']) && !empty($_POST['user'])
                && isset($_POST['password']) && !empty($_POST['database_name'])
            ) {

                if (isset($_SESSION["error_form"])) {
                    unset($_SESSION["error_form"]);
                }

                // On récupère les données dans des variables
                $host = $_POST['host'];
                $port = $_POST['port'];
                $user = $_POST['user'];
                $password = $_POST['password'];
                $databaseName = $_POST['database_name'];

                $error = false;
                $listOfErrors = [];

                // Vérification de l'hôte
                if (strlen($host) > 255) {
                    array_push($listOfErrors, "L'hôte saisie n'est pas valide.");
                    $error = true;
                }

                // Vérification du port
                if ($port < 0 || $port > 65535) {
                    array_push($listOfErrors, "Le port saisie n'est pas valide.");
                    $error = true;
                }

                // Vérification du user
                if (strlen($user) > 32) {
                    array_push($listOfErrors, "Le user saisie n'est pas valide.");
                    $error = true;
                }

                // Vérification du mot de passe
                if (strlen($password) > 32) {
                    array_push($listOfErrors, "Le mot de passe saisie n'est pas valide.");
                    $error = true;
                }

                // Vérification du nom de la base de données
                /*if($databaseName) {
                    array_push($listOfErrors, "Le nom de la base de données n'est pas valide.");
                    $error = true;
                }*/

                // On essaye de se connecter à la base de données avec les données reçues
                if ($error == false) {
                    try {
                        $pdo = new PDO("mysql:host=" . $host . ";dbname=" . $databaseName . ";port=" . $port, $user, $password);
                    } catch (Exception $e) {
                        array_push($listOfErrors, "Erreur de connexion à la base de données. Veuillez vérifier vos paramètres de connexion.");
                        $error = true;
                    }
                }
                if ($error == true) {
                    $_SESSION["error_form"] = $listOfErrors;
                    header("Location: " . $_SERVER["HTTP_REFERER"]);
                    die();
                }

                // Si la connexion à fonctionné, on charge le fichier SQL et on éxécute le contenu
                $sqlFile = INSTALL_DATABASE_FILE;
                $req = "";
                $req = file_get_contents($sqlFile);
                $pdo->query($req);

                // On vérifie si les données ont bien été créé
                $is_table = $pdo->query("SHOW TABLES");
                echo "Row:" . $is_table->rowCount();

                // Si la création a bien fonctionné, on continue à la page suivante
                if ($is_table->rowCount() > 0) {
                    $_SESSION["host"] = $host;
                    $_SESSION["port"] = $port;
                    $_SESSION["user"] = $user;
                    $_SESSION["password"] = $password;
                    $_SESSION["database_name"] = $databaseName;
                    header("Location: administratorConfiguration");
                    die();
                } else {
                    array_push($listOfErrors, "La création des données dans la base de données n'a pas fonctionné.");
                    $_SESSION["error_form"] = $listOfErrors;
                    header("Location: " . $_SERVER["HTTP_REFERER"]);
                    die();
                }
            } else {
                $view = new View("install/databaseConfiguration", "install");
                $view->assign("page_title", "Installation de la base de données Setup My Website");
                $view->assign("page_description", "Page d'installation de la base de données Setup My Website");
            }
        }
    }

    public function administratorConfigurationAction($params){
        if(file_exists(CONFIG_PERSO_FILE)) {
            header('Location: '.ABSOLUTE_PATH_FRONT);
        } else {
            // On charge les classes
            if( $_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['login']) && !empty($_POST['password']) 
                && !empty($_POST['passwordConfirm']) && !empty($_POST['email']) && !empty($_POST['firstname'])
                && !empty($_POST['lastname']) ) {

                $listOfErrors = [];

                if (isset($_SESSION["error_form"])) {
                    unset($_SESSION["error_form"]);
                }

                // On vérifie que les informations de connexion à la base de données sont bien présentent
                if (!isset($_SESSION["user"]) || !isset($_SESSION["password"]) || !isset($_SESSION["port"])
                    || !isset($_SESSION["port"]) || !isset($_SESSION["port"])
                ) {
                    array_push($listOfErrors, "Des informations de connexion sont manquantes");
                } else {
                    $host = $_SESSION["host"];
                    $port = $_SESSION["port"];
                    $user = $_SESSION["user"];
                    $password = $_SESSION["password"];
                    $databaseName = $_SESSION["database_name"];
                }

                // On récupère les données dans des variables
                $adminLogin = trim($_POST['login']);
                $adminPassword = $_POST['password'];
                $adminPasswordConfirm = $_POST['passwordConfirm'];
                $adminEmail = trim($_POST["email"]);
                $adminFirstname = trim($_POST["firstname"]);
                $adminLastname = trim($_POST["lastname"]);

                if(strlen($adminLogin)<4 || strlen($adminLogin)>64) {
                    array_push($listOfErrors, "Le login saisie est incorrect. Il doit faire en 4 et 64 caractères.");
                }
                
                if(strlen($adminPassword)<4) {
                    array_push($listOfErrors, "Le mot de passe saisie est trop court.");
                }
                
                if(strlen($adminPassword)>64) {
                    array_push($listOfErrors, "Le mot de passe saisie est trop long.");
                }
                
                if(strcmp($adminPassword, $adminPasswordConfirm) != 0) {
                    array_push($listOfErrors, "Les mots de passe saisies ne correspondent pas.");
                }
                
                if(!filter_var($adminEmail, FILTER_VALIDATE_EMAIL)) {
                    array_push($listOfErrors, "Le format de l'email saisie est invalide.");
                }
                
                if(strlen($adminEmail)>320) {
                    array_push($listOfErrors, "La longueur de l'email saisie est trop grande.");
                }
                
                if(strlen($adminFirstname)>120) {
                    array_push($listOfErrors, "La longueur du prénom saisie est trop grande.");
                }
                
                if(strlen($adminLastname)>120) {
                    array_push($listOfErrors, "La longueur du nom saisie est trop grande.");
                }

                // On essaye de se connecter à la base de données avec les données reçues
                if (count($listOfErrors)<=0) {
                    try {
                        $pdo = new PDO("mysql:host=" . $host . ";dbname=" . $databaseName . ";port=" . $port, $user, $password);
                    } catch (Exception $e) {
                        array_push($listOfErrors, "Erreur de connexion à la base de données. Veuillez vérifier vos paramètres de connexion.");
                    }
                }
                if (count($listOfErrors)>=1) {
                    $_SESSION["error_form"] = $listOfErrors;
                    header("Location: " . $_SERVER["HTTP_REFERER"]);
                    die();
                }

                define("DB_HOST", $host);
                define("DB_NAME", $databaseName);
                define("DB_PORT", $port);
                define("DB_USER", $user);
                define("DB_PWD", $password);
                $user = new Users();
                $user->setLogin($adminLogin);
                $user->setPassword($adminPassword);
                $user->setEmail($adminEmail);
                $user->setFirstName($adminFirstname);
                $user->setLastName($adminLastname);
                $user->setActivationKey("");
                $user->setPermission("1");
                $user->Save();

                header("Location: installConfiguration");
                die();
            } else {
                $view = new View("install/administratorConfiguration", "install");
                $view->assign("page_title", "Configuration du compte administrateur Setup My Website");
                $view->assign("page_description", "Page de configuration du compte administrateur Setup My Website");
            }
        }
    }

    public function installConfigurationAction($params){
        if(file_exists(CONFIG_PERSO_FILE)) {
            header('Location: '.ABSOLUTE_PATH_FRONT);
        } else {
            if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['start'])) {
                // On vérifie que les informations de connexion à la base de données sont bien présentent
                if (!isset($_SESSION["user"]) || !isset($_SESSION["password"]) || !isset($_SESSION["port"])
                    || !isset($_SESSION["port"]) || !isset($_SESSION["port"])
                ) {
                    array_push($listOfErrors, "Des informations de connexion sont manquantes");
                } else {
                    $host = $_SESSION["host"];
                    $port = $_SESSION["port"];
                    $user = $_SESSION["user"];
                    $password = $_SESSION["password"];
                    $databaseName = $_SESSION["database_name"];
                }

                // On créé un fichier de configuration personnalisé
                /* ".." . DS . ".." . DS . "Config" . DS . */
                $file = "Config" . DS . "config_perso_inc.php";
                $configuration = "<?php \n\n";
                $configuration .= "/* Base de données */\n";
                $configuration .= "define(\"DB_USER\", \"" . $user . "\");\n";
                $configuration .= "define(\"DB_PWD\", \"" . $password . "\");\n";
                $configuration .= "define(\"DB_HOST\", \"" . $host . "\");\n";
                $configuration .= "define(\"DB_NAME\", \"" . $databaseName . "\");\n";
                $configuration .= "define(\"DB_PORT\", \"" . $port . "\");\n";
                file_put_contents($file, $configuration, FILE_APPEND | LOCK_EX);
                header("Location: http://" . $_SERVER['HTTP_HOST'] . BASE_ABSOLUTE_PATTERN);
            } else {
                $view = new View("install/installConfiguration", "install");
                $view->assign("page_title", "Finalisation de l'installation de Setup My Website");
                $view->assign("page_description", "Page de finalisation de l'installation de Setup My Website");
            }
        }
    }
}