#!/bin/sh
phpExtension="php"
checkOk="No syntax errors detected"
git status -s|while read line 
do
	changeType=${line:0:2}
	changeFile=${line:2}
	changeFileExtension=${changeFile:0-3}
	if [[ "$phpExtension" == "$changeFileExtension" ]]; then
		if [[ "$changeType" != "D " ]]; then
			#echo `/usr/local/php/bin/php -l $changeFile`
			echo `php -l $changeFile`
			#if [[ ${`php -l $changeFile`:0: 20} != "$checkOk" ]]; then
			#	echo 'Er
			#fi
		fi
	fi
done
