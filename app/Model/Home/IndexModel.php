<?php

// +----------------------------------------------------------------------
// | date: 2015-07-11
// +----------------------------------------------------------------------
// | IndexModel.php: 前台首页模型
// +----------------------------------------------------------------------
// | Author: yangyifan <yangyifanphp@gmail.com>
// +----------------------------------------------------------------------

namespace App\Model\Home;

use DB;

class IndexModel extends BaseModel {

    protected $table    = 'site_cat';//定义表名
    protected $guarded  = ['*'];//阻挡所有属性被批量赋值

    /**
     * 获得首页网址分类和分类下面的网址
     *
     * @return mixed
     * @author yangyifan <yangyifanphp@gmail.com>
     */
    public static function getAllSite(){
       return self::mergeData(self::where('status', '=', '1')->where('deleted_at', '=', '0000-00-00 00:00:00')->orderBy('sort', 'ASC')->paginate(20));
    }

    /**
     * 组合数据
     *
     * @param $roles
     * @return mixed
     * @author yangyifan <yangyifanphp@gmail.com>
     */
    public static function mergeData($data, $limit = 32){
        if(!empty($data)){
            foreach($data as &$v){
                //组合操作
                $v->site  = $limit > 0 ? DB::table('site')->where('site_cat_id', '=', $v->id)->where('status', '=', 1)->where('deleted_at', '=', '0000-00-00 00:00:00')->orderBy('sort', 'ASC')->take($limit)->get() : DB::table('site')->where('site_cat_id', '=', $v->id)->where('status', '=', 1)->orderBy('sort', 'ASC')->get();
            }
        }
        return $data;
    }

    /**
     * 获得当前分类下面全部网址
     *
     * @param $cat_id
     * @return mixed
     */
    public static function getCategorySite($cat_id){
        if(!empty($cat_id)){
            $cat_info           = new \stdClass();
            $cat_info->cat_info = DB::table('site_cat')->select('cat_name', 'id')->where('id', '=', $cat_id)->where('deleted_at', '=', '0000-00-00 00:00:00')->first();
            $cat_info->all_site = DB::table('site')->where('site_cat_id', '=', $cat_id)->where('status', '=', '1')->where('deleted_at', '=', '0000-00-00 00:00:00')->orderBy('sort', 'ASC')->paginate(50);
            return $cat_info;
        }
    }


}
