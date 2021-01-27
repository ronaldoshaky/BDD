# Set the base image to Centos
FROM centos:centos7

# File Author / Maintainer
MAINTAINER Patrick Cummins "patrick@formassembly.com"

RUN sed -i.bak s/override_install_langs=.*//g /etc/yum.conf
RUN rpm -e --nodeps glibc-common

RUN yum update -y

RUN yum install -y epel-release https://repo.ius.io/ius-release-el7.rpm
RUN yum localinstall -y --nogpgcheck https://download1.rpmfusion.org/free/el/rpmfusion-free-release-7.noarch.rpm

# Installing php and things
RUN yum --enablerepo=extras \
    install -y \
    libc-client php72u-common \
    php72u-mysqlnd php72u-xml php72u-bcmath php72u-devel \
    php72u-mbstring php72u-soap php72u-fpm php72u-ldap \
    php72u-cli php72u-gd php72u-imap php72u-process \
    pear1u php72u-pecl-xdebug php72u-pdo php72u-json \
    git which yum-utils wget patch tar bzip2 unzip openssh-clients rsync sudo \
    java tesseract ffmpeg ffmpeg-devel gpac git \
    gcc make autoconf libmcrypt-devel \
    python-devel python-pip  \
    php72u-pecl-imagick \
    glibc-common

RUN yes '' | pecl install mcrypt-1.0.1

RUN pip install vnc2flv

RUN rpm --import http://li.nux.ro/download/nux/RPM-GPG-KEY-nux.ro && rpm -Uvh http://li.nux.ro/download/nux/dextop/el7/x86_64/nux-dextop-release-0-5.el7.nux.noarch.rpm
RUN wget https://dl.google.com/linux/direct/google-chrome-stable_current_x86_64.rpm
RUN yum localinstall google-chrome-stable_current_x86_64.rpm -y

RUN mkdir -p /formassembly/instances/fd/{local,logs}
RUN groupadd -r -g 1000 fd_local
RUN groupadd -r -g 1001 fd_local1
RUN groupadd -r -g 1002 fd_local2
RUN useradd -u 1000 -g 1000 fd_local -d /formassembly/instances/fd/local
RUN useradd -u 1001 -g 1000 fd_local1
RUN useradd -u 1002 -g 1000 fd_local2
RUN echo "fd_local ALL=(root) NOPASSWD:ALL" > /etc/sudoers.d/fd_local && \
    chmod 0440 /etc/sudoers.d/fd_local

COPY ./php.ini /etc/php.d/99-overrides.ini

VOLUME /formassembly/instances/fd/local
VOLUME /formassembly/instances/fd/logs

RUN mkdir -p /opt/nvm && \
    chown -R fd_local:fd_local /formassembly/instances/fd/ && \
    chmod -R 777 /formassembly/instances/fd/

WORKDIR /formassembly/instances/fd/local

USER fd_local:fd_local
