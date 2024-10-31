<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Crypto Tracker</title>
  <style>
    #searchInput{
      width: 300px;
      height:30px;
      margin-left: 50px;
      border: 2px solid;
    }
    h1{
      color:gold;
      text-align: center;
      font-weight: bolder;
      font-size: 80px;
      border-bottom: 2px solid;
      border-top: 2px solid;
    
    }
    #searchbutton{
      background-color:blue;
      color:yellow;
      height: 30px;
      border: 2px solid;
    }

    #TopGainers{
      background-color:green;
      color:black;
      height: 30px;
      border: 2px solid;
    }
    #TopLosers{
      background-color:red;
      color:black;
      height: 30px;
      border: 2px solid; 
    }
    #NewListed{
      background-color:bisque;
      color:black;
      height: 30px;
      border: 2px solid; 
    }
    
    #logout{
      background-color:orange;
      color:black;
      height: 30px;
      border: 2px solid; 
    }
    
    #portfilio
    {
    background-color:yellow;
      color:green;
      height: 30px;
      border: 2px solid;} 
   
   
    #report{
    background-color:violet;
      color:blue;
      height: 30px;
      border: 2px solid;
    
    }
    
   
    body{
      background-color: rgb(52, 49, 49);
    }
    
    
    
  span{
  
  
  margin-left:480px;
  color:gold;
  font-weight:bolder;
  
  }
   
  </style>
</head>
<body>
  <header>
    <h1>CryptoDime Trek</h1>
  </header>
  <div class="search-container">
    <input type="text" id="searchInput" placeholder="Search by name...">
    <button onclick="searchCrypto()" id="searchbutton">Search</button>
    <button onclick="RedirectToTopGainers()" id="TopGainers">Top Gainers</button>
    <button onclick="RedirectToTopLosers()" id="TopLosers">Top Losers</button>
    <button onclick="RedirectToNewListedCoins()" id="NewListed">New Listed</button>
    <button onclick="RedirectToPortfolio()" id="portfilio">View Portfolio</button>
    <button onclick="RedirectToreport()" id="report">Portfolio Report</button>
    <?php 
       session_start();
      $val=$_SESSION["username"];
      
          echo "<span> Welcome $val !</span>";
     ?>
      <button onclick="logout()" id="logout">Log Out</button>
  </div>
  <div class="crypto-container" id="crypto-container">
  
  </div>
  <script src="script.js"></script>
  
</body>
</html>
