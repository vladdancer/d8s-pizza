#!/bin/bash
git remote -v
rev=$(git rev-parse --short HEAD)
git config user.name "Vlad Moyseenko"
git config user.password ${GITHUB_PASS}
git add .
git commit -m "travis commit at ${rev}"
git push origin master