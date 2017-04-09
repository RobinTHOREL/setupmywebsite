<?php 
	class Categories extends BaseSql{

        protected $id;
        protected $name;

		public function __construct($id=-1, $name=null) {
			$this->setId($id);
            $this->setName($name);

			parent::__construct();
		}

		/* Setters */
		public function setId($id) {
			$this->id=$id;
		}

        public function setName($name) {
            $this->name=$name;
        }

        /* Getters */
        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }
	}