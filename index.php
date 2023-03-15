

<?php include_once "navegadores.php"; ?>
<?php include_once "header.php"; ?>
  <body>
    <div class="wrapper">
      <section class="form signup">
        <header>Chat App</header>
        <form action="" enctype="multipart/form-data" >
          <div class="error-txt"></div>
          <div class="name-details">
            <div class="field input">
              <label for="">First name</label>
              <input type="text" name="fname" placeholder="" required />
            </div>
            <div class="field input">
              <label for="">Last name</label>
              <input type="text" name="lname" placeholder="" required />
            </div>
          </div>
          <div class="field input">
            <label for="">E-mail</label>
            <input type="text" name="email" placeholder="" required />
          </div>
          <div class="field input">
            <label for="">Password</label>
            <input type="password" name="password" placeholder="" required />
            <i class="bi bi-eye-fill"></i>
          </div>
          <div class="field">
            <label for="input-file">
              <i class="bi bi-cloud-arrow-up-fill icon-cloud"></i>
            Select image</label>
            <input type="file" name="image" class="input-file"  required/>
          </div>
          <div class="field button">
            <input type="submit" value="Go to chat" />
          </div>
        </form>
        <div class="link">Already signed up? <a href="login.php">Login now</a></div>
      </section>
    </div>
    <script src="./js/pass-show-hidde.js"></script>
    <script src="./js/signup.js"></script>
  </body>
</html>
