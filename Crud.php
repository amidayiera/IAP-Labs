<?php
    interface Crud{
        public function save($connection);
        public function readAll($connection);
        public function readUnique();
        public function search();
        public function update(); 
        public function removeOne();
        public function removeAll();
    }
?>