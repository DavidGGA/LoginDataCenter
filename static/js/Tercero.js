function Trianglify(f) {
    function e(f, e) {
        return "undefined" != typeof f ? f : e
    }
    "undefined" == typeof f && (f = {}), this.options = {
        cellsize: e(f.cellsize, 150),
        bleed: e(f.cellsize, 150),
        cellpadding: e(f.cellpadding, .1 * f.cellsize || 15),
        noiseIntensity: e(f.noiseIntensity, .3),
        x_gradient: e(f.x_gradient, Trianglify.randomColor()),
        format: e(f.format, "svg")
    }, this.options.y_gradient = f.y_gradient || this.options.x_gradient.map(function (f) {
        return d3.rgb(f).brighter(.5)
    })
}
"undefined" != typeof module && module.exports && (d3 = require("d3"), jsdom = require("jsdom"), document = new(jsdom.level(1, "core").Document), XMLSerializer = require("xmldom").XMLSerializer, btoa = require("btoa"), module.exports = Trianglify), Trianglify.randomColor = function () {
    var f = Object.keys(Trianglify.colorbrewer),
        e = Trianglify.colorbrewer[f[Math.floor(Math.random() * f.length)]];
    f = Object.keys(e);
    var d = e[f[Math.floor(Math.random() * f.length)]];
    return d
}, Trianglify.prototype.generate = function (f, e) {
    return new Trianglify.Pattern(this.options, f, e)
}, Trianglify.Pattern = function (f, e, d) {
    this.options = f, this.width = e, this.height = d, this.polys = this.generatePolygons(), this.svg = this.generateSVG();
    var a = new XMLSerializer;
    this.svgString = a.serializeToString(this.svg), this.base64 = btoa(this.svgString), this.dataUri = "data:image/svg+xml;base64," + this.base64, this.dataUrl = "url(" + this.dataUri + ")"
}, Trianglify.Pattern.prototype.append = function () {
    document.body.appendChild(this.svg)
}, Trianglify.Pattern.gradient_2d = function (f, e, d, a) {
    return function (c, b) {
        var t = d3.scale.linear().range(f).domain(d3.range(0, d, d / f.length)),
            r = d3.scale.linear().range(e).domain(d3.range(0, a, a / e.length));
        return d3.interpolateRgb(t(c), r(b))(.5)
    }
}, Trianglify.Pattern.prototype.generatePolygons = function () {
    var f = this.options,
        e = Math.ceil((this.width + 2 * f.bleed) / f.cellsize),
        d = Math.ceil((this.height + 2 * f.bleed) / f.cellsize),
        a = d3.range(e * d).map(function (d) {
            var a = d % e,
                c = Math.floor(d / e),
                b = -f.bleed + a * f.cellsize + Math.random() * (f.cellsize - 2 * f.cellpadding) + f.cellpadding,
                t = -f.bleed + c * f.cellsize + Math.random() * (f.cellsize - 2 * f.cellpadding) + f.cellpadding;
            return [b, t]
        });
    return d3.geom.delaunay(a)
}, Trianglify.Pattern.prototype.generateSVG = function () {
    var f = this.options,
        e = Trianglify.Pattern.gradient_2d(f.x_gradient, f.y_gradient, this.width, this.height),
        d = document.createElementNS("http://www.w3.org/2000/svg", "svg"),
        a = d3.select(d);
    a.attr("width", this.width), a.attr("height", this.height), a.attr("xmlns", "http://www.w3.org/2000/svg");
    var c = a.append("g");
    if (f.noiseIntensity > .01) {
        var b = a.append("filter").attr("id", "noise");
        b.append("feTurbulence").attr("type", "fractalNoise").attr("in", "fillPaint").attr("fill", "#F00").attr("baseFrequency", .7).attr("numOctaves", "10").attr("stitchTiles", "stitch");
        var t = b.append("feComponentTransfer");
        t.append("feFuncR").attr("type", "linear").attr("slope", "2").attr("intercept", "-.5"), t.append("feFuncG").attr("type", "linear").attr("slope", "2").attr("intercept", "-.5"), t.append("feFuncB").attr("type", "linear").attr("slope", "2").attr("intercept", "-.5"), b.append("feColorMatrix").attr("type", "matrix").attr("values", "0.3333 0.3333 0.3333 0 0 \n 0.3333 0.3333 0.3333 0 0 \n 0.3333 0.3333 0.3333 0 0 \n 0 0 0 1 0"), a.append("rect").attr("opacity", f.noiseIntensity).attr("width", "100%").attr("height", "100%").attr("filter", "url(#noise)")
    }
    return this.polys.forEach(function (f) {
        var d = (f[0][0] + f[1][0] + f[2][0]) / 3,
            a = (f[0][1] + f[1][1] + f[2][1]) / 3,
            b = e(d, a);
        c.append("path").attr("d", "M" + f.join("L") + "Z").attr({
            fill: b,
            stroke: b
        })
    }), a.node()
}, Trianglify.Pattern.prototype.append = function () {
    document.body.appendChild(this.svg)
}, Trianglify.colorbrewer = {
    YlGn: {
        3: ["#f7fcb9", "#addd8e", "#31a354"],
        4: ["#ffffcc", "#c2e699", "#78c679", "#238443"],
        5: ["#ffffcc", "#c2e699", "#78c679", "#31a354", "#006837"],
        6: ["#ffffcc", "#d9f0a3", "#addd8e", "#78c679", "#31a354", "#006837"],
        7: ["#ffffcc", "#d9f0a3", "#addd8e", "#78c679", "#41ab5d", "#238443", "#005a32"],
        8: ["#ffffe5", "#f7fcb9", "#d9f0a3", "#addd8e", "#78c679", "#41ab5d", "#238443", "#005a32"],
        9: ["#ffffe5", "#f7fcb9", "#d9f0a3", "#addd8e", "#78c679", "#41ab5d", "#238443", "#006837", "#004529"]
    },

    GnBu: {
        3: ["#e0f3db", "#a8ddb5", "#43a2ca"],
        4: ["#f0f9e8", "#bae4bc", "#7bccc4", "#2b8cbe"],
        5: ["#f0f9e8", "#bae4bc", "#7bccc4", "#43a2ca", "#0868ac"],
        6: ["#f0f9e8", "#ccebc5", "#a8ddb5", "#7bccc4", "#43a2ca", "#0868ac"],
        7: ["#f0f9e8", "#ccebc5", "#a8ddb5", "#7bccc4", "#4eb3d3", "#2b8cbe", "#08589e"],
        8: ["#f7fcf0", "#e0f3db", "#ccebc5", "#a8ddb5", "#7bccc4", "#4eb3d3", "#2b8cbe", "#08589e"],
        9: ["#f7fcf0", "#e0f3db", "#ccebc5", "#a8ddb5", "#7bccc4", "#4eb3d3", "#2b8cbe", "#0868ac", "#084081"]
    },
    
    PuBuGn: {
        3: ["#ece2f0", "#a6bddb", "#1c9099"],
        4: ["#f6eff7", "#bdc9e1", "#67a9cf", "#02818a"],
        5: ["#f6eff7", "#bdc9e1", "#67a9cf", "#1c9099", "#016c59"],
        6: ["#f6eff7", "#d0d1e6", "#a6bddb", "#67a9cf", "#1c9099", "#016c59"],
        7: ["#f6eff7", "#d0d1e6", "#a6bddb", "#67a9cf", "#3690c0", "#02818a", "#016450"],
        8: ["#fff7fb", "#ece2f0", "#d0d1e6", "#a6bddb", "#67a9cf", "#3690c0", "#02818a", "#016450"],
        9: ["#fff7fb", "#ece2f0", "#d0d1e6", "#a6bddb", "#67a9cf", "#3690c0", "#02818a", "#016c59", "#014636"]
    },
    PuBu: {
        3: ["#ece7f2", "#a6bddb", "#2b8cbe"],
        4: ["#f1eef6", "#bdc9e1", "#74a9cf", "#0570b0"],
        5: ["#f1eef6", "#bdc9e1", "#74a9cf", "#2b8cbe", "#045a8d"],
        6: ["#f1eef6", "#d0d1e6", "#a6bddb", "#74a9cf", "#2b8cbe", "#045a8d"],
        7: ["#f1eef6", "#d0d1e6", "#a6bddb", "#74a9cf", "#3690c0", "#0570b0", "#034e7b"],
        8: ["#fff7fb", "#ece7f2", "#d0d1e6", "#a6bddb", "#74a9cf", "#3690c0", "#0570b0", "#034e7b"],
        9: ["#fff7fb", "#ece7f2", "#d0d1e6", "#a6bddb", "#74a9cf", "#3690c0", "#0570b0", "#045a8d", "#023858"]
    },
    YlOrBr: {
        3: ["#fff7bc", "#fec44f", "#d95f0e"],
        4: ["#ffffd4", "#fed98e", "#fe9929", "#cc4c02"],
        5: ["#ffffd4", "#fed98e", "#fe9929", "#d95f0e", "#993404"],
        6: ["#ffffd4", "#fee391", "#fec44f", "#fe9929", "#d95f0e", "#993404"],
        7: ["#ffffd4", "#fee391", "#fec44f", "#fe9929", "#ec7014", "#cc4c02", "#8c2d04"],
        8: ["#ffffe5", "#fff7bc", "#fee391", "#fec44f", "#fe9929", "#ec7014", "#cc4c02", "#8c2d04"],
        9: ["#ffffe5", "#fff7bc", "#fee391", "#fec44f", "#fe9929", "#ec7014", "#cc4c02", "#993404", "#662506"]
    },

 
    Blues: {
        3: ["#deebf7", "#9ecae1", "#3182bd"],
        4: ["#eff3ff", "#bdd7e7", "#6baed6", "#2171b5"],
        5: ["#eff3ff", "#bdd7e7", "#6baed6", "#3182bd", "#08519c"],
        6: ["#eff3ff", "#c6dbef", "#9ecae1", "#6baed6", "#3182bd", "#08519c"],
        7: ["#eff3ff", "#c6dbef", "#9ecae1", "#6baed6", "#4292c6", "#2171b5", "#084594"],
        8: ["#f7fbff", "#deebf7", "#c6dbef", "#9ecae1", "#6baed6", "#4292c6", "#2171b5", "#084594"],
        9: ["#f7fbff", "#deebf7", "#c6dbef", "#9ecae1", "#6baed6", "#4292c6", "#2171b5", "#08519c", "#08306b"]
    },  
    Greens: {
        3: ["#e5f5e0", "#a1d99b", "#31a354"],
        4: ["#edf8e9", "#bae4b3", "#74c476", "#238b45"],
        5: ["#edf8e9", "#bae4b3", "#74c476", "#31a354", "#006d2c"],
        6: ["#edf8e9", "#c7e9c0", "#a1d99b", "#74c476", "#31a354", "#006d2c"],
        7: ["#edf8e9", "#c7e9c0", "#a1d99b", "#74c476", "#41ab5d", "#238b45", "#005a32"],
        8: ["#f7fcf5", "#e5f5e0", "#c7e9c0", "#a1d99b", "#74c476", "#41ab5d", "#238b45", "#005a32"],
        9: ["#f7fcf5", "#e5f5e0", "#c7e9c0", "#a1d99b", "#74c476", "#41ab5d", "#238b45", "#006d2c", "#00441b"]
    },
   
 
    Greys: {
        3: ["#f0f0f0", "#bdbdbd", "#636363"],
        4: ["#f7f7f7", "#cccccc", "#969696", "#525252"],
        5: ["#f7f7f7", "#cccccc", "#969696", "#636363", "#252525"],
        6: ["#f7f7f7", "#d9d9d9", "#bdbdbd", "#969696", "#636363", "#252525"],
        7: ["#f7f7f7", "#d9d9d9", "#bdbdbd", "#969696", "#737373", "#525252", "#252525"],
        8: ["#ffffff", "#f0f0f0", "#d9d9d9", "#bdbdbd", "#969696", "#737373", "#525252", "#252525"],
        9: ["#ffffff", "#f0f0f0", "#d9d9d9", "#bdbdbd", "#969696", "#737373", "#525252", "#252525", "#000000"]
    },  

    RdYlBu: {
        3: ["#fc8d59", "#ffffbf", "#91bfdb"],
        4: ["#d7191c", "#fdae61", "#abd9e9", "#2c7bb6"],
        5: ["#d7191c", "#fdae61", "#ffffbf", "#abd9e9", "#2c7bb6"],
        6: ["#d73027", "#fc8d59", "#fee090", "#e0f3f8", "#91bfdb", "#4575b4"],
        7: ["#d73027", "#fc8d59", "#fee090", "#ffffbf", "#e0f3f8", "#91bfdb", "#4575b4"],
        8: ["#d73027", "#f46d43", "#fdae61", "#fee090", "#e0f3f8", "#abd9e9", "#74add1", "#4575b4"],
        9: ["#d73027", "#f46d43", "#fdae61", "#fee090", "#ffffbf", "#e0f3f8", "#abd9e9", "#74add1", "#4575b4"],
        10: ["#a50026", "#d73027", "#f46d43", "#fdae61", "#fee090", "#e0f3f8", "#abd9e9", "#74add1", "#4575b4", "#313695"],
        11: ["#a50026", "#d73027", "#f46d43", "#fdae61", "#fee090", "#ffffbf", "#e0f3f8", "#abd9e9", "#74add1", "#4575b4", "#313695"]
    },

    RdYlGn: {
        3: ["#fc8d59", "#ffffbf", "#91cf60"],
        4: ["#d7191c", "#fdae61", "#a6d96a", "#1a9641"],
        5: ["#d7191c", "#fdae61", "#ffffbf", "#a6d96a", "#1a9641"],
        6: ["#d73027", "#fc8d59", "#fee08b", "#d9ef8b", "#91cf60", "#1a9850"],
        7: ["#d73027", "#fc8d59", "#fee08b", "#ffffbf", "#d9ef8b", "#91cf60", "#1a9850"],
        8: ["#d73027", "#f46d43", "#fdae61", "#fee08b", "#d9ef8b", "#a6d96a", "#66bd63", "#1a9850"],
        9: ["#d73027", "#f46d43", "#fdae61", "#fee08b", "#ffffbf", "#d9ef8b", "#a6d96a", "#66bd63", "#1a9850"],
        10: ["#a50026", "#d73027", "#f46d43", "#fdae61", "#fee08b", "#d9ef8b", "#a6d96a", "#66bd63", "#1a9850", "#006837"],
        11: ["#a50026", "#d73027", "#f46d43", "#fdae61", "#fee08b", "#ffffbf", "#d9ef8b", "#a6d96a", "#66bd63", "#1a9850", "#006837"]
    }
    
};
