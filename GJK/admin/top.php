<html>
    <head>
<style>
                  .dropbtn {
        background-color: inherit;
        color: black;
        padding: 0px 25px ;
        font-size: 16px;
        border: none;
        width:100%;
        height: 40px;
        min-width: 200px;

      }

      .dropdown {
        position: relative;
        display: inline-block;
      }

      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #141640;
        min-width: 200px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
      }

      .dropdown-content a {
        color: red;
          color: white;

        padding: 12px 16px;
        text-decoration: none;
        display: block;
      }

      .dropdown-content a:hover {background-color: #F03918;}

      .dropdown:hover .dropdown-content {display: block;}

      .dropdown:hover .dropbtn {background-color: #3896a9; color: white;}



            #box{
padding: 15px 10px;
margin: 8px 0 ;
border: 2px solid #EBDEF0;
border-radius: 5%;
}
            ul {
                height: 80px;
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  border: 1px solid #e7e7e7;
  background-color: #f3f3f3;
}

li {
    height: 80px;
  float: left;
}

li a {
    height: 80px;
  display: block;
  color: #666;
  text-align: center;
  padding: 30px 16px;
  text-decoration: none;
  letter-spacing: 2PX;
}


li a.active {
  font-size: 0.5cm;
  color: white;
  background-color: #3896a9;
  letter-spacing: 3px;
}
li a.redcolor {
  color: white;
  background-color: #e1141a;
  font-size: 20px;
}




            .div{
                align: center;
                border-radius: 4px;
                width:100%;
                height:7%;
                background-color: #008CBA;
            }
            .btn {
                border: none;
                background-color: inherit;
                padding: 34px 48px ;
                font-size: 42px;
                cursor: pointer;
                display: inline-block;
                color: white;
            }
            .btn:hover {
                opacity: 0.4;
            }

            .uploadbtn {
                background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
                float: right;
                border-radius: 5px;
            }
            .btncolor{
                background-color: #008CBA;
            }
            .vertical-center {
                margin: 0;
                position: absolute;
                top: 20%;
              }
            .footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #4d4c4c;
   color: white;
   text-align: center;
}
a:hover {
  border-left: 3px solid #3896a9;
  border-right: 3px solid #3896a9;
}
        </style>
        <script src="js/faculty.js" type="text/javascript">

        </script>

    </head>
    <body>




        <ul>
            <li><a class="active" href="bottom.php" target="last" > HOME</a></li>
            <li><a href="viewRecord.php" target="last" >PATIENT RECORDS</a></li>
            <li><a href="../reportType.php" target="last">GENERATE REPORT</a></li>
            <li><a href="accMgmt.php" target="last">ACCOUNT</a></li>
            <li style="float: right;"><div class="dropdown" style="height:700px;">
                        <button class="dropbtn"><b style="letter-spacing: 3px;">Hi,

                     <?php
                     if(!isset($_SESSION)) {
                       session_start();
                     } 
                      echo $_SESSION["username"];
                      ?>

                    </b></button>
                        <div class="dropdown-content"style="height:700px;">
                    <a href="logout.php" class="redcolor" target="_parent">Log out</a>
                </div>
                </div>
            </li>
        </ul>
    </body>
</html>
