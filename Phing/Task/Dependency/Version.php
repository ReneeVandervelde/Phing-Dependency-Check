<?php
/**
 * Version.php
 * 
 * Phing Version Task
 * 
 * @author Maxwell Vandervelde <Max@MaxVandervelde.com>
 */

require_once dirname(__FILE__) . '/../Dependency.php';
require_once dirname(__FILE__) . '/../DependencyException.php';

/**
 * Phing_Task_Dependency_Version
 * 
 * A phing task that checks that a minimum PHP version is met on the system
 * 
 * @package Phing-Dependency-Check
 * @version 1.0.0
 * @license http://creativecommons.org/licenses/by-nc-sa/3.0/legalcode 
 *          Attribution-NonCommercial-ShareAlike 3.0 Unported
 *          Some Rights Reserved
 * @author Maxwell Vandervelde <Max@MaxVandervelde.com>
 */
class Phing_Task_Dependency_Version extends Phing_Task_Dependency
{
    /**
     * @var string The PHP version number required in string format,
     *             e.g. "5.2.11"
     */
    protected $_version;
    
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
        $this->testVersion(
            $this->getVersion()
        );
        
        return;
    }
    
    /**
     * testVersion
     * 
     * Asserts that a PHP minimum version is set
     * 
     * @access public
     * @param string $version the PHP version requirement to meet
     * @return \Phing_Task_Dependency_Version
     * @throws Phing_Task_DependencyException
     */
    public function testVersion($version)
    {
        $actualVersion = $this->versionStringToId(phpversion());
        $testVersion   = $this->versionStringToId($version);
        
        if (!$testVersion < $actualVersion) {
            throw new Phing_Task_DependencyException(
                'PHP version is out of date! '
                . 'Expected ' . $version . ', found ' . phpversion()
            );
        }
        
        return $this;
    }


    /**
     * versionStringToId
     * 
     * Converts a PHP version string, such as '5.2.3' to the version int ID
     * 
     * @access protected
     * @param string $version
     * @return int
     * @throws InvalidArgumentException
     */
    protected function versionStringToId($version)
    {
        if (!is_string($version)) {
            throw new InvalidArgumentException(
                'Unexpected ' . gettype($version) . '. Expected a string'
            );
        }
        
        $versionArr = explode('.', $version);
        
        if (count($versionArr) > 3 || count($versionArr) < 1) {
            throw new InvalidArgumentException(
                'Unexpected version format: ' . $version
            );
        }

		$versionId = $versionArr[0] * 10000 
            + $versionArr[1] * 100 
            + $versionArr[2];
        
        return $versionId;
    }
    
    /**
     * setVersion
     * 
     * Sets the version number required to check against
     * 
     * @access public
     * @param string $version The PHP version number required in string format,
     *             e.g. "5.2.11"
     * @return \Phing_Task_Dependency_Version
     * @throws InvalidArgumentException
     */
    public function setVersion($version)
    {
        if (!is_string($version)) {
            throw new InvalidArgumentException(
                'Unexpected ' . gettype($version) . '. Expected a string'
            );
        }
        
        $this->_version = $version;
        
        return $this;
    }
    
    /**
     * getVersion
     * 
     * Gets the version number to check against
     * 
     * @access public
     * @return string
     * @throws Exception
     */
    public function getVersion()
    {
        if (!isset($this->_version)) {
            throw new Exception(
                'No version was set!'
            );
        }
        
        return $this->_version;
    }
}
