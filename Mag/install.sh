#!/usr/bin/env bash

echo "******** SQlite install ***************"

SQLITE=$(cat <<EOF
CREATE TABLE IF NOT EXISTS messages ( id INTEGER PRIMARY KEY AUTOINCREMENT, content TEXT, published_at DATETIME);
CREATE TABLE IF NOT EXISTS histories ( id INTEGER PRIMARY KEY AUTOINCREMENT, published_at DATETIME );
EOF
)

echo $SQLITE | sqlite3 ./storage/database.sqlite