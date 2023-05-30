<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="stylesheet" href="./styles/navbar_footer.css">
<link rel="stylesheet" href="./styles/style_more.css">

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
          <h1>Πληροφορίες</h1>
          <p>Στη σελίδα μας, μπορείτε να βρείτε επιπλέον πληροφορίες και πόρους σχετικά με το Erasmus. Μπορείτε να ανακαλύψετε παρουσιάσεις και βίντεο από τα συνεργαζόμενα πανεπιστήμια, συνεντεύξεις από παλαιούς φοιτητές που έχουν συμμετάσχει στο πρόγραμμα, καθώς και φωτογραφίες από προηγούμενες εμπειρίες Erasmus.</p>
        </div>
      </div>    
    </div>
    
</section>

<div class="container2">
    <div class="content-section"> 

        <div class="card">
            <input id="ch1" type="checkbox">
            <img src="./media/img/erasmus+_logo.jpg">
            <div class="h2_first">
                <h2>Erasmus+ official website</h2> 
            </div> 
            <p>Η επίσημη ιστοσελίδα του προγράμματος Erasmus+ παρέχει πληροφορίες για τα επιμέρους κονδύλια του προγράμματος, τα οφέλη για τους συμμετέχοντες, τους στόχους και την επιτυχία του προγράμματος στην Ευρώπη.</p>
            <div class="read_more_content1">
                <p> Στην ιστοσελίδα μπορείτε να βρείτε πληροφορίες για τη διαδικασία επιλογής, τις δραστηριότητες και τα προγράμματα σπουδών που είναι διαθέσιμα. Επίσης, η ιστοσελίδα περιέχει συνδέσμους για την υποβολή αιτήσεων και τον επίσημο κατάλογο των συνεργαζόμενων ιδρυμάτων σε όλη την Ευρώπη. Υπάρχει επίσης πλούσιο περιεχόμενο σε μορφή βίντεο και φωτογραφιών που παρουσιάζουν τις εμπειρίες προηγούμενων συμμετεχόντων στο πρόγραμμα Erasmus+.</p>
                <label for="ch1">Λιγότερα</label>
            </div>
            <label for="ch1">Περισσότερα</label>
            <div class="link1">
                <a class="button_link" href="https://erasmus-plus.ec.europa.eu/about-erasmus/what-is-erasmus" target="_blank">Learn more</a>
            </div>
        </div> 

        <div class="card">
            <input id="ch2" type="checkbox">
            <img src="./media/img/ESN_logo.png"> 
            <div class="h2_second">
                <h2>Erasmus Student Network</h2> 
            </div>
            <p>Το Erasmus Student Network είναι η μεγαλύτερη ευρωπαϊκή ομάδα φοιτητικής εθελοντικής δράσης, η οποία δραστηριοποιείται σε πάνω από 1000 πανεπιστήμια σε 40 χώρες. Ο στόχος τους είναι να βοηθήσουν τους φοιτητές που συμμετέχουν στο πρόγραμμα Erasmus να απολαύσουν την καλύτερη δυνατή εμπειρία.</p>
            <div class="read_more_content2">
                <p> Στην ιστοσελίδα του Erasmus Student Network, οι φοιτητές μπορούν να βρουν πληροφορίες σχετικά με το πρόγραμμα Erasmus και τη διαμονή τους στο εξωτερικό. Επίσης, μπορούν να ενημερωθούν για τις δραστηριότητες που διοργανώνει το Erasmus Student Network και να συμμετάσχουν σε αυτές.
                    Επιπλέον, η ιστοσελίδα περιλαμβάνει πληροφορίες για τις εθελοντικές ευκαιρίες που προσφέρει το Erasmus Student Network, καθώς και για τον τρόπο με τον οποίο μπορεί κάποιος να γίνει μέλος της ομάδας. Επιπλέον, υπάρχει δυνατότητα επικοινωνίας με το δίκτυο μέσω της ιστοσελίδας.
                </p>
                <label for="ch2">Λιγότερα</label>
            </div>
            <label for="ch2">Περισσότερα</label>
            <div class="link2">
                <a class="button_link" href="https://esn.org" target="_blank">Learn more</a>
            </div> 
        </div> 

        <div class="card">
            <input id="ch3" type="checkbox">
            <img src="./media/img/urodesk_logo.png"> 
            <div class="h2_third">
                <h2>Eurodesk</h2> 
            </div>
            <p>Το Eurodesk προσφέρει πολλές χρήσιμες πληροφορίες σχετικά με τις δυνατότητες που υπάρχουν για νέους στην Ευρώπη, όπως προγράμματα ανταλλαγής και εθελοντισμού, εργασία και μελέτη στο εξωτερικό.</p>
            <div class="read_more_content3">
                <p>Στην ιστοσελίδα μπορείτε να βρείτε επίσης πληροφορίες για διαγωνισμούς, συνέδρια και άλλες εκδηλώσεις που διοργανώνονται στην Ευρώπη για τους νέους. Επιπλέον, παρέχεται υποστήριξη και συμβουλές στους νέους που ενδιαφέρονται να συμμετάσχουν σε προγράμματα ανταλλαγής και εθελοντισμού.</p>
                <label for="ch3">Λιγότερα</label>
            </div>
            <label for="ch3">Περισσότερα</label>
            <div class="link3">
                <a class="button_link" href="https://eurodesk.eu" target="_blank">Learn more</a>
            </div> 
        </div> 

    </div>
</div>

<div class="container3">
    <div class="left-video1">
        <video class="video1" controls>
            <source src="./media/video/Barcelona_erasmus.mp4" type="video/mp4">
          </video>
    </div>

    <div class="right-text1">
        <div class="h2_video1">
            <h2>University of Barcelona</h2> 
        </div>

        <div class="content_video1">
            <p>To Πρόγραμμα Erasmus του Πανεπιστημίου της Βαρκελώνης προσφέρει μια μοναδική ευκαιρία στους φοιτητές που ενδιαφέρονται να σπουδάσουν στο εξωτερικό και να βιώσουν μια εκπαιδευτική εμπειρία διεθνούς φήμης. Οι φοιτητές που επιλέξουν το πρόγραμμα Erasmus της Βαρκελώνης θα έχουν τη δυνατότητα να επιλέξουν από μια μεγάλη ποικιλία μαθημάτων σε διάφορους τομείς, καθώς και να απολαύσουν τον πολιτισμό και τη ζωή στην πόλη της Βαρκελώνης.</p>
        </div>

        <div class="link_video1">
            <a class="button_link" href="https://web.ub.edu/web/ub/" target="_blank">Learn more</a>
        </div> 

    </div>
        
</div>

<div class="container4">
    <div class="left-video2">
        <video class="video2" controls>
            <source src="./media/video/Dutch_erasmus.mp4" type="video/mp4">
          </video>
    </div>

    <div class="right-text2">
        <div class="h2_video2">
            <h2>Hanze University</h2> 
        </div>

        <div class="content_video2">
            <p>Το πρόγραμμα Erasmus του Hanze University στην Ολλανδία προσφέρει στους φοιτητές τη δυνατότητα να αναπτύξουν τις δεξιότητές τους και να ζήσουν μια εμπειρία διαφορετική από την πατρίδα τους.Το Hanze University είναι μια διεθνής σχολή, που έχει πολλές δυνατότητες για τους φοιτητές να αναπτύξουν τις δεξιότητές τους σε ένα διεθνές περιβάλλον. Το πρόγραμμα Erasmus προσφέρει τη δυνατότητα να σπουδάσετε σε μια άλλη χώρα, να γνωρίσετε νέους ανθρώπους και να μάθετε για διαφορετικές κουλτούρες και παραδόσεις. Επίσης, το Hanze University έχει πολλά προγράμματα εκτός του ακαδημαϊκού προγράμματος για τους φοιτητές Erasmus, όπως προγράμματα εκδηλώσεων και εκδρομές.</p>
        </div>

        <div class="link_video2">
            <a class="button_link" href="https://www.hanze.nl/en/study/studying-at-hanze/exchange-programmes" target="_blank">Learn more</a>
        </div> 

    </div>
        
</div>

<footer class="footer">
    <span>Επικοινωνήστε μαζί μας: info@erasmus.gr | Τηλέφωνο: +30 210 1234567</span>
</footer>  

</body>

</html>