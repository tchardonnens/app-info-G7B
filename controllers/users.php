<?php
    ini_set('display_errors', 'on');
    require_once '../models/user.php';
    require_once '../helpers/session_helper.php';

    class Users {

        private $userModel;
        
        public function __construct(){
            $this->userModel = new User;
        }

        public function register(){
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

            //Validate inputs
            if(empty($data['mail']) || empty($data['password']) || empty($data['pwdRepeat'])){
                flash("register", "Please fill out all inputs");
                redirect("./views/signup.php");
            }

            if(!filter_var($data['mail'], FILTER_VALIDATE_EMAIL)){
                flash("register", "Invalid email");
                redirect("./views/signup.php");
            }

            if(strlen($data['password']) < 6){
                flash("register", "Invalid password");
                redirect("./views/signup.php");
            } else if($data['password'] !== $data['pwdRepeat']){
                flash("register", "Passwords don't match");
                redirect("./views/signup.php");
            }

            //User with the same email or password already exists
            if($this->userModel->findUserByEmail($data['mail'])){
                flash("register", "Email already taken");
                redirect("./views/signup.php");
            }

            //Passed all validation checks.
            //Now going to hash password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            //Register User
            if($this->userModel->register($data)){
                redirect("../views/signin.php");
            }else{
                die("Something went wrong");
            }
        }

    public function login(){
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST);

        //Init data
        $data=[
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password'])
        ];

        if(empty($data['email']) || empty($data[''])){
            flash("login", "Please fill out all inputs");
            header("location: ../views/signin.php");
            exit();
        }

        //Check for user/email
        if($this->userModel->findUserByEmail($data['email'])){
            //User Found
            $loggedInUser = $this->userModel->login($data['email'], $data['password']);
            if($loggedInUser){
                //Create session
                $this->createUserSession($loggedInUser);
            }else{
                flash("login", "Password Incorrect");
                redirect("../views/signin.php");
            }
        }else{
            flash("login", "No user found");
            redirect("../views/signin.php");
        }
    }  

    public function createUserSession($user){
        $_SESSION['id_user'] = $user->usersId;
        $_SESSION['mail'] = $user->mail;
        redirect("../views/home.php");
    }

    public function logout(){
        unset($_SESSION['id_user']);
        unset($_SESSION['name']);
        unset($_SESSION['mail']);
        session_destroy();
        redirect("../views/home.php");
    }
}

    $init = new Users;

    //Ensure that user is sending a post request
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        switch($_POST['type']){
            case 'register':
                $init->register();
                break;
            case 'login':
                $init->login();
                break;
            default:
            redirect("../views/home.php");
        }
        
    }else{
        switch($_GET['q']){
            case 'logout':
                $init->logout();
                break;
            default:
            redirect("../views/signup.php");
        }
    }

    