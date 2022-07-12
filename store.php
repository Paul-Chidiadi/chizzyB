<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />
    <title>CHIZZYB STORE</title>

    <!--MAin CSS file-->
    <link rel="stylesheet" href="css/index.css" />
    <!--BOXICONS CSS-->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- NAVBAR START -->
    <div class="navbar">
      <div class="logo">
        <span class="log">CHIZZYB</span>
        <span class="go">COUTURE</span>
      </div>
      <!-- will take user to email or whatsapp -->
      <div class="chats">
        <a href="mailto:chizzyB@gmail.com"><i class="bx bxs-envelope"></i></a>
        <a href=""><i class="bx bxl-whatsapp"></i></a>
      </div>
      <div class="menubtn">
        <i class="bx bx-menu"></i>
      </div>
    </div>
    <!-- NAVBAR END -->

    <!-- SIDEBAR START-->
    <div class="sidebar">
      <ul class="list">
        <li class="item">
          <a href="index.html#abouts">
            <i class="bx bx-detail"></i>
            <span class="text">About US</span>
          </a>
          <span class="tool">About US</span>
        </li>
        <li class="item">
          <a href="index.html#converses">
            <i class="bx bx-message-dots"></i>
            <span class="text">Conversation</span>
          </a>
          <span class="tool">Conversation</span>
        </li>
        <li class="item">
          <a href="index.html#store">
            <i class="bx bxs-cart"></i>
            <span class="text">Store</span>
          </a>
          <span class="tool">Store</span>
        </li>
        <li class="item">
          <a href="index.html#academy">
            <i class="bx bxs-graduation"></i>
            <span class="text">Academy</span>
          </a>
          <span class="tool">Academy</span>
        </li>
        <li class="item">
          <a href="">
            <i class="bx bxl-blogger"></i>
            <span class="text">Blog</span>
          </a>
          <span class="tool">Blog</span>
        </li>
        <li class="item">
          <a href="index.html#contact">
            <i class="bx bx-phone-call"></i>
            <span class="text">Contact Us</span>
          </a>
          <span class="tool">Contact Us</span>
        </li>
      </ul>
    </div>
    <!-- SIDEBAR END -->

    <!-- MAIN CONTENT START-->
    <div class="main">
      <!-- SPEAK -->
      <div class="speak">
        <div class="store-head">
          <h1>Let's hear you out!</h1>
          <p>
            Be spoken. Express yourself so that we can know what exactly you
            want us to make for you. We offer services where you explain to us
            how you want to style your clothe and we get it done or you.
          </p>
        </div>

        <div class="store-form">
          <form action="" method="post" role="form" class="storeForm">
            <div>
              <label>Name</label>
              <input
                type="text"
                name="name"
                class="formcontrol"
                id="name"
                placeholder="Your Name"
              />
              <label>Email</label>
              <input
                type="email"
                class="formcontrol"
                name="email"
                id="email"
                placeholder="Your Email"
              />
              <label>Location</label>
              <input
                type="text"
                class="formcontrol"
                name="location"
                id="location"
                placeholder="Loction"
              />
              <label>Mobile number</label>
              <input
                type="number"
                class="formcontrol"
                name="Phone"
                id="phone"
                placeholder="Your mobile number"
              />
              <label> Gender </label>
              <select name="Gender" id="gender" class="formcontrol">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
              <label>What do you want?</label>
              <select name="clothe-type" class="formcontrol">
                <option value="Trouser">Trouser</option>
                <option value="Senator">Senator</option>
                <option value="Shirt">Shirt</option>
                <option value="Blazzers">Blazzers</option>
                <option value="Bridal">Bridal</option>
                <option value="Kiddies">Kiddies</option>
                <option value="Skirt">Skirt</option>
              </select>
              <label>Explain in Details</label>
              <textarea
                name="details"
                class="formcontrol more"
                placeholder="Express yourself here in few lines"
                rows="10"
              >
              </textarea>
              <label>Your measurements in (cm)</label>
              <label>Please give us these details accurately</label>
              <input
                type="number"
                name="shoulder"
                class="formcontrol"
                placeholder="shoulder"
              />
              <input
                type="number"
                name="neck"
                class="formcontrol"
                placeholder="neck"
              />
              <input
                type="number"
                name="bust"
                class="formcontrol"
                placeholder="bust"
              />
              <input
                type="number"
                name="waist"
                class="formcontrol"
                placeholder="waist"
              />
            </div>
            <!-- second part of the form -->
            <div>
              <input
                type="number"
                name="half-length"
                class="formcontrol"
                placeholder="half length"
              />
              <input
                type="number"
                name="stub"
                class="formcontrol"
                placeholder="shoulder to under burst"
              />
              <input
                type="number"
                name="stwl"
                class="formcontrol"
                placeholder="shoulder to waist line"
              />
              <input
                type="number"
                name="ubc"
                class="formcontrol"
                placeholder="under bust circumference"
              />
              <input
                type="number"
                name="wc"
                class="formcontrol"
                placeholder="waist circumference"
              />
              <input
                type="number"
                name="hip"
                class="formcontrol"
                placeholder="hip"
              />
              <input
                type="number"
                name="round-knee"
                class="formcontrol"
                placeholder="round knee"
              />
              <input
                type="number"
                name="round-slevee"
                class="formcontrol"
                placeholder="round slevee"
              />
              <input
                type="number"
                name="trouser-length"
                class="formcontrol"
                placeholder="trouser length"
              />
              <input
                type="number"
                name="base"
                class="formcontrol"
                placeholder="base (ankle)"
              />
              <input
                type="number"
                name="lap"
                class="formcontrol"
                placeholder="lap/thigh"
              />
              <input
                type="number"
                name="knee-circumference"
                class="formcontrol"
                placeholder="knee circumference"
              />
              <input
                type="number"
                name="slevee-length"
                class="formcontrol"
                placeholder="shoulder"
              />
              <input
                type="number"
                name="full-length"
                class="formcontrol"
                placeholder="full length"
              />
              <button type="submit" class="btn">Send</button>
            </div>
          </form>
        </div>
      </div>

      <!-- FOOTER -->
      <footer id="footer" class="foot">
        <div class="row">
          <div class="author">
            <p class="copyright-text">© ChizzyB COUTURE</p>
            <div class="credits">Designed by paulchidiadi@gmail.com</div>
          </div>

          <div class="foot-nav">
            <ul class="list">
              <li class="list-item">
                <a href="index.html">Home</a>
              </li>

              <li class="list-item">
                <a href="index.html#abouts">About</a>
              </li>

              <li class="list-item">
                <a href="index.html#converses">Conversation</a>
              </li>

              <li class="list-item">
                <a href="index.html#academy">Academy</a>
              </li>

              <li class="list-item">
                <a href="index.html#store">Store</a>
              </li>

              <li class="list-item">
                <a href="#blog">Blog</a>
              </li>

              <li class="list-item">
                <a href="index.html#contact">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>

    <!-- Javascript code and files/libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="index.js"></script>

    <script>
      let btn = document.querySelector(".menubtn");
      let sidebar = document.querySelector(".sidebar");

      btn.onclick = function () {
        sidebar.classList.toggle("active");
      };
    </script>
  </body>
</html>
