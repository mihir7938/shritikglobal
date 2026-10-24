<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
    <h4>New Contact Submission:</h4>
    <p>
        <strong>First Name: </strong> {{ $result['first_name'] }}<br>
        <strong>Last Name: </strong> {{ $result['last_name'] }}<br>
        <strong>Mobile Number: </strong> {{ $result['phone'] }}<br>
        <strong>Email: </strong> {{ $result['email'] }}<br>
        <strong>Subject: </strong> {{ $result['subject'] }}<br>
        <strong>Message: </strong> {{ $result['message'] }} 
    </p>
</body>
</html>

