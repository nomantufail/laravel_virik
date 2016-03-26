<?php
/**
 * Created by PhpStorm.
 * User: JR Tech
 * Date: 3/16/2016
 * Time: 11:07 AM
 */

namespace App\Repositories\Transformers\Sql;

use App\Models\Sql\User;
use App\Models\Sql\UserDocument;
use App\Repositories\Interfaces\Transformers\RepositoryTransformerInterface;

class UserTransformer extends SqlTransformer implements RepositoryTransformerInterface
{
    public function transform($user)
    {
        return $user;
    }
}