<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>

<body>
<h2>Welcome to the NextHour <?php echo e($user['name']); ?></h2>
<br>

<p>Your registered email with us is: </p><?php echo e($user['email']); ?>


<h4>Enjoy !</h4>
<p>Regards</p>
<p><?php echo e(config('app.name')); ?></p>
</body>

</html>
