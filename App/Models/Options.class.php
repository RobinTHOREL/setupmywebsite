<?php 
	class Options extends BaseSql{

        protected $id;
        protected $option;
        protected $value;

        public function __construct($id=-1, $option=null, $value=null) {
            $this->setId($id);
            $this->setOption($option);
            $this->setValue($value);

            parent::__construct();
        }

        /* Setters */
        public function setId($id) {
            $this->id=$id;
        }

        public function setOption($option) {
            $this->option=$option;
        }

        public function setValue($value) {
            $this->value=$value;
        }

        /* Getters */
        public function getId() {
            return $this->id;
        }

        public function setOption() {
            return $this->option;
        }

        public function setValue() {
            return $this->value;
        }
    }