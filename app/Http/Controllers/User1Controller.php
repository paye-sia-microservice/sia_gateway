<?php

namespace App\Http\Controllers;

use App\Services\User1Service;
use App\Services\User2Service;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class User1Controller extends Controller
{
     use ApiResponser;

     public $User1Service;
     public $User2Service;

    public function __construct(User1Service $User1Service, User2Service $User2Service) {
        $this->User1Service = $User1Service;
        $this->User2Service = $User2Service;
    }

    public function index() {
        return $this->successResponse($this->User1Service->obtainUsers());
    }

    public function show($id) {
        return $this->successResponse($this->User1Service->obtainUser1($id));
    }

    public function add(Request $request) {
        if ($request->jobid <= 5)
        {
            $this->User2Service->obtainUserJob2($request->jobid);
        }
        else
        {
            $this->User1Service->obtainUserJob1($request->jobid);
        }

        return $this->successResponse($this->User1Service->createUser($request->all(), Response::HTTP_CREATED));

        // $user = [];
        // $user = $this->User1Service->addUser1($request->all());
    
        // return $this->successResponse($user);
    }

    public function edit(Request $data, $id) {
        return $this->successResponse($this->User1Service->updateUser1($data->all(), $id));
    }
    
    public function delete($id) {
        return $this->successResponse($this->User1Service->deleteUser1($id));
    }
}