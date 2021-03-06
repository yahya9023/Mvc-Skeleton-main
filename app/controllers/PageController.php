<?php
class PageController extends Controller
{
    public function __construct()
    {
        //instanciation du model
        $this->userModel = $this->model('PageModel');
    }

    // public function register()
    // {
    // Check for POST
    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process form
    // 
    // Sanitize POST data
    // $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    // 
    // Init data
    // $data = [
    // 'username' => trim($_POST['Username']),
    // 'email' => trim($_POST['email']),
    // 'password' => trim($_POST['password']),
    // 'repeat_password' => trim($_POST['confirm_password']),
    // 'name_err' => '',
    // 'email_err' => '',
    // 'password_err' => '',
    // 'confirm_password_err' => ''
    // ];
    // 
    // Validate Email
    // if (empty($data['email'])) {
    // $data['email_err'] = 'Pleae enter email';
    // }
    // 
    // Validate Name
    // if (empty($data['name'])) {
    // $data['name_err'] = 'Pleae enter name';
    // }
    // 
    // Validate Password
    // if (empty($data['password'])) {
    // $data['password_err'] = 'Pleae enter password';
    // } elseif (strlen($data['password']) < 6) {
    // $data['password_err'] = 'Password must be at least 6 characters';
    // }
    // 
    // Validate Confirm Password
    // if (empty($data['confirm_password'])) {
    // $data['confirm_password_err'] = 'Pleae confirm password';
    // } else {
    // if ($data['password'] != $data['confirm_password']) {
    // $data['confirm_password_err'] = 'Passwords do not match';
    // }
    // }
    // 
    // Make sure errors are empty
    // if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
    // Validated
    // die('SUCCESS');
    // } else {
    // Load view with errors
    // $this->view('users/register', $data);
    // }
    // } else {
    // Init data
    // $data = [
    // 'name' => '',
    // 'email' => '',
    // 'password' => '',
    // 'confirm_password' => '',
    // 'name_err' => '',
    // 'email_err' => '',
    // 'password_err' => '',
    // 'confirm_password_err' => ''
    // ];
    // 
    // Load view
    // $this->view('users/register', $data);
    // }
    // }
    // 
    // public function index()
    // {
    // $users = $this->userModel->addUser();
    // $this->view('users/sign_up', $users);
    // }





    public function login()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
                die('SUCCESS');
            } else {
                // Load view with errors
                $this->view('users/login', $data);
            }
        } else {
            // Init data
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            // Load view
            $this->view('users/login', $data);
        }
    }





    public function insert()
    {
        if (!isset($_POST['sign_up'])) {
            //load the view (insert);
            $this->view('users/sign_up');
        } else {
            // si les donn??es sont envoy??s par POST 
            $data = [
                'username' => $_POST['Username'],
                'email' => $_POST['Email'],
                'password' => $_POST['Password'],
                'repeat_password' => $_POST['Repeat_Password']
            ];
            $this->userModel->addUser($data);
            header('location: ' . URLROOT . '/' . 'PageController/index'); // au pire ila ghleti kat mchi l page par default
        }
    }
}
