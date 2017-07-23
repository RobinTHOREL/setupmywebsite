<?php 
	class Pages extends BaseSql{

		protected $id;
        protected $title;
        protected $description;
        protected $is_published;

		public function __construct($id=-1, $title=null, $description=null, $is_published=null) {
			$this->setId($id);
			$this->setTitle($title);
			$this->setDescription($description);
			$this->setIsPublished($is_published);

			parent::__construct();
		}

		/* Setters */
		public function setId($id) {
			$this->id=$id;
		}

        public function setTitle($title) {
            $this->title=trim($title);
        }

        public function setDescription($description) {
            $this->description=trim($description);
        }

		public function setIsPublished($is_published) {
			$this->is_published=trim($is_published);
		}

        /* Getters */
        public function getId() {
            return $this->id;
        }

        public function getTitle() {
            return $this->title;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getIsPublished() {
            return $this->is_published;
        }

	}