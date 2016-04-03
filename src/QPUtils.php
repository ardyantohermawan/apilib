<?php
namespace API\Lib;

use Ramsey\Uuid\Uuid;

class QPUtils
{
	public function setObjectID()
	{
		return Uuid::uuid4()->toString();;
	}
}

?>