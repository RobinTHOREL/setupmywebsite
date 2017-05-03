<?php 
	class Comments extends BaseSql{

        protected $id;
        protected $id_post;
        protected $id_author;
        protected $title;
        protected $content;
        protected $date_created;
        protected $date_modified;

        public function __construct($id=-1, $id_post=0, $id_author=0, $title=null,
                                        $content=null, $date_created="NOW", $date_modified=null) {
			$this->setId($id);
            $this->setIdPost($id_post);
            $this->setIdAuthor($id_author);
            $this->setTitle($title);
            $this->setContent($content);
            $this->setDateCreated($date_created);
            $this->setDateModified($date_modified);

			parent::__construct();
		}

		/* Setters */
		public function setId($id) {
			$this->id=$id;
		}

        public function setIdPost($id_post) {
            $this->id_post=$id_post;
        }

        public function setIdAuthor($id_author) {
            $this->id_author=$id_author;
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

        public function setDateModified($date_modified) {
            $this->date_modified=$date_modified;
        }

        /* Getters */
        public function getId() {
            return $this->id;
        }

        public function getIdPost() {
            return $this->id_post;
        }

        public function getIdAuthor() {
            return $this->id_author;
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

        public function getDateModified() {
            return $this->date_modified;
        }
	}