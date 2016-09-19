#!/usr/bin/env bash

sqlite3 game.db "CREATE TABLE IF NOT EXISTS users (name TEXT, email TEXT, score INTEGER )"