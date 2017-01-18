$('#move_me').on('mousedown touchstart', function () {
    this.style.position = 'absolute'

    var self = this

    $(document).on('mousemove touchmove', function (e) {
        e = e || event
        fixPageXY(e)

        self.style.left = e.pageX-25+'px'
        self.style.top  = e.pageY-25+'px'
    })

    $(this).on('mouseup touchend', function() {
        $(document).unbind('mousemove touchmove',null)
    })
});

function fixPageXY (e) {
    if (e.pageX == null && e.clientX != null) {
        var html = document.documentElement
        var body = document.body

        e.pageX = e.clientX + (html.scrollLeft || body && body.scrollLeft || 0)
        e.pageY -= html.clientLeft || 0

        e.pageY = e.clientY + (html.scrollLeft || body && body.scrollLeft || 0)
        e.pageY -= html.clientTop || 0
    }
}

$('#move_me').on('dragstart', function () {return false});