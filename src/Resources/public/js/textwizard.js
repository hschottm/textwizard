var TextWizard = {
textWizard: function(e) {
    var l = $(e)
      , s = function(n) {
        var e, a, o, i;
        n.getElements("button").each(function(t) {
            if (!t.hasEvent("click"))
                switch (t.getProperty("data-command")) {
                case "copy":
                    t.addEvent("click", function() {
                        Backend.getScrollOffset(),
                        e = n.clone(!0).inject(n, "after"),
                        (a = n.getFirst("input")) && (e.getFirst("input").value = a.value),
                        e.getFirst("input").select(),
                        s(e)
                    });
                    break;
                case "new":
                    t.addEvent("click", function() {
                        Backend.getScrollOffset(),
                        e = n.clone(!0).inject(n, "after"),
                        (a = n.getFirst("input")) && (e.getFirst("input").value = ''),
                        e.getFirst("input").select(),
                        s(e)
                    });
                    break;
                case "delete":
                    t.addEvent("click", function() {
                        Backend.getScrollOffset(),
                        1 < l.getChildren().length && n.destroy()
                    });
                    break;
                case null:
                    t.addEvent("keydown", function(e) {
                        38 == e.event.keyCode ? (e.preventDefault(),
                        (o = n.getPrevious("li")) ? n.inject(o, "before") : n.inject(l, "bottom"),
                        t.focus()) : 40 == e.event.keyCode && (e.preventDefault(),
                        (i = n.getNext("li")) ? n.inject(i, "after") : n.inject(l.getFirst("li"), "before"),
                        t.focus())
                    })
                }
        })
    };
    new Sortables(l,{
        constrain: !0,
        opacity: .6,
        handle: ".drag-handle"
    }),
    l.getChildren().each(function(e) {
        s(e)
    })
  }
};
