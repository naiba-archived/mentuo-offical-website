rm -rf dist &&\
    npm run build && cp submit.php static dist &&\
    cd dist &&\
    ssh -t -p1987 root@web.sx.p4x.com 'rm -rf /home/www/mentuo/* && ls -al /home/www/mentuo/' &&\
    rsync -rvz -e 'ssh -p 1987' --progress --remove-sent-files . root@web.sx.p4x.com:/home/www/mentuo