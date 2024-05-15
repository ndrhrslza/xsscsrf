# Class Asignment: XSS and CSRF
**Prepared by Nadirah binti Ros Liza 2027832**

This assignment required web application to comply with same origin policy by implement Content Security Policy(CSP). Plus, need to include XSS defense and better CSRF defenses.

<h3>File Description</h3>
<h4>1. index.html</h4>
<p>This file allows user to login by entering their valid email address and password. If the user has previously registered, they will be sent to the details.php page. If the user has not registered, they will be forwarded to register.html to create a new account.</p>

<h4>2. login.php</h4>
<p>This PHP file script starts a session and includes a database connection file. It determines whether an email and password are given via a POST request. If that's the case, it pulls the user's information from the database using the email address. If a user is located, the password is validated. If successful, it creates session variables for the user ID, email, and password before redirecting to details.php . If authentication fails or no credentials are given, it shows an error message and returns to the login page.
</p>

<h4>3. register.html</h4>
<p>This file allows user to register as new account by entering email, password and confirm password again. If register successful, it will prompt user to login.</p>

<h4>4. register.php</h4>
<p>This PHP script initializes a session and contains a database connection file. If a POST request is received, it gets email and password information, hashes the password, and adds the user to the database. If successful, it displays a registration success message along with a login link; otherwise, it displays a failure message.
</p>

<h4>5. db.php</h4>
<p>This file contains PHP script for database configuration details.</p>

<h4>6. form.html</h4>
<p>This file requested users to enter their information (name, matric number, address, email and phone number). Each input field contains a pattern attribute for basic client-side validation. When submitted, the form will send the data to form.php for validation and processing.
</p>

<h4>7. form.php</h4>
<p>This PHP file accepts the form data sent from form.html via a POST request. It follows server-side validation with preg_match() to guarantee that the provided data fits particular requirements. If any validation fails, it keeps user-friendly error messages in an array. After processing, the sanitized data is displayed in a table, or if there are validation issues, they are displayed alongside the input fields, with a button to return and fix the form.
</p>

<h4>8. form.js</h4>
<p>This file enhances a form's input validation and fetches student data for display. When the document is fully loaded, it adds event listeners to input and textarea elements to validate user input against specified patterns. If the input doesn't match the pattern, an error class is added, and an error message is displayed. Additionally, it fetches student details based on a query parameter from the URL, processes the JSON response, and dynamically populates an HTML element with the fetched data, displaying student information in a structured format. The script also handles a back button click event, redirecting the user to the index page.</p>

<h4>9. details.html</h4>
<p>This file will display detailed information about a student. The page consists of a central container that dynamically populates student details retrieved via JavaScript. Each detail is displayed in a table format. The associated `form.js` script manages data fetching and form input validation to enhance the user experience.</p>

<h4>10. details.php</h4>
<p>This file will retrieves and displays detailed information about a student. It begins by checking if the user's session contains valid email and password data, redirecting to the login page if not. If the session is valid, it queries the database for student details based on the email stored in the session or an ID parameter from the URL. The retrieved data is then dynamically displayed in an HTML table within a styled container, showing fields such as name, matriculation number, and contact details. The page also includes a logout button that redirects the user to the login page when clicked.</p>

<h4>11. crudop.php</h4>
<p>This PHP file handled CRUD operations for user details record in the database. It includes functionality for DELETE and POST request methods. For DELETE requests, it deletes a student record by ID if the user is not an admin. For POST requests, it either updates an existing student record by ID or inserts a new one, provided the user is not an admin. Input validation is performed using regex patterns to ensure data integrity, and responses are returned in JSON format. The script also starts a session and checks user roles for authorization.</p>

<h4>12. csp.php</h4>
<p>This file sets a Content Security Policy (CSP) header to control resources the browser can load for the domain, allowing scripts and styles from the same origin and specific trusted sources. It restricts object embedding, permits fonts from Google Fonts, and allows images from the same origin and data URIs, enhancing security by reducing the risk of cross-site scripting (XSS) and other code injection attacks.</p>

<h4>Error Handling</h4>
<p>The form.html file employs error handling by using HTML5 input validation features, such as the pattern attribute and required attribute on form fields, to ensure that the user inputs conform to specified formats before submission. Each input field includes a corresponding span with the class form__error to display custom error messages when the input is invalid. The error messages are shown by using CSS to control their visibility, making the errors appear only if the form inputs do not match the specified patterns, thereby guiding users to correct their input errors.</p>
