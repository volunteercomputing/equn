<?php
define("TOKEN", "weixin"); 
$wechatObj = new wechat();
$wechatObj->valid();
class wechat {
        public function valid() {
                $echoStr = $_GET["echostr"];
                if($this->checkSignature()){
                        echo $echoStr;
                        exit;
                }
        }

        private function checkSignature() {
                $signature = $_GET["signature"];
                $timestamp = $_GET["timestamp"];
                $nonce = $_GET["nonce"];
                $token = TOKEN;
                $tmpArr = array($token, $timestamp, $nonce);
                sort($tmpArr);
                $tmpStr = implode( $tmpArr );
                $tmpStr = sha1( $tmpStr );
                if( $tmpStr == $signature ) {
                        return true;
                } else {
                        return false;
                }
        }
}
?>