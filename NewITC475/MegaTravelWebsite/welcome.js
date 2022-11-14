function setWelcome() {
    let currentDate = new Date();
    let currentHour = currentDate.getHours();
    let currentTime = currentDate.toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'});
    let welcomeIcon = document.getElementById('welcomeIcon');
    let welcomeMessage = document.getElementById('welcomeMessage');
    let welcomeTime = document.getElementById('welcomeTime');

    let welcomeMessageText = "";

    if(currentHour < 12){
        welcomeMessageText = "Good Morning!";
    }
    else if(currentHour >= 12 && currentHour <= 17){
        welcomeMessageText = "Good Afternoon!";
    }
    else if(currentHour > 17){
        welcomeMessageText = "Good Evening!";
    }

    welcomeMessage.innerHTML = welcomeMessageText;
    
    if(currentHour >= 6 && currentHour <= 18){
       welcomeIcon.src = "sun.png";
    }
    else {
        welcomeIcon.src = "moon.png";
    }

    welcomeTime.innerHTML = currentTime;

}

setInterval(setWelcome, 1000);
