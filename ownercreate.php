<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Style_Ownercreate.css">
   

</head>
<body>
    <header>
        <div class="logo"></div>
        <nav role="navigation">
            <div id="menuToggle">
                <input type="checkbox" id="menuCheckbox">
                <span></span>
                <span></span>
                <span></span>
                <ul id="menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Student</a></li>
                    <li><a href="#">Course</a></li>
                    <li><a href="#">Section</a></li>
                    <li><a href="#">Room</a></li>
                    <li><a href="#">Teacher</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <section>
        <div class="gh">
            <form class="form_reg" id="loginForm" method="post" enctype="multipart/form-data" action="image.php">
                <h2>Create Profile</h2>

                <div class="profile-photo"></div>
                <div class="add-photo">Add Photo <span>➕</span>
                    <input type="file" id="brand-name " name="image" required />
                </div>
          
                <div class="form-group">
                  <input type="text" id="brand-name" placeholder="Car wash brand " name="fullname" required/>
                </div>

                <div class="form-group">
                    <input type="text"  placeholder="Password" name="passwOw" required>
                </div>

          
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea id="desc" name = "description" required></textarea>
                </div>
          
                <button class="save-btn" name="submit">Save</button>
            </form>
          </div>

    </section>

</body>