<div class="adminnavbar-wrapper">
<div class="adminnavbar-sidebar">
    <h2 class="admin-logo">KEJ<span>PlayStation</span></h2>
    <ul id="wew">
    <li class="adminnav-btn active"><a href="dashboard.php">Dashboard</a></li>
    <li class="adminnav-btn"><a href="addgame.php">Games</a></li>
    <li class="adminnav-btn"><a href="">Rented Items</a></li>
    <li class="adminnav-btn"><a href="">Reservations</a></li>
    <li class="adminnav-btn"><a href="">Suggestions</a></li>
    <li class="adminnav-btn"><a href="logout.php">Logout</a></li>
    </ul>
</div>
<script>

    var btns = document.getElementById("wew").getElementsByClassName("adminnav-btn");

    // Loop through the buttons and add the active class to the current/clicked button
    for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>