<?php
/**
 * Executable.php
 * 
 * Phing Executable Task
 * 
 * @author Maxwell Vandervelde <Max@MaxVandervelde.com>
 */

require_once dirname(__FILE__) . '/../Dependency.php';
require_once dirname(__FILE__) . '/../DependencyException.php';

/**
 * Executable
 * 
 * A Phing task that asserts that a specific executable is available
 *
 * @author Maxwell Vandervelde <Max@MaxVandervelde.com>
 * @package Phing-Dependency-Check
 * @version 1.0.0
 * @license http://creativecommons.org/licenses/by-nc-sa/3.0/legalcode 
 *          Attribution-NonCommercial-ShareAlike 3.0 Unported
 *          Some Rights Reserved
 */
class Phing_Task_Dependency_Executable extends Phing_Task_Dependency
{
    /**
     * @var string The executable to check for
     */
    protected $_executable;
    
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
        $this->testExecutableExists(
            $this->getExecutable()
        );
        
        return;
    }
    
    /**
     * testExecutableExists
     * 
     * Asserts that an executable exists
     * 
     * @param string $executable The path to the executable to test
     * @return \Phing_Task_Dependency_Executable
     * @throws Phing_Task_DependencyException
     */
    public function testExecutableExists($executable)
    {
		if (!file_exists($command)) { 
            throw new Phing_Task_DependencyException(
                'Could not locate executable: ' . $executable
            );
        }
        
        return $this;
    }
    
    /**
     * setExecutable
     * 
     * Sets the Executable dependency to check
     * 
     * @access public
     * @param string $executable The executable dependency location / path
     * @return \Phing_Task_Dependency_Executable
     */
    public function setExecutable($executable)
    {
        if (!is_string($executable)) {
            throw new InvalidArgumentException(
                'Unexpected ' . gettype($version) . '. Expected a string'
            );
        }
        
        $this->_executable = $executable;
        
        return $this;
    }
    
    /**
     * getExecutable
     * 
     * Gets the Executable dependency to check
     * 
     * @access public
     * @return string
     * @throws Exception
     */
    public function getExecutable()
    {
        if (!isset($this->_executable)) {
            throw new Exception(
                'No Executable was set!'
            );
        }
        
        return $this->_executable;
    }
}
