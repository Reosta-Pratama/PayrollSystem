$(document).ready(function() {
    $('#getQuiz').change(function() {
        updateUrl(); 
    });

    function updateUrl() {
        var getQuiz = $('#getQuiz').val();
        if(getQuiz == null){
            getQuiz = "";
        }

        var search = "{{ $searchName }}";  

        var newUrl = "{{ route('leaderboard') }}?getQuiz=" + getQuiz; 

        window.location.href = newUrl;
    }
});