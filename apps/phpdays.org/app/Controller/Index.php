<?php
/**
 * Index controller - handle queries in site root (http://phpdays.dev/).
 *
 * Use "php:Days - php5 framework" (http://phpdays.sf.net).
 *
 * @copyright   Copyright (c) 2009 phpDays foundation (http://phpdays.org)
 * @license     http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link        http://phpdays.sf.net/
 * @package     phpDays
 * @subpackage  phpDays library
 * @author      Anton Danilchenko <happy@phpdays.org>
 */
class Phpdays_Controller_Index extends Days_Controller {
    /** Call before all controller actions */
    public function init() {
        $this->_view->set('title', 'phpDays community');
    }

    /** Index action */
    public function indexAction() {
    }
}