# 📘 Task Management System

This repository contains the code for a **Task Management System** used to manage tasks within an organization or industry environment.  
It supports role-based access (Admin and Employee) and user management.

---

# 🚀 Getting Started

## 📂 1. Setup Project Folder
Place the project inside:

C:\xampp\htdocs\

---

## 🗄️ 2. Database Setup
- Import `DB.sql` into phpMyAdmin  
- Make sure your database connection matches your local MySQL setup  

---

## 🔌 3. Test Database Connection

There is a file called:

test.php

- Open it and update your MySQL password if needed  
- Example:
  - Username: root  
  - Password: (your own password)  

Run in browser:

http://localhost/task_management_system/test.php

✔ You should see: **Connection successful**

---

# 🔐 Authentication System

- Users must have a role:
  - admin
  - employee

- Role-based access:
  - Admin → can add/manage users  
  - Employee → limited access  

---

# ⚠️ Important Note

❗ There is NO public registration page

👉 Only an Admin can create users

---

# 👤 Creating an Admin User (First Login)

Since there is no registration page, you must create an admin manually.

---

## 🔑 Step 1: Generate Password Hash

Open:

hash.php

Run it in your browser and copy the generated hash.

---

## 🧾 Step 2: Insert Admin User

Run this SQL in phpMyAdmin:

INSERT INTO users (full_name, username, password, role)
VALUES (
    'Faith User',
    'faith',
    'PASTE_HASH_HERE',
    'admin'
);

👉 Replace `PASTE_HASH_HERE` with the hash from `hash.php`

---

## 🔓 Step 3: Login

Use:

- Username: faith  
- Password: the one used to generate the hash  

---

# 🔄 Git Workflow

Before starting:

git pull origin main

---

## 🧼 Keep a Clean Working Directory

git add .  
git commit -m "your message"

---

## 🚀 Push Changes

git push origin -u main

---

## 🔀 Pull from Kamta Branch

git pull origin kamta

Resolve any conflicts carefully.

---

# 📁 Project Structure

task_management_system/
│
├── app/        # Backend logic (DB, auth)
├── inc/        # Shared UI (header, nav)
├── index.php   # Dashboard
├── login.php   # Login page
├── add-user.php # Admin add user page
├── style.css   # Styling

---

# ⚠️ Reminders

- Only Admin can add users  
- No public signup  
- Always hash passwords  
- Ensure DB credentials are correct  

---

# ✅ Final Note

Test everything before pushing changes.  
Check:
- Database connection  
- File paths  
- Session handling  

---

# 💪 Good Luck!