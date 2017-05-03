<?php 
	class CategoriesRelations extends BaseSql{

        protected $id_category;
        protected $id_post;

		public function __construct($id_category=0, $id_category=0) {
			$this->setIdCategory($id_category);
            $this->setIdPost($id_category);

			parent::__construct();
		}

		/* Setters */
		public function setIdCategory($id_category) {
			$this->id_category=$id_category;
		}

        public function setIdPost($id_category) {
            $this->id_category=$id_category;
        }

        /* Getters */
        public function getIdCategory() {
            return $this->id_category;
        }

        public function getIdPost() {
            return $this->id_category;
        }
	}