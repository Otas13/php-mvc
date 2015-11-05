<?php

namespace core\helpers;

class SessionManager
{
    static function sessionStart($name, $limit = 0, $secure = null)
   {
      # definovani jmena
      session_name($name . '_session');

      # zjisteni sifrovani
      $https = isset($secure) ? $secure : isset($_SERVER['HTTPS']);

      # vlozeni nastaveni do sessionu
      session_set_cookie_params($limit, '/', '.'.$_SERVER['SERVER_NAME'], $secure, true);
      session_start();

    if(self::validateSession())
	{
		# kontrola parametru uzivatele a sessionu
		if(!self::preventHijacking())
		{
            $_SESSION = array();
            $_SESSION['IPaddress'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];

	    }elseif(rand(1, 100) <= 5){
            # nahodne regeneruje sessiony 5% pripadu
			self::regenerateSession();
		}
    }else{
        # pokud session neproleze validaci, je zrusen
		$_SESSION = array();
		session_destroy();
		session_start();
	}
    }

    static protected function preventHijacking()
    {
        #kontrola jestli session obsahuje pole ke kontrole
	if(!isset($_SESSION['IPaddress']) || !isset($_SESSION['userAgent'])){
		return false;
    }

        #kontrola jestli se IP v sessionu shoduje s aktualni
	if ($_SESSION['IPaddress'] != $_SERVER['REMOTE_ADDR']){
		return false;
    }

        #kontrola jestli data o prohlizeci a SW se shoduji se sessionem
	if( $_SESSION['userAgent'] != $_SERVER['HTTP_USER_AGENT']){
		return false;
    }

	return true;
}

static function regenerateSession()
{
	// If this session is obsolete it means there already is a new id
	if(isset($_SESSION['OBSOLETE']) || $_SESSION['OBSOLETE'] == true)
		return;

	// Set current session to expire in 10 seconds
	$_SESSION['OBSOLETE'] = true;
	$_SESSION['EXPIRES'] = time() + 10;

	// Create new session without destroying the old one
	session_regenerate_id(false);

	// Grab current session ID and close both sessions to allow other scripts to use them
	$newSession = session_id();
	session_write_close();

	// Set session ID to the new one, and start it back up again
	session_id($newSession);
	session_start();

	// Now we unset the obsolete and expiration values for the session we want to keep
	unset($_SESSION['OBSOLETE']);
	unset($_SESSION['EXPIRES']);
}

static protected function validateSession()
{
	if( isset($_SESSION['OBSOLETE']) && !isset($_SESSION['EXPIRES']) )
		return false;

	if(isset($_SESSION['EXPIRES']) && $_SESSION['EXPIRES'] < time())
		return false;

	return true;
}
}
