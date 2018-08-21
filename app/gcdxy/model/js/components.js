/*!
 * VERSION: 0.3.0
 * DATE: 2016-11-22
 * GIT: https://github.com/shrekshrek/bone
 * @author: Shrek.wang
 **/


(function(factory) {

    if (typeof define === 'function' && define.amd) {
        define(['jquery', 'exports'], function($, exports) {
            window.Bone = factory(exports, $);
        });
    } else if (typeof exports !== 'undefined') {
        var $ = require('jquery');
        factory(exports, $);
    } else {
        window.Bone = factory({}, window.$);
    }

}(function(Bone, $) {

    var slice = [].slice;

    Bone.$ = $;

    // other function
    // ---------------

    var isFunction = function(obj) {
        return typeof obj == 'function' || false;
    };

    var result = function(object, property, fallback) {
        var value = object == null ? void 0 : object[property];
        if (value === void 0) {
            value = fallback;
        }
        return isFunction(value) ? value.call(object) : value;
    };

    var bind = function(func, context) {
        return Function.prototype.bind.apply(func, slice.call(arguments, 1));
    };

    Bone.bind = bind;
    Bone.extend = Object.assign;

    var keys = function(obj){
        var keys = [];
        for(var key in obj){
            keys.push(key);
        }
        return keys;
    };

    var size = function(obj) {
        if (obj == null) return 0;
        return (obj.length !== undefined) ? obj.length : keys(obj).length;
    };

    var isEmpty = function(obj) {
        if (obj == null) return true;
        if (obj.length !== undefined) return obj.length === 0;
        return keys(obj).length === 0;
    };

    var idCounter = 0;
    var uniqueId = function(prefix) {
        var id = ++idCounter + '';
        return prefix ? prefix + id : id;
    };


    // Bone.Events
    // ---------------

    //     var object = {};
    //     Bone.extend(object, Bone.Events);
    //     object.on('expand', function(){ alert('expanded'); });
    //     object.trigger('expand');

    var Events = Bone.Events = {};

    var eventSplitter = /\s+/;

    var eventsApi = function(iteratee, memo, name, callback, opts) {
        var i = 0, names;
        if (name && typeof name === 'object') {
            if (callback !== void 0 && 'context' in opts && opts.context === void 0) opts.context = callback;
            for (names = keys(name); i < names.length ; i++) {
                memo = iteratee(memo, names[i], name[names[i]], opts);
            }
        } else if (name && eventSplitter.test(name)) {
            for (names = name.split(eventSplitter); i < names.length; i++) {
                memo = iteratee(memo, names[i], callback, opts);
            }
        } else {
            memo = iteratee(memo, name, callback, opts);
        }
        return memo;
    };

    Events.on = function(name, callback, context) {
        return internalOn(this, name, callback, context);
    };

    var internalOn = function(obj, name, callback, context, listening) {
        obj._events = eventsApi(onApi, obj._events || {}, name, callback, {
            context: context,
            ctx: obj,
            listening: listening
        });

        if (listening) {
            var listeners = obj._listeners || (obj._listeners = {});
            listeners[listening.id] = listening;
        }

        return obj;
    };

    Events.listenTo =  function(obj, name, callback) {
        if (!obj) return this;
        var id = obj._listenId || (obj._listenId = uniqueId('l'));
        var listeningTo = this._listeningTo || (this._listeningTo = {});
        var listening = listeningTo[id];

        if (!listening) {
            var thisId = this._listenId || (this._listenId = uniqueId('l'));
            listening = listeningTo[id] = {obj: obj, objId: id, id: thisId, listeningTo: listeningTo, count: 0};
        }

        internalOn(obj, name, callback, this, listening);
        return this;
    };

    var onApi = function(events, name, callback, options) {
        if (callback) {
            var handlers = events[name] || (events[name] = []);
            var context = options.context, ctx = options.ctx, listening = options.listening;
            if (listening) listening.count++;

            handlers.push({ callback: callback, context: context, ctx: context || ctx, listening: listening });
        }
        return events;
    };

    Events.off =  function(name, callback, context) {
        if (!this._events) return this;
        this._events = eventsApi(offApi, this._events, name, callback, {
            context: context,
            listeners: this._listeners
        });
        return this;
    };

    Events.stopListening =  function(obj, name, callback) {
        var listeningTo = this._listeningTo;
        if (!listeningTo) return this;

        var ids = obj ? [obj._listenId] : keys(listeningTo);

        for (var i = 0; i < ids.length; i++) {
            var listening = listeningTo[ids[i]];

            if (!listening) break;

            listening.obj.off(name, callback, this);
        }
        if (isEmpty(listeningTo)) this._listeningTo = void 0;

        return this;
    };

    var offApi = function(events, name, callback, options) {
        if (!events) return;

        var i = 0, listening;
        var context = options.context, listeners = options.listeners;

        if (!name && !callback && !context) {
            var ids = keys(listeners);
            for (; i < ids.length; i++) {
                listening = listeners[ids[i]];
                delete listeners[listening.id];
                delete listening.listeningTo[listening.objId];
            }
            return;
        }

        var names = name ? [name] : keys(events);
        for (; i < names.length; i++) {
            name = names[i];
            var handlers = events[name];

            if (!handlers) break;

            var remaining = [];
            for (var j = 0; j < handlers.length; j++) {
                var handler = handlers[j];
                if (
                    callback && callback !== handler.callback &&
                    callback !== handler.callback._callback ||
                    context && context !== handler.context
                ) {
                    remaining.push(handler);
                } else {
                    listening = handler.listening;
                    if (listening && --listening.count === 0) {
                        delete listeners[listening.id];
                        delete listening.listeningTo[listening.objId];
                    }
                }
            }

            if (remaining.length) {
                events[name] = remaining;
            } else {
                delete events[name];
            }
        }
        if (size(events)) return events;
    };

    Events.once =  function(name, callback, context) {
        var events = eventsApi(onceMap, {}, name, callback, bind(this.off, this));
        return this.on(events, void 0, context);
    };

    Events.listenToOnce =  function(obj, name, callback) {
        var events = eventsApi(onceMap, {}, name, callback, bind(this.stopListening, this, obj));
        return this.listenTo(obj, events);
    };

    var onceMap = function(map, name, callback, offer) {
        if (callback) {
            var once = map[name] = function() {
                offer(name, once);
                callback.apply(this, arguments);
            };
            once._callback = callback;
        }
        return map;
    };

    Events.trigger =  function(name) {
        if (!this._events) return this;

        var length = Math.max(0, arguments.length - 1);
        var args = Array(length);
        for (var i = 0; i < length; i++) args[i] = arguments[i + 1];

        eventsApi(triggerApi, this._events, name, void 0, args);
        return this;
    };

    var triggerApi = function(objEvents, name, cb, args) {
        if (objEvents) {
            var events = objEvents[name];
            var allEvents = objEvents.all;
            if (events && allEvents) allEvents = allEvents.slice();
            if (events) triggerEvents(events, args);
            if (allEvents) triggerEvents(allEvents, [name].concat(args));
        }
        return objEvents;
    };

    var triggerEvents = function(events, args) {
        var ev, i = -1, l = events.length, a1 = args[0], a2 = args[1], a3 = args[2];
        switch (args.length) {
            case 0: while (++i < l) (ev = events[i]).callback.call(ev.ctx); return;
            case 1: while (++i < l) (ev = events[i]).callback.call(ev.ctx, a1); return;
            case 2: while (++i < l) (ev = events[i]).callback.call(ev.ctx, a1, a2); return;
            case 3: while (++i < l) (ev = events[i]).callback.call(ev.ctx, a1, a2, a3); return;
            default: while (++i < l) (ev = events[i]).callback.apply(ev.ctx, args); return;
        }
    };

    Bone.extend(Bone, Events);


    // Bone.Class
    // ---------------

    var Class = Bone.Class = function(options) {
        this.initialize.apply(this, arguments);
    };

    Bone.extend(Class.prototype, Events, {
        initialize: function(){}
    });


    // Bone.View
    // ---------------

    var View = Bone.View = function(options) {
        this.cid = uniqueId('view');
        options || (options = {});
        for(var i in viewOptions){
            if(options[viewOptions[i]]) this[viewOptions[i]] = options[viewOptions[i]];
        }
        this._ensureElement();
        this.initialize.apply(this, arguments);
    };

    var delegateEventSplitter = /^(\S+)\s*(.*)$/;

    var viewOptions = ['el', 'id', 'attributes', 'className', 'tagName', 'events'];

    Bone.extend(View.prototype, Events, {
        tagName: 'div',

        $: function(selector) {
            return this.$el.find(selector);
        },

        initialize: function(){},

        render: function() {
            return this;
        },

        remove: function() {
            this._removeElement();
            this.stopListening();
            return this;
        },

        _removeElement: function() {
            this.$el.remove();
        },

        setElement: function(element) {
            this.undelegateEvents();
            this._setElement(element);
            this.delegateEvents();
            return this;
        },

        _setElement: function(el) {
            this.$el = el instanceof Bone.$ ? el : Bone.$(el);
            this.el = this.$el[0];
        },

        delegateEvents: function(events) {
            events || (events = result(this, 'events'));
            if (!events) return this;
            this.undelegateEvents();
            for (var key in events) {
                var method = events[key];
                if (!isFunction(method)) method = this[method];
                if (!method) continue;
                var match = key.match(delegateEventSplitter);
                this.delegate(match[1], match[2], bind(method, this));
            }
            return this;
        },

        delegate: function(eventName, selector, listener) {
            this.$el.on(eventName + '.delegateEvents' + this.cid, selector, listener);
            return this;
        },

        undelegateEvents: function() {
            if (this.$el) this.$el.off('.delegateEvents' + this.cid);
            return this;
        },

        undelegate: function(eventName, selector, listener) {
            this.$el.off(eventName + '.delegateEvents' + this.cid, selector, listener);
            return this;
        },

        _createElement: function(tagName) {
            return document.createElement(tagName);
        },

        _ensureElement: function() {
            if (!this.el) {
                var attrs = Bone.extend({}, result(this, 'attributes'));
                if (this.id) attrs.id = result(this, 'id');
                if (this.className) attrs['class'] = result(this, 'className');
                this.setElement(this._createElement(result(this, 'tagName')));
                this._setAttributes(attrs);
            } else {
                this.setElement(result(this, 'el'));
            }
        },

        _setAttributes: function(attributes) {
            this.$el.attr(attributes);
        }

    });

    // Bone.Router
    // ---------------

    var Router = Bone.Router = function(options) {
        options || (options = {});
        if (options.routes) this.routes = options.routes;
        this._bindRoutes();
        this.initialize.apply(this, arguments);
    };

    var optionalParam = /\((.*?)\)/g;
    var namedParam    = /(\(\?)?:\w+/g;
    var splatParam    = /\*\w+/g;
    var escapeRegExp  = /[\-{}\[\]+?.,\\\^$|#\s]/g;

    Bone.extend(Router.prototype, Events, {

        initialize: function(){},

        route: function(route, name, callback) {
            route = this._routeToRegExp(route);
            if (isFunction(name)) {
                callback = name;
                name = '';
            }
            if (!callback) callback = this[name];
            var router = this;
            Bone.history.route(route, function(fragment) {
                var args = router._extractParameters(route, fragment);
                if (router.execute(callback, args, name) !== false) {
                    router.trigger.apply(router, ['route:' + name].concat(args));
                    router.trigger('route', name, args);
                    Bone.history.trigger('route', router, name, args);
                }
            });
            return this;
        },

        execute: function(callback, args, name) {
            if (callback) callback.apply(this, args);
        },

        navigate: function(fragment, options) {
            Bone.history.navigate(fragment, options);
            return this;
        },

        _bindRoutes: function() {
            if (!this.routes) return;
            var route, routes = keys(this.routes);
            while ((route = routes.pop()) != null) {
                this.route(route, this.routes[route]);
            }
        },

        _routeToRegExp: function(route) {
            route = route.replace(escapeRegExp, '\\$&')
                .replace(optionalParam, '(?:$1)?')
                .replace(namedParam, function(match, optional) {
                    return optional ? match : '([^/?]+)';
                })
                .replace(splatParam, '([^?]*?)');
            return new RegExp('^' + route + '(?:\\?([\\s\\S]*))?$');
        },

        _extractParameters: function(route, fragment) {
            var params = route.exec(fragment).slice(1);
            var _p = [];
            for(var i in params){
                var param = params[i];
                if (i === params.length - 1) _p[i] = param || null;
                else _p[i] = param ? decodeURIComponent(param) : null;
            }
            return _p;
        }

    });


    // Bone.History
    // ----------------

    var History = Bone.History = function() {
        this.handlers = [];
        this.checkUrl = bind(this.checkUrl, this);

        if (typeof window !== 'undefined') {
            this.location = window.location;
            this.history = window.history;
        }
    };

    var routeStripper = /^[#\/]|\s+$/g;

    var rootStripper = /^\/+|\/+$/g;

    var pathStripper = /#.*$/;

    History.started = false;

    Bone.extend(History.prototype, Events, {
        atRoot: function() {
            var path = this.location.pathname.replace(/[^\/]$/, '$&/');
            return path === this.root && !this.getSearch();
        },

        matchRoot: function() {
            var path = this.decodeFragment(this.location.pathname);
            var root = path.slice(0, this.root.length - 1) + '/';
            return root === this.root;
        },

        decodeFragment: function(fragment) {
            return decodeURI(fragment.replace(/%25/g, '%2525'));
        },

        getSearch: function() {
            var match = this.location.href.replace(/#.*/, '').match(/\?.+/);
            return match ? match[0] : '';
        },

        getHash: function(window) {
            var match = (window || this).location.href.match(/#(.*)$/);
            return match ? match[1] : '';
        },

        getPath: function() {
            var path = this.decodeFragment(
                this.location.pathname + this.getSearch()
            ).slice(this.root.length - 1);
            return path.charAt(0) === '/' ? path.slice(1) : path;
        },

        getFragment: function(fragment) {
            if (fragment == null) {
                if (this._usePushState || !this._wantsHashChange) {
                    fragment = this.getPath();
                } else {
                    fragment = this.getHash();
                }
            }
            return fragment.replace(routeStripper, '');
        },

        start: function(options) {
            if (History.started) throw new Error("Bone.history has already been started");
            History.started = true;

            this.options          = Bone.extend({root: '/'}, this.options, options);
            this.root             = this.options.root;
            this._wantsHashChange = this.options.hashChange !== false;
            this._hasHashChange   = 'onhashchange' in window;
            this._useHashChange   = this._wantsHashChange && this._hasHashChange;
            this._wantsPushState  = !!this.options.pushState;
            this._hasPushState    = !!(this.history && this.history.pushState);
            this._usePushState    = this._wantsPushState && this._hasPushState;
            this.fragment         = this.getFragment();

            this.root = ('/' + this.root + '/').replace(rootStripper, '/');

            if (this._wantsHashChange && this._wantsPushState) {
                if (!this._hasPushState && !this.atRoot()) {
                    var root = this.root.slice(0, -1) || '/';
                    this.location.replace(root + '#' + this.getPath());
                    return true;
                } else if (this._hasPushState && this.atRoot()) {
                    this.navigate(this.getHash(), {replace: true});
                }
            }

            var addEventListener = window.addEventListener || function (eventName, listener) {
                    return attachEvent('on' + eventName, listener);
                };

            if (this._usePushState) {
                addEventListener('popstate', this.checkUrl, false);
            } else if (this._useHashChange) {
                addEventListener('hashchange', this.checkUrl, false);
            }

            if (!this.options.silent) return this.loadUrl();
        },

        stop: function() {
            var removeEventListener = window.removeEventListener || function (eventName, listener) {
                    return detachEvent('on' + eventName, listener);
                };

            if (this._usePushState) {
                removeEventListener('popstate', this.checkUrl, false);
            } else if (this._useHashChange) {
                removeEventListener('hashchange', this.checkUrl, false);
            }

            if (this._checkUrlInterval) clearInterval(this._checkUrlInterval);
            History.started = false;
        },

        route: function(route, callback) {
            this.handlers.unshift({route: route, callback: callback});
        },

        checkUrl: function(e) {
            var current = this.getFragment();
            if (current === this.fragment) return false;
            this.loadUrl();
        },

        loadUrl: function(fragment) {
            if (!this.matchRoot()) return false;
            fragment = this.fragment = this.getFragment(fragment);
            for(var i in this.handlers){
                var handler = this.handlers[i];
                if (handler.route.test(fragment)) {
                    handler.callback(fragment);
                    return true;
                }
            }
        },

        navigate: function(fragment, options) {
            if (!History.started) return false;
            if (!options || options === true) options = {trigger: !!options};

            fragment = fragment.replace(pathStripper, '');

            var root = this.root;
            if (fragment === '' || fragment.charAt(0) === '?') {
                root = root.slice(0, -1) || '/';
            }
            var url = root + fragment;

            fragment = this.decodeFragment(fragment.replace(pathStripper, ''));

            if (this.fragment === fragment) return;
            this.fragment = fragment;

            if (this._usePushState) {
                this.history[options.replace ? 'replaceState' : 'pushState']({}, document.title, url);

            } else if (this._wantsHashChange) {
                this._updateHash(this.location, fragment, options.replace);
            } else {
                return this.location.assign(url);
            }
            if (options.trigger) return this.loadUrl(fragment);
        },

        _updateHash: function(location, fragment, replace) {
            if (replace) {
                var href = location.href.replace(/(javascript:|#).*$/, '');
                location.replace(href + '#' + fragment);
            } else {
                location.hash = '#' + fragment;
            }
        }

    });

    Bone.history = new History;


    // extend
    // ----------------

    var extend = function(protoProps, staticProps) {
        var parent = this;
        var child;

        if (protoProps && Object.prototype.hasOwnProperty.call(protoProps, 'constructor')) {
            child = protoProps.constructor;
        } else {
            child = function(){ return parent.apply(this, arguments); };
        }

        Object.assign(child, parent, staticProps);

        var Surrogate = function(){
            this.constructor = child;
        };
        Surrogate.prototype = parent.prototype;
        child.prototype = new Surrogate;

        if (protoProps) Object.assign(child.prototype, protoProps);

        child.__super__ = parent.prototype;

        return child;
    };

    Router.extend = History.extend = Class.extend = View.extend = extend;



    return Bone;

}));

/*!
 * VERSION: 0.1.0
 * DATE: 2016-7-7
 * GIT: https://github.com/shrekshrek/components
 * @author: Shrek.wang
 **/

(function (factory) {

    if (typeof define === 'function' && define.amd) {
        define(['exports'], function (exports) {
            window.Gesturer = factory(exports);
        });
    } else if (typeof exports !== 'undefined') {
        factory(exports);
    } else {
        window.Gesturer = factory({});
    }

}(function (Gesturer) {

    function getLen(v) {
        return Math.sqrt(v.x * v.x + v.y * v.y);
    }

    function dot(v1, v2) {
        return v1.x * v2.x + v1.y * v2.y;
    }

    function getAngle(v1, v2) {
        var mr = getLen(v1) * getLen(v2);
        if (mr === 0) return 0;
        var r = dot(v1, v2) / mr;
        if (r > 1) r = 1;
        return Math.acos(r);
    }

    function cross(v1, v2) {
        return v1.x * v2.y - v2.x * v1.y;
    }

    function getRotateAngle(v1, v2) {
        var angle = getAngle(v1, v2);
        if (cross(v1, v2) > 0) {
            angle *= -1;
        }

        return angle * 180 / Math.PI;
    }

    Gesturer = function () {
        this.initialize.apply(this, arguments);
    };

    Gesturer.prototype = {
        initialize: function (config) {
            this.el = config.el;

            this.preV = {x: null, y: null};
            this.pinchStartLen = null;
            this.scale = 1;
            this.isDoubleTap = false;
            this.onRotate = config.onRotate || function () {
                };
            this.onTouchStart = config.onTouchStart || function () {
                };
            this.onMultipointStart = config.onMultipointStart || function () {
                };
            this.onMultipointEnd = config.onMultipointEnd || function () {
                };
            this.onPinch = config.onPinch || function () {
                };
            this.onSwipe = config.onSwipe || function () {
                };
            this.onTap = config.onTap || function () {
                };
            this.onDoubleTap = config.onDoubleTap || function () {
                };
            this.onLongTap = config.onLongTap || function () {
                };
            this.onSingleTap = config.onSingleTap || function () {
                };
            this.onPressMove = config.onPressMove || function () {
                };
            this.onTouchMove = config.onTouchMove || function () {
                };
            this.onTouchEnd = config.onTouchEnd || function () {
                };
            this.onTouchCancel = config.onTouchCancel || function () {
                };

            this.delta = null;
            this.last = null;
            this.now = null;
            this.tapTimeout = null;
            this.touchTimeout = null;
            this.longTapTimeout = null;
            this.swipeTimeout = null;
            this.x1 = this.x2 = this.y1 = this.y2 = null;
            this.preTapPosition = {x: null, y: null};

            this._touchStart = this._touchStart.bind(this);
            this._touchMove = this._touchMove.bind(this);
            this._touchEnd = this._touchEnd.bind(this);
            this._touchCancel = this._touchCancel.bind(this);
        },

        on: function () {
            this.el.addEventListener("touchstart", this._touchStart, false);
            this.el.addEventListener("touchmove", this._touchMove, false);
            this.el.addEventListener("touchend", this._touchEnd, false);
            this.el.addEventListener("touchcancel", this._touchCancel, false);
        },

        off: function () {
            this.el.removeEventListener("touchstart", this._touchStart, false);
            this.el.removeEventListener("touchmove", this._touchMove, false);
            this.el.removeEventListener("touchend", this._touchEnd, false);
            this.el.removeEventListener("touchcancel", this._touchCancel, false);
        },

        destroy: function () {
            // this.gesture.destroy();
        },

        _touchStart: function (evt) {
            if (!evt.touches)return;
            this.now = Date.now();
            this.x1 = evt.touches[0].pageX;
            this.y1 = evt.touches[0].pageY;
            this.delta = this.now - (this.last || this.now);
            this.onTouchStart(evt);
            if (this.preTapPosition.x !== null) {
                this.isDoubleTap = (this.delta > 0 && this.delta <= 250 && Math.abs(this.preTapPosition.x - this.x1) < 30 && Math.abs(this.preTapPosition.y - this.y1) < 30);
            }
            this.preTapPosition.x = this.x1;
            this.preTapPosition.y = this.y1;
            this.last = this.now;
            var preV = this.preV,
                len = evt.touches.length;
            if (len > 1) {
                this._cancelLongTap();
                var v = {x: evt.touches[1].pageX - this.x1, y: evt.touches[1].pageY - this.y1};
                preV.x = v.x;
                preV.y = v.y;
                this.pinchStartLen = this.pinchLen = getLen(preV);
                this.onMultipointStart(evt);
            }
            this.longTapTimeout = setTimeout(function () {
                this.onLongTap(evt);
            }.bind(this), 750);
        },

        _touchMove: function (evt) {
            if (!evt.touches)return;
            var preV = this.preV,
                len = evt.touches.length,
                currentX = evt.touches[0].pageX,
                currentY = evt.touches[0].pageY;
            this.isDoubleTap = false;
            if (len > 1) {
                var v = {x: evt.touches[1].pageX - currentX, y: evt.touches[1].pageY - currentY};

                if (preV.x !== null) {
                    if (this.pinchStartLen > 0) {
                        var _len = getLen(v);
                        evt.scale = _len / this.pinchStartLen;
                        evt.deltaLen = _len - this.pinchLen;
                        this.pinchLen = _len;
                        this.onPinch(evt);
                    }

                    evt.angle = getRotateAngle(v, preV);
                    this.onRotate(evt);
                }
                preV.x = v.x;
                preV.y = v.y;
            } else {
                if (this.x2 !== null) {
                    evt.deltaX = currentX - this.x2;
                    evt.deltaY = currentY - this.y2;

                } else {
                    evt.deltaX = 0;
                    evt.deltaY = 0;
                }
                this.onPressMove(evt);
            }

            this.onTouchMove(evt);

            this._cancelLongTap();
            this.x2 = currentX;
            this.y2 = currentY;
            if (evt.touches.length > 1) {
                this._cancelLongTap();
                evt.preventDefault();
            }
        },

        _touchEnd: function (evt) {
            if (!evt.changedTouches)return;
            this._cancelLongTap();
            var _self = this;
            if (evt.touches.length < 2) {
                this.onMultipointEnd(evt);
            }
            this.onTouchEnd(evt);
            //swipe
            if ((this.x2 && Math.abs(this.x1 - this.x2) > 30) ||
                (this.y2 && Math.abs(this.preV.y - this.y2) > 30)) {
                evt.direction = this._swipeDirection(this.x1, this.x2, this.y1, this.y2);
                this.swipeTimeout = setTimeout(function () {
                    _self.onSwipe(evt);
                }, 0)
            } else {
                this.tapTimeout = setTimeout(function () {
                    _self.onTap(evt);
                    // trigger double tap immediately
                    if (_self.isDoubleTap) {
                        _self.onDoubleTap(evt);
                        clearTimeout(_self.touchTimeout);
                        _self.isDoubleTap = false;
                    } else {
                        _self.touchTimeout = setTimeout(function () {
                            _self.onSingleTap(evt);
                        }, 250);
                    }
                }, 0)
            }

            this.preV.x = 0;
            this.preV.y = 0;
            this.scale = 1;
            this.pinchStartLen = null;
            this.x1 = this.x2 = this.y1 = this.y2 = null;
        },

        _touchCancel: function (evt) {
            clearTimeout(this.touchTimeout);
            clearTimeout(this.tapTimeout);
            clearTimeout(this.longTapTimeout);
            clearTimeout(this.swipeTimeout);
            this.onTouchCancel(evt);
        },

        _cancelLongTap: function () {
            clearTimeout(this.longTapTimeout);
        },

        _swipeDirection: function (x1, x2, y1, y2) {
            return Math.abs(x1 - x2) >= Math.abs(y1 - y2) ? (x1 - x2 > 0 ? 'Left' : 'Right') : (y1 - y2 > 0 ? 'Up' : 'Down')
        }


    };

    return Gesturer;
}));

/*!
 * VERSION: 0.9.0
 * DATE: 2017-9-3
 * GIT: https://github.com/shrekshrek/jstween
 * @author: Shrek.wang
 **/

(function (factory) {

    if (typeof define === 'function' && define.amd) {
        define(['exports'], function (exports) {
            window.JT = factory(exports);
        });
    } else if (typeof exports !== 'undefined') {
        factory(exports);
    } else {
        window.JT = factory({});
    }

}(function (JT) {
    // --------------------------------------------------------------------辅助方法
    function each(obj, callback) {
        if (obj.length && obj.length > 0) {
            for (var i = 0; i < obj.length; i++) {
                callback.call(obj[i], i, obj[i]);
            }
        } else {
            callback.call(obj, 0, obj);
        }
    }

    //  WebkitTransform 转 -webkit-transform
    function hyphenize(str) {
        return str.replace(/([A-Z])/g, "-$1").toLowerCase();
    }

    //  webkitTransform 转 WebkitTransform
    function firstUper(str) {
        return str.replace(/\b(\w)|\s(\w)/g, function (m) {
            return m.toUpperCase();
        });
    }

    function fixed3(n) {
        return Math.round(n * 1000) / 1000;
    }


    // --------------------------------------------------------------------time fix
    Date.now = (Date.now || function () {
        return new Date().getTime();
    });

    var nowOffset = Date.now();

    JT.now = function () {
        return Date.now() - nowOffset;
    };


    // --------------------------------------------------------------------prefix
    var prefix = '';

    (function () {
        var _d = document.createElement('div');
        var _prefixes = ['Webkit', 'Moz', 'Ms', 'O'];

        for (var i in _prefixes) {
            if ((_prefixes[i] + 'Transform') in _d.style) {
                prefix = _prefixes[i];
                break;
            }
        }
    }());

    function browserPrefix(str) {
        if (str) {
            return prefix + firstUper(str);
        } else {
            return prefix;
        }
    }

    var requestFrame = window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.oRequestAnimationFrame ||
        window.msRequestAnimationFrame ||
        function (callback) {
            window.setTimeout(callback, 1000 / 60);
        };


    // --------------------------------------------------------------------dom style相关方法
    function getElement(target) {
        if (!target) throw "target is undefined, can't tween!!!";

        if (typeof(target) == 'string') {
            return (typeof(document) === 'undefined') ? target : (document.querySelectorAll ? document.querySelectorAll(target) : document.getElementById((target.charAt(0) === '#') ? target.substr(1) : target));
        } else {
            return target;
        }
    }

    function checkPropName(target, name) {
        if (name == 'rotation' || name == 'scale') return name;

        if (target._jt_obj[name] !== undefined) return name;

        if (target.style[name] !== undefined) return name;

        name = browserPrefix(name);
        if (target.style[name] !== undefined) return name;

        return undefined;
    }

    function checkValue(o1, o2, o3, push) {
        var o = {};
        if (o2 instanceof Array) {
            o.num = [];
            for (var i in o2) {
                var _o = calcValue(o1, o2[i]);
                o.num[i] = _o.num;
                o.unit = _o.unit;
            }
            if (o3 != undefined) {
                if (push) {
                    o.num.push(o3.num);
                } else {
                    o.num.unshift(o3.num);
                }
            }
        } else {
            o = calcValue(o1, o2);
        }
        return o;
    }

    function calcValue(o1, o2) {
        var _o = regValue(o2);

        if (o1.unit == 'rem' && _o.unit != 'rem') {
            checkRem();
            o1.num = fixed3(o1.num * remUnit);
            o1.unit = 'px'
        } else if (o1.unit != 'rem' && _o.unit == 'rem') {
            checkRem();
            o1.num = fixed3(o1.num / remUnit);
            o1.unit = 'rem';
        }

        var _value;
        switch (_o.ext) {
            case '+=':
                _value = o1.num + _o.num;
                break;
            case '-=':
                _value = o1.num - _o.num;
                break;
            default:
                _value = _o.num;
                break;
        }
        return {num: _value, unit: _o.unit || o1.unit};
    }

    function checkJtobj(target) {
        if (target._jt_obj == undefined)
            target._jt_obj = {
                perspective: 0,
                x: 0,
                y: 0,
                z: 0,
                rotationX: 0,
                rotationY: 0,
                rotationZ: 0,
                scaleX: 1,
                scaleY: 1,
                scaleZ: 1,
                skewX: 0,
                skewY: 0,
            };
    }

    function regValue(value) {
        var _r = /(\+=|-=|)(-|)(\d+\.\d+|\d+)(e[+-]?[0-9]{0,2}|)(rem|px|%|)/i;
        var _a = _r.exec(value);
        if (_a) return {num: fixed3(_a[2] + _a[3] + _a[4]), unit: _a[5], ext: _a[1]};
        else return {num: 0, unit: 'px', ext: ''};
    }

    function checkString(value) {
        return /(,| |jpeg|jpg|png|gif|-3d)/g.test(value) || !/\d/g.test(value);
    }

    function getProp(target, name) {
        switch (name) {
            case 'perspective':
            case 'x':
            case 'y':
            case 'z':
            case 'rotationX':
            case 'rotationY':
            case 'rotationZ':
            case 'scaleX':
            case 'scaleY':
            case 'scaleZ':
            case 'skewX':
            case 'skewY':
                return target._jt_obj[name];
            case 'rotation':
                return target._jt_obj['rotationZ'];
            case 'scale':
                return target._jt_obj['scaleX'];
            default:
                return getStyle(target, name);
        }
    }

    function getStyle(target, name) {
        if (target.style[name]) {
            return target.style[name];
        } else if (document.defaultView && document.defaultView.getComputedStyle) {
            var _p = hyphenize(name);
            var _s = document.defaultView.getComputedStyle(target, '');
            return _s && _s.getPropertyValue(_p);
        } else if (target.currentStyle) {
            return target.currentStyle[name];
        } else {
            return null;
        }
    }

    function setProp(target, name, value) {
        switch (name) {
            case 'perspective':
            case 'x':
            case 'y':
            case 'z':
            case 'rotationX':
            case 'rotationY':
            case 'rotationZ':
            case 'scaleX':
            case 'scaleY':
            case 'scaleZ':
            case 'skewX':
            case 'skewY':
                target._jt_obj[name] = value;
                return true;
            case 'rotation':
                target._jt_obj['rotationZ'] = value;
                return true;
            case 'scale':
                target._jt_obj['scaleX'] = value;
                target._jt_obj['scaleY'] = value;
                return true;
            default:
                setStyle(target, name, value);
                return false;
        }
    }

    function setStyle(target, name, value) {
        target.style[name] = value;
    }

    function isDOM(obj) {
        return typeof(obj) === 'object' && obj.nodeType === 1;
    }

    function updateTransform(obj) {
        var _t = '';
        if (obj._jt_obj.perspective) _t += 'perspective(' + obj._jt_obj.perspective + ') ';
        if (obj._jt_obj.x || obj._jt_obj.y || obj._jt_obj.z) _t += 'translate3d(' + checkNumber(obj._jt_obj.x) + ',' + checkNumber(obj._jt_obj.y) + ',' + checkNumber(obj._jt_obj.z) + ') ';
        if (obj._jt_obj.rotationX) _t += 'rotateX(' + obj._jt_obj.rotationX % 360 + 'deg) ';
        if (obj._jt_obj.rotationY) _t += 'rotateY(' + obj._jt_obj.rotationY % 360 + 'deg) ';
        if (obj._jt_obj.rotationZ) _t += 'rotateZ(' + obj._jt_obj.rotationZ % 360 + 'deg) ';
        if (obj._jt_obj.scaleX != 1 || obj._jt_obj.scaleY != 1 || obj._jt_obj.scaleZ != 1) _t += 'scale3d(' + obj._jt_obj.scaleX + ', ' + obj._jt_obj.scaleY + ', ' + obj._jt_obj.scaleZ + ') ';
        if (obj._jt_obj.skewX || obj._jt_obj.skewY) _t += 'skew(' + obj._jt_obj.skewX + 'deg,' + obj._jt_obj.skewY + 'deg) ';
        obj.style[browserPrefix('transform')] = _t;
    }

    function checkNumber(value) {
        return value + (typeof(value) == 'number' ? 'px' : '');
    }

    // --------------------------------------------------------------------计算1rem单位值
    var body, tempDiv, remUnit;

    function checkRem() {
        if (!tempDiv) {
            tempDiv = document.createElement('div');
            tempDiv.style.cssText = 'border:0 solid; position:absolute; line-height:0px;';
        }
        if (!body) {
            body = document.getElementsByTagName('body')[0];
        }

        body.appendChild(tempDiv);
        tempDiv.style.borderLeftWidth = '1rem';
        remUnit = parseFloat(tempDiv.offsetWidth);
        body.removeChild(tempDiv);
    }


    // --------------------------------------------------------------------全局update
    var tweens = [];
    var tempTweens = [];
    var isUpdating = false;
    var lastTime = 0;

    function globalUpdate() {
        var _len = tweens.length;
        if (_len === 0) {
            isUpdating = false;
            return;
        }

        var _now = JT.now();
        var _step = _now - lastTime;
        lastTime = _now;

        tempTweens = tweens.slice(0);
        for (var i = 0; i < _len; i++) {
            var _tween = tempTweens[i];
            if (_tween && _tween.isPlaying && !_tween._update(_step)) _tween.pause();
        }

        requestFrame(globalUpdate);
    }

    // --------------------------------------------------------------------tween
    function tween() {
        this.initialize.apply(this, arguments);
    }

    Object.assign(tween.prototype, {
        initialize: function (target, time, fromVars, toVars, isDom) {
            this.fromVars = fromVars;
            this.curVars = {};
            this.toVars = toVars;
            this.target = target;
            this.duration = Math.max(time, 0) * 1000;
            this.ease = toVars.ease || JT.Linear.None;
            this.delay = Math.max(toVars.delay || 0, 0) * 1000;
            this.yoyo = toVars.yoyo || false;
            this.repeat = toVars.repeat || 0;
            this.repeatDelay = Math.max(toVars.repeatDelay || 0, 0) * 1000;
            this.onStart = toVars.onStart || null;
            this.onStartScope = toVars.onStartScope || this;
            this.onStartParams = toVars.onStartParams || [];
            this.onRepeat = toVars.onRepeat || null;
            this.onRepeatScope = toVars.onRepeatScope || this;
            this.onRepeatParams = toVars.onRepeatParams || [];
            this.onEnd = toVars.onEnd || null;
            this.onEndScope = toVars.onEndScope || this;
            this.onEndParams = toVars.onEndParams || [];
            this.onUpdate = toVars.onUpdate || null;
            this.onUpdateScope = toVars.onUpdateScope || this;
            this.onUpdateParams = toVars.onUpdateParams || [];
            this.isPlaying = false;
            this.interpolation = toVars.interpolation || null;
            this.isReverse = toVars.isReverse || false;
            this.timeScale = toVars.timeScale || 1;

            this.isKeep = false;
            this.isYoReverse = false;
            this.isDom = isDom;

            this.startTime = this.delay;
            this.endTime = this.repeat < 0 ? 999999999999 : (this.startTime + this.repeatDelay * this.repeat + this.duration * (this.repeat + 1));
            this.curTime = this.prevTime = 0;

            if (toVars.isPlaying == undefined ? true : toVars.isPlaying) this.play();

        },

        _update: function (time) {
            this.isKeep = false;

            time = this.isReverse ? (-time * this.timeScale) : (time * this.timeScale);
            this.prevTime = this.curTime;
            this.curTime = this.prevTime + time;
            // console.log(this.isReverse, time,this.prevTime,this.curTime,this.endTime);

            if (this.isReverse && this.prevTime >= 0 && this.curTime < 0) {
                this.curTime = 0;
                this._updateProp();
                if (this.onStart && this.prevTime >= this.startTime) this.onStart.apply(this.onStartScope, this.onStartParams);
                return this.isKeep;
            } else if (!this.isReverse && this.prevTime < this.endTime && this.curTime >= this.endTime) {
                this.curTime = this.endTime;
                this._updateProp();
                if (this.onEnd) this.onEnd.apply(this.onEndScope, this.onEndParams);
                return this.isKeep;
            } else {
                var _repeat = this.repeat < 0 ? 999999999999 : this.repeat;
                var _prevRepeat = Math.min(_repeat, Math.max(0, Math.floor((this.prevTime - this.startTime) / (this.duration + this.repeatDelay))));
                var _curRepeat = Math.min(_repeat, Math.max(0, Math.floor((this.curTime - this.startTime) / (this.duration + this.repeatDelay))));
                if (_prevRepeat != _curRepeat) {
                    if (this.yoyo) this.isYoReverse = !this.isYoReverse;
                    if (this.onRepeat) this.onRepeat.apply(this.onRepeatScope, this.onRepeatParams);
                }

                this._updateProp();

                if (this.onEnd && this.isReverse && this.prevTime == this.endTime && this.curTime < this.endTime) this.onEnd.apply(this.onEndScope, this.onEndParams);

                if (this.onStart && (this.isReverse ? (this.prevTime >= this.startTime && this.curTime < this.startTime) : ((this.startTime == 0 && this.prevTime == 0 && this.curTime >= this.startTime) || (this.prevTime < this.startTime && this.curTime >= this.startTime)))) this.onStart.apply(this.onStartScope, this.onStartParams);

                return true;
            }

        },

        _updateProp: function () {
            var _time = this.curTime == this.endTime ? this.duration : ((this.curTime - this.startTime) % (this.duration + this.repeatDelay));

            var _elapsed = Math.max(0, Math.min(1, this.duration == 0 ? 1 : (_time / this.duration)));

            if (this.isYoReverse) _elapsed = 1 - _elapsed;

            var _radio = this.ease(_elapsed);

            var _trans = false;

            for (var prop in this.fromVars) {
                var _start = this.fromVars[prop];
                var _end = this.toVars[prop];

                var _n;
                if (_end.num instanceof Array) {
                    _n = this.interpolation(_end.num, _radio);
                } else {
                    _n = _start.num + ( _end.num - _start.num ) * _radio;
                }

                _n = fixed3(_n);
                this.curVars[prop] = {num: _n, unit: _end.unit};

                if (this.isDom) {
                    if (setProp(this.target, prop, _n + (_end.unit || 0))) _trans = true;
                } else {
                    this.target[prop] = _n + (_end.unit || 0);
                }
            }

            if (_trans) updateTransform(this.target);

            if (this.onUpdate) this.onUpdate.apply(this.onUpdateScope, this.onUpdateParams);
        },

        _toEnd: function () {
            var _trans = false;

            for (var prop in this.fromVars) {
                var _end = this.toVars[prop];

                var _n = fixed3(_end.num);
                this.curVars[prop] = {num: _n, unit: _end.unit};

                if (this.isDom) {
                    if (setProp(this.target, prop, _n + (_end.unit || 0))) _trans = true;
                } else {
                    this.target[prop] = _n + (_end.unit || 0);
                }
            }

            if (_trans) updateTransform(this.target);
        },

        _addSelf: function () {
            tweens.push(this);

            if (!isUpdating) {
                lastTime = JT.now();
                isUpdating = true;
                requestFrame(globalUpdate);
            }
        },

        _removeSelf: function () {
            var i = tweens.indexOf(this);
            if (i !== -1) tweens.splice(i, 1);
        },

        play: function (time) {
            this.isKeep = true;
            this.isReverse = false;

            if (time !== undefined) this.seek(time);
            // else this._updateProp(this.curTime);

            if (this.isPlaying) return;
            this.isPlaying = true;
            this._addSelf();
        },

        pause: function () {
            this.isKeep = false;

            if (!this.isPlaying) return;
            this.isPlaying = false;
            this._removeSelf();
        },

        stop: function () {
            this.pause();
            this.curTime = this.prevTime = 0;
        },

        reverse: function (time) {
            this.isKeep = true;
            this.isReverse = true;

            if (time !== undefined) this.seek(time);

            if (this.isPlaying) return;
            this.isPlaying = true;
            this._addSelf();
        },

        seek: function (time) {
            var _time = Math.max(0, Math.min(this.endTime, time * 1000));
            if (this.curTime == _time) return;

            this.curTime = _time;
            this._updateProp();
        },

        setTimeScale: function (scale) {
            this.timeScale = scale;
        },

        kill: function (toEnd) {
            this.pause();
            if (toEnd) {
                this._toEnd();
                if (this.onEnd) this.onEnd.apply(this.onEndScope, this.onEndParams);
            }
            this.duration = 0;
            this.curTime = this.prevTime = this.startTime = this.endTime = 0;
            this.target = this.onStart = this.onRepeat = this.onEnd = this.onUpdate = null;
        }
    });


    // --------------------------------------------------------------------tween 全局方法
    function addTween(type, target, time, fromVars, toVars) {
        switch (type) {
            case 'from':
                checkBezier(fromVars);
                break;
            default:
                checkBezier(toVars);
                break;
        }

        var _target = getElement(target);
        var _tweens = [];
        each(_target, function (index, obj) {
            var _fromVars = {};
            var _toVars = {};
            var _isDom = isDOM(obj);
            var _vars;
            switch (type) {
                case 'fromTo':
                    _vars = toVars;
                    break;
                case 'from':
                    _vars = fromVars;
                    break;
                case 'to':
                    _vars = toVars;
                    break;
            }

            if (_isDom) {
                checkJtobj(obj);
                for (var i in _vars) {
                    var _name = checkPropName(obj, i);
                    if (_name) {
                        var _o = regValue(getProp(obj, _name));
                        switch (type) {
                            case 'fromTo':
                                _fromVars[_name] = checkValue(_o, fromVars[i]);
                                _toVars[_name] = checkValue(_o, toVars[i], _fromVars[_name], false);
                                break;
                            case 'from':
                                _fromVars[_name] = checkValue(_o, fromVars[i], _o, true);
                                _toVars[_name] = _o;
                                break;
                            case 'to':
                                _fromVars[_name] = _o;
                                _toVars[_name] = checkValue(_o, toVars[i], _o, false);
                                break;
                        }
                    } else {
                        _toVars[i] = _vars[i];
                    }
                }
            } else {
                for (var i in _vars) {
                    if (typeof(obj[i]) == 'string' || typeof(obj[i]) == 'number') {
                        var _o = regValue(obj[i]);
                        switch (type) {
                            case 'fromTo':
                                _fromVars[i] = checkValue(_o, fromVars[i]);
                                _toVars[i] = checkValue(_o, toVars[i], _fromVars[i], false);
                                break;
                            case 'from':
                                _fromVars[i] = checkValue(_o, fromVars[i], _o, true);
                                _toVars[i] = _o;
                                break;
                            case 'to':
                                _fromVars[i] = _o;
                                _toVars[i] = checkValue(_o, toVars[i], _o, false);
                                break;
                        }
                    } else {
                        _toVars[i] = _vars[i];
                    }
                }
            }
            _tweens.push(new tween(obj, time, _fromVars, _toVars, _isDom));
        });

        if (_tweens.length == 1) return _tweens[0];
        else return _tweens;
    }

    Object.assign(JT, {
        get: function (target, param) {
            var _target = getElement(target);
            if (_target.length !== undefined) {
                _target = _target[0];
            }
            if (isDOM(_target)) {
                checkJtobj(_target);
                var _name = checkPropName(_target, param);
                if (_name) return getProp(_target, _name);
                else return null;
            } else {
                return _target[param];
            }
        },

        set: function (target, params) {
            var _target = getElement(target);
            each(_target, function (index, obj) {
                if (isDOM(obj)) {
                    checkJtobj(obj);
                    var _trans = false;
                    for (var i in params) {
                        var _name = checkPropName(obj, i);
                        if (_name) {
                            if (checkString(params[i])) {
                                setProp(obj, _name, params[i]);
                            } else {
                                var _o = checkValue(regValue(getProp(obj, _name)), params[i]);
                                if (setProp(obj, _name, _o.num + (_o.unit || 0))) _trans = true;
                            }
                        }
                    }

                    if (_trans) updateTransform(obj);

                } else {
                    for (var j in params) {
                        var _o = checkValue(regValue(obj[j]), params[j]);
                        obj[j] = _o.num + (_o.unit || 0);
                    }
                }
            });
        },

        fromTo: function (target, time, fromVars, toVars) {
            return addTween('fromTo', target, time, fromVars, toVars);
        },

        from: function (target, time, fromVars) {
            return addTween('from', target, time, fromVars, {});
        },

        to: function (target, time, toVars) {
            return addTween('to', target, time, {}, toVars);
        },

        kill: function (target, toEnd) {
            var _target = getElement(target);
            each(_target, function (index, obj) {
                var _len = tweens.length;
                for (var i = _len - 1; i >= 0; i--) {
                    var _tween = tweens[i];
                    if (_tween.target === obj) {
                        _tween.kill(toEnd);
                    }
                }
            });
        },

        killAll: function (toEnd) {
            var _len = tweens.length;
            for (var i = _len - 1; i >= 0; i--) {
                var _tween = tweens[i];
                _tween.kill(toEnd);
            }
        },

        play: function (target, time) {
            actionProxyTween(target, 'play', time);
        },

        playAll: function (time) {
            actionProxyAllTweens('play', time);
        },

        pause: function (target) {
            actionProxyTween(target, 'pause');
        },

        pauseAll: function () {
            actionProxyAllTweens('pause');
        },

        stop: function (target) {
            actionProxyTween(target, 'stop');
        },

        stopAll: function () {
            actionProxyAllTweens('stop');
        },

        reverse: function (target, time) {
            actionProxyTween(target, 'reverse', time);
        },

        reverseAll: function (time) {
            actionProxyAllTweens('reverse', time);
        },

        seek: function (target, time) {
            actionProxyTween(target, 'seek', time);
        },

        seekAll: function (time) {
            actionProxyAllTweens('seek', time);
        },

        setTimeScale: function (target, scale) {
            actionProxyTween(target, 'setTimeScale', scale);
        },

        setTimeScaleAll: function (scale) {
            actionProxyAllTweens('setTimeScale', scale);
        },

        isTweening: function (target) {
            var _target = getElement(target);
            _target = _target[0] || _target;
            var _len = tweens.length;
            for (var i = _len - 1; i >= 0; i--) {
                var _tween = tweens[i];
                if (_tween.target === _target) {
                    return true;
                }
            }
            return false;
        },

        call: function (time, callback, params, isPlaying) {
            return new tween(callback, time, {}, {onEnd: callback, onEndParams: params, isPlaying: isPlaying}, false);
        },

    });

    function actionProxyTween(target, action, params) {
        var _target = getElement(target);
        var _len = tweens.length;
        each(_target, function (index, obj) {
            for (var i = _len - 1; i >= 0; i--) {
                var _tween = tweens[i];
                if (_tween.target === obj) {
                    _tween[action](params);
                }
            }
        });
    }

    function actionProxyAllTweens(action, params) {
        var _len = tweens.length;
        for (var i = _len - 1; i >= 0; i--) {
            var _tween = tweens[i];
            _tween[action](params);
        }
    }


    // --------------------------------------------------------------------bezier
    Object.assign(JT, {
        path: function (obj) {
            checkBezier(obj);
            var _ease = obj.ease || JT.Linear.None;
            var _step = obj.step || 1;

            var _radio, _arr = [];
            for (var i = 0; i <= _step; i++) {
                _radio = _ease(i / _step);
                var _o = {};
                for (var j in obj) {
                    if (obj[j] instanceof Array) {
                        _o[j] = obj.interpolation(obj[j], _radio);
                    }
                }
                _arr.push(_o);
            }
            return _arr;
        }
    });

    function checkBezier(obj) {
        if (obj.bezier) {
            sortBezier(obj, obj.bezier);
            obj.interpolation = Bezier;
            delete obj.bezier;
        }
        if (obj.through) {
            sortBezier(obj, obj.through);
            obj.interpolation = Through;
            delete obj.through;
        }
        if (obj.linear) {
            sortBezier(obj, obj.linear);
            obj.interpolation = Linear;
            delete obj.linear;
        }
    }

    function sortBezier(target, arr) {
        for (var i in arr) {
            for (var j in arr[i]) {
                if (i == 0) {
                    target[j] = [arr[i][j]];
                } else {
                    target[j].push(arr[i][j]);
                }
            }
        }
    }

    function Linear(v, k) {
        var m = v.length - 1, f = m * k, i = Math.floor(f), fn = Utils.Linear;
        if (k < 0) return fn(v[0], v[1], f);
        if (k > 1) return fn(v[m], v[m - 1], m - f);
        return fn(v[i], v[i + 1 > m ? m : i + 1], f - i);
    }

    function Bezier(v, k) {
        var b = 0, n = v.length - 1, pw = Math.pow, bn = Utils.Bernstein, i;
        for (i = 0; i <= n; i++) {
            b += pw(1 - k, n - i) * pw(k, i) * v[i] * bn(n, i);
        }
        return b;
    }

    function Through(v, k) {
        var m = v.length - 1, f = m * k, i = Math.floor(f), fn = Utils.Through;
        if (v[0] === v[m]) {
            if (k < 0) i = Math.floor(f = m * ( 1 + k ));
            return fn(v[( i - 1 + m ) % m], v[i], v[( i + 1 ) % m], v[( i + 2 ) % m], f - i);
        } else {
            if (k < 0) return v[0] - ( fn(v[0], v[0], v[1], v[1], -f) - v[0] );
            if (k > 1) return v[m] - ( fn(v[m], v[m], v[m - 1], v[m - 1], f - m) - v[m] );
            return fn(v[i ? i - 1 : 0], v[i], v[m < i + 1 ? m : i + 1], v[m < i + 2 ? m : i + 2], f - i);
        }
    }

    var Utils = {
        Linear: function (p0, p1, t) {
            return ( p1 - p0 ) * t + p0;
        },

        Bernstein: function (n, i) {
            var fc = Utils.Factorial;
            return fc(n) / fc(i) / fc(n - i);
        },

        Factorial: (function () {
            var a = [1];
            return function (n) {
                var s = 1, i;
                if (a[n]) return a[n];
                for (i = n; i > 1; i--) s *= i;
                return a[n] = s;
            };
        })(),

        Through: function (p0, p1, p2, p3, t) {
            var v0 = ( p2 - p0 ) * 0.5, v1 = ( p3 - p1 ) * 0.5, t2 = t * t, t3 = t * t2;
            return ( 2 * p1 - 2 * p2 + v0 + v1 ) * t3 + ( -3 * p1 + 3 * p2 - 2 * v0 - v1 ) * t2 + v0 * t + p1;
        }
    };


    // --------------------------------------------------------------------缓动选项
    Object.assign(JT, {
        Linear: {
            None: function (k) {
                return k;
            }
        },
        Quad: {
            In: function (k) {
                return k * k;
            },
            Out: function (k) {
                return k * ( 2 - k );
            },
            InOut: function (k) {
                if (( k *= 2 ) < 1) return 0.5 * k * k;
                return -0.5 * ( --k * ( k - 2 ) - 1 );
            }
        },
        Cubic: {
            In: function (k) {
                return k * k * k;
            },
            Out: function (k) {
                return --k * k * k + 1;
            },
            InOut: function (k) {
                if (( k *= 2 ) < 1) return 0.5 * k * k * k;
                return 0.5 * ( ( k -= 2 ) * k * k + 2 );
            }
        },
        Quart: {
            In: function (k) {
                return k * k * k * k;
            },
            Out: function (k) {
                return 1 - ( --k * k * k * k );
            },
            InOut: function (k) {
                if (( k *= 2 ) < 1) return 0.5 * k * k * k * k;
                return -0.5 * ( ( k -= 2 ) * k * k * k - 2 );
            }
        },
        Quint: {
            In: function (k) {
                return k * k * k * k * k;
            },
            Out: function (k) {
                return --k * k * k * k * k + 1;
            },
            InOut: function (k) {
                if (( k *= 2 ) < 1) return 0.5 * k * k * k * k * k;
                return 0.5 * ( ( k -= 2 ) * k * k * k * k + 2 );
            }
        },
        Sine: {
            In: function (k) {
                return 1 - Math.cos(k * Math.PI / 2);
            },
            Out: function (k) {
                return Math.sin(k * Math.PI / 2);
            },
            InOut: function (k) {
                return 0.5 * ( 1 - Math.cos(Math.PI * k) );
            }
        },
        Expo: {
            In: function (k) {
                return k === 0 ? 0 : Math.pow(1024, k - 1);
            },
            Out: function (k) {
                return k === 1 ? 1 : 1 - Math.pow(2, -10 * k);
            },
            InOut: function (k) {
                if (k === 0) return 0;
                if (k === 1) return 1;
                if (( k *= 2 ) < 1) return 0.5 * Math.pow(1024, k - 1);
                return 0.5 * ( -Math.pow(2, -10 * ( k - 1 )) + 2 );
            }
        },
        Circ: {
            In: function (k) {
                return 1 - Math.sqrt(1 - k * k);
            },
            Out: function (k) {
                return Math.sqrt(1 - ( --k * k ));
            },
            InOut: function (k) {
                if (( k *= 2 ) < 1) return -0.5 * ( Math.sqrt(1 - k * k) - 1);
                return 0.5 * ( Math.sqrt(1 - ( k -= 2) * k) + 1);
            }
        },
        Elastic: {
            In: function (k) {
                var s, a = 0.1, p = 0.4;
                if (k === 0) return 0;
                if (k === 1) return 1;
                if (!a || a < 1) {
                    a = 1;
                    s = p / 4;
                }
                else s = p * Math.asin(1 / a) / ( 2 * Math.PI );
                return -( a * Math.pow(2, 10 * ( k -= 1 )) * Math.sin(( k - s ) * ( 2 * Math.PI ) / p) );
            },
            Out: function (k) {
                var s, a = 0.1, p = 0.4;
                if (k === 0) return 0;
                if (k === 1) return 1;
                if (!a || a < 1) {
                    a = 1;
                    s = p / 4;
                }
                else s = p * Math.asin(1 / a) / ( 2 * Math.PI );
                return ( a * Math.pow(2, -10 * k) * Math.sin(( k - s ) * ( 2 * Math.PI ) / p) + 1 );
            },
            InOut: function (k) {
                var s, a = 0.1, p = 0.4;
                if (k === 0) return 0;
                if (k === 1) return 1;
                if (!a || a < 1) {
                    a = 1;
                    s = p / 4;
                }
                else s = p * Math.asin(1 / a) / ( 2 * Math.PI );
                if (( k *= 2 ) < 1) return -0.5 * ( a * Math.pow(2, 10 * ( k -= 1 )) * Math.sin(( k - s ) * ( 2 * Math.PI ) / p) );
                return a * Math.pow(2, -10 * ( k -= 1 )) * Math.sin(( k - s ) * ( 2 * Math.PI ) / p) * 0.5 + 1;
            }
        },
        Back: {
            In: function (k) {
                var s = 1.70158;
                return k * k * ( ( s + 1 ) * k - s );
            },
            Out: function (k) {
                var s = 1.70158;
                return --k * k * ( ( s + 1 ) * k + s ) + 1;
            },
            InOut: function (k) {
                var s = 1.70158 * 1.525;
                if (( k *= 2 ) < 1) return 0.5 * ( k * k * ( ( s + 1 ) * k - s ) );
                return 0.5 * ( ( k -= 2 ) * k * ( ( s + 1 ) * k + s ) + 2 );
            }
        },
        Bounce: {
            In: function (k) {
                return 1 - JT.Bounce.Out(1 - k);
            },
            Out: function (k) {
                if (k < ( 1 / 2.75 )) {
                    return 7.5625 * k * k;
                } else if (k < ( 2 / 2.75 )) {
                    return 7.5625 * ( k -= ( 1.5 / 2.75 ) ) * k + 0.75;
                } else if (k < ( 2.5 / 2.75 )) {
                    return 7.5625 * ( k -= ( 2.25 / 2.75 ) ) * k + 0.9375;
                } else {
                    return 7.5625 * ( k -= ( 2.625 / 2.75 ) ) * k + 0.984375;
                }
            },
            InOut: function (k) {
                if (k < 0.5) return JT.Bounce.In(k * 2) * 0.5;
                return JT.Bounce.Out(k * 2 - 1) * 0.5 + 0.5;
            }
        }
    });

    return JT;
}));
