 $(document).ready(function(){
      $('.slider').slider({full_width: true});
       Materialize.updateTextFields(); 
       $('select').material_select();
       $('.carousel').carousel();

       $('.button-collapse').sideNav(); 
       $('.collapsible').collapsible({
         accordion : false 
       });

       $('.dropdown-button').dropdown();
     
       $('.datepicker').pickadate({
         selectMonths: true, // Creates a dropdown to control month
         selectYears: 15, // Creates a dropdown of 15 years to control year
         format: 'yyyy-mm-dd'
       });
       $('.modal-trigger').leanModal();

      $('ul.tabs').tabs('select_tab', 'test1');
      $('ul.tabs').tabs('select_tab', 'test2');
      $('ul.tabs').tabs('select_tab', 'test3');
      $('ul.tabs').tabs('select_tab', 'test4');
      
        $('.parallax').parallax();  

         $('.modal-trigger').leanModal();

    });