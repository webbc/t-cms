<?php

namespace App\Models;

class Type extends BaseModel
{
    protected $hasDefaultValuesFields = ['order'];

    protected $fillable = ['name', 'description', 'order', 'class_name'];

    public $timestamps = false;

    public static $modelMapWithType = [
        'link' => Link::class,
        'banner' => Banner::class,
        'setting' => Setting::class,
    ];

    public function scopeByModel($query, $model)
    {
        if (isset(self::$modelMapWithType[$model])) {
            return $query->where('class_name', self::$modelMapWithType[$model]);
        } else {
            return $query;
        }
    }

    public function __get($key)
    {
        $mapKey = substr($key, 0, -1);
        if (isset(self::$modelMapWithType[$mapKey])) {
            return $this->hasMany(self::$modelMapWithType[$mapKey]);
        } else {
            return parent::__get($key);
        }
    }

    public function __call($method, $args)
    {
        $mapKey = substr($method, 0, -1);
        if (isset(self::$modelMapWithType[$mapKey])) {
            return $this->hasMany(self::$modelMapWithType[$mapKey]);
        } else {
            return parent::__call($method, $args);
        }
    }

    public static function createType(array $data)
    {

        if(isset(self::$modelMapWithType[$data['class_name']])){
            $data['class_name'] = self::$modelMapWithType[$data['class_name']];
            return static::create($data);
        }
    }
}
