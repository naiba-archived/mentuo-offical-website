rm -rf dist &&\
    npm run build && cp submit.php dist &&\
    cd dist &&\
    ssh -t -p1987 root@web.sx.p4x.com 'rm -rf /home/www/mentuo/* && ls -al /home/www/mentuo/' &&\
    scp -P 1987 * root@web.sx.p4x.com:/home/www/mentuo