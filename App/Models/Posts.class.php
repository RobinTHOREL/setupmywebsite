<?php 
	class Posts extends BaseSql{

        protected $id;
        protected $users_id;
        protected $pages_id;
        protected $title;
        protected $content;
        protected $show_date;

        public function __construct($id=-1, $users_id=0, $pages_id=0, $title=null,
                                        $content=null, $show_date=null) {
			$this->setId($id);
			$this->setUsersId($users_id);
			$this->setPagesId($pages_id);
			$this->setTitle($title);
			$this->setContent($content);
			$this->setShowDate($show_date);

			parent::__construct();
		}

		/* Setters */
		public function setId($id) {
			$this->id=$id;
		}

        public function setPagesId($pages_id) {
            $this->pages_id=$pages_id;
        }

        public function setUsersId($users_id) {
            $this->users_id=$users_id;
        }

        public function setTitle($title) {
            $this->title=trim($title);
        }

        public function setContent($content) {
            // On met à jour les liens des images de Public pour 
            //  les rendre relatif à la base
            $pattern = "/src( )*=( )*['\"](.)*".BASE_PATH_PATTERN.PUBLIC_PATH."/";
            $replacement = "src=\"/".PUBLIC_PATH;
            $contentReplace = preg_replace($pattern, $replacement, $content);
            if($contentReplace !== null) {
                $this->content=$contentReplace;
            }
            $this->content=$content;
        }
        
        public function setShowDate($show_date) {
            $this->show_date=$show_date;
        }



        /* Getters */
        public function getId() {
            return $this->id;
        }

        public function getPagesId() {
            return $this->pages_id;
        }

        public function getUsersId() {
            return $this->users_id;
        }

        public function getTitle() {
            return $this->title;
        }
        
        public function getContent() {
            // On met à jour les liens des images de Public pour
            //  les rendre relatif à la base
            $pattern = "/src( )*=( )*['\"](.)*".PUBLIC_PATH."/";
            $replacement = "src=\"".BASE_ABSOLUTE_PATTERN.PUBLIC_PATH;
            $contentReplace = preg_replace($pattern, $replacement, $this->content);
            if($contentReplace !== null) {
                return $contentReplace;
            } 
            return $this->content;
        }

        public function getShowDate() {
            return $this->show_date;
        }
    }
