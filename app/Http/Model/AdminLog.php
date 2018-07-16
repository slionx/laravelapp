<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class AdminLog extends Model
{
    protected $table = 'adminlog';
    public $timestamps = true;

    const TYPE_USER = '用户操作';
    const TYPE_CATEGPRY = '分类操作';
    const TYPE_PERMISSION = '权限操作';
    const TYPE_ROLE = '规则操作';
    const TYPE_POST = '文章操作';
    const TYPE_COMMENT = '评论操作';
    const TYPE_SET = '设置操作';
    const TYPE_TAG = '标签操作';
    const TYPE_UPLOD = '上传操作';
    const TYPE_WELCOME = '欢迎页操作';

    static function create($admin_id,$type,$operation){
        $log = new AdminLog();
        $log->admin_id = $admin_id;
        $log->type = $type;
        $log->operation = $operation;
        $log->ip = get_client_ip();
        if (!$log->save()) {
            return ['status' => 2, 'message' => '生成操作记录失败'];
        }
        return ['status' => 1, 'message' => '生成操作记录成功'];
    }
}
