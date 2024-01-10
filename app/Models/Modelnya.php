<?php 
namespace App\Models;


use CodeIgniter\Model;


class Modelnya extends Model
{
	
	public function getAll($tabel)
	{
		return $this->db->table($tabel)->get();
	}

	
	public function getWhere($tabel, $select, $where)
	{
		return $this->db->table($tabel)->select($select)->where($where)->get();
	}
	public function getWhere2($tabel, $select, $where, $order)
	{
		return $this->db->table($tabel)->select($select)->where($where)->orderBy($order)->get();
	}
	public function delData($tabel, $where)
	{
		if ($where) {
			return $this->db->table($tabel)->where($where)->delete();
		} else {
			return false;
		}
	}
	public function insData($tabel, $data)
	{
		return $this->db->table($tabel)->insert($data);
	}
	public function upData($tabel, $data, $where)
	{
		if ($where) {
			return $this->db->table($tabel)->where($where)->update($data);
		} else {
			return false;
		}
	}
}



?>