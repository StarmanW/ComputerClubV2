<?php
/**
 * User: StarmanW
 * Date: 15-Jan-18
 * Time: 8:01 PM
 */

class PasswordHandler {

    //Method to perform password hashing
    public function hashPass($pass) {
        return password_hash(hash("SHA512", $pass, true), PASSWORD_BCRYPT);
    }

    //Method to verify the password
    public function verifyPass($pass, $hashedPass) {
        return password_verify(hash("SHA512", $pass, true), $hashedPass);
    }
}