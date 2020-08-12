<?php
/*
	Produced 2020
	By https://amattu.com/links/github
	Copy Alec M.
	License GNU Affero General Public License v3.0
*/

/*
	API STATUS CONVENTION
	200 - Successful / Good data
	400 - Bad data supplied
	403 - Unauthorized
	405 - Invalid method
	410 - Not available / Gone
	423 - Resource Locked
*/

class HTTPManager {
	// Class Variables
	public const HTTP_400_0_NULL = Array("JSON" => 0, "Status" => 400, "Encode" => 0, "Data" => null);
	public const HTTP_400_0_FALSE = Array("JSON" => 0, "Status" => 400, "Encode" => 0, "Data" => false);
	public const HTTP_SUCCESS = 200;
	public const HTTP_BAD_DATA = 400;
	public const HTTP_UNAUTHORIZED = 403;
	public const HTTP_INVALID_METHOD = 405;
	public const HTTP_RESOURCE_UNAVAILABLE = 410;
	public const HTTP_RESOURCE_LOCKED = 423;

	/**
	 * Display HTML Error Template
	 *
	 * @param string $message
	 * @param boolean $end
	 * @throws None
	 * @author Alec M. <https://amattu.com>
	 * @date 2020-03-18T19:46:53-040
	 */
	public static function displayError(string $message, $end = true) : void {
		// Variables
		$template = "{error_message}";

		// Checks
		if ($message) {
			echo str_replace("{error_message}", $message, $template);
		}
		if ($end) {
			die();
		}
	}

	/**
	 * Display Structured Text/JSON Output
	 *
	 * @param array $options (Status => HTTP Status Code, JSON => 0/1, Encode => 0/1)
	 * @param boolean $end
	 * @throws TypeError
	 * @author Alec M. <https://amattu.com>
	 * @date 2020-05-03T09:45:27-040
	 */
	public static function returnData(array $options, $end = true) : void {
		// Checks
		if (isset($options["Status"]) && $options["Status"] > 100) {
			http_response_code($options["Status"]);
		}
		if (isset($options["JSON"]) && $options["JSON"] === 1) {
			header('Content-Type: application/json');
		}
		if (isset($options["Encode"]) && $options["Encode"] === 1) {
			echo json_encode($options["Data"]);
		} else {
			echo $options["Data"];
		}
		if ($end) {
			die();
		}
	}

	/**
	 * Redirect to a URL
	 *
	 * @param string $url
	 * @param boolean $end
	 * @return Void
	 * @throws TypeError
	 * @author Alec M. <https://amattu.com>
	 * @date 2020-08-05T12:18:05-040
	 */
	public static function redirect(string $url, $end = true) : void {
		// Redirect
		header("Location: $url");

		// Checks
		if ($end) {
			die();
		}
	}

	/**
	 * Delete a HTTP Cookies
	 *
	 * @param array $names
	 * @return int Success count
	 * @throws TypeError
	 * @author Alec M. <https://amattu.com>
	 * @date 2020-08-05T13:18:28-040
	 */
	public static function deleteCookies(array $names) : int {
		// Variables
		$success = 0;

		// Loops
		foreach ($names as $name) {
			$success += setcookie($name, null, -1, '/') === true ? 1 : 0;
		}

		// Return
		return $success;
	}
}
?>
