  

# Local Business Marketing Application Documentation ( 3 hours Project )

## Introduction

The Local Business Marketing Application is a web-based platform designed to support local businesses in marketing their products or services. The application facilitates the connection between businesses and customers, aiming to build strong local business relationships and promote the sale of goods or services.

## Table of Contents

1. Getting Started

- Prerequisites

- Installation

2. Features

- Search and Filter

- Image Upload

- Category Selection

- Description Input

- Preview Functionality

3. Database Connection

4. Usage

- Search Bar

- Card Display

- Image Preview

- Submission Form

5. File Structure

## 1. Getting Started

### Prerequisites

- Web server with PHP support

- MySQL database server

- Bootstrap v5.3.2 library

### Installation

1. Clone the repository to your local machine.

```bash

git clone https://github.com/Makufff/BASICWEB101.git

```

2. Configure your database connection settings in index.php.

```php

// Database Connection Configuration

$Srv_name = "localhost";

$user = "root";

$pwd = "";

$name = "test";

```

3. Upload the application to your web server.

## 2. Features

  

### Search and Filter

The application allows users to search for local businesses based on categories. Users can enter keywords in the search bar and filter results accordingly.

### Image Upload

Local businesses can upload images of their products or services through the submission form.

### Category Selection

Users can select a specific category for their business when submitting information through the form.

### Description Input

A description field is provided for businesses to input additional information about their products or services.

### Preview Functionality

The application includes a preview feature that displays the uploaded image before submission.

  

## 3. Database Connection

  

The application connects to a MySQL database to store and retrieve business information. The database schema includes fields for image paths, categories, and descriptions.

1.  Open your MySQL database management tool (such as phpMyAdmin or MySQL Workbench).
2.  Locate the `web_db` table.
3.  Modify the table structure to include the new columns:
```sql 
ALTER TABLE web_db
ADD COLUMN imgs VARCHAR(255) NOT NULL,
ADD COLUMN categorys VARCHAR(50) NOT NULL,
ADD COLUMN discriptions TEXT NOT NULL;
```
  

## 4. Usage

  

### Search Bar

Use the search bar to enter keywords and filter local businesses based on categories.

### Card Display

View businesses in card format, including images, categories, and descriptions.

### Image Preview

Preview the uploaded image on the submission form before finalizing the submission.

### Submission Form

Businesses can use the submission form to upload images, select categories, and provide descriptions.

## 5. File Structure

  

```index.php```: Main application file with HTML and PHP code.

```upload.php``` : Handles image upload and data submission to the database.

```img/``` : Directory to store uploaded images.