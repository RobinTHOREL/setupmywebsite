<?php 
	class Comments extends BaseSql{

        protected $id;
        protected $id_post;
        protected $id_author;
        protected $title;
        protected $content;

        public function __construct($id=-1, $id_post=0, $id_author=0, $title=null,
                                        $content=null) {
			$this->setId($id);
            $this->setIdPost($id_post);
            $this->setIdAuthor($id_author);
            $this->setTitle($title);
            $this->setContent($content);

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
	}