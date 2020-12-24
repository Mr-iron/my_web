# Linux资料

## nginx

1、本地nginx目录：/usr/sbin/nginx
2、nginx.conf位置：sudo vi /etc/nginx/nginx.conf
3、nginx启动:sudo /usr/sbin/nginx -c /etc/nginx/nginx.conf
4、查看nginx进程：ps -ef|grep nginx
5、nginxerror日志：/var/log/nginx/error.log
6、测试conf配置是否正确：sudo /usr/sbin/nginx -t
7、重新加载conf配置：sudo /usr/sbin/nginx -s reload

## ufw

sudo ufw allow 22

## php安装配置

php 路径：/etc/php/7.3/fpm
打开php配置：sudo vi /etc/php/7.3/fpm/php-fpm.conf
error日志：/var/log/php7.3-fpm.log
php.ini：sudo vi /etc/php/7.3/fpm/php.ini
sudo systemctl restart php7.3-fpm #重启
sudo systemctl start php7.3-fpm #启动
sudo systemctl stop php7.3-fpm #关闭
sudo systemctl status php7.3-fpm

## git

### push上传

git push 命用于从将本地的分支版本上传到远程并合并。

```bash
git push origin master
```

### commit提交

```bash
git commit -am "添加到远程"
```

### add添加

git add 命令可将该文件添加到暂存区。
添加一个或多个文件到暂存区(暂存的更改）：

`git add [file1] [file2]`

