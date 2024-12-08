<?php 
ob_start();
session_start();
include('inc/header.php');
$loginError = '';
if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
	include 'Inventory.php';
	$inventory = new Inventory();
	$login = $inventory->login($_POST['email'], $_POST['pwd']); 
	if(!empty($login)) {
		$_SESSION['userid'] = $login[0]['userid'];
		$_SESSION['name'] = $login[0]['name'];			
		header("Location:index.php");
	} else {
		$loginError = "Invalid email or password!";
	}
}

?>

<style>
html,
body,
body>.container {
    height: 95%;
    width: 100%;
}
body>.container {
	display:flex;
	flex-direction:column;
	align-items:center;
	justify-content:center;
}
#title{
	text-shadow:2px 2px 5px #000;
} 
</style>
<?php include('inc/container.php');?>

<h1 class="text-center my-4 py-3 text-light" id="title">Inventory Management System - PHP</h1>	

<div class="d-flex justify-content-center align-items-center w-100" style="height: 80vh;">
    <div class="d-flex w-100" style="max-width: 1200px;">
        <!-- Left Image Section -->
        <div class="d-flex align-items-center justify-content-center w-50">
            <img  src="svgs/checking-boxes-animate.svg" alt="Inventory Image" class="img-fluid" style="max-height: 100%; width: 65%; object-fit: cover;">
        </div>

        <!-- Right Form Section -->
        <div class="col-lg-6 col-md-7 col-sm-10 col-xs-12 w-50">
            <div class="card rounded-0 shadow">
                <div class="card-header">
                    <div class="card-title h3 text-center mb-0 fw-bold">Register</div>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <form method="POST" action="register.php">
                            
                            <div class="mb-3">
                                <label for="email" class="control-label">Email</label>
                                <input name="email" id="email" type="email" class="form-control rounded-0" placeholder="Email address" autofocus value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="control-label">Password</label>
                                <input type="password" class="form-control rounded-0" id="password" name="pwd" placeholder="Password" required>
                            </div>  

                             <div class="mb-3">
                                <label for="email" class="control-label">Name:</label>
                                <input name="name" id="name" type="text" class="form-control rounded-0" placeholder="Name" autofocus value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
                            </div>

                             <div class="mb-3">
                                <label for="userRole" class="form-label">User Role</label>
                                <select class="form-select" id="userRole" name="userRole" required>
                                    <option value="" disabled selected>Select a role</option>
                                    <option value="admin">Admin</option>
                                    <option value="member">Member</option>
                                </select>
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="registerEmail" class="btn btn-primary rounded-0">Sign - Up</button>
                            </div>

							<div class="mt-2">
								<a href="login.php">Already Have An Account</a>
							</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>	
    </div>
</div>

<?php include('inc/footer.php');?>