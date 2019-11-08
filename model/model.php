<?php
    class dbModel
    {
        protected $db;

        public function __construct($db)
        {
            $this->db = $db;
        }

        public function check_table_exist($sqlcode)
        {
            $sql_path = $this->db->query("SELECT 1 FROM produkty LIMIT 1");
            if(!$sql_path)
            {
                //create table 
                if($this->db->query($sqlcode) === TRUE) 
                {
                    echo "Tabela produkty utworzona" . '<br>';
                }
                else
                {   
                    echo "Tabela nie utworzona !" . $this->db->error;
                }
            }
        }

        public function add_to_db()
        {
            $nazwa_produktu = mysqli_real_escape_string($this->db, $_POST['nazwa_produktu']);
            $producent = mysqli_real_escape_string($this->db, $_POST['producent']);
            $ilosc = mysqli_real_escape_string($this->db, $_POST['ilosc']);

            $stmt = $this->db->prepare("INSERT INTO produkty (nazwa_produktu, producent, ilosc) VALUES (?, ?, ?);");
            $stmt->bind_param('ssi',$nazwa_produktu, $producent, $ilosc);
            $stmt->execute();
            $stmt->close();
            header('Location: index.php');
        }

        public function get_product_by_name()
        {
            return $this->db->query('SELECT * FROM produkty ORDER BY nazwa_produktu');
        }
        
        public function get_product_by_amount()
        {
            return $this->db->query('SELECT * FROM produkty ORDER BY ilosc');
        }

        public function close_connect()
        {
            $this->db->close();
        }

    }

?>