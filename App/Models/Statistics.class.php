<?php 
	class Statistics extends BaseSql{

        protected $id;
        protected $type;
        protected $hits;
        protected $date;


		public function __construct($id=-1, $type=null, $hits=0, $date=null) {
			$this->setId($id);
            $this->setType($type);
            $this->setHits($hits);
            $this->setDate($date);

			parent::__construct();
		}

		/* Setters */
		public function setId($id) {
			$this->id=$id;
		}

        public function setType($type) {
            $this->type=$type;
        }

        public function setHits($hits) {
            $this->hits=$hits;
        }

        public function setDate($date) {
            $this->date=$date;
        }

        /* Getters */
        public function getId() {
            return $this->id;
        }

        public function getType() {
            return $this->type;
        }

        public function getHits() {
            return $this->hits;
        }

        public function getDate() {
            return $this->date;
        }
	}