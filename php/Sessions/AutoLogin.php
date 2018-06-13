<?php
namespace php\Sessions;

/**
 * Backyard Media 
 * Filename: AutoLogin.php
 * 
 * @author Chatsuda Rattarasan
 * 
 * Credits
 * 
 * Created for the Everything About Backyard Media Sites
 * 
 * Date created: June 13 2018 
 * Copyright (c) 2018 Backyard Media Company & XN TEAM (Chatsuda Rattarasan, Ngoc Tran, Haocheng Li)
 *
 * For the full copyright and license information, please view the LICENSE
 */
class AutoLogin
{
    use PersistentProperties;

    /**
     * @var \PDO Database connection
     */
    protected $db;

    /**
     * @var int Position at which user key is inserted in single-use token
     */
    protected $token_idex;

    /**
     * @var int Number of days the autologin cookie remains valid
     */
    protected $lifetimeDays = 30;

    /**
     * @var int Unix timestamp for when the cookie expires
     */
    protected $expiry;

    /**
     * @var string Path to be set in the autologin cookie
     */
    protected $cookiePath ='/persistent';

    /**
     * @var string Donmain for autologin cookie
     */
    protected $domain = '';

    /**
     * @var null Whether cookie should be sent only over a secure connection
     */
    protected $secure = null;

    /**
     * @var bool Whether cookie should be accessible only through HTTP protocol
     */
    protected $httponly = true;

    /**
     * Constructor
     * 
     * Requires a PDO connection to the datbase where the user's cedentials,
     * session data, and autologin details are stored.
     * 
     * @param \PDO $db Database connection
     * @param int $token_index Position at which user key is to be inserted in token
     */
    public function __construct(\PDO $db, $token_index = 0)
    {
        $this->db = $db;
        if($this->db->getAttribute(\PDO::ATTR_ERRMODE) !== \PDO::ERRMODE_EXCEPTION){
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        $this->token_idex = ($token_index <= 31) ? $token_index : 31;
        $this->expiry = time() + ($this-lifetimeDays * 60 * 60 * 24);

    }

    /**
     * Creates a persistent login for the user
     * 
     * the login process gets the user's unique key (an 8-digit
     * hexadecimal string), and stores it with a random 32-digit
     * string. Both values are merged and appended to the 
     * username to create a single-use token that's stored as a 
     * cookie in the user's browser
     */
    public function persistentLogin()
    {
        // Get the user's ID
        if ($SESSION[$this->sess_ukey] = $this->getUserkey()){
            $this->getExistingData();
            //Generate a random 32-digit hexadecimal token
            $token = $this->generateToken();
            //Store the token and user's ID in the database
            $this->storeToken($token);
            //Store the single-use token as a cookie in the user's browser
            $this->setCookie($token);
            $_SESSION[$this->sess_persist] = true;
            unset($_SESSION[$this->cookie]);
        }

    }

    /**
     * Check if a valid persistent cookie has been presented
     * 
     * If the cookie exists, the user's unique key is retrieved
     * from the database and removed from the single-use token.
     * Before checking for a matching pair, expired token are
     * deleted from the database. If the token is valid, data from
     * the stored session is retrieved and added to the current
     * session.
     */
    public function checkCredentials()
    {
        // Do nothing if the cookie doesn't exist
        if(isset($_COOKIE[$this->cookie])){
            //Delete expired tokens before checking the current one
            $this->clearOld();
            //Log in the user if the token hasn't been used
            if ($this->checkCookieToken($storedToken, false)){
                // Log in the user
                $this->cookieLogin($storedToken);
                //Generate and store a fresh single-use token
                $newToken = $this->generateToken();
                $this->storeToken($newToken);
                $this->setCookie($newToken);
            } elseif ($this->checkCookieToken($storedToken, true)){
                // If the token has already been used, suspect an attack,
                // delete all tokens associated with the user key,
                // and invalidate the current session.
                $this->deleteAll();
                $_SESSION = [];
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 86400, $params['path'], $params['domain'],
                    $params['secure'], $param['httponly']);
                session_destroy();
                // Invalidate the autologin cookie
                setcookie($this->cookie, '', time() - 86400, $this->cookiePath,
                    $this->domain, $this->secure, $this->httponly);

            }
        }

    }

    /**
     * 
     */
    public function logout($all = true)
    {
        if($all) {
            $this->deleteAll();
        } else {
            $token = $this->parseCookie();
            $sql = "UPDATE $this->table_autologin SET $this->col_used =1
                    WHERE $this->col_token = :token";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':token', $token);
            $stmt->execute();
        }
        setcookie($this->cookie, '', time() - 86400, $this->cookiePath,
            $this->domain, $this->secure, $this->httponly);

    }

    /**
     * Retrieves the user's ID from the users table
     * 
     * @return string User's ID
     */
    protected function getUserKey()
    {
        $sql = "SELECT $this->col_ukey FROM $this->table_users
                WHERE $this->col_name = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':username', $_SESSION[$this->sess_uname]);
        $stmt->execute();
        return $stmt->fetchColumn();

    }

    /**
     * Retrieve the user's data from the most recent session
     */
    protected function getExistingData()
    {
        $sql = "SELECT $this->col_data FROM $this->table_autologin
                WHERE $this->col_ukey = :key
                ORDER BY $this->col_created DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':key', $_SESSION[$this->sess_ukey]);
        $stmt->execute();
        //GET the most recent result
        if($data = $stmt->fetchColumn()){
            //Populate the $_SESSION superglobal array
            session_decode($data);
        }
        //Release the database connection for other queries
        $stmt->closeCursor();

    }

    /**
     * Generates a random 32-character string for the single-use token
     * 
     * @return string 32-character hexadecimal string
     */
    protected function generateToken()
    {
        return bin2hex(openssl_random_pseudo_byte(16));
    }


    /**
     * Stores the user's ID and single-use token in the database
     * 
     * @param string $token 32-character hexadecimal string 
     */
    protected function storeToken($token)
    {
        try{
            $sql = "INSERT INTO $this->table_autologin
                    ($this->col_ukey, $this->col_token)
                    VALUES (:key, :token)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':key', $_SESSION[$this->sess_ukey]);
            $stmt->bindParam(':token', $token);
            $stmt->execute();
        }catch (\PDOException $e) {
            if ($this->db->inTransaction()){
                $this->db->rollBack();
            }
            throw $e;
        }
        

    }

     /**
     * Creates and stores autologin cookie in user's browser
     * 
     * @param string $token 32-character single-use token
     */
    protected function setCookie($token)
    {
        $merged = str_split($token);
        array_splice($merged,hexdec($merged[$this->token_index]),0, $_SESSION[$this->sess_ukey]);
        $merged = implode('', $merged);

        $token = $_SESSION[$this->sess_uname] .'|' . $merged;
        setcookie($this->cookie,$token, $this->expiry,
            $this->cookiePath, $this->domain, $this->secure,
                $this->httponly);
        

    }

     /**
     * 
     */
    protected function parseCookie()
    {
        // Seperate the username and submitted token
        $parts = explode('|', $_COOKIE[$this->cookie]);
        $_SESSION[$this->sess_uname] = $parts[0];
        $token = $parts[1];

        // Proceed only if the username is valid
        if ($_SESSION[$this->sess_ukey] = $this->getUserKey()){
            // Remove the user's ID from the submitted cookie token
            return str_replace($_SESSION[$this->sess_ukey], '', $token);
        } else {
            return false;
        }

    }

     /**
     * 
     */
    protected function clearOld()
    {
        $sql = "DELETE FROM $this->table_autologin
                WHERE DATE_ADD($this->col_created, INTERVAL :expiry DAY) < NOW()";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':expiry', $this->lifetimeDays);
        $stmt->execute();

    }

    /**
     * Checks wether the single-use token has already been used
     * 
     * @param string $token 32-digit single-use token
     * @param bool $used
     * @return bool Depends on calue of $used
     */
    protected function checkCookieToken($token, $used)
    {
        $sql = "SELECT COUNT(*) FROM $this->table_autologin
                WHERE $this->col_ukey = :key AND $this->col_token = :token
                AND $this->col_used = :used";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':key', $_SESSION[$this->sess_ukey]);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':used', $used, \PDO::PARAM_BOOL);
        $stmt->execute();
        if ($stmt->fetchColumn() > 0) {
            return true;
        } else {
            return false;
        }

    }

    /**
     * 
     */
    protected function deleteAll()
    {
        $sql = "DELETE FROM $this->table_autologin WHERE $this->col_ukey = :key";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':key', $_SESSION[$this->sess_ukey]);
        $stmt->execute();
    }

    /**
     * 
     */
    protected function cookieLogin($token)
    {
        try{
            $this->getExistingData($_SESSION[$this->sess_ukey]);

            $sql = "UPDATE $this->table_autologin SET $this->col_used = 1
                    WHERE $this->col_ukey = :key AND $this->col_token = :token";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':key', $_SESSION[$this->sess_ukey]);
            $stmt->bindParam(':token', $token);
            $stmt->execute();

            session_regenerate_id(true);

            $_SESSION[$this->cookie] = true;
            unset($_SESSION[$this->sess_auth]);
            unset($_SESSION[$this->sess_revalid]);
            unset($_SESSION[$this->sess_persist]);

        } catch(\PDOException $e){
            if($this->db->inTransaction()){
                $this->db->rollBack();
            }
            throw $e;

        }
        

    }



}

?>