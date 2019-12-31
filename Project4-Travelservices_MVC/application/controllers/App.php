<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {


	public function index()
	{
        $data['temp'] = 0;
		$this->load->view('header',$data);
		$this->load->view('index');
		$this->load->view('footer');
	}
    public function register(){
            $this->load->model('UserModel');
            $result = $this->UserModel->register();
            $data['temp'] = 0;
            $this->load->view('header',$data);
            $this->load->view('index');
            $this->load->view('footer');
    }

	public function signin(){  
            $this->load->model('UserModel');
            if($this->session->userdata('currently_logged_in')){
                echo "already loggedin";  
                $url = 'App/home';
                echo'
                    <script>
                        window.location.href = "'.base_url().'index.php?/'.$url.'";
                    </script>';
            }
            else {
                $res = $this->UserModel->userLogin();
                if($res->num_rows() > 0){
                    $email = "";
                    foreach($res->result_array() as $row){
                       $email = $row['emailid'];
                    }
                    $data = array(  
                        'username' => $this->input->post('username'),
                        'email' => $email,  
                        'currently_logged_in' => 1  
                    );
                    $this->session->set_userdata($data);  
                    $url = 'App/home';
                    echo'
                        <script>
                            window.location.href = "'.base_url().'index.php?/'.$url.'";
                        </script>';
                }
                else{
                    $temp = array('login_error' => 'yes');
                    $this->session->set_userdata($temp);
                    $url = 'App/signin';
                    echo'
                        <script>
                            window.location.href = "'.base_url().'index.php?/'.$url.'";
                        </script>';
                }
            }
        }
        
        public function logout(){
            $this->session->sess_destroy();
             $data['temp'] = 0;
            $this->load->view('header',$data);
            $this->load->view('index');
            $this->load->view('footer');
        }
        public function home(){
            $this->load->model('UserModel');
            $data ['username'] = $this->session->userdata('username');
            $data['temp'] = 1;
            $data['temp1'] = "";
            $data['message'] = "";
            $data['cart'] = $this->UserModel->cartItems($data ['username']);
        	$this->load->view('header',$data);
        	$this->load->view('rides',$data);
        	$this->load->view('footer');
        }
        public function searchRides(){
            $this->load->model('UserModel');
            $data = array();
            $data ['username'] = $this->session->userdata('username');
            $data['temp'] = 1;
            $data['temp1'] = "";
            $data['message'] = "";
            $data['cart'] = $this->UserModel->cartItems($data ['username']);
            if(isset($_POST['search'])){
                $result = $this->UserModel->searchRides();
                if(sizeof($result) > 0){
                    $data['details'] = $result;
                    $data['message'] = "";
                    $data['temp1'] = 1;
                }
                else{
                    $data['details'] = array();
                    $data['message'] = "No Rides";
                    $data['temp1'] = 0;
                }
            }
            $this->load->view('header',$data);
            $this->load->view('rides',$data);
            $this->load->view('footer');
        }

        public function addCart(){
            $this->load->model('UserModel');
            $data ['username'] = $this->session->userdata('username');
            $result = $this->UserModel->addToCart();
            if($result != 0){
                return 1;
            }
            else{
                return 0;
            }
        }
        public function deleteCart(){
            $this->load->model('UserModel');
            $data ['username'] = $this->session->userdata('username');
            $result = $this->UserModel->deleteFromCart($data['username']);
            if($result){
                return 1;
            }
            else{
                return 0;
            }
        }
        public function checkOut(){
            $this->load->model('UserModel');
            $data ['username'] = $this->session->userdata('username');
            $data['temp'] = 1;
            $data['cart'] = $this->UserModel->cartItems($data ['username']);
            $this->load->view('header',$data);
            $this->load->view('checkout',$data);
            $this->load->view('footer');
        }
        public function confirmPay(){
            $this->load->model('UserModel');
            $data['temp'] = 1;
            $email = $this->session->userdata('email');
            $data ['username'] = $this->session->userdata('username');
            $data['cart'] = $this->UserModel->cartItems($data ['username']);
            $result = $this->UserModel->confirmPayment($data['username']);
            $data['details'] = $this->UserModel->bookings($data ['username']);
            $message = "Hello ".$data['username']."\n\n\n"."Thank you for booking with Tservice, Hope you enjoyed our service"."\n\n"."Thank you\n\n\nTService Team.";
            $this->load->library('email');
            $this->email->from('siddharthakarnam@gmail.com'); // change it to yours
            $this->email->to($email);// change it to yours
            $this->email->subject('TService');
            $this->email->message($message);
            if($this->email->send()){
               $this->load->view('header',$data);
               $this->load->view('bookings',$data);
               $this->load->view('footer');
            }
            else{
                echo "Something went wrong";
            }
            
        }
         public function bookings(){
            $this->load->model('UserModel');
            $data['temp'] = 1;
            $data ['username'] = $this->session->userdata('username');
            $data['cart'] = $this->UserModel->cartItems($data ['username']);
            $data['details'] = $this->UserModel->bookings($data ['username']);
            $this->load->view('header',$data);
            $this->load->view('bookings',$data);
            $this->load->view('footer');
        }

        public function parking(){
            $this->load->model('UserModel');
            $data['temp'] = 1;
            $data ['username'] = $this->session->userdata('username');
            $data['cart'] = $this->UserModel->cartItems($data ['username']);
            $data['details'] = $this->UserModel->parking($data ['username']);
            $this->load->view('header',$data);
            $this->load->view('parking',$data);
            $this->load->view('footer');
        }
    
        public function cars(){
            $this->load->model('UserModel');
            $data['temp'] = 1;
            $data['temp1'] = "";
            $data['message'] = "";
            $data ['username'] = $this->session->userdata('username');
            $data['cart'] = $this->UserModel->cartItems($data ['username']);
            $data['details'] = $this->UserModel->bookings($data ['username']);
            $this->load->view('header',$data);
            $this->load->view('cars',$data);
            $this->load->view('footer');
        }

        public function pcheckOut(){
            $this->load->model('UserModel');
            $data ['username'] = $this->session->userdata('username');
            $data['temp'] = 1;
            $result = $this->UserModel->pcheck($data['username']);
            $data['cart'] = $this->UserModel->cartItems($data ['username']);
            if($result != 0){
                $this->load->view('header',$data);
                $this->load->view('checkout',$data);
                $this->load->view('footer');
            }
        }

        public function searchCars(){
            $this->load->model('UserModel');
            $data = array();
            $data ['username'] = $this->session->userdata('username');
            $data['temp'] = 1;
            $data['temp1'] = "";
            $data['message'] = "";
            $data['cart'] = $this->UserModel->cartItems($data ['username']);
            if(isset($_POST['search'])){
                $result = $this->UserModel->searchCars();
                if(sizeof($result) > 0){
                    $data['details'] = $result;
                    $data['message'] = "";
                    $data['temp1'] = 1;
                }
                else{
                    $data['details'] = array();
                    $data['message'] = "No Cars";
                    $data['temp1'] = 0;
                }
            }
            $this->load->view('header',$data);
            $this->load->view('cars',$data);
            $this->load->view('footer');
        }

}
