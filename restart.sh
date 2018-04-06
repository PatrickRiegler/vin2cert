# phpapi

## build:
docker build -t vin2cert .


## remove:
docker stop vin2cert-app
docker rm -fv vin2cert-app

## run:
docker run -d -p 8080:80 --add-host="elasticsearch:18.184.37.127" --name vin2cert-app vin2cert
bash -c 'while [[ "$(curl -s -o /dev/null -w ''%{http_code}'' localhost:8080/api.php)" != "200" ]]; do echo $(date); sleep 1; done'

echo "test case 1:"
curl localhost:8080/api.php?VIN=WDD2210561A233135

#echo "test case 2:"
#curl -XPOST -H "Content-Type: application/json"  -d '{"username":"patrick","password":"mypw"}' localhost:8080/api.php?VIN=WDD2210561A233135

