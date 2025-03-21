# cityservice
 The City Service Management System is a web application designed to provide seamless management and access to city-based services for residents. It allows users to request services, report issues, and track service requests. The platform also provides an admin panel for city officials to manage services, monitor requests, and respond efficiently.

## Features:
🧑‍💻 User Management: Secure login and registration for users and administrators.
🛠 Service Request: Users can request various city services (e.g., garbage collection, road repair, electricity issues).
📢 Issue Reporting: Report city-related problems with photo uploads and descriptions.
📊 Status Tracking: Track the status of submitted service requests.
🔔 Notifications: Receive real-time updates on request progress.
🧑‍✈️ Admin Panel: Manage services, monitor reports, and respond to requests.
📅 Service Scheduling: Efficient scheduling and assignment of tasks.

## Tech Stack:
- Frontend: HTML, CSS, JavaScript
- Backend: PHP
- Database: MySQL
- Server: Apache



# Database :- 
### Table 1 :- User
    - id
    - username
    - email
    - mobile
    - password
    - role
    - registration_time

### Table 2 :- Admin
    - id
    - username
    - email
    - password

### Table 3 :- Contact 
    - id
    - username
    - email
    - mobile
    - subject
    - message
    - contact_time

### Table 4 :- Inquiry
    - id
    - username
    - service_provider_name
    - service_provider_service
    - service_provider_mobile
    - inquiry_time

### Table 5 :- MemberService
    - id
    - username
    - service
    - status
    - mobile