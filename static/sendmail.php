
<?php 
    require_once "email.class.php";
    //******************** 配置信息 ********************************
    $str = "";      
    for ($i=1; $i<=6; $i++)
    {
        $num = mt_rand(0, 9);
        $str = $str . $num;
    }


    $smtpserver = "ssl://smtp.163.com";//SMTP服务器
    $smtpserverport =465;//SMTP服务器端口
    $smtpusermail = "xhcheng55@163.com";//SMTP服务器的用户邮箱
    $smtpemailto = $_POST["to"];//发送给谁
    $smtpuser = "xhcheng55";//SMTP服务器的用户帐号
    $smtppass = "zxcvbnm123";//SMTP服务器的用户密码（我的163邮箱的授权码）//jdmmfnrzwioucajb
    $mailtitle = "聚一起(juyiqi.net) 用户注册";//邮件主题
    $mailcontent = "尊敬的用户，您现在正在 聚一起(juyiqi.net)注册新用户，验证码为: " . $str ."，此验证码十分钟内有效";//邮件内容
    $mailtype = "TXT";//邮件格式（HTML/TXT）,TXT为文本邮件

    //************************ 配置信息 ****************************
    $smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
    $smtp->debug =false;//是否显示发送的调试信息
    $state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

    
    
    echo $str;


?>