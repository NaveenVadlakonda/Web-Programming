<?php
    class UserModel extends CI_Model{
        function __construct()
        {
            parent:: __construct();
        }
        function register(){
            $data = array();
            $data = array(
                    'username'=>$this->input->post('username'),
                    'fname' => $this->input->post('fname'),
                    'lname'=>$this->input->post('lname'),
                    'password'=>$this->input->post('password'),
                    'emailid'=>$this->input->post('email'),
                    'phoneno'=>$this->input->post('phoneno')
            );
            $result = $this->db->insert('users',$data);
            return $result;
        }
        function userLogin(){
            $username = $this->input->post('username');
            $pass =  $this->input->post('password');
            $result = $this->db->get_where('users', array('username' => $username,'password' => $pass));
            return $result;
        }
        function searchRides(){
            $source =  $_POST['source'];
            $destination = $_POST['destination'];
            $date =  $_POST['event'];
            $seats = $_POST['seats'];
            $details= array(array());
            $i = 0;
            $result = $this->db->get_where('rides', array('source' => $source,'destination' => $destination,'travelDate' => $date, 'seats' => $seats));

            if ($result->num_rows() > 0) {
                foreach($result->result_array() as $row){
                   $details[$i]['source'] = $row['source'];
                   $details[$i]['destination'] = $row['destination'];
                   $details[$i]['date'] = $row['travelDate'];
                   $details[$i]['time'] = $row['travelTime'];
                   $details[$i]['seats'] = $row['seats'];
                   $details[$i]['cost'] = $row['cost'];
                   $i++;
                }
            }
            return $details;
        }
        function addToCart(){
            $data = array();
            $result = $this->db->get_where('cart', array('username' => $this->input->post('username'),'source' => $this->input->post('source'),'destination' => $this->input->post('destination'), 'date' => $this->input->post('date'), 'status' => 0));
            if ($result->num_rows() > 0) {
                $data['message'] = "Ride already in cart";
                return 0;
            }
            else{
                $data = array(
                    'username'=>$this->input->post('username'),
                    'category' => $this->input->post('category'),
                    'source'=>$this->input->post('source'),
                    'destination'=>$this->input->post('destination'),
                    'date'=>$this->input->post('date'),
                    'time'=>$this->input->post('time'),
                    'cost'=>$this->input->post('cost'),
                    'status'=> 0
                );
                $result = $this->db->insert('cart',$data);
                return $result;
            }
        }
        function cartItems($username){
            $details= array(array());
            $i = 0;
            $result = $this->db->get_where('cart', array('username' => $username,'status' => 0));

            if ($result->num_rows() > 0) {
                foreach($result->result_array() as $row){
                   $details[$i]['id'] = $row['id'];
                   $details[$i]['category'] = $row['category'];
                   $details[$i]['source'] = $row['source'];
                   $details[$i]['destination'] = $row['destination'];
                   $details[$i]['date'] = $row['date'];
                   $details[$i]['time'] = $row['time'];
                   $details[$i]['status'] = $row['status'];
                   $details[$i]['cost'] = $row['cost'];
                   $i++;
                }
            }
            return $details;
        }
        function deleteFromCart($username){
            $result = $this->db->delete('cart', array('username' => $username,'id' => $this->input->post('id')));
            return $result;
        }

        function confirmPayment($username){
            $details= array(array());
            $result = $this->db->get_where('cart', array('username' => $username,'status' => 0));
            if ($result->num_rows() > 0) {
                foreach($result->result_array() as $row){
                    date_default_timezone_set('America/Los_Angeles');
                    $date = date('m/d/Y h:i:s a', time());
                    $data = array(
                        'item_id' => $row['id'],
                        'username'=>$username,
                        'source'=>$row['source'],
                        'destination'=>$row['destination'],
                        'date'=>$row['date'],
                        'time'=> $row['time'],
                        'cost' => $row['cost'],
                        'paymentDate' => $date
                    );
                    $result = $this->db->insert('bookings',$data);
                }
                $data = array('status' => 1);
                $this->db->where('username',$username);
                if( $this->db->update('cart',$data)){
                        return 1;
                }
                else{
                    return 0;
                }
            }
            else{
                return 0;
            }
        }

        function bookings($username){
            $details= array(array());
            $i = 0;
            $result = $this->db->get_where('bookings', array('username' => $username));

            if ($result->num_rows() > 0) {
                foreach($result->result_array() as $row){
                   $details[$i]['id'] = $row['item_id'];
                   $details[$i]['source'] = $row['source'];
                   $details[$i]['destination'] = $row['destination'];
                   $details[$i]['date'] = $row['date'];
                   $details[$i]['time'] = $row['time'];
                   $details[$i]['paymentDate'] = $row['paymentDate'];
                   $details[$i]['cost'] = $row['cost'];
                   $i++;
                }
            }
            return $details;
        }

        function parking($username){
            $details= array(array());
            $i = 0;
            $destination = "";
            $result = $this->db->get_where('cart', array('username' => $username,'status' => 0,'category!=' => 'parking'));

            if ($result->num_rows() > 0) {
                foreach($result->result_array() as $row){
                   $destination = $row['destination'];
                }
                $result1 = $this->db->get_where('parking', array('place' => $destination));
                   if ($result1->num_rows() > 0) {
                     foreach($result1->result_array() as $row1){
                            $details[$i]['pid'] = $row1['pid'];
                            $details[$i]['place'] = $row1['place'];
                            $details[$i]['parkingName'] = $row1['parkingName'];
                            $details[$i]['cost'] = $row1['cost'];
                            $i++;
                     }
                }
            }
            return $details;
        }

        function pcheck($username){
            $data = array();
            $result = $this->db->get_where('cart', array('username' => $username,'category' => 'parking','destination' => $this->input->post('destination'),'status' => 0));
            if ($result->num_rows() > 0) {
                $data['message'] = "Already in cart";
                return 0;
            }
            else{

                $result = $this->db->get_where('parking', array('pid' => $this->input->post('parking')));
                $pname = "";
                $cost = "";
                if ($result->num_rows() > 0) {
                    foreach($result->result_array() as $row){
                       $pname = $row['parkingName'];
                       $cost = $row['cost'];
                    }
                    $data = array(
                        'username'=>$username,
                        'category'=>'parking',
                        'source' => $pname,
                        'destination'=>$this->input->post('destination'),
                        'cost'=>$cost,
                        'status'=> 0
                    );
                    $result = $this->db->insert('cart',$data);
                    return $result;
                }
            }
        }

        function searchCars(){
            $toDate =  $_POST['tdate'];
            $destination = $_POST['destination'];
            $fromDate =  $_POST['event'];
            $type = $_POST['seats'];
            $details= array(array());
            $i = 0;
            $result = $this->db->get_where('cars', array('place' => $destination,'fromDate' => $fromDate,'toDate' => $toDate, 'ctype' => $type));

            if ($result->num_rows() > 0) {
                foreach($result->result_array() as $row){
                   $details[$i]['place'] = $row['place'];
                   $details[$i]['ctype'] = $row['ctype'];
                   $details[$i]['cname'] = $row['cname'];
                   $details[$i]['fromDate'] = $row['fromDate'];
                   $details[$i]['toDate'] = $row['toDate'];
                   $details[$i]['pickup'] = $row['pickup'];
                   $details[$i]['cost'] = $row['cost'];
                   $i++;
                }
            }
            return $details;
        }
    }
?>