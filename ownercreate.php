<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Style_Ownercreate.css">
   

</head>
<body>
    <header>
        <div class="navbar">
        <div class="logo">
            
        </div>
            <a href="index.html"> Home </a>
            <a href="#about"> About </a>
            <a href="terms.html"> Sign up </a>
        <div class="log">
            <a href="Login.php"> Sign in </a></div>
        </div>
        </div>
    </header>

    <section>
        <div class="gh">
            <form class="form_reg" id="loginForm" method="post" enctype="multipart/form-data" action="image.php">
                <h2>Register as Owner</h2>

                <div class="profile-photo"></div>
                <div class="add-photo">Add Photo <span>➕</span>
                    <input type="file" id="brand-name " name="image" required />
                </div>
          
                <div class="form-group">
                  <input type="text" id="brand-name" placeholder="Car Wash Store Name" name="fullname" required/>
                </div>
                <div class="form-group">
                  <input type="text" id="brand-name" placeholder="Email" name="Store" required/>
                </div>

                <div class="form-group">
                    <input type="text"  placeholder="Password" name="passwOw" required>
                </div>

                <div class="form-group">
                    <input type="text"  placeholder="Full Address" name="address" required>
                </div>
          
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea id="desc" name = "description" required></textarea>
                </div>

                <div class="Input">
                    <select name="rolOw" id="district"  onchange="updateBarangays()" required>
                        <option value="">--Select District---</option>
                        <option value="District_1">District 1</option>
                        <option value="District_2">District 2</option>
                        <option value="District_3">District 3</option>
                        <option value="District_4">District 4</option>
                        <option value="District_5">District 5</option>
                        <option value="District_6">District 6</option>
                    </select>
                </div>
                
                <button type="submit" class="btn0" name="register">Register</button>
                <div class="reg">
                    <p>Already have an account? <a href="Login.php">Login</a></p>
                    <p>Register as <a href="SignUp.php">Owner</a></p>
                </div>
            </form>
          </div>

    </section>

</body>
