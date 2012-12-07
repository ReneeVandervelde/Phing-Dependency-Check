<?php
/**
 * Dependency.php
 * 
 * Phing Dependency Task
 * 
 * @author Maxwell Vandervelde <Max@MaxVandervelde.com>
 */

require_once 'phing/Task.php';

/**
 * Phing_Task_Dependency
 * 
 * @package Phing-Dependency-Check
 * @version 1.0.0
 * @license http://creativecommons.org/licenses/by-nc-sa/3.0/legalcode 
 *          Attribution-NonCommercial-ShareAlike 3.0 Unported
 *          Some Rights Reserved
 * @author Maxwell Vandervelde <Max@MaxVandervelde.com>
 */
class Phing_Task_Dependency extends Task
{
    /**
     * @var string The current APPLICATION_ENV
     */
    protected $_environment;
    
    /**
     * setApplicationEnvironment
     * 
     * @access public
     * @param string $environment The application environment 
     * @return \Phing_Task_Dependency
     * @throws InvalidArgumentException
     */
    public function setApplicationEnvironment($environment)
    {
        if (!is_string($environment)) {
            throw new InvalidArgumentException(
                'Unexpected ' . gettype($environment) . '. Expected a string'
            );
        }
        
        $this->_environment = $environment;
        
        return $this;
    }
    
    /**
     * getApplicationEnvironment
     * 
     * @access public
     * @return string
     * @throws InvalidArgumentException
     */
    public function getApplicationEnvironment()
    {
        if (!isset($this->_environment)) {
            throw new Exception(
                'No Application Environment was set!'
            );
        }
        
        return $this->_environment;
    }
}
