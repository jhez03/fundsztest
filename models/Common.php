<?php
class Common extends CI_Model {
	// Constructor
	function __construct() {
		parent::__construct();
	}
	/**
	 * INSERT data into table model
	 *
	 * @access Public
	 * @param $tableName - Name of the table(required)
	 * @param $data - Specifies the insert data(required)
	 * @return Last insert ID
	 */
	public function insertTableData($tableName = '', $data = array()) {
		$this->db->insert($tableName, $data);
		return $this->db->insert_id();
	}
	/**
	 * DELETE data from table
	 *
	 * @access Public
	 * @param $tableName - Name of the table(required)
	 * @param $where - Specifies the which row will be delete(optional)
	 * @return Affected rows
	 */
	public function deleteTableData($tableName = '', $where = array()) {
		if ((is_array($where)) && (count($where) > 0)) {
			$this->db->where($where);
		}
		$this->db->delete($tableName);
		return $this->db->affected_rows();
	}
	/**
	 * UPDATE data to table
	 *
	 * @access Public
	 * @param $tableName - Name of the table(required)
	 * @param $where - Specifies the where to update(optional)
	 * @param $data - Modified data(required)
	 * @return Affected rows
	 */
public function updateTableData($tableName = '', $where = array(), $data = array())
	{
		if ((is_array($where)) && (count($where) > 0)) {
			$this->db->where($where);
		}
		return $this->db->update($tableName, $data);

	}
	/**
	 * SELECT data from table
	 *
	 * @access Public
	 * @param $tableName - Name of the table(required)
	 * @param $where - Specifies the where to update(optional)
	 * @param $data - Modified data(required)
	 * @return Affected rows
	 */
	public function getTableData($tableName = '', $where = array(), $selectFields = '', $like = array(), $where_or = array(), $like_or = array(), $offset = '', $limit = '', $orderBy = array(), $groupBy = array(), $where_not = array(), $where_in = array()) {
		// WHERE AND conditions
		if ((is_array($where)) && (count($where) > 0)) {
			$this->db->where($where);
		}
		// WHERE NOT conditions
		if ((is_array($where_not)) && (count($where_not) > 0)) {
			$this->db->where_not_in($where_not[0], $where_not[1]);
		}
		// WHERE IN conditions
		if ((is_array($where_in)) && (count($where_in) > 0)) {
			$this->db->where_in($where_in[0], $where_in[1]);
		}
		// WHERE OR conditions
		if ((is_array($where_or)) && (count($where_or) > 0)) {
			$this->db->or_where($where_or);
		}
		//LIKE AND
		if ((is_array($like)) && (count($like) > 0)) {
			$this->db->like($like);
		}
		//LIKE OR
		if ((is_array($like_or)) && (count($like_or) > 0)) {
			$this->db->or_like($like_or);
		}
		//SELECT fields
		if ($selectFields != '') {
			$this->db->select($selectFields);
		}
		//Group By
		if (is_array($groupBy) && (count($groupBy) > 0)) {
			$this->db->group_by($groupBy);
		}
		//Order By
		if (is_array($orderBy) && (count($orderBy) > 0)) {
			if (count($orderBy) > 2) {
				$this->db->order_by($orderBy[0] . ' ' . $orderBy[1] . ',' . $orderBy[2] . ' ' . $orderBy[3]);
			} else {
				$this->db->order_by($orderBy[0], $orderBy[1]);
			}
		}
		//OFFSET with LIMIT
		if ($limit != '' && $offset != '') {
			$this->db->limit($limit, $offset);
		}
		// LIMIT
		if ($limit != '') {
			$this->db->limit($limit);
		}

		return $this->db->get($tableName);
	}
	/**
	 * CUSTOM SQL query
	 *
	 * @access Public
	 * @param SQL query
	 * @return Response
	 */
	public function customQuery($query) {
		return $this->db->query($query);
	}

	//select records from joined tables
	public function getJoinedTableData($tableName = '', $joins = array(), $where = array(), $selectFields = '', $like = array(), $where_or = array(), $like_or = array(), $offset = '', $limit = '', $orderBy = array(), $group_by = array()) {

		$this->db->from($tableName);
		//join tables list
		if ((is_array($joins)) && (count($joins) > 0)) {
			foreach ($joins as $jointb => $joinON) {
				$this->db->join($jointb, $joinON);
			}
		}
		// WHERE AND conditions
		if ((is_array($where)) && (count($where) > 0)) {
			$this->db->where($where);
		}
		// WHERE OR conditions
		if ((is_array($where_or)) && (count($where_or) > 0)) {
			$this->db->or_where($where_or);
		}
		//LIKE AND
		if ((is_array($like)) && (count($like) > 0)) {
			$this->db->like($like);
		}
		//LIKE OR
		if ((is_array($like_or)) && (count($like_or) > 0)) {
			$this->db->or_like($like_or);
		}
		//SELECT fields
		if ($selectFields != '') {
			$this->db->select($selectFields, false);
		}
		//Order By
		if (is_array($orderBy) && (count($orderBy) > 0)) {
			$this->db->order_by($orderBy[0], $orderBy[1]);
		}
		//Group By
		if (is_array($group_by) && (count($group_by) > 0)) {
			$this->db->group_by($group_by[0]);
		}
		//OFFSET with LIMIT
		if ($limit != '' && $offset != '') {
			$this->db->limit($limit, $offset);
		}
		// LIMIT
		if ($limit != '' && $offset == '') {
			$this->db->limit($limit);
		}
		return $this->db->get();
	}

	public function getTableDatas($tableName = '', $where = array(), $selectFields = '', $like = array(), $where_or = array(), $like_or = array(), $offset = '', $limit = '', $orderBy = array(), $groupBy = array(), $where_not = array(), $where_in = array()) {
		// WHERE AND conditions
		if ((is_array($where)) && (count($where) > 0)) {
			$this->db->where($where);
		}
		// WHERE NOT conditions
		if ((is_array($where_not)) && (count($where_not) > 0)) {
			$this->db->where_not_in($where_not[0], $where_not[1]);
		}
		// WHERE IN conditions
		if ((is_array($where_in)) && (count($where_in) > 0)) {
			$this->db->where_in($where_in[0], $where_in[1]);
		}
		// WHERE OR conditions
		if ((is_array($where_or)) && (count($where_or) > 0)) {
			$this->db->or_where($where_or);
		}
		//LIKE AND
		$this->db->group_start();
		if ((is_array($like)) && (count($like) > 0)) {
			$this->db->like($like);
		}
		//LIKE OR
		if ((is_array($like_or)) && (count($like_or) > 0)) {
			$this->db->or_like($like_or);
		}
		$this->db->group_end();
		//SELECT fields
		if ($selectFields != '') {
			$this->db->select($selectFields);
		}
		//Group By
		if (is_array($groupBy) && (count($groupBy) > 0)) {
			$this->db->group_by($groupBy[0]);
		}
		//Order By
		if (is_array($orderBy) && (count($orderBy) > 0)) {
			if (count($orderBy) > 2) {
				$this->db->order_by($orderBy[0] . ' ' . $orderBy[1] . ',' . $orderBy[2] . ' ' . $orderBy[3]);
			} else {
				$this->db->order_by($orderBy[0], $orderBy[1]);
			}
		}
		//OFFSET with LIMIT
		if ($limit != '' && $offset != '') {
			$this->db->limit($limit, $offset);
		}
		// LIMIT
		if ($limit != '' && $offset == '') {
			$this->db->limit($limit);
		}

		return $this->db->get($tableName);
	}

	public function getJoinedTableDatas($tableName = '', $joins = array(), $where = array(), $selectFields = '', $like = array(), $where_or = array(), $like_or = array(), $offset = '', $limit = '', $orderBy = array(), $group_by = array()) {

		$this->db->from($tableName);
		//join tables list
		if ((is_array($joins)) && (count($joins) > 0)) {
			foreach ($joins as $jointb => $joinON) {
				$this->db->join($jointb, $joinON);
			}
		}

		// WHERE AND conditions
		if ((is_array($where)) && (count($where) > 0)) {
			$this->db->where($where);
		}
		// WHERE OR conditions
		if ((is_array($where_or)) && (count($where_or) > 0)) {
			$this->db->or_where($where_or);
		}
		//LIKE AND
		$this->db->group_start();
		if ((is_array($like)) && (count($like) > 0)) {
			$this->db->like($like);
		}
		//LIKE OR
		if ((is_array($like_or)) && (count($like_or) > 0)) {
			$this->db->or_like($like_or);
		}
		$this->db->group_end();
		//SELECT fields
		if ($selectFields != '') {
			$this->db->select($selectFields, false);
		}
		//Order By
		if (is_array($orderBy) && (count($orderBy) > 0)) {
			$this->db->order_by($orderBy[0], $orderBy[1]);
		}

		//Group By
		if (is_array($group_by) && (count($group_by) > 0)) {
			$this->db->group_by($group_by[0]);
		}
		//OFFSET with LIMIT
		if ($limit != '' && $offset != '') {
			$this->db->limit($limit, $offset);
		}
		// LIMIT
		if ($limit != '' && $offset == '') {
			$this->db->limit($limit);
		}
		return $this->db->get();

	}

	//select records from joined tables
	public function getleftJoinedTableData($tableName = '', $joins = array(), $where = array(), $selectFields = '', $like = array(), $where_or = array(), $like_or = array(), $offset = '', $limit = '', $orderBy = array(), $group_by = array(), $where_in = array()) {

		$this->db->from($tableName);
		//join tables list
		if ((is_array($joins)) && (count($joins) > 0)) {
			foreach ($joins as $jointb => $joinON) {
				$this->db->join($jointb, $joinON, 'LEFT');
			}
		}

		// WHERE AND conditions
		if ((is_array($where)) && (count($where) > 0)) {
			$this->db->where($where);
		}
		// WHERE IN conditions
		if ((is_array($where_in)) && (count($where_in) > 0)) {
			$this->db->where_in($where_in[0], $where_in[1]);
		}
		// WHERE OR conditions
		if ((is_array($where_or)) && (count($where_or) > 0)) {
			$this->db->or_where($where_or);
		}
		//LIKE AND
		if ((is_array($like)) && (count($like) > 0)) {
			$this->db->like($like);
		}
		//LIKE OR
		if ((is_array($like_or)) && (count($like_or) > 0)) {
			$this->db->or_like($like_or);
		}
		//SELECT fields
		if ($selectFields != '') {
			$this->db->select($selectFields);
		}
		//Order By
		if (is_array($orderBy) && (count($orderBy) > 0)) {
			if (count($orderBy) > 2) {
				$this->db->order_by($orderBy[0] . ' ' . $orderBy[1] . ',' . $orderBy[2] . ' ' . $orderBy[3]);
			} else {
				$this->db->order_by($orderBy[0], $orderBy[1]);
			}
		}
		//Group By
		if (is_array($group_by) && (count($group_by) > 0)) {
			$this->db->group_by($group_by[0]);
		}
		//OFFSET with LIMIT
		if ($limit != '' && $offset != '') {
			$this->db->limit($limit, $offset);
		}
		// LIMIT
		if ($limit != '' && $offset == '') {
			$this->db->limit($limit);
		}

		return $this->db->get();

	}
	
	function last_activity($activity, $id = '0', $type = '') {
		$date = gmdate(time());
		$ip_address = $_SERVER['REMOTE_ADDR'];
		$session_data = array(
			'last_ip_address' => $ip_address,
			'last_login_date' => $date,
		);
		$this->session->set_userdata($session_data);
		$data = array('date' => $date,
			'ip_address' => $ip_address,
			'activity' => $activity,
			'browser_name' => getBrowser(),
			'os_name' => getOS(),
			'type' => $type,
			'user_id' => $id);
		$this->insertTableData(USACT, $data);
	}
	function sitevisits() {
		$browser_name = getBrowser();
		$ip_address = $_SERVER['REMOTE_ADDR'];
		$date = date('Y-m-d');
		$insertData = array('ip_address' => $ip_address, 'browser' => $browser_name, 'date_added' => $date);
		$already = $this->getTableData('site_visits', $insertData);
		if ($already->num_rows() == 0) {
			$this->insertTableData('site_visits', $insertData);
		}
	}

	function get_ticket($id)
{
return $this->db->where("id",$id)->get("liateZdItSrOoZpIpSuOs")->row();
}
function support_list()
{
$id=user_id();

$this->db->where("DiZrIeSsOu",$id);
$this->db->where("parent_id =",NULL);
return $this->db->get("liateZdItSrOoZpIpSuOs")->result();
}
function support_list1()
{
$id=user_id();
$this->db->where("DiZrIeSsOu",$id);
$this->db->order_by("id", "desc");
$this->db->limit(1);
$this->db->where("parent_id =",NULL);
return $this->db->get("liateZdItSrOoZpIpSuOs")->row()->id;
}
function support_view($id)
{
return $this->db->where("id",$id)->get("liateZdItSrOoZpIpSuOs")->row();
}
function support_messages($id)
{
return $this->db->where("parent_id",$id)->get("liateZdItSrOoZpIpSuOs")->result();
}
function support_messages1()
{
return $this->db->get("liateZdItSrOoZpIpSuOs")->result();
}
function support_category()
{
return $this->db->where("status","active")->get("support_category")->result();
}
function reply_to_support()
{
$id=$this->input->post('idd');
extract($this->input->post());
$files['upload_path'] = 'assets/front/profile';
$files['allowed_types'] = 'gif|jpg|png|jpeg';
$files['max_size']	= '100';
$files['max_width']  = '1024';
$files['max_height']  = '768';
//$data["file_name"]=mt_rand(0,999999).str_replace(' ', '_', urldecode($_FILES['file']['name'])); exit;
$files['file_name'] =mt_rand(0,999999).str_replace(' ', '_', urldecode($_FILES['file']['name']));
$this->load->library('upload', $files);
if($this->upload->do_upload('file'))
{
$idata['file']=$files["file_name"];
}
else
{
$idata['file'] = 'empty';
}
$parent_ticket=$this->get_ticket($id);
$idata['message']=$message;
$idata['subject']=isset($parent_ticket->subject)?$parent_ticket->subject:NULL;
//$idata['username']="admin"; username
$idata['emanZrIeSsOu']=isset($parent_ticket->name)?$parent_ticket->name:NULL;
$idata['email']=isset($parent_ticket->email)?$parent_ticket->email:NULL;
$idata['name']=isset($parent_ticket->name)?$parent_ticket->name:NULL;
$idata['departments']=isset($parent_ticket->departments)?$parent_ticket->departments:NULL;
$idata['parent_id']=$id;
$idata['created_date']=date("Y-m-d H:i:s");
$idata['DiZrIeSsOu']=user_id();
$_POST['subject']=$idata['subject'];
$_POST['tomail']=$idata['email'];
$message=$_POST['message'];
$question=isset($parent_ticket->message)?$parent_ticket->message:NULL;

$this->db->insert("liateZdItSrOoZpIpSuOs",$idata);
if($this->input->post('close_sec'))
{
$this->db->where('id',$id);
$this->db->update('liateZdItSrOoZpIpSuOs',array('status'=>'closed'));
}
return true;
}


function support_submit()
{
extract($this->input->post());
$files['upload_path'] = 'assets/front/profile';
$files['allowed_types'] = 'gif|jpg|png|jpeg';
$files['max_size']	= '100';
$files['max_width']  = '1024';
$files['max_height']  = '768';
$files['file_name'] =mt_rand(0,999999).str_replace(' ', '_', urldecode($_FILES['file']['name']));

$this->load->library('upload', $files);
if($this->upload->do_upload('file'))
{
$idata['file']=$files['file_name'];
}
else
{
$idata['file'] = 'empty';
}
$idata['message']=$this->security->xss_clean($this->input->post('contact_message'));
$idata['departments']=$this->security->xss_clean($this->input->post('category'));
$idata['subject']=$this->security->xss_clean($this->input->post('subject'));
$idata['emanZrIeSsOu']=$this->security->xss_clean($this->input->post('username_'));
$idata['email']=$this->security->xss_clean($this->input->post('email_'));
$idata['name']=$this->security->xss_clean($this->input->post('username_'));
//$idata['departments']=isset($parent_ticket->departments)?$parent_ticket->departments:NULL;
//	$idata['parent_id']=$id;
$idata['created_date']=date("Y-m-d H:i:s");
$idata['DiZrIeSsOu']=user_id();
$idata['status']='processing';
$this->db->insert("liateZdItSrOoZpIpSuOs",$idata);
echo "success";
}

function get_ticketdetail($id)
{
	return $this->db->query("SELECT * FROM `tfunds_liateZdItSrOoZpIpSuOs` WHERE (parent_id ='$id' OR id = '$id')")->result();
}

function get_catname($id)
{
return $this->db->where("sup_id",$id)->get("support_category")->row()->category;
}

function reply_to_ticket($id)
{
		extract($this->input->post());
		$rnumber1 = mt_rand(0,999999);
		$document1 = str_replace(' ', '_', urldecode($_FILES['image']['name']));
		$document1_filename		=$rnumber1.$document1;
		$files['upload_path'] = 'assets/front/profile';
		$files['allowed_types'] = 'gif|jpg|png|jpeg';
		$files['file_name']			=	$document1_filename;
		$files['max_size']	= '20000000';
		$this->load->library('upload', $files);
		$this->upload->initialize($files);
		if($this->upload->do_upload('image'))
		{
			$idata['file']=$document1_filename;
		}
		else
		{
			$idata['file'] = 'empty';
		}
		$parent_ticket=$this->get_ticket($id);		
		$idata['message']=$message;
		$idata['subject']=isset($parent_ticket->subject)?$parent_ticket->subject:NULL;
		$idata['DiZrIeSsOu']=isset($parent_ticket->DiZrIeSsOu)?$parent_ticket->DiZrIeSsOu:NULL;
		//$idata['username']="admin"; username
                $idata['emanZrIeSsOu']=isset($parent_ticket->name)?$parent_ticket->name:NULL;
		$idata['email']=isset($parent_ticket->email)?$parent_ticket->email:NULL;
		$idata['name']=isset($parent_ticket->name)?$parent_ticket->name:NULL;
		$idata['departments']=isset($parent_ticket->departments)?$parent_ticket->departments:NULL;
		$idata['parent_id']=$id;
		$idata['created_date']=date("Y-m-d H:i:s");
		$_POST['subject']=$idata['subject'];
		$_POST['tomail']=$idata['email'];
                $message=$_POST['message'];
		$question=isset($parent_ticket->message)?$parent_ticket->message:NULL;

		$this->db->insert("liateZdItSrOoZpIpSuOs",$idata);
	
	return true;

}

}

/*
 * End of the file common_model.php
 * Location: application/models/common_model.php
 */
