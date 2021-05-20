$(function(){
    console.log("Loading countries...");

    function loadCountries(){
            $.getJSON("api/countries/", function(countries) {
                    console.log(countries);
                    var msg = "No country found";
                    if(countries.length > 0){
                            message  = countries[0].name + " " + countries[0].language;
                    }
                    $(".country").text(message);
            });
    };

    loadCountries();
    setInterval(loadCountries,2000);
});