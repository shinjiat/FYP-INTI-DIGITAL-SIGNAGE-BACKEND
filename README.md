# Final Year Project (INTI Digital Signage Mobile Application for INTI International College @ Subang Jaya)
This is my Final Year Project that I have completed in July of 2017. 
The app is a native app to both Android and iOS platforms and is designed for our college, INTI International College Subang.

The hightlights for me in this project are...

## `Contents`
* [Solo][To create login API for users and guests on Android.](#login-api)
* [Solo][To create a backend push notification API.](#push-notification-api) 
* [Solo][To implement an app to interact with Estimote beacons.](#estimote-beacons) 
* [To assist another member on backend map editor.](#map-editor)


## `Login API`
This is a login screen created for my Final Year Project(Android App) that interacts with online database.
This login screen provide user login (require student login credentials) and guest login (generate session token).

#### Permissions
    <uses-permission android:name="android.permission.INTERNET"/>
    <uses-permission android:name="android.permission.READ_PHONE_STATE"/>
*INTERNET        : To talk to API which then returns 0 or 1 based on the parameters(Username and Password) passed to API
READ_PHONE_STATE : To generate UUID based on IMEI which is then insert to online database in order to grant access to Guests*    
    
#### User Login
Login with student ID and password, which shares the same login credentials with the campus website.(to be done by INTI, as for now we are logging in from online database). The app will student ID and password to API, the API then compare the parameters with the database and return 0 or 1 based on result.

#### Guest Login
Provide access to non INTI students (app will generate a token and insert to database in order to grant access to guests)

#### Screenshot
![image](https://github.com/shinjiat/Android-Login/blob/master/AndroidLogin/ScreenShot_20170829203644.png)

There are only 2 PHP files created [here](https://github.com/shinjiat/INTI-DIGITAL-SIGNAGE/tree/master/source%20codes/login) for this API, [insert.php](https://github.com/shinjiat/INTI-DIGITAL-SIGNAGE/blob/master/source%20codes/login/insert.php) inserts tokens to grant access to Guests and [login.php](https://github.com/shinjiat/INTI-DIGITAL-SIGNAGE/blob/master/source%20codes/login/login.php) to compare user's parameters to the database to return either 0 or 1.

[Back to top](#contents)
****************************************************************************************************************************************
****************************************************************************************************************************************
****************************************************************************************************************************************
## `Push Notification API`
This API was an extra feature that I implemented for our clients.
For this to work, when a student open this APP within INTI College, if one of the beacons in the College detected the student's phone, the APP will register a unique token and insert the token into database via [insert.php](https://github.com/shinjiat/INTI-DIGITAL-SIGNAGE/blob/master/source%20codes/notification/insert.php).

However, the token will change if the user reinstall the APP. So to reduce the number of "orphan" tokens, I insert the token together with the device's UUID, in such a way that if the device's UUID already exists in the database, then update the token. Else, insert a new token.

To not annoy the student too much, the token is deleted when the APP is closed via [delete.php](https://github.com/shinjiat/INTI-DIGITAL-SIGNAGE/blob/master/source%20codes/notification/delete.php).

So this basically means that the push notifications will only work, only when students or guests are within the College area.

#### Screenshot
![image](https://github.com/shinjiat/INTI-DIGITAL-SIGNAGE/blob/master/screenshots/ScreenShot_20171027041955.png?raw=true)

[Back to top](#contents)
****************************************************************************************************************************************
## `Estimote beacons`

## `Map Editor`
