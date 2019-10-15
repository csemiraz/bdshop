<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function manageCategory() {
        return view('back-end.admin.category.manage-category');
    }
}
