###############  说明   ################

获取本文件并一键部署命令：
wget http://pic.klagri.com.cn/env/dockerfiles-1.2.0.tar.gz && tar zxvf dockerfiles-1.2.0.tar.gz && mv dockerfiles-1.2.0 dockerfiles && cd dockerfiles && /bin/bash init.sh

本目录中  docker-compose.yml  init.sh  nginx  php

1、其中init.sh 为初始化脚本，运行第一次后，无需使用。
如果你是通过命令行一键安装  wget http://pic.klagri.com.cn/env/dockerfiles-1.x.0.tar.gz && tar zxvf dockerfiles-1.x.0.tar.gz && mv dockerfiles-1.x.0 dockerfiles && cd dockerfiles && /bin/bash init.sh 则无需运行此文件, 通过8081端口访问phpinfo页面，如正常访问则部署成功

2、docker-compose.yml 文件为docker容器编排文件，通过docker-compose工具一键启动容器集群，以及其他配置和管理

3、nginx 目录， 为nginx容器的配置文件，修改后动过docker-compose restart 重启生效

4、php 目录， 为php容器的配置文件，修改后通过docker-compose restart 重启生效



常用命令：
	docker-compose up -d   后台运行docker容器集群
	docker-compose stop    停止
	docker-compose restart 重启

更新说明：
    1.1.0  ----  2019-06-14
	nginx容器为  centos:latest + nginx1.17 加上下载其他工具和依赖，镜像文件不小于522M
	php容器为    alpine + php7.0   镜像文件大小 70.7M
    1.2.0  ----  2019-06-18
	nginx容器的基础镜像不再使用centos，使用alpine + nginx1.17     镜像大小为20.5M，加快了镜像构建速度，减少镜像体积 
	
