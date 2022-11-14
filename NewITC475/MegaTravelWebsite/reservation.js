function showResults(selectedObject) {
   let newZealDiv = document.getElementById("newZealDiv");
   let maldivesDiv = document.getElementById("maldivesDiv");
   let veniceDiv = document.getElementById("veniceDiv");
   let cancunDiv = document.getElementById("cancunDiv");

   newZealDiv.style.display= 'none';
   maldivesDiv.style.display= 'none';
   veniceDiv.style.display= 'none';
   cancunDiv.style.display= 'none';

   if(selectedObject == "New Zealand"){
    newZealDiv.style.display= 'block';
   }
   else if(selectedObject == "Maldives, South Asia"){
    maldivesDiv.style.display= 'block';
   }
   else if(selectedObject == "Venice, Italy"){
    veniceDiv.style.display= 'block';
   }
   else if(selectedObject == "Cancun"){
    cancunDiv.style.display= 'block';
   }
}

function validateForm() {
   // Validate first name
   if(document.reservationForm.fname.value.trim() == ""){
       alert('First name must be filled out');
       document.reservationForm.fname.focus();
       document.reservationForm.fname.select();
       return false;
   }
   // Validate last name
   if(document.reservationForm.lname.value.trim() == ""){
       alert('Last name must be filled out');
       document.reservationForm.lname.focus();
       document.reservationForm.lname.select();
       return false;
   }
   // Validate email
   if(document.reservationForm.email.value.trim() == ""){
       alert('Email address must be filled out');
       document.reservationForm.email.focus();
       document.reservationForm.email.select();
       return false;
   }
   // Validate phone number
   if(document.reservationForm.phoneNum.value.trim() == ""){
       alert('Phone number must be filled out');
       document.reservationForm.phoneNum.focus();
       document.reservationForm.phoneNum.select();
       return false;
   }
   // Validate number of adults traveling
   if(document.reservationForm.adults.value.trim() == ""){
       alert('Number of adults traveling must be filled out');
       document.reservationForm.adults.focus();
       document.reservationForm.adults.select();
       return false;
   }else{
       if (isNaN(document.reservationForm.adults.value)){
           alert('Please enter a numeric number of adults traveling');
           document.reservationForm.adults.focus();
           document.reservationForm.adults.select();
           return false;
       }
   }
   // Validate number of children traveling
   if(document.reservationForm.children.value.trim() == ""){
       alert('Number of children traveling must be filled out');
       document.reservationForm.children.focus();
       document.reservationForm.children.select();
       return false;
   }else{
       if (isNaN(document.reservationForm.children.value)){
           alert('Please enter a numeric number of children traveling');
           document.reservationForm.children.focus();
           document.reservationForm.children.select();
           return false;
       }
   }
   // Validate travel start date
   if(document.reservationForm.dateStart.value.trim() == ""){
       alert('Travel start date must be filled out');
       document.reservationForm.dateStart.focus();
       document.reservationForm.dateStart.select();
       return false;
   }else{
       let isValidDate = Date.parse(document.reservationForm.dateStart.value);
       if (isNaN(isValidDate)) {
           alert('Please enter a valid start date');
           document.reservationForm.dateStart.focus();
           document.reservationForm.dateStart.select();
           return false;
       }
   }
   // Validate travel end date
   if(document.reservationForm.dateEnd.value.trim() == ""){
       alert('Travel end date must be filled out');
       document.reservationForm.dateEnd.focus();
       document.reservationForm.dateEnd.select();
       return false;
   }else{
       let isValidDate = Date.parse(document.reservationForm.dateEnd.value);
       if (isNaN(isValidDate)) {
           alert('Please enter a valid end date');
           document.reservationForm.dateEnd.focus();
           document.reservationForm.dateEnd.select();
           return false;
       }
   }
   // Validate destination
   if(document.reservationForm.location.value == "none"){
       alert('Please select a travel destination');
       document.reservationForm.location.focus();
       document.reservationForm.location.select();
       return false;
   }
}
