<?php
include_once("individual.php");

?>
<?php
while ($row = $result_2->fetch_assoc()) {
  printf("%s (%s)\n", $row["remail"], $row["review"]);
}
?>

<!doctype html>
<!-- This line contains the prefix that allow Open Graph to be implemented -->
<html lang="en" prefix="og: https://ogp.me/ns#">
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
                <li class="nav-item">
                  <a class="nav-link" href="registration.php">LOG-IN</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="registration.php">REGISTER</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="submission.php">SUBMIT</a>
                </li>
              </ul>
              <form class="flex my-5 my-lg-0">
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
                  <input class="form-control mr-2 my-2 my-sm-0" type="search" placeholder="Search" aria-label="Search">
                  <a class="btn btn-secondary my-2 my-sm-0" href="search.php" role="button">search</a>
                  <a class="btn btn-primary ml-2" href="search.php" id="testing" role="button">search by geo-location</a>
                </div>
              </form>
            </div>
          </div>
        </nav>
  <!-- 
    This is the container for the restaurant object form
    The elements in this container are divided using the grid system of boostrap 
    There are various uses of bootstrap padding and margin adjustments with the classes 
    -->   
  <div class="results-container pt-5">
    <div class="d-flex mt-5 justify-content-center">
      <div class="col-md-6">
        <!-- Show the form within a card --> 
        <div class="card shadow-lg p-3 mb-5 bg-white rounded-lg">
          <!-- Header for the entire page -->
          <h2 class="name-header text-center pt-3"><strong><i>Bento Sushi</i></strong></h2>
          <hr>
          <!-- Implement the map screenshot using bootstrap, provides responsive scaling using 'image-fluid' -->



          <div class="d-flex mt-5 justify-content-center align-items-center pb-5"> 
            <div style="height: 300px; width: 400px" id="map"></div>
          </div>
          <!-- Implement schema place microdata within this div section -->
          <div itemscope itemtype="https://schema.org/Place">
            <!-- Sample description of the restaurant, implementing 'description' for schema -->
            <div itemprop="description" class="row pt-2 px-1 pt-4 pr-3 pl-3 text-center justify-content-center">
              <p>Bento Sushi is North America’s second largest sushi brand providing the highest quality packaged sushi and ready to heat/made to order hot Asian food.</p>
            </div>
            <hr>
            <!-- Container for the location -->
            <div class="row g-5 pt-2 px-1">
              <div class="col-md-3">
                <h4 class="location-header"><strong>Location:</strong></h4>
              </div>
              <!-- Sample location of the restaurant, implementing 'address' for schema -->
              <div itemprop="address" class="col-md-8 pt-1 align-items-left">
                <p>751 Upper James St, Hamilton, ON L9C 3A1</p>
              </div>
            </div>
            <hr>
            <h3 class="name-header text-center pt-3"><strong>User submitted videos</strong></h3>
            <!-- php5 implementation of video submissions -->
            <div class="row justify-content-center pb-3">
              <video class="p-3" width="320" height="240" controls=""><source src="videos/bento.mp4" type="video/mp4"></video> 
              <video class="p-3" width="320" height="240" controls=""><source src="videos/bento.mp4" type="video/mp4"></video>
            </div>
          </div>
          <hr>
          <!-- Implement schema review microdata within this div section -->
          <div itemscope itemtype="https://schema.org/Review">
            <h3 class="name-header text-center pb-2 pt-3"><strong>Reviews and Ratings</strong></h3>
            <!-- Sample average review of the restaurant, implementing 'aggregateRating' for schema -->
            <h5 itemprop="aggregateRating" class="name-header text-center"><i>AVG: 4.5 / 5</i></h5>
            <!-- Implement the review list using bootstrap media, which provides responsive resizing and better formatting -->
            <ul class="list-unstyled">
              <!-- There are multiple sample reviews and ratings (ones without comments) hardcoded in this section -->
              <?php 
                while($row = $result_2->fetch_assoc() ) { ?>
                <li class="media my-3">
                <!-- Each reviewer has a placeholder face image, implemented using bootsrap -->
                  <img class="mr-5 ml-1 align-self-center" src="images/placeholder.png" alt="...">
                  <div class="media-body">
                    <!-- Each reviewer has a name, rating and sometimes may have comments submitted -->
                    <h5 itemprop="author" class="mt-0 mb-1"><?php echo $row['remail']; ?></h5>
                    <h6 itemprop="reviewRating" class="mt-0 mb-1 text-muted">5 / 5</h6><span itemprop="reviewBody"><?php echo $row['review']; ?></span>
                  </div>
                </li>
              <?php } ?>
            </ul>

            <?php 
                while($row = $result_2->fetch_assoc() ) { ?>
              <div class="media">
                <div class="media-body">
                  <h5 class="mt-0 mb-1">Media object</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
                <img class="ml-3" src="..." alt="Generic placeholder image">
              </div>
              <?php } ?>


          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- 
      Added JS plugin to the end to improve performance (as per bootstrap recommendation) 
      Only here to enable the togglebar menu in the navbar to collapse while in responsive mode 
      Also added the google map api which calls initMapIndividual as to initialize on this page
  -->   
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
  <script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCosFB-HC5f7kzHfNO5jBLU_k9mFeiFc8&callback=initMapIndividual&v=weekly&channel=2"
  async
  ></script>
</body>
</html>