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

    echo "update .env"
    cp .env.sample .env.pmvc
    sed -i -e "s|hello_app|${DIR}|g" .env.pmvc
    sed -i -e "s|/vendor/pmvc-theme/hello_react|/themes/${DIR}|" .env.pmvc
    if [ -e ".env.pmvc-e" ]; then rm .env.pmvc-e; fi
    ln -sf ../themes/${DIR}/assets ./htdocs/assets
    sed -i -e "s|\"pmvc-app\/hello_app\": \"\*\",||g" composer.json  
    sed -i -e "s|\"pmvc-theme\/hello_react\": \"\*\"||g" composer.json  
    sed -i -e "s|view_config_helper\": \"\*\",|view_config_helper\": \"\*\"|g" composer.json  
    if [ -e "composer.json-e" ]; then rm composer.json-e; fi
    
    echo "clean vendor, git, composer.lock clean.sh"
    find ./vendor -type d | xargs rm -rf
    find ./.git -type d | xargs rm -rf
    find ./composer.lock | xargs rm -rf
    find ./clean.sh | xargs rm -rf
fi
