
<?php include_once "navegadores.php"; ?>
<?php include_once "header.php"; ?>
  <body>
    <div class="wrapper">
      <section class="form login">
        <header>Chat App</header>
        <form action="" autocomplete="off">
          <div class="error-txt"></div>
          <div class="field input">
            <label for="">E-mail</label>
            <input type="text" name="email" placeholder="" required />
          </div>
          <div class="field input">
            <label for="">Password</label>
            <input type="password" name="password" placeholder="" required />
            <i class="bi bi-eye-fill"></i>
          </div>
          <div class="field button">
            <input type="submit" value="Go to chat" />
          </div>
        </form>
        <div class="link">Not yet signed up? <a href="index.php">Login now</a></div>
      </section>
    </div>
    <script src="./js/pass-show-hidde.js"></script>
    <script src="./js/login.js"></script>
  </body>
</html>
