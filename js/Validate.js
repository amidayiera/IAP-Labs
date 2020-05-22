// function to validate the form - will be called when the form is submitted
// lab 2
function validateForm() {
    var fname = document.forms["user_details"]["first_name"].value;
    var lname = document.forms["user_details"]["last_name"].value;
    var city = document.forms["user_details"]["city"].value;

    if (fname == null || lname == "" || city == "") {
        alert("All details are required");
        return false;
    }
    return true;
}