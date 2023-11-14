#!/bin/bash

php artisan migrate
apache2-foreground
