<?php
    class Participant{
        public function __construct($first_name, $last_name, $email, $date_of_birth) {
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->email = $email;
            $this->date_of_birth = $date_of_birth;
        }
    }

    class jsonHelper{
        function readJson($path){
            $json = file_get_contents($path);
            $jsonStripped = str_replace(' ', '', $json);
            return $jsonStripped;
        }

        function jsonToObject($json){
            return json_decode($json);
        }

        function writeJson($data, $path){
            file_put_contents($path, json_encode($data));
        }

        function addparticipant($participant, $path){
            $json = $this->readJson($path);
            $data = $this->jsonToObject($json);
            array_push($data->participants, $participant);
            $this->writeJson($data, $path);
        }
    }
?>