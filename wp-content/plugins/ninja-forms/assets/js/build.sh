#!/bin/bash
r.js -o baseUrl=builder/ out=min/builder.js optimize=uglify2 name=../lib/almond include=main wrap=true
r.js -o baseUrl=front-end/ out=min/front-end.js optimize=uglify2 name=../lib/almond include=main wrap=true