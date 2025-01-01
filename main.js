function check_empty(arg) {
  let data = arg.trim();

  if (data) {
    return true;
  } else {
    return false;
  }
}

function registration_form_validation() {
  let result = true;

  let full_name = document.getElementById("full_name").value;

  if (!check_empty(full_name)) {
    document.getElementById("name_error").innerText =
      "Name should not be empty!";
    return false;
  } else {
    document.getElementById("name_error").innerText = "";
  }

  let phone_number = document.getElementById("phone_number").value;

  if (!check_empty(phone_number)) {
    document.getElementById("phone_error").innerText =
      "Phone number is required!";
    return false;
  } else {
    document.getElementById("phone_error").innerText = "";
  }

  if (phone_number.length >= 11) {
  } else {
    result = false;
  }

  let email_address = document.getElementById("email_address").value;

  if (!check_empty(email_address)) {
    result = false;
  }

  let fb_profile = document.getElementById("fb_profile").value;

  if (!check_empty(fb_profile)) {
    document.getElementById("fb_error").innerText = "Facebook Id is required!";
    return false;
  } else {
    document.getElementById("fb_error").innerText = "";
  }

  let password = document.getElementById("password").value;

  if (!check_empty(password)) {
    document.getElementById("password_error").innerText =
      "Facebook Id is required!";
    return false;
  } else {
    document.getElementById("password_error").innerText = "";
  }

  //alert(result);

  return result;
}
