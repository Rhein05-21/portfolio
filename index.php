<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rheinbanasihantigle@gmail.com';
        $mail->Password = 'zmyz llqe trjn jzyg';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('rheinbanasihantigle@gmail.com');
        $mail->addReplyTo($email, $name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = "New Contact Form Submission from $name";
        $mail->Body = "
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Message:</strong><br>$message</p>
        ";

        $mail->send();
        $status = 'success';
    } catch (Exception $e) {
        $status = 'error';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyPortfolio</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
          <a class="navbar-brand" href="#">Portfolio</a>
          
          <!-- Hamburger menu for mobile -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <!-- Navbar links -->
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">Contacts</a>
              </li>
            </ul>
            
            <!-- Download Resume Button -->
            <a href="#" class="btn btn-primary download-btn">
              Download Resume
            </a>
          </div>
        </div>
      </nav>

       <!-- Page Content -->
  <div class="container mt-5">
    <!-- Profile Section -->
    <div class="row align-items-center">
      <!-- Profile Image (Left Side) -->
      <div class="col-md-4 mb-4 mb-md-0">
        <img src="myPic.jpeg" alt="Your Name" class="img-fluid rounded shadow" 
             style="max-width: 100%; height: auto; object-fit: cover;">
      </div>
      
      <!-- Introduction (Right Side) -->
      <div class="col-md-8">
        <h1 class="mb-3">Hello, I'm Rhein Tigle</h1>
        <h3 class="text-muted mb-4">Web Developer & Designer</h3>
        <p class="lead mb-4 text-justify">
          Welcome to my portfolio! I'm a passionate web developer with an average expertise in creating 
          responsive and user-friendly websites. I specialize in front-end development using 
          HTML, CSS, JavaScript, and modern frameworks like Flask and Bootstrap.
        </p>
        <p class="mb-4">
          As a dedicated student developer, I'm enthusiastically learning and working on various web projects
          to build my portfolio. I focus on writing clean, maintainable code and am constantly expanding
          my knowledge in modern web development technologies.
        </p>
        <div class="mt-4">
          <a href="C:\xampp\htdocs\e-Shelfv2\student\login.php" class="btn btn-primary me-2 mb-2">View My Work</a>
          <a href="#" class="btn btn-outline-secondary mb-2">Contact Me</a>
        </div>
      </div>
    </div>
  </div>

  <!-- About Section -->
  <div id="about" class="container mt-5 pt-5">
    <div class="row">
      <div class="col-12">
        <h2 class="mb-4">About Me</h2>
        <div class="row">
          <div class="col-md-6">
            <h4>Education</h4>
            <p>Currently pursuing my degree in BSIT at Laguna University.</p>
            
            <h4 class="mt-4">Skills</h4>
            <ul>
              <li>HTML, CSS, JavaScript</li>
              <li>Bootstrap Framework</li>
              <li>Flask Framework</li>
              <li>Responsive Web Design</li>
            </ul>
          </div>
          <div class="col-md-6">
            <h4>What I Do</h4>
            <p>I create responsive and user-friendly websites while continuously learning new technologies and best practices in web development.</p>
            
            <h4 class="mt-4">Interests</h4>
            <p>Aside from coding, I like to play basketball with my friends. I believe in a work and life balanced.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Contact Section -->
  <div id="contact" class="container mt-5 pt-5">
    <div class="row">
      <div class="col-12">
        <h2 class="mb-4">Contact Me</h2>
        <div class="row">
          <div class="col-md-6 mb-4">
            <h4>Get in Touch</h4>
            <p>Feel free to reach out to me for any questions or opportunities!</p>
            <ul class="list-unstyled">
              <li class="mb-3">
                <i class="bi bi-envelope"></i> Email: rheinbanasihantigle@gmail.com
              </li>
              <li class="mb-3">
                <i class="bi bi-phone"></i> Phone: +63-977-016-3408
              </li>
              <li class="mb-3">
                <i class="bi bi-geo-alt"></i> Location: Los Baños, Laguna
              </li>
            </ul>
          </div>
          <div class="col-md-6">
            <div id="statusMessage" class="alert" style="display: none;"></div>
            <form method="POST">
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
            <script>
              <?php if (isset($status)): ?>
                const statusDiv = document.getElementById('statusMessage');
                if ('<?php echo $status; ?>' === 'success') {
                  statusDiv.className = 'alert alert-success';
                  statusDiv.style.display = 'block';
                  statusDiv.textContent = 'Message sent successfully!';
                } else if ('<?php echo $status; ?>' === 'error') {
                  statusDiv.className = 'alert alert-danger';
                  statusDiv.style.display = 'block';
                  statusDiv.textContent = 'Error sending message. Please try again.';
                }
              <?php endif; ?>
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>