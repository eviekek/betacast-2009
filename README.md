# BetaCast 2009
A YouTube revival of the 2009 layout that shut down on April 10, 2023

# How to use
Clone both this repo, and [the vi folder](https://github.com/qffx/betacast-vi-folder). 
Move their contents to the root of your web server and import betacast2009.sql (included in this repo).
Then open db_conn.php and add your mysql database's details.

# How do I make my account admin?
Run this SQL query: UPDATE users SET admin=1 WHERE username = "YOUR USERNAME HERE"

