<?php
require_once './models/user.php';
require_once './helpers/session_helper.php';


class Users
{

    private $userModel;

    public function __construct()
    {
        $this->userModel = new User;
    }

    public function signup()
    {
        //Process form

        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST);

        //Init data
        $data = [
            'name' => trim($_POST['name']),
            'mail' => trim($_POST['mail']),
            'password' => trim($_POST['password']),
            'pwdRepeat' => trim($_POST['pwdRepeat'])
        ];

        if (empty($data['mail']) || empty($data['password']) || empty($data['pwdRepeat'])) {
            flash("signup", "Please fill out all inputs");
            redirect("index.php?cible=users&function=signup");
        }

        if (!filter_var($data['mail'], FILTER_VALIDATE_EMAIL)) {
            flash("signup", "Invalid email");
            redirect("index.php?cible=users&function=signup");
        }

        if (strlen($data['password']) < 6) {
            flash("signup", "Invalid password");
            redirect("index.php?cible=users&function=signup");
        } else if ($data['password'] !== $data['pwdRepeat']) {
            flash("signup", "Passwords don't match");
            redirect("index.php?cible=users&function=signup");
        }

        //User with the same email or password already exists
        if ($this->userModel->findUserByEmail($data['mail'])) {
            flash("signup", "Email already taken");
            redirect("index.php?cible=users&function=signup");
        }

        //Passed all validation checks.
        //Now going to hash password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        //Register User
        if ($this->userModel->signup($data)) {

            redirect("index.php?cible=infos&function=home");
        } else {
            die("Something went wrong");
        }
    }

    public function signin()
    {
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST);

        //Init data
        $data = [
            'mail' => trim($_POST['mail']),
            'password' => trim($_POST['password'])
        ];

        if (empty($data['mail']) || empty($data['password'])) {
            flash("signin", "Veuillez remplir tous les champs");
            header("location: index.php?cible=users&function=signin");
            exit();
        }

        //Check for user/email
        if ($this->userModel->findUserByEmail($data['mail'])) {
            //User Found
            $loggedInUser = $this->userModel->signin($data['mail'], $data['password']);
            if ($loggedInUser) {
                //Create session
                $this->createUserSession($loggedInUser);
                
            } else {
                flash("signin", "Email ou mot de passe incorrect");
                redirect("index.php?cible=users&function=signin");
            }
        } else {
            flash("signin", "Aucun utilisateur ne correspond");
            redirect("index.php?cible=users&function=signin");
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['mail'] = $user->mail;
        $_SESSION['name'] = $user->name;
        redirect("index.php?cible=infos&function=home");
    }

    public function logout()
    {
        unset($_SESSION['name']);
        unset($_SESSION['mail']);
        session_destroy();
        redirect("index.php?cible=infos&function=home");
    }
}

$init = new Users;

//Ensure that user is sending a post request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['type']) {
        case 'signup':
            $init->signup();
            break;
        case 'signin':
            $init->signin();
            break;
        default:
            redirect("index.php?cible=infos&function=home");
    }
} 
if (!isset($_GET['function']) || empty($_GET['function'])) {
    $function = "signup";
} else {
    $function = $_GET['function'];
}

switch ($function) {

    case 'home':
        $vue = "home";
        $title = "Accueil";
        break;

    case 'signin':
        //affichage de l'accueil
        $vue = "signin";
        $title = "Connexion";
        break;

    case 'signup':
        // inscription d'un nouvel utilisateur
        $vue = "signup";
        $alerte = false;
        $title = "Inscription";
        break;

    case 'logout':
        $init->logout();
        break;

    case 'sensors':
        $vue = "sensors";
        $title = "Capteurs";
        break;

    default:
        // si aucune fonction ne correspond au paramètre function passé en GET
        $vue = "error404";
        $title = "error404";
        $message = "Erreur 404 : la page recherchée n'existe pas.";
}



include('views/header.php');
include('views/' . $vue . '.php');
include('views/footer.php');
