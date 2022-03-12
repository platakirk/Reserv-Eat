


  <div class="container padding">
    <hr class="dark">
    <div class="row text-center">
      <div class="col-md">
      <footer class="footer-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-2  col-md-6">
                <div class="single-footer-widget">
                    <ul class="footer-nav">
                        <li>
                            <a href="https://isproj2b.benilde.edu.ph/ReservEat/" style="color: #999">ReservEat</a>
                        </li>
                        <li>
                            <a href="https://isproj2b.benilde.edu.ph/ReservEat/ReservEat-debug.apk" style="color: #999">Download App Here</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4  col-md-6">
                <div class="single-footer-widget mail-chimp">
                    <h6 class="mb-20">Contact Us</h6>
                    <p>
                        2544 Taft Ave, Malate, Manila, 1004 Metro Manila
                    </p>
                    <h6>8230 - 5100</h6>
                </div>
            </div>
            <div class="col-lg-6  col-md-12">
                <div class="single-footer-widget newsletter">
                     <h6>Tell us your thoughts</h6>
                     <p>Send us your comments or anything else you'd like us to know. We believe that creative exchange is essential to the evolution of our company and growth of our brand.</p>
                    <a href="mailto:reserv.eatph@gmail.com?subject=ReservEat%20Feedback" class="main_btn mr-10" style="color: #999">Send feedback <span class="lnr lnr-arrow-right"></span></a>
                 </div>
             </div>
        </div>
        <div class="row footer-bottom d-flex justify-content-between">
            <p class="col-lg-8 col-sm-12 footer-text m-0">
                Copyright © Reserv-Eat 2021. All Rights Reserved.
            </p>
        </div>
    </div>
</footer>
      </div>
    </div>
  </div>
          

 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/holder.min.js"></script>
    <script src="https://www.malot.fr/bootstrap-datetimepicker/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    <script>
      $(document).ready(function(){

        $('#stat').bootstrapToggle({
          on: 'active',
          off: 'inactive'
        })
      });

      $('#stat').change(function(){
        if($(this).prop('checked')){
          $('#hidden-status').val('active');
        }
        else{
          $('#hidden-status').val('inactive');
        }
      });

      $(document).ready(function(){
        $('.updbtn').on('click', function(){
          $('#updModal').modal('show');

            $tr = $(this).closest('tr');

            var data= $tr.children("td").map(function(){
              return $(this).text();
            }).get();

            console.log(data);

            $('#sid').val(data[0]);
            $('#suname').val(data[1]);
            $('#spword').val(data[2]);
            $('#sfname').val(data[3]);
            $('#slname').val(data[4]);
            $('#scnum').val(data[5]);
        })
      })

      $(document).ready(function(){
        $('.delbtn').on('click', function(){
          $('#delModal').modal('show');

            $tr = $(this).closest('tr');

            var data= $tr.children("td").map(function(){
              return $(this).text();
            }).get();

            console.log(data);

            $('#did').val(data[0]);
            $('#duname').val(data[1]);
            $('#dpword').val(data[2]);
            $('#dfname').val(data[3]);
            $('#dlname').val(data[4]);
            $('#dcnum').val(data[5]);
        })
      })

      $(document).ready(function(){
        $('.canbtn').on('click',function(){
          $('#canModal').modal('show');

          $tr = $(this).closest('tr');

            var data= $tr.children("td").map(function(){
              return $(this).text();
            }).get();

            console.log(data);

            $('#rcid').val(data[0]);
        })
      })

      $(document).ready(function(){
        $('.accbtn').on('click',function(){
          $('#accModal').modal('show');

          $tr = $(this).closest('tr');

            var data= $tr.children("td").map(function(){
              return $(this).text();
            }).get();

            console.log(data);

            $('#idR').val(data[0]);
            $('#idCus').val(data[1]);
        })
      })

      $(document).ready(function(){
        $('.rejbtn').on('click',function(){
          $('#rejModal').modal('show');

          $tr = $(this).closest('tr');

            var data= $tr.children("td").map(function(){
              return $(this).text();
            }).get();

            console.log(data);

            $('#idRr').val(data[0]);
        })
      })
$(document).ready(function(){
    $('input.timepicker').timepicker({});
});

$('.timepicker').timepicker({
    timeFormat: 'h:mm p',
    interval: 60,
    minTime: '1',
    maxTime: '11:00pm',
    defaultTime: '8',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});

function selection(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();

// checkbox

window.addEventListener("DOMContentLoaded", function(e) {

var myForm = document.getElementById("example4");
var checkForm = function(e) {
  if(!this.terms.checked) {
    alert("Please indicate that you accept the Terms and Conditions");
    this.terms.focus();
    e.preventDefault(); // equivalent to return false
    return;
  }
};

// attach the form submit handler
myForm.addEventListener("submit", checkForm, false);

var myCheckbox = document.getElementById("field_terms");
var myCheckboxMsg = "Please indicate that you accept the Terms and Conditions";

// set the starting error message
myCheckbox.setCustomValidity(myCheckboxMsg);

// attach checkbox handler to toggle error message
myCheckbox.addEventListener("change", function(e) {
  this.setCustomValidity(this.validity.valueMissing ? myCheckboxMsg : "");
}, false);

}, false);

    </script>
  </body>
</html>