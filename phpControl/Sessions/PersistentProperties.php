<?php
/**
 * Backyard Media 
 * Filename: PersistentProperties.php
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
namespace phpControl\Sessions;

trait PersistentProperties
{
    /**
     * @var string Name of the autologin cookie
     */
    protected $cookie = 'backyard_auth';

    /**
     * @var string Default table where session data is stored
     */
    protected $table_sess = 'sessions';

    /**
     * @var string Name of database table that stores user credentials
     */
    protected $table_users = 'users';

    /**
     * @var string Name of database table that stores autologin details
     */
    protected $table_autologin = 'autologin';

    /**
     * @var string Default column for session ID
     */
    protected $col_sid = 'sid';

    /**
     * @var string Default column for expiry timestamp
     */
    protected $col_expiry = 'expiry';

    /**
     * @var string Name of table column that stores the user's username
     */
    protected $col_name = 'username';

    /**
     * @var string Default column for session data
     */
    protected $col_data = 'data';

    /**
     * @var string Name of table column that stores the user key
     */
    protected $col_ukey = 'user_key';

    /**
     * @var string Name of table column that stores 32-character single-use tokens.
     */
    protected $col_token = 'token';


    /**
     * @var string Name of table column that stores when the record was created as a MySQL timestamp
     */
    protected $col_created = 'created';

    /**
     * @var string Name of table column that stores a Boolean recording whether the token has been used
     */
    protected $col_used = 'used';

    /**
     * @var string Sessin varible that persists data
     */
    protected $sess_persist = 'remember';
 
    /**
     * @var string Session varible that stores the username
     */
    protected $sess_uname = 'username';

    /**
     * @var string Session name that indicates user has been authenticated
     */
    protected $sess_auth = 'authenticated';

    /**
     * @var string Session name that indicates user has been revalidated
     */
    protected $sess_revalid = 'revalidated';

    /**
     * @var string Session variable that stores the user key
     */
    protected $sess_ukey = 'user_key';

}

?>