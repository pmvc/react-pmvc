#!/bin/sh
PWD=`pwd`
DIR=${PWD##/*/}
if [ "react-pmvc" == "$DIR" ]
then
    echo "In react-pmvc origin folder will not process clean command"
else
    echo "Start to clean folder [${DIR}]";

    echo "copy app"
    mkdir ./apps/$DIR
    cp -a ./apps/link-to-see-demo/* ./apps/$DIR
    rm ./apps/link-to-see-demo

    echo "copy theme"
    mkdir ./themes/$DIR
    cp -a ./themes/link-to-see-demo/* ./themes/$DIR
    rm ./themes/link-to-see-demo
    
    echo "clean vendor, git, composer.lock clean.sh"
    find ./vendor -type d | xargs rm -rf
    find ./.git -type d | xargs rm -rf
    find ./composer.lock | xargs rm -rf
    find ./clean.sh | xargs rm -rf
fi
