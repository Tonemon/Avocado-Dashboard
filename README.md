# Avocado-Dashboard
A simple dashboard to keep track of my avocado plant

## How it works
This website shows you the 'stats' of your plant. I have chosen to use two ways to measure the growth of my plant:
The amount of water it absorbed (in cm of the cup) and the growth (in cm) of the plant itself. This will automatically be
rendered to a bootstrap graph which can be seen on the homescreen above the table. 

There is a form on the 'update' side of the website where you can submit your stats and they will be added to the 'PlantDAT'
database table. After that it will be submitted on the homepage and the bootstrap graph will update. This 'update' site is
login protected (not really secure, but great for something like this) and you could choose your own username and password.

## Installation
If you want to do this on your own, you will need to do the following:
1. Upload the DATABASE.sql file to your phpMyAdmin (this will create a table called 'PlantDAT'). At first you will probably
need to delete the already submitted records but you could still use the structure.
2. Upload this directory (without the DATABASE.sql file!) to your webhost and modify the following information:
- In the header of the first 'index.php' file insert your mysql server information.
- In the header of the 'update/index.php' file insert your mysql server information.
- Go to the 'update/index.php' file and change the username and password (nonsense too if you want).