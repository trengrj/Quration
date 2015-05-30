/*global THREE kaikai LoadAudio cursor util*/
var SCALE = 3;

(function () {
    var root = this;

    function Cursor() {
        var geometry = new THREE.RingGeometry(
            0.85 * Cursor.SIZE * SCALE, 1 * Cursor.SIZE * SCALE, 32
        );
        var material = new THREE.MeshBasicMaterial(
            {color: 0xffffff, blending: THREE.AdditiveBlending, side: THREE.DoubleSide}
        );
        THREE.Mesh.call(this, geometry, material);
    }

    Cursor.SIZE = 0.1 * SCALE;
    Cursor.prototype = Object.create(THREE.Mesh.prototype);
    Cursor.prototype.constructor = Cursor;

    function Demo(info) {
        THREE.Object3D.call(this);

        this.slug = info.slug;
        this.href = info.href;

        var geometry = new THREE.PlaneGeometry((info.slug == "back") ? 12 : this.width, (info.slug == "back") ? 12 : this.height);
        var texture = THREE.ImageUtils.loadTexture(info.preview);
        var material = new THREE.MeshBasicMaterial({map: texture, transparent: true});
        var plane = new THREE.Mesh(geometry, material);
        this.add(plane);
    }

    Demo.prototype = Object.create(THREE.Object3D.prototype);
    Demo.prototype.constructor = Demo;
    Demo.prototype.width = 1.5 * SCALE;
    Demo.prototype.height = 1.5 * SCALE;

    // highlight shows it for selection
    Demo.prototype.highlight = function () {
        console.log('highlight');
        this.object.material.color.setHex(0xff0000);
    };

    // begin private gallery setup functions
    function lookToClick() {
        // create the raycaster
        this.projector = new THREE.Projector();
        this.raycaster = new THREE.Raycaster();
    }

    var RADIUS = 6 * SCALE;

    function addDemos(demos) {
        this.intersectables = [];
        var hl = 2.9;
        for (var i = 0; i < demos.length; i++) {
            var demo = new Demo(demos[i]);
            window.demo = demo;
            var theta = (i + hl) * 0.4;
            demo.position.x = RADIUS * Math.cos(theta);
            demo.position.z = 1 + RADIUS * Math.sin(theta);
            demo.position.y = -2;
            demo.lookAt(kaikai.camera.position);
            this.add(demo);
            this.intersectables.push(demo.children[0]);
        }
    }

    function addBack(demos) {
        if (typeof(BACK) == 'undefined' || BACK == null) {
            return;
        }
        var hl = 1.25;
        var demo = new Demo(BACK);
        window.demo = demo;
        var theta = (4 + hl) * 0.3;
        demo.position.x = RADIUS * Math.cos(theta);
        demo.position.z = RADIUS * Math.sin(theta) - 2;
        demo.position.y = -25;
        demo.lookAt(kaikai.camera.position);
        this.add(demo);
        this.intersectables.push(demo.children[0]);
    }

    function setupPhotosphere() {
        var sphere = new THREE.Mesh(
            new THREE.SphereGeometry(100, 20, 20),
            new THREE.MeshBasicMaterial({
                map: THREE.ImageUtils.loadTexture(SCENE)
            })
        );
        sphere.scale.x = -1;
        this.add(sphere);
    }

    // end private gallery setup functions

    function Gallery(demos) {
        THREE.Object3D.call(this);

        lookToClick.bind(this)();
        addDemos.bind(this)(demos);
        addBack.bind(this)(demos);

        // skybox
        setupPhotosphere.bind(this)();

        this.openSound = this.selectSound = function () {
        };
        LoadAudio('static/audio/open.mp3', function (sound) {
            this.openSound = sound;
        }.bind(this));

        if (util.getParameterByName('music')) {
            LoadAudio('static/audio/champions.mp3', function (sound) {
                sound();
            });
        }

    }

    Gallery.prototype = Object.create(THREE.Object3D.prototype);
    Gallery.prototype.constructor = Gallery;

    var TTL = 100;
    Gallery.prototype.findIntersections = function () {
        var gaze = new THREE.Vector3(0, 0, 1);
        window.gaze = gaze;

        this.projector.unprojectVector(gaze, kaikai.camera);

        this.raycaster.set(
            kaikai.camera.position,
            gaze.sub(kaikai.camera.position).normalize()
        );

        var intersects = this.raycaster.intersectObjects(this.intersectables);

        // reset
        this.intersectables.forEach(function (i) {
            i.scale.set(1, 1, 1);
            i.position.z = 0;
        });
        cursor.scale.set(1, 1, 1);

        // if found
        if (intersects.length > 0) {
            var found = intersects[0];
            // highlight
            found.object.scale.set(1.2, 1.2, 1.2);
            found.object.position.z = 0.1;
            if (!this.selected) {
                //this.selectSound();
                //window.navigator.vibrate(30);
                this.selected = {id: found.object.uuid, ttl: TTL, obj: found.object};
            } else {
                if (this.selected.id == found.object.uuid) {
                    // decrement
                    this.selected.ttl -= 1;
                    var p = (this.selected.ttl / TTL);
                    cursor.scale.set(p, p, p);
                    if (this.selected.ttl <= 0) {
                        p = p * 100;
                        cursor.scale.set(p, p, p);
                        this.open(this.selected.obj.parent);
                        // cursor.scale.set(0,0,0);
                    }
                } else {
                    //this.selectSound();
                    //window.navigator.vibrate(30);
                    this.selected = {id: found.object.uuid, ttl: TTL, obj: found.object};
                }
            }
        } else {
            this.selected = null;
        }
    };

    var shade = document.getElementById('shade');
    root.shade = shade;

    Gallery.prototype.open = function (demo) {
        if (this.open.opening) {
            return;
        }
        ////////////////this.openSound();
        //window.navigator.vibrate(100);
        shade.style.backgroundColor = 'rgba(0,0,0,1)';
        this.open.opening = true;
        setTimeout(function () {
            window.top.openDemo({slug: demo.slug, href: demo.href});
            this.open.opening = false;
            this.selected = null;
            shade.style.backgroundColor = '';
        }.bind(this), 1000);
        console.log('open demo', demo.href);
        // window.location.href = demo.href;
    };

    root.openDemo = function (demo) {
        var url = demo.href;
        if (typeof(TYPE) != 'undefined' && TYPE != null) {
            url += '?type=' + TYPE;
        }
        window.location.href = url;
    };

    Gallery.prototype.update = function () {
        this.findIntersections();
    };

    // export
    root.Gallery = Gallery;
    root.Demo = Demo;
    root.Cursor = Cursor;

})();


var kaikai, gallery, cursor;

//var STEREO = (window.location.hash == "#stereo") ? true : false;
var STEREO = $('body').hasClass('stereo');

function setup() {

    kaikai = new Kaikai();

    gallery = new Gallery(DEMOS);
    kaikai.scene.add(gallery);

    cursor = new Cursor();
    kaikai.camera.add(cursor);
    cursor.position.z = -3 * SCALE;
    cursor.lookAt(kaikai.camera.position);

    if (STEREO) {
        kaikai.effect.separation = 0.6;
    }

    if (!has.mobile) {
        setTimeout(function () {
            kaikai.orbitControls.target.set(0, 0.3, 1);
        }, 0);
    }

    kaikai.update = function () {
        Kaikai.prototype.update.call(this);
        if (gallery != null) {
            gallery.update();
        }
    };

    document.getElementById('scene').appendChild(kaikai.renderer.domElement);

}

setup();


