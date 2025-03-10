#!/usr/bin/bash

podman run -it --network kadaster-transcriptie_default --rm mariadb mariadb -hkadaster-transcriptie_mysql_1 -ukadaster -p
