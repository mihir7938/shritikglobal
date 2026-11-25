<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
    <h4>New Enquiry Submission:</h4>
    <p>
        <strong>Full Name: </strong> {{ $result['full_name'] }}<br>
        <strong>Mobile Number: </strong> {{ $result['mobile'] }}<br>
        <strong>Email Address: </strong> {{ $result['email'] }}<br>
        <strong>Applicant Type: </strong> {{ $result['applicant_type'] }}<br>
        <strong>Loan Category: </strong> {{ $result['loan_category'] }}<br>
        <strong>Loan Product: </strong> {{ $result['loan_product'] }}<br>
        <strong>Loan Amount: </strong> {{ $result['loan_amount'] }}<br>
        <strong>City and State: </strong> {{ $result['city_state'] }}<br>
        <strong>Brief Requirement: </strong> {{ $result['requirement'] }}
    </p>
</body>
</html>

