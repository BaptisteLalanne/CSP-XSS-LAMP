<?php

class Model {

	public function __get($attr) {
		return $this->$attr;
	}

	public function __set($attr, $value) {
		$this->$attr = $value;
	}


	public static function all() {
		$class = get_called_class();
		$table =  strtolower($class);
		$st = db()->prepare("select * from $table");
		$st->execute();
		$list = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$h = new $class();
			foreach($row as $field=>$value)
				$h->$field = $value;
			$list[] = $h;
		}
		return $list;
	}


	public static function load($id) {
		$class = get_called_class();
		$table =  strtolower($class);
		$st = db()->prepare("select * 
			from $table 
			where id$table = :id");
		$st->bindValue(':id', $id);
		$st->execute();
		$row = $st->fetch(PDO::FETCH_ASSOC);
		$o = new $class();
		foreach($row as $attr => $value)
			$o->$attr = $value;
		return $o;

	}


	public static function random() {
		$class = get_called_class();
		$table =  strtolower($class);
		$st = db()->prepare("select * 
			from $table 
			order by rand() limit 1");
		$st->execute();
		$row = $st->fetch(PDO::FETCH_ASSOC);
		$o = new $class();
		foreach($row as $attr => $value)
			$o->$attr = $value;
		return $o;
	}

	public static function insert($data) {
		$class = get_called_class();
		$table =  strtolower($class);
		$keys = implode(", ", array_keys($data));
		$values = implode("', '", array_values($data));
		$sql = "
			INSERT INTO $table ($keys) VALUES ('$values')
		";
		echo "$sql";
		$st = db()->prepare($sql);
		$st->execute();
	}

}