<?php
$con=mysqli_connect('localhost','root','','store');
if(!$con){
    die(mysqli_error($con));
}
?>
<!DOCTYPE html>
<head>
<title>Engineering colleges</title>
<style>
body{
background-image: url('mini.jpg');
background-repeat: repeat-y;
background-size: cover;
/* width: 100%;
height: auto; */
}
header{
left: 0%;
top: 0%;
width: 100%;
text-align: center;
margin: 20px;
color: rgb(255, 229, 229);
font-family: 'Times New Roman', Times, serif';
}
a:hover{
text-decoration: none;
color: rgb(255, 229, 229);
}
a:visited{
text-decoration: none;
color: rgb(255, 229, 229);
}
a:link{
text-decoration: none;
color: rgb(255, 229, 229);
}
footer{
position: relative;
left: 0;
bottom: 0;
width: 100%;
color: white;
text-align: center;
}
div{
font-family: 'Times New Roman', Times, serif;
color: aliceblue;
}

.row{
display: flex;
}
.column{
flex: 50%;
padding: 10px;
height: 100%;
}
.motiv{
font-size:5em;
font-style:inherit;
color:lavender;
}
.about_us{
font-family:'Times New Roman', Times, serif;
font-weight: 200;
color:azure;
}
#head{
text-decoration: wavy;
font-family: 'Times New Roman', Times, serif;
font-weight: 400;
font-style: italic;
}
</style>
<meta name = 'viewport' content="width=device-width,initial-scale=1.0">
</head>
<body>
<center>
<header>
<h1 id="head">VoyageVista</h1>
<a href="#home">HOME</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="#university">UNIVERSITY SHORTLIST</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="#examinations">EXAMINATIONS</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="#1">ABOUT US</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href='#contact'>CONTACT</a>
</header>
<div id="home"class="row">
<div class="column">
<br><br><br><br><br><br>
<h1 class="motiv">JOIN WITH US<br>N<br>BRING YOUR DREAMS TO REALITY!</h1>
</div>
<div class="column">
<br><br><br><br><br>
<img src="img1.jpg" width="450" height="550">
</div>
</div>
<div id="university">
    <h1>University Shortlisting</h1>
    <form method="post">
        <label for="greScore">Enter your GRE Score:</label><br>
        <input type="text" id="greScore" name="greScore"><br><br>
        <label for="Ielts">Enter your IELTS Score:</label><br>
        <input type="text" id="Ielts" name="Ielts"><br><br>
        <label for="percentage">Enter your CGPA</label><br>
        <input type="text" id="percentage" name="percentage"><br><br>
        
        <input type="submit" value="Submit" name="submit">
    </form>
    <?php
     $greScore = $_POST['greScore'];
     $ieltsScore = $_POST['Ielts'];
     $cgpa = $_POST['percentage'];
 
     // Query to retrieve universities based on GRE score, IELTS score, and CGPA
     $sql = "select university_name FROM colleges where Gre<=$greScore and Ielts<=$ieltsScore and percentage<=$cgpa";
     $result = $con->query($sql);
 
     if ($result->num_rows > 0) {
         // Output data of each row
         echo "<h3>Results:</h3>";
         while ($row = $result->fetch_assoc()) {
             echo "University: " . $row["university_name"] . "<br>";
         }
     } else {
         echo "<p>No results found.</p>";
     }
 
     $conn->close();
 
 
    ?>
</div>
<div id="examinations"class="row">
<div class="column">
<br><br><br><br><br><br><br>
<img src="img2.jpg" width="700px">
</div>
<div class="column">
<br><br><br><br><br><br>
<h1>EXAMINATIONS</h1><br>
<p>To pursue higher studies after completing undergrad, individuals often need to take standardized exams that assess their academic readiness and subject-specific knowledge. The specific exams depend on the level of study (master's, Ph.D., etc.) and the field of interest. Common exams include:</p>
<br><ul>
<li><h3>Graduate Record Examination (GRE): </h3>Widely accepted for graduate programs globally, GRE assesses analytical writing, verbal reasoning, and quantitative reasoning skills.</li>
<li><h3>Graduate Management Admission Test (GMAT):</h3>Required for admission to MBA programs, GMAT evaluates quantitative, verbal, analytical writing, and integrated reasoning skills.</li>
<li><h3>Test of English as a Foreign Language (TOEFL) or International English Language Testing System (IELTS):</h3>Non-native English speakers usually need to demonstrate English proficiency through TOEFL or IELTS.</li>
<li><h3>Graduate Aptitude Test in Engineering (GATE):</h3>Common in engineering and technology fields, GATE evaluates comprehensive understanding and knowledge.</li>

</ul>
</div>
</div>
<div id="1" class="row">
<div class="column">
<br><br><br><br><br><br><br>
<img src="img3.jpg" width="600">
</div>
<div class="column">
<br><br><br><br><br><br>
<h1>ABOUT US</h1>
<h3 class="about_us">Here, we at VoyageVista, having the vission that states "Journey with a View and Travel with a Vision", believe that education knows no borders, and every student deserves the opportunity to embark on a transformative academic journey. At Voyage Vista, we are passionate about guiding students towards their dreams of studying abroad, exploring new horizons, and embracing a world of educational possibilities.<br>
<br>Why Choose VoyageVista?<br>
<ul>
<li>Global Network: With an extensive network of partner institutions, we open doors to a diverse range of educational opportunities worldwide. Whether you seek renowned universities, specialized programs, or unique cultural experiences, we've got you covered.</li>
<li>Cultural Immersion: We believe that education extends beyond the classroom. Voyage Vista promotes cultural immersion by offering insights into the local lifestyle, traditions, and community engagement opportunities in your chosen destination.</li>
<li>Personalized Guidance: We understand that each student is unique. Our experienced team of consultants takes the time to understand your academic aspirations, preferences, and goals to tailor a study abroad plan just for you.</li>
</ul>
<br>Our Commitment:<br><br>
VoyageVista is more than a consultancy; we are your partners in education. Our commitment is to inspire, guide, and support you throughout your study abroad journey, ensuring a seamless and enriching experience.
Embark on your educational adventure with Voyage Vista, where every step is a stride toward a brighter, globally informed future.</h3>
</div>
</div>
<div id="contact" class="row">
<div class="column">
<br><br><br><br><br>
<h1>CONTACT US</h1>
<br>
<p>We would love to hear from you and assist you on your journey to studying abroad. Feel free to reach out to us through the following channels:</p>
<br>
<h3>Email:</h3><br>
<p>General Inquires: yus21cs@cmrit.ac.in</p>
<p>Cunsultation requests: dem21cs@cmrit.ac.in</p><br>
<h3>Phone:</h3><br>
<p>Customer Support: +919035438999 </p>
<p>Cunsultation hotline: +919035438999</p><br>
<h3>Office Address:</h3><br>
VoyageVista Consultancy
<p>#264, Mallesh Palya Main Road, NT Post,<br>Bengaluru,Karnataka,560075,<br>India</p>
</div>
<div class="column">
<br><br><br><br><br><br><br><br><br><br>
<img src="contact.jpg" width="350" height="450">
</div>
</div>
<footer>
<br><br><br><br><br><br>
<center>
<table width="50%%">

</table>
</center>
</footer>
</center>
</body>
</html>