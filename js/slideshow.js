(function(document){
  debugger;
    var counter = 0, // to keep track of current slide
    $items = document.querySelectorAll('.slideshowbanner figure'), // a collection of all of the slides, caching for performance
    numItems = $items.length; // total number of slides

    // this function is what cycles the slides, showing the next or previous slide and hiding all the others
    var showCurrent = function(){
        var itemToShow = Math.abs(counter%numItems);  
  
        [].forEach.call( $items, function(el){
            el.classList.remove('show');
        });
  
        // add .show to the one item that's supposed to have it
        $items[itemToShow].classList.add('show');    
    };

	
	setInterval(function () {
        counter++;
        showCurrent();
    }, 5000);
	
	
// add click events to prev & next buttons 
    document.querySelector('.next').addEventListener('click', function() {
        counter++;
        showCurrent();
    }, false);

    document.querySelector('.prev').addEventListener('click', function() {
        counter--;
        showCurrent();
    }, false);
  
})(document);  