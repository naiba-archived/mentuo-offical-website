rm -rf dist &&\
    npm run build && cp submit.php dist &&\
    cd dist &&\
    scp -P 1987 * root@web.sx.p4x.com:/home/www/mentuo