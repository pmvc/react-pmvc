#!/bin/sh

local=`git branch | grep \* | cut -d ' ' -f2`

git add -A && \
  git commit --amend --no-edit && \
  git push dokku ${local}:master -f && \
  git reset origin/${local}

