<?php 

/**
*@author jeyzielgama
*classe interface Record
*/

namespace JG\Interfaces;

interface RecordInterface
{
	public function store();
	public function all();
	public function first();
	public function update();
	public function delete();



}