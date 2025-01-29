<h1 align="center" id="title">Event Management Module Documentation</h1>

<p align="center"><img src="https://socialify.git.ci/KabitaYesmin3063/event-management-system/image?font=Bitter&amp;language=1&amp;name=1&amp;owner=1&amp;pattern=Charlie+Brown&amp;stargazers=1&amp;theme=Auto" alt="project-image"></p>

<p id="description">Overview The Event Management Module is designed to streamline the creation editing and management of events. This guide outlines the steps to set up and use the module effectively.</p>

<h2>🚀 Demo</h2>

[https://github.com/KabitaYesmin3063/event-management-system/](https://github.com/KabitaYesmin3063/event-management-system/)

  
  
<h2>🌟 Features</h2>

Here're some of the project's best features:

*   Create Events: Easily add new events with essential details such as title date description and location.
*   Edit Events: Modify existing event details including title date and associated data.
*   View Events: Display a list of all active and past events for easy management.
*   Event Registrations: Manage participants and their details for each event.
*   Reports and Export: Generate CSV reports for events and participants.

<h2>🛠️ Installation Steps:</h2>

<p>1. Step 1: Clone the Repository.Run the following command in your terminal to clone the repository:</p>

```
git clone https://github.com/your-repo-name.git  
```

<p>2. Step 2: Set Up the Database Create a new database in your local or remote server. Import the event_management.sql file (if provided) into your database using a tool like phpMyAdmin or the MySQL command line:</p>

```
mysql -u username -p database_name < event_management.sql
```

<p>3. Step 3: Configure the Database Connection Locate the database configuration file (e.g. config.php or at the start of key PHP files). Update it with your database credentials:</p>

```
connect_error) {     die('Connection failed: ' . $conn->connect_error); } ?>
```

<p>4. Step 4: Verify Directory Permissions Ensure the necessary directories (e.g. for file uploads or logs) have write permissions:</p>

```
chmod -R 775 /path/to/your/project/uploads
```

<p>5. Step 5: Start the Server If you're using a local development server start it using:</p>

```
php -S localhost:8000
```

<p>6. Step 6: Test the Application Access the admin dashboard by logging in with default credentials (if provided). Create edit and manage events to ensure everything works as expected.</p>

```
Admin Credentials Username: admin1 Password: admin1 Email: admin1@gmail.com 
```

```
User Credentials Username: user1 Password: user1 Email: user1@gmail.com
```

  
  
<h2>💻 Built with</h2>

Technologies used in the project:

*   PHP
*   CSS
*   JS
*   AJax
*   Boostrap
*   Mysql