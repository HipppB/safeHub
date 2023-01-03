# SafeHub

## _Domotics for your safety_

This repository is for the SafeHub projet.

SafeHub is a school projet where we have to build a product from scratch. We choose to build a connected Hub. This repository contains our website to control the Hubs.

## Launch the app

To launch the app, you need to install docker and docker-compose. <br/>
The easiest way to achieve this is to install docker desktop. the link here:
<a href="https://docs.docker.com/get-docker/">Download Docker</a><br/>
Then, you can run the following command in the directory of the project:
    
```
docker-compose up -d --build
```

### Feel the database

Open a terminal in the root directory of the project (safeHub) and open a terminal.
Then, run the following command:

```
 docker exec -it safehub-php-fpm-1 sh 
```

Then, run the following command:

```
cd src/config
```
```
php init.php
```
