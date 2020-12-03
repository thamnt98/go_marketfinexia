<?php
    require_once('TigerpayClient.php');

    use TigerpaySDK\TigerpayClient;

    use TigerpaySDK\TigerpayTradeWapObj;
    use TigerpaySDK\TigerpayTradeWapReq;

    use TigerpaySDK\TigerpayTradeWappayObj;
    use TigerpaySDK\TigerpayTradeWappayReq;

    /////////////////////////////////////////////////////////////////////////////////////////////以下数据为服务商提供////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //TODO  以下数据为示例数据，实际数据由管理员提供
    $serverUrl = "请联系管理员提供";
    $appId="111";
    $APPPrivateKEY='MIICdwIBADANBgkqhkiG9w0BAQEFAASCAmEwggJdAgEAAoGBANn6Ri5P/j9+6NhZkmypqV68dlWlUWuAAD9F2s9O9bBUgOZVLEItbe+IYtamP7npvY00QxBeckZmRZl5jC5Qj60HgRD6TxyDIJhwMEodH551RUsQgWQL3+o5obOB+msS/nZfyjrMaCVbVLLVjPYHWzoOdMY9NGAGJAsmfGWzycOjAgMBAAECgYAS7oXB5/ixExiuEbmB7opjTAMLFTypFYjv9eU3NChqlCxN1P/vD3sI3tOWyQGn6AEqjmt0tH9AVgmdds0SCLUxrPWHQxP3eebQpyt8e7M/ZTkrHdneAkl8vUaW8v8+b5q5UDFP9qZYkjaS6nJVB+NVSYkFLtNNqmsbknP0NMjJwQJBAPHzpxw1vrJi8UYtlUjv2WpBfc70qHW1tsQ0On36YQ/NxMYBJUbiI+rS0G26WV+76Z7Gs7UhIv8lIBZbZL8nb+sCQQDmokWuGZyEXAgKs5C0iTiy1nOHfLpSATorsrmHaNt4QQYF99n50OE2Qffypo8+APKrH6XgvqmcR4JKQip6y8UpAkEAsMehtc7fAl+ggfIUPTJh3Gz1ixzfaQHYBAtVIW6rNGzX9QQpRF0+ePiHKWUaoAQgcc4kx5bqhxmNFEi6l6As+QJBALiRfk/wwRgPioP95b0E37IG+tefkoAT6ViVI/JgkNpwtwBJtFA+wCyqqGGwt4t4OLuHjTkJfDTL6VHCF7rDndkCQEd8v21NpP278wwFpxkacSrpkJc35Ew53BplMGr/U+SEO1nPdPnuitvHN7HC20z6dnhHOo/V2rP7LL/iBBBQ+W8=';
    $ServerPublicKey='MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCQbyRn2ZV0xAiuJxckZ/9cKoW9RAsOTP8sfBQ6kpSPtHu6/uTX9VEOPqrpBTqb78xwFcTSXux4mKiv5Vaw392TRZ3Zr8BE1DnEVUKFv6PmA7HWbs6XGBlX9O4/oYl2Jgf3VsAJfhFtFgJ+pS/RYBT+l5D8xhkD1UZn97ytFTBJ9QIDAQAB';
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



    ///////////////////////////////////////支付方式选择及信息输入接口////////////////////////////////////////////////////
    //////////////////////////////////////////WAP支付接口/////////////////////////////
    $client = new TigerpayClient($serverUrl, $appId, $APPPrivateKEY, $ServerPublicKey);

    $wapObj = new TigerpayTradeWapObj();
    $wapObj->price = 100;
    $wapObj->userName = "用户名";
    $wapObj->userId = "用户id";
    $wapObj->tradeNo = "商户订单号";
    //其它参数设置
    //$wapObj->......
    $wapObj->returnUrl="成功跳转地址";
    $request = new TigerpayTradeWapReq($wapObj);

    $url = $client->sdkExecute($request);
    echo $url;

    echo "\n";

    ///////////////////////////////////直接支付接口//////////////////////
    $wappayObj = new TigerpayTradeWappayObj();
    $wappayObj->payType = 2;        // 支付方式  1：银行卡  2：支付宝
    $wappayObj->price = 1;
    $wappayObj->userName = "";
    $wappayObj->userId = "";
    $wappayObj->tradeNo = "商户订单号";
    //其它参数设置
    //$wapObj->......
    $wappayObj->returnUrl="支付成功跳转的URL";
    $request = new TigerpayTradeWappayReq($wappayObj);

    $url = $client->sdkExecute($request);
    echo $url;

    //////////////////////////////回调//////////////////////////////////////////////////////
    // 回调和响应数据的body字符串验证和解析
    $responseBody = '{"code":0,"message":"success","body":{"charset":"utf-8","sign":"J%2Bo1Dg5e56GZd1IMdibJv4veIkU39lmfZCBnIetR8bWhI%2Bzh0RX%2BvJWGcvkUd8gX04nwGu15gFOtTYIA%2BtnnwqbDx%2FCUy7M87F1LNBapQzDx1GUrJSN0jDKQUWDdQIngTo4ZbCFy3hjDfnDlaWCourX%2BdGy1J0134gOBcMXUvAw%3D","method":"tigerpay.trade.wap","version":"1.0.0","data":"GJwA%2Fizj0dI8D5x1RdC6yI4hi4F6CUZTOJSI98b%2F1cu2UWRqKbr2WfFQ7Dv2Vz0yR7FqZZGpganMvOAT2reesYkN58bsQCPzqp30t8mNeDquq02vstNCAdoPWxBF2gRQ2ymiCl0hz06m0nG0cXovOrPFbWon6eHOCLisCWrB9XLTQLWyNnSgBsPVeJTftEf4E%2FESHIYIzzxrX4Yb7fQoBFHjhYW7pP8yM%2FsoGBzhNV6Tpo1q2ipPmpy9RNf6iwr%2F2SxqQ22AZcfwUnJTP%2B59iRcOlxP7Kh00bfVxZld%2Fno4UFZPkEkc1zvBmTJjXOUjMgvjfHeXfNTWf5tkGp6rIJkM3ywjG3dxz0VZ6luw7mkNC4zwJFsJgpMJhfJ8Jx0kv7KXl0RQo3kaxvyWdb1WYOoeZplZ27M6hA0%2B2tccX9G9EPwOjtimuqfg%2F0qrognsN1R01Wb6tXT9Lh37tdR0DP4UEs2KeauSTsOh0tPfhQRhxY4YNLyPWvOdGAL3hdMAX"}}';
    $body = json_decode($responseBody)->body;
    echo "\n";
    echo json_encode($client->checkResponse($body));