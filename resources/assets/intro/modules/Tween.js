module.exports = (function (e) {

    /**
     * Append Camera to Engine
     */
    return e.tween = {

        tween: null,

        init: function () {
            this.tween = this;
        },

        create: function (obj, ease, callback, context) {

            /**
             * if not an object then assume it is a duration only
             */
            if (!e.helpers.isObject(ease))
                ease = {duration: ease};

            var defaults = {
                begin: 0,
                ease: 'quintInOut',
                duration: 1
            };

            e.helpers.extend(defaults, ease);

            /**
             * amplify to time base
             * @type {number}
             */
            defaults.duration *= 1000;

            var instance = {},
                checker  = e.module('checker').class;

            checker.add(function (elapsed_time) {

                if (elapsed_time <= defaults.duration) {

                    var progress = elapsed_time / defaults.duration;

                    instance = e.helpers.map(obj, function (value) {
                        return Easie[defaults.ease](progress, defaults.begin, value, 1);
                    });

                    /**
                     * Call the Call Back
                     */
                    callback.call(context || e, instance);

                } else {

                    /**
                     * Destroy Checker
                     */
                    return true;

                }

            }, this);

        },

        add: function (target, duration, vars) {
            return new TweenLite(target, duration, vars);
        }

    };

})(Engine);