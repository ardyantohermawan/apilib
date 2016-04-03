<?php
namespace API\Lib;

interface QPObjectInterface {

	public function getAll();

	public function getOne();

	public function create($data);
	
	public function update($object);

	public function updateIfUnmodified($object);

	public function delete($object);

	public function updateBody($object, $contentType, $data);

	public function downloadBody($object, $fp);
}

?>