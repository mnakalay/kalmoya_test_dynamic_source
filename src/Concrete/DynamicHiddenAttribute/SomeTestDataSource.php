<?php
namespace Concrete\Package\KalmoyaTestDynamicSource\DynamicHiddenAttribute;

use Concrete\Package\KalmoyaHiddenAttributes\DynamicHiddenAttribute\DataSource;

class SomeTestDataSource extends DataSource
{
    /**
     * This function is required
     * Returns the name of the data source
     * Used when listing all data sources in the dynamic hidden attribute settings.
     *
     * @return string
     **/
    public function getDataSourceName()
    {
        return t("Test Data Source");
    }

    /**
     * This function is required
     * Returns the description of the data source
     * Used to provide information when selecting a data source
     * in the dynamic hidden attribute settings.
     *
     * @return string
     **/
    public function getDataSourceDescription()
    {
        return t("Test data source - get a random number between 1 and 100");
    }

    /**
     * This function is required
     * This is the meat of your Data Source
     * This function returns the value you want the attribute to have
     * when the form is submitted (current user, current page, date, random code...)
     * It can be anything really but will be saved as string.
     *
     * @return string
     **/
    public function getDynamicValue()
    {
        return rand(1, 100);
    }

    /**
     * This function is required
     * Returns a display value of the attribute saved value
     * It could be a simple string or even HTML markup
     * This is called by the attribute getDisplayValue() function.
     * For instance, it will be called when displaying the saved value in a form result report.
     *
     * @return string
     **/
    public function getDynamicDisplayValue($value)
    {
        if (!empty($value)) {
            return t("Test value - your random number is: %s", $value);
        }

        return t("No test value, no random number. How odd!");
    }
}
