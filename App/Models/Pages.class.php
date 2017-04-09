<?php 
	class Pages extends BaseSql{

		protected $id;
        protected $name;
        protected $description;
        protected $friendly_url;
        //protected $date_created;
        //protected $date_modified;

		public function __construct($id=-1, $name=null, $description=null, $friendly_url=null,
                                        $date_created="NOW", $date_modified=null) {
			$this->setId($id);
			$this->setName($name);
			$this->setDescription($description);
			$this->setFriendlyUrl($friendly_url);
            //$this->setDateCreated($date_created);
            //$this->setDateModified($date_modified);

			parent::__construct();
		}

		/* Setters */
		public function setId($id) {
			$this->id=$id;
		}

        public function setName($name) {
            $this->name=trim($name);
        }

        public function setDescription($description) {
            $this->description=trim($description);
        }

		public function setFriendlyUrl($friendly_url) {
			$this->friendly_url=trim($friendly_url);
		}

        public function setDateCreated($date_created) {
            $this->date_created=$date_created;
        }

        public function setDateModified($date_modified) {
            $this->date_modified=$date_modified;
        }

        /* Getters */
        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getFriendly_url() {
            return $this->friendly_url;
        }

        public function getDateCreated() {
            return $this->date_created;
        }

        public function getDateModified() {
            return $this->date_modified;
        }
	}