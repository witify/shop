<script src="https://cdnjs.cloudflare.com/ajax/libs/outdated-browser/1.1.5/outdatedbrowser.min.js"></script>
    <div id="outdated"></div>
    <script>
    //event listener: DOM ready
    function addLoadEvent(func) {
        var oldonload = window.onload;
        if (typeof window.onload != 'function') {
            window.onload = func;
        } else {
            window.onload = function() {
                if (oldonload) {
                    oldonload();
                }
                func();
            }
        }
    }
    //call plugin function after DOM ready
    addLoadEvent(function(){
        outdatedBrowser({
            bgColor: '#f25648',
            color: '#ffffff',
            lowerThan: 'transform', // >= IE10
            languagePath: 'your_path/outdatedbrowser/lang/en.html'
        })
    });
</script>