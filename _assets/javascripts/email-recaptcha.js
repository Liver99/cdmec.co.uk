function dispEmail(){
  // remove .hidden from email
  document.getElementById("recaptcha-hidden").className =
   document.getElementById("recaptcha-hidden").className.replace
      ( /(?:^|\s)hidden(?!\S)/g , '' )

  //hide captcha
  document.getElementById("recaptcha").className = "hidden";
}
