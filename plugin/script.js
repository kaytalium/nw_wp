(function () {
    /**
     * Wait until the document is ready and all elements are dom ready 
     * */
    onload = function () {

        // Get all the cb_btn elements on the page
        let _toggleBtns = document.getElementsByClassName('cb_btn')

        //Loop over all elements and add the click function
        for (var i = 0; i < _toggleBtns.length; i++) {
            _toggleBtns[i].addEventListener('click', function (e) {
                e.preventDefault();

                // pick up the content Element, that is the element you want to shrink and grow
                let _content = this.parentNode.getElementsByClassName('cb_content')[0]

                if (_content.classList.contains('less')) {
                    // Remove the class that is style to show less
                    _content.classList.remove('less')
                    // perform some action after you grow the element
                    this.innerHTML = "Hide Article"
                } else {
                    // The element is at full height therefore add the .less class to shrink it
                    _content.classList.add('less')

                    // perform some action after you shrink the element
                    this.innerHTML = 'Show Article'
                }

            })
        }
    }
}());