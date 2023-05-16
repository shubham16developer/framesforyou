<html lang="en">
<head>

    <title>Login Details</title>

</head>

<body>
      <h2>{{$userdata->role}} Login Details</h2>
      <h2>Hi {{$userdata->first_name}}  {{$userdata->last_name}}, Here is your login Details</h2>
      <h4>Email :  {{$userdata->email}}</h4>
      <h4>Password :  {{decrypt($userdata->password)}}</h4>

</body>

</html>
