<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>WashWise Verification</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f2fa;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      background-color: white;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      width: 400px;
    }

    .logo {
      font-weight: bold;
      color: #1a1a1a;
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .logo img {
    height: 80px;
    width: 150px;
      margin-left: -10px;
    }

    .email {
      font-size: 14px;
      color: #555;
      margin-bottom: 30px;
      display: flex;
      align-items: center;
    }

    .email i {
      font-size: 20px;
      color: #333;
      margin-right: 10px;
      cursor: pointer;
    }

    h2 {
      margin: 0 0 10px;
    }

    p {
      color: #555;
      margin-bottom: 10px;
    }

    input[type="text"] {
      width: 100%;
      padding: 12px;
      border: none;
      border-bottom: 2px solid #2b52d9;
      font-size: 16px;
      margin-bottom: 30px;
      outline: none;
    }

    .btn {
      background-color: #2b52d9;
      color: white;
      border: none;
      padding: 14px;
      width: 100%;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
    }

    .btn:hover {
      background-color: #1d3bbf;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="logo">
      <img src="viri.PNG" alt="Car Icon">
      
    </div>
    <div class="email">
      <i class='bx bx-arrow-back'></i>
      Example12312@gmail.com
    </div>

    <h2>Enter Code</h2>
    <p>Enter the code sent to your Email Address</p>
    <input type="text" placeholder="Code" />
    <button class="btn" onclick="Edit()">Verify</button>
  </div>
<script>
function Edit() {
  window.location.href = "Login.php";
}
</script>
</body>
</html>