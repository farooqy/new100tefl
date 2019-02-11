<!DOCTYPE html>
<html>
<head>
	<title>New Feedback</title>
</head>
<body>
	<div class="row">
		<h1>A new feedback has been recieved</h1>
		<p>From: {{$feedbackRequest->firstname.' '.$feedbackRequest->lastname}}</p>
		<p>Email: {{$feedbackRequest->email}}</p>
		<p>Concerning: {{$feedbackRequest->messageConcern}}</p>
		<p>Message: {{$feedbackRequest->message}}</p>
	</div>
</body>
</html>
	