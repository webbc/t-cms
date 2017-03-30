<?php

namespace App\Transformers;

class UserTransformer extends BaseTransformer
{
    public function transformData($model)
    {
        return [
            'id' => $model->id,
            'user_name' => $model->user_name,
            'nick_name' => $model->nick_name,
            'email' => $model->email,
            'is_lock' => $model->is_lock,
            'created_at' => $model->created_at->toDateTimeString(),
            'updated_at' => $model->updated_at->toDateTimeString()
        ];
    }
}
