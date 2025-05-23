/*!
 * Bootstrap v5.0.1 (https://getbootstrap.com/)
 * Copyright 2011-2021 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
 */
! function (t, e) {
	"object" == typeof exports && "undefined" != typeof module ? module.exports = e() : "function" == typeof define && define.amd ? define(e) : (t = "undefined" != typeof globalThis ? globalThis : t || self).bootstrap = e()
}(this, (function () {
	"use strict";
	const t = {
			find: (t, e = document.documentElement) => [].concat(...Element.prototype.querySelectorAll.call(e, t)),
			findOne: (t, e = document.documentElement) => Element.prototype.querySelector.call(e, t),
			children: (t, e) => [].concat(...t.children).filter(t => t.matches(e)),
			parents(t, e) {
				const i = [];
				let n = t.parentNode;
				for (; n && n.nodeType === Node.ELEMENT_NODE && 3 !== n.nodeType;) n.matches(e) && i.push(n), n = n.parentNode;
				return i
			},
			prev(t, e) {
				let i = t.previousElementSibling;
				for (; i;) {
					if (i.matches(e)) return [i];
					i = i.previousElementSibling
				}
				return []
			},
			next(t, e) {
				let i = t.nextElementSibling;
				for (; i;) {
					if (i.matches(e)) return [i];
					i = i.nextElementSibling
				}
				return []
			}
		},
		e = t => {
			do {
				t += Math.floor(1e6 * Math.random())
			} while (document.getElementById(t));
			return t
		},
		i = t => {
			let e = t.getAttribute("data-bs-target");
			if (!e || "#" === e) {
				let i = t.getAttribute("href");
				if (!i || !i.includes("#") && !i.startsWith(".")) return null;
				i.includes("#") && !i.startsWith("#") && (i = "#" + i.split("#")[1]), e = i && "#" !== i ? i.trim() : null
			}
			return e
		},
		n = t => {
			const e = i(t);
			return e && document.querySelector(e) ? e : null
		},
		s = t => {
			const e = i(t);
			return e ? document.querySelector(e) : null
		},
		o = t => {
			if (!t) return 0;
			let {
				transitionDuration: e,
				transitionDelay: i
			} = window.getComputedStyle(t);
			const n = Number.parseFloat(e),
				s = Number.parseFloat(i);
			return n || s ? (e = e.split(",")[0], i = i.split(",")[0], 1e3 * (Number.parseFloat(e) + Number.parseFloat(i))) : 0
		},
		r = t => {
			t.dispatchEvent(new Event("transitionend"))
		},
		a = t => !(!t || "object" != typeof t) && (void 0 !== t.jquery && (t = t[0]), void 0 !== t.nodeType),
		l = e => a(e) ? e.jquery ? e[0] : e : "string" == typeof e && e.length > 0 ? t.findOne(e) : null,
		c = (t, e) => {
			let i = !1;
			const n = e + 5;
			t.addEventListener("transitionend", (function e() {
				i = !0, t.removeEventListener("transitionend", e)
			})), setTimeout(() => {
				i || r(t)
			}, n)
		},
		d = (t, e, i) => {
			Object.keys(i).forEach(n => {
				const s = i[n],
					o = e[n],
					r = o && a(o) ? "element" : null == (l = o) ? "" + l : {}.toString.call(l).match(/\s([a-z]+)/i)[1].toLowerCase();
				var l;
				if (!new RegExp(s).test(r)) throw new TypeError(`${t.toUpperCase()}: Option "${n}" provided type "${r}" but expected type "${s}".`)
			})
		},
		h = t => {
			if (!t) return !1;
			if (t.style && t.parentNode && t.parentNode.style) {
				const e = getComputedStyle(t),
					i = getComputedStyle(t.parentNode);
				return "none" !== e.display && "none" !== i.display && "hidden" !== e.visibility
			}
			return !1
		},
		u = t => !t || t.nodeType !== Node.ELEMENT_NODE || !!t.classList.contains("disabled") || (void 0 !== t.disabled ? t.disabled : t.hasAttribute("disabled") && "false" !== t.getAttribute("disabled")),
		f = t => {
			if (!document.documentElement.attachShadow) return null;
			if ("function" == typeof t.getRootNode) {
				const e = t.getRootNode();
				return e instanceof ShadowRoot ? e : null
			}
			return t instanceof ShadowRoot ? t : t.parentNode ? f(t.parentNode) : null
		},
		p = () => {},
		m = t => t.offsetHeight,
		g = () => {
			const {
				jQuery: t
			} = window;
			return t && !document.body.hasAttribute("data-bs-no-jquery") ? t : null
		},
		_ = () => "rtl" === document.documentElement.dir,
		b = t => {
			var e;
			e = () => {
				const e = g();
				if (e) {
					const i = t.NAME,
						n = e.fn[i];
					e.fn[i] = t.jQueryInterface, e.fn[i].Constructor = t, e.fn[i].noConflict = () => (e.fn[i] = n, t.jQueryInterface)
				}
			}, "loading" === document.readyState ? document.addEventListener("DOMContentLoaded", e) : e()
		},
		v = t => {
			"function" == typeof t && t()
		},
		y = new Map;
	var w = {
		set(t, e, i) {
			y.has(t) || y.set(t, new Map);
			const n = y.get(t);
			n.has(e) || 0 === n.size ? n.set(e, i) : console.error(`Bootstrap doesn't allow more than one instance per element. Bound instance: ${Array.from(n.keys())[0]}.`)
		},
		get: (t, e) => y.has(t) && y.get(t).get(e) || null,
		remove(t, e) {
			if (!y.has(t)) return;
			const i = y.get(t);
			i.delete(e), 0 === i.size && y.delete(t)
		}
	};
	const E = /[^.]*(?=\..*)\.|.*/,
		T = /\..*/,
		A = /::\d+$/,
		L = {};
	let O = 1;
	const k = {
			mouseenter: "mouseover",
			mouseleave: "mouseout"
		},
		C = /^(mouseenter|mouseleave)/i,
		x = new Set(["click", "dblclick", "mouseup", "mousedown", "contextmenu", "mousewheel", "DOMMouseScroll", "mouseover", "mouseout", "mousemove", "selectstart", "selectend", "keydown", "keypress", "keyup", "orientationchange", "touchstart", "touchmove", "touchend", "touchcancel", "pointerdown", "pointermove", "pointerup", "pointerleave", "pointercancel", "gesturestart", "gesturechange", "gestureend", "focus", "blur", "change", "reset", "select", "submit", "focusin", "focusout", "load", "unload", "beforeunload", "resize", "move", "DOMContentLoaded", "readystatechange", "error", "abort", "scroll"]);

	function D(t, e) {
		return e && `${e}::${O++}` || t.uidEvent || O++
	}

	function N(t) {
		const e = D(t);
		return t.uidEvent = e, L[e] = L[e] || {}, L[e]
	}

	function S(t, e, i = null) {
		const n = Object.keys(t);
		for (let s = 0, o = n.length; s < o; s++) {
			const o = t[n[s]];
			if (o.originalHandler === e && o.delegationSelector === i) return o
		}
		return null
	}

	function I(t, e, i) {
		const n = "string" == typeof e,
			s = n ? i : e;
		let o = M(t);
		return x.has(o) || (o = t), [n, s, o]
	}

	function j(t, e, i, n, s) {
		if ("string" != typeof e || !t) return;
		if (i || (i = n, n = null), C.test(e)) {
			const t = t => function (e) {
				if (!e.relatedTarget || e.relatedTarget !== e.delegateTarget && !e.delegateTarget.contains(e.relatedTarget)) return t.call(this, e)
			};
			n ? n = t(n) : i = t(i)
		}
		const [o, r, a] = I(e, i, n), l = N(t), c = l[a] || (l[a] = {}), d = S(c, r, o ? i : null);
		if (d) return void(d.oneOff = d.oneOff && s);
		const h = D(r, e.replace(E, "")),
			u = o ? function (t, e, i) {
				return function n(s) {
					const o = t.querySelectorAll(e);
					for (let {
							target: r
						} = s; r && r !== this; r = r.parentNode)
						for (let a = o.length; a--;)
							if (o[a] === r) return s.delegateTarget = r, n.oneOff && H.off(t, s.type, e, i), i.apply(r, [s]);
					return null
				}
			}(t, i, n) : function (t, e) {
				return function i(n) {
					return n.delegateTarget = t, i.oneOff && H.off(t, n.type, e), e.apply(t, [n])
				}
			}(t, i);
		u.delegationSelector = o ? i : null, u.originalHandler = r, u.oneOff = s, u.uidEvent = h, c[h] = u, t.addEventListener(a, u, o)
	}

	function P(t, e, i, n, s) {
		const o = S(e[i], n, s);
		o && (t.removeEventListener(i, o, Boolean(s)), delete e[i][o.uidEvent])
	}

	function M(t) {
		return t = t.replace(T, ""), k[t] || t
	}
	const H = {
		on(t, e, i, n) {
			j(t, e, i, n, !1)
		},
		one(t, e, i, n) {
			j(t, e, i, n, !0)
		},
		off(t, e, i, n) {
			if ("string" != typeof e || !t) return;
			const [s, o, r] = I(e, i, n), a = r !== e, l = N(t), c = e.startsWith(".");
			if (void 0 !== o) {
				if (!l || !l[r]) return;
				return void P(t, l, r, o, s ? i : null)
			}
			c && Object.keys(l).forEach(i => {
				! function (t, e, i, n) {
					const s = e[i] || {};
					Object.keys(s).forEach(o => {
						if (o.includes(n)) {
							const n = s[o];
							P(t, e, i, n.originalHandler, n.delegationSelector)
						}
					})
				}(t, l, i, e.slice(1))
			});
			const d = l[r] || {};
			Object.keys(d).forEach(i => {
				const n = i.replace(A, "");
				if (!a || e.includes(n)) {
					const e = d[i];
					P(t, l, r, e.originalHandler, e.delegationSelector)
				}
			})
		},
		trigger(t, e, i) {
			if ("string" != typeof e || !t) return null;
			const n = g(),
				s = M(e),
				o = e !== s,
				r = x.has(s);
			let a, l = !0,
				c = !0,
				d = !1,
				h = null;
			return o && n && (a = n.Event(e, i), n(t).trigger(a), l = !a.isPropagationStopped(), c = !a.isImmediatePropagationStopped(), d = a.isDefaultPrevented()), r ? (h = document.createEvent("HTMLEvents"), h.initEvent(s, l, !0)) : h = new CustomEvent(e, {
				bubbles: l,
				cancelable: !0
			}), void 0 !== i && Object.keys(i).forEach(t => {
				Object.defineProperty(h, t, {
					get: () => i[t]
				})
			}), d && h.preventDefault(), c && t.dispatchEvent(h), h.defaultPrevented && void 0 !== a && a.preventDefault(), h
		}
	};
	class R {
		constructor(t) {
			(t = l(t)) && (this._element = t, w.set(this._element, this.constructor.DATA_KEY, this))
		}
		dispose() {
			w.remove(this._element, this.constructor.DATA_KEY), H.off(this._element, this.constructor.EVENT_KEY), Object.getOwnPropertyNames(this).forEach(t => {
				this[t] = null
			})
		}
		_queueCallback(t, e, i = !0) {
			if (!i) return void v(t);
			const n = o(e);
			H.one(e, "transitionend", () => v(t)), c(e, n)
		}
		static getInstance(t) {
			return w.get(t, this.DATA_KEY)
		}
		static get VERSION() {
			return "5.0.1"
		}
		static get NAME() {
			throw new Error('You have to implement the static method "NAME", for each component!')
		}
		static get DATA_KEY() {
			return "bs." + this.NAME
		}
		static get EVENT_KEY() {
			return "." + this.DATA_KEY
		}
	}
	class B extends R {
		static get NAME() {
			return "alert"
		}
		close(t) {
			const e = t ? this._getRootElement(t) : this._element,
				i = this._triggerCloseEvent(e);
			null === i || i.defaultPrevented || this._removeElement(e)
		}
		_getRootElement(t) {
			return s(t) || t.closest(".alert")
		}
		_triggerCloseEvent(t) {
			return H.trigger(t, "close.bs.alert")
		}
		_removeElement(t) {
			t.classList.remove("show");
			const e = t.classList.contains("fade");
			this._queueCallback(() => this._destroyElement(t), t, e)
		}
		_destroyElement(t) {
			t.parentNode && t.parentNode.removeChild(t), H.trigger(t, "closed.bs.alert")
		}
		static jQueryInterface(t) {
			return this.each((function () {
				let e = w.get(this, "bs.alert");
				e || (e = new B(this)), "close" === t && e[t](this)
			}))
		}
		static handleDismiss(t) {
			return function (e) {
				e && e.preventDefault(), t.close(this)
			}
		}
	}
	H.on(document, "click.bs.alert.data-api", '[data-bs-dismiss="alert"]', B.handleDismiss(new B)), b(B);
	class W extends R {
		static get NAME() {
			return "button"
		}
		toggle() {
			this._element.setAttribute("aria-pressed", this._element.classList.toggle("active"))
		}
		static jQueryInterface(t) {
			return this.each((function () {
				let e = w.get(this, "bs.button");
				e || (e = new W(this)), "toggle" === t && e[t]()
			}))
		}
	}

	function q(t) {
		return "true" === t || "false" !== t && (t === Number(t).toString() ? Number(t) : "" === t || "null" === t ? null : t)
	}

	function z(t) {
		return t.replace(/[A-Z]/g, t => "-" + t.toLowerCase())
	}
	H.on(document, "click.bs.button.data-api", '[data-bs-toggle="button"]', t => {
		t.preventDefault();
		const e = t.target.closest('[data-bs-toggle="button"]');
		let i = w.get(e, "bs.button");
		i || (i = new W(e)), i.toggle()
	}), b(W);
	const U = {
			setDataAttribute(t, e, i) {
				t.setAttribute("data-bs-" + z(e), i)
			},
			removeDataAttribute(t, e) {
				t.removeAttribute("data-bs-" + z(e))
			},
			getDataAttributes(t) {
				if (!t) return {};
				const e = {};
				return Object.keys(t.dataset).filter(t => t.startsWith("bs")).forEach(i => {
					let n = i.replace(/^bs/, "");
					n = n.charAt(0).toLowerCase() + n.slice(1, n.length), e[n] = q(t.dataset[i])
				}), e
			},
			getDataAttribute: (t, e) => q(t.getAttribute("data-bs-" + z(e))),
			offset(t) {
				const e = t.getBoundingClientRect();
				return {
					top: e.top + document.body.scrollTop,
					left: e.left + document.body.scrollLeft
				}
			},
			position: t => ({
				top: t.offsetTop,
				left: t.offsetLeft
			})
		},
		$ = {
			interval: 5e3,
			keyboard: !0,
			slide: !1,
			pause: "hover",
			wrap: !0,
			touch: !0
		},
		F = {
			interval: "(number|boolean)",
			keyboard: "boolean",
			slide: "(boolean|string)",
			pause: "(string|boolean)",
			wrap: "boolean",
			touch: "boolean"
		},
		V = "next",
		K = "prev",
		X = "left",
		Y = "right";
	class Q extends R {
		constructor(e, i) {
			super(e), this._items = null, this._interval = null, this._activeElement = null, this._isPaused = !1, this._isSliding = !1, this.touchTimeout = null, this.touchStartX = 0, this.touchDeltaX = 0, this._config = this._getConfig(i), this._indicatorsElement = t.findOne(".carousel-indicators", this._element), this._touchSupported = "ontouchstart" in document.documentElement || navigator.maxTouchPoints > 0, this._pointerEvent = Boolean(window.PointerEvent), this._addEventListeners()
		}
		static get Default() {
			return $
		}
		static get NAME() {
			return "carousel"
		}
		next() {
			this._isSliding || this._slide(V)
		}
		nextWhenVisible() {
			!document.hidden && h(this._element) && this.next()
		}
		prev() {
			this._isSliding || this._slide(K)
		}
		pause(e) {
			e || (this._isPaused = !0), t.findOne(".carousel-item-next, .carousel-item-prev", this._element) && (r(this._element), this.cycle(!0)), clearInterval(this._interval), this._interval = null
		}
		cycle(t) {
			t || (this._isPaused = !1), this._interval && (clearInterval(this._interval), this._interval = null), this._config && this._config.interval && !this._isPaused && (this._updateInterval(), this._interval = setInterval((document.visibilityState ? this.nextWhenVisible : this.next).bind(this), this._config.interval))
		}
		to(e) {
			this._activeElement = t.findOne(".active.carousel-item", this._element);
			const i = this._getItemIndex(this._activeElement);
			if (e > this._items.length - 1 || e < 0) return;
			if (this._isSliding) return void H.one(this._element, "slid.bs.carousel", () => this.to(e));
			if (i === e) return this.pause(), void this.cycle();
			const n = e > i ? V : K;
			this._slide(n, this._items[e])
		}
		_getConfig(t) {
			return t = { ...$,
				...t
			}, d("carousel", t, F), t
		}
		_handleSwipe() {
			const t = Math.abs(this.touchDeltaX);
			if (t <= 40) return;
			const e = t / this.touchDeltaX;
			this.touchDeltaX = 0, e && this._slide(e > 0 ? Y : X)
		}
		_addEventListeners() {
			this._config.keyboard && H.on(this._element, "keydown.bs.carousel", t => this._keydown(t)), "hover" === this._config.pause && (H.on(this._element, "mouseenter.bs.carousel", t => this.pause(t)), H.on(this._element, "mouseleave.bs.carousel", t => this.cycle(t))), this._config.touch && this._touchSupported && this._addTouchEventListeners()
		}
		_addTouchEventListeners() {
			const e = t => {
					!this._pointerEvent || "pen" !== t.pointerType && "touch" !== t.pointerType ? this._pointerEvent || (this.touchStartX = t.touches[0].clientX) : this.touchStartX = t.clientX
				},
				i = t => {
					this.touchDeltaX = t.touches && t.touches.length > 1 ? 0 : t.touches[0].clientX - this.touchStartX
				},
				n = t => {
					!this._pointerEvent || "pen" !== t.pointerType && "touch" !== t.pointerType || (this.touchDeltaX = t.clientX - this.touchStartX), this._handleSwipe(), "hover" === this._config.pause && (this.pause(), this.touchTimeout && clearTimeout(this.touchTimeout), this.touchTimeout = setTimeout(t => this.cycle(t), 500 + this._config.interval))
				};
			t.find(".carousel-item img", this._element).forEach(t => {
				H.on(t, "dragstart.bs.carousel", t => t.preventDefault())
			}), this._pointerEvent ? (H.on(this._element, "pointerdown.bs.carousel", t => e(t)), H.on(this._element, "pointerup.bs.carousel", t => n(t)), this._element.classList.add("pointer-event")) : (H.on(this._element, "touchstart.bs.carousel", t => e(t)), H.on(this._element, "touchmove.bs.carousel", t => i(t)), H.on(this._element, "touchend.bs.carousel", t => n(t)))
		}
		_keydown(t) {
			/input|textarea/i.test(t.target.tagName) || ("ArrowLeft" === t.key ? (t.preventDefault(), this._slide(Y)) : "ArrowRight" === t.key && (t.preventDefault(), this._slide(X)))
		}
		_getItemIndex(e) {
			return this._items = e && e.parentNode ? t.find(".carousel-item", e.parentNode) : [], this._items.indexOf(e)
		}
		_getItemByOrder(t, e) {
			const i = t === V,
				n = t === K,
				s = this._getItemIndex(e),
				o = this._items.length - 1;
			if ((n && 0 === s || i && s === o) && !this._config.wrap) return e;
			const r = (s + (n ? -1 : 1)) % this._items.length;
			return -1 === r ? this._items[this._items.length - 1] : this._items[r]
		}
		_triggerSlideEvent(e, i) {
			const n = this._getItemIndex(e),
				s = this._getItemIndex(t.findOne(".active.carousel-item", this._element));
			return H.trigger(this._element, "slide.bs.carousel", {
				relatedTarget: e,
				direction: i,
				from: s,
				to: n
			})
		}
		_setActiveIndicatorElement(e) {
			if (this._indicatorsElement) {
				const i = t.findOne(".active", this._indicatorsElement);
				i.classList.remove("active"), i.removeAttribute("aria-current");
				const n = t.find("[data-bs-target]", this._indicatorsElement);
				for (let t = 0; t < n.length; t++)
					if (Number.parseInt(n[t].getAttribute("data-bs-slide-to"), 10) === this._getItemIndex(e)) {
						n[t].classList.add("active"), n[t].setAttribute("aria-current", "true");
						break
					}
			}
		}
		_updateInterval() {
			const e = this._activeElement || t.findOne(".active.carousel-item", this._element);
			if (!e) return;
			const i = Number.parseInt(e.getAttribute("data-bs-interval"), 10);
			i ? (this._config.defaultInterval = this._config.defaultInterval || this._config.interval, this._config.interval = i) : this._config.interval = this._config.defaultInterval || this._config.interval
		}
		_slide(e, i) {
			const n = this._directionToOrder(e),
				s = t.findOne(".active.carousel-item", this._element),
				o = this._getItemIndex(s),
				r = i || this._getItemByOrder(n, s),
				a = this._getItemIndex(r),
				l = Boolean(this._interval),
				c = n === V,
				d = c ? "carousel-item-start" : "carousel-item-end",
				h = c ? "carousel-item-next" : "carousel-item-prev",
				u = this._orderToDirection(n);
			if (r && r.classList.contains("active")) return void(this._isSliding = !1);
			if (this._triggerSlideEvent(r, u).defaultPrevented) return;
			if (!s || !r) return;
			this._isSliding = !0, l && this.pause(), this._setActiveIndicatorElement(r), this._activeElement = r;
			const f = () => {
				H.trigger(this._element, "slid.bs.carousel", {
					relatedTarget: r,
					direction: u,
					from: o,
					to: a
				})
			};
			if (this._element.classList.contains("slide")) {
				r.classList.add(h), m(r), s.classList.add(d), r.classList.add(d);
				const t = () => {
					r.classList.remove(d, h), r.classList.add("active"), s.classList.remove("active", h, d), this._isSliding = !1, setTimeout(f, 0)
				};
				this._queueCallback(t, s, !0)
			} else s.classList.remove("active"), r.classList.add("active"), this._isSliding = !1, f();
			l && this.cycle()
		}
		_directionToOrder(t) {
			return [Y, X].includes(t) ? _() ? t === X ? K : V : t === X ? V : K : t
		}
		_orderToDirection(t) {
			return [V, K].includes(t) ? _() ? t === K ? X : Y : t === K ? Y : X : t
		}
		static carouselInterface(t, e) {
			let i = w.get(t, "bs.carousel"),
				n = { ...$,
					...U.getDataAttributes(t)
				};
			"object" == typeof e && (n = { ...n,
				...e
			});
			const s = "string" == typeof e ? e : n.slide;
			if (i || (i = new Q(t, n)), "number" == typeof e) i.to(e);
			else if ("string" == typeof s) {
				if (void 0 === i[s]) throw new TypeError(`No method named "${s}"`);
				i[s]()
			} else n.interval && n.ride && (i.pause(), i.cycle())
		}
		static jQueryInterface(t) {
			return this.each((function () {
				Q.carouselInterface(this, t)
			}))
		}
		static dataApiClickHandler(t) {
			const e = s(this);
			if (!e || !e.classList.contains("carousel")) return;
			const i = { ...U.getDataAttributes(e),
					...U.getDataAttributes(this)
				},
				n = this.getAttribute("data-bs-slide-to");
			n && (i.interval = !1), Q.carouselInterface(e, i), n && w.get(e, "bs.carousel").to(n), t.preventDefault()
		}
	}
	H.on(document, "click.bs.carousel.data-api", "[data-bs-slide], [data-bs-slide-to]", Q.dataApiClickHandler), H.on(window, "load.bs.carousel.data-api", () => {
		const e = t.find('[data-bs-ride="carousel"]');
		for (let t = 0, i = e.length; t < i; t++) Q.carouselInterface(e[t], w.get(e[t], "bs.carousel"))
	}), b(Q);
	const G = {
			toggle: !0,
			parent: ""
		},
		Z = {
			toggle: "boolean",
			parent: "(string|element)"
		};
	class J extends R {
		constructor(e, i) {
			super(e), this._isTransitioning = !1, this._config = this._getConfig(i), this._triggerArray = t.find(`[data-bs-toggle="collapse"][href="#${this._element.id}"],[data-bs-toggle="collapse"][data-bs-target="#${this._element.id}"]`);
			const s = t.find('[data-bs-toggle="collapse"]');
			for (let e = 0, i = s.length; e < i; e++) {
				const i = s[e],
					o = n(i),
					r = t.find(o).filter(t => t === this._element);
				null !== o && r.length && (this._selector = o, this._triggerArray.push(i))
			}
			this._parent = this._config.parent ? this._getParent() : null, this._config.parent || this._addAriaAndCollapsedClass(this._element, this._triggerArray), this._config.toggle && this.toggle()
		}
		static get Default() {
			return G
		}
		static get NAME() {
			return "collapse"
		}
		toggle() {
			this._element.classList.contains("show") ? this.hide() : this.show()
		}
		show() {
			if (this._isTransitioning || this._element.classList.contains("show")) return;
			let e, i;
			this._parent && (e = t.find(".show, .collapsing", this._parent).filter(t => "string" == typeof this._config.parent ? t.getAttribute("data-bs-parent") === this._config.parent : t.classList.contains("collapse")), 0 === e.length && (e = null));
			const n = t.findOne(this._selector);
			if (e) {
				const t = e.find(t => n !== t);
				if (i = t ? w.get(t, "bs.collapse") : null, i && i._isTransitioning) return
			}
			if (H.trigger(this._element, "show.bs.collapse").defaultPrevented) return;
			e && e.forEach(t => {
				n !== t && J.collapseInterface(t, "hide"), i || w.set(t, "bs.collapse", null)
			});
			const s = this._getDimension();
			this._element.classList.remove("collapse"), this._element.classList.add("collapsing"), this._element.style[s] = 0, this._triggerArray.length && this._triggerArray.forEach(t => {
				t.classList.remove("collapsed"), t.setAttribute("aria-expanded", !0)
			}), this.setTransitioning(!0);
			const o = "scroll" + (s[0].toUpperCase() + s.slice(1));
			this._queueCallback(() => {
				this._element.classList.remove("collapsing"), this._element.classList.add("collapse", "show"), this._element.style[s] = "", this.setTransitioning(!1), H.trigger(this._element, "shown.bs.collapse")
			}, this._element, !0), this._element.style[s] = this._element[o] + "px"
		}
		hide() {
			if (this._isTransitioning || !this._element.classList.contains("show")) return;
			if (H.trigger(this._element, "hide.bs.collapse").defaultPrevented) return;
			const t = this._getDimension();
			this._element.style[t] = this._element.getBoundingClientRect()[t] + "px", m(this._element), this._element.classList.add("collapsing"), this._element.classList.remove("collapse", "show");
			const e = this._triggerArray.length;
			if (e > 0)
				for (let t = 0; t < e; t++) {
					const e = this._triggerArray[t],
						i = s(e);
					i && !i.classList.contains("show") && (e.classList.add("collapsed"), e.setAttribute("aria-expanded", !1))
				}
			this.setTransitioning(!0), this._element.style[t] = "", this._queueCallback(() => {
				this.setTransitioning(!1), this._element.classList.remove("collapsing"), this._element.classList.add("collapse"), H.trigger(this._element, "hidden.bs.collapse")
			}, this._element, !0)
		}
		setTransitioning(t) {
			this._isTransitioning = t
		}
		_getConfig(t) {
			return (t = { ...G,
				...t
			}).toggle = Boolean(t.toggle), d("collapse", t, Z), t
		}
		_getDimension() {
			return this._element.classList.contains("width") ? "width" : "height"
		}
		_getParent() {
			let {
				parent: e
			} = this._config;
			e = l(e);
			const i = `[data-bs-toggle="collapse"][data-bs-parent="${e}"]`;
			return t.find(i, e).forEach(t => {
				const e = s(t);
				this._addAriaAndCollapsedClass(e, [t])
			}), e
		}
		_addAriaAndCollapsedClass(t, e) {
			if (!t || !e.length) return;
			const i = t.classList.contains("show");
			e.forEach(t => {
				i ? t.classList.remove("collapsed") : t.classList.add("collapsed"), t.setAttribute("aria-expanded", i)
			})
		}
		static collapseInterface(t, e) {
			let i = w.get(t, "bs.collapse");
			const n = { ...G,
				...U.getDataAttributes(t),
				..."object" == typeof e && e ? e : {}
			};
			if (!i && n.toggle && "string" == typeof e && /show|hide/.test(e) && (n.toggle = !1), i || (i = new J(t, n)), "string" == typeof e) {
				if (void 0 === i[e]) throw new TypeError(`No method named "${e}"`);
				i[e]()
			}
		}
		static jQueryInterface(t) {
			return this.each((function () {
				J.collapseInterface(this, t)
			}))
		}
	}
	H.on(document, "click.bs.collapse.data-api", '[data-bs-toggle="collapse"]', (function (e) {
		("A" === e.target.tagName || e.delegateTarget && "A" === e.delegateTarget.tagName) && e.preventDefault();
		const i = U.getDataAttributes(this),
			s = n(this);
		t.find(s).forEach(t => {
			const e = w.get(t, "bs.collapse");
			let n;
			e ? (null === e._parent && "string" == typeof i.parent && (e._config.parent = i.parent, e._parent = e._getParent()), n = "toggle") : n = i, J.collapseInterface(t, n)
		})
	})), b(J);
	var tt = "top",
		et = "bottom",
		it = "right",
		nt = "left",
		st = [tt, et, it, nt],
		ot = st.reduce((function (t, e) {
			return t.concat([e + "-start", e + "-end"])
		}), []),
		rt = [].concat(st, ["auto"]).reduce((function (t, e) {
			return t.concat([e, e + "-start", e + "-end"])
		}), []),
		at = ["beforeRead", "read", "afterRead", "beforeMain", "main", "afterMain", "beforeWrite", "write", "afterWrite"];

	function lt(t) {
		return t ? (t.nodeName || "").toLowerCase() : null
	}

	function ct(t) {
		if (null == t) return window;
		if ("[object Window]" !== t.toString()) {
			var e = t.ownerDocument;
			return e && e.defaultView || window
		}
		return t
	}

	function dt(t) {
		return t instanceof ct(t).Element || t instanceof Element
	}

	function ht(t) {
		return t instanceof ct(t).HTMLElement || t instanceof HTMLElement
	}

	function ut(t) {
		return "undefined" != typeof ShadowRoot && (t instanceof ct(t).ShadowRoot || t instanceof ShadowRoot)
	}
	var ft = {
		name: "applyStyles",
		enabled: !0,
		phase: "write",
		fn: function (t) {
			var e = t.state;
			Object.keys(e.elements).forEach((function (t) {
				var i = e.styles[t] || {},
					n = e.attributes[t] || {},
					s = e.elements[t];
				ht(s) && lt(s) && (Object.assign(s.style, i), Object.keys(n).forEach((function (t) {
					var e = n[t];
					!1 === e ? s.removeAttribute(t) : s.setAttribute(t, !0 === e ? "" : e)
				})))
			}))
		},
		effect: function (t) {
			var e = t.state,
				i = {
					popper: {
						position: e.options.strategy,
						left: "0",
						top: "0",
						margin: "0"
					},
					arrow: {
						position: "absolute"
					},
					reference: {}
				};
			return Object.assign(e.elements.popper.style, i.popper), e.styles = i, e.elements.arrow && Object.assign(e.elements.arrow.style, i.arrow),
				function () {
					Object.keys(e.elements).forEach((function (t) {
						var n = e.elements[t],
							s = e.attributes[t] || {},
							o = Object.keys(e.styles.hasOwnProperty(t) ? e.styles[t] : i[t]).reduce((function (t, e) {
								return t[e] = "", t
							}), {});
						ht(n) && lt(n) && (Object.assign(n.style, o), Object.keys(s).forEach((function (t) {
							n.removeAttribute(t)
						})))
					}))
				}
		},
		requires: ["computeStyles"]
	};

	function pt(t) {
		return t.split("-")[0]
	}

	function mt(t) {
		var e = t.getBoundingClientRect();
		return {
			width: e.width,
			height: e.height,
			top: e.top,
			right: e.right,
			bottom: e.bottom,
			left: e.left,
			x: e.left,
			y: e.top
		}
	}

	function gt(t) {
		var e = mt(t),
			i = t.offsetWidth,
			n = t.offsetHeight;
		return Math.abs(e.width - i) <= 1 && (i = e.width), Math.abs(e.height - n) <= 1 && (n = e.height), {
			x: t.offsetLeft,
			y: t.offsetTop,
			width: i,
			height: n
		}
	}

	function _t(t, e) {
		var i = e.getRootNode && e.getRootNode();
		if (t.contains(e)) return !0;
		if (i && ut(i)) {
			var n = e;
			do {
				if (n && t.isSameNode(n)) return !0;
				n = n.parentNode || n.host
			} while (n)
		}
		return !1
	}

	function bt(t) {
		return ct(t).getComputedStyle(t)
	}

	function vt(t) {
		return ["table", "td", "th"].indexOf(lt(t)) >= 0
	}

	function yt(t) {
		return ((dt(t) ? t.ownerDocument : t.document) || window.document).documentElement
	}

	function wt(t) {
		return "html" === lt(t) ? t : t.assignedSlot || t.parentNode || (ut(t) ? t.host : null) || yt(t)
	}

	function Et(t) {
		return ht(t) && "fixed" !== bt(t).position ? t.offsetParent : null
	}

	function Tt(t) {
		for (var e = ct(t), i = Et(t); i && vt(i) && "static" === bt(i).position;) i = Et(i);
		return i && ("html" === lt(i) || "body" === lt(i) && "static" === bt(i).position) ? e : i || function (t) {
			var e = -1 !== navigator.userAgent.toLowerCase().indexOf("firefox");
			if (-1 !== navigator.userAgent.indexOf("Trident") && ht(t) && "fixed" === bt(t).position) return null;
			for (var i = wt(t); ht(i) && ["html", "body"].indexOf(lt(i)) < 0;) {
				var n = bt(i);
				if ("none" !== n.transform || "none" !== n.perspective || "paint" === n.contain || -1 !== ["transform", "perspective"].indexOf(n.willChange) || e && "filter" === n.willChange || e && n.filter && "none" !== n.filter) return i;
				i = i.parentNode
			}
			return null
		}(t) || e
	}

	function At(t) {
		return ["top", "bottom"].indexOf(t) >= 0 ? "x" : "y"
	}
	var Lt = Math.max,
		Ot = Math.min,
		kt = Math.round;

	function Ct(t, e, i) {
		return Lt(t, Ot(e, i))
	}

	function xt(t) {
		return Object.assign({}, {
			top: 0,
			right: 0,
			bottom: 0,
			left: 0
		}, t)
	}

	function Dt(t, e) {
		return e.reduce((function (e, i) {
			return e[i] = t, e
		}), {})
	}
	var Nt = {
			name: "arrow",
			enabled: !0,
			phase: "main",
			fn: function (t) {
				var e, i = t.state,
					n = t.name,
					s = t.options,
					o = i.elements.arrow,
					r = i.modifiersData.popperOffsets,
					a = pt(i.placement),
					l = At(a),
					c = [nt, it].indexOf(a) >= 0 ? "height" : "width";
				if (o && r) {
					var d = function (t, e) {
							return xt("number" != typeof (t = "function" == typeof t ? t(Object.assign({}, e.rects, {
								placement: e.placement
							})) : t) ? t : Dt(t, st))
						}(s.padding, i),
						h = gt(o),
						u = "y" === l ? tt : nt,
						f = "y" === l ? et : it,
						p = i.rects.reference[c] + i.rects.reference[l] - r[l] - i.rects.popper[c],
						m = r[l] - i.rects.reference[l],
						g = Tt(o),
						_ = g ? "y" === l ? g.clientHeight || 0 : g.clientWidth || 0 : 0,
						b = p / 2 - m / 2,
						v = d[u],
						y = _ - h[c] - d[f],
						w = _ / 2 - h[c] / 2 + b,
						E = Ct(v, w, y),
						T = l;
					i.modifiersData[n] = ((e = {})[T] = E, e.centerOffset = E - w, e)
				}
			},
			effect: function (t) {
				var e = t.state,
					i = t.options.element,
					n = void 0 === i ? "[data-popper-arrow]" : i;
				null != n && ("string" != typeof n || (n = e.elements.popper.querySelector(n))) && _t(e.elements.popper, n) && (e.elements.arrow = n)
			},
			requires: ["popperOffsets"],
			requiresIfExists: ["preventOverflow"]
		},
		St = {
			top: "auto",
			right: "auto",
			bottom: "auto",
			left: "auto"
		};

	function It(t) {
		var e, i = t.popper,
			n = t.popperRect,
			s = t.placement,
			o = t.offsets,
			r = t.position,
			a = t.gpuAcceleration,
			l = t.adaptive,
			c = t.roundOffsets,
			d = !0 === c ? function (t) {
				var e = t.x,
					i = t.y,
					n = window.devicePixelRatio || 1;
				return {
					x: kt(kt(e * n) / n) || 0,
					y: kt(kt(i * n) / n) || 0
				}
			}(o) : "function" == typeof c ? c(o) : o,
			h = d.x,
			u = void 0 === h ? 0 : h,
			f = d.y,
			p = void 0 === f ? 0 : f,
			m = o.hasOwnProperty("x"),
			g = o.hasOwnProperty("y"),
			_ = nt,
			b = tt,
			v = window;
		if (l) {
			var y = Tt(i),
				w = "clientHeight",
				E = "clientWidth";
			y === ct(i) && "static" !== bt(y = yt(i)).position && (w = "scrollHeight", E = "scrollWidth"), y = y, s === tt && (b = et, p -= y[w] - n.height, p *= a ? 1 : -1), s === nt && (_ = it, u -= y[E] - n.width, u *= a ? 1 : -1)
		}
		var T, A = Object.assign({
			position: r
		}, l && St);
		return a ? Object.assign({}, A, ((T = {})[b] = g ? "0" : "", T[_] = m ? "0" : "", T.transform = (v.devicePixelRatio || 1) < 2 ? "translate(" + u + "px, " + p + "px)" : "translate3d(" + u + "px, " + p + "px, 0)", T)) : Object.assign({}, A, ((e = {})[b] = g ? p + "px" : "", e[_] = m ? u + "px" : "", e.transform = "", e))
	}
	var jt = {
			name: "computeStyles",
			enabled: !0,
			phase: "beforeWrite",
			fn: function (t) {
				var e = t.state,
					i = t.options,
					n = i.gpuAcceleration,
					s = void 0 === n || n,
					o = i.adaptive,
					r = void 0 === o || o,
					a = i.roundOffsets,
					l = void 0 === a || a,
					c = {
						placement: pt(e.placement),
						popper: e.elements.popper,
						popperRect: e.rects.popper,
						gpuAcceleration: s
					};
				null != e.modifiersData.popperOffsets && (e.styles.popper = Object.assign({}, e.styles.popper, It(Object.assign({}, c, {
					offsets: e.modifiersData.popperOffsets,
					position: e.options.strategy,
					adaptive: r,
					roundOffsets: l
				})))), null != e.modifiersData.arrow && (e.styles.arrow = Object.assign({}, e.styles.arrow, It(Object.assign({}, c, {
					offsets: e.modifiersData.arrow,
					position: "absolute",
					adaptive: !1,
					roundOffsets: l
				})))), e.attributes.popper = Object.assign({}, e.attributes.popper, {
					"data-popper-placement": e.placement
				})
			},
			data: {}
		},
		Pt = {
			passive: !0
		},
		Mt = {
			name: "eventListeners",
			enabled: !0,
			phase: "write",
			fn: function () {},
			effect: function (t) {
				var e = t.state,
					i = t.instance,
					n = t.options,
					s = n.scroll,
					o = void 0 === s || s,
					r = n.resize,
					a = void 0 === r || r,
					l = ct(e.elements.popper),
					c = [].concat(e.scrollParents.reference, e.scrollParents.popper);
				return o && c.forEach((function (t) {
						t.addEventListener("scroll", i.update, Pt)
					})), a && l.addEventListener("resize", i.update, Pt),
					function () {
						o && c.forEach((function (t) {
							t.removeEventListener("scroll", i.update, Pt)
						})), a && l.removeEventListener("resize", i.update, Pt)
					}
			},
			data: {}
		},
		Ht = {
			left: "right",
			right: "left",
			bottom: "top",
			top: "bottom"
		};

	function Rt(t) {
		return t.replace(/left|right|bottom|top/g, (function (t) {
			return Ht[t]
		}))
	}
	var Bt = {
		start: "end",
		end: "start"
	};

	function Wt(t) {
		return t.replace(/start|end/g, (function (t) {
			return Bt[t]
		}))
	}

	function qt(t) {
		var e = ct(t);
		return {
			scrollLeft: e.pageXOffset,
			scrollTop: e.pageYOffset
		}
	}

	function zt(t) {
		return mt(yt(t)).left + qt(t).scrollLeft
	}

	function Ut(t) {
		var e = bt(t),
			i = e.overflow,
			n = e.overflowX,
			s = e.overflowY;
		return /auto|scroll|overlay|hidden/.test(i + s + n)
	}

	function $t(t, e) {
		var i;
		void 0 === e && (e = []);
		var n = function t(e) {
				return ["html", "body", "#document"].indexOf(lt(e)) >= 0 ? e.ownerDocument.body : ht(e) && Ut(e) ? e : t(wt(e))
			}(t),
			s = n === (null == (i = t.ownerDocument) ? void 0 : i.body),
			o = ct(n),
			r = s ? [o].concat(o.visualViewport || [], Ut(n) ? n : []) : n,
			a = e.concat(r);
		return s ? a : a.concat($t(wt(r)))
	}

	function Ft(t) {
		return Object.assign({}, t, {
			left: t.x,
			top: t.y,
			right: t.x + t.width,
			bottom: t.y + t.height
		})
	}

	function Vt(t, e) {
		return "viewport" === e ? Ft(function (t) {
			var e = ct(t),
				i = yt(t),
				n = e.visualViewport,
				s = i.clientWidth,
				o = i.clientHeight,
				r = 0,
				a = 0;
			return n && (s = n.width, o = n.height, /^((?!chrome|android).)*safari/i.test(navigator.userAgent) || (r = n.offsetLeft, a = n.offsetTop)), {
				width: s,
				height: o,
				x: r + zt(t),
				y: a
			}
		}(t)) : ht(e) ? function (t) {
			var e = mt(t);
			return e.top = e.top + t.clientTop, e.left = e.left + t.clientLeft, e.bottom = e.top + t.clientHeight, e.right = e.left + t.clientWidth, e.width = t.clientWidth, e.height = t.clientHeight, e.x = e.left, e.y = e.top, e
		}(e) : Ft(function (t) {
			var e, i = yt(t),
				n = qt(t),
				s = null == (e = t.ownerDocument) ? void 0 : e.body,
				o = Lt(i.scrollWidth, i.clientWidth, s ? s.scrollWidth : 0, s ? s.clientWidth : 0),
				r = Lt(i.scrollHeight, i.clientHeight, s ? s.scrollHeight : 0, s ? s.clientHeight : 0),
				a = -n.scrollLeft + zt(t),
				l = -n.scrollTop;
			return "rtl" === bt(s || i).direction && (a += Lt(i.clientWidth, s ? s.clientWidth : 0) - o), {
				width: o,
				height: r,
				x: a,
				y: l
			}
		}(yt(t)))
	}

	function Kt(t) {
		return t.split("-")[1]
	}

	function Xt(t) {
		var e, i = t.reference,
			n = t.element,
			s = t.placement,
			o = s ? pt(s) : null,
			r = s ? Kt(s) : null,
			a = i.x + i.width / 2 - n.width / 2,
			l = i.y + i.height / 2 - n.height / 2;
		switch (o) {
			case tt:
				e = {
					x: a,
					y: i.y - n.height
				};
				break;
			case et:
				e = {
					x: a,
					y: i.y + i.height
				};
				break;
			case it:
				e = {
					x: i.x + i.width,
					y: l
				};
				break;
			case nt:
				e = {
					x: i.x - n.width,
					y: l
				};
				break;
			default:
				e = {
					x: i.x,
					y: i.y
				}
		}
		var c = o ? At(o) : null;
		if (null != c) {
			var d = "y" === c ? "height" : "width";
			switch (r) {
				case "start":
					e[c] = e[c] - (i[d] / 2 - n[d] / 2);
					break;
				case "end":
					e[c] = e[c] + (i[d] / 2 - n[d] / 2)
			}
		}
		return e
	}

	function Yt(t, e) {
		void 0 === e && (e = {});
		var i = e,
			n = i.placement,
			s = void 0 === n ? t.placement : n,
			o = i.boundary,
			r = void 0 === o ? "clippingParents" : o,
			a = i.rootBoundary,
			l = void 0 === a ? "viewport" : a,
			c = i.elementContext,
			d = void 0 === c ? "popper" : c,
			h = i.altBoundary,
			u = void 0 !== h && h,
			f = i.padding,
			p = void 0 === f ? 0 : f,
			m = xt("number" != typeof p ? p : Dt(p, st)),
			g = "popper" === d ? "reference" : "popper",
			_ = t.elements.reference,
			b = t.rects.popper,
			v = t.elements[u ? g : d],
			y = function (t, e, i) {
				var n = "clippingParents" === e ? function (t) {
						var e = $t(wt(t)),
							i = ["absolute", "fixed"].indexOf(bt(t).position) >= 0 && ht(t) ? Tt(t) : t;
						return dt(i) ? e.filter((function (t) {
							return dt(t) && _t(t, i) && "body" !== lt(t)
						})) : []
					}(t) : [].concat(e),
					s = [].concat(n, [i]),
					o = s[0],
					r = s.reduce((function (e, i) {
						var n = Vt(t, i);
						return e.top = Lt(n.top, e.top), e.right = Ot(n.right, e.right), e.bottom = Ot(n.bottom, e.bottom), e.left = Lt(n.left, e.left), e
					}), Vt(t, o));
				return r.width = r.right - r.left, r.height = r.bottom - r.top, r.x = r.left, r.y = r.top, r
			}(dt(v) ? v : v.contextElement || yt(t.elements.popper), r, l),
			w = mt(_),
			E = Xt({
				reference: w,
				element: b,
				strategy: "absolute",
				placement: s
			}),
			T = Ft(Object.assign({}, b, E)),
			A = "popper" === d ? T : w,
			L = {
				top: y.top - A.top + m.top,
				bottom: A.bottom - y.bottom + m.bottom,
				left: y.left - A.left + m.left,
				right: A.right - y.right + m.right
			},
			O = t.modifiersData.offset;
		if ("popper" === d && O) {
			var k = O[s];
			Object.keys(L).forEach((function (t) {
				var e = [it, et].indexOf(t) >= 0 ? 1 : -1,
					i = [tt, et].indexOf(t) >= 0 ? "y" : "x";
				L[t] += k[i] * e
			}))
		}
		return L
	}

	function Qt(t, e) {
		void 0 === e && (e = {});
		var i = e,
			n = i.placement,
			s = i.boundary,
			o = i.rootBoundary,
			r = i.padding,
			a = i.flipVariations,
			l = i.allowedAutoPlacements,
			c = void 0 === l ? rt : l,
			d = Kt(n),
			h = d ? a ? ot : ot.filter((function (t) {
				return Kt(t) === d
			})) : st,
			u = h.filter((function (t) {
				return c.indexOf(t) >= 0
			}));
		0 === u.length && (u = h);
		var f = u.reduce((function (e, i) {
			return e[i] = Yt(t, {
				placement: i,
				boundary: s,
				rootBoundary: o,
				padding: r
			})[pt(i)], e
		}), {});
		return Object.keys(f).sort((function (t, e) {
			return f[t] - f[e]
		}))
	}
	var Gt = {
		name: "flip",
		enabled: !0,
		phase: "main",
		fn: function (t) {
			var e = t.state,
				i = t.options,
				n = t.name;
			if (!e.modifiersData[n]._skip) {
				for (var s = i.mainAxis, o = void 0 === s || s, r = i.altAxis, a = void 0 === r || r, l = i.fallbackPlacements, c = i.padding, d = i.boundary, h = i.rootBoundary, u = i.altBoundary, f = i.flipVariations, p = void 0 === f || f, m = i.allowedAutoPlacements, g = e.options.placement, _ = pt(g), b = l || (_ !== g && p ? function (t) {
						if ("auto" === pt(t)) return [];
						var e = Rt(t);
						return [Wt(t), e, Wt(e)]
					}(g) : [Rt(g)]), v = [g].concat(b).reduce((function (t, i) {
						return t.concat("auto" === pt(i) ? Qt(e, {
							placement: i,
							boundary: d,
							rootBoundary: h,
							padding: c,
							flipVariations: p,
							allowedAutoPlacements: m
						}) : i)
					}), []), y = e.rects.reference, w = e.rects.popper, E = new Map, T = !0, A = v[0], L = 0; L < v.length; L++) {
					var O = v[L],
						k = pt(O),
						C = "start" === Kt(O),
						x = [tt, et].indexOf(k) >= 0,
						D = x ? "width" : "height",
						N = Yt(e, {
							placement: O,
							boundary: d,
							rootBoundary: h,
							altBoundary: u,
							padding: c
						}),
						S = x ? C ? it : nt : C ? et : tt;
					y[D] > w[D] && (S = Rt(S));
					var I = Rt(S),
						j = [];
					if (o && j.push(N[k] <= 0), a && j.push(N[S] <= 0, N[I] <= 0), j.every((function (t) {
							return t
						}))) {
						A = O, T = !1;
						break
					}
					E.set(O, j)
				}
				if (T)
					for (var P = function (t) {
							var e = v.find((function (e) {
								var i = E.get(e);
								if (i) return i.slice(0, t).every((function (t) {
									return t
								}))
							}));
							if (e) return A = e, "break"
						}, M = p ? 3 : 1; M > 0 && "break" !== P(M); M--);
				e.placement !== A && (e.modifiersData[n]._skip = !0, e.placement = A, e.reset = !0)
			}
		},
		requiresIfExists: ["offset"],
		data: {
			_skip: !1
		}
	};

	function Zt(t, e, i) {
		return void 0 === i && (i = {
			x: 0,
			y: 0
		}), {
			top: t.top - e.height - i.y,
			right: t.right - e.width + i.x,
			bottom: t.bottom - e.height + i.y,
			left: t.left - e.width - i.x
		}
	}

	function Jt(t) {
		return [tt, it, et, nt].some((function (e) {
			return t[e] >= 0
		}))
	}
	var te = {
			name: "hide",
			enabled: !0,
			phase: "main",
			requiresIfExists: ["preventOverflow"],
			fn: function (t) {
				var e = t.state,
					i = t.name,
					n = e.rects.reference,
					s = e.rects.popper,
					o = e.modifiersData.preventOverflow,
					r = Yt(e, {
						elementContext: "reference"
					}),
					a = Yt(e, {
						altBoundary: !0
					}),
					l = Zt(r, n),
					c = Zt(a, s, o),
					d = Jt(l),
					h = Jt(c);
				e.modifiersData[i] = {
					referenceClippingOffsets: l,
					popperEscapeOffsets: c,
					isReferenceHidden: d,
					hasPopperEscaped: h
				}, e.attributes.popper = Object.assign({}, e.attributes.popper, {
					"data-popper-reference-hidden": d,
					"data-popper-escaped": h
				})
			}
		},
		ee = {
			name: "offset",
			enabled: !0,
			phase: "main",
			requires: ["popperOffsets"],
			fn: function (t) {
				var e = t.state,
					i = t.options,
					n = t.name,
					s = i.offset,
					o = void 0 === s ? [0, 0] : s,
					r = rt.reduce((function (t, i) {
						return t[i] = function (t, e, i) {
							var n = pt(t),
								s = [nt, tt].indexOf(n) >= 0 ? -1 : 1,
								o = "function" == typeof i ? i(Object.assign({}, e, {
									placement: t
								})) : i,
								r = o[0],
								a = o[1];
							return r = r || 0, a = (a || 0) * s, [nt, it].indexOf(n) >= 0 ? {
								x: a,
								y: r
							} : {
								x: r,
								y: a
							}
						}(i, e.rects, o), t
					}), {}),
					a = r[e.placement],
					l = a.x,
					c = a.y;
				null != e.modifiersData.popperOffsets && (e.modifiersData.popperOffsets.x += l, e.modifiersData.popperOffsets.y += c), e.modifiersData[n] = r
			}
		},
		ie = {
			name: "popperOffsets",
			enabled: !0,
			phase: "read",
			fn: function (t) {
				var e = t.state,
					i = t.name;
				e.modifiersData[i] = Xt({
					reference: e.rects.reference,
					element: e.rects.popper,
					strategy: "absolute",
					placement: e.placement
				})
			},
			data: {}
		},
		ne = {
			name: "preventOverflow",
			enabled: !0,
			phase: "main",
			fn: function (t) {
				var e = t.state,
					i = t.options,
					n = t.name,
					s = i.mainAxis,
					o = void 0 === s || s,
					r = i.altAxis,
					a = void 0 !== r && r,
					l = i.boundary,
					c = i.rootBoundary,
					d = i.altBoundary,
					h = i.padding,
					u = i.tether,
					f = void 0 === u || u,
					p = i.tetherOffset,
					m = void 0 === p ? 0 : p,
					g = Yt(e, {
						boundary: l,
						rootBoundary: c,
						padding: h,
						altBoundary: d
					}),
					_ = pt(e.placement),
					b = Kt(e.placement),
					v = !b,
					y = At(_),
					w = "x" === y ? "y" : "x",
					E = e.modifiersData.popperOffsets,
					T = e.rects.reference,
					A = e.rects.popper,
					L = "function" == typeof m ? m(Object.assign({}, e.rects, {
						placement: e.placement
					})) : m,
					O = {
						x: 0,
						y: 0
					};
				if (E) {
					if (o || a) {
						var k = "y" === y ? tt : nt,
							C = "y" === y ? et : it,
							x = "y" === y ? "height" : "width",
							D = E[y],
							N = E[y] + g[k],
							S = E[y] - g[C],
							I = f ? -A[x] / 2 : 0,
							j = "start" === b ? T[x] : A[x],
							P = "start" === b ? -A[x] : -T[x],
							M = e.elements.arrow,
							H = f && M ? gt(M) : {
								width: 0,
								height: 0
							},
							R = e.modifiersData["arrow#persistent"] ? e.modifiersData["arrow#persistent"].padding : {
								top: 0,
								right: 0,
								bottom: 0,
								left: 0
							},
							B = R[k],
							W = R[C],
							q = Ct(0, T[x], H[x]),
							z = v ? T[x] / 2 - I - q - B - L : j - q - B - L,
							U = v ? -T[x] / 2 + I + q + W + L : P + q + W + L,
							$ = e.elements.arrow && Tt(e.elements.arrow),
							F = $ ? "y" === y ? $.clientTop || 0 : $.clientLeft || 0 : 0,
							V = e.modifiersData.offset ? e.modifiersData.offset[e.placement][y] : 0,
							K = E[y] + z - V - F,
							X = E[y] + U - V;
						if (o) {
							var Y = Ct(f ? Ot(N, K) : N, D, f ? Lt(S, X) : S);
							E[y] = Y, O[y] = Y - D
						}
						if (a) {
							var Q = "x" === y ? tt : nt,
								G = "x" === y ? et : it,
								Z = E[w],
								J = Z + g[Q],
								st = Z - g[G],
								ot = Ct(f ? Ot(J, K) : J, Z, f ? Lt(st, X) : st);
							E[w] = ot, O[w] = ot - Z
						}
					}
					e.modifiersData[n] = O
				}
			},
			requiresIfExists: ["offset"]
		};

	function se(t, e, i) {
		void 0 === i && (i = !1);
		var n, s, o = yt(e),
			r = mt(t),
			a = ht(e),
			l = {
				scrollLeft: 0,
				scrollTop: 0
			},
			c = {
				x: 0,
				y: 0
			};
		return (a || !a && !i) && (("body" !== lt(e) || Ut(o)) && (l = (n = e) !== ct(n) && ht(n) ? {
			scrollLeft: (s = n).scrollLeft,
			scrollTop: s.scrollTop
		} : qt(n)), ht(e) ? ((c = mt(e)).x += e.clientLeft, c.y += e.clientTop) : o && (c.x = zt(o))), {
			x: r.left + l.scrollLeft - c.x,
			y: r.top + l.scrollTop - c.y,
			width: r.width,
			height: r.height
		}
	}
	var oe = {
		placement: "bottom",
		modifiers: [],
		strategy: "absolute"
	};

	function re() {
		for (var t = arguments.length, e = new Array(t), i = 0; i < t; i++) e[i] = arguments[i];
		return !e.some((function (t) {
			return !(t && "function" == typeof t.getBoundingClientRect)
		}))
	}

	function ae(t) {
		void 0 === t && (t = {});
		var e = t,
			i = e.defaultModifiers,
			n = void 0 === i ? [] : i,
			s = e.defaultOptions,
			o = void 0 === s ? oe : s;
		return function (t, e, i) {
			void 0 === i && (i = o);
			var s, r, a = {
					placement: "bottom",
					orderedModifiers: [],
					options: Object.assign({}, oe, o),
					modifiersData: {},
					elements: {
						reference: t,
						popper: e
					},
					attributes: {},
					styles: {}
				},
				l = [],
				c = !1,
				d = {
					state: a,
					setOptions: function (i) {
						h(), a.options = Object.assign({}, o, a.options, i), a.scrollParents = {
							reference: dt(t) ? $t(t) : t.contextElement ? $t(t.contextElement) : [],
							popper: $t(e)
						};
						var s, r, c = function (t) {
							var e = function (t) {
								var e = new Map,
									i = new Set,
									n = [];
								return t.forEach((function (t) {
									e.set(t.name, t)
								})), t.forEach((function (t) {
									i.has(t.name) || function t(s) {
										i.add(s.name), [].concat(s.requires || [], s.requiresIfExists || []).forEach((function (n) {
											if (!i.has(n)) {
												var s = e.get(n);
												s && t(s)
											}
										})), n.push(s)
									}(t)
								})), n
							}(t);
							return at.reduce((function (t, i) {
								return t.concat(e.filter((function (t) {
									return t.phase === i
								})))
							}), [])
						}((s = [].concat(n, a.options.modifiers), r = s.reduce((function (t, e) {
							var i = t[e.name];
							return t[e.name] = i ? Object.assign({}, i, e, {
								options: Object.assign({}, i.options, e.options),
								data: Object.assign({}, i.data, e.data)
							}) : e, t
						}), {}), Object.keys(r).map((function (t) {
							return r[t]
						}))));
						return a.orderedModifiers = c.filter((function (t) {
							return t.enabled
						})), a.orderedModifiers.forEach((function (t) {
							var e = t.name,
								i = t.options,
								n = void 0 === i ? {} : i,
								s = t.effect;
							if ("function" == typeof s) {
								var o = s({
									state: a,
									name: e,
									instance: d,
									options: n
								});
								l.push(o || function () {})
							}
						})), d.update()
					},
					forceUpdate: function () {
						if (!c) {
							var t = a.elements,
								e = t.reference,
								i = t.popper;
							if (re(e, i)) {
								a.rects = {
									reference: se(e, Tt(i), "fixed" === a.options.strategy),
									popper: gt(i)
								}, a.reset = !1, a.placement = a.options.placement, a.orderedModifiers.forEach((function (t) {
									return a.modifiersData[t.name] = Object.assign({}, t.data)
								}));
								for (var n = 0; n < a.orderedModifiers.length; n++)
									if (!0 !== a.reset) {
										var s = a.orderedModifiers[n],
											o = s.fn,
											r = s.options,
											l = void 0 === r ? {} : r,
											h = s.name;
										"function" == typeof o && (a = o({
											state: a,
											options: l,
											name: h,
											instance: d
										}) || a)
									} else a.reset = !1, n = -1
							}
						}
					},
					update: (s = function () {
						return new Promise((function (t) {
							d.forceUpdate(), t(a)
						}))
					}, function () {
						return r || (r = new Promise((function (t) {
							Promise.resolve().then((function () {
								r = void 0, t(s())
							}))
						}))), r
					}),
					destroy: function () {
						h(), c = !0
					}
				};
			if (!re(t, e)) return d;

			function h() {
				l.forEach((function (t) {
					return t()
				})), l = []
			}
			return d.setOptions(i).then((function (t) {
				!c && i.onFirstUpdate && i.onFirstUpdate(t)
			})), d
		}
	}
	var le = ae(),
		ce = ae({
			defaultModifiers: [Mt, ie, jt, ft]
		}),
		de = ae({
			defaultModifiers: [Mt, ie, jt, ft, ee, Gt, ne, Nt, te]
		}),
		he = Object.freeze({
			__proto__: null,
			popperGenerator: ae,
			detectOverflow: Yt,
			createPopperBase: le,
			createPopper: de,
			createPopperLite: ce,
			top: tt,
			bottom: et,
			right: it,
			left: nt,
			auto: "auto",
			basePlacements: st,
			start: "start",
			end: "end",
			clippingParents: "clippingParents",
			viewport: "viewport",
			popper: "popper",
			reference: "reference",
			variationPlacements: ot,
			placements: rt,
			beforeRead: "beforeRead",
			read: "read",
			afterRead: "afterRead",
			beforeMain: "beforeMain",
			main: "main",
			afterMain: "afterMain",
			beforeWrite: "beforeWrite",
			write: "write",
			afterWrite: "afterWrite",
			modifierPhases: at,
			applyStyles: ft,
			arrow: Nt,
			computeStyles: jt,
			eventListeners: Mt,
			flip: Gt,
			hide: te,
			offset: ee,
			popperOffsets: ie,
			preventOverflow: ne
		});
	const ue = new RegExp("ArrowUp|ArrowDown|Escape"),
		fe = _() ? "top-end" : "top-start",
		pe = _() ? "top-start" : "top-end",
		me = _() ? "bottom-end" : "bottom-start",
		ge = _() ? "bottom-start" : "bottom-end",
		_e = _() ? "left-start" : "right-start",
		be = _() ? "right-start" : "left-start",
		ve = {
			offset: [0, 2],
			boundary: "clippingParents",
			reference: "toggle",
			display: "dynamic",
			popperConfig: null,
			autoClose: !0
		},
		ye = {
			offset: "(array|string|function)",
			boundary: "(string|element)",
			reference: "(string|element|object)",
			display: "string",
			popperConfig: "(null|object|function)",
			autoClose: "(boolean|string)"
		};
	class we extends R {
		constructor(t, e) {
			super(t), this._popper = null, this._config = this._getConfig(e), this._menu = this._getMenuElement(), this._inNavbar = this._detectNavbar(), this._addEventListeners()
		}
		static get Default() {
			return ve
		}
		static get DefaultType() {
			return ye
		}
		static get NAME() {
			return "dropdown"
		}
		toggle() {
			u(this._element) || (this._element.classList.contains("show") ? this.hide() : this.show())
		}
		show() {
			if (u(this._element) || this._menu.classList.contains("show")) return;
			const t = we.getParentFromElement(this._element),
				e = {
					relatedTarget: this._element
				};
			if (!H.trigger(this._element, "show.bs.dropdown", e).defaultPrevented) {
				if (this._inNavbar) U.setDataAttribute(this._menu, "popper", "none");
				else {
					if (void 0 === he) throw new TypeError("Bootstrap's dropdowns require Popper (https://popper.js.org)");
					let e = this._element;
					"parent" === this._config.reference ? e = t : a(this._config.reference) ? e = l(this._config.reference) : "object" == typeof this._config.reference && (e = this._config.reference);
					const i = this._getPopperConfig(),
						n = i.modifiers.find(t => "applyStyles" === t.name && !1 === t.enabled);
					this._popper = de(e, this._menu, i), n && U.setDataAttribute(this._menu, "popper", "static")
				}
				"ontouchstart" in document.documentElement && !t.closest(".navbar-nav") && [].concat(...document.body.children).forEach(t => H.on(t, "mouseover", p)), this._element.focus(), this._element.setAttribute("aria-expanded", !0), this._menu.classList.toggle("show"), this._element.classList.toggle("show"), H.trigger(this._element, "shown.bs.dropdown", e)
			}
		}
		hide() {
			if (u(this._element) || !this._menu.classList.contains("show")) return;
			const t = {
				relatedTarget: this._element
			};
			this._completeHide(t)
		}
		dispose() {
			this._popper && this._popper.destroy(), super.dispose()
		}
		update() {
			this._inNavbar = this._detectNavbar(), this._popper && this._popper.update()
		}
		_addEventListeners() {
			H.on(this._element, "click.bs.dropdown", t => {
				t.preventDefault(), this.toggle()
			})
		}
		_completeHide(t) {
			H.trigger(this._element, "hide.bs.dropdown", t).defaultPrevented || ("ontouchstart" in document.documentElement && [].concat(...document.body.children).forEach(t => H.off(t, "mouseover", p)), this._popper && this._popper.destroy(), this._menu.classList.remove("show"), this._element.classList.remove("show"), this._element.setAttribute("aria-expanded", "false"), U.removeDataAttribute(this._menu, "popper"), H.trigger(this._element, "hidden.bs.dropdown", t))
		}
		_getConfig(t) {
			if (t = { ...this.constructor.Default,
					...U.getDataAttributes(this._element),
					...t
				}, d("dropdown", t, this.constructor.DefaultType), "object" == typeof t.reference && !a(t.reference) && "function" != typeof t.reference.getBoundingClientRect) throw new TypeError("dropdown".toUpperCase() + ': Option "reference" provided type "object" without a required "getBoundingClientRect" method.');
			return t
		}
		_getMenuElement() {
			return t.next(this._element, ".dropdown-menu")[0]
		}
		_getPlacement() {
			const t = this._element.parentNode;
			if (t.classList.contains("dropend")) return _e;
			if (t.classList.contains("dropstart")) return be;
			const e = "end" === getComputedStyle(this._menu).getPropertyValue("--bs-position").trim();
			return t.classList.contains("dropup") ? e ? pe : fe : e ? ge : me
		}
		_detectNavbar() {
			return null !== this._element.closest(".navbar")
		}
		_getOffset() {
			const {
				offset: t
			} = this._config;
			return "string" == typeof t ? t.split(",").map(t => Number.parseInt(t, 10)) : "function" == typeof t ? e => t(e, this._element) : t
		}
		_getPopperConfig() {
			const t = {
				placement: this._getPlacement(),
				modifiers: [{
					name: "preventOverflow",
					options: {
						boundary: this._config.boundary
					}
				}, {
					name: "offset",
					options: {
						offset: this._getOffset()
					}
				}]
			};
			return "static" === this._config.display && (t.modifiers = [{
				name: "applyStyles",
				enabled: !1
			}]), { ...t,
				..."function" == typeof this._config.popperConfig ? this._config.popperConfig(t) : this._config.popperConfig
			}
		}
		_selectMenuItem(e) {
			const i = t.find(".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)", this._menu).filter(h);
			if (!i.length) return;
			let n = i.indexOf(e.target);
			"ArrowUp" === e.key && n > 0 && n--, "ArrowDown" === e.key && n < i.length - 1 && n++, n = -1 === n ? 0 : n, i[n].focus()
		}
		static dropdownInterface(t, e) {
			let i = w.get(t, "bs.dropdown");
			if (i || (i = new we(t, "object" == typeof e ? e : null)), "string" == typeof e) {
				if (void 0 === i[e]) throw new TypeError(`No method named "${e}"`);
				i[e]()
			}
		}
		static jQueryInterface(t) {
			return this.each((function () {
				we.dropdownInterface(this, t)
			}))
		}
		static clearMenus(e) {
			if (e && (2 === e.button || "keyup" === e.type && "Tab" !== e.key)) return;
			const i = t.find('[data-bs-toggle="dropdown"]');
			for (let t = 0, n = i.length; t < n; t++) {
				const n = w.get(i[t], "bs.dropdown");
				if (!n || !1 === n._config.autoClose) continue;
				if (!n._element.classList.contains("show")) continue;
				const s = {
					relatedTarget: n._element
				};
				if (e) {
					const t = e.composedPath(),
						i = t.includes(n._menu);
					if (t.includes(n._element) || "inside" === n._config.autoClose && !i || "outside" === n._config.autoClose && i) continue;
					if (n._menu.contains(e.target) && ("keyup" === e.type && "Tab" === e.key || /input|select|option|textarea|form/i.test(e.target.tagName))) continue;
					"click" === e.type && (s.clickEvent = e)
				}
				n._completeHide(s)
			}
		}
		static getParentFromElement(t) {
			return s(t) || t.parentNode
		}
		static dataApiKeydownHandler(e) {
			if (/input|textarea/i.test(e.target.tagName) ? "Space" === e.key || "Escape" !== e.key && ("ArrowDown" !== e.key && "ArrowUp" !== e.key || e.target.closest(".dropdown-menu")) : !ue.test(e.key)) return;
			const i = this.classList.contains("show");
			if (!i && "Escape" === e.key) return;
			if (e.preventDefault(), e.stopPropagation(), u(this)) return;
			const n = () => this.matches('[data-bs-toggle="dropdown"]') ? this : t.prev(this, '[data-bs-toggle="dropdown"]')[0];
			if ("Escape" === e.key) return n().focus(), void we.clearMenus();
			i || "ArrowUp" !== e.key && "ArrowDown" !== e.key ? i && "Space" !== e.key ? we.getInstance(n())._selectMenuItem(e) : we.clearMenus() : n().click()
		}
	}
	H.on(document, "keydown.bs.dropdown.data-api", '[data-bs-toggle="dropdown"]', we.dataApiKeydownHandler), H.on(document, "keydown.bs.dropdown.data-api", ".dropdown-menu", we.dataApiKeydownHandler), H.on(document, "click.bs.dropdown.data-api", we.clearMenus), H.on(document, "keyup.bs.dropdown.data-api", we.clearMenus), H.on(document, "click.bs.dropdown.data-api", '[data-bs-toggle="dropdown"]', (function (t) {
		t.preventDefault(), we.dropdownInterface(this)
	})), b(we);
	const Ee = () => {
			const t = document.documentElement.clientWidth;
			return Math.abs(window.innerWidth - t)
		},
		Te = (t = Ee()) => {
			Ae(), Le("body", "paddingRight", e => e + t), Le(".fixed-top, .fixed-bottom, .is-fixed, .sticky-top", "paddingRight", e => e + t), Le(".sticky-top", "marginRight", e => e - t)
		},
		Ae = () => {
			const t = document.body.style.overflow;
			t && U.setDataAttribute(document.body, "overflow", t), document.body.style.overflow = "hidden"
		},
		Le = (e, i, n) => {
			const s = Ee();
			t.find(e).forEach(t => {
				if (t !== document.body && window.innerWidth > t.clientWidth + s) return;
				const e = t.style[i],
					o = window.getComputedStyle(t)[i];
				U.setDataAttribute(t, i, e), t.style[i] = n(Number.parseFloat(o)) + "px"
			})
		},
		Oe = () => {
			ke("body", "overflow"), ke("body", "paddingRight"), ke(".fixed-top, .fixed-bottom, .is-fixed, .sticky-top", "paddingRight"), ke(".sticky-top", "marginRight")
		},
		ke = (e, i) => {
			t.find(e).forEach(t => {
				const e = U.getDataAttribute(t, i);
				void 0 === e ? t.style.removeProperty(i) : (U.removeDataAttribute(t, i), t.style[i] = e)
			})
		},
		Ce = {
			isVisible: !0,
			isAnimated: !1,
			rootElement: document.body,
			clickCallback: null
		},
		xe = {
			isVisible: "boolean",
			isAnimated: "boolean",
			rootElement: "element",
			clickCallback: "(function|null)"
		};
	class De {
		constructor(t) {
			this._config = this._getConfig(t), this._isAppended = !1, this._element = null
		}
		show(t) {
			this._config.isVisible ? (this._append(), this._config.isAnimated && m(this._getElement()), this._getElement().classList.add("show"), this._emulateAnimation(() => {
				v(t)
			})) : v(t)
		}
		hide(t) {
			this._config.isVisible ? (this._getElement().classList.remove("show"), this._emulateAnimation(() => {
				this.dispose(), v(t)
			})) : v(t)
		}
		_getElement() {
			if (!this._element) {
				const t = document.createElement("div");
				t.className = "modal-backdrop", this._config.isAnimated && t.classList.add("fade"), this._element = t
			}
			return this._element
		}
		_getConfig(t) {
			return (t = { ...Ce,
				..."object" == typeof t ? t : {}
			}).rootElement = t.rootElement || document.body, d("backdrop", t, xe), t
		}
		_append() {
			this._isAppended || (this._config.rootElement.appendChild(this._getElement()), H.on(this._getElement(), "mousedown.bs.backdrop", () => {
				v(this._config.clickCallback)
			}), this._isAppended = !0)
		}
		dispose() {
			this._isAppended && (H.off(this._element, "mousedown.bs.backdrop"), this._getElement().parentNode.removeChild(this._element), this._isAppended = !1)
		}
		_emulateAnimation(t) {
			if (!this._config.isAnimated) return void v(t);
			const e = o(this._getElement());
			H.one(this._getElement(), "transitionend", () => v(t)), c(this._getElement(), e)
		}
	}
	const Ne = {
			backdrop: !0,
			keyboard: !0,
			focus: !0
		},
		Se = {
			backdrop: "(boolean|string)",
			keyboard: "boolean",
			focus: "boolean"
		};
	class Ie extends R {
		constructor(e, i) {
			super(e), this._config = this._getConfig(i), this._dialog = t.findOne(".modal-dialog", this._element), this._backdrop = this._initializeBackDrop(), this._isShown = !1, this._ignoreBackdropClick = !1, this._isTransitioning = !1
		}
		static get Default() {
			return Ne
		}
		static get NAME() {
			return "modal"
		}
		toggle(t) {
			return this._isShown ? this.hide() : this.show(t)
		}		
	
		handleUpdate() {
			this._adjustDialog()
		}
		_initializeBackDrop() {
			return new De({
				isVisible: Boolean(this._config.backdrop),
				isAnimated: this._isAnimated()
			})
		}
		_getConfig(t) {
			return t = { ...Ne,
				...U.getDataAttributes(this._element),
				...t
			}, d("modal", t, Se), t
		}
	
		_isAnimated() {
			return this._element.classList.contains("fade")
		}
	
		_adjustDialog() {
			const t = this._element.scrollHeight > document.documentElement.clientHeight,
				e = Ee(),
				i = e > 0;
			(!i && t && !_() || i && !t && _()) && (this._element.style.paddingLeft = e + "px"), (i && !t && !_() || !i && t && _()) && (this._element.style.paddingRight = e + "px")
		}
		_resetAdjustments() {
			this._element.style.paddingLeft = "", this._element.style.paddingRight = ""
		}
		static jQueryInterface(t, e) {
			return this.each((function () {
				const i = Ie.getInstance(this) || new Ie(this, "object" == typeof t ? t : {});
				if ("string" == typeof t) {
					if (void 0 === i[t]) throw new TypeError(`No method named "${t}"`);
					i[t](e)
				}
			}))
		}
	}
	const je = {
			backdrop: !0,
			keyboard: !0,
			scroll: !1
		},
		Pe = {
			backdrop: "boolean",
			keyboard: "boolean",
			scroll: "boolean"
		};
	class Me extends R {
		constructor(t, e) {
			super(t), this._config = this._getConfig(e), this._isShown = !1, this._backdrop = this._initializeBackDrop(), this._addEventListeners()
		}
		static get NAME() {
			return "offcanvas"
		}
		static get Default() {
			return je
		}
		toggle(t) {
			return this._isShown ? this.hide() : this.show(t)
		}
		show(t) {
			this._isShown || H.trigger(this._element, "show.bs.offcanvas", {
				relatedTarget: t
			}).defaultPrevented || (this._isShown = !0, this._element.style.visibility = "visible", this._backdrop.show(), this._config.scroll || (Te(), this._enforceFocusOnElement(this._element)), this._element.removeAttribute("aria-hidden"), this._element.setAttribute("aria-modal", !0), this._element.setAttribute("role", "dialog"), this._element.classList.add("show"), this._queueCallback(() => {
				H.trigger(this._element, "shown.bs.offcanvas", {
					relatedTarget: t
				})
			}, this._element, !0))
		}
		hide() {
			this._isShown && (H.trigger(this._element, "hide.bs.offcanvas").defaultPrevented || (H.off(document, "focusin.bs.offcanvas"), this._element.blur(), this._isShown = !1, this._element.classList.remove("show"), this._backdrop.hide(), this._queueCallback(() => {
				this._element.setAttribute("aria-hidden", !0), this._element.removeAttribute("aria-modal"), this._element.removeAttribute("role"), this._element.style.visibility = "hidden", this._config.scroll || Oe(), H.trigger(this._element, "hidden.bs.offcanvas")
			}, this._element, !0)))
		}
		dispose() {
			this._backdrop.dispose(), super.dispose(), H.off(document, "focusin.bs.offcanvas")
		}
		_getConfig(t) {
			return t = { ...je,
				...U.getDataAttributes(this._element),
				..."object" == typeof t ? t : {}
			}, d("offcanvas", t, Pe), t
		}
		_initializeBackDrop() {
			return new De({
				isVisible: this._config.backdrop,
				isAnimated: !0,
				rootElement: this._element.parentNode,
				clickCallback: () => this.hide()
			})
		}
		_enforceFocusOnElement(t) {
			H.off(document, "focusin.bs.offcanvas"), H.on(document, "focusin.bs.offcanvas", e => {
				document === e.target || t === e.target || t.contains(e.target) || t.focus()
			}), t.focus()
		}
		_addEventListeners() {
			H.on(this._element, "click.dismiss.bs.offcanvas", '[data-bs-dismiss="offcanvas"]', () => this.hide()), H.on(this._element, "keydown.dismiss.bs.offcanvas", t => {
				this._config.keyboard && "Escape" === t.key && this.hide()
			})
		}
		static jQueryInterface(t) {
			return this.each((function () {
				const e = w.get(this, "bs.offcanvas") || new Me(this, "object" == typeof t ? t : {});
				if ("string" == typeof t) {
					if (void 0 === e[t] || t.startsWith("_") || "constructor" === t) throw new TypeError(`No method named "${t}"`);
					e[t](this)
				}
			}))
		}
	}
	H.on(document, "click.bs.offcanvas.data-api", '[data-bs-toggle="offcanvas"]', (function (e) {
		const i = s(this);
		if (["A", "AREA"].includes(this.tagName) && e.preventDefault(), u(this)) return;
		H.one(i, "hidden.bs.offcanvas", () => {
			h(this) && this.focus()
		});
		const n = t.findOne(".offcanvas.show");
		n && n !== i && Me.getInstance(n).hide(), (w.get(i, "bs.offcanvas") || new Me(i)).toggle(this)
	})), H.on(window, "load.bs.offcanvas.data-api", () => {
		t.find(".offcanvas.show").forEach(t => (w.get(t, "bs.offcanvas") || new Me(t)).show())
	}), b(Me);
	const He = new Set(["background", "cite", "href", "itemtype", "longdesc", "poster", "src", "xlink:href"]),
		Re = /^(?:(?:https?|mailto|ftp|tel|file):|[^#&/:?]*(?:[#/?]|$))/i,
		Be = /^data:(?:image\/(?:bmp|gif|jpeg|jpg|png|tiff|webp)|video\/(?:mpeg|mp4|ogg|webm)|audio\/(?:mp3|oga|ogg|opus));base64,[\d+/a-z]+=*$/i,
		We = (t, e) => {
			const i = t.nodeName.toLowerCase();
			if (e.includes(i)) return !He.has(i) || Boolean(Re.test(t.nodeValue) || Be.test(t.nodeValue));
			const n = e.filter(t => t instanceof RegExp);
			for (let t = 0, e = n.length; t < e; t++)
				if (n[t].test(i)) return !0;
			return !1
		};

	function qe(t, e, i) {
		if (!t.length) return t;
		if (i && "function" == typeof i) return i(t);
		const n = (new window.DOMParser).parseFromString(t, "text/html"),
			s = Object.keys(e),
			o = [].concat(...n.body.querySelectorAll("*"));
		for (let t = 0, i = o.length; t < i; t++) {
			const i = o[t],
				n = i.nodeName.toLowerCase();
			if (!s.includes(n)) {
				i.parentNode.removeChild(i);
				continue
			}
			const r = [].concat(...i.attributes),
				a = [].concat(e["*"] || [], e[n] || []);
			r.forEach(t => {
				We(t, a) || i.removeAttribute(t.nodeName)
			})
		}
		return n.body.innerHTML
	}
	const ze = new RegExp("(^|\\s)bs-tooltip\\S+", "g"),
		Ue = new Set(["sanitize", "allowList", "sanitizeFn"]),
		$e = {
			animation: "boolean",
			template: "string",
			title: "(string|element|function)",
			trigger: "string",
			delay: "(number|object)",
			html: "boolean",
			selector: "(string|boolean)",
			placement: "(string|function)",
			offset: "(array|string|function)",
			container: "(string|element|boolean)",
			fallbackPlacements: "array",
			boundary: "(string|element)",
			customClass: "(string|function)",
			sanitize: "boolean",
			sanitizeFn: "(null|function)",
			allowList: "object",
			popperConfig: "(null|object|function)"
		},
		Fe = {
			AUTO: "auto",
			TOP: "top",
			RIGHT: _() ? "left" : "right",
			BOTTOM: "bottom",
			LEFT: _() ? "right" : "left"
		},
		Ve = {
			animation: !0,
			template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
			trigger: "hover focus",
			title: "",
			delay: 0,
			html: !1,
			selector: !1,
			placement: "top",
			offset: [0, 0],
			container: !1,
			fallbackPlacements: ["top", "right", "bottom", "left"],
			boundary: "clippingParents",
			customClass: "",
			sanitize: !0,
			sanitizeFn: null,
			allowList: {
				"*": ["class", "dir", "id", "lang", "role", /^aria-[\w-]*$/i],
				a: ["target", "href", "title", "rel"],
				area: [],
				b: [],
				br: [],
				col: [],
				code: [],
				div: [],
				em: [],
				hr: [],
				h1: [],
				h2: [],
				h3: [],
				h4: [],
				h5: [],
				h6: [],
				i: [],
				img: ["src", "srcset", "alt", "title", "width", "height"],
				li: [],
				ol: [],
				p: [],
				pre: [],
				s: [],
				small: [],
				span: [],
				sub: [],
				sup: [],
				strong: [],
				u: [],
				ul: []
			},
			popperConfig: null
		},
		Ke = {
			HIDE: "hide.bs.tooltip",
			HIDDEN: "hidden.bs.tooltip",
			SHOW: "show.bs.tooltip",
			SHOWN: "shown.bs.tooltip",
			INSERTED: "inserted.bs.tooltip",
			CLICK: "click.bs.tooltip",
			FOCUSIN: "focusin.bs.tooltip",
			FOCUSOUT: "focusout.bs.tooltip",
			MOUSEENTER: "mouseenter.bs.tooltip",
			MOUSELEAVE: "mouseleave.bs.tooltip"
		};
	class Xe extends R {
		constructor(t, e) {
			if (void 0 === he) throw new TypeError("Bootstrap's tooltips require Popper (https://popper.js.org)");
			super(t), this._isEnabled = !0, this._timeout = 0, this._hoverState = "", this._activeTrigger = {}, this._popper = null, this._config = this._getConfig(e), this.tip = null, this._setListeners()
		}
		static get Default() {
			return Ve
		}
		static get NAME() {
			return "tooltip"
		}
		static get Event() {
			return Ke
		}
		static get DefaultType() {
			return $e
		}
		enable() {
			this._isEnabled = !0
		}
		disable() {
			this._isEnabled = !1
		}
		toggleEnabled() {
			this._isEnabled = !this._isEnabled
		}
	
	
	
		update() {
			null !== this._popper && this._popper.update()
		}
		isWithContent() {
			return Boolean(this.getTitle())
		}
		getTipElement() {
			if (this.tip) return this.tip;
			const t = document.createElement("div");
			return t.innerHTML = this._config.template, this.tip = t.children[0], this.tip
		}
		setContent() {
			const e = this.getTipElement();
			this.setElementContent(t.findOne(".tooltip-inner", e), this.getTitle()), e.classList.remove("fade", "show")
		}
		setElementContent(t, e) {
			if (null !== t) return a(e) ? (e = l(e), void(this._config.html ? e.parentNode !== t && (t.innerHTML = "", t.appendChild(e)) : t.textContent = e.textContent)) : void(this._config.html ? (this._config.sanitize && (e = qe(e, this._config.allowList, this._config.sanitizeFn)), t.innerHTML = e) : t.textContent = e)
		}
		getTitle() {
			let t = this._element.getAttribute("data-bs-original-title");
			return t || (t = "function" == typeof this._config.title ? this._config.title.call(this._element) : this._config.title), t
		}
		updateAttachment(t) {
			return "right" === t ? "end" : "left" === t ? "start" : t
		}
		_initializeOnDelegatedTarget(t, e) {
			const i = this.constructor.DATA_KEY;
			return (e = e || w.get(t.delegateTarget, i)) || (e = new this.constructor(t.delegateTarget, this._getDelegateConfig()), w.set(t.delegateTarget, i, e)), e
		}
		_getOffset() {
			const {
				offset: t
			} = this._config;
			return "string" == typeof t ? t.split(",").map(t => Number.parseInt(t, 10)) : "function" == typeof t ? e => t(e, this._element) : t
		}
		_getPopperConfig(t) {
			const e = {
				placement: t,
				modifiers: [{
					name: "flip",
					options: {
						fallbackPlacements: this._config.fallbackPlacements
					}
				}, {
					name: "offset",
					options: {
						offset: this._getOffset()
					}
				}, {
					name: "preventOverflow",
					options: {
						boundary: this._config.boundary
					}
				}, {
					name: "arrow",
					options: {
						element: `.${this.constructor.NAME}-arrow`
					}
				}, {
					name: "onChange",
					enabled: !0,
					phase: "afterWrite",
					fn: t => this._handlePopperPlacementChange(t)
				}],
				onFirstUpdate: t => {
					t.options.placement !== t.placement && this._handlePopperPlacementChange(t)
				}
			};
			return { ...e,
				..."function" == typeof this._config.popperConfig ? this._config.popperConfig(e) : this._config.popperConfig
			}
		}
		_addAttachmentClass(t) {
			this.getTipElement().classList.add("bs-tooltip-" + this.updateAttachment(t))
		}
		_getAttachment(t) {
			return Fe[t.toUpperCase()]
		}
	
		_fixTitle() {
			const t = this._element.getAttribute("title"),
				e = typeof this._element.getAttribute("data-bs-original-title");
			(t || "string" !== e) && (this._element.setAttribute("data-bs-original-title", t || ""), !t || this._element.getAttribute("aria-label") || this._element.textContent || this._element.setAttribute("aria-label", t), this._element.setAttribute("title", ""))
		}
		_enter(t, e) {
			e = this._initializeOnDelegatedTarget(t, e), t && (e._activeTrigger["focusin" === t.type ? "focus" : "hover"] = !0), e.getTipElement().classList.contains("show") || "show" === e._hoverState ? e._hoverState = "show" : (clearTimeout(e._timeout), e._hoverState = "show", e._config.delay && e._config.delay.show ? e._timeout = setTimeout(() => {
				"show" === e._hoverState && e.show()
			}, e._config.delay.show) : e.show())
		}
		_leave(t, e) {
			e = this._initializeOnDelegatedTarget(t, e), t && (e._activeTrigger["focusout" === t.type ? "focus" : "hover"] = e._element.contains(t.relatedTarget)), e._isWithActiveTrigger() || (clearTimeout(e._timeout), e._hoverState = "out", e._config.delay && e._config.delay.hide ? e._timeout = setTimeout(() => {
				"out" === e._hoverState && e.hide()
			}, e._config.delay.hide) : e.hide())
		}
		_isWithActiveTrigger() {
			for (const t in this._activeTrigger)
				if (this._activeTrigger[t]) return !0;
			return !1
		}
		_getConfig(t) {
			const e = U.getDataAttributes(this._element);
			return Object.keys(e).forEach(t => {
				Ue.has(t) && delete e[t]
			}), (t = { ...this.constructor.Default,
				...e,
				..."object" == typeof t && t ? t : {}
			}).container = !1 === t.container ? document.body : l(t.container), "number" == typeof t.delay && (t.delay = {
				show: t.delay,
				hide: t.delay
			}), "number" == typeof t.title && (t.title = t.title.toString()), "number" == typeof t.content && (t.content = t.content.toString()), d("tooltip", t, this.constructor.DefaultType), t.sanitize && (t.template = qe(t.template, t.allowList, t.sanitizeFn)), t
		}
		_getDelegateConfig() {
			const t = {};
			if (this._config)
				for (const e in this._config) this.constructor.Default[e] !== this._config[e] && (t[e] = this._config[e]);
			return t
		}
		_cleanTipClass() {
			const t = this.getTipElement(),
				e = t.getAttribute("class").match(ze);
			null !== e && e.length > 0 && e.map(t => t.trim()).forEach(e => t.classList.remove(e))
		}
		_handlePopperPlacementChange(t) {
			const {
				state: e
			} = t;
			e && (this.tip = e.elements.popper, this._cleanTipClass(), this._addAttachmentClass(this._getAttachment(e.placement)))
		}
		static jQueryInterface(t) {
			return this.each((function () {
				let e = w.get(this, "bs.tooltip");
				const i = "object" == typeof t && t;
				if ((e || !/dispose|hide/.test(t)) && (e || (e = new Xe(this, i)), "string" == typeof t)) {
					if (void 0 === e[t]) throw new TypeError(`No method named "${t}"`);
					e[t]()
				}
			}))
		}
	}
	b(Xe);
	const Ye = new RegExp("(^|\\s)bs-popover\\S+", "g"),
		Qe = { ...Xe.Default,
			placement: "right",
			offset: [0, 8],
			trigger: "click",
			content: "",
			template: '<div class="popover" role="tooltip"><div class="popover-arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
		},
		Ge = { ...Xe.DefaultType,
			content: "(string|element|function)"
		},
		Ze = {
			HIDE: "hide.bs.popover",
			HIDDEN: "hidden.bs.popover",
			SHOW: "show.bs.popover",
			SHOWN: "shown.bs.popover",
			INSERTED: "inserted.bs.popover",
			CLICK: "click.bs.popover",
			FOCUSIN: "focusin.bs.popover",
			FOCUSOUT: "focusout.bs.popover",
			MOUSEENTER: "mouseenter.bs.popover",
			MOUSELEAVE: "mouseleave.bs.popover"
		};
	class Je extends Xe {
		static get Default() {
			return Qe
		}
		static get NAME() {
			return "popover"
		}
		static get Event() {
			return Ze
		}
		static get DefaultType() {
			return Ge
		}
		isWithContent() {
			return this.getTitle() || this._getContent()
		}
		setContent() {
			const e = this.getTipElement();
			this.setElementContent(t.findOne(".popover-header", e), this.getTitle());
			let i = this._getContent();
			"function" == typeof i && (i = i.call(this._element)), this.setElementContent(t.findOne(".popover-body", e), i), e.classList.remove("fade", "show")
		}
		_addAttachmentClass(t) {
			this.getTipElement().classList.add("bs-popover-" + this.updateAttachment(t))
		}
		_getContent() {
			return this._element.getAttribute("data-bs-content") || this._config.content
		}
		_cleanTipClass() {
			const t = this.getTipElement(),
				e = t.getAttribute("class").match(Ye);
			null !== e && e.length > 0 && e.map(t => t.trim()).forEach(e => t.classList.remove(e))
		}
		static jQueryInterface(t) {
			return this.each((function () {
				let e = w.get(this, "bs.popover");
				const i = "object" == typeof t ? t : null;
				if ((e || !/dispose|hide/.test(t)) && (e || (e = new Je(this, i), w.set(this, "bs.popover", e)), "string" == typeof t)) {
					if (void 0 === e[t]) throw new TypeError(`No method named "${t}"`);
					e[t]()
				}
			}))
		}
	}
	b(Je);
	const ti = {
			offset: 10,
			method: "auto",
			target: ""
		},
		ei = {
			offset: "number",
			method: "string",
			target: "(string|element)"
		};
	class ii extends R {
		constructor(t, e) {
			super(t), this._scrollElement = "BODY" === this._element.tagName ? window : this._element, this._config = this._getConfig(e), this._selector = `${this._config.target} .nav-link, ${this._config.target} .list-group-item, ${this._config.target} .dropdown-item`, this._offsets = [], this._targets = [], this._activeTarget = null, this._scrollHeight = 0, H.on(this._scrollElement, "scroll.bs.scrollspy", () => this._process()), this.refresh(), this._process()
		}
		static get Default() {
			return ti
		}
		static get NAME() {
			return "scrollspy"
		}
		refresh() {
			const e = this._scrollElement === this._scrollElement.window ? "offset" : "position",
				i = "auto" === this._config.method ? e : this._config.method,
				s = "position" === i ? this._getScrollTop() : 0;
			this._offsets = [], this._targets = [], this._scrollHeight = this._getScrollHeight(), t.find(this._selector).map(e => {
				const o = n(e),
					r = o ? t.findOne(o) : null;
				if (r) {
					const t = r.getBoundingClientRect();
					if (t.width || t.height) return [U[i](r).top + s, o]
				}
				return null
			}).filter(t => t).sort((t, e) => t[0] - e[0]).forEach(t => {
				this._offsets.push(t[0]), this._targets.push(t[1])
			})
		}
		dispose() {
			H.off(this._scrollElement, ".bs.scrollspy"), super.dispose()
		}
		_getConfig(t) {
			if ("string" != typeof (t = { ...ti,
					...U.getDataAttributes(this._element),
					..."object" == typeof t && t ? t : {}
				}).target && a(t.target)) {
				let {
					id: i
				} = t.target;
				i || (i = e("scrollspy"), t.target.id = i), t.target = "#" + i
			}
			return d("scrollspy", t, ei), t
		}
		_getScrollTop() {
			return this._scrollElement === window ? this._scrollElement.pageYOffset : this._scrollElement.scrollTop
		}
		_getScrollHeight() {
			return this._scrollElement.scrollHeight || Math.max(document.body.scrollHeight, document.documentElement.scrollHeight)
		}
		_getOffsetHeight() {
			return this._scrollElement === window ? window.innerHeight : this._scrollElement.getBoundingClientRect().height
		}
		_process() {
			const t = this._getScrollTop() + this._config.offset,
				e = this._getScrollHeight(),
				i = this._config.offset + e - this._getOffsetHeight();
			if (this._scrollHeight !== e && this.refresh(), t >= i) {
				const t = this._targets[this._targets.length - 1];
				this._activeTarget !== t && this._activate(t)
			} else {
				if (this._activeTarget && t < this._offsets[0] && this._offsets[0] > 0) return this._activeTarget = null, void this._clear();
				for (let e = this._offsets.length; e--;) this._activeTarget !== this._targets[e] && t >= this._offsets[e] && (void 0 === this._offsets[e + 1] || t < this._offsets[e + 1]) && this._activate(this._targets[e])
			}
		}
		_activate(e) {
			this._activeTarget = e, this._clear();
			const i = this._selector.split(",").map(t => `${t}[data-bs-target="${e}"],${t}[href="${e}"]`),
				n = t.findOne(i.join(","));
			n.classList.contains("dropdown-item") ? (t.findOne(".dropdown-toggle", n.closest(".dropdown")).classList.add("active"), n.classList.add("active")) : (n.classList.add("active"), t.parents(n, ".nav, .list-group").forEach(e => {
				t.prev(e, ".nav-link, .list-group-item").forEach(t => t.classList.add("active")), t.prev(e, ".nav-item").forEach(e => {
					t.children(e, ".nav-link").forEach(t => t.classList.add("active"))
				})
			})), H.trigger(this._scrollElement, "activate.bs.scrollspy", {
				relatedTarget: e
			})
		}
		_clear() {
			t.find(this._selector).filter(t => t.classList.contains("active")).forEach(t => t.classList.remove("active"))
		}
		static jQueryInterface(t) {
			return this.each((function () {
				const e = ii.getInstance(this) || new ii(this, "object" == typeof t ? t : {});
				if ("string" == typeof t) {
					if (void 0 === e[t]) throw new TypeError(`No method named "${t}"`);
					e[t]()
				}
			}))
		}
	}
	H.on(window, "load.bs.scrollspy.data-api", () => {
		t.find('[data-bs-spy="scroll"]').forEach(t => new ii(t))
	}), b(ii);
	class ni extends R {
		static get NAME() {
			return "tab"
		}
		show() {
			if (this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE && this._element.classList.contains("active")) return;
			let e;
			const i = s(this._element),
				n = this._element.closest(".nav, .list-group");
			if (n) {
				const i = "UL" === n.nodeName || "OL" === n.nodeName ? ":scope > li > .active" : ".active";
				e = t.find(i, n), e = e[e.length - 1]
			}
			const o = e ? H.trigger(e, "hide.bs.tab", {
				relatedTarget: this._element
			}) : null;
			if (H.trigger(this._element, "show.bs.tab", {
					relatedTarget: e
				}).defaultPrevented || null !== o && o.defaultPrevented) return;
			this._activate(this._element, n);
			const r = () => {
				H.trigger(e, "hidden.bs.tab", {
					relatedTarget: this._element
				}), H.trigger(this._element, "shown.bs.tab", {
					relatedTarget: e
				})
			};
			i ? this._activate(i, i.parentNode, r) : r()
		}
		_activate(e, i, n) {
			const s = (!i || "UL" !== i.nodeName && "OL" !== i.nodeName ? t.children(i, ".active") : t.find(":scope > li > .active", i))[0],
				o = n && s && s.classList.contains("fade"),
				r = () => this._transitionComplete(e, s, n);
			s && o ? (s.classList.remove("show"), this._queueCallback(r, e, !0)) : r()
		}
		_transitionComplete(e, i, n) {
			if (i) {
				i.classList.remove("active");
				const e = t.findOne(":scope > .dropdown-menu .active", i.parentNode);
				e && e.classList.remove("active"), "tab" === i.getAttribute("role") && i.setAttribute("aria-selected", !1)
			}
			e.classList.add("active"), "tab" === e.getAttribute("role") && e.setAttribute("aria-selected", !0), m(e), e.classList.contains("fade") && e.classList.add("show");
			let s = e.parentNode;
			if (s && "LI" === s.nodeName && (s = s.parentNode), s && s.classList.contains("dropdown-menu")) {
				const i = e.closest(".dropdown");
				i && t.find(".dropdown-toggle", i).forEach(t => t.classList.add("active")), e.setAttribute("aria-expanded", !0)
			}
			n && n()
		}
		static jQueryInterface(t) {
			return this.each((function () {
				const e = w.get(this, "bs.tab") || new ni(this);
				if ("string" == typeof t) {
					if (void 0 === e[t]) throw new TypeError(`No method named "${t}"`);
					e[t]()
				}
			}))
		}
	}
	H.on(document, "click.bs.tab.data-api", '[data-bs-toggle="tab"], [data-bs-toggle="pill"], [data-bs-toggle="list"]', (function (t) {
		["A", "AREA"].includes(this.tagName) && t.preventDefault(), u(this) || (w.get(this, "bs.tab") || new ni(this)).show()
	})), b(ni);
	const si = {
			animation: "boolean",
			autohide: "boolean",
			delay: "number"
		},
		oi = {
			animation: !0,
			autohide: !0,
			delay: 5e3
		};
	class ri extends R {
		constructor(t, e) {
			super(t), this._config = this._getConfig(e), this._timeout = null, this._hasMouseInteraction = !1, this._hasKeyboardInteraction = !1, this._setListeners()
		}
		static get DefaultType() {
			return si
		}
		static get Default() {
			return oi
		}
		static get NAME() {
			return "toast"
		}
		show() {
			H.trigger(this._element, "show.bs.toast").defaultPrevented || (this._clearTimeout(), this._config.animation && this._element.classList.add("fade"), this._element.classList.remove("hide"), m(this._element), this._element.classList.add("showing"), this._queueCallback(() => {
				this._element.classList.remove("showing"), this._element.classList.add("show"), H.trigger(this._element, "shown.bs.toast"), this._maybeScheduleHide()
			}, this._element, this._config.animation))
		}
		hide() {
			this._element.classList.contains("show") && (H.trigger(this._element, "hide.bs.toast").defaultPrevented || (this._element.classList.remove("show"), this._queueCallback(() => {
				this._element.classList.add("hide"), H.trigger(this._element, "hidden.bs.toast")
			}, this._element, this._config.animation)))
		}
		dispose() {
			this._clearTimeout(), this._element.classList.contains("show") && this._element.classList.remove("show"), super.dispose()
		}
		_getConfig(t) {
			return t = { ...oi,
				...U.getDataAttributes(this._element),
				..."object" == typeof t && t ? t : {}
			}, d("toast", t, this.constructor.DefaultType), t
		}
		_maybeScheduleHide() {
			this._config.autohide && (this._hasMouseInteraction || this._hasKeyboardInteraction || (this._timeout = setTimeout(() => {
				this.hide()
			}, this._config.delay)))
		}
		_onInteraction(t, e) {
			switch (t.type) {
				case "mouseover":
				case "mouseout":
					this._hasMouseInteraction = e;
					break;
				case "focusin":
				case "focusout":
					this._hasKeyboardInteraction = e
			}
			if (e) return void this._clearTimeout();
			const i = t.relatedTarget;
			this._element === i || this._element.contains(i) || this._maybeScheduleHide()
		}
		_setListeners() {
			H.on(this._element, "click.dismiss.bs.toast", '[data-bs-dismiss="toast"]', () => this.hide()), H.on(this._element, "mouseover.bs.toast", t => this._onInteraction(t, !0)), H.on(this._element, "mouseout.bs.toast", t => this._onInteraction(t, !1)), H.on(this._element, "focusin.bs.toast", t => this._onInteraction(t, !0)), H.on(this._element, "focusout.bs.toast", t => this._onInteraction(t, !1))
		}
		_clearTimeout() {
			clearTimeout(this._timeout), this._timeout = null
		}
		static jQueryInterface(t) {
			return this.each((function () {
				let e = w.get(this, "bs.toast");
				if (e || (e = new ri(this, "object" == typeof t && t)), "string" == typeof t) {
					if (void 0 === e[t]) throw new TypeError(`No method named "${t}"`);
					e[t](this)
				}
			}))
		}
	}
	return b(ri), {
		Alert: B,
		Button: W,
		Carousel: Q,
		Collapse: J,
		Dropdown: we,
		Modal: Ie,
		Offcanvas: Me,
		Popover: Je,
		ScrollSpy: ii,
		Tab: ni,
		Toast: ri,
		Tooltip: Xe
	}
}));
//# sourceMappingURL=bootstrap.bundle.min.js.map