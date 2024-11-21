<?php
require_once('functions.php');
guard();
if (isset($_POST['login'])) {

    $con = mysqli_connect("localhost", "root","", "dct-ccs-finals");

	if ($con == false) {
		die("ERROR: Could not connect" . mysqli_connect_error());
	}     

    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $email = stripcslashes($email);
    $password = stripcslashes($password);

    $emailError = validateEmail($email);
    $passwordError = validatePassword($password);

    $error = '';

    if (empty($emailError) && empty($passwordError)) {
        // If no validation errors, attempt authentication
        $error = authenticateUser($email, $password, $con);
    }
    else
        $email = '';  // Reset email
        $password = ''; 


        mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Login Page</title>
</head>

<body class="bg-secondary-subtle">
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="col-3">
            <!-- Server-Side Validation Messages should be placed here -->
            <?php if (!empty($emailError) || !empty($passwordError) || !empty($error)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error:</strong>
                            <ul class="mb-0">
                                <?php if (!empty($emailError)) echo "<li>$emailError</li>"; ?>
                                <?php if (!empty($passwordError)) echo "<li>$passwordError</li>"; ?>
                                <?php if (!empty($error)) echo "<li>$error</li>"; ?>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
            <div class="card">
                <div class="card-body">
                    <h1 class="h3 mb-4 fw-normal">Login</h1>

                    <form method="post" action="">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="email" name="email" placeholder="user1@example.com" value="<?php echo htmlspecialchars($email ?? ''); ?>">
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo htmlspecialchars($password ?? ''); ?>">
                            <label for="password">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>