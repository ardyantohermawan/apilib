<?php
namespace API\Lib;


class QPHttpResponse
{
	private $httpCode;
	private $message;
	private $data;

	function __construct($httpCode, $message, $data)
	{
		$this->httpCode = $httpCode;
		$this->message = $message;
		$this->data = $data;
	}

	public function toJSON()
	{
		$response = array(
				'code' => $this->httpCode,
				'message' => $this->message,
				'data' => $this->data,
		);
		
		return json_encode($response, JSON_PRETTY_PRINT);
	}
}
?>