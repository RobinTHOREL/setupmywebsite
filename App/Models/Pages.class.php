<?php
	class Pages extends BaseSql
    {

        protected $id;
        protected $title;
        protected $description;
        protected $is_published;
        protected $template;


        public function __construct($id = -1, $title = null, $description = null, $is_published = null, $template=null)
        {
            $this->setId($id);
            $this->setTitle($title);
            $this->setDescription($description);
            $this->setIsPublished($is_published);
            $this->setTemplate($template);

            parent::__construct();
        }

        /* Setters */
        public function setId($id)
        {
            $this->id = $id;
        }

        public function setTitle($title)
        {
            $this->title = trim($title);
        }

        public function setDescription($description)
        {
            $this->description = trim($description);
        }

        public function setIsPublished($is_published)
        {
            $this->is_published = trim($is_published);
        }

        /* Getters */
        public function getId()
        {
            return $this->id;
        }

        public function getTitle()
        {
            return htmlspecialchars($this->title);
        }

        public function getDescription()
        {
            return htmlspecialchars($this->description);
        }

        public function getIsPublished()
        {
            return $this->is_published;
        }
        public function setTemplate($template) {
            $this->template=trim($template);
        }
        public function getTemplate() {
            return $this->template;
        }
    }

