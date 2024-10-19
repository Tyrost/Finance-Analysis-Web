<?php 

session_start();

$logged = isset($_SESSION['logged-in']) && $_SESSION['logged-in'] == true;

$subscribed = isset($_SESSION['newsletter_sub']) && $_SESSION['newsletter_sub'] == true;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Display</title>
    <link rel="stylesheet" href="/frontend/components/main_page.css">
    <link rel="stylesheet" href="/frontend/components/general.css">
  
</head>

<body>

  <div class="earth"></div>
    <div class="top_options_panel">
        <button class="menu" name="main_home_btn" onclick="window.location.href='index.php';">Home</button>
        <button class="menu" name="main_data_btn" onclick="window.location.href='/frontend/html/data_page.php';">Data</button>
        <button class="menu" name="main_markets_btn" onclick="window.location.href='/frontend/html/markets_page.html';">Markets</button>
        <button class="menu" name="main_countries_btn" onclick="window.location.href='/frontend/html/countries_page.html';">Countries</button>
        <button class="menu" name="main_news_btn" onclick="window.location.href='/frontend/html/news_page.html';">News</button>
    </div>

    <div class="main_login_container">
    
    <?php
    if (!$logged) {
        echo "<button class='menu' name='main_signup_btn' style='width: auto;' onclick=\"window.location.href='/frontend/html/login_page.html';\">Log In</button>";
    } else {
        echo "<button class='menu' name='main_signup_btn' style='width: auto;'>My Profile</button>";
    }
    ?>
          
      <div class="main_user_profile_logo">
      </div>
    </div>

    <div class="main_background_container">

        <div class="trigger"></div>
        <div class="trigger"></div>
      
        <div class="monitor">
          <div class="camera o-x">
            <div class="camera o-y">
              <div class="camera o-z">
                <div class="vr">
                  <div class="vr_layer">
                    
                    <div class="vr_layer_item"></div>
                    
                  </div>
                  <div class="vr_layer">
                    <div class="vr_layer_item"></div>
                  </div>
                  <div class="vr_layer">
                    
                    <div class="vr_layer_item"></div>
                    
                  </div>
                  <div class="vr_layer">
                    <div class="vr_layer_item"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
            <span class="title_text" style="width: auto;">World of Finance</span>
    
        </div>
    </div>

    <div class="main_lowerbackground_container" style="position: fixed; min-height: 600px; background: #333; color: white;"></div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="bottom-panel-section">
      <div class="panel-content">
        <h3 class="more-info-text" style="top: 40px; color: #9b8686;">Want more information?</h3>
        <h3 class="more-info-text" style="top: 55px; color: #ffffff; font-size: 30px;">Subscribe to our newsletter!</h3>

        <div class="input-group" style="display: flex; flex-direction: row; gap: 15px; position: absolute; top: 70px; left: 45%;">
        <?php
        if (!$subscribed) {
            echo '<form action="/backend/php/newsletter.php" method="post" style="display: flex; flex-direction: row; gap: 15px;">
                <div class="input-box" style="position: relative; flex: 1;">
                    <input type="email" name="newsletter_email" required placeholder="Email" 
                          style="width: 80%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;">
                </div>
                <div class="input-box" style="position: relative; flex: 1;">
                    <input type="text" name="newsletter_name" required placeholder="Name" 
                          style="width: 80%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px;">
                </div>
                <input type="submit" name="submit-login" value="Subscribe" 
                      style="padding: 12px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; max-width: 200px;">
            </form>';
        } else {
            echo '<h4 style="position: absolute; color: white; font-family:sans-serif; width:400px; left:80px;">
            Thank you for subscribing! We will update you about financial changes around the world.</h4>';
        }
        ?>
        </div>

        <div class="menu-images-container">
          <div class="info-container">
            <h1 style="margin-top: 30%; margin-left: 10%;">Data</h1>
            <a href="/frontend/html/data_page.html">
              <div class="menu-img" id="data-img" style="background-image: url(./frontend/components/pictures/data-img.jpg);"></div>
            </a>
        
            <div class="data-paragraph" id="data-text">
              The shared data is crafted to provide you with swift, comprehensive insights into essential statistics, emerging trends, and the latest updates. Whether you're diving into raw numbers or seeking a broader overview, this section ensures you're always informed with precision and clarity. From detailed metrics to high-level summaries, we make it effortless to stay ahead of the curve and fully understand the information that matters most.
            </div>
            
          </div>
          <div class="info-container">
            <h1 style="margin-top: 38%; margin-left: 60%;">Markets</h1>
            <a href="/frontend/html/markets_page.html">
              <div class="menu-img" id="markets-img" style="background-image: url(/frontend/components/pictures/markets-img.jpg);"></div>
            </a>
        
            <div class="data-paragraph" id="markets-text">
              The markets section is your go-to for real-time updates and detailed insights into financial markets. Whether you're tracking stocks, commodities, or global indices, this section delivers up-to-the-minute data and trends to keep you informed. From quick snapshots to in-depth analysis, it’s designed to make navigating market movements simple and accessible.
              
            </div>
            
          </div>
          <div class="info-container">
            <h1 style="margin-top: 46%; margin-left: 1%;">Countries</h1>
            <a href="/frontend/html/countries_page.html">
              <div class="menu-img" id="countries-img" style="background-image: url(/frontend/components/pictures/countries-img.jpg);"></div>
            </a>
        
            <div class="data-paragraph" id="countries-text">
              We provide a comprehensive look at the economic health of nations around the world. From GDP growth and inflation rates to employment statistics and trade balances, this section delivers the key indicators you need to understand a country’s financial standing. Whether you're comparing economies or diving into a specific nation’s data, you’ll find everything laid out clearly to keep you informed on a global scale.
            </div>
            
          </div>
          <div class="info-container">
            <h1 style="margin-top: 54%; margin-left: 64.5%;">News</h1>
            <a href="/frontend/html/news_page.html">
              <div class="menu-img" id="news-img" style="background-image: url(/frontend/components/pictures/news-img.jpg);"></div>
            </a>
        
            <div class="data-paragraph" id="news-text">
              Stay on top of the latest headlines with the news section, where we bring you real-time updates and stories that matter. Covering everything from global events and business developments to market shifts and policy changes, this section ensures you're always in the know. With a mix of breaking news and deeper analysis, you can easily stay connected to what’s happening around the world.
            </div>
            
          </div>

        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>




      </div>
    </div>

<script>

let lastScrollTop = 0;

window.addEventListener('scroll', function() {
  const panelSection = document.querySelector('.bottom-panel-section');
  const scrollPosition = window.pageYOffset || document.documentElement.scrollTop;

  if (scrollPosition > 400 && scrollPosition > lastScrollTop) {
    panelSection.classList.add('active');
  }
 
  else if (scrollPosition < 400) {
    panelSection.classList.remove('active');
  }

  lastScrollTop = scrollPosition;
});

</script>


</body>

</html>

