<?php
	class Options extends BaseSql
    {

        protected $id;
        protected $name;
        protected $value;

        public function __construct($id = -1, $Name = null, $value = null)
        {
            $this->setId($id);
            $this->setName($Name);
            $this->setValue($value);

            parent::__construct();
        }

        /* Setters */
        public function setId($id)
        {
            $this->id = $id;
        }

        public function setName($Name)
        {
            $this->name = $Name;
        }

        public function setValue($value)
        {
            $this->value = $value;
        }

        /* Getters */
        public function getId()
        {
            return $this->id;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getValue()
        {
            return $this->value;
        }
    }