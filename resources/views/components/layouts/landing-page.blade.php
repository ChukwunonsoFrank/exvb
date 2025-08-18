<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bullfex - AI Trading Robot</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preload" href="{{ asset('wp-content/uploads/2024/06/space-cover.webp') }}" as="image">
    <link rel="preload" href="{{ asset('wp-content/uploads/2024/06/door-2.webp') }}" as="image">
    <link rel="preload" href="{{ asset('wp-content/uploads/2024/05/door-mobil.webp') }}" as="image">
    <link rel="preload" href="{{ asset('wp-content/uploads/2023/03/EuclidSquare-Bold.ttf') }}" as="font" type="font/ttf"
        crossorigin="anonymous">
    <link rel="preload" href="{{ asset('wp-content/uploads/2023/03/EuclidSquare-Regular.ttf') }}" as="font" type="font/ttf"
        crossorigin="anonymous">
    <link rel="preload" href="{{ asset('wp-content/uploads/2023/03/EuclidSquare-Medium.ttf') }}" as="font" type="font/ttf"
        crossorigin="anonymous">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />

    <link rel='dns-prefetch' href='http://code.jquery.com/' />
    <link rel='dns-prefetch' href='http://maxcdn.bootstrapcdn.com/' />
    <link rel='dns-prefetch' href='http://unpkg.com/' />
    <link rel='dns-prefetch' href='http://cdn.jsdelivr.net/' />
    <link rel='dns-prefetch' href='http://cdnjs.cloudflare.com/' />
    <link rel='dns-prefetch' href='http://js-eu1.hs-scripts.com/' />

    <script>
        window._wpemojiSettings = {
            "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/15.0.3\/72x72\/",
            "ext": ".png",
            "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/15.0.3\/svg\/",
            "svgExt": ".svg",
            "source": {
                "concatemoji": "https:\/\/tradelocker.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.6.1"
            }
        };
        /*! This file is auto-generated */
        ! function(i, n) {
            var o, s, e;

            function c(e) {
                try {
                    var t = {
                        supportTests: e,
                        timestamp: (new Date).valueOf()
                    };
                    sessionStorage.setItem(o, JSON.stringify(t))
                } catch (e) {}
            }

            function p(e, t, n) {
                e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(t, 0, 0);
                var t = new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data),
                    r = (e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(n, 0, 0), new Uint32Array(e
                        .getImageData(0, 0, e.canvas.width, e.canvas.height).data));
                return t.every(function(e, t) {
                    return e === r[t]
                })
            }

            function u(e, t, n) {
                switch (t) {
                    case "flag":
                        return n(e, "\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f", "\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f") ? !1 : !
                            n(e, "\ud83c\uddfa\ud83c\uddf3", "\ud83c\uddfa\u200b\ud83c\uddf3") && !n(e,
                                "\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f",
                                "\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f"
                            );
                    case "emoji":
                        return !n(e, "\ud83d\udc26\u200d\u2b1b", "\ud83d\udc26\u200b\u2b1b")
                }
                return !1
            }

            function f(e, t, n) {
                var r = "undefined" != typeof WorkerGlobalScope && self instanceof WorkerGlobalScope ? new OffscreenCanvas(
                        300, 150) : i.createElement("canvas"),
                    a = r.getContext("2d", {
                        willReadFrequently: !0
                    }),
                    o = (a.textBaseline = "top", a.font = "600 32px Arial", {});
                return e.forEach(function(e) {
                    o[e] = t(a, e, n)
                }), o
            }

            function t(e) {
                var t = i.createElement("script");
                t.src = e, t.defer = !0, i.head.appendChild(t)
            }
            "undefined" != typeof Promise && (o = "wpEmojiSettingsSupports", s = ["flag", "emoji"], n.supports = {
                everything: !0,
                everythingExceptFlag: !0
            }, e = new Promise(function(e) {
                i.addEventListener("DOMContentLoaded", e, {
                    once: !0
                })
            }), new Promise(function(t) {
                var n = function() {
                    try {
                        var e = JSON.parse(sessionStorage.getItem(o));
                        if ("object" == typeof e && "number" == typeof e.timestamp && (new Date).valueOf() <
                            e.timestamp + 604800 && "object" == typeof e.supportTests) return e.supportTests
                    } catch (e) {}
                    return null
                }();
                if (!n) {
                    if ("undefined" != typeof Worker && "undefined" != typeof OffscreenCanvas && "undefined" !=
                        typeof URL && URL.createObjectURL && "undefined" != typeof Blob) try {
                        var e = "postMessage(" + f.toString() + "(" + [JSON.stringify(s), u.toString(), p
                                .toString()
                            ].join(",") + "));",
                            r = new Blob([e], {
                                type: "text/javascript"
                            }),
                            a = new Worker(URL.createObjectURL(r), {
                                name: "wpTestEmojiSupports"
                            });
                        return void(a.onmessage = function(e) {
                            c(n = e.data), a.terminate(), t(n)
                        })
                    } catch (e) {}
                    c(n = f(s, u, p))
                }
                t(n)
            }).then(function(e) {
                for (var t in e) n.supports[t] = e[t], n.supports.everything = n.supports.everything && n
                    .supports[t], "flag" !== t && (n.supports.everythingExceptFlag = n.supports
                        .everythingExceptFlag && n.supports[t]);
                n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && !n.supports.flag, n
                    .DOMReady = !1, n.readyCallback = function() {
                        n.DOMReady = !0
                    }
            }).then(function() {
                return e
            }).then(function() {
                var e;
                n.supports.everything || (n.readyCallback(), (e = n.source || {}).concatemoji ? t(e
                    .concatemoji) : e.wpemoji && e.twemoji && (t(e.twemoji), t(e.wpemoji)))
            }))
        }((window, document), window._wpemojiSettings);
    </script>

    <style id='cf-frontend-style-inline-css'>
        @font-face {
            font-family: 'Source Code Pro';
            font-weight: 400;
            src: url('{{ asset("wp-content/uploads/2024/07/Source-Code-Pro-for-Powerline.otf") }}') format('OpenType');
        }

        @font-face {
            font-family: 'Menlo';
            font-weight: 400;
            src: url('{{ asset("wp-content/uploads/2023/12/Menlo-Regular.woff") }}') format('woff');
        }

        @font-face {
            font-family: 'Inter';
            font-weight: 700;
            src: url('{{ asset("wp-content/uploads/2023/12/Inter-VariableFont_slntwght.ttf") }}') format('truetype');
        }

        @font-face {
            font-family: 'Inter';
            font-weight: 600;
            src: url('{{ asset("wp-content/uploads/2023/12/Inter-VariableFont_slntwght.ttf") }}') format('truetype');
        }

        @font-face {
            font-family: 'Inter';
            font-weight: 500;
            src: url('{{ asset("wp-content/uploads/2023/12/Inter-VariableFont_slntwght.ttf") }}') format('truetype');
        }

        @font-face {
            font-family: 'Euclid Square';
            font-weight: 400;
            font-display: auto;
            font-fallback: Helvetica;
            src: url('{{ asset("wp-content/uploads/2023/03/EuclidSquare-Regular.ttf") }}') format('truetype');
        }

        @font-face {
            font-family: 'Euclid Square';
            font-weight: 700;
            font-display: auto;
            font-fallback: Helvetica;
            src: url('{{ asset("wp-content/uploads/2023/03/EuclidSquare-Bold.ttf") }}') format('truetype');
        }

        @font-face {
            font-family: 'Euclid Square';
            font-weight: 300;
            font-display: auto;
            font-fallback: Helvetica;
            src: url('{{ asset("wp-content/uploads/2023/03/EuclidSquare-Light.ttf") }}') format('truetype');
        }

        @font-face {
            font-family: 'Euclid Square';
            font-weight: 500;
            font-display: auto;
            font-fallback: Helvetica;
            src: url('{{ asset("wp-content/uploads/2023/03/EuclidSquare-Medium.ttf") }}') format('truetype');
        }

        @font-face {
            font-family: 'Euclid Square';
            font-weight: 600;
            font-display: auto;
            font-fallback: Helvetica;
            src: url('{{ asset("wp-content/uploads/2023/03/EuclidSquare-SemiBold.ttf") }}') format('truetype');
        }
    </style>
    <link rel='stylesheet' id='dashicons-css' href='{{ asset("wp-includes/css/dashicons.minb6a4.css") }}' media='all' />
    <link rel='stylesheet' id='menu-icons-extra-css'
        href='{{ asset("wp-content/plugins/menu-icons/css/extra.minc28c.css") }}' media='all' />
    <link rel='stylesheet' id='hello-elementor-style-css'
        href='{{ asset("wp-content/themes/hello-elementor/style8a54.css") }}' media='all' />
    <link rel='stylesheet' id='hello-elementor-child-style-css'
        href='{{ asset("wp-content/uploads/wp-less/tradelocker-child/css/style-5430c549c4.css") }}' media='all' />
    <link rel='stylesheet' id='price-calc-style-css'
        href='{{ asset("wp-content/uploads/wp-less/tradelocker-child/css/price-calc-a7036eb618.css") }}' media='all' />
    <link rel='stylesheet' id='elementor-widgets-css'
        href='{{ asset("wp-content/uploads/wp-less/tradelocker-child/css/elementor-widgets-e4d9c83533.css") }}' media='all' />
    <link rel='stylesheet' id='prism-vs-code-css'
        href='{{ asset("wp-content/themes/tradelocker-child/css/prism-vs-code39c0.css") }}' media='all' />
    <link rel='stylesheet' id='select2css-css'
        href='{{ asset("wp-content/themes/tradelocker-child/css/select29cd0.css") }}' media='all' />

    <style id='wp-emoji-styles-inline-css'>
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>

    <link rel='stylesheet' id='wp-block-library-css'
        href='{{ asset("wp-includes/css/dist/block-library/style.minb6a4.css") }}' media='all' />
    <style id='classic-theme-styles-inline-css'>
        /*! This file is auto-generated */
        .wp-block-button__link {
            color: #fff;
            background-color: #32373c;
            border-radius: 9999px;
            box-shadow: none;
            text-decoration: none;
            padding: calc(.667em + 2px) calc(1.333em + 2px);
            font-size: 1.125em
        }

        .wp-block-file__button {
            background: #32373c;
            color: #fff;
            text-decoration: none
        }
    </style>
    <style id='global-styles-inline-css'>
        :root {
            --wp--preset--aspect-ratio--square: 1;
            --wp--preset--aspect-ratio--4-3: 4/3;
            --wp--preset--aspect-ratio--3-4: 3/4;
            --wp--preset--aspect-ratio--3-2: 3/2;
            --wp--preset--aspect-ratio--2-3: 2/3;
            --wp--preset--aspect-ratio--16-9: 16/9;
            --wp--preset--aspect-ratio--9-16: 9/16;
            --wp--preset--color--black: #000000;
            --wp--preset--color--cyan-bluish-gray: #abb8c3;
            --wp--preset--color--white: #ffffff;
            --wp--preset--color--pale-pink: #f78da7;
            --wp--preset--color--vivid-red: #cf2e2e;
            --wp--preset--color--luminous-vivid-orange: #ff6900;
            --wp--preset--color--luminous-vivid-amber: #fcb900;
            --wp--preset--color--light-green-cyan: #7bdcb5;
            --wp--preset--color--vivid-green-cyan: #00d084;
            --wp--preset--color--pale-cyan-blue: #8ed1fc;
            --wp--preset--color--vivid-cyan-blue: #0693e3;
            --wp--preset--color--vivid-purple: #9b51e0;
            --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
            --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
            --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
            --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
            --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
            --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
            --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
            --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
            --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
            --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
            --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
            --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
            --wp--preset--font-size--small: 13px;
            --wp--preset--font-size--medium: 20px;
            --wp--preset--font-size--large: 36px;
            --wp--preset--font-size--x-large: 42px;
            --wp--preset--spacing--20: 0.44rem;
            --wp--preset--spacing--30: 0.67rem;
            --wp--preset--spacing--40: 1rem;
            --wp--preset--spacing--50: 1.5rem;
            --wp--preset--spacing--60: 2.25rem;
            --wp--preset--spacing--70: 3.38rem;
            --wp--preset--spacing--80: 5.06rem;
            --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
            --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
            --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
        }

        :where(.is-layout-flex) {
            gap: 0.5em;
        }

        :where(.is-layout-grid) {
            gap: 0.5em;
        }

        body .is-layout-flex {
            display: flex;
        }

        .is-layout-flex {
            flex-wrap: wrap;
            align-items: center;
        }

        .is-layout-flex> :is(*, div) {
            margin: 0;
        }

        body .is-layout-grid {
            display: grid;
        }

        .is-layout-grid> :is(*, div) {
            margin: 0;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        :where(.wp-block-columns.is-layout-grid) {
            gap: 2em;
        }

        :where(.wp-block-post-template.is-layout-flex) {
            gap: 1.25em;
        }

        :where(.wp-block-post-template.is-layout-grid) {
            gap: 1.25em;
        }

        .has-black-color {
            color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-color {
            color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-color {
            color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-color {
            color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-color {
            color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-color {
            color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-color {
            color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-color {
            color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-color {
            color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-color {
            color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-color {
            color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-color {
            color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-background-color {
            background-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-background-color {
            background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-background-color {
            background-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-background-color {
            background-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-background-color {
            background-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-background-color {
            background-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-background-color {
            background-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-background-color {
            background-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-background-color {
            background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-background-color {
            background-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-border-color {
            border-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-border-color {
            border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-border-color {
            border-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-border-color {
            border-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-border-color {
            border-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-border-color {
            border-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-border-color {
            border-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-border-color {
            border-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-border-color {
            border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-border-color {
            border-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
            background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
        }

        .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
            background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
        }

        .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-orange-to-vivid-red-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
        }

        .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
            background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
        }

        .has-cool-to-warm-spectrum-gradient-background {
            background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
        }

        .has-blush-light-purple-gradient-background {
            background: var(--wp--preset--gradient--blush-light-purple) !important;
        }

        .has-blush-bordeaux-gradient-background {
            background: var(--wp--preset--gradient--blush-bordeaux) !important;
        }

        .has-luminous-dusk-gradient-background {
            background: var(--wp--preset--gradient--luminous-dusk) !important;
        }

        .has-pale-ocean-gradient-background {
            background: var(--wp--preset--gradient--pale-ocean) !important;
        }

        .has-electric-grass-gradient-background {
            background: var(--wp--preset--gradient--electric-grass) !important;
        }

        .has-midnight-gradient-background {
            background: var(--wp--preset--gradient--midnight) !important;
        }

        .has-small-font-size {
            font-size: var(--wp--preset--font-size--small) !important;
        }

        .has-medium-font-size {
            font-size: var(--wp--preset--font-size--medium) !important;
        }

        .has-large-font-size {
            font-size: var(--wp--preset--font-size--large) !important;
        }

        .has-x-large-font-size {
            font-size: var(--wp--preset--font-size--x-large) !important;
        }

        :where(.wp-block-post-template.is-layout-flex) {
            gap: 1.25em;
        }

        :where(.wp-block-post-template.is-layout-grid) {
            gap: 1.25em;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        :where(.wp-block-columns.is-layout-grid) {
            gap: 2em;
        }

        :root :where(.wp-block-pullquote) {
            font-size: 1.5em;
            line-height: 1.6;
        }
    </style>

    <link rel='stylesheet' id='hello-elementor-css'
        href='{{ asset("wp-content/themes/hello-elementor/style.min41fe.css") }}' media='all' />
    <link rel='stylesheet' id='hello-elementor-theme-style-css'
        href='{{ asset("wp-content/themes/hello-elementor/theme.min41fe.css") }}' media='all' />
    <link rel='stylesheet' id='hello-elementor-header-footer-css'
        href='{{ asset("wp-content/themes/hello-elementor/header-footer.min41fe.css") }}' media='all' />
    <link rel='stylesheet' id='elementor-frontend-css'
        href='{{ asset("wp-content/plugins/elementor/assets/css/frontend-lite.mina44d.css") }}' media='all' />
    <link rel='stylesheet' id='elementor-post-23-css'
        href='{{ asset("wp-content/uploads/elementor/css/post-23578b.css") }}' media='all' />
    <link rel='stylesheet' id='elementor-icons-css'
        href='{{ asset("wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.minfc13.css") }}'
        media='all' />
    <link rel='stylesheet' id='swiper-css'
        href='{{ asset("wp-content/plugins/elementor/assets/lib/swiper/v8/css/swiper.min94a4.css") }}' media='all' />
    <link rel='stylesheet' id='elementor-post-2264-css'
        href='{{ asset("wp-content/uploads/elementor/css/post-22648455.css") }}' media='all' />
    <link rel='stylesheet' id='elementor-custom-widget-editor-css'
        href='{{ asset("wp-content/plugins/elementor-custom-widgets/assets/css/editorb6a4.css") }}' media='all' />
    <link rel='stylesheet' id='elementor-icons-shared-0-css'
        href='{{ asset("wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min52d5.css") }}'
        media='all' />
    <link rel='stylesheet' id='elementor-icons-fa-solid-css'
        href='{{ asset("wp-content/plugins/elementor/assets/lib/font-awesome/css/solid.min52d5.css") }}' media='all' />

        <script data-cookieconsent="ignore" data-cookiecategory="essential" src="{{ asset('code.jquery.com/jquery-3.6.0.min.js') }}" id="jquery-js"></script>

    <link rel="icon" href="{{ asset('wp-content/uploads/2023/04/cropped-Icon-3-32x32.png') }}" sizes="32x32" />
    <link rel="icon" href="{{ asset('wp-content/uploads/2023/04/cropped-Icon-3-192x192.png') }}" sizes="192x192" />
    <link rel="apple-touch-icon" href="{{ asset('wp-content/uploads/2023/04/cropped-Icon-3-180x180.png') }}" />

    <script async src="https://www.google.com/recaptcha/api.js"></script>
    @livewireStyles
    @vite('resources/css/app.css')

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body
    class="home page-template page-template-elementor_header_footer page page-id-2264 wp-custom-logo elementor-default elementor-template-full-width elementor-kit-23 elementor-page elementor-page-2264">

    <header id="site-header" class="site-header dynamic-header header-full-width menu-dropdown-mobile"
        role="banner">
        <div class="header-inner">
            <div class="site-branding show-logo">
                <div class="site-logo show">
                    <a href="{{ route('home') }}" class="custom-logo-link" rel="home" aria-current="page"><img
                            width="646" height="196"
                            src="{{ asset('wp-content/uploads/2023/05/cropped-Tradelockerlogo-1.png') }}" class="custom-logo"
                            alt="TradeLocker" decoding="async" fetchpriority="high"
                            srcset="{{ asset('wp-content/uploads/2023/05/cropped-Tradelockerlogo-1.png') }} 646w, {{ asset('wp-content/uploads/2023/05/cropped-Tradelockerlogo-1-300x91.png') }} 300w"
                            sizes="(max-width: 646px) 100vw, 646px" /></a>
                </div>
            </div>

            <nav class="site-navigation show">
                <div class="menu-primary-menu-container">
                    <ul id="menu-primary-menu" class="menu">
                        <li id='menu-item-1' class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                href="/#home-section" data-analytics-label="Start trading">Home<span class="menu-item-description"></span></a> </li>
                        <li id='menu-item-2' class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                href="/#features-section" data-analytics-label="Start trading">Features<span class="menu-item-description"></span></a> </li>
                        <li id='menu-item-3' class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                href="/#faqs-section" data-analytics-label="Start trading">FAQs<span class="menu-item-description"></span></a> </li>
                        <li id='menu-item-4' class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                href="{{ route('register') }}" data-analytics-label="Start trading">Register<span class="menu-item-description"></span></a> </li>
                        <li id='menu-item-5' class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                href="{{ route('login') }}" data-analytics-label="Start trading">Login<span class="menu-item-description"></span></a> </li>
                    </ul>
                </div>
            </nav>
            <div class="site-navigation-toggle-holder show">
                <div class="site-navigation-toggle" role="button" tabindex="0">
                    <svg width="21" height="18" viewBox="0 0 21 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect y="1.33716" width="21" height="1" fill="white" fill-opacity="0.2" />
                        <rect y="8.33716" width="21" height="1" fill="white" fill-opacity="0.2" />
                        <rect y="15.3372" width="21" height="1" fill="white" fill-opacity="0.2" />
                        <rect x="2" y="7.33716" width="15" height="3" fill="white" />
                        <rect x="2" y="14.3372" width="12" height="3" fill="white" />
                        <rect x="2" y="0.337158" width="17" height="3" fill="white" />
                    </svg>
                    <span class="screen-reader-text">Menu</span>
                </div>
            </div>
            <nav class="site-navigation-drop" aria-hidden="true">

                <div class="menu-primary-menu-container">
                    <ul id="menu-primary-menu" class="menu">
                        <li id='menu-item-1' class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                href="#home-section" data-analytics-label="Start trading">Home<span class="menu-item-description"></span></a> </li>
                        <li id='menu-item-2' class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                href="#features-section" data-analytics-label="Start trading">Features<span class="menu-item-description"></span></a> </li>
                        <li id='menu-item-3' class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                href="#faqs-section" data-analytics-label="Start trading">FAQs<span class="menu-item-description"></span></a> </li>
                        <li id='menu-item-4' class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                href="{{ route('register') }}" data-analytics-label="Start trading">Register<span class="menu-item-description"></span></a> </li>
                        <li id='menu-item-5' class="menu-item menu-item-type-custom menu-item-object-custom"><a
                                href="{{ route('login') }}" data-analytics-label="Start trading">Login<span class="menu-item-description"></span></a> </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div data-elementor-type="wp-page" data-elementor-id="2264" class="elementor elementor-2264">
        {{ $slot }}
    </div>

    <footer class="elementor-section elementor-section-boxed">
        <div class="elementor-container">
            <div class="footer-grid">
                <div class="footer-column">
                    <div class="tradelocker-logo-container">
                        <a class="tradelocker-logo" href="{{ route('home') }}"><svg width="132" height="40"
                                viewBox="0 0 132 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M57.4572 6.78893C50.3019 6.78893 44.5014 12.7037 44.5014 19.9999C44.5014 27.2962 50.3019 33.2109 57.4572 33.2109C64.6125 33.2109 70.413 27.2962 70.413 19.9999C70.413 12.7037 64.6125 6.78893 57.4572 6.78893ZM41.6224 19.9999C41.6224 11.0823 48.7119 3.85315 57.4572 3.85315C66.2026 3.85315 73.2921 11.0823 73.2921 19.9999C73.2921 28.9176 66.2026 36.1467 57.4572 36.1467C48.7119 36.1467 41.6224 28.9176 41.6224 19.9999Z"
                                    fill="url(#paint0_linear_207_2899)" fill-opacity="0.25" />
                                <mask id="mask0_207_2899" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="60"
                                    y="0" width="40" height="40">
                                    <path d="M60.876 40H99.7434V30.0917H60.876V40Z" fill="#fff" />
                                    <path d="M60.876 9.9082H99.7434V-5.34058e-05H60.876V9.9082Z" fill="#fff" />
                                </mask>
                                <g mask="url(#mask0_207_2899)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M96.8643 3.11925H63.7551V36.8807H96.8643V3.11925ZM60.876 0.183472V39.8165H99.7434V0.183472H60.876Z"
                                        fill="#FFFFFF" />
                                </g>
                                <path
                                    d="M4.42239 26.2385V15.0708H0.000152588V13.8202H10.2784V15.0708H5.85617V26.2385H4.42239Z"
                                    fill="#FFFFFF" />
                                <path
                                    d="M12.2574 26.2385V13.8202H17.077C18.3898 13.8202 19.3917 14.1314 20.0827 14.7538C20.7852 15.3762 21.1364 16.2628 21.1364 17.4136C21.1364 18.3295 20.8888 19.0811 20.3936 19.6683C19.9099 20.2554 19.219 20.6371 18.3207 20.8132C18.8505 21.0011 19.3053 21.4591 19.6854 22.1872L21.8274 26.2385H20.2727L18.1652 22.2576C17.9004 21.7644 17.5952 21.4297 17.2497 21.2536C16.9042 21.0774 16.4493 20.9894 15.885 20.9894H13.6739V26.2385H12.2574ZM13.6739 19.8444H16.8697C18.7814 19.8444 19.7372 19.0341 19.7372 17.4136C19.7372 15.8165 18.7814 15.018 16.8697 15.018H13.6739V19.8444Z"
                                    fill="#FFFFFF" />
                                <path
                                    d="M22.8846 26.2385L28.257 13.8202H29.4662L34.8385 26.2385H33.3702L32.0228 23.0679H25.6831L24.353 26.2385H22.8846ZM28.8443 15.5112L26.2013 21.8525H31.5218L28.8789 15.5112H28.8443Z"
                                    fill="#FFFFFF" />
                                <path
                                    d="M37.0758 26.2385V13.8202H41.1871C43.1564 13.8202 44.6765 14.3545 45.7476 15.4231C46.8186 16.48 47.3541 18.0125 47.3541 20.0206C47.3541 22.0286 46.8186 23.567 45.7476 24.6356C44.6765 25.7042 43.1564 26.2385 41.1871 26.2385H37.0758ZM38.4923 25.0055H41.0835C44.262 25.0055 45.8512 23.3439 45.8512 20.0206C45.8512 16.709 44.262 15.0532 41.0835 15.0532H38.4923V25.0055Z"
                                    fill="#FFFFFF" />
                                <path
                                    d="M50.3285 26.2385V13.8202H58.0156V15.0356H51.7105V19.3336H57.6528V20.549H51.7105V25.0231H58.0156V26.2385H50.3285Z"
                                    fill="#FFFFFF" />
                                <path d="M60.722 26.2386V13.8202H63.9005V23.5435H69.3247V26.2386H60.722Z"
                                    fill="#FFFFFF" />
                                <path
                                    d="M76.4572 26.4323C75.225 26.4323 74.1424 26.1681 73.2096 25.6397C72.2883 25.0995 71.5686 24.3479 71.0503 23.385C70.5321 22.4221 70.273 21.3006 70.273 20.0206C70.273 18.7288 70.5263 17.6074 71.0331 16.6562C71.5513 15.6933 72.2768 14.9476 73.2096 14.4191C74.1424 13.8907 75.225 13.6265 76.4572 13.6265C77.6895 13.6265 78.7662 13.8907 79.6875 14.4191C80.6203 14.9476 81.3459 15.6933 81.8641 16.6562C82.3823 17.6074 82.6414 18.7288 82.6414 20.0206C82.6414 21.3006 82.3823 22.4221 81.8641 23.385C81.3459 24.3479 80.6203 25.0995 79.6875 25.6397C78.7662 26.1681 77.6895 26.4323 76.4572 26.4323ZM76.4572 23.7197C77.3555 23.7197 78.058 23.3967 78.5647 22.7509C79.0829 22.0933 79.342 21.1832 79.342 20.0206C79.342 18.858 79.0887 17.9538 78.582 17.3079C78.0752 16.6621 77.367 16.3391 76.4572 16.3391C75.5474 16.3391 74.8392 16.6621 74.3325 17.3079C73.8258 17.9538 73.5724 18.858 73.5724 20.0206C73.5724 21.1832 73.8258 22.0933 74.3325 22.7509C74.8392 23.3967 75.5474 23.7197 76.4572 23.7197Z"
                                    fill="#FFFFFF" />
                                <path
                                    d="M91.0997 26.4323C89.7523 26.4323 88.5949 26.1681 87.6275 25.6397C86.6602 25.1112 85.9174 24.3655 85.3991 23.4026C84.8924 22.4397 84.6391 21.3123 84.6391 20.0206C84.6391 18.7288 84.8924 17.6074 85.3991 16.6562C85.9174 15.6933 86.6602 14.9476 87.6275 14.4191C88.5949 13.8907 89.7523 13.6265 91.0997 13.6265C91.9058 13.6265 92.6832 13.7556 93.4317 14.014C94.1803 14.2606 94.7849 14.5894 95.2455 15.0004L94.2954 17.5545C93.7887 17.1788 93.282 16.9028 92.7753 16.7266C92.2686 16.5388 91.7503 16.4448 91.2206 16.4448C90.1496 16.4448 89.3434 16.756 88.8022 17.3784C88.2609 17.989 87.9903 18.8698 87.9903 20.0206C87.9903 21.1832 88.2609 22.0756 88.8022 22.698C89.3434 23.3087 90.1496 23.614 91.2206 23.614C91.7503 23.614 92.2686 23.5259 92.7753 23.3498C93.282 23.1619 93.7887 22.88 94.2954 22.5043L95.2455 25.0584C94.7849 25.4694 94.1803 25.8041 93.4317 26.0624C92.6832 26.309 91.9058 26.4323 91.0997 26.4323Z"
                                    fill="#FFFFFF" />
                                <path
                                    d="M97.2411 26.2386V13.8202H100.42V19.1399H100.454L105.187 13.8202H108.953L103.529 19.7211L109.143 26.2386H105.36L100.454 20.6371H100.42V26.2386H97.2411Z"
                                    fill="#FFFFFF" />
                                <path
                                    d="M109.971 26.2386V13.8202H118.573V16.3215H113.011V18.6819H118.176V21.1832H113.011V23.7373H118.573V26.2386H109.971Z"
                                    fill="#FFFFFF" />
                                <path
                                    d="M121.014 26.2386V13.8202H126.87C128.252 13.8202 129.317 14.1666 130.065 14.8595C130.825 15.5406 131.206 16.4918 131.206 17.7131C131.206 18.6408 130.975 19.4217 130.515 20.0558C130.065 20.6782 129.409 21.1127 128.545 21.3593C129.19 21.5355 129.708 21.9876 130.1 22.7156L132 26.2386H128.511L126.403 22.2929C126.265 22.0463 126.087 21.8701 125.868 21.7644C125.66 21.6588 125.419 21.6059 125.142 21.6059H124.192V26.2386H121.014ZM124.192 19.316H126.3C127.555 19.316 128.182 18.8111 128.182 17.8011C128.182 16.803 127.555 16.3039 126.3 16.3039H124.192V19.316Z"
                                    fill="#FFFFFF" />
                                <defs>
                                    <linearGradient id="paint0_linear_207_2899" x1="43.0619" y1="20.0745"
                                        x2="59.284" y2="20.0745" gradientUnits="userSpaceOnUse">
                                        <stop offset="0.453607" stop-color="white" />
                                        <stop offset="0.868376" stop-color="white" stop-opacity="0" />
                                    </linearGradient>
                                </defs>
                            </svg>
                        </a>
                        <p>Unlock your potential.</p>
                    </div>
                    <div class="social-media-container">
                        <a class="social-icon" href="https://www.instagram.com/tradelockerofficial/"><svg
                                id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 913.68 913.67">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #fff;
                                        }
                                    </style>
                                    <linearGradient class="MyGradient">
                                        <stop offset="5%" stop-color="#F60" />
                                        <stop offset="95%" stop-color="#FF6" />
                                    </linearGradient>
                                </defs>
                                <path class="cls-1"
                                    d="M456.72,304.49c-83.89,0-152.34,68.46-152.34,152.34s68.45,152.35,152.34,152.35,152.34-68.46,152.34-152.35S540.61,304.49,456.72,304.49ZM913.63,456.83c0-63.08.58-125.6-3-188.57-3.54-73.14-20.23-138-73.71-191.54S718.55,6.55,645.41,3C582.32-.54,519.81,0,456.83,0S331.23-.54,268.26,3c-73.14,3.54-138,20.22-191.54,73.71S6.55,195.12,3,268.26c-3.55,63.09-3,125.6-3,188.57s-.57,125.6,3,188.58C6.55,718.55,23.23,783.46,76.72,837s118.4,70.17,191.54,73.71c63.09,3.55,125.6,3,188.57,3s125.6.58,188.58-3C718.55,907.12,783.46,890.43,837,837s70.17-118.4,73.71-191.54c3.66-63,3-125.49,3-188.58ZM456.72,691.23a234.4,234.4,0,1,1,234.4-234.4A234.07,234.07,0,0,1,456.72,691.23Zm244-423.65a54.67,54.67,0,1,1,.14,0Z" />
                            </svg></a>
                        <a class="social-icon" href="https://discord.gg/turkfvWHg2"><svg id="Layer_1"
                                data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 619.52 430.78">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #fff;
                                        }
                                    </style>
                                </defs>
                                <path class="cls-1"
                                    d="M542.08,54.55C473.11,3.33,408.51.84,395.93.79L388.05,8.6C476.5,34.2,519.29,74.18,519.29,74.18c-57-28.5-108.37-42.76-159.74-48.52-37.12-5.76-74.24-2.73-105.6,0h-8.53c-20.06,0-62.72,8.54-119.9,31.36-19.3,8.4-30.64,14-31.33,14.32C95.51,70,138.39,28.25,231.12,5.78L225.36,0S154-2.71,77,54.21c0,0-77,134.14-77,299.52,0,0,42.67,74.24,159.7,77,0,0,17.07-22.74,34.35-42.75-65.71-20-91.31-59.9-91.31-59.9A139.79,139.79,0,0,1,117,336.66h2.56a3.39,3.39,0,0,1,2.56,1.28v.26a3.29,3.29,0,0,0,2.56,1.28c14.08,5.8,28.16,11.52,39.68,17.06a349,349,0,0,0,76.8,22.87c39.68,5.76,85.17,8.54,137,0,25.6-5.76,51.2-11.39,76.8-22.82,16.64-8.54,37.12-17.07,59.61-31.45,0,0-25.6,39.94-94.08,59.91,14.08,19.88,33.92,42.66,33.92,42.66,117.08-2.56,162.56-76.8,165.12-73.64C619.52,189,542.08,54.55,542.08,54.55Zm-331,247.94c-29.86,0-54.18-25.6-54.18-56.92,0-31.57,24.32-57.09,54.18-57.09l.17-.13c29.87,0,54,25.6,54,57C265.3,276.89,241,302.49,211.11,302.49Zm194,0c-29.87,0-54.19-25.6-54.19-56.92.09-31.57,24.45-57.09,54.19-57.09v-.13c30,0,54.19,25.6,54.19,57C459.31,276.89,435,302.49,405.12,302.49Z" />
                            </svg></a>
                        <a class="social-icon"
                            href="https://www.linkedin.com/company/trade-locker-official/?viewAsMember=true"><svg
                                id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 848.21 853.35">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #fff;
                                        }
                                    </style>
                                </defs>
                                <path class="cls-1"
                                    d="M785.49,0H62.72A61.86,61.86,0,0,0,0,61H0V792.33a61.87,61.87,0,0,0,62.71,61H785.49a61.87,61.87,0,0,0,62.72-61h0V61a61.85,61.85,0,0,0-62.7-61ZM257.28,714.25h-128v-384h128Zm-64-437.76a66.56,66.56,0,0,1,0-133.12h0a67,67,0,0,1,15.1,133.12A68.07,68.07,0,0,1,193.28,276.49ZM718.93,714.25h-128V508.17c0-51.63-18.34-85.34-64.85-85.34a70.42,70.42,0,0,0-65.71,46.51,85.3,85.3,0,0,0-4.26,31.15V713.82h-128v-384h128V384a128,128,0,0,1,115.62-64c85.34,0,147.2,55,147.2,173.22Z" />
                            </svg></a>
                        <a class="social-icon" href="https://twitter.com/tradelockermain"><svg id="Layer_1"
                                data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 462.8">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #fff;
                                        }
                                    </style>
                                </defs>
                                <path class="cls-1"
                                    d="M403.23,0h78.5L310.22,196,512,462.8H354L230.26,301,88.67,462.8H10.11L193.56,253.12,0,0H162L273.85,147.88ZM375.67,415.8h43.51L138.36,44.53H91.68l284,371.28Z" />
                            </svg></a>
                        <a class="social-icon" href="https://youtube.com/@tradelockerofficial"><svg id="Layer_1"
                                data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 566.1">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #fff;
                                        }
                                    </style>
                                </defs>
                                <path class="cls-1"
                                    d="M633.85,0H166.15A166.15,166.15,0,0,0,0,166.15V400A166.15,166.15,0,0,0,166.15,566.1h467.7A166.15,166.15,0,0,0,800,400V166.15A166.15,166.15,0,0,0,633.85,0ZM521.48,294.43,302.73,398.76a8.79,8.79,0,0,1-12.57-7.93V175.64a8.78,8.78,0,0,1,12.75-7.83L521.67,278.66A8.79,8.79,0,0,1,521.48,294.43Z" />
                            </svg></a>
                    </div>
                </div>
                <div class="col-1">
                    <h5>Resources</h5>
                    <div class="menu-business-container">
                        <ul id="menu-business" class="menu">
                            <li id="menu-item-2374"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2374"><a
                                    href="/#features-section">Features</a></li>
                            <li id="menu-item-2374"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2374"><a
                                    href="/#faqs-section">FAQs</a></li>
                            <li id="menu-item-2374"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2374"><a
                                    href="{{ route('login') }}">Sign In</a></li>
                            <li id="menu-item-1005"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1005"><a
                                    href="{{ route('terms') }}">Terms and Conditions</a></li>
                            <li id="menu-item-1006"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1006"><a
                                    href="{{ route('privacy') }}">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="elementor-container">
            <div class="app-wrapper">
                <ul class="app-links">
                    <a href="https://play.google.com/store/apps/details?id=com.tradelocker.mobile">
                        <li class="playstore">
                            <div class="supertitle">Get it on</div>
                            <div class="title">Google Play</div>
                        </li>
                    </a>
                    <a href="https://apps.apple.com/uy/app/tradelocker/id6447196449">
                        <li class="appstore">
                            <div class="supertitle">Download on the</div>
                            <div class="title">App Store</div>
                        </li>
                    </a>
                </ul>
            </div>
        </div>
    </footer>
    <div class="disclaimer elementor-section elementor-section-boxed">
        <div class="elementor-container">
            <p style="font-size:14px">
                Exvb © <span id="year">2023</span>. All rights reserved.
                <br><br>*Neither this app or its contents should be regarded as professional, financial or investment
                advice. This app is a suite of trading tools, meant to be used in connection with an account held by a
                trader with their brokerage firm. If you intend on using this app for real trading, you should
                understand how various financial products work and the risks you will be undertaking on your own.
                <br><br>**By using this app you will have access to information of a general nature (i.e., that does not
                address the circumstances of any particular individual). If you require further information, or
                otherwise a more comprehensive or complete statement of the related matters and regulations, you should
                seek the advice of a lawyer, your brokerage firm, or from a licensed financial service provider before
                you start trading.
            </p>
        </div>
    </div>
    <script>
        document.getElementById("year").innerHTML = new Date().getFullYear();
    </script>

    <link rel='stylesheet' id='e-animations-css'
        href="{{ asset('wp-content/plugins/elementor/assets/lib/animations/animations.mina44d.css') }}"
        media='all' />
    <script data-cookieconsent="ignore" data-cookiecategory="essential"
        src="{{ asset('maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') }}" id="scrollspy-js"></script>
    <script data-cookieconsent="ignore" data-cookiecategory="essential" src="{{ asset('unpkg.com/typeit@8.7.1/dist/index.umd.js') }}"
        id="typeit-js"></script>
    <script data-cookieconsent="ignore" data-cookiecategory="essential"
        src="{{ asset('cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min4819.js') }}" id="select2-js"></script>
    <script data-cookieconsent="ignore" data-cookiecategory="essential"
        src="{{ asset('cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.minb6a4.js') }}" id="gsap-js"></script>
    <script data-cookieconsent="ignore" data-cookiecategory="essential"
        src="{{ asset('cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.minb6a4.js') }}" id="scroll-trigger-js"></script>
    <script src="{{ asset('cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/CSSRulePlugin.minb6a4.js') }}" id="cssrule-plugin-js">
    </script>
    <script data-cookieconsent="ignore" data-cookiecategory="essential"
        src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/SplitText.min.js') }}" id="split-text-js"></script>
    <script data-cookieconsent="ignore" data-cookiecategory="essential"
        src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/ScrollSmoother.min.js') }}" id="scroll-smoother-js">
    </script>
    <script data-cookieconsent="ignore" data-cookiecategory="essential"
        src="{{ asset('cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.minb6a4.js') }}" id="prism-js"></script>
    <script data-cookieconsent="ignore" data-cookiecategory="essential"
        src="{{ asset('cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-python.minb11e.js') }}"
        id="prism-python-js"></script>
    <script data-cookieconsent="ignore" data-cookiecategory="essential"
        src="{{ asset('wp-content/themes/tradelocker-child/js/animate-typed120.js') }}" id="animate-type-js"></script>
    <script src="{{ asset('wp-content/themes/tradelocker-child/js/accordionda59.js') }}" async defer
        data-cookieconsent="ignore" data-cookiecategory="essential"></script>
    <script data-cookieconsent="ignore" data-cookiecategory="essential"
        src="{{ asset('wp-content/themes/tradelocker-child/js/anchoring32e8.js') }}" id="anchoring-js-js"></script>
    <script src="{{ asset('wp-content/themes/tradelocker-child/js/utils6798.js') }}" id="utils-js-js"></script>
    <script src="{{ asset('wp-content/themes/tradelocker-child/js/gsap-activations290c.js') }}" id="gsap-activations-js">
    </script>
    <script src="{{ asset('wp-content/themes/tradelocker-child/js/marqueec2dd.js') }}" id="marquee-activations-js"></script>
    <script src="{{ asset('wp-content/themes/tradelocker-child/js/switch-tabs0ab2.js') }}" async defer
        data-cookieconsent="ignore" data-cookiecategory="essential"></script>
    <script src="{{ asset('wp-content/themes/tradelocker-child/js/platform-link69a7.js') }}" async defer
        data-cookieconsent="ignore" data-cookiecategory="essential"></script>
    <script data-cookieconsent="ignore" data-cookiecategory="essential"
        src="{{ asset('wp-content/themes/tradelocker-child/js/animations580a.js') }}" id="animations-js"></script>
    <script id="ajax-search-js-extra">
        var ajax_obj = {
            "ajaxurl": "https:\/\/tradelocker.com\/wp-admin\/admin-ajax.php"
        };
    </script>
    <script src="{{ asset('wp-content/themes/tradelocker-child/js/ajax-search544d.js') }}" id="ajax-search-js"></script>
    <script id="leadin-script-loader-js-js-extra">
        var leadin_wordpress = {
            "userRole": "visitor",
            "pageType": "home",
            "leadinPluginVersion": "11.3.6"
        };
    </script>
    <script src="{{ asset('js-eu1.hs-scripts.com/1452689439a4a.js') }}"
        id="leadin-script-loader-js-js"></script>
    <script src="{{ asset('wp-content/plugins/maintainnance-plugin/js/campaign-bara20d.js') }}" id="campaign-bar-js">
    </script>
    <script src="{{ asset('cdn.jsdelivr.net/npm/js-cookie@2.2.1/src/js.cookie.min77e6.js') }}" id="js-cookie-js"></script>
    <script src="{{ asset('wp-content/plugins/partner-portal-plugin/js/fetchCookies0b99.js') }}" id="fetchCookies-js">
    </script>
    <script src="{{ asset('wp-content/plugins/partners-plugin/js/searchfiltere9db.js') }}" id="search-filter-js"></script>
    <script src="{{ asset('wp-content/themes/tradelocker-child/js/toggle-projects7ae3.js') }}" id="toggle-projects-js">
    </script>
    <script src="{{ asset('wp-content/themes/hello-elementor/assets/js/hello-frontend.min41fe.js') }}"
        id="hello-theme-frontend-js"></script>
    <script src="{{ asset('wp-content/plugins/elementor/assets/js/webpack.runtime.mina44d.js') }}"
        id="elementor-webpack-runtime-js"></script>
    <script src="{{ asset('wp-content/plugins/elementor/assets/js/frontend-modules.mina44d.js') }}"
        id="elementor-frontend-modules-js"></script>
    <script src="{{ asset('wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min05da.js') }}"
        id="elementor-waypoints-js"></script>
    <script src="{{ asset('wp-includes/js/jquery/ui/core.minb37e.js') }}" id="jquery-ui-core-js"></script>
    <script id="elementor-frontend-js-before">
        var elementorFrontendConfig = {
            "environmentMode": {
                "edit": false,
                "wpPreview": false,
                "isScriptDebug": false
            },
            "i18n": {
                "shareOnFacebook": "Share on Facebook",
                "shareOnTwitter": "Share on Twitter",
                "pinIt": "Pin it",
                "download": "Download",
                "downloadImage": "Download image",
                "fullscreen": "Fullscreen",
                "zoom": "Zoom",
                "share": "Share",
                "playVideo": "Play Video",
                "previous": "Previous",
                "next": "Next",
                "close": "Close"
            },
            "is_rtl": false,
            "breakpoints": {
                "xs": 0,
                "sm": 480,
                "md": 768,
                "lg": 1025,
                "xl": 1440,
                "xxl": 1600
            },
            "responsive": {
                "breakpoints": {
                    "mobile": {
                        "label": "Mobile Portrait",
                        "value": 767,
                        "default_value": 767,
                        "direction": "max",
                        "is_enabled": true
                    },
                    "mobile_extra": {
                        "label": "Mobile Landscape",
                        "value": 880,
                        "default_value": 880,
                        "direction": "max",
                        "is_enabled": false
                    },
                    "tablet": {
                        "label": "Tablet Portrait",
                        "value": 1024,
                        "default_value": 1024,
                        "direction": "max",
                        "is_enabled": true
                    },
                    "tablet_extra": {
                        "label": "Tablet Landscape",
                        "value": 1200,
                        "default_value": 1200,
                        "direction": "max",
                        "is_enabled": false
                    },
                    "laptop": {
                        "label": "Laptop",
                        "value": 1366,
                        "default_value": 1366,
                        "direction": "max",
                        "is_enabled": false
                    },
                    "widescreen": {
                        "label": "Widescreen",
                        "value": 2400,
                        "default_value": 2400,
                        "direction": "min",
                        "is_enabled": false
                    }
                }
            },
            "version": "3.13.4",
            "is_static": false,
            "experimentalFeatures": {
                "e_dom_optimization": true,
                "e_optimized_assets_loading": true,
                "e_optimized_css_loading": true,
                "a11y_improvements": true,
                "additional_custom_breakpoints": true,
                "container": true,
                "e_swiper_latest": true,
                "hello-theme-header-footer": true,
                "landing-pages": true
            },
            "urls": {
                "assets": "https:\/\/tradelocker.com\/wp-content\/plugins\/elementor\/assets\/"
            },
            "swiperClass": "swiper",
            "settings": {
                "page": [],
                "editorPreferences": []
            },
            "kit": {
                "body_background_background": "classic",
                "active_breakpoints": ["viewport_mobile", "viewport_tablet"],
                "global_image_lightbox": "yes",
                "lightbox_enable_counter": "yes",
                "lightbox_enable_fullscreen": "yes",
                "lightbox_enable_zoom": "yes",
                "lightbox_enable_share": "yes",
                "lightbox_title_src": "title",
                "lightbox_description_src": "description",
                "hello_header_logo_type": "logo",
                "hello_header_menu_layout": "horizontal",
                "hello_footer_logo_type": "logo"
            },
            "post": {
                "id": 2264,
                "title": "Next-Gen%20Forex%20Trading%20Platform%20-%20TradeLocker",
                "excerpt": "",
                "featuredImage": "https:\/\/tradelocker.com\/wp-content\/uploads\/2025\/03\/cover-1-1-1024x574.jpg"
            }
        };
    </script>
    <script src="{{ asset('wp-content/plugins/elementor/assets/js/frontend.mina44d.js') }}" id="elementor-frontend-js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        window.gtranslateSettings = {
            "default_language": "en",
            "detect_browser_language": true,
            "wrapper_selector": ".gtranslate_wrapper",
            "flag_size": 24,
            "flag_style": "3d"
        }
    </script>
    <script src="https://cdn.gtranslate.net/widgets/latest/popup.js" defer></script>
    <script>
        // Wait for the DOM to be fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Select all elements with class 'gt_switcher-popup'
            document.querySelectorAll('.gt_switcher-popup').forEach(function(el) {
                // Find all span children and hide them
                el.querySelectorAll('span').forEach(function(span) {
                    span.style.display = 'none';
                });
            });
        });
    </script>
    @livewireScripts
    @vite('resources/js/app.js')
</body>

</html>
