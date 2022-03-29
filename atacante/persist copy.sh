#!/usr/bin/env bash

# persist.sh

# run container without making it a daemon - useful to see logging output
# we are adding a named volume for /data in the container so the
# counter persists between runs.

docker run \
    --rm \
    --detach \
    -p8080:80 \
    --name="atacante" \
    -v `pwd`/data:/data \
    atacante
