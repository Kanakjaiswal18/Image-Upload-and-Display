# Image Upload and Display Website
This is a website for uploading images to a server, storing their details in a MySQL database and providing options to view and delete the uploaded images. 
Additionally, the website displays a table when upload is clicked, which containing the details of all the uploaded images.

## Prerequisites
- PHP (version 7.0 or higher)
- MySQL (version 5.6 or higher)
- PhpXlsxGenerator Library
- Create a "images" folder in the project directory to store uploaded images

## MySQL Database
- Create a database named 'check':
  ```
  create a database named check
  ```
- Create the images table within the check database:
  ```
  CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `size` int(11) NOT NULL,
  PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
  ```

## File Structure
1. index.php
  This file contains the main HTML form for uploading images and PHP code for handling the file upload, storing image details in the database, and displaying the uploaded images in a table.

2. delete.php
  This file handles the deletion of images from the server and the database.

3. connect.php
  This file establishes a connection to the MySQL database.

4. PhpXlsxGenerator.php
  This file is used to generate Excel files from the data stored in the database.
