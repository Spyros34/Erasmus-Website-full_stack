<?php
// Start a session
session_start();

// Check if the user is already logged in
if (!isset($_SESSION['username'])) {
    $message = "Πρέπει να είστε συνδεδεμένος για να δείτε αυτή την σελίδα. Παρακαλώ κάντε πρώτα login.";
    // You can customize the message as per your requirement

    $redirectUrl = "login.php";
    $delay = 5; // Delay in seconds before redirection

    echo '<!DOCTYPE html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles/style_application.css">
    <link rel="stylesheet" href="./styles/navbar_footer.css">
    
     <title>Access Denied</title>
            <script>
                setTimeout(function() {
                    window.location.href = "' . $redirectUrl . '";
                }, ' . ($delay * 1000) . '); // Delay in milliseconds
            </script>
    </head>
    
    <body>
    
    <!--Navbar-->
    <nav class="navbar">
        <ul class="menu">
            <li class="logo"> <a href="index.php"><img class="uni_logo" src="./media/img/university-logo.svg" class="uni_logo" alt="Logo image" /></a></li>
            <li class="item"><a href="index.php">Αρχική</a></li>
            <li class="item"><a href="more.php">Περισσότερα</a></li>
            <li class="item"><a href="reqs.php">Ελάχιστες Απαιτήσεις</a></li>
            </li>
            <li class="item"><a href="application.php">Αίτηση</a></li>
            <li class="item button"><a href="login.php">Είσοδος</a></li>
            <li class="item button secondary"><a href="sign-up.php">Εγγραφή</a></li>
            <li class="toggle"><span class="bars"></span></li>
        </ul>
    </nav>
    
    
    <div class="container2">
        <div class="content-section_denied"> 
    
            <div class="card_denied">
                <div class="h2_first">
                    <h2>Access Denied</h2> 
                </div> 
                <p class="par_denied1">' . $message . '</p>
                <p class="par_denied2">Redirecting in ' . $delay . ' seconds...</p>
                
               
                </div>
                  
    
            </div> 
        </div>
    </div>
    
    
    <footer class="footer">
        <span>Επικοινωνήστε μαζί μας: info@erasmus.gr | Τηλέφωνο: +30 210 1234567</span>
    </footer>  ';

    exit;
} else {
    // Continue with displaying the protected content or performing other actions
}
?>


<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="stylesheet" href="./styles/style_application.css">
<link rel="stylesheet" href="./styles/navbar_footer.css">

<script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
    crossorigin="anonymous"></script>

<script>
    $(function() {
        $(".toggle").on("click", function() {
            if ($(".item").hasClass("active")) {
                $(".item").removeClass("active");
            } else {
                $(".item").addClass("active");
            }
        });
    });
</script>
</head>

<body>

<!--Navbar-->
<nav class="navbar">
    <ul class="menu">
        <li class="logo"> <a href="index.php"><img class="uni_logo" src="./media/img/university-logo.svg" class="uni_logo" alt="Logo image" /></a></li>
        <li class="item"><a href="index.php">Αρχική</a></li>
        <li class="item"><a href="more.php">Περισσότερα</a></li>
        <li class="item"><a href="reqs.php">Ελάχιστες Απαιτήσεις</a></li>
        </li>
        <li class="item"><a href="application.php">Αίτηση</a></li>
        <li class="item button"><a href="login.php">Είσοδος</a></li>
        <li class="item button secondary"><a href="sign-up.php">Εγγραφή</a></li>
        <li class="toggle"><span class="bars"></span></li>
    </ul>
</nav>


<div class="container2">
    <div class="content-section"> 

        <div class="card">
            <div class="h2_first">
                <h2>Φόρμα Αίτησης Μετακίνησης</h2> 
            </div> 
            <p class="par">Παρακάτω ακολουθεί η φόρμα αίτησης μετακίνησης ενός φοιτητή/φοιτήτριας  προς  Πανεπιστήμιο  του  εξωτερικού  στο  πλαίσιο  του  Erasmus.</p>
            
            <div class="field1">
                <h1 class="h1_field">Όνομα:</h1>
                <input type="text" id="name" name="name" required><br><br>

            </div>
            <div class="field">
                <h1 class="h1_field">Επίθετο:</h1>
                <input type="text" id="surname" name="surname" required><br><br>
            </div>

            <div class="field">
                <h1 class="h1_field">Αριθμός Μητρώου:</h1>
                <input type="text" id="surname" name="surname" required><br><br>
            </div>

            <div class="field">
                <h1 class="h1_field">Ποσοστό  «περασμένων»  μαθημάτων  έως  και  το  προηγούμενο  έτος:</h1>
                <input type="number" id="inputNumber" name="inputNumber" min="0" max="100" step="1" pattern="[0-9]+" required>

            </div>
            <div class="field">
                <h1 class="h1_field">Μέσος όρος των «περασμένων» μαθημάτων έως και το προηγούμενο έτος σπουδών:</h1>
                <input type="number" id="inputNumber" name="inputNumber" step="1" pattern="[0-9]+" required>
            </div>

            <div class="form_radio_buttons">
                <form>
                    <h1 class="h1_form_radio_buttons">Πιστοποιητικό  γνώσης  της  αγγλικής  γλώσσας:</h1>
                    <label><input type="radio" name="certificate" value="A1"> A1</label><br>
                    <label><input type="radio" name="certificate" value="A2"> A2</label><br>
                    <label><input type="radio" name="certificate" value="B1"> B1</label><br>
                    <label><input type="radio" name="certificate" value="B2"> B2</label><br>
                    <label><input type="radio" name="certificate" value="C1"> C1</label><br>
                    <label><input type="radio" name="certificate" value="C2"> C2</label><br>   
                </form>  
                
                <form>
                    <h1 class="h1_form_radio_buttons">Γνώση επιπλέον ξένων γλωσσών:</h1>
                    <label><input type="radio" name="language" value="Yes"> ΝΑΙ</label><br>
                    <label><input type="radio" name="language" value="ΝΟ"> ΟΧΙ</label><br>    
                </form>   

               

            </div>
            <h1 class="h1_form">Πανεπιστήμιο  -  1η  επιλογή :</h1>
            <div class="auto_form1">
                
                <form> 
                    <br>
                    <select name= "Πανεπιστήμιο_1">
                        <option selected value="1"> University of Barcelona
                        <option value="2"> Hanze University
                        <option value="3"> University of Bologna
                        <option value="4"> University of Vienna
                    </select>
                </form>                 
            </div>

            <h1 class="h1_form">Πανεπιστήμιο  -  2η  επιλογή :</h1>
            <div class="auto_form2">
                
                <form> 
                    <br>
                    <select name= "Πανεπιστήμιο_2">
                    <option selected value="1"> University of Barcelona
                    <option value="2"> Hanze University
                    <option value="3"> University of Bologna
                    <option value="4"> University of Vienna
                    </select>
                </form>                 
            </div>

            <h1 class="h1_form">Πανεπιστήμιο  -  3η  επιλογή :</h1>
            <div class="auto_form3">
                
                <form> 
                    <br>
                    <select name= "Πανεπιστήμιο_3">
                        <option selected value="1"> University of Barcelona
                        <option value="2"> Hanze University
                        <option value="3"> University of Bologna
                        <option value="4"> University of Vienna
                    </select>
                </form>                 
            </div>
            
            <div class="file_upload1">
                <h1 class="h1_form">Αναλυτική βαθμολογία:</h1>
                <form class="upload-form" action="/action_page.php">
                    <div class="file-wrapper">
                        <label class="file-label" for="file-input">Choose File</label>
                        <input id="file-input" class="file-input" type="file">
                        <span class="file-name" data-text=""></span>
                    </div>   
                    <h1 class="h1_form">Πτυχίο αγγλικής γλώσσας:</h1>
                    <div class="file-wrapper2">
                        <label class="file-label2" for="file-input2">Choose File</label>
                        <input id="file-input2" class="file-input" type="file">
                        <span class="file-name2" data-text=""></span>
                    </div>   
                    <h1 class="h1_form">Πτυχία άλλων ξένων γλωσσών :</h1>
                    <div class="file-wrapper3">
                        <label class="file-label3" for="file-input3">Choose Files</label>
                        <input id="file-input3" class="file-input" type="file" multiple>
                        <span class="file-name3" data-text=""></span>
                    </div>    
                    <div class="checkbox-wrapper">
                    <input id="tick-box" type="checkbox">
                    <label for="tick-box">Αποδοχή Όρων</label>
                    </div>
                                                        
                  <input type="submit">                   
                 
                </form>
            </div>
            </div>
              

        </div> 
    </div>
</div>


<footer class="footer">
    <span>Επικοινωνήστε μαζί μας: info@erasmus.gr | Τηλέφωνο: +30 210 1234567</span>
</footer>  


<script>
    const fileInput = document.querySelector('#file-input');
    const fileInput2 = document.querySelector('#file-input2');
    const fileLabel = document.querySelector('.file-name');
    const fileLabel2 = document.querySelector('.file-name2');
    
    fileInput.addEventListener('change', () => {
        const fileName = fileInput.files[0].name;
        fileLabel.setAttribute('data-text', fileName);
        fileLabel.textContent = fileName;
    });
    
    fileInput2.addEventListener('change', () => {
        const fileName = fileInput2.files[0].name;
        fileLabel2.setAttribute('data-text', fileName);
        fileLabel2.textContent = fileName;
    });
</script>

<script>
const fileInput3 = document.getElementById('file-input3');
const fileLabel3 = document.querySelector('.file-label3');
const fileWrapper3 = document.querySelector('.file-wrapper3');
const fileName3 = document.querySelector('.file-name3');

fileInput3.addEventListener('change', function() {
  const files = fileInput3.files;
  if (files.length === 0) {
    fileName3.textContent = '';
  } else {
    fileName3.innerHTML = '';
    for (let i = 0; i < files.length; i++) {
      const span = document.createElement('span');
      span.innerHTML = files[i].name + '<br>';
      fileName3.appendChild(span);
    }
  }
});



</script>


</body>

</html>




