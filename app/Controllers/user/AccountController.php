<?php

namespace App\Controllers\user;

use App\Controllers\BaseController;
use App\Models\TransactionModel;
use App\Models\OrderModel;
use App\Models\UserModel;

use App\Common\ResultUtils;
use Exception;

class AccountController extends BaseController
{

    private $transaction;
    private $orders;
    private $users;
    public function __construct()
    {
        parent::__construct();
        $this->orders = new OrderModel();
        $this->transaction = new TransactionModel();
        $this->transaction->protect(false);
        $this->users = new UserModel();
    }

    public function index()
    {

        $session = session();
        if ($session->has('loginAdmin')) {
            return redirect('admin');
        } else {
            $user = array_values(session('login'));

            $dataLayout['transactions'] = json_decode(json_encode($this->transaction->getUserId($user['0'])), True);;
            $dataLayout['users'] = json_decode(json_encode($this->users->getById($user['0'])), True);
            $data = null;
            $data = $this->loadUserLayout($data, "Tài khoản", "user/pages/account", "", "", $dataLayout);
            return view('user/main', $data);
        }
    }

    public function view($id)
    {
        $dataLayout['items'] = json_decode(json_encode($this->orders->getAllId($id)), True);
        $data = null;
        $data = $this->loadUserLayout($data, "Tài khoản", "user/pages/viewtransaction", "", "", $dataLayout);
        return view('user/main', $data);
    }

    public function edit()
    {
        $requestData = $this->request;
        $user = array_values(session('login'));
        if ($this->request->getMethod() == 'post') {
            $result = $this->ActionEdit($requestData, $this->users, 'edit', $user['0']);

            return redirect()->back()->withInput()->with($result['messageCode'], $result['messages']);
        }
    }

    private function CheckEdit($requestData)
    {
        $rule = [
            'email' => 'max_length[100]|valid_email',
            'name' => 'max_length[100]',
        ];
        $message = [
            'email' => [
                'max_length' => 'Tên quá dài, vui lòng nhập {param} ký tự!',
                'valid_email' => 'Không giống định dạng email!',
            ],

            'name' => [
                'max_length' => 'Tên quá dài, vui lòng nhập {param} ký tự!',
            ],


        ];

        $this->validation->setRules($rule, $message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

    public function ActionEdit($requestData, $model1, $string, $id)
    {
        $validate = $this->CheckEdit($requestData);
        if ($validate->getErrors()) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => $validate->getErrors(),
            ];
        }
        $dataSave = $requestData->getPost();

        try {
            $model1->$string($id, $dataSave);
            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'messageCode' => ResultUtils::MESSAGE_CODE_OK,
                'messages' => ['success' => 'Thành công!'],
            ];
        } catch (Exception $e) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => ['success' => $e->getMessage()],
            ];
        }
    }


    public function Confirm($id)
    {
        $this->transaction->getFinal($id);
        return redirect("account");
    }
}
