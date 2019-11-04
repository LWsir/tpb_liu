<?php


namespace App\Http\Controllers;

use App\Http\service\AliveService;
use App\Http\service\Murmur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TestController extends Controller
{
    private $aliveService;

    /**
     * Created by PhpStorm.
     * User: abner
     * 方法名 oopLearn
     * @return \Illuminate\Http\JsonResponse
     * Date: 2019-10-24 15:26
     */
    public function oopLearn(){
         $app_id   = Input::get('app_id','');
         $alive_id = Input::get('alive_id','');
         $service = $this->getAliveService();
         $aliveData = $service->getAliveInfo($app_id,$alive_id,'img_url');
         $img_url = $aliveData[0]->img_url;
         $content = file_get_contents($img_url);
         return response($content, 200, [
            'Content-Type' => 'image/png',
         ]);
//         return response()->json(Utils::pack($aliveData,0,'ok'));
    }

    /**
     * Created by PhpStorm.
     * User: abner
     * 方法名 getAliveService
     * @return AliveService
     * Date: 2019-10-24 16:05
     */
    public function getAliveService(){

        if(!$this->aliveService){
            $this->aliveService = new AliveService();
        }
        return $this->aliveService;
    }

    public function hashTable(){
        $app_id  = Input::get('app_id','');
        $user_id = Input::get('user_id','');

        $number = hash('sha256',$app_id.$user_id);
        //hash值转成32位整数 Murmur哈希
        $newNumber  = Murmur::hash3_int($number);
        return $newNumber%100;
    }

    public function awayFromDay(){
        $oneDay = Input::get('one_day','');
        $today = time();

        $lessDay = ceil(abs((strtotime($oneDay) - $today))/86400);

        if(strtotime($oneDay) < $today){
            return "距离".$oneDay."已过去".$lessDay."天";
        }else{
            return "距离".$oneDay."还剩下".$lessDay."天";
        }
    }

    public function getQuery(Request $request){
        $hashNum = hash('md5','100222');
        return $hashNum;
        return $request->getClientIp();
        /**getIp**/
        if(!empty($_SERVER["HTTP_CLIENT_IP"])) {
            $ip_address = $_SERVER["HTTP_CLIENT_IP"];
        }else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $ip_address = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
        }else if(!empty($_SERVER["REMOTE_ADDR"])){
            $ip_address = $_SERVER["REMOTE_ADDR"];
        }else{
            $ip_address = '';
        }
        return $ip_address;
    }

}