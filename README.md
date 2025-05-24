# Technical-Screening---Software-Engineering

## 🛠 Setup

1. Create MySQL database `lamp_scoreboard`.
2. Import `sql/schema.sql`.
3. Configure `includes/db.php` for your DB credentials.
4. Place in your Apache root (e.g., `htdocs/`).
5. Access via `http://localhost/Technical-Screening---Software-Engineering/public/scoreboard.php
`.

## ✅ Features

- Add judges
- Assign scores to users
- Live scoreboard (auto-refresh)

## 📐 Design Choices

- Simple 3-table schema
- Unique constraint prevents duplicate scoring
- Separated interfaces for clarity
- Modular CSS

## 🚀 Future Ideas

- Add authentication
- Score by rounds
- Export results
