<?php

namespace app\core;

abstract class DBModel extends Model
{

    abstract public function rules(): array;
    abstract public function tableName();
    abstract public function attributes(): array;

    public function DBcreate()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();

        $values = array_map(fn($attr)=>":$attr",$attributes);

        $sql = "INSERT INTO $tableName (".implode(',',$attributes).")  VALUES (".implode(',',$values).")";
        foreach ($attributes as $attribute)
        {
            if($attribute == 'phone_number')
                $sql=str_replace(":phone_number","'".$this->{'phone_number'}."'",$sql);
            else
                $sql = str_replace(":$attribute",(is_numeric($this->{$attribute}) or is_bool($this->{$attribute}) ) ? $this->{$attribute} :  "'".$this->{$attribute}."'",$sql);
        }

        return $this->db->mysqli->query($sql);
    }

    public function DBselect()
    {
        $tableName = $this->tableName();
        $sql = "SELECT * FROM $tableName;";
        $rows = $this->db->mysqli->query($sql) ?? [];
        $result = [];

        foreach($rows as $row)
            {
                array_push($result,$row);
            }
        if(empty($result))
            $result=false;
        return $result;
    }

    public function DBselectWhere($where)
    {
        $tableName = $this->tableName();
        $sql = "SELECT * FROM $tableName WHERE $where;";
        $result=$this->db->mysqli->query($sql);
        return $result->fetch_assoc();
    }

    public function DBdelete($where)
    {
        $tableName = $this->tableName();
        $sql = "DELETE FROM $tableName WHERE $where";
        $result = $this->db->mysqli->query($sql);
        return $result;
    }

    public function DBupdate($params,  $values, $where)
    {
        $tableName = $this->tableName();
        $attributes = $params;
        $countAttributes = count($params);
        $countValues = count($values);
        $result = false;
        if($countAttributes == $countValues)
        {
            $sql = "UPDATE $tableName  SET ";
            for($i=0; $i<$countValues; $i++)
                {
                    if($i+1!=$countValues)
                    {
                        if(is_string($values[$i]))
                            $sql.="$params[$i] = '$values[$i]' , ";
                        else
                            $sql.="$params[$i] = $values[$i] , ";
                    }
                    else
                    {
                        if(is_string($values[$i]))
                            $sql.="$params[$i] = '$values[$i]'  ";
                        else
                            $sql.="$params[$i] = $values[$i]  ";
                    }
                }
            $sql.="WHERE $where";
            $result = $this->db->mysqli->query($sql);
        }
        return $result;
    }
}