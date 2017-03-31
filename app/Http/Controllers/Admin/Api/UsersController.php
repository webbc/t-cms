<?php
/**
 * Created by PhpStorm.
 * User: ty
 * Date: 2017/3/30 0030
 * Time: 下午 9:00
 */

namespace App\Http\Controllers\Admin\Api;


use App\Entities\User;
use App\Http\Requests\UserUpdateRequest;
use App\Transformers\UserTransformer;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Hash;

class UsersController extends ApiController
{
    public function lists()
    {

        $users = User::withSimpleSearch()
            ->withSort()
            ->recent()
            ->paginate($this->perPage());
        return $this->response->paginator($users, new UserTransformer())
            ->addMeta('allow_sort_fields', User::$allowSortFields);
    }

    public function show($id)
    {
        $user = User::find($id);
        $this->response->item($user, new UserTransformer());
    }

    public function destroy($id)
    {
        if (!User::destroy($id)) {
            //todo 国际化
            throw new NotFoundHttpException('该用户不存在');
        }
    }

    public function update($id, UserUpdateRequest $request)
    {
        $data = $request->all();
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $request->performUpdate(User::findOrFail($id));
    }
}