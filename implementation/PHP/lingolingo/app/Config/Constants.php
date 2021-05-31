<?php

/*
 | --------------------------------------------------------------------
 | App Namespace
 | --------------------------------------------------------------------
 |
 | This defines the default Namespace that is used throughout
 | CodeIgniter to refer to the Application directory. Change
 | this constant to change the namespace that all application
 | classes should use.
 |
 | NOTE: changing this will require manually modifying the
 | existing namespaces of App\* namespaced-classes.
 */
defined('APP_NAMESPACE') || define('APP_NAMESPACE', 'App');

/*
 | --------------------------------------------------------------------------
 | Composer Path
 | --------------------------------------------------------------------------
 |
 | The path that Composer's autoload file is expected to live. By default,
 | the vendor folder is in the Root directory, but you can customize that here.
 */
defined('COMPOSER_PATH') || define('COMPOSER_PATH', ROOTPATH . 'vendor/autoload.php');

/*
 |--------------------------------------------------------------------------
 | Timing Constants
 |--------------------------------------------------------------------------
 |
 | Provide simple ways to work with the myriad of PHP functions that
 | require information to be in seconds.
 */
defined('SECOND') || define('SECOND', 1);
defined('MINUTE') || define('MINUTE', 60);
defined('HOUR')   || define('HOUR', 3600);
defined('DAY')    || define('DAY', 86400);
defined('WEEK')   || define('WEEK', 604800);
defined('MONTH')  || define('MONTH', 2592000);
defined('YEAR')   || define('YEAR', 31536000);
defined('DECADE') || define('DECADE', 315360000);

/*
 | --------------------------------------------------------------------------
 | Exit Status Codes
 | --------------------------------------------------------------------------
 |
 | Used to indicate the conditions under which the script is exit()ing.
 | While there is no universal standard for error codes, there are some
 | broad conventions.  Three such conventions are mentioned below, for
 | those who wish to make use of them.  The CodeIgniter defaults were
 | chosen for the least overlap with these conventions, while still
 | leaving room for others to be defined in future versions and user
 | applications.
 |
 | The three main conventions used for determining exit status codes
 | are as follows:
 |
 |    Standard C/C++ Library (stdlibc):
 |       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
 |       (This link also contains other GNU-specific conventions)
 |    BSD sysexits.h:
 |       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
 |    Bash scripting:
 |       http://tldp.org/LDP/abs/html/exitcodes.html
 |
 */
defined('EXIT_SUCCESS')        || define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          || define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         || define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   || define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  || define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') || define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     || define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       || define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      || define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      || define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

// ACCOUNT STATUS NAMES
defined('ACCOUNT_STATUS_APPROVED') || define('ACCOUNT_STATUS_APPROVED', "Approved");
defined('ACCOUNT_STATUS_PENDING') || define('ACCOUNT_STATUS_PENDING', "Pending");
defined('ACCOUNT_STATUS_SUSPENDED') || define('ACCOUNT_STATUS_SUSPENDED', "Suspended");

// ACCOUNT TYPES
defined('ACCOUNT_TYPE_PLAYER') || define('ACCOUNT_TYPE_PLAYER', "Player");
defined('ACCOUNT_TYPE_PROFESSOR') || define('ACCOUNT_TYPE_PROFESSOR', "Professor");
defined('ACCOUNT_TYPE_ADMIN') || define('ACCOUNT_TYPE_ADMIN', "Administrator");

// LOGIN
defined('LOGIN_UNKNOWN_USER') || define('LOGIN_UNKNOWN_USER', "User with entered username doesn't exist");
defined('LOGIN_WRONG_PASSWORD') || define('LOGIN_WRONG_PASSWORD', "You've entered an incorrect password");
defined('LOGIN_PENDING_APPROVAL') || define('LOGIN_PENDING_APPROVAL', "Your account is still pending approval");
defined('LOGIN_ACCOUNT_SUSPENDED') || define('LOGIN_ACCOUNT_SUSPENDED', "Your account has been suspended");

// REGISTRATION
defined('REGISTRATION_MISSING_INFO') || define('REGISTRATION_MISSING_INFO', "All fields are required");
defined('REGISTRATION_PASSWORD_MISMATCH') || define('REGISTRATION_PASSWORD_MISMATCH', "Entered passwords do not match");
defined('REGISTRATION_USERNAME_TAKEN') || define('REGISTRATION_USERNAME_TAKEN', "Username you entered is already taken");
defined('REGISTRATION_EMAIL_TAKEN') || define('REGISTRATION_EMAIL_TAKEN', "Email you entered is already taken");
defined('REGISTRATION_PASSWORD_TOO_LONG') || define('REGISTRATION_PASSWORD_TOO_LONG', "Password you entered is too long. Length of the password can not exceed 70 characters");
defined('REGISTRATION_INCORRECT_ACCOUNT_TYPE') || define('REGISTRATION_INCORRECT_ACCOUNT_TYPE', "Incorrect account type");
defined('REGISTRATION_SUCCESSFUL') || define('REGISTRATION_SUCCESSFUL', "Registration successful");