<?php
/*
  +----------------------------------------------------------------------+
  | Copyright (c) 2009 The PHP Group                                     |
  +----------------------------------------------------------------------+
  | This source file is subject to version 3.0 of the PHP license,       |
  | that is bundled with this package in the file LICENSE, and is        |
  | available through the world-wide-web at the following url:           |
  | http://www.php.net/license/3_0.txt.                                  |
  | If you did not receive a copy of the PHP license and are unable to   |
  | obtain it through the world-wide-web, please send a note to          |
  | license@php.net so we can mail you a copy immediately.               |
  +----------------------------------------------------------------------+
  | Authors: Cesar Rodas <crodas@php.net>                                |
  +----------------------------------------------------------------------+
*/


/**
 *  Extension to teh MongoLogger class, 
 *  this class add information about the 
 *  REMOTE_ADDR, GET and POST
 */
class My_Logger extends MongoLogger
{
    public $user_ip;
    public $request;

    /**
     *  Sample Hook which appends
     *  properties to the document.
     */
    function pre_save($op, &$document)
    {
        if ($op == 'create') {
            $document['user_ip'] = $_SERVER['REMOTE_ADDR'];
            $document['request'] = array("POST" => $_POST, "GET" => $_GET);
        }
    }
}

