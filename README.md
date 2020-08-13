# education

for start you should use 'make'

* "make init"
    * initialize project. Use it for the first start of application.
* "make up"
    * start of all containers. Use for all next starts of application.
* "make down"
    * down all containers. Use for halt.
* "make restart"
    * restart all containers. Use for restart containers after changing of configuration.

_____________

Requests for auth:
* curl -H 'Host: localhost:8080' -H 'User-Agent: Charles/4.2.7' -H 'Content-Type: application/json' --data-binary '{
 "email": "zxc@asd.qwe",
  "password": "aaa"
}' 'http://localhost:8080/register'

* curl -H 'Host: localhost:8080' -H 'User-Agent: Charles/4.2.7' -H 'Content-Type: application/json' --data-binary '{
 "email": "zxc@asd.qwe",
 "password": "aaa"
}' 'http://localhost:8080/login_check'