<?php
/**
 *
 * @author : 尤嘉兴
 * @version: 2018/9/9 12:16
 */

namespace App\Transformers;


use League\Fractal\TransformerAbstract;
use Spatie\Permission\Models\Role;

class RoleTransformer extends TransformerAbstract
{
    public function transform(Role $role)
    {
        return [
            'id' =>$role->id,
            'name' => $role->name,
        ];
    }
}