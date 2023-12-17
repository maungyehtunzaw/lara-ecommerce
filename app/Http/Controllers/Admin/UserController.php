<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\AdminUserDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index(AdminUserDataTable $dt){
     return $dt->render('admin.user.index');
   }
}
