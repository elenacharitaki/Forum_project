alert();

function validate(){
    let firstname = document.getElementById("firstname");
    let lastname = document.getElementById("lastname");
    let email = document.getElementById("email");
    let pass = document.getElementById("pass");
    let checkpass = document.getElementById("checkpass");
    let message = "";
    register = true;
    
    if(firstname.value === ""){
        message += "Το όνομα είναι κενό.<br>";
        register = false;
    }
    if(lastname.value === ""){
        message += "Το επίθετο είναι κενό.<br>";
        register = false;
    }
    if(email.value === ""){
        message += "Το email είναι κενό.<br>";
        register = false;
    }
    if(pass.value === ""){
        message += "Ο κωδικός είναι κενός.<br>";
        register = false;
    }
    if(pass.value !== ""){
        if(checkpass.value === ""){
            message += "Δεν έχει γίνει επαλήθευση κωδικού.<br>";
            register = false;
        } else if(pass.value !== checkpass.value){
            message += "Οι κωδικοί δεν ταιριάζουν.<br>";
            register = false;
        }
    }
    if(register === true){
        document.getElementById("registerForm").submit();
    }
    if(register === false){
        document.getElementById("registerError").innerHTML = message;
    }
    
}

function changePass(){
    let newPass = document.getElementById("newpass");
    let checkNewPass = document.getElementById("checknewpass");
    message = "";
    let change = true;

    if(newPass.value === ""){
        message += "Δεν έχετε εισάγει κωδικό.<br>"
        change = false;
    }
    if(newPass.value !== ""){
        if(checkNewPass.value === ""){
            message += "Δεν έχει γίνει επαλήθευση κωδικού.<br>"
            change = false;
        }else if(newPass.value !== checkNewPass.value){
            message += "Οι κωδικοί δεν ταιριάζουν.<br>"
            change = false;
        }
    }
    

    if(change === true){
        document.getElementById("changePassForm").submit();
    }
    if(change === false){
        document.getElementById("changePassError").innerHTML = message;
    }

}

/*validate the form in add_new_post.php
 *submit only if the category is not empty
 */

/*function validateAddPost(){
    let radioButtons = document.querySelectorAll("input[name=category]");
    let category = false;

    for(let i = 0; i<radioButtons.length; i++){
        if(radioButtons[i].checked === true){
            category = true;
        }
    }

    if(category === true){
        document.getElementById("addNewPostForm").submit();
    }
    if(category === false){
        alert("Δεν έχετε επιλέξει κατηγορία!");
    }
} */
