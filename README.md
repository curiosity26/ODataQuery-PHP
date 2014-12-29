ODataQuery-PHP
==============

A library of PHP Classes that allow for OData queries to be easily built and extended for appending to a URL Request to a server-side API supporting OData v4.0. Support for any of the query functions made available in this library are based on the configuration of the API server. This library simply conforms to the expected functionality as described on http://www.odata.org/. Other language versions of this library are available at http://www.odata.org/libraries or on GitHub at https://github.com/ODataOrg/.

<h2>Installation</h2>

<h3>Included in a PHP Project w/ Composer</h3>

Add the following to your composer.json file using the latest version number or 1.0.* to keep it fresh:
```JSON
"require": {
    "curiosity26/odataquery": "1.0.*"
}
```
or to use the bleeding edge developement version:
```JSON
"require": {
    "curiosity26/odataquery": "dev-master"
}
```

<h3>Standalone Project</h3>
ODataQuery-PHP is packaged for Composer. If you don't have composer installed, go to https://getcomposer.org/ download and install.

Once composer is installed, use your command line terminal and cd into the ODataQuery-PHP folder. Run 'composer install'. If you have composer installed correctly, it should work fine and you'll see a new directory created called 'vendors'. Within the vendors folder there is an autoload.php file created by composer.

<h2>Basic Usage</h2>

Include this autoloader when loading your own code module or on any scripts that you are using ODataQuery-PHP in.
```PHP
$autoloader = "/path/to/ODataQuery-PHP/vendor/autoload.php";
require_once $autoloader;
```

<h2>Example</h2>

Our base API URL:
```PHP
$apiUrl = "http://www.example.com/test/api/";
```
First we'll build a path for the request of objects.
(Namespaces will be implied in examples. Assuming you're using and IDE and the autoloader created by composer, these will be filled out for you anyway)
```PHP
$property = 'Employees';
$path = new ODataResourcePath($apiUrl.$property);
```
The created path can be used just like a string variable:
```PHP
print $path;
// http://www.example.com/test/api/Employees
```
If you to force the path to be used as a string (sometimes helpful when passing as a variable into a function that requires a string parameter) you can simply cast the ODataResourcePath object as a string. The goes for any object in the ODataQuery library.
```PHP
myFakeFunction((string)$path);
```
<h3>$select</h3>

You can select which properties of the returned objects are included:
```PHP
$path->select(new ODataQuerySelect(array("FirstName", "LastName")));
```
See the Expand section below to learn how select can be applied to specific properties.

<h3>$search</h3>

You can search the properties of the object set using search:
```PHP
$path->search(new ODataQuerySearch('mountain bike'));
```
Search queries are also chainable:
```PHP
$search = $path->search(); 
// operations functions are both setters and getters. When setting, the funciton returns the $path object for chainability
$search->_and('balloon');
$path->search($search);
```
This will now search the set of Employees objects to be returned for '"mountain bike" AND balloon'. See the Expand section below to learn how the search function can be applied to specific properties.

<h3>$count</h3>

You can return the total record count of your query. The $count system query option ignores any $top, $skip, or $expand query options, and returns the total count of results across all pages including only those results matching any specified $filter and $search. Clients should be aware that the count returned inline may not exactly equal the actual number of items returned, due to latency between calculating the count and enumerating the last value or due to inexact calculations on the service.
```PHP
$path->count();
$path->count(FALSE); // Disables $count
```
<h3>$filter</h3>

The recordset queried can be filtered to return a more precise set of records. There are various filters available and most can be used in combination with another. 
```PHP
$filter = new ODataGreaterThanEqualsFilter('YearsEmployed', 6); // YearsEmployed ge 6
$path->filter($filter);
```
Each filter has a set of extensible functions that allow the filter to be passed into another filter, returning the new filter.
```PHP
$add_filter = new ODataAddFilter('YearsEmployed', 5); // YearsEmployed add 5
$filter = $add_filter->greaterThanEquals(6); // YearsEmployed add 5 ge 6
$path->filter($filter);
```
Filters can accept Filters as properties or values and a value can also be a property name
```PHP
$sub_filter = new ODataSubtractFilter('YearsEmployed', 'YearsSebatical'); // YearsEmployed sub YearsSebatical
$sub_filter2 = new ODataAddFilter('Awards', 'Demotions'); // Awards sub Demotions
$filter = $sub_filter->greaterThan($sub_filter2); // (YearsEmployed sub YearsSebatical) gt (Awards sub Demotions)
$path->filter($filter);
```
<h3>$pager</h3>

Records can be paged server-side by passing $top and $skip where $top is the limit of records returned and $skip is the start offset. The ODataQueryPager object takes the math out of the equation and lets you simply specify the limit and the page you want to return.
```PHP
$pager = new ODataQueryPager(20, 5); // $top=20&$skip=100
$path->pager($pager);
```

<h3>$orderby</h3>

Results can be sorted by a property name within the collection. Simply specify which property you would like to sort by in the orderBy() function.

```PHP
$path->orderBy('LastName');
```

<h3>$expand</h3>

The ODataQueryExpand object is used to subquery the results of the main query. It can be applied to properties of the main query's recordset using OData's path format (Property1/SubProperty1/AndSoOn) or to an expanded upon property (deep injection).

The ODataQueryExpand object is built off the same parent class as ODataResourcePath; ODataResource. So all of the above functions are available on the ODataQueryExpand object, including expand, which allows an expanded upon property to expand upon itself (deep injection).

Because multiple properties can be expanded upon, the expand() function of ODataResourcePath and ODataQueryExpand require a collection of ODataExpandableInterface objects in the form of a single ODataQueryExpandCollection object. The ODataQueryExpand objects must be added to the ODataQueryExpandCollection which is then passed to the ODataResourcePath or ODataQueryExpand objects.
```PHP
$collection = new ODataQueryExpandCollection();

$expand1 = new ODataQueryExpand('FirstName'); // Expand upon the FirstName property
$filter = new ODataEqualsFilter('$it', "'Alex'"); // Only string filter functions safely wrap strings. Other filters can't distinguish between a regular string function or a property name
$expand1->filter($filter);
$collection->add($expand1);

$expand2 = new ODataQueryExpand('LastName'); // Expand upon the LastName property
$search = new ODataQuerySearch("Boyce");
$expand2->search($search); // Search the last name
$collection->add($expand2);

$expand3 = new ODataQueryExpand('Address');
$expand4 = new ODataQueryExpand('City'); // Assuming the Address is an object containing City and not a sibling of City
$search2 = new ODataQuerySearch('New York');
$expand4->search($search2);
$expand3->expand(new ODataQueryExpandCollection(array($expand4))); // Add $expand4 to $expand3, wrapping it in a collection
$collection->add($expand3);

$path->expand($collection);

// OUTPUT PATH: http://www.example.com/test/api/Employees?$expand=FirstName($filter=$it eq 'Alex'),LastName($search=Boyce),Address($expand=City($search="New York"))
```

<h2>Resource Path Only<h2>
<h3>Parameters</h3>

Parameters can be used in place of any property of value in any query object. Prefix the variable name with '@' when using the variable. Use the ODataQueryParameterCollection object and set your parameters as if you were setting public variables on the object.

```PHP
$params = new ODataQueryParameterCollection();
$params->myParam1 = 10;
$params->otherParam = "Other";

$filter = new ODataLessThanEquals('@otherPraram', '@myParam1');

$path->filter($filter)->parameters($params);

// OUTPUT PATH: http://www.example.com/test/api/Employees?$filter=@otherParam le @myParam1&@myParam1=10&@otherParam=Other
```
