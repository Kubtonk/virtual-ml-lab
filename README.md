# Virtual Labs
## Description
> * Virtual Labs provides students with a cloud computing environment where each and every student can be able to use the resources efficiently.<br/>
> * In a college laboratory the main actions to be performed are looking up the schedule, executing the scheduled programs and then the evaluation process. <br/>
> * It gives a platform where students cannot go for different place to learn the code and for their implementations.<br/>
> * It provides a digital platform for colleges to communicate between students and faculty.<br/>
## Development
Virtual Labs are implemented by following three module design. They are:
> Admin Module<br/>
> Faculty Module<br/>
> Student Module<br/>

Each module are independent of each other but shares common data between them(MySQL DB).
### Admin Module
> * Student Details Upload
> * Faculty Details Upload
> * Lab Details Upload
> * Faculty Lab Assign	
> * Creating Course in Google Course Builder
     
<img align="left" width="400" height="300" src="sample/admin-home-page.jpg"><img align="center" width="400" height="300" src="sample/admin-course-builder.jpg">

<div style="text-align:center">Admin Home Page&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Google Course Builder Home Page</div>

### Faculty Module
> * Lab Schedules Update
> * Lab Manuals Upload
> * Daily Task Upload
> * Group Messages to be sent	
> * Manage Course in Google Course Builder

<img align="left" width="400" height="300" src="sample/faculty-home-page.jpg"><img align="center" width="400" height="300" src="sample/admin-course-builder.jpg">

<div style="text-align:center">Faculty Home Page&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Google Course Builder Home Page</div>
  
### Student Module
> * Lab Manuals Download
> * Lab Schedule
> * ChatBox for every class
> * Cloud Storage	
> * Programming Environment
> * Learning Courses in Google Course Builder

<img align="left" width="400" height="300" src="sample/student-home-page.jpg"><img align="center" width="400" height="300" src="sample/student-chat-box.png">

<div style="text-align:center">Student Home Page&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student Chat Box for Each Class</div>
<br/><br/>
<img align="left" width="400" height="300" src="sample/student-cloud-storage.jpg"><img align="center" width="400" height="300" src="sample/student-programming-environment.jpg">

<div style="text-align:center">Student Cloud Storage&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student Programming Environment</div>

## Installation
> 1. Install XAMPP Server. 
> 2. Clone this Repo into htdocs folder in XAMPP application.
> 3. Start the XAMPP Server and open http://localhost/dashboard in browser.
> 4. Click on phpmyadmin , it takes to mysql server page.
> 5. Create virtuallabs database and import the virtuallabs.sql file into database
> 6. Setup is completed, Now open http://localhost/virtual-labs in browser
> 7. Enter usernames and passwords that were mentioned in datatables

## References
> * https://judge0.com => Thanks for the programming environment API
