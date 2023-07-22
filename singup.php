<?php
ob_start();
session_start();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php include'head.php' ?>
<link rel="stylesheet" href="assets/css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Bitter Mobile Template">
<meta name="keywords" content="bootstrap, mobile template, bootstrap 4, mobile, html, responsive" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="main.css">
<style>
.recharge[data-v-309ccc10] {
    height: 100vh;
    background: #fafafa;
    padding-bottom: 64px;
}
.top_nav[data-v-309ccc10] {
    display: flex;
    flex-direction: row;
    align-items: center;
}
.top_nav[data-v-309ccc10] {
    height: 56px;
    width: 100%;
    line-height: 56px;
    padding: 0 15px;
    box-sizing: border-box;
    background: #009688;
    box-shadow: 0 2px 4px -1px rgb(0 0 0 / 20%), 0 4px 5px 0 rgb(0 0 0 / 14%), 0 1px 10px 0 rgb(0 0 0 / 12%);
    transition: .2s cubic-bezier(.4,0,.2,1);
    justify-content: space-between;
}

.top_nav .left[data-v-309ccc10], .top_nav[data-v-309ccc10] {
    display: flex;
    flex-direction: row;
    align-items: center;
}
.top_nav .left img[data-v-309ccc10] {
    width: 20px;
    height: 20px;
    margin-right: 30px;
}
.recharge[data-v-309ccc10] {
    height: 100vh;
    background: #fafafa;
    padding-bottom: 64px;
}
.recharge_box[data-v-309ccc10] {
    padding: 24px;
    box-sizing: border-box;
}
.input_box[data-v-309ccc10] {
    width: 100%;
    height: 50px;
    display: flex;
    flex-direction: row;
    align-items: center;
    box-shadow: 0 3px 1px -2px rgb(0 0 0 / 20%), 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%);
    padding: 0 12px;
    box-sizing: border-box;
    line-height: 48px;
    background: #fff;
    border-radius: 2px;
    margin-bottom: 35px;
    position: relative;
}
.input_box img[data-v-309ccc10] {
    width: 20px;
    height: 20px;
    margin-right: 10px;
}
.input_box input[data-v-309ccc10] {
    width: 90%;
    border: 0;
    font-size: 16px;
}
.tips_span[data-v-309ccc10] {
    font-size: 12px!important;
    color: red;
    position: absolute;
    bottom: -10px;
    z-index: -1;
    left: 15px;
    line-height: 12px;
    transition: all .3s;
}
.input_box_btn[data-v-309ccc10] {
    padding: 15px 0 0 0;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.input_box_btn .login_btn[data-v-309ccc10] {
    width: 240px;
    height: 44px;
    text-align: center;
    line-height: 44px;
    background: #009688;
    font-size: 14px;
    color: #fff;
    border: 0;
    border-radius: 2px;
    box-shadow: 0 3px 1px -2px rgb(0 0 0 / 20%), 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%);
    transition: .3s cubic-bezier(.25,.8,.5,1),color 1ms;
}
.two_btn[data-v-309ccc10] {
    width: 240px;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    margin-top: 25px;
}
.input_box_btn .two_btn button[data-v-309ccc10] {
    padding: 0 15px;
    height: 40px;
    text-align: center;
    line-height: 40px;
    background: #f5f5f5;
    font-size: 14px;
    color: rgba(0,0,0,.87);
    border: 0;
    border-radius: 2px;
    box-shadow: 0 3px 1px -2px rgb(0 0 0 / 20%), 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%);
    transition: .3s cubic-bezier(.25,.8,.5,1),color 1ms;
}
.footer[data-v-405e9a63] {
    width: 100%;
    height: 50px;
    background: #fff;
    position: fixed;
    bottom: 0;
    left: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 3px 14px 2px rgb(0 0 0 / 12%);
}
.nav_foot[data-v-405e9a63] {
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
.nav_foot li[data-v-405e9a63] {
    width: 25%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.nav_foot li img[data-v-405e9a63] {
    width: 18px;
    height: 18px;
}
.loading[data-v-74fec56a] {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background: transparent;
}
.v-dialog[data-v-74fec56a] {
    box-shadow: 0 11px 15px -7px rgb(0 0 0 / 20%), 0 24px 38px 3px rgb(0 0 0 / 14%), 0 9px 46px 8px rgb(0 0 0 / 12%);
    border-radius: 2px;
    overflow: hidden;
    pointer-events: auto;
    transition: .3s cubic-bezier(.25,.8,.25,1);
    width: 100%;
    z-index: inherit;
}
.teal[data-v-74fec56a] {
    background-color: #009688!important;
    border-color: #009688!important;
}
.v-card__text[data-v-74fec56a] {
    padding: 16px;
    width: 100%;
    box-sizing: border-box;
}

.loading span[data-v-74fec56a] {
    color: #fff;
    font-size: 18px;
}
.v-progress-linear[data-v-74fec56a] {
    background: 0 0;
    margin: 15px 0 5px;
    overflow: hidden;
    width: 100%;
    position: relative;
}
.white[data-v-74fec56a] {
    background-color: #fff!important;
    border-color: #fff!important;
}
.v-progress-linear__bar__indeterminate .long[data-v-74fec56a], .v-progress-linear__bar__indeterminate .short[data-v-74fec56a] {
    height: inherit;
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    will-change: left,right;
    width: auto;
    background-color: inherit;
}

.gocode[data-v-14ed88ba], .gocode_time[data-v-14ed88ba] {
    width: 26%;
    height: 46px;
    box-shadow: 0 3px 1px -2px rgb(0 0 0 / 20%), 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%);
    padding: 0 12px;
    line-height: 46px;
    border-radius: 2px;
    margin-bottom: 24px;
    border: 0;
    text-align: center;
}
.special_box[data-v-14ed88ba] {
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
#snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
 
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-size: 17px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}
#numerror {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
 
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-size: 17px;
}

#numerror.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}




</style>

</head>

<body style="font-family: 'Poppins', sans-serif;">


<!-- * Page loading --> 

<!-- App Header -->

<div>
    <div data-v-309ccc10 class="recharge">
        <form action="registerNow.php" method="post"  class="card-body" >
            <nav data-v-309ccc10 class="top_nav" style="margin: -16px -16px 0px -16px;     width: 120%;">
                <div data-v-309ccc10 class="left">
                <a  href="index.php"> <img data-v-309ccc10 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAByUlEQVRoQ+3ZwSsFURTH8e/5N5SV/0AWtpbIggUlKSlJJCUpSUlJSlKSkpKUbEjK1tbCkhV/hT/gp1deXa95z8y8md4905v1vXfO5515M+feY1Tksoo46EJiy2Q3I60yImkHGAZ6gTszWys7g4VnRNI2sNsQ+JCZvZSJKRQiaQvYSwh43MweXEAkbQL7CcG+mdlAmYja2oVkRNIGcJAQ7DswaWYf0UMkrQOHnUS0nRFJtbfRUacRbUEkrQLHMSByQyStACexIHJBJC0BpzEhMkMkLQJnsSEyQSQtAOcxIlJDJM0DF7EiUkEkzQGXMSP+hUiaBa5iR7SESJoBrj0gmkIkTQM3XhCJEElTwG0TxHLZxV+a9ZP2Nn+qX0mjwFOaxTo85hvoN7PPehyNkEdgrMNBpr39s5mNVB5SjUerlqZK/Nnrz1slXr8Bxv8HMcD4L1ECjP+iMcD4L+MDjP+NVYDxv9UNMP4PHwKM/+OgAOP/gC7A+D8yDTD+D7EDjP+2QoDx3+gJMP5bbwEmqRk6aGavafewecYV0nprvPFve7pW0vQA92Y2kSe4LHNKgQTZ6TOzrywB5R1bKiRvUHnmdSF5frUy51QmIz+4oeozWPEp9QAAAABJRU5ErkJggg=="></a>
                <span data-v-309ccc10>Register</span>
                </div>
            </nav> 
            <div data-v-309ccc10 class="recharge_box">
                <div data-v-309ccc10 class="input_box " >
                    <img  data-v-309ccc10 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAB00lEQVRoQ+1asS4EURQ97xc0lNSEQqKmp7QNX0CiMTdKq5QzGglfQGNLeltLFISaksYvPJndnWTDbN59s29iJHfaOe/MPWfOnJ3MWwflISKnANaU8BSwB5JHWiKnAWZZduyc62qwKTHe+26e5ycaTpUQEXkBsKghTIx5Jbmk4dQK8RqyEjPJyTp3lqRqRhVIRKKEjAT1K8SvxxhSYNsgJHbmSnyTQh6997dJpqwgcc5tAVgtTzUlpE9yoykRJa+I3AMYxLARITF1OI3Y8VIwIVVOlq1ldyQyZxatkGEWrZBDE85btELGWbRCDlm0fjsQ9RpvP4iREbPWChlmrRVyyFrLWmv4FcXqN/JZsfoNGWb1G3LI6tfq1+q31lNi9Ruyzeo35JDV7/T1e5nn+X5No9XLsiy7cM7tNbY/MprkzHt/p54qEuic2wRwWC5rZH8kcqYk8LYIGd/Zjd7RbTpaWqd7JDslWERuAGxrF7clWp8k534OLSIfAGZjxPx1tJ5JrlQIeQKw/J+EFLN2SPbGolXEqohX1JH6jrwBmI+aYAgeiBGRWiIAvJNc0FxX+xH7CsCOhjAx5prkroZTJaQgGr1aHwCY0RBPifny3p9r/6tVXOsbCz8HUf9wHDEAAAAASUVORK5CYII=">
                    <input data-v-309ccc10 type="tel" name="mobile" id="mobile" onKeyPress="return isNumber(event)" placeholder="Mobile Number" value=""   maxlength="13" required>
                    <span data-v-309ccc10 class="tips_span" id="basic-addon1">Mobile number is required</span>
                </div>
                <div data-v-14ed88ba class="special_box">
                    <div data-v-309ccc10 class="input_box" style="width: 70%;">
                        <img  data-v-309ccc10 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAACOUlEQVRoQ+2aMWzTQBSG3ztLWVmpGJEYysgEU9lZGGAqEy4LEgO+mzK0LEl0d6aDJQZEp26txEA3pkx0YiwbEkOlVurUsiRD7qFUDG1yjRv71bGry5z3v/97/50vtoNwSz54SzgggNQtyZBI4xJRSt0djUZLQog7izDvnDuNoujIGHM8q/+VSytJkkdCCAsAK4sA8PTsO+dkmqY/fX68IFLKx4j4oyYAl2wQ0RNr7f6kNy+IUmoHAF7UEQQAdo0xL3NBkiRZFkIc1BTi3JZz7mGapr8uepxKREr5GhG/1BmEiGJr7VYeyDoibtQcZMNa+yGA1CUlIgqJ1CWMcx+siYzFWq3W506nc8RFqZR6Q0QJIj6YpckG4hNihHkGAHtVgTy11va5zE/qKKWoKpCpqwYXlJTyOSJ+rQRk3AQRV6Mo+t7tdk84INrt9r3hcBgj4isAuF8ZCIf5ohpsm72oAa66AMI1SS4d1kTCgZgTi1IqHIiXZiSlzL2xusmfKIs4ED8KIbJer/eHYxOHA/H/FH0PH3KXFkcCZTRYL79ljJStDSBlJ8hdHxLhnmhZPSKaukNt4lXrEBGXtdZ/Lw6kiSDvjTGbk6k2DSQzxrzzLc0mgBwCwD4i7mmtt6/aX/OCnCBirLX+VnbDctfPA3JARGu+117cporoXRdk/DAuNsb8LtKkiprrgOwOBoM4y7KzKgwV7TEThIg+WWvfFhWvss4HsoKI60TUn3y9VaWxeXuF/6LMO7Gb/v4/Av6hQgwN1SIAAAAASUVORK5CYII=">
                        <input data-v-309ccc10 type="number"  id="varificationcode"  name="varificationcode" placeholder="Verification Code" required>
                        <span data-v-309ccc10 class="tips_span" id="basic-addon1">Verification Code is required</span>
                        <!-- <div id="snackbar">Sent OTP</div>
                        <div id="numerror">Please Enter Number</div> -->
                    </div>     
                    <div class="col-4 pl-0"><a href="javascript:void(0);" class="btn btn-block  otpbtn" id="reg_otp" onClick="mobileveryfication();" style=" background-color: white;">OTP</a>
                    </div>        
                </div>
                <div data-v-309ccc10 class="input_box">
                    <img  data-v-309ccc10 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFEmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNy0wN1QxNjo1MTo0NyswODowMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDctMDdUMTY6NTM6MTgrMDg6MDAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDctMDdUMTY6NTM6MTgrMDg6MDAiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIiBwaG90b3Nob3A6SUNDUHJvZmlsZT0ic1JHQiBJRUM2MTk2Ni0yLjEiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6ZWJiNmY0NGYtOTJhOS1lYzRi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">
                    <input data-v-309ccc10 type="password" name="password" id="password" placeholder="Password" required>
                    <span data-v-309ccc10 class="tips_span" id="basic-addon1">Password is required</span>   
                </div>
                <div data-v-309ccc10 class="input_box">
                    <img  data-v-309ccc10 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAEMUlEQVRoQ+1ZXYgbVRT+zoSQpVtFfBHqCorgikJRXwoVoT4o+tBiH1pBfLD+IasRJfeMsBQ2FczuzpndQAsLSpGCCGJfSvdBqEIXEX/oi/qgtqC0FFZELIKLP2ySU6ZNlsnsJDOTmYm65EIecu/5+b57ztxz7gxhiwzaIjwwIvJfi2TqiDDznaq6E4D3AxFdFpF3+xFl5mdV9ba2/LlCofDd3NzcxTSbMzCRqamp7ePj4wLgpRAApwAcEZGv/WvMfB+AGQBPhOgsNxqNZ+r1+pVBCA1EpFKp3G1Z1vcRDn8H8KKInPTkmPkAgHcA3NRPr1gs7qjVaj8nJTMQEWb+AcBkHGeq+nA7hc7GkQewIiLXdJKMxESMMTNEVA1xsgJgT495b7rX2qZ5Va26rnskVyLM/CEAL002RrPZnFxcXLxgjNlFRF/GARChsywi++LY6cgkjggzXwYw4XPiiMgbnf+2bVdU1Y0AEaWzKiK35krEGHOeiO7qOAmmQZ/U28AVQ+eiiNyRKxHbtuuq+lrAySEROdE+mbzUizP66ZwQkUNxjPRNLWPMHiJ6HsDjAG5OYjBH2V9V9bRlWWcdx3k/6GfTM8LMpwHszRFQFqY3RayLSJJTJws0KW3c7+8cuogw8+sAFlM66FInok9V9W8Aj2ZpN3hgBIl41ddfoFZU1St0sUZIofwJwIOtVqthWdZnwW7AAxPL8PVm1MPVhc3fAUQSidMu2LY9oapfAdjhA/YPEe11HOdjb46ZHwJwBsCYT+ZSsVjcVavVfokixMybNjlzIsz8EYDH/GBardbLCwsLS/45Zi4DOBoAfVJEDv7rRJh5HoAdAHJcRF4IA8fMHwB4MrDGItK3G8g1IsaYp4noPT8oIrpQKBR2z87O/hZGZHp6+pb19fVzAK5drDpDVfe5rrvcKzK5ETHG7CQir4p3tfOq+ojrup/0S5UeHcC3RHTQcZzzPSKZzzMS1gWr6mHXdd+Kyndv3RhzjIheifu85BaRNpinALxNRNsBfCEiu+OQ6Mgw8zftu75XZ2ZExBl6avnAPEBEbzabTe+UupSEiG3bk6p6lIjmHMfpe4PMNSId0NVqdVu1Wv0zCYmOrG3bNziO80eU7lCIRIHIYn1EpL2LA73RyCICQRupI5KkacyDQMdm2qYxT2xpbXdlS1T3m9ZZnvojInnu7iC2RxEZZNfy1EkUka1TR+Lc2fPcdl9zms99ZBjg/T5SV/b/a0SC3z5iv9MaUoT877VOicj+jRbGD8AY8xwRHR8SqLRuXhWRY6FEyuXyjWNjY6sAxtN6yVn/SqPRmKjX63+FEvEmK5XKPZZleSl2b85gBjW/alnWgfn5+c/9BkI/vZXL5VKpVNpPRLeramlQj1nqWZblXaV/XFtbO7O0tLQWtJ34G2KW4LK0NSKS5W5mYWvLROQqDqopUSkA7bQAAAAASUVORK5CYII=">
                    <input data-v-309ccc10 type="text" name="rcode" id="rcode" placeholder="Recommendation Code" value="<?php echo @$_GET['code'];?>" >   
                </div>
                <div class="form-group row mt-3 mb-3">
                    <div class="col-12">
                        <div class="custom-control custom-checkbox">
                        <input type="checkbox" checked class="custom-control-input" id="remember" name="remember" style="border-color: rgb(0, 0, 0); background-color: rgb(0, 0, 0);">
                        <label class="custom-control-label text-muted" for="remember" style="color: #009688;">I agree <a style="color: #009688;" data-toggle="modal" href="#privacy" data-backdrop="static" data-keyboard="false" class="text-decoration-none">Privacy policy</a></label>
                        </div>                 
                    </div>
                </div>
                <input type="hidden" name="action" value="login">
                <?php
                    if(isset($_SESSION["errorsing"]))
                    {                      
                    ?>
                    <p style="color: red; text-align: center;}"><?php echo  $_SESSION["errorsing"] ?></p>
                    <?php 
                    }
                    ?>
                <div data-v-309ccc10 class="input_box_btn">
                   
                 <button data-v-309ccc10 class="login_btn ripple"  type="submit">Register</button>
                </div> 
            </div>  
        </form>   
    </div>
</div>


<!-- appCapsule -->

<?php include("include/footer.php");?>
<div id="registertoast" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content ">
      <div class="modal-body">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       <span aria-hidden="true">×</span></button>
        <div class="text-center" id="regtoast">          
        </div>
      </div>
    </div>
  </div>
</div>
<!-- <script>
function myFunction() {
  var x = document.getElementById("snackbar");
  var mobile1 = document.getElementById("mobile");
  if(mobile1)
    {
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
  else if(mobile == NULL){
    x.className = "numerror";
  setTimeout(function(){ x.className = x.className.replace("numerror", ""); }, 3000);
  }
}
</script> -->
<script src="assets/js/lib/jquery-3.4.1.min.js"></script> 
<!-- Bootstrap--> 
<script src="assets/js/lib/popper.min.js"></script> 
<script src="assets/js/lib/bootstrap.min.js"></script> 
<!-- Owl Carousel --> 
<script src="assets/js/plugins/owl.carousel.min.js"></script> 
<!-- Main Js File --> 
<script src="assets/js/app.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/account.js"></script>

</body>
</html>