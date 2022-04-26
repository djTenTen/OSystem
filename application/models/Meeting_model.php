<?php
class Meeting_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function viewMeetings(){
        $query = $this->db->query("select * from meetings");
        return $query->result_array();
    }

    public function viewMeetingsSearch($keyword){
        $query = $this->db->query("select * 
        from meetings
        where MeetingName like '%$keyword%'");
        return $query->result_array();
    }

    public function saveMeeting(){

        $hour = $this->input->post('hour');
        $minute = $this->input->post('minute');
        $time = $hour.':'.$minute.':'.'00';
        $data = array(
            'MeetingName' => strtoupper($this->input->post('meetingname')),
            'MeetingDesc' => ucfirst($this->input->post('meetingdesc')),
            'Date' => $this->input->post('date'),
            'Time' => $time
        );

        $this->db->insert('meetings', $data);

        $select = $this->db->query("select MeetingID from meetings order by MeetingID desc limit 1");
        foreach($select->result_array() as $row){
            $meetingID = $row['MeetingID'];
        }


        $config['allowed_types'] = 'pdf|docx'; 
        $config['upload_path'] = './meetingfiles/';  
        $config['file_name'] = $meetingID;
        $this->load->library('upload',$config);

        if ($this->upload->do_upload('file')) {
            $this->upload->data();
        }else{
            return $this->upload->display_errors();
        }

    }



    public function updateMeeting($meetingID){
        
        $hour = $this->input->post('hour');
        $minute = $this->input->post('minute');
        $time = $hour.':'.$minute.':'.'00';
        $data = array(
            'MeetingName' => strtoupper($this->input->post('meetingname')),
            'MeetingDesc' => ucfirst($this->input->post('meetingdesc')),
            'Date' => $this->input->post('date'),
            'Time' => $time
        );
        $this->db->where("MeetingID",$meetingID);
        $this->db->update('meetings', $data);

    }

    public function deleteMeeting($meetingID){

        $this->db->where("MeetingID",$meetingID);
        $this->db->delete('meetings');
        $this->load->helper("file");
        unlink(base_url().'meetingfiles/'.$meetingID.'.pdf');
        
    }














        



}