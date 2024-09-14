# Cosmetics Backend 💄
This project provides a REST API to manage a cosmetics store backend. It includes functionality for:

**User registration:** Register new users in the application.
**User login with token authentication and middleware:** Ensure secure access using tokens and Laravel middleware.
**User role management with middleware**: Restrict access to specific functionalities based on user roles.
**CRUD operations for different models:** Create, read, update, and delete resources related to various data models, such as products and orders.

<div style="text-align: center;">
  <iframe src="https://giphy.com/embed/nmbk2prARJTrGAd1qT" width="480" height="480" style="" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
  <p><a href="https://giphy.com/gifs/BBareCosmetics-bbare-tara-maynard-x-nmbk2prARJTrGAd1qT">via GIPHY</a></p>
</div>


## ⚙️ Stack
Technologies used:

<div align="center"> <a> <img src= "https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="php" /> </a> <a> <img src= "https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="laravel" /> </a> <a> <img src= "https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=Composer&logoColor=white" alt="composer" /> </a> <a> <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL" /> </a> <a> <img src="https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white" alt="docker" /> </a> </div>

## 🗄️ Database Schema
**Users to Orders:** One-to-many relationship, where one user can have many orders.
**Products to Orders:** One-to-many relationship, where one product can be part of many orders.

<div style="text-align: center;">
  [![Captura-de-pantalla-2024-09-14-a-la-s-13-50-02.png](https://i.postimg.cc/7PQL3vCs/Captura-de-pantalla-2024-09-14-a-la-s-13-50-02.png)](https://postimg.cc/K4BFbHDB)
</div>


## 🌐 Endpoints 

### 🔒 Authentication

| Method | URI       | Action         | Auth                | Body                                                                                   |
|--------|-----------|----------------|---------------------|----------------------------------------------------------------------------------------|
| POST   | /register  | Register user  | N/A (public)        | `{ "name": "userName", "last_name": "userLastName", "email": "userEmail", "password": "userPassword" }` |
| POST   | /login     | Login user     | N/A (public)        | `{ "email": "userEmail", "password": "userPassword" }`                                |
| POST   | /logout    | Logout user    | Token (user)        | N/A                                                                                    |

### 👤 Users

| Method | URI           | Action              | Auth      | Body                                                                                   |
|--------|---------------|---------------------|-----------|----------------------------------------------------------------------------------------|
| GET    | /users        | View all users      | Token (user) | N/A                                                                                    |
| GET    | /users/{id}   | View user by ID     | Token (user) | N/A                                                                                    |
| PUT    | /users/{id}   | Update user by ID   | Token (user) | `{ "name": "newName", "last_name": "newLastName", "email": "newEmail" }`            |
| DELETE | /users/{id}   | Delete user by ID   | Token (user) | N/A                                                                                    |
| GET    | /admin        | Welcome message     | Token (admin) | N/A                                                                                    |
| GET    | /user/profile | View user profile   | Token (user) | N/A                                                                                    |

### 🛒 Products

| Method | URI            | Action              | Auth        | Body                                                                                   |
|--------|----------------|---------------------|-------------|----------------------------------------------------------------------------------------|
| GET    | /products      | View all products   | N/A (public) | N/A                                                                                    |
| POST   | /products      | Create product      | Token (admin) | `{ "product_name": "productName", "description": "productDescription" }`             |
| GET    | /products/{id} | View product by ID  | N/A (public) | N/A                                                                                    |
| PUT    | /products/{id} | Update product by ID | Token (admin) | `{ "product_name": "newProductName", "description": "newProductDescription" }`       |
| DELETE | /products/{id} | Delete product by ID | Token (admin) | N/A                                                                                    |

### 🛍️ Orders

| Method | URI          | Action             | Auth      | Body                                                |
|--------|--------------|--------------------|-----------|-----------------------------------------------------|
| GET    | /orders      | View all orders    | Token (admin) | N/A                                                 |
| POST   | /orders      | Create order       | Token (user) | `{ "order_details": "orderDetails" }`             |
| GET    | /orders/{id} | View order by ID   | Token (user) | N/A                                                 |
| PUT    | /orders/{id} | Update order by ID | Token (user) | `{ "order_details": "newOrderDetails" }`          |
| DELETE | /orders/{id} | Delete order by ID | Token (user) | N/A                                                 |


## Local Installation🧾
Install Docker and create a MySQL container.
Clone the repository.
Run $ composer install.
Connect the repository to the database.
Run $ php artisan migrate.
Run $ php artisan db:seed.
Start the server with $ php artisan serve.


## Development💻
```const developers = ["Yoana", "Morena"];

console.log("Developed by: " + developers.join(" and "));
```

