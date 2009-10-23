<?php
/**
 * View - Dwoo adapter.
 *
 * Part of "php:Days - php5 framework" project (http://phpdays.sf.net).
 *
 * @copyright    Copyright (c) 2009 phpDays foundation (http://phpdays.org)
 * @license      http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link         http://phpdays.sf.net/
 * @package      phpDays
 * @subpackage   phpDays library
 * @author       Anton Danilchenko <happy@phpdays.org>
 */
class Days_View_Dwoo implements Days_View_Interface {
    /** @var Dwoo_Data  */
    protected $_vars = array();
    /** @var Dwoo */
    protected $_engine;

    public function __construct() {
        // create template engine instance
        $this->_engine = new Dwoo();
        // collect vars
        $this->_vars = new Dwoo_Data(); 
        // configure template engine
        $this->_engine->setCompileDir(Days_Engine::appPath() . 'system/view/');
        $this->_engine->setCacheDir(Days_Engine::appPath() . 'system/cache/');
//        $this->_engine->caching       = Days_Config::load()->get('cache/lifetime', 0) > 0;
    }

    public function render($template) {
        $templatePath = Days_Engine::appPath() . 'View/' . $template;
        if (! file_exists($templatePath))
            throw new Days_Exception("Template file '{$template}' not found");
        return $this->_engine->get($templatePath, $this->_vars);
    }

    public function get($var, $default=null) {
        return $this->_engine->get_template_vars($var);
    }

    /**
     * Set value to variable.
     *
     * @param string $var Variable name
     * @param mixed $value Variable value
     * @param bool $merge Merge new value with old value
     * @param string $delimiter Values separator
     */
    public function set($var, $value, $merge=false, $delimiter='-') {
        // add value to existing
        if ($merge) {
            $oldValue = $this->_engine->get_template_vars($var);
            // set seperator for existing value only
            if (! empty($oldValue))
                $value = "{$value} {$delimiter} {$oldValue}";
        }
        // set new value
        $this->_vars->assign($var, $value);
    }
}