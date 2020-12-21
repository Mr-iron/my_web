# i5ting_toc
md文件自动生成html文件
`i5ting_toc -f python常用库.md -o`

### 安装

使用方式非常简单,首先在全局安装 。

```shell
npm install i5ting_toc -g
```

### 使用

首先编辑markdown 文件  
![](https://images2015.cnblogs.com/blog/857465/201707/857465-20170709145517150-1920296367.png)

之后cd到markdown目录下，运行

```shell
i5ting_toc -f index.md
```

在.md 目录下回发现preview 文件夹，打开html文件即可 ，如图。  
![](https://images2015.cnblogs.com/blog/857465/201707/857465-20170709145525337-2071547535.png)

### 细节

下面是命令参数详解

```
    -h, --help             output usage information
    -V, --version          output the version number
    -f, --file [filename]  default is README.md
    -o, --open             open in browser
    -v, --verbose          打印详细日志
```
# js读取md文件
```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=iframe, initial-scale=1.0">
    <title>Document</title>
    <link href="/css/markdown.css" rel="stylesheet">
    <script src="/js/jquery_mk.js"></script>
    <script src="/js/markdown-it.min.js"></script>
    <script>
        window.searchMap = location.search.substr(1).split('&').reduce(function (r, it) {
            var them = it.split('='); r[them[0]] = them[1]; return r;
        }, {});
        $.ajaxSetup({ async: false });
    </script>
</head>

<body>
    <script>$.get("/data/python/python常用库.md", function (text) { document.write(markdownit().render(text)); });</script>
</body>

</html>
```
# CSS_伪代码
<table width="50%" cellspacing="0" cellpadding="0" border="1">
                <tbody>
                    <tr>
                        <th width="20%" align="center">选择器</th>
                        <th width="20%" align="center">示例</th>
                        <th width="60%" align="center">示例说明</th>
                    </tr>
                    <tr>
                        <td><a href="http://www.w3cschool.cc/cssref/sel-link.html">:link</a></td>
                        <td class="notranslate">a:link</td>
                        <td>选择所有未访问链接</td>
                    </tr>
                    <tr>
                        <td><a href="http://www.w3cschool.cc/cssref/sel-visited.html">:visited</a></td>
                        <td class="notranslate">a:visited</td>
                        <td>选择所有访问过的链接</td>
                    </tr>
                    <tr>
                        <td><a href="http://www.w3cschool.cc/cssref/sel-active.html">:active</a></td>
                        <td class="notranslate">a:active</td>
                        <td>选择正在活动链接</td>
                    </tr>
                    <tr>
                        <td><a href="http://www.w3cschool.cc/cssref/sel-hover.html">:hover</a></td>
                        <td class="notranslate">a:hover</td>
                        <td>把鼠标放在链接上的状态</td>
                    </tr>
                    <tr>
                        <td><a href="http://www.w3cschool.cc/cssref/sel-focus.html">:focus</a></td>
                        <td class="notranslate">input:focus</td>
                        <td>选择元素输入后具有焦点</td>
                    </tr>
                    <tr>
                        <td><a href="http://www.w3cschool.cc/cssref/sel-firstletter.html">:first-letter</a></td>
                        <td class="notranslate">p:first-letter</td>
                        <td>选择每个&lt;p&gt; 元素的第一个字母</td>
                    </tr>
                    <tr>
                        <td><a href="http://www.w3cschool.cc/cssref/sel-firstline.html">:first-line</a></td>
                        <td class="notranslate">p:first-line</td>
                        <td>选择每个&lt;p&gt; 元素的第一行</td>
                    </tr>
                    <tr>
                        <td><a href="http://www.w3cschool.cc/cssref/sel-firstchild.html">:first-child</a></td>
                        <td class="notranslate">p:first-child</td>
                        <td>选择器匹配属于任意元素的第一个子元素的 &lt;]p&gt; 元素</td>
                    </tr>
                    <tr>
                        <td><a href="http://www.w3cschool.cc/cssref/sel-before.html">:before</a></td>
                        <td class="notranslate">p:before</td>
                        <td>Insert content before every &lt;p&gt; element</td>
                    </tr>
                    <tr>
                        <td><a href="http://www.w3cschool.cc/cssref/sel-after.html">:after</a></td>
                        <td class="notranslate">p:after</td>
                        <td>在每个&lt;p&gt;元素之前插入内容</td>
                    </tr>
                    <tr>
                        <td><a href="http://www.w3cschool.cc/cssref/sel-lang.html">:lang(<i>language</i>)</a>
                        </td>
                        <td class="notranslate">p:lang(it)</td>
                        <td>为&lt;p&gt;元素的lang属性选择一个开始值</td>
                    </tr>
                </tbody>
            </table>
# AJAX
##  创建对象
所有现代浏览器（IE7+、Firefox、Chrome、Safari 以及 Opera）均内建 XMLHttpRequest 对象
 ```javascript
var xmlhttp
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
```
## 获取服务器响应
| 属性 | 描述 |
| --- | --- |
| responseText | 获得字符串形式的响应数据。 |
| responseXML | 获得 XML 形式的响应数据。 |


## 响应请求结果
| 属性 | 描述 |
|:----- | :--- |
| onreadystatechange| 存储函数（或函数名），每当 readyState 属性改变时，就会调用该函数。 |
| readyState| 存有 XMLHttpRequest 的状态。从 0 到 4 发生变化。<br>0: 请求未初始化<br>1: 服务器连接已建立<br>2: 请求已接收<br>3: 请求处理中<br>4: 请求已完成，且响应已就绪|
 |status |200: "OK"<br>404: 未找到页面|
## 案例
```javascript
function loadXMLDoc()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","/ajax/test1.txt",true);
xmlhttp.send();
}
```
