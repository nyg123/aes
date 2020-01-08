# 这是一个通用的aes加签验签方法 
## 使用方法
### 安装扩展
> composer require nyg/aes 

### 使用方法
``` php
use Nyg\Aes;


/*待签名数组*/
$data=['name'=>'张三','email'=>'admin@admin.com'];

/*密钥*/
$key='4r5ewt64ewt78tr7ey8e9y7';

/*生成签名sign*/
$sign=Aes::sign_encrypt($data,$key);
echo $sign."\n\r";

/*验签*/
$bool=Aes::sign_decrypt($data,$sign,$key);
var_dump($bool);
```

## 签名生成的通用步骤如下：

第一步，设所有发送或者接收到的数据为集合M，将集合M内非空参数值的参数按照参数名ASCII码从小到大排序（字典序），使用URL键值对的格式（即key1=value1&key2=value2…）拼接成字符串stringA。
特别注意以下重要规则：

* 参数名ASCII码从小到大排序（字典序）；
* 如果参数的值为空不参与签名；
* 参数名区分大小写；
* 验证调用返回或主动通知签名时，传送的sign参数不参与签名，将生成的签名与该sign值作校验。
* 接口可能增加字段，验证签名时必须支持增加的扩展字段


第二步，在stringA最后拼接上key得到stringSignTemp字符串，并对stringSignTemp进行MD5运算，再将得到的字符串所有字符转换为大写，得到sign值signValue。