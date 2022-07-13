<?php

  //include 'conn.php';

  if(isset($_POST['send'])) {

    $name = $conn->real_escape_string($_POST['namePHP']);
    $email = $conn->real_escape_string($_POST['emailPHP']);
    $location = $conn->real_escape_string($_POST['locationPHP']);
    $phone = $conn->real_escape_string($_POST['phonePHP']);
    $gender = $conn->real_escape_string($_POST['genderPHP']);
    $clothe = $conn->real_escape_string($_POST['clothePHP']);
    $detail = $conn->real_escape_string($_POST['detailPHP']);
    $shoulder = $conn->real_escape_string($_POST['shoulderPHP']);
    $neck = $conn->real_escape_string($_POST['neckPHP']);
    $bust = $conn->real_escape_string($_POST['bustPHP']);
    $waist = $conn->real_escape_string($_POST['waistPHP']);
    $halfLength = $conn->real_escape_string($_POST['halfLengthPHP']);
    $stub = $conn->real_escape_string($_POST['stubPHP']);
    $stwl = $conn->real_escape_string($_POST['stwlPHP']);
    $ubc = $conn->real_escape_string($_POST['ubcPHP']);
    $wc = $conn->real_escape_string($_POST['wcPHP']);
    $hip = $conn->real_escape_string($_POST['hipPHP']);
    $roundKnee = $conn->real_escape_string($_POST['roundKneePHP']);
    $roundSleeve = $conn->real_escape_string($_POST['roundSleevePHP']);
    $trouserLength = $conn->real_escape_string($_POST['trouserLengthPHP']);
    $base = $conn->real_escape_string($_POST['basePHP']);
    $lap = $conn->real_escape_string($_POST['lapPHP']);
    $kneeCircum = $conn->real_escape_string($_POST['kneeCircumPHP']);
    $sleeveLength = $conn->real_escape_string($_POST['sleeveLengthPHP']);
    $fullLength = $conn->real_escape_string($_POST['fullLengthPHP']);
    $blouseLength = $conn->real_escape_string($_POST['blouseLengthPHP']);

    //Inserting data into datatbase
    $sql = "INSERT INTO measurement ()
    VALUES ('$name', '$email', '$location', '$phone', '$gender', '$clothe', '$detail', '$shoulder',
     '$neck', '$bust', '$waist', '$halfLength', '$stub', '$stwl', '$ubc', '$wc', 
     '$hip', '$roundKnee', '$roundSleeve', '$trouserLength', '$base', '$lap', '$kneeCircum', '$sleeveLength', 
     '$fullLength', '$blouseLength')";
    if (mysqli_query($conn, $sql)) {
      exit('<font color="gold">Data sent Successfully. You will get a reply from us soon.</font>');
    } else {
      exit('<font color="gold">Upload failed, check inputs and try again.</font>');
    }

  }


?>
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
              <div style="color:green; font-family:fantasy; font-size:10px;" id="responses"></div>
              <label>Location</label>
              <input
                type="text"
                class="formcontrol"
                name="location"
                id="location"
                placeholder="Location"
              />
              <label>Mobile number</label>
              <input
                type="number"
                class="formcontrol"
                name="Phone"
                id="phone"
                placeholder="Your mobile number"
              />
              <div style="color:green; font-family:fantasy; font-size:10px;" id="phoneres"></div>
              <label> Gender </label>
              <select name="Gender" id="gender" class="formcontrol">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
              <label>What do you want?</label>
              <select id="clothe-type" class="formcontrol">
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
                id="details"
                class="formcontrol more"
                placeholder="Express yourself here in few lines"
              >
              </textarea>
              <div style="color:green; font-family:fantasy; font-size:10px;" id="detailres"></div>
              <label>Your measurements in (cm)</label>
              <label>Please give us these details accurately</label>
              <input
                type="number"
                id="shoulder"
                class="formcontrol"
                placeholder="shoulder"
              />
              <input
                type="number"
                id="neck"
                class="formcontrol"
                placeholder="neck"
              />
              <input
                type="number"
                id="bust"
                class="formcontrol"
                placeholder="bust"
              />
              <input
                type="number"
                id="waist"
                class="formcontrol"
                placeholder="waist"
              />
            </div>
            <!-- second part of the form -->
            <div>
              <input
                type="number"
                id="half-length"
                class="formcontrol"
                placeholder="half length"
              />
              <input
                type="number"
                id="stub"
                class="formcontrol"
                placeholder="shoulder to under burst"
              />
              <input
                type="number"
                id="stwl"
                class="formcontrol"
                placeholder="shoulder to waist line"
              />
              <input
                type="number"
                id="ubc"
                class="formcontrol"
                placeholder="under bust circumference"
              />
              <input
                type="number"
                id="wc"
                class="formcontrol"
                placeholder="waist circumference"
              />
              <input
                type="number"
                id="hip"
                class="formcontrol"
                placeholder="hip"
              />
              <input
                type="number"
                id="round-knee"
                class="formcontrol"
                placeholder="round knee"
              />
              <input
                type="number"
                id="round-slevee"
                class="formcontrol"
                placeholder="round slevee"
              />
              <input
                type="number"
                id="trouser-length"
                class="formcontrol"
                placeholder="trouser length"
              />
              <input
                type="number"
                id="base"
                class="formcontrol"
                placeholder="base (ankle)"
              />
              <input
                type="number"
                id="lap"
                class="formcontrol"
                placeholder="lap/thigh"
              />
              <input
                type="number"
                id="knee-circumference"
                class="formcontrol"
                placeholder="knee circumference"
              />
              <input
                type="number"
                id="slevee-length"
                class="formcontrol"
                placeholder="shoulder"
              />
              <input
                type="number"
                id="full-length"
                class="formcontrol"
                placeholder="full length"
              />
              <input
                type="number"
                id="blouse-length"
                class="formcontrol"
                placeholder="blouse length"
              />
              <div style="color:green; font-family:fantasy; font-size:13px;" id="res"></div>
              <input type="button" value="Send" id="send" class="btn">
            </div>
          </form>
        </div>

        <!-- Let customer upload an image sample of what they want -->
        <div class="store-form-1">
          <h1>Upload a photo sample of what you want if you have any. (This is not compulsory)</h1>
          <form action="upload_customer.php" method="post" enctype="multipart/form-data" class="storeForm">
            <div>
              <input type="file" name="file" required> 
              <button  type="submit" name="submit" class="btn">UPLOAD</button>
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

    <script type="text/javascript">
      // toggle sidebar on and off
      let btn = document.querySelector(".menubtn");
      let sidebar = document.querySelector(".sidebar");

      btn.onclick = function () {
        sidebar.classList.toggle("active");
      };

      //code for Form validation using jquery
      $(document).ready(function () {
        console.log("ready");
        // checking for errors onInput
        //if email doesnt have @gmail.com
        $("#email").on("input", function () {
          let email = $("#email").val();
          if (email.indexOf("@gmail.com") <= 0) {
            $("#responses").html("Email is not yet valid");
          } else {
            $("#responses").html("Email is valid");
            setTimeout(() => {
              $("#responses").html("");
            }, 3000);
          }
        });

        //if phone number is not 11 digits
        $("#phone").on("input", () => {
          let phone = $("#phone").val();
          if (phone.length >= 12 || phone.length < 11) {
            $("#phoneres").html("mobile number is not yet valid");
          } else {
            $("#phoneres").html("mobile number is valid");
            setTimeout(() => {
              $("#phoneres").html("");
            }, 3000);
          }
        });

        //if details is greater then 200 characters
        $("#details").on("input", () => {
          let details = $("#details").val();
          if (details.length >= 200) {
            $("#detailres").html("message is too long");
          } else {
            $("#detailres").html("");
            setTimeout(() => {
              $("#detailres").html("");
            }, 3000);
          }
        });

        //when send button is clicked
        $("#send").on("click", function () {
          let name = $("#name").val();
          let email = $("#email").val();
          let location = $("#location").val();
          let phone = $("#phone").val();
          let gender = $("#gender").val();
          let clotheType = $("#clothe-type").val();
          let details = $("#details").val();

          // measurements
          let shoulder = $("#shoulder").val();
          let neck = $("#neck").val();
          let bust = $("#bust").val();
          let waist = $("#waist").val();
          let halfLength = $("#half-length").val();
          let stub = $("#stub").val();
          let stwl = $("#stwl").val();
          let ubc = $("#ubc").val();
          let wc = $("#wc").val();
          let hip = $("#hip").val();
          let roundKnee = $("#round-knee").val();
          let roundSleeve = $("#round-sleeve").val();
          let trouserLength = $("#trouser-length").val();
          let base = $("#base").val();
          let lap = $("#lap").val();
          let kneeCircum = $("#knee-circumference").val();
          let sleeveLength = $("#sleeve-length").val();
          let fullLength = $("#full-length").val();
          let blouseLength = $("#blouse-length").val();

          if( email == "" || name == "" || location == "" || gender == "" || details == "") {
            $("#res").html("Make sure all fields are filled");
          }else  if (email.indexOf("@gmail.com") <= 0) {
            $("#res").html("Your Email is invalid");
          }else  if (details.length >= 200) {
            $("#res").html("Your detail message is too long");
          }else  if (phone.length < 11){
            $("#res").html("check your mobile number");
          }else {
            $.ajax (
              {
                url: 'store.php',
                  method: 'POST',
                  data: {
                    send: 1,
                    namePHP: name,
                    emailPHP: email,
                    locationPHP: location,
                    phonePHP: phone,
                    genderPHP: gender,
                    clothePHP: clotheType,
                    detailPHP: details,
                    shoulderPHP: shoulder,
                    neckPHP: neck,
                    bustPHP: bust,
                    waistPHP: waist,
                    halfLengthPHP: halflength,
                    stubPHP: stub,
                    stwlPHP: stwl,
                    ubcPHP: ubc,
                    wcPHP: wc,
                    hipPHP: hip,
                    roundKneePHP: roundKnee,
                    roundSleevePHP: rounSleeve,
                    trouserLengthPHP: trouserlength,
                    basePHP: base,
                    lapPHP: lap,
                    kneeCircumPHP: kneeCircum,
                    sleeveLengthPHP: sleeveLength,
                    fullLengthPHP: fullLength,
                    blouseLengthPHP: blouseLength
                  },
                  success: function (response) {
                      $("#response").html(response);
                  },
                  dataType: 'text'
              }
            );
          }

        });
      });
    </script>
  </body>
</html>
