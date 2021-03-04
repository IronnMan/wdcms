const colors = require('tailwindcss/colors')

module.exports = {
    prefix: '',
    purge: [
        './resources/**/*.blade.php',
    ],
    darkMode: 'media', // or 'media' or 'class' or false
    theme: {
        configViewer: {
            baseFontSize: 14 // default is 16
        },
        colors: {
            white: colors.white,
            black: colors.black,
            gray: {
                '50': '#f7f8f8',
                '100': '#f0f0f1',
                '200': '#d9dbdd',
                '300': '#c1c5c9',
                '400': '#9399a0',
                '500': '#656d77',
                '600': '#5b626b',
                '700': '#4c5259',
                '800': '#3d4147',
                '900': '#31353a'
            },
            blue: {
                '50': '#f6fafe',
                '100': '#ecf5fc',
                '200': '#d0e6f8',
                '300': '#b3d6f3',
                '400': '#7bb8ea',
                '500': '#4299e1',
                '600': '#3b8acb',
                '700': '#3273a9',
                '800': '#285c87',
                '900': '#204b6e'
            },
            red: {
                '50': '#fdf5f5',
                '100': '#fbebeb',
                '200': '#f5cece',
                '300': '#efb0b0',
                '400': '#e27474',
                '500': '#d63939',
                '600': '#c13333',
                '700': '#a12b2b',
                '800': '#802222',
                '900': '#691c1c'
            },
            pink: {
                '50': '#fdf5f8',
                '100': '#fbebf0',
                '200': '#f5ccda',
                '300': '#efadc4',
                '400': '#e27098',
                '500': '#d6336c',
                '600': '#c12e61',
                '700': '#a12651',
                '800': '#801f41',
                '900': '#691935'
            },
            teal: {
                '50': '#f3fbf8',
                '100': '#e7f6f2',
                '200': '#c2e9dd',
                '300': '#9edbc9',
                '400': '#55c1a1',
                '500': '#0ca678',
                '600': '#0b956c',
                '700': '#097d5a',
                '800': '#076448',
                '900': '#06513b'
            },
            green: {
                '50': '#f5fbf6',
                '100': '#eaf7ec',
                '200': '#cbecd0',
                '300': '#ace1b4',
                '400': '#6dca7c',
                '500': '#2fb344',
                '600': '#2aa13d',
                '700': '#238633',
                '800': '#1c6b29',
                '900': '#175821'
            },
            orange: {
                '50': '#fff7f3',
                '100': '#fef0e6',
                '200': '#fdd9c1',
                '300': '#fcc29c',
                '400': '#f99551',
                '500': '#f76707',
                '600': '#de5d06',
                '700': '#b94d05',
                '800': '#943e04',
                '900': '#793203'
            },
            yellow: {
                '50': '#fffaf2',
                '100': '#fef5e6',
                '200': '#fde7bf',
                '300': '#fbd999',
                '400': '#f8bc4d',
                '500': '#f59f00',
                '600': '#dd8f00',
                '700': '#b87700',
                '800': '#935f00',
                '900': '#784e00'
            },
            indigo: {
                '50': '#f6f7fe',
                '100': '#eceffd',
                '200': '#d0d8fa',
                '300': '#b3c1f7',
                '400': '#7b92f1',
                '500': '#4263eb',
                '600': '#3b59d4',
                '700': '#324ab0',
                '800': '#283b8d',
                '900': '#203173'
            }
        },
        extend: {},
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
