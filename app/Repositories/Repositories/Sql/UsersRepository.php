<?php
/**
 * Created by PhpStorm.
 * User: JR Tech
 * Date: 3/16/2016
 * Time: 9:57 AM
 */

namespace App\Repositories\Repositories\Sql;


use App\Events\Events\User\UserCreated;
use App\Libs\Json\Creators\Creators\UserJsonCreator;
use App\Repositories\Interfaces\Repositories\UsersRepoInterface;
use App\Models\Sql\User;
use App\Repositories\Transformers\Sql\UserTransformer;
use Illuminate\Support\Facades\Event;

class UsersRepository extends SqlRepository implements UsersRepoInterface
{
    private $userTransformer;
    public function __construct(){
        $this->userTransformer = new UserTransformer();
    }

    public function all()
    {
        return User::all();
    }

    public function getFirst(array $where = [])
    {
        $user = User::where($where)->get()->first();
        return ($user == null)?null:$this->userTransformer->transform($user);
    }

    public function getById($id)
    {
        return $this->getFirst(['id'=>$id]);
    }

    public function getByToken($token)
    {
        return $this->getFirst(['access_token'=>$token]);
    }

    public function update($user)
    {
        $user->save();
        return true;
    }

    public function store($userInfo)
    {
        $user = User::create($userInfo);
        return ($user == null)?null:$user->id;
    }

    public function delete($userId)
    {
        User::destroy($userId);
        return true;
    }
}
