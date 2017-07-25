<?php 
	class BaseSql extends Helpers {

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
					$sqlCol .= "," . "`".$column."`";
					$sqlKey .= ",:" . $column;
				}
				$sqlCol = ltrim($sqlCol, ",");
				$sqlKey = ltrim($sqlKey, ",");
				$query = $this->db->prepare(
					"INSERT INTO " . $this->table . " (" . $sqlCol . ")
						VALUES (" . $sqlKey . ") ;"
				);
//				print_r($query);
				$query->execute($data);
				
			} else {
				// Sinon faire un update dynamique
				$sqlSet = null;
				foreach ($this->columns as $column => $value) {
					$data[$column] = $this->$column;
					$sqlSet[] .= "`".$column."`" . "=:" . $column;
				}

				$query = $this->db->prepare(
					"UPDATE " . $this->table . "
						SET `date_updated` = sysdate(), 
						" . implode(",", $sqlSet) . "
						WHERE `id`=:id;"
				);
//                print_r($query);
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
				$req .= $key. " = '" .$val. "'";
				if ($count > 1 && $i < $count) {
					$req .= " AND ";
				}
				$i = $i + 1;
			}

			$query = $this->db->prepare($req);
			$query->execute();
			$results = $query->fetch(PDO::FETCH_ASSOC);

			// Vérification
			if (count($results) <= 1) {
				return false;
			}

			// Alimentation de l'objet
			foreach($results as $key => $val) {
				$this->{$key} = $val;
			}

			return true;
		}

		/**
		* @param array $condition
		*
		* simple alimentation de l'objet user sans test
		* (= populate)
		*/
		public function alimenter( $condition = ["id"=>1]) {
            foreach($condition as $key => $val) {
                $this->{$key} = $val;
            }
            return;
		}
		
		/**
		* getAllby
		*
		* Finding in the database a match for tuples (2->n)
		* PHP version 5.6
		*
		* @search[[]] 2 arrays, OR or AND,  specifiying what between OR or AND
		* the $request will have (you can do OR and AND to check both). Inside these two arrays, the parameters used to fetch the dataResult
		* @key define "AND" or "OR" for the search[[]] array
		* @array2 is the array which contains the data tested (ex : "login"=>"john")
		*/
		public function getAllBy ($search = [[]], $limit=null, $offset=null)
		{
			$i = 1;
			$req ="";

			foreach ($search as $key=>$array2)
			{
				if($key === "OR")
				{
					$req = "SELECT * FROM " .$this->table. " WHERE ";
					$count = count($array2);
					foreach($array2 as $key2=>$value2)
					{
						$req .= $key2. " = '" .$value2. "'";
						if ($count > 1 && $i < $count) {
								$req .= " OR ";
						}
						$i = $i + 1;
					}
				}
				else if($key === "AND") {
					$req = "SELECT * FROM " .$this->table. " WHERE ";
					$count = count($array2);
					foreach($array2 as $key2=>$value2)
					{
						$req .= $key2. " = '" .$value2. "'";
						if ($count > 1 && $i < $count) {
								$req .= " AND ";
						}
						$i = $i + 1;
					}
				} else {
					$req = "SELECT * FROM " .$this->table;
				}
			}
			// On ajoute limite et offset si ils sont passés en paramètres
			if($limit != null && is_int($limit)) {
			    $req .= " LIMIT :limit";
			}
			
			if($offset != null && is_int($offset)) {
			    $req .= " OFFSET :offset";
			}
			
			// Prépare la requête
			$query = $this->db->prepare($req);
			
			
			if($limit != null && is_int($limit)) {
				$query->bindParam(':limit', $limit, PDO::PARAM_INT);
			}
			
			if($offset != null && is_int($offset)) {
				$query->bindParam(':offset', $offset, PDO::PARAM_INT);
			}
			
			$query->execute();
			/* $results is the results table from the query executed */
			$results = $query->fetchAll(PDO::FETCH_ASSOC);

			if (count($results) < 1) {
				return false;
			}

			// TODO: A adapter suite au fetch -> fetchAll ?
			/*foreach($results as $key => $val) {
				$this->{$key} = $val;
			}*/
			
			return $results;
		}

        /**
         * delete
         *
         * Delete an element by id
         *
         * @id Use the id set in parameter or take the one from the object
         *
         * return true if the delete is successful or else false
         */
        public function deleteById ($id=null) {
            if($id==null) {
                $id = $this->id;
            }

            if ($id != -1) {
                $query = $this->db->prepare(
                    "DELETE FROM " . $this->table . " WHERE id=:id");
                $query->execute(array("id" => $this->id));

                $query = $this->db->prepare(
                    "SELECT COUNT(*) FROM " . $this->table . " WHERE id=:id");
                $query->execute(array("id" => $id));
                $results = $query->fetch(PDO::FETCH_ASSOC);
                if($results["COUNT(*)"] <= 0) {
                    return true;
                } else {
                    return false;
                }
            }
            return false;
        }
	}
