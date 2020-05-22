<?php
//  lab 2
interface Authenticator{
    public function hashPassword();
    public function isPasswordCorrect();
    public function login();
    public function logout();
    public function createFormErrorSession();
}