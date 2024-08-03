/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php", "./resources/**/*.js", "./resources/**/*.vue"
    ],
    theme: {
        extend: {
            colors: {
                'greenBi': '#309255',
                'grayBi': '#52565b',
                'brownBi': '#696969',
                'blackBi': '#212832',
                'creamBi': '#eefbf3',
                'redBi': '#FF6575',
                'black2Bi': '#1d2733',
                'gray2Bi': '#deede4',
                'goldenBi': '#ffbc34',
                'blueBi': "#5d87ff"
            },
            maxWidth: {
                '1200': '1200px'
            },
            padding: {
                '15px': '15px',
                '150px': '150px'
            },
            fontFamily: {
                'barlow': ['Barlow Condensed'],
                'jost': ['Jost']
            },
            keyframes: {
                pulseIcon: {
                    '0%': {
                        boxShadow: '0 0 0 0 rgba(48, 146, 85)'
                    },
                    '100%': {
                        boxShadow: '0 0 0 15px transparent'
                    }
                }
            },
            animation: {
                pulseIcon: 'pulseIcon 1s ease-in-out infinite'
            },
            boxShadow: {
                'bibi': '#919eab4d 0 0 2px, #919eab1f 0 12px 24px -4px'
            },
            screens: {
                'phone': {
                    'max': '600px'
                },
                'lg-phone': {
                    'min': '600px'
                },
                'tablet': {
                    'min': '768px'
                },
                'lg-tab': {
                    'min': '992px'
                },
                'desk': {
                    'min': '1200px'
                }
            }
        }
    },
    plugins: []
}
