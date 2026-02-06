# Laravel E-Commerce Task

This project is developed using **Laravel 10**.  
The goal was to build a simple e-commerce backend with product management, cart functionality, and REST APIs as per the given requirements.

---

## Tech Used

- PHP 8+
- Laravel 10
- MySQL 8+
- Bootstrap 5
- REST APIs

---

## What is Implemented

### Phase 1

- Relational database design
- Product management with multiple images
- Product CRUD (add, edit, delete, list)
- Upload and display multiple images per product
- API to fetch products with their images
- CMS UI for product management
- User-side product listing and product detail page

### Phase 2

- Cart functionality using APIs
- Add product to cart using POST API
- User ID is hardcoded to `1` as mentioned in the task
- Cart items are visible in the admin panel
- User cart page showing product image, price and quantity

---

## Database Design

### Tables Used

- products  
- product_images  
- carts  
- cart_items  

### Additional Tables

- orders  
- order_items  

**Note:**  
Orders and order_items tables are created for future checkout flow.  
They are not used in this task as checkout was not part of the requirement.

---

## API Endpoints

### Products

- **GET** `/api/products`  
  Returns all products with multiple images

---

### Cart (User ID = 1)

- **POST** `/api/cart/add`  
  Add product to cart

- **GET** `/api/cart`  
  Get cart items

---

## CMS Pages
for admin side:
- `/manage-products` – Product listing and management  
- `/admin/cart` – View cart items added by user  


## User Pages
for user side:
- `/shop-products` – Product listing  
- `/product/{id}/{slug}` – Product details page  
- `/cart` – User cart page  


## How to Run the Project

### 1. Clone Repository
```bash
git clone https://github.com/manasi-2025/E-Commerce-2026/tree/master
cd project-folder
command for image access :- php artisan storage:link
run command :- php artisan serve

Note: storage images are not accessible on git directly ,so added images in public folder to access
