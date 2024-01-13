<?php
class Register{
    protected $host ; 
    protected $dbname;
    protected $username;
    protected $password;
    protected $connect;
    protected $conn;
    function __construct($typeofdb,$host,$dbname,$username,$password){
        $this->connect="$typeofdb:host=$host;dbname=$dbname";
        $this->username=$username;
        $this->password=$password;
    }
    public function connect_to_database(){
        try 
        {
            $this->conn=new PDO($this->connect,$this->username,$this->password);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function Adduser( $name , $username , $email , $password){
        $result=$this->conn;
        $statement=$result->prepare('INSERT INTO users (name , username , email , password) VALUES (:name, :username, :email, :password)');
        $statement->execute([
            "name" =>$name ,
            "username"=>$username,
            "email"=>$email,
            "password"=>password_hash($password,PASSWORD_DEFAULT)
        ]);

    }
}
$register = new Register("mysql","localhost","test","root","");
$register->connect_to_database();
if(isset($_POST["btn"])){
    $n=$_POST["name"];
    $p=$_POST["password"];
    $q1=new PDO("mysql:host=localhost;dbname=test","root","");
    $q2=$q1->prepare("SELECT * FROM users WHERE username=:username");
    $q2->execute([
        "username"=>$_POST["username"]
    ]);
    if($q2->rowCount()==1){
        echo "username already exists";
        header("Location:http://localhost/register.php");
    }
    elseif(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $e=$_POST["email"];
        $un=$_POST["username"];
        $register->Adduser($n , $un , $e , $p);
        header("Location:http://localhost/login.php");
    }
    else{
        echo "email is not valid";
        header("Location:http://localhost/register.php");
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <style>
        #name ,#username,#password,#email :invalid{
            background-color: red !important;
        }


    </style>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class=" bg-gray-700">
<div class="container mx-auto space-y-4">
    <div class="sm:mx-auto sm:w-full sm:max-w-md mt-10">
        <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-white" id="h2">
            Register your account
        </h2>
    </div>
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form class="space-y-6" action="#" method="POST">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">
                        Name
                    </label>
                    <div class="mt-1">
                        <input id="name" name="name" type="text" autocomplete="name" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">
                        Username
                    </label>
                    <div class="mt-1">
                        <input id="username" name="username" type="text" autocomplete="username" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Email address
                    </label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Password
                    </label>
                    <div class="mt-1">
                        <input id="password" minlength="8" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                </div>

                <div>
                    <button type="submit" name="btn" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Register
                    </button>
                </div>
            </form>


        </div>
    </div>
</div>
</body>
</html>
