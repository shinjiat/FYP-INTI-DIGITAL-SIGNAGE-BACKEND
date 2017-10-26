# Final Year Project (INTI Digital Signage Mobile Application for INTI International College @ Subang Jaya)
This is my Final Year Project that I have completed in July of 2017. 
The app is a native app to both Android and iOS platforms and is designed for our college, INTI International College Subang.

The hightlights for me in this project are...

## `Tasks`
* [To create login API for users and guests on Android.](#login-api)
* [To create a backend push notification API.](#push-notification-api)
* [To implement an app to interact with Estimote beacons.](#estimote-beacons)
* [To assist another member on backend map editor.](#map-editor)


## `Login API`
[Or here](https://github.com/shinjiat/Android-Login)

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

[Back to top](#tasks)

## `Push Notification API`

## `Estimote beacons`

## `Map Editor`
