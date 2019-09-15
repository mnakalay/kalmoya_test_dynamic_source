<?php
namespace Concrete\Package\KalmoyaTestDynamicSource;

use Concrete\Core\Package\Package;
use KalmoyaTestDynamicSource\Utilities\Installer;

class Controller extends Package
{
    protected $pkgHandle = 'kalmoya_test_dynamic_source';
    protected $appVersionRequired = '8.2.1';
    protected $pkgVersion = '0.9';

    /** @var array defines other package dependency */
    protected $packageDependencies = ['kalmoya_hidden_attributes' => true];

    /**
     * @var bool Remove \Src from package namespace.
     */
    protected $pkgAutoloaderMapCoreExtensions = true;

    protected $pkgAutoloaderRegistries = [
        'src/KalmoyaTestDynamicSource' => '\KalmoyaTestDynamicSource',
    ];

    public function getPackageDescription()
    {
        return t("A simple example package to add custom data sources to the Dynamic Hidden Express Attribute. %s Developed by Nour Akalay @ %sKALMOYA - bespoke Concrete5 development%s", '<br /><span style="font-size:11px;">', '<a target="_blank" href="https://kalmoya.com">', '</a></span>');
    }

    public function getPackageName()
    {
        return t("Test Data Source for the Dynamic Hidden Attribute for Express");
    }

    public function installApplication()
    {
        // We need the package Entity to run the data source installer
        // so let's get it here using $this->getPackageEntity()
        $this->app->make(Installer::class)->runInstallation($this->getPackageEntity());
    }

    public function install()
    {
        parent::install();
        $this->installApplication();
    }

    public function upgrade()
    {
        parent::upgrade();
        $this->installApplication();
    }

    public function uninstall()
    {
        // There is nothing fo you to do here.
        // Data sources installed by this package
        // are automatically removed when the package is uninstalled
        parent::uninstall();
    }
}
