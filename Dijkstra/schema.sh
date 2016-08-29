#!/usr/bin/env bash

echo "******** SQlite install ***************"

FILENAME='./storage/database.sqlite'

if [ -f ${FILENAME} ]
then
    touch ./storage/database.sqlite
fi

SQLITE=$(cat <<EOF
CREATE TABLE IF NOT EXISTS graphs ( \
id INTEGER PRIMARY KEY AUTOINCREMENT, \
content TEXT );
CREATE TABLE IF NOT EXISTS routes ( \
id INTEGER PRIMARY KEY AUTOINCREMENT, \
graph_id INTEGER path TEXT, \
FOREIGN KEY(graph_id) REFERENCES graphs(id)\
);
EOF
)

echo ${SQLITE} | sqlite3 ${FILENAME}