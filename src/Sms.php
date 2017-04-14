<?php
/**
 * 短信类
 * Auther: stevewoo
 * Date: 31/03/2017 3:56 PM
 * @author stevewoo <stevewoo@labyun.cn>
 * @copyright COPYRIGHT © 2017,LABYUN.CN ALL RIGHTS RESERVED
 */

namespace STWOO\AliSms;
include_once 'aliyun-php-sdk-core/Config.php';
use Sms\Request\V20160927 as Smss;


class Sms
{

    public static function sendMessage($sign_name,$tpcode,$mobile,$content)
    {
        $iClientProfile = \DefaultProfile::getProfile(config('sms.node'), config('sms.access_key'), config('sms.access_key_secret'));
        $client = new \DefaultAcsClient($iClientProfile);
        $request = new Smss\SingleSendSmsRequest();
        $request->setSignName($sign_name);/*签名名称*/
        $request->setTemplateCode($tpcode);/*模板code*/
        $request->setRecNum($mobile);/*目标手机号*/
        $request->setParamString($content);/*模板变量，数字一定要转换为字符串*/
        try {
            $response = $client->getAcsResponse($request);
            return true;
//            print_r($response);
        }
        catch (\ClientException  $e) {
            return false;
//            print_r($e->getErrorCode());
//            print_r($e->getErrorMessage());
        }
        catch (\ServerException  $e) {
            return false;
//            print_r($e->getErrorCode());
//            print_r($e->getErrorMessage());
        }

    }
}