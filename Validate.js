// function to validate the form - will be called when the form is submitted

function validateForm() {
    var first_name = document.forms["user_details"]["first_name"].value;
    var last_name = document.forms["user_details"]["last_name"].value;
    var city = document.forms["user_details"]["city"].value;

    if (first_name == null || last_name == "" || city == "") {
        alert("All details are required");
        return false;
    }
    return true;
}