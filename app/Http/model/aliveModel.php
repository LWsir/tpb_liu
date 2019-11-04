<?php
namespace App\Http\model;
use Illuminate\Database\Eloquent\Model;

class aliveModel extends Model
{
    protected $connection = 'mysql_alive';

    protected $table = 't_alive';

    protected $primaryKey = 'app_id,id';

    protected $guarded = [];

    /**
     * Created by PhpStorm.
     * User: abner
     * 方法名 getAliveInfo 按字段取值
     * @param $app_id
     * @param $alive_id
     * @param string $fields
     * @return mixed
     * Date: 2019-10-24 15:11
     */
    public function getAliveInfo($app_id,$alive_id,$fields='*'){
        $res = self::select($fields)
                ->where('app_id',$app_id)
                ->where('id',$alive_id)
                ->get();
        return $res;
    }

}