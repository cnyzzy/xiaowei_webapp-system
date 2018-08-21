webpackJsonp([2, 0], [function(t, e, n) {
	"use strict";
	function i(t) {
		return t && t.__esModule ? t: {
			"default": t
		}
	}
	var o = n(141),
	r = i(o),
	a = n(139),
	s = i(a),
	l = n(138),
	c = i(l),
	d = n(122),
	u = i(d),
	p = n(140),
	h = i(p),
	f = n(59),
	g = i(f);
	r["default"].use(u["default"]),
	r["default"].use(h["default"]),
	r["default"].use(s["default"]);
	var m = new h["default"];
	m.beforeEach(function() {
		window.scrollTo(0, 0)
	}),
	(0, g["default"])(m),
	m.start(c["default"], "app")
},
, , , , , , , , , , , ,
function(t, e, n) {
	"use strict";
	function i(t) {
		return t && t.__esModule ? t: {
			"default": t
		}
	}
	Object.defineProperty(e, "__esModule", {
		value: !0
	});
	var o = n(70),
	r = i(o);
	e["default"] = {
		timestamp: function() {
			return Math.round( + new Date / 1e3)
		},
		testImg: function(t) {
			document.body.innerHTML = '<img style="background: black;" src="' + t + (0 === t.indexOf("data:") ? "": "?" + Math.random()) + '">'
		},
		c: function(t) {
			console.log(t)
		},
		CB: function(t, e) {
			void 0 !== t && void 0 !== e && (void 0 !== t.error && t.error !== !1 ? t.if_error && t.if_error(error) : "[object Array]" === Object.prototype.toString.call(e) ? e.length >= 2 ? e.shift()(t, e) : e[0](t) : e(t))
		},
		j: function(t) {
			return "string" == typeof t ? JSON.parse(t) : (0, r["default"])(t)
		},
		base64_encode: function(t) {
			return window.btoa(unescape(encodeURIComponent(t)))
		},
		safe_base64_encode: function(t) {
			return this.base64_encode(t).replace(/\+/g, "-").replace(/\//g, "_")
		},
		safe_base64_decode: function(t) {
			return this.base64_decode(t.replace(/\-/g, "+").replace(/_/g, "/"))
		},
		base64_decode: function(t) {
			return decodeURIComponent(escape(window.atob(t)))
		},
		urlencode: function(t) {
			return encodeURIComponent(t)
		},
		urldecode: function(t) {
			return decodeURIComponent(t)
		},
		putb64: function(t, e, n) {
			var i = t,
			o = "http://upload.qiniu.com/putb64/" + e.size + "/key/" + this.safe_base64_encode("校徽/" + this.timestamp() + "/" + e.name),
			r = new XMLHttpRequest;
			r.onreadystatechange = function() {
				if (4 == r.readyState) {
					var t = JSON.parse(r.responseText);
					void 0 === t.error ? n && n("http://" + e.domain + "/" + t.key) : n && n(0)
				}
			},
			r.open("POST", o, !0),
			r.setRequestHeader("Content-Type", e.type),
			r.setRequestHeader("Authorization", "UpToken " + e.token),
			r.send(i)
		},
		getParameterByName: function(t, e) {
			e || (e = window.location.href),
			t = t.replace(/[\[\]]/g, "\\$&");
			var n = new RegExp("[?&]" + t + "(=([^&#]*)|&|#|$)"),
			i = n.exec(e);
			return i ? i[2] ? decodeURIComponent(i[2].replace(/\+/g, " ")) : "": null
		},
		HDCanvas: function(t, e) {
			var n = t.getContext("2d"),
			 i = window.devicePixelRatio || 1,
			o = n.webkitBackingStorePixelRatio || n.mozBackingStorePixelRatio || n.msBackingStorePixelRatio || n.oBackingStorePixelRatio || n.backingStorePixelRatio || 1,
			r = i / o*0.4,
			a = t.width,
			s = t.height;
			t.width = a * r,
			t.height = s * r,
			t.style.width = a + "px",
			t.style.height = s + "px",
			n.scale(r, r),
			e && e(t)
		},
		convertImgToBase64: function(t, e, n) {
			var i = this,
			o = new Image;
			o.crossOrigin = "Anonymous",
			o.onload = function() {
				var t = document.createElement("canvas"),
				r = t.getContext("2d");
				t.height = this.height,
				t.width = this.width,
				i.HDCanvas(t,
				function(t) {
					r.drawImage(o, 0, 0);
					var i = t.toDataURL(n || "image/png");
					e && e(i),
					t = null
				})
			},
			o.src = t
		},
		makeAvatarArea: function(t) {
			if (void 0 !== t.dest_size) {
				var e = t.area_size / t.dest_size;
				t.avatar_size = t.avatar_size / e,
				t.avatar_left = t.avatar_left / e,
				t.avatar_top = t.avatar_top / e,
				t.area_size = t.dest_size
			}
			var n = "position: relative; margin: auto; overflow: hidden; width: " + t.area_size + "px; height: " + t.area_size + "px;",
			i = "z-index:100;position: absolute; margin: 0px auto; background: center center / cover no-repeat;background-size:cover;width: " + t.area_size + "px; height: " + t.area_size + "px; background-image: url(&quot;" + t.bg_url + "&quot;);",
			o = "z-index:" + ( + (void 0 === t.avatar_z ? 200 : t.avatar_z) - 1) + ";position: absolute; background: white; width: " + t.avatar_size + "px; height: " + t.avatar_size + "px; border-radius: " + t.avatar_size / 2 + "px; left: " + t.avatar_left + "px; top: " + t.avatar_top + "px;",
			r = "z-index:" + (void 0 === t.avatar_z ? 200 : t.avatar_z) + ";position: absolute; background: center center / cover no-repeat; background-size:cover;width: " + t.avatar_size + "px; height: " + t.avatar_size + "px; border-radius: " + t.avatar_size / 2 + "px; left: " + t.avatar_left + "px; top: " + t.avatar_top + "px; background-image: url(&quot;" + t.avatar_url + "&quot;);",
			a = '<div style="' + n + '"><div style="' + i + '"></div><div style="' + o + '"></div><div style="' + r + '"></div></div>';
			return a
		},
		drawImageProp: function(t, e, n, i, o, r, a, s) {
			2 === arguments.length && (n = i = 0, o = t.canvas.width, r = t.canvas.height),
			a = "number" == typeof a ? a: .5,
			s = "number" == typeof s ? s: .5,
			a < 0 && (a = 0),
			s < 0 && (s = 0),
			a > 1 && (a = 1),
			s > 1 && (s = 1);
			var l, c, d, u, p = e.width,
			h = e.height,
			f = Math.min(o / p, r / h),
			g = p * f,
			m = h * f,
			v = 1;
			g < o && (v = o / g),
			Math.abs(v - 1) < 1e-14 && m < r && (v = r / m),
			g *= v,
			m *= v,
			d = p / (g / o),
			u = h / (m / r),
			l = (p - d) * a,
			c = (h - u) * s,
			l < 0 && (l = 0),
			c < 0 && (c = 0),
			d > p && (d = p),
			u > h && (u = h),
			t.drawImage(e, l, c, d, u, n, i, o, r)
		}
	}
},
, , , , , , , ,
function(t, e, n) {
	var i, o, r = {};
	n(113),
	i = n(60),
	o = n(123),
	t.exports = i || {},
	t.exports.__esModule && (t.exports = t.exports["default"]);
	var a = "function" == typeof t.exports ? t.exports.options || (t.exports.options = {}) : t.exports;
	o && (a.template = o),
	a.computed || (a.computed = {}),
	Object.keys(r).forEach(function(t) {
		var e = r[t];
		a.computed[t] = function() {
			return e
		}
	})
},
function(t, e, n) {
	var i, o, r = {};
	n(114),
	i = n(61),
	o = n(124),
	t.exports = i || {},
	t.exports.__esModule && (t.exports = t.exports["default"]);
	var a = "function" == typeof t.exports ? t.exports.options || (t.exports.options = {}) : t.exports;
	o && (a.template = o),
	a.computed || (a.computed = {}),
	Object.keys(r).forEach(function(t) {
		var e = r[t];
		a.computed[t] = function() {
			return e
		}
	})
},
function(t, e, n) {
	var i, o, r = {};
	n(119),
	o = n(125),
	t.exports = i || {},
	t.exports.__esModule && (t.exports = t.exports["default"]);
	var a = "function" == typeof t.exports ? t.exports.options || (t.exports.options = {}) : t.exports;
	o && (a.template = o),
	a.computed || (a.computed = {}),
	Object.keys(r).forEach(function(t) {
		var e = r[t];
		a.computed[t] = function() {
			return e
		}
	})
},
function(t, e, n) {
	var i, o, r = {};
	n(115),
	i = n(62),
	o = n(126),
	t.exports = i || {},
	t.exports.__esModule && (t.exports = t.exports["default"]);
	var a = "function" == typeof t.exports ? t.exports.options || (t.exports.options = {}) : t.exports;
	o && (a.template = o),
	a.computed || (a.computed = {}),
	Object.keys(r).forEach(function(t) {
		var e = r[t];
		a.computed[t] = function() {
			return e
		}
	})
},
function(t, e, n) {
	var i, o, r = {};
	n(116),
	i = n(63),
	o = n(128),
	t.exports = i || {},
	t.exports.__esModule && (t.exports = t.exports["default"]);
	var a = "function" == typeof t.exports ? t.exports.options || (t.exports.options = {}) : t.exports;
	o && (a.template = o),
	a.computed || (a.computed = {}),
	Object.keys(r).forEach(function(t) {
		var e = r[t];
		a.computed[t] = function() {
			return e
		}
	})
},
function(t, e, n) {
	var i, o, r = {};
	n(117),
	i = n(64),
	o = n(129),
	t.exports = i || {},
	t.exports.__esModule && (t.exports = t.exports["default"]);
	var a = "function" == typeof t.exports ? t.exports.options || (t.exports.options = {}) : t.exports;
	o && (a.template = o),
	a.computed || (a.computed = {}),
	Object.keys(r).forEach(function(t) {
		var e = r[t];
		a.computed[t] = function() {
			return e
		}
	})
},
function(t, e, n) {
	var i, o, r = {};
	n(118),
	i = n(65),
	o = n(130),
	t.exports = i || {},
	t.exports.__esModule && (t.exports = t.exports["default"]);
	var a = "function" == typeof t.exports ? t.exports.options || (t.exports.options = {}) : t.exports;
	o && (a.template = o),
	a.computed || (a.computed = {}),
	Object.keys(r).forEach(function(t) {
		var e = r[t];
		a.computed[t] = function() {
			return e
		}
	})
},
function(t, e, n) {
	var i, o, r, a, a; (function(s) {
		"use strict";
		function l(t) {
			return t && t.__esModule ? t: {
				"default": t
			}
		}
		var c = n(71),
		d = l(c),
		u = n(72),
		p = l(u),
		h = n(30),
		f = l(h); !
		function(n) {
			if ("object" == (0, f["default"])(e) && "undefined" != typeof t) t.exports = n();
			else {
				o = [],
				i = n,
				r = "function" == typeof i ? i.apply(e, o) : i,
				!(void 0 !== r && (t.exports = r))
			}
		} (function() {
			var t;
			return function e(t, n, i) {
				function o(s, l) {
					if (!n[s]) {
						if (!t[s]) {
							var c = "function" == typeof a && a;
							if (!l && c) return a(s, !0);
							if (r) return r(s, !0);
							var d = new Error("Cannot find module '" + s + "'");
							throw d.code = "MODULE_NOT_FOUND",
							d
						}
						var u = n[s] = {
							exports: {}
						};
						t[s][0].call(u.exports,
						function(e) {
							var n = t[s][1][e];
							return o(n ? n: e)
						},
						u, u.exports, e, t, n, i)
					}
					return n[s].exports
				}
				for (var r = "function" == typeof a && a,
				s = 0; s < i.length; s++) o(i[s]);
				return o
			} ({
				1 : [function(e, n, i) { (function(e) { !
						function(o) {
							function r(t) {
								throw RangeError(P[t])
							}
							function a(t, e) {
								for (var n = t.length; n--;) t[n] = e(t[n]);
								return t
							}
							function s(t, e) {
								return a(t.split(M), e).join(".")
							}
							function l(t) {
								for (var e, n, i = [], o = 0, r = t.length; o < r;) e = t.charCodeAt(o++),
								e >= 55296 && e <= 56319 && o < r ? (n = t.charCodeAt(o++), 56320 == (64512 & n) ? i.push(((1023 & e) << 10) + (1023 & n) + 65536) : (i.push(e), o--)) : i.push(e);
								return i
							}
							function c(t) {
								return a(t,
								function(t) {
									var e = "";
									return t > 65535 && (t -= 65536, e += L(t >>> 10 & 1023 | 55296), t = 56320 | 1023 & t),
									e += L(t)
								}).join("")
							}
							function d(t) {
								return t - 48 < 10 ? t - 22 : t - 65 < 26 ? t - 65 : t - 97 < 26 ? t - 97 : S
							}
							function u(t, e) {
								return t + 22 + 75 * (t < 26) - ((0 != e) << 5)
							}
							function p(t, e, n) {
								var i = 0;
								for (t = n ? N(t / I) : t >> 1, t += N(t / e); t > D * T >> 1; i += S) t = N(t / D);
								return N(i + (D + 1) * t / (t + C))
							}
							function h(t) {
								var e, n, i, o, a, s, l, u, h, f, g = [],
								m = t.length,
								v = 0,
								y = O,
								w = R;
								for (n = t.lastIndexOf(B), n < 0 && (n = 0), i = 0; i < n; ++i) t.charCodeAt(i) >= 128 && r("not-basic"),
								g.push(t.charCodeAt(i));
								for (o = n > 0 ? n + 1 : 0; o < m;) {
									for (a = v, s = 1, l = S; o >= m && r("invalid-input"), u = d(t.charCodeAt(o++)), (u >= S || u > N((k - v) / s)) && r("overflow"), v += u * s, h = l <= w ? E: l >= w + T ? T: l - w, !(u < h); l += S) f = S - h,
									s > N(k / f) && r("overflow"),
									s *= f;
									e = g.length + 1,
									w = p(v - a, e, 0 == a),
									N(v / e) > k - y && r("overflow"),
									y += N(v / e),
									v %= e,
									g.splice(v++, 0, y)
								}
								return c(g)
							}
							function g(t) {
								var e, n, i, o, a, s, c, d, h, f, g, m, v, y, w, x = [];
								for (t = l(t), m = t.length, e = O, n = 0, a = R, s = 0; s < m; ++s) g = t[s],
								g < 128 && x.push(L(g));
								for (i = o = x.length, o && x.push(B); i < m;) {
									for (c = k, s = 0; s < m; ++s) g = t[s],
									g >= e && g < c && (c = g);
									for (v = i + 1, c - e > N((k - n) / v) && r("overflow"), n += (c - e) * v, e = c, s = 0; s < m; ++s) if (g = t[s], g < e && ++n > k && r("overflow"), g == e) {
										for (d = n, h = S; f = h <= a ? E: h >= a + T ? T: h - a, !(d < f); h += S) w = d - f,
										y = S - f,
										x.push(L(u(f + w % y, 0))),
										d = N(w / y);
										x.push(L(u(d, 0))),
										a = p(n, v, i == o),
										n = 0,
										++i
									}++n,
									++e
								}
								return x.join("")
							}
							function m(t) {
								return s(t,
								function(t) {
									return A.test(t) ? h(t.slice(4).toLowerCase()) : t
								})
							}
							function v(t) {
								return s(t,
								function(t) {
									return z.test(t) ? "xn--" + g(t) : t
								})
							}
							var y = "object" == ("undefined" == typeof i ? "undefined": (0, f["default"])(i)) && i,
							w = "object" == ("undefined" == typeof n ? "undefined": (0, f["default"])(n)) && n && n.exports == y && n,
							x = "object" == ("undefined" == typeof e ? "undefined": (0, f["default"])(e)) && e;
							x.global !== x && x.window !== x || (o = x);
							var b, _, k = 2147483647,
							S = 36,
							E = 1,
							T = 26,
							C = 38,
							I = 700,
							R = 72,
							O = 128,
							B = "-",
							A = /^xn--/,
							z = /[^ -~]/,
							M = /\x2E|\u3002|\uFF0E|\uFF61/g,
							P = {
								overflow: "Overflow: input needs wider integers to process",
								"not-basic": "Illegal input >= 0x80 (not a basic code point)",
								"invalid-input": "Invalid input"
							},
							D = S - E,
							N = Math.floor,
							L = String.fromCharCode;
							if (b = {
								version: "1.2.4",
								ucs2: {
									decode: l,
									encode: c
								},
								decode: h,
								encode: g,
								toASCII: v,
								toUnicode: m
							},
							"function" == typeof t && "object" == (0, f["default"])(t.amd) && t.amd) t("punycode",
							function() {
								return b
							});
							else if (y && !y.nodeType) if (w) w.exports = b;
							else for (_ in b) b.hasOwnProperty(_) && (y[_] = b[_]);
							else o.punycode = b
						} (this)
					}).call(this, "undefined" != typeof s ? s: "undefined" != typeof self ? self: "undefined" != typeof window ? window: {})
				},
				{}],
				2 : [function(t, e, n) {
					function i(t, e, n) { ! t.defaultView || e === t.defaultView.pageXOffset && n === t.defaultView.pageYOffset || t.defaultView.scrollTo(e, n)
					}
					function o(t, e) {
						try {
							e && (e.width = t.width, e.height = t.height, e.getContext("2d").putImageData(t.getContext("2d").getImageData(0, 0, t.width, t.height), 0, 0))
						} catch(n) {
							s("Unable to copy canvas content from", t, n)
						}
					}
					function r(t, e) {
						for (var n = 3 === t.nodeType ? document.createTextNode(t.nodeValue) : t.cloneNode(!1), i = t.firstChild; i;) e !== !0 && 1 === i.nodeType && "SCRIPT" === i.nodeName || n.appendChild(r(i, e)),
						i = i.nextSibling;
						return 1 === t.nodeType && (n._scrollTop = t.scrollTop, n._scrollLeft = t.scrollLeft, "CANVAS" === t.nodeName ? o(t, n) : "TEXTAREA" !== t.nodeName && "SELECT" !== t.nodeName || (n.value = t.value)),
						n
					}
					function a(t) {
						if (1 === t.nodeType) {
							t.scrollTop = t._scrollTop,
							t.scrollLeft = t._scrollLeft;
							for (var e = t.firstChild; e;) a(e),
							e = e.nextSibling
						}
					}
					var s = t("./log");
					e.exports = function(t, e, n, o, s, l, c) {
						var d = r(t.documentElement, s.javascriptEnabled),
						u = e.createElement("iframe");
						return u.className = "html2canvas-container",
						u.style.visibility = "hidden",
						u.style.position = "fixed",
						u.style.left = "-10000px",
						u.style.top = "0px",
						u.style.border = "0",
						u.width = n,
						u.height = o,
						u.scrolling = "no",
						e.body.appendChild(u),
						new p["default"](function(e) {
							var n = u.contentWindow.document;
							u.contentWindow.onload = u.onload = function() {
								var t = setInterval(function() {
									n.body.childNodes.length > 0 && (a(n.documentElement), clearInterval(t), "view" === s.type && (u.contentWindow.scrollTo(l, c), !/(iPad|iPhone|iPod)/g.test(navigator.userAgent) || u.contentWindow.scrollY === c && u.contentWindow.scrollX === l || (n.documentElement.style.top = -c + "px", n.documentElement.style.left = -l + "px", n.documentElement.style.position = "absolute")), e(u))
								},
								50)
							},
							n.open(),
							n.write("<!DOCTYPE html><html></html>"),
							i(t, l, c),
							n.replaceChild(n.adoptNode(d), n.documentElement),
							n.close()
						})
					}
				},
				{
					"./log": 13
				}],
				3 : [function(t, e, n) {
					function i(t) {
						this.r = 0,
						this.g = 0,
						this.b = 0,
						this.a = null;
						this.fromArray(t) || this.namedColor(t) || this.rgb(t) || this.rgba(t) || this.hex6(t) || this.hex3(t)
					}
					i.prototype.darken = function(t) {
						var e = 1 - t;
						return new i([Math.round(this.r * e), Math.round(this.g * e), Math.round(this.b * e), this.a])
					},
					i.prototype.isTransparent = function() {
						return 0 === this.a
					},
					i.prototype.isBlack = function() {
						return 0 === this.r && 0 === this.g && 0 === this.b
					},
					i.prototype.fromArray = function(t) {
						return Array.isArray(t) && (this.r = Math.min(t[0], 255), this.g = Math.min(t[1], 255), this.b = Math.min(t[2], 255), t.length > 3 && (this.a = t[3])),
						Array.isArray(t)
					};
					var o = /^#([a-f0-9]{3})$/i;
					i.prototype.hex3 = function(t) {
						var e = null;
						return null !== (e = t.match(o)) && (this.r = parseInt(e[1][0] + e[1][0], 16), this.g = parseInt(e[1][1] + e[1][1], 16), this.b = parseInt(e[1][2] + e[1][2], 16)),
						null !== e
					};
					var r = /^#([a-f0-9]{6})$/i;
					i.prototype.hex6 = function(t) {
						var e = null;
						return null !== (e = t.match(r)) && (this.r = parseInt(e[1].substring(0, 2), 16), this.g = parseInt(e[1].substring(2, 4), 16), this.b = parseInt(e[1].substring(4, 6), 16)),
						null !== e
					};
					var a = /^rgb\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*\)$/;
					i.prototype.rgb = function(t) {
						var e = null;
						return null !== (e = t.match(a)) && (this.r = Number(e[1]), this.g = Number(e[2]), this.b = Number(e[3])),
						null !== e
					};
					var s = /^rgba\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d?\.?\d+)\s*\)$/;
					i.prototype.rgba = function(t) {
						var e = null;
						return null !== (e = t.match(s)) && (this.r = Number(e[1]), this.g = Number(e[2]), this.b = Number(e[3]), this.a = Number(e[4])),
						null !== e
					},
					i.prototype.toString = function() {
						return null !== this.a && 1 !== this.a ? "rgba(" + [this.r, this.g, this.b, this.a].join(",") + ")": "rgb(" + [this.r, this.g, this.b].join(",") + ")"
					},
					i.prototype.namedColor = function(t) {
						t = t.toLowerCase();
						var e = l[t];
						if (e) this.r = e[0],
						this.g = e[1],
						this.b = e[2];
						else if ("transparent" === t) return this.r = this.g = this.b = this.a = 0,
						!0;
						return !! e
					},
					i.prototype.isColor = !0;
					var l = {
						aliceblue: [240, 248, 255],
						antiquewhite: [250, 235, 215],
						aqua: [0, 255, 255],
						aquamarine: [127, 255, 212],
						azure: [240, 255, 255],
						beige: [245, 245, 220],
						bisque: [255, 228, 196],
						black: [0, 0, 0],
						blanchedalmond: [255, 235, 205],
						blue: [0, 0, 255],
						blueviolet: [138, 43, 226],
						brown: [165, 42, 42],
						burlywood: [222, 184, 135],
						cadetblue: [95, 158, 160],
						chartreuse: [127, 255, 0],
						chocolate: [210, 105, 30],
						coral: [255, 127, 80],
						cornflowerblue: [100, 149, 237],
						cornsilk: [255, 248, 220],
						crimson: [220, 20, 60],
						cyan: [0, 255, 255],
						darkblue: [0, 0, 139],
						darkcyan: [0, 139, 139],
						darkgoldenrod: [184, 134, 11],
						darkgray: [169, 169, 169],
						darkgreen: [0, 100, 0],
						darkgrey: [169, 169, 169],
						darkkhaki: [189, 183, 107],
						darkmagenta: [139, 0, 139],
						darkolivegreen: [85, 107, 47],
						darkorange: [255, 140, 0],
						darkorchid: [153, 50, 204],
						darkred: [139, 0, 0],
						darksalmon: [233, 150, 122],
						darkseagreen: [143, 188, 143],
						darkslateblue: [72, 61, 139],
						darkslategray: [47, 79, 79],
						darkslategrey: [47, 79, 79],
						darkturquoise: [0, 206, 209],
						darkviolet: [148, 0, 211],
						deeppink: [255, 20, 147],
						deepskyblue: [0, 191, 255],
						dimgray: [105, 105, 105],
						dimgrey: [105, 105, 105],
						dodgerblue: [30, 144, 255],
						firebrick: [178, 34, 34],
						floralwhite: [255, 250, 240],
						forestgreen: [34, 139, 34],
						fuchsia: [255, 0, 255],
						gainsboro: [220, 220, 220],
						ghostwhite: [248, 248, 255],
						gold: [255, 215, 0],
						goldenrod: [218, 165, 32],
						gray: [128, 128, 128],
						green: [0, 128, 0],
						greenyellow: [173, 255, 47],
						grey: [128, 128, 128],
						honeydew: [240, 255, 240],
						hotpink: [255, 105, 180],
						indianred: [205, 92, 92],
						indigo: [75, 0, 130],
						ivory: [255, 255, 240],
						khaki: [240, 230, 140],
						lavender: [230, 230, 250],
						lavenderblush: [255, 240, 245],
						lawngreen: [124, 252, 0],
						lemonchiffon: [255, 250, 205],
						lightblue: [173, 216, 230],
						lightcoral: [240, 128, 128],
						lightcyan: [224, 255, 255],
						lightgoldenrodyellow: [250, 250, 210],
						lightgray: [211, 211, 211],
						lightgreen: [144, 238, 144],
						lightgrey: [211, 211, 211],
						lightpink: [255, 182, 193],
						lightsalmon: [255, 160, 122],
						lightseagreen: [32, 178, 170],
						lightskyblue: [135, 206, 250],
						lightslategray: [119, 136, 153],
						lightslategrey: [119, 136, 153],
						lightsteelblue: [176, 196, 222],
						lightyellow: [255, 255, 224],
						lime: [0, 255, 0],
						limegreen: [50, 205, 50],
						linen: [250, 240, 230],
						magenta: [255, 0, 255],
						maroon: [128, 0, 0],
						mediumaquamarine: [102, 205, 170],
						mediumblue: [0, 0, 205],
						mediumorchid: [186, 85, 211],
						mediumpurple: [147, 112, 219],
						mediumseagreen: [60, 179, 113],
						mediumslateblue: [123, 104, 238],
						mediumspringgreen: [0, 250, 154],
						mediumturquoise: [72, 209, 204],
						mediumvioletred: [199, 21, 133],
						midnightblue: [25, 25, 112],
						mintcream: [245, 255, 250],
						mistyrose: [255, 228, 225],
						moccasin: [255, 228, 181],
						navajowhite: [255, 222, 173],
						navy: [0, 0, 128],
						oldlace: [253, 245, 230],
						olive: [128, 128, 0],
						olivedrab: [107, 142, 35],
						orange: [255, 165, 0],
						orangered: [255, 69, 0],
						orchid: [218, 112, 214],
						palegoldenrod: [238, 232, 170],
						palegreen: [152, 251, 152],
						paleturquoise: [175, 238, 238],
						palevioletred: [219, 112, 147],
						papayawhip: [255, 239, 213],
						peachpuff: [255, 218, 185],
						peru: [205, 133, 63],
						pink: [255, 192, 203],
						plum: [221, 160, 221],
						powderblue: [176, 224, 230],
						purple: [128, 0, 128],
						rebeccapurple: [102, 51, 153],
						red: [255, 0, 0],
						rosybrown: [188, 143, 143],
						royalblue: [65, 105, 225],
						saddlebrown: [139, 69, 19],
						salmon: [250, 128, 114],
						sandybrown: [244, 164, 96],
						seagreen: [46, 139, 87],
						seashell: [255, 245, 238],
						sienna: [160, 82, 45],
						silver: [192, 192, 192],
						skyblue: [135, 206, 235],
						slateblue: [106, 90, 205],
						slategray: [112, 128, 144],
						slategrey: [112, 128, 144],
						snow: [255, 250, 250],
						springgreen: [0, 255, 127],
						steelblue: [70, 130, 180],
						tan: [210, 180, 140],
						teal: [0, 128, 128],
						thistle: [216, 191, 216],
						tomato: [255, 99, 71],
						turquoise: [64, 224, 208],
						violet: [238, 130, 238],
						wheat: [245, 222, 179],
						white: [255, 255, 255],
						whitesmoke: [245, 245, 245],
						yellow: [255, 255, 0],
						yellowgreen: [154, 205, 50]
					};
					e.exports = i
				},
				{}],
				4 : [function(e, n, i) {
					function o(t, e) {
						var n = E++;
						if (e = e || {},
						e.logging && (w.options.logging = !0, w.options.start = Date.now()), e.async = "undefined" == typeof e.async || e.async, e.allowTaint = "undefined" != typeof e.allowTaint && e.allowTaint, e.removeContainer = "undefined" == typeof e.removeContainer || e.removeContainer, e.javascriptEnabled = "undefined" != typeof e.javascriptEnabled && e.javascriptEnabled, e.imageTimeout = "undefined" == typeof e.imageTimeout ? 1e4: e.imageTimeout, e.renderer = "function" == typeof e.renderer ? e.renderer: g, e.strict = !!e.strict, "string" == typeof t) {
							if ("string" != typeof e.proxy) return p["default"].reject("Proxy must be used when rendering url");
							var i = null != e.width ? e.width: window.innerWidth,
							o = null != e.height ? e.height: window.innerHeight;
							return _(h(t), e.proxy, document, i, o, e).then(function(t) {
								return a(t.contentWindow.document.documentElement, t, e, i, o)
							})
						}
						var s = (void 0 === t ? [document.documentElement] : t.length ? t: [t])[0];
						return s.setAttribute(S + n, n),
						r(s.ownerDocument, e, s.ownerDocument.defaultView.innerWidth, s.ownerDocument.defaultView.innerHeight, n).then(function(t) {
							return "function" == typeof e.onrendered && (w("options.onrendered is deprecated, html2canvas returns a Promise containing the canvas"), e.onrendered(t)),
							t
						})
					}
					function r(t, e, n, i, o) {
						return b(t, t, n, i, e, t.defaultView.pageXOffset, t.defaultView.pageYOffset).then(function(r) {
							w("Document cloned");
							var s = S + o,
							l = "[" + s + "='" + o + "']";
							t.querySelector(l).removeAttribute(s);
							var c = r.contentWindow,
							d = c.document.querySelector(l),
							u = "function" == typeof e.onclone ? p["default"].resolve(e.onclone(c.document)) : p["default"].resolve(!0);
							return u.then(function() {
								return a(d, r, e, n, i)
							})
						})
					}
					function a(t, e, n, i, o) {
						var r = e.contentWindow,
						a = new f(r.document),
						d = new m(n, a),
						p = k(t),
						h = "view" === n.type ? i: c(r.document),
						g = "view" === n.type ? o: u(r.document),
						y = new n.renderer(h, g, d, n, document),
						x = new v(t, y, a, d, n);
						return x.ready.then(function() {
							w("Finished rendering");
							var i;
							return i = "view" === n.type ? l(y.canvas, {
								width: y.canvas.width,
								height: y.canvas.height,
								top: 0,
								left: 0,
								x: 0,
								y: 0
							}) : t === r.document.body || t === r.document.documentElement || null != n.canvas ? y.canvas: l(y.canvas, {
								width: null != n.width ? n.width: p.width,
								height: null != n.height ? n.height: p.height,
								top: p.top,
								left: p.left,
								x: 0,
								y: 0
							}),
							s(e, n),
							i
						})
					}
					function s(t, e) {
						e.removeContainer && (t.parentNode.removeChild(t), w("Cleaned up container"))
					}
					function l(t, e) {
						var n = document.createElement("canvas"),
						i = Math.min(t.width - 1, Math.max(0, e.left)),
						o = Math.min(t.width, Math.max(1, e.left + e.width)),
						r = Math.min(t.height - 1, Math.max(0, e.top)),
						a = Math.min(t.height, Math.max(1, e.top + e.height));
						n.width = e.width,
						n.height = e.height;
						var s = o - i,
						l = a - r;
						return w("Cropping canvas at:", "left:", e.left, "top:", e.top, "width:", s, "height:", l),
						w("Resulting crop with width", e.width, "and height", e.height, "with x", i, "and y", r),
						n.getContext("2d").drawImage(t, i, r, s, l, e.x, e.y, s, l),
						n
					}
					function c(t) {
						return Math.max(Math.max(t.body.scrollWidth, t.documentElement.scrollWidth), Math.max(t.body.offsetWidth, t.documentElement.offsetWidth), Math.max(t.body.clientWidth, t.documentElement.clientWidth))
					}
					function u(t) {
						return Math.max(Math.max(t.body.scrollHeight, t.documentElement.scrollHeight), Math.max(t.body.offsetHeight, t.documentElement.offsetHeight), Math.max(t.body.clientHeight, t.documentElement.clientHeight))
					}
					function h(t) {
						var e = document.createElement("a");
						return e.href = t,
						e.href = e.href,
						e
					}
					var f = e("./support"),
					g = e("./renderers/canvas"),
					m = e("./imageloader"),
					v = e("./nodeparser"),
					y = e("./nodecontainer"),
					w = e("./log"),
					x = e("./utils"),
					b = e("./clone"),
					_ = e("./proxy").loadUrlDocument,
					k = x.getBounds,
					S = "data-html2canvas-node",
					E = 0;
					o.CanvasRenderer = g,
					o.NodeContainer = y,
					o.log = w,
					o.utils = x;
					var T = "undefined" == typeof document || "function" != typeof d["default"] || "function" != typeof document.createElement("canvas").getContext ?
					function() {
						return p["default"].reject("No canvas support")
					}: o;
					n.exports = T,
					"function" == typeof t && t.amd && t("html2canvas", [],
					function() {
						return T
					})
				},
				{
					"./clone": 2,
					"./imageloader": 11,
					"./log": 13,
					"./nodecontainer": 14,
					"./nodeparser": 15,
					"./proxy": 16,
					"./renderers/canvas": 20,
					"./support": 22,
					"./utils": 26
				}],
				5 : [function(t, e, n) {
					function i(t) {
						if (this.src = t, o("DummyImageContainer for", t), !this.promise || !this.image) {
							o("Initiating DummyImageContainer"),
							i.prototype.image = new Image;
							var e = this.image;
							i.prototype.promise = new p["default"](function(t, n) {
								e.onload = t,
								e.onerror = n,
								e.src = r(),
								e.complete === !0 && t(e)
							})
						}
					}
					var o = t("./log"),
					r = t("./utils").smallImage;
					e.exports = i
				},
				{
					"./log": 13,
					"./utils": 26
				}],
				6 : [function(t, e, n) {
					function i(t, e) {
						var n, i, r = document.createElement("div"),
						a = document.createElement("img"),
						s = document.createElement("span"),
						l = "Hidden Text";
						r.style.visibility = "hidden",
						r.style.fontFamily = t,
						r.style.fontSize = e,
						r.style.margin = 0,
						r.style.padding = 0,
						document.body.appendChild(r),
						a.src = o(),
						a.width = 1,
						a.height = 1,
						a.style.margin = 0,
						a.style.padding = 0,
						a.style.verticalAlign = "baseline",
						s.style.fontFamily = t,
						s.style.fontSize = e,
						s.style.margin = 0,
						s.style.padding = 0,
						s.appendChild(document.createTextNode(l)),
						r.appendChild(s),
						r.appendChild(a),
						n = a.offsetTop - s.offsetTop + 1,
						r.removeChild(s),
						r.appendChild(document.createTextNode(l)),
						r.style.lineHeight = "normal",
						a.style.verticalAlign = "super",
						i = a.offsetTop - r.offsetTop + 1,
						document.body.removeChild(r),
						this.baseline = n,
						this.lineWidth = 1,
						this.middle = i
					}
					var o = t("./utils").smallImage;
					e.exports = i
				},
				{
					"./utils": 26
				}],
				7 : [function(t, e, n) {
					function i() {
						this.data = {}
					}
					var o = t("./font");
					i.prototype.getMetrics = function(t, e) {
						return void 0 === this.data[t + "-" + e] && (this.data[t + "-" + e] = new o(t, e)),
						this.data[t + "-" + e]
					},
					e.exports = i
				},
				{
					"./font": 6
				}],
				8 : [function(t, e, n) {
					function i(e, n, i) {
						this.image = null,
						this.src = e;
						var o = this,
						a = r(e);
						this.promise = (n ? new p["default"](function(t) {
							"about:blank" === e.contentWindow.document.URL || null == e.contentWindow.document.documentElement ? e.contentWindow.onload = e.onload = function() {
								t(e)
							}: t(e)
						}) : this.proxyLoad(i.proxy, a, i)).then(function(e) {
							var n = t("./core");
							return n(e.contentWindow.document.documentElement, {
								type: "view",
								width: e.width,
								height: e.height,
								proxy: i.proxy,
								javascriptEnabled: i.javascriptEnabled,
								removeContainer: i.removeContainer,
								allowTaint: i.allowTaint,
								imageTimeout: i.imageTimeout / 2
							})
						}).then(function(t) {
							return o.image = t
						})
					}
					var o = t("./utils"),
					r = o.getBounds,
					a = t("./proxy").loadUrlDocument;
					i.prototype.proxyLoad = function(t, e, n) {
						var i = this.src;
						return a(i.src, t, i.ownerDocument, e.width, e.height, n)
					},
					e.exports = i
				},
				{
					"./core": 4,
					"./proxy": 16,
					"./utils": 26
				}],
				9 : [function(t, e, n) {
					function i(t) {
						this.src = t.value,
						this.colorStops = [],
						this.type = null,
						this.x0 = .5,
						this.y0 = .5,
						this.x1 = .5,
						this.y1 = .5,
						this.promise = p["default"].resolve(!0)
					}
					i.TYPES = {
						LINEAR: 1,
						RADIAL: 2
					},
					i.REGEXP_COLORSTOP = /^\s*(rgba?\(\s*\d{1,3},\s*\d{1,3},\s*\d{1,3}(?:,\s*[0-9\.]+)?\s*\)|[a-z]{3,20}|#[a-f0-9]{3,6})(?:\s+(\d{1,3}(?:\.\d+)?)(%|px)?)?(?:\s|$)/i,
					e.exports = i
				},
				{}],
				10 : [function(t, e, n) {
					function i(t, e) {
						this.src = t,
						this.image = new Image;
						var n = this;
						this.tainted = null,
						this.promise = new p["default"](function(i, o) {
							n.image.onload = i,
							n.image.onerror = o,
							e && (n.image.crossOrigin = "anonymous"),
							n.image.src = t,
							n.image.complete === !0 && i(n.image)
						})
					}
					e.exports = i
				},
				{}],
				11 : [function(t, e, n) {
					function i(t, e) {
						this.link = null,
						this.options = t,
						this.support = e,
						this.origin = this.getOrigin(window.location.href)
					}
					var o = t("./log"),
					r = t("./imagecontainer"),
					a = t("./dummyimagecontainer"),
					s = t("./proxyimagecontainer"),
					l = t("./framecontainer"),
					c = t("./svgcontainer"),
					d = t("./svgnodecontainer"),
					u = t("./lineargradientcontainer"),
					h = t("./webkitgradientcontainer"),
					f = t("./utils").bind;
					i.prototype.findImages = function(t) {
						var e = [];
						return t.reduce(function(t, e) {
							switch (e.node.nodeName) {
							case "IMG":
								return t.concat([{
									args:
									[e.node.src],
									method: "url"
								}]);
							case "svg":
							case "IFRAME":
								return t.concat([{
									args:
									[e.node],
									method: e.node.nodeName
								}])
							}
							return t
						},
						[]).forEach(this.addImage(e, this.loadImage), this),
						e
					},
					i.prototype.findBackgroundImage = function(t, e) {
						return e.parseBackgroundImages().filter(this.hasImageBackground).forEach(this.addImage(t, this.loadImage), this),
						t
					},
					i.prototype.addImage = function(t, e) {
						return function(n) {
							n.args.forEach(function(i) {
								this.imageExists(t, i) || (t.splice(0, 0, e.call(this, n)), o("Added image #" + t.length, "string" == typeof i ? i.substring(0, 100) : i))
							},
							this)
						}
					},
					i.prototype.hasImageBackground = function(t) {
						return "none" !== t.method
					},
					i.prototype.loadImage = function(t) {
						if ("url" === t.method) {
							var e = t.args[0];
							return ! this.isSVG(e) || this.support.svg || this.options.allowTaint ? e.match(/data:image\/.*;base64,/i) ? new r(e.replace(/url\(['"]{0,}|['"]{0,}\)$/gi, ""), (!1)) : this.isSameOrigin(e) || this.options.allowTaint === !0 || this.isSVG(e) ? new r(e, (!1)) : this.support.cors && !this.options.allowTaint && this.options.useCORS ? new r(e, (!0)) : this.options.proxy ? new s(e, this.options.proxy) : new a(e) : new c(e)
						}
						return "linear-gradient" === t.method ? new u(t) : "gradient" === t.method ? new h(t) : "svg" === t.method ? new d(t.args[0], this.support.svg) : "IFRAME" === t.method ? new l(t.args[0], this.isSameOrigin(t.args[0].src), this.options) : new a(t)
					},
					i.prototype.isSVG = function(t) {
						return "svg" === t.substring(t.length - 3).toLowerCase() || c.prototype.isInline(t)
					},
					i.prototype.imageExists = function(t, e) {
						return t.some(function(t) {
							return t.src === e
						})
					},
					i.prototype.isSameOrigin = function(t) {
						return this.getOrigin(t) === this.origin
					},
					i.prototype.getOrigin = function(t) {
						var e = this.link || (this.link = document.createElement("a"));
						return e.href = t,
						e.href = e.href,
						e.protocol + e.hostname + e.port
					},
					i.prototype.getPromise = function(t) {
						return this.timeout(t, this.options.imageTimeout)["catch"](function() {
							var e = new a(t.src);
							return e.promise.then(function(e) {
								t.image = e
							})
						})
					},
					i.prototype.get = function(t) {
						var e = null;
						return this.images.some(function(n) {
							return (e = n).src === t
						}) ? e: null
					},
					i.prototype.fetch = function(t) {
						return this.images = t.reduce(f(this.findBackgroundImage, this), this.findImages(t)),
						this.images.forEach(function(t, e) {
							t.promise.then(function() {
								o("Succesfully loaded image #" + (e + 1), t)
							},
							function(n) {
								o("Failed loading image #" + (e + 1), t, n)
							})
						}),
						this.ready = p["default"].all(this.images.map(this.getPromise, this)),
						o("Finished searching images"),
						this
					},
					i.prototype.timeout = function(t, e) {
						var n, i = p["default"].race([t.promise, new p["default"](function(i, r) {
							n = setTimeout(function() {
								o("Timed out loading image", t),
								r(t)
							},
							e)
						})]).then(function(t) {
							return clearTimeout(n),
							t
						});
						return i["catch"](function() {
							clearTimeout(n)
						}),
						i
					},
					e.exports = i
				},
				{
					"./dummyimagecontainer": 5,
					"./framecontainer": 8,
					"./imagecontainer": 10,
					"./lineargradientcontainer": 12,
					"./log": 13,
					"./proxyimagecontainer": 17,
					"./svgcontainer": 23,
					"./svgnodecontainer": 24,
					"./utils": 26,
					"./webkitgradientcontainer": 27
				}],
				12 : [function(t, e, n) {
					function i(t) {
						o.apply(this, arguments),
						this.type = o.TYPES.LINEAR;
						var e = i.REGEXP_DIRECTION.test(t.args[0]) || !o.REGEXP_COLORSTOP.test(t.args[0]);
						e ? t.args[0].split(/\s+/).reverse().forEach(function(t, e) {
							switch (t) {
							case "left":
								this.x0 = 0,
								this.x1 = 1;
								break;
							case "top":
								this.y0 = 0,
								this.y1 = 1;
								break;
							case "right":
								this.x0 = 1,
								this.x1 = 0;
								break;
							case "bottom":
								this.y0 = 1,
								this.y1 = 0;
								break;
							case "to":
								var n = this.y0,
								i = this.x0;
								this.y0 = this.y1,
								this.x0 = this.x1,
								this.x1 = i,
								this.y1 = n;
								break;
							case "center":
								break;
							default:
								var o = .01 * parseFloat(t, 10);
								if (isNaN(o)) break;
								0 === e ? (this.y0 = o, this.y1 = 1 - this.y0) : (this.x0 = o, this.x1 = 1 - this.x0)
							}
						},
						this) : (this.y0 = 0, this.y1 = 1),
						this.colorStops = t.args.slice(e ? 1 : 0).map(function(t) {
							var e = t.match(o.REGEXP_COLORSTOP),
							n = +e[2],
							i = 0 === n ? "%": e[3];
							return {
								color: new r(e[1]),
								stop: "%" === i ? n / 100 : null
							}
						}),
						null === this.colorStops[0].stop && (this.colorStops[0].stop = 0),
						null === this.colorStops[this.colorStops.length - 1].stop && (this.colorStops[this.colorStops.length - 1].stop = 1),
						this.colorStops.forEach(function(t, e) {
							null === t.stop && this.colorStops.slice(e).some(function(n, i) {
								return null !== n.stop && (t.stop = (n.stop - this.colorStops[e - 1].stop) / (i + 1) + this.colorStops[e - 1].stop, !0)
							},
							this)
						},
						this)
					}
					var o = t("./gradientcontainer"),
					r = t("./color");
					i.prototype = (0, d["default"])(o.prototype),
					i.REGEXP_DIRECTION = /^\s*(?:to|left|right|top|bottom|center|\d{1,3}(?:\.\d+)?%?)(?:\s|$)/i,
					e.exports = i
				},
				{
					"./color": 3,
					"./gradientcontainer": 9
				}],
				13 : [function(t, e, n) {
					var i = function o() {
						o.options.logging && window.console && window.console.log && Function.prototype.bind.call(window.console.log, window.console).apply(window.console, [Date.now() - o.options.start + "ms", "html2canvas:"].concat([].slice.call(arguments, 0)))
					};
					i.options = {
						logging: !1
					},
					e.exports = i
				},
				{}],
				14 : [function(t, e, n) {
					function i(t, e) {
						this.node = t,
						this.parent = e,
						this.stack = null,
						this.bounds = null,
						this.borders = null,
						this.clip = [],
						this.backgroundClip = [],
						this.offsetBounds = null,
						this.visible = null,
						this.computedStyles = null,
						this.colors = {},
						this.styles = {},
						this.backgroundImages = null,
						this.transformData = null,
						this.transformMatrix = null,
						this.isPseudoElement = !1,
						this.opacity = null
					}
					function o(t) {
						var e = t.options[t.selectedIndex || 0];
						return e ? e.text || "": ""
					}
					function r(t) {
						if (t && "matrix" === t[1]) return t[2].split(",").map(function(t) {
							return parseFloat(t.trim())
						});
						if (t && "matrix3d" === t[1]) {
							var e = t[2].split(",").map(function(t) {
								return parseFloat(t.trim())
							});
							return [e[0], e[1], e[4], e[5], e[12], e[13]]
						}
					}
					function a(t) {
						return t.toString().indexOf("%") !== -1
					}
					function s(t) {
						return t.replace("px", "")
					}
					function l(t) {
						return parseFloat(t)
					}
					var c = t("./color"),
					d = t("./utils"),
					u = d.getBounds,
					p = d.parseBackgrounds,
					h = d.offsetBounds;
					i.prototype.cloneTo = function(t) {
						t.visible = this.visible,
						t.borders = this.borders,
						t.bounds = this.bounds,
						t.clip = this.clip,
						t.backgroundClip = this.backgroundClip,
						t.computedStyles = this.computedStyles,
						t.styles = this.styles,
						t.backgroundImages = this.backgroundImages,
						t.opacity = this.opacity
					},
					i.prototype.getOpacity = function() {
						return null === this.opacity ? this.opacity = this.cssFloat("opacity") : this.opacity
					},
					i.prototype.assignStack = function(t) {
						this.stack = t,
						t.children.push(this)
					},
					i.prototype.isElementVisible = function() {
						return this.node.nodeType === Node.TEXT_NODE ? this.parent.visible: "none" !== this.css("display") && "hidden" !== this.css("visibility") && !this.node.hasAttribute("data-html2canvas-ignore") && ("INPUT" !== this.node.nodeName || "hidden" !== this.node.getAttribute("type"))
					},
					i.prototype.css = function(t) {
						return this.computedStyles || (this.computedStyles = this.isPseudoElement ? this.parent.computedStyle(this.before ? ":before": ":after") : this.computedStyle(null)),
						this.styles[t] || (this.styles[t] = this.computedStyles[t])
					},
					i.prototype.prefixedCss = function(t) {
						var e = ["webkit", "moz", "ms", "o"],
						n = this.css(t);
						return void 0 === n && e.some(function(e) {
							return n = this.css(e + t.substr(0, 1).toUpperCase() + t.substr(1)),
							void 0 !== n
						},
						this),
						void 0 === n ? null: n
					},
					i.prototype.computedStyle = function(t) {
						return this.node.ownerDocument.defaultView.getComputedStyle(this.node, t)
					},
					i.prototype.cssInt = function(t) {
						var e = parseInt(this.css(t), 10);
						return isNaN(e) ? 0 : e
					},
					i.prototype.color = function(t) {
						return this.colors[t] || (this.colors[t] = new c(this.css(t)))
					},
					i.prototype.cssFloat = function(t) {
						var e = parseFloat(this.css(t));
						return isNaN(e) ? 0 : e
					},
					i.prototype.fontWeight = function() {
						var t = this.css("fontWeight");
						switch (parseInt(t, 10)) {
						case 401:
							t = "bold";
							break;
						case 400:
							t = "normal"
						}
						return t
					},
					i.prototype.parseClip = function() {
						var t = this.css("clip").match(this.CLIP);
						return t ? {
							top: parseInt(t[1], 10),
							right: parseInt(t[2], 10),
							bottom: parseInt(t[3], 10),
							left: parseInt(t[4], 10)
						}: null
					},
					i.prototype.parseBackgroundImages = function() {
						return this.backgroundImages || (this.backgroundImages = p(this.css("backgroundImage")))
					},
					i.prototype.cssList = function(t, e) {
						var n = (this.css(t) || "").split(",");
						return n = n[e || 0] || n[0] || "auto",
						n = n.trim().split(" "),
						1 === n.length && (n = [n[0], a(n[0]) ? "auto": n[0]]),
						n
					},
					i.prototype.parseBackgroundSize = function(t, e, n) {
						var i, o, r = this.cssList("backgroundSize", n);
						if (a(r[0])) i = t.width * parseFloat(r[0]) / 100;
						else {
							if (/contain|cover/.test(r[0])) {
								var s = t.width / t.height,
								l = e.width / e.height;
								return s < l ^ "contain" === r[0] ? {
									width: t.height * l,
									height: t.height
								}: {
									width: t.width,
									height: t.width / l
								}
							}
							i = parseInt(r[0], 10)
						}
						return o = "auto" === r[0] && "auto" === r[1] ? e.height: "auto" === r[1] ? i / e.width * e.height: a(r[1]) ? t.height * parseFloat(r[1]) / 100 : parseInt(r[1], 10),
						"auto" === r[0] && (i = o / e.height * e.width),
						{
							width: i,
							height: o
						}
					},
					i.prototype.parseBackgroundPosition = function(t, e, n, i) {
						var o, r, s = this.cssList("backgroundPosition", n);
						return o = a(s[0]) ? (t.width - (i || e).width) * (parseFloat(s[0]) / 100) : parseInt(s[0], 10),
						r = "auto" === s[1] ? o / e.width * e.height: a(s[1]) ? (t.height - (i || e).height) * parseFloat(s[1]) / 100 : parseInt(s[1], 10),
						"auto" === s[0] && (o = r / e.height * e.width),
						{
							left: o,
							top: r
						}
					},
					i.prototype.parseBackgroundRepeat = function(t) {
						return this.cssList("backgroundRepeat", t)[0]
					},
					i.prototype.parseTextShadows = function() {
						var t = this.css("textShadow"),
						e = [];
						if (t && "none" !== t) for (var n = t.match(this.TEXT_SHADOW_PROPERTY), i = 0; n && i < n.length; i++) {
							var o = n[i].match(this.TEXT_SHADOW_VALUES);
							e.push({
								color: new c(o[0]),
								offsetX: o[1] ? parseFloat(o[1].replace("px", "")) : 0,
								offsetY: o[2] ? parseFloat(o[2].replace("px", "")) : 0,
								blur: o[3] ? o[3].replace("px", "") : 0
							})
						}
						return e
					},
					i.prototype.parseTransform = function() {
						if (!this.transformData) if (this.hasTransform()) {
							var t = this.parseBounds(),
							e = this.prefixedCss("transformOrigin").split(" ").map(s).map(l);
							e[0] += t.left,
							e[1] += t.top,
							this.transformData = {
								origin: e,
								matrix: this.parseTransformMatrix()
							}
						} else this.transformData = {
							origin: [0, 0],
							matrix: [1, 0, 0, 1, 0, 0]
						};
						return this.transformData
					},
					i.prototype.parseTransformMatrix = function() {
						if (!this.transformMatrix) {
							var t = this.prefixedCss("transform"),
							e = t ? r(t.match(this.MATRIX_PROPERTY)) : null;
							this.transformMatrix = e ? e: [1, 0, 0, 1, 0, 0]
						}
						return this.transformMatrix
					},
					i.prototype.parseBounds = function() {
						return this.bounds || (this.bounds = this.hasTransform() ? h(this.node) : u(this.node))
					},
					i.prototype.hasTransform = function() {
						return "1,0,0,1,0,0" !== this.parseTransformMatrix().join(",") || this.parent && this.parent.hasTransform()
					},
					i.prototype.getValue = function() {
						var t = this.node.value || "";
						return "SELECT" === this.node.tagName ? t = o(this.node) : "password" === this.node.type && (t = Array(t.length + 1).join("•")),
						0 === t.length ? this.node.placeholder || "": t
					},
					i.prototype.MATRIX_PROPERTY = /(matrix|matrix3d)\((.+)\)/,
					i.prototype.TEXT_SHADOW_PROPERTY = /((rgba|rgb)\([^\)]+\)(\s-?\d+px){0,})/g,
					i.prototype.TEXT_SHADOW_VALUES = /(-?\d+px)|(#.+)|(rgb\(.+\))|(rgba\(.+\))/g,
					i.prototype.CLIP = /^rect\((\d+)px,? (\d+)px,? (\d+)px,? (\d+)px\)$/,
					e.exports = i
				},
				{
					"./color": 3,
					"./utils": 26
				}],
				15 : [function(t, e, n) {
					function i(t, e, n, i, o) {
						F("Starting NodeParser"),
						this.renderer = e,
						this.options = o,
						this.range = null,
						this.support = n,
						this.renderQueue = [],
						this.stack = new G((!0), 1, t.ownerDocument, null);
						var r = new U(t, null);
						if (o.background && e.rectangle(0, 0, e.width, e.height, new $(o.background)), t === t.ownerDocument.documentElement) {
							var a = new U(r.color("backgroundColor").isTransparent() ? t.ownerDocument.body: t.ownerDocument.documentElement, null);
							e.rectangle(0, 0, e.width, e.height, a.color("backgroundColor"))
						}
						r.visibile = r.isElementVisible(),
						this.createPseudoHideStyles(t.ownerDocument),
						this.disableAnimations(t.ownerDocument),
						this.nodes = D([r].concat(this.getChildren(r)).filter(function(t) {
							return t.visible = t.isElementVisible()
						}).map(this.getPseudoElements, this)),
						this.fontMetrics = new V,
						F("Fetched nodes, total:", this.nodes.length),
						F("Calculate overflow clips"),
						this.calculateOverflowClips(),
						F("Start fetching images"),
						this.images = i.fetch(this.nodes.filter(I)),
						this.ready = this.images.ready.then(K(function() {
							return F("Images loaded, starting parsing"),
							F("Creating stacking contexts"),
							this.createStackingContexts(),
							F("Sorting stacking contexts"),
							this.sortStackingContexts(this.stack),
							this.parse(this.stack),
							F("Render queue created with " + this.renderQueue.length + " items"),
							new p["default"](K(function(t) {
								o.async ? "function" == typeof o.async ? o.async.call(this, this.renderQueue, t) : this.renderQueue.length > 0 ? (this.renderIndex = 0, this.asyncRenderer(this.renderQueue, t)) : t() : (this.renderQueue.forEach(this.paint, this), t())
							},
							this))
						},
						this))
					}
					function o(t) {
						return t.parent && t.parent.clip.length
					}
					function r(t) {
						return t.replace(/(\-[a-z])/g,
						function(t) {
							return t.toUpperCase().replace("-", "")
						})
					}
					function a() {}
					function s(t, e, n, i) {
						return t.map(function(o, r) {
							if (o.width > 0) {
								var a = e.left,
								s = e.top,
								l = e.width,
								c = e.height - t[2].width;
								switch (r) {
								case 0:
									c = t[0].width,
									o.args = u({
										c1: [a, s],
										c2: [a + l, s],
										c3: [a + l - t[1].width, s + c],
										c4: [a + t[3].width, s + c]
									},
									i[0], i[1], n.topLeftOuter, n.topLeftInner, n.topRightOuter, n.topRightInner);
									break;
								case 1:
									a = e.left + e.width - t[1].width,
									l = t[1].width,
									o.args = u({
										c1: [a + l, s],
										c2: [a + l, s + c + t[2].width],
										c3: [a, s + c],
										c4: [a, s + t[0].width]
									},
									i[1], i[2], n.topRightOuter, n.topRightInner, n.bottomRightOuter, n.bottomRightInner);
									break;
								case 2:
									s = s + e.height - t[2].width,
									c = t[2].width,
									o.args = u({
										c1: [a + l, s + c],
										c2: [a, s + c],
										c3: [a + t[3].width, s],
										c4: [a + l - t[3].width, s]
									},
									i[2], i[3], n.bottomRightOuter, n.bottomRightInner, n.bottomLeftOuter, n.bottomLeftInner);
									break;
								case 3:
									l = t[3].width,
									o.args = u({
										c1: [a, s + c + t[2].width],
										c2: [a, s],
										c3: [a + l, s + t[0].width],
										c4: [a + l, s + c]
									},
									i[3], i[0], n.bottomLeftOuter, n.bottomLeftInner, n.topLeftOuter, n.topLeftInner)
								}
							}
							return o
						})
					}
					function l(t, e, n, i) {
						var o = 4 * ((Math.sqrt(2) - 1) / 3),
						r = n * o,
						a = i * o,
						s = t + n,
						l = e + i;
						return {
							topLeft: d({
								x: t,
								y: l
							},
							{
								x: t,
								y: l - a
							},
							{
								x: s - r,
								y: e
							},
							{
								x: s,
								y: e
							}),
							topRight: d({
								x: t,
								y: e
							},
							{
								x: t + r,
								y: e
							},
							{
								x: s,
								y: l - a
							},
							{
								x: s,
								y: l
							}),
							bottomRight: d({
								x: s,
								y: e
							},
							{
								x: s,
								y: e + a
							},
							{
								x: t + r,
								y: l
							},
							{
								x: t,
								y: l
							}),
							bottomLeft: d({
								x: s,
								y: l
							},
							{
								x: s - r,
								y: l
							},
							{
								x: t,
								y: e + a
							},
							{
								x: t,
								y: e
							})
						}
					}
					function c(t, e, n) {
						var i = t.left,
						o = t.top,
						r = t.width,
						a = t.height,
						s = e[0][0] < r / 2 ? e[0][0] : r / 2,
						c = e[0][1] < a / 2 ? e[0][1] : a / 2,
						d = e[1][0] < r / 2 ? e[1][0] : r / 2,
						u = e[1][1] < a / 2 ? e[1][1] : a / 2,
						p = e[2][0] < r / 2 ? e[2][0] : r / 2,
						h = e[2][1] < a / 2 ? e[2][1] : a / 2,
						f = e[3][0] < r / 2 ? e[3][0] : r / 2,
						g = e[3][1] < a / 2 ? e[3][1] : a / 2,
						m = r - d,
						v = a - h,
						y = r - p,
						w = a - g;
						return {
							topLeftOuter: l(i, o, s, c).topLeft.subdivide(.5),
							topLeftInner: l(i + n[3].width, o + n[0].width, Math.max(0, s - n[3].width), Math.max(0, c - n[0].width)).topLeft.subdivide(.5),
							topRightOuter: l(i + m, o, d, u).topRight.subdivide(.5),
							topRightInner: l(i + Math.min(m, r + n[3].width), o + n[0].width, m > r + n[3].width ? 0 : d - n[3].width, u - n[0].width).topRight.subdivide(.5),
							bottomRightOuter: l(i + y, o + v, p, h).bottomRight.subdivide(.5),
							bottomRightInner: l(i + Math.min(y, r - n[3].width), o + Math.min(v, a + n[0].width), Math.max(0, p - n[1].width), h - n[2].width).bottomRight.subdivide(.5),
							bottomLeftOuter: l(i, o + w, f, g).bottomLeft.subdivide(.5),
							bottomLeftInner: l(i + n[3].width, o + w, Math.max(0, f - n[3].width), g - n[2].width).bottomLeft.subdivide(.5)
						}
					}
					function d(t, e, n, i) {
						var o = function(t, e, n) {
							return {
								x: t.x + (e.x - t.x) * n,
								y: t.y + (e.y - t.y) * n
							}
						};
						return {
							start: t,
							startControl: e,
							endControl: n,
							end: i,
							subdivide: function(r) {
								var a = o(t, e, r),
								s = o(e, n, r),
								l = o(n, i, r),
								c = o(a, s, r),
								u = o(s, l, r),
								p = o(c, u, r);
								return [d(t, a, c, p), d(p, u, l, i)]
							},
							curveTo: function(t) {
								t.push(["bezierCurve", e.x, e.y, n.x, n.y, i.x, i.y])
							},
							curveToReversed: function(i) {
								i.push(["bezierCurve", n.x, n.y, e.x, e.y, t.x, t.y])
							}
						}
					}
					function u(t, e, n, i, o, r, a) {
						var s = [];
						return e[0] > 0 || e[1] > 0 ? (s.push(["line", i[1].start.x, i[1].start.y]), i[1].curveTo(s)) : s.push(["line", t.c1[0], t.c1[1]]),
						n[0] > 0 || n[1] > 0 ? (s.push(["line", r[0].start.x, r[0].start.y]), r[0].curveTo(s), s.push(["line", a[0].end.x, a[0].end.y]), a[0].curveToReversed(s)) : (s.push(["line", t.c2[0], t.c2[1]]), s.push(["line", t.c3[0], t.c3[1]])),
						e[0] > 0 || e[1] > 0 ? (s.push(["line", o[1].end.x, o[1].end.y]), o[1].curveToReversed(s)) : s.push(["line", t.c4[0], t.c4[1]]),
						s
					}
					function h(t, e, n, i, o, r, a) {
						e[0] > 0 || e[1] > 0 ? (t.push(["line", i[0].start.x, i[0].start.y]), i[0].curveTo(t), i[1].curveTo(t)) : t.push(["line", r, a]),
						(n[0] > 0 || n[1] > 0) && t.push(["line", o[0].start.x, o[0].start.y])
					}
					function f(t) {
						return t.cssInt("zIndex") < 0
					}
					function g(t) {
						return t.cssInt("zIndex") > 0
					}
					function m(t) {
						return 0 === t.cssInt("zIndex")
					}
					function v(t) {
						return ["inline", "inline-block", "inline-table"].indexOf(t.css("display")) !== -1
					}
					function y(t) {
						return t instanceof G
					}
					function w(t) {
						return t.node.data.trim().length > 0
					}
					function x(t) {
						return /^(normal|none|0px)$/.test(t.parent.css("letterSpacing"))
					}
					function b(t) {
						return ["TopLeft", "TopRight", "BottomRight", "BottomLeft"].map(function(e) {
							var n = t.css("border" + e + "Radius"),
							i = n.split(" ");
							return i.length <= 1 && (i[1] = i[0]),
							i.map(z)
						})
					}
					function _(t) {
						return t.nodeType === Node.TEXT_NODE || t.nodeType === Node.ELEMENT_NODE
					}
					function k(t) {
						var e = t.css("position"),
						n = ["absolute", "relative", "fixed"].indexOf(e) !== -1 ? t.css("zIndex") : "auto";
						return "auto" !== n
					}
					function S(t) {
						return "static" !== t.css("position")
					}
					function E(t) {
						return "none" !== t.css("float")
					}
					function T(t) {
						return ["inline-block", "inline-table"].indexOf(t.css("display")) !== -1
					}
					function C(t) {
						var e = this;
						return function() {
							return ! t.apply(e, arguments)
						}
					}
					function I(t) {
						return t.node.nodeType === Node.ELEMENT_NODE
					}
					function R(t) {
						return t.isPseudoElement === !0
					}
					function O(t) {
						return t.node.nodeType === Node.TEXT_NODE
					}
					function B(t) {
						return function(e, n) {
							return e.cssInt("zIndex") + t.indexOf(e) / t.length - (n.cssInt("zIndex") + t.indexOf(n) / t.length)
						}
					}
					function A(t) {
						return t.getOpacity() < 1
					}
					function z(t) {
						return parseInt(t, 10)
					}
					function M(t) {
						return t.width
					}
					function P(t) {
						return t.node.nodeType !== Node.ELEMENT_NODE || ["SCRIPT", "HEAD", "TITLE", "OBJECT", "BR", "OPTION"].indexOf(t.node.nodeName) === -1
					}
					function D(t) {
						return [].concat.apply([], t)
					}
					function N(t) {
						var e = t.substr(0, 1);
						return e === t.substr(t.length - 1) && e.match(/'|"/) ? t.substr(1, t.length - 2) : t
					}
					function L(t) {
						for (var e, n = [], i = 0, o = !1; t.length;) j(t[i]) === o ? (e = t.splice(0, i), e.length && n.push(H.ucs2.encode(e)), o = !o, i = 0) : i++,
						i >= t.length && (e = t.splice(0, i), e.length && n.push(H.ucs2.encode(e)));
						return n
					}
					function j(t) {
						return [32, 13, 10, 9, 45].indexOf(t) !== -1
					}
					function W(t) {
						return /[^\u0000-\u00ff]/.test(t)
					}
					var F = t("./log"),
					H = t("punycode"),
					U = t("./nodecontainer"),
					q = t("./textcontainer"),
					X = t("./pseudoelementcontainer"),
					V = t("./fontmetrics"),
					$ = t("./color"),
					G = t("./stackingcontext"),
					Y = t("./utils"),
					K = Y.bind,
					Q = Y.getBounds,
					J = Y.parseBackgrounds,
					Z = Y.offsetBounds;
					i.prototype.calculateOverflowClips = function() {
						this.nodes.forEach(function(t) {
							if (I(t)) {
								R(t) && t.appendToDOM(),
								t.borders = this.parseBorders(t);
								var e = "hidden" === t.css("overflow") ? [t.borders.clip] : [],
								n = t.parseClip();
								n && ["absolute", "fixed"].indexOf(t.css("position")) !== -1 && e.push([["rect", t.bounds.left + n.left, t.bounds.top + n.top, n.right - n.left, n.bottom - n.top]]),
								t.clip = o(t) ? t.parent.clip.concat(e) : e,
								t.backgroundClip = "hidden" !== t.css("overflow") ? t.clip.concat([t.borders.clip]) : t.clip,
								R(t) && t.cleanDOM()
							} else O(t) && (t.clip = o(t) ? t.parent.clip: []);
							R(t) || (t.bounds = null)
						},
						this)
					},
					i.prototype.asyncRenderer = function(t, e, n) {
						n = n || Date.now(),
						this.paint(t[this.renderIndex++]),
						t.length === this.renderIndex ? e() : n + 20 > Date.now() ? this.asyncRenderer(t, e, n) : setTimeout(K(function() {
							this.asyncRenderer(t, e)
						},
						this), 0)
					},
					i.prototype.createPseudoHideStyles = function(t) {
						this.createStyles(t, "." + X.prototype.PSEUDO_HIDE_ELEMENT_CLASS_BEFORE + ':before { content: "" !important; display: none !important; }.' + X.prototype.PSEUDO_HIDE_ELEMENT_CLASS_AFTER + ':after { content: "" !important; display: none !important; }')
					},
					i.prototype.disableAnimations = function(t) {
						this.createStyles(t, "* { -webkit-animation: none !important; -moz-animation: none !important; -o-animation: none !important; animation: none !important; -webkit-transition: none !important; -moz-transition: none !important; -o-transition: none !important; transition: none !important;}")
					},
					i.prototype.createStyles = function(t, e) {
						var n = t.createElement("style");
						n.innerHTML = e,
						t.body.appendChild(n)
					},
					i.prototype.getPseudoElements = function(t) {
						var e = [[t]];
						if (t.node.nodeType === Node.ELEMENT_NODE) {
							var n = this.getPseudoElement(t, ":before"),
							i = this.getPseudoElement(t, ":after");
							n && e.push(n),
							i && e.push(i)
						}
						return D(e)
					},
					i.prototype.getPseudoElement = function(t, e) {
						var n = t.computedStyle(e);
						if (!n || !n.content || "none" === n.content || "-moz-alt-content" === n.content || "none" === n.display) return null;
						for (var i = N(n.content), o = "url" === i.substr(0, 3), a = document.createElement(o ? "img": "html2canvaspseudoelement"), s = new X(a, t, e), l = n.length - 1; l >= 0; l--) {
							var c = r(n.item(l));
							a.style[c] = n[c]
						}
						if (a.className = X.prototype.PSEUDO_HIDE_ELEMENT_CLASS_BEFORE + " " + X.prototype.PSEUDO_HIDE_ELEMENT_CLASS_AFTER, o) return a.src = J(i)[0].args[0],
						[s];
						var d = document.createTextNode(i);
						return a.appendChild(d),
						[s, new q(d, s)]
					},
					i.prototype.getChildren = function(t) {
						return D([].filter.call(t.node.childNodes, _).map(function(e) {
							var n = [e.nodeType === Node.TEXT_NODE ? new q(e, t) : new U(e, t)].filter(P);
							return e.nodeType === Node.ELEMENT_NODE && n.length && "TEXTAREA" !== e.tagName ? n[0].isElementVisible() ? n.concat(this.getChildren(n[0])) : [] : n
						},
						this))
					},
					i.prototype.newStackingContext = function(t, e) {
						var n = new G(e, t.getOpacity(), t.node, t.parent);
						t.cloneTo(n);
						var i = e ? n.getParentStack(this) : n.parent.stack;
						i.contexts.push(n),
						t.stack = n
					},
					i.prototype.createStackingContexts = function() {
						this.nodes.forEach(function(t) {
							I(t) && (this.isRootElement(t) || A(t) || k(t) || this.isBodyWithTransparentRoot(t) || t.hasTransform()) ? this.newStackingContext(t, !0) : I(t) && (S(t) && m(t) || T(t) || E(t)) ? this.newStackingContext(t, !1) : t.assignStack(t.parent.stack)
						},
						this)
					},
					i.prototype.isBodyWithTransparentRoot = function(t) {
						return "BODY" === t.node.nodeName && t.parent.color("backgroundColor").isTransparent()
					},
					i.prototype.isRootElement = function(t) {
						return null === t.parent
					},
					i.prototype.sortStackingContexts = function(t) {
						t.contexts.sort(B(t.contexts.slice(0))),
						t.contexts.forEach(this.sortStackingContexts, this)
					},
					i.prototype.parseTextBounds = function(t) {
						return function(e, n, i) {
							if ("none" !== t.parent.css("textDecoration").substr(0, 4) || 0 !== e.trim().length) {
								if (this.support.rangeBounds && !t.parent.hasTransform()) {
									var o = i.slice(0, n).join("").length;
									return this.getRangeBounds(t.node, o, e.length)
								}
								if (t.node && "string" == typeof t.node.data) {
									var r = t.node.splitText(e.length),
									a = this.getWrapperBounds(t.node, t.parent.hasTransform());
									return t.node = r,
									a
								}
							} else this.support.rangeBounds && !t.parent.hasTransform() || (t.node = t.node.splitText(e.length));
							return {}
						}
					},
					i.prototype.getWrapperBounds = function(t, e) {
						var n = t.ownerDocument.createElement("html2canvaswrapper"),
						i = t.parentNode,
						o = t.cloneNode(!0);
						n.appendChild(t.cloneNode(!0)),
						i.replaceChild(n, t);
						var r = e ? Z(n) : Q(n);
						return i.replaceChild(o, n),
						r
					},
					i.prototype.getRangeBounds = function(t, e, n) {
						var i = this.range || (this.range = t.ownerDocument.createRange());
						return i.setStart(t, e),
						i.setEnd(t, e + n),
						i.getBoundingClientRect()
					},
					i.prototype.parse = function(t) {
						var e = t.contexts.filter(f),
						n = t.children.filter(I),
						i = n.filter(C(E)),
						o = i.filter(C(S)).filter(C(v)),
						r = n.filter(C(S)).filter(E),
						s = i.filter(C(S)).filter(v),
						l = t.contexts.concat(i.filter(S)).filter(m),
						c = t.children.filter(O).filter(w),
						d = t.contexts.filter(g);
						e.concat(o).concat(r).concat(s).concat(l).concat(c).concat(d).forEach(function(t) {
							this.renderQueue.push(t),
							y(t) && (this.parse(t), this.renderQueue.push(new a))
						},
						this)
					},
					i.prototype.paint = function(t) {
						try {
							t instanceof a ? this.renderer.ctx.restore() : O(t) ? (R(t.parent) && t.parent.appendToDOM(), this.paintText(t), R(t.parent) && t.parent.cleanDOM()) : this.paintNode(t)
						} catch(e) {
							if (F(e), this.options.strict) throw e
						}
					},
					i.prototype.paintNode = function(t) {
						y(t) && (this.renderer.setOpacity(t.opacity), this.renderer.ctx.save(), t.hasTransform() && this.renderer.setTransform(t.parseTransform())),
						"INPUT" === t.node.nodeName && "checkbox" === t.node.type ? this.paintCheckbox(t) : "INPUT" === t.node.nodeName && "radio" === t.node.type ? this.paintRadio(t) : this.paintElement(t)
					},
					i.prototype.paintElement = function(t) {
						var e = t.parseBounds();
						this.renderer.clip(t.backgroundClip,
						function() {
							this.renderer.renderBackground(t, e, t.borders.borders.map(M))
						},
						this),
						this.renderer.clip(t.clip,
						function() {
							this.renderer.renderBorders(t.borders.borders)
						},
						this),
						this.renderer.clip(t.backgroundClip,
						function() {
							switch (t.node.nodeName) {
							case "svg":
							case "IFRAME":
								var n = this.images.get(t.node);
								n ? this.renderer.renderImage(t, e, t.borders, n) : F("Error loading <" + t.node.nodeName + ">", t.node);
								break;
							case "IMG":
								var i = this.images.get(t.node.src);
								i ? this.renderer.renderImage(t, e, t.borders, i) : F("Error loading <img>", t.node.src);
								break;
							case "CANVAS":
								this.renderer.renderImage(t, e, t.borders, {
									image: t.node
								});
								break;
							case "SELECT":
							case "INPUT":
							case "TEXTAREA":
								this.paintFormValue(t)
							}
						},
						this)
					},
					i.prototype.paintCheckbox = function(t) {
						var e = t.parseBounds(),
						n = Math.min(e.width, e.height),
						i = {
							width: n - 1,
							height: n - 1,
							top: e.top,
							left: e.left
						},
						o = [3, 3],
						r = [o, o, o, o],
						a = [1, 1, 1, 1].map(function(t) {
							return {
								color: new $("#A5A5A5"),
								width: t
							}
						}),
						l = c(i, r, a);
						this.renderer.clip(t.backgroundClip,
						function() {
							this.renderer.rectangle(i.left + 1, i.top + 1, i.width - 2, i.height - 2, new $("#DEDEDE")),
							this.renderer.renderBorders(s(a, i, l, r)),
							t.node.checked && (this.renderer.font(new $("#424242"), "normal", "normal", "bold", n - 3 + "px", "arial"), this.renderer.text("✔", i.left + n / 6, i.top + n - 1))
						},
						this)
					},
					i.prototype.paintRadio = function(t) {
						var e = t.parseBounds(),
						n = Math.min(e.width, e.height) - 2;
						this.renderer.clip(t.backgroundClip,
						function() {
							this.renderer.circleStroke(e.left + 1, e.top + 1, n, new $("#DEDEDE"), 1, new $("#A5A5A5")),
							t.node.checked && this.renderer.circle(Math.ceil(e.left + n / 4) + 1, Math.ceil(e.top + n / 4) + 1, Math.floor(n / 2), new $("#424242"))
						},
						this)
					},
					i.prototype.paintFormValue = function(t) {
						var e = t.getValue();
						if (e.length > 0) {
							var n = t.node.ownerDocument,
							i = n.createElement("html2canvaswrapper"),
							o = ["lineHeight", "textAlign", "fontFamily", "fontWeight", "fontSize", "color", "paddingLeft", "paddingTop", "paddingRight", "paddingBottom", "width", "height", "borderLeftStyle", "borderTopStyle", "borderLeftWidth", "borderTopWidth", "boxSizing", "whiteSpace", "wordWrap"];
							o.forEach(function(e) {
								try {
									i.style[e] = t.css(e)
								} catch(n) {
									F("html2canvas: Parse: Exception caught in renderFormValue: " + n.message)
								}
							});
							var r = t.parseBounds();
							i.style.position = "fixed",
							i.style.left = r.left + "px",
							i.style.top = r.top + "px",
							i.textContent = e,
							n.body.appendChild(i),
							this.paintText(new q(i.firstChild, t)),
							n.body.removeChild(i)
						}
					},
					i.prototype.paintText = function(t) {
						t.applyTextTransform();
						var e = H.ucs2.decode(t.node.data),
						n = this.options.letterRendering && !x(t) || W(t.node.data) ? e.map(function(t) {
							return H.ucs2.encode([t])
						}) : L(e),
						i = t.parent.fontWeight(),
						o = t.parent.css("fontSize"),
						r = t.parent.css("fontFamily"),
						a = t.parent.parseTextShadows();
						this.renderer.font(t.parent.color("color"), t.parent.css("fontStyle"), t.parent.css("fontVariant"), i, o, r),
						a.length ? this.renderer.fontShadow(a[0].color, a[0].offsetX, a[0].offsetY, a[0].blur) : this.renderer.clearShadow(),
						this.renderer.clip(t.parent.clip,
						function() {
							n.map(this.parseTextBounds(t), this).forEach(function(e, i) {
								e && (this.renderer.text(n[i], e.left, e.bottom), this.renderTextDecoration(t.parent, e, this.fontMetrics.getMetrics(r, o)))
							},
							this)
						},
						this)
					},
					i.prototype.renderTextDecoration = function(t, e, n) {
						switch (t.css("textDecoration").split(" ")[0]) {
						case "underline":
							this.renderer.rectangle(e.left, Math.round(e.top + n.baseline + n.lineWidth), e.width, 1, t.color("color"));
							break;
						case "overline":
							this.renderer.rectangle(e.left, Math.round(e.top), e.width, 1, t.color("color"));
							break;
						case "line-through":
							this.renderer.rectangle(e.left, Math.ceil(e.top + n.middle + n.lineWidth), e.width, 1, t.color("color"))
						}
					};
					var tt = {
						inset: [["darken", .6], ["darken", .1], ["darken", .1], ["darken", .6]]
					};
					i.prototype.parseBorders = function(t) {
						var e = t.parseBounds(),
						n = b(t),
						i = ["Top", "Right", "Bottom", "Left"].map(function(e, n) {
							var i = t.css("border" + e + "Style"),
							o = t.color("border" + e + "Color");
							"inset" === i && o.isBlack() && (o = new $([255, 255, 255, o.a]));
							var r = tt[i] ? tt[i][n] : null;
							return {
								width: t.cssInt("border" + e + "Width"),
								color: r ? o[r[0]](r[1]) : o,
								args: null
							}
						}),
						o = c(e, n, i);
						return {
							clip: this.parseBackgroundClip(t, o, i, n, e),
							borders: s(i, e, o, n)
						}
					},
					i.prototype.parseBackgroundClip = function(t, e, n, i, o) {
						var r = t.css("backgroundClip"),
						a = [];
						switch (r) {
						case "content-box":
						case "padding-box":
							h(a, i[0], i[1], e.topLeftInner, e.topRightInner, o.left + n[3].width, o.top + n[0].width),
							h(a, i[1], i[2], e.topRightInner, e.bottomRightInner, o.left + o.width - n[1].width, o.top + n[0].width),
							h(a, i[2], i[3], e.bottomRightInner, e.bottomLeftInner, o.left + o.width - n[1].width, o.top + o.height - n[2].width),
							h(a, i[3], i[0], e.bottomLeftInner, e.topLeftInner, o.left + n[3].width, o.top + o.height - n[2].width);
							break;
						default:
							h(a, i[0], i[1], e.topLeftOuter, e.topRightOuter, o.left, o.top),
							h(a, i[1], i[2], e.topRightOuter, e.bottomRightOuter, o.left + o.width, o.top),
							h(a, i[2], i[3], e.bottomRightOuter, e.bottomLeftOuter, o.left + o.width, o.top + o.height),
							h(a, i[3], i[0], e.bottomLeftOuter, e.topLeftOuter, o.left, o.top + o.height)
						}
						return a
					},
					e.exports = i
				},
				{
					"./color": 3,
					"./fontmetrics": 7,
					"./log": 13,
					"./nodecontainer": 14,
					"./pseudoelementcontainer": 18,
					"./stackingcontext": 21,
					"./textcontainer": 25,
					"./utils": 26,
					punycode: 1
				}],
				16 : [function(t, e, n) {
					function i(t, e, n) {
						var i = "withCredentials" in new XMLHttpRequest;
						if (!e) return p["default"].reject("No proxy configured");
						var o = a(i),
						l = s(e, t, o);
						return i ? d(l) : r(n, l, o).then(function(t) {
							return g(t.content)
						})
					}
					function o(t, e, n) {
						var i = "crossOrigin" in new Image,
						o = a(i),
						l = s(e, t, o);
						return i ? p["default"].resolve(l) : r(n, l, o).then(function(t) {
							return "data:" + t.type + ";base64," + t.content
						})
					}
					function r(t, e, n) {
						return new p["default"](function(i, o) {
							var r = t.createElement("script"),
							a = function() {
								delete window.html2canvas.proxy[n],
								t.body.removeChild(r)
							};
							window.html2canvas.proxy[n] = function(t) {
								a(),
								i(t)
							},
							r.src = e,
							r.onerror = function(t) {
								a(),
								o(t)
							},
							t.body.appendChild(r)
						})
					}
					function a(t) {
						return t ? "": "html2canvas_" + Date.now() + "_" + ++m + "_" + Math.round(1e5 * Math.random())
					}
					function s(t, e, n) {
						return t + "?url=" + encodeURIComponent(e) + (n.length ? "&callback=html2canvas.proxy." + n: "")
					}
					function l(t) {
						return function(e) {
							var n, i = new DOMParser;
							try {
								n = i.parseFromString(e, "text/html")
							} catch(o) {
								h("DOMParser not supported, falling back to createHTMLDocument"),
								n = document.implementation.createHTMLDocument("");
								try {
									n.open(),
									n.write(e),
									n.close()
								} catch(r) {
									h("createHTMLDocument write not supported, falling back to document.body.innerHTML"),
									n.body.innerHTML = e
								}
							}
							var a = n.querySelector("base");
							if (!a || !a.href.host) {
								var s = n.createElement("base");
								s.href = t,
								n.head.insertBefore(s, n.head.firstChild)
							}
							return n
						}
					}
					function c(t, e, n, o, r, a) {
						return new i(t, e, window.document).then(l(t)).then(function(t) {
							return f(t, n, o, r, a, 0, 0)
						})
					}
					var d = t("./xhr"),
					u = t("./utils"),
					h = t("./log"),
					f = t("./clone"),
					g = u.decode64,
					m = 0;
					n.Proxy = i,
					n.ProxyURL = o,
					n.loadUrlDocument = c
				},
				{
					"./clone": 2,
					"./log": 13,
					"./utils": 26,
					"./xhr": 28
				}],
				17 : [function(t, e, n) {
					function i(t, e) {
						var n = document.createElement("a");
						n.href = t,
						t = n.href,
						this.src = t,
						this.image = new Image;
						var i = this;
						this.promise = new p["default"](function(n, r) {
							i.image.crossOrigin = "Anonymous",
							i.image.onload = n,
							i.image.onerror = r,
							new o(t, e, document).then(function(t) {
								i.image.src = t
							})["catch"](r)
						})
					}
					var o = t("./proxy").ProxyURL;
					e.exports = i
				},
				{
					"./proxy": 16
				}],
				18 : [function(t, e, n) {
					function i(t, e, n) {
						o.call(this, t, e),
						this.isPseudoElement = !0,
						this.before = ":before" === n
					}
					var o = t("./nodecontainer");
					i.prototype.cloneTo = function(t) {
						i.prototype.cloneTo.call(this, t),
						t.isPseudoElement = !0,
						t.before = this.before
					},
					i.prototype = (0, d["default"])(o.prototype),
					i.prototype.appendToDOM = function() {
						this.before ? this.parent.node.insertBefore(this.node, this.parent.node.firstChild) : this.parent.node.appendChild(this.node),
						this.parent.node.className += " " + this.getHideClass()
					},
					i.prototype.cleanDOM = function() {
						this.node.parentNode.removeChild(this.node),
						this.parent.node.className = this.parent.node.className.replace(this.getHideClass(), "")
					},
					i.prototype.getHideClass = function() {
						return this["PSEUDO_HIDE_ELEMENT_CLASS_" + (this.before ? "BEFORE": "AFTER")]
					},
					i.prototype.PSEUDO_HIDE_ELEMENT_CLASS_BEFORE = "___html2canvas___pseudoelement_before",
					i.prototype.PSEUDO_HIDE_ELEMENT_CLASS_AFTER = "___html2canvas___pseudoelement_after",
					e.exports = i
				},
				{
					"./nodecontainer": 14
				}],
				19 : [function(t, e, n) {
					function i(t, e, n, i, o) {
						this.width = t,
						this.height = e,
						this.images = n,
						this.options = i,
						this.document = o
					}
					var o = t("./log");
					i.prototype.renderImage = function(t, e, n, i) {
						var o = t.cssInt("paddingLeft"),
						r = t.cssInt("paddingTop"),
						a = t.cssInt("paddingRight"),
						s = t.cssInt("paddingBottom"),
						l = n.borders,
						c = e.width - (l[1].width + l[3].width + o + a),
						d = e.height - (l[0].width + l[2].width + r + s);
						this.drawImage(i, 0, 0, i.image.width || c, i.image.height || d, e.left + o + l[3].width, e.top + r + l[0].width, c, d)
					},
					i.prototype.renderBackground = function(t, e, n) {
						e.height > 0 && e.width > 0 && (this.renderBackgroundColor(t, e), this.renderBackgroundImage(t, e, n))
					},
					i.prototype.renderBackgroundColor = function(t, e) {
						var n = t.color("backgroundColor");
						n.isTransparent() || this.rectangle(e.left, e.top, e.width, e.height, n)
					},
					i.prototype.renderBorders = function(t) {
						t.forEach(this.renderBorder, this)
					},
					i.prototype.renderBorder = function(t) {
						t.color.isTransparent() || null === t.args || this.drawShape(t.args, t.color)
					},
					i.prototype.renderBackgroundImage = function(t, e, n) {
						var i = t.parseBackgroundImages();
						i.reverse().forEach(function(i, r, a) {
							switch (i.method) {
							case "url":
								var s = this.images.get(i.args[0]);
								s ? this.renderBackgroundRepeating(t, e, s, a.length - (r + 1), n) : o("Error loading background-image", i.args[0]);
								break;
							case "linear-gradient":
							case "gradient":
								var l = this.images.get(i.value);
								l ? this.renderBackgroundGradient(l, e, n) : o("Error loading background-image", i.args[0]);
								break;
							case "none":
								break;
							default:
								o("Unknown background-image type", i.args[0])
							}
						},
						this)
					},
					i.prototype.renderBackgroundRepeating = function(t, e, n, i, o) {
						var r = t.parseBackgroundSize(e, n.image, i),
						a = t.parseBackgroundPosition(e, n.image, i, r),
						s = t.parseBackgroundRepeat(i);
						switch (s) {
						case "repeat-x":
						case "repeat no-repeat":
							this.backgroundRepeatShape(n, a, r, e, e.left + o[3], e.top + a.top + o[0], 99999, r.height, o);
							break;
						case "repeat-y":
						case "no-repeat repeat":
							this.backgroundRepeatShape(n, a, r, e, e.left + a.left + o[3], e.top + o[0], r.width, 99999, o);
							break;
						case "no-repeat":
							this.backgroundRepeatShape(n, a, r, e, e.left + a.left + o[3], e.top + a.top + o[0], r.width, r.height, o);
							break;
						default:
							this.renderBackgroundRepeat(n, a, r, {
								top: e.top,
								left: e.left
							},
							o[3], o[0])
						}
					},
					e.exports = i
				},
				{
					"./log": 13
				}],
				20 : [function(t, e, n) {
					function i(t, e) {
						r.apply(this, arguments),
						this.canvas = this.options.canvas || this.document.createElement("canvas"),
						this.options.canvas || (this.canvas.width = t, this.canvas.height = e),
						this.ctx = this.canvas.getContext("2d"),
						this.taintCtx = this.document.createElement("canvas").getContext("2d"),
						this.ctx.textBaseline = "bottom",
						this.variables = {},
						s("Initialized CanvasRenderer with size", t, "x", e)
					}
					function o(t) {
						return t.length > 0
					}
					var r = t("../renderer"),
					a = t("../lineargradientcontainer"),
					s = t("../log");
					i.prototype = (0, d["default"])(r.prototype),
					i.prototype.setFillStyle = function(t) {
						return this.ctx.fillStyle = "object" === ("undefined" == typeof t ? "undefined": (0, f["default"])(t)) && t.isColor ? t.toString() : t,
						this.ctx
					},
					i.prototype.rectangle = function(t, e, n, i, o) {
						this.setFillStyle(o).fillRect(t, e, n, i)
					},
					i.prototype.circle = function(t, e, n, i) {
						this.setFillStyle(i),
						this.ctx.beginPath(),
						this.ctx.arc(t + n / 2, e + n / 2, n / 2, 0, 2 * Math.PI, !0),
						this.ctx.closePath(),
						this.ctx.fill()
					},
					i.prototype.circleStroke = function(t, e, n, i, o, r) {
						this.circle(t, e, n, i),
						this.ctx.strokeStyle = r.toString(),
						this.ctx.stroke()
					},
					i.prototype.drawShape = function(t, e) {
						this.shape(t),
						this.setFillStyle(e).fill()
					},
					i.prototype.taints = function(t) {
						if (null === t.tainted) {
							this.taintCtx.drawImage(t.image, 0, 0);
							try {
								this.taintCtx.getImageData(0, 0, 1, 1),
								t.tainted = !1
							} catch(e) {
								this.taintCtx = document.createElement("canvas").getContext("2d"),
								t.tainted = !0
							}
						}
						return t.tainted
					},
					i.prototype.drawImage = function(t, e, n, i, o, r, a, s, l) {
						this.taints(t) && !this.options.allowTaint || this.ctx.drawImage(t.image, e, n, i, o, r, a, s, l)
					},
					i.prototype.clip = function(t, e, n) {
						this.ctx.save(),
						t.filter(o).forEach(function(t) {
							this.shape(t).clip()
						},
						this),
						e.call(n),
						this.ctx.restore()
					},
					i.prototype.shape = function(t) {
						return this.ctx.beginPath(),
						t.forEach(function(t, e) {
							"rect" === t[0] ? this.ctx.rect.apply(this.ctx, t.slice(1)) : this.ctx[0 === e ? "moveTo": t[0] + "To"].apply(this.ctx, t.slice(1))
						},
						this),
						this.ctx.closePath(),
						this.ctx
					},
					i.prototype.font = function(t, e, n, i, o, r) {
						this.setFillStyle(t).font = [e, n, i, o, r].join(" ").split(",")[0]
					},
					i.prototype.fontShadow = function(t, e, n, i) {
						this.setVariable("shadowColor", t.toString()).setVariable("shadowOffsetY", e).setVariable("shadowOffsetX", n).setVariable("shadowBlur", i)
					},
					i.prototype.clearShadow = function() {
						this.setVariable("shadowColor", "rgba(0,0,0,0)")
					},
					i.prototype.setOpacity = function(t) {
						this.ctx.globalAlpha = t
					},
					i.prototype.setTransform = function(t) {
						this.ctx.translate(t.origin[0], t.origin[1]),
						this.ctx.transform.apply(this.ctx, t.matrix),
						this.ctx.translate( - t.origin[0], -t.origin[1])
					},
					i.prototype.setVariable = function(t, e) {
						return this.variables[t] !== e && (this.variables[t] = this.ctx[t] = e),
						this
					},
					i.prototype.text = function(t, e, n) {
						this.ctx.fillText(t, e, n)
					},
					i.prototype.backgroundRepeatShape = function(t, e, n, i, o, r, a, s, l) {
						var c = [["line", Math.round(o), Math.round(r)], ["line", Math.round(o + a), Math.round(r)], ["line", Math.round(o + a), Math.round(s + r)], ["line", Math.round(o), Math.round(s + r)]];
						this.clip([c],
						function() {
							this.renderBackgroundRepeat(t, e, n, i, l[3], l[0])
						},
						this)
					},
					i.prototype.renderBackgroundRepeat = function(t, e, n, i, o, r) {
						var a = Math.round(i.left + e.left + o),
						s = Math.round(i.top + e.top + r);
						this.setFillStyle(this.ctx.createPattern(this.resizeImage(t, n), "repeat")),
						this.ctx.translate(a, s),
						this.ctx.fill(),
						this.ctx.translate( - a, -s)
					},
					i.prototype.renderBackgroundGradient = function(t, e) {
						if (t instanceof a) {
							var n = this.ctx.createLinearGradient(e.left + e.width * t.x0, e.top + e.height * t.y0, e.left + e.width * t.x1, e.top + e.height * t.y1);
							t.colorStops.forEach(function(t) {
								n.addColorStop(t.stop, t.color.toString())
							}),
							this.rectangle(e.left, e.top, e.width, e.height, n)
						}
					},
					i.prototype.resizeImage = function(t, e) {
						var n = t.image;
						if (n.width === e.width && n.height === e.height) return n;
						var i, o = document.createElement("canvas");
						return o.width = e.width,
						o.height = e.height,
						i = o.getContext("2d"),
						i.drawImage(n, 0, 0, n.width, n.height, 0, 0, e.width, e.height),
						o
					},
					e.exports = i
				},
				{
					"../lineargradientcontainer": 12,
					"../log": 13,
					"../renderer": 19
				}],
				21 : [function(t, e, n) {
					function i(t, e, n, i) {
						o.call(this, n, i),
						this.ownStacking = t,
						this.contexts = [],
						this.children = [],
						this.opacity = (this.parent ? this.parent.stack.opacity: 1) * e
					}
					var o = t("./nodecontainer");
					i.prototype = (0, d["default"])(o.prototype),
					i.prototype.getParentStack = function(t) {
						var e = this.parent ? this.parent.stack: null;
						return e ? e.ownStacking ? e: e.getParentStack(t) : t.stack
					},
					e.exports = i
				},
				{
					"./nodecontainer": 14
				}],
				22 : [function(t, e, n) {
					function i(t) {
						this.rangeBounds = this.testRangeBounds(t),
						this.cors = this.testCORS(),
						this.svg = this.testSVG()
					}
					i.prototype.testRangeBounds = function(t) {
						var e, n, i, o, r = !1;
						return t.createRange && (e = t.createRange(), e.getBoundingClientRect && (n = t.createElement("boundtest"), n.style.height = "123px", n.style.display = "block", t.body.appendChild(n), e.selectNode(n), i = e.getBoundingClientRect(), o = i.height, 123 === o && (r = !0), t.body.removeChild(n))),
						r
					},
					i.prototype.testCORS = function() {
						return "undefined" != typeof(new Image).crossOrigin
					},
					i.prototype.testSVG = function() {
						var t = new Image,
						e = document.createElement("canvas"),
						n = e.getContext("2d");
						t.src = "data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg'></svg>";
						try {
							n.drawImage(t, 0, 0),
							e.toDataURL()
						} catch(i) {
							return ! 1
						}
						return ! 0
					},
					e.exports = i
				},
				{}],
				23 : [function(t, e, n) {
					function i(t) {
						this.src = t,
						this.image = null;
						var e = this;
						this.promise = this.hasFabric().then(function() {
							return e.isInline(t) ? p["default"].resolve(e.inlineFormatting(t)) : o(t)
						}).then(function(t) {
							return new p["default"](function(n) {
								window.html2canvas.svg.fabric.loadSVGFromString(t, e.createCanvas.call(e, n))
							})
						})
					}
					var o = t("./xhr"),
					r = t("./utils").decode64;
					i.prototype.hasFabric = function() {
						return window.html2canvas.svg && window.html2canvas.svg.fabric ? p["default"].resolve() : p["default"].reject(new Error("html2canvas.svg.js is not loaded, cannot render svg"))
					},
					i.prototype.inlineFormatting = function(t) {
						return /^data:image\/svg\+xml;base64,/.test(t) ? this.decode64(this.removeContentType(t)) : this.removeContentType(t)
					},
					i.prototype.removeContentType = function(t) {
						return t.replace(/^data:image\/svg\+xml(;base64)?,/, "")
					},
					i.prototype.isInline = function(t) {
						return /^data:image\/svg\+xml/i.test(t)
					},
					i.prototype.createCanvas = function(t) {
						var e = this;
						return function(n, i) {
							var o = new window.html2canvas.svg.fabric.StaticCanvas("c");
							e.image = o.lowerCanvasEl,
							o.setWidth(i.width).setHeight(i.height).add(window.html2canvas.svg.fabric.util.groupSVGElements(n, i)).renderAll(),
							t(o.lowerCanvasEl)
						}
					},
					i.prototype.decode64 = function(t) {
						return "function" == typeof window.atob ? window.atob(t) : r(t)
					},
					e.exports = i
				},
				{
					"./utils": 26,
					"./xhr": 28
				}],
				24 : [function(t, e, n) {
					function i(t, e) {
						this.src = t,
						this.image = null;
						var n = this;
						this.promise = e ? new p["default"](function(e, i) {
							n.image = new Image,
							n.image.onload = e,
							n.image.onerror = i,
							n.image.src = "data:image/svg+xml," + (new XMLSerializer).serializeToString(t),
							n.image.complete === !0 && e(n.image)
						}) : this.hasFabric().then(function() {
							return new p["default"](function(e) {
								window.html2canvas.svg.fabric.parseSVGDocument(t, n.createCanvas.call(n, e))
							})
						})
					}
					var o = t("./svgcontainer");
					i.prototype = (0, d["default"])(o.prototype),
					e.exports = i
				},
				{
					"./svgcontainer": 23
				}],
				25 : [function(t, e, n) {
					function i(t, e) {
						r.call(this, t, e)
					}
					function o(t, e, n) {
						if (t.length > 0) return e + n.toUpperCase()
					}
					var r = t("./nodecontainer");
					i.prototype = (0, d["default"])(r.prototype),
					i.prototype.applyTextTransform = function() {
						this.node.data = this.transform(this.parent.css("textTransform"))
					},
					i.prototype.transform = function(t) {
						var e = this.node.data;
						switch (t) {
						case "lowercase":
							return e.toLowerCase();
						case "capitalize":
							return e.replace(/(^|\s|:|-|\(|\))([a-z])/g, o);
						case "uppercase":
							return e.toUpperCase();
						default:
							return e
						}
					},
					e.exports = i
				},
				{
					"./nodecontainer": 14
				}],
				26 : [function(t, e, n) {
					n.smallImage = function() {
						return "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
					},
					n.bind = function(t, e) {
						return function() {
							return t.apply(e, arguments)
						}
					},
					n.decode64 = function(t) {
						var e, n, i, o, r, a, s, l, c = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",
						d = t.length,
						u = "";
						for (e = 0; e < d; e += 4) n = c.indexOf(t[e]),
						i = c.indexOf(t[e + 1]),
						o = c.indexOf(t[e + 2]),
						r = c.indexOf(t[e + 3]),
						a = n << 2 | i >> 4,
						s = (15 & i) << 4 | o >> 2,
						l = (3 & o) << 6 | r,
						u += 64 === o ? String.fromCharCode(a) : 64 === r || r === -1 ? String.fromCharCode(a, s) : String.fromCharCode(a, s, l);
						return u
					},
					n.getBounds = function(t) {
						if (t.getBoundingClientRect) {
							var e = t.getBoundingClientRect(),
							n = null == t.offsetWidth ? e.width: t.offsetWidth;
							return {
								top: e.top,
								bottom: e.bottom || e.top + e.height,
								right: e.left + n,
								left: e.left,
								width: n,
								height: null == t.offsetHeight ? e.height: t.offsetHeight
							}
						}
						return {}
					},
					n.offsetBounds = function(t) {
						var e = t.offsetParent ? n.offsetBounds(t.offsetParent) : {
							top: 0,
							left: 0
						};
						return {
							top: t.offsetTop + e.top,
							bottom: t.offsetTop + t.offsetHeight + e.top,
							right: t.offsetLeft + e.left + t.offsetWidth,
							left: t.offsetLeft + e.left,
							width: t.offsetWidth,
							height: t.offsetHeight
						}
					},
					n.parseBackgrounds = function(t) {
						var e, n, i, o, r, a, s, l = " \r\n\t",
						c = [],
						d = 0,
						u = 0,
						p = function() {
							e && ('"' === n.substr(0, 1) && (n = n.substr(1, n.length - 2)), n && s.push(n), "-" === e.substr(0, 1) && (o = e.indexOf("-", 1) + 1) > 0 && (i = e.substr(0, o), e = e.substr(o)), c.push({
								prefix: i,
								method: e.toLowerCase(),
								value: r,
								args: s,
								image: null
							})),
							s = [],
							e = i = n = r = ""
						};
						return s = [],
						e = i = n = r = "",
						t.split("").forEach(function(t) {
							if (! (0 === d && l.indexOf(t) > -1)) {
								switch (t) {
								case '"':
									a ? a === t && (a = null) : a = t;
									break;
								case "(":
									if (a) break;
									if (0 === d) return d = 1,
									void(r += t);
									u++;
									break;
								case ")":
									if (a) break;
									if (1 === d) {
										if (0 === u) return d = 0,
										r += t,
										void p();
										u--
									}
									break;
								case ",":
									if (a) break;
									if (0 === d) return void p();
									if (1 === d && 0 === u && !e.match(/^url$/i)) return s.push(n),
									n = "",
									void(r += t)
								}
								r += t,
								0 === d ? e += t: n += t
							}
						}),
						p(),
						c
					}
				},
				{}],
				27 : [function(t, e, n) {
					function i(t) {
						o.apply(this, arguments),
						this.type = "linear" === t.args[0] ? o.TYPES.LINEAR: o.TYPES.RADIAL
					}
					var o = t("./gradientcontainer");
					i.prototype = (0, d["default"])(o.prototype),
					e.exports = i
				},
				{
					"./gradientcontainer": 9
				}],
				28 : [function(t, e, n) {
					function i(t) {
						return new p["default"](function(e, n) {
							var i = new XMLHttpRequest;
							i.open("GET", t),
							i.onload = function() {
								200 === i.status ? e(i.responseText) : n(new Error(i.statusText))
							},
							i.onerror = function() {
								n(new Error("Network Error"))
							},
							i.send()
						})
					}
					e.exports = i
				},
				{}]
			},
			{},
			[4])(4)
		})
	}).call(e,
	function() {
		return this
	} ())
},
, , , , , , , , , , , , ,
function(t, e, n) {
	function i(t) {
		return t && t.__esModule ? t: {
			"default": t
		}
	}
	var o, r, a, s = n(30);
	i(s); !
	function(n, i) {
		r = [],
		o = i,
		a = "function" == typeof o ? o.apply(e, r) : o,
		!(void 0 !== a && (t.exports = a))
	} (void 0,
	function() {
		var t = function(t) {
			return t.reduce(function(t, e) {
				return 2 * t + e
			},
			0)
		},
		e = function(t) {
			for (var e = [], n = 7; n >= 0; n--) e.push( !! (t & 1 << n));
			return e
		},
		n = function(t) {
			this.data = t,
			this.len = this.data.length,
			this.pos = 0,
			this.readByte = function() {
				if (this.pos >= this.data.length) throw new Error("Attempted to read past end of stream.");
				return t instanceof Uint8Array ? t[this.pos++] : 255 & t.charCodeAt(this.pos++)
			},
			this.readBytes = function(t) {
				for (var e = [], n = 0; n < t; n++) e.push(this.readByte());
				return e
			},
			this.read = function(t) {
				for (var e = "",
				n = 0; n < t; n++) e += String.fromCharCode(this.readByte());
				return e
			},
			this.readUnsigned = function() {
				var t = this.readBytes(2);
				return (t[1] << 8) + t[0]
			}
		},
		i = function(t, e) {
			for (var n, i, o = 0,
			r = function(t) {
				for (var n = 0,
				i = 0; i < t; i++) e.charCodeAt(o >> 3) & 1 << (7 & o) && (n |= 1 << i),
				o++;
				return n
			},
			a = [], s = 1 << t, l = s + 1, c = t + 1, d = [], u = function() {
				d = [],
				c = t + 1;
				for (var e = 0; e < s; e++) d[e] = [e];
				d[s] = [],
				d[l] = null
			};;) if (i = n, n = r(c), n !== s) {
				if (n === l) break;
				if (n < d.length) i !== s && d.push(d[i].concat(d[n][0]));
				else {
					if (n !== d.length) throw new Error("Invalid LZW code.");
					d.push(d[i].concat(d[i][0]))
				}
				a.push.apply(a, d[n]),
				d.length === 1 << c && c < 12 && c++
			} else u();
			return a
		},
		o = function(n, o) {
			o || (o = {});
			var r = function(t) {
				for (var e = [], i = 0; i < t; i++) e.push(n.readBytes(3));
				return e
			},
			a = function() {
				var t, e;
				e = "";
				do t = n.readByte(),
				e += n.read(t);
				while (0 !== t);
				return e
			},
			s = function() {
				var i = {};
				if (i.sig = n.read(3), i.ver = n.read(3), "GIF" !== i.sig) throw new Error("Not a GIF file.");
				i.width = n.readUnsigned(),
				i.height = n.readUnsigned();
				var a = e(n.readByte());
				i.gctFlag = a.shift(),
				i.colorRes = t(a.splice(0, 3)),
				i.sorted = a.shift(),
				i.gctSize = t(a.splice(0, 3)),
				i.bgColor = n.readByte(),
				i.pixelAspectRatio = n.readByte(),
				i.gctFlag && (i.gct = r(1 << i.gctSize + 1)),
				o.hdr && o.hdr(i)
			},
			l = function(i) {
				var r = function(i) {
					var r = (n.readByte(), e(n.readByte()));
					i.reserved = r.splice(0, 3),
					i.disposalMethod = t(r.splice(0, 3)),
					i.userInput = r.shift(),
					i.transparencyGiven = r.shift(),
					i.delayTime = n.readUnsigned(),
					i.transparencyIndex = n.readByte(),
					i.terminator = n.readByte(),
					o.gce && o.gce(i)
				},
				s = function(t) {
					t.comment = a(),
					o.com && o.com(t)
				},
				l = function(t) {
					n.readByte();
					t.ptHeader = n.readBytes(12),
					t.ptData = a(),
					o.pte && o.pte(t)
				},
				c = function(t) {
					var e = function(t) {
						n.readByte();
						t.unknown = n.readByte(),
						t.iterations = n.readUnsigned(),
						t.terminator = n.readByte(),
						o.app && o.app.NETSCAPE && o.app.NETSCAPE(t)
					},
					i = function(t) {
						t.appData = a(),
						o.app && o.app[t.identifier] && o.app[t.identifier](t)
					};
					n.readByte();
					switch (t.identifier = n.read(8), t.authCode = n.read(3), t.identifier) {
					case "NETSCAPE":
						e(t);
						break;
					default:
						i(t)
					}
				},
				d = function(t) {
					t.data = a(),
					o.unknown && o.unknown(t)
				};
				switch (i.label = n.readByte(), i.label) {
				case 249:
					i.extType = "gce",
					r(i);
					break;
				case 254:
					i.extType = "com",
					s(i);
					break;
				case 1:
					i.extType = "pte",
					l(i);
					break;
				case 255:
					i.extType = "app",
					c(i);
					break;
				default:
					i.extType = "unknown",
					d(i)
				}
			},
			c = function(s) {
				var l = function(t, e) {
					for (var n = new Array(t.length), i = t.length / e, o = function(i, o) {
						var r = t.slice(o * e, (o + 1) * e);
						n.splice.apply(n, [i * e, e].concat(r))
					},
					r = [0, 4, 2, 1], a = [8, 8, 4, 2], s = 0, l = 0; l < 4; l++) for (var c = r[l]; c < i; c += a[l]) o(c, s),
					s++;
					return n
				};
				s.leftPos = n.readUnsigned(),
				s.topPos = n.readUnsigned(),
				s.width = n.readUnsigned(),
				s.height = n.readUnsigned();
				var c = e(n.readByte());
				s.lctFlag = c.shift(),
				s.interlaced = c.shift(),
				s.sorted = c.shift(),
				s.reserved = c.splice(0, 2),
				s.lctSize = t(c.splice(0, 3)),
				s.lctFlag && (s.lct = r(1 << s.lctSize + 1)),
				s.lzwMinCodeSize = n.readByte();
				var d = a();
				s.pixels = i(s.lzwMinCodeSize, d),
				s.interlaced && (s.pixels = l(s.pixels, s.width)),
				o.img && o.img(s)
			},
			d = function p() {
				var t = {};
				switch (t.sentinel = n.readByte(), String.fromCharCode(t.sentinel)) {
				case "!":
					t.type = "ext",
					l(t);
					break;
				case ",":
					t.type = "img",
					c(t);
					break;
				case ";":
					t.type = "eof",
					o.eof && o.eof(t);
					break;
				default:
					throw new Error("Unknown block: 0x" + t.sentinel.toString(16))
				}
				"eof" !== t.type && setTimeout(p, 0)
			},
			u = function() {
				s(),
				setTimeout(d, 0)
			};
			u()
		},
		r = function(t) {
			var e = {
				vp_l: 0,
				vp_t: 0,
				vp_w: null,
				vp_h: null,
				c_w: null,
				c_h: null
			};
			for (var i in t) e[i] = t[i];
			e.vp_w && e.vp_h && (e.is_vp = !0);
			var r, a, s = null,
			l = !1,
			c = null,
			d = null,
			u = null,
			p = null,
			h = null,
			f = null,
			g = null,
			m = !0,
			v = !0,
			y = !1,
			w = [],
			x = [],
			b = e.gif;
			"undefined" == typeof e.auto_play && (e.auto_play = !b.getAttribute("rel:auto_play") || "1" == b.getAttribute("rel:auto_play"));
			var _, k, S, E, T = e.hasOwnProperty("on_end") ? e.on_end: null,
			C = e.hasOwnProperty("loop_delay") ? e.loop_delay: 0,
			I = e.hasOwnProperty("loop_mode") ? e.loop_mode: "auto",
			R = !e.hasOwnProperty("draw_while_loading") || e.draw_while_loading,
			O = !!R && (!e.hasOwnProperty("show_progress_bar") || e.show_progress_bar),
			B = e.hasOwnProperty("progressbar_height") ? e.progressbar_height: 25,
			A = e.hasOwnProperty("progressbar_background_color") ? e.progressbar_background_color: "rgba(255,255,255,0.4)",
			z = e.hasOwnProperty("progressbar_foreground_color") ? e.progressbar_foreground_color: "rgba(255,0,22,.8)",
			M = function() {
				c = null,
				d = null,
				h = u,
				u = null,
				f = null
			},
			P = function() {
				try {
					o(r, G)
				} catch(t) {
					j("parse")
				}
			},
			D = function(t, e) {
				_.width = t * K(),
				_.height = e * K(),
				S.style.minWidth = t * K() + "px",
				E.width = t,
				E.height = e,
				E.style.width = t + "px",
				E.style.height = e + "px",
				E.getContext("2d").setTransform(1, 0, 0, 1, 0, 0)
			},
			N = function(t, e) {
				return x[t] ? ("undefined" != typeof e.x && (x[t].x = e.x), void("undefined" != typeof e.y && (x[t].y = e.y))) : void(x[t] = e)
			},
			L = function(t, n, i) {
				if (i && O) {
					var o, r, a, s, l = B;
					if (e.is_vp) {
						y ? (a = (e.vp_t + e.vp_h - l) / K(), l /= K(), o = e.vp_l / K(), r = o + t / n * (e.vp_w / K()), s = _.width / K()) : (a = e.vp_t + e.vp_h - l, l = l, o = e.vp_l, r = o + t / n * e.vp_w, s = _.width)
					} else a = (_.height - l) / (y ? K() : 1),
					r = t / n * _.width / (y ? K() : 1),
					s = _.width / (y ? K() : 1),
					l /= y ? K() : 1;
					k.fillStyle = A,
					k.fillRect(r, a, s - r, l),
					k.fillStyle = z,
					k.fillRect(0, a, r, l)
				}
			},
			j = function(t) {
				var n = function() {
					k.fillStyle = "black",
					k.fillRect(0, 0, e.c_w ? e.c_w: a.width, e.c_h ? e.c_h: a.height),
					k.strokeStyle = "red",
					k.lineWidth = 3,
					k.moveTo(0, 0),
					k.lineTo(e.c_w ? e.c_w: a.width, e.c_h ? e.c_h: a.height),
					k.moveTo(0, e.c_h ? e.c_h: a.height),
					k.lineTo(e.c_w ? e.c_w: a.width, 0),
					k.stroke()
				};
				s = t,
				a = {
					width: b.width,
					height: b.height
				},
				w = [],
				n()
			},
			W = function(t) {
				a = t,
				D(a.width, a.height)
			},
			F = function(t) {
				H(),
				M(),
				c = t.transparencyGiven ? t.transparencyIndex: null,
				d = t.delayTime,
				u = t.disposalMethod
			},
			H = function() {
				f && (w.push({
					data: f.getImageData(0, 0, a.width, a.height),
					delay: d
				}), x.push({
					x: 0,
					y: 0
				}))
			},
			U = function(t) {
				f || (f = E.getContext("2d"));
				var n = w.length,
				i = t.lctFlag ? t.lct: a.gct;
				n > 0 && (3 === h ? null !== p ? f.putImageData(w[p].data, 0, 0) : f.clearRect(g.leftPos, g.topPos, g.width, g.height) : p = n - 1, 2 === h && f.clearRect(g.leftPos, g.topPos, g.width, g.height));
				var o = f.getImageData(t.leftPos, t.topPos, t.width, t.height);
				t.pixels.forEach(function(t, e) {
					t !== c && (o.data[4 * e + 0] = i[t][0], o.data[4 * e + 1] = i[t][1], o.data[4 * e + 2] = i[t][2], o.data[4 * e + 3] = 255)
				}),
				f.putImageData(o, t.leftPos, t.topPos),
				y || (k.scale(K(), K()), y = !0),
				R && (k.drawImage(E, 0, 0), R = e.auto_play),
				g = t
			},
			q = function() {
				var t = -1,
				n = 0,
				i = function() {
					var e = v ? 1 : -1;
					return (t + e + w.length) % w.length
				},
				o = function(e) {
					t += e,
					a()
				},
				r = function() {
					var e = !1,
					r = function() {
						null !== T && T(b),
						n++,
						I !== !1 || n < 0 ? a() : (e = !1, m = !1)
					},
					a = function s() {
						if (e = m) {
							o(1);
							var n = 10 * w[t].delay;
							n || (n = 100);
							var a = i();
							0 === a ? (n += C, setTimeout(r, n)) : setTimeout(s, n)
						}
					};
					return function() {
						e || setTimeout(a, 0)
					}
				} (),
				a = function() {
					var e;
					t = parseInt(t, 10),
					t > w.length - 1 && (t = 0),
					t < 0 && (t = 0),
					e = x[t],
					E.getContext("2d").putImageData(w[t].data, e.x, e.y),
					k.globalCompositeOperation = "copy",
					k.drawImage(E, 0, 0)
				},
				l = function() {
					m = !0,
					r()
				},
				c = function() {
					m = !1
				};
				return {
					init: function() {
						s || (e.c_w && e.c_h || k.scale(K(), K()), e.auto_play ? r() : (t = 0, a()))
					},
					step: r,
					play: l,
					pause: c,
					playing: m,
					move_relative: o,
					current_frame: function() {
						return t
					},
					length: function() {
						return w.length
					},
					move_to: function(e) {
						t = e,
						a()
					}
				}
			} (),
			X = function(t) {
				L(r.pos, r.data.length, t)
			},
			V = function() {},
			$ = function(t, e) {
				return function(n) {
					t(n),
					X(e)
				}
			},
			G = {
				hdr: $(W),
				gce: $(F),
				com: $(V),
				app: {
					NETSCAPE: $(V)
				},
				img: $(U, !0),
				eof: function(t) {
					H(),
					X(!1),
					e.c_w && e.c_h || (_.width = a.width * K(), _.height = a.height * K()),
					q.init(),
					l = !1,
					J && J(b)
				}
			},
			Y = function() {
				var t = b.parentNode,
				n = document.createElement("div");
				_ = document.createElement("canvas"),
				k = _.getContext("2d"),
				S = document.createElement("div"),
				E = document.createElement("canvas"),
				n.width = _.width = b.width,
				n.height = _.height = b.height,
				S.style.minWidth = b.width + "px",
				n.className = "jsgif",
				S.className = "jsgif_toolbar",
				n.appendChild(_),
				n.appendChild(S),
				t.insertBefore(n, b),
				t.removeChild(b),
				e.c_w && e.c_h && D(e.c_w, e.c_h),
				Q = !0
			},
			K = function() {
				var t;
				return t = e.max_width && a && a.width > e.max_width ? e.max_width / a.width: 1
			},
			Q = !1,
			J = !1,
			Z = function(t) {
				return ! l && (J = !!t && t, l = !0, w = [], M(), p = null, h = null, f = null, g = null, !0)
			};
			return {
				play: q.play,
				pause: q.pause,
				move_relative: q.move_relative,
				move_to: q.move_to,
				get_playing: function() {
					return m
				},
				get_canvas: function() {
					return _
				},
				get_canvas_scale: function() {
					return K()
				},
				get_loading: function() {
					return l
				},
				get_auto_play: function() {
					return e.auto_play
				},
				get_length: function() {
					return q.length()
				},
				get_current_frame: function() {
					return q.current_frame()
				},
				load_url: function(t, e) {
					if (Z(e)) {
						var i = new XMLHttpRequest;
						i.open("GET", t, !0),
						"overrideMimeType" in i ? i.overrideMimeType("text/plain; charset=x-user-defined") : "responseType" in i ? i.responseType = "arraybuffer": i.setRequestHeader("Accept-Charset", "x-user-defined"),
						i.onloadstart = function() {
							Q || Y()
						},
						i.onload = function(t) {
							200 != this.status && j("xhr - response"),
							"response" in this || (this.response = new VBArray(this.responseText).toArray().map(String.fromCharCode).join(""));
							var e = this.response;
							e.toString().indexOf("ArrayBuffer") > 0 && (e = new Uint8Array(e)),
							r = new n(e),
							setTimeout(P, 0)
						},
						i.onprogress = function(t) {
							t.lengthComputable && L(t.loaded, t.total, !0)
						},
						i.onerror = function() {
							j("xhr")
						},
						i.send()
					}
				},
				load: function(t) {
					this.load_url(b.getAttribute("rel:animated_src") || b.src, t)
				},
				load_raw: function(t, e) {
					Z(e) && (Q || Y(), r = new n(t), setTimeout(P, 0))
				},
				set_frame_offset: N
			}
		};
		return r
	})
},
, , , , , , , , , , , , ,
function(t, e, n) {
	var i, o, r = {};
	i = n(68),
	o = n(133),
	t.exports = i || {},
	t.exports.__esModule && (t.exports = t.exports["default"]);
	var a = "function" == typeof t.exports ? t.exports.options || (t.exports.options = {}) : t.exports;
	o && (a.template = o),
	a.computed || (a.computed = {}),
	Object.keys(r).forEach(function(t) {
		var e = r[t];
		a.computed[t] = function() {
			return e
		}
	})
},
,
function(t, e, n) {
	"use strict";
	Object.defineProperty(e, "__esModule", {
		value: !0
	}),
	e["default"] = function(t) {
		t.map({
			"/": {
				component: n(57)
			},
			"/index": {
				component: n(57)
			},
			"/epackages": {
				component: n(137)
			},
			"/emotion": {
				component: n(136)
			}
		})
	}
},
function(t, e, n) {
	"use strict";
	function i(t) {
		return t && t.__esModule ? t: {
			"default": t
		}
	}
	Object.defineProperty(e, "__esModule", {
		value: !0
	});
	var o = n(135),
	r = i(o),
	a = n(58);
	e["default"] = {
		components: {
			InlineDesc: r["default"]
		},
		props: {
			title: String,
			value: [String, Number],
			isLink: Boolean,
			inlineDesc: String,
			primary: {
				type: String,
				"default": "title"
			},
			link: {
				type: [String, Object]
			}
		},
		methods: {
			onClick: function() { (0, a.go)(this.link, this.$router)
			}
		}
	}
},
function(t, e) {
	"use strict";
	Object.defineProperty(e, "__esModule", {
		value: !0
	}),
	e["default"] = {
		props: {
			show: {
				type: Boolean,
				"default": !1
			},
			maskTransition: {
				type: String,
				"default": "vux-fade"
			},
			dialogTransition: {
				type: String,
				"default": "vux-dialog"
			},
			hideOnBlur: Boolean,
			scroll: {
				type: Boolean,
				"default": !0
			}
		},
		watch: {
			show: function(t) {
				this.$emit(t ? "on-show": "on-hide")
			}
		}
	}
},
function(t, e) {
	"use strict";
	Object.defineProperty(e, "__esModule", {
		value: !0
	}),
	e["default"] = {
		props: {
			title: String,
			titleColor: String,
			labelWidth: String,
			labelAlign: String,
			labelMarginRight: String,
			gutter: String
		}
	}
},
function(t, e) {
	"use strict";
	Object.defineProperty(e, "__esModule", {
		value: !0
	}),
	e["default"] = {
		props: {
			show: Boolean,
			text: {
				type: String,
				"default": "Loading"
			},
			position: String
		}
	}
},
function(t, e) {
	"use strict";
	Object.defineProperty(e, "__esModule", {
		value: !0
	}),
	e["default"] = {
		props: {
			show: {
				type: Boolean,
				"default": !1
			},
			time: {
				type: Number,
				"default": 2e3
			},
			type: {
				type: String,
				"default": "success"
			},
			transition: {
				type: String,
				"default": "vux-fade"
			},
			width: {
				type: String,
				"default": "7.6em"
			},
			text: String
		},
		computed: {
			toastClass: function() {
				return {
					weui_toast_forbidden: "warn" === this.type,
					weui_toast_cancel: "cancel" === this.type,
					weui_toast_success: "success" === this.type,
					weui_toast_text: "text" === this.type
				}
			}
		},
		watch: {
			show: function(t) {
				var e = this;
				t && (clearTimeout(this.timeout), this.timeout = setTimeout(function() {
					e.show = !1,
					e.$emit("on-hide")
				},
				this.time))
			}
		}
	}
},
function(t, e) {
	"use strict";
	Object.defineProperty(e, "__esModule", {
		value: !0
	}),
	e["default"] = {
		props: {
			type: {
				"default": "default"
			},
			disabled: Boolean,
			mini: Boolean,
			plain: Boolean,
			text: String
		},
		computed: {
			classes: function() {
				return [{
					weui_btn_disabled: this.disabled,
					weui_btn_mini: this.mini
				},
				"weui_btn_" + this.type, this.plain ? "weui_btn_plain_" + this.type: ""]
			}
		}
	}
},
function(t, e, n) {
	"use strict";
	function i(t) {
		return t && t.__esModule ? t: {
			"default": t
		}
	}
	Object.defineProperty(e, "__esModule", {
		value: !0
	});
	var o = n(25),
	r = i(o),
	a = n(22),
	s = i(a),
	l = n(28),
	c = i(l),
	d = n(23),
	u = i(d),
	p = n(27),
	h = i(p),
	f = n(24),
	g = i(f),
	m = n(26),
	v = i(m),
	y = n(13),
	w = i(y),
	x = n(43),
	b = i(x),
	_ = document.createElement("script");
	_.type = "text/javascript",
	_.src = zappurl + "/gif.js";
	var k = null;
	_.onload = function() {},
	document.body.appendChild(_),
	e["default"] = {
		ready: function() {
			var t = this,
			e = function(e) {
				var n = localStorage.getItem("settings"),
				i = t.$route.query.media_id;
				i = i ? i: "gh_4e7837ae5767",
				n && 1 == t.$route.query.inapp ? e(w["default"].j(n)) : t.$http.jsonp(zurl + "/json.js?" + i).then(function(t) {
					localStorage.setItem("settings", w["default"].j(t.data)),
					e(t.data)
				})
			};
			e(function(e) {
				if (1 == e.app.auth) {
					var n = localStorage.getItem("ui");
					if (!n) {
						if (n = t.$route.query.ui, !n) return void(document.location.href = "http://wp.dufe.cc/dufeXC?auth=2&_url=" + w["default"].urlencode(document.location.href));
						localStorage.setItem("ui", n)
					}
					t.ui = w["default"].j(n),
					t.avatar_url = t.ui.headimgurl
				} else t.ui = {
					nickname: e.app.name,
					headimgurl: e.app.avatar_url && 0 == e.app.demo ? e.app.avatar_url: "http://wa.cdn.nickboy.cc/mmopen/80BS7iaDKBkqC0q4fzrUiaLicV4U1WKjCcIHA0COg4l71An51yPN7iaPc9KM3GXBK5TRs6pPCNcx2QzneYRsHkPCjw/0"
				},
				t.avatar_url = t.ui.headimgurl;
				if (t.app = e.app, t.epackages = e.epackages, t.items = e.items, 1 == t.app.demo) {
					t.makeSize = 300;
					var i = document.getElementById("app").style;
					i.maxWidth = "500px";
					var i = document.getElementById("app").style;
					i.border = "2px solid #fff",
					i.boxShadow = "4px 4px 2px #888888"
				}
				for (var o = 0; o < t.items.length; o++) if (t.items[o].id == t.$route.query.pid) {
					t.item = t.items[o];
					break
				}
				t.setTitle("「" + t.item.name + "」动态表情制作");
				for (var o = 0; o < t.epackages.length; o++) if (t.epackages[o][0] == t.$route.query.eid) {
					t.epackage = t.epackages[o];
					break
				}
				for (var o = 1; o <= t.epackage[1]; o++) t.emotions.push(o);
				t.loaded = !0,
				t.display = "block"
			})
		},
		methods: {
			makeAvatarArea: function(t, e, n, i) {
				var o = w["default"].makeAvatarArea({
					area_size: t.canvas_size,
					dest_size: e,
					bg_url: t.badge_url + n,
					avatar_url: i || this.avatar_url,
					avatar_size: t.avatar_size,
					avatar_left: t.left,
					avatar_top: t.top,
					avatar_z: t.zindex
				});
				return o
			},
			setTitle: function(t) {
				document.title = t,
				navigator.userAgent.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/) && (this.iframe = zurl + "/hack?v=2")
			},
			make: function(t) {
				var e = this,
				n = (0, b["default"])({
					gif: new Image,
					auto_play: 0,
					progressbar_height: 0
				});
				n.load_url("http://emotion.nickboy.cc/" + this.epackage[0] + "/" + t + ".gif?v=2",
				function() {
					var t = document.createElement("canvas");
					t.width = e.size,
					t.height = e.size;
					var i = t.getContext("2d");
					i.fillStyle = "#ffffff",
					i.fillRect(0, 0, e.size, e.size);
					var o = new Image;
					o.crossOrigin = "*",
					o.src = e.item.badge_url + e.picStyle,
					o.onload = function() {
						k = new GIF({
							workers: 2,
							quality: 10,
							width: e.size,
							height: e.size,
							workerScript: zappurl + "/gif.worker.js"
						}),
						k.on("finished",
						function(t) {
							e.loading = "进度:98%";
							var n = new FileReader;
							n.readAsDataURL(t),
							n.onloadend = function() {
								e.loading = "进度:100%";
								var t = document.getElementById("app").offsetWidth;
								document.getElementsByClassName("weui_dialog")[0].style.width = t - 100 + "px",
								e.resultImage = n.result,
								e.dialogTitle = "长按下图保存到手机",
								e.loading = "",
								e.dialogShow = !0,
								k = null
							}
						}),
						e.item.zindex > 99 && w["default"].drawImageProp(i, o, 0, 0, e.size, e.size);
						var t = n.get_canvas(),
						r = 25,
						a = 60,
						s = 0,
						l = 0,
						c = setInterval(function() {
							return 0 === s && n.play(),
							e.loading = "进度:" + Math.floor(s / (r + 1) * 100) + "%",
							s++,
							s > r && 1 != l ? (l = 1, clearInterval(c), void k.render()) : void e.draw(i, t, o)
						},
						a)
					}
				})
			},
			draw: function(t, e, n) {
				var i = (this.size / 2, this.item.canvas_size / this.size),
				o = this.item.avatar_size / i;
				t.save();
				var r = this.item.left / i,
				a = this.item.top / i;
				t.arc(r + o / 2, a + o / 2, o / 2, 0, 2 * Math.PI),
				t.clip(),
				t.fillStyle = "#ffffff",
				t.fill(),
				w["default"].drawImageProp(t, e, r, a, o, o),
				t.restore(),
				this.item.zindex < 100 && t.drawImage(n, 0, 0, this.size, this.size),
				k.addFrame(t, {
					delay: 1e-4,
					copy: !0
				})
			}
		},
		data: function() {
			return {
				size: 150,
				sup1: null,
				gif_url: "0",
				emotions: [],
				epackage: [],
				epackages: [],
				loaded: !1,
				sfile: null,
				ui: {},
				document: window.document,
				iframe: "",
				resultImage: "",
				dialogShow: !1,
				dialogTitle: "",
				itemStyle: "/item100.png",
				picStyle: "!150x150.3",
				app: [],
				display: "none",
				loading: "",
				avatar_url: "",
				avatar_url2: "",
				items: [],
				item: {},
				one: {},
				itemSize: 60,
				makeSize: 0
			}
		},
		components: {
			Group: r["default"],
			Cell: s["default"],
			XButton: c["default"],
			XDialog: u["default"],
			Toast: h["default"],
			Divider: g["default"],
			Loading: v["default"]
		}
	}
},
function(t, e, n) {
	"use strict";
	function i(t) {
		return t && t.__esModule ? t: {
			"default": t
		}
	}
	Object.defineProperty(e, "__esModule", {
		value: !0
	});
	var o = n(25),
	r = i(o),
	a = n(22),
	s = i(a),
	l = n(28),
	c = i(l),
	d = n(23),
	u = i(d),
	p = n(27),
	h = i(p),
	f = n(24),
	g = i(f),
	m = n(26),
	v = i(m),
	y = n(13),
	w = i(y),
	x = n(29),
	b = i(x);
	e["default"] = {
		ready: function() {
			var t = this,
			e = function(e) {
				var n = localStorage.getItem("settings"),
				i = t.$route.query.media_id;
				i = i ? i: "gh_4e7837ae5767",
				n && 1 == t.$route.query.inapp ? e(w["default"].j(n)) : t.$http.jsonp(zurl + "/json.js?" + i).then(function(t) {
					localStorage.setItem("settings", w["default"].j(t.data)),
					e(t.data)
				})
			};
			e(function(e) {
				if (1 == e.app.auth) {
					var n = localStorage.getItem("ui");
					if (!n) {
						if (n = t.$route.query.ui, !n) return void(document.location.href = "http://wp.dufe.cc/dufeXC?auth=2&_url=" + w["default"].urlencode(document.location.href));
						localStorage.setItem("ui", n)
					}
					t.ui = w["default"].j(n),
					t.avatar_url = t.ui.headimgurl
				} else t.ui = {
					nickname: e.app.name,
					headimgurl: e.app.avatar_url && 0 == e.app.demo ? e.app.avatar_url: "http://wa.cdn.nickboy.cc/mmopen/80BS7iaDKBkqC0q4fzrUiaLicV4U1WKjCcIHA0COg4l71An51yPN7iaPc9KM3GXBK5TRs6pPCNcx2QzneYRsHkPCjw/0"
				},
				t.avatar_url = t.ui.headimgurl;
				if (t.app = e.app, t.epackages = e.epackages, t.items = e.items, 1 == t.app.demo) {
					t.makeSize = 300;
					var i = document.getElementById("app").style;
					i.maxWidth = "500px";
					var i = document.getElementById("app").style;
					i.border = "2px solid #fff",
					i.boxShadow = "4px 4px 2px #888888"
				}
				for (var o = 0; o < t.items.length; o++) if (t.items[o].id == t.$route.query.pid) {
					t.item = t.items[o];
					break
				}
				t.setTitle("「" + t.item.name + "」动态表情制作"),
				t.loaded = !0,
				t.display = "block"
			})
		},
		methods: {
			makeAvatarArea: function(t, e, n, i) {
				var o = w["default"].makeAvatarArea({
					area_size: t.canvas_size,
					dest_size: e,
					bg_url: t.badge_url + n,
					avatar_url: i || this.avatar_url,
					avatar_size: t.avatar_size,
					avatar_left: t.left,
					avatar_top: t.top,
					avatar_z: t.zindex
				});
				return o
			},
			selectImage: function(t) {
				var e = this;
				if ("undefined" != typeof FileReader) {
					var n = {
						"image/png": !0,
						"image/jpeg": !0,
						"image/gif": !0
					};
					if (e.sfile = t.target.files[0], n[e.sfile.type] === !0) {
						e.loading = "读取图片中...";
						var i = new FileReader;
						i.onload = function(t) {
							e.avatar_url = t.target.result,
							e.ui.headimgurl = t.target.result,
							0 == e.app.auth && (e.ui.nickname = "我的图片"),
							e.loading = ""
						},
						i.readAsDataURL(e.sfile)
					} else alert("仅能选择图片哦(png、jpg、gif格式)")
				}
			},
			updateUi: function() {
				this.$cookie["delete"]("ui"),
				document.location.href = "http://wp.dufe.cc/dufeXC?auth=2&_url=" + w["default"].urlencode(document.location.href)
			},
			setTitle: function(t) {
				document.title = t,
				navigator.userAgent.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/) && (this.iframe = zurl + "/hack?v=2")
			},
			makeImage: function() {
				var t = this;
				t.loading = "生成图片中...",
				this.avatar_url2 = 0 == this.avatar_url.indexOf("http") ? this.avatar_url.replace("wx.qlogo.cn", "wa.cdn.nickboy.cc") : this.avatar_url;
				var e = document.createElement("iframe");
				e.width = 0,
				e.height = 0,
				e.marginHeight = 0,
				e.marginWidth = 0,
				e.style.display = "none",
				e.src = zurl + "hack",
				document.body.appendChild(e),
				t.avatar_url = t.avatar_url.replace("wx.qlogo.cn", "wa.cdn.nickboy.cc");
				var n = '<!DOCTYPE html><html><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no"></head><style type="text/css">*{margin:0;padding:0}html,body{width:100%}img{max-width:100%}</style><body>' + t.makeAvatarArea(t.one, t.one.canvas_size*5, "") + "</body><script>window.onload=function(){var a=" + t.one.canvas_size*5 + ',b=document.createElement("canvas");b.width=a,b.height=a,_HDCanvas(b,function(a){html2canvas(document.querySelector("div"),{canvas:a,useCORS:!0,onrendered:function(a){_callback(a.toDataURL("image/png"))}})})};</script></html>';
				e.contentWindow.html2canvas = b["default"],
				e.contentWindow._callback = function(e) {
					t.resultImage = e,
					t.loading = "",
					t.dialogTitle = "长按下图保存到手机"
				},
				e.contentWindow._HDCanvas = w["default"].HDCanvas,
				e.contentWindow.document.open(),
				e.contentWindow.document.write(n),
				e.contentWindow.document.close()
			},
			make: function(t) {
				this.resultImage = "";
				var e = this,
				n = document.getElementById("app").offsetWidth;
				document.getElementsByClassName("weui_dialog")[0].style.width = n + "px",
				this.makeSize = this.makeSize ? this.makeSize: n - 2;
				var i = new Image;
				i.crossOrigin = "Anonymous",
				i.onload = function() {
					e.one = e.items[t],
					e.loading = "",
					e.dialogTitle = "📷截图保存即可获得该头像",
					e.dialogShow = !0,
					e.items[t].count = +e.items[t].count + 1,
					e.$http.jsonp("http://weixiao.nickboy.cc/api/badge-avatar?type=update&media_id=" + e.app.media_id + "&id=" + e.items[t].id)
				},
				i.src = e.items[t].badge_url
			}
		},
		data: function() {
			return {
				epackages: [],
				loaded: !1,
				sfile: null,
				ui: {},
				document: window.document,
				iframe: "",
				resultImage: "",
				dialogShow: !1,
				dialogTitle: "",
				itemStyle: "/item100.png",
				picStyle: "",
				app: [],
				display: "none",
				loading: "",
				avatar_url: "",
				avatar_url2: "",
				items: [],
				item: {},
				one: {},
				itemSize: 60,
				makeSize: 0
			}
		},
		components: {
			Group: r["default"],
			Cell: s["default"],
			XButton: c["default"],
			XDialog: u["default"],
			Toast: h["default"],
			Divider: g["default"],
			Loading: v["default"]
		}
	}
},
function(t, e, n) {
	"use strict";
	function i(t) {
		return t && t.__esModule ? t: {
			"default": t
		}
	}
	Object.defineProperty(e, "__esModule", {
		value: !0
	});
	var o = n(25),
	r = i(o),
	a = n(22),
	s = i(a),
	l = n(28),
	c = i(l),
	d = n(23),
	u = i(d),
	p = n(27),
	h = i(p),
	f = n(24),
	g = i(f),
	m = n(26),
	v = i(m),
	y = n(13),
	w = i(y),
	x = n(29),
	b = i(x);
	e["default"] = {
		ready: function() {
			var t = this,
			e = function(e) {
				var n = localStorage.getItem("settings"),
				i = t.$route.query.media_id;
				i = i ? i: "gh_4e7837ae5767",
				n && 1 == t.$route.query.inapp ? e(w["default"].j(n)) : t.$http.jsonp(zurl + "/json.js?" + i).then(function(t) {
					localStorage.setItem("settings", w["default"].j(t.data)),
					e(t.data)
				})
			};
			e(function(e) {
				if (1 == e.app.auth) {
					var n = localStorage.getItem("ui");
					if (!n) {
						if (n = t.$route.query.ui, !n) return void(document.location.href = "http://wp.nickboy.cc/grant/auth2?_url=" + w["default"].urlencode(document.location.href));
						localStorage.setItem("ui", n)
					}
					t.ui = w["default"].j(n),
					t.avatar_url = t.ui.headimgurl
				} else t.ui = {
					nickname: e.app.name,
					headimgurl: e.app.avatar_url && 0 == e.app.demo ? e.app.avatar_url: "http://wa.cdn.nickboy.cc/mmopen/80BS7iaDKBkqC0q4fzrUiaLicV4U1WKjCcIHA0COg4l71An51yPN7iaPc9KM3GXBK5TRs6pPCNcx2QzneYRsHkPCjw/0"
				},
				t.avatar_url = t.ui.headimgurl;
				if (t.app = e.app, t.epackages = e.epackages, t.items = e.items, t.setTitle(e.app.title), 1 == t.app.demo) {
					t.makeSize = 300;
					var i = document.getElementById("app").style;
					i.maxWidth = "500px";
					var i = document.getElementById("app").style;
					i.border = "2px solid #fff",
					i.boxShadow = "4px 4px 2px #888888"
				}
				t.loaded = !0,
				t.display = "block"
			})
		},
		methods: {
			makeAvatarArea: function(t, e, n) {
				var i = w["default"].makeAvatarArea({
					area_size: t.canvas_size,
					dest_size: e,
					bg_url: t.badge_url + n,
					avatar_url: this.avatar_url,
					avatar_size: t.avatar_size,
					avatar_left: t.left,
					avatar_top: t.top,
					avatar_z: t.zindex
				});
				return i
			},
			selectImage: function(t) {
				var e = this;
				if ("undefined" != typeof FileReader) {
					var n = {
						"image/png": !0,
						"image/jpeg": !0,
						"image/gif": !0
					};
					if (e.sfile = t.target.files[0], n[e.sfile.type] === !0) {
						e.loading = "读取图片中...";
						var i = new FileReader;
						i.onload = function(t) {
							e.avatar_url = t.target.result,
							e.ui.headimgurl = t.target.result,
							0 == e.app.auth && (e.ui.nickname = "我的图片"),
							e.loading = ""
						},
						i.readAsDataURL(e.sfile)
					} else alert("仅能选择图片哦(png、jpg、gif格式)")
				}
			},
			setTitle: function(t) {
				document.title = t,
				navigator.userAgent.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/) && (this.iframe = zurl + "/hack?v=2")
			},
			makeImage: function() {
				var t = this;
				t.loading = "生成图片中...",
				this.avatar_url2 = 0 == this.avatar_url.indexOf("http") ? this.avatar_url.replace("wx.qlogo.cn", "wa.cdn.nickboy.cc") : this.avatar_url;
				var e = document.createElement("iframe");
				e.width = 0,
				e.height = 0,
				e.marginHeight = 0,
				e.marginWidth = 0,
				e.style.display = "none",
				e.src = zurl + "/hack",
				document.body.appendChild(e),
				t.avatar_url = t.avatar_url.replace(/(third)?wx\.qlogo\.cn/, "wa.cdn.nickboy.cc");
				var n = '<!DOCTYPE html><html><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no"></head><style type="text/css">*{margin:0;padding:0}html,body{width:100%}img{max-width:100%}</style><body>' + t.makeAvatarArea(t.one, t.one.canvas_size*5, "") + "</body><script>window.onload=function(){var a=" + t.one.canvas_size*5 + ',b=document.createElement("canvas");b.width=a,b.height=a,_HDCanvas(b,function(a){html2canvas(document.querySelector("div"),{canvas:a,useCORS:!0,onrendered:function(a){_callback(a.toDataURL("image/png"))}})})};</script></html>';
				e.contentWindow.html2canvas = b["default"],
				e.contentWindow._callback = function(e) {
					t.resultImage = e,
					t.loading = "",
					t.dialogTitle = "长按下图保存到手机"
				},
				e.contentWindow._HDCanvas = w["default"].HDCanvas,
				e.contentWindow.document.open(),
				e.contentWindow.document.write(n),
				e.contentWindow.document.close()
			},
			make: function(t) {
				this.resultImage = "";
				var e = this,
				n = document.getElementById("app").offsetWidth;
				document.getElementsByClassName("weui_dialog")[0].style.width = n + "px",
				this.makeSize = this.makeSize ? this.makeSize: n - 2;
				var i = new Image;
				i.crossOrigin = "Anonymous",
				i.onload = function() {
					e.one = e.items[t],
					e.loading = "",
					e.dialogTitle = "📷截图保存即可获得该头像",
					e.dialogShow = !0,
					e.items[t].count = +e.items[t].count + 1,
					e.$http.jsonp("http://weixiao.nickboy.cc/api/badge-avatar?type=update&media_id=" + e.app.media_id + "&id=" + e.items[t].id)
				},
				i.src = e.items[t].badge_url
			}
		},
		data: function() {
			return {
				epackages: [],
				loaded: !1,
				sfile: null,
				ui: {},
				document: window.document,
				iframe: "",
				resultImage: "",
				dialogShow: !1,
				dialogTitle: "",
				itemStyle: "/item100.png",
				picStyle: "",
				app: [],
				display: "none",
				loading: "",
				avatar_url: "",
				avatar_url2: "",
				items: [],
				one: {},
				itemSize: 80,
				makeSize: 0
			}
		},
		components: {
			Group: r["default"],
			Cell: s["default"],
			XButton: c["default"],
			XDialog: u["default"],
			Toast: h["default"],
			Divider: g["default"],
			Loading: v["default"]
		}
	}
},
function(t, e, n) {
	"use strict";
	function i(t) {
		return t && t.__esModule ? t: {
			"default": t
		}
	}
	Object.defineProperty(e, "__esModule", {
		value: !0
	});
	var o = n(25),
	r = i(o),
	a = n(22),
	s = i(a),
	l = n(28),
	c = i(l),
	d = n(23),
	u = i(d),
	p = n(27),
	h = i(p),
	f = n(24),
	g = i(f),
	m = n(26),
	v = i(m),
	y = n(13),
	w = (i(y), n(29)),
	x = (i(w), n(43));
	i(x);
	e["default"] = {
		components: {
			Group: r["default"],
			Cell: s["default"],
			XButton: c["default"],
			XDialog: u["default"],
			Toast: h["default"],
			Divider: g["default"],
			Loading: v["default"]
		}
	}
},
, , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , ,
function(t, e) {},
function(t, e) {},
function(t, e) {},
function(t, e) {},
function(t, e) {},
function(t, e) {},
function(t, e) {},
function(t, e) {},
function(t, e) {},
,
function(t, e) {
	t.exports = " <div class=weui_cell :class=\"{'vux-tap-active': isLink || !!link}\" @click=onClick> <div class=weui_cell_hd> <slot name=icon></slot> </div> <div class=weui_cell_bd :class=\"{'weui_cell_primary':primary==='title'}\"> <p> {{title}} <slot name=after-title></slot> </p> <inline-desc>{{inlineDesc}}</inline-desc> </div> <div class=weui_cell_ft :class=\"{'weui_cell_primary':primary==='content', 'with_arrow': isLink || !!link}\"> {{value}} <slot name=value></slot> <slot></slot> </div> <slot name=child></slot> </div> "
},
function(t, e) {
	t.exports = ' <div class=weui_dialog_alert @touchmove="!this.scroll && $event.preventDefault()"> <div class=weui_mask @click="hideOnBlur && (show = false)" v-show=show :transition=maskTransition></div> <div class=weui_dialog v-show=show :transition=dialogTransition> <slot></slot> </div> </div> '
},
function(t, e) {
	t.exports = " <p class=vux-divider> <slot></slot> </p> "
},
function(t, e) {
	t.exports = ' <div> <div class=weui_cells_title v-if=title :style={color:titleColor} v-html=title></div> <div class=weui_cells :class="{\'vux-no-group-title\':!title}" :style="{marginTop: gutter}"> <slot></slot> </div> </div> '
},
function(t, e) {
	t.exports = " <span class=vux-label-desc><slot></slot></span> "
},
function(t, e) {
	t.exports = ' <div class=weui_loading_toast v-show=show> <div class=weui_mask_transparent></div> <div class=weui_toast :style="{position: position}"> <div class=weui_loading> <div class=weui_loading_leaf v-for="i in 12" :class="[\'weui_loading_leaf_\' + i]"></div> </div> <p class=weui_toast_content>{{text}}<slot></slot></p> </div> </div> ';
},
function(t, e) {
	t.exports = ' <div class=vux-toast> <div class=weui_mask_transparent v-show=show></div> <div class=weui_toast :style="{width: width}" :class=toastClass v-show=show :transition=transition> <i class=weui_icon_toast v-show="type !== \'text\'"></i> <p class=weui_toast_content v-if=text v-html=text></p> <p class=weui_toast_content v-else><slot></slot></p> </div> </div> '
},
function(t, e) {
	t.exports = " <button class=weui_btn :class=classes :disabled=disabled> {{text}}<slot></slot> </button> "
},
function(t, e) {
	t.exports = " <div id=app> <iframe :src=iframe style=display:none></iframe> <loading :show=!loaded text=😘加载资源~></loading> <div :style=\"{\n\t  \tdisplay: display\n\t  }\"> <group title=我选择的表情包> <cell :title=$route.query.eid is-link v-link=\"{ path: '/epackages', query: { pid: item.id, inapp: 1 } }\"> <div style=\"margin-right: 10px\" slot=icon> {{{ makeAvatarArea(item, itemSize, itemStyle, 'http://emotion.nickboy.cc/'+epackage[0]+'/1.gif?v=2') }}} </div> <label for=selectImage>重新选择</label> </cell> </group> <group title=选择表情> <cell v-for=\"emotion in emotions\" :title=\"epackage[0]+'('+emotion+')'\"> <span slot=icon :style=\"{\n\t\t\t\t\t\t\twidth: itemSize + 'px',\n\t\t\t\t\t\t\theight: itemSize + 'px',\n\t\t\t\t\t\t\tlineHeight: itemSize + 'px',\n\t\t\t\t\t\t\tdisplay: 'block',\n\t\t\t\t\t\t\tmarginRight: '20px'\n\t\t\t\t\t}\"> {{{ makeAvatarArea(item, itemSize, itemStyle, 'http://emotion.nickboy.cc/'+epackage[0]+'/'+emotion+'.gif?v=2') }}} </span> <x-button mini type=primary @click=\"(loading = '进度:0%') && (make(emotion))\"> 制作 </x-button> </cell> </group> <div :style=\"{\n\t\t  \tmarginBottom: app.vip == 1 ? '1rem' : '0'\n\t\t  }\" class=footer @click=\"\n\t\t  \t(app.goto == 1 && app.media_url) ? document.location.href=app.media_url : (\n\t\t  \t(dialogTitle = '长按二维码关注') && \n\t\t  \t(document.getElementsByClassName('weui_dialog')[0].style.width = '300px') &&\n\t\t  \t(resultImage = 'http://open.weixin.qq.com/qr/code/?username='+app.media_id) && \n\t\t  \t(dialogShow = true)\n\t\t  \t)\" v-if=\"app.name!=''\"> <div class=icon-weixin></div> {{ app.name }} </div> <x-dialog :show=dialogShow> <p class=dialog-title style=\"margin: 10px\">{{ dialogTitle }}</p> <img v-show=\"resultImage != ''\" :src=resultImage style=\"width: {{ size }}px;height: {{ size }}px;margin: 5px\"> <div style=\"margin: 10px\"> <x-button @click=\"dialogShow = false\" type=default mini plain> 关闭 </x-button> </div> </x-dialog> <loading :show=\"loading != ''\" :text=loading></loading> <divider v-show=\"app.vip == 0\"> <span style=font-size:12px>本功能由方剑成、仲原开发提供</span> </divider> <img style=\"position: absolute; zoom: 0.001; -moz-transform: scale(0); -webkit-transform: scale(0); -o-transform: scale(0); transform: scale(0)\" :src=app.avatar_url /> </div> </div> "
},
function(t, e) {
	t.exports = " <div id=app> <iframe :src=iframe style=display:none></iframe> <loading :show=!loaded text=😘加载资源~></loading> <div :style=\"{\n\t  \tdisplay: display\n\t  }\"> <group title=我选择的表情模板> <cell :title=item.name is-link v-link=\"{ path: '/index', query: { inapp: 1 } }\"> <div :style=\"{\n\t\t\t\tbackground: 'white no-repeat center',\n\t\t\t\tbackgroundSize: 'cover',\n\t\t\t\tbackgroundImage: 'url(\\''+item.badge_url+itemStyle+'\\')',\n\t\t\t\twidth: '60px',\n\t\t\t\theight: '60px',\n\t\t\t\tmarginRight: '10px'\n\t\t\t}\" slot=icon></div> <label for=selectImage>重新选择</label> </cell> </group> <group title=选择表情包> <cell v-link=\"{ path: '/emotion', query: { pid: item.id, eid: package[0], inapp: 1 } }\" is-link v-for=\"package in epackages\" :title=package[0]> <span slot=icon :style=\"{\n\t\t\t\t\t\t\twidth: itemSize + 'px',\n\t\t\t\t\t\t\theight: itemSize + 'px',\n\t\t\t\t\t\t\tlineHeight: itemSize + 'px',\n\t\t\t\t\t\t\tdisplay: 'block',\n\t\t\t\t\t\t\tmarginRight: '20px'\n\t\t\t\t\t}\"> {{{ makeAvatarArea(item, itemSize, itemStyle, 'http://emotion.nickboy.cc/'+package[0]+'/1.gif?v=2') }}} </span> </cell> </group> <div :style=\"{\n\t\t  \tmarginBottom: app.vip == 1 ? '1rem' : '0'\n\t\t  }\" class=footer @click=\"\n\t\t  \t(app.goto == 1 && app.media_url) ? document.location.href=app.media_url : (\n\t\t  \t(dialogTitle = '长按二维码关注') && \n\t\t  \t(document.getElementsByClassName('weui_dialog')[0].style.width = '300px') &&\n\t\t  \t(resultImage = 'http://open.weixin.qq.com/qr/code/?username='+app.media_id) && \n\t\t  \t(dialogShow = true)\n\t\t  \t)\" v-if=\"app.name!=''\"> <div class=icon-weixin></div> {{ app.name }} </div> <x-dialog :show=dialogShow> <p class=dialog-title style=\"margin: 10px\">{{ dialogTitle }}</p> <div v-show=\"resultImage == ''\" style=\"background-color: white;padding: 20px 0px\"> <span :style=\"{\n\t\t\t\t\t\t\twidth: makeSize + 'px',\n\t\t\t\t\t\t\theight: makeSize + 'px',\n\t\t\t\t\t\t\tlineHeight: makeSize + 'px',\n\t\t\t\t\t\t\tdisplay: 'block',\n\t\t\t\t\t\t\tmargin: 'auto'\n\t\t\t\t\t}\"> {{{ makeAvatarArea(one, makeSize, '') }}} </span> </div> <img v-show=\"resultImage != ''\" :src=resultImage style=\"width: 200px;height: 200px\"> <div style=\"margin: 10px\"> <div v-show=\"resultImage == ''\" style=\"font-size: 14px;    margin: 6px 0\"> 不想截图?直接保存!<span style=\"color: #1a0dab;cursor: pointer\" @click=makeImage>点击生成图片保存</span> </div> <x-button @click=\"dialogShow = false\" type=default mini plain> 关闭 </x-button> </div> </x-dialog> <toast :show=\"loading != ''\" type=text> <div class=spinner></div> {{ loading }} </toast> <divider v-show=\"app.vip == 0\"> <span style=font-size:12px>本功能由方剑成、仲原开发提供</span> </divider> <img style=\"position: absolute; zoom: 0.001; -moz-transform: scale(0); -webkit-transform: scale(0); -o-transform: scale(0); transform: scale(0)\" :src=app.avatar_url /> </div> </div> "
},
function(t, e) {
	t.exports = " <div id=app> <iframe :src=iframe style=display:none></iframe> <loading :show=!loaded text=😘加载资源~></loading> <div :style=\"{\n\t  \tdisplay: display\n\t  }\"> <group title=我的头像> <cell is-link> <div :style=\"{\n\t\t\t\tbackground: 'white no-repeat center',\n\t\t\t\tbackgroundSize: 'cover',\n\t\t\t\tbackgroundImage: 'url(\\''+avatar_url+'\\')',\n\t\t\t\twidth: '60px',\n\t\t\t\theight: '60px',\n\t\t\t\tmarginRight: '10px'\n\t\t\t}\" slot=icon></div> <label for=selectImage>选择手机里的图片制作</label> <input accept=image/* @change=selectImage style=display:none type=file id=selectImage /> </cell> </group> <group :title=app.title> <cell v-for=\"item in items\" :title=item.name :inline-desc=\"'制作次数:'+item.count\"> <span slot=icon :style=\"{\n\t\t\t\t\t\t\twidth: itemSize + 'px',\n\t\t\t\t\t\t\theight: itemSize + 'px',\n\t\t\t\t\t\t\tlineHeight: itemSize + 'px',\n\t\t\t\t\t\t\tdisplay: 'block',\n\t\t\t\t\t\t\tmarginRight: '20px'\n\t\t\t\t\t}\"> {{{ makeAvatarArea(item, itemSize, itemStyle) }}} </span> <x-button mini type=primary @click=\"(loading = '制作中...') && (make($index))\"> 做头像 </x-button> </cell> </group> <div :style=\"{\n\t\t  \tmarginBottom: app.vip == 1 ? '1rem' : '0'\n\t\t  }\" class=footer @click=\"\n\t\t  \t(app.goto == 1 && app.media_url) ? document.location.href=app.media_url : (\n\t\t  \t(dialogTitle = '长按二维码关注') && \n\t\t  \t(document.getElementsByClassName('weui_dialog')[0].style.width = '300px') &&\n\t\t  \t(resultImage = 'http://open.weixin.qq.com/qr/code?username='+app.media_id) &&\n\t\t  \t(dialogShow = true)\n\t\t  \t)\" v-if=\"app.name!=''\"> <div class=icon-weixin></div> {{ app.name }} </div> <x-dialog :show=dialogShow> <p class=dialog-title style=\"margin: 10px\">{{ dialogTitle }}</p> <div v-show=\"resultImage == ''\" style=\"background-color: white;padding: 20px 0px\"> <span :style=\"{\n\t\t\t\t\t\t\twidth: makeSize + 'px',\n\t\t\t\t\t\t\theight: makeSize + 'px',\n\t\t\t\t\t\t\tlineHeight: makeSize + 'px',\n\t\t\t\t\t\t\tdisplay: 'block',\n\t\t\t\t\t\t\tmargin: 'auto'\n\t\t\t\t\t}\"> {{{ makeAvatarArea(one, makeSize, '') }}} </span> </div> <img v-show=\"resultImage != ''\" :src=resultImage style=\"width: 200px;height: 200px\"> <div style=\"margin: 10px\"> <div v-show=\"resultImage == ''\" style=\"font-size: 14px;    margin: 6px 0\"> 不想截图?直接保存!<span style=\"color: #1a0dab;cursor: pointer\" @click=makeImage>点击生成图片保存</span> </div> <x-button @click=\"dialogShow = false\" type=default mini plain> 关闭 </x-button> </div> </x-dialog> <loading :show=\"loading != ''\" :text=loading></loading> <divider v-show=\"app.vip == 0\"> <span style=font-size:12px>本功能由方剑成、仲原开发提供</span> </divider> <img style=\"position: absolute; zoom: 0.001; -moz-transform: scale(0); -webkit-transform: scale(0); -o-transform: scale(0); transform: scale(0)\" :src=app.avatar_url /> </div> </div> "
},
function(t, e) {
	t.exports = " <router-view></router-view> "
},
function(t, e, n) {
	var i, o, r = {};
	n(120),
	o = n(127),
	t.exports = i || {},
	t.exports.__esModule && (t.exports = t.exports["default"]);
	var a = "function" == typeof t.exports ? t.exports.options || (t.exports.options = {}) : t.exports;
	o && (a.template = o),
	a.computed || (a.computed = {}),
	Object.keys(r).forEach(function(t) {
		var e = r[t];
		a.computed[t] = function() {
			return e
		}
	})
},
function(t, e, n) {
	var i, o, r = {};
	i = n(66),
	o = n(131),
	t.exports = i || {},
	t.exports.__esModule && (t.exports = t.exports["default"]);
	var a = "function" == typeof t.exports ? t.exports.options || (t.exports.options = {}) : t.exports;
	o && (a.template = o),
	a.computed || (a.computed = {}),
	Object.keys(r).forEach(function(t) {
		var e = r[t];
		a.computed[t] = function() {
			return e
		}
	})
},
function(t, e, n) {
	var i, o, r = {};
	i = n(67),
	o = n(132),
	t.exports = i || {},
	t.exports.__esModule && (t.exports = t.exports["default"]);
	var a = "function" == typeof t.exports ? t.exports.options || (t.exports.options = {}) : t.exports;
	o && (a.template = o),
	a.computed || (a.computed = {}),
	Object.keys(r).forEach(function(t) {
		var e = r[t];
		a.computed[t] = function() {
			return e
		}
	})
},
function(t, e, n) {
	var i, o, r = {};
	n(121),
	i = n(69),
	o = n(134),
	t.exports = i || {},
	t.exports.__esModule && (t.exports = t.exports["default"]);
	var a = "function" == typeof t.exports ? t.exports.options || (t.exports.options = {}) : t.exports;
	o && (a.template = o),
	a.computed || (a.computed = {}),
	Object.keys(r).forEach(function(t) {
		var e = r[t];
		a.computed[t] = function() {
			return e
		}
	})
}]);