# CareConnect

**A responsive doctor appointment system designed for efficient scheduling, real-time slot availability, and seamless management for patients and administrators.**

---

## Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Getting Started](#getting-started)
- [Usage](#usage)
- [Screenshots](#screenshots)
- [Contributing](#contributing)
- [License](#license)

---

## Overview

CareConnect simplifies the process of booking doctor appointments with a clean, user-friendly interface. It allows patients to search for doctors, check availability in real time, and book appointments while giving administrators control over scheduling and appointment management.

---

## Features

- Secure user registration and authentication
- Search filters for doctors by specialization, location, and availability
- Real-time appointment slot checking to prevent double bookings
- Admin panel for managing appointments and schedules
- Automated PDF receipt generation for appointments
- Fully responsive design for desktop and mobile devices

---

## Tech Stack

- **Backend:** PHP, MySQL  
- **Frontend:** HTML, CSS, JavaScript  
- **UI/UX Design:** Figma  
- **Development Environment:** XAMPP or equivalent local server  

---

## Getting Started

1. **Clone the repository:**

    ```
    git clone https://github.com/your-username/CareConnect.git
    ```

2. **Set up local server:**

   - Install and launch [XAMPP](https://www.apachefriends.org/index.html) or any preferred local server.
   - Start Apache and MySQL modules.

3. **Import the database:**

   - Using phpMyAdmin, create a new database (e.g., `careconnect_db`).
   - Import the provided SQL file (`database.sql`) into this database.

4. **Configure database connection:**

   - Edit the configuration file (e.g., `db_config.php`) to set correct database credentials.

5. **Deploy project files:**

   - Place all project files inside the server’s root directory (e.g., `htdocs` in XAMPP).

6. **Access the application:**

   - Open a web browser and navigate to `http://localhost/CareConnect`.

---

## Usage

- Register or log in to book and manage appointments.
- Use filters to find doctors and available slots.
- Confirm appointments and download PDF receipts.
- Admins can log in to manage schedules and appointment statuses.

---

## Screenshots

*Add relevant screenshots like these for authenticity:*

**User Login Page**  
![Login](/Screenshots/login_page.png)

**Dynamic Search Bar**  
![Search Bar](/Screenshots/doctorpage.png)

**Doctor's Profile**  
![Doctor's Profile](/Screenshots/doctors_profile.png)

**Appointment Booking**  
![Appointment Booking](/Screenshots/appointment_booking.png)

**Appointment Receipt**  
![Appointment Receipt](/Screenshots/receipt.png)
---

## Contributing

Pull requests and suggestions are welcome! Please open an issue first for significant changes.

---

## License

MIT

---
