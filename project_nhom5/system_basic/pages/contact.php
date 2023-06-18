<?php
    require 'inc/header.php';
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form input values
    $first_name = $_POST["first_name"];
    $email_address = $_POST["email_address"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $note = $_POST["note"];
    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO `feedBack` (`fullname`, `email`, `address`, `phone`, `note`, `created_at`, `update_at`) VALUES (?, ?, ?, ?, ?, NOW(), NOW())");
    $stmt->bind_param("sssss", $first_name, $email_address, $address, $phone, $note);

    // Execute SQL statement and check for errors
    if ($stmt->execute()) {
        header("loation:?page=contact");
    } else {
        echo "<p>There was a problem submitting your feedback. Please try again later.</p>";
    }


}
?>
  <div class="contact-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="contact-message">
            <h2>tell us your project</h2>
            <form id="contact-form"  method="post" class="contact-form">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <input name="first_name" placeholder="Name *" type="text" required>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <input name="phone" placeholder="Phone *" type="text" required>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <input name="email_address" placeholder="Email *" type="text" required>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <input name="address" placeholder="Address" type="text">
                </div>
                <div class="col-12">
                  <div class="contact2-textarea text-center">
                    <textarea placeholder="Message *" name="note" class="form-control2" required=""></textarea>
                  </div>
                  <div class="contact-btn">
                    <button class="send-messanger" type="submit">Send Message</button>
                  </div>
                </div>
                <div class="col-12 d-flex justify-content-center">
                  <p class="form-messege"></p>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="contact-info">
            <h2>Contact us</h2>
            <p>GENGAR BABY always wants to bring customers absolute satisfaction by superior product quality and superior services.
              Excellent customer service is sure to conquer even the most demanding customers.</p>
            <ul>
              <li><i class="fa fa-fax"></i> Address : No 285 DOI CAN , BA DINH , HA NOI</li>
              <li><i class="fa fa-phone"></i>  +880123456789</li>
              <li><i class="fa fa-envelope-o"></i>phamhuyen19@gamil.com.vn</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
<style scoped>
.send-messanger{
  color: #fff;
  background-color: #f1ac2b;
  border-color: #f1ac2b;
  padding: 15px;
}
</style>
<?php
    require 'inc/footer.php';
?>