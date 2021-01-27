# Set the base image to Centos
FROM selenium/standalone-firefox-debug:2.53.1

# This is in accordance to : https://www.digitalocean.com/community/tutorials/how-to-install-java-with-apt-get-on-ubuntu-16-04
RUN apt-get update
RUN apt-get install -y openjdk-8-jdk ant ffmpeg gpac ca-certificates-java
RUN apt-get clean
RUN rm -rf /var/lib/apt/lists/*
RUN rm -rf /var/cache/oracle-jdk8-installer

# Setup JAVA_HOME, this is useful for docker commandline
ENV JAVA_HOME /usr/lib/jvm/java-8-openjdk-amd64/
RUN export JAVA_HOME

# Installs Ant
ENV ANT_VERSION 1.9.4
RUN cd && \
    wget -q http://archive.apache.org/dist/ant/binaries/apache-ant-${ANT_VERSION}-bin.tar.gz && \
    tar -xzf apache-ant-${ANT_VERSION}-bin.tar.gz && \
    mv apache-ant-${ANT_VERSION} /opt/ant && \
    rm apache-ant-${ANT_VERSION}-bin.tar.gz
ENV ANT_HOME /opt/ant
ENV PATH ${PATH}:/opt/ant/bin

# Now ready to run /opt/ant/bin/ant standalone_test on command
RUN mkdir -p -m 777 /tmp/JSUnit
RUN mkdir -p -m 777 /root/.mozilla/

COPY ./entry_point.sh /opt/bin/entry_point2.sh
RUN chmod +x /opt/bin/entry_point2.sh

EXPOSE 8732

WORKDIR /tmp/JSUnit
