<?php
// If it's going to need the database, then it's
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Schedule{

	protected static $table_name="exam_schedule";
    protected static $db_fields = array('id', 'uid', 'eid', 'sid', 'aid', 'cid','stat', 'lastDate', 'startTime', 'endTime');

    public $id;
    public $uid;
	public $eid;
	public $sid;
	public $aid;
	public $cid;
	public $stat;
	public $lastDate;
	public $startTime;
	public $endTime;


	// Common Database Methods
	public static function find_all() {
		return self::find_by_sql("SELECT * FROM ".self::$table_name);
  }

  public static function find_by_id($id=0) {
    $result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE id={$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
  }

  public static function find_by_sql($sql="") {
    global $database;
    $result_set = $database->query($sql);
    $object_array = array();
    while ($row = $database->fetch_array($result_set)) {
      $object_array[] = self::instantiate($row);
    }
    return $object_array;
  }

	public static function count_all() {
	  global $database;
	  $sql = "SELECT COUNT(*) FROM ".self::$table_name;
      $result_set = $database->query($sql);
	  $row = $database->fetch_array($result_set);
      return array_shift($row);
	}

	public static function count_by_uid($uid) {
		global $database;
		$sql = "SELECT COUNT(*) FROM ".self::$table_name." WHERE uid=".$uid;
		$result_set = $database->query($sql);
		$row = $database->fetch_array($result_set);
		return array_shift($row);
	}

	public static function count_by_uid_and_stat($uid,$stat) {
		global $database;
		$sql = "SELECT COUNT(*) FROM ".self::$table_name." WHERE uid=".$uid." AND stat=".$stat;
		$result_set = $database->query($sql);
		$row = $database->fetch_array($result_set);
		return array_shift($row);
	}

	public static function count_by_aid($aid) {
		global $database;
		$sql = "SELECT COUNT(*) FROM ".self::$table_name. " Where aid =".$aid;
		$result_set = $database->query($sql);
		$row = $database->fetch_array($result_set);
		return array_shift($row);
	  }

	public static function applied($id, $uid, $aid) {
		$sql = "SELECT * FROM ".self::$table_name;
		$sql .= " WHERE aid=".$aid." and id = ".$id;
		$sql .= " and uid = ".$uid;
		$result_array = self::find_by_sql($sql);
		return !empty($result_array) ? true : false;
	}

	

	private static function instantiate($record) {
		// Could check that $record exists and is an array
    $object = new self;
		// Simple, long-form approach:
		// $object->id 				= $record['id'];
		// $object->username 	= $record['username'];
		// $object->password 	= $record['password'];
		// $object->first_name = $record['first_name'];
		// $object->last_name 	= $record['last_name'];

		// More dynamic, short-form approach:
		foreach($record as $attribute=>$value){
		  if($object->has_attribute($attribute)) {
		    $object->$attribute = $value;
		  }
		}
		return $object;
	}
	public static function delete_by_id($id=0) {
		global $database;
		$sql = "Delete FROM ".self::$table_name." WHERE id={$id}";
		$database->query($sql);
		return ($database->affected_rows() >= 0) ? true : false;
	  }

	  public static function delete_by_sid($sid=0) {
		global $database;
		$sql = "Delete FROM ".self::$table_name." WHERE sid={$sid}";
		$database->query($sql);
		return ($database->affected_rows() >= 0) ? true : false;
	  }

	  public static function find_by_uid($uid=0) {
		return self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE uid={$uid}");	 
	  }
	  
	  public static function find_by_uid_and_stat($uid=0, $stat) {
		return self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE uid={$uid}"." AND stat=".$stat);	 
      }
      
      public static function find_by_aid($aid=0) {
		return self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE aid={$aid}");	 
	  }


	  public static function get_max_id() {
		global $database;
		$sql = "SELECT MAX(id) FROM ".self::$table_name;
		$result_set = $database->query($sql);
	    $row = $database->fetch_array($result_set);
        return array_shift($row);
	}

	public static function update_status($id, $stat) {
		global $database;
		
		$sql = "UPDATE ".self::$table_name." SET stat = ".$stat." WHERE id = ".$id ;
        $database->query($sql);
	  	return ($database->affected_rows() == 1) ? true : false;
	}

	private function has_attribute($attribute) {
	  // We don't care about the value, we just want to know if the key exists
	  // Will return true or false
	  return array_key_exists($attribute, $this->attributes());
	}

	protected function attributes() {
		// return an array of attribute names and their values
	  $attributes = array();
	  foreach(self::$db_fields as $field) {
	    if(property_exists($this, $field)) {
	      $attributes[$field] = $this->$field;
	    }
	  }
	  return $attributes;
	}

	protected function sanitized_attributes() {
	  global $database;
	  $clean_attributes = array();
	  // sanitize the values before submitting
	  // Note: does not alter the actual value of each attribute
	  foreach($this->attributes() as $key => $value){
	    $clean_attributes[$key] = $database->escape_value($value);
	  }
	  return $clean_attributes;
	}

	public function save() {
	  // A new record won't have an id yet.
	  return isset($this->id) ? $this->update() : $this->create();
	}

	public function create() {
		global $database;
		// Don't forget your SQL syntax and good habits:
		// - INSERT INTO table (key, key) VALUES ('value', 'value')
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		$attributes = $this->sanitized_attributes();
	  $sql = "INSERT INTO ".self::$table_name." (";
		$sql .= join(", ", array_keys($attributes));
	  $sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
	  if($database->query($sql)) {
	    $this->id = $database->insert_id();
	    return true;
	  } else {
	    return false;
	  }
	}

	public function update() {
	  global $database;
		// Don't forget your SQL syntax and good habits:
		// - UPDATE table SET key='value', key='value' WHERE condition
		// - single-quotes around all values
		// - escape all values to prevent SQL injection
		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value) {
		  $attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql = "UPDATE ".self::$table_name." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE id=". $database->escape_value($this->id);
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;
	}

	public function delete() {
		global $database;
		// Don't forget your SQL syntax and good habits:
		// - DELETE FROM table WHERE condition LIMIT 1
		// - escape all values to prevent SQL injection
		// - use LIMIT 1
	  $sql = "DELETE FROM ".self::$table_name;
	  $sql .= " WHERE id=". $database->escape_value($this->id);
	  $sql .= " LIMIT 1";
	  $database->query($sql);
	  return ($database->affected_rows() == 1) ? true : false;

		// NB: After deleting, the instance of User still
		// exists, even though the database entry does not.
		// This can be useful, as in:
		//   echo $user->first_name . " was deleted";
		// but, for example, we can't call $user->update()
		// after calling $user->delete().
	}

}

?>