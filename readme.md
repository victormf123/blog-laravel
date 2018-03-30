# Admission Test Documentation

This Admission Test was designed to evaluate how well you know the technologies and concepts we use in our daily 
activities at DevSquad. You will be required to develop a **Task Board Management Application** following the 
instructions given in the following sections.

## Product Vision

The **Task Board Management Application** will allow users to define their own **Task Life Cycle** (adding or removing 
lanes to the Task Board) and use it to manage their tasks using Drag & Drop capabilities.

The application is a simplified version of tools like:  

 * [Trello](https://trello.com/)

## Technology Stack

 * [Laravel 5.6](https://laravel.com/)
 * [Vue.js 2.x](https://vuejs.org/)
 * [Pusher](https://pusher.com/)

**Note 1**: 
````
Use the "Laravel Way" to implement the features of the application. Remember that we are interested in 
knowing how much you know about the framework and its features.
````

**Note 2**: 
````
Apply as many best practices as you can think of. They will be important to determining your level of 
expertise.
````
 
## Requirements
 
 The application is composed of 5 pages where 4 of them can be easily created using Laravel scaffolding system.
   
 1. Registration Page
 1. Login Page
 1. Reset Password Page
 1. Recover Password Page
 1. Task Board Page
 
 Instead of fully detailed requirements, we are sending you 8 User Stories. They are simplified in such a way that you will 
 not need further clarification on how to implement them. The **Acceptance Criteria** will be used as guidelines when 
 reviewing your delivery.
 
 #### [1] Registration
 
 As a **Visitor**,
 I want to **register providing my email and a password**
 So that **I can become a user of the system**
 
 ##### Acceptance Criteria
 1. - [ ]  The email must be unique.
 1. - [ ]  The email must be verified.
 1. - [ ]  The password must be confirmed.
 1. - [ ]  There must be a link to the **Login Page**.
 1. - [ ]  After registration the user will be redirected to the **Task Board Page**.
 ----
 
 #### [2] Login
 As a **User**,
 I want to **login using my email and password**
 So that **I can access the restricted area of the system**
 
 ##### Acceptance Criteria
 1. - [ ]  After authentication, the user must be sent to the **Task Board Page**.
 1. - [ ]  There must be a link to the *Recover Password Page**.
 1. - [ ]  There must be a link to the **Registration Page**.
 ----
 
 #### [3] Recover Password
 As a **User**,
 I want to **be able to recover my password**
 So that **when I forget it, I can create a new one.**
 
 ##### Acceptance Criteria
 1. - [ ]  The form should ask only for the email.
 1. - [ ]  The email must be sent with a link to the **Reset Password Page**.
 ----
 
 #### [4] Reset Password
 As a **User**,
 I want to **be able to reset my password**
 So that **a new password is created for my account.**
 
 ##### Acceptance Criteria
 1. - [ ]  The email must match the same email used in the **Recover Password Page**.
 1. - [ ]  The password must be confirmed.
 1. - [ ]  After resetting the password, the user should be sent to the **Task Board Page**.
 ----
 
 #### [5] Task Board
 
 As a **User**,
 I want to **Have a Task Board**
 So that **I can easily create and manage tasks**
 
 ##### Acceptance Criteria
 1. - [ ] While the email is not verified, a message will be displayed informing the user on how to verify the email.
 1. - [ ] The default board will have three lanes: To Do, In Progress, Done.
 1. - [ ] The Task Board will contain all tasks from all users.
 1. - [ ] The user will be able to drag and drop tasks from one lane to another.
 1. - [ ] The Task Board must be synchronized among all the users in the system in **real time** without having to refresh the page.
 ----
 
 #### [6] Task Management
 
 As a **User**,
 I want to **create new tasks and modify or remove existing tasks**
 So that **I can manage them using the Task Board**
 
 ##### Acceptance Criteria
 1. - [ ]  When creating a task, the **name** must be required.
 1. - [ ]  New tasks will be added to the first lane to the left of the **Task Board**.
 1. - [ ]  When modifying a task, the **name** will still be required.
 1. - [ ]  Ask the user for a confirmation when removing a task.
 ----
 
 #### [7] Lane Management
 
 As a **User**,
 I want to **create new lanes and remove or modify existing lanes**
 So that **the life cycle of the tasks can be modified**
 
 ##### Acceptance Criteria
 1. - [ ]  When creating a new lane, the **name** of the lane will be required.
 1. - [ ]  When modifying an existing lane, only the **name** will still be required.
 1. - [ ]  The **Task Board** must have at least 1 lane.
 1. - [ ]  New lanes will be added to the right side of the **Task Board**.
 1. - [ ]  The tasks of a removed lane will be sent to the first lane to the left.
 1. - [ ]  Ask the user for a confirmation when removing a task.
 ----
 
 #### [8] Task Assignment
 
 As a **User**,
 I want to **to assign tasks to me or any other user**
 So that **they can see the tasks assigned to them**
 
 ##### Acceptance Criteria
 1. - [ ]  A task can have only one user assigned to it.
 1. - [ ]  There must be a way to remove the assignee from a task.
 
## Deployment

These are the steps we are going to take to deploy your application:

````
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan storage:link
php artisan migrate --seed
npm run dev
````
