<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link rel="stylesheet" href="./styles/style_index.css">
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
          <h1>Καλωσήρθατε στο πρόγραμμα Erasmus+!</h1>
          <p>Το πρόγραμμα Erasmus+ είναι μια μοναδική ευκαιρία για φοιτητές και νέους επαγγελματίες να αποκτήσουν διεθνείς εμπειρίες και να εμβαθύνουν στις γνώσεις τους. Μέσω του προγράμματος Erasmus+, οι συμμετέχοντες έχουν την ευκαιρία να σπουδάσουν ή να κάνουν πρακτική άσκηση σε ένα ξένο πανεπιστήμιο ή επιχείρηση.Επιπλέον, οι συμμετέχοντες έχουν τη δυνατότητα να γνωρίσουν νέους ανθρώπους από διαφορετικές χώρες, να βιώσουν νέους πολιτισμούς και να βελτιώσουν τις γλωσσικές τους δεξιότητες. Το πρόγραμμα Erasmus+ είναι μια εξαιρετική ευκαιρία για όσους επιθυμούν να αναπτύξουν το προσωπικό και επαγγελματικό τους προφίλ, να εμπλουτίσουν τις γνώσεις τους και να βελτιώσουν τις προοπτικές τους για το μέλλον.</p>
        </div>
      </div>
    </div>
</section>


<footer class="footer">
    <span>Επικοινωνήστε μαζί μας: info@erasmus.gr | Τηλέφωνο: +30 210 1234567</span>
</footer>  

</body>

</html>

