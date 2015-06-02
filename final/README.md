# PERSONAL FINANCE MANAGER
My program will be a personal tool that I can use to track some financial 
information. I can copy the JSON object that gets returned when I view my 
transaction history on my bank's web site. My project will contain a page where
I can paste the JSON in and have it parse it into my database. I will be adding 
category information to each transaction, so after importing it will redirect to
a page to enter the categories manually.

On another page, budgets can be created, updated and deleted per category.

Finally, monthly summary pages will break spending down into these categories,
and display the information with different types of charts. 

# To run the application:
* To create the database, first run the code in [sql/personalfinancemanager.sql](sql/personalfinancemanager.sql) in phpmyadmin. 

* Navigate to [index.php](index.php) within localhost.

* After signup and login, you will be directed to an empty monthly report page. This page only displays categorized withdrawals from the current month. [fakedata.txt](fakedata.txt) contains a json string that is modeled after the one my bank uses, containing transactions for the month of 6/2015. This can be copy/pasted into the import page.

* After importing, you will be directed to the categorize transaction page, where the newly imported withdrawals can be given categories manually. As they are categorized, they will begin to affect the monthly report page.

* The manage categories page allows you to add/delete categories. Deleting a category will blank out every transaction that belonged to it. All categories must belong to one of the three hard-coded category classes.

* The budget page allows you to set a budget for every existing category. The monthly report page displays this info for every category where money was spent for the current month as an over/under value.
