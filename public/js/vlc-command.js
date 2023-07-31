/*
 * node-ffi-vlc v0.0.2
 * Object-orientated libVLC bindings for node.js implemented in javascript using node-ffi
 * Not for production use, use at your own risk, do with what you will.
 * See libvlc docs for more info, http://www.videolan.org/developers/vlc/doc/doxygen/html/group__libvlc.html
 */
var EventEmitter = require('events').EventEmitter,
    FFI = require("node-ffi");

var libVLC = new FFI.Library("libvlc", {
    "libvlc_get_version": ["string", []],
    "libvlc_get_compiler": ["string", []],
    "libvlc_get_changeset": ["string", []],
    "libvlc_new": [ "pointer", ["int", "pointer"] ],
    "libvlc_release": [ "void", ["pointer"] ],
    "libvlc_media_new_location": ["pointer", ["pointer", "string"]],
    "libvlc_media_new_path": ["pointer", ["pointer", "string"]],
    "libvlc_media_add_option": ["void", ["pointer", "string"]],
    "libvlc_media_release": ["void", ["pointer"]],
    "libvlc_media_player_new": ["pointer", ["pointer"]],
    "libvlc_media_player_new_from_media": ["pointer", ["pointer"]],
    "libvlc_media_player_play": ["int", ["pointer"]],
    "libvlc_media_player_stop": ["void", ["pointer"]],
    "libvlc_media_player_release": ["void", ["pointer"]],
    "libvlc_media_player_event_manager": ["pointer", ["pointer"]],
    "libvlc_event_attach": ["int", ["pointer", "int", "pointer", "pointer"]]
});

var VLC = module.exports = function() {
    var parent = this;    
    this.inst = libVLC.libvlc_new(0, null);
    this.Media = function(inst) {
        if (inst instanceof FFI.Pointer) {
            this.inst = inst;
        } else {
            throw new Error("TypeError: Invalid parameters");
        }
        if (this.inst.address == 0) throw new Error("Library Error: NULL returned");
    };
    this.Media.fromLocation = function(location) {
        return new parent.Media( libVLC.libvlc_media_new_location(parent.inst, location) );
    };
    this.Media.fromPath = function(path) {
        return new parent.Media( libVLC.libvlc_media_new_path(parent.inst, path) );
    };
    this.Media.prototype.addOption = function(options) {
        libVLC.libvlc_media_add_option(this.inst, options);
    };
    this.Media.prototype.release = function() {
        libVLC.libvlc_media_release(this.inst);
    };
    this.MediaPlayer = function(inst) {
        if (inst instanceof FFI.Pointer) {
            this.inst = inst;
        } else if (inst instanceof parent.Media) {
            this.inst = libVLC.libvlc_media_player_new_from_media(inst.inst);
        } else if (arguments.length != 0) {
            throw new Error("TypeError: Invalid parameters");
        } else {
            this.inst = libVLC.libvlc_media_player_new(parent.inst);
        }
        if (this.inst.address == 0) throw new Error("Library Error: NULL returned");

        // set up events
        this.event_manager = libVLC.libvlc_media_player_event_manager(this.inst);
        this.on('newListener', Events.onNewListener('MediaPlayer', this.event_manager).bind(this));
    };
    this.MediaPlayer.prototype.__proto__ = EventEmitter.prototype;
    this.MediaPlayer.prototype.play = function() {
        libVLC.libvlc_media_player_play(this.inst);
    };
    this.MediaPlayer.prototype.stop = function() {
        libVLC.libvlc_media_player_stop(this.inst);
    };
    this.MediaPlayer.prototype.release = function() {
        libVLC.libvlc_media_player_release(this.inst);
    };

    var Events = {
        Map: {
            "MediaPlayerMediaChanged":     0x100,
            "MediaPlayerNothingSpecial":   0x101,
            "MediaPlayerOpening":          0x102,
            "MediaPlayerBuffering":        0x103,
            "MediaPlayerPlaying":          0x104,
            "MediaPlayerPaused":           0x105,
            "MediaPlayerStopped":          0x106,
            "MediaPlayerForward":          0x107,
            "MediaPlayerBackward":         0x108,
            "MediaPlayerEndReached":       0x109,
            "MediaPlayerEncounteredError": 0x10a,
            "MediaPlayerTimeChanged":      0x10b,
            "MediaPlayerPositionChanged":  0x10c,
            "MediaPlayerSeekableChanged":  0x10d,
            "MediaPlayerPausableChanged":  0x10e,
            "MediaPlayerTitleChanged":     0x10f,
            "MediaPlayerSnapshotTaken":    0x110,
            "MediaPlayerLengthChanged":    0x111,
            "MediaPlayerVout":             0x112
        },
        callback: function(ev) {
            var type = ev.getInt();
            for (event in Events.Map) {
                if (type == Events.Map[event]){
                    return this.emit(event);
                }
            }
        },
        onNewListener: function(module, event_manager) {
            var len = module.length;
            return function(ev, fn) {
                if (ev.substring(0, len) != module || !Events.Map[ev]) return;
                var callback = new FFI.Callback(["void", ["pointer","pointer"]], Events.callback.bind(this));
                libVLC.libvlc_event_attach(event_manager, Events.Map[ev], callback.getPointer(), null);
            };
        }
    }
};
VLC.prototype.release = function() {
    libVLC.libvlc_release(this.inst);
};
VLC.__defineGetter__('version', function() {
    return libVLC.libvlc_get_version();
});
VLC.__defineGetter__('compiler', function() {
    return libVLC.libvlc_get_compiler();
});
VLC.__defineGetter__('changeset', function() {
    return libVLC.libvlc_get_changeset();
});