$(document).ready(function() {

    //click on month -> get data with ajax
    $('.month-btn').on('click', function(){
        ajaxHandling.monthBtnClick($(this));
    });

    //only numbers allowed in "Betrag" field
    $(document).on('keydown', '.validateInputValue', function (e) {
        validation.addValueValidation(e);
    });

    //click handler for adding money entry for Tini
    $(document).on('click', '.addValueTini', function(){
        ajaxHandling.addEntryTini();
    });

    //click handler for adding money entry for Patrick
    $(document).on('click', '.addValuePatrick', function(){
        ajaxHandling.addEntryPatrick();
    });

    //click handler for deleting money entry
    $(document).on('click', '.removeMoneyEntry', function(){
        ajaxHandling.deleteEntry($(this));
    })
})