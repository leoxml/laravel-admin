<?php

// +----------------------------------------------------------------------
// | date: 2015-07-12
// +----------------------------------------------------------------------
// | QueryCatModel.php: 后端查询工具分类模型
// +----------------------------------------------------------------------
// | Author: yangyifan <yangyifanphp@gmail.com>
// +----------------------------------------------------------------------

namespace App\Model\Admin;

class QueryCatModel extends BaseModel {

    protected $table    = 'query_cat';//定义表名
    protected $guarded  = ['id'];//阻挡所有属性被批量赋值

    /**
     * 组合数据
     *
     * @return mixed
     * @author yangyifan <yangyifanphp@gmail.com>
     */
    public static function mergeData($data){
        if(!empty($data)){
            foreach($data as &$v){
                //组合状态
                $v->status = self::mergeStatus($v->status);
                //组合操作
                $v->handle = '<a href="'.url('admin/query-cat/edit', [$v->id]).'" target="_blank" >编辑</a>';
                $v->handle  .= ' | ';
                $v->handle  .= '<a onclick="del(this,\''.url('admin/query-cat/delete', [$v->id]).'\')" target="_blank" >删除</a>';
            }
        }
        return $data;
    }


}
