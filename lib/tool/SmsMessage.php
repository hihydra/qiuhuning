<?php
require_once(ROOT.'/lib/plugins/aliyunMNS/mns-autoloader.php');
use AliyunMNS\Client;
use AliyunMNS\Topic;
use AliyunMNS\Constants;
use AliyunMNS\Model\MailAttributes;
use AliyunMNS\Model\SmsAttributes;
use AliyunMNS\Model\BatchSmsAttributes;
use AliyunMNS\Model\MessageAttributes;
use AliyunMNS\Exception\MnsException;
use AliyunMNS\Requests\PublishMessageRequest;
class SmsMessage
{
    public function run($mobile,$code = 0,$template = 0)
    {
        switch ($template) {
            case '1':
                $SMSTemplateCode = 'SMS_67685185';
                break;

            default:
                $SMSTemplateCode = 'SMS_63905274';
                break;
        }
        /**
         * Step 1. 初始化Client
         */
        $this->endPoint = "https://1063546986439542.mns.cn-hangzhou.aliyuncs.com"; // eg. http://1234567890123456.mns.cn-shenzhen.aliyuncs.com
        $this->accessId = "LTAIHjoylcKpC9mj";
        $this->accessKey = "UXCIj11vtDVrEUdadgX0kSwubHEY84";
        $this->client = new Client($this->endPoint, $this->accessId, $this->accessKey);
        /**
         * Step 2. 获取主题引用
         */
        $topicName = "sms.topic-cn-hangzhou";
        $topic = $this->client->getTopicRef($topicName);
        /**
         * Step 3. 生成SMS消息属性
         */
        // 3.1 设置发送短信的签名（SMSSignName）和模板（SMSTemplateCode）
        $batchSmsAttributes = new BatchSmsAttributes("求婚网", $SMSTemplateCode);
        // 3.2 （如果在短信模板中定义了参数）指定短信模板中对应参数的值

        if ($code) {
             $path = array("code" => $code);
        }else{
             $path = array();
        }
        $batchSmsAttributes->addReceiver($mobile,$path);

        $messageAttributes = new MessageAttributes(array($batchSmsAttributes));
        /**
         * Step 4. 设置SMS消息体（必须）
         *
         * 注：目前暂时不支持消息内容为空，需要指定消息内容，不为空即可。
         */
         $messageBody = "短信验证码";
        /**
         * Step 5. 发布SMS消息
         */
        $request = new PublishMessageRequest($messageBody, $messageAttributes);
        try
        {
            $res = $topic->publishMessage($request);
            echo $res->isSucceed();
            echo "\n";
            echo $res->getMessageId();
            echo "\n";
        }
        catch (MnsException $e)
        {
            echo $e;
            echo "\n";
        }
    }
}
?>