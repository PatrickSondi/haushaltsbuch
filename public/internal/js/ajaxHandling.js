var ajaxHandling = {};

(function($) {
    ajaxHandling = function (){
        var model = {
            monthBtnClick: monthBtnClick,
            addEntryTini: addEntryTini,
            addEntryPatrick: addEntryPatrick,
            deleteEntry: deleteEntry
        }
        
        function monthBtnClick($this){
            var xmlhttp = new XMLHttpRequest();
            var month = $this.attr("data-month");

            $('.month-btn').removeClass("month-active");

            $this.addClass("month-active");

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("result").innerHTML = xmlhttp.responseText;
                }
            };

            xmlhttp.open("GET", "/home/months/?month=" + month, true);
            xmlhttp.send();
        }
        
        function addEntryTini(){
            var xmlhttp = new XMLHttpRequest();

            $("#valueTini").css('border', 'none');

            var value = $("#valueTini").val();
            var desc = $("#descTini").val();
            var month = $(".month-active").attr("data-month");

            if(value.length == 0){
                $("#valueTini").css("border", "1px solid red");
                alert("Bitte gültigen Betrag und gültige Beschreibung eingeben.");

                return false;
            }

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("result").innerHTML = xmlhttp.responseText;
                        }
                    };

                    xmlhttp.open("GET", "/home/months/?month=" + month, true);
                    xmlhttp.send();
                }
            };

            xmlhttp.open("GET", "/home/add/?value=" + value + "&month=" + month + "&desc=" + desc + "&userid=2", true);
            xmlhttp.send();
        }

        function addEntryPatrick(){
            var xmlhttp = new XMLHttpRequest();

            $("#valuePatrick").css('border', 'none');

            var value = $("#valuePatrick").val();
            var desc = $("#descPatrick").val();
            var month = $(".month-active").attr("data-month");

            if(value.length == 0){
                $("#valuePatrick").css("border", "1px solid red");
                alert("Bitte gültigen Betrag und gültige Beschreibung eingeben.");

                return false;
            }

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("result").innerHTML = xmlhttp.responseText;
                        }
                    };

                    xmlhttp.open("GET", "/home/months/?month=" + month, true);
                    xmlhttp.send();
                }
            };

            xmlhttp.open("GET", "/home/add/?value=" + value + "&month=" + month + "&desc=" + desc + "&userid=1", true);
            xmlhttp.send();
        }
        
        function deleteEntry($this) {
            var xmlhttp = new XMLHttpRequest();

            var moneyEntryId = $this.attr('id');
            var month = $(".month-active").attr("data-month");

            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    xmlhttp.onreadystatechange = function() {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("result").innerHTML = xmlhttp.responseText;
                        }
                    };

                    xmlhttp.open("GET", "/home/months/?month=" + month, true);
                    xmlhttp.send();
                }
            };

            xmlhttp.open("GET", "/home/months/?moneyentryid=" + moneyEntryId, true);
            xmlhttp.send();
        }
        
        return model;
    }();
})(jQuery);