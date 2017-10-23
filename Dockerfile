#Choose base image
FROM ubuntu:16.04
#Update base image
RUN apt-get update && DEBIAN_FRONTEND=noninteractive
#Install hhvm
RUN apt-key adv --recv-keys --keyserver hkp://keyserver.ubuntu.com:80 0x5a16e7281be7a449
RUN deb http://dl.hhvm.com/debian jessie main | tee /etc/apt/sources.list.d/hhvm.list
RUN apt-get update && DEBIAN_FRONTEND=noninteractive && apt-get -y install hhvm && apt-get -y install nano && \
    apt-get -y install cron && apt-get -y install git && apt-get -y install htop && \
    apt-get install -y net-tools
#Make directory and copy files into it
RUN mkdir /voice
COPY . /voice
#Expose ports
EXPOSE 8010:8010
#Provide defaults for executing the container
CMD ["/usr/bin/hhvm","--mode=server","--port=8010"]