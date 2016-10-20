<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schools_model extends CI_Model
{
    var $id;
    var $nome;
    var $cidade;
    var $tipo;
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function insert()
    {
        $this->db->insert("schools", $this);
        return $this->db->trans_status();
    }
    
    public function delete()
    {
        $this->db->where("id", $this->id);
        $this->db->delete("schools");
    }
    
    public function load_by_id()
    {
    	$sql = "select * from schools where id=?";
    	$query = $this->db->query($sql, array($this->id_usuario));
        return $query->row(0, "Schools_model");
    }
    
    public function update()
	{
		$this->db->where("id", $this->id);
		$this->db->update("schools", $this);
		return $this->db->trans_status();
	}
	
	public function select_all()
	{
	   $this->db->select("*");
	   $this->db->from("schools");
	   $query = $this->db->get();
	   return $query->result();
	}
	
	public function select_all_with_filter($filter)
	{
	   $this->db->select("*");
	   $this->db->from("schools");
	   if($filter)
	   {
	       foreach($filter as $key=>$value)
	       {
	            if(!empty($value))
	            {
	                $this->db->like($key,$value);
	            }
	       }
	   }
	   $query = $this->db->get();
	   return $query->result();
	}
}

?>