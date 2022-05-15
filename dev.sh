#!/usr/bin/env bash

COMMAND=$1
shift

source <(sed -E -n 's/[^#]+/export &/ p' .env)

case $COMMAND in
    sonar)
        sonar-scanner -Dsonar.projectKey=${SONAR_PROJECT_KEY} -Dsonar.host.url=${SONAR_HOST}:${SONAR_PORT} -Dsonar.login=${SONAR_TOKEN}
    ;;
esac
