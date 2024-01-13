<?php
class User
{
    private  $users_array = [
        [
            "id" => 1,
            "name" => "hesam mosavi",
            "username" => "hesam",
            "email" => "hesam@gmail.com",
            "is_admin" => true,
            "is_active" => true,
            "password" => "1234567"
        ],
        [
            "id" => 2,
            "name" => "reza mahmoodi",
            "username" => "reza",
            "email" => "reza@gmail.com",
            "is_admin" => false,
            "is_active" => false,
            "password" => "1234"

        ]
    ];
    private $id;
    private $name;
    private $username;
    private $email;
    public $is_admin;
    public $is_active;
    private $password;
    public function __construct( string $name ,  string $username , string $email , string $password){
        $pop=end($this->users_array);
        $this->id=$pop["id"]+1;
        $this->name=$name;
        $this->username=$username;
        $this->email=$email;
        $this->password=$password;
    }
    public function find(int $userid)
    {
        foreach($this->users_array  as $item){
            if ($item["id"]==$userid){
                return $item;    
            }
        }
    }
        public function save(){
        array_push($this->users_array , [
            "id" =>$this->id,
            "name" => $this->name,
            "username" => $this->username,
            "email" => $this->email,
            "is_admin" => $this->is_admin,
            "is_active" => $this->is_active,
            "password" => $this->password

        ]);
    }

    
    public function is__admin (){
        if($this->is_admin===null){
            return false;
        }
        else{
            return true;
        }
    }
    public function is__active (){
        if($this->is_admin===null){
            return false;
        }
        else{
            return true;
        }
    }
}



