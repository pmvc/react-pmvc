#!/bin/sh
PWD=`pwd`
DIR=${PWD##/*/}
if [ "react-pmvc" == "$DIR" ]
then
    echo "In react-pmvc origin folder will not process clean command"
else
    echo "Start to clean folder [${DIR}]";
    find ./vendor -type d | xargs rm -rf
    find ./.git -type d | xargs rm -rf
    find ./demo -type d | xargs rm -rf
    find ./composer.lock | xargs rm -rf
    find ./clean.sh | xargs rm -rf
fi
