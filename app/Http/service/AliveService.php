<?php
namespace App\Http\service;

use App\Http\model\aliveModel;

class AliveService
{
    private $aliveModel;

    /**
     * Created by PhpStorm.
     * User: abner
     * 方法名 getAliveInfo 获取直播间信息
     * @param $app_id
     * @param $alive_id
     * @param string $fields
     * @return mixed
     * Date: 2019-10-24 15:16
     */
    public function getAliveInfo($app_id,$alive_id,$fields='*'){
        $alive = $this->getAliveModel();
        $aliveInfo = $alive->getAliveInfo($app_id,$alive_id,$fields);
        return $aliveInfo;
    }

    /**
     * Created by PhpStorm.
     * User: abner
     * 方法名 getAliveModel 获取直播表的model
     * @return aliveModel
     * Date: 2019-10-24 15:17
     */
    public function getAliveModel(){
        if(!$this->aliveModel){
            $this->aliveModel = new aliveModel();
        }
        return $this->aliveModel;
    }
}