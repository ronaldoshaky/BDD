# Formassembly QAE Project Environment - UPDATED by Anthony McGlone

This file contains everything needed to get behat running on any platform 

## Requirements

* Docker
  * [Windows](https://docs.docker.com/docker-for-windows/install/) - includes docker-compose 
  * [Docker for Mac](https://download.docker.com/mac/stable/Docker.dmg) this needs to be installed via docker.com and not through homebrew so docker-compose will be installed as well

* `make` (optional, commands from Makefile can be executed manually instead) 
  * [Make for Windows](http://gnuwin32.sourceforge.net/packages/make.htm)
  * Mac - Install xcode command line tools`xcode-select --install` (Recommended way) or via [homebrew](https://brew.sh/)
  

## Build

* run `make build` to build automatically or individually run commands found in Makefile

## Test

* `make test` to run all behat tests

### Watch tests

* Connect a VNC viewer to localhost:5904 to watch tests run
  * Mac provides build in `Screen Sharing` app for VNC
  * Windows [RealVNC](https://www.realvnc.com/en/connect/download/viewer/)
  * The passcode for VNC connection is `secret`