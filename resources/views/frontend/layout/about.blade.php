@extends('frontend.layout.header')
<style>
     *{
            margin:0;
            padding:0;
            overflow-x: hidden;
        }
  
       
  
        /* :root {
            --navbar-height: 59px;
        } */
        .logo {
            width: 20%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
  
        .logo img {
            width: 33%;
            border: 2px solid white;
            border-radius: 50px;
        }
        /* .navbar {
            display: flex;
            align-items: center;
            justify-content: center;
            position: sticky;
            top: 0;
            cursor: pointer;
        } */
  
        /* .nav-list {
            width: 70%;
            display: flex; 
        } */
  
        /* .nav-list li {
  
            list-style: none;
            padding: 2px 6px;
        }
   */
        /* .nav-list li a {
  
            text-decoration: none;
            color: white;
        } */
  
        /* .nav-list li a:hover {
            color: grey;
        } */
        /* #search {
            padding: 5px;
            font-size: 17px;
            border: 2px solid grey;
            border-radius: 9px;
        } */
  
       
  
        .firstsection {
            height: 100vh;
        }
  
        .box-main {
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            max-width: 50%;
            margin: auto;
            height: 80%;
        }
        .firstHalf {
            width: 75%;
            display: flex;
            flex-direction: column; 
            justify-content: center
        }
  
        .firstHalf img {
            display: flex;
            border-radius: 9050px;
        }
  
        .text-big {
            font-family: 'Piazzolla', serif;
            font-weight: bold;
            font-size: 41px;
            text-align: center;
        }
  
        .text-small {
            font-family: 'Sansita Swashed', cursive;
            font-size: 18px;
            text-align: center;
        }
  
        #service {
            margin: 34px;
            display: flex;
        }
        #service .box {
            padding: 100px;
            margin: 3px 6px;
            border-radius: 28px;
        }
  
        #service .box img {
            margin-top: 10px;
            height: 150px;
            margin: auto;
            display: block;
            border-radius: 200px;
        }
  
        #service .box p {
  
            font-family: sans-serif;
            text-align: center;
        }
  
        #services {
            margin: 34px;
            display: flex;
        }
  
        #services .box {
  
            padding: 100px;
            margin: 3px 6px;
            border-radius: 28px;
        }
        #services .box img {
            margin-top: 10px;
            height: 150px;
            margin: auto;
            display: block;
            border-radius: 100px;
        }
  
        #services .box p {
  
            font-family: sans-serif;
            text-align: center;
        }
  
      
  
        .center {
            text-align: center;
        }
        /* .text-footer {
            text-align: center;
            padding: 10px 0;
            font-family: 'Ubuntu', sans-serif;
            display: flex;
            justify-content: center;
        } */
        @media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

.alisha {
    max-width: 600px; /* Adjust the width as per your design */
    margin: 0 auto; /* This will center the element horizontally */
    text-align: center;
}








  
</style>

@section('content')




<html>
<head>
    <title>About Us</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

    <section class="service">
    <h1 class="h-primary center" style="margin-top:30px;text-align:center;">
    What's so unique about Store?
        </h1>
        <div class="alisha">
        <p style="margin-left: auto; margin-right: auto; text-align: justify;">
  As a seller of Cosmetics and Skincare, I'm thrilled to offer the best products to heal and enhance younger-looking skin worldwide. For women, proper skincare is crucial for perfect-looking makeup, bringing out their natural beauty. And for men, it's essential to maintain healthy, clean, and youthful skin. Our products are Gluten-Free, Paraben-Free, Vegan, and E.U. Registered, made with the highest quality ingredients and ethical standards. Plus, we never test on animals, as we are committed to cruelty-free practices. Choose our products for effective and ethical skincare that promotes beauty and well-being.
</p>

        
        </div>
    <div id="services">
            <div class="box">
            <img src="{{ asset('frontend/img/Cosmetics-e-commerce-platform-built-with-online-cosmetics-store-script.jpg') }}" alt="Cosmetics and Skincare" />
              
                <p class="center">
                    <a href="#xyz" style="text-decoration:none;color:black;
        font-weight:bold;font-family: 'Langar', cursive;">
                        Our Mission
                    </a>
                </p>
                <p style="font-family: sans-serif">Our mission is to give our clients the best <br>and most cost effective products<br> we can withnin a given specification and<br> through effective training and controls systems<br> we strive for a "right first time" mentally.</p>
            </div>
            <div class="box">
            <img src="{{ asset('frontend/img/Cosmetics-e-commerce-platform-built-with-online-cosmetics-store-script.jpg') }}" alt="Cosmetics and Skincare" />
                  
                <p class="center">
                    <a href="#abc" style="text-decoration:none;color:black;
        font-weight:bold;font-family: 'Langar', cursive;">
                        Quality Assurance
                    </a>
                </p>
                  
                
                <p style="font-family: sans-serif ">We are regularly audited and <br>have achieved a very high standard in quality control</p>
            </div>
            <div class="box">
            <img src="{{ asset('frontend/img/Cosmetics-e-commerce-platform-built-with-online-cosmetics-store-script.jpg') }}" alt="Cosmetics and Skincare" />
                <br>
                <p class="center">
                    <a href="#xyz" style="text-decoration:none;color:black;
           font-weight:bold;font-family: 'Langar', cursive;">
                        Technology and services
                    </a>
                </p>
                <p style="font-family: sans-serif ">  I'm thrilled to offer the best products <br>enhance younger-looking skin worldwide.<br>Our products are made with quality ingredients<br> and ethical standards. we never test on animals,<br>Choose our products for effective skincare.</p></p>
  
            </div>
        </div>
      
    </section>
  
    
</body>
</html>



@endsection
