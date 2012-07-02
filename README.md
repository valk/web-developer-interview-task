web-developer-interview-task
============================

Example mini web-framework written in pure PHP v5.3.

This is a work - a result of my interview tasks to several companies which accepted me. 
Initially, it's a mini-framework written in PHP v5.3 with a web form that validates, 
and writes data to a file storage. There's a minimal OOD, and this was built in some 14 hours, 
with extensibility in mind. 
The code is pretty clean, so there shouldn't be much issues with cross-browser compatibility. 
Tested with FF, Chrome and IE (current versions of the release time).

Installation
============

Clone this repo, and chmod -R 777 .
You'll need to create a default database. Please log in to Mysql:
 
 mysql -u root -p

and run:

 create database guitest;
 
Run the command from the commands.sql file to build the tables manually, or from bash:
  
 mysql -u root -p guitest < commands.sql


In order to run the file to DB migration tool, please edit migrage_to_db.php file and change:

 $password = 'ROOT_PASSWORD';   // your password for DB root, or edit this file to change the username as well.


Usage
=====

Please set up your web server, and point to the application's directory. Go and play with the form. 
The submission results will be written to form_submissions.txt file. 

When you've finished, go ahead and migrate your data from the file to the database with:
 php migrage_to_db.php


License
=======

This is General VKH License. You're allowed to use and/or extend this code as you wish. You're 
not allowed to use this code in any way if you intend to harm other people or animals. You must
love what you're doing, or at least try to enjoy it.