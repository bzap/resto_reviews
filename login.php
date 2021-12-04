<?php
    include_once("login_data.php");
?>
<!doctype html>
<!-- This line contains the prefix that allow Open Graph to be implemented -->
<hmtl lang="en" prefix="og: https://ogp.me/ns#">
  <head>
    <!-- 
      This is the metadata to enable adding to the homescreen
      The default meta serves android, while the one specifying apple serves apple
      -->                      
    <meta charset="utf-8">
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="theme-color" content="black">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable = no">    
    <!-- 
      Open Graph and Twitter cards are implemented here
      Twitter cards use the fallback method of Open Graph so I merged a few of the properties 
      --> 
    <title>RestoREVIEWS</title>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@restoREVIEWS" />
    <meta name="twitter:creator" content="@LinasAleknevicius" /> 
    <meta property="og:title" content="RestoREVIEWS" />
    <meta property="og:type" content="review.site" />
    <meta property="og:url" content="index.php" />
    <meta property="og:image" content="https://i.imgur.com/ewqJL3I.png" />
    <meta property="og:description" 
      content="A fantastic local reviews site to see real ratings given by real people." />
    <meta property="og:site_name" content="RestoREVIEWS" />
    <!-- Fav icon support --> 
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- Enabling bootstrap -->   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <!-- Enabling the js functionality as well as animations -->   
    <script src="script.js" defer></script>
    <script src="anim.js" defer></script>
    <!-- Imported animate.css -->   
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
</head>
  <body>
    <!-- 
        This is the container for the navbar, complemented by the dark theming of bootstrap
        There are various uses of bootstrap padding and margin adjustments with the classes 
        --> 
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
      <!-- Provides a toggle bar in responsive mode to hide options --> 
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggle-drop" aria-controls="toggle-drop" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <!-- I added a bootstrap icon next to the text and changed the typography --> 
        <a class="navbar-brand bi-cup-straw" href="index.php"> <strong><i>RestoREVIEWS</i></strong></a>
        <div class="collapse navbar-collapse" id="toggle-drop">
          <!-- 
            Navbar items that are shown on wider screens, and hidden behind the menu otherwise  
            They each link to the respective php pages 
            --> 
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <!-- 
            This php code checks the session variable to see if the user is logged in, and based on that shows the submission section and logging in/logging out
            --> 
          <?php 
                if ($_SESSION['valid']) { ?>
              <li class="nav-item">
              <a class="nav-link" href="logout.php">LOG-OUT</a>
            </li>
            <?php } 
            else{    ?>
              <li class="nav-item">
              <a class="nav-link" href="login.php">LOG-IN</a>
            </li>            
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link" href="registration.php">REGISTER</a>
            </li>
            <?php 
                if ($_SESSION['valid']) { ?>
              <li class="nav-item">
              <a class="nav-link" href="submission.php">SUBMIT</a>
            </li>
            <?php } ?>
          </ul>
          <form class="flex my-5 my-lg-0 " method="post" action="search.php">
            <div class="input-group mr-2">
              <!-- Dropdown button next to the search form to allow changing the filtering --> 
              <button class="btn btn-secondary dropdown-toggle my-2 my-sm-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">Filter</button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Name</a></li>
                <li><a class="dropdown-item" href="#">Rating</a></li>
              </ul>
              <!-- 
                  Search button next to search form 
                  Pressing it links to the search results page 
                  --> 
              <input class="form-control" type="text" id="search_val" name="search_val" placeholder="Search" aria-label="Search">
              <button class="btn btn-secondary" href="search.php" type="submit">Search</button>               
            </div>
          </form>
          <!-- Search by geo-location button -->
          <a class="btn btn-primary ml-2" href="search.php" id="testing" role="button">search by geo-location</a>
        </div>
      </div>
    </nav>
      <!-- 
        This is the container for the registration form
        The elements in this container are divided using the grid system of boostrap 
        It provides responsive resizing of the contents within
        There are various uses of bootstrap padding and margin adjustments with the classes 
        --> 
        
      <div class="form-container pt-5"> 
        <div class="d-flex mt-5 justify-content-center">
          <div class="col-auto">
              <!-- Show the form within a card --> 
              <div class="card shadow-lg p-3 mb-5 bg-white rounded-lg">
                <!-- Header for the entire page --> 
                <h2 class="location-header text-center pt-3 pb-3"><strong>Please login </strong></h2>
                <!-- Form container to contain all the forms --> 
                <form id="registration" class="needs-validation" method="post" action="login_data.php">
                    <hr/>
                    <div class="row justify-content-center">
                      <!-- Email form using bootstraps prepend to show the '@' in a nicer format --> 
                      <label class="pt-1" >Email: </label>
                      <div class="input-group mb-1 col-auto">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email@email.com" aria-label="Email" required>
                      </div>
                      <label class="pt-1" >Password: </label>
                      <div class="input-group mb-1 col-auto">
                      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      </div>
                          <!-- Button to submit and link back to the homepage --> 
                          <div class="row justify-content-center p-3">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>  
                    </div> 
                    <!-- Header for the address --> 

                </form>
              </div>
          </div>
        </div>
      </div>
    <!-- 
      Added JS plugin to the end to improve performance (as per bootstrap recommendation) 
      Only here to enable the togglebar menu in the navbar to collapse while in responsive mode 
    -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script> 
  </body>
</html>