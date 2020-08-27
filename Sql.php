<?php 

    class Sql extends PDO {
        private $con;

        public function __construct(){
            $this->con = new PDO("mysql:host=localhost;dbname=dbphp", "root", "");
        }

        private function setParams($statments, $parameters = array()) {
            echo "setParams:<br>";
            var_dump($statments);
            echo "<br>";
            var_dump($parameters);
            echo "<br>=============================<br>";

            foreach ($parameters as $key => $value) {
                $statments->bindParam($key, $value);
            }
        }

        private function setParam($statments, $key, $value) {
            echo "setParam:<br>";
            var_dump($statments);
            echo "<br>";
            var_dump($key);
            echo "<br>";
            var_dump($value);
            echo "<br>=============================<br>";

            $statment->bindParam($key, $value);
        }

        public function query($rawQuery, $params = array()) {
            echo "Query:<br>";
            var_dump($rawQuery);
            echo "<br>";
            var_dump($params);
            echo "<br>=============================<br>";

            $stmt = $this->con->prepare($rawQuery);
            $this->setParams($stmt, $params);
            $stmt->execute();
            return $stmt;
        }

        public function select($rawQuery, $params = array()) {
            echo "select:<br>";
            var_dump($rawQuery);
            echo "<br>";
            var_dump($params);
            echo "<br>=============================<br>";

            $stmt = $this->query($rawQuery, $params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>