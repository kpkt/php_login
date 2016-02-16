<?php

/*
 * PHP Login and Registration Script with PDO and OOP
 * In this tutorial I'm going to explain  a login and registration script using PDO and OOP
 * @author 	: Mohamad Zaki Mustafa
 * @contact 	: mohdzaki04@gmail.com
 * @fb	 	: https://www.facebook.com/zakimedia
 * @tw	 	: https://twitter.com/mzmfizaki
 */

/*
 * CRUD file
 * @name User
 * @description This is the main class file which contains code for database operations.
 *              so that we won't have to write the same header codes every-time. 
 *              This file contains bootstrap file links. 
 */

class User {

    private $db;
    private $staticKey;

    /**
     * Construct
     * @param type $dbCon
     */
    function __construct($dbCon) {
        $this->db = $dbCon;
        /**
         * 
         * Nota : PHP mencadangkan supaya password_hash 
         * menjana sendiri salt secara rawak
         * Contoh 'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
         * Tetapi dalam contoh ini menggunakan static salt dan 
         * anda akan menghadapi masalah jikasalt diubah
         * untuk login pengguna sedia ada.
         * Pilihan di tangan anda......
         * 
         */
        $this->staticKey = "AZBCG93b0qyJfIxfs2guaoUubKwvniR2G0FgaC9mu";
    }

    /**
     * @param type $upass
     * 
     */
    private function pwd_salt($upass) {
        $options = [
            'cost' => 12,
            'salt' => $this->staticKey,
                //'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ];
        return $salPassword = password_hash($upass, PASSWORD_BCRYPT, $options);
    }

    /**
     * Register Function
     * Functions are in try/catch block to handle exceptions.
     * @param type $fname
     * @param type $femail
     * @param type $fphone
     * @param type $upass
     * @return boolean
     * @ref http://php.net/manual/en/pdostatement.execute.php
     * @ref http://php.net/manual/en/pdostatement.bindparam.php
     */
    public function register($fname, $femail, $fphone, $upass) {
        $saltpass = $this->pwd_salt($upass);
        try {
            $stmt = $this->db->prepare("INSERT INTO users(name,email,pwd,phone) VALUES(:name, :email, :saltpass, :phone)");
            $stmt->bindparam(":name", $fname);
            $stmt->bindparam(":email", $femail);
            $stmt->bindparam(":phone", $fphone);
            $stmt->bindparam(":saltpass", $saltpass);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * Login
     * @param type $femail
     * @param type $fpass
     * @return boolean
     */
    public function login($femail, $upass) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email=:email LIMIT 1");
            $stmt->execute(array(':email' => $femail));
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                if (password_verify($upass, $userRow['pwd'])) {
                    $_SESSION['user_session'] = array(
                        'id' => $userRow['id'],
                        'name' => $userRow['name'],
                        'email' => $userRow['email'],
                        'phone' => $userRow['phone'],
                    );
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Check is login
     * @return boolean
     */
    public function is_loggedin() {
        if (isset($_SESSION['user_session'])) {
            return true;
        }
    }

    /**
     * 
     * @param type $url
     */
    public function redirect($url) {
        header("Location: $url");
    }

    /**
     * 
     * @return boolean
     */
    public function logout() {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }

}
