
//js count circle char
var optimizedScroll = (function ($) {

    var callbacks = new Array(),
            running = false;

    // fired on resize event
    function scroll() {

        if (!running) {
            running = true;

            if (window.requestAnimationFrame) {
                window.requestAnimationFrame(runCallbacks);
            } else {
                setTimeout(runCallbacks, 66);
            }
        }

    }

    // run the actual callbacks
    function runCallbacks() {
        $.each(callbacks, function (k, callback) {
            callback();
        });

        running = false;
    }

    // adds callback to loop
    function addCallback(callback) {

        if (callback) {
            callbacks.push(callback);
        }

    }

    return {
        // initalize resize event listener
        init: function (callback) {
            $(window).on("scroll", scroll);

            addCallback(callback);
        },
        // public method to add additional callback
        add: function (callback) {
            addCallback(callback);
        }
    }
}(jQuery));
optimizedScroll.init();
! function(e) {
    e.fn.appear = function(a, r) {
        var n = e.extend({
            data: void 0,
            one: !0,
            accX: 0,
            accY: 0
        }, r);
        return this.each(function() {
            var r = e(this);
            if (r.appeared = !1, !a) return void r.trigger("appear", n.data);
            var p = e(window),
                t = function() {
                    if (!r.is(":visible")) return void(r.appeared = !1);
                    var e = p.scrollLeft(),
                        a = p.scrollTop(),
                        t = r.offset(),
                        c = t.left,
                        i = t.top,
                        o = n.accX,
                        f = n.accY,
                        s = r.height(),
                        d = p.height(),
                        u = r.width(),
                        h = p.width();
                    i + s + f >= a && a + d + f >= i && c + u + o >= e && e + h + o >= c ? r.appeared || r.trigger("appear", n.data) : r.appeared = !1
                },
                c = function() {
                    if (r.appeared = !0, n.one) {
                        p.unbind("scroll", t);
                        var c = e.inArray(t, e.fn.appear.checks);
                        c >= 0 && e.fn.appear.checks.splice(c, 1)
                    }
                    a.apply(this, arguments)
                };
            n.one ? r.one("appear", n.data, c) : r.bind("appear", n.data, c), optimizedScroll.add(t), e.fn.appear.checks.push(t), t()
        })
    }, e.extend(e.fn.appear, {
        checks: [],
        timeout: null,
        checkAll: function() {
            var a = e.fn.appear.checks.length;
            if (a > 0)
                for (; a-- && a > 0;) e.fn.appear.checks[a]()
        },
        run: function() {
            var a = e.fn.appear.checks.length;
            a > 0 && (e.fn.appear.timeout && clearTimeout(e.fn.appear.timeout), e.fn.appear.timeout = setTimeout(e.fn.appear.checkAll, 20))
        }
    }), e.each(["append", "prepend", "after", "before", "attr", "removeAttr", "addClass", "removeClass", "toggleClass", "remove", "css", "show", "hide"], function(a, r) {
        var n = e.fn[r];
        n && (e.fn[r] = function() {
            var a = n.apply(this, arguments);
            return e.fn.appear.run(), a
        })
    })
}(jQuery);