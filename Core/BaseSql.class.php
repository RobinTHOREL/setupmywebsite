<?php 
	class BaseSql {

		private $db; 
		private $table;
		private $columns = [];

		public function __construct() {
			try {
				$this->db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT, DB_USER, DB_PWD);
			} catch(Exception $e) {
				die("Erreur SQL : " .$e->getMessage());
			}

			// Récupérer la table de manière dynamique, ici user
			$this->table = strtolower(get_called_class());

			// Récupérer les colonnes de la table de manière dynamique, ici id, ...
			$userVars = get_class_vars($this->table);
			$sqlVars = get_class_vars(get_class());
			$this->columns = array_diff_key($userVars, $sqlVars);
		}

		public function Save()
        {
            // Si id = -1 faire un insert dynamique
            if ($this->id == -1) {
                unset($this->columns["id"]);
                $sqlCol = null;
                $sqlKey = null;
                foreach ($this->columns as $column => $value) {
                    $data[$column] = $this->$column;
                    $sqlCol .= "," . $column;
                    $sqlKey .= ",:" . $column;
                }
                $sqlCol = ltrim($sqlCol, ",");
                $sqlKey = ltrim($sqlKey, ",");

                $query = $this->db->prepare(
                    "INSERT INTO " . $this->table . " (" . $sqlCol . ")
							VALUES (" . $sqlKey . ") ;"
                );
                $query->execute($data);
            } else {
                // Sinon faire un update dynamique
                $sqlSet = null;
                foreach ($this->columns as $column => $value) {
                    $data[$column] = $this->$column;
                    $sqlSet[] .= $column . "=:" . $column;
                }

                $query = $this->db->prepare(
                    "UPDATE " . $this->table . "
							SET date_updated = sysdate(), 
							" . implode(",", $sqlSet) . "
							WHERE id=:id;"
                );

                echo "UPDATE " . $this->table . "
							SET date_updated = sysdate(), 
							" . implode(",", $sqlSet) . "
							WHERE id=:id;";
                $query->execute($data);
            }
        }

        // La fonction a pour but d'alimenter l'objet suite à une requête SQL (Attention la requete ne doit retourner
        //  qu'une seule valeur.
        public function populate( $condition = ["id"=>1]) {
            // Requete SQL
            $req = "SELECT * FROM " .$this->table. " WHERE ";
            $i = 1;
            $count = count($condition);
            foreach( $condition as $key => $val) {
                $req .= $key. " = " .$val. "";
                if ($count > 1 && $i < $count) {
                    $req .= " AND ";
                }
                $i = $i + 1;
            }

            $query = $this->db->prepare($req );
            $query->execute();
            $results = $query->fetch(PDO::FETCH_ASSOC);

            // Vérification
            if (count($results) <= 1) {
                return;
            }

            // Alimentation de l'objet
            foreach($results as $key => $val) {
                $this->{$key} = $val;
            }

        }

	}