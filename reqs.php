<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="stylesheet" href="./styles/style_reqs.css">
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

<!--Content-->
<section>
    <div class="container">
      <div class="left"></div>
      <div class="right">
        <div class="content">
          <h1>Ελάχιστες Απαιτήσεις</h1>
          <p>Η σελίδα αυτή περιέχει τις ελάχιστες απαιτήσεις για τη συμμετοχή σας στο πρόγραμμα Erasmus+. Εδώ θα βρείτε όλες τις απαραίτητες πληροφορίες σχετικά με τις ακαδημαϊκές απαιτήσεις και τη γλωσσική επάρκεια για το Erasmus+. Πριν υποβάλετε την αίτησή σας, βεβαιωθείτε ότι πληροίτε όλες τις ελάχιστες απαιτήσεις μέσω της παρακάτω φόρμας αυτόματου ελέγχου.</p>
        </div>
      </div>
    </div>
</section>

<div class="container2">
    <div class="content-section"> 

        <div class="card">
            <div class="h2_first">
                <h2>Απαιτήσεις</h2> 
            </div> 
            <p class="par">Παρακάτω ακολουθεί πίνακας που περιέχει συγκεντρωτικά  τις  κατ’  ελάχιστον  απαιτήσεις  για  αίτηση 
                μετακίνησης.</p>
            <div class="table">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Τρέχον έτος σπουδών</th>
                            <th>Ποσοστό «περασμένων» μαθημάτων έως το προηγούμενο έτος σπουδών</th>
                            <th>Μέσος  όρος  των  «περασμένων»  μαθημάτων  έως  το  προηγούμενο  έτος  σπουδών</th>
                            <th>Πιστοποιητικό  γνώσης  της  αγγλικής  γλώσσας</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>>= 2</td>
                            <td>>= 70%</td>
                            <td>>= 6.50</td>
                            <td>>= B2</td>
                        </tr>
                  
                    </tbody>
                </table>
            </div>
            <div class="table_mobile"> 
                <div class="mobile_th mobile_th1">
                    <p class="p_table1_th">Τρέχον έτος σπουδών</p>
                </div>
                <div class="mobile_td">
                    <p class="p_table1_td">>= 2</p>
                </div>
                <div class="mobile_th">
                    <p class="p_table2_th">Ποσοστό «περασμένων» μαθημάτων έως το προηγούμενο έτος σπουδών</p>
                </div>
                <div class="mobile_td">
                    <p class="p_table2_td">>= 70%</p>
                </div>
                <div class="mobile_th">
                    <p class="p_table3_th">Μέσος  όρος  των  «περασμένων»  μαθημάτων  έως  το  προηγούμενο  έτος  σπουδών</p>
                </div>
                <div class="mobile_td">
                    <p class="p_table3_td">6.50</p>
                </div>
                <div class="mobile_th">
                    <p class="p_table4_th">Πιστοποιητικό  γνώσης  της  αγγλικής  γλώσσας</p>
                </div>
                <div class="mobile_td">
                    <p class="p_table4_td">>= B2</p>
                </div>

            </div>
            
        </div> 

        <div class="card">
        <div class="h2_first">
            <h2>Φόρμα Αυτόματου Ελέγχου</h2> 
        </div> 
        <p class="par">Παρακάτω ακολουθεί η φόρμα αυτόματου ελέγχου πληρότητας των ελάχιστων απαιτήσεων.</p>
        <form onsubmit="return validateForm();">
        <div class="auto_form">
            <h1 class="h1_form">Τρέχον έτος σπουδών:</h1>
            <div class="form_options_year">
            <br>
            <select name="currentYear">
                <option value="1">1ο</option>
                <option value="2">2ο</option>
                <option value="3">3ο</option>
                <option value="4">4ο</option>
                <option value="5">Μεγαλύτερο</option>
            </select>
            </div>      
        </div>
        <div class="field1">
            <h1 class="h1_field1">Ποσοστό «περασμένων» μαθημάτων έως και το προηγούμενο έτος:</h1>
            <input type="number" id="inputNumber1" name="inputNumber1" min="0" max="100" step="1" pattern="[0-9]+" required>
        </div>
        <div class="field2">
            <h1 class="h1_field2">Μέσος όρος των «περασμένων» μαθημάτων έως και το προηγούμενο έτος σπουδών:</h1>
            <input type="number" id="inputNumber2" name="inputNumber2"  inputmode="numeric" step="any"  required>
        </div>
        <div class="form_radio_buttons">
            <h1 class="h1_form_radio_buttons">Πιστοποιητικό γνώσης της αγγλικής γλώσσας:</h1>
           
            <label><input type="radio" name="certificate" value="A1"> A1</label><br>
            <label><input type="radio" name="certificate" value="A2"> A2</label><br>
            <label><input type="radio" name="certificate" value="B1"> B1</label><br>
            <label><input type="radio" name="certificate" value="B2"> B2</label><br>
            <label><input type="radio" name="certificate" value="C1"> C1</label><br>
            <label><input type="radio" name="certificate" value="C2"> C2</label><br>
                  
        </div>
        <label><input type="submit" value="Submit"></label><br>  
        
        </form>
        <div id="message" class="message"></div>
        </div>

    </div>
</div>


<footer class="footer">
    <span>Επικοινωνήστε μαζί μας: info@erasmus.gr | Τηλέφωνο: +30 210 1234567</span>
</footer>  

</body>

</html>


<script>
function validateForm() {

    var currentYearField = document.querySelector('select[name="currentYear"]');
    var inputNumber1Field = document.getElementById('inputNumber1');
    var inputNumber2Field = document.getElementById('inputNumber2');
    var certificateFields = document.getElementsByName('certificate');
    var selectedCertificate;
    var check1 = false ;
    var check2 = false ;
    var check3 = false ;
    var check4 = false ;

    var messageElement = document.getElementById('message');
    messageElement.style.display = 'none';


    if( (currentYearField.value >= 2) ){
        check1 = true 
    }else {
        check1 = false  
    }

    if (inputNumber1Field.value >= 70) {
        check2 = true 
    }else {
        check2 = false  
    }

    if (inputNumber2Field.value >= 6.5) {
        check3 = true 
    }else {
        check3 = false  
    }

    for (var i = 0; i < certificateFields.length; i++) {
        if (certificateFields[i].checked) {
            selectedCertificate = certificateFields[i].value;
            break;
        }
    }

    if ( (selectedCertificate == "B2") || (selectedCertificate == "C1") || (selectedCertificate == "C2") )
    {
        check4 = true ;
    }else {
        check4 = false ; 
    }

    if ((check1 == true) && (check2 == true) && (check3 == true) && (check4 == true))
    {
        
        showMessage('Πληρείται τις ελάχιστες απαιτήσεις', 'success');
        
    }else {
        showMessage('Δεν πληρείται τις ελάχιστες απαιτήσεις', 'error');
    }

    function showMessage(message, messageType) {
    var messageElement = document.getElementById('message');
    messageElement.textContent = message;
    messageElement.classList.add(messageType);

    messageElement.style.display = 'block';
    messageElement.style.opacity = 0;

    if (messageType === 'success') {
        messageElement.style.backgroundColor = 'rgba(40, 100, 40, 0.957)';
    } else if (messageType === 'error') {
        messageElement.style.backgroundColor = '#9e1f1fdc';
    }

    var fadeInInterval = setInterval(function() {
        messageElement.style.opacity = parseFloat(messageElement.style.opacity) + 0.05;
        if (parseFloat(messageElement.style.opacity) >= 1) {
            clearInterval(fadeInInterval);
        }
    }, 50);
}



    return false;
}
</script>