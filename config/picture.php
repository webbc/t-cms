<?php

return [
    // 存储引擎: config/filesystem.php 中 disks， public 或 qiniu
    'default_disk' => 'public',
    /**
     * 允许的类型列表
     */
    'allowTypeList' => [
        'png',
        'jpg',
        'jpeg'
    ],
    /**
     * 图片质量
     */
    'quality' => 75,
    /**
     * 允许的尺寸列表
     * tip:0,0是原图大小
     */
    'sizeList' => [
        'is' => '34,34',
        'xs' => '50,50',
        'sm' => '0,60',
        'md' => '200,200',
        'lg' => '600,0',
        'cover_sm' => '190,120',
        'banner_sm' => '200,0',
        'banner_index' => '855,0',
        'optimize' => '0,0',//原图 优化后
        'original' => '0,0,100'//原图
    ],
    'disks' => [
        'public' => [
            /*
             * 图片上传路径
             */
            'uploadPath' => 'uploads' . DIRECTORY_SEPARATOR . 'imgs' . DIRECTORY_SEPARATOR,
            /*
             * 图片路由
             */
            'route' => [
                'path' => '/pic',
                'name' => 'pic',
                'middleware' => []
            ]
        ],
        'qiniu' => []
    ]
];
