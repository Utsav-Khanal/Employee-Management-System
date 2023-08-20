//RealTime Form Validation JS


//FirstName Validation
const fname = document.getElementById("fname");
const fnameErr = document.getElementById("fnameErr");


// const success = document.getElementById("success");
// success.innerHTML="Registration Successfull";

//LastName Validation
const lname = document.getElementById("lname");
const lnameErr = document.getElementById("lnameErr");

//Email Validation
const email = document.getElementById("email");
const emailErr = document.getElementById("emailErr");

//Password Validation
const password = document.getElementById("password");
const passwordErr= document.getElementById("passwordErr");

const conpass = document.getElementById("conpass");
const conpassErr = document.getElementById("conpassErr");




//Realtime FirstName Validation
fname.addEventListener('input',function(event){
    const isfname = validfname(event.target.value);
    if(!isfname){
        fnameErr.innerHTML="Please fill FirstName";
        document.getElementById("fnameErr").classList.add("error");
    }
    else{
        fnameErr.innerHTML="";
    }
})


function validfname(fname){
    if(fname){
        return (true);
    }
    return (false);
}

//Realtime LastName Validation
lname.addEventListener('input',function(event){
    const islname = validlname(event.target.value);
    if(!islname){
        lnameErr.innerHTML="Please fill LastName";
        document.getElementById("lnameErr").classList.add("error");
    }
    else{
        lnameErr.innerHTML="";
    }
})


function validlname(lname){
    if(lname){
        return (true);
    }
    return (false);
}

//Real Time Email Validation
email.addEventListener('input',function(event){
    // console.log(validEmail(event.target.value));

    const isEmailValid = validEmail(event.target.value);
    if(!isEmailValid){
        emailErr.innerHTML="NOT VALID EMAIL";
        document.getElementById("emailErr").classList.add("error");
    }else{
        emailErr.innerHTML="";
    }

});

//Matching Pattern Using Regular Expression
function validEmail(email)
{
    if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
    {
        return (true);
    }
    return (false);
}

//RealTime Checking Password Length
password.addEventListener('input',function(event){
    const isPasswordValid = validPassword(event.target.value);
    if(!isPasswordValid){
        passwordErr.innerHTML="Password Less than 6";
        document.getElementById("passwordErr").classList.add("error");
    }else{
        passwordErr.innerHTML="";
    }
});

function validPassword(password)
{
    if(password.length > 6){
        return (true);
    }
    return (false);
}

conpass.addEventListener('input',function(event){
    const isConpassValid = validConpass(event.target.value);
    if(!isConpassValid){
        conpassErr.innerHTML="Confirm Password Less than 6";
        document.getElementById("conpassErr").classList.add("error");
    }else{
        conpassErr.innerHTML="";
    }
});

function validConpass(conpass)
{
    if(conpass.length > 6){
        return (true);
    }
    return (false);
}

