----- HOW TO RUN -----
1. Copy all files to htdocs
2. Make sure to enable your php server (like xampp / lamp / etc)
3. Open localhost:8080 on your browser



----- LOGIN / REGISTER PROJECT SPECIFICATIONS -----
<!-- Create a database with a table for the user data. -->
- Pay attention to the use of a primary key (ID)
- Make sure to use valid data types and lengths.
- Optionally use the possibility to declare columns as unique.
- Converted two templates for a registration and login form into valid HTML.

<!-- Registration -->
- After a successful validation, save the user input in this database table.
- Save the hashed password in the database.
- After successful registration, the user should be redirected to the login page.
- Create at least the following types of input fields:
- Text input (username)
- Email input (email address)
- Password input (password)
- Password input (password repetition)

<!-- Log in -->
- Save the user ID and the time of login after a successful login in the session.
- After a successful login, the user should be redirected to a page that outputs the session (var_dump)
- Create at least the following types of input fields:
- Text input (username)
- Password input (password)

<!-- Validate all user input server side. Adhere to the following guidelines -->
// username
- Must contain at least 4 characters
- Can contain a maximum of 16 characters
- Must not contain spaces
- Must not exist yet
// e-mail
- Must contain a valid email
- Must not exist yet
// password
- Must contain at least 8 characters
- Must contain at least one lowercase letter
- Must contain at least one capital letter
- Must contain at least one number
- Must contain at least one special character
- Must not contain spaces
- Must match the repetition of the password

- In the event of incorrect input, output all error messages for the respective input field.
- Output a success message to the form if the input is correct.
- Make sure that the user has the possibility to manipulate the values of the attributes in HTML.
- Make sure that the user has the possibility to use cross-site scripting and SQL injections and prevent this by using the database connection correctly, as well as validating and cleaning values.



-- FILE UPLOAD PROJECT SPECIFICATIONS --
1. Convert the form with the following input fields into valid HTML:
    - File input (image/*) (file selection)
    - Text input (alternate text)

2. Establish a database with a table to store images, having the following columns:
    - ID
    - Path (file path)
    - Alt (alternate text)

3. Develop a class for file uploads, which includes the following tasks:
    - Alternative text validation
    - File type validation
    - File size validation
    - Generate a date-coded path (e.g., 31/12/2022)
    - Rename files to avoid duplicates (overwriting)
    - Upload files to the date-coded path

4. Build a database connection using PDO.

5. Store relative file paths and alternate text as new entries in the database table.

6. If the upload is successful, output a JSON string containing all information about the new database entry:
    - Include the content type as Application/JSON in the response header.
    - Return HTTP status code 201.

7. If the upload fails, output a JSON string with error messages related to the file upload:
    - Include the content type as Application/JSON in the response header.
    - Return HTTP status code 422.