<?php
if (isset($_POST["resbtn"]) && isset($_POST["date"]) && isset($_POST["time"]) && isset($_POST["seat"])){
    require "customer/reservation.php";
}

$disable = "disabled";
if(isset($_SESSION['resId']) && $_SESSION["verified"] == 1){
    $disable = "";
}
else if(isset($_SESSION['cusId']) && $_SESSION['verified'] == 1){
    $disable = "";
}
?>
<!-- modal start
    <div class="modal fade" id="srchModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content mx-auto" style="max-width: 500px">
                <div class="modal-header">
                    <h1>Reservation</h1>
                </div>
                <div class="modal-body">
                    <form action="landing.php" method="POST">
                            <input type="hidden" id="rid" name ="rid">
                        <div class="form-group">
                            <label for="rname">Restaurant Name</label>
                            <input type="text" class="form-control" id="rname" name="rname" readonly>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" >
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" class="form-control" id="time" name="time">
                        </div>
                        <div class="form-group">
                            <label for="seat">Seats</label>
                            <input type="number" min="1"class="form-control" id="seat" name="seat" placeholder="Number of Seats">
                        </div>
                        <fieldset class="border p-2">
                            <legend  class="w-auto">Menu</legend>
                                <table id="table" class="table table-bordered table-striped"> 
                                    <thead class="text-light bg-dark" style="height:30px">
                                        <tr>      
                                            <th>Item Name</th>     
                                            <th>item Price</th>       
                                        </tr>  
                                    </thead>   
                                </table>
                        </fieldset>                         
                </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="resbtn">Reserve</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
 modal end-->

 
 <div class="container">
    <h4 class="mt-1"><?php if(isset($_SESSION["fName"])){echo "Account name: " . $_SESSION["fName"] . " " . $_SESSION["lName"]; }?></h4>
    <div class="jumbotron jumbotron-fluid py-2 mt-3" style="height: 700px">
        <div class="container">
            <h1 class="display-4">Restaurants</h1>
            <hr>
            <form class="form-inline" action="landing.php" method = "post">
                <div class="form-group pl-2">
                    <input class= "form-control" type="text" name="resName" placeholder="Restaurant Name">
                    <select class="form-control ml-2" name="city">
                        <option value="">City</option>
                        <option value="Caloocan">Caloocan</option>
                        <option value="Las Piñas">Las Piñas</option>
                        <option value="Makati ">Makati </option>
                        <option value="Malabon">Malabon</option>
                        <option value="Mandaluyong">Mandaluyong</option>
                        <option value="Manila">Manila</option>
                        <option value="Marikina">Marikina</option>
                        <option value="Muntinlupa">Muntinlupa</option>
                        <option value="Navotas">Navotas</option>
                        <option value="Parañaque">Parañaque</option>
                        <option value="Pasay">Pasay</option>
                        <option value="Pasig ">Pasig </option>
                        <option value="Quezon City">Quezon City</option>
                        <option value="San Juan">San Juan</option>
                        <option value="Taguig">Taguig</option>
                        <option value="Valenzuela">Valenzuela</option>
                        <option value="Butuan">Butuan</option>
                        <option value="Cabadbaran">Cabadbaran</option>
                        <option value="Bayugan">Bayugan</option>
                        <option value="Legazpi">Legazpi</option>
                        <option value="Ligao">Ligao</option>
                        <option value="Tabaco">Tabaco</option>
                        <option value="Isabela">Isabela</option>
                        <option value="Lamitan">Lamitan</option>
                        <option value="Balanga">Balanga</option>
                        <option value="Batangas City">Batangas City</option>
                        <option value="Lipa">Lipa</option>
                        <option value="Tanauan">Tanauan</option>
                        <option value="Baguio">Baguio</option>
                        <option value="Tagbilaran">Tagbilaran</option>
                        <option value="Malaybalay">Malaybalay</option>
                        <option value="Valencia">Valencia</option>
                        <option value="Malolos">Malolos</option>
                        <option value="Meycauayan">Meycauayan</option>
                        <option value="San Jose del Monte">San Jose del Monte</option>
                        <option value="Tuguegarao">Tuguegarao</option>
                        <option value="Iriga">Iriga</option>
                        <option value="Naga">Naga</option>
                        <option value="Roxas">Roxas</option>
                        <option value="Bacoor">Bacoor</option>
                        <option value="Cavite City">Cavite City</option>
                        <option value="Dasmariñas">Dasmariñas</option>
                        <option value="Imus">Imus</option>
                        <option value="Tagaytay">Tagaytay</option>
                        <option value="Trece Martires">Trece Martires</option>
                        <option value="Bogo">Bogo</option>
                        <option value="Carcar">Carcar</option>
                        <option value="Cebu City">Cebu City</option>
                        <option value="Danao">Danao</option>
                        <option value="Lapu-Lapu">Lapu-Lapu</option>
                        <option value="Mandaue">Mandaue</option>
                        <option value="Naga">Naga</option>
                        <option value="Talisay">Talisay</option>
                        <option value="Toledo">Toledo</option>
                        <option value="Kidapawan">Kidapawan</option>
                        <option value="Panabo">Panabo</option>
                        <option value="Samal">Samal</option>
                        <option value="Tagum">Tagum</option>
                        <option value="Davao City">Davao City</option>
                        <option value="Digos">Digos</option>
                        <option value="Mati">Mati</option>
                        <option value="Borongan">Borongan</option>
                        <option value="Batac">Batac</option>	
                        <option value="Laoag">Laoag</option>	
                        <option value="Candon">Candon</option>	
                        <option value="Vigan">Vigan</option>	
                        <option value="Iloilo City">Iloilo City</option>
                        <option value="Passi">Passi</option>	
                        <option value="Cauayan">Cauayan</option>	
                        <option value="Ilagan">Ilagan</option>	
                        <option value="Santiago">Santiago</option>
                        <option value="Tabuk">Tabuk</option>	
                        <option value="San Fernando">San Fernando</option>	
                        <option value="Biñan">Biñan</option>	
                        <option value="Cabuyao">Cabuyao</option>	
                        <option value="Calamba">Calamba</option>
                        <option value="San Pablo">San Pablo</option>
                        <option value="Santa Rosa">Santa Rosa</option>
                        <option value="San Pedro">San Pedro</option>
                        <option value="Iligan">Iligan</option>	
                        <option value="Marawi">Marawi</option>	
                        <option value="Baybay">Baybay</option>	
                        <option value="Ormoc">Ormoc</option>	
                        <option value="Tacloban">Tacloban</option>	
                        <option value="Cotabato City">Cotabato City</option>
                        <option value="Masbate City">Masbate City</option>
                        <option value="Oroquieta">Oroquieta</option>
                        <option value="Ozamiz">Ozamiz</option>
                        <option value="Tangub">Tangub</option>
                        <option value="Cagayan de Oro">Cagayan de Oro</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Gingoog">Gingoog</option>
                        <option value="Bacolod">Bacolod</option>
                        <option value="Bago">Bago</option>
                        <option value="Cadiz">Cadiz</option>
                        <option value="Escalante">Escalante</option>
                        <option value="Himamaylan">Himamaylan</option>
                        <option value="Kabankalan">Kabankalan</option>
                        <option value="La Carlota">La Carlota</option>
                        <option value="Sagay">Sagay</option>
                        <option value="San Carlos">San Carlos</option>
                        <option value="Silay">Silay</option>
                        <option value="Sipalay">Sipalay</option>
                        <option value="Talisay">Talisay</option>
                        <option value="Victorias">Victorias</option>
                        <option value="Bais">Bais</option>
                        <option value="Bayawan">Bayawan</option>
                        <option value="Canlaon">Canlaon</option>
                        <option value="Dumaguete">Dumaguete</option>
                        <option value="Guihulngan">Guihulngan</option>
                        <option value="Tanjay">Tanjay</option>
                        <option value="Cabanatuan">Cabanatuan</option>
                        <option value="Gapan">Gapan</option>
                        <option value="Muñoz">Muñoz</option>
                        <option value="Palayan">Palayan</option>
                        <option value="San Jose">San Jose</option>
                        <option value="Calapan	Oriental">Calapan	Oriental</option>
                        <option value="Puerto Princesa">Puerto Princesa</option>
                        <option value="Angeles">Angeles</option>
                        <option value="Mabalacat ">Mabalacat </option>
                        <option value="San Fernando">San Fernando</option>
                        <option value="Alaminos">Alaminos</option>
                        <option value="Dagupan">Dagupan</option>
                        <option value="San Carlos">San Carlos</option>
                        <option value="Urdaneta">Urdaneta</option>
                        <option value="Lucena">Lucena</option>
                        <option value="Tayabas">Tayabas</option>
                        <option value="Antipolo">Antipolo</option>
                        <option value="Calbayog">Calbayog</option>
                        <option value="Catbalogan">Catbalogan</option>
                        <option value="Sorsogon City">Sorsogon City</option>
                        <option value="General Santos">General Santos</option>
                        <option value="Koronadal">Koronadal</option>
                        <option value="Maasin">Maasin</option>
                        <option value="Tacurong">Tacurong</option>
                        <option value="Surigao City">Surigao City</option>
                        <option value="Bislig">Bislig</option>
                        <option value="Tandag">Tandag</option>
                        <option value="Tarlac City">Tarlac City</option>
                        <option value="Olongapo">Olongapo</option>
                        <option value="Dapitan">Dapitan</option>
                        <option value="Dipolog">Dipolog</option>
                        <option value="Pagadian">Pagadian</option>
                        <option value="Zamboanga City">Zamboanga City</option>
                    </select>
                    <select class= "form-control ml-2" name="prov">
                        <option value="">Province</option>
                        <option value="Abra">Abra</option>
                        <option value="Agusan del Norte">Agusan del Norte</option>
                        <option value="Agusan del Sur">Agusan del Sur</option>
                        <option value="Aklan">Aklan</option>
                        <option value="Albay">Albay</option>
                        <option value="Antique">Antique</option>
                        <option value="Apayao">Apayao</option>
                        <option value="Aurora">Aurora</option>
                        <option value="Basilan">Basilan</option>
                        <option value="Bataan">Bataan</option>
                        <option value="Batanes">Batanes</option>
                        <option value="Batangas">Batangas</option>
                        <option value="Biliran">Biliran</option>
                        <option value="Benguet">Benguet</option>
                        <option value="Bohol">Bohol</option>
                        <option value="Bukidnon">Bukidnon</option>
                        <option value="Bulacan">Bulacan</option>
                        <option value="Cagayan">Cagayan</option>
                        <option value="Camarines Norte">Camarines Norte</option>
                        <option value="Camarines Sur">Camarines Sur</option>
                        <option value="Camiguin">Camiguin</option>
                        <option value="Capiz">Capiz</option>
                        <option value="Catanduanes">Catanduanes</option>
                        <option value="Cavite">Cavite</option>
                        <option value="Cebu">Cebu</option>
                        <option value="Compostela">Compostela</option>
                        <option value="Davao del Norte">Davao del Norte</option>
                        <option value="Davao del Sur">Davao del Sur</option>
                        <option value="Davao Oriental">Davao Oriental</option>
                        <option value="Eastern Samar">Eastern Samar</option>
                        <option value="Guimaras">Guimaras</option>
                        <option value="Ifugao">Ifugao</option>
                        <option value="Ilocos Norte">Ilocos Norte</option>
                        <option value="Ilocos Sur">Ilocos Sur</option>
                        <option value="Iloilo">Iloilo</option>
                        <option value="Isabela">Isabela</option>
                        <option value="Kalinga">Kalinga</option>
                        <option value="Laguna">Laguna</option>
                        <option value="Lanao del Norte">Lanao del Norte</option>
                        <option value="Lanao del Sur">Lanao del Sur</option>
                        <option value="La Union">La Union</option>
                        <option value="Leyte">Leyte</option>
                        <option value="Maguindanao">Maguindanao</option>
                        <option value="Marinduque">Marinduque</option>
                        <option value="Masbate">Masbate</option>
                        <option value="Metro Manila">Metro Manila</option>
                        <option value="Mindoro Occidental">Mindoro Occidental</option>
                        <option value="Mindoro Oriental">Mindoro Oriental</option>
                        <option value="Misamis Occidental">Misamis Occidental</option>
                        <option value="Misamis Oriental">Misamis Oriental</option>
                        <option value="Mountain Province">Mountain Province</option>
                        <option value="Negros Occidental">Negros Occidental</option>
                        <option value="Negros Oriental">Negros Oriental</option>
                        <option value="North Cotabato">North Cotabato</option>
                        <option value="Northern Samar">Northern Samar</option>
                        <option value="Nueva Ecija">Nueva Ecija</option>
                        <option value="Nueva Vizcaya">Nueva Vizcaya</option>
                        <option value="Palawan">Palawan</option>
                        <option value="Pampanga">Pampanga</option>
                        <option value="Pangasinan">Pangasinan</option>
                        <option value="Quezon">Quezon</option>
                        <option value="Quirino">Quirino</option>
                        <option value="Rizal">Rizal</option>
                        <option value="Romblon">Romblon</option>
                        <option value="Samar">Samar</option>
                        <option value="Sarangani">Sarangani</option>
                        <option value="Siquijor">Siquijor</option>
                        <option value="Sorsogon">Sorsogon</option>
                        <option value="South Cotabato">South Cotabato</option>
                        <option value="Southern Leyte">Southern Leyte</option>
                        <option value="Sultan Kudarat">Sultan Kudarat</option>
                        <option value="Sulu">Sulu</option>
                        <option value="Surigao del Norte">Surigao del Norte</option>
                        <option value="Surigao del Sur">Surigao del Sur</option>
                        <option value="Tarlac">Tarlac</option>
                        <option value="Tawi-Tawi">Tawi-Tawi</option>
                        <option value="Zambales">Zambales</option>
                        <option value="Zamboanga del Norte">Zamboanga del Norte</option>
                        <option value="Zamboanga del Sur">Zamboanga del Sur</option>
                        <option value="Zamboanga Sibugay">Zamboanga Sibugay</option>
                    </select>
                    <button class="btn btn-primary ml-2" type="submit" name="searchBtn">Search</button>
                </div>
            </form>
            <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3">
                <table id="table" class="table table-bordered table-striped text-center" style="height: 500px">
                    <thead class="text-light bg-dark">
                        <tr>
                            <th hidden>id</th>
                            <th>Restaurant Name</th>
                            <th>Location</th>
                            <th>Actions</th>
                            <th>Reviews</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            require 'res-search.php';
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>