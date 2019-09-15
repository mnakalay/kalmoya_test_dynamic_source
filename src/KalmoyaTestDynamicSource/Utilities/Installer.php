<?php
namespace KalmoyaTestDynamicSource\Utilities;

use Concrete\Core\Application\ApplicationAwareInterface;
use Concrete\Core\Application\ApplicationAwareTrait;
use Concrete\Core\Entity\Package as PackageEntity;
use Concrete\Package\KalmoyaHiddenAttributes\DynamicHiddenAttribute\DataSource;

defined('C5_EXECUTE') or die("Access Denied.");

class Installer implements ApplicationAwareInterface
{
    use ApplicationAwareTrait;

    /**
     * This is where we call the data source installer DataSource::add().
     *
     * The installer expects a Concrete\Core\Entity\Package object
     * not a Concrete\Core\Package\Package object.
     * No need to check if the data source is already installed or not
     * The installer takes care of that
     * The whole installer is in the required package kalmoya_hidden_attributes
     *
     * @param Concrete\Core\Entity\Package $pkg the current package entity
     *
     **/
    public function runInstallation(PackageEntity $pkg)
    {
        // Your data source class name is SomeTestDataSource
        // So your handle is some_test
        // which means that your Data Source Class SomeTestDataSource
        // will be located in the file your_package\src\Concrete\DynamicHiddenAttribute\SomeTestDataSource.php
        $dsTypeHandles = [
            'some_test',
        ];

        foreach ($dsTypeHandles as $handle) {
            DataSource::add($handle, $pkg);
        }
    }
}
