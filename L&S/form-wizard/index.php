<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/app.css">
    <title>Ajax Form Wizard</title>
  </head>
  <style media="screen">
    .wizard{
        width: 300px;
    }
    .step-body{
      width:100;
      clear: both;
      padding: 10px;
      background: white
    }
  </style>
  <body>


     <div class="container">
       <div class="wizard">
           <ul class="nav nav-tabs tab-nav">
             <li class="nav-item active first" id="step1">
               <a href="#" class="nav-link active" >Step 1</a>
             </li>
             <li class="nav-item" id="step2">
               <a href="#" class="nav-link" >Step 2</a>
             </li>
             <li class="nav-item last" id="step3">
               <a href="#" class="nav-link" >Step 3</a>
             </li>
           </ul>

           <span class="loading" style="display:none">loading...</span>
           <div class="step-body">
             Step 1
           </div>

           <nav>
             <ul class="pager">
               <li class="pager-prev" style="display:none"><a href="javascript:submitPage('prev')">Back</a></li>
               <li class="pager-next"><a href="javascript:submitPage('next')">Next</a></li>
               <li class="pager-finish" style="display:none"><a href="#">Finish</a></li>
             </ul>
           </nav>
       </div>


     </div>

<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
  //$(document).ready(function () {
      function submitPage(buttonDirection) {
        var currentTab=$(".wizard .tab-nav li.active");
        if (buttonDirection=="next") {
          var actionTab=currentTab.next('li');
        }else{
          var actionTab=currentTab.prev('li');
        }
        $('.loading').fadeIn();
        var targetUrl="ajax/"+actionTab.attr('id')+".php";
        setTimeout(function() {
          $.get(targetUrl, {'param':'test'},function (data) {
            if (data) {
              $('.loading').fadeOut();
              if (actionTab) {
                currentTab.removeClass("active");
                actionTab.addClass("active")
              }
              displayFinishBtn(actionTab.hasClass('last'));
              displayNextBtn(!actionTab.hasClass('last'));
              displayBackBtn(!actionTab.hasClass('first'));

              $('.step-body').html(data)
            }
          }
        )
        },5000)

      }
      var displayFinishBtn=function(enabled) {
        enabled==true ? $('.pager-finish').show() : $('.pager-finish').hide()
      }
      var displayNextBtn=function(enabled) {
        enabled==true ? $('.pager-next').show() : $('.pager-next').hide()
    }
        var displayBackBtn=function(enabled) {
        enabled==true ? $('.pager-prev').show() : $('.pager-prev ').hide()
      }
  //})
</script>
  </body>
</html>
