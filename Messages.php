<?php require_once 'Database.php';

$messages = new Messages;
$message = $messages->showMessages();

class Messages {

    private $db;


    public function __construct()
    {

        $this->db = new Database;


    }


    public function showMessages(){

        $this->db->query('SELECT * FROM chat ORDER BY chat.data ASC');

        $posts = $this->db->resultSet();

        $data = [
            'chat' => $posts

        ];

        return $data;




    }


    public function addMessage($data) {

        $this->db->query('INSERT INTO chat (name, message) VALUES(:name, :message)');

        //Bind Values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':message',$data['message']);


        //Execute
        if($this->db->execute()){
            return true;
        } else {

            return false;

        }



    }//end of add Post


}