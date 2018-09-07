<?php
/**
 *
 * @author : 尤嘉兴
 * @version: 2018/9/7 20:53
 */

namespace App\Transformers;


use App\Models\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    public function transform(Category $category)
    {
        return [
            'id' => $category->id,
            'name' => $category->name,
            'description' => $category->description,
        ];
    }
}