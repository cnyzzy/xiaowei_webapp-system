var stageView = {
    scene: null,
    camera: null,
    renderer: null,
    gest: null,
    $main: $("#main"),
    timer: null,
    book: null,
    $body: $("#three"),
    isVinish: false,
    isEnd: false,
    isVinish: false,
    drag0x: 0,
    dragx: 0,
    cj: true,
    start: function() {
        var _this = this;
        _this.init();
    },
    init: function() {
        var r = 16748073;
        var _this = this;
        JT.set(this.$main, {
                transformOrigin: "0px 0px"
            }),
            this.scene = new THREE.Scene;
        this.scene.fog = new THREE.Fog(r, 350, 900);
        this.camera = new THREE.PerspectiveCamera(90, window.innerWidth / window.innerHeight, 1, 5e3);
        this.camera.position.set(-257, 0, 410);
        this.scene.add(this.camera);
        var light = new THREE.AmbientLight(16777215, 1); //环境光
        this.scene.add(light);
        this.renderer = new THREE.WebGLRenderer({
            antialias: !0
        });
        this.renderer.setClearColor(r);
        this.renderer.setPixelRatio(window.devicePixelRatio);
        this.renderer.setSize(window.innerWidth, window.innerHeight);
        $("#three").append(this.renderer.domElement);
        $(window).on("resize", function() {
            _this.resize()
        }).on("touchmove", function() {
            return !1
        });
        _this.resize();
        setTimeout(function() {
            _this.resize()
        }, 500);

        var mesh1 = new THREE.Mesh(new THREE.PlaneGeometry(512, 819), new THREE.MeshPhongMaterial({
            map: (new THREE.TextureLoader).load("app/gcdxy/model/img/person/bg.jpg"),
            fog: !1
        }));
        mesh1.scale.set(7, 7, 1);
        mesh1.position.set(0, 0, -2e3);
        this.scene.add(mesh1);
        this.book = new Book(512, 819);
        this.scene.add(this.book.el);
        this.gest = new Gesturer({
            el: this.$body[0]
        });
        this.gest.onTouchStart = function(e) {
                _this.isVinish || (_this.isVinish = !0);
                _this.drag0x = e.touches[0].pageX;
            },
            this.gest.onTouchMove = function(n) {
                _this.dragx = Math.max(-.02, Math.min(.02, 3e-4 * (n.touches[0].pageX - _this.drag0x)));
                _this.book.el.rotation.y < .1 && _this.dragx < 0 && (_this.dragx = 0);
                _this.book.el.rotation.y > _this.book.angleMax - .08 && _this.dragx > 0 && (_this.dragx = 0);
            },
            this.gest.onTouchEnd = function(n) {
                console.log(_this.book.el.rotation.y);

                _this.dragx = Math.max(-.02, Math.min(.02, 3e-4 * (n.changedTouches[0].pageX - _this.drag0x))),
                    _this.book.el.rotation.y < .1 && _this.dragx < 0 && (_this.dragx = 0),
                    _this.book.el.rotation.y > _this.book.angleMax - .08 && _this.dragx > 0 && (_this.dragx = 0)
                    if(_this.dragx==0){
                         var num = Math.floor(_this.book.el.rotation.y);
                         if(num>0){
                            if(num>4){
                                num=4;
                            }
                            cIndex= num;
                            $(".person").attr("src","app/gcdxy/model/img/info/n"+cIndex+".png");
                            $(".personHead").attr("src","app/gcdxy/model/img/photo/p"+cIndex+".png");
                             $(".page5").fadeIn(200); 
                         }
                        
                    }
                    
                    
            };
        this.animate = this.animate.bind(this);
        this.animate();

       
             this.isActive = !0,
             this.isVinish = !1,
             this.gest.on()
    },
    resize: function() {
        var t = Math.min(window.innerWidth / 640, window.innerHeight / 1040),
            e = Math.floor(window.innerWidth / t),
            i = Math.floor(window.innerHeight / t);
        JT.set(this.$main, {
                scale: t,
                width: e ,
                height: i 
            }),
            this.camera.aspect = window.innerWidth / window.innerHeight,
            this.camera.updateProjectionMatrix(),
            this.renderer.setSize(window.innerWidth, window.innerHeight)
    },
    animate: function() {
        var _this = this;
        if (this.cj) {
            if (this.dragx > 0.015) {
               
                this.cj = false;
            } else {
                if (this.book.el.rotation.y >= 1) {
                     this.cj = false;
                     this.dragx = 0.0021;
                } else {
                    this.dragx = 0.0021;
                }
            }
        }
      
        requestAnimationFrame(this.animate);

        if (this.isActive) {
            if (this.book.el.rotation.y < .1 && this.dragx < 0) {
                this.dragx *= .8
            }
            if (this.book.el.rotation.y > this.book.angleMax - 0.08 && this.dragx > 0) {
                this.dragx *= .8
            }
            this.book.el.rotation.y = this.dragx + this.book.el.rotation.y
        }
        this.book.checkPlane(),
            this.renderer.render(this.scene, this.camera)
    }
}

var picData = {
    root: "app/gcdxy/model/img/person/",
    basic: [{
            id: "b0",
            img: "1-0.png"
        },
    ],
    page: [{
            img: "m0.png"
        },{
            basic: "b0"
        },
        {
            basic: "b0"
        },
        {
            basic: "b0"
        },{
            img: "m1.png"
        },
        {
            basic: "b0"
        },
        {
            basic: "b0"
        },
        {
            basic: "b0"
        },
        {
            img: "m2.png"
        },
        {
            basic: "b0"
        },
        {
            basic: "b0"
        },
        {
            basic: "b0"
        },
        {
            img: "m3.png"
        },
        {
            basic: "b0"
        },
        {
            basic: "b0"
        },
        {
            basic: "b0"
        },
        {
             img: "m4.png"
        }
        
        
    ]

};




var Book = Bone.Class.extend({
    initialize: function(t, n) {
        this.preloadMax = 0,
            this.preloadId = 0,
            this.angleStep = 15,
            this.angleMax = this.angleStep * (picData.page.length - 1) / 180 * Math.PI,
            this.geo = new THREE.PlaneGeometry(t, n),
            this.geo.translate(-t /2, 0, 0),
            this.initBasic(),
            this.initPlane()
    },
    checkPreload: function() {
        console.log(this.angleMax)
        this.trigger("preloadProgress", Math.floor(this.preloadId / this.preloadMax * 100)),
            this.preloadId >= this.preloadMax && this.trigger("preloadComplete")
    },
    initBasic: function() {
        this.basic = {};
        for (var t = 0,
                n = picData.basic.length; t < n; t++) {
            var e = picData.basic[t];
            this.basic[e.id] = new THREE.MeshPhongMaterial({
                map: (new THREE.TextureLoader).load(picData.root + e.img),
                alphaTest: .5,
                transparent: !0
            })
        }
    },
    initPlane: function() {
        var t = this,
            n = new THREE.Group;
        this.planes = [];
        for (var e = 0,
                r = picData.page.length; e < r; e++) {
            var a = picData.page[e],
                o = null,
                s = null;
            a.basic && (o = this.basic[a.basic]),
                // 这种材质对光照也有反应,用于创建金属类明亮的物体
                a.img && (this.preloadMax++, s = new THREE.MeshPhongMaterial({
                    map: (new THREE.TextureLoader).load(picData.root + a.img,
                        function() {
                            t.preloadId++,
                                t.checkPreload()
                        }),
                    alphaTest: .5,
                    transparent: !0
                }));
            var c;
            if (o) {
                if (c = new THREE.Mesh(this.geo, o), c.rotation.set(0, -this.angleStep * e / 180 * Math.PI, 0), s) {
                    var u = new THREE.Mesh(this.geo, s);
                    c.add(u)
                }
            } else s && (c = new THREE.Mesh(this.geo, s), c.rotation.set(0, -this.angleStep * e / 180 * Math.PI, 0));
            n.add(c),
                this.planes.push(c)
        }
        this.el = n
    },
    checkPlane: function() {
        for (var t = this.planes.length,
                n = 0; n < t; n++) {
            var e = this.planes[n];
            Math.abs(-e.rotation.y - this.el.rotation.y) < .3 * Math.PI ? e.parent || this.el.add(e) : e.parent && this.el.remove(e)
        }


    }
});

