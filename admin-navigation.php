<body>
<div class="adminnavbar-wrapper">
<div class="adminnavbar-sidebar">
    <h2 class="admin-logo">KEJ<span>PlayStation</span></h2>
    <ul id="adnav">
      <li class="adminnav-btn active"><a href="dashboard.php">Dashboard</a></li>
      <li class="adminnav-btn"><a href="gamelist.php">Games</a></li>
      <li class="adminnav-btn"><a href="admin-rented.php">Rented Items</a></li>
      <li class="adminnav-btn"><a href="admin-reserved.php">Reservations</a></li>
      <li class="adminnav-btn"><a href="admin-suggestion.php">Suggestions</a></li>
      <li class="adminnav-btn"><a href="logout.php">Logout</a></li>
    </ul>
</div>
<script>

    var btns = document.getElementById("adnav").getElementsByClassName("adminnav-btn");

    // Loop through the buttons and add the active class to the current/clicked button
    for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function() {
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace(" active", "");
      this.className += " active";
  });
}
</script>