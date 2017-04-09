<?php 
	class Posts extends BaseSql{

        protected $id;
        protected $id_pages;
        protected $id_author;
        protected $name;
        protected $description;
        protected $title;
        protected $content;
        protected $date_created;
        protected $date_updated;

		public function __construct($id=-1, $id_pages=null, $id_author=null, $name=null,
                                        $description=null, $title=null, $content=null,
                                        $date_created="NOW", $date_updated=null) {
			$this->setId($id);
			$this->setIdPages($id_pages);
            $this->setIdAuthor($id_author);
            $this->setName($name);
			$this->setDescription($description);
            $this->setTitle($title);
            $this->setContent($content);
            //$this->setDateCreated($date_created);
            //$this->setDateUpdated($date_updated);

			parent::__construct();
		}

		/* Setters */
		public function setId($id) {
			$this->id=$id;
		}

        public function setIdPages($id_pages) {
            $this->id_pages=$id_pages;
        }

        public function setIdAuthor($id_author) {
            $this->id_author=$id_author;
        }

        public function setName($name) {
            $this->name=trim($name);
        }

        public function setDescription($description) {
            $this->description=$description;
        }

		public function setTitle($title) {
			$this->title=trim($title);
		}

        public function setContent($content) {
            $this->content=$content;
        }

        public function setDateCreated($date_created) {
            $this->date_created=$date_created;
        }

        public function setDateUpdated($date_updated) {
            $this->date_updated=$date_updated;
        }

        /* Getters */
        public function getId() {
            return $this->id;
        }

        public function getIdPages() {
            return $this->id_pages;
        }

        public function getIdAuthor() {
            return $this->id_author;
        }

        public function getName() {
            return $this->name;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getTitle() {
            return $this->title;
        }

        public function getContent() {
            return $this->content;
        }

        public function getDateCreated() {
            return $this->date_created;
        }

        public function getDateUpdated() {
            return $this->date_updated;
        }
	}