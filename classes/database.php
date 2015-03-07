<?php  
  include_once("security.php");      
class Database
  {
    
 private static $me;
 public $link;
 public $cmd;
 
 function __construct()
 {
      $this->link = mysqli_connect(_DB_SERVER,_DB_USER,_DB_PASS);  
      //mysqli_query("set names 'utf8'");
	  mysqli_set_charset($this->link, "utf8");
      mysqli_select_db($this->link,_DB_NAME);                  
 }
public static function GetDatabase()
{
   if(is_null(self::$me))
       self::$me = new Database();
    return self::$me;
 } 
 
public function RunSQL()
{              
   $security = Security::GetSecurity ();
  // $this->cmd = $security->Xss_Clean($this->cmd);
   //echo $this->cmd;
   //var_dump(mysqli_error());
   $result =  mysqli_query($this->link,$this->cmd);          
   //if (!$result) die ('Unable to run query:'.$this->errormessage()); else
   return $result;
}

public function AffectedRows()
{
  return mysqli_affected_rows($this->link);
}

public function InsertId()
{
  return mysqli_insert_id($this->link);
}

public function ErrorMessage()
{
 return mysqli_error($this->link);
}

public function ErrorNumber()
{
  return mysqli_errno($this->link);
}

function Select($tableName, $fields=NULL, $where = NULL, $order = NULL)
{
	if (empty ($fields)) $fields="*";
    if ($where) $where = " WHERE " . $where;
	if ($order) $order = " ORDER BY " . $order;
	$this->cmd = "SELECT $fields FROM `$tableName` " . $where . $order;	
	//echo $this->cmd;
	$res = $this->RunSQL();
    if ($res)
	    return mysqli_fetch_array($res);
	else
        return false;
}

public function  SelectAll($tableName, $fields,$where = NULL,
                 $order = NULL, $from = NULL, $count = NULL)
 {    
	$limit = "";
    if (!$fileds) $fields="*";
    if ($where) $where = " WHERE " . $where;
    if ($order) $order = " ORDER BY " . $order;
    if (($from || $from == 0) && $count) $limit = " LIMIT $from, $count";
    $this->cmd = "SELECT $fields FROM `$tableName` " . $where . " " . $order . " " . $limit;    
    $res =$this->RunSQL();
    $rows = array();
    if ($res)
    {
        while($row = mysqli_fetch_array($res)) $rows[] = $row;
    }
    return $rows;
}

public function InsertQuery($table, $keys, $values)
{    
    $this->cmd =  "INSERT INTO ".$table." (".implode(', ', $keys).") VALUES (".implode(', ', $values).")";  
	//echo "<br/>",$this->cmd;
	return $this->RunSQL();
}

public function UpdateQuery($table, $values, $where, $orderby = array())
{
    foreach ($values as $key => $val)
    {
            $valstr[] = $key . ' = ' . $val;
    }

    $limit = ( ! $limit) ? '' : ' LIMIT '.$limit;

    $orderby = (count($orderby) >= 1)?' ORDER BY '.implode(", ", $orderby):'';

    $sql = "UPDATE ".$table." SET ".implode(', ', $valstr);

    $sql .= ($where != '' AND count($where) >=1) ? " WHERE ".implode(" ", $where) : '';
    
    $sql .= $orderby;
    $this->cmd = $sql;
	return $this->RunSQL();
}

function Delete($tablename,$IFfield,$IFvalue)
{
    $this->cmd = "DELETE FROM `{$tablename}` WHERE  $IFfield ='{$IFvalue}'";            
    return $this->RunSQL();
}
public function MaxOf($column, $table, $where)
{
   $this->cmd ="SELECT MAX(`$column`) FROM `$table` WHERE $where";  
   $res = $this->RunSQL();
   $row = mysqli_fetch_row($res);
   return $row[0];
}

public function MaxOfAll($column, $table)
{   
   $this->cmd ="SELECT MAX(`$column`) FROM `$table`";
   $res = $this->RunSQL();
   $row = mysqli_fetch_row($res);
   return $row[0];
}

public function CountOf($table, $where)
{
  $this->cmd ="SELECT COUNT(*) FROM `$table` WHERE $where";
  //echo $this->cmd;
  $res = $this->RunSQL();
  $row = mysqli_fetch_row($res);
  return $row[0];
}

public function CountAll($table)
{
  $this->cmd ="SELECT COUNT(*) FROM `$table`";
  $res = $this->RunSQL();
  $row = mysqli_fetch_row($res);
  return $row[0];
}

  }
?>