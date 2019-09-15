# Hidden Data Attributes for Express
## Example Dynamic Data Source Installation Package

This package shows you how easy it is to create your own Data Source for the package *Hidden Data Attributes for Express*.

Any new Data Source you want to install has to be in a package. A package can contain any number of Data Sources.

**The package *Hidden Data Attributes for Express* is required in order to install and use your Data Sources.**


## What to pay attention to
### First you have to create your Data Source Class.

Your Data Source will have a **handle** that can only have alphanumeric characters and underscores `_` just like a package or an attribute's handle.

**In this example package the Data Source handle is `some_test`**

Your Data Source's **class name** will be the camel case version of your handle + DataSource.

**So for this example the class name is `SomeTestDataSource`.**

The Data Source class will be located in the folder `packages\your_package_handle\src\Concrete\DynamicHiddenAttribute`

So, for this example, the class is in `packages\kalmoya_test_dynamic_source\src\Concrete\DynamicHiddenAttribute\SomeTestDataSource.php`

Your Data Source **must** extend the class `Concrete\Package\KalmoyaHiddenAttributes\DynamicHiddenAttribute\DataSource` included with the required package *Hidden Data Attributes for Express*.

That class is an **abstract class that includes 4 public abstract functions**. So your Data Source class **must** include those 4 functions. 

If you look at the example here you will see the **4 required functions along with a description**. They are:
1. getDataSourceName()
2. getDataSourceDescription()
3. getDynamicValue()
4. getDynamicDisplayValue($value)

**The most important one is** `getDynamicValue()` which is where you give the attribute its value. It can be anything you want (current user, generated code, current page, request value...)

`getDynamicDisplayValue($value)` is the only one which has a parameter. The parameter is the attribute's saved value and **it is required**.

### Second you have to install your Data Source

You install your Data Source during the package's install or update routine.

This example package uses an installer file to do that so it's easy to understand quickly what is happening. Look at the file `packages\kalmoya_test_dynamic_source\src\KalmoyaTestDynamicSource\Utilities\Installer.php` and at the function `RunInstallation()`

You will see how easy it is to install one or many Data Sources.

**All Data Sources installed by your custom package are automatically uninstalled when you uninstall the package so no need to worry about that.**

And that's all there is to it really :)
