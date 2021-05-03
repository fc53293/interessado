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

    // $(document).ready(function(){
    //     $('#submitWallet').click(function(){
    //         check_empty();
    //     });
    //   });