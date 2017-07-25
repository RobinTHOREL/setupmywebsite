<?php 
	class Medias extends BaseSql{

        protected $id;
        protected $name;
        protected $description;
        protected $author_id;
        protected $format;
        protected $link;

		public function __construct($id=-1, $name=null, $description=null, $author=null,
                                        $format=null, $link=null) {
			$this->setId($id);
            $this->setName($name);
            $this->setDescription($description);
            $this->setAuthor($author);
            $this->setFormat($format);
            $this->setLink($link);

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

		public function setAuthor($author) {
			$this->author_id=$author;
		}

        public function setFormat($format) {
            $this->format=$format;
        }

        public function setLink($link) {
            $this->link=$link;
        }

        /* Getters */
        public function getId() {
            return $this->id;
        }

        public function getName() {
            return htmlspecialchars($this->name);
        }

        public function getDescription() {
            return htmlspecialchars($this->description);
        }

        public function getAuthor() {
            return $this->author_id;
        }

        public function getFormat() {
            return $this->format;
        }

        public function getLink() {
            return $this->link;
        }
	}