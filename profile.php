<?php
session_start();
include 'db.php';

// Optional: hide warnings from showing on page
error_reporting(E_ALL);
ini_set('display_errors', 0);

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Default values
$first_name = "User";
$last_name = "";
$email = "";
$created_at = date("Y-m-d H:i:s");
$profile_image = "";

// Fetch user data safely
$stmt = $conn->prepare("SELECT first_name, last_name, email, created_at, profile_image FROM users WHERE id = ?");

if ($stmt) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($first_name, $last_name, $email, $created_at, $profile_image);

    if (!$stmt->fetch()) {
        $first_name = "User";
        $last_name = "";
        $email = "";
        $created_at = date("Y-m-d H:i:s");
        $profile_image = "";
    }

    $stmt->close();
}

// Safe first letter for avatar
$avatar_letter = !empty($first_name) ? strtoupper(substr($first_name, 0, 1)) : "U";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>User Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
  background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
  font-family: 'Segoe UI', sans-serif;
  color: white;
}

.profile-box {
  max-width: 500px;
  margin: 60px auto;
  padding: 30px;
  border-radius: 20px;
  background: rgba(255,255,255,0.08);
  backdrop-filter: blur(15px);
  border: 1px solid rgba(255,255,255,0.2);
  box-shadow: 0 15px 40px rgba(0,0,0,0.4);
  text-align: center;
}

h2 {
  font-weight: 700;
}

.profile-box p {
  font-size: 15px;
  margin: 10px 0;
}

.logout-btn {
  display: inline-block;
  margin-top: 15px;
  padding: 8px 20px;
  border-radius: 20px;
  background: linear-gradient(135deg,#ff4d4d,#cc0000);
  color: white;
  text-decoration: none;
  transition: 0.3s;
}

.logout-btn:hover {
  transform: scale(1.08);
  box-shadow: 0 0 12px rgba(255,0,0,0.7);
}

@media (max-width: 576px) {
  .profile-box {
    margin: 20px;
    padding: 20px;
  }

  h2 {
    font-size: 20px;
  }

  .profile-box p {
    font-size: 13px;
  }

  .logout-btn {
    width: 100%;
  }
}

@media (min-width: 992px) {
  .profile-box {
    max-width: 550px;
  }
}

form input {
  border-radius: 10px;
  border: none;
}

form input:focus {
  outline: none;
  box-shadow: 0 0 8px rgba(0,198,255,0.6);
}

.btn-success {
  border-radius: 20px;
}

.premium-input {
  background: rgba(255,255,255,0.08);
  border: 1px solid rgba(255,255,255,0.2);
  color: white;
  border-radius: 12px;
  padding: 12px;
  transition: 0.3s;
}

.premium-input:focus {
  border-color: #00c6ff;
  box-shadow: 0 0 10px rgba(0,198,255,0.8);
  background: rgba(255,255,255,0.15);
}

.toggle-eye {
  position: absolute;
  right: 15px;
  top: 10px;
  cursor: pointer;
  color: #ccc;
  font-size: 18px;
}

.premium-btn {
  border-radius: 25px;
  font-weight: bold;
  background: linear-gradient(135deg,#00c6ff,#0072ff);
  border: none;
  transition: 0.3s;
}

.premium-btn:hover {
  transform: scale(1.05);
  box-shadow: 0 0 15px rgba(0,198,255,0.7);
}

.progress-bar {
  transition: 0.4s;
}

.premium-table {
  background: rgba(255,255,255,0.05);
  border-radius: 15px;
  padding: 15px;
  backdrop-filter: blur(10px);
  box-shadow: 0 8px 25px rgba(0,0,0,0.3);
}

.premium-table table {
  margin: 0;
}

.premium-table tr {
  border-bottom: 1px solid rgba(255,255,255,0.1);
  height: 50px;
}

.premium-table tr:hover {
  background: rgba(0, 198, 255, 0.1);
  transform: scale(1.01);
}

.premium-table th {
  color: #00c6ff;
  font-weight: 600;
  text-align: left;
}

.premium-table td {
  color: #ddd;
  font-weight: 500;
  text-align: right;
}

.profile-title {
  font-weight: 700;
  color: #00c6ff;
  text-shadow: 0 0 10px rgba(0,198,255,0.7);
}

.premium-table tr:last-child {
  border-bottom: none;
}

.premium-table tr:hover td {
  color: #00ffff;
}

.profile-img-box {
  position: relative;
  text-align: center;
  margin-bottom: 30px;
}

.profile-img,
.avatar-circle {
  width: 160px;
  height: 160px;
  border-radius: 50%;
  object-fit: cover;
  margin: auto;
  display: block;
}

.avatar-circle {
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 50px;
  font-weight: bold;
  color: white;
  background: linear-gradient(135deg,#00c6ff,#0072ff);
}

.edit-icon {
  position: absolute;
  bottom: 25px;
  right: calc(50% - 80px);
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: #00c6ff;
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  box-shadow: 0 0 10px rgba(0,198,255,0.7);
  transition: 0.3s;
}

.edit-icon:hover {
  transform: scale(1.1);
}

.save-btn {
  display: none;
  margin-top: 15px;
  padding: 8px 20px;
  border-radius: 20px;
  border: none;
  background: linear-gradient(135deg,#00c6ff,#0072ff);
  color: white;
  font-weight: bold;
  transition: 0.3s;
}

.save-btn:hover {
  transform: scale(1.05);
}

.btn {
  transition: all 0.3s ease;
}

.btn-secondary:hover {
  transform: scale(1.08);
  box-shadow: 0 0 15px rgba(0,198,255,0.7);
}

.btn-secondary {
  background: linear-gradient(135deg, #00c6ff, #0072ff);
  border: none;
  border-radius: 20px;
}

.btn-danger {
  background: linear-gradient(135deg,#ff4d4d,#cc0000);
  border: none;
  border-radius: 20px;
}

.btn-danger:hover {
  box-shadow: 0 0 15px rgba(255,0,0,0.6);
  transform: scale(1.05);
}

.input-error {
  border: 2px solid red !important;
  box-shadow: 0 0 10px rgba(255,0,0,0.6);
}
</style>
</head>

<body>

<div class="profile-box">
  <div class="text-start">
    <a href="home.php" class="btn btn-secondary mb-3">⬅️ Back</a>
  </div>

  <div class="profile-img-box">
    <form action="upload_profile.php" method="POST" enctype="multipart/form-data">

      <?php if (!empty($profile_image)): ?>
        <img src="uploads/<?php echo htmlspecialchars($profile_image); ?>" class="profile-img" id="previewImg" alt="Profile Image">
      <?php else: ?>
        <div class="avatar-circle" id="previewImg">
          <?php echo $avatar_letter; ?>
        </div>
      <?php endif; ?>

      <input type="file" name="profile_image" id="fileInput" hidden>
      <label for="fileInput" class="edit-icon">✏️</label>
      <button type="submit" class="save-btn" id="saveBtn">Save</button>
    </form>

    <?php if (!empty($profile_image)): ?>
      <form method="POST" action="remove_profile_image.php">
        <button type="submit" class="btn btn-danger btn-sm mt-2">
          ❌ Remove Profile Image
        </button>
      </form>
    <?php endif; ?>
  </div>

  <?php if (isset($_GET['msg'])): ?>
    <?php if ($_GET['msg'] == 'success'): ?>
      <div class="alert alert-success">✅ Password changed successfully</div>
    <?php elseif ($_GET['msg'] == 'wrong'): ?>
      <div class="alert alert-danger">❌ Current password is incorrect</div>
    <?php elseif ($_GET['msg'] == 'notmatch'): ?>
      <div class="alert alert-warning">⚠ New passwords do not match</div>
    <?php elseif ($_GET['msg'] == 'imgsuccess'): ?>
      <div class="alert alert-success">✅ Profile image updated</div>
    <?php elseif ($_GET['msg'] == 'invalid'): ?>
      <div class="alert alert-warning">⚠ Only JPG, PNG allowed</div>
    <?php elseif ($_GET['msg'] == 'removed'): ?>
      <div class="alert alert-success">✅ Profile image removed</div>
    <?php elseif ($_GET['msg'] == 'short'): ?>
      <div class="alert alert-warning">⚠ Password must be at least 6 characters</div>
    <?php else: ?>
      <div class="alert alert-danger">❌ Something went wrong</div>
    <?php endif; ?>
  <?php endif; ?>

  <h2 class="profile-title">👋 Welcome <?php echo htmlspecialchars($first_name); ?></h2>

  <div class="premium-table mt-3">
    <table class="table table-borderless text-white">
      <tbody>
        <tr>
          <th class="text-start">👤 Full Name</th>
          <td class="text-end"><?php echo htmlspecialchars(trim($first_name . " " . $last_name)); ?></td>
        </tr>
        <tr>
          <th class="text-start">📧 Email</th>
          <td class="text-end"><?php echo htmlspecialchars($email); ?></td>
        </tr>
        <tr>
          <th class="text-start">📅 Joined On</th>
          <td class="text-end"><?php echo !empty($created_at) ? date("d M Y", strtotime($created_at)) : ''; ?></td>
        </tr>
      </tbody>
    </table>
  </div>

  <a href="logout.php" class="logout-btn">Logout</a>

  <h4 class="mt-4 text-info">🔒 Change Password</h4>

  <form method="POST" action="change_password.php" id="passwordForm">
    <div class="mb-3 position-relative">
      <input type="password" name="current_password" id="current_password"
        class="form-control premium-input" placeholder="Current Password" required>
      <span class="toggle-eye" onclick="togglePassword('current_password', this)">👁️</span>
    </div>

    <div class="mb-3 position-relative">
      <input type="password" name="new_password" id="new_password"
        class="form-control premium-input" placeholder="New Password" required>
      <small id="passwordError" style="color:red; display:none;">
        Password must be greater than 6 characters
      </small>
      <span class="toggle-eye" onclick="togglePassword('new_password', this)">👁️</span>
    </div>

    <div class="progress mb-3" style="height:6px;">
      <div id="strengthBar" class="progress-bar"></div>
    </div>

    <div class="mb-3 position-relative">
      <input type="password" name="confirm_password" id="confirm_password"
        class="form-control premium-input" placeholder="Confirm Password" required>
      <span class="toggle-eye" onclick="togglePassword('confirm_password', this)">👁️</span>
    </div>

    <button type="submit" class="btn btn-success w-100 premium-btn">
      🚀 Update Password
    </button>
  </form>
</div>

<script>
function togglePassword(id, el) {
  const input = document.getElementById(id);
  if (input.type === "password") {
    input.type = "text";
    el.innerText = "🙈";
  } else {
    input.type = "password";
    el.innerText = "👁️";
  }
}

const passwordInput = document.getElementById("new_password");
const strengthBar = document.getElementById("strengthBar");

passwordInput.addEventListener("input", () => {
  let val = passwordInput.value;
  let strength = 0;

  if (val.length >= 6) strength += 1;
  if (val.match(/[A-Z]/)) strength += 1;
  if (val.match(/[0-9]/)) strength += 1;
  if (val.match(/[@$!%*?&]/)) strength += 1;

  let width = strength * 25;
  strengthBar.style.width = width + "%";

  if (strength <= 1) {
    strengthBar.style.background = "red";
  } else if (strength == 2) {
    strengthBar.style.background = "orange";
  } else if (strength == 3) {
    strengthBar.style.background = "yellow";
  } else {
    strengthBar.style.background = "lime";
  }
});

const fileInput = document.getElementById("fileInput");
let previewImg = document.getElementById("previewImg");
const saveBtn = document.getElementById("saveBtn");

fileInput.addEventListener("change", function() {
  const file = this.files[0];

  if (file) {
    const reader = new FileReader();

    reader.onload = function(e) {
      if (previewImg.tagName !== "IMG") {
        const newImg = document.createElement("img");
        newImg.src = e.target.result;
        newImg.className = "profile-img";
        newImg.id = "previewImg";

        previewImg.replaceWith(newImg);
        previewImg = newImg;
      } else {
        previewImg.src = e.target.result;
      }

      saveBtn.style.display = "inline-block";
    };

    reader.readAsDataURL(file);
  }
});

const form = document.getElementById("passwordForm");
const newPassword = document.getElementById("new_password");
const errorText = document.getElementById("passwordError");

form.addEventListener("submit", function(e) {
  if (newPassword.value.length < 6) {
    e.preventDefault();
    newPassword.classList.add("input-error");
    errorText.style.display = "block";
  }
});

newPassword.addEventListener("input", function() {
  if (newPassword.value.length >= 6) {
    newPassword.classList.remove("input-error");
    errorText.style.display = "none";
  }
});
</script>

</body>
</html>