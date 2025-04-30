

<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Style_Cancel.css">
</head>
<body>
    <header>
        <div class="logo"></div>
    </header>

    <section>
        <div class="gh">
            <form class="form_reg" id="loginForm" method="post" enctype="multipart/form-data" action="cancelbooking.php">

                <input type="text" class="Input" name="cancel" placeholder="Enter The store name:" required><br>
                <label> </label><br>
                <input type="text" class="Input" name="Name" placeholder="Name:" required><br>
                    <div class="form-group">
                        <label for="reason">Reason of canceling</label><br>
                        <textarea id="can" name = "reason" required></textarea>
                    </div>
                    <button class="save-btn" name="cancel">Cancel Now</button>
                    <?php if ($message): ?>
        <p><strong><?= $message ?></strong></p>
    <?php endif; ?>
            </form>
          </div>

    </section>

</body>
