<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Models\User;
use App\Transformers\CategoryTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends \App\Http\Controllers\Api\Controller
{
    public function index()
    {
        return $this->response->collection(Category::all(), new CategoryTransformer());
    }
}
