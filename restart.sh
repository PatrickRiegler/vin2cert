# phpapi


run () 
{
  CMD=$1
  echo "------------------------------"
  echo "Running.. "
  echo $CMD
  $CMD
}


## build:
run "docker build -t vin2cert ."


## remove:
run "docker stop vin2cert-app"
run "docker rm -fv vin2cert-app"

## run:
run "docker run -d -p 8080:80 --add-host=elasticsearch:$(curl -s checkip.amazonaws.com) --name vin2cert-app vin2cert"
bash -c 'while [[ "$(curl -s -o /dev/null -w ''%{http_code}'' localhost:8080/api.php)" != "200" ]]; do echo $(date); sleep 1; done'

#run "echo 'test case 0:"'
#run "curl -XPOST localhost:8080/api.php?VIN=WDD2210561A233135"

run 'echo "test case 1:"'
run "curl localhost:8080/api.php?VIN=WDD2210561A233135"

#run 'echo "test case 2:"'
#run 'curl -XPOST -H "Content-Type: application/json"  -d \'{"username":"patrick","password":"mypw"}\' localhost:8080/api.php?VIN=WDD2210561A233135'

