/****************************  DATA COLLECTION MODULE  ************************/

The data collection module is made up of 5 PHP files.

*
class.yahoostock.php:

This file defines a class which contains functions to fetch the required data. Also, the data will be stored in this

class before importing to Database.

*
DBconnect.php:

This file only contains a connection operation which can be set as a required condition to avoid error when can't connect to

database.

*
DBcreate.php:

To creat two tables. One stores the real-time price of stock and the other one stores the historic record of stock.

*
updata_current.php:

To quote the current-time price of stock every 30 seconds ,and insert the result into database

*
updata_history.php:

To quote the history record of stock, insert the result into database.