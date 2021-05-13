// POP UP Wallet

function check_empty() {
    if (document.getElementById('name').value == "") {
        
            alert("Fill All Fields !");
        return false;
    }else {
        return true;
    }
    }
    //Function To Display Popup
    function div_show() {
    document.getElementById('abc').style.display = "block";
    }
    //Function to Hide Popup
    function div_hide(){
    document.getElementById('abc').style.display = "none";
    }

    //Function To Display Popup2
    function div_show2() {
    document.getElementById('abc2').style.display = "block";
    }
    //Function to Hide Popup2
    function div_hide2(){
    document.getElementById('abc2').style.display = "none";
    }

    $(document).ready(function(){

       
        $('[type="checkbox"]').change(function(){
        
          if(this.checked){
             $('[type="checkbox"]').not(this).prop('checked', false);
          }    
        });
          


      });

