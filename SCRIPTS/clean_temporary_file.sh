#!/bin/bash

ls | egrep -v '\.|[A-Z]|temp' | xargs rm
