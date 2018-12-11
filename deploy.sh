rm -rf dist &&\
    npm run build && cp -rv submit.php static dist &&\
    cd dist &&\
    ssh -t -p60030 root@ca.sx.p4x.com 'rm -rf /NAIBA/www/mentuo/* && ls -al /NAIBA/www/mentuo/' &&\
    rsync -rvz -e 'ssh -p 60030' --progress --remove-sent-files . root@ca.sx.p4x.com:/NAIBA/www/mentuo/