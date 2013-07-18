<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Minipn exception
 *
 * @package    Kohana
 * @category   Minion
 * @author     Kohana Team
 * @copyright  (c) 2009-2011 Kohana Team
 * @license    http://kohanaframework.org/license
 */
class Kohana_Minion_Exception extends Kohana_Kohana_Exception
{
    public static $error_view = 'kohana/cli_error';

	/**
	 * Inline exception handler, displays the error message, source of the
	 * exception, and the stack trace of the error.
	 *
	 * Should this display a stack trace? It's useful.
	 *
	 * Should this still log? Maybe not as useful since we'll see the error on the screen.
	 * @param   Exception   $e
	 * @return  Response
	 */
	public static function response(Exception $e)
	{
        return PHP_SAPI=='cli' ? self::cli_response($e) : parent::response($e);
	}

    protected static function cli_response($e){
        $old_view = Kohana_Exception::$error_view;
        Kohana_Exception::$error_view = self::$error_view;

        $response = parent::response($e);

        Kohana_Exception::$error_view = $old_view;
        return $response;
    }
}
