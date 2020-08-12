# Introduction
This is a simple HTTP output manager, with implementations around standardizing your internal API's output.. etc. It also offers basic functionality surrounding cookies/redirects.

# Usage
Error Message Display
```PHP
/**
 * Display HTML Error Template
 *
 * @param string $message
 * @param boolean $end
 * @throws None
 * @author Alec M. <https://amattu.com>
 * @date 2020-03-18T19:46:53-040
 */
public static function displayError(string $message, $end = true) : void 
``` 
You can replace $template with a HTML template, etc. Default is just raw string output

`string $message`
Error message

`bool $end`
Exit script after running


```PHP
/**
 * Display Structured Text/JSON Output
 *
 * @param array $options (Status => HTTP Status Code, JSON => 0/1, Encode => 0/1)
 * @param boolean $end
 * @throws TypeError
 * @author Alec M. <https://amattu.com>
 * @date 2020-05-03T09:45:27-040
 */
public static function returnData(array $options, $end = true) : void
```

`status` 
HTTP status code (Default is left to the websever)

`JSON`
Content type JSON 

`Encode`
Encode `Data` attribute

Examples
`HTTPManager::returnData(Array("Status" => 200, "JSON" => 1, "Encode" => 1, "Data" => Array("abc" => 123)));`
`HTTPManager::returnData(Array("Status" => 200, "JSON" => 0, "Encode" => 0, "Data" => null));`

```PHP
/**
 * Delete a HTTP Cookies
 *
 * @param array $names
 * @return int Success count
 * @throws TypeError
 * @author Alec M. <https://amattu.com>
 * @date 2020-08-05T13:18:28-040
 */
public static function deleteCookies(array $names) : int
```
Delete an array of cookies by their name, return value is the number of successes 

# Notes
N/A

# Requirements & Dependencies
N/A

# Previews
N/A
