<?php
/**
 * Extension.php
 * 
 * Phing Extension Task
 * 
 * @author Maxwell Vandervelde <Max@MaxVandervelde.com>
 */

require_once dirname(__FILE__) . '/../Dependency.php';
require_once dirname(__FILE__) . '/../DependencyException.php';

/**
 * Phing_Task_Dependency_Extension
 * 
 * A Phing task that checks that a PHP extension is installed
 * 
 * @package Phing-Dependency-Check
 * @version 1.0.0
 * @license http://creativecommons.org/licenses/by-nc-sa/3.0/legalcode 
 *          Attribution-NonCommercial-ShareAlike 3.0 Unported
 *          Some Rights Reserved
 * @author Maxwell Vandervelde <Max@MaxVandervelde.com>
 */
class Phing_Task_Dependency_Extension extends Phing_Task_Dependency 
{
    /**
     * @var string The extension to express a dependency upon 
     */
    protected $_extension;
    
    /**
     * main
     * 
     * Runs the phing task wiring
     * 
     * @access public
     * @return void
     */
    public function main()
    {
        $this->testExtension(
            $this->getExtension()
        );
        
        return;
    }
    
    /**
     * testExtension
     * 
     * @access public
     * @param string $extension
     * @return \Phing_Task_Dependency_Extension
     * @throws Phing_Task_DependencyException
     */
    public function testExtension($extension)
    {
        $loadedExtensions = get_loaded_extensions();
        
        if (!in_array($extension, $loadedExtensions)) {
            throw new Phing_Task_DependencyExtension(
                'Could not load PHP Extension: ' . $extension
            );
        }
        
        return $this;
    }
    
    /**
     * setExtension
     * 
     * @access public
     * @param string $extension The extension to express a dependency upon
     * @return \Phing_Task_Dependency_Extension
     */
    public function setExtension($extension)
    {
        if (is_string($extension)) {
            throw new InvalidArgumentException(
                'Could not load PHP Extension: ' . $extension
            );
        }
        
        $this->_extension = $extension;
        
        return $this;
    }
    
    /**
     * getExtension
     * 
     * @access public
     * @return string
     * @throws Exception
     */
    public function getExtension()
    {
        if (!isset($this->_extension)) {
            throw new Exception(
                'No Extension was set!'
            );
        }
        
        return $this->_extension;
    }
}
