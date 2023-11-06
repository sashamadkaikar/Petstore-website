<?php
include('../includes/connect.php');
?>
<style>
   
  @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@600;700&display=swap');
 .ad_button1{
  background-image: linear-gradient(45deg, #F7CE47 0%, #F09819  51%, #e38f04  100%);
  border-radius: 8px;
  border-style: none;
  box-sizing: border-box;
  cursor: pointer;
  flex-shrink: 0;
  
  height: 4rem;
  padding: 0 1.6rem;
  text-align: center;
  text-shadow: rgba(0, 0, 0, 0.25) 0 3px 8px;
  transition: all .5s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  margin:30px;
}
.ad_button1 a {
    text-decoration: none;
    font-family: 'Orbitron';
    color: #ffffff;/* Change this to your desired link color */
    font-size: 20px;
  font-weight: 500;
}

.ad_button1:hover {
  box-shadow: rgba(227, 143, 4, 0.5) 0 1px 30px;
  transition-duration: .1s;
}
</style>


    <button class="ad_button1"><a href="index.php?insert_dogcategories">DOG CATEGORY</a></button>
    <button class="ad_button1"><a href="index.php?insert_catcategory">CAT CATEGORY</a></button>
    <button class="ad_button1"><a href="">OTHERS</a></button>

  