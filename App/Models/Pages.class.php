<?php 
	class Pages extends BaseSql{

		protected $id;
        protected $name;
        protected $description;
        protected $friendly_url;

		public function __construct($id=-1, $name=null, $description=null, $friendly_url=null) {
			$this->setId($id);
			$this->setName($name);
			$this->setDescription($description);
			$this->setFriendlyUrl($friendly_url);

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
	}