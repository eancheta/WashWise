<?php
session_start();
$error = [
'register' => $_SESSION['register_error']??''
];
    $activeForm = $_SESSION['active_form'] ??'login';

    session_reset();

    function showError($error) {
        return !empty($error) ?"<p class= 'error_message".$error."</p>":'';
    }

    function isActiveForm($formname,$activeForm) {
        return $formname === $activeForm ? 'active' :'';
    }
?>

<!DOCTYPE html>
 
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="StyleSignUp.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
 
<body>
<header>
    <div class="navbar">
    <div class="logo">
       
    </div>
        <a href="index.html"> Home </a>
        <a href="index.html"> About </a>
        <a href="SignUp.php"> Sign up </a>
        <div class="log">
            <a href="Login.php"> Sign in </a></div>
        </div>
    </header>
 
 
 
    <section class="her">

    <div class="gh active">
            <form class="form_reg" id="loginForm"  method="post" action="register.php">
                <h1>Customer</h1>
               
                <div class="Input">
                    <input type="text"  placeholder="Username" name="usern" required>
                </div>
                <div class="Input">
                    <input type="text"  placeholder="Password" name="passw" required>
                </div>
                <div class="Input">
                    <input type="text"  placeholder="Contact_No" name="cont" required>
                </div>

                <div class="Input">
                    <select name="rol" id="district"  onchange="updateBarangays()" required>
                        <option value="">--Select District---</option>
                        <option value="District_1">District 1</option>
                        <option value="District_2">District 2</option>
                        <option value="District_3">District 3</option>
                        <option value="District_4">District 4</option>
                        <option value="District_5">District 5</option>
                        <option value="District_6">District 6</option>
                    </select>
                </div>
                <div class="Input">
                    <select id="barangay" name="add">
                        <option value="">-- Select Barangay --</option>
                    </select>
                </div>
 
                <button type="submit" class="btn0" name="register">Register</button>
                <div class="reg">
                    <p>Already have an account? <a href="Login.php">Login</a></p>
                    <p>Register as <a href="ownercreate.php">Owner</a></p>
                </div>
 
            </form>
        </div>
</body>
<script>

    const barangayOptions = {
      "District_1": ["Alicia", "Bagong Pag-asa", "Bahay Toro", "Balingasa", "Bungad", "Damar", "Damayan", "Del Monte", "Katipunan", "Lourdes", "Maharlika", "Manresa", "Mariblo", "Masambong", "N.S. Amoranto", "Nayong Kanluran", "Paang Bundok", "Pag-ibig sa Nayon", "Paltok", "Paraiso", "Phil-Am", "Project 6", "Ramon Magsaysay", "Saint Peter", "Salvacion", "San Antonio", "San Isidro Labrador", "San Jose", "Santa Cruz", "Santa Teresita", "Sto. Cristo", "Santo Domingo", "Siena", "Talayan", "Vasra", "Veterans Village", "West Triangle"],
      "District_2": ["Bagong Silangan", "Batasan Hills", "Commonwealth", "Holy Spirit", "Payatas"],
      "District_3": ["Amihan", "Bagumbayan", "Bagumbuhay", "Bayanihan", "Blue Ridge A", "Blue Ridge B", "Camp Aguinaldo", "Claro", "Dioquino Zobel", "Duyan-duyan", "E. Rodriguez", "East Kamias", "Escopa I", "Escopa II", "Escopa III", "Escopa IV", "Libis", "Loyola Heights", "Mangga", "Marilag", "Masagana", "Matandang Balara", "Milagrosa", "Pansol", "Quirino 2-A", "Quirino 2-B", "Quirino 2-C", "Quirino 3-A", "St. Ignatius", "San Roque", "Silangan", "Socorro", "Tagumpay", "Ugong Norte", "Villa Maria Clara", "West Kamias", "White Plains", "Barangay 3A", "Barangay 3B", "Barangay 3C", "Barangay 3D"],
      "District_4": ["Bagong Lipunan ng Crame", "Botocan", "Central", "Damayang Lagi", "Don Manuel", "Doña Aurora", "Doña Imelda", "Doña Josefa", "Horseshoe", "Immaculate Concepcion", "Kalusugan", "Kamuning", "Kaunlaran", "Kristong Hari", "Krus na Ligas", "Laging Handa", "Malaya", "Mariana", "Obrero", "Old Capitol Site", "Paligsahan", "Pinagkaisahan", "Pinyahan", "Roxas", "Sacred Heart", "San Isidro Galas", "San Martin de Porres", "San Vicente", "Santol", "Sikatuna Village", "South Triangle", "Sto. Niño", "Tatalon", "Teacher's Village East", "Teacher's Village West", "U.P. Campus", "U.P. Village", "Valencia"],
      "District_5": ["Bagbag", "Capri", "Fairview", "Greater Lagro", "Gulod", "Kaligayahan", "Nagkaisang Nayon", "North Fairview", "Novaliches Proper", "Pasong Putik Proper", "San Agustin", "San Bartolome", "Sta. Lucia", "Sta. Monica"],
      "District_6": ["Apolonio Samson", "Baesa", "Balong Bato", "Culiat", "New Era", "Pasong Tamo", "Sangandaan", "Sauyo", "Talipapa", "Tandang Sora", "Unang Sigaw"]
    };

    function updateBarangays() {
      const districtSelect = document.getElementById("district");
      const barangaySelect = document.getElementById("barangay");
      const selectedDistrict = districtSelect.value;
      barangaySelect.innerHTML = '<option value="">-- Select Barangay --</option>';

      if (selectedDistrict && barangayOptions[selectedDistrict]) {
        barangayOptions[selectedDistrict].forEach(barangay => {
          const option = document.createElement("option");
          option.value = barangay;
          option.text = barangay;
          barangaySelect.appendChild(option);
        });
      }
    }
</script>

